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

        if ($usuario) {
            $usuario = (object) $usuario;
        }

        $mesaModel = $this->model('Mesa');
        $mesa = $mesaModel->getMesaById($mesa_id);

        if ($mesa) {
            $mesa = (object) $mesa;
        }


        $pedido = isset($pedidos[0]) ? $pedidos[0] : null;

        $this->view('pedidos/viewMesa', [
            'mesa_id' => $mesa_id,
            'pedidos' => $pedidos,
            'productos' => $productos,
            'clientes' => $clientes,
            'mesa' => $mesa,
            'usuario' => $usuario,
            'pedido' => $pedido
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
                'estado' => 'pendiente',
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
                                'precio' => $producto['precio'],
                                'descripcion' => $producto['descripcion2'],
                                'estado' => 'pendiente'
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
                'id' => $id,
                'mesa_id' => $_POST['mesa_id'],
                'cliente_id' => $_POST['cliente_id'],
                'usuario_id' => Session::get('usuario_id'),
                'estado' => $_POST['estado'],
                'total' => $_POST['total'],
                'fecha' => date('Y-m-d H:i:s')
            ];

            if ($pedidoModel->updatePedido($data)) {
                $pedidoModel->deleteDetallesByPedido($id);

                foreach ($_POST['productos'] as $producto_id => $detalle) {
                    if ($detalle['cantidad'] > 0) {
                        $producto = $productoModel->getProductoById($producto_id);
                        $detalleData = [
                            'pedido_id' => $id,
                            'producto_id' => $producto_id,
                            'cantidad' => $detalle['cantidad'],
                            'precio' => $producto->precio
                        ];
                        $pedidoModel->addDetalle($detalleData);
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
    public function actualizarProducto($pedido_id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            Session::init();
            if (!Session::get('usuario_id')) {
                header('Location: ' . SALIR);
                exit();
            }

            $pedidoModel = $this->model('Pedido');
            $data = [
                "pedido_id" => $pedido_id,
                "cantidad" => $_POST["cantidad"]
            ];

            $success = $pedidoModel->updateDetallePedido($data);

            if ($success) {
                header("Location: " . $_SERVER["HTTP_REFERER"]);
            } else {
                echo "ERROR";
                exit();
            }
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

        $data = [
            'detalle_id' => $pedidos[0]['id'],
            'comanda_id' => $pedidos[0]['pedido_id'],
        ];
        $pedidoModel->deletePedido($data);
        // Actualizar el estado de la mesa a 'libre'
        $mesaModel = $this->model('Mesa');
        $mesaModel->updateEstado($mesa_id, 'libre');

        header('Location: ' . ORDER_SELECTMESA . $_POST['id']);
        exit();
    }

    public function allPedidos()
    {
        $pedidosModel = $this->model('Pedido');
        $pedidos = $pedidosModel->getAllPedidosWithDetails();

        $pedidosAgrupados = [];
        foreach ($pedidos as $pedido) {
            $mesa = $pedido['mesa'];
            if (!isset($pedidosAgrupados[$mesa])) {
                $pedidosAgrupados[$mesa] = [
                    'mesa' => $mesa,
                    'usuario' => $pedido['usuario'],
                    'fecha' => $pedido['fecha'],
                    'estado' => $pedido['estado'],
                    'descripcion' => $pedido['descripcion']
                ];
            } else {
                $pedidosAgrupados[$mesa]['descripcion'] .= ', ' . $pedido['descripcion'];
            }
        }

        $this->view('pedidos/allPedidos', ['pedidosAgrupados' => $pedidosAgrupados]);
    }

    public function cobrar($id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
            exit();
        }



        $pedidoModel = $this->model('Pedido');
        $pedido = $pedidoModel->getPedidoById($id);

        if ($pedido) {
            // Recoger datos del formulario
            $pedidoData = [
                'id' => $_POST['id'],
                'usuario_id' => $_POST['usuario_id'],
                'cliente_id' => $_POST['cliente_id'],
                'mesa_id' => $_POST['mesa_id'],
                'fecha' => $_POST['fecha'],
                'estado' => 'pagado',
                'total' => $_POST['total'],
                'pedido_id' => $pedido['productos'][0]['pedido_id'],
            ];


            if ($pedidoModel->updatePedido($pedidoData)) {
                // Verificación adicional
                $pedidoExistente = $pedidoModel->getPedidoById($pedidoData['id']);
                if ($pedidoExistente) {
                    // Registrar el comprobante de venta
                    $comprobanteModel = $this->model('ComprobanteVenta');
                    $comprobanteData = [

                        'pedido_id' => $pedidoData['pedido_id'],
                        'tipo' => 'factura', // Puede ser 'boleta', 'factura', etc.
                        'monto' => $pedidoData['total'],
                        'fecha' => date('Y-m-d H:i:s')
                    ];




                    if ($comprobanteModel->createComprobante($comprobanteData)) {
                        // Verificar los datos antes de la inserción
                        error_log('Datos del pedido: ' . print_r($pedidoData, true));
                        error_log('Datos del comprobante: ' . print_r($comprobanteData, true));

                        // Redirigir a la vista de la mesa
                        header('Location: ' . VIEW_MESA . $pedidoData['mesa_id']);
                        exit();
                    } else {
                        die('Error al registrar el comprobante de venta');
                    }
                } else {
                    error_log('El pedido no existe en la base de datos');
                    die('El pedido no existe en la base de datos');
                }
            } else {
                error_log('Error al actualizar el estado del pedido');
                die('Error al actualizar el estado del pedido');
            }
        } else {
            error_log('Error al encontrar el pedido');
            die('Error al encontrar el pedido');
        }
    }
}
