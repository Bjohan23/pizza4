<?php

class Sede extends Model
{
    public function countSedes()
    {
        $this->db->query('SELECT COUNT(*) as count FROM Sede');
        $row = $this->db->single();
        return $row->count;
    }

    public function createSede($data)
    {
        $this->db->query('INSERT INTO Sede (nombre, direccion) VALUES (:nombre, :direccion)');
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':direccion', $data['direccion']);
        return $this->db->execute();
    }
}
