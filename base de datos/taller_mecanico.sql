-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2024 a las 02:51:50
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `taller_mecanico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caja`
--

CREATE TABLE `caja` (
  `id_caja` int(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `monto` varchar(200) NOT NULL,
  `fecha_apertura` date NOT NULL,
  `Billetes2000` int(225) NOT NULL,
  `Billetes1000` int(225) NOT NULL,
  `Billetes500` int(225) NOT NULL,
  `Billetes200` int(225) NOT NULL,
  `Billetes100` int(225) NOT NULL,
  `Billetes50` int(225) NOT NULL,
  `Monedas25` int(225) NOT NULL,
  `Monedas10` int(225) NOT NULL,
  `Monedas5` int(225) NOT NULL,
  `Monedas1` int(225) NOT NULL,
  `fecha_cierre` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `documento` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `documento`, `telefono`, `correo`, `estado`) VALUES
(1, 'Maiky Antonio Jimenez Valdez', '40241176755', '8293863059', 'mikijimenez2012@gmail.com', 'a'),
(2, 'Angel Jesus', '07100034857', '8294445555', 'jesusa992@gmail.com', 'a'),
(3, 'angel', '40239493234', '8098383821', 'angele@gmail.com', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedido`
--

CREATE TABLE `detalles_pedido` (
  `id_detalles` int(200) NOT NULL,
  `id_reparacion` varchar(200) NOT NULL,
  `id_producto` int(200) NOT NULL,
  `cantidad` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(100) NOT NULL,
  `empresa` varchar(200) NOT NULL,
  `ruc` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `imagen` varchar(2000) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `simbolo_moneda` varchar(200) NOT NULL,
  `impuesto` float NOT NULL,
  `tipo_moneda` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `empresa`, `ruc`, `direccion`, `telefono`, `descripcion`, `imagen`, `correo`, `simbolo_moneda`, `impuesto`, `tipo_moneda`) VALUES
(1, 'TODOCARS AUTOPARTS', '13403245', 'MTS, Nagua, Salidad Samana', '8294458733', 'Taller de reparación.', 'logo.jpg', 'todocarsautoparts@gmail.com', '$.', 18, 'RD');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `history_log`
--

INSERT INTO `history_log` (`log_id`, `user_id`, `action`, `date`) VALUES
(1, 5, 'se ha desconectado el sistema en ', '2024-04-22 06:50:29'),
(2, 5, 'se ha desconectado el sistema en ', '2024-04-22 11:08:45'),
(3, 5, 'se ha desconectado el sistema en ', '2024-04-24 07:16:27'),
(4, 5, 'se ha desconectado el sistema en ', '2024-04-24 07:26:50'),
(5, 5, 'se ha desconectado el sistema en ', '2024-04-24 08:02:34'),
(6, 5, 'se ha desconectado el sistema en ', '2024-04-24 08:29:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(200) NOT NULL,
  `nombre_marca` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `nombre_marca`, `estado`) VALUES
(1, 'Toyota', 'a'),
(2, 'Honda', 'a'),
(3, 'Nissan', 'a'),
(4, 'Mercedes-Bens', 'a'),
(5, 'Hyundai', 'a'),
(6, 'Mitsubishi', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

CREATE TABLE `modelo` (
  `id_modelo` int(200) NOT NULL,
  `nombre_modelo` varchar(200) NOT NULL,
  `id_marca` int(200) NOT NULL,
  `estado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `modelo`
--

INSERT INTO `modelo` (`id_modelo`, `nombre_modelo`, `id_marca`, `estado`) VALUES
(1, 'Hulux', 1, 'a'),
(2, 'Camry', 1, 'a'),
(3, 'Corola', 1, 'a'),
(4, 'Fit', 2, 'a'),
(5, 'Civi', 2, 'a'),
(6, 'CRV', 1, 'a'),
(7, 'Frontier', 3, 'a'),
(8, 'Versa', 3, 'a'),
(9, 'NP300', 3, 'a'),
(10, 'Leaf', 3, 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(200) NOT NULL,
  `num_pedido` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `id_sesion` int(100) NOT NULL,
  `id_cliente` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_pro` int(100) NOT NULL,
  `nombre_pro` varchar(100) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `unidad` varchar(100) NOT NULL,
  `precio_venta` varchar(100) NOT NULL,
  `imagen` longblob NOT NULL,
  `stock` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_pro`, `nombre_pro`, `descripcion`, `unidad`, `precio_venta`, `imagen`, `stock`, `estado`) VALUES
(1, 'Amortiguadores Hilux', 'Hilux', '3000', '2000', 0x68696c75782e6a706567, '3000', 'a'),
(2, 'Amortiguadores Fit', 'Honda', '3000', '2000', 0x6d612e6a706567, '3000', 'a'),
(3, 'Llanta Hillux Clasica', 'Normal ', '3000', '2000', 0x6c6c616e2d636c6173692d68696c75782e6a706567, '3000', 'a'),
(4, 'Hilux Lujo', 'LLanta de lujo ', '3000', '2000', 0x6c6c616e2d6c756a6f2d68696c75782e6a706567, '3000', 'a'),
(5, 'Retrovisor Hilux ', 'Par de retrovisor', '3000', '1500', 0x7265732d68696c75782e6a706567, '3000', 'a'),
(6, 'Aceite Quaker ', 'State ', '1000', '1500', 0x616365697465732e6a706567, '1000', 'a'),
(7, 'Aceite Mobil', 'Super', '1000', '1250', 0x616365697465732d4d6f62696c2d73757065722e6a706567, '1000', 'a'),
(8, 'Retrovisor Corolla', 'Par de retrovisor ', '1000', '1250', 0x7265732d636f726f6c6c612e6a706567, '1000', 'a'),
(9, 'Filtro del Moto hyundai ', 'filtro ', '3000', '1250', 0x536f6e6174612e6a706567, '3000', 'a'),
(10, 'Filtro de Aire KIA', 'K5', '3000', '1250', 0x6465736361726761202831292e6a706567, '3000', 'a'),
(11, 'Filtro de Hilux', 'Toyota', '1000', '1500', 0x68696c2e6a706567, '1000', 'a'),
(12, 'Filtro de Aire Honda', 'Honda Fit', '1000', '1500', 0x686f6e2d666974726f2e6a706567, '1000', 'a'),
(13, 'Alfombrillas Hilux', 'Alfombrillas para Toyota Hilux 4 puertas', '1000', '1500', 0x616c666f2d68696c752e6a706567, '1000', 'a'),
(14, 'Neumatico Hilux', 'Gomas Toyota Hilux', '3000', '2500', 0x696d616765732e6a706567, '3000', 'a'),
(15, 'Neumatico Fit', 'Honda Fit', '1000', '2000', 0x686f6e64612d676f6d612e6a706567, '1000', 'a'),
(16, 'Neumatico CRV', 'Honda ', '1000', '2000', 0x6372762e6a706567, '1000', 'a'),
(17, 'Llanta CRV', 'Honda ', '1000', '2500', 0x6372762d6c6c616e2e6a706567, '1000', 'a'),
(18, 'Llanta CRV Plateada', 'Honda', '1000', '1250', 0x6372762d706c612e6a706567, '1000', 'a'),
(19, 'Llanta Honda CIvi', 'Honda', '1000', '2500', 0x636976692e6a706567, '1000', 'a'),
(20, 'Llanta Honda CIvi Lujo', 'Lujo', '1000', '1250', 0x636963696c752e6a706567, '1000', 'a'),
(21, 'Transmisión Hilux', 'Toyota Hilux ', '1000', '3500', 0x7472612d68696c75782e77656270, '1000', 'a'),
(22, 'Transmisión  K5', 'KIA', '3000', '1700', 0x7472612d6b352e6a7067, '3000', 'a'),
(23, 'Transmisión  hyundai', 'hyundai', '3000', '1500', 0x7472612d736f6e612e6a706567, '3000', 'a'),
(24, 'Aceite Transmisión HYUNDAI 2011', 'HYUNDAI', '1000', '1500', 0x616365697374652d7472612e6a706567, '1000', 'a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion`
--

CREATE TABLE `reparacion` (
  `id_reparacion` int(200) NOT NULL,
  `id_marca` int(200) NOT NULL,
  `id_modelo` int(200) NOT NULL,
  `id_usuario` int(200) NOT NULL,
  `placa` varchar(200) NOT NULL,
  `diagnóstico_automotriz` varchar(8000) NOT NULL,
  `revision_componentes` varchar(8000) NOT NULL,
  `fecha_estimada` date NOT NULL,
  `hora_reparacion` varchar(8000) NOT NULL,
  `cliente` int(200) NOT NULL,
  `fecha_registro` date NOT NULL,
  `costo_de_chequeo` float NOT NULL,
  `tipo_comprobante` varchar(200) NOT NULL,
  `estado_reparacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(200) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `imagen`, `tipo`, `nombre`, `apellido`, `telefono`, `correo`) VALUES
(5, 'admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'logo.jpg', 'administrador', 'TODOCARS ', ' AUTOPARTS', '8294458733', 'TODOCARSAUTOPARTS@gmail.com'),
(9, 'Cristian', 'a1Bz20ydqelm8m1wql1cb18eab6d2512aea8a9231ae5f4dd89', '', 'empleado', 'Cristian', 'Bernard Disla', '8294445555', 'cristian.bernard.disla@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caja`
--
ALTER TABLE `caja`
  ADD PRIMARY KEY (`id_caja`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD PRIMARY KEY (`id_detalles`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `modelo`
--
ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_pro`);

--
-- Indices de la tabla `reparacion`
--
ALTER TABLE `reparacion`
  ADD PRIMARY KEY (`id_reparacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caja`
--
ALTER TABLE `caja`
  MODIFY `id_caja` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  MODIFY `id_detalles` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `modelo`
--
ALTER TABLE `modelo`
  MODIFY `id_modelo` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_pro` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `reparacion`
--
ALTER TABLE `reparacion`
  MODIFY `id_reparacion` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
