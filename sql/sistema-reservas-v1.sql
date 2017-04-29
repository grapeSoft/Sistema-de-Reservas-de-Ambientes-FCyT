-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2017 a las 15:55:54
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema-reservas-v1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE `ambiente` (
  `id_ambiente` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `ubicacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`id_ambiente`, `nombre`, `ubicacion`) VALUES
(1, 'Auditorio', 'UMSS'),
(2, 'Laboratorio 1', 'UMSS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `id_calendario` int(11) NOT NULL,
  `gestion` varchar(10) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calendario`
--

INSERT INTO `calendario` (`id_calendario`, `gestion`, `fecha_inicio`, `fecha_fin`) VALUES
(1, '1-2017', '2017-04-01', '2017-04-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `id_reserva` int(11) NOT NULL,
  `tipo` char(32) DEFAULT NULL,
  `descripcion` char(32) DEFAULT NULL,
  `id_usuario_materia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `id_fecha` date NOT NULL,
  `id_calendario` int(11) NOT NULL,
  `tipo` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fecha`
--

INSERT INTO `fecha` (`id_fecha`, `id_calendario`, `tipo`) VALUES
('2017-04-01', 1, 'Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_fecha` date NOT NULL,
  `id_horas` int(11) NOT NULL,
  `id_ambiente` int(11) NOT NULL,
  `id_reserva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_fecha`, `id_horas`, `id_ambiente`, `id_reserva`) VALUES
('2017-04-01', 1, 1, NULL),
('2017-04-01', 2, 1, NULL),
('2017-04-01', 3, 1, NULL),
('2017-04-01', 4, 1, NULL),
('2017-04-01', 5, 1, NULL),
('2017-04-01', 6, 1, NULL),
('2017-04-01', 7, 1, NULL),
('2017-04-01', 8, 1, NULL),
('2017-04-01', 9, 1, NULL),
('2017-04-01', 10, 1, NULL),
('2017-04-01', 11, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `id_horas` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`id_horas`, `hora_inicio`, `hora_fin`) VALUES
(1, '06:45:00', '08:15:00'),
(2, '06:45:00', '08:15:00'),
(3, '08:15:00', '09:45:00'),
(4, '09:45:00', '11:15:00'),
(5, '11:15:00', '12:45:00'),
(6, '12:45:00', '14:15:00'),
(7, '14:15:00', '15:45:00'),
(8, '15:45:00', '17:15:00'),
(9, '17:15:00', '18:45:00'),
(10, '18:45:00', '20:15:00'),
(11, '20:15:00', '21:45:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `horas` varchar(20) DEFAULT NULL,
  `nivel` decimal(8,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_03_31_224000_create_tabla_usuarios', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(11) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('administrador','docente','autorizado') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido_paterno`, `apellido_materno`, `email`, `username`, `password`, `tipo`, `created_at`, `updated_at`, `remember_token`, `foto`) VALUES
(1, 'Alexander', 'Reinaga', 'Lopez', 'alexsof9@gmail.com', 'alexsof', '$2y$10$fHb4L5UWbNr3cMG0MiHvT.12rrgbpsstqejxT6oygGljLFylTEGn6', 'administrador', '2017-04-29 10:35:28', '2017-04-29 10:35:28', '1kZT4Ld8WA5NPnVp28wbi9W6MimssgHYgINj2sSSFmRqwgx0YBgDTm0kgA6s', NULL),
(2, 'Carlos', 'Romero', 'Vargas', 'crv@gmail.com', 'carlos7', '$2y$10$53PGjlvjhMW60G4vCTzfX.4oBtV551NzJjRZAT4JA9YR6nhm3VOvu', 'autorizado', '2017-04-29 10:35:28', '2017-04-29 10:35:28', NULL, NULL),
(3, 'Valentina', 'Caceres', 'Villanueva', 'vcv@gmail.com', 'vale89', '$2y$10$Ijg.bQzfdNjtt0tdXecKc.ULKIH6662fyPMgfJKl5jtWkN1iy45PO', 'autorizado', '2017-04-29 10:35:28', '2017-04-29 10:35:28', NULL, NULL),
(4, 'Marcelo', 'Lopez', 'chavez', 'mlc9@gmail.com', 'marce09', '$2y$10$wnTqhXB4cso14EOdgqU3L.itdeZJ1yj7eOSbFq84tguYlE7WE/xnG', 'autorizado', '2017-04-29 10:35:28', '2017-04-29 10:35:28', NULL, NULL),
(5, 'Juan Pablo', 'Mendoza', 'Acha', 'jpm@gmail.com', 'juanp', '$2y$10$yiLVkVicYvjmZzaykp4Wp.K0pCZBRrrFWCXXIxft4vYfkdh9XAS1C', 'autorizado', '2017-04-29 10:35:28', '2017-04-29 10:35:28', NULL, NULL),
(6, 'Martina', 'Carrasco', 'Verduguez', 'martiv@gmail.com', 'marti78', '$2y$10$J7E4yedHtjJRhY6J/xp6d.5h1/32O63h5RPJiezLjl9aFIwa8uOF6', 'autorizado', '2017-04-29 10:35:28', '2017-04-29 10:35:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_materia`
--

CREATE TABLE `usuario_materia` (
  `id_usuario_materia` int(11) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_materia` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `numero_inscritos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`id_ambiente`);

--
-- Indices de la tabla `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`id_calendario`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `FK_REFERENCE_15` (`id_usuario_materia`),
  ADD KEY `FK_RESERVA_EVENTO` (`id_reserva`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`id_fecha`),
  ADD KEY `FK_CALENDARIO_FECHA` (`id_calendario`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_fecha`,`id_horas`,`id_ambiente`),
  ADD KEY `FK_AMBIENTE_HORARIO` (`id_ambiente`),
  ADD KEY `FK_FECHA_HORARIO2` (`id_horas`),
  ADD KEY `FK_RESERVA_HORARIO` (`id_reserva`);

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`id_horas`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `FK_USUARIO_RESERVA` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuario_materia`
--
ALTER TABLE `usuario_materia`
  ADD PRIMARY KEY (`id_usuario_materia`),
  ADD KEY `FK_REFERENCE_14` (`id_materia`),
  ADD KEY `FK_REFERENCE_13` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FK_REFERENCE_15` FOREIGN KEY (`id_usuario_materia`) REFERENCES `usuario_materia` (`id_usuario_materia`),
  ADD CONSTRAINT `FK_RESERVA_EVENTO` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`);

--
-- Filtros para la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD CONSTRAINT `FK_CALENDARIO_FECHA` FOREIGN KEY (`id_calendario`) REFERENCES `calendario` (`id_calendario`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `FK_AMBIENTE_HORARIO` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`id_ambiente`),
  ADD CONSTRAINT `FK_FECHA_HORARIO` FOREIGN KEY (`id_fecha`) REFERENCES `fecha` (`id_fecha`),
  ADD CONSTRAINT `FK_FECHA_HORARIO2` FOREIGN KEY (`id_horas`) REFERENCES `horas` (`id_horas`),
  ADD CONSTRAINT `FK_RESERVA_HORARIO` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_USUARIO_RESERVA` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `usuario_materia`
--
ALTER TABLE `usuario_materia`
  ADD CONSTRAINT `FK_REFERENCE_13` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `FK_REFERENCE_14` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
