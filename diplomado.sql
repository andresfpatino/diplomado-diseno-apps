-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-02-2018 a las 20:58:32
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diplomado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE `docente` (
  `id_docente` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `usuario` varchar(60) NOT NULL,
  `clave` varchar(60) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1',
  `foto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id_docente`, `nombre`, `usuario`, `clave`, `correo`, `estado`, `foto`) VALUES
(1, 'AndrÃ©s Felipe', 'Andres Felipe', '123456', 'andresf1395@hotmail.com', 1, ''),
(2, 'Camilo Moncada', 'CamiloMoncada', '123456', 'camilo@camilo.com', 1, ''),
(3, 'Felipe Ribon', 'FelipeRibon', '123456', 'ribonpipe@hotmail.com', 1, ''),
(4, 'juanito', 'juanito*', '123456', 'juancho@gmail.com', 1, ''),
(5, 'test', 'test', '123456', 'test@test.com', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `grado` varchar(60) NOT NULL,
  `grupo` varchar(60) NOT NULL,
  `foto` varchar(60) NOT NULL,
  `estado` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `nombre`, `correo`, `grado`, `grupo`, `foto`, `estado`) VALUES
(1, 'Pepito perez', 'pepitoperez@gmail.com', '6', '1', '../images/test.jpg', 1),
(2, 'Mariano montes', 'mariano@gmail.com', '7', '3', '../images/mariano.jpg', 1),
(3, 'Juliana marin', 'juli@hotmail.com', '8', '2', '../images/foto.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_notas` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `n1` float NOT NULL,
  `n2` float NOT NULL,
  `n3` float NOT NULL,
  `n4` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_notas`, `id_estudiante`, `n1`, `n2`, `n3`, `n4`) VALUES
(1, 1, 4.4, 5, 4.8, 1),
(2, 2, 2.1, 5, 4.2, 3.5),
(3, 3, 1.5, 3.1, 5, 4.3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_docente`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_notas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `docente`
--
ALTER TABLE `docente`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_notas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
