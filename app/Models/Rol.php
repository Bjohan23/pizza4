<?php

class Rol extends Model
{
    public function getAllRoles()
    {
        $this->db->query('SELECT * FROM roles');
        return $this->db->resultSet();
    }
    // crear un rol
    public function createRol($nombre)
    {
        $this->db->query('INSERT INTO roles (nombre) VALUES (:nombre)');
        $this->db->bind(':nombre', $nombre);
        $this->db->execute();
    }
}
