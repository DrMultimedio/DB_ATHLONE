-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2018 a las 08:12:20
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
  `Comment` text CHARACTER SET latin1 NOT NULL
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
(19, 'Neon Genesis Evangelion', 'Serie', '', 'https://myanimelist.cdn-dena.com/images/anime/12/21418.jpg', 'https://i.imgur.com/qy8TZ8M.png', 'Mecha', NULL, 'It\'s an angel', '2017-12-14 01:06:53'),
(20, 'Nichijou', 'Serie', '', 'https://upload.wikimedia.org/wikipedia/en/thumb/9/9d/Nichijou_manga_volume_1_cover.jpg/220px-Nichijou_manga_volume_1_cover.jpg', 'http://img.animemovil.com/w440-h250-c/nichijou-sub-espanol.jpg', 'Comedy', NULL, 'This is fun', '2017-12-14 01:24:48'),
(23, 'Mob Psycho 100', 'Serie', '', 'http://img1.ak.crunchyroll.com/i/spire4/746648cbc49e05494bc250f40a0c84911467850041_full.jpg', 'https://res.cloudinary.com/sfp/image/upload/w_706,c_fill,q_60/oth/FunimationStoreFront/1685011/English/1685011_English_KeyArt-OfficialVideoImage_ccc4ce3a-649a-e711-8175-020165574d09.jpg', 'Comedy', NULL, 'You\'ll love shigeo, for sure', '2017-12-14 01:23:38'),
(24, 'One punch man', 'Serie', 'ONE', 'https://myanimelist.cdn-dena.com/images/anime/12/76049.jpg', 'http://donthatethegeek.com/wp-content/uploads/2017/10/one-punch-man.jpg', 'comedy', NULL, 'One punch to your heart', '2017-12-14 01:26:24'),
(25, 'Neon Genesis Evangelion', 'Game', 'Toby Fox', 'https://myanimelist.cdn-dena.com/images/anime/12/21418.jpg', 'https://i.imgur.com/qy8TZ8M.png', 'Mecha', NULL, 'It\'s an angel', '2017-12-14 01:06:53'),
(26, 'Neon Genesis Evangelion', 'Game', 'Toby Fox', 'https://myanimelist.cdn-dena.com/images/anime/12/21418.jpg', 'https://i.imgur.com/qy8TZ8M.png', 'Mecha', NULL, 'It\'s an angel', '2017-12-14 01:06:53'),
(27, 'Angel Beats', 'Serie', 'One otra vez ', 'http://img1.ak.crunchyroll.com/i/spire2/d9a8fbeb4b5b9e2f2a0085d5d20c63df1337895779_full.jpg', 'http://jonvilma.com/images/angel-beats-15.jpg', 'Cry one', NULL, 'It\'s also an angel, but this one shoots you... nevermind...', '2017-12-14 01:20:04');

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
-- Estructura de tabla para la tabla `genres`
--

CREATE TABLE `genres` (
  `GenreID` int(11) NOT NULL,
  `GenreName` varchar(255) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(4, 3, '2017-11-23 15:44:33'),
(5, 3, '2017-12-04 09:47:51'),
(6, 3, '2017-12-04 09:48:10'),
(7, 3, '2017-12-04 09:48:14'),
(8, 3, '2017-12-04 09:48:16'),
(9, 3, '2017-12-04 12:45:01'),
(10, 3, '2017-12-04 12:45:09'),
(11, 3, '2017-12-04 12:56:42'),
(12, 3, '2017-12-06 20:51:39'),
(13, 3, '2017-12-06 20:52:27'),
(14, 4, '2017-12-06 23:28:25'),
(15, 3, '2017-12-07 00:06:10'),
(16, 3, '2017-12-07 00:07:31'),
(17, 3, '2017-12-07 00:08:01'),
(18, 4, '2017-12-07 11:54:06'),
(19, 3, '2017-12-07 14:44:07'),
(20, 3, '2017-12-07 14:45:11'),
(21, 4, '2017-12-07 15:29:33'),
(22, 5, '2017-12-07 16:28:31'),
(23, 6, '2017-12-07 16:30:07'),
(24, 1, '2017-12-07 16:56:36'),
(25, 10, '2017-12-08 01:34:31'),
(26, 10, '2017-12-08 01:42:59'),
(27, 12, '2017-12-08 01:59:50'),
(28, 3, '2017-12-08 13:19:03'),
(29, 13, '2017-12-08 13:19:37'),
(30, 4, '2017-12-08 13:21:29'),
(31, 3, '2017-12-14 00:13:06'),
(32, 3, '2017-12-14 00:26:48'),
(33, 3, '2017-12-15 00:15:23'),
(34, 3, '2017-12-15 10:37:41'),
(35, 3, '2017-12-30 13:54:59'),
(36, 16, '2018-01-15 10:42:43'),
(37, 3, '2018-01-15 11:15:01');

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
  `Liked` int(1) NOT NULL,
  `Faved` int(1) NOT NULL,
  `Watched` int(1) NOT NULL,
  `Completed` int(1) NOT NULL,
  `Dropped` int(1) NOT NULL,
  `Watching` int(1) NOT NULL,
  `Note` text CHARACTER SET utf8 NOT NULL,
  `Mark` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`Content`, `User`, `Liked`, `Faved`, `Watched`, `Completed`, `Dropped`, `Watching`, `Note`, `Mark`) VALUES
(23, 3, 0, 1, 0, 1, 0, 1, '', 0),
(20, 3, 0, 0, 0, 1, 0, 0, 'El nichijou2  ', 0),
(23, 4, 0, 1, 0, 1, 0, 1, '', 0),
(24, 4, 0, 0, 0, 0, 0, 0, '', 0),
(25, 4, 0, 1, 0, 1, 0, 0, '', 0),
(24, 3, 0, 0, 0, 1, 0, 1, 'pues me ha gustado', 0),
(20, 5, 0, 0, 0, 1, 0, 0, '', 0),
(24, 6, 0, 1, 0, 1, 0, 0, '', 0),
(27, 6, 0, 1, 0, 1, 0, 0, '', 0),
(20, 6, 0, 0, 0, 1, 0, 0, '', 0),
(20, 1, 0, 0, 0, 1, 0, 0, '', 0),
(26, 1, 0, 0, 0, 1, 0, 0, '', 0),
(27, 3, 0, 0, 0, 1, 0, 0, '', 0),
(19, 3, 0, 0, 0, 1, 0, 1, 'it\'s an angel?\r\n', 0),
(23, 16, 0, 1, 0, 1, 0, 0, ' está vien vuena mis diesses', 0);

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
  `RegistrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`UserID`, `Name`, `Email`, `Password`, `Gender`, `Photo`, `Birthday`, `RegistrationDate`) VALUES
(1, 'Pipo', '', 'bc6ce2597e9993e047298f03ecbd9556a381a868', NULL, NULL, NULL, '2017-12-08 01:37:49'),
(3, 'Rei', 'ayanamirei@nerv.com', '218a42b39ae4df9f5f8be4ebe59bf2e1cd450447', NULL, NULL, NULL, '2017-12-08 02:14:02'),
(4, 'MarkLenders', 'campeones@futbol3.com', 'd5b96b8e8e3a7155c8eb5662cf4cd503e5f6ac6d', NULL, NULL, NULL, '2017-12-08 01:38:01'),
(5, 'Mike', 'mike@strangerthings.com', 'b9d55cb5b573c956b5f7bfc614e3b855624d8a66', NULL, NULL, NULL, '2017-12-08 01:38:06'),
(6, 'Saitama', 'onepunch@hero.org', '888f8e4697765cb421d7116e5d89dfa6fd9eb0e8', NULL, NULL, NULL, '2017-12-08 01:46:26'),
(12, 'Ritsu', 'ritsu@one.com', '02449e0ce315ce3ff6ff6a5333c7c5ea4f76d23c', NULL, NULL, NULL, '2017-12-08 01:59:29'),
(13, 'Shigeo', 'shigeo@one.com', 'f781208ea349bcfa5d006b3cc46221428757a297', NULL, NULL, NULL, '2017-12-08 13:18:25'),
(16, 'yui', 'a@b.com', '4be4427ae10e7cb73552111eff285b18b3786045', NULL, NULL, NULL, '2018-01-15 10:42:22');

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
-- Indices de la tabla `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`GenreID`);

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
  ADD KEY `status_ibfk_1` (`User`),
  ADD KEY `status_ibfk_2` (`Content`);

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
  MODIFY `ContentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `genres`
--
ALTER TABLE `genres`
  MODIFY `GenreID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `logins`
--
ALTER TABLE `logins`
  MODIFY `LoginId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `PostID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `Content` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `tags`
--
ALTER TABLE `tags`
  MODIFY `TagId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`User`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`Content`) REFERENCES `content` (`ContentID`);

--
-- Filtros para la tabla `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`User`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_ibfk_2` FOREIGN KEY (`Content`) REFERENCES `content` (`ContentID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
