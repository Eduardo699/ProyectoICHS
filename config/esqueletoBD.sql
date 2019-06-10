-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2019 a las 02:12:42
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
-- Base de datos: `bdicsh`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `idArea` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `tipo` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombreCompleto` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `fechaNac` datetime NOT NULL,
  `direccion` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `dui` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `idDepto` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `idDepto` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `cantidadEmpleados` int(11) NOT NULL,
  `idArea` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `idDiagnostico` int(11) NOT NULL,
  `fechaAsignacion` datetime NOT NULL,
  `fechaCierre` datetime NOT NULL,
  `diagnostico` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `solucion` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `idTecnico` int(11) NOT NULL,
  `idTicket` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `estadoDiagnostico` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `idTecnico` int(11) NOT NULL,
  `nombreCompleto` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `dui` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `especialidad` varchar(8) COLLATE latin1_spanish_ci NOT NULL,
  `fechaNac` date NOT NULL,
  `userid` int(11) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `idTicket` int(11) NOT NULL,
  `fechaCreacion` datetime NOT NULL,
  `descripcion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `adjunto` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `idCliente` int(11) NOT NULL,
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
  `rol` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`username`, `password`, `avatar`, `rol`, `userid`) VALUES
('Alirio@gmail.com', '1234', 'usuario1.jpg', 1, 1),
('cafesosogmailcom', '123456', 'perfil.jpg', 2, 2),
('mariano@gmail.com', 'mariano123', 'defecto.jpg', 1, 4),
('cesar@gmail.com', 'cesar123', 'user5.jpg', 3, 5),
('mario@gmail.com', 'mario123', 'user4.jpg', 2, 6),
('carlosestrada482@gmail.com', '123456', 'usuario1.jpg', 2, 7),
('daniel@gmailcom', '123456', '3df127c3f9a76ad11a1b2202b2be7df2.jpg', 1, 8),
('', '', 'defecto.jpg', 0, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idArea`);

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
  ADD KEY `fk_cliente_depto` (`idDepto`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`idDepto`),
  ADD KEY `fk_depto_area` (`idArea`);

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
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `idArea` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `idDepto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `diagnostico`
--
ALTER TABLE `diagnostico`
  MODIFY `idDiagnostico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  MODIFY `idTecnico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_depto` FOREIGN KEY (`idDepto`) REFERENCES `departamento` (`idDepto`),
  ADD CONSTRAINT `fk_cliente_usuario` FOREIGN KEY (`userid`) REFERENCES `usuario` (`userid`);

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `fk_depto_area` FOREIGN KEY (`idArea`) REFERENCES `area` (`idArea`);

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
