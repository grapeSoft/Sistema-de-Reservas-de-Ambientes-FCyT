-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2017 a las 18:09:26
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemareservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE `ambiente` (
  `id_ambiente` int(8) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `ubicacion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`id_ambiente`, `nombre`, `ubicacion`) VALUES
(1, 'Auditorio', 'UMSS'),
(2, 'Labo1', 'UMSS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendario`
--

CREATE TABLE `calendario` (
  `id_calendario` int(8) NOT NULL,
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
-- Estructura de tabla para la tabla `disponibilidad`
--

CREATE TABLE `disponibilidad` (
  `id_ambiente` int(8) NOT NULL,
  `id_horario` int(8) NOT NULL,
  `id_fecha` date NOT NULL,
  `estado` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `disponibilidad`
--

INSERT INTO `disponibilidad` (`id_ambiente`, `id_horario`, `id_fecha`, `estado`) VALUES
(1, 1, '2017-04-02', 'Libre'),
(1, 2, '2017-04-02', 'Libre'),
(1, 3, '2017-04-02', 'Libre'),
(1, 4, '2017-04-02', 'Libre'),
(1, 5, '2017-04-02', 'Libre'),
(1, 6, '2017-04-02', 'Libre'),
(1, 7, '2017-04-02', 'Libre'),
(1, 8, '2017-04-02', 'Libre'),
(1, 9, '2017-04-02', 'Libre'),
(1, 10, '2017-04-02', 'Libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(8) NOT NULL,
  `id_reserva` int(8) NOT NULL,
  `id_ambiente` int(8) NOT NULL,
  `tipo` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `id_fecha` date NOT NULL,
  `id_calendario` int(8) NOT NULL,
  `tipo` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fecha`
--

INSERT INTO `fecha` (`id_fecha`, `id_calendario`, `tipo`) VALUES
('2017-04-02', 1, 'Normal'),
('2017-04-03', 1, 'Normal'),
('2017-04-04', 1, 'Normal'),
('2017-04-05', 1, 'Normal'),
('2017-04-06', 1, 'Normal'),
('2017-04-07', 1, 'Normal'),
('2017-04-08', 1, 'Normal'),
('2017-04-09', 1, 'Normal'),
('2017-04-10', 1, 'Normal'),
('2017-04-11', 1, 'Normal'),
('2017-04-12', 1, 'Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha_horario`
--

CREATE TABLE `fecha_horario` (
  `id_fecha` date NOT NULL,
  `id_horario` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fecha_horario`
--

INSERT INTO `fecha_horario` (`id_fecha`, `id_horario`) VALUES
('2017-04-02', 1),
('2017-04-02', 2),
('2017-04-02', 3),
('2017-04-02', 4),
('2017-04-02', 5),
('2017-04-02', 6),
('2017-04-02', 7),
('2017-04-02', 8),
('2017-04-02', 9),
('2017-04-02', 10),
('2017-04-03', 1),
('2017-04-03', 3),
('2017-04-03', 4),
('2017-04-03', 5),
('2017-04-03', 7),
('2017-04-03', 8),
('2017-04-03', 9),
('2017-04-03', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_grupo` int(8) NOT NULL,
  `id_materia` int(8) NOT NULL,
  `numero` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_horario` int(8) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id_horario`, `hora_inicio`, `hora_fin`) VALUES
(1, '06:45:00', '08:15:00'),
(2, '08:15:00', '09:45:00'),
(3, '09:45:00', '11:15:00'),
(4, '11:15:00', '12:45:00'),
(5, '12:45:00', '14:15:00'),
(6, '14:15:00', '15:45:00'),
(7, '15:45:00', '17:15:00'),
(8, '17:15:00', '18:45:00'),
(9, '18:45:00', '20:15:00'),
(10, '20:15:00', '21:45:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(8) NOT NULL,
  `id_usuario` int(8) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `horas` varchar(20) DEFAULT NULL,
  `nivel` char(1) DEFAULT NULL
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
(1, '2017_03_31_224000_create_tabla_usuarios', 1),
(2, '2017_04_14_232747_create_full_calendar_eventos_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(8) NOT NULL,
  `id_usuario` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` int(8) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `sexo` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido_paterno`, `apellido_materno`, `ci`, `fecha_nacimiento`, `sexo`, `direccion`, `email`, `username`, `password`, `tipo`, `created_at`, `updated_at`, `remember_token`, `foto`) VALUES
(1, 'Alex', 'Reinaga', 'Lopez', 0, '0000-00-00', '', '', 'alexsof9@gmail.com', 'alexsof', '$2y$10$fv.68dWFs2FwRTVoVjyIo.rCdMK33Z0aOX8T2ynbLAlE0vKuEsnYG', 'administrador', '2017-04-05 21:36:05', '2017-04-07 01:53:35', 'gW8pH8LxyK6Cinime0YHyaXaYWkoUkoilci4F3tUi3xdcndmFboTxd948Sty', NULL),
(2, 'Carlo', 'Romero', 'Vargas', 0, '0000-00-00', '', '', 'crv@gmail.com', 'carlos7', '$2y$10$Uv2.fJWRhvsI3HEUfCntxeSPsMdZQPNPadGUq1.ztMokA8C95jSF2', 'autorizado', '2017-04-05 21:36:05', '2017-04-07 00:54:36', 'qLhP0DEDD7MdHZhan2IJqlZLC2ZmDOU32VgldbtZJnH6SjUq4B6OqicuLqYs', NULL),
(3, 'Valentina', 'Caceres', 'Villanueva', 0, '0000-00-00', '', '', 'vcv@gmail.com', 'vale89', '$2y$10$cnz/d/.hvHofNK3N8xM3SeAfPMeBDQGHt4KynhDfX1X1/xKxrMZma', 'autorizado', '2017-04-05 21:36:06', '2017-04-07 00:55:42', NULL, NULL),
(4, 'Marcelo', 'Lopez', 'chavez', 0, '0000-00-00', '', '', 'mlc9@gmail.com', 'marce09', '$2y$10$zFXLgZ9IVHiBZUPDmqJtX.MRkNEAqwiWMCd8TbPDLv3ugA0H9OyxS', 'autorizado', '2017-04-05 21:36:06', '2017-04-05 21:36:06', NULL, NULL),
(5, 'Juan Pablo', 'Mendoza', 'Acha', 0, '0000-00-00', '', '', 'jpm@gmail.com', 'juanp', '$2y$10$.kmIyD/nbCnpTvOxp7UTd.qY/wt1N2zttJBIv0k10Fqkjpokjmtw6', 'autorizado', '2017-04-05 21:36:06', '2017-04-05 21:36:06', NULL, NULL),
(6, 'Martina', 'Carrasco', 'Verduguez', 0, '0000-00-00', '', '', 'martiv@gmail.com', 'marti78', '$2y$10$ECCiO9.AJWqC6q67s2ML3uZAIIhmFHw6pxgNbwBOjbO.G0SfJ9D/K', 'autorizado', '2017-04-05 21:36:06', '2017-04-05 21:36:06', NULL, NULL),
(7, 'juan', 'perez', 'pando', 0, '0000-00-00', '', '', 'ivanuc19@gmail.com', 'juan', '$2y$10$GT.t.Oe6SeHUD9UFTKT.NOe9/0XTDQTnXsrLw94yzD.Se3jKahtQO', 'autorizado', '2017-04-06 07:57:40', '2017-04-06 07:57:40', 'GHjKVzFgumg7urX60BfF3BRe5boxPnbI5QZXD6b57FiQWipx93lCfVcozpG8', NULL),
(8, 'juan', 'perez', 'pando', 0, '0000-00-00', '', '', 'ivanuc19@gmail.com', 'juan', '$2y$10$G.E5EGyQ98emjKvnVBD6f.vnReCEJLFg5p.5F91ZIEHWfJvlsUrwW', 'autorizado', '2017-04-07 02:17:34', '2017-04-07 02:17:34', NULL, NULL);

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
-- Indices de la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD PRIMARY KEY (`id_ambiente`,`id_horario`,`id_fecha`),
  ADD KEY `FK_DISPONIBILIDAD2` (`id_horario`),
  ADD KEY `FK_DISPONIBILIDAD_3` (`id_fecha`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `FK_EVENTO_AMBIENTE` (`id_ambiente`),
  ADD KEY `FK_RESERVA_EVENTO` (`id_reserva`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`id_fecha`),
  ADD KEY `FK_CALENDARIO_FECHA` (`id_calendario`);

--
-- Indices de la tabla `fecha_horario`
--
ALTER TABLE `fecha_horario`
  ADD PRIMARY KEY (`id_fecha`,`id_horario`),
  ADD KEY `FK_FECHA_HORARIO2` (`id_horario`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_grupo`),
  ADD KEY `FK_MATERIA_DOCENTE` (`id_materia`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`),
  ADD KEY `FK_USUARIO_MATERIA` (`id_usuario`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `id_ambiente` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `calendario`
--
ALTER TABLE `calendario`
  MODIFY `id_calendario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_grupo` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_horario` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `disponibilidad`
--
ALTER TABLE `disponibilidad`
  ADD CONSTRAINT `FK_DISPONIBILIDAD` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`id_ambiente`),
  ADD CONSTRAINT `FK_DISPONIBILIDAD2` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`),
  ADD CONSTRAINT `FK_DISPONIBILIDAD_3` FOREIGN KEY (`id_fecha`) REFERENCES `fecha` (`id_fecha`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `FK_EVENTO_AMBIENTE` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`id_ambiente`),
  ADD CONSTRAINT `FK_RESERVA_EVENTO` FOREIGN KEY (`id_reserva`) REFERENCES `reserva` (`id_reserva`);

--
-- Filtros para la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD CONSTRAINT `FK_CALENDARIO_FECHA` FOREIGN KEY (`id_calendario`) REFERENCES `calendario` (`id_calendario`);

--
-- Filtros para la tabla `fecha_horario`
--
ALTER TABLE `fecha_horario`
  ADD CONSTRAINT `FK_FECHA_HORARIO` FOREIGN KEY (`id_fecha`) REFERENCES `fecha` (`id_fecha`),
  ADD CONSTRAINT `FK_FECHA_HORARIO2` FOREIGN KEY (`id_horario`) REFERENCES `horario` (`id_horario`);

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `FK_MATERIA_DOCENTE` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`);

--
-- Filtros para la tabla `materia`
--
ALTER TABLE `materia`
  ADD CONSTRAINT `FK_USUARIO_MATERIA` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_USUARIO_RESERVA` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
