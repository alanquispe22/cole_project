-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2017 a las 03:24:21
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunicado`
--

CREATE TABLE `comunicado` (
  `ID_COMUNICADO` int(10) UNSIGNED NOT NULL,
  `FECHA` varchar(15) DEFAULT NULL,
  `MENSAJE` text,
  `ID_PROFESOR` int(10) UNSIGNED DEFAULT NULL,
  `ID_MATERIA` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comunicado`
--

INSERT INTO `comunicado` (`ID_COMUNICADO`, `FECHA`, `MENSAJE`, `ID_PROFESOR`, `ID_MATERIA`) VALUES
(1, '05-02-17', 'EL DIA DE HOY SE SUSPENDE LAS CLASES DE LA MATERIA POR MOTIVOS DEL PARO DE TRANSPORTE', 1, 1),
(2, '20-03-17', 'PREPAREN PARA MAÑANA SUS TRABAJOS O NO PODRAN ENTRAR AL EXAMEN', 1, 2),
(3, '25-02-2017', 'RECUERDEN TENER TODO SU MATERIAL AL DIA', 3, 4),
(4, '15-03-17', 'Hoy tenemos excursiones por favor no olvidar comunicar a sus padres', 6, 3),
(5, '20-03-17', 'MAÑANA DEBEN VENIR DEBIDAMENTE UNIFORMADOS PARA EL DESFILE', 4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `ID_MATERIA` int(10) UNSIGNED NOT NULL,
  `NOMBRE_MATERIA` varchar(20) NOT NULL,
  `GRADO_MATERIA` int(11) NOT NULL,
  `ID_PROFESOR` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ID_MATERIA`, `NOMBRE_MATERIA`, `GRADO_MATERIA`, `ID_PROFESOR`) VALUES
(1, 'MATEMAICAS', 1, 1),
(2, 'FISICA', 1, 1),
(3, 'LITERATURA', 1, 6),
(4, 'GEOGRAFIA', 1, 3),
(5, 'EDUCACIÓN FISICA', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre`
--

CREATE TABLE `padre` (
  `ID_PADRE` int(10) UNSIGNED NOT NULL,
  `NOMBRES` varchar(20) NOT NULL,
  `APELLIDOS` varchar(20) NOT NULL,
  `TELEFONO` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `padre`
--

INSERT INTO `padre` (`ID_PADRE`, `NOMBRES`, `APELLIDOS`, `TELEFONO`) VALUES
(1, 'ANTONIO ', 'MAMANI QUISPE', '7896543'),
(2, 'ALEJANDRO', 'BALTAZAR BAUTISTA', '2224654'),
(3, 'ARMANDO', 'GALINDO ', '24654654'),
(4, 'CARLOS', 'FERNANDEZ', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre_materia`
--

CREATE TABLE `padre_materia` (
  `ID_PADRE` int(10) UNSIGNED DEFAULT NULL,
  `ID_MATERIA` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `padre_materia`
--

INSERT INTO `padre_materia` (`ID_PADRE`, `ID_MATERIA`) VALUES
(1, 2),
(1, 3),
(2, 3),
(3, 5),
(4, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `ID_PROFESOR` int(10) UNSIGNED NOT NULL,
  `NOMBRES` varchar(20) NOT NULL,
  `APELLIDOS` varchar(20) NOT NULL,
  `TELEFONO` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`ID_PROFESOR`, `NOMBRES`, `APELLIDOS`, `TELEFONO`) VALUES
(1, 'ALAN NATALIO', 'QUISPE QUISPE', '78958663'),
(3, 'JUAN', 'MEDINA ORTIZ', '2222368'),
(4, 'MAURICIO', 'FERNANDEZ ', '76548641'),
(6, 'MARIA ALEJANDRA', 'REYES MIRANDA', '224565');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_pass`
--

CREATE TABLE `usuarios_pass` (
  `ID_LOGIN` int(11) NOT NULL,
  `USUARIOS` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `tipo` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_pass`
--

INSERT INTO `usuarios_pass` (`ID_LOGIN`, `USUARIOS`, `PASSWORD`, `tipo`) VALUES
(1, 'alan', '123', 'padre'),
(2, 'mauricio', '123', 'padre'),
(3, 'rodrigo', '123', 'profesor'),
(4, 'julio', '123', 'profesor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comunicado`
--
ALTER TABLE `comunicado`
  ADD PRIMARY KEY (`ID_COMUNICADO`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`ID_MATERIA`);

--
-- Indices de la tabla `padre`
--
ALTER TABLE `padre`
  ADD PRIMARY KEY (`ID_PADRE`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`ID_PROFESOR`);

--
-- Indices de la tabla `usuarios_pass`
--
ALTER TABLE `usuarios_pass`
  ADD PRIMARY KEY (`ID_LOGIN`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comunicado`
--
ALTER TABLE `comunicado`
  MODIFY `ID_COMUNICADO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `ID_MATERIA` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `padre`
--
ALTER TABLE `padre`
  MODIFY `ID_PADRE` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `ID_PROFESOR` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuarios_pass`
--
ALTER TABLE `usuarios_pass`
  MODIFY `ID_LOGIN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
