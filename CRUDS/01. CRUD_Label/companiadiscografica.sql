-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2022 a las 14:46:49
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `companiadiscografica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcompdisc`
--

CREATE TABLE `tblcompdisc` (
  `NumAlbum` varchar(5) NOT NULL,
  `NombLanzamiento` varchar(30) NOT NULL,
  `Artista` varchar(30) NOT NULL,
  `CompDiscografica` varchar(50) NOT NULL,
  `FechaIngreso` date NOT NULL,
  `ValorAlbum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tblcompdisc`
--

INSERT INTO `tblcompdisc` (`NumAlbum`, `NombLanzamiento`, `Artista`, `CompDiscografica`, `FechaIngreso`, `ValorAlbum`) VALUES
('011', 'Pole001', 'Oscar Mulero', 'PoleGroup', '2022-12-01', 100),
('90', 'SEM001', 'Kwartz', 'SEMANTICA', '2022-11-26', 75);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblcompdisc`
--
ALTER TABLE `tblcompdisc`
  ADD PRIMARY KEY (`NumAlbum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
