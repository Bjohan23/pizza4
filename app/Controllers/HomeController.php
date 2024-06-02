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
        if ($sedeModel->countSedes() == 0) {
            header('Location: /PIZZA4/public/sede/registro');
            exit();
        }

        echo 'Welcome to the Home Page!';
    }
}
