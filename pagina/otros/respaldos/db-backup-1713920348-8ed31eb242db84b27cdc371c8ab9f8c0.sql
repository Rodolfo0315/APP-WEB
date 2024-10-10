DROP TABLE IF EXISTS caja;

CREATE TABLE `caja` (
  `id_caja` int(200) NOT NULL AUTO_INCREMENT,
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
  `fecha_cierre` date NOT NULL,
  PRIMARY KEY (`id_caja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS clientes;

CREATE TABLE `clientes` (
  `id_cliente` int(200) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `documento` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `estado` char(1) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO clientes VALUES("1","Maiky Antonio Jimenez Valdez","40241176755","8293863059","mikijimenez2012@gmail.com","a"),
("2","Angel Jesus","07100034857","8294445555","jesusa992@gmail.com","a"),
("3","angel","40239493234","8098383821","angele@gmail.com","a");



DROP TABLE IF EXISTS detalles_pedido;

CREATE TABLE `detalles_pedido` (
  `id_detalles` int(200) NOT NULL AUTO_INCREMENT,
  `id_reparacion` varchar(200) NOT NULL,
  `id_producto` int(200) NOT NULL,
  `cantidad` varchar(200) NOT NULL,
  PRIMARY KEY (`id_detalles`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS empresa;

CREATE TABLE `empresa` (
  `id_empresa` int(100) NOT NULL AUTO_INCREMENT,
  `empresa` varchar(200) NOT NULL,
  `ruc` varchar(100) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `imagen` varchar(2000) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `simbolo_moneda` varchar(200) NOT NULL,
  `impuesto` float NOT NULL,
  `tipo_moneda` varchar(200) NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO empresa VALUES("1","TODOCARS AUTOPARTS","13403245","MTS, Nagua, Salidad Samana","8294458733","Taller de reparación.","logo.jpg","todocarsautoparts@gmail.com","$.","18","RD");



DROP TABLE IF EXISTS history_log;

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO history_log VALUES("1","5","se ha desconectado el sistema en ","2024-04-22 06:50:29"),
("2","5","se ha desconectado el sistema en ","2024-04-22 11:08:45"),
("3","5","se ha desconectado el sistema en ","2024-04-24 07:16:27"),
("4","5","se ha desconectado el sistema en ","2024-04-24 07:26:50"),
("5","5","se ha desconectado el sistema en ","2024-04-24 08:02:34"),
("6","5","se ha desconectado el sistema en ","2024-04-24 08:29:59"),
("7","5","se ha desconectado el sistema en ","2024-04-24 08:55:39"),
("8","9","se ha desconectado el sistema en ","2024-04-24 08:57:36");



DROP TABLE IF EXISTS marca;

CREATE TABLE `marca` (
  `id_marca` int(200) NOT NULL AUTO_INCREMENT,
  `nombre_marca` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  PRIMARY KEY (`id_marca`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO marca VALUES("1","Toyota","a"),
("2","Honda","a"),
("3","Nissan","a"),
("4","Mercedes-Bens","a"),
("5","Hyundai","a"),
("6","Mitsubishi","a");



DROP TABLE IF EXISTS modelo;

CREATE TABLE `modelo` (
  `id_modelo` int(200) NOT NULL AUTO_INCREMENT,
  `nombre_modelo` varchar(200) NOT NULL,
  `id_marca` int(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  PRIMARY KEY (`id_modelo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO modelo VALUES("1","Hulux","1","a"),
("2","Camry","1","a"),
("3","Corola","1","a"),
("4","Fit","2","a"),
("5","Civi","2","a"),
("6","CRV","1","a"),
("7","Frontier","3","a"),
("8","Versa","3","a"),
("9","NP300","3","a"),
("10","Leaf","3","a");



DROP TABLE IF EXISTS pedidos;

CREATE TABLE `pedidos` (
  `id_pedido` int(200) NOT NULL AUTO_INCREMENT,
  `num_pedido` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `id_sesion` int(100) NOT NULL,
  `id_cliente` int(200) NOT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS producto;

CREATE TABLE `producto` (
  `id_pro` int(100) NOT NULL AUTO_INCREMENT,
  `nombre_pro` varchar(100) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `unidad` varchar(100) NOT NULL,
  `precio_venta` varchar(100) NOT NULL,
  `imagen` longblob NOT NULL,
  `stock` varchar(200) NOT NULL,
  `estado` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pro`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO producto VALUES("1","Amortiguadores Hilux","Hilux","3000","2000","hilux.jpeg","3000","a"),
("2","Amortiguadores Fit","Honda","3000","2000","ma.jpeg","3000","a"),
("3","Llanta Hillux Clasica","Normal ","3000","2000","llan-clasi-hilux.jpeg","3000","a"),
("4","Hilux Lujo","LLanta de lujo ","3000","2000","llan-lujo-hilux.jpeg","3000","a"),
("5","Retrovisor Hilux ","Par de retrovisor","3000","1500","res-hilux.jpeg","3000","a"),
("6","Aceite Quaker ","State ","1000","1500","aceites.jpeg","1000","a"),
("7","Aceite Mobil","Super","1000","1250","aceites-Mobil-super.jpeg","1000","a"),
("8","Retrovisor Corolla","Par de retrovisor ","1000","1250","res-corolla.jpeg","1000","a"),
("9","Filtro del Moto hyundai ","filtro ","3000","1250","Sonata.jpeg","3000","a"),
("10","Filtro de Aire KIA","K5","3000","1250","descarga (1).jpeg","3000","a"),
("11","Filtro de Hilux","Toyota","1000","1500","hil.jpeg","1000","a"),
("12","Filtro de Aire Honda","Honda Fit","1000","1500","hon-fitro.jpeg","1000","a"),
("13","Alfombrillas Hilux","Alfombrillas para Toyota Hilux 4 puertas","1000","1500","alfo-hilu.jpeg","1000","a"),
("14","Neumatico Hilux","Gomas Toyota Hilux","3000","2500","images.jpeg","3000","a"),
("15","Neumatico Fit","Honda Fit","1000","2000","honda-goma.jpeg","1000","a"),
("16","Neumatico CRV","Honda ","1000","2000","crv.jpeg","1000","a"),
("17","Llanta CRV","Honda ","1000","2500","crv-llan.jpeg","1000","a"),
("18","Llanta CRV Plateada","Honda","1000","1250","crv-pla.jpeg","1000","a"),
("19","Llanta Honda CIvi","Honda","1000","2500","civi.jpeg","1000","a"),
("20","Llanta Honda CIvi Lujo","Lujo","1000","1250","cicilu.jpeg","1000","a"),
("21","Transmisión Hilux","Toyota Hilux ","1000","3500","tra-hilux.webp","1000","a"),
("22","Transmisión  K5","KIA","3000","1700","tra-k5.jpg","3000","a"),
("23","Transmisión  hyundai","hyundai","3000","1500","tra-sona.jpeg","3000","a"),
("24","Aceite Transmisión HYUNDAI 2011","HYUNDAI","1000","1500","aceiste-tra.jpeg","1000","a");



DROP TABLE IF EXISTS reparacion;

CREATE TABLE `reparacion` (
  `id_reparacion` int(200) NOT NULL AUTO_INCREMENT,
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
  `estado_reparacion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_reparacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;




DROP TABLE IF EXISTS usuario;

CREATE TABLE `usuario` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO usuario VALUES("5","admin","a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3","logo.jpg","administrador","TODOCARS "," AUTOPARTS","8294458733","TODOCARSAUTOPARTS@gmail.com"),
("9","Cristian","a1Bz20ydqelm8m1wql1cb18eab6d2512aea8a9231ae5f4dd89","","empleado","Cristian","Bernard Disla","8294445555","cristian.bernard.disla@gmail.com");



