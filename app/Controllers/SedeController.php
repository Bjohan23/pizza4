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

            // Load Sede model
            $sedeModel = $this->model('Sede');

            // Register new Sede
            if ($sedeModel->createSede($data)) {
                header('Location: /dashboard'); // Redirect to dashboard after successful registration
            } else {
                $data['error'] = 'Error al registrar la sede.';
            }
        }

        // Load registration view
        $this->view('sede/registro', $data);
    }
}
