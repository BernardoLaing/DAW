-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2018 at 09:57 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jambe`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `idAutor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `autor_titulo`
--

CREATE TABLE `autor_titulo` (
  `idAutor` int(11) NOT NULL,
  `idTitulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credencial`
--

CREATE TABLE `credencial` (
  `idCredencial` int(11) NOT NULL,
  `idVisitante` int(11) NOT NULL,
  `fechaExpedicion` date NOT NULL,
  `foto` varchar(100) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombreTrabajo` varchar(50) NOT NULL,
  `telefonoTrabajo` varchar(12) NOT NULL,
  `coloniaTrabajo` varchar(50) NOT NULL,
  `calleTrabajo` varchar(50) NOT NULL,
  `numeroTrabajo` varchar(50) NOT NULL,
  `cpTrabajo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `credencial_fiador`
--

CREATE TABLE `credencial_fiador` (
  `idCredencial` int(11) NOT NULL,
  `idFiador` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ejemplar`
--

CREATE TABLE `ejemplar` (
  `idEjemplar` int(11) NOT NULL,
  `ISBN` char(13) NOT NULL,
  `estante` varchar(10) NOT NULL,
  `editorial` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `volumen` int(11) DEFAULT NULL,
  `idTitulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `entrada`
--

CREATE TABLE `entrada` (
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idVisitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estado_ejemplar`
--

CREATE TABLE `estado_ejemplar` (
  `idEjemplar` int(11) NOT NULL,
  `idEstado` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fiador`
--

CREATE TABLE `fiador` (
  `idFiador` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `numero` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `nombreTrabajo` varchar(50) NOT NULL,
  `telefonoTrabajo` varchar(12) NOT NULL,
  `coloniaTrabajo` varchar(50) NOT NULL,
  `calleTrabajo` varchar(50) NOT NULL,
  `numeroTrabajo` varchar(50) NOT NULL,
  `cpTrabajo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gradoestudios`
--

CREATE TABLE `gradoestudios` (
  `idGrado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `operacion`
--

CREATE TABLE `operacion` (
  `idOperacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prestamo`
--

CREATE TABLE `prestamo` (
  `idCredencial` int(11) NOT NULL,
  `idEjemplar` int(11) NOT NULL,
  `fechaPrestamo` date NOT NULL,
  `fechaDevolucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rol_operacion`
--

CREATE TABLE `rol_operacion` (
  `idOperacion` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sancion`
--

CREATE TABLE `sancion` (
  `idSancion` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `idVisitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `titulo`
--

CREATE TABLE `titulo` (
  `idTitulo` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `titulo_categoria`
--

CREATE TABLE `titulo_categoria` (
  `idTitulo` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(25) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario_rol`
--

CREATE TABLE `usuario_rol` (
  `idUsuario` varchar(25) NOT NULL,
  `idRol` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitante`
--

CREATE TABLE `visitante` (
  `idVisitante` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidoPaterno` varchar(50) NOT NULL,
  `apellidoMaterno` varchar(50) DEFAULT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitante_gradoestudios`
--

CREATE TABLE `visitante_gradoestudios` (
  `idVisitante` int(11) NOT NULL,
  `idGrado` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indexes for table `autor_titulo`
--
ALTER TABLE `autor_titulo`
  ADD PRIMARY KEY (`idAutor`,`idTitulo`),
  ADD KEY `idAutor` (`idAutor`),
  ADD KEY `idTitulo` (`idTitulo`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indexes for table `credencial`
--
ALTER TABLE `credencial`
  ADD PRIMARY KEY (`idCredencial`),
  ADD KEY `idVisitante` (`idVisitante`);

--
-- Indexes for table `credencial_fiador`
--
ALTER TABLE `credencial_fiador`
  ADD PRIMARY KEY (`idCredencial`,`idFiador`,`fecha`),
  ADD KEY `idCredencial` (`idCredencial`),
  ADD KEY `idFiador` (`idFiador`);

--
-- Indexes for table `ejemplar`
--
ALTER TABLE `ejemplar`
  ADD PRIMARY KEY (`idEjemplar`),
  ADD KEY `idTitulo` (`idTitulo`);

--
-- Indexes for table `entrada`
--
ALTER TABLE `entrada`
  ADD PRIMARY KEY (`timestamp`,`idVisitante`),
  ADD KEY `idVisitante` (`idVisitante`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indexes for table `estado_ejemplar`
--
ALTER TABLE `estado_ejemplar`
  ADD PRIMARY KEY (`idEjemplar`,`idEstado`,`fecha`),
  ADD KEY `idEjemplar` (`idEjemplar`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indexes for table `fiador`
--
ALTER TABLE `fiador`
  ADD PRIMARY KEY (`idFiador`);

--
-- Indexes for table `gradoestudios`
--
ALTER TABLE `gradoestudios`
  ADD PRIMARY KEY (`idGrado`);

--
-- Indexes for table `operacion`
--
ALTER TABLE `operacion`
  ADD PRIMARY KEY (`idOperacion`);

--
-- Indexes for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`idCredencial`,`idEjemplar`,`fechaPrestamo`),
  ADD KEY `idCredencial` (`idCredencial`),
  ADD KEY `idEjemplar` (`idEjemplar`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indexes for table `rol_operacion`
--
ALTER TABLE `rol_operacion`
  ADD PRIMARY KEY (`idOperacion`,`idRol`,`fecha`),
  ADD KEY `idOperacion` (`idOperacion`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `fecha` (`fecha`);

--
-- Indexes for table `sancion`
--
ALTER TABLE `sancion`
  ADD PRIMARY KEY (`idSancion`),
  ADD KEY `idVisitante` (`idVisitante`);

--
-- Indexes for table `titulo`
--
ALTER TABLE `titulo`
  ADD PRIMARY KEY (`idTitulo`);

--
-- Indexes for table `titulo_categoria`
--
ALTER TABLE `titulo_categoria`
  ADD PRIMARY KEY (`idTitulo`,`idCategoria`),
  ADD KEY `idTitulo` (`idTitulo`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);

--
-- Indexes for table `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD PRIMARY KEY (`idUsuario`,`idRol`,`fecha`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- Indexes for table `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`idVisitante`);

--
-- Indexes for table `visitante_gradoestudios`
--
ALTER TABLE `visitante_gradoestudios`
  ADD PRIMARY KEY (`idVisitante`,`idGrado`,`fecha`),
  ADD KEY `idVisitante` (`idVisitante`),
  ADD KEY `idGrado` (`idGrado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `credencial`
--
ALTER TABLE `credencial`
  MODIFY `idCredencial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ejemplar`
--
ALTER TABLE `ejemplar`
  MODIFY `idEjemplar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fiador`
--
ALTER TABLE `fiador`
  MODIFY `idFiador` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gradoestudios`
--
ALTER TABLE `gradoestudios`
  MODIFY `idGrado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `operacion`
--
ALTER TABLE `operacion`
  MODIFY `idOperacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sancion`
--
ALTER TABLE `sancion`
  MODIFY `idSancion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `titulo`
--
ALTER TABLE `titulo`
  MODIFY `idTitulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `visitante`
--
ALTER TABLE `visitante`
  MODIFY `idVisitante` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `autor_titulo`
--
ALTER TABLE `autor_titulo`
  ADD CONSTRAINT `fkAutor` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`),
  ADD CONSTRAINT `fkTituloAutor` FOREIGN KEY (`idTitulo`) REFERENCES `titulo` (`idTitulo`);

--
-- Constraints for table `credencial_fiador`
--
ALTER TABLE `credencial_fiador`
  ADD CONSTRAINT `fkCredencial` FOREIGN KEY (`idCredencial`) REFERENCES `credencial` (`idCredencial`),
  ADD CONSTRAINT `fkFiador` FOREIGN KEY (`idFiador`) REFERENCES `fiador` (`idFiador`);

--
-- Constraints for table `ejemplar`
--
ALTER TABLE `ejemplar`
  ADD CONSTRAINT `fkTituloEjemplar` FOREIGN KEY (`idTitulo`) REFERENCES `titulo` (`idTitulo`);

--
-- Constraints for table `entrada`
--
ALTER TABLE `entrada`
  ADD CONSTRAINT `fkVisitanteEntra` FOREIGN KEY (`idVisitante`) REFERENCES `visitante` (`idVisitante`);

--
-- Constraints for table `estado_ejemplar`
--
ALTER TABLE `estado_ejemplar`
  ADD CONSTRAINT `fkEjemplar` FOREIGN KEY (`idEjemplar`) REFERENCES `ejemplar` (`idEjemplar`),
  ADD CONSTRAINT `fkEstado` FOREIGN KEY (`idEstado`) REFERENCES `estado` (`idEstado`);

--
-- Constraints for table `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `fkPrestamoCredencial` FOREIGN KEY (`idCredencial`) REFERENCES `credencial` (`idCredencial`),
  ADD CONSTRAINT `fkPrestamoEjemplar` FOREIGN KEY (`idEjemplar`) REFERENCES `ejemplar` (`idEjemplar`);

--
-- Constraints for table `rol_operacion`
--
ALTER TABLE `rol_operacion`
  ADD CONSTRAINT `fkOperacion` FOREIGN KEY (`idOperacion`) REFERENCES `operacion` (`idOperacion`),
  ADD CONSTRAINT `foreignKeyRol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);

--
-- Constraints for table `sancion`
--
ALTER TABLE `sancion`
  ADD CONSTRAINT `fkVisitanteSancion` FOREIGN KEY (`idVisitante`) REFERENCES `visitante` (`idVisitante`);

--
-- Constraints for table `titulo_categoria`
--
ALTER TABLE `titulo_categoria`
  ADD CONSTRAINT `fkCategoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `fkTitulo` FOREIGN KEY (`idTitulo`) REFERENCES `titulo` (`idTitulo`);

--
-- Constraints for table `usuario_rol`
--
ALTER TABLE `usuario_rol`
  ADD CONSTRAINT `fkRol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`),
  ADD CONSTRAINT `fkUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`usuario`);

--
-- Constraints for table `visitante_gradoestudios`
--
ALTER TABLE `visitante_gradoestudios`
  ADD CONSTRAINT `fkGrado` FOREIGN KEY (`idGrado`) REFERENCES `gradoestudios` (`idGrado`),
  ADD CONSTRAINT `fkVisitanteG` FOREIGN KEY (`idVisitante`) REFERENCES `visitante` (`idVisitante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
