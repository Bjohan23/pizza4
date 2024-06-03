<?php

class Rol extends Model
{
    public function getAllRoles()
    {
        $this->db->query('SELECT * FROM roles');
        return $this->db->resultSet();
    }
}
