<?php


define('DB_HOST', '143.110.157.18');
define('DB_USER', 'dev_user');
define('DB_PASS', 'Lyracorp1104*');
define('DB_NAME', 'piza4');
define('USERNAME', 'johan230804@gmail.com');
define('NOMBRE_EMPRE', 'PIZZERIA ZARELLE');
define('TOKEN', '1234567890');
// Configurar la zona horaria en PHP
date_default_timezone_set('America/Lima');

// URLs base
define('LOGIN', '/auth/login');
define('SALIR', '/auth/login');
define('APP_URL', 'https://orange-ant-417838.hostingersite.com');
define('INICIO', '/dashboard');
define('FORM_URL', '/');
define('APP_NAME', 'PIZZERIA ZARELLE');
define('APP_PATH', realpath(dirname(__FILE__, 2)) . '/');

// usuarios
define('USER', '/usuarios');
define('USER_CREATE', '/usuarios/create');
define('USER_EDIT', '/usuarios/edit/');
define('USER_DELETE', '/usuarios/delete/');
define('USER_SEARCH', '/usuarios/search');

// CUENTA
define('CUENTA_EDIT', '/usuarios/cuentaUsuario/');

// roles
define('ROL', '/roles');
define('ROL_CREATE', '/roles/create');
define('ROL_EDIT', '/roles/edit/');
define('ROL_DELETE', '/roles/delete/');

// productos
define('PRODUCT', '/productos');
define('PRODUCT_CREATE', '/productos/create');
define('PRODUCT_EDIT', '/productos/edit/');
define('PRODUCT_DELETE', '/productos/delete/');

// pedidos
define('ORDER', '/pedidos');
define('ORDER_CREATE', '/pedidos/create/');
define('ORDER_EDIT', '/pedidos/edit/');
define('ORDER_DELETE', '/pedidos/delete/');
define('ORDER_ALL', '/pedidos/allPedidos');
define('ORDER_VIEW', '/pedidos/viewMesa/');
define('ORDER_SELECTMESA', '/pedidos/selectMesa/');

// clientes
define('CLIENT', '/clientes');
define('CLIENT_CREATE', '/clientes/create');
define('CLIENT_EDIT', '/clientes/edit/');
define('CLIENT_DELETE', '/clientes/delete/');

// mesas
define('TABLE', '/mesas/');
define('TABLE_CREATE', '/mesas/create/');
define('TABLE_EDIT', '/mesas/edit/');
define('TABLE_DELETE', '/mesas/delete/');
define('LIBERAR_MESA', '/pedidos/liberarMesa/');
define('VIEW_MESA', '/pedidos/viewMesa/');

// categorias
define('CATEGORY', '/categorias');
define('CATEGORY_CREATE', '/categorias/create');
define('CATEGORY_EDIT', '/categorias/edit/');
define('CATEGORY_DELETE', '/categorias/delete/');

// sedes
define('SEDE', '/sede');
define('SEDE_CREATE', '/sede/create');
define('SEDE_EDIT', '/sede/edit/');
define('SEDE_DELETE', '/sede/delete/');

// PISO
define('PISOS', '/pisos');
define('PISO_CREATE', '/pisos/create');
define('PISO_MESAS', '/pisos/mesas/');
define('PISO_EDIT', '/pisos/edit/');
define('PISO_DELETE', '/pisos/delete/');

// COBRAR
define('COBRAR', '/pedidos/cobrar/');
define('IMPRIMIR_BOLETA', '/pedidos/imprimirBoleta/');
define('VENTAS_MOSTRAR', '/ventas');
