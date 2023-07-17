-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2023 a las 01:18:31
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `anime_rocket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listas`
--

CREATE TABLE `listas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `sipnosis` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `capitulos` varchar(255) NOT NULL,
  `fecha_insercion` date NOT NULL,
  `votos` decimal(2,1) NOT NULL,
  `anio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `l_tipo` float NOT NULL,
  `l_categoria` float NOT NULL,
  `l_status` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `listas`
--

INSERT INTO `listas` (`id`, `titulo`, `sipnosis`, `thumbnail`, `capitulos`, `fecha_insercion`, `votos`, `anio`, `l_tipo`, `l_categoria`, `l_status`) VALUES
(1, 'Demons Slayer', 'asdasdasd', 'https://picsum.photos/300/200', '1', '2023-02-02', '4.9', '2023-07-17 23:03:05', 0, 0, 0),
(2, 'clashhure', 'adsadsa', 'https://picsum.photos/300/200', '1', '2023-02-02', '4.9', '2023-07-17 23:02:36', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_rol`
--

CREATE TABLE `rel_rol` (
  `id` int(11) NOT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rel_rol`
--

INSERT INTO `rel_rol` (`id`, `rol`) VALUES
(0, 'usuario'),
(1, 'admin'),
(2, 'lector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_status`
--

CREATE TABLE `rel_status` (
  `id` int(11) NOT NULL,
  `status` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rel_status`
--

INSERT INTO `rel_status` (`id`, `status`) VALUES
(0, 'desactivado'),
(1, 'activado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rvt_tipo`
--

CREATE TABLE `rvt_tipo` (
  `rvt_id` int(11) NOT NULL,
  `rvt_nombre` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rvt_tipo`
--

INSERT INTO `rvt_tipo` (`rvt_id`, `rvt_nombre`) VALUES
(1, 'anime'),
(2, 'ova'),
(3, 'pelicula'),
(4, 'especial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rv_categoria`
--

CREATE TABLE `rv_categoria` (
  `id` int(11) NOT NULL,
  `categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rv_categoria`
--

INSERT INTO `rv_categoria` (`id`, `categoria`) VALUES
(1, 'accion'),
(2, 'romance'),
(3, 'suspenso'),
(4, 'seinin'),
(5, 'gore'),
(6, 'echi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rv_status`
--

CREATE TABLE `rv_status` (
  `rv_id` int(11) NOT NULL,
  `rv_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rv_status`
--

INSERT INTO `rv_status` (`rv_id`, `rv_status`) VALUES
(0, 'capitulo nuevo'),
(5, 'anime temporada'),
(6, 'anime estreno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `correo` varchar(255) NOT NULL DEFAULT '',
  `passwords` varchar(50) NOT NULL,
  `rol` float NOT NULL,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `passwords`, `rol`, `nombre`, `status`) VALUES
(40, 'andrikadrian@outlook.com', '123123', 1, 'lolito', 1),
(48, 'andrikadrian@outlook.hh', '123123', 0, 'lollo', 1),
(49, 'hola@hola.mx', 'hola2', 1, 'zzzz', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `capitulo` varchar(55) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `categoria` varchar(11) NOT NULL,
  `anime` int(4) NOT NULL,
  `fecha_insercion` date NOT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `orden` int(4) NOT NULL,
  `v_status` decimal(5,0) NOT NULL,
  `tipo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `videos`
--

INSERT INTO `videos` (`id`, `capitulo`, `thumbnail`, `archivo`, `categoria`, `anime`, `fecha_insercion`, `fecha_publicacion`, `orden`, `v_status`, `tipo`) VALUES
(1, 'Mushaku tensei', 'https://picsum.photos/300/200', 'https://picsum.photos/300/200', '1', 1, '2023-05-10', '2023-06-11 23:56:48', 377, '0', 0),
(2, 'Akame ga kill', 'https://picsum.photos/300/200', 'https://picsum.photos/300/200', '2', 1, '2022-11-24', '2023-06-11 23:57:16', 24, '0', 0),
(3, 'shingeki no kyojin', 'https://picsum.photos/300/200', 'https://picsum.photos/300/200', '4', 1, '2023-04-13', '2023-06-11 23:58:20', 1, '0', 0),
(4, 'muramasa', 'https://picsum.photos/300/200', 'https://picsum.photos/300/200', '2', 1, '2023-04-04', '2023-06-11 23:58:32', 3, '0', 0),
(5, 'One-punch man', 'https://picsum.photos/300/200', 'https://picsum.photos/300/200', '4', 1, '2023-06-01', '2023-06-11 23:59:52', 10, '0', 0),
(6, 'boku no hero academia', 'https://picsum.photos/300/200', 'https://picsum.photos/300/200', '3', 1, '2023-05-23', '2023-06-11 23:58:49', 13, '0', 0),
(7, 'solo leveling', 'https://picsum.photos/300/200', 'https://picsum.photos/300/200', '3', 1, '2023-01-24', '2023-06-11 23:59:05', 2, '0', 0),
(8, 'Jujutsu kaisen', 'https://picsum.photos/300/200', 'https://picsum.photos/300/200', '3', 1, '2023-04-20', '2023-06-11 23:59:24', 7, '0', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rel_rol`
--
ALTER TABLE `rel_rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rel_status`
--
ALTER TABLE `rel_status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rvt_tipo`
--
ALTER TABLE `rvt_tipo`
  ADD PRIMARY KEY (`rvt_id`);

--
-- Indices de la tabla `rv_categoria`
--
ALTER TABLE `rv_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rv_status`
--
ALTER TABLE `rv_status`
  ADD PRIMARY KEY (`rv_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indices de la tabla `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rel_rol`
--
ALTER TABLE `rel_rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rvt_tipo`
--
ALTER TABLE `rvt_tipo`
  MODIFY `rvt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rv_categoria`
--
ALTER TABLE `rv_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rv_status`
--
ALTER TABLE `rv_status`
  MODIFY `rv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
