<?php
class ProductosController extends Controller
{
    public function index()
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {
            $productoModel = $this->model('Producto');
            $productos = $productoModel->getAllProductos();
            $this->view('productos/index', ['productos' => $productos]);
        }
    }

    public function create()
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'nombre' => trim($_POST['nombre']),
                    'descripcion' => trim($_POST['descripcion']),
                    'precio' => trim($_POST['precio']),
                    'disponible' => isset($_POST['disponible']) ? 1 : 0,
                    'categoria_id' => trim($_POST['categoria_id'])
                ];
                $productoModel = $this->model('Producto');
                if ($productoModel->createProducto($data)) {
                    header('Location: /productos');
                } else {
                    die('Error al crear el producto');
                }
            } else {
                $categoriaModel = $this->model('Categoria');
                $categorias = $categoriaModel->getAllCategorias();
                $this->view('productos/create', ['categorias' => $categorias]);
            }
        }
    }

    public function edit($id)
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {
            $productoModel = $this->model('Producto');
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = [
                    'id' => $id,
                    'nombre' => trim($_POST['nombre']),
                    'descripcion' => trim($_POST['descripcion']),
                    'precio' => trim($_POST['precio']),
                    'disponible' => isset($_POST['disponible']) ? 1 : 0,
                    'categoria_id' => trim($_POST['categoria_id'])
                ];
                if ($productoModel->updateProducto($data)) {
                    header('Location: /productos');
                } else {
                    die('Error al actualizar el producto');
                }
            } else {
                $producto = $productoModel->getProductoById($id);
                $categoriaModel = $this->model('Categoria');
                $categorias = $categoriaModel->getAllCategorias();
                $this->view('productos/edit', ['producto' => $producto, 'categorias' => $categorias]);
            }
        }
    }

    public function delete($id)
    {
        Session::init();
        // Verificar si el usuario está autenticado
        if (!Session::get('usuario_id')) {
            header('Location: ' . SALIR . '');
            exit();
        } else {
            $productoModel = $this->model('Producto');
            if ($productoModel->deleteProducto($id)) {
                header('Location: /productos');
            } else {
                die('Error al eliminar el producto');
            }
        }
    }
}
