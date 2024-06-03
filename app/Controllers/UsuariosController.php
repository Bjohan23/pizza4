<?php

class UsuariosController extends Controller
{
    public function index()
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {

            $usuarioModel = $this->model('Usuario');
            $usuarios = $usuarioModel->getUsuarios();

            $this->view('usuarios/index', ['usuarios' => $usuarios]);
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
                $data = [
                    'nombre' => isset($_POST['nombre']) ? $_POST['nombre'] : null,
                    'email' => isset($_POST['email']) ? $_POST['email'] : null,
                    'telefono' => isset($_POST['telefono']) ? $_POST['telefono'] : null,
                    'direccion' => isset($_POST['direccion']) ? $_POST['direccion'] : null,
                    'contraseña' => password_hash($_POST['contraseña'], PASSWORD_DEFAULT),
                    'rol_id' => $_POST['rol_id']
                ];

                $personaModel = $this->model('Persona');
                $usuarioModel = $this->model('Usuario');
                $listRolesModel = $this->model('ListRoles');

                try {
                    $persona_id = $personaModel->create($data['nombre'], $data['email'], $data['telefono'], $data['direccion']);
                    $usuario_id = $usuarioModel->createUsuario(['persona_id' => $persona_id, 'contraseña' => $data['contraseña']]);
                    $listRolesModel->assignRole($usuario_id, $data['rol_id']);
                    header('Location: /PIZZA4/public/usuarios');
                } catch (\Exception $e) {
                    $data['error'] = $e->getMessage();
                    $rolModel = $this->model('Rol');
                    $data['roles'] = $rolModel->getAllRoles();
                    $this->view('usuarios/create', $data);
                }
            } else {
                $rolModel = $this->model('Rol');
                $roles = $rolModel->getAllRoles();
                $this->view('usuarios/create', ['roles' => $roles]);
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
            $usuarioModel = $this->model('Usuario');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'id' => $id,
                    'nombre' => $_POST['nombre'],
                    'email' => $_POST['email'],
                    'telefono' => $_POST['telefono'],
                    'direccion' => $_POST['direccion']
                ];
                if ($usuarioModel->updateUsuario($data)) {
                    header('Location: /PIZZA4/public/usuarios');
                }
            } else {
                $usuario = $usuarioModel->getUsuarioById($id);
                $this->view('usuarios/edit', ['usuario' => $usuario]);
            }
        }
    }

    public function delete($id)
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {
            $usuarioModel = $this->model('Usuario');
            if ($usuarioModel->deleteUsuario($id)) {
                header('Location: /PIZZA4/public/usuarios');
            }
        }
    }
    
}
