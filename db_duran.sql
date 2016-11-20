-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2016 a las 18:32:16
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_duran`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `afiliacion`
--

CREATE TABLE `afiliacion` (
  `id` int(11) NOT NULL,
  `placa` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `afiliacion`
--

INSERT INTO `afiliacion` (`id`, `placa`, `fecha`) VALUES
(13, 'MLU144', '20/11/2016');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arreglo`
--

CREATE TABLE `arreglo` (
  `id` int(11) NOT NULL,
  `fecha` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `valor` bigint(20) NOT NULL,
  `fo` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_partes_afiliacion`
--

CREATE TABLE `detalle_partes_afiliacion` (
  `id_afiliacion` int(11) NOT NULL,
  `id_partes` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_partes_afiliacion`
--

INSERT INTO `detalle_partes_afiliacion` (`id_afiliacion`, `id_partes`, `descripcion`) VALUES
(13, 1, 'presenta rayones en la parte de abajo'),
(13, 2, 'se encuetran quebradas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_siniestro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `involucrados`
--

CREATE TABLE `involucrados` (
  `identificacion` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_completo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `placa` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `descripcion`) VALUES
(1, 'Chevrolet'),
(2, 'Renault'),
(3, 'Suzuki'),
(4, 'Kia'),
(5, 'Nissan'),
(6, 'Mazda'),
(7, 'Hyundai'),
(8, 'Ford'),
(9, 'Toyota'),
(10, 'Volkswagen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `monto` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `vehiculo` varchar(6) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partes`
--

CREATE TABLE `partes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `partes`
--

INSERT INTO `partes` (`id`, `nombre`) VALUES
(1, 'Puerta trasera izquierda'),
(2, 'Luces frontales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peritos`
--

CREATE TABLE `peritos` (
  `identificacion` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_completo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `siniestro`
--

CREATE TABLE `siniestro` (
  `id` int(11) NOT NULL,
  `fecha` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `cuidad` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `vehiculo` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `conductor` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `hora` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `img_estado` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_involucrados` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `id_perito` varchar(15) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `identificacion` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`identificacion`, `nombre_completo`, `telefono`, `direccion`) VALUES
('1116789304', 'Jefferson Bahamon Cuevas', '3125271579', 'calle 13 # 0 -31 motilones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `placa` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `marca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`placa`, `modelo`, `marca`) VALUES
('MLU144', '2013', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `afiliacion`
--
ALTER TABLE `afiliacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `placa` (`placa`);

--
-- Indices de la tabla `arreglo`
--
ALTER TABLE `arreglo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_partes_afiliacion`
--
ALTER TABLE `detalle_partes_afiliacion`
  ADD PRIMARY KEY (`id_afiliacion`,`id_partes`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_siniestro` (`id_siniestro`);

--
-- Indices de la tabla `involucrados`
--
ALTER TABLE `involucrados`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiculo` (`vehiculo`);

--
-- Indices de la tabla `partes`
--
ALTER TABLE `partes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peritos`
--
ALTER TABLE `peritos`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `siniestro`
--
ALTER TABLE `siniestro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehiculo` (`vehiculo`),
  ADD KEY `id_perito` (`id_perito`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`identificacion`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`placa`),
  ADD KEY `marca` (`marca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `afiliacion`
--
ALTER TABLE `afiliacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `arreglo`
--
ALTER TABLE `arreglo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `partes`
--
ALTER TABLE `partes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `siniestro`
--
ALTER TABLE `siniestro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
