-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 14 2022 г., 17:16
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `arhiv`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `categoryname` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
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
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `sotrudnik_id` int NOT NULL,
  `date` date NOT NULL,
  `tema` varchar(265) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int NOT NULL,
  `location_id` int NOT NULL,
  `fio` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `documents`
--

INSERT INTO `documents` (`id`, `category_id`, `sotrudnik_id`, `date`, `tema`, `group_id`, `location_id`, `fio`) VALUES
(50, 5, 5, '2022-06-14', 'Test', 1, 1, 'testtest'),
(51, 1, 2, '1111-11-11', 'ваня', 1, 1, 'ваня'),
(52, 1, 2, '1111-11-11', 'ваняв', 1, 1, 'ваняв'),
(53, 1, 2, '1111-11-11', 'ваня', 1, 1, 'ваня'),
(54, 1, 2, '1111-11-11', 'ваняв', 1, 1, 'ваняв'),
(55, 1, 2, '1111-11-11', 'ваня', 1, 1, 'ваня'),
(56, 1, 2, '1111-11-11', 'ваняв', 1, 1, 'ваняв'),
(57, 1, 2, '2133-03-12', 'фцкцфккцф', 1, 1, 'кцфк'),
(58, 1, 2, '3333-03-31', 'аи', 1, 1, 'выами');

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int NOT NULL,
  `group` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `group`) VALUES
(1, 'ИС-18'),
(2, 'ИС-192'),
(3, 'МБ-212');

-- --------------------------------------------------------

--
-- Структура таблицы `locations`
--

CREATE TABLE `locations` (
  `id` int NOT NULL,
  `location` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
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
  `id` int NOT NULL,
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
(5, 'Смирнова Василиса Константиновна', 'vasilisa@mail.ru', 'vasilisas', '+7(987) 005-8743', 'Сотрудник');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `sotrudnik_id` (`sotrudnik_id`);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21341426;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documents_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documents_ibfk_3` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documents_ibfk_4` FOREIGN KEY (`sotrudnik_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
