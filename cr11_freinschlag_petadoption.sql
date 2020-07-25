-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Erstellungszeit: 25. Jul 2020 um 09:11
-- Server-Version: 8.0.20-0ubuntu0.20.04.1
-- PHP-Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_freinschlag_petadoption`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pets`
--

CREATE TABLE `pets` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int NOT NULL,
  `description` varchar(200) NOT NULL,
  `breed` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `type` enum('small','large') NOT NULL,
  `hobbies` varchar(200) DEFAULT NULL,
  `street` varchar(50) NOT NULL,
  `ZIP_code` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `pets`
--

INSERT INTO `pets` (`id`, `name`, `age`, `description`, `breed`, `image`, `type`, `hobbies`, `street`, `ZIP_code`, `city`, `country`) VALUES
(1, 'Rudi', 12, 'Rudi is really very funny, but doesn\'t like other pets, only children are usually okay.', 'Rat', '812b62e8bd9c46b4a0a8.jpg', 'small', '• eating garbage\r\n• hiding somewhere', '10 Downing Street', 'SW1A 2AA', 'London', 'United Kingdom'),
(2, 'Howard', 99, 'Howard is kind of weird. We don\'t even know if Howard is from Earth, another planet, or even a different Universe. So if you\'re weird too, you\'ll love Howard.', 'lizard?', '085f928a567d7993e690.jpg', 'small', '• looking funny\r\n• beeing scary', 'Hub Island', '13607', 'New York', 'United States'),
(3, 'Django', 6, 'Django is a very pleasant young chameleon. Mostly he is colored green, orange, red ... white? huh? Sorry we can\'t see him right now.', 'lizard', 'bdrfdd212d095afr0924.jpg', 'small', '• Confusing people\r\n• Doing nothing', 'İstiklal Avenue', '34430', 'Istanbul', 'Turkey'),
(4, 'Rajah', 8, 'Yes, you read correctly, it is Princess Jasmin\'s tiger Rajah, whom she had to release for adoption because of her naive father, the Sultan of Agrabah.', 'tiger', '812b6hz7tr9c46b8g0a8.jpg', 'large', '• lying on his back\r\n• going to pedicure', 'The Sultan\'s Palace', '1992', 'Agrabah', ' Iraq'),
(5, 'Fluffy', 3, 'fghfdgh', 'dfghdfgh', 'e77402b7671bba863743.jpg', 'small', 'fdghdf', 'dfgh', 'fdgh', 'fdgh', 'dfgh'),
(8, 'Cordulo', 2, 'Test', 'lizard', '7eb1765ebaa3f48bda20.jpg', 'small', 'Nothing', 'Weitgraben 11', '3372', 'Blindenmarkt', 'Österreich');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` enum('administrator','user') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `type`) VALUES
(1, 'patrick', 'patrick@freinschlag.com', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', 'user'),
(2, 'admin', 'admin@index.com', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', 'administrator'),
(5, 'hans', 'hans@index.com', '937e8d5fbb48bd4949536cd65b8d35c426b80d2f830c5c308e2cdec422ae2244', 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `pets`
--
ALTER TABLE `pets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
