<?php
class Usuario extends Model
{
    public function login($email, $contraseña)
    {
        $this->db->query('SELECT Usuarios.id, Personas.nombre, Personas.email, Usuarios.contraseña 
                          FROM Usuarios 
                          JOIN Personas ON Usuarios.persona_id = Personas.id 
                          WHERE Personas.email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if ($row && password_verify($contraseña, $row->contraseña)) {
            return $row;
        } else {
            return false;
        }
    }
    public function getAllUsuarios()
    {
        $this->db->query('SELECT Usuarios.id, Personas.nombre, Personas.email, Roles.nombre as rol FROM Usuarios 
                          JOIN Personas ON Usuarios.persona_id = Personas.id 
                          JOIN Roles ON Usuarios.rol_id = Roles.id');
        return $this->db->resultSet();
    }

    public function createUsuario($data)
    {
        $this->db->query('INSERT INTO Personas (nombre, email, telefono, direccion) VALUES (:nombre, :email, :telefono, :direccion)');
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telefono', $data['telefono']);
        $this->db->bind(':direccion', $data['direccion']);
        if ($this->db->execute()) {
            $personaId = $this->db->lastInsertId();
            $this->db->query('INSERT INTO Usuarios (persona_id, contraseña, rol_id) VALUES (:persona_id, :contraseña, :rol_id)');
            $this->db->bind(':persona_id', $personaId);
            $this->db->bind(':contraseña', $data['contraseña']);
            $this->db->bind(':rol_id', $data['rol_id']);
            return $this->db->execute();
        }
        return false;
    }

    public function getUsuarioById($id)
    {
        $this->db->query('SELECT * FROM Usuarios JOIN Personas ON Usuarios.persona_id = Personas.id WHERE Usuarios.id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateUsuario($data)
    {
        $this->db->query('UPDATE Personas SET nombre = :nombre, email = :email, telefono = :telefono, direccion = :direccion WHERE id = (SELECT persona_id FROM Usuarios WHERE id = :id)');
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telefono', $data['telefono']);
        $this->db->bind(':direccion', $data['direccion']);
        $this->db->bind(':id', $data['id']);
        if ($this->db->execute()) {
            $this->db->query('UPDATE Usuarios SET contraseña = :contraseña, rol_id = :rol_id WHERE id = :id');
            $this->db->bind(':contraseña', $data['contraseña']);
            $this->db->bind(':rol_id', $data['rol_id']);
            $this->db->bind(':id', $data['id']);
            return $this->db->execute();
        }
        return false;
    }

    public function deleteUsuario($id)
    {
        $this->db->query('DELETE FROM Usuarios WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
