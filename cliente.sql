-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3300
-- Tiempo de generación: 05-01-2021 a las 22:36:39
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdci`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `idMatriz` int(11) NOT NULL,
  `idTecnologia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='La tabla cliente, brinda informacion basica de los clientes de la empresa.\nLos clientes estas asociados a una matriz (fkMatriz). ';

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `nombre`, `idMatriz`, `idTecnologia`) VALUES
(1, 'Fandeli', 3, 0),
(2, 'Dalton', 1, 0),
(3, 'Urrea', 2, 0),
(4, 'Perfect Choice', 1, 0),
(5, 'Prisa', 3, 0),
(6, 'Giddings', 1, 0),
(7, 'Jumapa', 1, 0),
(8, 'Mavi', 1, 0),
(9, 'Pumps', 1, 0),
(10, 'Golden', 1, 0),
(11, 'Iddea', 1, 0),
(12, 'Tecno lite', 1, 0),
(13, 'Farmacia Zamora ', 1, 0),
(14, 'BillPocket', 1, 0),
(15, 'Inverdesarrollos', 1, 0),
(16, 'Chocolatera', 1, 0),
(17, 'Ecosistema Morelos', 1, 0),
(18, 'Abarrotes Lupita', 1, 0),
(19, 'Sinci', 1, 0),
(20, 'Agromich', 1, 0),
(21, 'Nutec', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkCliente_idx` (`idMatriz`),
  ADD KEY `idTecnologia` (`idTecnologia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fkCliente` FOREIGN KEY (`idMatriz`) REFERENCES `matriz` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
