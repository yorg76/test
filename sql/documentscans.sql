-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 07 Wrz 2014, 22:30
-- Wersja serwera: 5.1.41
-- Wersja PHP: 5.4.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `archidox`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `documentscans`
--

CREATE TABLE IF NOT EXISTS `documentscans` (
  `id` int(11) unsigned NOT NULL,
  `file` varchar(255) NOT NULL,
  `type` varchar(64) NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `document_fk` (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `documentscans`
--
ALTER TABLE `documentscans`
  ADD CONSTRAINT `documentscans_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
