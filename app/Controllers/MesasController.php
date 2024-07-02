<?php

class MesasController extends Controller
{
    public function index()
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
            exit();
        }
        $mesaModel = $this->model('Mesa');
        $mesas = $mesaModel->getMesas();
        $this->view('mesas/index', ['mesas' => $mesas]);
    }

    public function create()
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
            exit();
        }
        $pisoModel = $this->model('Piso');
        $pisos = $pisoModel->getPisos();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'piso_id' => $_POST['piso_id'],
                'numero' => $_POST['numero'],
                'capacidad' => $_POST['capacidad']
            ];
            $mesaModel = $this->model('Mesa');
            if ($mesaModel->createMesa($data)) {
                header('Location: /PIZZA4/public/pisos/mesas/' . $data['piso_id']);
            } else {
                $this->view('mesas/create', ['error' => 'Error al registrar la mesa.', 'pisos' => $pisos]);
            }
        } else {
            $this->view('mesas/create', ['pisos' => $pisos]);
        }
    }

    public function edit($id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
            exit();
        }
        $mesaModel = $this->model('Mesa');
        $pisoModel = $this->model('Piso');
        $pisos = $pisoModel->getPisos();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id' => $id,
                'piso_id' => $_POST['piso_id'],
                'numero' => $_POST['numero'],
                'capacidad' => $_POST['capacidad']
            ];
            if ($mesaModel->updateMesa($data)) {
                header('Location: /PIZZA4/public/pisos/mesas/' . $data['piso_id']);
            } else {
                $this->view('mesas/edit', ['mesa' => $data, 'error' => 'Error al actualizar la mesa.', 'pisos' => $pisos]);
            }
        } else {
            $mesa = $mesaModel->getMesaById($id);
            $this->view('mesas/edit', ['mesa' => $mesa, 'pisos' => $pisos]);
        }
    }

    public function delete($id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
            exit();
        }
        $mesaModel = $this->model('Mesa');
        $piso_id = $mesaModel->getMesaById($id);
        if ($mesaModel->deleteMesa($id)) {
            header('Location: /PIZZA4/public/pisos/mesas/' . $piso_id['piso_id']);
        }
    }
}
