-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 13 2022 г., 02:52
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `arhiv2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryname` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `categoryname`) VALUES
(1, 'Производственная практика'),
(2, 'Курсовая работа'),
(3, 'Дипломная работа'),
(4, 'Учебная практика'),
(5, 'Курсовой проект'),
(6, 'Выпускная квалификационная работа ');

-- --------------------------------------------------------

--
-- Структура таблицы `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `category` varchar(265) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sotrudniki` varchar(265) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `tema` varchar(265) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gruppa` varchar(265) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mestopolojenie` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fio` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `documents`
--

INSERT INTO `documents` (`id`, `category`, `sotrudniki`, `date`, `tema`, `gruppa`, `mestopolojenie`, `fio`) VALUES
(29, 'Производственная практика', 'Умников Александр Александрович', '2022-05-27', 'приветикуц', 'ИС-182', 'Архив', ''),
(30, 'Производственная практика', 'Умников Александр Александрович', '2022-05-25', 'ыыыы', 'ИС-182', 'Архив', 'ыыыы');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `group` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `group`) VALUES
(1, 'ИС-182'),
(2, 'ИС-192'),
(3, 'МБ-212');

-- --------------------------------------------------------

--
-- Структура таблицы `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `locations`
--

INSERT INTO `locations` (`id`, `location`) VALUES
(1, 'Архив'),
(2, 'Библиотека');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `Name` varchar(56) NOT NULL,
  `Email` varchar(56) NOT NULL,
  `Password` varchar(56) NOT NULL,
  `Phone` varchar(56) NOT NULL,
  `Role` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `Name`, `Email`, `Password`, `Phone`, `Role`) VALUES
(1, 'Администратор', 'admin@mail.ru', 'admin', '89196495401', 'Администратор'),
(2, 'Умников Александр Александрович', 'danis', 'danis', '+7(908) 342-5867', 'Сотрудник'),
(4, 'Закиев Ризван Робертович', 'sddadsa@mail.ru', 'rizvan2282', '+7(987) 005-8743', 'Пользователь'),
(5, 'Смирнова Василиса Константиновна', 'vasilisa@mail.ru', 'vasilisa', '+7(987) 005-8743', 'Сотрудник');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21341427;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
