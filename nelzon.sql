-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2022 a las 01:01:52
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nelzon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(50) NOT NULL,
  `nombre_curso` varchar(100) NOT NULL,
  `porcentaje_trabajos` float NOT NULL,
  `porcentaje_c1` float NOT NULL,
  `porcentaje_c2` float NOT NULL,
  `porcentaje_c3` float NOT NULL,
  `porcentaje_p1` float NOT NULL,
  `porcentaje_p2` float NOT NULL,
  `porcentaje_p3` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre_curso`, `porcentaje_trabajos`, `porcentaje_c1`, `porcentaje_c2`, `porcentaje_c3`, `porcentaje_p1`, `porcentaje_p2`, `porcentaje_p3`) VALUES
(1, 'Trabajo Interdisciplinar', 0.16666, 0.1, 0.1, 0.3, 0.1, 0.1, 0.3),
(2, 'Ciencias de la Computación II', 0.16666, 0.18, 0.18, 0.24, 0.12, 0.12, 0.16),
(3, 'Desarrollo Basado en Plataformas', 0.16666, 0.2, 0.2, 0.27, 0.09, 0.09, 0.15),
(4, 'Arquitectura de computadores', 0.16666, 0.05, 0.1, 0.35, 0.24, 0.19, 0.07);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadistica_diaria`
--

CREATE TABLE `estadistica_diaria` (
  `id` int(2) NOT NULL,
  `condicion` varchar(20) NOT NULL,
  `dia_1` int(2) NOT NULL,
  `dia_2` int(2) NOT NULL,
  `dia_3` int(2) NOT NULL,
  `dia_4` int(2) NOT NULL,
  `dia_5` int(2) NOT NULL,
  `dia_6` int(2) NOT NULL,
  `dia_7` int(2) NOT NULL,
  `dia_8` int(2) NOT NULL,
  `dia_9` int(2) NOT NULL,
  `dia_10` int(2) NOT NULL,
  `dia_11` int(2) NOT NULL,
  `dia_12` int(2) NOT NULL,
  `dia_13` int(2) NOT NULL,
  `dia_14` int(2) NOT NULL,
  `dia_15` int(2) NOT NULL,
  `dia_16` int(2) NOT NULL,
  `dia_17` int(2) NOT NULL,
  `dia_18` int(2) NOT NULL,
  `dia_19` int(2) NOT NULL,
  `dia_20` int(2) NOT NULL,
  `Total` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadistica_diaria`
--

INSERT INTO `estadistica_diaria` (`id`, `condicion`, `dia_1`, `dia_2`, `dia_3`, `dia_4`, `dia_5`, `dia_6`, `dia_7`, `dia_8`, `dia_9`, `dia_10`, `dia_11`, `dia_12`, `dia_13`, `dia_14`, `dia_15`, `dia_16`, `dia_17`, `dia_18`, `dia_19`, `dia_20`, `Total`) VALUES
(1, 'Presentes', 32, 26, 28, 28, 6, 35, 24, 20, 35, 31, 23, 27, 13, 38, 25, 20, 33, 23, 28, 30, 525),
(2, 'Faltas', 8, 14, 12, 12, 34, 5, 16, 20, 5, 9, 17, 13, 27, 2, 15, 20, 7, 17, 12, 10, 275);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_est` int(11) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `dia_1` varchar(1) NOT NULL,
  `dia_2` varchar(1) NOT NULL,
  `dia_3` varchar(1) NOT NULL,
  `dia_4` varchar(1) NOT NULL,
  `dia_5` varchar(1) NOT NULL,
  `dia_6` varchar(1) NOT NULL,
  `dia_7` varchar(1) NOT NULL,
  `dia_8` varchar(1) NOT NULL,
  `dia_9` varchar(1) NOT NULL,
  `dia_10` varchar(1) NOT NULL,
  `dia_11` varchar(1) NOT NULL,
  `dia_12` varchar(1) NOT NULL,
  `dia_13` varchar(1) NOT NULL,
  `dia_14` varchar(1) NOT NULL,
  `dia_15` varchar(1) NOT NULL,
  `dia_16` varchar(1) NOT NULL,
  `dia_17` varchar(1) NOT NULL,
  `dia_18` varchar(1) NOT NULL,
  `dia_19` varchar(1) NOT NULL,
  `dia_20` varchar(1) NOT NULL,
  `totalP` int(2) NOT NULL,
  `totalF` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_est`, `apellidos`, `nombres`, `dia_1`, `dia_2`, `dia_3`, `dia_4`, `dia_5`, `dia_6`, `dia_7`, `dia_8`, `dia_9`, `dia_10`, `dia_11`, `dia_12`, `dia_13`, `dia_14`, `dia_15`, `dia_16`, `dia_17`, `dia_18`, `dia_19`, `dia_20`, `totalP`, `totalF`) VALUES
(1, 'Apaza Apaza', 'Nelzon Jorge', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 20, 0),
(2, 'Apaza Quispe', 'Angel Abraham', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 20, 0),
(3, 'Benavente Aguirre', 'Paolo Daniel', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 20, 0),
(4, 'Cacsire Sanchez', 'Jhosep Angel', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 20, 0),
(5, 'Carazas Quispe', 'Alessander Jesus', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 20, 0),
(6, 'Castillo Sancho', 'Sergio Ahmed', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 20, 0),
(7, 'Cayllahua Gutierrez', 'Diego Yampier', 'F', 'F', 'F', 'P', 'F', 'F', 'F', 'F', 'P', 'F', 'P', 'P', 'F', 'P', 'P', 'F', 'P', 'F', 'P', 'P', 9, 11),
(8, 'Ccama Marron', 'Gustavo Alonso', 'F', 'P', 'F', 'P', 'F', 'F', 'F', 'F', 'P', 'F', 'P', 'F', 'F', 'P', 'P', 'F', 'P', 'F', 'P', 'P', 9, 11),
(9, 'Cerpa Garcia', 'Jean Franco', 'F', 'P', 'F', 'P', 'F', 'F', 'F', 'F', 'P', 'F', 'P', 'F', 'F', 'P', 'P', 'F', 'P', 'F', 'P', 'P', 9, 11),
(10, 'Condori Casquino', 'Ebert Luis', 'P', 'P', 'F', 'P', 'F', 'P', 'F', 'F', 'P', 'F', 'P', 'F', 'F', 'P', 'F', 'F', 'P', 'F', 'P', 'P', 10, 10),
(11, 'Davis Coropuna', 'Leon Felipe', 'P', 'P', 'F', 'P', 'F', 'P', 'F', 'F', 'P', 'F', 'P', 'P', 'F', 'P', 'F', 'F', 'P', 'F', 'P', 'P', 11, 9),
(12, 'Escarza Pacori', 'Alexander Raul', 'P', 'F', 'F', 'P', 'F', 'P', 'F', 'F', 'P', 'F', 'P', 'P', 'F', 'P', 'F', 'F', 'P', 'F', 'P', 'P', 10, 10),
(13, 'Gonzales Condori', 'Alejandro Javier', 'P', 'F', 'F', 'P', 'F', 'P', 'F', 'P', 'P', 'F', 'F', 'P', 'F', 'P', 'F', 'F', 'P', 'F', 'F', 'P', 9, 11),
(14, 'Gutierrez Zevallos', 'Jaime José', 'P', 'F', 'F', 'P', 'F', 'P', 'F', 'P', 'P', 'P', 'F', 'P', 'F', 'P', 'F', 'F', 'P', 'F', 'F', 'P', 10, 10),
(15, 'Hualpa Lopez', 'Jose Mauricio', 'P', 'F', 'F', 'P', 'F', 'P', 'F', 'P', 'P', 'P', 'F', 'P', 'F', 'P', 'F', 'F', 'P', 'F', 'F', 'P', 10, 10),
(16, 'Huaman Coaquira', 'Luciana Julissa', 'P', 'F', 'F', 'P', 'F', 'P', 'F', 'P', 'P', 'P', 'F', 'P', 'F', 'P', 'F', 'F', 'F', 'F', 'F', 'P', 9, 11),
(17, 'Lazo Paxi', 'Natalie Marleny', 'P', 'F', 'P', 'P', 'F', 'P', 'F', 'P', 'P', 'P', 'F', 'P', 'F', 'P', 'F', 'F', 'F', 'F', 'F', 'F', 9, 11),
(18, 'Lopez Condori', 'Andrea Del Rosario', 'P', 'P', 'P', 'P', 'F', 'P', 'F', 'P', 'F', 'P', 'F', 'P', 'F', 'P', 'F', 'F', 'F', 'F', 'F', 'F', 9, 11),
(19, 'Lupo Condori', 'Avelino', 'P', 'P', 'P', 'P', 'F', 'P', 'F', 'P', 'F', 'P', 'F', 'P', 'F', 'P', 'F', 'F', 'F', 'F', 'F', 'F', 9, 11),
(20, 'Maldonado Casilla', 'Braulio Nayap', 'P', 'P', 'P', 'P', 'F', 'P', 'F', 'P', 'F', 'P', 'F', 'F', 'F', 'P', 'F', 'F', 'F', 'F', 'F', 'F', 8, 12),
(21, 'Maldonado Parejo', ' Roy Abel', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 0, 20),
(22, 'Mariños Hilario', 'Princce Yorwin', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 'F', 0, 20),
(23, 'Martínez Choque', 'Aldo Raúl', 'P', 'P', 'P', 'P', 'F', 'P', 'P', 'F', 'P', 'P', 'F', 'F', 'F', 'P', 'F', 'F', 'P', 'F', 'F', 'F', 10, 10),
(24, 'Mayorga Villena', 'Jharold Alonso', 'P', 'P', 'P', 'P', 'F', 'P', 'P', 'F', 'P', 'P', 'F', 'F', 'F', 'P', 'F', 'F', 'P', 'P', 'F', 'F', 11, 9),
(25, 'Mena Quispe', 'Sergio Sebastian Santos', 'P', 'P', 'P', 'P', 'F', 'P', 'P', 'F', 'P', 'P', 'F', 'F', 'F', 'P', 'P', 'F', 'P', 'P', 'P', 'F', 13, 7),
(26, 'Mogollon Caceres', 'Sergio Daniel', 'P', 'P', 'P', 'P', 'F', 'P', 'P', 'F', 'P', 'P', 'F', 'F', 'F', 'P', 'P', 'F', 'P', 'P', 'P', 'F', 13, 7),
(27, 'Montoya Choque', 'Leonardo', 'P', 'P', 'P', 'P', 'F', 'P', 'P', 'F', 'P', 'P', 'F', 'F', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 15, 5),
(28, 'Nizama Cespedes', 'Juan Carlos Antonio', 'P', 'P', 'P', 'P', 'F', 'P', 'P', 'F', 'P', 'P', 'F', 'F', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 15, 5),
(29, 'Olazábal Chávez', 'Neill Elverth', 'P', 'P', 'P', 'P', 'F', 'P', 'P', 'P', 'P', 'P', 'F', 'F', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 16, 4),
(30, 'Pardavé Espinoza ', 'Christian', 'P', 'P', 'P', 'P', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 18, 2),
(31, 'Parizaca Mozo', 'Paul Antony', 'P', 'F', 'P', 'F', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 16, 4),
(32, 'Quilca Huamani', 'Bryan', 'P', 'F', 'P', 'F', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 16, 4),
(33, 'Quispe Rojas', 'Javier Wilber', 'F', 'F', 'P', 'F', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 15, 5),
(34, 'Roque Sosa', 'Owen Haziel', 'F', 'F', 'P', 'F', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 16, 4),
(35, 'Ruiz Mamani', 'Eduardo German', 'F', 'F', 'P', 'F', 'F', 'P', 'P', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 15, 5),
(36, 'Sucasaca Chire', 'Edward Henry', 'P', 'P', 'P', 'F', 'F', 'P', 'P', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 17, 3),
(37, 'Taya Yana', 'Samuel Omar', 'P', 'P', 'P', 'F', 'F', 'P', 'P', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 17, 3),
(38, 'Yavar Guillen', 'Roberto Gustavo', 'P', 'P', 'P', 'F', 'F', 'P', 'P', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 17, 3),
(39, 'Zamalloa Molina', 'Sebastian Agenor', 'P', 'P', 'P', 'F', 'F', 'P', 'P', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 17, 3),
(40, 'Zhong Callasi', 'Linghai Joaquin', 'P', 'P', 'P', 'F', 'F', 'P', 'P', 'F', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 'P', 17, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_est` int(50) NOT NULL,
  `trabajo_1_c1` float NOT NULL,
  `trabajo_2_c1` float NOT NULL,
  `trabajo_3_c1` float NOT NULL,
  `trabajo_4_c1` float NOT NULL,
  `trabajo_5_c1` float NOT NULL,
  `trabajo_6_c1` float NOT NULL,
  `trabajo_1_c2` float NOT NULL,
  `trabajo_2_c2` float NOT NULL,
  `trabajo_3_c2` float NOT NULL,
  `trabajo_4_c2` float NOT NULL,
  `trabajo_5_c2` float NOT NULL,
  `trabajo_6_c2` float NOT NULL,
  `trabajo_1_c3` float NOT NULL,
  `trabajo_2_c3` float NOT NULL,
  `trabajo_3_c3` float NOT NULL,
  `trabajo_4_c3` float NOT NULL,
  `trabajo_5_c3` float NOT NULL,
  `trabajo_6_c3` float NOT NULL,
  `continua_1` float NOT NULL,
  `continua_2` float NOT NULL,
  `continua_3` float NOT NULL,
  `parcial_1` float NOT NULL,
  `parcial_2` float NOT NULL,
  `parcial_3` float NOT NULL,
  `nota_final` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_est`, `trabajo_1_c1`, `trabajo_2_c1`, `trabajo_3_c1`, `trabajo_4_c1`, `trabajo_5_c1`, `trabajo_6_c1`, `trabajo_1_c2`, `trabajo_2_c2`, `trabajo_3_c2`, `trabajo_4_c2`, `trabajo_5_c2`, `trabajo_6_c2`, `trabajo_1_c3`, `trabajo_2_c3`, `trabajo_3_c3`, `trabajo_4_c3`, `trabajo_5_c3`, `trabajo_6_c3`, `continua_1`, `continua_2`, `continua_3`, `parcial_1`, `parcial_2`, `parcial_3`, `nota_final`) VALUES
(1, 12, 12, 14, 16, 17, 17, 13, 15, 17, 18, 17, 15, 20, 16, 15, 14, 15, 10, 14.6661, 15.8327, 14.9994, 16, 17, 18, 16.2497),
(2, 10, 5, 10, 11, 15, 11, 18, 11, 14, 17, 7, 14, 16, 14, 12, 16, 12, 13, 0, 0, 0, 0, 0, 0, 18),
(3, 15, 12, 12, 10, 13, 14, 12, 16, 12, 14, 12, 8, 12, 12, 17, 13, 12, 13, 12.6662, 12.3328, 13.1661, 18, 19, 20, 16.1497),
(4, 12, 9, 7, 12, 6, 16, 14, 13, 12, 18, 9, 8, 12, 9, 9, 11, 11, 15, 0, 0, 0, 0, 0, 0, 13),
(5, 11, 5, 15, 11, 11, 13, 13, 5, 9, 5, 15, 15, 9, 6, 11, 12, 11, 9, 0, 0, 0, 0, 0, 0, 14),
(6, 16, 9, 17, 5, 4, 6, 10, 11, 0, 15, 11, 12, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 10),
(7, 12, 10, 18, 5, 9, 6, 12, 11, 0, 13, 1, 10, 14, 19, 18, 5, 4, 18, 0, 0, 0, 0, 0, 0, 7),
(8, 11, 11, 13, 15, 4, 6, 9, 11, 10, 15, 13, 12, 14, 15, 8, 6, 19, 10, 0, 0, 0, 0, 0, 0, 0),
(9, 16, 9, 17, 5, 4, 6, 10, 11, 10, 15, 5, 14, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(10, 12, 10, 18, 5, 9, 6, 12, 11, 0, 15, 1, 10, 14, 19, 18, 5, 4, 18, 0, 0, 0, 0, 0, 0, 0),
(11, 11, 15, 15, 11, 20, 13, 3, 5, 9, 5, 15, 15, 19, 6, 11, 12, 11, 9, 0, 0, 0, 0, 0, 0, 0),
(12, 16, 9, 17, 5, 4, 6, 10, 11, 0, 15, 11, 12, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(13, 12, 9, 13, 5, 9, 16, 12, 11, 0, 13, 1, 10, 13, 19, 18, 5, 4, 18, 0, 0, 0, 0, 0, 0, 0),
(14, 11, 11, 13, 15, 14, 6, 9, 11, 10, 15, 13, 10, 14, 15, 8, 16, 12, 10, 0, 0, 0, 0, 0, 0, 0),
(15, 16, 9, 15, 5, 4, 6, 10, 11, 10, 9, 5, 15, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(16, 12, 10, 15, 5, 10, 6, 12, 11, 0, 15, 1, 10, 14, 20, 18, 5, 4, 18, 0, 0, 0, 0, 0, 0, 0),
(17, 16, 9, 17, 5, 4, 6, 10, 11, 0, 15, 11, 12, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(18, 16, 9, 15, 5, 4, 6, 10, 11, 10, 9, 5, 15, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(19, 11, 15, 15, 11, 20, 13, 3, 5, 9, 5, 15, 15, 19, 6, 11, 12, 11, 9, 0, 0, 0, 0, 0, 0, 0),
(20, 16, 9, 15, 5, 4, 6, 10, 11, 10, 9, 5, 15, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(21, 3, 11, 15, 11, 20, 13, 13, 15, 0, 5, 15, 15, 19, 6, 11, 12, 11, 9, 0, 0, 0, 0, 0, 0, 0),
(22, 16, 9, 17, 5, 4, 6, 10, 11, 0, 15, 10, 16, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(23, 12, 9, 13, 5, 9, 16, 12, 11, 0, 13, 1, 10, 13, 19, 18, 5, 4, 18, 0, 0, 0, 0, 0, 0, 0),
(24, 11, 11, 13, 15, 14, 6, 9, 11, 10, 15, 13, 10, 14, 15, 8, 16, 12, 10, 0, 0, 0, 0, 0, 0, 0),
(25, 16, 9, 15, 5, 14, 16, 10, 11, 10, 19, 15, 15, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(26, 12, 10, 15, 5, 10, 6, 12, 11, 0, 5, 1, 10, 14, 20, 18, 5, 4, 18, 0, 0, 0, 0, 0, 0, 0),
(27, 16, 9, 7, 5, 4, 6, 10, 11, 0, 15, 11, 12, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(28, 16, 9, 15, 5, 4, 6, 10, 11, 10, 9, 5, 15, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(29, 11, 15, 15, 11, 20, 13, 13, 7, 19, 15, 5, 15, 9, 6, 11, 12, 11, 9, 0, 0, 0, 0, 0, 0, 0),
(30, 16, 0, 15, 5, 4, 6, 10, 11, 10, 19, 15, 14, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(31, 1, 15, 6, 11, 9, 15, 3, 5, 9, 5, 17, 15, 19, 6, 13, 12, 11, 19, 0, 0, 0, 0, 0, 0, 0),
(32, 16, 9, 17, 5, 4, 6, 10, 11, 0, 15, 12, 12, 14, 17, 18, 16, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(33, 12, 9, 13, 5, 9, 16, 11, 14, 0, 13, 1, 10, 13, 19, 18, 5, 14, 8, 0, 0, 0, 0, 0, 0, 0),
(34, 20, 10, 13, 15, 14, 6, 9, 11, 10, 15, 13, 10, 4, 15, 8, 16, 12, 10, 0, 0, 0, 0, 0, 0, 0),
(35, 16, 9, 15, 5, 4, 6, 10, 20, 10, 19, 5, 15, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(36, 12, 10, 15, 5, 10, 6, 12, 11, 0, 15, 1, 10, 14, 20, 18, 5, 4, 18, 0, 0, 0, 0, 0, 0, 0),
(37, 16, 9, 17, 5, 4, 6, 10, 11, 0, 15, 11, 18, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(38, 16, 9, 15, 5, 4, 6, 10, 11, 10, 9, 5, 15, 14, 17, 18, 6, 9, 10, 0, 0, 0, 0, 0, 0, 0),
(39, 11, 15, 15, 11, 20, 13, 3, 6, 9, 5, 15, 15, 19, 6, 11, 12, 11, 9, 0, 0, 0, 0, 0, 0, 0),
(40, 16, 9, 15, 15, 4, 16, 5, 16, 11, 19, 5, 15, 14, 15, 18, 16, 9, 20, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `clave`) VALUES
('admin1', 'admin1'),
('admin2', 'admin2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indices de la tabla `estadistica_diaria`
--
ALTER TABLE `estadistica_diaria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_est`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_est`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_est` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
