-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Dec 17. 09:51
-- Kiszolgáló verziója: 10.4.14-MariaDB
-- PHP verzió: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `biq`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredient_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `ingredient_item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `inventory`
--

CREATE TABLE `inventory` (
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `inventory`
--

INSERT INTO `inventory` (`user_id`, `item_id`, `amount`) VALUES
(1, 1, 41),
(1, 3, 31),
(1, 5, 39),
(1, 13, 5),
(1, 14, 3),
(1, 17, 4),
(1, 18, 9),
(1, 19, 7);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `buy` int(11) NOT NULL,
  `sell` int(11) NOT NULL,
  `image` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `description`, `buy`, `sell`, `image`) VALUES
(1, 'fa', 'égetésre1', 100, 50, 'brandy'),
(2, 'barack', 'nem kész pálinka', 110, 100, 'peach'),
(3, 'körte', 'nem kész pálinka', 120, 50, 'pear'),
(4, 'szilva', 'nem kész pálinka', 130, 100, 'plum'),
(5, 'pálinka', 'kész pálinka', 140, 100, 'brandy'),
(6, 'sajt', 'nyam', 130, 100, 'cheese'),
(7, 'wc papir', 'fontos túlélési eszköz', 50, 40, 'tpaper'),
(8, 'fidget spinner', 'unaloműző', 200, 100, 'fidget_spinner'),
(9, 'cukorka', 'nyam', 60, 50, 'candy'),
(10, 'kifli', 'nyam', 60, 50, 'crescent'),
(11, 'horgászhal', 'hal', 100, 60, 'angler_fish'),
(12, 'gömbhal', 'hal', 100, 60, 'ballfish'),
(13, 'harcsa', 'hal', 100, 60, 'catfish'),
(14, 'macskacápa', 'hal', 100, 60, 'catshark'),
(15, 'hal', 'hal', 100, 60, 'fish'),
(16, 'halacska', 'hal', 100, 60, 'fish2'),
(17, 'koi', 'hal', 100, 60, 'koi'),
(18, 'old_boots', 'hal', 100, 60, 'old_boots'),
(19, 'cápa', 'hal', 100, 60, 'shark'),
(20, 'kardhal', 'hal', 100, 60, 'swordfish');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL,
  `money` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `permission`, `money`) VALUES
(1, 'CatShark', 'catsharkshin@gmail.com', '2891baceeef1652ee698294da0e71ba78a2a4064', 1, 8800),
(4, 'hanako', 'hanako@gmail.com', '2891baceeef1652ee698294da0e71ba78a2a4064', 1, 600);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredient_id`);

--
-- A tábla indexei `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`user_id`,`item_id`);

--
-- A tábla indexei `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
