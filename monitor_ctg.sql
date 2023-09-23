-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2023 a las 23:55:32
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `monitor_ctg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d29_area`
--

CREATE TABLE `d29_area` (
  `id_area` int(11) NOT NULL,
  `area` varchar(45) DEFAULT NULL,
  `id_descripcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_area`
--

INSERT INTO `d29_area` (`id_area`, `area`, `id_descripcion`) VALUES
(8, 'SACTWEB', 113),
(5, 'SISACT', 95);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d29_area_manager`
--

CREATE TABLE `d29_area_manager` (
  `id_manager` int(11) NOT NULL,
  `manager_name` varchar(45) DEFAULT NULL,
  `id_descripcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_area_manager`
--

INSERT INTO `d29_area_manager` (`id_manager`, `manager_name`, `id_descripcion`) VALUES
(71, 'Jesus de Llano', 104);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d29_descrition_register`
--

CREATE TABLE `d29_descrition_register` (
  `id` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `date_register` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_descrition_register`
--

INSERT INTO `d29_descrition_register` (`id`, `description`, `date_register`) VALUES
(82, 'area3', '2023-04-06'),
(95, 'ARE233', '2023-04-06'),
(98, 'llllllllllllllllllllllllllllllllllllllllllllllllll', '2023-04-06'),
(99, 'llllllllllllllllllllllllllllllllllllllllllllllllll', '2023-04-06'),
(100, 'llllllllllllllllllllllllllllllllllllllllllllllllll', '2023-04-06'),
(104, 'xx', '2023-04-06'),
(106, 'Personal que tiene todos los privilegios del siste', '2023-04-06'),
(108, 'valor del estatus del proceso batch', '2023-04-27'),
(109, 'Personal que atiende el montoreo de los servidores', '2023-04-25'),
(110, 'Persona que analiza los datos y los transfma en in', '2023-05-09'),
(111, 'persona que analiza los datos y los transfma en in', '2023-05-09'),
(112, 'persona que analiza los datos y los transfma en in', '2023-05-09'),
(113, 'Area web', '2023-05-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d29_monitoreo_server`
--

CREATE TABLE `d29_monitoreo_server` (
  `id_monitore` int(100) NOT NULL,
  `server` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `date_event` datetime NOT NULL,
  `statusServer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_monitoreo_server`
--

INSERT INTO `d29_monitoreo_server` (`id_monitore`, `server`, `status`, `date_event`, `statusServer`) VALUES
(26, 'vx04541md', 1, '2023-04-17 00:00:00', 0),
(27, 'sx5654864', 1, '2023-04-17 00:00:00', 0),
(28, 'vx04541md', 1, '2023-04-17 00:00:00', 0),
(29, 'sx5654864', 1, '2023-04-17 00:00:00', 0),
(30, 'vx04541md', 1, '2023-04-17 00:00:00', 0),
(31, 'sx5654864', 0, '2023-04-17 00:00:00', 0),
(32, 'vx04541md', 0, '2023-04-17 00:00:00', 0),
(33, 'sx5654864', 1, '2023-04-17 00:00:00', 0),
(34, 'vx04541md', 1, '2023-04-17 00:00:00', 0),
(35, 'sx5654864', 1, '2023-04-17 00:00:00', 0),
(36, 'vx04541md', 0, '2023-04-17 00:00:00', 0),
(37, 'sx5654864', 1, '2023-04-17 00:00:00', 0),
(38, 'vx04541md', 1, '2023-04-17 00:00:00', 0),
(39, 'sx5654864', 1, '2023-04-17 00:00:00', 0),
(40, 'vx04541md', 1, '2023-04-17 00:00:00', 0),
(41, 'sx5654864', 0, '2023-04-17 00:00:00', 0),
(42, 'vx04541md', 1, '2023-04-17 00:00:00', 0),
(43, 'sx5654864', 0, '2023-04-17 00:00:00', 0),
(44, 'vx04541md', 1, '2023-04-17 00:00:00', 0),
(45, 'sx5654864', 1, '2023-04-17 00:00:00', 0),
(46, 'vx04541md', 1, '2023-04-17 00:00:00', 0),
(47, 'sx5654864', 1, '2023-04-17 00:00:00', 0),
(48, 'vx04541md', 1, '2023-04-17 00:00:00', 0),
(49, 'sx5654864', 1, '2023-04-17 00:00:00', 0),
(50, 'vx04541md', 0, '2023-04-17 00:00:00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d29_prop`
--

CREATE TABLE `d29_prop` (
  `id_prop` int(11) NOT NULL,
  `value` tinyint(1) DEFAULT NULL,
  `d29_descrition_register_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_prop`
--

INSERT INTO `d29_prop` (`id_prop`, `value`, `d29_descrition_register_id`) VALUES
(1, 1, 108);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d29_role`
--

CREATE TABLE `d29_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(45) DEFAULT NULL,
  `id_descripcion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_role`
--

INSERT INTO `d29_role` (`id_role`, `role`, `id_descripcion`) VALUES
(1, 'Administrador', 106),
(6, 'analista', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d29_server_ctg`
--

CREATE TABLE `d29_server_ctg` (
  `id_ctg` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `cluster` varchar(45) DEFAULT NULL,
  `puerto` varchar(8) DEFAULT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_server_ctg`
--

INSERT INTO `d29_server_ctg` (`id_ctg`, `name`, `ip`, `cluster`, `puerto`, `estatus`) VALUES
(1, 'sx5654864', '191.6.3.2', 'cluster m2k', '9088', 2),
(2, 'vx04541md', '191.6.52.4', 'redhat', '9205', 2),
(3, 'rgok457hd', '174.5.6.87', 'clusterM2K', '9071', 2),
(4, 'x10gr8957', '17.12.3.2', 'ss', 'sss', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d29_user`
--

CREATE TABLE `d29_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `user_corporate` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role_authorization` int(11) DEFAULT NULL,
  `d29_area_id` int(11) NOT NULL,
  `d29_role_id` int(11) NOT NULL,
  `d29_area_manager_id` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `tokenUser` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_user`
--

INSERT INTO `d29_user` (`id_user`, `username`, `first_name`, `last_name`, `user_corporate`, `email`, `password`, `role_authorization`, `d29_area_id`, `d29_role_id`, `d29_area_manager_id`, `phone`, `tokenUser`) VALUES
(35, 'ffff', 'ffff', 'ffff', 'k', 'fgfgfgfgfgfg', 'cccc', 1, 1, 1, 1, '1111', 2147483647),
(38, 'ffff', 'ffff', 'ffff', 'g', 'fgfgfgfgfgfg', 'cccc', 1, 1, 1, 1, '1111', 2147483647),
(43, 'ffff', 'ffff', 'ffff', 'gg', 'ttt', 'cccc', 1, 1, 1, 1, '1111', 2147483647),
(46, 'ffff', 'ffff', 'ffff', 'gggw', 'yy', 'cccc', 1, 1, 1, 1, '1111', 2147483647),
(48, 'ffff', 'ffff', 'ffff', 'gggr', 'uuu', 'cccc', 1, 1, 1, 1, '1111', 2147483647),
(49, 'ffff', 'ffff', 'ffff', 'ggggg', 'iii', 'cccc', 1, 1, 1, 1, '1111', 2147483647),
(53, 'Juan Antonio', 'dd', 'bermudez', 'EX311772', 'j.antonio.bermudez80@gmail.com', 'KzFlOVVIc0htY3J1QjFveUk1UWJYUT09OjpBzG/ZR4KZG8AOnSSt4t6M', 1, 8, 1, 71, '5539963817', 838742);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d29_user_event`
--

CREATE TABLE `d29_user_event` (
  `id_event` int(11) NOT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `event_date` datetime DEFAULT NULL,
  `d29_server_ctg_id` int(11) NOT NULL,
  `d29_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_user_event`
--

INSERT INTO `d29_user_event` (`id_event`, `activity`, `event_date`, `d29_server_ctg_id`, `d29_user_id`) VALUES
(827, 'Reinicio', '2023-09-23 03:12:25', 2, 53),
(828, 'Reinicio', '2023-09-23 03:12:40', 1, 53),
(829, 'Detener', '2023-09-23 03:12:47', 1, 53),
(830, 'Detener', '2023-09-23 03:12:54', 2, 53),
(831, 'Detener', '2023-09-23 03:12:58', 3, 53),
(832, 'Detener', '2023-09-23 03:13:00', 4, 53),
(833, 'Iniciado', '2023-09-23 03:13:19', 4, 53),
(834, 'Reinicio', '2023-09-23 03:13:26', 1, 53),
(835, 'Reinicio', '2023-09-23 03:13:31', 1, 53),
(836, 'Reinicio', '2023-09-23 03:13:33', 1, 53),
(837, 'Reinicio', '2023-09-23 03:13:35', 1, 53),
(838, 'Reinicio', '2023-09-23 03:13:37', 1, 53),
(839, 'Reinicio', '2023-09-23 03:13:39', 1, 53),
(840, 'Reinicio', '2023-09-23 03:13:41', 1, 53),
(841, 'Reinicio', '2023-09-23 03:13:44', 1, 53),
(842, 'Reinicio', '2023-09-23 03:13:46', 1, 53),
(843, 'Reinicio', '2023-09-23 03:13:48', 2, 53),
(844, 'Reinicio', '2023-09-23 03:13:50', 2, 53),
(845, 'Reinicio', '2023-09-23 03:13:52', 2, 53),
(846, 'Reinicio', '2023-09-23 03:13:54', 2, 53),
(847, 'Reinicio', '2023-09-23 03:13:56', 2, 53);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `d29_area`
--
ALTER TABLE `d29_area`
  ADD PRIMARY KEY (`id_area`,`id_descripcion`),
  ADD UNIQUE KEY `area` (`area`),
  ADD KEY `fk_d29_area_d29_descrition_register1_idx` (`id_descripcion`);

--
-- Indices de la tabla `d29_area_manager`
--
ALTER TABLE `d29_area_manager`
  ADD PRIMARY KEY (`id_manager`,`id_descripcion`),
  ADD UNIQUE KEY `manager_name` (`manager_name`),
  ADD KEY `fk_d29_area_manager_d29_descrition_register1_idx` (`id_descripcion`);

--
-- Indices de la tabla `d29_descrition_register`
--
ALTER TABLE `d29_descrition_register`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `d29_monitoreo_server`
--
ALTER TABLE `d29_monitoreo_server`
  ADD PRIMARY KEY (`id_monitore`);

--
-- Indices de la tabla `d29_prop`
--
ALTER TABLE `d29_prop`
  ADD PRIMARY KEY (`id_prop`,`d29_descrition_register_id`),
  ADD KEY `fk_d29_prop_d29_descrition_register1_idx` (`d29_descrition_register_id`);

--
-- Indices de la tabla `d29_role`
--
ALTER TABLE `d29_role`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indices de la tabla `d29_server_ctg`
--
ALTER TABLE `d29_server_ctg`
  ADD PRIMARY KEY (`id_ctg`);

--
-- Indices de la tabla `d29_user`
--
ALTER TABLE `d29_user`
  ADD PRIMARY KEY (`id_user`,`d29_area_id`,`d29_role_id`,`d29_area_manager_id`),
  ADD UNIQUE KEY `user_corporate` (`user_corporate`,`email`),
  ADD KEY `fk_d29_user_d29_area_idx` (`d29_area_id`),
  ADD KEY `fk_d29_user_d29_role1_idx` (`d29_role_id`),
  ADD KEY `fk_d29_user_d29_area_manager1_idx` (`d29_area_manager_id`);

--
-- Indices de la tabla `d29_user_event`
--
ALTER TABLE `d29_user_event`
  ADD PRIMARY KEY (`id_event`,`d29_server_ctg_id`,`d29_user_id`),
  ADD KEY `fk_d29_user_event_d29_server_ctg1_idx` (`d29_server_ctg_id`),
  ADD KEY `fk_d29_user_event_d29_user1_idx` (`d29_user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `d29_area`
--
ALTER TABLE `d29_area`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `d29_area_manager`
--
ALTER TABLE `d29_area_manager`
  MODIFY `id_manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `d29_descrition_register`
--
ALTER TABLE `d29_descrition_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `d29_monitoreo_server`
--
ALTER TABLE `d29_monitoreo_server`
  MODIFY `id_monitore` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `d29_prop`
--
ALTER TABLE `d29_prop`
  MODIFY `id_prop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `d29_role`
--
ALTER TABLE `d29_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `d29_server_ctg`
--
ALTER TABLE `d29_server_ctg`
  MODIFY `id_ctg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `d29_user`
--
ALTER TABLE `d29_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `d29_user_event`
--
ALTER TABLE `d29_user_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=848;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `d29_area`
--
ALTER TABLE `d29_area`
  ADD CONSTRAINT `fk_d29_area_d29_descrition_register1` FOREIGN KEY (`id_descripcion`) REFERENCES `d29_descrition_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `d29_area_manager`
--
ALTER TABLE `d29_area_manager`
  ADD CONSTRAINT `fk_d29_area_manager_d29_descrition_register1` FOREIGN KEY (`id_descripcion`) REFERENCES `d29_descrition_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `d29_prop`
--
ALTER TABLE `d29_prop`
  ADD CONSTRAINT `fk_d29_prop_d29_descrition_register1` FOREIGN KEY (`d29_descrition_register_id`) REFERENCES `d29_descrition_register` (`id`);

--
-- Filtros para la tabla `d29_user_event`
--
ALTER TABLE `d29_user_event`
  ADD CONSTRAINT `fk_d29_user_event_d29_server_ctg1` FOREIGN KEY (`d29_server_ctg_id`) REFERENCES `d29_server_ctg` (`id_ctg`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_d29_user_event_d29_user1` FOREIGN KEY (`d29_user_id`) REFERENCES `d29_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
