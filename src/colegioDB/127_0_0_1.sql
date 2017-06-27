-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2017 a las 00:49:23
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
CREATE DATABASE IF NOT EXISTS `colegio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `colegio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `ID_ARCHIVO` int(10) UNSIGNED NOT NULL,
  `NOMBRE_ARCHIVO` varchar(20) DEFAULT NULL,
  `CI_PROFESOR` int(10) UNSIGNED NOT NULL,
  `ID_MATERIA` int(10) UNSIGNED NOT NULL,
  `COMENTARIO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`ID_ARCHIVO`, `NOMBRE_ARCHIVO`, `CI_PROFESOR`, `ID_MATERIA`, `COMENTARIO`) VALUES
(1, 'codigo.asm', 3214989, 7, 'por favor leerlo'),
(2, 'application.ini', 3214989, 8, 'mi aplication'),
(3, 'locale.jar', 3214989, 8, 'Muy bueno'),
(4, 'skin.jar', 3214989, 8, 'dfdg'),
(5, 'skin.jar', 3214989, 8, 'dfdg'),
(6, 'chrome.manifest', 3214989, 8, 'fgh'),
(7, 'chrome.manifest', 3214989, 8, 'fgh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunicado`
--

CREATE TABLE `comunicado` (
  `ID_COMUNICADO` int(10) UNSIGNED NOT NULL,
  `FECHA` varchar(15) DEFAULT NULL,
  `MENSAJE` text,
  `CI_PROFESOR` int(10) UNSIGNED NOT NULL,
  `ID_MATERIA` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comunicado`
--

INSERT INTO `comunicado` (`ID_COMUNICADO`, `FECHA`, `MENSAJE`, `CI_PROFESOR`, `ID_MATERIA`) VALUES
(46, 'una fecha ficti', 'A los alumnos de matematicas 1 les ruego estudiar pa mañana', 3214989, 7),
(47, 'una fecha ficti', 'mañana traerse cortos', 3214989, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `ID_GRADO` int(10) UNSIGNED NOT NULL,
  `GRADO` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`ID_GRADO`, `GRADO`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `ID_MATERIA` int(10) UNSIGNED NOT NULL,
  `NOMBRE_MATERIA` varchar(20) NOT NULL,
  `ID_GRADO` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ID_MATERIA`, `NOMBRE_MATERIA`, `ID_GRADO`) VALUES
(6, 'fisica', 1),
(7, 'matematicas', 1),
(8, 'biologia', 1),
(9, 'sociales', 1),
(10, 'quimica', 1),
(11, 'educación fisica', 1),
(12, 'matematicas', 2),
(13, 'fisica', 2),
(14, 'sociales', 2),
(15, 'biologia', 2),
(16, 'quimica', 2),
(17, 'educación fisica', 2),
(19, 'fisica', 3),
(20, 'matematicas', 3),
(21, 'biología', 3),
(22, 'sociales', 3),
(23, 'quimica', 3),
(24, 'educación fisica', 3),
(25, 'fisica', 4),
(26, 'matematicas', 4),
(27, 'biologia', 4),
(28, 'sociales', 4),
(29, 'educacion fisica', 4),
(30, 'quimica', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padre`
--

CREATE TABLE `padre` (
  `CI_PADRE` int(10) UNSIGNED NOT NULL,
  `NOMBRES` varchar(20) NOT NULL,
  `APELLIDOS` varchar(20) NOT NULL,
  `TELEFONO` varchar(15) DEFAULT NULL,
  `CORREO` varchar(40) DEFAULT NULL,
  `FOTO_PATH` varchar(40) DEFAULT NULL,
  `ID_GRADO` int(10) UNSIGNED NOT NULL,
  `USUARIO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `padre`
--

INSERT INTO `padre` (`CI_PADRE`, `NOMBRES`, `APELLIDOS`, `TELEFONO`, `CORREO`, `FOTO_PATH`, `ID_GRADO`, `USUARIO`) VALUES
(987546, 'Ariel', 'Lopez', '72479749', 'ariel_ariel@hotmail.com', 'puma.jpg', 6, 'ariel'),
(9874552, 'Mario', 'Mamani Ortiz', '78555422', NULL, 'mario.jpg', 3, 'mario'),
(9875467, 'Marcela', 'Quispe', '24654987', 'marcel@hotmail.com', 'marcela.png', 2, 'marcia'),
(9994362, 'alan natalio', 'quispe quispe', '78958663', 'alanquispe23@gmail.com', 'alan.png', 1, 'daniel'),
(9996552, 'Carlos', 'Dominguez', '78456491', NULL, 'perrito.jpg', 4, 'carlos'),
(76579456, 'Ulises', 'Mendoza', '2465798', '', 'ulises.png', 3, 'uli');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `CI_PROFESOR` int(10) UNSIGNED NOT NULL,
  `NOMBRES` varchar(20) NOT NULL,
  `APELLIDOS` varchar(20) NOT NULL,
  `TELEFONO` varchar(15) DEFAULT NULL,
  `CORREO` varchar(40) DEFAULT NULL,
  `FOTO_PATH` varchar(40) DEFAULT NULL,
  `USUARIO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`CI_PROFESOR`, `NOMBRES`, `APELLIDOS`, `TELEFONO`, `CORREO`, `FOTO_PATH`, `USUARIO`) VALUES
(3214989, 'Juan Maria', 'Mamani Monasterios', NULL, NULL, 'maria.png', 'juani'),
(6454132, 'Mario', 'Mollinedo', NULL, NULL, NULL, 'mario'),
(7435411, 'Pedro Ivan', 'Torrez', '245654', NULL, NULL, 'pedro'),
(7895416, 'Jaime ', 'Gutierrez', '78454123', 'jaime@gmail.com', 'jaime.png', 'jaime'),
(9546425, 'Juan Fernando', 'Gutierrez Saavedra', '2225648', NULL, 'franz.png', 'fernando'),
(54321459, 'Milton', 'Felix', '75478455', NULL, NULL, 'yan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_materia`
--

CREATE TABLE `profesor_materia` (
  `CI_PROFESOR` int(10) UNSIGNED NOT NULL,
  `ID_MATERIA` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesor_materia`
--

INSERT INTO `profesor_materia` (`CI_PROFESOR`, `ID_MATERIA`) VALUES
(3214989, 7),
(3214989, 11),
(3214989, 14),
(6454132, 17),
(6454132, 25),
(7435411, 16),
(7435411, 21),
(7895416, 19),
(7895416, 20),
(9546425, 15),
(9546425, 30),
(54321459, 25),
(54321459, 28),
(54321459, 29);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `USUARIO` varchar(20) NOT NULL,
  `PASSWORD` varchar(20) NOT NULL,
  `TIPO` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`USUARIO`, `PASSWORD`, `TIPO`) VALUES
('admi', 'rtu', 'profesor'),
('ariel', '123456', 'padre'),
('carlos', '987654', 'padre'),
('daniel', 'oso123', 'padre'),
('fernando', 'fercho', 'profesor'),
('jaime', 'show', 'profesor'),
('juani', 'juani', 'profesor'),
('marcia', 'oso123', 'padre'),
('mario', '159', 'padre'),
('pedro', 'pedro', 'profesor'),
('uli', 'navidadtriste', 'padre'),
('yan', 'ian', 'profesor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`ID_ARCHIVO`),
  ADD KEY `CI_PROFESOR` (`CI_PROFESOR`,`ID_MATERIA`),
  ADD KEY `ID_MATERIA` (`ID_MATERIA`);

--
-- Indices de la tabla `comunicado`
--
ALTER TABLE `comunicado`
  ADD PRIMARY KEY (`ID_COMUNICADO`),
  ADD KEY `CI_PROFESOR` (`CI_PROFESOR`,`ID_MATERIA`),
  ADD KEY `ID_MATERIA` (`ID_MATERIA`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`ID_GRADO`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`ID_MATERIA`),
  ADD KEY `GRADO` (`ID_GRADO`);

--
-- Indices de la tabla `padre`
--
ALTER TABLE `padre`
  ADD PRIMARY KEY (`CI_PADRE`),
  ADD KEY `USUARIO` (`USUARIO`),
  ADD KEY `GRADO` (`ID_GRADO`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`CI_PROFESOR`),
  ADD KEY `USUARIO` (`USUARIO`);

--
-- Indices de la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD KEY `CI_PROFESOR` (`CI_PROFESOR`,`ID_MATERIA`),
  ADD KEY `ID_MATERIA` (`ID_MATERIA`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `ID_ARCHIVO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `comunicado`
--
ALTER TABLE `comunicado`
  MODIFY `ID_COMUNICADO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `ID_GRADO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `ID_MATERIA` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `archivo_ibfk_1` FOREIGN KEY (`CI_PROFESOR`) REFERENCES `profesor` (`CI_PROFESOR`) ON UPDATE CASCADE,
  ADD CONSTRAINT `archivo_ibfk_2` FOREIGN KEY (`ID_MATERIA`) REFERENCES `materia` (`ID_MATERIA`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `comunicado`
--
ALTER TABLE `comunicado`
  ADD CONSTRAINT `comunicado_ibfk_1` FOREIGN KEY (`CI_PROFESOR`) REFERENCES `profesor` (`CI_PROFESOR`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comunicado_ibfk_2` FOREIGN KEY (`ID_MATERIA`) REFERENCES `materia` (`ID_MATERIA`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`ID_GRADO`) REFERENCES `grado` (`ID_GRADO`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `padre`
--
ALTER TABLE `padre`
  ADD CONSTRAINT `padre_ibfk_1` FOREIGN KEY (`USUARIO`) REFERENCES `usuario` (`USUARIO`) ON UPDATE CASCADE,
  ADD CONSTRAINT `padre_ibfk_2` FOREIGN KEY (`ID_GRADO`) REFERENCES `grado` (`ID_GRADO`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`USUARIO`) REFERENCES `usuario` (`USUARIO`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesor_materia`
--
ALTER TABLE `profesor_materia`
  ADD CONSTRAINT `profesor_materia_ibfk_1` FOREIGN KEY (`CI_PROFESOR`) REFERENCES `profesor` (`CI_PROFESOR`) ON UPDATE CASCADE,
  ADD CONSTRAINT `profesor_materia_ibfk_2` FOREIGN KEY (`ID_MATERIA`) REFERENCES `materia` (`ID_MATERIA`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
