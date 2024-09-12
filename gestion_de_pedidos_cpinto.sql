-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2024 a las 09:02:01
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
-- Base de datos: `gestion_de_pedidos_cpinto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre`
--

CREATE TABLE `cierre` (
  `id_cierre` varchar(3) NOT NULL,
  `tipo_cierre` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cierre`
--

INSERT INTO `cierre` (`id_cierre`, `tipo_cierre`) VALUES
('1', 'largo'),
('2', 'corto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `documento_cliente` varchar(9) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`documento_cliente`, `nombre`, `direccion`, `telefono`) VALUES
('25486393', 'Daniel Martinez', 'Pavia', '0416588963'),
('25698756', 'Maria Sanchez', 'Duaca', '04125896666'),
('26737737', 'Ellyhan Rodriguez', 'Calle 7 con 2 con av 40 entre 1 y paque ', '04245014391'),
('29586214', 'Gabriel Piña', 'Calle 7 con 2 con con plaza ', '0412588556'),
('29976212', 'Jheilyn Ramirez', 'calle 7  con carr 2, Cabudare', '04125888966');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte_manga`
--

CREATE TABLE `corte_manga` (
  `id_cortemanga` varchar(3) NOT NULL,
  `tipo_cortemanga` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `corte_manga`
--

INSERT INTO `corte_manga` (`id_cortemanga`, `tipo_cortemanga`) VALUES
('1', 'corto'),
('2', 'largo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costados`
--

CREATE TABLE `costados` (
  `id_costados` varchar(3) NOT NULL,
  `tipo_costados` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `costados`
--

INSERT INTO `costados` (`id_costados`, `tipo_costados`) VALUES
('1', 'con costado'),
('2', 'pintados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuello`
--

CREATE TABLE `cuello` (
  `id_cuello` varchar(3) NOT NULL,
  `tipo_cuello` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuello`
--

INSERT INTO `cuello` (`id_cuello`, `tipo_cuello`) VALUES
('1', 'En V'),
('2', 'En U');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` varchar(1) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre`, `descripcion`) VALUES
('1', 'Ventas', 'Venta de productos'),
('2', 'Diseño', 'Personalización de la prenda'),
('3', 'Impresión', 'Prenda en papel'),
('4', 'Confección ', 'Corte y Costura'),
('5', 'Revisión', 'Revisión de la prenda'),
('6', 'Empaquetado', 'entrega de prenda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manga`
--

CREATE TABLE `manga` (
  `id_manga` varchar(3) NOT NULL,
  `tipo_manga` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `manga`
--

INSERT INTO `manga` (`id_manga`, `tipo_manga`) VALUES
('1', 'Corta'),
('2', 'Larga');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_uniforme`
--

CREATE TABLE `pedido_uniforme` (
  `id_pedidoU` int(6) NOT NULL,
  `documento_cliente` varchar(10) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `img_producto` varchar(40) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_final` datetime DEFAULT NULL,
  `observacion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido_uniforme`
--

INSERT INTO `pedido_uniforme` (`id_pedidoU`, `documento_cliente`, `nombre`, `precio`, `img_producto`, `fecha_inicio`, `fecha_final`, `observacion`) VALUES
(1, '29586214', 'Maillot Dia de Lucha', 30.00, '66dfea1752eab.', '2024-01-01 00:00:00', '2024-03-11 00:00:00', 'Sin especial'),
(2, '26737737', 'Maillot Vuelta VZLA', 20.00, '66dfe6dca9c75.jpeg', '2024-02-11 00:00:00', '2024-02-11 00:00:00', 'ninguna'),
(3, '29976212', 'Franela', 15.00, '66dfeae477e5a.jpeg', '2024-02-11 00:00:00', '2024-02-11 00:00:00', ''),
(4, '25698756', 'Uniforme Mouyt', 50.00, '66dfebb26c761.jpeg', '2024-03-15 00:00:00', '2024-09-18 00:00:00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prenda_inferior`
--

CREATE TABLE `prenda_inferior` (
  `id_prendain` int(3) NOT NULL,
  `id_pedidoU` int(6) DEFAULT NULL,
  `id_tela` varchar(3) DEFAULT NULL,
  `id_costados` varchar(3) DEFAULT NULL,
  `id_tipoprod` varchar(3) DEFAULT NULL,
  `id_protector` varchar(3) DEFAULT NULL,
  `id_tipoPI` varchar(3) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `tapa_trasera` tinyint(1) DEFAULT NULL,
  `tirante` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prenda_inferior`
--

INSERT INTO `prenda_inferior` (`id_prendain`, `id_pedidoU`, `id_tela`, `id_costados`, `id_tipoprod`, `id_protector`, `id_tipoPI`, `color`, `tapa_trasera`, `tirante`, `descripcion`) VALUES
(1, 1, '3', '2', '1', '3', '2', 'Rosado', 1, 0, '3cm mas de largo'),
(2, 2, '1', '1', '1', '1', '1', '1', 1, 1, '1'),
(3, 3, '1', '1', '1', '1', '2', '1', 0, 2, '2'),
(4, 4, '1', '1', '1', '1', '1', '1', 1, 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prenda_superior`
--

CREATE TABLE `prenda_superior` (
  `id_prendasu` int(3) NOT NULL,
  `id_pedidoU` int(6) DEFAULT NULL,
  `id_tela` varchar(3) DEFAULT NULL,
  `id_costados` varchar(3) DEFAULT NULL,
  `id_tipoprod` varchar(3) DEFAULT NULL,
  `id_manga` varchar(3) DEFAULT NULL,
  `tela_manga` varchar(3) DEFAULT NULL,
  `id_cortemanga` varchar(3) DEFAULT NULL,
  `id_cuello` varchar(3) DEFAULT NULL,
  `id_cierre` varchar(3) DEFAULT NULL,
  `id_tipoPS` varchar(3) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prenda_superior`
--

INSERT INTO `prenda_superior` (`id_prendasu`, `id_pedidoU`, `id_tela`, `id_costados`, `id_tipoprod`, `id_manga`, `tela_manga`, `id_cortemanga`, `id_cuello`, `id_cierre`, `id_tipoPS`, `descripcion`) VALUES
(2, 1, '1', '2', '1', '2', '2', '2', '2', '2', '2', '2'),
(3, 2, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1'),
(4, 3, '3', '2', '1', '2', '2', '2', '2', '2', '2', '2'),
(5, 4, '1', '1', '1', '1', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `id_proceso` varchar(1) NOT NULL,
  `id_departamento` varchar(1) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `posicion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`id_proceso`, `id_departamento`, `nombre`, `posicion`) VALUES
('1', 1, 'Toma de Pedido', '1'),
('2', 2, 'Diseño de Prenda', '2'),
('3', 3, 'Impresión de Diseñp', '3'),
('4', 4, 'Corte de Tela', '4'),
('5', 4, 'Costura prenda', '5'),
('6', 5, 'Limpieza de Hilos', '6'),
('7', 6, 'Enpaque', '7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protector`
--

CREATE TABLE `protector` (
  `id_protector` varchar(3) NOT NULL,
  `tipo_protector` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `protector`
--

INSERT INTO `protector` (`id_protector`, `tipo_protector`) VALUES
('1', 'protector  1'),
('2', 'protector 2'),
('3', 'protector 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `id_seguimiento` int(3) NOT NULL,
  `id_departamento` varchar(10) DEFAULT NULL,
  `id_proceso` varchar(10) DEFAULT NULL,
  `id_pedidoU` int(6) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`id_seguimiento`, `id_departamento`, `id_proceso`, `id_pedidoU`, `fecha`, `estado`) VALUES
(1, '1', '1', 1, '2024-09-10 00:00:00', '1'),
(3, '1', '1', 1, '2024-09-10 00:00:00', '2'),
(4, '1', '1', 1, '2024-09-10 00:00:00', '3'),
(5, '6', '7', 2, '2024-09-10 00:00:00', '3'),
(7, '6', '7', 4, '2024-09-10 00:00:00', '3'),
(8, '6', '7', 3, '2024-09-10 00:00:00', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `id_talla` varchar(3) NOT NULL,
  `talla` varchar(10) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`id_talla`, `talla`, `genero`) VALUES
('1', 'XS', 'Dama'),
('10', 'M', 'Caballero'),
('11', 'L', 'Caballero'),
('12', 'XL', 'Caballero'),
('13', 'XXL', 'Caballero'),
('14', 'XXXL', 'Caballero'),
('2', 'S', 'Dama'),
('3', 'M', 'Dama'),
('4', 'L', 'Dama'),
('5', 'XL', 'Dama'),
('6', 'XXL', 'Dama'),
('7', 'XXXL', 'Dama'),
('8', 'XS', 'Caballero'),
('9', 'S', 'Caballero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla_pi`
--

CREATE TABLE `talla_pi` (
  `id_prendain` int(3) NOT NULL,
  `id_talla` varchar(3) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `talla_pi`
--

INSERT INTO `talla_pi` (`id_prendain`, `id_talla`, `cantidad`) VALUES
(3, '10', 2),
(3, '1', 4),
(4, '1', 1),
(4, '12', 4),
(4, '2', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla_ps`
--

CREATE TABLE `talla_ps` (
  `id_prendasu` int(3) NOT NULL,
  `id_talla` varchar(3) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `talla_ps`
--

INSERT INTO `talla_ps` (`id_prendasu`, `id_talla`, `cantidad`) VALUES
(3, '14', 2),
(3, '3', 2),
(3, '4', 6),
(5, '1', 1),
(5, '4', 2),
(5, '6', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tela`
--

CREATE TABLE `tela` (
  `id_tela` varchar(3) NOT NULL,
  `tipo_tela` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tela`
--

INSERT INTO `tela` (`id_tela`, `tipo_tela`) VALUES
('1', 'Capriati'),
('2', 'Microfibra'),
('3', 'Rayada'),
('4', 'Nueva xd'),
('5', 'nuevax3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pi`
--

CREATE TABLE `tipo_pi` (
  `id_tipoPI` varchar(3) NOT NULL,
  `nombre_tipoPI` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_pi`
--

INSERT INTO `tipo_pi` (`id_tipoPI`, `nombre_tipoPI`) VALUES
('1', 'Pro'),
('2', 'clasico'),
('3', 'Pro-V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipoprod` varchar(3) NOT NULL,
  `nombre_tipoprod` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id_tipoprod`, `nombre_tipoprod`) VALUES
('1', 'pro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ps`
--

CREATE TABLE `tipo_ps` (
  `id_tipoPS` varchar(3) NOT NULL,
  `nombre_tipoPS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_ps`
--

INSERT INTO `tipo_ps` (`id_tipoPS`, `nombre_tipoPS`) VALUES
('1', 'Pro'),
('2', 'Pro-X'),
('3', 'Clasico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` varchar(15) NOT NULL,
  `id_departamento` varchar(1) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `contraseña` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `rol` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `id_departamento`, `usuario`, `contraseña`, `nombre`, `rol`) VALUES
('1', '1', 'Iraima', '123456', 'Iraima Pinto', '1'),
('2', '2', 'Iriana', '123456', 'Iriana Pinro', '1'),
('3', '3', 'Maria', '123456', 'Maria Perez', '1'),
('4', '4', 'Pedro', '123456', 'Pedro Perez', '1'),
('5', '5', 'Irina', '123456', 'Iriana Pinro', '1'),
('6', '6', 'Camila', '123456', 'Camila Perez', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(6) NOT NULL,
  `id_pedidoU` int(6) DEFAULT NULL,
  `documento_cliente` varchar(9) DEFAULT NULL,
  `cantidad_prendas` int(11) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `fecha_venta` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_pedidoU`, `documento_cliente`, `cantidad_prendas`, `precio_unitario`, `descripcion`, `descuento`, `fecha_venta`) VALUES
(1, 1, '29586214', 10, 10.00, 'sin descuento', 0, '2024-02-29 00:00:00'),
(2, 2, '26737737', 15, 50.00, 'sin mangas', 0, '2024-06-11 00:00:00'),
(3, 3, '29976212', 5, 16.00, 'sin mangas', 0, '2024-05-15 00:00:00'),
(4, 4, '25698756', 7, 67.00, '', 0, '2024-04-30 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cierre`
--
ALTER TABLE `cierre`
  ADD PRIMARY KEY (`id_cierre`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`documento_cliente`);

--
-- Indices de la tabla `corte_manga`
--
ALTER TABLE `corte_manga`
  ADD PRIMARY KEY (`id_cortemanga`);

--
-- Indices de la tabla `costados`
--
ALTER TABLE `costados`
  ADD PRIMARY KEY (`id_costados`);

--
-- Indices de la tabla `cuello`
--
ALTER TABLE `cuello`
  ADD PRIMARY KEY (`id_cuello`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`id_manga`);

--
-- Indices de la tabla `pedido_uniforme`
--
ALTER TABLE `pedido_uniforme`
  ADD PRIMARY KEY (`id_pedidoU`),
  ADD KEY `documento_cliente` (`documento_cliente`);

--
-- Indices de la tabla `prenda_inferior`
--
ALTER TABLE `prenda_inferior`
  ADD PRIMARY KEY (`id_prendain`),
  ADD KEY `id_pedidoU` (`id_pedidoU`),
  ADD KEY `id_tela` (`id_tela`),
  ADD KEY `id_costados` (`id_costados`),
  ADD KEY `id_tipoprod` (`id_tipoprod`),
  ADD KEY `id_protector` (`id_protector`),
  ADD KEY `id_tipoPI` (`id_tipoPI`);

--
-- Indices de la tabla `prenda_superior`
--
ALTER TABLE `prenda_superior`
  ADD PRIMARY KEY (`id_prendasu`),
  ADD KEY `id_pedidoU` (`id_pedidoU`),
  ADD KEY `id_tela` (`id_tela`),
  ADD KEY `id_costados` (`id_costados`),
  ADD KEY `id_tipoprod` (`id_tipoprod`),
  ADD KEY `id_manga` (`id_manga`),
  ADD KEY `tela_manga` (`tela_manga`),
  ADD KEY `id_cortemanga` (`id_cortemanga`),
  ADD KEY `id_cuello` (`id_cuello`),
  ADD KEY `id_cierre` (`id_cierre`),
  ADD KEY `id_tipoPS` (`id_tipoPS`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`id_proceso`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `protector`
--
ALTER TABLE `protector`
  ADD PRIMARY KEY (`id_protector`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD PRIMARY KEY (`id_seguimiento`),
  ADD KEY `id_departamento` (`id_departamento`),
  ADD KEY `id_proceso` (`id_proceso`),
  ADD KEY `id_pedidoU_seguimiento` (`id_pedidoU`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`id_talla`);

--
-- Indices de la tabla `talla_pi`
--
ALTER TABLE `talla_pi`
  ADD KEY `id_prendain` (`id_prendain`,`id_talla`),
  ADD KEY `id_talla` (`id_talla`);

--
-- Indices de la tabla `talla_ps`
--
ALTER TABLE `talla_ps`
  ADD UNIQUE KEY `id_prendasu` (`id_prendasu`,`id_talla`),
  ADD KEY `id_prendasu_2` (`id_prendasu`,`id_talla`),
  ADD KEY `id_talla` (`id_talla`);

--
-- Indices de la tabla `tela`
--
ALTER TABLE `tela`
  ADD PRIMARY KEY (`id_tela`);

--
-- Indices de la tabla `tipo_pi`
--
ALTER TABLE `tipo_pi`
  ADD PRIMARY KEY (`id_tipoPI`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id_tipoprod`);

--
-- Indices de la tabla `tipo_ps`
--
ALTER TABLE `tipo_ps`
  ADD PRIMARY KEY (`id_tipoPS`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_pedidoU_venta` (`id_pedidoU`),
  ADD KEY `documento_cliente` (`documento_cliente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido_uniforme`
--
ALTER TABLE `pedido_uniforme`
  MODIFY `id_pedidoU` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
  
  
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prenda_inferior`
--
ALTER TABLE `prenda_inferior`
  MODIFY `id_prendain` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `prenda_superior`
--
ALTER TABLE `prenda_superior`
  MODIFY `id_prendasu` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--

ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido_uniforme`
--
ALTER TABLE `pedido_uniforme`
  ADD CONSTRAINT `pedido_uniforme_ibfk_1` FOREIGN KEY (`documento_cliente`) REFERENCES `cliente` (`documento_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prenda_inferior`
--
ALTER TABLE `prenda_inferior`
  ADD CONSTRAINT `prenda_inferior_ibfk_2` FOREIGN KEY (`id_tela`) REFERENCES `tela` (`id_tela`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_inferior_ibfk_3` FOREIGN KEY (`id_costados`) REFERENCES `costados` (`id_costados`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_inferior_ibfk_4` FOREIGN KEY (`id_tipoprod`) REFERENCES `tipo_producto` (`id_tipoprod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_inferior_ibfk_5` FOREIGN KEY (`id_protector`) REFERENCES `protector` (`id_protector`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_inferior_ibfk_6` FOREIGN KEY (`id_tipoPI`) REFERENCES `tipo_pi` (`id_tipoPI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_inferior_ibfk_7` FOREIGN KEY (`id_pedidoU`) REFERENCES `pedido_uniforme` (`id_pedidoU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prenda_superior`
--
ALTER TABLE `prenda_superior`
  ADD CONSTRAINT `prenda_superior_ibfk_10` FOREIGN KEY (`id_tipoPS`) REFERENCES `tipo_ps` (`id_tipoPS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_superior_ibfk_11` FOREIGN KEY (`id_pedidoU`) REFERENCES `pedido_uniforme` (`id_pedidoU`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_superior_ibfk_2` FOREIGN KEY (`id_tela`) REFERENCES `tela` (`id_tela`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_superior_ibfk_3` FOREIGN KEY (`id_costados`) REFERENCES `costados` (`id_costados`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_superior_ibfk_4` FOREIGN KEY (`id_tipoprod`) REFERENCES `tipo_producto` (`id_tipoprod`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_superior_ibfk_5` FOREIGN KEY (`id_manga`) REFERENCES `manga` (`id_manga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_superior_ibfk_6` FOREIGN KEY (`tela_manga`) REFERENCES `tela` (`id_tela`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_superior_ibfk_7` FOREIGN KEY (`id_cortemanga`) REFERENCES `corte_manga` (`id_cortemanga`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_superior_ibfk_8` FOREIGN KEY (`id_cuello`) REFERENCES `cuello` (`id_cuello`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prenda_superior_ibfk_9` FOREIGN KEY (`id_cierre`) REFERENCES `cierre` (`id_cierre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`

  ADD CONSTRAINT `seguimiento_ibfk_2` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seguimiento_ibfk_3` FOREIGN KEY (`id_pedidoU`) REFERENCES `pedido_uniforme` (`id_pedidoU`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `proceso`

  ADD CONSTRAINT `proceso_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `talla_pi`
--
ALTER TABLE `talla_pi`
  ADD CONSTRAINT `talla_pi_ibfk_1` FOREIGN KEY (`id_talla`) REFERENCES `talla` (`id_talla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `talla_pi_ibfk_2` FOREIGN KEY (`id_prendain`) REFERENCES `prenda_inferior` (`id_prendain`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `talla_ps`
--
ALTER TABLE `talla_ps`
  ADD CONSTRAINT `talla_ps_ibfk_1` FOREIGN KEY (`id_talla`) REFERENCES `talla` (`id_talla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `talla_ps_ibfk_2` FOREIGN KEY (`id_prendasu`) REFERENCES `prenda_superior` (`id_prendasu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_pedidoU`) REFERENCES `pedido_uniforme` (`id_pedidoU`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
