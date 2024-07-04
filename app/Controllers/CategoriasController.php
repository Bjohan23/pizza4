<?php

class CategoriasController extends Controller
{
    public function index()
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
            exit();
        } else {
            $categoriaModel = $this->model('Categoria');
            $categorias = $categoriaModel->getCategorias();

            $usuarioModel = $this->model('Usuario');
            $rolUsuario = $usuarioModel->getRolesUsuarioAutenticado(Session::get('usuario_id'));
            $this->view('categorias/index', ['categorias' => $categorias, 'rolUsuario' => $rolUsuario]);
        }
    }

    public function create()
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
            exit();
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = ['nombre' => trim($_POST['nombre'])];
                $categoriaModel = $this->model('Categoria');
                if ($categoriaModel->createCategoria($data)) {
                    header('Location: /PIZZA4/public/categorias');
                } else {
                    $data['error'] = 'Error al crear la categoría.';
                    $this->view('categorias/create', $data);
                }
            } else {

                $usuarioModel = $this->model('Usuario');
                $rolUsuario = $usuarioModel->getRolesUsuarioAutenticado(Session::get('usuario_id'));
                $this->view('categorias/create', ['rolUsuario' => $rolUsuario]);
            }
        }
    }

    public function edit($id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
            exit();
        } else {
            $categoriaModel = $this->model('Categoria');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'id' => $id,
                    'nombre' => trim($_POST['nombre'])
                ];
                if ($categoriaModel->updateCategoria($data)) {
                    header('Location: /PIZZA4/public/categorias');
                } else {
                    $data['error'] = 'Error al actualizar la categoría.';
                    $this->view('categorias/edit', $data);
                }
            } else {
                $categoria = $categoriaModel->getCategoriaById($id);

                $usuarioModel = $this->model('Usuario');
                $rolUsuario = $usuarioModel->getRolesUsuarioAutenticado(Session::get('usuario_id'));
                $this->view('categorias/edit', ['categoria' => $categoria, 'rolUsuario' => $rolUsuario]);
            }
        }
    }

    public function delete($id)
    {
        Session::init();
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR);
            exit();
        } else {
            $categoriaModel = $this->model('Categoria');
            if ($categoriaModel->deleteCategoria($id)) {
                header('Location: /PIZZA4/public/categorias');
            } else {
                $data['error'] = 'Error al eliminar la categoría.';
                $this->view('categorias/index', $data);
            }
        }
    }
}
