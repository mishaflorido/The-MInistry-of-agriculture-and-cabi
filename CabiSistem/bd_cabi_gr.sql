-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-08-2021 a las 17:11:49
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cabi_gr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boundary`
--

CREATE TABLE `boundary` (
  `id_boundary` int(11) NOT NULL,
  `name_boundary` varchar(100) DEFAULT NULL,
  `id_farm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boundary`
--

INSERT INTO `boundary` (`id_boundary`, `name_boundary`, `id_farm`) VALUES
(1, 'Text Exam', 2),
(2, 'Text Exam', 4),
(3, 'Text Exam', 6),
(4, 'Text Exam', 7),
(5, 'Kevin', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `crops`
--

CREATE TABLE `crops` (
  `id_crop` int(11) NOT NULL COMMENT 'Crop identifier',
  `Crop_name` text NOT NULL COMMENT 'crop description ',
  `Local_crop_name` text NOT NULL COMMENT 'local non technical crop name'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `crops`
--

INSERT INTO `crops` (`id_crop`, `Crop_name`, `Local_crop_name`) VALUES
(1, 'Corn', 'Weat'),
(2, 'Potato', 'Potato'),
(3, 'Tomato', 'Tomato'),
(4, 'Onion', 'Onion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_crop_parcel`
--

CREATE TABLE `det_crop_parcel` (
  `id_det_cp` int(11) NOT NULL,
  `id_farm` int(11) DEFAULT NULL,
  `id_crop` int(11) DEFAULT NULL,
  `name_market` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_crop_parcel`
--

INSERT INTO `det_crop_parcel` (`id_det_cp`, `id_farm`, `id_crop`, `name_market`) VALUES
(1, 2, 1, 'Hills Road Market'),
(2, 2, 0, ''),
(3, 2, 1, 'Hills Road Market'),
(4, 2, 2, 'Hills Road Market'),
(5, 2, 1, 'Hills Road Market'),
(6, 2, 2, 'Hills Road Market'),
(7, 2, 3, 'Hills Road Market'),
(8, 2, 1, 'hola'),
(9, 3, 3, 'Hills Road Market'),
(10, 3, 1, 'hola'),
(11, 4, 3, 'Calatayud'),
(12, 4, 2, 'Potato Market'),
(13, 5, 2, 'hola'),
(14, 6, 1, 'hola'),
(15, 7, 1, 'hola'),
(16, 8, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_live_parcel`
--

CREATE TABLE `det_live_parcel` (
  `id_lv_pr` int(11) NOT NULL,
  `id_farm` int(11) DEFAULT NULL,
  `id_livestock` int(11) DEFAULT NULL,
  `name_market` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `det_live_parcel`
--

INSERT INTO `det_live_parcel` (`id_lv_pr`, `id_farm`, `id_livestock`, `name_market`) VALUES
(1, 2, 1, 'Hills Road Market'),
(2, 2, 3, 'hola'),
(3, 2, 1, 'Hills Road Market'),
(4, 2, 2, 'Hills Road Market'),
(5, 3, 2, 'Hills Road Market'),
(6, 3, 1, 'Hills Road Market'),
(7, 4, 2, 'BeefMarket'),
(8, 5, 1, 'Hills Road Market'),
(9, 6, 1, 'Hills Road Market'),
(10, 7, 1, 'Hills Road Market'),
(11, 8, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farm_parcels`
--

CREATE TABLE `farm_parcels` (
  `id_parcel` int(11) NOT NULL COMMENT 'Parcels identifier',
  `id_farm` int(11) NOT NULL COMMENT 'farmer identifier',
  `parc_address` text NOT NULL COMMENT 'address of parcel',
  `parc_acreage` decimal(10,0) NOT NULL COMMENT 'size of parcel in acres',
  `parc_tenure` int(11) NOT NULL COMMENT 'type of tenure',
  `crop_livestock` text NOT NULL COMMENT 'crops or livestock',
  `parc_num` int(11) NOT NULL COMMENT 'number of parcel'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `farm_parcels`
--

INSERT INTO `farm_parcels` (`id_parcel`, `id_farm`, `parc_address`, `parc_acreage`, `parc_tenure`, `crop_livestock`, `parc_num`) VALUES
(8, 7, 'Calle Melchor', '1', 1, 'asd', 1),
(9, 8, '', '0', 0, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farm_register`
--

CREATE TABLE `farm_register` (
  `id_farm` int(11) NOT NULL COMMENT 'farm identifier',
  `date_reg` date NOT NULL COMMENT 'Registration date',
  `name` text NOT NULL COMMENT 'farmer´s name or names',
  `last_name` text NOT NULL COMMENT 'last name',
  `mo_last_name` text NOT NULL COMMENT 'mother´s last name',
  `AKA` int(11) NOT NULL,
  `birthdate` date NOT NULL COMMENT 'Date of birth',
  `address` text NOT NULL COMMENT 'Home address',
  `phone_num` bigint(12) NOT NULL COMMENT 'Phone number',
  `sex` tinyint(1) NOT NULL COMMENT 'Sex 1-female 2-male',
  `district` text NOT NULL COMMENT 'district name',
  `watershed` text NOT NULL COMMENT 'Watershed (cuenca)',
  `parcel_num` int(2) NOT NULL COMMENT 'number of parcels',
  `fe_pump` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Farm equipment PuMP',
  `fe_irrig_line` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Farm equipment Irrigator Line',
  `go_market` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'do you go to the market',
  `boundary` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'tick if unknown',
  `fe_other` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Farm equipment Other'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `farm_register`
--

INSERT INTO `farm_register` (`id_farm`, `date_reg`, `name`, `last_name`, `mo_last_name`, `AKA`, `birthdate`, `address`, `phone_num`, `sex`, `district`, `watershed`, `parcel_num`, `fe_pump`, `fe_irrig_line`, `go_market`, `boundary`, `fe_other`) VALUES
(8, '2021-08-04', 'Alexander', 'Kollros', 'Siles', 2, '1997-09-04', 'Lanza y Chuquisacca', 79374484, 1, '2', 'dsadasdasd', 0, 0, 0, 1, 0, 1),
(7, '2021-08-02', 'Example', 'is', 'This', 1, '2021-08-02', 'Lanza y Chuquisacca', 79374484, 2, '14', 'dsadasdasd', 1, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `level1`
--

CREATE TABLE `level1` (
  `id_lv1` int(11) NOT NULL,
  `name_lv1` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `level1`
--

INSERT INTO `level1` (`id_lv1`, `name_lv1`) VALUES
(1, 'Grenada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `level2`
--

CREATE TABLE `level2` (
  `id_lv2` int(11) NOT NULL,
  `name_lv2` varchar(50) DEFAULT NULL,
  `id_lv1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `level2`
--

INSERT INTO `level2` (`id_lv2`, `name_lv2`, `id_lv1`) VALUES
(1, 'Saint Andrew', 1),
(2, 'Saint David', 1),
(3, 'Saint George', 1),
(4, 'Saint John', 1),
(5, 'Saint Mark', 1),
(6, 'Saint Patrick', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `level3`
--

CREATE TABLE `level3` (
  `id_lv3` int(11) NOT NULL,
  `name_lv3` varchar(50) DEFAULT NULL,
  `id_lv2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `level3`
--

INSERT INTO `level3` (`id_lv3`, `name_lv3`, `id_lv2`) VALUES
(1, 'Saint Patrick', 1),
(2, 'Hills Road', 1),
(3, 'Seaton Browne', 1),
(4, 'Mardigras', 2),
(5, 'Perdmontemps', 2),
(6, 'St. Dominic’s', 2),
(7, 'Market Hill', 3),
(8, 'Old Fort', 3),
(9, 'Gretna Green', 3),
(10, ' Central Depradine', 4),
(11, 'Upper Depradine', 4),
(12, 'Doctor Belle', 4),
(13, 'Maran', 5),
(14, 'Gross Point', 5),
(15, 'Diamond Estate', 5),
(16, 'Hermitage', 6),
(17, 'Pointzfield', 6),
(18, 'River Sallee', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `livestock`
--

CREATE TABLE `livestock` (
  `id_livestock` int(11) NOT NULL,
  `name_livestock` varchar(100) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `livestock`
--

INSERT INTO `livestock` (`id_livestock`, `name_livestock`, `description`) VALUES
(1, 'Bovine', 'Bovine'),
(2, 'Goat', 'Goat'),
(3, 'Porcine', 'Porcine');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `middleman_det`
--

CREATE TABLE `middleman_det` (
  `id_middleman` int(11) NOT NULL,
  `name_middleman` varchar(100) DEFAULT NULL,
  `id_farm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `middleman_det`
--

INSERT INTO `middleman_det` (`id_middleman`, `name_middleman`, `id_farm`) VALUES
(2, 'Rafael Quiroga', 2),
(3, 'Rafael Quiroga', 4),
(4, 'Rafael Quiroga', 5),
(5, 'Rafael Quiroga', 6),
(6, 'Rafael Quiroga', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `other_involved`
--

CREATE TABLE `other_involved` (
  `id_others` int(11) NOT NULL COMMENT 'id of orhers',
  `id_farm` int(11) NOT NULL COMMENT 'farmer identifier',
  `name` text NOT NULL COMMENT 'name of other involved',
  `last_name` text NOT NULL COMMENT 'last name of other involved'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='table for others involved in farm bussines';

--
-- Volcado de datos para la tabla `other_involved`
--

INSERT INTO `other_involved` (`id_others`, `id_farm`, `name`, `last_name`) VALUES
(12, 7, 'Kevin Alejandro Example', 'Example Bustamante Aguilar'),
(13, 8, 'Example', 'Example'),
(14, 7, 'Johan', 'Siles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `lastn_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `phone_user` int(11) NOT NULL,
  `type_user` int(1) NOT NULL,
  `psw_user` varchar(20) NOT NULL,
  `img_user` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `lastn_user`, `email_user`, `phone_user`, `type_user`, `psw_user`, `img_user`) VALUES
(1, 'Miguel', 'Florido Torrez', 'mishaflorido@gmail.com', 67410049, 0, 'admin', 'IMG_20210709_095649.jpg'),
(4, 'Kevin Jheron', 'Jordan Siles', 'example@gmail.com', 79374484, 1, '1234', '1625867882_065d60169d23dfabcba1.jpeg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `boundary`
--
ALTER TABLE `boundary`
  ADD PRIMARY KEY (`id_boundary`);

--
-- Indices de la tabla `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`id_crop`);

--
-- Indices de la tabla `det_crop_parcel`
--
ALTER TABLE `det_crop_parcel`
  ADD PRIMARY KEY (`id_det_cp`),
  ADD KEY `id_parcel` (`id_farm`),
  ADD KEY `id_crop` (`id_crop`);

--
-- Indices de la tabla `det_live_parcel`
--
ALTER TABLE `det_live_parcel`
  ADD PRIMARY KEY (`id_lv_pr`);

--
-- Indices de la tabla `farm_parcels`
--
ALTER TABLE `farm_parcels`
  ADD PRIMARY KEY (`id_parcel`),
  ADD KEY `id_farm` (`id_farm`);

--
-- Indices de la tabla `farm_register`
--
ALTER TABLE `farm_register`
  ADD PRIMARY KEY (`id_farm`);

--
-- Indices de la tabla `level1`
--
ALTER TABLE `level1`
  ADD PRIMARY KEY (`id_lv1`);

--
-- Indices de la tabla `level2`
--
ALTER TABLE `level2`
  ADD PRIMARY KEY (`id_lv2`),
  ADD KEY `id_lv1` (`id_lv1`);

--
-- Indices de la tabla `level3`
--
ALTER TABLE `level3`
  ADD PRIMARY KEY (`id_lv3`),
  ADD KEY `id_lv2` (`id_lv2`);

--
-- Indices de la tabla `livestock`
--
ALTER TABLE `livestock`
  ADD PRIMARY KEY (`id_livestock`);

--
-- Indices de la tabla `middleman_det`
--
ALTER TABLE `middleman_det`
  ADD PRIMARY KEY (`id_middleman`);

--
-- Indices de la tabla `other_involved`
--
ALTER TABLE `other_involved`
  ADD PRIMARY KEY (`id_others`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `boundary`
--
ALTER TABLE `boundary`
  MODIFY `id_boundary` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `crops`
--
ALTER TABLE `crops`
  MODIFY `id_crop` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Crop identifier', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `det_crop_parcel`
--
ALTER TABLE `det_crop_parcel`
  MODIFY `id_det_cp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `det_live_parcel`
--
ALTER TABLE `det_live_parcel`
  MODIFY `id_lv_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `farm_parcels`
--
ALTER TABLE `farm_parcels`
  MODIFY `id_parcel` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Parcels identifier', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `farm_register`
--
ALTER TABLE `farm_register`
  MODIFY `id_farm` int(11) NOT NULL AUTO_INCREMENT COMMENT 'farm identifier', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `level1`
--
ALTER TABLE `level1`
  MODIFY `id_lv1` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `level2`
--
ALTER TABLE `level2`
  MODIFY `id_lv2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `level3`
--
ALTER TABLE `level3`
  MODIFY `id_lv3` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `livestock`
--
ALTER TABLE `livestock`
  MODIFY `id_livestock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `middleman_det`
--
ALTER TABLE `middleman_det`
  MODIFY `id_middleman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `other_involved`
--
ALTER TABLE `other_involved`
  MODIFY `id_others` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of orhers', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `level2`
--
ALTER TABLE `level2`
  ADD CONSTRAINT `level2_ibfk_1` FOREIGN KEY (`id_lv1`) REFERENCES `level1` (`id_lv1`);

--
-- Filtros para la tabla `level3`
--
ALTER TABLE `level3`
  ADD CONSTRAINT `level3_ibfk_1` FOREIGN KEY (`id_lv2`) REFERENCES `level2` (`id_lv2`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
