<?php
class UsuariosController extends Controller
{
    public function index()
    {
        $usuarioModel = $this->model('Usuario');
        $usuarios = $usuarioModel->getAllUsuarios();
        $this->view('usuarios/index', ['usuarios' => $usuarios]);
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nombre' => trim($_POST['nombre']),
                'email' => trim($_POST['email']),
                'telefono' => trim($_POST['telefono']),
                'direccion' => trim($_POST['direccion']),
                'contraseña' => password_hash(trim($_POST['contraseña']), PASSWORD_DEFAULT),
                'rol_id' => trim($_POST['rol_id'])
            ];
            $usuarioModel = $this->model('Usuario');
            if ($usuarioModel->createUsuario($data)) {
                header('Location: /usuarios');
            } else {
                die('Error al crear el usuario');
            }
        } else {
            $rolModel = $this->model('Rol');
            $roles = $rolModel->getAllRoles();
            $this->view('usuarios/create', ['roles' => $roles]);
        }
    }

    public function edit($id)
    {
        $usuarioModel = $this->model('Usuario');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'nombre' => trim($_POST['nombre']),
                'email' => trim($_POST['email']),
                'telefono' => trim($_POST['telefono']),
                'direccion' => trim($_POST['direccion']),
                'contraseña' => password_hash(trim($_POST['contraseña']), PASSWORD_DEFAULT),
                'rol_id' => trim($_POST['rol_id'])
            ];
            if ($usuarioModel->updateUsuario($data)) {
                header('Location: /usuarios');
            } else {
                die('Error al actualizar el usuario');
            }
        } else {
            $usuario = $usuarioModel->getUsuarioById($id);
            $rolModel = $this->model('Rol');
            $roles = $rolModel->getAllRoles();
            $this->view('usuarios/edit', ['usuario' => $usuario, 'roles' => $roles]);
        }
    }

    public function delete($id)
    {
        $usuarioModel = $this->model('Usuario');
        if ($usuarioModel->deleteUsuario($id)) {
            header('Location: /usuarios');
        } else {
            die('Error al eliminar el usuario');
        }
    }
}
