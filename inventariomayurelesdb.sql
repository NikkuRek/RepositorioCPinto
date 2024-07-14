-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2024 a las 09:20:07
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
-- Base de datos: `inventariomayurelesdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(20) NOT NULL,
  `cedula_c` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombre_c` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_c` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono_c` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccion_C` text COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `cedula_c`, `nombre_c`, `apellido_c`, `telefono_c`, `direccion_C`) VALUES
(1, '26737737', 'Ellyhan', 'Rodriguez', '04245014391', 'sisisisisisisisisisi'),
(2, '26737737', 'Ellyhan', 'Rodriguez', '04245014391', 'sisisisisisisisisisi'),
(3, '5609825', 'Jose', 'Rodriguez', '04128329472', 'a'),
(4, '4623898', 'Manuel', 'Peraza', '04125692326', 'Urb. residencias del este');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrada`
--

CREATE TABLE `entrada` (
  `codigo_entrada` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_entrada` int(11) NOT NULL,
  `fecha_entrada` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `entrada`
--

INSERT INTO `entrada` (`codigo_entrada`, `id_producto`, `cantidad_entrada`, `fecha_entrada`) VALUES
(4, 0, 0, '2024-04-10 04:04:08'),
(6, 0, 4, '2024-04-10 04:47:15'),
(9, 0, 0, '2024-04-10 04:51:26'),
(11, 44270, 100, '2024-04-10 05:18:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(20) NOT NULL,
  `id_proveedor` int(20) NOT NULL,
  `nombre_prod` varchar(30) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `precio` decimal(5,2) NOT NULL,
  `cantidad_disp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `id_proveedor`, `nombre_prod`, `descripcion`, `precio`, `cantidad_disp`) VALUES
(2, 2, 'lapiz kores', 'Lapices de grafito por unidad', '1.55', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(20) NOT NULL,
  `nombre_p` varchar(30) NOT NULL,
  `direccion_p` varchar(60) NOT NULL,
  `telefono_p` varchar(15) NOT NULL,
  `correo_p` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre_p`, `direccion_p`, `telefono_p`, `correo_p`) VALUES
(1, 'Mongol c.a', 'Calle 1 con carrera 2 Barquisimeto. Lara', '02514859266', 'mongol@gmail.com'),
(2, 'Kores c.a', 'Calle 4 con carrera 5 Barquisimeto. Lara', '02514888266', 'kores@gmail.com'),
(3, 'Distribuidora estudios c.a.', 'calle 1 con 3', '0252889663', 'distribuidoraestudios@gmail.com'),
(5, 'Sharpie c.a.', 'calle 1 con 4 con 2', '02528896569', 'sharpie@gmail.com'),
(6, 'Turquoise C.A', 'Barquisimeto - Lara', '02513952648', 'Turquoise@outlook.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salida`
--

CREATE TABLE `salida` (
  `codigo_salida` int(20) NOT NULL,
  `id_cliente` int(20) NOT NULL,
  `id_producto` int(20) NOT NULL,
  `id_usuario` int(2) NOT NULL,
  `cant_salida` int(11) NOT NULL,
  `fecha_salida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `salida`
--

INSERT INTO `salida` (`codigo_salida`, `id_cliente`, `id_producto`, `id_usuario`, `cant_salida`, `fecha_salida`) VALUES
(1, 3, 44258, 1, 1, '2024-04-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariot`
--

CREATE TABLE `usuariot` (
  `id_usuario` int(2) NOT NULL,
  `usuario` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo_u` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuariot`
--

INSERT INTO `usuariot` (`id_usuario`, `usuario`, `clave`, `correo_u`) VALUES
(1, 'admin', '1234', 'admin@gmail.com'),
(2, 'normal', '1234', 'normal@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`codigo_entrada`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `salida`
--
ALTER TABLE `salida`
  ADD PRIMARY KEY (`codigo_salida`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuariot`
--
ALTER TABLE `usuariot`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `entrada`
--
ALTER TABLE `entrada`
  MODIFY `codigo_entrada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `salida`
--
ALTER TABLE `salida`
  MODIFY `codigo_salida` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuariot`
--
ALTER TABLE `usuariot`
  MODIFY `id_usuario` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
