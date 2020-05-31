-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 31-05-2020 a las 20:23:18
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES latin1 */;

--
-- Base de datos: `infomovie`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `id_gen` int(3) NOT NULL AUTO_INCREMENT,
  `nom_gen` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_gen`)
) ENGINE=InnoDB AUTO_INCREMENT=10772 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_gen`, `nom_gen`) VALUES
(12, 'Aventura'),
(14, 'Fantasí­a'),
(16, 'Animación'),
(18, 'Drama'),
(27, 'Terror'),
(28, 'Acción'),
(35, 'Comedia'),
(36, 'Historia'),
(37, 'Western'),
(53, 'Suspense'),
(80, 'Crimen'),
(99, 'Documental'),
(878, 'Ciencia ficción'),
(9648, 'Misterio'),
(10402, 'Música'),
(10749, 'Romance'),
(10751, 'Familia'),
(10752, 'Bélica'),
(10770, 'Película de TV'),
(10771, 'No especificado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

DROP TABLE IF EXISTS `pelicula`;
CREATE TABLE IF NOT EXISTS `pelicula` (
  `cod_pel` int(10) NOT NULL AUTO_INCREMENT,
  `nom_pel` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `desc_pel` varchar(900) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `port_pel` varchar(900) NOT NULL,
  `fecha_pel` varchar(100) NOT NULL,
  `gen_pel` int(3) NOT NULL,
  `cat_pel` int(10) NOT NULL,
  `sinc_pel` int(11) NOT NULL,
  PRIMARY KEY (`cod_pel`),
  KEY `fk_gen` (`gen_pel`)
) ENGINE=InnoDB AUTO_INCREMENT=710284 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resena`
--

DROP TABLE IF EXISTS `resena`;
CREATE TABLE IF NOT EXISTS `resena` (
  `cod_res` int(255) NOT NULL AUTO_INCREMENT,
  `us_res` int(255) NOT NULL,
  `pel_res` int(10) NOT NULL,
  `puntos_res` int(2) NOT NULL,
  `titulo_res` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `desc_res` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `reac_res` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`cod_res`),
  KEY `fk_pel` (`pel_res`),
  KEY `fk_us` (`us_res`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `cod_us` int(255) NOT NULL AUTO_INCREMENT,
  `nom_us` varchar(10000) NOT NULL,
  `em_us` varchar(100) NOT NULL,
  `pass_us` varchar(100) NOT NULL,
  `admin_us` int(1) NOT NULL,
  `token_us` varchar(20) NOT NULL,
  `veri_us` int(11) NOT NULL,
  PRIMARY KEY (`cod_us`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod_us`, `nom_us`, `em_us`, `pass_us`, `admin_us`, `token_us`, `veri_us`) VALUES
(6, 'SantosAdmin', 'santosadmin@email.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '', 1),
(10, 'SantosUser', 'santosuser@email.com', 'e10adc3949ba59abbe56e057f20f883e', 0, '', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `fk_gen` FOREIGN KEY (`gen_pel`) REFERENCES `genero` (`id_gen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resena`
--
ALTER TABLE `resena`
  ADD CONSTRAINT `fk_pel` FOREIGN KEY (`pel_res`) REFERENCES `pelicula` (`cod_pel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_us` FOREIGN KEY (`us_res`) REFERENCES `usuario` (`cod_us`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
