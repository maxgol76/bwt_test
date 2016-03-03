-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 03 2016 г., 16:05
-- Версия сервера: 5.6.26
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `bwt`
--

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`) VALUES
(1, 'Alex', 'alex434@gmail.com', 'I like this site!'),
(2, 'David', 'davidnom34@dmail.com', 'Thank you, on this site there is everything about what I dreamed!'),
(3, 'Masha', 'mashala87@gmail.com', 'Hello. When you want to understand how visitors perceive your website, traffic data is only the beginning. Our expert-certified website feedback template will help you learn why visitors do what they do and how you can improve their experience. You’ll learn more about why people visit your site, what they hope to find, and whether you deliver the experience they expect.'),
(4, 'Dfghjuiop', 'maxgol76@gmail.com', 'sadsadsadsads');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sex` enum('male','female') DEFAULT 'male',
  `birthday` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fname`, `sname`, `email`, `sex`, `birthday`) VALUES
(1, 'Petya', 'Kruglov', 'petkrug@gmail.com', 'male', '2000-09-02'),
(2, 'Viktoria', 'Letvinova', 'viktletv@gmail.com', 'female', '1990-03-31'),
(3, 'Sasha', 'Ivanov', 'sashivan@gmail.com', 'male', '1980-02-25'),
(5, 'Max', 'Golovin', 'maxgol733@gmail.com', 'male', '1980-04-29'),
(9, 'Maxim', 'asdasd', 'asdasd233@com.ua', 'male', '1980-04-29'),
(17, 'Danil', 'Golovind', 'maol76@yandex.ua', 'male', '2000-07-14'),
(18, 'Danil', 'Fikerytfds', 'asdasd5233@com.ua', '', '2016-02-25'),
(19, 'Maxesfsd', 'Golovinewrwe', 'maxgdsfsdol733@gmail.com', 'female', '1950-01-31'),
(20, 'Semen', 'sadasdasd', 'maxsdgol733@gmail.com', 'male', '1970-01-01'),
(21, 'Maxesfsd', 'sdfsdf', 'asssdasd233@com.ua', 'female', '1970-01-01'),
(23, 'Maxesfsd', 'Golovin', 'maxgzxzol76@gmail.com', 'male', '2012-04-01'),
(25, 'Semen', 'Golovin', 'maol76@gmail.com', 'male', '1970-02-04');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
