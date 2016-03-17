-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 17 2016 г., 21:49
-- Версия сервера: 5.5.45
-- Версия PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `visermort`
--

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `url` varchar(50) NOT NULL,
  `decsription` varchar(300) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `name`, `url`, `decsription`, `image`) VALUES
(8, 'Сайт портфолио', 'http://visermort.ru', 'Выпускной проект по курсу веб-разработки в Loftschool.ru ', '12b41594c97466f16e00b399ec74c2ba_copy.jpg'),
(9, 'Фронт-энд Интернет-магазина', 'http://shop.visermort.ru', 'Фронт-энд Интернет-магазина по продаже мобильной техники', 'a24992d157d5165604f649bbd0d09273_copy.jpg'),
(10, 'Генератор водяных знаков', 'http://watermark.visermort.ru', 'Сервис по генерации водяных знаков на изображениях. Групповой проект. Участие: Teamleader, PHP, Javascript', 'c956e5d98a46b2431f0541afe3dad621_copy.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
