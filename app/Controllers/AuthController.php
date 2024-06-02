<?php

class AuthController extends Controller
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Get user input
            $data = [
                'email' => trim($_POST['email']),
                'contraseña' => trim($_POST['contraseña']),
                'error' => ''
            ];

            // Load user model
            $usuarioModel = $this->model('Usuario');

            // Attempt to login user
            $loggedInUser = $usuarioModel->login($data['email'], $data['contraseña']);

            if ($loggedInUser) {
                // Create user session
                Session::init();
                Session::set('usuario_id', $loggedInUser->id);
                Session::set('usuario_email', $loggedInUser->email);
                Session::set('usuario_nombre', $loggedInUser->nombre);
                header('Location: /PIZZA4/public/dashboard'); // Redirect to dashboard
            } else {
                // Load view with error
                $data['error'] = 'Email o contraseña incorrectos.';
                $this->view('auth/login', $data);
            }
        } else {
            // Load login view
            $this->view('auth/login');
        }
    }

    public function logout()
    {
        Session::init();
        Session::destroy();
        header('Location: /PIZZA4/public/auth/login');
    }
}
