-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2017 a las 22:31:05
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tracktheculture`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `CommentId` int(11) NOT NULL,
  `Content` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `Comment` text CHARACTER SET latin1 NOT NULL,
  `Parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content`
--

CREATE TABLE `content` (
  `ContentID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Author` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `BackgroundPhoto` varchar(255) NOT NULL,
  `Genre` varchar(255) DEFAULT NULL,
  `ReleaseDate` date DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `content`
--

INSERT INTO `content` (`ContentID`, `Name`, `Type`, `Author`, `Photo`, `BackgroundPhoto`, `Genre`, `ReleaseDate`, `Description`, `RegistrationDate`) VALUES
(16, 'Ca?ones de nakaasone', 'Game', '? ? ? ? ? ', '', '', 'Viva vegetta', NULL, 'La ca?a de espa?a loco ?$', '2017-11-26 19:14:54'),
(19, 'Neon Genesis Evangelion', 'Serie', '', '', '', 'Mecha', NULL, 'Un ca??n de serie', '2017-11-26 19:23:34'),
(20, 'Neon Genesis Evangelion', 'Serie', '', 'https://myanimelist.cdn-dena.com/images/anime/12/21418.jpg', 'https://i.imgur.com/qy8TZ8M.png', 'Mecha', NULL, 'Un cañón de serie', '2017-11-30 15:06:37'),
(21, 'Cañones de nakaasone', 'Game', 'Á É Í Ó Ú ', '', '', 'Viva vegetta', NULL, 'La caña de españa loco €$', '2017-11-28 19:16:00'),
(22, 'Cañones de nakaasone', 'Game', 'Á É Í Ó Ú ', '', '', 'Viva vegetta', NULL, 'La caña de españa loco €$', '2017-11-30 12:19:56'),
(23, 'Angel Beats', 'Serie', '', 'http://img1.ak.crunchyroll.com/i/spire2/d9a8fbeb4b5b9e2f2a0085d5d20c63df1337895779_full.jpg', 'http://images5.fanpop.com/image/photos/32000000/Angel-Beats-ilovemanga4ever-and-s_y_r_i_n_x-32055987-1999-1079.jpg', 'idk', NULL, 'Mola mazo en verdad', '2017-11-30 15:45:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `following`
--

CREATE TABLE `following` (
  `UserFollowing` int(11) NOT NULL,
  `UserFollowed` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logins`
--

CREATE TABLE `logins` (
  `LoginId` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logins`
--

INSERT INTO `logins` (`LoginId`, `User`, `time`) VALUES
(1, 1, '2017-11-21 10:58:43'),
(2, 3, '2017-11-23 15:30:42'),
(3, 3, '2017-11-23 15:44:28'),
(4, 3, '2017-11-23 15:44:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `PostID` int(11) NOT NULL,
  `User` int(11) DEFAULT NULL,
  `Comment` int(11) DEFAULT NULL,
  `Content` int(11) DEFAULT NULL,
  `Text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `Content` int(11) NOT NULL,
  `User` int(11) NOT NULL,
  `Liked` int(11) NOT NULL,
  `Faved` int(11) NOT NULL,
  `Watched` int(11) NOT NULL,
  `Watching` int(11) NOT NULL,
  `Dropped` int(11) NOT NULL,
  `Mark` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE `tags` (
  `TagId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `RegisterDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Email`, `Password`, `Gender`, `Photo`, `Birthday`, `RegistrationDate`) VALUES
(1, 'Pipo', '', 'contigopipo', NULL, NULL, NULL, '2017-11-21 10:14:57'),
(3, 'Rei', 'ayanamirei@nerv.com', 'lilith', NULL, NULL, NULL, '2017-11-23 15:30:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`CommentId`),
  ADD KEY `User` (`User`),
  ADD KEY `Content` (`Content`);

--
-- Indices de la tabla `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`ContentID`);

--
-- Indices de la tabla `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`UserFollowing`,`UserFollowed`),
  ADD KEY `FK_UserFollowed` (`UserFollowed`),
  ADD KEY `FK_UserFollowing` (`UserFollowing`);

--
-- Indices de la tabla `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`LoginId`),
  ADD KEY `UserFK` (`User`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`PostID`),
  ADD KEY `User` (`User`),
  ADD KEY `Content` (`Content`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD KEY `User` (`User`),
  ADD KEY `Content` (`Content`);

--
-- Indices de la tabla `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`TagId`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `CommentId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `content`
--
ALTER TABLE `content`
  MODIFY `ContentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `logins`
--
ALTER TABLE `logins`
  MODIFY `LoginId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `Content` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `TagId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`User`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`Content`) REFERENCES `content` (`ContentID`);

--
-- Filtros para la tabla `following`
--
ALTER TABLE `following`
  ADD CONSTRAINT `FK_UserFollowed` FOREIGN KEY (`UserFollowed`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_UserFollowing` FOREIGN KEY (`UserFollowing`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `logins`
--
ALTER TABLE `logins`
  ADD CONSTRAINT `logins_ibfk_1` FOREIGN KEY (`User`) REFERENCES `users` (`UserID`);

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`User`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`Content`) REFERENCES `content` (`ContentID`);

--
-- Filtros para la tabla `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`User`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `status_ibfk_2` FOREIGN KEY (`Content`) REFERENCES `content` (`ContentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
