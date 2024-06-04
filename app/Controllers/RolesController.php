<?php

class RolesController extends Controller
{
    public function index()
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {
            $rolModel = $this->model('Rol');
            $roles = $rolModel->getAllRoles();
            $this->view('roles/index', ['roles' => $roles]);
        }
    }

    public function create()
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {
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
    public function edit($id)
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $nombre = $_POST['nombre'];
                $rolModel = $this->model('Rol');
                $rolModel->updateRol($id, $nombre);
                header('Location: /PIZZA4/public/roles');
            } else {
                $rolModel = $this->model('Rol');
                $rol = $rolModel->getRolById($id);
                $this->view('roles/edit', ['rol' => $rol]);
            }
        }
    }
}
