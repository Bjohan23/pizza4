<?php

class RolesController extends Controller
{
    public function index()
    {
        $rolModel = $this->model('Rol');
        $roles = $rolModel->getAllRoles();
        $this->view('roles/index', ['roles' => $roles]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $rolModel = $this->model('Rol');
            $rolModel->createRol($nombre);
            header('Location: /PIZZA4/public/roles');
        } else {
            $this->view('roles/create');
        }
    }
}
