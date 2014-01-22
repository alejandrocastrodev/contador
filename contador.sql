-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 27-03-2012 a las 08:37:27
-- Versión del servidor: 6.0.4
-- Versión de PHP: 6.0.0-dev

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `contador`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `box`
-- 

CREATE TABLE `box` (
  `box_id` int(2) NOT NULL,
  `box_current` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `box_type` int(1) NOT NULL,
  `box_date` datetime NOT NULL,
  PRIMARY KEY (`box_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `box`
-- 

INSERT INTO `box` VALUES (1, '--', 0, '0000-00-00 00:00:00');
INSERT INTO `box` VALUES (2, '--', 0, '0000-00-00 00:00:00');
INSERT INTO `box` VALUES (3, '--', 0, '0000-00-00 00:00:00');
INSERT INTO `box` VALUES (4, '161', 2, '2012-03-26 13:22:14');
INSERT INTO `box` VALUES (5, '--', 0, '0000-00-00 00:00:00');
INSERT INTO `box` VALUES (6, '--', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `control`
-- 

CREATE TABLE `control` (
  `control_id` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `current_global` int(3) NOT NULL,
  PRIMARY KEY (`control_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `control`
-- 

INSERT INTO `control` VALUES ('1', 32);
INSERT INTO `control` VALUES ('2', 161);
INSERT INTO `control` VALUES ('0', 0);
