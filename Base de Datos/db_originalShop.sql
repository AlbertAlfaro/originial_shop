-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-06-2016 a las 22:36:28
-- Versión del servidor: 5.5.47-0+deb8u1
-- Versión de PHP: 5.6.17-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_originalShop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
`id_cliente` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
(1, 'Gabriela', 'Cardona', 'San Salvador', '78990088'),
(2, 'Alberto', 'Alfaro', 'La union ', '78990044'),
(3, 'Jose', 'Maria', 'Usulutan', '26009988'),
(4, 'Lidia', 'Villatoro', 'La union el Sauce', '72005416'),
(5, 'Monica', 'Armado', 'Usulutan', '777780054'),
(6, 'Fernando', 'Alvares', 'Santa Rosa', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleFactura`
--

CREATE TABLE IF NOT EXISTS `detalleFactura` (
`id_detalleFactura` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `presioVendido` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalleFactura`
--

INSERT INTO `detalleFactura` (`id_detalleFactura`, `id_factura`, `id_producto`, `presioVendido`, `cantidad`, `subtotal`) VALUES
(1, 1, 1, 55.00, 1, 55.00),
(2, 1, 2, 66.00, 1, 66.00),
(3, 2, 1, 55.00, 1, 55.00),
(4, 2, 2, 66.00, 1, 66.00),
(5, 3, 1, 55.00, 1, 55.00),
(6, 5, 2, 66.00, 1, 66.00),
(7, 6, 2, 55.50, 2, 111.00),
(8, 6, 1, 60.75, 1, 60.75),
(9, 7, 1, 66.00, 1, 66.00),
(10, 8, 1, 66.00, 1, 66.00),
(11, 9, 2, 66.00, 1, 66.00),
(12, 10, 2, 77.00, 1, 77.00),
(13, 11, 1, 77.00, 1, 77.00),
(14, 12, 2, 66.00, 1, 66.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
`id_empleado` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
`id_factura` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `nombre_cliente` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id_factura`, `id_cliente`, `nombre_cliente`, `fecha`, `total`) VALUES
(1, 1, 'Gabriela Cardona', '2016-06-09', 121.00),
(2, 2, 'Albeto Alfaro', '2016-06-09', 121.00),
(3, 2, 'Alberto Alfaro', '2016-06-08', 55.00),
(5, 0, 'General', '2016-06-07', 66.00),
(6, 2, 'Alberto Alfaro', '2016-06-11', 171.75),
(7, 1, 'Gabriela Cardona ', '2016-06-01', 66.00),
(8, 1, 'Gabriela Cardona', '2016-06-07', 66.00),
(9, 3, 'Jose Maria', '2016-06-14', 66.00),
(10, 4, 'Lidia Villatoro', '2016-06-08', 77.00),
(11, 3, 'Jose Maria', '2016-06-07', 77.00),
(12, 5, 'Monica Armado', '2016-06-29', 66.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE IF NOT EXISTS `historial` (
`id_historial` int(11) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(50) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id_historial`, `descripcion`, `fecha`, `hora`, `nombre_usuario`) VALUES
(1, 'Login efectuado', '2016-06-12', '08:57 pm', 'albert'),
(2, 'Se actualizon datos de cliente', '2016-06-12', '08:57 pm', 'albert'),
(3, 'Se registro un Cliente', '2016-06-12', '08:59 pm', 'albert'),
(4, 'Login efectuado', '2016-06-12', '09:42 pm', 'albert'),
(5, 'Login efectuado', '2016-06-12', '09:58 pm', 'albert'),
(6, 'Login efectuado', '2016-06-12', '09:58 pm', 'albert'),
(7, 'Login efectuado', '2016-06-12', '10:00 pm', 'albert'),
(8, 'Login efectuado', '2016-06-12', '10:03 pm', 'albert'),
(9, 'Login efectuado', '2016-06-12', '10:10 pm', 'usuario'),
(10, 'Login efectuado', '2016-06-12', '10:21 pm', 'albert');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`id_producto` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precioCompra` decimal(10,2) DEFAULT NULL,
  `precioVenta` decimal(10,2) DEFAULT NULL,
  `fechaIngreso` date DEFAULT NULL,
  `id_sucursal` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_tipoArticulo` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `nombre`, `descripcion`, `cantidad`, `precioCompra`, `precioVenta`, `fechaIngreso`, `id_sucursal`, `id_proveedor`, `id_tipoArticulo`) VALUES
(1, 'CAMISA NIKE', 'Muy buena camisa', 32, 40.00, 60.00, '2016-06-02', 1, 1, 1),
(2, 'PANTALON LIVE', 'Muy bueno', 22, 50.00, 65.00, '2016-06-09', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
`id_proveedor` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE IF NOT EXISTS `sucursal` (
`id_sucursal` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoArticulo`
--

CREATE TABLE IF NOT EXISTS `tipoArticulo` (
  `id_tipoArticulo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`id_usuario` int(11) NOT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `clave`, `tipo`, `id_empleado`) VALUES
(1, 'albert', '3f5866470a8ae2876d263312cd935ec4bb781256', 'Administrador', 1),
(2, 'usuario', '3f5866470a8ae2876d263312cd935ec4bb781256', 'UsuarioNormal', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalleFactura`
--
ALTER TABLE `detalleFactura`
 ADD PRIMARY KEY (`id_detalleFactura`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
 ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
 ADD PRIMARY KEY (`id_factura`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
 ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
 ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
 ADD PRIMARY KEY (`id_sucursal`);

--
-- Indices de la tabla `tipoArticulo`
--
ALTER TABLE `tipoArticulo`
 ADD PRIMARY KEY (`id_tipoArticulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `detalleFactura`
--
ALTER TABLE `detalleFactura`
MODIFY `id_detalleFactura` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
MODIFY `id_sucursal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
