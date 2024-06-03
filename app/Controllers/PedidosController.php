<?php
class PedidosController extends Controller
{
    public function index()
    {
        $pedidoModel = $this->model('Pedido');
        $pedidos = $pedidoModel->getAllPedidos();
        $this->view('pedidos/index', ['pedidos' => $pedidos]);
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
                    'usuario_id' => trim($_POST['usuario_id']),
                    'cliente_id' => trim($_POST['cliente_id']),
                    'mesa_id' => trim($_POST['mesa_id']),
                    'fecha' => date('Y-m-d H:i:s'),
                    'estado' => trim($_POST['estado']),
                    'total' => trim($_POST['total']),
                    'productos' => $_POST['productos']
                ];
                $pedidoModel = $this->model('Pedido');
                if ($pedidoModel->createPedido($data)) {
                    header('Location: /pedidos');
                } else {
                    die('Error al crear el pedido');
                }
            } else {
                $usuarioModel = $this->model('Usuario');
                $clienteModel = $this->model('Cliente');
                $mesaModel = $this->model('Mesa');
                $productoModel = $this->model('Producto');
                $usuarios = $usuarioModel->getAllUsuarios();
                $clientes = $clienteModel->getAllClientes();
                $mesas = $mesaModel->getAllMesas();
                $productos = $productoModel->getAllProductos();
                $this->view('pedidos/create', [
                    'usuarios' => $usuarios,
                    'clientes' => $clientes,
                    'mesas' => $mesas,
                    'productos' => $productos
                ]);
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
            $pedidoModel = $this->model('Pedido');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'id' => $id,
                    'usuario_id' => trim($_POST['usuario_id']),
                    'cliente_id' => trim($_POST['cliente_id']),
                    'mesa_id' => trim($_POST['mesa_id']),
                    'fecha' => trim($_POST['fecha']),
                    'estado' => trim($_POST['estado']),
                    'total' => trim($_POST['total']),
                    'productos' => $_POST['productos']
                ];
                if ($pedidoModel->updatePedido($data)) {
                    header('Location: /pedidos');
                } else {
                    die('Error al actualizar el pedido');
                }
            } else {
                $pedido = $pedidoModel->getPedidoById($id);
                $usuarioModel = $this->model('Usuario');
                $clienteModel = $this->model('Cliente');
                $mesaModel = $this->model('Mesa');
                $productoModel = $this->model('Producto');
                $usuarios = $usuarioModel->getAllUsuarios();
                $clientes = $clienteModel->getAllClientes();
                $mesas = $mesaModel->getAllMesas();
                $productos = $productoModel->getAllProductos();
                $this->view('pedidos/edit', [
                    'pedido' => $pedido,
                    'usuarios' => $usuarios,
                    'clientes' => $clientes,
                    'mesas' => $mesas,
                    'productos' => $productos
                ]);
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
            $pedidoModel = $this->model('Pedido');
            if ($pedidoModel->deletePedido($id)) {
                header('Location: /pedidos');
            } else {
                die('Error al eliminar el pedido');
            }
        }
    }
}
