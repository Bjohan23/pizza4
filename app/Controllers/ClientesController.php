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
            echo json_encode(['success' => false, 'message' => 'Usuario no autenticado']);
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nombre' => trim($_POST['nombre']),
                'email' => trim($_POST['email']),
                'telefono' => trim($_POST['telefono']),
                'direccion' => trim($_POST['direccion']),
                'dni' => trim($_POST['dni'])
            ];
            $clienteModel = $this->model('Cliente');
            $result = $clienteModel->createCliente($data);
            if ($result) {
                echo json_encode([
                    'success' => true,
                    'cliente' => [
                        'id' => $result,
                        'nombre' => $data['nombre'],
                        'dni' => $data['dni'],
                        'email' => $data['email'],
                        'telefono' => $data['telefono'],
                        'direccion' => $data['direccion']
                    ]
                ]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al crear el cliente']);
            }
        } else {
            $this->view('clientes/create');
        }
        exit();
    }

    public function edit($id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
            exit();
        } else {
            $clienteModel = $this->model('Cliente');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'id' => $id,
                    'nombre' => $_POST['nombre'],
                    'email' => $_POST['email'],
                    'telefono' => $_POST['telefono'],
                    'direccion' => $_POST['direccion'],
                    'dni' => $_POST['dni'],
                ];

                if ($clienteModel->updateCliente($data)) {
                    header('Location: ' . CLIENT);
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
