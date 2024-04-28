-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql304.infinityfree.com
-- Erstellungszeit: 28. Apr 2024 um 07:21
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `if0_35982586_journal`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `journal_entry` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `public` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `subject`, `journal_entry`, `created_at`, `updated_at`, `public`) VALUES
(14, 1, 'Coding', 'Improved on my coding knowledge. Worked on my Journaling Website! This will be the first entry I actually keep in my database. cant wait to work on the design more. I stopped trying to implement this with python because i dont have a website for free hosting if that makes sense. But yeah I&#039;ve learned a lot today and that&#039;s all.', '2024-02-14 22:02:16', '2024-02-14 22:02:16', 0),
(15, 1, 'Rosenthal Experiment / Pygmalion Effect', '&quot;The Pygmalion Effect&quot; - Higher expectations lead to higher performance. Our beliefs about another persons abilities influence our acitons towards the other person. It impacts their beliefs about themselves.\r\n\r\nAKA the Rosenthal experiment by Robert Rosenthal at Harvard\r\nRat Experiment with 2 Groups, one was made to believe the rats were smart, the other rats were dumb. Their beliefs ended up leading to the &quot;smart&quot; rats performing a lot better.\r\n\r\n', '2024-02-15 16:27:00', '2024-02-15 16:27:00', 0),
(16, 1, 'Spanish', 'Tengo veintiseis aÃ±os', '2024-02-16 17:52:24', '2024-02-16 17:52:24', 0),
(39, 1, 'Coding', 'Today I learned how to use AJAX more efficiently than I have before. Updating the Index page as soon as the request is done makes for a very smooth user Experience. Previously believed I needed to Use Vue or something similar to achieve this. I guess View would be necessary for applications that you want to be available without an internet connection?', '2024-02-17 14:55:21', '2024-02-17 14:55:21', 0),
(85, 4, 'German Saying', 'GlÃ¼ck im UnglÃ¼ck -- luck in unluck', '2024-03-04 02:48:49', '2024-03-04 02:48:49', 1),
(52, 1, 'Psychology', 'There are seven principles of Psychological Persuasion: \r\nReciprocity, Scarcity, Authority, Consistency, Liking, Consensus, Unity\r\n ', '2024-02-18 19:08:38', '2024-02-18 19:08:38', 0),
(53, 1, 'Coding', 'Learned more about css properties. Justify Content is for Axis 1 and align items is for Axis 2. Makes the whole process of applying css a whole lot easier.', '2024-02-19 18:28:02', '2024-02-19 18:28:02', 0),
(54, 1, 'Coding', 'Using SVG&#039;s to enhance front end very easily with a website called Haikei', '2024-02-20 16:14:58', '2024-02-20 16:14:58', 0),
(68, 1, 'Nature', 'Insects don&#039;t have lungs and their blood doesn&#039;t have oxygen', '2024-02-21 20:18:08', '2024-02-21 20:18:08', 0),
(69, 11, 'idk anymore it was 2 much', 'idk anymore it was 2 much', '2024-02-22 16:47:11', '2024-02-23 16:23:22', 0),
(70, 1, 'Code', 'Learned more about Python dictionaries, some string operations, classes, objects', '2024-02-22 23:39:10', '2024-02-22 23:39:10', 0),
(72, 1, 'General', 'Allodoxaphobia is the fear of other people&#039;s opinions.', '2024-02-24 00:46:08', '2024-02-24 00:46:08', 0),
(73, 1, 'General', 'Thomas Jefferson hat die amerikanische UnabhÃ¤ngigkeitserklÃ¤rung grÃ¶ÃŸtenteils verfasst', '2024-02-24 19:55:48', '2024-02-24 19:55:48', 0),
(74, 1, 'General', 'Electra complex is like Oedipus complex except genders swapped', '2024-02-25 18:48:20', '2024-02-25 18:48:20', 0),
(75, 1, 'General', 'There are two categories of planets: Terrestial(Gesteinsplaneten): Mercury, Venus, Earth and Mars and Jovian(Gasplaneten): Jupiter, Saturn, Uranus, Neptune', '2024-02-26 21:33:44', '2024-02-26 21:33:44', 0),
(81, 1, 'Korean', 'Hello (ì•ˆë…•í•˜ì„¸ìš” / annyeonghaseyo)\r\n', '2024-02-28 21:28:50', '2024-02-28 21:28:50', 0),
(78, 1, 'Test', 'can you see this ', '2024-02-27 15:24:33', '2024-02-27 15:24:33', 1),
(79, 1, 'General', 'People are more creative in the shower. We experience an increased dopamine flow', '2024-02-28 00:38:14', '2024-02-28 00:38:14', 0),
(82, 1, 'Korean', 'How are you? - (ì–´ë–»ê²Œ ì§€ë‚´ì„¸ìš” / eotteohge jinaeseyo)', '2024-02-29 22:19:01', '2024-02-29 22:19:01', 0),
(83, 1, 'Keyboard ', 'Echo sax end part 1', '2024-03-02 01:34:11', '2024-03-02 01:34:11', 0),
(84, 1, 'General', 'Koreans have less arm pit odor because of a lack of the &quot;ABCC11&quot; gene. Most East Asians don&#039;t have this gene', '2024-03-02 23:58:02', '2024-03-02 23:58:02', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `name`) VALUES
(1, 'Himeos', 'anass-1998@hotmail.de', '$2y$10$CGW6u/5xESwaz1OeH6XsMu/eVvIG8mQRmX0Flnr7LocgZejP4Y9sm', 'Himeos'),
(2, 'test', 'test@test.de', '$2y$10$E3Ul6dJWdEz7ZZsP3s6EsuN40hfpFYRONFhM1/fKqy7VMzqclBKIa', 'test'),
(3, 'timeos', 'anass11@hotmail.de', '$2y$10$fl5m5WtCZY0du6j7kHxvK.kyrONY/0zIcW8flQOuVeez0o.J7er12', 'timeos'),
(4, 'esterlin', 'gardenofhyacinths@gmail.com', '$2y$10$VwTTHV4fAeryLVV/lhNmL.oP1Rup8ux5lJnyIMFgL3QCVeZuAUqmC', 'esterlin'),
(11, 'Menu', 'nein@nein', '$2y$10$LhGisMMhyaQ/LrVVVSp9QuVzHs5cdrnQzicFTZ7gZA.KMS.9jOuU2', 'Menu');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_follows`
--

CREATE TABLE `user_follows` (
  `follower_id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user_follows`
--

INSERT INTO `user_follows` (`follower_id`, `followed_id`) VALUES
(1, 2),
(1, 4),
(2, 1),
(2, 3),
(4, 1),
(4, 2),
(4, 3),
(4, 11);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indizes für die Tabelle `user_follows`
--
ALTER TABLE `user_follows`
  ADD PRIMARY KEY (`follower_id`,`followed_id`),
  ADD KEY `followed_id` (`followed_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
