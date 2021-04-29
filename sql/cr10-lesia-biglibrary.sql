-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Квт 29 2021 р., 15:01
-- Версія сервера: 10.4.18-MariaDB
-- Версія PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `cr10-lesia-biglibrary`
--

-- --------------------------------------------------------

--
-- Структура таблиці `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(40) COLLATE utf8_bin NOT NULL,
  `author_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `author_lastname` varchar(20) COLLATE utf8_bin NOT NULL,
  `code` int(11) NOT NULL,
  `description` varchar(50) COLLATE utf8_bin NOT NULL,
  `publish_date` date NOT NULL,
  `publisher_name` varchar(20) COLLATE utf8_bin NOT NULL,
  `publisher_address` varchar(20) COLLATE utf8_bin NOT NULL,
  `size` varchar(10) COLLATE utf8_bin NOT NULL,
  `type` varchar(10) COLLATE utf8_bin NOT NULL,
  `status` varchar(20) COLLATE utf8_bin NOT NULL,
  `picture` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп даних таблиці `media`
--

INSERT INTO `media` (`id`, `title`, `author_name`, `author_lastname`, `code`, `description`, `publish_date`, `publisher_name`, `publisher_address`, `size`, `type`, `status`, `picture`) VALUES
(2, 'Marius and Jeanette3', 'Herb', 'Sparkes', 115731591, 'sapien varius ut blandfit non interdum in anehfg', '2021-04-06', 'Aimbu', 'Bay street 28', 'big', 'book', 'reserved', '6083eed1b713a.png'),
(4, 'Kiss and Tell', 'Monro', 'Fanthome', 290668744, 'est congue elementum in hac habitasse platea dictu', '2020-11-04', 'Yata', 'Jenifer street 873', 'medium', 'CD', 'available', '6083de9293519.jpg'),
(7, 'Vernon, Florida', 'Raimondo', 'Kleinstub', 648760657, 'diam in magna bibendum imperdiet nullam orci pede ', '2014-02-11', 'Jazzy', 'Northridge street 91', 'medium', 'CD', 'available', '6083eef95afec.jpg'),
(8, 'Watching the Detectives', 'Kara-lynn', 'Notley', 297417044, 'sagittis dui vel nisl duis acg', '2020-09-28', 'Eimbee', 'Careystreet 2', 'small', 'book', 'available', '6083eec7de70f.png'),
(15, 'Broken English	', 'Elayne', 'Gianilli', 256584797, 'et ultrices posuere cubilia curae mauris viverra	', '2021-04-03', 'Bubblebox', 'Jackson street 7', 'small', 'CD', 'reserved', '6083f15610aa1.jpg'),
(35, 'Roxie Hart	', 'Thorn', 'Laidel', 657587920, 'diam in magna bibendum imperdiet nullam	', '2019-05-15', 'Cogidoo', 'Meadow Vale', 'small', 'DVD', 'available', '6083ef3d15960.jpg'),
(36, 'It is a Disaster', 'Broderick', 'Akhurst', 404511033, 'diam nam tristique tortor eu pede', '2021-04-06', 'Pixonyx', 'Park Meadow 46', 'medium', 'DVD', 'reserved', '6083f1667b340.jpg'),
(37, 'Hunting Party, The	', 'Arvin', 'Attwill', 685228797, 'libero quis orci nullam molestie nibh in', '0000-00-00', 'Trudeo', 'Hermina street 47', 'medium', 'DVD', 'reserved', '6083f206ee864.jpg'),
(38, 'Waiting Room, The	', 'Corene', 'Cutts', 297348150, 'sit amet sem fusce consequat', '0000-00-00', 'Feedspan', 'Troy street 47', 'big', 'book', 'reserved', '6083f2413b7b2.jpg'),
(39, 'Fun', 'Sophey', 'Bastick', 23607495, 'nibh fusce lacus purus aliquet at feugiat non pret', '0000-00-00', 'Tagpad', 'Lawn street 39', 'small', 'CD', 'available', 'product.png');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `status` varchar(4) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `password`, `date_of_birth`, `email`, `picture`, `status`) VALUES
(1, 'Giorgi', 'Cat', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', '2019-03-10', 'cat@mail.com', 'avatar.png', 'user'),
(2, 'Admin', 'Cat', 'bcb15f821479b4d5772bd0ca866c00ad5f926e3580720659cc80d39c9d09802a', '2021-04-09', 'admin@mail.com', 'admavatar.png', 'adm'),
(3, 'Jerry', 'Mouse', '4cc8f4d609b717356701c57a03e737e5ac8fe885da8c7163d3de47e01849c635', '2021-04-05', 'jerry@mail.com', 'product.png', 'user');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
