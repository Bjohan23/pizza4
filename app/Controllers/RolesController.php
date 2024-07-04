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

            $usuarioModel = $this->model('Usuario');
            $rolUsuario = $usuarioModel->getRolesUsuarioAutenticado(Session::get('usuario_id'));
            $this->view('roles/index', ['roles' => $roles, 'rolUsuario' => $rolUsuario]);
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

                $usuarioModel = $this->model('Usuario');
                $rolUsuario = $usuarioModel->getRolesUsuarioAutenticado(Session::get('usuario_id'));
                $this->view('roles/create', ['rolUsuario' => $rolUsuario]);
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

                $usuarioModel = $this->model('Usuario');
                $rolUsuario = $usuarioModel->getRolesUsuarioAutenticado(Session::get('usuario_id'));
                $this->view('roles/edit', ['rol' => $rol, 'rolUsuario' => $rolUsuario]);
            }
        }
    }
    public function eliminar($id)
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {
            $rolModel = $this->model('Rol');
            $rolModel->deleteRol($id);
            header('Location: /PIZZA4/public/roles');
        }
    }
}
