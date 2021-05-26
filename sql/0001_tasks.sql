-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2021 г., 17:26
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `tasks`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `user_id`, `description`, `created_at`, `status`) VALUES
(111, 47, 'FIrst task', '2021-05-20 14:25:00', 0),
(112, 47, 'Second task', '2021-05-20 14:25:00', 0),
(113, 47, 'Third task', '2021-05-20 14:25:00', 0),
(114, 47, 'Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task Fourth task ', '2021-05-20 14:25:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `created_at`) VALUES
(47, 'admin', '$2y$10$BpcU1mNll6/8.RVCLXegzufso2IQN7BiYJwhBr6akWsUgHpjUIUEC', '2021-05-20 14:24:00');

-- --------------------------------------------------------

--
-- Структура таблицы `versions`
--

CREATE TABLE `versions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `versions`
--

INSERT INTO `versions` (`id`, `name`, `created`) VALUES
(1, '0001_tasks.sql', '2021-05-18 13:35:26'),
(142, '0002.sql', NULL),
(143, '0003.sql', NULL),
(146, '0004.sql', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Индексы таблицы `versions`
--
ALTER TABLE `versions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `versions`
--
ALTER TABLE `versions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
