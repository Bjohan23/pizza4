<?php

class HomeController extends Controller
{
    public function index()
    {
        // Iniciar sesión si no está iniciada
        Session::init();

        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: /PIZZA4/public/auth/login');
            exit();
        }

        // Verificar si hay registros en la tabla `Sede`
        $sedeModel = $this->model('Sede');
        $sedeCount = $sedeModel->countSedes();

        if ($sedeCount == 0) {
            header('Location: /PIZZA4/public/sede/registro');
            exit();
        }

        // Obtener las cantidades de las entidades
        $usuarioModel = $this->model('Usuario');
        $clienteModel = $this->model('Cliente');
        $pedidoModel = $this->model('Pedido');
        $productoModel = $this->model('Producto');

        $usuariosCount = $usuarioModel->countUsuarios();
        $clientesCount = $clienteModel->countClientes();
        $pedidosCount = $pedidoModel->countPedidos();
        $productosCount = $productoModel->countProductos();

        // Pasar los datos a la vista
        $this->view('dashboard', [
            'usuariosCount' => $usuariosCount,
            'clientesCount' => $clientesCount,
            'pedidosCount' => $pedidosCount,
            'productosCount' => $productosCount,
        ]);
    }
}
