<?php
class ClientesController extends Controller
{
    public function index()
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {
            $clienteModel = $this->model('Cliente');
            $clientes = $clienteModel->getAllClientes();
            $this->view('clientes/index', ['clientes' => $clientes]);
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
                    'nombre' => trim($_POST['nombre']),
                    'email' => trim($_POST['email']),
                    'telefono' => trim($_POST['telefono']),
                    'direccion' => trim($_POST['direccion']),
                ];
                $clienteModel = $this->model('Cliente');
                if ($clienteModel->createCliente($data)) {
                    header('Location: ' . CLIENT . '');
                } else {
                    die('Error al crear el cliente');
                }
            } else {
                $this->view('clientes/create');
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
            $clienteModel = $this->model('Cliente');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'id' => $id,
                    'nombre' => trim($_POST['nombre']),
                    'email' => trim($_POST['email']),
                    'telefono' => trim($_POST['telefono']),
                    'direccion' => trim($_POST['direccion']),
                ];
                if ($clienteModel->updateCliente($data)) {
                    header('Location: ' . CLIENT . '');
                } else {
                    die('Error al actualizar el cliente');
                }
            } else {
                $cliente = $clienteModel->getClienteById($id);
                $this->view('clientes/edit', ['cliente' => $cliente]);
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
            $clienteModel = $this->model('Cliente');
            if ($clienteModel->deleteCliente($id)) {
                header('Location: ' . CLIENT . '');
            } else {
                die('Error al eliminar el cliente');
            }
        }
    }
}
