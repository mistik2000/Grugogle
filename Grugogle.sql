-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Июн 30 2022 г., 15:53
-- Версия сервера: 5.7.34
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Grugogle`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Information_about_the_vacancy`
--

CREATE TABLE `Information_about_the_vacancy` (
  `ID_Information_about_the_vacancy` int(11) NOT NULL,
  `Category` varchar(128) NOT NULL,
  `Datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Description` varchar(280) NOT NULL,
  `Salary` varchar(128) NOT NULL,
  `ID_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Information_about_the_vacancy`
--

INSERT INTO `Information_about_the_vacancy` (`ID_Information_about_the_vacancy`, `Category`, `Datetime`, `Description`, `Salary`, `ID_Users`) VALUES
(1, 'Охранник', '2022-06-30 07:01:31', 'Дневная смена от 2500 рублей за 12 часов, возможно предоставления бесплатного жилья работа вахтой) Условия: Выплата ЗП (авансирование) в текущем месяце; Прямой работодатель;  Трудоустройство и заселение в день обращения;', 'До 50 000', 1),
(2, 'Менеджер по продажам', '2022-06-30 07:02:48', 'В Международную производственную и торговую компанию специализирующуюся на производстве и поставках кондитерской продукции требуется Менеджер по продажам отдела ВЭД (активные продажи на экспорт).', 'До 100 000', 2),
(3, 'Продовец в магазине', '2022-06-30 07:02:48', 'Добрый Пасечник- это розничная сеть магазинов меда и продукции для здоровья (БАДы, фиточаи, безалкогольные бальзамы, натуральная косметика, продукты для здорового питания и многое другое).', 'От 25 000', 3),
(4, 'Менеджер', '2022-06-30 13:56:39', 'лялялял', '10000', 4),
(5, 'Менеджер', '2022-06-30 14:05:55', 'менеджер', '20000', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Questions`
--

CREATE TABLE `Questions` (
  `ID_Questions` int(11) NOT NULL,
  `Team` varchar(280) NOT NULL,
  `Question` varchar(280) NOT NULL,
  `Other` varchar(280) NOT NULL,
  `ID_Users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Questions`
--

INSERT INTO `Questions` (`ID_Questions`, `Team`, `Question`, `Other`, `ID_Users`) VALUES
(1, 'Вакансия', 'Как подать вакансию?', 'Вакансию можно подать на главной странице или в личном кабинете, там есть кнопка добавить вакансию', 2),
(2, 'Регистрация', 'Что нужно для регистрации?', 'Для регистрации нужна почта и номер телефона', 1),
(3, 'Информация о компании', 'Где найти информацию о компании?', 'Информацию о компании можно найти во вкладке о компании', 1),
(4, 'аапрол', 'апорт', 'Ваш вопрос принят, скоро мы вам ответим', 4),
(5, 'Вопрос', 'просто', 'Ваш вопрос принят, скоро мы вам ответим', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `Rates`
--

CREATE TABLE `Rates` (
  `ID_Rates` int(11) NOT NULL,
  `Title` varchar(280) NOT NULL,
  `Price` varchar(280) NOT NULL,
  `Description1` varchar(280) NOT NULL,
  `Description2` varchar(280) NOT NULL,
  `Description3` varchar(280) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Rates`
--

INSERT INTO `Rates` (`ID_Rates`, `Title`, `Price`, `Description1`, `Description2`, `Description3`) VALUES
(1, 'Оптимум', '40 000', 'Доступ к базе резюме', '150 размещений вакансий', 'Подбор резюме с персоналом'),
(2, 'Элит', '50 000', 'Доступ к базе резюме', '250 размещений вакансий', 'Подбор резюме с персаналом'),
(3, 'Лайт', ' 0', '5 откликов в неделю на резюме', '2 размещений вакансий', 'Самостоятельный подбор резюме');

-- --------------------------------------------------------

--
-- Структура таблицы `Users`
--

CREATE TABLE `Users` (
  `ID_Users` int(11) NOT NULL,
  `FIO` varchar(128) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Number` varchar(128) NOT NULL,
  `Status` varchar(128) NOT NULL,
  `Password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Users`
--

INSERT INTO `Users` (`ID_Users`, `FIO`, `Email`, `Number`, `Status`, `Password`) VALUES
(1, 'Ревенко Софья Сергеевна ', 'sof@gmail.com', '89772957188', 'Работодатель', '$2y$10$EzVSOVlVoPiHjxwqBPasweN7DKlG4n0jRq8U/EByc5ByhV2ur8b42'),
(2, 'Коростиленко Ольга Владимировна', 'korost@gmail.com', '89771985735', 'Работодатель', '$2y$10$6QOf.1xLWInqqCWYvE5VyOvgjvQAqxv6hF5SNWhpiOUiZ4lDC0fgG'),
(3, 'Макушин Сергей Сергеевич', 'serg@gmail.com', '89775462398', 'Соискатель', '$2y$10$Dnd8hJwMJVeIFoPABpTjsudyoKG5wdgi5yarY79LM3UwRqUT594EC'),
(4, 'Ревенко Софья Сергеева', 'so@gmail.com', '89772957188', 'Работодатель', '$2y$10$SNqW3r1VgertTGByd2mAQeUF5r5ZGqexjI.zM20Ts9TXKvQaLqpYe'),
(5, 'Ревенко Софья Сергеевна', 'sofi@gmail.com', '89256785432', 'Работодатель', '$2y$10$tr3tfEyF27CauwwUgwnxEe4GxhYB./oqYh655SxVLJTH1pqhzBJW2');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Information_about_the_vacancy`
--
ALTER TABLE `Information_about_the_vacancy`
  ADD PRIMARY KEY (`ID_Information_about_the_vacancy`),
  ADD KEY `ID_Users` (`ID_Users`);

--
-- Индексы таблицы `Questions`
--
ALTER TABLE `Questions`
  ADD PRIMARY KEY (`ID_Questions`),
  ADD KEY `ID_Users` (`ID_Users`);

--
-- Индексы таблицы `Rates`
--
ALTER TABLE `Rates`
  ADD PRIMARY KEY (`ID_Rates`);

--
-- Индексы таблицы `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID_Users`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Information_about_the_vacancy`
--
ALTER TABLE `Information_about_the_vacancy`
  MODIFY `ID_Information_about_the_vacancy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `Questions`
--
ALTER TABLE `Questions`
  MODIFY `ID_Questions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `Rates`
--
ALTER TABLE `Rates`
  MODIFY `ID_Rates` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `Users`
--
ALTER TABLE `Users`
  MODIFY `ID_Users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Information_about_the_vacancy`
--
ALTER TABLE `Information_about_the_vacancy`
  ADD CONSTRAINT `information_about_the_vacancy_ibfk_1` FOREIGN KEY (`ID_Users`) REFERENCES `Users` (`ID_Users`);

--
-- Ограничения внешнего ключа таблицы `Questions`
--
ALTER TABLE `Questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`ID_Users`) REFERENCES `Users` (`ID_Users`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
