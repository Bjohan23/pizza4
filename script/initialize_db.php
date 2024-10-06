<?php
require_once __DIR__ . '/../config/config.php';

$host = DB_HOST;
$user = DB_USER;
$password = DB_PASS;
$dbName = DB_NAME;

// Ruta al archivo SQL
$sqlFile = __DIR__ . '/../piza4-con datos.sql';

try {
    // Conexión a la base de datos
    $pdo = new PDO("mysql:host=$host", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Crear la base de datos si no existe
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8 COLLATE utf8_spanish_ci");
    echo "Base de datos '$dbName' creada o verificada exitosamente.\n";

    // Seleccionar la base de datos
    $pdo->exec("USE `$dbName`");

    // Leer el contenido del archivo SQL
    $sql = file_get_contents($sqlFile);

    // Separar las sentencias SQL por punto y coma
    $statements = array_filter(array_map('trim', explode(';', $sql)));

    // Ejecutar cada sentencia SQL con verificación de existencia de tablas
    foreach ($statements as $stmt) {
        if (!empty($stmt)) {
            try {
                $pdo->exec($stmt);
            } catch (PDOException $e) {
                // Código de error para "Base table or view already exists" es 42S01
                if ($e->getCode() == '42S01') {
                    echo "Advertencia: La tabla ya existe. Continuando con el siguiente.\n";
                } else {
                    throw $e;
                }
            }
        }
    }
    echo "Tablas creadas o verificadas exitosamente.\n";
} catch (PDOException $e) {
    echo "Error al inicializar la base de datos: " . $e->getMessage() . "\n";
    exit(1);
}
