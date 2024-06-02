<?php

// Autoloader manual
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

require_once '../config/database.php';

use App\Controllers\RegistroController;

$connection = dbConnect();

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($path) {
    case '/':
        (new RegistroController($connection))->show();
        break;
    case '/register':
        (new RegistroController($connection))->register();
        break;
    case '/registro-exitoso':
        echo "Registro exitoso!";
        break;
    default:
        http_response_code(404);
        echo "Página no encontrada.";
        break;
}
