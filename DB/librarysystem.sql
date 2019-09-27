-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 27 sep 2019 kl 08:58
-- Serverversion: 10.1.38-MariaDB
-- PHP-version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `librarysystem`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_fname` varchar(32) NOT NULL,
  `author_lname` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `authors`
--

INSERT INTO `authors` (`author_id`, `author_fname`, `author_lname`) VALUES
(1, 'J.K.', 'Rowling'),
(2, 'Niklas', 'Natt och Dag'),
(3, 'Dick', 'Harrison'),
(4, 'Stephen', 'King');

-- --------------------------------------------------------

--
-- Tabellstruktur `book`
--

CREATE TABLE `book` (
  `item_id` varchar(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `book`
--

INSERT INTO `book` (`item_id`, `title`, `genre_id`, `author_id`) VALUES
('00870001794', '1794', 6, 2),
('00870001802', 'Institutet', 7, 4),
('00870001997', 'Harry Potter och de vises sten', 1, 1),
('00870001998', 'Harry Potter och hemligheternas kammare', 1, 1),
('00870001999', 'Harry Potter och fången från Azkaban', 1, 1),
('00870002000', 'Harry Potter och den flammande bägaren', 1, 1),
('00870002003', 'Harry Potter och Fenixorden', 1, 1),
('00870002005', 'Harry Potter och halvblodsprinsen', 1, 1),
('00870002007', 'Harry Potter och dödsrelikerna', 1, 1),
('00870009789', 'Folkvandringstid', 5, 3);

-- --------------------------------------------------------

--
-- Tabellstruktur `borrowed`
--

CREATE TABLE `borrowed` (
  `user_id` varchar(12) NOT NULL,
  `item_id` varchar(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Tabellstruktur `cd`
--

CREATE TABLE `cd` (
  `item_id` varchar(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `narrator_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `cd`
--

INSERT INTO `cd` (`item_id`, `title`, `genre_id`, `narrator_id`) VALUES
('00870001557', 'Jonas Trolle: Jakten på Kapten klänning', 5, 2),
('00870006044', 'Sagan om Koungens återkomst', 1, 2),
('00870006516', 'Roslning:Factfulness', 5, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `directors`
--

CREATE TABLE `directors` (
  `director_id` int(11) NOT NULL,
  `director_fname` varchar(32) NOT NULL,
  `director_lname` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `directors`
--

INSERT INTO `directors` (`director_id`, `director_fname`, `director_lname`) VALUES
(1, 'Ang', 'Lee'),
(2, 'Todd', 'Phillips'),
(3, 'George ', 'Lucas');

-- --------------------------------------------------------

--
-- Tabellstruktur `dvd`
--

CREATE TABLE `dvd` (
  `item_id` varchar(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `director_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `dvd`
--

INSERT INTO `dvd` (`item_id`, `title`, `genre_id`, `director_id`) VALUES
('00870009053', 'Chrouching Tiger Hidden Dragon', 1, 1),
('00870009999', 'Joker (2019)', 2, 2);

-- --------------------------------------------------------

--
-- Tabellstruktur `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `genre_name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`) VALUES
(1, 'Fantasy'),
(2, 'Thriller'),
(3, 'Mystery'),
(4, 'Biography'),
(5, 'Fakta'),
(6, 'Deckare'),
(7, 'Skönlitteratur');

-- --------------------------------------------------------

--
-- Tabellstruktur `item_cat`
--

CREATE TABLE `item_cat` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(32) NOT NULL,
  `max_time` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `item_cat`
--

INSERT INTO `item_cat` (`cat_id`, `cat_name`, `max_time`) VALUES
(1, 'Bok', 3),
(2, 'CD/Ljudbok', 3),
(3, 'DVD', 1);

-- --------------------------------------------------------

--
-- Tabellstruktur `media`
--

CREATE TABLE `media` (
  `item_id` varchar(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `is_borrowed` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `media`
--

INSERT INTO `media` (`item_id`, `title`, `cat_id`, `genre_id`, `is_borrowed`) VALUES
('00870001557', 'Jonas Trolle: Jakten på Kapten klänning', 2, 5, 0),
('00870001794', '1794', 1, 6, 0),
('00870001802', 'Institutet', 1, 7, 0),
('00870001997', 'Harry Potter och de vises sten', 1, 1, 1),
('00870001998', 'Harry Potter och hemligheternas kammare', 1, 1, 0),
('00870001999', 'Harry Potter och fången från Azkaban', 1, 1, 0),
('00870002000', 'Harry Potter och den flammande bägaren', 1, 1, 0),
('00870002003', 'Harry Potter och Fenixorden', 1, 1, 0),
('00870002005', 'Harry Potter och halvblodsprinsen', 1, 1, 0),
('00870002007', 'Harry Potter och dödsrelikerna', 1, 1, 0),
('00870006044', 'Sagan om Koungens återkomst', 2, 1, 1),
('00870006516', 'Roslning:Factfulness', 2, 5, 0),
('00870009053', 'Chrouching Tiger Hidden Dragon', 3, 1, 0),
('00870009789', 'Folkvandringstid', 1, 5, 0),
('00870009999', 'Joker (2019)', 3, 2, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `narrators`
--

CREATE TABLE `narrators` (
  `narrator_id` int(11) NOT NULL,
  `narrator_fname` varchar(32) NOT NULL,
  `narrator_lname` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `narrators`
--

INSERT INTO `narrators` (`narrator_id`, `narrator_fname`, `narrator_lname`) VALUES
(2, 'Tomas', 'Norström'),
(3, 'Martin', 'Wallström'),
(4, 'Andreas ', 'Olsson');

-- --------------------------------------------------------

--
-- Tabellstruktur `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) NOT NULL,
  `role_name` varchar(32) NOT NULL,
  `create` int(1) NOT NULL,
  `edit` int(1) NOT NULL,
  `remove` int(1) NOT NULL,
  `borrow` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `create`, `edit`, `remove`, `borrow`) VALUES
(4, 'Admin', 1, 1, 1, 1),
(5, 'Lärare', 0, 0, 0, 1),
(6, 'Elev', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `user_id` varchar(12) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `role_id` int(10) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `role_id`, `date`) VALUES
('200111119999', 'Test', 'Person', 5, '2019-09-26');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Index för tabell `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`item_id`);

--
-- Index för tabell `borrowed`
--
ALTER TABLE `borrowed`
  ADD PRIMARY KEY (`user_id`);

--
-- Index för tabell `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`item_id`);

--
-- Index för tabell `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`director_id`);

--
-- Index för tabell `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`item_id`);

--
-- Index för tabell `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Index för tabell `item_cat`
--
ALTER TABLE `item_cat`
  ADD PRIMARY KEY (`cat_id`);

--
-- Index för tabell `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`item_id`);

--
-- Index för tabell `narrators`
--
ALTER TABLE `narrators`
  ADD PRIMARY KEY (`narrator_id`);

--
-- Index för tabell `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `directors`
--
ALTER TABLE `directors`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT för tabell `item_cat`
--
ALTER TABLE `item_cat`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT för tabell `narrators`
--
ALTER TABLE `narrators`
  MODIFY `narrator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT för tabell `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
