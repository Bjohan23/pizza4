<?php

class Usuario extends Model
{
    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FROM usuarios JOIN personas ON usuarios.persona_id = personas.id WHERE personas.email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        return $this->db->rowCount() > 0;
    }

    public function login($email, $contraseña)
    {
        $this->db->query('SELECT usuarios.id, personas.nombre, personas.email, usuarios.contraseña FROM usuarios 
                          JOIN personas ON usuarios.persona_id = personas.id 
                          WHERE personas.email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        if ($row && password_verify($contraseña, $row['contraseña'])) {
            return $row;
        } else {
            return false;
        }
    }
    public function getUsuarios()
    {
        $this->db->query('SELECT u.id, p.nombre, p.email, p.telefono FROM usuarios u JOIN personas p ON u.persona_id = p.id');
        return $this->db->resultSet();
    }
    public function getAllUsuarios()
    {
        $this->db->query('SELECT u.id, p.nombre FROM usuarios u JOIN personas p ON u.persona_id = p.id');
        return $this->db->resultSet();
    }

    public function countUsuarios()
    {
        $this->db->query('SELECT COUNT(*) as count FROM usuarios');
        return $this->db->single()['count'];
    }
    public function createUsuario($data)
    {
        // Primero insertar la persona
        $this->db->query('INSERT INTO personas (nombre, email, telefono, direccion) VALUES (:nombre, :email, :telefono, :direccion)');
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telefono', $data['telefono']);
        $this->db->bind(':direccion', $data['direccion']);
        $this->db->execute();

        $persona_id = $this->db->lastInsertId();

        // Luego insertar el usuario
        $this->db->query('INSERT INTO usuarios (persona_id, contraseña) VALUES (:persona_id, :contraseña)');
        $this->db->bind(':persona_id', $persona_id);
        $this->db->bind(':contraseña', $data['contraseña']);
        return $this->db->execute();
    }

    public function getUsuarioById($id)
    {
        $this->db->query('SELECT u.id, p.nombre, p.email, p.telefono, p.direccion FROM usuarios u JOIN personas p ON u.persona_id = p.id WHERE u.id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateUsuario($data)
    {
        $this->db->query('UPDATE personas SET nombre = :nombre, email = :email, telefono = :telefono, direccion = :direccion WHERE id = (SELECT persona_id FROM usuarios WHERE id = :id)');
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telefono', $data['telefono']);
        $this->db->bind(':direccion', $data['direccion']);
        return $this->db->execute();
    }

    public function deleteUsuario($id)
    {
        $this->db->query('DELETE FROM usuarios WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
