<?php

class SedeController extends Controller
{
    public function index()
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {
            $sedeModel = $this->model('Sede');
            $sedes = $sedeModel->getSedes();

            $this->view('sede/index', ['sedes' => $sedes]);
        }
    }
    // mostrar sede por id  
    public function mostrar($id)
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {
            $sedeModel = $this->model('Sede');
            $sede = $sedeModel->getSedeById($id);

            $this->view('sede/mostrar', ['sede' => $sede]);
        }
    }

    public function registro()
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {
            $data = [];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Get user input
                $data = [
                    'nombre' => trim($_POST['nombre']),
                    'direccion' => trim($_POST['direccion'])
                ];

                // se instancia el modelo de Sede para registrar la sede
                $sedeModel = $this->model('Sede');

                // se verifica si se pudo registrar la sede
                if ($sedeModel->createSede($data)) {
                    header('Location: /PIZZA4/public/dashboard');
                } else {
                    $data['error'] = 'Error al registrar la sede.';
                }
            }

            // Load registration view
            $this->view('sede/registro', $data);
        }
    }
}
