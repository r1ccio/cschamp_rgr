-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 22 2022 г., 04:13
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `CSChamp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Game`
--

CREATE TABLE `Game` (
  `id` int NOT NULL,
  `team1_id` int NOT NULL,
  `team2_id` int NOT NULL,
  `tournament_id` int NOT NULL,
  `played_at` varchar(11) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Game`
--

INSERT INTO `Game` (`id`, `team1_id`, `team2_id`, `tournament_id`, `played_at`) VALUES
(18, 4, 2, 6, '2022-11-22');

-- --------------------------------------------------------

--
-- Структура таблицы `Player`
--

CREATE TABLE `Player` (
  `id` int NOT NULL,
  `team_id` int NOT NULL,
  `role` char(50) COLLATE utf8mb4_general_ci NOT NULL,
  `nickname` char(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Player`
--

INSERT INTO `Player` (`id`, `team_id`, `role`, `nickname`) VALUES
(1, 1, 'Rifler', 'B1t'),
(2, 1, 'Rifler', 'Perfecto'),
(3, 1, 'Rifler', 'sdy'),
(4, 1, 'Sniper', 's1mple'),
(5, 1, 'Captain', 'electronic'),
(6, 2, 'Rifler', 'FASHR'),
(7, 2, 'Captain', 'Mezii'),
(8, 2, 'Rifler', 'roeJ'),
(9, 2, 'Sniper', 'nicoodoz'),
(10, 2, 'Rifler', 'Krimz'),
(11, 3, 'Rifler', 'Xyp9x'),
(12, 3, 'Captain', 'gla1ve'),
(13, 3, 'Rifler', 'blameF'),
(14, 3, 'Sniper', 'dev1ce'),
(15, 3, 'Rifler', 'casle'),
(16, 4, 'Sniper', 'REZ'),
(17, 4, 'Rifler', 'hampus'),
(18, 4, 'Rifler', 'es3tag'),
(19, 4, 'Rifler', 'Brollan'),
(20, 4, 'Captain', 'Aleksib'),
(21, 5, 'Rifler', 'huNter-'),
(22, 5, 'Rifler', 'NiKo'),
(23, 5, 'Sniper', 'm0NESY');

-- --------------------------------------------------------

--
-- Структура таблицы `Round`
--

CREATE TABLE `Round` (
  `id` int NOT NULL,
  `game_id` int NOT NULL,
  `winner_team_id` int DEFAULT NULL,
  `played_at` varchar(11) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Round`
--

INSERT INTO `Round` (`id`, `game_id`, `winner_team_id`, `played_at`) VALUES
(29, 18, 1, '2022-11-22');

-- --------------------------------------------------------

--
-- Структура таблицы `Team`
--

CREATE TABLE `Team` (
  `id` int NOT NULL,
  `name` char(50) COLLATE utf8mb4_general_ci NOT NULL,
  `tier` int NOT NULL,
  `created_at` varchar(11) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `Team`
--

INSERT INTO `Team` (`id`, `name`, `tier`, `created_at`) VALUES
(1, 'NAVI', 1, ''),
(2, 'Fnatic', 1, ''),
(3, 'Astralis', 1, ''),
(4, 'Ninjas in Pyjamas', 1, ''),
(5, 'G2 Esports', 1, '');

-- --------------------------------------------------------

--
-- Структура таблицы `Tournament`
--

CREATE TABLE `Tournament` (
  `id` int NOT NULL,
  `prize` float NOT NULL,
  `winner_team_id` int DEFAULT NULL,
  `created_at` varchar(11) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tournament';

--
-- Дамп данных таблицы `Tournament`
--

INSERT INTO `Tournament` (`id`, `prize`, `winner_team_id`, `created_at`) VALUES
(6, 50000, 2, '2022-11-01');

-- --------------------------------------------------------

--
-- Структура таблицы `usertbl`
--

CREATE TABLE `usertbl` (
  `id` int NOT NULL,
  `full_name` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '',
  `admin` varchar(12) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `usertbl`
--

INSERT INTO `usertbl` (`id`, `full_name`, `email`, `username`, `password`, `admin`) VALUES
(1, 'Ratushniy Pavel', 'pavel.4w@gmail.com', 'riccio', '12345', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Game`
--
ALTER TABLE `Game`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team1_id` (`team1_id`),
  ADD KEY `team2_id` (`team2_id`),
  ADD KEY `tournament_id` (`tournament_id`);

--
-- Индексы таблицы `Player`
--
ALTER TABLE `Player`
  ADD PRIMARY KEY (`id`),
  ADD KEY `team_id` (`team_id`);

--
-- Индексы таблицы `Round`
--
ALTER TABLE `Round`
  ADD PRIMARY KEY (`id`),
  ADD KEY `game_id` (`game_id`),
  ADD KEY `winner_team_id` (`winner_team_id`);

--
-- Индексы таблицы `Team`
--
ALTER TABLE `Team`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Tournament`
--
ALTER TABLE `Tournament`
  ADD PRIMARY KEY (`id`),
  ADD KEY `winner_team_id` (`winner_team_id`);

--
-- Индексы таблицы `usertbl`
--
ALTER TABLE `usertbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Game`
--
ALTER TABLE `Game`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `Player`
--
ALTER TABLE `Player`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT для таблицы `Round`
--
ALTER TABLE `Round`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `Team`
--
ALTER TABLE `Team`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `Tournament`
--
ALTER TABLE `Tournament`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `usertbl`
--
ALTER TABLE `usertbl`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Game`
--
ALTER TABLE `Game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`team1_id`) REFERENCES `Team` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`team2_id`) REFERENCES `Team` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_ibfk_3` FOREIGN KEY (`tournament_id`) REFERENCES `Tournament` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Player`
--
ALTER TABLE `Player`
  ADD CONSTRAINT `player_ibfk_1` FOREIGN KEY (`team_id`) REFERENCES `Team` (`id`);

--
-- Ограничения внешнего ключа таблицы `Round`
--
ALTER TABLE `Round`
  ADD CONSTRAINT `round_ibfk_2` FOREIGN KEY (`winner_team_id`) REFERENCES `Team` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT,
  ADD CONSTRAINT `round_ibfk_3` FOREIGN KEY (`game_id`) REFERENCES `Game` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `Tournament`
--
ALTER TABLE `Tournament`
  ADD CONSTRAINT `tournament_ibfk_1` FOREIGN KEY (`winner_team_id`) REFERENCES `Team` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
