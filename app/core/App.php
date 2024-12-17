<?php
class App
{
    protected $controller = 'AuthController';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        try {
            $url = $this->parseUrl();

            // Si la URL está vacía y el usuario está autenticado, cargar dashboard
            if (empty($url) && Session::get('usuario_id')) {
                $this->controller = 'HomeController';
                $this->method = 'index';
            }
            // Si la URL está vacía y el usuario NO está autenticado, cargar login
            else if (empty($url) && !Session::get('usuario_id')) {
                $this->controller = 'AuthController';
                $this->method = 'login';
            }
            // Si hay URL, procesar normalmente
            else if (isset($url[0])) {
                $controllerName = ucfirst($url[0]) . 'Controller';
                $controllerFile = ROOT_PATH . '/app/controllers/' . $controllerName . '.php';

                if (file_exists($controllerFile)) {
                    $this->controller = $controllerName;
                    unset($url[0]);
                }
            }

            $controllerPath = ROOT_PATH . '/app/controllers/' . $this->controller . '.php';

            if (!file_exists($controllerPath)) {
                throw new Exception("Controlador no encontrado: " . $controllerPath);
            }

            require_once $controllerPath;
            $this->controller = new $this->controller;

            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            $this->params = $url ? array_values($url) : [];

            if (!method_exists($this->controller, $this->method)) {
                throw new Exception("Método no encontrado: {$this->method} en el controlador {$this->controller}");
            }

            call_user_func_array([$this->controller, $this->method], $this->params);
        } catch (Exception $e) {
            error_log("Error in App.php: " . $e->getMessage());
            echo "Error: " . $e->getMessage();
            exit();
        }
    }

    protected function parseUrl()
    {
        if (isset($_GET['url'])) {
            return explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
        return [];
    }
}
