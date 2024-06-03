<?php
class Cliente extends Model
{
    public function getAllclientes()
    {
        $this->db->query('SELECT clientes.id, personas.nombre, personas.email, personas.telefono, personas.direccion FROM clientes 
                          JOIN personas ON clientes.persona_id = personas.id');
        return $this->db->resultSet();
    }

    public function createCliente($data)
    {
        $this->db->query('INSERT INTO personas (nombre, email, telefono, direccion) VALUES (:nombre, :email, :telefono, :direccion)');
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':telefono', $data['telefono']);
        $this->db->bind(':direccion', $data['direccion']);
        if ($this->db->execute()) {
            $personaId = $this->db->lastInsertId();
            $this->db->query('INSERT INTO clientes (persona_id) VALUES (:persona_id)');
            $this->db->bind(':persona_id', $personaId);
            return $this->db->execute();
        }
        return false;
    }

    public function getClienteById($id)
    {
        $this->db->query('SELECT * FROM clientes JOIN personas ON clientes.persona_id = personas.id WHERE clientes.id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    public function countClientes()
    {
        $this->db->query('SELECT COUNT(*) as count FROM clientes');
        return $this->db->single()['count'];
    }

    public function updateCliente($data)
    {
        $this->db->query('UPDATE personas SET nombre = :nombre, email = :email, telefono = :telefono, direccion = :direccion WHERE id = (SELECT persona_id FROM clientes WHERE id = :id)');
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
        $this->db->query('DELETE FROM clientes WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
