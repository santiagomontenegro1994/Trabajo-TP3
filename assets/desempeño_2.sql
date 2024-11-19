-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2024 a las 00:02:31
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `desempeño_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `idDestino` int(11) NOT NULL,
  `denominación` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`idDestino`, `denominación`) VALUES
(1, 'Rio Primero'),
(2, 'Capilla del Monte'),
(3, 'San Francisco'),
(4, 'Morteros'),
(5, 'Toledo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `idMarca` int(11) NOT NULL,
  `denominación` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`idMarca`, `denominación`) VALUES
(1, 'Iveco'),
(2, 'Volskwagen'),
(3, 'Volvo'),
(4, 'Scania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `idNivel` int(11) NOT NULL,
  `denominación` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`idNivel`, `denominación`) VALUES
(1, 'Admin'),
(2, 'Operador'),
(3, 'Chofer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `idTipo` int(11) NOT NULL,
  `denominación` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idTipo`, `denominación`) VALUES
(1, 'Utilitario'),
(2, 'Camión sin acoplado'),
(3, 'Camión con acoplado'),
(4, 'Camioneta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportes`
--

CREATE TABLE `transportes` (
  `idTransporte` int(11) NOT NULL,
  `idMarca` int(11) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `idTipo` int(4) NOT NULL,
  `patente` char(7) NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `fechaCarga` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `transportes`
--

INSERT INTO `transportes` (`idTransporte`, `idMarca`, `modelo`, `idTipo`, `patente`, `disponible`, `fechaCarga`) VALUES
(1, 1, 'abc123', 1, 'AC206JK', 1, '2024-11-10'),
(2, 1, 'abc123', 2, 'AA322CX', 1, '2024-11-10'),
(3, 4, 'abc123', 3, 'AC506AA', 1, '2024-11-10'),
(4, 4, 'abc123', 3, 'AA322CJ', 1, '2024-11-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `dni` char(8) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `idNivel` int(11) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `apellido`, `nombre`, `dni`, `usuario`, `clave`, `activo`, `idNivel`, `fechaCreacion`, `imagen`) VALUES
(1, 'Montenegro', 'Santiago', '38412494', 'santiago@gmail.com', '12345', 1, 1, '2024-11-09', 'profile-img.jpg'),
(2, 'Miranda', 'Lourdes', '42021012', 'lourdes@gmail.com', '12345', 1, 1, '2024-11-10', 'bombon.jpg'),
(3, 'Perez', 'Juan', '34253261', 'operador@gmail.com', '12345', 1, 2, '2024-11-11', 'messages-3.jpg'),
(4, 'Lopez', 'Jorge', '42563152', 'chofer@gmail.com', '12345', 1, 3, '2024-11-09', 'bellota.jpg'),
(5, 'Alvarez', 'Marcos', '15326124', 'alvarezmarcos@gmail.com', '12345', 1, 3, '2024-11-10', 'bellota.jpg'),
(6, 'Zapata', 'Joaquin', '12456532', 'zapatajoaquin@gmail.com', '12345', 1, 3, '2024-11-10', 'bellota.jpg'),
(7, 'Rodriguez', 'Ariel', '12453254', 'rodriguezariel@gmail.com', '12345', 1, 3, '2024-11-10', 'bellota.jpg'),
(8, 'Perez', 'Juan', '41523654', 'perezjuan@gmail.com', '12345', 1, 3, '2024-11-10', 'bellota.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `idViaje` int(11) NOT NULL,
  `idUsuarioChofer` int(11) NOT NULL,
  `idTransporte` int(11) NOT NULL,
  `fechaViaje` date NOT NULL,
  `idDestino` int(11) NOT NULL,
  `fechaCreacion` date NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `costo` float NOT NULL,
  `porcentajeChofer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`idViaje`, `idUsuarioChofer`, `idTransporte`, `fechaViaje`, `idDestino`, `fechaCreacion`, `idUsuario`, `costo`, `porcentajeChofer`) VALUES
(1, 5, 1, '2024-11-02', 4, '2024-11-10', 1, 300000, 10),
(2, 6, 2, '2024-11-03', 2, '2024-11-10', 1, 250000, 10),
(3, 7, 3, '2024-11-03', 1, '2024-11-10', 2, 200000, 10),
(4, 8, 3, '2024-11-04', 5, '2024-11-10', 1, 250000, 20),
(5, 5, 1, '2024-11-05', 5, '2024-11-10', 1, 100000, 10),
(6, 8, 4, '2024-11-05', 4, '2024-11-10', 1, 550000, 20),
(7, 6, 4, '2024-11-10', 2, '2024-11-10', 2, 550000, 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`idDestino`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`idNivel`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `transportes`
--
ALTER TABLE `transportes`
  ADD PRIMARY KEY (`idTransporte`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`idViaje`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `idDestino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `idNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `transportes`
--
ALTER TABLE `transportes`
  MODIFY `idTransporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `idViaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
