-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-05-2023 a las 05:42:53
-- Versión del servidor: 10.6.12-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u869015172_monitorctg`
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
(1, 'sx5654864', '191.6.3.2', 'cluster m2k', '9088', 1),
(2, 'vx04541md', '191.6.52.4', 'redhat', '9205', 1),
(3, 'rgok457hd', '174.5.6.87', 'clusterM2K', '9071', 1),
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
  `phone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `d29_user`
--

INSERT INTO `d29_user` (`id_user`, `username`, `first_name`, `last_name`, `user_corporate`, `email`, `password`, `role_authorization`, `d29_area_id`, `d29_role_id`, `d29_area_manager_id`, `phone`) VALUES
(5, 'Juan ', 'Antonio', 'Bemudez', 'EX311772', 'bermudez@mail.telcel', 'bks4Rktrdi9DZk83V3lPTkdDNEVjUT09OjpdPbQLaLS7CfI+FJdmrqFd', 1, 5, 1, 71, '7777777777'),
(11, 'ppppp  ', 'ooooo  ', 'llllll  ', 'EX333333', 'JJJJ@JJJJ', 'ZHYzWWtxcFZTTVVUMlJ3Rk9JTjFnZz09OjoMZ/ac1hlbRvhq6kH/8FSm', 0, 5, 4, 71, '5555555555'),
(12, 'Daniel', 'Castillo', 'Gutierrez', 'EX32765', 'daniel@telcel.com', 'UU8wUmhTVUhFNGUyYnJyamNoeGNDQT09OjrTcEuVD2DbqkT1+4JSPR7B', 0, 5, 6, 71, '5538545121');

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
(717, 'Iniciado', '2023-04-20 02:23:31', 2, 5),
(718, 'Detener', '2023-04-20 02:23:31', 2, 5),
(719, 'Iniciado', '2023-04-20 02:23:33', 3, 5),
(720, 'Detener', '2023-04-20 02:23:33', 3, 5),
(721, 'Reinicio', '2023-04-20 03:27:32', 1, 5),
(722, 'Iniciado', '2023-04-20 03:27:36', 1, 5),
(723, 'Reinicio', '2023-04-20 06:14:24', 3, 5),
(724, 'Reinicio', '2023-04-20 06:14:25', 3, 5),
(725, 'Reinicio', '2023-04-20 06:14:26', 3, 5),
(726, 'Reinicio', '2023-04-20 06:14:26', 3, 5),
(727, 'Reinicio', '2023-04-20 06:14:26', 3, 5),
(728, 'Reinicio', '2023-04-20 06:14:26', 3, 5),
(729, 'Reinicio', '2023-04-20 06:14:30', 1, 5),
(730, 'Reinicio', '2023-04-20 06:14:34', 3, 5),
(731, 'Reinicio', '2023-04-20 06:14:35', 3, 5),
(732, 'Reinicio', '2023-04-20 06:14:39', 3, 5),
(733, 'Reinicio', '2023-04-20 06:14:39', 3, 5),
(734, 'Reinicio', '2023-04-20 06:14:39', 3, 5),
(735, 'Iniciado', '2023-04-20 06:14:51', 1, 5),
(736, 'Iniciado', '2023-04-20 06:17:25', 1, 5),
(737, 'Iniciado', '2023-04-20 06:17:35', 1, 5),
(738, 'Iniciado', '2023-04-20 06:19:12', 1, 5),
(739, 'Reinicio', '2023-04-20 06:20:34', 1, 5),
(740, 'Reinicio', '2023-04-20 06:20:35', 1, 5),
(741, 'Reinicio', '2023-04-20 06:20:36', 2, 5),
(742, 'Iniciado', '2023-04-20 06:20:39', 1, 5),
(743, 'Iniciado', '2023-04-20 06:20:41', 1, 5),
(744, 'Iniciado', '2023-04-20 06:20:59', 1, 5),
(745, 'Iniciado', '2023-04-20 06:21:02', 1, 5),
(746, 'Reinicio', '2023-04-20 06:24:15', 3, 5),
(747, 'Reinicio', '2023-04-20 06:24:16', 3, 5),
(748, 'Reinicio', '2023-04-20 06:24:20', 3, 5),
(749, 'Iniciado', '2023-04-20 06:24:22', 4, 5),
(750, 'Iniciado', '2023-04-20 06:24:22', 4, 5),
(751, 'Iniciado', '2023-04-20 06:24:24', 4, 5),
(752, 'Reinicio', '2023-04-20 06:24:25', 3, 5),
(753, 'Iniciado', '2023-04-20 06:24:26', 2, 5),
(754, 'Reinicio', '2023-04-20 06:24:27', 3, 5),
(755, 'Reinicio', '2023-04-20 06:24:29', 3, 5),
(756, 'Reinicio', '2023-04-20 06:24:29', 3, 5),
(757, 'Reinicio', '2023-04-20 06:24:29', 3, 5),
(758, 'Iniciado', '2023-04-20 06:24:30', 1, 5),
(759, 'Iniciado', '2023-04-20 06:24:32', 2, 5),
(760, 'Reinicio', '2023-04-20 06:24:34', 3, 5),
(761, 'Reinicio', '2023-04-20 06:24:34', 3, 5),
(762, 'Reinicio', '2023-04-20 06:24:34', 3, 5),
(763, 'Reinicio', '2023-04-20 06:24:35', 3, 5),
(764, 'Reinicio', '2023-04-20 06:24:35', 3, 5),
(765, 'Reinicio', '2023-04-20 06:24:35', 3, 5),
(766, 'Reinicio', '2023-04-20 06:24:35', 3, 5),
(767, 'Iniciado', '2023-04-20 06:24:37', 4, 5),
(768, 'Detener', '2023-04-20 07:04:11', 1, 5),
(769, 'Iniciado', '2023-04-20 07:19:40', 3, 5),
(770, 'Iniciado', '2023-04-20 07:19:43', 3, 5),
(771, 'Detener', '2023-04-20 07:19:48', 1, 5),
(772, 'Iniciado', '2023-04-20 07:19:53', 3, 5),
(773, 'Detener', '2023-04-20 07:19:57', 1, 5),
(774, 'Iniciado', '2023-04-20 07:21:32', 3, 5),
(775, 'Detener', '2023-04-20 07:21:33', 1, 5),
(776, 'Detener', '2023-04-20 07:22:27', 1, 5),
(777, 'Iniciado', '2023-04-20 07:26:00', 1, 5),
(778, 'Iniciado', '2023-04-20 07:26:01', 1, 5),
(779, 'Detener', '2023-04-20 07:26:02', 2, 5),
(780, 'Iniciado', '2023-04-20 07:26:05', 2, 5),
(781, 'Detener', '2023-04-20 07:26:07', 1, 5),
(782, 'Iniciado', '2023-04-20 07:32:12', 1, 5),
(783, 'Iniciado', '2023-04-20 07:32:14', 1, 5),
(784, 'Iniciado', '2023-04-20 07:32:15', 1, 5),
(785, 'Iniciado', '2023-04-20 07:32:15', 1, 5),
(786, 'Detener', '2023-04-20 07:32:17', 2, 5),
(787, 'Iniciado', '2023-04-20 07:32:19', 2, 5),
(788, 'Iniciado', '2023-04-20 07:32:20', 2, 5),
(789, 'Detener', '2023-04-20 07:32:21', 1, 5),
(790, 'Iniciado', '2023-04-20 07:32:23', 1, 5),
(791, 'Detener', '2023-04-20 07:32:24', 2, 5),
(792, 'Iniciado', '2023-04-20 07:32:32', 3, 5),
(793, 'Detener', '2023-04-20 07:32:33', 4, 5),
(794, 'Iniciado', '2023-04-20 07:32:35', 4, 5),
(795, 'Iniciado', '2023-04-20 07:32:50', 2, 5),
(796, 'Iniciado', '2023-04-20 07:32:50', 2, 5),
(797, 'Detener', '2023-04-20 07:32:54', 1, 5),
(798, 'Iniciado', '2023-04-20 07:32:55', 1, 5),
(799, 'Iniciado', '2023-04-20 07:32:56', 1, 5),
(800, 'Iniciado', '2023-04-20 07:32:56', 1, 5),
(801, 'Iniciado', '2023-04-20 07:32:57', 1, 5),
(802, 'Iniciado', '2023-04-20 07:32:57', 1, 5),
(803, 'Iniciado', '2023-04-20 07:32:57', 1, 5),
(804, 'Iniciado', '2023-04-20 07:32:57', 1, 5),
(805, 'Iniciado', '2023-04-20 07:32:57', 1, 5),
(806, 'Iniciado', '2023-04-20 07:32:58', 1, 5),
(807, 'Detener', '2023-04-20 07:33:02', 1, 5),
(808, 'Iniciado', '2023-04-20 07:33:10', 1, 5),
(809, 'Iniciado', '2023-04-20 07:33:11', 1, 5),
(810, 'Iniciado', '2023-04-20 07:33:33', 1, 5),
(811, 'Detener', '2023-04-20 07:33:42', 2, 5),
(812, 'Detener', '2023-04-20 07:33:44', 1, 5),
(813, 'Iniciado', '2023-04-20 07:35:43', 1, 5),
(814, 'Iniciado', '2023-04-20 07:37:22', 2, 5),
(815, 'Detener', '2023-04-20 07:37:25', 4, 5),
(816, 'Detener', '2023-04-20 07:37:27', 3, 5),
(817, 'Detener', '2023-04-20 07:37:28', 2, 5),
(818, 'Detener', '2023-04-20 07:37:29', 1, 5),
(819, 'Iniciado', '2023-04-20 07:37:30', 1, 5),
(820, 'Iniciado', '2023-04-20 07:37:31', 2, 5),
(821, 'Iniciado', '2023-04-20 07:37:32', 3, 5),
(822, 'Iniciado', '2023-04-20 07:37:33', 4, 5),
(823, 'Reinicio', '2023-05-06 05:29:44', 2, 5),
(824, 'Reinicio', '2023-05-09 04:56:10', 1, 5),
(825, 'Detener', '2023-05-09 04:56:40', 1, 5),
(826, 'Iniciado', '2023-05-09 04:56:44', 1, 5);

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `d29_user_event`
--
ALTER TABLE `d29_user_event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=827;

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
