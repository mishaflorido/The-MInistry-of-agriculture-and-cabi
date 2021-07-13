-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2021 a las 16:32:13
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `psw_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `name_user`, `lastn_user`, `email_user`, `phone_user`, `type_user`, `psw_user`) VALUES
(1, 'Miguel Angel', 'Florido Torrez', 'mishaflorido@gmail.com', 67410049, 0, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variety`
--

CREATE TABLE `variety` (
  `id_variety` int(11) NOT NULL,
  `id_crop` int(11) NOT NULL,
  `descript` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `crops`
--
ALTER TABLE `crops`
  ADD PRIMARY KEY (`id_crop`);

--
-- Indices de la tabla `farm_parcels`
--
ALTER TABLE `farm_parcels`
  ADD PRIMARY KEY (`id_parcels`);

--
-- Indices de la tabla `farm_register`
--
ALTER TABLE `farm_register`
  ADD PRIMARY KEY (`id_farm`);

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
-- Indices de la tabla `variety`
--
ALTER TABLE `variety`
  ADD PRIMARY KEY (`id_variety`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `crops`
--
ALTER TABLE `crops`
  MODIFY `id_crop` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Crop identifier';

--
-- AUTO_INCREMENT de la tabla `farm_parcels`
--
ALTER TABLE `farm_parcels`
  MODIFY `id_parcels` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Parcels identifier';

--
-- AUTO_INCREMENT de la tabla `farm_register`
--
ALTER TABLE `farm_register`
  MODIFY `id_farm` int(11) NOT NULL AUTO_INCREMENT COMMENT 'farm identifier';

--
-- AUTO_INCREMENT de la tabla `other_involved`
--
ALTER TABLE `other_involved`
  MODIFY `id_others` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id of orhers';

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `variety`
--
ALTER TABLE `variety`
  MODIFY `id_variety` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
