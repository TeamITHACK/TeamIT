-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 15 2021 г., 06:34
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kim_olyash`
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
-- Структура таблицы `block_pitaniya`
--

CREATE TABLE `block_pitaniya` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `form_factor` text NOT NULL,
  `moschost` text NOT NULL,
  `pitanie_matpl_process` text NOT NULL,
  `pitanie_videocard` text NOT NULL,
  `raziemi_sata` text NOT NULL,
  `raziemi_molex` text NOT NULL,
  `raziemi_ventolyatora` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `block_pitaniya`
--

INSERT INTO `block_pitaniya` (`id`, `name`, `form_factor`, `moschost`, `pitanie_matpl_process`, `pitanie_videocard`, `raziemi_sata`, `raziemi_molex`, `raziemi_ventolyatora`, `image`, `price`) VALUES
(1, 'AEROCOOL VX PLUS 550W', 'ATX', '550 Вт', '24+4+4 pin', '6+2 pin', '3 шт', '3 шт', '120мм', 'img/aerocool.jpg', 2380),
(2, 'AEROCOOL VX PLUS 350W', 'ATX', '350 Вт', '24+4+4 pin', 'отсутствует', '2 шт', '2 шт', '120мм', 'img/4d939948fa7ca54d9dc54b02d20eec8a.jpg', 1480);

-- --------------------------------------------------------

--
-- Структура таблицы `corpus`
--

CREATE TABLE `corpus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `tiporazmer` text NOT NULL,
  `otseki_525_vneshnie` text NOT NULL,
  `otseki_35_vneshnie` text NOT NULL,
  `frontalnie_raziemi_2_0` int(11) NOT NULL,
  `frontalnie_raziemi_3_0` int(11) NOT NULL,
  `moschnost_bp` text NOT NULL,
  `material_korpusa` text NOT NULL,
  `max_leigh_videocard` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `corpus`
--

INSERT INTO `corpus` (`id`, `name`, `tiporazmer`, `otseki_525_vneshnie`, `otseki_35_vneshnie`, `frontalnie_raziemi_2_0`, `frontalnie_raziemi_3_0`, `moschnost_bp`, `material_korpusa`, `max_leigh_videocard`, `image`, `price`) VALUES
(1, 'ATX ACCORD ACC-B305, черный', 'Midi-Tower', '2', '2', 2, 1, 'не установлен', 'сталь', '300 мм', 'img/64ddd89f034156742d8e240f7e934b7c.jpg', 1730),
(2, 'ATX ZALMAN S3, черный', 'Midi-Tower', '2', '1', 2, 1, 'не установлен', 'сталь', '330 мм', 'img/1112667_v03_b-750x750.jpg', 2760);

-- --------------------------------------------------------

--
-- Структура таблицы `flash_memory`
--

CREATE TABLE `flash_memory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `interface` text NOT NULL,
  `raziem` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `flash_memory`
--

INSERT INTO `flash_memory` (`id`, `name`, `interface`, `raziem`, `image`, `price`) VALUES
(1, 'USB SANDISK Cruzer Fit 16ГБ [sdcz33-016g-g35]', 'USB2.0', 'открытый', 'img/1121814_v01_b.jpg', 340),
(2, 'KINGSTON DataTraveler 100 G3 32ГБ [dt100g3/32gb]', 'USB3.0', 'выдвижной', 'img/354327_v01_b.jpg', 450);

-- --------------------------------------------------------

--
-- Структура таблицы `jd_ssd`
--

CREATE TABLE `jd_ssd` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `form_factor` text NOT NULL,
  `interface` text NOT NULL,
  `maxxspeed_read` text NOT NULL,
  `maxspeed_write` text NOT NULL,
  `tip_memory` text NOT NULL,
  `resurs_tbw` text NOT NULL,
  `tolshina` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `jd_ssd`
--

INSERT INTO `jd_ssd` (`id`, `name`, `form_factor`, `interface`, `maxxspeed_read`, `maxspeed_write`, `tip_memory`, `resurs_tbw`, `tolshina`, `image`, `price`) VALUES
(1, 'KINGSTON A400 SA400S37/240G 240ГБ', '2.5\"', 'SATA III', '500 МБ/с', '350 МБ/с', 'TLC', '80 ТБ', '7 мм', 'img/1035813.jpg', 2840),
(2, 'WD Green WDS240G2G0A 240ГБ', '2.5\"', 'SATA III', '545 МБ/с', '465 МБ/с', '3D TLC', '80 ТБ', '7 мм', 'img/947238.jpg', 3240);

-- --------------------------------------------------------

--
-- Структура таблицы `jestkie_diski`
--

CREATE TABLE `jestkie_diski` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `tip_jd` text NOT NULL,
  `form_factor` text NOT NULL,
  `obiem_nakopitelya` text NOT NULL,
  `interface` text NOT NULL,
  `bufendate` text NOT NULL,
  `speedshpindelya` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `jestkie_diski`
--

INSERT INTO `jestkie_diski` (`id`, `name`, `tip_jd`, `form_factor`, `obiem_nakopitelya`, `interface`, `bufendate`, `speedshpindelya`, `image`, `price`) VALUES
(1, 'WD Caviar Blue WD10EZEX', 'HDD', '3.5 \"', '1 ТБ', 'SATA III', '64 МБ', '7200 об/мин', 'img/242021.jpg', 2990),
(2, 'TOSHIBA P300 HDWD110UZSVA', 'HDD', '3.5 \"', '1 ТБ', 'SATA III', '64 МБ', '7200 об/мин', 'img/697172.jpg', 2890);

-- --------------------------------------------------------

--
-- Структура таблицы `keyboard`
--

CREATE TABLE `keyboard` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `tip_soedineniya` text NOT NULL,
  `dlina_kabelya` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `keyboard`
--

INSERT INTO `keyboard` (`id`, `name`, `tip_soedineniya`, `dlina_kabelya`, `price`, `image`) VALUES
(1, 'LOGITECH K280e, черный', 'проводная', '1.66м', 1110, 'img/3255604_1.jpg'),
(2, 'MICROSOFT Wired 600, USB, черный', 'проводная', '1.3м', 880, 'img/510532_L.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `komputeri`
--

CREATE TABLE `komputeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `processor` text NOT NULL,
  `processor_chastota` text NOT NULL,
  `operativnaya_pamyat` text NOT NULL,
  `graghics` text NOT NULL,
  `jestkii_disk` text NOT NULL,
  `ssd` text NOT NULL,
  `operacionn_sistem` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `komputeri`
--

INSERT INTO `komputeri` (`id`, `name`, `processor`, `processor_chastota`, `operativnaya_pamyat`, `graghics`, `jestkii_disk`, `ssd`, `operacionn_sistem`, `image`, `price`) VALUES
(1, 'RDW Office, черный', 'AMD A8 9600', '3.1 ГГц (3.4 ГГц, в режиме Turbo)', 'DIMM, DDR4 4096 Мб 2400 МГц', 'AMD Radeon R7', 'отсутствует', '256 ГБ', 'noOS', 'img/1456422_v01_b.jpg', 12990),
(2, 'IRU Home 225, черный', 'AMD Ryzen 5 2600', '3.4 ГГц (3.9 ГГц, в режиме Turbo)', 'DIMM, DDR4 16384 Мб 2400 МГц', 'NVIDIA GeForce GTX 1050Ti - 4096 Мб', '1000 Гб, 7200 об/мин, SATA III', '120 ГБ', 'Windows 10 Home', 'img/1498490_v01_b.jpg', 64990);

-- --------------------------------------------------------

--
-- Структура таблицы `mat_plata`
--

CREATE TABLE `mat_plata` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `gnezdo_processora` text NOT NULL,
  `chipset` text NOT NULL,
  `chastota_spec` text NOT NULL,
  `slotov_pamyati` int(11) NOT NULL,
  `form_factor` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mat_plata`
--

INSERT INTO `mat_plata` (`id`, `name`, `gnezdo_processora`, `chipset`, `chastota_spec`, `slotov_pamyati`, `form_factor`, `image`, `price`) VALUES
(1, 'GIGABYTE B450M S2H', 'SocketAM4', 'AMD B450', '2933 МГц', 2, 'mATX', 'img/397690_15675_draft.jpg', 5090),
(2, 'ASROCK A320M-DVS R4.0', 'SocketAM4', 'AMD A320', '2667 МГц', 2, 'mATX', 'img/ASRock-A320M-HDV-R4-0.jpg_q50.jpg', 3750);

-- --------------------------------------------------------

--
-- Структура таблицы `moduli_pamyati`
--

CREATE TABLE `moduli_pamyati` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `form_factor` text NOT NULL,
  `kol_vo_kontaktov` text NOT NULL,
  `latentnost` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `moduli_pamyati`
--

INSERT INTO `moduli_pamyati` (`id`, `name`, `form_factor`, `kol_vo_kontaktov`, `latentnost`, `image`, `price`) VALUES
(1, 'AMD Radeon R7 Performance Series R748G2606U2S-UO DDR4 - 8ГБ', 'DIMM', '288-pin', 'CL16', 'img/151964.0x200.jpg', 3420),
(2, 'KINGSTON HyperX FURY Black HX426C16FB3K2/16 DDR4 - 2x 8ГБ', 'DIMM', '288-pin', 'CL16', 'img/0_263217.jpg', 7790);

-- --------------------------------------------------------

--
-- Структура таблицы `monitor`
--

CREATE TABLE `monitor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `razreshenie` varchar(15) NOT NULL,
  `sootnoshenie` varchar(5) NOT NULL,
  `tip_matrici` varchar(30) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `monitor`
--

INSERT INTO `monitor` (`id`, `name`, `razreshenie`, `sootnoshenie`, `tip_matrici`, `price`, `image`) VALUES
(1, 'Samsung C24RG50F', '2560x1440', '16:9', 'VA, отклик 4 мс', 10000, 'img/1454516.jpg'),
(2, 'LG 24MK430H', '1920x1080', '16:9', 'IPS', 8990, 'img/1312929.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `mouse`
--

CREATE TABLE `mouse` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `tehnologiya` text NOT NULL,
  `tip_soedineniya` text NOT NULL,
  `interface_connect` text NOT NULL,
  `razreshenie_sensora` text NOT NULL,
  `kol_vo_knopok` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `mouse`
--

INSERT INTO `mouse` (`id`, `name`, `tehnologiya`, `tip_soedineniya`, `interface_connect`, `razreshenie_sensora`, `kol_vo_knopok`, `price`, `image`) VALUES
(1, 'LOGITECH M170', 'оптическая', 'беспроводная', 'USB', '1000 dpi', 2, 560, 'img/logitech.jpg'),
(2, 'LOGITECH M185', 'оптическая', 'беспроводная', 'USB 1.1', '1000 dpi', 2, 1010, 'img/14159.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `office_api`
--

CREATE TABLE `office_api` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `sostav_paketa` text NOT NULL,
  `localisation` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `office_api`
--

INSERT INTO `office_api` (`id`, `name`, `sostav_paketa`, `localisation`, `image`, `price`) VALUES
(1, 'MICROSOFT Office для дома и учебы 2019', 'Word, Excel и PowerPoint', 'Rus', 'img/1207506_v01_b.jpg', 4900),
(2, 'MICROSOFT 365 персональный', 'Word, Excel, PowerPoint, Outlook, OneNote, Access (только для ПК), Publisher (только для ПК). Службы: OneDrive, Скайп.', 'Rus', 'img/1207502_v01_b.jpg', 3190);

-- --------------------------------------------------------

--
-- Структура таблицы `operac_sistem`
--

CREATE TABLE `operac_sistem` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `tip_opersist` text NOT NULL,
  `opisanie` text NOT NULL,
  `bitnost` text NOT NULL,
  `localisation` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `operac_sistem`
--

INSERT INTO `operac_sistem` (`id`, `name`, `tip_opersist`, `opisanie`, `bitnost`, `localisation`, `image`, `price`) VALUES
(1, 'Microsoft Windows 10 Home', 'Операционная система', 'Операционная система Windows 10 Домашняя предоставляет встроенные средства безопасности и приложения, такие как Почта, Календарь, Фотографии и Microsoft Edge, а также многие другие возможности, с которыми ваша работа будет безопасной и эффективной.', '32/64 bit', 'Русская', 'img/6007440b.jpg', 8790),
(2, 'Microsoft Windows 10 Professional', 'Операционная система', 'Все функции версии Windows 10 Домашняя плюс функции для бизнеса: шифрование, удаленный вход, создание виртуальных машин и многое другое.', '32/64 bit', 'Русская', 'img/1432434.jpg', 10000);

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
(27, 'Marina', 'Очень красиво!', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `processor`
--

CREATE TABLE `processor` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `yadro` text NOT NULL,
  `gnezdo_processora` text NOT NULL,
  `kol_vo_yader` int(11) NOT NULL,
  `kol_vo_potokov` int(11) NOT NULL,
  `chastota` text NOT NULL,
  `l3_cash` text NOT NULL,
  `tehn_process` text NOT NULL,
  `tip_pamyati` text NOT NULL,
  `ko_vo_kanaov` int(11) NOT NULL,
  `versya_pci` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `processor`
--

INSERT INTO `processor` (`id`, `name`, `yadro`, `gnezdo_processora`, `kol_vo_yader`, `kol_vo_potokov`, `chastota`, `l3_cash`, `tehn_process`, `tip_pamyati`, `ko_vo_kanaov`, `versya_pci`, `image`, `price`) VALUES
(1, ' AMD Ryzen 5 3600, OEM', 'Matisse', 'SocketAM4', 6, 12, '3.6 ГГц и 4.2 ГГц в режиме Turbo', '32 МБ', '7 нм', 'DDR4', 2, 'PCI Express 4.0', 'img/64567.970.jpg', 13990),
(2, 'AMD Ryzen 5 2600, OEM', 'Pinnacle Ridge', 'SocketAM4', 6, 12, '3.4 ГГц и 3.9 ГГц в режиме Turbo', '16 МБ', '12 нм', 'DDR4', 2, 'PCI Express 3.0', 'img/proccc.PNG', 10790);

-- --------------------------------------------------------

--
-- Структура таблицы `sistema_ohlajdeniya`
--

CREATE TABLE `sistema_ohlajdeniya` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `kol_vo_vevntilyatorov` int(11) NOT NULL,
  `diametr_ventilyatora` text NOT NULL,
  `skorost_vrascheniya_ventilyatora` text NOT NULL,
  `max_teplovid_process` text NOT NULL,
  `osnovanie_kulera` text NOT NULL,
  `pitanie` text NOT NULL,
  `visota_kulera` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `sistema_ohlajdeniya`
--

INSERT INTO `sistema_ohlajdeniya` (`id`, `name`, `kol_vo_vevntilyatorov`, `diametr_ventilyatora`, `skorost_vrascheniya_ventilyatora`, `max_teplovid_process`, `osnovanie_kulera`, `pitanie`, `visota_kulera`, `image`, `price`) VALUES
(1, 'DEEPCOOL GAMMAXX 300 FURY, 92мм, Ret', 1, '92 мм', '900 - 1800 об/мин', '130 Вт', 'с открытыми тепловыми трубками, материал - алюминий', '4-pin', '130.5 мм', 'img/3800284.jpg', 1230),
(2, 'DEEPCOOL GAMMAXX 400 BLUE BASIC, 120мм, Ret', 1, '120 мм', '900 - 1500 об/мин', '130 Вт', 'с открытыми тепловыми трубками, материал - алюминий/медь', '4-pin', '154.5 мм', 'img/ea93aedc85de0a7716.jpg', 1480);

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
(1, 'qwerty', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'olyashanina@yandex.ru', '', 'Шанина', 'Ольга', 'Игоревна', '+79302740726');

-- --------------------------------------------------------

--
-- Структура таблицы `videocard`
--

CREATE TABLE `videocard` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `videochisset` text NOT NULL,
  `chastota_graph_process` text NOT NULL,
  `obiem_videopamyati` text NOT NULL,
  `tip_videopamyati` text NOT NULL,
  `chastota_videopamyati` text NOT NULL,
  `podderjka_tekhology` text NOT NULL,
  `dop_pitanie` text NOT NULL,
  `rekomend_moschn_bp` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `videocard`
--

INSERT INTO `videocard` (`id`, `name`, `videochisset`, `chastota_graph_process`, `obiem_videopamyati`, `tip_videopamyati`, `chastota_videopamyati`, `podderjka_tekhology`, `dop_pitanie`, `rekomend_moschn_bp`, `image`, `price`) VALUES
(1, 'MSI nVidia GeForce GT 710', 'nVidia GeForce GT 710', '954 МГц', '1 ГБ', 'DDR3', '1600 МГц', 'DirectX 12/OpenGL 4.5', 'без дополнительного питания', '300 Вт', 'img/850002_1.jpg', 3690),
(2, 'GIGABYTE nVidia GeForce GTX 1050TI', 'nVidia GeForce GTX 1050TI', '1316 МГц (1455 МГц, в режиме Boost)', '4 ГБ', 'GDDR5', '7008 МГц', 'DirectX 12/OpenGL 4.5', 'без дополнительного питания', '300 Вт', 'img/videokartagtx-1050.jpg', 21590);

-- --------------------------------------------------------

--
-- Структура таблицы `vneshnie_diski`
--

CREATE TABLE `vneshnie_diski` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `tip_diska_po_ispoln` text NOT NULL,
  `form_factor` text NOT NULL,
  `obiem_nakopitelya` text NOT NULL,
  `interface` text NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vneshnie_diski`
--

INSERT INTO `vneshnie_diski` (`id`, `name`, `tip_diska_po_ispoln`, `form_factor`, `obiem_nakopitelya`, `interface`, `image`, `price`) VALUES
(1, 'HDD TOSHIBA Canvio Basics HDTB410EK3AA, черный', 'портативный', '2.5 \"', '1 ТБ', 'USB 3.0', 'img/1382018.jpg', 3590),
(2, 'HDD SEAGATE Expansion Portable STEA1000400, черный', 'портативный', '2.5 \"', '1 ТБ', 'USB 3.0', 'img/594534.jpg', 3690);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id_basket`);

--
-- Индексы таблицы `block_pitaniya`
--
ALTER TABLE `block_pitaniya`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `corpus`
--
ALTER TABLE `corpus`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `flash_memory`
--
ALTER TABLE `flash_memory`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `jd_ssd`
--
ALTER TABLE `jd_ssd`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `jestkie_diski`
--
ALTER TABLE `jestkie_diski`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `keyboard`
--
ALTER TABLE `keyboard`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `komputeri`
--
ALTER TABLE `komputeri`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `mat_plata`
--
ALTER TABLE `mat_plata`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `moduli_pamyati`
--
ALTER TABLE `moduli_pamyati`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `monitor`
--
ALTER TABLE `monitor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_monitor` (`id`);

--
-- Индексы таблицы `mouse`
--
ALTER TABLE `mouse`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `office_api`
--
ALTER TABLE `office_api`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `operac_sistem`
--
ALTER TABLE `operac_sistem`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `otziv`
--
ALTER TABLE `otziv`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `processor`
--
ALTER TABLE `processor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sistema_ohlajdeniya`
--
ALTER TABLE `sistema_ohlajdeniya`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `videocard`
--
ALTER TABLE `videocard`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vneshnie_diski`
--
ALTER TABLE `vneshnie_diski`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id_basket` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `block_pitaniya`
--
ALTER TABLE `block_pitaniya`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `corpus`
--
ALTER TABLE `corpus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `flash_memory`
--
ALTER TABLE `flash_memory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `jd_ssd`
--
ALTER TABLE `jd_ssd`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `jestkie_diski`
--
ALTER TABLE `jestkie_diski`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `keyboard`
--
ALTER TABLE `keyboard`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `komputeri`
--
ALTER TABLE `komputeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `mat_plata`
--
ALTER TABLE `mat_plata`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `moduli_pamyati`
--
ALTER TABLE `moduli_pamyati`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `monitor`
--
ALTER TABLE `monitor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `mouse`
--
ALTER TABLE `mouse`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `office_api`
--
ALTER TABLE `office_api`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `operac_sistem`
--
ALTER TABLE `operac_sistem`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `otziv`
--
ALTER TABLE `otziv`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `processor`
--
ALTER TABLE `processor`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `sistema_ohlajdeniya`
--
ALTER TABLE `sistema_ohlajdeniya`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `videocard`
--
ALTER TABLE `videocard`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `vneshnie_diski`
--
ALTER TABLE `vneshnie_diski`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
