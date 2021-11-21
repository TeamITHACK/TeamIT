-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 21 2021 г., 12:28
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rzd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id_basket` bigint(20) UNSIGNED NOT NULL,
  `id_tovara` text NOT NULL,
  `login` text NOT NULL,
  `summa` int(11) NOT NULL,
  `status` text NOT NULL,
  `data_zakaza` date NOT NULL DEFAULT current_timestamp(),
  `kolichesto` int(11) NOT NULL,
  `data_vidachi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `bronirovanie`
--

CREATE TABLE `bronirovanie` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `imya` varchar(150) NOT NULL,
  `familia` varchar(150) NOT NULL,
  `otchestvo` varchar(150) NOT NULL,
  `nomer_doma` tinyint(4) NOT NULL,
  `kol_spal_mest` tinyint(4) NOT NULL,
  `data_zaselenya` date NOT NULL,
  `srok` tinyint(4) NOT NULL,
  `na_chto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bronirovanie`
--

INSERT INTO `bronirovanie` (`id`, `imya`, `familia`, `otchestvo`, `nomer_doma`, `kol_spal_mest`, `data_zaselenya`, `srok`, `na_chto`) VALUES
(41, 'Дмитрий', 'Моисеев', 'Игоревич', 11, 1, '2021-11-24', 15, 'dom'),
(42, '', '', '', 1, 1, '2021-11-21', 1, 'banya'),
(43, 'Дмитрий', 'Моисеев', 'Игоревич', 1, 1, '2021-11-24', 1, 'banya'),
(44, 'Дмитрий', 'Моисеев', 'Игоревич', 4, 4, '2021-11-24', 20, 'dom'),
(45, '', 'Моисеев', '', 0, 0, '2021-11-21', 18, 'ohota'),
(46, '', '', '', 1, 1, '2021-11-21', 1, 'dom'),
(47, '', '', '', 1, 1, '2021-11-21', 1, 'dom'),
(48, '', '', '', 1, 1, '2021-11-21', 1, 'dom'),
(49, '', '', '', 0, 0, '2021-11-21', 1, 'ribalka'),
(50, '', '', '', 1, 1, '2021-11-21', 1, 'banya'),
(51, '', '', '', 1, 1, '2021-11-21', 1, 'banya'),
(52, '', '', '', 0, 0, '2021-11-21', 1, 'ohota'),
(53, '', '', '', 0, 0, '2021-11-21', 1, 'ribalka'),
(54, '', '', '', 0, 0, '2021-11-21', 1, 'ohota'),
(55, '', '', '', 1, 1, '2021-11-21', 1, 'banya'),
(56, '', '', '', 0, 0, '2021-11-21', 1, 'ohota'),
(57, '', '', '', 0, 0, '2021-11-21', 1, 'ribalka');

-- --------------------------------------------------------

--
-- Структура таблицы `otziv`
--

CREATE TABLE `otziv` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `coment` text NOT NULL,
  `ocenka` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `otziv`
--

INSERT INTO `otziv` (`id`, `name`, `coment`, `ocenka`) VALUES
(25, 'Roma', 'bombezno!', 1),
(26, 'Olya', 'wow!', 5),
(27, 'Marina', 'Очень красиво!', 5),
(28, 'Rrrr', '123123', 2),
(29, 'Роман', 'Отлично', 5),
(30, 'Роман', 'класс', 5),
(31, 'Роман', 'Супер', 3),
(32, 'Алексей', 'Отлично', 5),
(33, 'Роман', 'Всё отлично', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `image` varchar(50) NOT NULL,
  `Surname` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Otchestvo` varchar(30) NOT NULL,
  `Phone` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `user_login`, `user_password`, `user_email`, `image`, `Surname`, `Name`, `Otchestvo`, `Phone`) VALUES
(1, 'qwerty', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'olyashanina@yandex.ru', '', 'Шанина', 'Ольга', 'Игоревна', '+79302740726'),
(2, 'qwerty1', '6dbd0fe19c9a301c4708287780df41a2', 'ghnjhbgvfcd@yandex.ru', '', 'de', 'rdf', 'ede', '434'),
(3, 'qwert', 'a384b6463fc216a5f8ecb6670f86456a', 'romanmoiseev8130@g', '', 'KUCHA', 'IGOR', 'фыв', '89047953505'),
(4, 'Roman', '1b4f2f6f94b053e3a32726e62b85db9c', 'asdass@mail.ru', '', 'Моисеев', 'Роман', 'Игоревич', '89047953505'),
(5, 'Roma', '1b4f2f6f94b053e3a32726e62b85db9c', 'sadasd@mail.ru', '', 'KUCHA', 'IGOR', 'Игоревич', '89047953505');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_basket`);

--
-- Индексы таблицы `bronirovanie`
--
ALTER TABLE `bronirovanie`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `otziv`
--
ALTER TABLE `otziv`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id_basket` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `bronirovanie`
--
ALTER TABLE `bronirovanie`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `otziv`
--
ALTER TABLE `otziv`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
