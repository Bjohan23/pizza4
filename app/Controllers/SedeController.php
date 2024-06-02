<?php

class SedeController extends Controller
{
    public function registro()
    {
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
