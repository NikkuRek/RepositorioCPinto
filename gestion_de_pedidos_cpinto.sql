-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2024 a las 04:43:37
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cierre`
--

INSERT INTO `cierre` (`id_cierre`, `tipo_cierre`) VALUES
('1', 'largo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `documento_cliente` varchar(9) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`documento_cliente`, `nombre`, `direccion`, `telefono`) VALUES
('26737737', 'Ellyhan Rodriguez', 'mi casa en el este, mi corazon bajo un puente', '04245014391'),
('5609825', 'Jose Rodriguez', 'en mi casa, se los juro', '04128329472');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `corte_manga`
--

CREATE TABLE `corte_manga` (
  `id_cortemanga` varchar(3) NOT NULL,
  `tipo_cortemanga` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `corte_manga`
--

INSERT INTO `corte_manga` (`id_cortemanga`, `tipo_cortemanga`) VALUES
('1', 'corto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costados`
--

CREATE TABLE `costados` (
  `id_costados` varchar(3) NOT NULL,
  `tipo_costados` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `costados`
--

INSERT INTO `costados` (`id_costados`, `tipo_costados`) VALUES
('1', 'con costado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuello`
--

CREATE TABLE `cuello` (
  `id_cuello` varchar(3) NOT NULL,
  `tipo_cuello` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuello`
--

INSERT INTO `cuello` (`id_cuello`, `tipo_cuello`) VALUES
('1', 'En V');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` varchar(1) NOT NULL,
  `id_usuario` varchar(10) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `id_usuario`, `nombre`, `descripcion`) VALUES
('1', '001', 'Ventas', 'este departamente gestiona el inicio de los pedidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manga`
--

CREATE TABLE `manga` (
  `id_manga` varchar(3) NOT NULL,
  `tipo_manga` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `manga`
--

INSERT INTO `manga` (`id_manga`, `tipo_manga`) VALUES
('1', 'corta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_uniforme`
--

CREATE TABLE `pedido_uniforme` (
  `id_pedidoU` int(10) NOT NULL,
  `documento_cliente` varchar(10) DEFAULT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `img_producto` varchar(10) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  `observacion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido_uniforme`
--

INSERT INTO `pedido_uniforme` (`id_pedidoU`, `documento_cliente`, `nombre`, `precio`, `img_producto`, `fecha_inicio`, `fecha_final`, `observacion`) VALUES
(1, '26737737', 'Ellyhan Rodriguez', '5000.00', NULL, '2024-07-15 06:51:15', '2024-07-25', 'jamon y queso, un cachito, malta, unos zapatos talla 34, dos granos de cacao y pimienta hervida'),
(2, '5609825', 'Jose Rodriguez', '503.00', NULL, '2024-07-15 21:28:41', '2024-07-22', 'imagenes alusivas a Dali');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prenda_inferior`
--

CREATE TABLE `prenda_inferior` (
  `id_prendain` varchar(3) NOT NULL,
  `id_pedidoU` int(10) DEFAULT NULL,
  `id_tela` varchar(3) DEFAULT NULL,
  `id_costados` varchar(3) DEFAULT NULL,
  `id_tipoprod` varchar(3) DEFAULT NULL,
  `id_protector` varchar(3) DEFAULT NULL,
  `id_tipoPI` varchar(3) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `tapa_trasera` tinyint(1) DEFAULT NULL,
  `tirante` tinyint(1) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prenda_superior`
--

CREATE TABLE `prenda_superior` (
  `id_prendasu` varchar(3) NOT NULL,
  `id_pedidoU` int(10) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `id_proceso` varchar(1) NOT NULL,
  `id_departamento` varchar(1) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `posicion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `protector`
--

CREATE TABLE `protector` (
  `id_protector` varchar(3) NOT NULL,
  `tipo_protector` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `protector`
--

INSERT INTO `protector` (`id_protector`, `tipo_protector`) VALUES
('1', 'protector  1'),
('2', 'protector 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `id_seguimiento` varchar(3) NOT NULL,
  `id_departamento` varchar(10) DEFAULT NULL,
  `id_proceso` varchar(10) DEFAULT NULL,
  `id_pedidoU` int(10) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla`
--

CREATE TABLE `talla` (
  `id_talla` varchar(3) NOT NULL,
  `talla` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `talla`
--

INSERT INTO `talla` (`id_talla`, `talla`) VALUES
('1', 'XS'),
('2', 'S'),
('3', 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla_pi`
--

CREATE TABLE `talla_pi` (
  `id_prendain` varchar(3) NOT NULL,
  `id_talla` varchar(3) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `genero_tallaPI` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talla_ps`
--

CREATE TABLE `talla_ps` (
  `id_prendasu` varchar(3) NOT NULL,
  `id_talla` varchar(3) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `genero_tallaPS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tela`
--

CREATE TABLE `tela` (
  `id_tela` varchar(3) NOT NULL,
  `tipo_tela` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tela`
--

INSERT INTO `tela` (`id_tela`, `tipo_tela`) VALUES
('1', 'Capriati'),
('2', 'Microfibra'),
('3', 'Rayada'),
('4', 'Nueva xd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pi`
--

CREATE TABLE `tipo_pi` (
  `id_tipoPI` varchar(3) NOT NULL,
  `nombre_tipoPI` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_pi`
--

INSERT INTO `tipo_pi` (`id_tipoPI`, `nombre_tipoPI`) VALUES
('1', 'pro'),
('2', 'clasico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE `tipo_producto` (
  `id_tipoprod` varchar(3) NOT NULL,
  `nombre_tipoprod` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_ps`
--

CREATE TABLE `tipo_ps` (
  `id_tipoPS` varchar(3) NOT NULL,
  `nombre_tipoPS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` varchar(15) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `contraseña` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `rol` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `contraseña`, `nombre`, `rol`) VALUES
('001', 'damianjrm', '0000', 'Ellyhan Rodriguez', '1'),
('002', 'jhei', '1234', 'Jheilyn Ramirez', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(10) NOT NULL,
  `id_pedidoU` int(10) DEFAULT NULL,
  `documento_cliente` varchar(9) DEFAULT NULL,
  `cantidad_prendas` int(11) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL,
  `descripcion` varchar(200) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `fecha_venta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_venta`, `id_pedidoU`, `documento_cliente`, `cantidad_prendas`, `precio_unitario`, `descripcion`, `descuento`, `fecha_venta`) VALUES
(1, 1, '26737737', 15, '23.00', 'quiso pedir sin pagar pero ya se lo acomode en las costillas', 100, '2024-07-15'),
(2, 2, '5609825', 5, '10.00', 'al fin', 10, '2024-02-11');

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
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `id_usuario` (`id_usuario`);

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
  ADD KEY `id_tela` (`id_tela`),
  ADD KEY `id_costados` (`id_costados`),
  ADD KEY `id_tipoprod` (`id_tipoprod`),
  ADD KEY `id_protector` (`id_protector`),
  ADD KEY `id_tipoPI` (`id_tipoPI`),
  ADD KEY `id_pedidoU` (`id_pedidoU`);

--
-- Indices de la tabla `prenda_superior`
--
ALTER TABLE `prenda_superior`
  ADD PRIMARY KEY (`id_prendasu`),
  ADD KEY `id_tela` (`id_tela`),
  ADD KEY `id_costados` (`id_costados`),
  ADD KEY `id_tipoprod` (`id_tipoprod`),
  ADD KEY `id_manga` (`id_manga`),
  ADD KEY `tela_manga` (`tela_manga`),
  ADD KEY `id_cortemanga` (`id_cortemanga`),
  ADD KEY `id_cuello` (`id_cuello`),
  ADD KEY `id_cierre` (`id_cierre`),
  ADD KEY `id_tipoPS` (`id_tipoPS`),
  ADD KEY `id_pedidoU` (`id_pedidoU`);

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
  ADD KEY `id_pedidoU` (`id_pedidoU`);

--
-- Indices de la tabla `talla`
--
ALTER TABLE `talla`
  ADD PRIMARY KEY (`id_talla`);

--
-- Indices de la tabla `talla_pi`
--
ALTER TABLE `talla_pi`
  ADD PRIMARY KEY (`id_prendain`,`id_talla`),
  ADD KEY `id_talla` (`id_talla`);

--
-- Indices de la tabla `talla_ps`
--
ALTER TABLE `talla_ps`
  ADD PRIMARY KEY (`id_prendasu`,`id_talla`),
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
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_pedidoU` (`id_pedidoU`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido_uniforme`
--
ALTER TABLE `pedido_uniforme`
  MODIFY `id_pedidoU` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Filtros para la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD CONSTRAINT `proceso_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `seguimiento_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `proceso` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seguimiento_ibfk_2` FOREIGN KEY (`id_proceso`) REFERENCES `proceso` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seguimiento_ibfk_3` FOREIGN KEY (`id_pedidoU`) REFERENCES `pedido_uniforme` (`id_pedidoU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `talla_pi`
--
ALTER TABLE `talla_pi`
  ADD CONSTRAINT `talla_pi_ibfk_1` FOREIGN KEY (`id_prendain`) REFERENCES `prenda_inferior` (`id_prendain`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `talla_pi_ibfk_2` FOREIGN KEY (`id_talla`) REFERENCES `talla` (`id_talla`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `talla_ps`
--
ALTER TABLE `talla_ps`
  ADD CONSTRAINT `talla_ps_ibfk_1` FOREIGN KEY (`id_prendasu`) REFERENCES `prenda_superior` (`id_prendasu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `talla_ps_ibfk_2` FOREIGN KEY (`id_talla`) REFERENCES `talla` (`id_talla`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_pedidoU`) REFERENCES `pedido_uniforme` (`id_pedidoU`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
