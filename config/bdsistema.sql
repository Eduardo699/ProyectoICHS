-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2019 a las 01:55:31
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdsistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `tipo` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `tipo`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Hardware', 'Microprocesador', 'Problemas relacionados con el sobrecalentamiento y fallas de los microprocesadores', 1),
(2, 'Hardware', 'Fuente de poder', 'Problemas relacionados con la alimentación de la energía eléctrica a la PC', 1),
(3, 'Hardware', 'RAM', 'Problemas relacionados con los fallos o malas configuraciones de las tarjetas RAM', 1),
(4, 'Hardware', 'Disco Duro', 'Problemas con almacenamiento de la información', 1),
(5, 'Hardware', 'Ventilador', 'Fallas relacionadas a la no ventilación o sobrecalentamiento de la máquina', 1),
(6, 'Hardware', 'Tarjeta de video', 'Problemas relacionados a problemas de salida de imagen en la PC', 1),
(7, 'Hardware', 'Motherboard', 'Fallos en la placa madre', 1),
(8, 'Hardware', 'Batería CMOS', 'Fallos en el encendido de la PC o desconfiguración en la hora o fecha', 1),
(9, 'Software', 'Sistema Operativo', 'Fallas generales del sistema operativo', 1),
(10, 'Software', 'Office', 'Problemas al utilizar la paquetería de Office', 1),
(11, 'Hardware', 'Pantalla ', 'Problemas al mostrar imagen', 1),
(12, 'Hardware', 'Adaptador de red', 'Problemas de conectividad de internet', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` varchar(11) COLLATE latin1_spanish_ci NOT NULL,
  `nombreCompleto` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `direccion` varchar(75) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `dui` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `idDepartamento` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nombreCompleto`, `fechaNac`, `direccion`, `telefono`, `dui`, `userid`, `idDepartamento`, `estado`) VALUES
('CERP191', 'Carlos Esau Rivera Palacios', '2001-12-20', 'calle la mascota', '7854-9658', '77862798-0', 18, 7, 1),
('GARC192', 'German Antonio Rodriguez Campos', '2001-12-14', 'carretera a santa tecla', '7485-8596', '95862798-9', 14, 1, 1),
('JDP193', 'Jose David Perez', '2001-11-16', 'calle concepcion', '7485-8596', '92862798-0', 13, 6, 1),
('KAM194', 'Karla Alejandra Martinez', '2001-12-23', 'calle arce pasaje 2', '7485-8596', '95864498-9', 16, 6, 1),
('MACO195', 'Manuel Alexander Campos Ortega', '2001-12-25', 'calle a santa tecla kilometro 202', '7485-8596', '47841279-5', 15, 7, 1),
('RCPR196', 'Roberto Carlos Pineda Ramos', '2001-12-21', 'avenida jerusalen', '7458-4754', '95862798-9', 17, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepartamento` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idDepartamento`, `nombre`, `descripcion`, `estado`) VALUES
(1, 'Dirección General', 'Establece objetivos y dirige a la empresa hacia ellos. Está relacionada con el resto de áreas, ya que es quien las controla.', 1),
(2, 'Administración y Recursos Humanos', 'Relacionada con el funcionamiento de la empresa. Es la operación del negocio desde contrataciones, hasta aplicación de campañas en el recurso humano.', 1),
(3, 'Producción', 'Lleva a cabo la producción de los bienes que la empresa comercializará.', 1),
(4, 'Finanzas y Contabilidad', 'Tendrá en cuenta todos los movimientos de dinero, tanto dentro como fuera de la empresa, además realiza el cálculo de pagos para los empleados.', 1),
(5, 'Publicidad y Mercadotecnia', 'Se encarga de realizar las investigación en el mercado, determinar cuál será el siguiente producto para llegar a una negociación en el mercado.', 1),
(6, 'Informática', 'Se encarga de mantener siempre en buen estado el funcionamiento técnico y tecnológico de la empresa.', 1),
(7, 'Atención al cliente', 'Dedicado a la recepción, resolución y seguimiento de quejas, dudas o sugerencias hechas por los clientes', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `idDiagnostico` int(11) NOT NULL,
  `fechaAsignacion` datetime NOT NULL,
  `fechaCierre` datetime DEFAULT NULL,
  `diagnostico` varchar(150) COLLATE latin1_spanish_ci DEFAULT NULL,
  `solucion` varchar(350) COLLATE latin1_spanish_ci DEFAULT NULL,
  `idTecnico` varchar(11) COLLATE latin1_spanish_ci NOT NULL,
  `idTicket` int(11) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `estadoDiagnostico` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `diagnostico`
--

INSERT INTO `diagnostico` (`idDiagnostico`, `fechaAsignacion`, `fechaCierre`, `diagnostico`, `solucion`, `idTecnico`, `idTicket`, `idCategoria`, `estadoDiagnostico`, `estado`) VALUES
(1, '2019-07-18 10:18:23', '2019-06-20 10:16:12', 'Pasta termica mal colocada', 'Se procedio a aplicar pasta termica de forma correcta en el microprocesador', 'DAA19', 1, 1, 'Cerrado', 1),
(2, '2019-06-18 07:23:25', NULL, NULL, NULL, 'DAA19', 2, NULL, 'Abierto', 1),
(3, '2019-06-11 15:15:24', '2019-06-12 08:17:22', 'RAM mal asentada', 'El modulo de la RAM no estaba bie colocada en la ranura', 'EAA19', 3, 3, 'Cerrado', 1),
(4, '2019-06-19 14:13:43', NULL, NULL, NULL, 'EAA19', 4, NULL, 'Abierto', 1),
(5, '2019-06-18 13:25:16', '2019-06-20 11:41:10', 'Ventilador dañado', 'Se procedio a cambiar el ventilador', 'JCE19', 5, 5, 'Cerrado', 1),
(6, '2019-06-20 08:31:18', NULL, NULL, NULL, 'JCE19', 6, NULL, 'Abierto', 1),
(7, '2019-06-13 15:22:17', '2019-06-16 12:20:30', 'Motherboard polvosa', 'Se procedio a realizar una limpieza general en la placa madre', 'RAC19', 7, 7, 'Cerrado', 1),
(8, '2019-06-19 14:28:16', NULL, NULL, NULL, 'RAC19', 8, NULL, 'Abierto', 1),
(9, '2019-06-16 11:33:32', '2019-06-19 14:27:17', 'Sistema operativo dañado', 'Se reinstalo el sistema operativo', 'ADA19', 9, 9, 'Cerrado', 1),
(10, '2019-06-19 14:14:43', NULL, NULL, NULL, 'AED19', 10, NULL, 'Abierto', 1),
(11, '2019-06-19 10:10:35', '2019-06-21 13:29:28', 'Pantalla quebrada', 'Se reemplazo la pantalla', 'DAA19', 11, 11, 'Cerrado', 1),
(12, '2019-06-19 13:18:37', NULL, NULL, NULL, 'DAA19', 12, NULL, 'Abierto', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `idTecnico` varchar(11) COLLATE latin1_spanish_ci NOT NULL,
  `nombreCompleto` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `dui` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `especialidad` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `userid` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`idTecnico`, `nombreCompleto`, `direccion`, `telefono`, `dui`, `especialidad`, `fechaNac`, `userid`, `estado`) VALUES
('ADA19', 'Alexis David Aguilar', 'calle concepcion', '7458-2014', '25620145-8', 'Software', '2001-10-12', 7, 1),
('AED19', 'Alirio Esau Diaz', 'calle la mascota', '7485-9658', '92862798-9', 'Software', '2001-11-15', 12, 1),
('DAA19', 'Daniel Alexander Angel', 'calle a santa tecla kilometro 202', '7458-4754', '48541279-5', 'Hardware', '2001-12-13', 9, 1),
('EAA19', 'Eduardo Antonio Aguilar', 'carretera a santa tecla', '7485-9658', '95862498-9', 'Hardware', '2001-12-01', 8, 1),
('JCE19', 'Juan Carlos Estrada', 'avenida jerusalen', '7458-4754', '47841279-5', 'Hardware', '2001-12-08', 11, 1),
('RAC19', 'Rocio Alejandra Chicas', 'calle arce pasaje 2', '7458-4754', '92862798-0', 'Hardware', '2001-12-02', 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `asunto` varchar(75) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(600) COLLATE latin1_spanish_ci NOT NULL,
  `adjunto` varchar(255) COLLATE latin1_spanish_ci DEFAULT NULL,
  `idCliente` varchar(11) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`idTicket`, `fechaCreacion`, `asunto`, `descripcion`, `adjunto`, `idCliente`, `estado`) VALUES
(1, '2019-06-18 09:15:20', 'La PC se calienta demasiado', 'La computadora se calienta demasiado cuando la uso', 'ticket1.jpg', 'CERP191', 1),
(2, '2019-06-17 07:09:35', 'Problemas con apagones', 'La PC se me apaga de repente cuando estoy trabajando', 'ticket2.jpg', 'CERP191', 1),
(3, '2019-06-10 09:15:20', 'La computadora no enciende', 'La computadora no enciende y en cambio emite un pitido', 'ticket3.jpg', 'GARC192', 1),
(4, '2019-06-18 11:12:21', 'No puedo acceder a mis datos', 'Algunos de mis datos se borraron de repente de mi pc', 'ticket4.jpg', 'GARC192', 1),
(5, '2019-06-17 12:16:08', 'Sobrecalentamiento de pc', 'La pc se sobrecalienta demasiado cuando la uso', 'ticket5.jpg', 'JDP193', 1),
(6, '2019-06-19 09:29:11', 'computadora no me muestra imagen', 'al encender la pc no me muestra imagen ', 'ticket6.jpg', 'JDP193', 1),
(7, '2019-06-12 10:22:23', 'La pc se calienta', 'la computadora se calienta mas de lo normal', 'ticket7.jpg', 'KAM194', 1),
(8, '2019-06-18 08:29:19', 'Problemas de fecha y hora', 'al encender la pc por la mañana, se me desconfigura la hora', 'ticket8.jpg', 'KAM194', 1),
(9, '2019-06-15 16:21:18', 'no puedo acceder a mis datos', 'la pc tira un error al encender', 'ticket9.jpg', 'MACO195', 1),
(10, '2019-06-18 09:21:22', 'Office se cierra', 'Office se cierra repentinamente sin guardar cambios', 'ticket10.jpg', 'MACO195', 1),
(11, '2019-06-18 15:22:18', 'pantalla quebrada', 'el monitor se me cayo y se quebro la pantalla', 'ticket11.jpg', 'RCPR196', 1),
(12, '2019-06-18 09:21:22', 'no puedo acceder a mi red wifi', 'la computadora no detecta señales wifi', 'ticket12.jpg', 'RCPR196', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `username` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `avatar` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `rol` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`username`, `password`, `avatar`, `rol`, `userid`) VALUES
('reneV', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'defecto.jpg', 'Administrador', 1),
('alexisT', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'alexis.jpg', 'Tecnico', 7),
('eduardoT', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'eduardo.jpg', 'Tecnico', 8),
('danielT', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'daniel.jpg', 'Tecnico', 9),
('rocioT', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'rocio.jpg', 'Tecnico', 10),
('juanT', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'juan.jpg', 'Tecnico', 11),
('alirioT', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'alirio.jpg', 'Tecnico', 12),
('davidC', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'alexis.jpg', 'Cliente', 13),
('antonioC', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'eduardo.jpg', 'Cliente', 14),
('alexanderC', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'daniel.jpg', 'Cliente', 15),
('alejandraC', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'rocio.jpg', 'Cliente', 16),
('carlosC', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'juan.jpg', 'Cliente', 17),
('esauC', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'alirio.jpg', 'Cliente', 18),
('admin1', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'defecto.jpg', 'Administrador', 19);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `fk_cliente_usuario` (`userid`),
  ADD KEY `fk_cliente_departamento` (`idDepartamento`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD PRIMARY KEY (`idDiagnostico`),
  ADD KEY `fk_diagnostico_tecnico` (`idTecnico`),
  ADD KEY `fk_diagnostico_ticket` (`idTicket`),
  ADD KEY `fk_diagnostico_categoria` (`idCategoria`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`idTecnico`),
  ADD KEY `fk_tecnicos_usuario` (`userid`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `fk_ticket_cliente` (`idCliente`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `idDiagnostico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_departamento` FOREIGN KEY (`idDepartamento`) REFERENCES `departamento` (`idDepartamento`),
  ADD CONSTRAINT `fk_cliente_usuario` FOREIGN KEY (`userid`) REFERENCES `usuario` (`userid`);

--
-- Filtros para la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  ADD CONSTRAINT `fk_diagnostico_categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `fk_diagnostico_tecnico` FOREIGN KEY (`idTecnico`) REFERENCES `tecnicos` (`idTecnico`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_diagnostico_ticket` FOREIGN KEY (`idTicket`) REFERENCES `ticket` (`idTicket`);

--
-- Filtros para la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD CONSTRAINT `fk_tecnicos_usuario` FOREIGN KEY (`userid`) REFERENCES `usuario` (`userid`);

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_ticket_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
