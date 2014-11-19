-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2014 a las 21:52:51
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `simpleresto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE IF NOT EXISTS `caja` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `estado` char(1) DEFAULT NULL,
  `observacion` varchar(1000) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `caja`
--

INSERT INTO `caja` (`id`, `estado`, `observacion`, `fecha`) VALUES
(1, '1', 'noche', '2014-11-13 20:50:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `dni` varchar(50) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `direccion` varchar(1000) DEFAULT NULL,
  `fechaNac` date DEFAULT NULL,
  `fechaAlta` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `dni`, `telefono`, `mail`, `direccion`, `fechaNac`, `fechaAlta`) VALUES
(1, 'marta', '', '', '', '', '0000-00-00', NULL),
(2, 'tt', 'tt', 'tt', 'tt', 'tt', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE IF NOT EXISTS `entregas` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_usuarios` tinyint(4) DEFAULT NULL,
  `id_usuarios_entrega` tinyint(4) DEFAULT NULL,
  `id_pedidos` tinyint(4) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuarios` (`id_usuarios`),
  KEY `id_usuarios_entrega` (`id_usuarios_entrega`),
  KEY `id_pedidos` (`id_pedidos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_pedidos` tinyint(4) DEFAULT NULL,
  `id_productos` tinyint(4) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pedidos` (`id_pedidos`),
  KEY `id_productos` (`id_productos`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `id_pedidos`, `id_productos`, `estado`, `precio`) VALUES
(1, 2, 19, 'E', '49.00'),
(2, 2, 17, 'E', '45.00'),
(4, 2, 17, 'E', '45.00'),
(6, 2, 17, 'E', '45.00'),
(7, 3, 17, 'E', '45.00'),
(8, 5, 18, 'E', '45.00'),
(9, 5, 19, 'E', '49.00'),
(10, 4, 19, 'E', '49.00'),
(11, 8, 19, 'E', '49.00'),
(13, 8, 1, 'E', '50.00'),
(14, 8, 17, 'E', '45.00'),
(15, 8, 17, 'E', '45.00'),
(16, 9, 17, 'P', '45.00'),
(17, 10, 17, 'P', '45.00'),
(18, 10, 4, 'P', '52.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_usuarios` tinyint(4) DEFAULT NULL,
  `id_usuarios_recibe` tinyint(4) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `mensaje` varchar(1000) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuarios` (`id_usuarios`),
  KEY `id_usuarios_recibe` (`id_usuarios_recibe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE IF NOT EXISTS `mesas` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `ubicacionH` decimal(10,0) DEFAULT NULL,
  `ubicacionV` decimal(10,0) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id`, `nombre`, `ubicacionH`, `ubicacionV`, `estado`) VALUES
(1, '1', '0', '0', '1'),
(2, '2', '0', '160', '1'),
(3, '3', '0', '320', '1'),
(4, '4', '160', '320', '1'),
(5, '5', '160', '160', '1'),
(6, '6', '160', '0', '1'),
(7, '7', '900', '300', '1'),
(8, 'mesa especial', '290', '290', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE IF NOT EXISTS `movimientos` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_tipoMov` tinyint(4) DEFAULT NULL,
  `id_pedidos` tinyint(4) DEFAULT NULL,
  `id_caja` tinyint(4) DEFAULT NULL,
  `importe` decimal(10,0) DEFAULT NULL,
  `observacion` varchar(1000) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_tipoMov` (`id_tipoMov`),
  KEY `id_pedidos` (`id_pedidos`),
  KEY `id_caja` (`id_caja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_mesas` tinyint(4) DEFAULT NULL,
  `id_clientes` tinyint(4) DEFAULT NULL,
  `id_usuarios` tinyint(4) DEFAULT NULL,
  `ajusteImporte` decimal(10,0) DEFAULT NULL,
  `totalPagado` decimal(10,0) DEFAULT NULL,
  `observaciones` varchar(1000) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_mesas` (`id_mesas`),
  KEY `id_clientes` (`id_clientes`),
  KEY `id_usuarios` (`id_usuarios`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `id_mesas`, `id_clientes`, `id_usuarios`, `ajusteImporte`, `totalPagado`, `observaciones`, `estado`, `fecha`) VALUES
(1, 4, 1, NULL, '0', '0', '', 'F', '2014-11-13 18:45:47'),
(2, 3, 1, NULL, '0', '0', '', 'F', '2014-11-13 18:50:19'),
(3, 3, 1, NULL, '0', '0', '', 'F', '2014-11-13 18:52:37'),
(4, 2, 1, NULL, NULL, NULL, '', 'N', '2014-11-13 18:53:37'),
(5, 5, 1, NULL, '0', '0', '', 'F', '2014-11-13 22:58:19'),
(6, 5, 2, NULL, NULL, NULL, '', 'N', '2014-11-13 22:59:20'),
(7, 7, 2, NULL, '0', '0', '', 'F', '2014-11-13 23:00:32'),
(8, 6, 1, NULL, NULL, NULL, '', 'N', '2014-11-13 23:06:06'),
(9, 4, 1, NULL, '0', '0', '', 'F', '2014-11-13 23:11:49'),
(10, 8, 1, NULL, '0', '0', '', 'F', '2014-11-14 01:31:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_usuarios` tinyint(4) DEFAULT NULL,
  `id_roles` tinyint(4) DEFAULT NULL,
  `id_usuarios_alta` tinyint(4) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuarios` (`id_usuarios`),
  KEY `id_roles` (`id_roles`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `id_usuarios`, `id_roles`, `id_usuarios_alta`, `fecha`) VALUES
(4, 1, 1, NULL, NULL),
(6, 5, 1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` decimal(10,0) DEFAULT NULL,
  `stock` tinyint(4) DEFAULT NULL,
  `estado` char(1) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `stock`, `estado`, `fecha`) VALUES
(1, 'Papas fritassada', '50', 1, '0', '0000-00-00 00:00:00'),
(4, 'Tostados', '52', 1, '1', '0000-00-00 00:00:00'),
(17, 'Papas fritas', '45', 1, '1', '0000-00-00 00:00:00'),
(18, 'Ensalada', '45', 1, '1', '0000-00-00 00:00:00'),
(19, 'Ensalada apio', '49', 1, '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reloj`
--

CREATE TABLE IF NOT EXISTS `reloj` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_usuarios` tinyint(4) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL,
  `observacion` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuarios` (`id_usuarios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcliente`
--

CREATE TABLE IF NOT EXISTS `tblcliente` (
  `idCliente` smallint(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `telefono` varchar(16) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `tblcliente`
--

INSERT INTO `tblcliente` (`idCliente`, `nombre`, `direccion`, `telefono`, `email`) VALUES
(0001, 'nombre', 'asdasdf 21', '21312321', 'sofias@fasdaco.com'),
(0009, 'nombre', 'asdasdf 21', '21312321', 'sofias@fasdaco.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomov`
--

CREATE TABLE IF NOT EXISTS `tipomov` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `sumaResta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tipomov`
--

INSERT INTO `tipomov` (`id`, `nombre`, `sumaResta`) VALUES
(1, 'extracciÃ³n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `direccion` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `pass`, `nombre`, `telefono`, `mail`, `direccion`) VALUES
(1, 'daniel', '1', 'Daniel Rojas', NULL, NULL, NULL),
(2, 'mesero', '1', 'Mesero', '', '', ''),
(3, 'mozo', '1', 'Mozoooooo', '1', '1', '1'),
(4, 'mozo2', '1', 'Mozo2', '1', '1', '1'),
(5, 'mozo3', '1', 'Mozo3', '1', '1', '1'),
(6, 'sdfsdf', '1', 'dfsdf', 'dfg', 'dfgfd', 'gdfg'),
(7, 'sofigonzalez', 'admin1234', 'Sofia', '213123', 'sadfsdf@csdfsf.cas', 'sdfsdfdf 32'),
(8, 'pp', 'pp', 'pp', 'pp', 'pp', 'pp');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD CONSTRAINT `entregas_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `entregas_ibfk_2` FOREIGN KEY (`id_usuarios_entrega`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `entregas_ibfk_3` FOREIGN KEY (`id_pedidos`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`id_pedidos`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD CONSTRAINT `mensajes_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `mensajes_ibfk_2` FOREIGN KEY (`id_usuarios_recibe`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`id_tipoMov`) REFERENCES `tipomov` (`id`),
  ADD CONSTRAINT `movimientos_ibfk_2` FOREIGN KEY (`id_pedidos`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `movimientos_ibfk_3` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_mesas`) REFERENCES `mesas` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `reloj`
--
ALTER TABLE `reloj`
  ADD CONSTRAINT `reloj_ibfk_1` FOREIGN KEY (`id_usuarios`) REFERENCES `usuarios` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
