<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Persona;

class RegistroController
{
    private $usuarioModel;
    private $personaModel;

    public function __construct($connection)
    {
        $this->usuarioModel = new Usuario($connection);
        $this->personaModel = new Persona($connection);
    }

    public function show($error = null)
    {
        include_once "../app/Views/registro.php";
    }

    public function register()
    {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        try {
            $persona_id = $this->personaModel->create($nombre, $email, $telefono, $direccion);
            $this->usuarioModel->create($username, $password, $persona_id);
            header("Location: /registro-exitoso");
        } catch (\Exception $e) {
            $this->show($e->getMessage());
        }
    }
}
