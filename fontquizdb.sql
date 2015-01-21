-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Erstellungszeit: 21. Jan 2015 um 10:50
-- Server Version: 5.5.38
-- PHP-Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `fontquiz`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fonts`
--

CREATE TABLE `fonts` (
  `idfonts` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `name_display` varchar(100) NOT NULL,
  `style` varchar(10) NOT NULL,
  `img_e` varchar(45) DEFAULT NULL,
  `img_amp` varchar(45) DEFAULT NULL,
  `img_a` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `fonts`
--

INSERT INTO `fonts` (`idfonts`, `name`, `name_display`, `style`, `img_e`, `img_amp`, `img_a`) VALUES
(1, 'avenir', 'Avenir', 'sans', 'fuurbp9k', NULL, ''),
(2, 'minion', 'Minion', 'serif', 'ucj244x3', NULL, ''),
(3, 'din', 'DIN Pro', 'sans', '7ejvimvr', NULL, ''),
(4, 'chaparall', 'Chaparral', 'serif', 'pizgfqrt', NULL, ''),
(5, 'fira-sans', 'Fira Sans', 'sans', '8i95guw2', NULL, ''),
(6, 'garamond', 'Garamond', 'serif', '00gvm4ff', NULL, ''),
(7, 'univers', 'Univers', 'sans', 'jnjgt5zt', NULL, ''),
(8, 'utopia', 'Utopia', 'serif', '4r9xuh2d', NULL, ''),
(9, 'rotis', 'Rotis', 'sans', 'y0zgqfdd', NULL, NULL),
(10, 'palatino', 'Palatino', 'serif', '9vtc2m9o', NULL, NULL),
(11, 'meta', 'Meta', 'sans', 'ly851ttl', NULL, NULL),
(12, 'futura', 'Futura', 'sans', 'wv5ntvoi', NULL, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fonts`
--
ALTER TABLE `fonts`
 ADD PRIMARY KEY (`idfonts`);
