-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-04-2023 a las 02:53:26
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

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
  `description` varchar(50) DEFAULT NULL,
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
(109, 'Personal que atiende el montoreo de los servidores', '2023-04-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d29_monitoreo_server`
--

CREATE TABLE `d29_monitoreo_server` (
  `id_monitore` int(100) NOT NULL,
  `server` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `date_event` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_monitoreo_server`
--

INSERT INTO `d29_monitoreo_server` (`id_monitore`, `server`, `status`, `date_event`) VALUES
(1, 'sx5654864', 1, '2023-04-17'),
(2, 'vx04541md', 0, '2023-04-17'),
(3, 'sx5654864', 0, '2023-04-17'),
(4, 'vx04541md', 1, '2023-04-17'),
(5, 'sx5654864', 0, '2023-04-17'),
(6, 'vx04541md', 0, '2023-04-17'),
(7, 'sx5654864', 0, '2023-04-17'),
(8, 'vx04541md', 0, '2023-04-17'),
(9, 'sx5654864', 1, '2023-04-17'),
(10, 'vx04541md', 1, '2023-04-17'),
(11, 'sx5654864', 1, '2023-04-17'),
(12, 'vx04541md', 1, '2023-04-17'),
(13, 'sx5654864', 1, '2023-04-17'),
(14, 'vx04541md', 1, '2023-04-17'),
(15, 'sx5654864', 1, '2023-04-17'),
(16, 'vx04541md', 1, '2023-04-17'),
(17, 'sx5654864', 0, '2023-04-17'),
(18, 'vx04541md', 1, '2023-04-17'),
(19, 'sx5654864', 1, '2023-04-17'),
(20, 'vx04541md', 1, '2023-04-17'),
(21, 'sx5654864', 1, '2023-04-17'),
(22, 'vx04541md', 1, '2023-04-17'),
(23, 'sx5654864', 0, '2023-04-17'),
(24, 'vx04541md', 1, '2023-04-17'),
(25, 'sx5654864', 1, '2023-04-17'),
(26, 'vx04541md', 1, '2023-04-17'),
(27, 'sx5654864', 1, '2023-04-17'),
(28, 'vx04541md', 1, '2023-04-17'),
(29, 'sx5654864', 1, '2023-04-17'),
(30, 'vx04541md', 1, '2023-04-17'),
(31, 'sx5654864', 0, '2023-04-17'),
(32, 'vx04541md', 0, '2023-04-17'),
(33, 'sx5654864', 1, '2023-04-17'),
(34, 'vx04541md', 1, '2023-04-17'),
(35, 'sx5654864', 1, '2023-04-17'),
(36, 'vx04541md', 0, '2023-04-17'),
(37, 'sx5654864', 1, '2023-04-17'),
(38, 'vx04541md', 1, '2023-04-17'),
(39, 'sx5654864', 1, '2023-04-17'),
(40, 'vx04541md', 1, '2023-04-17'),
(41, 'sx5654864', 0, '2023-04-17'),
(42, 'vx04541md', 1, '2023-04-17'),
(43, 'sx5654864', 0, '2023-04-17'),
(44, 'vx04541md', 1, '2023-04-17'),
(45, 'sx5654864', 1, '2023-04-17'),
(46, 'vx04541md', 1, '2023-04-17'),
(47, 'sx5654864', 1, '2023-04-17'),
(48, 'vx04541md', 1, '2023-04-17');

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
(1, 'Administrador', 106);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d29_server_ctg`
--

CREATE TABLE `d29_server_ctg` (
  `id_ctg` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `cluster` varchar(45) DEFAULT NULL,
  `puerto` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_server_ctg`
--

INSERT INTO `d29_server_ctg` (`id_ctg`, `name`, `ip`, `cluster`, `puerto`) VALUES
(1, 'sx5654864', '191.6.3.2', 'cluster m2k', '9084'),
(2, 'vx04541md', '191.6.52.4', 'redhat', '9205');

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
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_user`
--

INSERT INTO `d29_user` (`id_user`, `username`, `first_name`, `last_name`, `user_corporate`, `email`, `password`, `role_authorization`, `d29_area_id`, `d29_role_id`, `d29_area_manager_id`, `phone`) VALUES
(5, 'Juan ', 'Antonio', 'Bemudez', 'EX311772', 'bermudez@mail.telcel', 'bks4Rktrdi9DZk83V3lPTkdDNEVjUT09OjpdPbQLaLS7CfI+FJdmrqFd', 1, 5, 1, 71, '5555555555'),
(11, 'ppppp  ', 'ooooo  ', 'llllll  ', 'EX333333', 'JJJJ@JJJJ', 'ZHYzWWtxcFZTTVVUMlJ3Rk9JTjFnZz09OjoMZ/ac1hlbRvhq6kH/8FSm', 0, 5, 4, 71, '5555555555');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d29_user_event`
--

CREATE TABLE `d29_user_event` (
  `id_event` int(11) NOT NULL,
  `activity` varchar(100) DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `d29_server_ctg_id` int(11) NOT NULL,
  `d29_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_user_event`
--

INSERT INTO `d29_user_event` (`id_event`, `activity`, `event_date`, `d29_server_ctg_id`, `d29_user_id`) VALUES
(3, 'reinicio', '2023-04-30', 2, 5),
(4, 'apagadp', '2023-04-29', 1, 11);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `d29_area`
--
ALTER TABLE `d29_area`
  ADD PRIMARY KEY (`id_area`,`id_descripcion`),
  ADD KEY `fk_d29_area_d29_descrition_register1_idx` (`id_descripcion`);

--
-- Indices de la tabla `d29_area_manager`
--
ALTER TABLE `d29_area_manager`
  ADD PRIMARY KEY (`id_manager`,`id_descripcion`),
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
  ADD PRIMARY KEY (`id_role`);

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
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `d29_area_manager`
--
ALTER TABLE `d29_area_manager`
  MODIFY `id_manager` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `d29_descrition_register`
--
ALTER TABLE `d29_descrition_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `d29_monitoreo_server`
--
ALTER TABLE `d29_monitoreo_server`
  MODIFY `id_monitore` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `d29_prop`
--
ALTER TABLE `d29_prop`
  MODIFY `id_prop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `d29_role`
--
ALTER TABLE `d29_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `d29_server_ctg`
--
ALTER TABLE `d29_server_ctg`
  MODIFY `id_ctg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `d29_user`
--
ALTER TABLE `d29_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `d29_user_event`
--
ALTER TABLE `d29_user_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
