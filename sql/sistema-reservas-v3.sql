-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-05-2017 a las 08:39:26
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
('2017-04-01', 1, 'Normal'),
('2017-04-02', 1, 'Normal'),
('2017-05-01', 1, 'Normal'),
('2017-05-02', 1, 'Normal'),
('2017-05-03', 1, 'Normal'),
('2017-05-04', 1, 'Normal'),
('2017-05-05', 1, 'Normal'),
('2017-05-06', 1, 'Normal'),
('2017-05-07', 1, 'Normal'),
('2017-05-08', 1, 'Normal'),
('2017-05-09', 1, 'Normal'),
('2017-05-10', 1, 'Normal'),
('2017-05-11', 1, 'Normal'),
('2017-05-12', 1, 'Normal'),
('2017-05-13', 1, 'Normal'),
('2017-05-14', 1, 'Normal'),
('2017-05-15', 1, 'Normal'),
('2017-05-16', 1, 'Normal'),
('2017-05-17', 1, 'Normal'),
('2017-05-18', 1, 'Normal'),
('2017-05-19', 1, 'Normal'),
('2017-05-20', 1, 'Normal'),
('2017-05-21', 1, 'Normal'),
('2017-05-22', 1, 'Normal'),
('2017-05-23', 1, 'Normal'),
('2017-05-24', 1, 'Normal'),
('2017-05-25', 1, 'Normal'),
('2017-05-26', 1, 'Normal'),
('2017-05-27', 1, 'Normal'),
('2017-05-28', 1, 'Normal'),
('2017-05-29', 1, 'Normal'),
('2017-05-30', 1, 'Normal'),
('2017-05-31', 1, 'Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_fecha` date NOT NULL,
  `id_horas` int(11) NOT NULL,
  `id_ambiente` int(11) NOT NULL,
  `id_reserva` int(11) DEFAULT NULL,
  `estado` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_fecha`, `id_horas`, `id_ambiente`, `id_reserva`, `estado`) VALUES
('2017-05-16', 1, 1, NULL, 'Libre'),
('2017-05-16', 2, 1, NULL, 'Libre'),
('2017-05-16', 3, 1, NULL, 'Libre'),
('2017-05-16', 4, 1, NULL, 'Libre'),
('2017-05-16', 5, 1, NULL, 'Libre'),
('2017-05-16', 6, 1, NULL, 'Libre'),
('2017-05-16', 7, 1, NULL, 'Libre'),
('2017-05-16', 8, 1, NULL, 'Libre'),
('2017-05-16', 9, 1, NULL, 'Libre'),
('2017-05-16', 10, 1, NULL, 'Libre'),
('2017-05-16', 11, 1, NULL, 'Libre'),
('2017-05-17', 1, 1, NULL, 'Libre'),
('2017-05-17', 2, 1, NULL, 'Libre'),
('2017-05-17', 3, 1, NULL, 'Libre'),
('2017-05-17', 4, 1, NULL, 'Libre'),
('2017-05-17', 5, 1, NULL, 'Libre'),
('2017-05-17', 6, 1, NULL, 'Libre'),
('2017-05-17', 7, 1, NULL, 'Libre'),
('2017-05-17', 8, 1, NULL, 'Libre'),
('2017-05-17', 9, 1, NULL, 'Libre'),
('2017-05-17', 10, 1, NULL, 'Libre'),
('2017-05-17', 11, 1, NULL, 'Libre'),
('2017-05-18', 1, 1, NULL, 'Libre'),
('2017-05-18', 2, 1, NULL, 'Libre'),
('2017-05-18', 3, 1, NULL, 'Libre'),
('2017-05-18', 4, 1, NULL, 'Libre'),
('2017-05-18', 5, 1, NULL, 'Libre'),
('2017-05-18', 6, 1, NULL, 'Libre'),
('2017-05-18', 7, 1, NULL, 'Libre'),
('2017-05-18', 8, 1, NULL, 'Libre'),
('2017-05-18', 9, 1, NULL, 'Libre'),
('2017-05-18', 10, 1, NULL, 'Libre'),
('2017-05-18', 11, 1, NULL, 'Libre'),
('2017-05-19', 1, 1, NULL, 'Libre'),
('2017-05-19', 2, 1, NULL, 'Libre'),
('2017-05-19', 3, 1, NULL, 'Libre'),
('2017-05-19', 4, 1, NULL, 'Libre'),
('2017-05-19', 5, 1, NULL, 'Libre'),
('2017-05-19', 6, 1, NULL, 'Libre'),
('2017-05-19', 7, 1, NULL, 'Libre'),
('2017-05-19', 8, 1, NULL, 'Libre'),
('2017-05-19', 9, 1, NULL, 'Libre'),
('2017-05-19', 10, 1, NULL, 'Libre'),
('2017-05-19', 11, 1, NULL, 'Libre'),
('2017-05-20', 1, 1, NULL, 'Libre'),
('2017-05-20', 2, 1, NULL, 'Libre'),
('2017-05-20', 3, 1, NULL, 'Libre'),
('2017-05-20', 4, 1, NULL, 'Libre'),
('2017-05-20', 5, 1, NULL, 'Libre'),
('2017-05-20', 6, 1, NULL, 'Libre'),
('2017-05-20', 7, 1, NULL, 'Libre'),
('2017-05-20', 8, 1, NULL, 'Libre'),
('2017-05-20', 9, 1, NULL, 'Libre'),
('2017-05-20', 10, 1, NULL, 'Libre'),
('2017-05-20', 11, 1, NULL, 'Libre'),
('2017-05-21', 1, 1, NULL, 'Libre'),
('2017-05-21', 2, 1, NULL, 'Libre'),
('2017-05-21', 3, 1, NULL, 'Libre'),
('2017-05-21', 4, 1, NULL, 'Libre'),
('2017-05-21', 5, 1, NULL, 'Libre'),
('2017-05-21', 6, 1, NULL, 'Libre'),
('2017-05-21', 7, 1, NULL, 'Libre'),
('2017-05-21', 8, 1, NULL, 'Libre'),
('2017-05-21', 9, 1, NULL, 'Libre'),
('2017-05-21', 10, 1, NULL, 'Libre'),
('2017-05-21', 11, 1, NULL, 'Libre'),
('2017-05-22', 1, 1, NULL, 'Libre'),
('2017-05-22', 2, 1, NULL, 'Libre'),
('2017-05-22', 3, 1, NULL, 'Libre'),
('2017-05-22', 4, 1, NULL, 'Libre'),
('2017-05-22', 5, 1, NULL, 'Libre'),
('2017-05-22', 6, 1, NULL, 'Libre'),
('2017-05-22', 7, 1, NULL, 'Libre'),
('2017-05-22', 8, 1, NULL, 'Libre'),
('2017-05-22', 9, 1, NULL, 'Libre'),
('2017-05-22', 10, 1, NULL, 'Libre'),
('2017-05-22', 11, 1, NULL, 'Libre');

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

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre`, `horas`, `nivel`) VALUES
(1, 'Calculo I', NULL, NULL),
(3, 'Calculo II', NULL, NULL),
(4, 'Calculo III', NULL, NULL),
(5, 'Calculo IV', NULL, NULL),
(6, 'Algebra I', '30', '1'),
(7, 'Algebra II', '30', '1'),
(8, 'Fisica I', '30', '1'),
(9, 'Fisica II', '30', '1'),
(10, 'Fisica III', '30', '1'),
(11, 'Algebra I', '30', '1');

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
-- Estructura de tabla para la tabla `tipo_reserva`
--

CREATE TABLE `tipo_reserva` (
  `id_tipo_reserva` int(11) UNSIGNED NOT NULL,
  `tipo` enum('examen','congreso','seminario','curso','charla','otro') NOT NULL,
  `max_nro_periodos` int(11) UNSIGNED NOT NULL,
  `min_nro_participantes` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_reserva`
--

INSERT INTO `tipo_reserva` (`id_tipo_reserva`, `tipo`, `max_nro_periodos`, `min_nro_participantes`) VALUES
(1, 'examen', 3, 50),
(2, 'congreso', 2, 50),
(3, 'seminario', 1, 79),
(4, 'curso', 2, 50),
(5, 'charla', 2, 50),
(6, 'otro', 2, 50);

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
(1, 'Alexander', 'Reinaga', 'Lopez', 'alexsof9@gmail.com', 'alexsof', '$2y$10$fHb4L5UWbNr3cMG0MiHvT.12rrgbpsstqejxT6oygGljLFylTEGn6', 'administrador', '2017-04-29 10:35:28', '2017-04-29 10:35:28', 'BCVwqEhUO4GQU9mx1KIg9CcvpaCZqVucSy4fxFiwouZsVSZChPuBV6xd5V6I', NULL),
(6, 'Martina', 'Carrasco', 'Verduguez', 'martiv@gmail.com', 'marti78', '$2y$10$J7E4yedHtjJRhY6J/xp6d.5h1/32O63h5RPJiezLjl9aFIwa8uOF6', 'autorizado', '2017-04-29 10:35:28', '2017-04-29 10:35:28', '3lKdOgDnzmqcztxoqkzK7vPLDj4d4teT90eD2V9BkpkleCyNaN6id5wZJscs', NULL),
(7, 'Diego', 'Villarroel', 'Solis', 'diego.villarroel@outlook.com', 'diego.villarroel@outlook.com', '$2y$10$resr0iV.12C9lZ3hmHHg/OZEglNz78y2CsRoAD4xNNYCcnirj.QKW', 'autorizado', '2017-05-01 18:56:35', '2017-05-01 18:56:35', NULL, NULL),
(14, 'Boris', 'calancha', 'navia', 'boris@gmail.com', 'boris', '$2y$10$s/pl1zzW8wnruud9okx7IOnNeVVmq4c5IG/JYJU6yjRycUvNmcyCG', 'docente', '2017-05-02 06:26:18', '2017-05-02 06:26:18', '4GTOb0J8J1pxfJIQGITynBsGDqZ7NYO9V61g0eTkDGGKXV2MwjxDziIueS5b', NULL),
(15, 'Leticia', 'Blanco', 'Coca', 'leti@gmail.com', 'leticia', '$2y$10$eZn0HHJCkqtxRTnWZMjog.Ka8m.S2M8oJ/M77ZahjpMiD1X6zKJfy', 'docente', '2017-05-02 08:05:58', '2017-05-02 08:05:58', '05SQTbBmIgAeDp6CBCGXPJrJpNST7woiIx5nnfcpScGgFgPAequdkez6QL9I', NULL),
(16, 'Patricia', 'Romero', 'Bilbao', 'patricia@gmail.com', 'patricia', '$2y$10$Ytk1GoACuvSxZE43W1yaA.Oe7uaefvtcj6vJBWx65s2b2CYC8wNZq', 'docente', '2017-05-02 08:05:59', '2017-05-02 08:05:59', NULL, NULL),
(17, 'Raul', 'Martinez', 'Martinez', 'ivanuc19@gmail.com', 'ivanuc19@gmail.com', '$2y$10$gzf.dMe4KwtdKUEAFeMSNe44xSWsYIVLRl2CvMHEJ9bLrjAqwrH9S', 'administrador', '2017-05-09 18:25:06', '2017-05-09 18:25:06', NULL, NULL),
(18, 'Ever', 'Camacho', 'Camacho', 'correo_prueva@yopmail.com', 'correo_prueva@yopmail.com', '$2y$10$yuyjezdGkMcrPjCXPcl2GODH8A2MyzY4dJq89L3QolyhF8IExm73m', 'autorizado', '2017-05-09 18:25:33', '2017-05-09 18:25:33', NULL, NULL),
(19, 'rene', 'gutierrez', 'rodriguez', 'renetlgr@gmail.com', 'renetlgr@gmail.com', '$2y$10$bsSe3JuTzOrLlvY8O9P5.eYo45UCT2DfH5iP8CT7Lugp5MtoDbRwC', 'docente', '2017-05-09 19:06:53', '2017-05-09 19:06:53', NULL, NULL),
(20, 'mauricio', 'gutierrez', 'rodriguez', 'renelgutierrezrodriguez@gmail.com', 'renelgutierrezrodriguez@gmail.com', '$2y$10$F.JJMWCHnN1aovnMxcxc9.5VYyg50tvNtPExIzZCjjbhGf7eqOzcy', 'docente', '2017-05-09 19:06:58', '2017-05-09 19:06:58', NULL, NULL),
(21, 'Jhonny', 'gutierrez', 'rodriguez', 'la_rana_rene_@hotmai.com', 'la_rana_rene_@hotmai.com', '$2y$10$FCVE.Sliriaakkc9zD/X2u2flQqE5cZWFhJkSaEDfTRe/p8/a7Ebq', 'docente', '2017-05-09 19:07:04', '2017-05-09 19:07:04', NULL, NULL);

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
-- Volcado de datos para la tabla `usuario_materia`
--

INSERT INTO `usuario_materia` (`id_usuario_materia`, `id_usuario`, `id_materia`, `grupo`, `numero_inscritos`) VALUES
(1, 14, 1, 1, 40),
(3, 14, 3, 2, 40),
(4, 14, 4, 5, 30),
(5, 16, 1, 3, NULL),
(6, 14, 3, 6, 30),
(7, 14, 4, 1, 30),
(8, 15, 6, 8, 50),
(9, 16, 6, 1, 30),
(10, 16, 7, 10, 30),
(11, 16, 8, 2, 30),
(12, 15, 9, 1, 50);

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
-- Indices de la tabla `tipo_reserva`
--
ALTER TABLE `tipo_reserva`
  ADD PRIMARY KEY (`id_tipo_reserva`);

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
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT de la tabla `tipo_reserva`
--
ALTER TABLE `tipo_reserva`
  MODIFY `id_tipo_reserva` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
