-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2023 a las 01:03:36
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2023 a las 01:03:36
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `listas`
--
ALTER TABLE `listas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `listas`
--
ALTER TABLE `listas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
