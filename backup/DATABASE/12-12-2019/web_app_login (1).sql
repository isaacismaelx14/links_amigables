-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-12-2019 a las 12:47:21
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web_app_login`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_modify` int(2) NOT NULL,
  `time_limit_pm` int(5) NOT NULL,
  `code_pm` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `user`, `email`, `password`, `password_modify`, `time_limit_pm`, `code_pm`) VALUES
(4, 'Isaac', 'Martinez', 'isaac', 'isaacismaelx14@gmail.com', '$2y$10$S47RgWjIHYsPUp9gyGN0dO2v4IFc5LQAJOouljfqQfj/f60uVXffS', 0, 0, 'NONE'),
(6, 'Grismaily', 'Báez', 'piratax14', 'isaacismael789@gmail.com', '$2y$10$OhJe6rNYL8yyJmZn0Un8MuqGMcWQMNDJrOl1E02uJ84r2PAplpD.C', 0, 0, ''),
(7, 'clary', 'med', 'clary77', 'licdaclaribelmedrano@gmail.com', '$2y$10$DXZaE.Ymvn.3WWUZXHHPIO8.X58AZOuaVvCkJ7ATEEs1HsfMblIqq', 0, 0, 'NONE'),
(23, 'Isaac', 'Del', 'delete', 'delete@delete.com', '$2y$10$eH81S7Uu8mOTjO7b9bHmX.S0.73QK2feJ1BLMtAeazLqdmHWVbJ/W', 0, 0, ''),
(24, 'Lucas', 'Gonzales', 'lucar_r', 'lucas@localhost.com', '$2y$10$MuAKLoAZge6UYOK6L9EPNezn3of.JBn0BtbiBuq3gImvbCO/vnLOe', 0, 0, ''),
(25, 'Paul', 'Ramirez', 'paul_r', 'paulramirez123@faebook.com', '$2y$10$sIexY69esRVHKRo7CoLRFuo1QF/HqycWn0xuTRSqdb8f18PXXDvl6', 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_verify`
--

CREATE TABLE `user_verify` (
  `id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `code_user` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_verify`
--

INSERT INTO `user_verify` (`id`, `user_id`, `code_user`) VALUES
(1, 23, '725-301'),
(2, 24, '573-273'),
(3, 25, '081-083');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_verify`
--
ALTER TABLE `user_verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `user_verify`
--
ALTER TABLE `user_verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
