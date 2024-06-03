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
            $sedes = $sedeModel->getSedes();
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'nombre' => $_POST['nombre'],
                'sede_id' => $_POST['sede_id']
            ];
            if ($pisoModel->updatePiso($data)) {
                header('Location: /PIZZA4/public/pisos');
            } else {
                $this->view('pisos/edit', ['piso' => $data, 'error' => 'Error al actualizar el piso.']);
            }
        } else {
            $piso = $pisoModel->getPisoById($id);
            $sedeModel = $this->model('Sede');
            $sedes = $sedeModel->getSedes();
            $this->view('pisos/edit', ['piso' => $piso, 'sedes' => $sedes]);
        }
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
}
