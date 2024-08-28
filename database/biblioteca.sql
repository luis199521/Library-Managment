-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-08-2024 a las 06:07:46
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `#mysql50#prestamo (2)`
--

CREATE TABLE `#mysql50#prestamo (2)` (
  `id_codigoeje` int(11) DEFAULT NULL,
  `fechaprestamo` datetime DEFAULT NULL,
  `fechadevolucion` datetime DEFAULT NULL,
  `id_cedula` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `#mysql50#prestamo (2)`
--

INSERT INTO `#mysql50#prestamo (2)` (`id_codigoeje`, `fechaprestamo`, `fechadevolucion`, `id_cedula`) VALUES
(400, '2019-08-08 00:00:00', '2019-08-22 00:00:00', 500),
(402, '2019-08-10 00:00:00', '2019-08-20 00:00:00', 501),
(48, '2019-08-12 00:00:00', '2019-08-20 00:00:00', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `#mysql50#users (2)`
--
-- Error leyendo la estructura de la tabla biblioteca.#mysql50#users (2): #1932 - Table &#039;biblioteca.#mysql50#users (2)&#039; doesn&#039;t exist in engine
-- Error leyendo datos de la tabla biblioteca.#mysql50#users (2): #1064 - Algo está equivocado en su sintax cerca &#039;FROM `biblioteca`.`#mysql50#users (2)`&#039; en la linea 1

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `#mysql50#usuario (2)`
--

CREATE TABLE `#mysql50#usuario (2)` (
  `cedula` int(15) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `apellido` char(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `#mysql50#usuario (2)`
--

INSERT INTO `#mysql50#usuario (2)` (`cedula`, `nombre`, `direccion`, `telefono`, `apellido`) VALUES
(500, 'Luis', 'Calle 23 #76-61', 3438209, 'Alvarez'),
(501, 'Daniela', 'Calle 25 #77-61', 5813802, 'Rodirguez'),
(502, 'Isabelle', 'Calle 27 #74-62', 12345687, 'Sanchez'),
(503, 'Jake', 'Calle 29 #12-61', 78945612, 'Bundrick'),
(504, 'Derek', 'Carrera 11 #8-21', 4213125, 'Sanders'),
(56767, 'fgdfdg', 'fgfdg', 45, 'fdgfdg'),
(114577854, 'sss', 'asas', 5855, 'ddd'),
(114577853, 'sss', 'asas', 5855, 'ddd'),
(121212, 'asasas', 'asasa', 22323, 'asas'),
(121212333, 'asasas', 'asasa', 22323, 'asas'),
(51892700, 'Madeleine', 'Calle 23 # 76-61', 314751444, 'Suarez'),
(74270013, 'Enrique', 'cocorna', 2147483647, 'Alvarez'),
(5896, 'ddd', 'ddd', 2147483647, 'ddd'),
(222222, 'aaaa', 'www', 123, 'sss'),
(556, 'asereje', 'eee', 344, 'yulay'),
(5898955, 'sdssd', 'sdsd', 5110055, 'sdsd'),
(11111, 'ass', 'asas', 2147483647, 'asas'),
(41444, 'sdsd', 'dsdsd', 3116266603, 'sdsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplar`
--

CREATE TABLE `ejemplar` (
  `codigoeje` int(11) NOT NULL,
  `localizacion` char(25) DEFAULT NULL,
  `codigolibro` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `ejemplar`
--

INSERT INTO `ejemplar` (`codigoeje`, `localizacion`, `codigolibro`) VALUES
(400, 'sdf758', 300),
(401, 'fvb897', 301),
(402, 'few751', 302),
(403, 'trw456', 303),
(404, 'ghj789', 304),
(405, 'hyt589', 305),
(406, 'kju458', 302),
(407, 'gth5897', 306),
(408, 'gth5897', 307),
(48, '5454', 0),
(4524, '4545', 4545),
(409, 'alla', 308);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `codigolibro` int(11) NOT NULL,
  `titulo` char(25) DEFAULT NULL,
  `isbn` char(25) DEFAULT NULL,
  `editorial` char(25) DEFAULT NULL,
  `numeropaginas` int(11) DEFAULT NULL,
  `autor` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`codigolibro`, `titulo`, `isbn`, `editorial`, `numeropaginas`, `autor`) VALUES
(300, 'Cien años de soledad', '45E-G25-N21', 'Oveja negra', 300, ' Gabriel garcia marquez'),
(301, 'Historias de un secuestro', '35A-J58-I89', 'La primera', 120, 'Isaber Allende'),
(302, 'Rayuela', '45E-G25-N21', 'La segunda', 300, 'Julio cortazar'),
(303, 'La casa de los espiritus', '7UP-T23-Q56', 'La tercera', 300, 'Isabel allende'),
(304, 'Poemas', '75E-G27-G21', 'La cuarta', 350, 'Mario Benedetti'),
(305, 'Logica programacion', 'G56-Y89-U89', 'La tercera', 100, 'Jairo ramirez'),
(306, 'Programacion web', '8UP-JK7-YU9', 'La quinta', 200, 'Victor robles'),
(307, 'El principito', '35B-J58-I88', 'ECO Ediciones', 98, ' Antoine de Saint-Exupéry'),
(308, 'El amor', '524542', '3', 25, 'yo'),
(50, 'yui8io', 'y8t7io', '879o8o', 45, ''),
(47, 'aaa', 'dfsdf', 'ssd', 34, 'sdsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id_codigoeje` int(11) DEFAULT NULL,
  `fechaprestamo` datetime DEFAULT NULL,
  `fechadevolucion` datetime DEFAULT NULL,
  `id_cedula` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`id_codigoeje`, `fechaprestamo`, `fechadevolucion`, `id_cedula`) VALUES
(400, '2019-08-08 00:00:00', '2019-08-22 00:00:00', 500),
(NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL),
(402, '2019-08-10 00:00:00', '2019-08-20 00:00:00', 501),
(48, '2019-08-12 00:00:00', '2019-08-20 00:00:00', 45);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(1, 'lucho1995', 'MEME123meme', 'lucho@gmail.com'),
(2, 'pepe', '$2y$10$uyX7Z7M9x9EkQS0KyGbuauWypvXTCA7LnLPb8Z6ceKNQMrkIbfxti', 'pepe@gmail.com'),
(3, 'pepe2', '$2y$10$2D6euYrFYm0Y3TT5ptzSKuRVjSjyZxIYiASsPIeWav2gq6z3hByTS', 'luis.21099592@gmail.com'),
(4, 'pepe3', '$2y$10$dGH3.uAiBfy8vfuDoIv5s.3okX7HI6TcpufWkKTuktoNeHeOAcZ2W', 'luis.210d99592@gmail.com'),
(5, 'pepe323', '$2y$10$iPBbPwSWT1BTFoKW1sV.r.HwiYrvI7eXmdJc.b.6yDHplWZu9BfVi', 'luis.210sssd99s592@gmail.com'),
(6, 'pepe323333222222', '$2y$10$52eXiH3q2c8nJywxAf.DLO3mCcAeYKmtGrcy/sosvLRF/XRwzXLJ2', 'luis.210sssd93339ws592@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `apellido` char(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula`, `nombre`, `direccion`, `telefono`, `apellido`) VALUES
(500, 'Luis', 'Calle 23 #76-61', 3438209, 'Alvarez'),
(501, 'Daniela', 'Calle 25 #77-61', 5813802, 'Rodirguez'),
(502, 'Isabelle', 'Calle 27 #74-62', 12345687, 'Sanchez'),
(503, 'Jake', 'Calle 29 #12-61', 78945612, 'Bundrick'),
(504, 'Derek', 'Carrera 11 #8-21', 4213125, 'Sanders'),
(56767, 'fgdfdg', 'fgfdg', 45, 'fdgfdg'),
(45, 'lucho ', 'fgvfv', 454, 'herrera');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `#mysql50#prestamo (2)`
--
ALTER TABLE `#mysql50#prestamo (2)`
  ADD KEY `id_codigoeje` (`id_codigoeje`),
  ADD KEY `id_cedula` (`id_cedula`);

--
-- Indices de la tabla `#mysql50#usuario (2)`
--
ALTER TABLE `#mysql50#usuario (2)`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `ejemplar`
--
ALTER TABLE `ejemplar`
  ADD PRIMARY KEY (`codigoeje`),
  ADD KEY `codigolibro` (`codigolibro`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`codigolibro`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD KEY `id_codigoeje` (`id_codigoeje`),
  ADD KEY `id_cedula` (`id_cedula`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
