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
        }

        $pedidoModel = $this->model('Pedido');
        $pedidos = $pedidoModel->getPedidosByMesa($mesa_id);
        $productoModel = $this->model('Producto');
        $productos = $productoModel->getAllProductos();
        $clienteModel = $this->model('Cliente');
        $clientes = $clienteModel->getAllClientes();
        $usuarioModel = $this->model('Usuario');
        $usuario = $usuarioModel->getUsuarioById(Session::get('usuario_id'));

        // Convertir a objeto si no es nulo
        if ($usuario) {
            $usuario = (object) $usuario;
        }

        $mesaModel = $this->model('Mesa');
        $mesa = $mesaModel->getMesaById($mesa_id);

        // Convertir a objeto si no es nulo
        if ($mesa) {
            $mesa = (object) $mesa;
        }

        $pedido = isset($pedidos[0]) ? $pedidos[0] : null; // Asegurarse de tener al menos un pedido

        $this->view('pedidos/viewMesa', [
            'mesa_id' => $mesa_id,
            'pedidos' => $pedidos,
            'productos' => $productos,
            'clientes' => $clientes,
            'mesa' => $mesa,
            'usuario' => $usuario,
            'pedido' => $pedido // Pasar el primer pedido a la vista
        ]);
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
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
            exit();
        }

        $pedidoModel = $this->model('Pedido');
        $mesaModel = $this->model('Mesa');
        $clienteModel = $this->model('Cliente');
        $productoModel = $this->model('Producto');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'mesa_id' => $_POST['mesa_id'],
                'cliente_id' => $_POST['cliente_id'],
                'usuario_id' => Session::get('usuario_id'),
                'estado' => $_POST['estado'],
                'total' => isset($_POST['total']) ? $_POST['total'] : 0.0,
                'fecha' => date('Y-m-d H:i:s')
            ];

            if ($pedidoModel->updatePedido($data)) {
                $pedidoModel->deleteDetallesByPedido($id);

                if (isset($_POST['productos']) && is_array($_POST['productos'])) {
                    foreach ($_POST['productos'] as $detalle) {
                        if (isset($detalle['producto_id']) && isset($detalle['cantidad'])) {
                            $producto = $productoModel->getProductoById($detalle['producto_id']);
                            if ($producto) {
                                $detalleData = [
                                    'pedido_id' => $id,
                                    'producto_id' => $detalle['producto_id'],
                                    'cantidad' => $detalle['cantidad'],
                                    'precio' => $producto->precio
                                ];
                                $pedidoModel->addDetalle($detalleData);
                            }
                        }
                    }
                }

                header('Location: /PIZZA4/public/pedidos/viewMesa/' . $_POST['mesa_id']);
                exit();
            } else {
                die('Error al actualizar el pedido');
            }
        } else {
            $pedido = $pedidoModel->getPedidoById($id);
            $mesas = $mesaModel->getAllMesas();
            $productos = $productoModel->getAllProductos();
            $clientes = $clienteModel->getAllClientes();

            $this->view('pedidos/update', [
                'pedido' => $pedido,
                'mesas' => $mesas,
                'clientes' => $clientes,
                'productos' => $productos
            ]);
        }
    }

    public function eliminarProducto($pedido_id, $producto_id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
            exit();
        }

        $pedidoModel = $this->model('Pedido');
        if ($pedidoModel->deleteDetalle($pedido_id, $producto_id)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            die('Error al eliminar el producto del pedido');
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
