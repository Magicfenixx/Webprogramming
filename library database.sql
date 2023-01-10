-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Янв 10 2023 г., 07:59
-- Версия сервера: 10.4.25-MariaDB
-- Версия PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `Name`, `Author`, `Genre`) VALUES
(1, 'Anna Karenina', 'Leo Tolstoy', 'Realist novel'),
(2, 'Don Quixote', 'Miguel de Cervantes', 'Novel'),
(3, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Tragedy'),
(4, 'The Odyssey', 'Homer', 'Epic poetry'),
(5, 'The Divine Comedy', 'Dante Alighieri', 'Narrative poem');

-- --------------------------------------------------------

--
-- Структура таблицы `checkouts`
--

CREATE TABLE `checkouts` (
  `Checkout_id` int(255) NOT NULL,
  `Person_id` int(255) NOT NULL,
  `Book_id` int(255) NOT NULL,
  `Start_date` date NOT NULL DEFAULT current_timestamp(),
  `borrow_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `checkouts`
--

INSERT INTO `checkouts` (`Checkout_id`, `Person_id`, `Book_id`, `Start_date`, `borrow_duration`) VALUES
(1, 1, 2, '2022-07-27', 5),
(2, 3, 3, '2022-11-16', 2),
(3, 4, 2, '2022-06-22', 1),
(4, 2, 5, '2022-12-10', 10),
(5, 5, 3, '2021-12-16', 6),
(6, 4, 4, '2022-12-01', 1),
(10, 3, 3, '2021-06-07', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `persons`
--

CREATE TABLE `persons` (
  `id` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Surname` varchar(255) NOT NULL,
  `Age` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `persons`
--

INSERT INTO `persons` (`id`, `Name`, `Surname`, `Age`) VALUES
(1, 'Arthur', 'Jameson', 19),
(2, 'Phillip', 'Smith', 21),
(3, 'John', 'Swift', 39),
(4, 'Korney', 'Tailor', 29),
(5, 'Emily', 'Clark', 35),
(9, 'Kate', 'Simon', 27);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(255) NOT NULL,
  `Person_id` int(255) NOT NULL,
  `Book_id` int(255) NOT NULL,
  `Review_date` date NOT NULL DEFAULT current_timestamp(),
  `Review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `Person_id`, `Book_id`, `Review_date`, `Review`) VALUES
(1, 4, 4, '2022-04-11', 'Bad book dont like it'),
(2, 3, 4, '2022-09-15', 'excellent!'),
(3, 5, 2, '2022-12-11', 'Funny and hilarous'),
(4, 1, 1, '2022-10-11', 'Very good'),
(8, 5, 3, '2022-01-19', 'Um, the genre is very pathetic and the heroes dont have good story');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`Checkout_id`),
  ADD KEY `Person_id` (`Person_id`),
  ADD KEY `Book_id_2` (`Book_id`);

--
-- Индексы таблицы `persons`
--
ALTER TABLE `persons`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Person_id` (`Person_id`,`Book_id`),
  ADD KEY `Book_id` (`Book_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `Checkout_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `persons`
--
ALTER TABLE `persons`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_ibfk_1` FOREIGN KEY (`Person_id`) REFERENCES `persons` (`id`),
  ADD CONSTRAINT `checkouts_ibfk_2` FOREIGN KEY (`Book_id`) REFERENCES `books` (`id`);

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`Person_id`) REFERENCES `persons` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`Book_id`) REFERENCES `books` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
