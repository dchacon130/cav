-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-05-2018 a las 19:11:28
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cavdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calls`
--

CREATE TABLE `calls` (
  `id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date_call` datetime NOT NULL,
  `company_id` int(11) NOT NULL,
  `sede_id` int(11) NOT NULL,
  `segmento_id` int(11) NOT NULL,
  `contact_name` varchar(250) DEFAULT NULL,
  `contact_charge` varchar(250) DEFAULT NULL,
  `phone1` tinytext,
  `ext` smallint(3) DEFAULT NULL,
  `cellphone` tinytext,
  `email` varchar(200) DEFAULT NULL,
  `observations` varchar(255) DEFAULT NULL,
  `date_sys_creation` datetime DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL,
  `date_sys_update` datetime DEFAULT NULL,
  `newcall` tinyint(1) DEFAULT NULL,
  `sendcall` tinyint(1) DEFAULT NULL,
  `dteage` tinyint(1) DEFAULT NULL,
  `quoteid` tinyint(1) DEFAULT NULL,
  `observationsreg` varchar(255) DEFAULT NULL,
  `date_sys_manage` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `calls`
--

INSERT INTO `calls` (`id`, `code`, `user_id`, `date_call`, `company_id`, `sede_id`, `segmento_id`, `contact_name`, `contact_charge`, `phone1`, `ext`, `cellphone`, `email`, `observations`, `date_sys_creation`, `state`, `date_sys_update`, `newcall`, `sendcall`, `dteage`, `quoteid`, `observationsreg`, `date_sys_manage`) VALUES
(8, '1-1345610759', 1, '2018-05-26 00:00:00', 1, 1, 6, 'Diego Chacon', 'Desarrollador', '4306525', 0, '3104823098', 'dchacon130@gmail.com', 'Llevar informaciÃ³n de mensajes de alerta y horarios\r-\nSe adiciona a la observaciÃ³n que se debe llevar esfero y papel', '2018-05-25 21:41:36', 3, '2018-05-28 22:13:02', 1, 1, 1, 1, 'abc', '2018-05-25 21:41:36'),
(9, '2-4383462853', 1, '2018-05-29 00:00:00', 1, 2, 1, 'Diego Chacon', 'Documentador', '4306525', 0, '3204225599', 'alberto.propagandas@gmail.com', 'ABC-DEF', '2018-05-28 22:15:12', 3, '2018-05-28 22:15:44', 0, 1, 0, 1, '-GHI', '2018-05-28 22:15:12'),
(10, '3-9042150781', 1, '2018-05-29 00:00:00', 1, 1, 3, 'Diego Chacon', 'Documentador', '4306525', 0, '3204225599', 'alberto.propagandas@gmail.com', 'Mostrar nueva llamada', '2018-05-28 22:21:46', 3, '2018-05-28 22:22:11', 1, 0, 0, 0, 'El cliente solicita nueva llamada ya que estaba ocupado con la mujer-! ', '2018-05-28 22:21:46'),
(11, '4-3982913583', 1, '2018-05-29 00:00:00', 1, 1, 1, 'Alberto Propagandas', 'Documentador', '4306525', 0, '3204225599', 'alberto.propagandas@gmail.com', 'Probando el envÃ­o', '2018-05-28 22:31:46', 3, '2018-05-28 22:34:07', 1, 0, 0, 0, 'Verificando el codigo', '2018-05-28 22:31:46'),
(12, '5-9167835328', 1, '2018-05-30 00:00:00', 5, 2, 3, 'Alberto Propagandas', 'Documentador', '4306525', 0, '3204225599', 'alberto.propagandas@gmail.com', 'Algo es algo', '2018-05-28 22:35:14', 3, '2018-05-28 22:35:30', 1, 0, 0, 0, 'Envio de codigo ok', '2018-05-28 22:35:14'),
(13, '6-2554348545', 1, '2018-05-31 00:00:00', 5, 4, 3, 'Diego Chacon', 'Documentador', '4306525', 0, '3204225599', 'alberto.propagandas@gmail.com', 'Enviando el codigo', '2018-05-28 22:39:21', 3, '2018-05-28 22:40:22', 1, 0, 0, 0, 'Nueva llamada', '2018-05-28 22:39:21'),
(14, '7-0328196128', 1, '2018-05-30 00:00:00', 7, 2, 1, 'Diego Chacon', 'Desarrollador', '4306525', 0, '3204225599', 'alberto.propagandas@gmail.com', 'Verificar que se guarda con el codigo 6-2554348545', '2018-05-29 15:55:51', 3, '2018-05-29 16:01:29', 1, 1, 0, 1, '', '2018-05-29 15:55:51'),
(15, '8-8841441870', 1, '2018-05-30 00:00:00', 1, 1, 1, 'Leidy Garzas', 'Desarrollador', '4306525', 0, '3204225599', 'alberto.propagandas@gmail.com', 'Creando nueva llamada', '2018-05-29 16:04:29', 3, '2018-05-29 16:07:56', 1, 1, 0, 1, 'Verificar el envio de la variable code', '2018-05-29 16:04:29'),
(16, '9-6019018091', 1, '2018-05-30 00:00:00', 1, 1, 1, 'Diego Chacon', 'Documentador', '4306525', 0, '3204225599', 'alberto.propagandas@gmail.com', 'Codigo', '2018-05-29 18:12:48', 1, '2018-05-29 18:16:33', 1, 1, 0, 1, 'Registrar Codigo', '2018-05-29 18:12:48'),
(20, '10-8952878681', 1, '2018-06-02 00:00:00', 6, 2, 1, 'Alberto Propagandas', 'Documentador', '4306525', 0, '3204225599', 'alberto.propagandas@gmail.com', 'Codigo Nuevo', '2018-05-29 18:24:00', 3, '2018-05-29 18:24:50', 1, 1, 0, 0, 'COdigo enviado-?', '2018-05-29 18:24:00'),
(21, '10-8952878681', 1, '2018-05-31 00:00:00', 8, 2, 1, 'Diego Chacon', 'Documentador', '4306525', 0, '3204225599', 'alberto.propagandas@gmail.com', 'codigo ya existente', '2018-05-29 18:37:28', 3, '2018-05-29 18:37:28', 0, 0, 1, 0, '', '2018-05-29 18:44:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `city`
--

INSERT INTO `city` (`id`, `name`, `description`, `state`) VALUES
(1, 'Bogota', 'BOGOTA', 1),
(2, 'Medellin', 'MEDELLIN', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `document_type_id` int(11) NOT NULL,
  `document` int(11) NOT NULL,
  `dv` tinyint(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `phone` tinytext NOT NULL,
  `date_sys` datetime DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `user_id`, `name`, `document_type_id`, `document`, `dv`, `address`, `city_id`, `phone`, `date_sys`, `state`) VALUES
(1, 1, 'Load IT', 1, 1234567890, 0, 'av cali # 88-81', 1, '3104558899', '2018-05-16 00:00:00', 1),
(5, 1, 'ABC sas', 3, 123456789, 1, 'Av ciudad de cali #88-81', 1, '3104823098', '2018-05-17 15:08:01', 1),
(6, 1, 'CDE', 3, 123456789, 0, 'Av ciudad de cali #88-81', 1, '3104823098', '2018-05-17 15:12:13', 1),
(7, 1, 'Empresa ABC', 3, 321654987, 2, 'Av ciudad de cali #88-81', 1, '3104823098', '2018-05-17 15:15:50', 1),
(8, 1, 'Empresa 5', 3, 258963147, 1, 'avenida 123 #12-96', 1, '4302585', '2018-05-22 18:02:44', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `document_type`
--

CREATE TABLE `document_type` (
  `id` int(11) NOT NULL,
  `name` varchar(10) DEFAULT NULL,
  `description` varchar(25) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `document_type`
--

INSERT INTO `document_type` (`id`, `name`, `description`, `state`) VALUES
(1, 'CC', 'Cedula Ciudadania', 1),
(2, 'CE', 'Cedula Extrangeria', 1),
(3, 'NIT', 'NIT', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`id`, `name`, `description`, `state`) VALUES
(1, 'GE', 'Gerente', 1),
(2, 'SC', 'Soporte Comercial', 1),
(3, 'VE', 'Vendedor', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `phone` tinytext,
  `address` varchar(150) DEFAULT NULL,
  `date_sys` datetime DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id`, `company_id`, `name`, `phone`, `address`, `date_sys`, `state`) VALUES
(1, 1, 'Sede A', '3104823098', 'av cali # 88-81 A', '2018-05-16 00:00:00', 1),
(2, 1, 'Sede B', '3102589645', 'av cali # 88-81 B', '2018-05-16 00:00:00', 1),
(3, 1, 'Sede C', '3102369875', 'av cali # 88-81 C', '2018-05-16 00:00:00', 1),
(4, 8, 'Sede 5 local 1', '310482566', 'Av ciudad de cali #88-81', '2018-05-22 18:26:22', 1),
(6, 5, 'Sede abcd', '4659832', 'av 123 #25-96', '2018-05-22 18:27:13', 1),
(8, 6, 'Sede FGH', '4558899', 'av 123 #25-96', '2018-05-22 18:29:18', 1),
(10, 8, 'Sede de la empresa 5', '4589632', 'Av ciudad de cali #88-81', '2018-05-22 18:25:00', 1),
(11, 8, 'Sede B - Empresa 5', '3104823098', 'kr 86 # 88-81', '2018-05-22 18:31:42', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `segmento`
--

CREATE TABLE `segmento` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `segmento`
--

INSERT INTO `segmento` (`id`, `name`, `description`, `state`) VALUES
(1, 'Distribuidores', 'Distribuidores', 1),
(3, 'Tableristas', 'Tableristas', 1),
(4, 'Integradores', 'Integradores', 1),
(5, 'Diseñadores', 'Diseñadores', 1),
(6, 'ClienteFinal', 'Cliente final', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `document_type_id` int(11) NOT NULL,
  `document` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `birthday` datetime DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(100) NOT NULL,
  `phone` tinytext,
  `address` varchar(100) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `password` varchar(10) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `date_sys` datetime DEFAULT NULL,
  `state` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `document_type_id`, `document`, `name`, `lastname`, `birthday`, `email`, `phone`, `address`, `city_id`, `user`, `password`, `profile_id`, `date_sys`, `state`) VALUES
(1, 1, 1024478130, 'Diego', 'Chacon', '1987-11-19 00:00:00', 'diego.chacon@freelancediego.website', '3104823098', 'av cali # 88-81', 1, 'diego.chacon', '123', 1, '2018-05-16 00:00:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_calls_company1_idx` (`company_id`),
  ADD KEY `fk_calls_segmento1_idx` (`segmento_id`),
  ADD KEY `fk_calls_user1_idx` (`user_id`),
  ADD KEY `fk_calls_sede1_idx` (`sede_id`);

--
-- Indices de la tabla `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_company_city1_idx` (`city_id`),
  ADD KEY `fk_company_document_type1_idx` (`document_type_id`),
  ADD KEY `fk_company_user1_idx` (`user_id`);

--
-- Indices de la tabla `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sede_company1_idx` (`company_id`);

--
-- Indices de la tabla `segmento`
--
ALTER TABLE `segmento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_document_type_idx` (`document_type_id`),
  ADD KEY `fk_user_city1_idx` (`city_id`),
  ADD KEY `fk_user_profile1_idx` (`profile_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calls`
--
ALTER TABLE `calls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `document_type`
--
ALTER TABLE `document_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `segmento`
--
ALTER TABLE `segmento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calls`
--
ALTER TABLE `calls`
  ADD CONSTRAINT `fk_calls_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calls_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calls_segmento1` FOREIGN KEY (`segmento_id`) REFERENCES `segmento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_calls_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_company_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_company_document_type1` FOREIGN KEY (`document_type_id`) REFERENCES `document_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_company_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `fk_sede_company1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_document_type` FOREIGN KEY (`document_type_id`) REFERENCES `document_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_profile1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
