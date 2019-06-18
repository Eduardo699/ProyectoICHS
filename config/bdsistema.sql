-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2019 a las 09:56:17
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

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
(11, 'Software', 'Controlador', 'Problemas debido a la falta o desactualización de los drivers', 1);

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
('EBRL192', 'Esmeralda Beatriz Rosa Lima', '2001-12-17', 'San Julián, Sonsonate', '7154-5654', '98463403-7', 23, 3, 1),
('EISO193', 'Emanuel Isaac Salinas Orellana', '2001-12-02', 'Sonzacate, Sonsonate', '7843-0943', '02353423-4', 22, 6, 1),
('MESA191', 'Marcela Elizabeth Sánchez Alvarado', '2001-12-04', 'Santa Tecla, La libertad', '7834-3432', '98463403-1', 21, 1, 1);

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
('ADAO191', 'Alexis David Aguilar Olmedo', 'San Salvador, Ciudad Delgado, col. los eraldos 2', '7198-9423', '87653412-1', 'Hardware', '1995-05-01', 14, 1),
('AEDS195', 'Alirio Esaú Díaz Sosa', 'La Libertad, Quezaltepeque.', '7643-0895', '87875623-2', 'Hardware', '1994-03-27', 18, 1),
('DAAM194', 'Daniel Alexander Angel Morales', 'La Libertad, Playa el Majahual, col. la piraya 2', '7453-0954', '76503218-3', 'Hardware', '1999-05-05', 16, 1),
('EAAS192', 'Eduardo Antonio Aguilar Solórzano ', 'San Salvador, Mejicanos, Col. la gloria 2', '7634-2434', '76541234-3', 'Software', '2001-05-22', 15, 1),
('JCEP196', 'Juan Carlos Estrada Portillo', 'Sonsonate, Juayúa, col. conejos 3', '7674-8458', '87542098-2', 'Software', '2001-12-12', 19, 1),
('RACF193', 'Rocío Alejandra Chicas Fortis', 'La Libertad, Antiguo Cuscatlán', '7654-2442', '76540909-2', 'Hardware', '1999-05-21', 17, 1);

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
('Alexis', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'defecto.jpg', 'Tecnico', 14),
('Eduardo', '205cc2aec2c81df7397b1328ee09eabb508318b3b577089c186801dba5c505c9', 'eduardo.jpg', 'Tecnico', 15),
('Daniel', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'daniel.jpg', 'Tecnico', 16),
('Rocío', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'rocio.jpg', 'Tecnico', 17),
('Alirio', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'alirio.jpg', 'Tecnico', 18),
('JuanCa', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'juanca.jpg', 'Tecnico', 19),
('JoséV', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'usuario.jpg', 'Administrador', 20),
('Marcela', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'usuario1.jpg', 'Cliente', 21),
('Emanuel', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'usuario3.jpg', 'Cliente', 22),
('Esmeralda', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'usuario2.jpg', 'Cliente', 23),
('Nelson', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'defecto.jpg', 'Cliente', 24),
('Gracia', '09a31a7001e261ab1e056182a71d3cf57f582ca9a29cff5eb83be0f0549730a9', 'defecto.jpg', 'Cliente', 25),
('JhanCarlos', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'defecto.jpg', 'Tecnico', 26),
('Elena', '2bd5100f475915a8990f6a4b342ac161e5eb754581d81a4b6462843e63601ada', 'usuario6.jpg', 'Tecnico', 27);

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
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `idDiagnostico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  ADD CONSTRAINT `fk_diagnostico_tecnico` FOREIGN KEY (`idTecnico`) REFERENCES `tecnicos` (`idTecnico`),
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
