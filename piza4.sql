-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2024 a las 23:34:32
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `piza4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoría`
--

CREATE TABLE `categoría` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoría`
--

INSERT INTO `categoría` (`id`, `nombre`) VALUES
(1, 'Pizzas'),
(2, 'Ensaladas'),
(3, 'Bebidas'),
(4, 'Postres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `persona_id`) VALUES
(1, 13),
(2, 15),
(105, 94),
(106, 95);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobanteventa`
--

CREATE TABLE `comprobanteventa` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comprobanteventa`
--

INSERT INTO `comprobanteventa` (`id`, `pedido_id`, `tipo`, `monto`, `fecha`) VALUES
(17, 45, 'factura', 17.00, '2024-06-08 12:44:18'),
(18, 45, 'factura', 17.00, '2024-06-08 12:44:20'),
(19, 45, 'factura', 17.00, '2024-06-08 12:44:46'),
(20, 44, 'factura', 63.50, '2024-06-08 18:29:31'),
(21, 46, 'factura', 20.00, '2024-06-21 15:35:59'),
(22, 46, 'factura', 20.00, '2024-06-27 22:43:00'),
(23, 46, 'factura', 20.00, '2024-06-27 22:57:27'),
(24, 46, 'factura', 20.00, '2024-06-27 23:16:28'),
(25, 46, 'factura', 20.00, '2024-06-27 23:23:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallespedido`
--

CREATE TABLE `detallespedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detallespedido`
--

INSERT INTO `detallespedido` (`id`, `pedido_id`, `producto_id`, `cantidad`, `precio`, `descripcion`) VALUES
(194, 64, 1, 123, 20.00, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listroles`
--

CREATE TABLE `listroles` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `listroles`
--

INSERT INTO `listroles` (`id`, `usuario_id`, `rol_id`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 1, 1, '2024-06-02 13:18:19', NULL),
(3, 4, 2, '2024-06-22 17:04:01', '2024-06-30 10:04:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `piso_id` int(11) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `estado` varchar(255) DEFAULT 'libre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `piso_id`, `numero`, `capacidad`, `estado`) VALUES
(1, 1, 1, 6, 'ocupada'),
(2, 1, 2, 6, 'libre'),
(3, 2, 3, 5, 'libre'),
(4, 1, 3, 6, 'libre'),
(12, 1, 3, 12, 'libre'),
(13, 2, 3, 11, 'libre'),
(14, 1, 1, 12, 'libre'),
(15, 1, 1, 1, 'libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoscomanda`
--

CREATE TABLE `pedidoscomanda` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `mesa_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `estado` enum('pendiente','preparando','listo','servido','cancelado') DEFAULT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidoscomanda`
--

INSERT INTO `pedidoscomanda` (`id`, `usuario_id`, `cliente_id`, `mesa_id`, `fecha`, `estado`, `total`) VALUES
(44, 1, 1, 1, '2024-06-08 05:44:38', 'preparando', 63.50),
(45, 1, 1, 3, '2024-06-08 19:41:24', 'listo', 17.00),
(46, 1, 1, 1, '2024-06-13 21:30:24', '', 20.00),
(56, 1, 1, 3, '2024-06-28 03:38:53', '', 135.00),
(64, 1, NULL, 1, '2024-06-28 11:26:44', '', 2460.00),
(65, 1, NULL, 1, '2024-06-28 11:33:04', '', 40.00),
(66, 1, NULL, 1, '2024-06-28 15:45:34', '', 5.00),
(67, 1, NULL, 1, '2024-06-28 15:46:04', '', 5.00),
(68, 1, NULL, 1, '2024-06-28 15:47:36', '', 20.00),
(69, 1, NULL, 1, '2024-06-28 15:48:10', '', 5.00),
(70, 1, NULL, 1, '2024-06-28 15:48:15', '', 5.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre`, `telefono`, `direccion`, `email`, `dni`) VALUES
(1, 'Admin', '980957418', '123 Admin St.1', 'admin@example.com', NULL),
(13, 'BECERRA VENTURA JOHAN JHERLI', '998113374', 'porvenir 548', 'becerrajohan6@gmail.com', '77349472'),
(15, 'ZEGARRA APAZA MARCO ANTONIO', '998113374', 'porvenir 548', 'admin6@gmail.com', '29265381'),
(17, '123', '998113374', 'porvenir 548', NULL, NULL),
(76, 'Nequ', '123456789', 'Voluptatum sunt dolo', 'lyhozugy@mailinator.com1', NULL),
(88, 'Sit iusto pariatur', 'Blanditiis occa', 'Quia eiusmod nobis e', 'gacupyba@mailinator.com', NULL),
(89, 'Consequatur iste un', 'Quaerat ratione', '12212121', 'lusox@mailinator.com', NULL),
(90, 'Mollitia neque volup', 'Aut ducimus tem', 'Adipisicing Nam amet', 'webi@mailinator.com', NULL),
(91, 'Veniam sunt perspic', '123123', 'Non aliquip ipsum e', 'qubawuw@mailinator.com', NULL),
(92, 'Recusandae Proident', '861231231231231', 'Consequat Incidunt', 'zulo@mailinator.com', NULL),
(93, 'BECERRA VENTURA JOHAN JHERLI', '998113374', 'porvenir 548', 'becerrajohan6@gmail.com', NULL),
(94, 'BECERRA VENTURA JOHAN JHERLI', '123456789', 'Omnis voluptas volup', 'qijy@mailinator.com', '77349472'),
(95, 'CRUZ VASQUEZ JESUS AARON', '922810391', 'Manuel Artiaga-168', 'yisusvasquez.21@gmail.com', '75959504');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piso`
--

CREATE TABLE `piso` (
  `id` int(11) NOT NULL,
  `sede_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `piso`
--

INSERT INTO `piso` (`id`, `sede_id`, `nombre`) VALUES
(1, 6, 'piso 1'),
(2, 6, 'piso 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentación`
--

CREATE TABLE `presentación` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `disponible` tinyint(1) DEFAULT 1,
  `categoria_id` int(11) DEFAULT NULL,
  `presentacion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `disponible`, `categoria_id`, `presentacion_id`) VALUES
(1, 'Pizza Margarita', 'Nuestra clásica pizza con salsa de tomate, queso mozzarella y albahaca fresca.', 20.00, 1, 1, NULL),
(2, 'Pizza Margarita FAMILIAR', 'Pizza Margarita', 123.00, 1, 2, NULL),
(5, 'Pizza Margarita', 'Pizza clásica con salsa de tomate, mozzarella y albahaca.', 8.50, 1, 1, NULL),
(6, 'Pizza Pepperoni', 'Pizza con salsa de tomate, mozzarella y pepperoni.', 9.00, 1, 1, NULL),
(7, 'Pizza Cuatro Quesos', 'Pizza con salsa de tomate y una mezcla de cuatro quesos.', 10.00, 1, 1, NULL),
(8, 'Pizza Hawaiana', 'Pizza con salsa de tomate, mozzarella, jamón y piña.', 9.50, 1, 1, NULL),
(9, 'Ensalada César', 'Ensalada con lechuga, pollo, crutones y aderezo César.', 7.00, 1, 2, NULL),
(10, 'Refresco de Cola', 'Refresco de cola de 350 ml.', 2.00, 1, 3, NULL),
(11, 'Cerveza Artesanal', 'Cerveza artesanal de 500 ml.', 5.00, 1, 3, NULL),
(12, 'Tiramisu', 'Postre italiano hecho con capas de café, mascarpone y cacao.', 4.50, 1, 4, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'mozo '),
(3, 'gerente ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id`, `nombre`, `direccion`) VALUES
(6, 'pizza 4', '7943 S. Fifth Street');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `persona_id`, `contrasena`) VALUES
(1, 1, '$2y$10$QCluU3aIyg.nbWIbFRgnUebrCCCWwVgbNjPwT782QcuBf0j9n/RFS'),
(4, 76, '$2y$10$4tmjTqJwrWE44tQ/IWtAGezrtRTNmO.W5EHSDELXY3yE3VQ8ZBtS6'),
(6, 89, '$2y$10$qErc5VY21eHD6cW6mrvvYuF52GcckRbv8rzWZjZq55b4SghMJFHZi'),
(7, 90, '$2y$10$JCMjBd2LmddJTowUfOCs.OkKx0eaIgTyv.0lW1YmstHs1vU0ucXZG');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoría`
--
ALTER TABLE `categoría`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `comprobanteventa`
--
ALTER TABLE `comprobanteventa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`);

--
-- Indices de la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `idx_detallespedido_pedido_id` (`pedido_id`);

--
-- Indices de la tabla `listroles`
--
ALTER TABLE `listroles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `piso_id` (`piso_id`);

--
-- Indices de la tabla `pedidoscomanda`
--
ALTER TABLE `pedidoscomanda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `mesa_id` (`mesa_id`),
  ADD KEY `idx_pedidoscomanda_estado` (`estado`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `piso`
--
ALTER TABLE `piso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sede_id` (`sede_id`);

--
-- Indices de la tabla `presentación`
--
ALTER TABLE `presentación`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `presentacion_id` (`presentacion_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoría`
--
ALTER TABLE `categoría`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `comprobanteventa`
--
ALTER TABLE `comprobanteventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de la tabla `listroles`
--
ALTER TABLE `listroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pedidoscomanda`
--
ALTER TABLE `pedidoscomanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT de la tabla `piso`
--
ALTER TABLE `piso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `presentación`
--
ALTER TABLE `presentación`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`);

--
-- Filtros para la tabla `comprobanteventa`
--
ALTER TABLE `comprobanteventa`
  ADD CONSTRAINT `comprobanteventa_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidoscomanda` (`id`);

--
-- Filtros para la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  ADD CONSTRAINT `detallespedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidoscomanda` (`id`),
  ADD CONSTRAINT `detallespedido_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `listroles`
--
ALTER TABLE `listroles`
  ADD CONSTRAINT `listroles_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `listroles_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD CONSTRAINT `mesas_ibfk_1` FOREIGN KEY (`piso_id`) REFERENCES `piso` (`id`);

--
-- Filtros para la tabla `pedidoscomanda`
--
ALTER TABLE `pedidoscomanda`
  ADD CONSTRAINT `pedidoscomanda_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pedidoscomanda_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `pedidoscomanda_ibfk_3` FOREIGN KEY (`mesa_id`) REFERENCES `mesas` (`id`);

--
-- Filtros para la tabla `piso`
--
ALTER TABLE `piso`
  ADD CONSTRAINT `piso_ibfk_1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoría` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`presentacion_id`) REFERENCES `presentación` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
