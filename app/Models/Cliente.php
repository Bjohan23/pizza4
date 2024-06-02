<?php
class Cliente extends Model
{
    public function getAllClientes()
    {
        $this->db->query('SELECT Clientes.id, Personas.nombre, Personas.email, Personas.telefono, Personas.direccion FROM Clientes 
                          JOIN Personas ON Clientes.persona_id = Personas.id');
        return $this->db->resultSet();
    }

    public function createCliente($data)
    {
        $this->db->query('INSERT INTO Personas (nombre, email, telefono, direccion) VALUES (:nombre, :email, :telefono, :direccion)');
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telefono', $data['telefono']);
        $this->db->bind(':direccion', $data['direccion']);
        if ($this->db->execute()) {
            $personaId = $this->db->lastInsertId();
            $this->db->query('INSERT INTO Clientes (persona_id) VALUES (:persona_id)');
            $this->db->bind(':persona_id', $personaId);
            return $this->db->execute();
        }
        return false;
    }

    public function getClienteById($id)
    {
        $this->db->query('SELECT * FROM Clientes JOIN Personas ON Clientes.persona_id = Personas.id WHERE Clientes.id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateCliente($data)
    {
        $this->db->query('UPDATE Personas SET nombre = :nombre, email = :email, telefono = :telefono, direccion = :direccion WHERE id = (SELECT persona_id FROM Clientes WHERE id = :id)');
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telefono', $data['telefono']);
        $this->db->bind(':direccion', $data['direccion']);
        $this->db->bind(':id', $data['id']);
        if ($this->db->execute()) {
            return true;
        }
        return false;
    }

    public function deleteCliente($id)
    {
        $this->db->query('DELETE FROM Clientes WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
