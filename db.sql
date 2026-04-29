-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Апр 29 2026 г., 13:13
-- Версия сервера: 10.7.8-MariaDB-1:10.7.8+maria~ubu2004
-- Версия PHP: 8.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `aspirants`
--

CREATE TABLE `aspirants` (
  `aspirantid` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firsname` varchar(255) NOT NULL,
  `patronym` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `aspirants_adds`
--

CREATE TABLE `aspirants_adds` (
  `addid` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `aspirant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `directors_adds`
--

CREATE TABLE `directors_adds` (
  `addid` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `director` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `dissertations`
--

CREATE TABLE `dissertations` (
  `dissertationid` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date` date NOT NULL,
  `vak` varchar(255) NOT NULL,
  `aspirant` int(11) NOT NULL,
  `director` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `publications`
--

CREATE TABLE `publications` (
  `publicationid` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `publish_date` date NOT NULL,
  `index_RINC` varchar(255) NOT NULL,
  `author` int(11) NOT NULL,
  `coauthor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `roleid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`roleid`, `name`) VALUES
(1, 'Администратор'),
(2, 'Научный сотрудник');

-- --------------------------------------------------------

--
-- Структура таблицы `scientific_directors`
--

CREATE TABLE `scientific_directors` (
  `directorid` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firsname` varchar(255) NOT NULL,
  `patronym` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `statusid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`statusid`, `name`) VALUES
(1, 'Пишется'),
(2, 'Предзащита'),
(3, 'Защищена');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userid`, `login`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'georg', 'fc77dba827fcc88e0243404572c51325', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `aspirants`
--
ALTER TABLE `aspirants`
  ADD PRIMARY KEY (`aspirantid`);

--
-- Индексы таблицы `aspirants_adds`
--
ALTER TABLE `aspirants_adds`
  ADD PRIMARY KEY (`addid`),
  ADD KEY `aspirants_adds_user_fk` (`user`),
  ADD KEY `aspirants_adds_aspirant_fk` (`aspirant`);

--
-- Индексы таблицы `directors_adds`
--
ALTER TABLE `directors_adds`
  ADD PRIMARY KEY (`addid`),
  ADD KEY `directors_adds_user_fk` (`user`),
  ADD KEY `directors_adds_director_fk` (`director`);

--
-- Индексы таблицы `dissertations`
--
ALTER TABLE `dissertations`
  ADD PRIMARY KEY (`dissertationid`),
  ADD KEY `authorid` (`aspirant`),
  ADD KEY `status` (`status`),
  ADD KEY `director_fk` (`director`);

--
-- Индексы таблицы `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`publicationid`),
  ADD KEY `authorid` (`author`),
  ADD KEY `coauthor_fk` (`coauthor`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Индексы таблицы `scientific_directors`
--
ALTER TABLE `scientific_directors`
  ADD PRIMARY KEY (`directorid`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`statusid`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `aspirants`
--
ALTER TABLE `aspirants`
  MODIFY `aspirantid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT для таблицы `aspirants_adds`
--
ALTER TABLE `aspirants_adds`
  MODIFY `addid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `directors_adds`
--
ALTER TABLE `directors_adds`
  MODIFY `addid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `dissertations`
--
ALTER TABLE `dissertations`
  MODIFY `dissertationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `publications`
--
ALTER TABLE `publications`
  MODIFY `publicationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `scientific_directors`
--
ALTER TABLE `scientific_directors`
  MODIFY `directorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `statusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `aspirants_adds`
--
ALTER TABLE `aspirants_adds`
  ADD CONSTRAINT `aspirants_adds_aspirant_fk` FOREIGN KEY (`aspirant`) REFERENCES `aspirants` (`aspirantid`),
  ADD CONSTRAINT `aspirants_adds_user_fk` FOREIGN KEY (`user`) REFERENCES `users` (`userid`);

--
-- Ограничения внешнего ключа таблицы `directors_adds`
--
ALTER TABLE `directors_adds`
  ADD CONSTRAINT `directors_adds_director_fk` FOREIGN KEY (`director`) REFERENCES `scientific_directors` (`directorid`),
  ADD CONSTRAINT `directors_adds_user_fk` FOREIGN KEY (`user`) REFERENCES `users` (`userid`);

--
-- Ограничения внешнего ключа таблицы `dissertations`
--
ALTER TABLE `dissertations`
  ADD CONSTRAINT `director_fk` FOREIGN KEY (`director`) REFERENCES `scientific_directors` (`directorid`),
  ADD CONSTRAINT `dissertations_ibfk_1` FOREIGN KEY (`aspirant`) REFERENCES `aspirants` (`aspirantid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dissertations_ibfk_2` FOREIGN KEY (`status`) REFERENCES `statuses` (`statusid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `coauthor_fk` FOREIGN KEY (`coauthor`) REFERENCES `scientific_directors` (`directorid`),
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`author`) REFERENCES `aspirants` (`aspirantid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`roleid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
