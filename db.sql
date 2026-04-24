-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Апр 24 2026 г., 12:59
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
  `patronym` varchar(255) NOT NULL,
  `director` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `aspirants`
--

INSERT INTO `aspirants` (`aspirantid`, `lastname`, `firsname`, `patronym`, `director`) VALUES
(1, 'Сидоров', 'Алексей', 'Иванович', 1),
(2, 'Петрова', 'Мария', 'Петровна', 2),
(3, 'Кузнецов', 'Дмитрий', 'Сергеевич', 1),
(4, 'Смирнов', 'Павел', 'Андреевич', 3),
(5, 'Васильева', 'Анна', 'Владимировна', 2),
(6, 'Попов', 'Роман', 'Николаевич', 4),
(7, 'Козлов', 'Евгений', 'Олегович', 3),
(8, 'Новиков', 'Игорь', 'Александрович', 5),
(9, 'Морозова', 'Татьяна', 'Дмитриевна', 1),
(10, 'Волков', 'Андрей', 'Юрьевич', 4),
(11, 'Зайцев', 'Максим', 'Константинович', 2),
(12, 'Соколов', 'Никита', 'Сергеевич', 5),
(13, 'Иванов', 'Алексей', 'Иванович', 1),
(14, 'Петрова', 'Мария', 'Петровна', 3),
(15, 'Сидоров', 'Дмитрий', 'Сидорович', 4),
(16, 'Кузнецов', 'Павел', 'Сергеевич', 5),
(17, 'Смирнова', 'Анна', 'Андреевна', 6),
(18, 'Попов', 'Роман', 'Николаевич', 7),
(19, 'Васильев', 'Евгений', 'Васильевич', 8),
(20, 'Козлов', 'Игорь', 'Олегович', 9),
(21, 'Новикова', 'Татьяна', 'Дмитриевна', 10),
(22, 'Морозов', 'Андрей', 'Юрьевич', 1),
(23, 'Волкова', 'Ольга', 'Владимировна', 3),
(24, 'Зайцев', 'Максим', 'Константинович', 4),
(25, 'Соколов', 'Никита', 'Сергеевич', 5),
(26, 'Лазарева', 'Елена', 'Александровна', 6),
(27, 'Григорьев', 'Юрий', 'Фёдорович', 7),
(28, 'Орлова', 'Ирина', 'Павловна', 8),
(29, 'Никитин', 'Артём', 'Анатольевич', 9),
(30, 'Тихомиров', 'Евгений', 'Ильич', 10),
(31, 'Фёдорова', 'Наталья', 'Романовна', 1),
(32, 'Беляев', 'Кирилл', 'Михайлович', 3),
(33, 'Иванова', 'Светлана', 'Игоревна', 4),
(34, 'Петров', 'Денис', 'Алексеевич', 5),
(35, 'Сидорова', 'Ксения', 'Дмитриевна', 6),
(36, 'Кузнецова', 'Валентина', 'Николаевна', 7),
(37, 'Смирнов', 'Владимир', 'Александрович', 8),
(38, 'Попова', 'Виктория', 'Сергеевна', 9);

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
  `authorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `dissertations`
--

INSERT INTO `dissertations` (`dissertationid`, `theme`, `status`, `date`, `vak`, `authorid`) VALUES
(1, 'Исследование алгоритмов машинного обучения', 1, '2024-01-15', '05.13.01', 17),
(2, 'Методы оптимизации в логистике', 2, '2023-06-20', '08.00.05', 24),
(3, 'Квантовая криптография и безопасность', 3, '2025-02-10', '01.04.07', 31),
(4, 'Анализ больших данных в социологии', 1, '2024-09-05', '22.00.03', 14),
(5, 'Нейросетевые подходы к распознаванию речи', 2, '2023-11-12', '05.13.11', 29),
(6, 'Экологический мониторинг с использованием дронов', 3, '2025-04-18', '25.00.36', 20),
(7, 'Блокчейн в логистике', 1, '2024-06-25', '08.00.05', 33),
(8, 'Генетические алгоритмы в организации производства', 2, '2023-08-07', '05.13.18', 16),
(9, 'Прогнозирование финансовых временных рядов', 3, '2025-01-30', '08.00.13', 25),
(10, 'Разработка распределенных вычислений на Go', 1, '2024-10-14', '05.13.11', 19),
(11, 'Биоинформатика в онкологии', 2, '2023-09-22', '03.01.09', 32),
(12, 'Климатические модели и прогнозирование', 3, '2025-03-11', '25.00.30', 15),
(13, 'Интернет вещей в энергетике', 1, '2024-05-03', '05.13.10', 28),
(14, 'Математическое моделирование эпидемий', 2, '2023-12-17', '05.13.18', 34),
(15, 'Робототехника в сельском хозяйстве', 3, '2025-07-21', '05.20.01', 21),
(16, 'Психология виртуальной реальности', 1, '2024-08-26', '19.00.01', 18),
(17, 'Наноматериалы в электронике', 2, '2023-10-09', '01.04.07', 30),
(18, 'Устойчивое развитие городов', 3, '2025-09-14', '25.00.36', 13),
(19, 'Геймификация в образовании', 1, '2024-02-28', '13.00.02', 27),
(20, 'Спектральный анализ сигналов', 2, '2023-04-19', '05.12.04', 22),
(21, 'Этика искусственного интеллекта', 3, '2025-05-07', '09.00.03', 26),
(22, 'Геномика и персонализированная медицина', 1, '2024-12-01', '03.01.09', 23),
(23, 'Финансовые технологии и криптовалюты', 2, '2023-07-15', '08.00.10', 17),
(24, 'Космические исследования дальнего космоса', 3, '2025-10-22', '01.03.03', 31),
(25, 'Искусственный интеллект в правосудии', 1, '2024-11-08', '12.00.09', 14);

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
  `authorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `publications`
--

INSERT INTO `publications` (`publicationid`, `theme`, `publisher`, `publish_date`, `index_RINC`, `authorid`) VALUES
(1, 'Исследование механизмов квантовой запутанности', 'Наука и техника', '2023-05-12', '15', 5),
(2, 'Современные подходы к машинному обучению', 'Издательство \"Интеллект\"', '2024-02-18', '42', 12),
(3, 'Анализ больших данных в медицине', 'Медицинские технологии', '2022-11-03', '28', 7),
(4, 'Разработка распределенных систем на Go', 'Программист', '2025-01-20', '56', 3),
(5, 'Экологические аспекты городского планирования', 'Эко-Пресс', '2023-09-14', '11', 19),
(6, 'Нейросетевые методы распознавания образов', 'Искусственный интеллект', '2024-06-07', '73', 8),
(7, 'Финансовые рынки и криптовалюты', 'Экономика XXI века', '2022-08-30', '39', 14),
(8, 'Биоинформатика и геномный анализ', 'Биомедицина', '2025-03-25', '67', 2),
(9, 'Устойчивое развитие энергетики', 'Энергосбережение', '2023-12-01', '22', 4),
(10, 'Методы оптимизации в логистике', 'Транспортные системы', '2024-09-09', '31', 9),
(11, 'Психология цифровых коммуникаций', 'Социум', '2022-01-17', '18', 1),
(12, 'Робототехника в сельском хозяйстве', 'Агротехника', '2025-07-11', '45', 13),
(13, 'Обучение с подкреплением в играх', 'GameDev Journal', '2023-04-22', '54', 6),
(14, 'Применение блокчейна в управлении', 'Цифровая экономика', '2024-10-05', '29', 17),
(15, 'Интернет вещей в умном доме', 'Технологии будущего', '2023-11-30', '37', 10),
(16, 'Математическое моделирование эпидемий', 'Здравоохранение', '2025-02-14', '64', 21),
(17, 'Химическая инженерия наноматериалов', 'Нанотехнологии', '2022-06-25', '41', 11),
(18, 'Климатические изменения и сельское хозяйство', 'Природа', '2024-04-16', '25', 15),
(19, 'Этика искусственного интеллекта', 'Философия и техника', '2023-08-08', '33', 18),
(20, 'Разработка кроссплатформенных приложений', 'IT-Мир', '2025-05-19', '58', 20),
(21, 'Спектральный анализ сигналов', 'Радиотехника', '2022-12-12', '19', 22),
(22, 'Космические исследования и спутниковые системы', 'Авиакосмос', '2024-07-27', '48', 4),
(23, 'Геймификация в образовании', 'Педагогика', '2023-10-09', '27', 6),
(24, 'Квантовые вычисления: состояние и перспективы', 'Физика высоких технологий', '2025-08-01', '62', 14),
(25, 'Социальные сети и политическая активность', 'Политология', '2024-11-11', '35', 9);

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

--
-- Дамп данных таблицы `scientific_directors`
--

INSERT INTO `scientific_directors` (`directorid`, `lastname`, `firsname`, `patronym`) VALUES
(1, 'Иванов', 'Иван', 'Иванович'),
(2, 'Петров', 'Петр', 'Петрович'),
(3, 'Сидоров', 'Сидор', 'Сидорович'),
(4, 'Кузнецов', 'Алексей', 'Михайлович'),
(5, 'Смирнова', 'Ольга', 'Владимировна'),
(6, 'Попов', 'Андрей', 'Николаевич'),
(7, 'Васильев', 'Василий', 'Васильевич'),
(8, 'Козлов', 'Дмитрий', 'Сергеевич'),
(9, 'Новикова', 'Елена', 'Александровна'),
(10, 'Морозов', 'Григорий', 'Игоревич'),
(11, 'Волкова', 'Татьяна', 'Юрьевна'),
(12, 'Зайцев', 'Максим', 'Константинович'),
(13, 'Соколов', 'Никита', 'Олегович'),
(14, 'Лазарева', 'Анна', 'Дмитриевна'),
(15, 'Григорьев', 'Юрий', 'Фёдорович'),
(16, 'Орлова', 'Ирина', 'Сергеевна');

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
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `aspirants`
--
ALTER TABLE `aspirants`
  ADD PRIMARY KEY (`aspirantid`),
  ADD KEY `director` (`director`);

--
-- Индексы таблицы `dissertations`
--
ALTER TABLE `dissertations`
  ADD PRIMARY KEY (`dissertationid`),
  ADD KEY `authorid` (`authorid`),
  ADD KEY `status` (`status`);

--
-- Индексы таблицы `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`publicationid`),
  ADD KEY `authorid` (`authorid`);

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
  MODIFY `aspirantid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `dissertations`
--
ALTER TABLE `dissertations`
  MODIFY `dissertationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `publications`
--
ALTER TABLE `publications`
  MODIFY `publicationid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `scientific_directors`
--
ALTER TABLE `scientific_directors`
  MODIFY `directorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `statusid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `aspirants`
--
ALTER TABLE `aspirants`
  ADD CONSTRAINT `aspirants_ibfk_1` FOREIGN KEY (`director`) REFERENCES `scientific_directors` (`directorid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `dissertations`
--
ALTER TABLE `dissertations`
  ADD CONSTRAINT `dissertations_ibfk_1` FOREIGN KEY (`authorid`) REFERENCES `aspirants` (`aspirantid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `dissertations_ibfk_2` FOREIGN KEY (`status`) REFERENCES `statuses` (`statusid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_ibfk_1` FOREIGN KEY (`authorid`) REFERENCES `aspirants` (`aspirantid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`roleid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
