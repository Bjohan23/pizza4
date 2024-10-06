<?php
class VentasController extends Controller
{
    public function index()
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        }

        $usuarioModel = $this->model('Usuario');
        $rolUsuario = $usuarioModel->getRolesUsuarioAutenticado(Session::get('usuario_id'));

        $ventaModel = $this->model('ComprobanteVenta');
<<<<<<< HEAD
        $ventas = $ventaModel->getVentas();
        $this->view('ventas/index', ['ventas' => $ventas, 'rolUsuario' => $rolUsuario]);
=======

        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : null;
        $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        $limite = 10; // Número de ventas por página

        if ($fecha) {
            $ventas = $ventaModel->getVentasPorFecha($fecha, $pagina, $limite);
            $totalVentas = $ventaModel->getTotalVentasPorFecha($fecha);
        } else {
            $ventas = $ventaModel->getVentas($pagina, $limite);
            $totalVentas = $ventaModel->getTotalVentas();
        }

        $totalPaginas = ceil($totalVentas / $limite);

        $this->view('ventas/index', [
            'ventas' => $ventas,
            'rolUsuario' => $rolUsuario,
            'pagina' => $pagina,
            'totalPaginas' => $totalPaginas,
            'fecha' => $fecha
        ]);
>>>>>>> 10bab11bfe709f6a0e1892c37fe9f7ef0dff901c
    }
}
