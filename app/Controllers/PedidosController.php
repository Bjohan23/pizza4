<?php

class PedidosController extends Controller
{
    public function index()
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        }

        $pisoModel = $this->model('Piso');
        $pisos = $pisoModel->getPisos();
        $this->view('pedidos/index', ['pisos' => $pisos]);
    }

    public function selectMesa($piso_id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        }

        $mesaModel = $this->model('Mesa');
        $mesas = $mesaModel->getMesasByPiso($piso_id);
        $this->view('pedidos/selectMesa', ['mesas' => $mesas, 'piso_id' => $piso_id]);
    }

    public function viewMesa($mesa_id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        }

        $pedidoModel = $this->model('Pedido');
        $pedidos = $pedidoModel->getPedidosByMesa($mesa_id);
        $productoModel = $this->model('Producto');
        $productos = $productoModel->getAllProductos();

        $mesaModel = $this->model('Mesa');
        $mesa = $mesaModel->getMesaById($mesa_id);

        $this->view('pedidos/viewMesa', [
            'mesa_id' => $mesa_id,
            'pedidos' => $pedidos,
            'productos' => $productos,
            'mesa' => $mesa // Pasar los datos de la mesa a la vista
        ]);
    }




    public function create($mesa_id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $pedidoData = [
                'mesa_id' => $mesa_id,
                'cliente_id' => $_POST['cliente_id'],
                'usuario_id' => Session::get('usuario_id'),
                'estado' => 'ocupada',
                'total' => $_POST['total'],
                'fecha' => date('Y-m-d H:i:s')
            ];

            $pedidoModel = $this->model('Pedido');
            $pedidoId = $pedidoModel->createPedido($pedidoData);

            if ($pedidoId) {
                $mesaModel = $this->model('Mesa');
                $mesaModel->updateEstado($mesa_id, 'ocupada');

                foreach ($_POST['productos'] as $producto) {
                    $detalleData = [
                        'pedido_id' => $pedidoId,
                        'producto_id' => $producto['id'],
                        'cantidad' => $producto['cantidad'],
                        'precio' => $producto['precio'],
                        'descripcion' => $producto['descripcion']
                    ];
                    $pedidoModel->addDetalle($detalleData);
                }

                header('Location: /PIZZA4/public/pedidos/viewMesa/' . $mesa_id);
                exit();
            } else {
                $this->view('pedidos/create', ['error' => 'Error al registrar el pedido.', 'mesa_id' => $mesa_id]);
            }
        } else {
            $clienteModel = $this->model('Cliente');
            $clientes = $clienteModel->getAllClientes();

            $productoModel = $this->model('Producto');
            $productos = $productoModel->getAllProductos();

            $this->view('pedidos/create', [
                'mesa_id' => $mesa_id,
                'clientes' => $clientes,
                'productos' => $productos
            ]);
        }
    }
    public function liberarMesa($mesa_id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        }

        $pedidoModel = $this->model('Pedido');

        // Obtener todos los pedidos asociados a la mesa
        $pedidos = $pedidoModel->getPedidosByMesa($mesa_id);

        // Eliminar cada pedido y sus detalles
        foreach ($pedidos as $pedido) {
            $pedidoModel->deletePedido($pedido['id']);
        }

        // Actualizar el estado de la mesa a 'libre'
        $mesaModel = $this->model('Mesa');
        $mesaModel->updateEstado($mesa_id, 'libre');

        header('Location: /PIZZA4/public/pedidos/viewMesa/' . $mesa_id);
        exit();
    }

    public function allPedidos()
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {

            // Obtener todos los pedidos con sus detalles
            $pedidoModel = $this->model('Pedido');
            $pedidos = $pedidoModel->getAllPedidosWithDetails();

            // Cargar la vista con los datos de los pedidos
            $this->view('pedidos/allPedidos', ['pedidos' => $pedidos]);
        }
    }
}
