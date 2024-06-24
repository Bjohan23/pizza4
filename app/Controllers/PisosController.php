<?php

class PisosController extends Controller
{
    public function index()
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        }

        $pisoModel = $this->model('Piso');
        $pisos = $pisoModel->getPisosWithMesasCount();
        $this->view('pisos/index', ['pisos' => $pisos]);
    }

    public function create()
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'nombre' => $_POST['nombre'],
                'sede_id' => $_POST['sede_id']
            ];
            $pisoModel = $this->model('Piso'); 
            if ($pisoModel->createPiso($data)) { 
                header('Location: /PIZZA4/public/pisos');
            } else {
                $this->view('pisos/create', ['error' => 'Error al registrar el piso.']);
            }
        } else {
            $sedeModel = $this->model('Sede'); 
            $sedes = $sedeModel->getAllSedes(); 
            $this->view('pisos/create', ['sedes' => $sedes]);
        }
    }
    public function edit($id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        }
    
        $pisoModel = $this->model('Piso');
        $piso = $pisoModel->getPisoById($id); // Obtener los detalles del piso
    
        if (!$piso) {
            // Manejar el caso donde el piso no existe
            // Esto puede ser una redirección, mostrar un mensaje de error, etc.
            // Por ejemplo:
            // header('Location: /PIZZA4/public/error404');
            // exit();
        }
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'nombre' => $_POST['nombre'],
                'sede_id' => $_POST['sede_id']
            ];
            if ($pisoModel->updatePiso($data)) {
                header('Location: /PIZZA4/public/pisos');
                exit();
            } else {
                $this->view('pisos/edit', ['piso' => $piso, 'error' => 'Error al actualizar el piso.']);
                exit();
            }
        }
    
        // Solo obtenemos las sedes si estamos mostrando el formulario de edición
        $sedeModel = $this->model('Sede');
        $sedes = $sedeModel->getAllSedes(); 
        $this->view('pisos/edit', ['piso' => $piso, 'sedes' => $sedes]);
    }
    

    public function delete($id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        }

        $pisoModel = $this->model('Piso');
        if ($pisoModel->deletePiso($id)) {
            header('Location: /PIZZA4/public/pisos');
        }
    }
    public function mesas($id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        }

        $pisoModel = $this->model('Piso');
        $piso = $pisoModel->getPisoById($id);
        $mesaModel = $this->model('Mesa');
        $mesas = $mesaModel->getMesasByPisoId($id);
        $this->view('pisos/mesas', ['piso' => $piso, 'mesas' => $mesas]);
    }
}
