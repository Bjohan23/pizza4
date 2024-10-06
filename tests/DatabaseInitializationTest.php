<?php
use PHPUnit\Framework\TestCase;

class DatabaseInitializationTest extends TestCase
{
    protected static $pdo;

    public static function setUpBeforeClass(): void
    {
        require_once __DIR__ . '/../config/config.php';

        // Conectar a la base de datos
        self::$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function testTablesExist()
    {
        $tables = [
            'categoría',
            'clientes',
            'comprobanteventa',
            'detallespedido',
            'listroles',
            'mesas',
            'pedidoscomanda',
            'personas',
            'piso',
            'presentación',
            'productos',
            'roles',
            'sede',
            'usuarios',
        ];

        foreach ($tables as $table) {
            $stmt = self::$pdo->query("SHOW TABLES LIKE '$table'");
            $result = $stmt->fetch(PDO::FETCH_NUM);
            $this->assertNotEmpty($result, "La tabla '$table' no existe.");
        }
    }
}
