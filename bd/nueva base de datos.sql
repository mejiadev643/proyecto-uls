-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-05-2019 a las 00:50:51
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uls_2019`
--
CREATE DATABASE IF NOT EXISTS `uls_2019` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `uls_2019`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera`
--

CREATE TABLE `carrera` (
  `id_carrera` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  `id_facultad` tinyint(3) NOT NULL,
  PRIMARY KEY (`id_carrera`),
  KEY `fk_id_facultad` (`id_facultad`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera`
--

INSERT INTO `carrera` (`id_carrera`, `nombre`, `id_facultad`) VALUES
(1, 'Lic. en Ciencias de la Computación', 1),
(2, 'Ing. Agroecologica', 1),
(3, 'Lic. en Ciencias Juridicas', 1),
(4, 'Lic. en contaduria publica', 1),
(5, 'Lic. en Administración de Empresas', 1),
(6, 'Tecnico en Desarrollo de Aplicaciones Informaticas', 1),
(7, 'Lic. en Trabajo Social', 2),
(8, 'Lic. en Teologia', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrera_public`
--

CREATE TABLE `carrera_public` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `carrera` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carrera_public`
--

INSERT INTO `carrera_public` (`id`, `carrera`) VALUES
(1, 'ciencias de la computacion'),
(2, 'ing. agroecologica'),
(3, 'Lic. en Ciencias Juridicas'),
(4, 'Lic. en contaduria publica'),
(5, 'Lic. en Administración de Empresas'),
(6, 'Tecnico en Desarrollo de Aplicaciones Informaticas'),
(7, 'Lic. en Trabajo Social'),
(8, 'Lic. en Teologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE `facultad` (
  `id` tinyint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(70) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`id`, `nombre`) VALUES
(1, 'Ciencias del hombre y la naturaleza'),
(2, 'Teologia y humanidades');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id_publicacion` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(125) DEFAULT NULL,
  `descripcion` text,
  `imagen` text,
  `tipo_publicacion` tinyint(4) NOT NULL,
  `carrera_public` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_publicacion`),
  KEY `fk_tipo_publicacion` (`tipo_publicacion`),
  KEY `fk_carrera_public` (`carrera_public`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_publicacion`
--

CREATE TABLE `tipo_publicacion` (
  `id_publicacion` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id_publicacion`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_publicacion`
--

INSERT INTO `tipo_publicacion` (`id_publicacion`, `nombre`) VALUES
(1, 'ofertas de empleo'),
(2, 'ofertas academicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_usuario` int(3) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(25) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_usuario`, `tipo`) VALUES
(1, 'egresado'),
(2, 'operador'),
(3, 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `carnet` varchar(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `correo_electronico` varchar(60) DEFAULT NULL,
  `contrasena` varchar(20) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `token` varchar(11) DEFAULT NULL,
  `id_tipo_usuario` int(3) NOT NULL,
  `id_carrera` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_id_tipo_usuario` (`id_tipo_usuario`),
  KEY `fk_id_carrera` (`id_carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `carnet`, `nombre`, `apellido`, `telefono`, `direccion`, `correo_electronico`, `contrasena`, `foto`, `token`, `id_tipo_usuario`, `id_carrera`) VALUES
(1, 'admin', '', '', NULL, '', '', 'admin', 'Captura de pantalla de 2019-04-05 16-15-53.png', NULL, 3, 1),
(2, 'mod', 'adsdads', '', 2147483647, '', '', 'mod', '999252.png', NULL, 2, NULL),
(3, 'usuario', 'egresado', '', 0, '', '', 'usuario', 'usuario.png', NULL, 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrera`
--
ALTER TABLE `carrera`
  ADD CONSTRAINT `fk_id_facultad` FOREIGN KEY (`id_facultad`) REFERENCES `facultad` (`id`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `fk_carrera_public` FOREIGN KEY (`carrera_public`) REFERENCES `carrera_public` (`id`),
  ADD CONSTRAINT `fk_tipo_publicacion` FOREIGN KEY (`tipo_publicacion`) REFERENCES `tipo_publicacion` (`id_publicacion`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_id_carrera` FOREIGN KEY (`id_carrera`) REFERENCES `carrera` (`id_carrera`),
  ADD CONSTRAINT `fk_id_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
