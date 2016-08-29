-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 29 2016 г., 18:31
-- Версия сервера: 5.5.45
-- Версия PHP: 5.4.44

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `5433`
--

-- --------------------------------------------------------

--
-- Структура таблицы `appealsCatigory`
--

CREATE TABLE IF NOT EXISTS `appealsCatigory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categori` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `appealsCatigory`
--

INSERT INTO `appealsCatigory` (`id`, `categori`) VALUES
(1, 'Матрасы'),
(2, 'Наматрасники'),
(3, 'Подушки'),
(4, 'Кровати'),
(5, 'Основания'),
(6, 'Одеяла'),
(7, 'Постельное белье'),
(8, 'Другое'),
(9, 'Фабрика'),
(10, 'Какоето предложение'),
(11, 'Заказ Оформлен'),
(12, 'Заказ Не Оформлен'),
(13, 'Посмотреть в салоне'),
(14, 'Забрать самовывоз'),
(15, 'Ошиблись номером');

-- --------------------------------------------------------

--
-- Структура таблицы `appealsCR`
--

CREATE TABLE IF NOT EXISTS `appealsCR` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categori_id` int(11) NOT NULL,
  `results_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Дамп данных таблицы `appealsCR`
--

INSERT INTO `appealsCR` (`id`, `categori_id`, `results_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(6, 3, 2),
(7, 4, 1),
(8, 4, 2),
(9, 5, 1),
(10, 5, 2),
(11, 6, 1),
(12, 6, 2),
(13, 7, 1),
(14, 7, 2),
(17, 11, 3),
(18, 12, 1),
(19, 12, 2),
(21, 13, 3),
(22, 14, 3),
(23, 9, 3),
(24, 10, 3),
(25, 15, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `appealsPC`
--

CREATE TABLE IF NOT EXISTS `appealsPC` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purpose_id` int(11) NOT NULL,
  `categori_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `appealsPC`
--

INSERT INTO `appealsPC` (`id`, `purpose_id`, `categori_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 2, 1),
(9, 2, 2),
(10, 2, 3),
(11, 2, 4),
(12, 2, 5),
(13, 2, 6),
(14, 2, 7),
(15, 3, 11),
(16, 3, 12),
(17, 4, 13),
(18, 4, 14),
(19, 6, 9),
(20, 6, 10),
(21, 6, 15);

-- --------------------------------------------------------

--
-- Структура таблицы `appealsPurpose`
--

CREATE TABLE IF NOT EXISTS `appealsPurpose` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purpose` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `appealsPurpose`
--

INSERT INTO `appealsPurpose` (`id`, `purpose`) VALUES
(1, 'Целевой'),
(2, 'Помощь в выборе'),
(3, 'Уточнение по заказу'),
(4, 'Как пройти'),
(5, 'Самовывоз'),
(6, 'Другое');

-- --------------------------------------------------------

--
-- Структура таблицы `appealsResults`
--

CREATE TABLE IF NOT EXISTS `appealsResults` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `results` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `appealsResults`
--

INSERT INTO `appealsResults` (`id`, `results`) VALUES
(1, 'Оформлено'),
(2, 'Думает'),
(3, 'Вопрос решен');

-- --------------------------------------------------------

--
-- Структура таблицы `appealsTP`
--

CREATE TABLE IF NOT EXISTS `appealsTP` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `purpose_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `appealsTP`
--

INSERT INTO `appealsTP` (`id`, `type_id`, `purpose_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 6),
(6, 2, 1),
(7, 2, 2),
(8, 3, 1),
(9, 3, 2),
(10, 3, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `appealsType`
--

CREATE TABLE IF NOT EXISTS `appealsType` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `appealsType`
--

INSERT INTO `appealsType` (`id`, `type`) VALUES
(1, 'Звонок'),
(2, 'Зал'),
(3, 'Чат');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
