-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-08-2020 a las 23:00:34
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adsi_wjbt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `password` char(60) NOT NULL DEFAULT '',
  `level` tinyint(3) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `lastAccess` datetime DEFAULT NULL,
  `session` varchar(32) NOT NULL DEFAULT '',
  `avatar` varchar(15) NOT NULL DEFAULT '',
  `timeStamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `active`, `lastAccess`, `session`, `avatar`, `timeStamp`) VALUES
(7, 'sisa', 'sisa2020@gmail.com', 'MXBvUHZMeTZBOUZIbzZsZHZabnBIQT09', 1, 1, '2020-08-06 05:19:06', '', '', '2020-08-01 11:11:18'),
(9, 'wilfer bru', 'wilfer@gmail.com', 'WW1uVm1qd2dkaHE5MU9DeWszNW9Mdz09', 1, 0, '2020-08-11 02:52:19', '', '', '2020-08-06 20:17:56'),
(19, 'rodolfo banegas', 'rodolfo@gmail.com', 'WW1uVm1qd2dkaHE5MU9DeWszNW9Mdz09', 2, 0, '2020-08-06 05:20:38', '', '', '2020-08-06 21:47:38'),
(30, 'El pinto Aqel', 'pinto@gmail.com', '', 2, 0, NULL, '', '', '2020-08-07 23:36:24');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
