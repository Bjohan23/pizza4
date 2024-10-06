-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2024 a las 18:14:17
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
(1, 'Pizza'),
(2, 'Bebidas'),
(3, 'Postres');

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
(1, 2),
(2, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobanteventa`
--

CREATE TABLE `comprobanteventa` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comprobanteventa`
--

INSERT INTO `comprobanteventa` (`id`, `pedido_id`, `tipo`, `monto`, `fecha`) VALUES
(1, 1, 'efectivo', 32.00, '2024-07-07 01:48:25'),
(2, 2, 'yape', 7.00, '2024-07-07 01:49:34'),
(3, 3, 'yape', 3.50, '2024-07-07 01:50:09'),
(4, 4, 'yape', 25.00, '2024-07-07 01:55:54'),
(5, 6, 'efectivo', 25.00, '2024-07-07 02:03:15'),
(6, 7, 'efectivo', 50.00, '2024-07-07 02:05:45'),
(7, 2, 'boleta', 20.00, '2024-09-27 16:05:29'),
(8, 2, 'efectivo', 100.00, '2024-09-27 19:51:56');

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
(1, 1, 1, 1, 25.00, ''),
(2, 1, 2, 1, 3.50, ''),
(3, 2, 2, 1, 3.50, ''),
(4, 3, 2, 1, 3.50, ''),
(5, 4, 1, 1, 25.00, ''),
(7, 6, 1, 1, 25.00, ''),
(8, 7, 1, 2, 25.00, ''),
(9, 11, 1, 1, 25.00, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listroles`
--

CREATE TABLE `listroles` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `listroles`
--

INSERT INTO `listroles` (`id`, `usuario_id`, `rol_id`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 1, 1, '2024-07-07 19:33:50', NULL);

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
(1, 1, 1, 10, 'ocupada'),
(2, 1, 2, 5, 'libre'),
(3, 1, 3, 4, 'libre'),
(4, 1, 4, 4, 'libre'),
(5, 2, 1, 5, 'libre'),
(7, 2, 2, 5, 'libre'),
(8, 2, 3, 5, 'libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidoscomanda`
--

CREATE TABLE `pedidoscomanda` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `mesa_id` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `pedidoscomanda`
--

INSERT INTO `pedidoscomanda` (`id`, `usuario_id`, `cliente_id`, `mesa_id`, `fecha`, `estado`, `total`) VALUES
(1, 1, 1, 1, '2024-07-07 00:50:04', 'pagado', 28.50),
(2, 1, 2, 1, '2024-09-12 15:51:08', 'pagado', 3.50),
(3, 1, 1, 1, '2024-07-07 01:49:19', 'pagado', 3.50),
(4, 1, 1, 1, '2024-07-07 01:55:43', 'pagado', 25.00),
(6, 1, 1, 2, '2024-07-07 02:02:03', 'pagado', 25.00),
(7, 1, 1, 5, '2024-07-07 02:05:35', 'pagado', 50.00),
(8, 19, 2, 4, '2024-09-27 15:50:49', 'pagado', 28.50),
(9, 19, 2, 4, '2024-09-27 15:50:39', 'pendiente', 28.50),
(10, 19, 2, 4, '2024-09-27 17:54:30', 'pagado', 28.50),
(11, 1, 1, 1, '2024-10-04 16:09:37', 'pendiente', 25.00);

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
(1, 'BECERRA VENTURA JOHAN JHERLI', '998113374', 'porvenir 548', 'becerrajohan6@gmail.com', '77349472'),
(2, 'BECERRA VENTURA JOHAN JHERLI', '998113374', 'porvenir 548', 'becerrajohan6@gmail.com', '77349472'),
(18, 'Juan Perez', '123456789', 'Calle Falsa 123', 'juan.perez@example.com', '12345678'),
(19, ' johan becerra ventura', '123456789', '22', '@example.com', '12345678'),
(20, 'BECERRA VENTURA JOHAN JHERLI', '555-1234', '123 Main St', 'john.doe@example.com', '77349472'),
(21, 'John', '555-1234', '123 Main St', 'john.doe@example.com', NULL),
(22, 'John', '555-1234', '123 Main St', 'john.doe@example.com', NULL),
(23, 'BECERRA VENTURA JOHAN JHERLI', '998113374', 'porvenir 548', 'becerrajohan6@gmail.com', '77349472');

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
(1, 3, '1#'),
(2, 3, '2#'),
(3, 3, '3#');

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
(1, 'Pizza Margarita', '.', 25.00, 1, 1, NULL),
(2, 'gaseosa coca cola', '.', 3.50, 1, 2, NULL),
(3, 'San luis', '', 2.20, 1, 1, NULL);

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
(2, 'mozo ');

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
(3, 'Zarelle - Pizzería & Trattoría', 'Chiclayo');

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
(1, 1, '$2y$10$2N6RCHKsCGBI6UOje5A68Og2TlS.S1bpmAt9OMgDcExqP2Zxx4Vxy'),
(19, 18, 'scrypt:32768:8:1$wzoiwPsz68nR2cIG$5886592abe67f77c2d2d9cff52aa761fbb232a1880548246b57352901f7dfa361d95eaa59cecb545263e28a2003550bda2b70c9a348ff22b19380b127121085d'),
(20, 19, 'scrypt:32768:8:1$Scmz4koy8Rhar4Jv$d700ae75a3e7a11bc4da68f797d141c126b89aca9cde398990f59a45388d8b916206192537853095f3342e85481b28e8b147d8c87b95c23e47b21cfa5601a3d4');

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
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `usuario_id_2` (`usuario_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `comprobanteventa`
--
ALTER TABLE `comprobanteventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `detallespedido`
--
ALTER TABLE `detallespedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `listroles`
--
ALTER TABLE `listroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pedidoscomanda`
--
ALTER TABLE `pedidoscomanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `piso`
--
ALTER TABLE `piso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `presentación`
--
ALTER TABLE `presentación`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
