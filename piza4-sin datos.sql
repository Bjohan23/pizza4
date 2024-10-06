SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
CREATE TABLE `categoría` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `comprobanteventa` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `detallespedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `listroles` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `piso_id` int(11) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `estado` varchar(255) DEFAULT 'libre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `pedidoscomanda` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `mesa_id` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `estado` varchar(255) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `piso` (
  `id` int(11) NOT NULL,
  `sede_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `presentación` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;


CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `disponible` tinyint(1) DEFAULT 1,
  `categoria_id` int(11) DEFAULT NULL,
  `presentacion_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `sede` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE `categoría`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`);


ALTER TABLE `comprobanteventa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`);


ALTER TABLE `detallespedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `idx_detallespedido_pedido_id` (`pedido_id`);


ALTER TABLE `listroles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `usuario_id_2` (`usuario_id`);


ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `piso_id` (`piso_id`);

ALTER TABLE `pedidoscomanda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `mesa_id` (`mesa_id`),
  ADD KEY `idx_pedidoscomanda_estado` (`estado`);


ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `piso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sede_id` (`sede_id`);

ALTER TABLE `presentación`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`),
  ADD KEY `presentacion_id` (`presentacion_id`);

ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `sede`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `persona_id` (`persona_id`);

ALTER TABLE `categoría`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `comprobanteventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `detallespedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `listroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `pedidoscomanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `piso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `presentación`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `sede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`);


ALTER TABLE `comprobanteventa`
  ADD CONSTRAINT `comprobanteventa_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidoscomanda` (`id`);

ALTER TABLE `detallespedido`
  ADD CONSTRAINT `detallespedido_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidoscomanda` (`id`),
  ADD CONSTRAINT `detallespedido_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);


ALTER TABLE `listroles`
  ADD CONSTRAINT `listroles_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `listroles_ibfk_2` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);


ALTER TABLE `mesas`
  ADD CONSTRAINT `mesas_ibfk_1` FOREIGN KEY (`piso_id`) REFERENCES `piso` (`id`);


ALTER TABLE `pedidoscomanda`
  ADD CONSTRAINT `pedidoscomanda_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pedidoscomanda_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `pedidoscomanda_ibfk_3` FOREIGN KEY (`mesa_id`) REFERENCES `mesas` (`id`);


ALTER TABLE `piso`
  ADD CONSTRAINT `piso_ibfk_1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`);


ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoría` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`presentacion_id`) REFERENCES `presentación` (`id`);


ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`);
COMMIT;
