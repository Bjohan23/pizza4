<?php

class PedidosController extends Controller
{
    public function index()
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
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
            header('Location: ' . SALIR);
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
            header('Location: ' . SALIR);
            exit();
        } else {
            $pedidoModel = $this->model('Pedido');
            $pedidos = $pedidoModel->getPedidosByMesa($mesa_id);
            $productoModel = $this->model('Producto');
            $productos = $productoModel->getAllProductos();
            $clienteModel = $this->model('Cliente');
            $clientes = $clienteModel->getAllClientes();

            $mesaModel = $this->model('Mesa');
            $mesa = $mesaModel->getMesaById($mesa_id);
            if ($mesa === false) {
                $mesa = null;
            }
            $this->view('pedidos/viewMesa', [
                'mesa_id' => $mesa_id,
                'pedidos' => $pedidos,
                'productos' => $productos,
                'clientes' => $clientes,
                'mesa' => $mesa
            ]);
        }
    }

    public function create($mesa_id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
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

                if (isset($_POST['productos']) && is_array($_POST['productos'])) {
                    foreach ($_POST['productos'] as $producto) {
                        if ($producto['cantidad'] > 0) {
                            $detalleData = [
                                'pedido_id' => $pedidoId,
                                'producto_id' => $producto['id'],
                                'cantidad' => $producto['cantidad'],
                                'precio' => $producto['precio']
                            ];
                            $pedidoModel->addDetalle($detalleData);
                        }
                    }
                }

                header('Location: /PIZZA4/public/pedidos/viewMesa/' . $mesa_id);
                exit();
            } else {
                $clienteModel = $this->model('Cliente');
                $productoModel = $this->model('Producto');

                $this->view('pedidos/create', [
                    'error' => 'Error al registrar el pedido.',
                    'mesa_id' => $mesa_id,
                    'clientes' => $clienteModel->getAllClientes(),
                    'productos' => $productoModel->getAllProductos()
                ]);
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

    public function update($id)
    {
        $pedidoModel = $this->model('Pedido');
        $mesaModel = $this->model('Mesa');
        $clienteModel = $this->model('Cliente');
        $productoModel = $this->model('Producto');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Procesa el formulario de actualización del pedido
            $data = [
                'id' => $id,
                'mesa_id' => $_POST['mesa_id'],
                'cliente_id' => $_POST['cliente_id'],
                'usuario_id' => $_SESSION['user_id'], // asumiendo que el ID del usuario está almacenado en la sesión
                'estado' => $_POST['estado'],
                'total' => isset($_POST['total']) ? $_POST['total'] : 0.0, // Verifica si 'total' está definido
                'fecha' => date('Y-m-d H:i:s')
            ];

            if ($pedidoModel->updatePedido($data)) {
                $pedidoModel->deleteDetallesByPedido($id);

                foreach ($_POST['detalles'] as $detalle) {
                    $producto = $productoModel->getProductoById($detalle['producto_id']);
                    $detalleData = [
                        'pedido_id' => $id,
                        'producto_id' => $detalle['producto_id'],
                        'cantidad' => $detalle['cantidad'],
                        'precio' => $producto->precio
                    ];
                    $pedidoModel->addDetalle($detalleData);
                }

                // Redirige al usuario después de actualizar el pedido
                header('Location: ' . ORDER_VIEW . $id);
            } else {
                die('Error al actualizar el pedido');
            }
        } else {
            // Muestra el formulario de actualización del pedido
            $pedido = $pedidoModel->getPedidoById($id);
            $mesa_id = $mesaModel->getAllMesas();
            $productos = $productoModel->getAllProductos();
            $clientes = $clienteModel->getAllClientes();

            $this->view('pedidos/update', [
                'pedido' => $pedido,
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
            header('Location: ' . SALIR);
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
            header('Location: ' . SALIR);
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
