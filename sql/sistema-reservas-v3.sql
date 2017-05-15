-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2017 a las 07:19:57
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema-reservas-v3`
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

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `id_reserva`, `tipo`, `descripcion`, `id_usuario_materia`) VALUES
(1, 4, NULL, NULL, 4),
(2, 4, NULL, NULL, 4),
(3, 4, NULL, NULL, 4),
(4, 4, NULL, NULL, 4),
(5, 4, NULL, NULL, 4),
(6, 5, NULL, NULL, 5),
(7, 5, NULL, NULL, 5),
(8, 28, '2', 'Descripcion pequeña', NULL),
(9, 29, '0', 'asdfaseasef', NULL),
(10, 30, 'Cursos', 'cursoso sdsad', NULL),
(11, 31, 'Cursos', 'cursoso sdsad', NULL),
(12, 32, 'Charlas', 'charla siobreasdfasdf', NULL),
(13, 33, 'otros', 'erdgsgdsf', NULL),
(14, 34, NULL, NULL, NULL),
(15, 5, NULL, NULL, 5),
(16, 35, NULL, NULL, NULL),
(17, 5, NULL, NULL, 5),
(18, 36, NULL, NULL, NULL),
(19, 5, NULL, NULL, 5),
(20, 37, 'Charlas', 'dfasdfasdfasdf', NULL),
(21, 38, NULL, NULL, NULL),
(22, 5, NULL, NULL, 5);

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
('2017-05-03', 1, 'Normal');

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
('2017-04-01', 2, 1, 10, 'Ocupado'),
('2017-04-01', 3, 1, 10, 'Libre'),
('2017-04-01', 4, 1, 9, 'Libre'),
('2017-04-01', 5, 1, 9, 'Ocupado'),
('2017-04-01', 6, 1, 4, 'Ocupado'),
('2017-04-01', 8, 1, 4, 'Ocupado'),
('2017-04-01', 9, 1, 15, 'Ocupado'),
('2017-04-01', 10, 1, 15, 'Ocupado'),
('2017-04-01', 11, 1, 3, 'Ocupado'),
('2017-04-02', 1, 1, 11, 'Ocupado'),
('2017-04-02', 2, 1, 11, 'Ocupado'),
('2017-04-02', 3, 1, 5, 'Ocupado'),
('2017-04-02', 4, 1, 6, 'Ocupado'),
('2017-04-02', 5, 1, 6, 'Ocupado'),
('2017-04-02', 6, 1, 5, 'Ocupado'),
('2017-04-02', 7, 1, 5, 'Libre'),
('2017-04-02', 8, 1, NULL, 'Libre'),
('2017-04-02', 9, 1, NULL, 'Libre'),
('2017-04-02', 10, 1, NULL, 'Libre'),
('2017-04-02', 11, 1, NULL, 'Libre'),
('2017-05-01', 1, 1, 25, 'Libre'),
('2017-05-01', 2, 1, 27, 'Ocupado'),
('2017-05-01', 3, 1, 27, 'Ocupado'),
('2017-05-01', 4, 1, 22, 'Ocupado'),
('2017-05-01', 5, 1, 21, 'Ocupado'),
('2017-05-01', 6, 1, 20, 'Ocupado'),
('2017-05-01', 7, 1, 19, 'Ocupado'),
('2017-05-01', 8, 1, 18, 'Ocupado'),
('2017-05-01', 9, 1, 16, 'Ocupado'),
('2017-05-01', 10, 1, 16, 'Ocupado'),
('2017-05-01', 11, 1, 16, 'Ocupado'),
('2017-05-03', 1, 1, 29, 'Ocupado'),
('2017-05-03', 2, 1, 31, 'Ocupado'),
('2017-05-03', 3, 1, 32, 'Ocupado'),
('2017-05-03', 4, 1, 33, 'Ocupado'),
('2017-05-03', 5, 1, 33, 'Ocupado'),
('2017-05-03', 6, 1, 34, 'Ocupado'),
('2017-05-03', 7, 1, 35, 'Ocupado'),
('2017-05-03', 8, 1, 36, 'Ocupado'),
('2017-05-03', 9, 1, 37, 'Ocupado'),
('2017-05-03', 10, 1, 38, 'Ocupado'),
('2017-05-03', 11, 1, NULL, 'Libre');

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
(5, 'Calculo IV', NULL, NULL);

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

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `id_usuario`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(26, 1),
(27, 1),
(29, 2),
(30, 2),
(31, 2),
(32, 2),
(33, 2),
(37, 2),
(24, 6),
(25, 6),
(28, 6),
(19, 7),
(20, 7),
(21, 7),
(22, 7),
(23, 7),
(34, 8),
(35, 8),
(36, 8),
(38, 8);

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
(1, 'Alexander', 'Reinaga', 'Lopez', 'alexsof9@gmail.com', 'alexsof', '$2y$10$fHb4L5UWbNr3cMG0MiHvT.12rrgbpsstqejxT6oygGljLFylTEGn6', 'administrador', '2017-04-29 10:35:28', '2017-04-29 10:35:28', '7sKicxJ9L1EeAktTCjh8ilaFMWAoD4f8ZAR3rwRpckmaXRjOB4geNgaoALWy', NULL),
(2, 'Carlos', 'Romero', 'Vargas', 'crv@gmail.com', 'carlos7', '$2y$10$53PGjlvjhMW60G4vCTzfX.4oBtV551NzJjRZAT4JA9YR6nhm3VOvu', 'autorizado', '2017-04-29 10:35:28', '2017-04-29 10:35:28', 'y4Y5WpSgEZzQQ1C8sE2YJySnM8wscytBajpcWJVOuhBZ1ZW0AcF60pdapodv', NULL),
(3, 'Valentina', 'Caceres', 'Villanueva', 'vcv@gmail.com', 'vale89', '$2y$10$Ijg.bQzfdNjtt0tdXecKc.ULKIH6662fyPMgfJKl5jtWkN1iy45PO', 'autorizado', '2017-04-29 10:35:28', '2017-04-29 10:35:28', NULL, NULL),
(4, 'Marcelo', 'Lopez', 'chavez', 'mlc9@gmail.com', 'marce09', '$2y$10$wnTqhXB4cso14EOdgqU3L.itdeZJ1yj7eOSbFq84tguYlE7WE/xnG', 'autorizado', '2017-04-29 10:35:28', '2017-04-29 10:35:28', 'bP6zm6DyUlZzRP7NR0F3igBptFxnVKuuhE1j6Q4rqFp1gvaWVjbfoCZEAVW1', NULL),
(5, 'Juan Pablo', 'Mendoza', 'Acha', 'jpm@gmail.com', 'juanp', '$2y$10$yiLVkVicYvjmZzaykp4Wp.K0pCZBRrrFWCXXIxft4vYfkdh9XAS1C', 'autorizado', '2017-04-29 10:35:28', '2017-04-29 10:35:28', NULL, NULL),
(6, 'Martina', 'Carrasco', 'Verduguez', 'martiv@gmail.com', 'marti78', '$2y$10$J7E4yedHtjJRhY6J/xp6d.5h1/32O63h5RPJiezLjl9aFIwa8uOF6', 'autorizado', '2017-04-29 10:35:28', '2017-04-29 10:35:28', 'SblDjaVCMRLvTuU4mloJdjGzYpPOG9eeBG0IR8r48xO5Nx2rbjp8vtg9sdIJ', NULL),
(7, 'Diego', 'Villarroel', 'Solis', 'diego.villarroel@outlook.com', 'diego.villarroel@outlook.com', '$2y$10$resr0iV.12C9lZ3hmHHg/OZEglNz78y2CsRoAD4xNNYCcnirj.QKW', 'autorizado', '2017-05-01 18:56:35', '2017-05-01 18:56:35', NULL, NULL),
(8, 'boris', 'calanccha', 'asdfa', 'boris2222@yopmail.com', 'boris', '$2y$10$hrnOSBkdxdnt/dDRhVD8NOMKU7M3b3xDwJrk7/Mi9WTuq1VFfjMai', 'docente', '2017-05-02 08:18:08', '2017-05-02 09:18:31', 'IizDyxkbMno7ApFjjzVJIEOYFQ99l2wgiY8kE8lRferjzjEPVF6hmgaBshXO', NULL);

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
(1, 7, 1, 1, 50),
(3, 7, 3, 1, 50),
(4, 7, 4, 1, 50),
(5, 8, 1, 3, NULL);

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
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tipo_reserva`
--
ALTER TABLE `tipo_reserva`
  ADD PRIMARY KEY (`id_tipo_reserva`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tipo_reserva`
--
ALTER TABLE `tipo_reserva`
  MODIFY `id_tipo_reserva` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
