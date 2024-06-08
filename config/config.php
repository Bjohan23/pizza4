
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'piza4');
// Configurar la zona horaria en PHP
date_default_timezone_set('America/Lima');

// salir
define('SALIR', '/PIZZA4/public/auth/login');
define('APP_URL', 'http://localhost/PIZZA4/');
define('FORM_URL', '/PIZZA4/public/');
define('APP_NAME', 'PIZZA4');
define('APP_PATH', realpath(dirname(__FILE__, 2)) . '/'); // obtiene la ruta del proyecto en el servidor local o en el servidor de produccion
// usuarios
define('USER', '/PIZZA4/public/usuarios');
define('USER_CREATE', '/PIZZA4/public/usuarios/create');
define('USER_EDIT', '/PIZZA4/public/usuarios/edit/');
define('USER_DELETE', '/PIZZA4/public/usuarios/delete/');
define('USER_SEARCH', '/PIZZA4/public/usuarios/search');
// roles
define('ROL', '/PIZZA4/public/roles');
define('ROL_CREATE', '/PIZZA4/public/roles/create');
define('ROL_EDIT', '/PIZZA4/public/roles/edit/');
define('ROL_DELETE', '/PIZZA4/public/roles/delete/');
// productos
define('PRODUCT', '/PIZZA4/public/productos');
define('PRODUCT_CREATE', '/PIZZA4/public/productos/create');
define('PRODUCT_EDIT', '/PIZZA4/public/productos/edit/');
define('PRODUCT_DELETE', '/PIZZA4/public/productos/delete/');
// pedidos
define('ORDER', '/PIZZA4/public/pedidos');
define('ORDER_CREATE', '/PIZZA4/public/pedidos/create/');
define('ORDER_EDIT', '/PIZZA4/public/pedidos/edit/');
define('ORDER_DELETE', '/PIZZA4/public/pedidos/delete/');
define('ORDER_ALL', '/PIZZA4/public/pedidos/allPedidos');
define('ORDER_VIEW', '/PIZZA4/public/pedidos/viewMesa/');
// clientes
define('CLIENT', '/PIZZA4/public/clientes');
define('CLIENT_CREATE', '/PIZZA4/public/clientes/create');
define('CLIENT_EDIT', '/PIZZA4/public/clientes/edit/');
define('CLIENT_DELETE', '/PIZZA4/public/clientes/delete/');
// mesas
define('TABLE', '/PIZZA4/public/mesas');
define('TABLE_CREATE', '/PIZZA4/public/mesas/create');
define('TABLE_EDIT', '/PIZZA4/public/mesas/edit/');
define('TABLE_DELETE', '/PIZZA4/public/mesas/delete/');
define('LIBERAR_MESA', '/PIZZA4/public/pedidos/liberarMesa/');
define('VIEW_MESA', '/PIZZA4/public/pedidos/viewMesa/');
// categorias
define('CATEGORY', '/PIZZA4/public/categorias');
define('CATEGORY_CREATE', '/PIZZA4/public/categorias/create');
define('CATEGORY_EDIT', '/PIZZA4/public/categorias/edit/');
define('CATEGORY_DELETE', '/PIZZA4/public/categorias/delete/');

// sedes
define('SEDE', '/PIZZA4/public/sedes');
define('SEDE_CREATE', '/PIZZA4/public/sedes/create');
define('SEDE_EDIT', '/PIZZA4/public/sedes/edit/');
define('SEDE_DELETE', '/PIZZA4/public/sedes/delete/');
// PISO
define('PISOS', '/PIZZA4/public/pisos');
define('PISO_CREATE', '/PIZZA4/public/pisos/create');
define('PISO_EDIT', '/PIZZA4/public/pisos/edit/');
define('PISO_DELETE', '/PIZZA4/public/pisos/delete/');
// COBRAR
define('COBRAR', '/PIZZA4/public/pedidos/cobrar');
define('COBRAR_PEDIDO', '/PIZZA4/public/pedidos/cobrarPedido/');
