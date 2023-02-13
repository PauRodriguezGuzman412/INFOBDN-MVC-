-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2023 a las 20:32:40
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infobdn`
--
CREATE DATABASE IF NOT EXISTS `infobdn` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `infobdn`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `DNI` varchar(9) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`DNI`, `Password`) VALUES
('49988375R', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `Email` varchar(50) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `Nom` text NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Cognoms` text NOT NULL,
  `Edat` int(11) NOT NULL,
  `Foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`Email`, `DNI`, `Nom`, `Password`, `Cognoms`, `Edat`, `Foto`) VALUES
('1@gmail.com', '1uwu', 'Hholli', 'c4ca4238a0b923820dcc509a6f75849b', 'Juan', 69, 'imgAlumnos/1-original.jpg'),
('demahez@mailinator.com', 'Cumque Na', 'Sint duis provident', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Cum consequatur Exp', 0, 'imgAlumnos/Cumque Nam sed irure-Fmt_0FHXEAA2Gwm.jpg'),
('hexi@mailinator.com', 'Quisquam ', 'Fugiat nostrum quide', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Et aperiam sed dolor', 0, 'imgAlumnos/Quisquam odit qui qu-ArtPierrot_20230107__1611531729503936513_1_1611531728002191360.jpg'),
('kokyq@mailinator.com', 'Mollit pr', 'Non maxime excepturi', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'Non commodo inventor', 0, 'imgAlumnos/Mollit provident id-image.png'),
('test@gmail.com', '123', 'pau', '098f6bcd4621d373cade4e832627b4f6', 'rodriguez', 19, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `Codi` int(11) NOT NULL,
  `Nom` text NOT NULL,
  `Descripcion` text NOT NULL,
  `Hores` int(11) NOT NULL,
  `Data_inici` date NOT NULL,
  `Data_final` date NOT NULL,
  `Dni_Profesores` varchar(9) DEFAULT NULL,
  `activo` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`Codi`, `Nom`, `Descripcion`, `Hores`, `Data_inici`, `Data_final`, `Dni_Profesores`, `activo`) VALUES
(1, 'HOLA', 'mC0bFk1LI1', 45, '2022-11-23', '2023-02-09', '1', 1),
(2, 'English', 'Loads of words', 69, '2022-10-18', '2022-11-06', '22', 1),
(3, 'Castellano', 'Palabras en español', 88, '2022-09-21', '2022-10-14', '123', 1),
(4, 'Català', 'Paraules en català', 88, '2022-09-21', '2022-09-29', '22', 1),
(5, 'H', 'H', 1, '2022-11-16', '2022-12-01', '1', 1),
(6, 'SQBvY2VHq0', 'IRnag9Wya6', 45, '2022-11-23', '2023-03-02', '1', 1),
(7, 'TEST', 'TEST', 69, '2023-02-17', '2023-02-18', '1', 1),
(10, 'PRUEBA10XD', 'mC0bFk1LI1', 45, '2022-11-23', '2023-03-02', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `Codi` int(11) NOT NULL,
  `Email_Alumnos` varchar(50) NOT NULL,
  `Nota` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`Codi`, `Email_Alumnos`, `Nota`) VALUES
(1, '1@gmail.com', 6),
(1, 'test@gmail.com', 10),
(4, '1@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `DNI` varchar(9) NOT NULL,
  `Nom` text NOT NULL,
  `Cognoms` text NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Titol` text NOT NULL,
  `Foto` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`DNI`, `Nom`, `Cognoms`, `Password`, `Titol`, `Foto`, `activo`) VALUES
('0', 'Profesor', 'Profesor', 'cfcd208495d565ef66e7dff9f98764da', 'Profesor', 'img/0-Fl2WA-JXEAEATpC.jpg', 0),
('1', 'assadaasdsad', 'testfdasdsfasdf', '28c8edde3d61a0411511d3b1866f0636', 'ADSADSADSADA', 'img/1-3-wpa9xvcq.png', 1),
('123', 'holisdfgdf', 'holosdffds', '1cc39ffd758234422e1f75beadfc5fb2', '69', 'img/123-original.jpg', 0),
('22', 'aAAAAAAAAAAA', 'oOOOOOOOOOOOOOOOOOOOO', 'b6d767d2f8ed5d21a44b0e5886680cb9', 'test', 'img/22-sdsd.png', 0),
('65', 'zxzzrPzHhJ', 'RK66IPt2Ji', 'fcb6e6a81fe86ae79404fa423dea6a92', 'Dlg7pdw4aE', 'img/AiSyWN0JBh-Fl7gqzhWQAEF4eR.png', 1),
('8980R', 'TESTOOOO', 'vx2L2rhot9', '7e149d47b1b104518fbb7fddee40aa45', 'S7fe5FAPFO', 'img/Ohp6KQDJok-FnQsKvxaYAErzYf.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`Email`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`Codi`),
  ADD KEY `Dni_Profesores` (`Dni_Profesores`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`Codi`,`Email_Alumnos`),
  ADD KEY `Email_Alumnos` (`Email_Alumnos`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`DNI`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `Codi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`Dni_Profesores`) REFERENCES `profesores` (`DNI`);

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`Codi`) REFERENCES `cursos` (`Codi`),
  ADD CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`Email_Alumnos`) REFERENCES `alumnos` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
