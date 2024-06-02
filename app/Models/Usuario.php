<?php

namespace App\Models;

class Usuario
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function create($username, $password, $persona_id)
    {
        $stmt = $this->conn->prepare("INSERT INTO usuarios (username, password, persona_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $username, password_hash($password, PASSWORD_BCRYPT), $persona_id);
        $stmt->execute();
        $stmt->close();
    }

    public function findByUsername($username)
    {
        $stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_assoc();
    }
}
