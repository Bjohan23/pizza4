<?php

class Persona extends Model
{
    public function create($nombre, $email, $telefono, $direccion)
    {
        // if ($this->emailExists($email)) {
        //     throw new \Exception("El email ya existe");
        // }

        $this->db->query("INSERT INTO personas (nombre, email, telefono, direccion) VALUES (:nombre, :email, :telefono, :direccion)");
        $this->db->bind(':nombre', $nombre);
        $this->db->bind(':email', $email);
        $this->db->bind(':telefono', $telefono);
        $this->db->bind(':direccion', $direccion);


        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            throw new \Exception("Error al crear la persona");
        }
    }

    public function emailExists($email)
    {
        $this->db->query("SELECT id FROM personas WHERE email = :email");
        $this->db->bind(':email', $email);
        $this->db->execute();
        return $this->db->rowCount() > 0;
    }
}
