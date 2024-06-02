<?php

namespace App\Models;

class Persona
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function create($nombre, $email, $telefono, $direccion)
    {
        if ($this->emailExists($email)) {
            throw new \Exception("El email ya existe");
        }

        $stmt = $this->conn->prepare("INSERT INTO Personas (nombre, email, telefono, direccion) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nombre, $email, $telefono, $direccion);
        $stmt->execute();
        $persona_id = $stmt->insert_id;
        $stmt->close();
        return $persona_id;
    }

    public function emailExists($email)
    {
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM Personas WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($count);
        $stmt->fetch();
        $stmt->close();
        return $count > 0;
    }
}
