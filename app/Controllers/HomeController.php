<?php

class HomeController extends Controller
{
    public function index()
    {
        try {
            Session::init();

            if (!Session::get('usuario_id')) {
                // if (defined('TESTING') && TESTING === true) {
                //     return SALIR;
                // }
                header('Location: ' . SALIR);
                exit();
            }

            // Obtener datos de sede
            $sedeModel = $this->model('Sede');
            $sedeCount = $sedeModel->countSedes();

            if ($sedeCount == 0) {
                // if (defined('TESTING') && TESTING === true) {
                //     return '/PIZZA4/public/sede/registro';
                // }
                header('Location: /PIZZA4/public/sede/registro');
                exit();
            }

            // Obtener todos los conteos
            $usuarioModel = $this->model('Usuario');
            $clienteModel = $this->model('Cliente');
            $pedidoModel = $this->model('Pedido');
            $productoModel = $this->model('Producto');
            $pisoModel = $this->model('Piso');
            $rolModel = $this->model('Rol');
            $mesaModel = $this->model('Mesa');
            $categoriaModel = $this->model('Categoria');

            // Obtener datos del usuario actual
            $usuario = $usuarioModel->getUsuarioById(Session::get('usuario_id'));
            $rolUsuario = $usuarioModel->getRolesUsuarioAutenticado(Session::get('usuario_id'));

            // Preparar los datos para la vista
            $data = [
                'usuariosCount' => $usuarioModel->countUsuarios(),
                'clientesCount' => $clienteModel->countClientes(),
                'pedidosCount' => $pedidoModel->countPedidos(),
                'productosCount' => $productoModel->countProductos(),
                'pisoCount' => $pisoModel->pisosCount(),
                'rolesCount' => $rolModel->contadorDeRoles(),
                'mesasCount' => $mesaModel->mesasCount(),
                'categoriasCount' => $categoriaModel->categoriasCount(),
                'totalPedidosPorEstado' => $pedidoModel->getTotalPedidosPorEstado(),
                'productosMasVendidos' => $pedidoModel->getProductosMasVendidos(),
                'usuario' => $usuario,
                'rolUsuario' => $rolUsuario
            ];

            
            $this->view('dashboard', $data);
        } catch (Exception $e) {
            error_log("Error en HomeController: " . $e->getMessage());
            $this->view('error/500', ['message' => 'Ha ocurrido un error en el servidor']);
        }
    }
}
