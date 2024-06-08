

CREATE TABLE `categoría` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
INSERT INTO `categoría` (`id`, `nombre`) VALUES
(1, 'Pizzas'),
(2, 'Ensaladas'),
(3, 'Bebidas'),
(4, 'Postres');
CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `clientes` (`id`, `persona_id`) VALUES
(101, NULL),
(1, 13),
(2, 15),
(4, 17);
CREATE TABLE `comprobanteventa` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
CREATE TABLE `detallespedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
INSERT INTO `detallespedido` (`id`, `pedido_id`, `producto_id`, `cantidad`, `precio`, `descripcion`) VALUES
(156, 41, 1, 1, 20.00, NULL);
CREATE TABLE `listroles` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
INSERT INTO `listroles` (`id`, `usuario_id`, `rol_id`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 1, 1, '2024-06-02 13:18:19', NULL);
CREATE TABLE `mesas` (
  `id` int(11) NOT NULL,
  `piso_id` int(11) DEFAULT NULL,
  `numero` int(11) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `estado` varchar(255) DEFAULT 'libre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
INSERT INTO `mesas` (`id`, `piso_id`, `numero`, `capacidad`, `estado`) VALUES
(1, 1, 1, 4, 'ocupada'),
(2, 1, 2, 6, 'libre'),
(3, 2, 3, 5, 'libre');
CREATE TABLE `pedidoscomanda` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `mesa_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `estado` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
INSERT INTO `pedidoscomanda` (`id`, `usuario_id`, `cliente_id`, `mesa_id`, `fecha`, `estado`, `total`) VALUES
(41, 1, 1, 1, '2024-06-08 00:14:06', 'ocupada', 20.00);
CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
INSERT INTO `personas` (`id`, `nombre`, `email`, `telefono`, `direccion`) VALUES
(1, 'Admin', 'admin@example.com', '123456789', '123 Admin St.'),
(5, 'luis', 'becerrajohan6@gmail.com', '123456789', 'porvenir 455'),
(7, 'luis', 'becerrajohan7@gmail.com', '123456789', 'porvenir 455'),
(8, 'johan3', 'admin22@example.com', '998113374', 'porvenir 548'),
(9, 'johan', 'cmacojuniore@uss.edu.pe', '998113374', 'porvenir 548'),
(10, 'johan', 'cmacojuniore3@uss.edu.pe', '998113374', 'porvenir 548'),
(11, 'johan', 'cmacojuniore33@uss.edu.pe', '998113374', 'porvenir 548'),
(12, 'johan', 'ejemplo2@gamil.com', '12333333332222', 'porvenir 548222'),
(13, 'johan', 'becerrajohan633@gmail.com', '998113374', 'porvenir 548'),
(15, 'johan', 'becerrajohan6111@gmail.com', '998113374', 'porvenir 548'),
(16, 'johan', 'becerrajohan6111333@gmail.com', '998113374', 'porvenir 548'),
(17, '123', 'becerrajohan633333333332@gmail.com', '998113374', 'porvenir 548');
CREATE TABLE `piso` (
  `id` int(11) NOT NULL,
  `sede_id` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `piso` (`id`, `sede_id`, `nombre`) VALUES
(1, 6, 'nose2'),
(2, 6, '2do');


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

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'mozo '),
(3, '1');

CREATE TABLE `sede` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
INSERT INTO `sede` (`id`, `nombre`, `direccion`) VALUES
(6, 'pizza 4', '7943 S. Fifth Street');


CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `persona_id` int(11) DEFAULT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
INSERT INTO `usuarios` (`id`, `persona_id`, `contraseña`) VALUES
(1, 1, '$2y$10$QCluU3aIyg.nbWIbFRgnUebrCCCWwVgbNjPwT782QcuBf0j9n/RFS'),
(2, 5, '$2y$10$QCluU3aIyg.nbWIbFRgnUebrCCCWwVgbNjPwT782QcuBf0j9n/RFS');
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
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `producto_id` (`producto_id`);
ALTER TABLE `listroles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `rol_id` (`rol_id`);
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `piso_id` (`piso_id`);
ALTER TABLE `pedidoscomanda`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `mesa_id` (`mesa_id`);
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
ALTER TABLE `comprobanteventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `detallespedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
ALTER TABLE `listroles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `pedidoscomanda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
ALTER TABLE `piso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
ALTER TABLE `presentación`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `sede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
