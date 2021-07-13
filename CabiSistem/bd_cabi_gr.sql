-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2021 a las 16:50:13
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
-- Estructura de tabla para la tabla `crops`
--

CREATE TABLE `crops` (
  `id_crop` int(11) NOT NULL COMMENT 'Crop identifier',
  `Crop_name` text NOT NULL COMMENT 'crop description ',
  `Local_crop_name` text NOT NULL COMMENT 'local non technical crop name'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `farm_parcels`
--

CREATE TABLE `farm_parcels` (
  `id_parcels` int(11) NOT NULL COMMENT 'Parcels identifier',
  `id_farmer` int(11) NOT NULL COMMENT 'farmer identifier',
  `parc_address` text NOT NULL COMMENT 'address of parcel',
  `parc_acreage` decimal(10,0) NOT NULL COMMENT 'size of parcel in acres',
  `parc_tenure` int(11) NOT NULL COMMENT 'type of tenure',
  `crop_livestock` text NOT NULL COMMENT 'crops or livestock',
  `parc_num` int(11) NOT NULL COMMENT 'number of parcel'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `farm_equi` int(11) NOT NULL COMMENT 'Farm equipment',
  `go_market` tinyint(1) NOT NULL COMMENT 'do you go to the market',
  `boundary` tinyint(1) NOT NULL COMMENT 'tick if unknown'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `other_involved`
--

CREATE TABLE `other_involved` (
  `id_others` int(11) NOT NULL COMMENT 'id of orhers',
  `id_farmer` int(11) NOT NULL COMMENT 'farmer identifier',
  `name` text NOT NULL COMMENT 'name of other involved',
  `last_name` text NOT NULL COMMENT 'last name of other involved'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='table for others involved in farm bussines';

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
(4, 'Alexander Ruslan', 'Florido Siles', 'elnagas123@gmail.com', 79374484, 1, '1234', '1625867882_065d60169d23dfabcba1.jpeg');

--
-- Índices para tablas volcadas
--

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
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

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
