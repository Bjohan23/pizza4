<?php
// Definir la ruta base del proyecto
define('BASE_PATH', dirname(dirname(__FILE__)));

// Habilitar reporte de errores para desarrollo
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once BASE_PATH . '/config/config.php';
require_once BASE_PATH . '/app/core/App.php';
require_once BASE_PATH . '/app/core/Controller.php';
require_once BASE_PATH . '/app/core/Database.php';
require_once BASE_PATH . '/app/core/Model.php';
require_once BASE_PATH . '/app/core/Session.php';

// Inicializar sesiones
Session::init();

// Inicializar la aplicación
try {
    $app = new App();
} catch (Exception $e) {
    error_log("Error al inicializar la aplicación: " . $e->getMessage());
    die("Error al cargar la aplicación");
}
