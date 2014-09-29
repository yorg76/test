-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 29 Wrz 2014, 08:23
-- Wersja serwera: 5.1.41
-- Wersja PHP: 5.4.29

SET FOREIGN_KEY_CHECKS=0;
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
-- Struktura tabeli dla  `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(64) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `number` varchar(8) DEFAULT NULL,
  `flat` varchar(8) DEFAULT NULL,
  `postal` varchar(8) DEFAULT NULL,
  `country` varchar(11) DEFAULT NULL,
  `telephone` varchar(12) DEFAULT NULL,
  `address_type` set('firmowy','odbioru','wysyłki') DEFAULT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `definiuje` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Zrzut danych tabeli `addresses`
--

INSERT INTO `addresses` (`id`, `city`, `street`, `number`, `flat`, `postal`, `country`, `telephone`, `address_type`, `customer_id`) VALUES
(1, 'Default', 'Detault', '1', '1', '00-000', 'Default', '600123123', 'firmowy', 0),
(2, 'Warszawa', 'Kaliska', '1', '42', '02-316', 'Polska', '664043792', 'firmowy', 1),
(11, 'Baniocha', 'Łubińska', '14', '', '05-532', 'Polska', '+48223579112', 'firmowy', 9),
(12, 'Warszawa', 'ul. Tymczasowa', '123', '1', '02-001', 'Polska', '+48664043792', 'firmowy', 10),
(13, '', '', '', '', '', '', '', 'wysyłki', 0),
(14, '', '', '', '', '', '', '', 'odbioru', 0),
(15, '', '', '', '', '', '', '', 'odbioru', 0),
(16, '', '', '', '', '', '', '', 'odbioru', 0),
(17, 'Warszawa', 'Kaliska', '1', '42', '02-316', 'Polska', '999999999', 'wysyłki', 0),
(18, 'Warszawa', 'Kaliska', '1', '42', '02-393', 'Polska', '4865656565', 'odbioru', 0),
(19, '', '', '', '', '', '', '', 'wysyłki', 0),
(20, '', '', '', '', '', '', '', 'wysyłki', 0),
(21, '', '', '', '', '', '', '', 'wysyłki', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `boxbarcodes`
--

DROP TABLE IF EXISTS `boxbarcodes`;
CREATE TABLE IF NOT EXISTS `boxbarcodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `box_number` int(11) DEFAULT NULL,
  `box_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_kp_przypisany_do_p` (`box_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `boxbarcodes`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `boxes`
--

DROP TABLE IF EXISTS `boxes`;
CREATE TABLE IF NOT EXISTS `boxes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `storage_category_id` int(11) NOT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `date_reception` date NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `lock` varchar(32) DEFAULT NULL,
  `seal` varchar(32) DEFAULT NULL,
  `utilisation_status` int(2) DEFAULT '0',
  `utilisation_document` varchar(255) DEFAULT NULL,
  `warehouse_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_p_przypisana_do_km` (`storage_category_id`),
  KEY `FK_m_ma_na_stanie` (`warehouse_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Zrzut danych tabeli `boxes`
--

INSERT INTO `boxes` (`id`, `storage_category_id`, `date_from`, `date_to`, `date_reception`, `description`, `lock`, `seal`, `utilisation_status`, `utilisation_document`, `warehouse_id`) VALUES
(11, 1, '2014-01-01', '2014-01-01', '2014-01-01', NULL, '1', '1', 0, NULL, 13),
(12, 2, '2014-01-01', '2014-01-01', '2014-01-01', NULL, '0', '1', 0, NULL, 4),
(13, 3, '2014-01-01', '2014-01-01', '2014-01-01', NULL, '1', '1', 0, NULL, 13),
(20, 1, '2014-09-08', '2014-09-09', '2014-09-29', NULL, '1', '123', 0, NULL, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `bulkpackagings`
--

DROP TABLE IF EXISTS `bulkpackagings`;
CREATE TABLE IF NOT EXISTS `bulkpackagings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `box_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `bulkpackagings`
--

INSERT INTO `bulkpackagings` (`id`, `name`, `description`, `box_id`) VALUES
(1, 'Opakowanie A', 'Opakowanie magazynowania A', 11),
(2, 'Opakowanie B', 'Opakowanie magazynowania B', 12),
(3, 'Opakowanie C', 'Opakowanie magazynowania C', 13),
(5, 'Opakowanie D', 'Opakowanie magazynowania D', 13),
(6, 'wwww', 'DA', 20);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `bulkpackagings_bulkpackagings`
--

DROP TABLE IF EXISTS `bulkpackagings_bulkpackagings`;
CREATE TABLE IF NOT EXISTS `bulkpackagings_bulkpackagings` (
  `bulkpackaging1_id` int(10) unsigned NOT NULL,
  `bulkpackaging2_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`bulkpackaging1_id`,`bulkpackaging2_id`),
  KEY `fk_bulkpackaging7_id` (`bulkpackaging1_id`),
  KEY `fk_bulkpackaging8_id` (`bulkpackaging2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `bulkpackagings_bulkpackagings`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `nip` varchar(32) DEFAULT NULL,
  `regon` varchar(32) DEFAULT NULL,
  `code` varchar(32) DEFAULT NULL,
  `comments` varchar(1024) NOT NULL,
  `www` varchar(255) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `create_date` (`create_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `customers`
--

INSERT INTO `customers` (`id`, `name`, `nip`, `regon`, `code`, `comments`, `www`, `create_date`) VALUES
(0, '_Default', '123-123-12-12', '123456', 'DEFAULT', 'Domyślna firma - nie usuwać', 'https://www.bsdterminal.pl', '2014-01-01 00:00:00'),
(1, 'BSDterminal', '951-197-60-37', '123456', 'BSD', 'Test', '', '0000-00-00 00:00:00'),
(9, 'PHAR', '123-120-13-77', '', 'PHAR', '', 'http://www.phar.pl', '0000-00-00 00:00:00'),
(10, 'DEMO', '951-197-60-37', '0987654321', 'DEMO', 'Firma do prezentacji', 'http://www.example.com', '2014-09-08 19:26:10');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `divisions`
--

DROP TABLE IF EXISTS `divisions`;
CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_nalezy_do` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `description`, `customer_id`) VALUES
(1, 'DA 1', 'Dział testowy Admina 1', 0),
(2, 'DA 2', 'Dział testowy Admina 2', 0),
(3, 'DA 3', 'Dział testowy Admina 3			', 0),
(4, 'DM 1', 'Dział do testów Mańka 1', 9),
(5, 'DM 2', 'Dział do testów Mańka 2		', 9),
(6, 'DM 3', 'Dział do testów Mańka 3', 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `divisions_users`
--

DROP TABLE IF EXISTS `divisions_users`;
CREATE TABLE IF NOT EXISTS `divisions_users` (
  `division_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`division_id`,`user_id`),
  KEY `fk_division_id` (`division_id`),
  KEY `divisions_users_ibfk_1` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `divisions_users`
--

INSERT INTO `divisions_users` (`division_id`, `user_id`) VALUES
(1, 2),
(3, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `documentlists`
--

DROP TABLE IF EXISTS `documentlists`;
CREATE TABLE IF NOT EXISTS `documentlists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `bulkpackaging_id` int(11) unsigned NOT NULL,
  `box_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `documentlists`
--

INSERT INTO `documentlists` (`id`, `name`, `description`, `bulkpackaging_id`, `box_id`) VALUES
(1, 'Lista A', 'Lista magazynowania A', 0, 11),
(2, 'Lista B', 'Lista magazynowania B', 0, 12),
(3, 'Lista C', 'Lista magazynowania C', 0, 12),
(5, 'Lista D', 'Lista magazynowania D', 0, 13),
(6, 'Taka tam lista dokumentów 12', 'Taka tam trelelelele						', 0, 20),
(7, 'Taka tam lista dokumentów 2', 'dasdasdawdawdeawdawda', 0, 20);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `documentlist_id` int(11) unsigned NOT NULL,
  `bulkpackaging_id` int(11) unsigned NOT NULL,
  `box_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `documents`
--

INSERT INTO `documents` (`id`, `name`, `description`, `documentlist_id`, `bulkpackaging_id`, `box_id`) VALUES
(1, 'Dokument A - CCA', 'Dokument magazynowania A - CCA												', 0, 0, 20),
(2, 'Dokument B', 'Dokument magazynowania B', 0, 0, 11),
(3, 'Dokument C', 'Dokument magazynowania C', 0, 0, 12),
(5, 'Dokument D', 'Dokument magazynowania D', 0, 0, 13),
(6, 'Siara 18', 'Siara 18', 7, 6, 20),
(7, 'Lipa 10', 'Lipa 10						', 7, 6, 20);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `documentscans`
--

DROP TABLE IF EXISTS `documentscans`;
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
-- Zrzut danych tabeli `documentscans`
--

INSERT INTO `documentscans` (`id`, `file`, `type`, `document_id`, `date_added`) VALUES
(0, 'E:\\www12\\web\\archiwum\\application\\upload\\scan-0-1-1410206943.jpg', 'scan', 1, '2014-09-07 23:13:08');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(32) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `pricetable_id` int(11) unsigned NOT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  `division_id` int(11) unsigned NOT NULL,
  `invoice_file` varchar(255) DEFAULT NULL,
  `order_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wystawiona_na` (`customer_id`),
  KEY `liczona_wg` (`pricetable_id`),
  KEY `FK_order_przypisany_do_p` (`order_id`),
  KEY `fk_invoice_division` (`division_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `invoices`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_notifications` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=96 ;

--
-- Zrzut danych tabeli `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `status`) VALUES
(1, 1, 'Test', 1),
(2, 1, 'Nowe zamówienie w systemie<br /><p>Link do akceptacji: <a href="https://localhost/order/accept/27">Kliknij aby zaakceptować zamówienie</a></p>', 1),
(3, 1, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/28">Kliknij aby zaakceptować zamówienie</a></p>', 1),
(4, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/29">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(5, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/30">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(6, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/30">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(7, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/31">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(8, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/31">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(9, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/32">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(10, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/32">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(11, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/33">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(12, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/33">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(13, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/34">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(14, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/34">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(19, 1, 'Zamówienie 31 zmieniło status<br /><br />', 1),
(20, 1, 'Zamówienie 2 zmieniło status<br /><br />', 1),
(21, 1, 'Zamówienie 33 zmieniło status<br /><br />', 1),
(22, 1, 'Zamówienie 4 zmieniło status<br /><br />', 1),
(23, 1, 'Zamówienie 34 zmieniło status<br /><br />', 1),
(24, 1, 'Zamówienie 33 zmieniło status<br /><br />', 1),
(25, 1, 'Zamówienie 32 zmieniło status<br /><br />', 1),
(26, 1, 'Zamówienie 31 zmieniło status<br /><br />', 1),
(27, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/35">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(28, 1, 'Zamówienie 35 zmieniło status<br /><br />', 1),
(29, 1, 'Zamówienie 30 zmieniło status<br /><br />', 1),
(30, 1, 'Zamówienie 7 zmieniło status<br /><br />', 1),
(31, 1, 'Zamówienie 34 zmieniło status<br /><br />', 1),
(32, 1, 'Zamówienie 33 zmieniło status<br /><br />', 1),
(33, 1, 'Zamówienie 32 zmieniło status<br /><br />', 1),
(34, 1, 'Zamówienie 31 zmieniło status<br /><br />', 1),
(35, 1, 'Zamówienie 34 zmieniło status<br /><br />', 1),
(36, 1, 'Zamówienie 33 zmieniło status<br /><br />', 1),
(37, 1, 'Zamówienie 31 zmieniło status<br /><br />', 1),
(38, 1, 'Zamówienie 32 zmieniło status<br /><br />', 1),
(39, 1, 'Zamówienie 29 zmieniło status<br /><br />', 1),
(42, 1, 'Zamówienie 23 zmieniło status<br /><br />', 1),
(43, 1, 'Zamówienie 10 zmieniło status<br /><br />', 1),
(46, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/40">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(47, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/41">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(48, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/42">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(49, 1, 'Zamówienie 42 zmieniło status<br /><br />', 1),
(50, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/43">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(51, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/46">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(52, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/47">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(53, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/48">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(54, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/49">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(55, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/50">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(56, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/51">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(57, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/52">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(58, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/53">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(59, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/54">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(60, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/55">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(61, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/56">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(62, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/57">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(66, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/58">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(67, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/59">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(68, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/60">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(69, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/61">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(70, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/62">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(71, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/63">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(78, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/64">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(81, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/66">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(83, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/67">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(84, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/68">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(85, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/69">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(86, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/70">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(87, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/71">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(88, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/72">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(89, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/73">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(90, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/74">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(95, 2, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/75">Kliknij aby zaakceptować zamówienie</a></p>', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `box_number` int(11) NOT NULL,
  `box_storagecategory` int(11) NOT NULL,
  `box_description` varchar(255) NOT NULL,
  `box_date` date NOT NULL,
  `order_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Zrzut danych tabeli `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `box_number`, `box_storagecategory`, `box_description`, `box_date`, `order_id`) VALUES
(1, 1, 1, 'Test 2', '2018-09-13', 13),
(2, 2, 1, 'Test 2', '2018-09-13', 13),
(3, 1, 1, 'Test 1', '1970-01-01', 15),
(4, 2, 1, 'Test 2', '1970-01-01', 15),
(5, 1, 1, '1', '2016-09-13', 16),
(6, 2, 1, '3', '2018-09-13', 16),
(7, 1, 6, '1', '2015-09-13', 17),
(8, 2, 6, '2', '2016-09-13', 17),
(9, 1, 6, '2', '2016-09-13', 18),
(10, 1, 6, 'q', '2016-09-13', 19),
(11, 1, 3, '1', '2015-09-13', 20),
(12, 1, 3, '1', '2015-09-13', 21),
(13, 1, 2, '1', '2015-09-13', 23),
(14, 1, 2, '1', '2015-09-13', 24),
(15, 1, 2, '1', '2015-09-13', 25),
(16, 1, 1, '1', '2015-09-13', 26),
(17, 1, 1, '1', '2015-09-13', 27),
(18, 1, 1, '1', '2015-09-13', 28),
(19, 1, 6, 'Test 2', '2018-09-13', 29),
(20, 1, 1, '1', '2015-09-21', 40),
(21, 1, 1, '1', '2015-09-21', 41),
(22, 1, 1, '1', '2015-09-21', 42),
(23, 1, 1, 'Test 1', '2015-09-22', 43),
(24, 2, 6, 'Test 2', '2015-09-22', 43),
(25, 1, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 44),
(26, 2, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 44),
(27, 1, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 45),
(28, 2, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 45),
(29, 1, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 46),
(30, 2, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 46),
(31, 1, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 47),
(32, 2, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 47),
(33, 1, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 48),
(34, 2, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 48),
(35, 1, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 49),
(36, 2, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 49),
(37, 1, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 50),
(38, 2, 1, 'Tutaj powinien być opis pozycji ale nie umiem nic wymyślić', '2015-09-23', 50),
(39, 1, 6, 'Test 1', '1970-01-01', 51),
(40, 2, 1, 'Test 2', '1970-01-01', 51),
(41, 1, 6, 'Test 1', '1970-01-01', 52),
(42, 2, 1, 'Test 2', '1970-01-01', 52),
(43, 1, 6, 'Test 1', '1970-01-01', 53),
(44, 2, 1, 'Test 2', '1970-01-01', 53),
(45, 1, 6, 'Test 1', '1970-01-01', 54),
(46, 2, 1, 'Test 2', '1970-01-01', 54),
(47, 1, 6, 'Test 1', '1970-01-01', 55),
(48, 2, 1, 'Test 2', '1970-01-01', 55),
(49, 1, 6, 'Test 1', '1970-01-01', 56),
(50, 2, 1, 'Test 2', '1970-01-01', 56),
(51, 1, 1, '1', '2015-09-28', 75),
(52, 0, 0, '', '1970-01-01', 75),
(53, 0, 0, '', '1970-01-01', 75),
(54, 0, 0, '', '1970-01-01', 75),
(55, 0, 0, '', '1970-01-01', 75),
(56, 0, 0, '', '1970-01-01', 75),
(57, 0, 0, '', '1970-01-01', 75),
(58, 0, 0, '', '1970-01-01', 75),
(59, 0, 0, '', '1970-01-01', 75),
(60, 0, 0, '', '1970-01-01', 75);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `status` enum('Nowe','Przyjęte do realizacji','Oczekuje na wysłanie','W doręczeniu','Dostarczone','W trakcie realizacji','W trakcie odbioru','W dostrczeniu na magazyn','Na stanie magazynu','Odebrane','Zrealizowane') DEFAULT NULL,
  `type` enum('Zamówienie pudeł i kodów kreskowych','Zamówienie odbioru i magazynowania pudeł','Zamówienie zniszczenie magazynowanych pozycji','Zamówienie skanowania, kopii dokumentów','Zamówienie kopii notarialnej dokumentów') DEFAULT NULL,
  `address_id` int(11) unsigned NOT NULL,
  `warehouse_id` int(11) unsigned NOT NULL,
  `division_id` int(11) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `pickup_date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_document` varchar(255) DEFAULT NULL,
  `utilisation_document` varchar(255) DEFAULT NULL,
  `shipmentcompany_id` int(11) unsigned DEFAULT NULL,
  `shipping_number` varchar(64) DEFAULT NULL,
  `pricetable_id` int(11) unsigned NOT NULL,
  `final_price` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_z_zlozone` (`user_id`),
  KEY `FK_z_adres` (`address_id`),
  KEY `warehouse_id_fk` (`warehouse_id`),
  KEY `division_id_fk` (`division_id`),
  KEY `quantity_idx` (`quantity`),
  KEY `order_document` (`order_document`),
  KEY `utlisation_document` (`utilisation_document`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `type`, `address_id`, `warehouse_id`, `division_id`, `quantity`, `pickup_date`, `create_date`, `order_document`, `utilisation_document`, `shipmentcompany_id`, `shipping_number`, `pricetable_id`, `final_price`) VALUES
(2, 1, 'Przyjęte do realizacji', 'Zamówienie pudeł i kodów kreskowych', 1, 2, 1, -1, '0000-00-00', '2014-09-12 07:22:58', NULL, NULL, NULL, NULL, 0, NULL),
(3, 1, 'Przyjęte do realizacji', 'Zamówienie pudeł i kodów kreskowych', 1, 2, 1, -1, '0000-00-00', '2014-09-12 07:23:56', NULL, NULL, NULL, NULL, 0, NULL),
(4, 1, 'Przyjęte do realizacji', 'Zamówienie odbioru i magazynowania pudeł', 1, 2, 1, 12, '2014-09-12', '2014-09-12 07:40:15', NULL, NULL, NULL, NULL, 0, NULL),
(5, 1, 'Zrealizowane', 'Zamówienie odbioru i magazynowania pudeł', 1, 2, 1, 12, '2014-09-12', '2014-09-12 07:52:46', NULL, NULL, NULL, NULL, 0, NULL),
(7, 1, 'Przyjęte do realizacji', 'Zamówienie pudeł i kodów kreskowych', 1, 2, 1, -1, '0000-00-00', '2014-09-12 11:47:33', NULL, NULL, NULL, NULL, 0, NULL),
(8, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 14, 2, 1, 2, '2014-09-30', '2014-09-13 01:36:01', NULL, NULL, NULL, NULL, 0, NULL),
(9, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 15, 2, 1, 2, '2014-09-30', '2014-09-13 01:36:27', NULL, NULL, NULL, NULL, 0, NULL),
(10, 1, 'Przyjęte do realizacji', 'Zamówienie odbioru i magazynowania pudeł', 16, 2, 1, 2, '2014-09-30', '2014-09-13 01:37:19', NULL, NULL, NULL, NULL, 0, NULL),
(11, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 1, 2, 1, 2, '2014-09-22', '2014-09-13 01:39:52', NULL, NULL, NULL, NULL, 0, NULL),
(12, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 1, 2, 1, 2, '2014-10-09', '2014-09-13 01:41:41', NULL, NULL, NULL, NULL, 0, NULL),
(13, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 1, 2, 1, 2, '2014-09-30', '2014-09-13 01:44:29', NULL, NULL, NULL, NULL, 0, NULL),
(14, 1, 'Nowe', 'Zamówienie pudeł i kodów kreskowych', 17, 2, 1, -1, '0000-00-00', '2014-09-13 02:18:51', NULL, NULL, NULL, NULL, 0, NULL),
(15, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 1, 2, 1, 2, '2014-09-30', '2014-09-13 02:21:07', NULL, NULL, NULL, NULL, 0, NULL),
(16, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 1, 2, 1, 2, '2014-09-30', '2014-09-13 02:23:25', NULL, NULL, NULL, NULL, 0, NULL),
(17, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 1, 2, '2014-10-11', '2014-09-13 13:20:26', NULL, NULL, NULL, NULL, 0, NULL),
(18, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 1, 1, '2014-09-30', '2014-09-13 14:35:22', NULL, NULL, NULL, NULL, 0, NULL),
(19, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 1, 2, 1, 1, '2014-09-24', '2014-09-13 14:36:50', NULL, NULL, NULL, NULL, 0, NULL),
(20, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 1, 2, 1, 11, '2014-10-11', '2014-09-13 14:40:12', NULL, NULL, NULL, NULL, 0, NULL),
(21, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 1, 2, 1, 11, '2014-10-11', '2014-09-13 14:42:09', NULL, NULL, NULL, NULL, 0, NULL),
(22, 1, 'Nowe', 'Zamówienie zniszczenie magazynowanych pozycji', 1, 2, 1, -1, '0000-00-00', '2014-09-13 14:47:17', NULL, NULL, NULL, NULL, 0, NULL),
(23, 1, 'Przyjęte do realizacji', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 1, 1, '2014-10-08', '2014-09-13 14:50:10', NULL, NULL, NULL, NULL, 0, NULL),
(25, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 1, 1, '2014-10-08', '2014-09-13 14:55:19', NULL, NULL, NULL, NULL, 0, NULL),
(29, 1, 'Przyjęte do realizacji', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 1, 1, '2014-09-23', '2014-09-13 20:22:24', NULL, NULL, NULL, NULL, 0, NULL),
(30, 1, 'Przyjęte do realizacji', 'Zamówienie skanowania, kopii dokumentów', 1, 2, 1, -1, '0000-00-00', '2014-09-13 23:10:11', NULL, NULL, NULL, NULL, 0, NULL),
(31, 1, 'Dostarczone', 'Zamówienie zniszczenie magazynowanych pozycji', 1, 2, 1, -1, '0000-00-00', '2014-09-13 23:18:09', NULL, NULL, 2, '45678987654', 0, NULL),
(32, 1, 'Dostarczone', 'Zamówienie skanowania, kopii dokumentów', 1, 2, 1, -1, '0000-00-00', '2014-09-13 23:19:06', NULL, NULL, 2, '234567890', 0, NULL),
(33, 1, 'Dostarczone', 'Zamówienie kopii notarialnej dokumentów', 1, 3, 2, -1, '0000-00-00', '2014-09-13 23:21:17', NULL, NULL, 1, '098765432', 0, NULL),
(34, 1, 'Dostarczone', 'Zamówienie pudeł i kodów kreskowych', 20, 2, 1, -1, '0000-00-00', '2014-09-13 23:25:54', NULL, NULL, 2, '123', 0, NULL),
(35, 1, 'Przyjęte do realizacji', 'Zamówienie zniszczenie magazynowanych pozycji', 1, 2, 1, -1, '0000-00-00', '2014-09-15 00:54:29', NULL, NULL, NULL, NULL, 0, NULL),
(40, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 2, 1, '2014-09-29', '2014-09-21 22:01:10', NULL, NULL, NULL, NULL, 0, NULL),
(41, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 2, 1, '2014-09-29', '2014-09-21 23:36:13', NULL, NULL, NULL, NULL, 0, NULL),
(42, 1, 'Przyjęte do realizacji', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 2, 1, '2014-09-29', '2014-09-21 23:36:57', NULL, NULL, NULL, NULL, 0, NULL),
(43, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 1, 2, '2014-09-30', '2014-09-22 00:09:31', NULL, NULL, NULL, NULL, 0, NULL),
(44, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 3, 2, '2014-09-30', '2014-09-23 01:54:27', NULL, NULL, NULL, NULL, 0, NULL),
(45, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 3, 2, '2014-09-30', '2014-09-23 01:55:03', NULL, NULL, NULL, NULL, 0, NULL),
(46, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 3, 2, '2014-09-30', '2014-09-23 01:56:00', NULL, NULL, NULL, NULL, 0, NULL),
(47, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 3, 2, '2014-09-30', '2014-09-23 01:56:49', NULL, NULL, NULL, NULL, 0, NULL),
(48, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 3, 2, '2014-09-30', '2014-09-23 01:57:01', NULL, NULL, NULL, NULL, 0, NULL),
(49, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 3, 2, '2014-09-30', '2014-09-23 01:58:00', NULL, NULL, NULL, NULL, 0, NULL),
(50, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 3, 2, '2014-09-30', '2014-09-23 02:01:40', NULL, NULL, NULL, NULL, 0, NULL),
(51, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 1, 2, '2014-09-30', '2014-09-24 06:29:24', NULL, NULL, NULL, NULL, 0, NULL),
(52, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 1, 2, '2014-09-30', '2014-09-24 06:34:51', NULL, NULL, NULL, NULL, 0, NULL),
(53, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 1, 2, '2014-09-30', '2014-09-24 06:39:42', '1411533606-1-1-.pdf', NULL, NULL, NULL, 0, NULL),
(54, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 1, 2, '2014-09-30', '2014-09-24 06:40:55', '1411533679-1-1-.pdf', NULL, NULL, NULL, 0, NULL),
(67, 1, 'Nowe', 'Zamówienie zniszczenie magazynowanych pozycji', 1, 2, 1, -1, '0000-00-00', '2014-09-24 07:43:50', NULL, '1411537454-1-2-.pdf', NULL, NULL, 0, NULL),
(68, 1, 'Nowe', 'Zamówienie zniszczenie magazynowanych pozycji', 1, 2, 1, -1, '0000-00-00', '2014-09-28 21:46:58', NULL, '1411933642-1-2-.pdf', NULL, NULL, 3, NULL),
(69, 1, 'Nowe', 'Zamówienie zniszczenie magazynowanych pozycji', 1, 2, 1, -1, '0000-00-00', '2014-09-28 21:48:46', NULL, '1411933750-1-2-.pdf', NULL, NULL, 3, NULL),
(70, 1, 'Nowe', 'Zamówienie zniszczenie magazynowanych pozycji', 1, 2, 1, -1, '0000-00-00', '2014-09-28 21:53:08', NULL, '1411934012-1-2-.pdf', NULL, NULL, 3, NULL),
(75, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 18, 2, 1, 10, '2014-09-30', '2014-09-28 22:06:41', '1411934825-1-1-.pdf', NULL, NULL, NULL, 3, 240);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `orders_boxes`
--

DROP TABLE IF EXISTS `orders_boxes`;
CREATE TABLE IF NOT EXISTS `orders_boxes` (
  `order_id` int(10) unsigned NOT NULL,
  `box_id` int(10) unsigned NOT NULL,
  KEY `order_id_fk_pk` (`order_id`),
  KEY `box_id_fk` (`box_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `orders_boxes`
--

INSERT INTO `orders_boxes` (`order_id`, `box_id`) VALUES
(2, 11),
(2, 13),
(2, 20),
(3, 11),
(3, 13),
(3, 20),
(7, 13),
(14, 11),
(34, 11),
(34, 13),
(34, 20),
(67, 11),
(68, 13),
(68, 20);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `pricetables`
--

DROP TABLE IF EXISTS `pricetables`;
CREATE TABLE IF NOT EXISTS `pricetables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `boxes_reception` float DEFAULT NULL,
  `boxes_sending` float DEFAULT NULL,
  `boxes_storage` float DEFAULT NULL,
  `document_scan` float DEFAULT NULL,
  `document_copy` float DEFAULT NULL,
  `document_notarial_copy` float DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `active` int(2) NOT NULL DEFAULT '1',
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ma_przypisany` (`customer_id`),
  KEY `active` (`active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `pricetables`
--

INSERT INTO `pricetables` (`id`, `boxes_reception`, `boxes_sending`, `boxes_storage`, `document_scan`, `document_copy`, `document_notarial_copy`, `discount`, `active`, `customer_id`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 0, 0),
(2, 23, 23, 23, 23, 23, 23, 10, 0, 1),
(3, 12, 12, 12, 12, 12, 12, NULL, 1, 0),
(4, 12, 1222, 12, 1, 12, 33, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account concustomertion.'),
(2, 'admin', 'Administrative user, has access to everything.'),
(3, 'manager', 'Manager privileges - finance briefing, granted after account concustomertion. '),
(4, 'operator', 'Operator user, has access to manage orders.');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `roles_users`
--

DROP TABLE IF EXISTS `roles_users`;
CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `roles_users`
--

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(21, 1),
(24, 1),
(25, 1),
(1, 2),
(2, 3),
(2, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `shipmentcompanies`
--

DROP TABLE IF EXISTS `shipmentcompanies`;
CREATE TABLE IF NOT EXISTS `shipmentcompanies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `address` varchar(512) DEFAULT NULL,
  `telephone` varchar(64) DEFAULT NULL,
  `shipping_price` float DEFAULT NULL,
  `comments` text,
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `shipmentcompanies`
--

INSERT INTO `shipmentcompanies` (`id`, `name`, `address`, `telephone`, `shipping_price`, `comments`, `customer_id`) VALUES
(1, 'DHL', 'Dhaelowa 123', '+48664043792', 19.1, 'Testowa firma																														', 0),
(2, 'Siudemka', 'Testowy 12', '456 456 456', 12.3, 'Testowa numer dwa																		', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `storagecategories`
--

DROP TABLE IF EXISTS `storagecategories`;
CREATE TABLE IF NOT EXISTS `storagecategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `storagecategories`
--

INSERT INTO `storagecategories` (`id`, `name`, `description`) VALUES
(1, 'KAT A', 'Kategoria magazynowania A'),
(2, 'KAT B', 'Kategoria magazynowania B'),
(3, 'KAT C', 'Kategoria magazynowania CE'),
(5, 'KAT D', 'Kategoria D				'),
(6, 'Kategoria Demo', 'Kategoria Demo						');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(254) NOT NULL,
  `username` varchar(32) NOT NULL DEFAULT '',
  `password` varchar(64) NOT NULL,
  `logins` int(10) unsigned NOT NULL DEFAULT '0',
  `last_login` int(10) unsigned DEFAULT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `status` enum('Zablokowany','Aktywny','Zawieszony','Wyłączony') NOT NULL DEFAULT 'Aktywny',
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`),
  KEY `fk_customer_id` (`customer_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`, `firstname`, `lastname`, `status`, `customer_id`) VALUES
(1, 'maciekk@bsdterminal.pl', 'admin', 'b18c10839e5f8bbc7b780e135c980bcf3e0086ea411fca2e65027a8a9f2f1efa', 30, 1411793433, '', '', 'Aktywny', 0),
(2, 'h31180y@gmail.com', 'h31180y', 'ddd59b5daee56e68ae59e072da46619ec227e37414ad48e0913dc40a14fb04dd', 0, NULL, 'Maciej', 'Kowalczyk-Tepfer', 'Aktywny', 0),
(3, 'test@polki.xxx', 'test', 'df40d08b0fd67fbbe09d8aec96325703f5bbe72e613efce9b0413262b5365bca', 0, NULL, 'Test', 'Tester', 'Aktywny', 1),
(4, 'Robert.Wrobel@phar.pl', 'robert', '5a6e5e110a8844c7863de9bbafb8f55270e8a6e33f60e62ce5f4ebfa6765f7fd', 0, NULL, 'Robert', 'Wróbel', 'Aktywny', 9),
(5, 'ptys@polki.xxx', 'ptys', '6a5adf59f783869f06768124d43d8792a43ba7ebe86952065393a1e8b9db6f33', 0, NULL, 'Ptyś', 'Ptysiowy', 'Aktywny', 0),
(6, 'bigdicks@polki.xxx', 'mistrz', '28b4e319f8eb94e043d6ae1849e840996a65d26a9c996ca5a223274f48b81234', 0, NULL, 'Mistrzuniu', 'Duża pyta', 'Aktywny', 0),
(7, 'mocna_krycha@polki.xxx', 'krystyna', '4497c14659584316e6011819763310f05020ff0c01641f7043cb13284127c894', 0, NULL, 'Kryśka', 'Mocnossąca', 'Aktywny', 0),
(8, 'luce23k@polki.xxx', 'lucek', 'ddd59b5daee56e68ae59e072da46619ec227e37414ad48e0913dc40a14fb04dd', 0, NULL, 'Lucjan', 'Miśkiewicz', 'Aktywny', 0),
(9, 'pedrylek@polki.xxx', 'pedryl', '96380b623ba0cb5bca13e16566c2c0ab321722673706b445bbc8571f9072201f', 0, NULL, 'Peneloposław', 'Pedrylek', 'Aktywny', 0),
(10, 'adam_z_hujami_nie_gadam@polki.xxx', 'adamo', 'ddd59b5daee56e68ae59e072da46619ec227e37414ad48e0913dc40a14fb04dd', 0, NULL, 'Adam', 'Tester', 'Aktywny', 0),
(12, 'mledzinska@wp.pl', 'mledzins', '549d5de0852c28e68cce857a7285f5cbbe0f7e69eb0bdb0daacc90ba0c777227', 0, NULL, 'Marta', 'Ledzińska', 'Aktywny', 10),
(21, 'maniek@gmail.com', 'maniek', '549d5de0852c28e68cce857a7285f5cbbe0f7e69eb0bdb0daacc90ba0c777227', 0, NULL, 'Maniek', 'Maniek', 'Aktywny', 0),
(24, 'msasin76@gmail.com', 'msasin', '549d5de0852c28e68cce857a7285f5cbbe0f7e69eb0bdb0daacc90ba0c777227', 3, 1409521311, 'Marcin', 'Sasin', 'Aktywny', 9),
(25, 'demo@bsdterminal.pl', 'demo', '0878d71e53bceb81ac7742d93882bca3327bc8b64c1a09dd9e3299d7106ed79a', 0, NULL, 'demo', 'demo', 'Aktywny', 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `user_tokens`
--

DROP TABLE IF EXISTS `user_tokens`;
CREATE TABLE IF NOT EXISTS `user_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `user_agent` varchar(40) NOT NULL,
  `token` varchar(40) NOT NULL,
  `created` int(10) unsigned NOT NULL,
  `expires` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_token` (`token`),
  KEY `fk_user_id` (`user_id`),
  KEY `expires` (`expires`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `user_tokens`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `virtualbriefcases`
--

DROP TABLE IF EXISTS `virtualbriefcases`;
CREATE TABLE IF NOT EXISTS `virtualbriefcases` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `division_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_wt_przypisana_do` (`division_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `virtualbriefcases`
--

INSERT INTO `virtualbriefcases` (`id`, `name`, `description`, `division_id`) VALUES
(2, 'TA 2', 'Teczka Admina 2', 2),
(5, 'TM 1', 'Teczka Mańka 1			', 4),
(6, 'TM 2', 'Teczka Mańka 2', 5),
(7, 'TM 3', 'Teczka Mańka 3', 6),
(10, 'Wirtualna Teczka 100', 'Test', 2),
(11, 'Wirtualna Teczka 102', 'Luuuuuuuj			', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `virtualbriefcases_boxes`
--

DROP TABLE IF EXISTS `virtualbriefcases_boxes`;
CREATE TABLE IF NOT EXISTS `virtualbriefcases_boxes` (
  `virtualbriefcase_id` int(10) unsigned NOT NULL,
  `box_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`virtualbriefcase_id`,`box_id`),
  KEY `fk_virtualbriefcase1_id` (`virtualbriefcase_id`),
  KEY `fk_box_id` (`box_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `virtualbriefcases_boxes`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `virtualbriefcases_bulkpackagings`
--

DROP TABLE IF EXISTS `virtualbriefcases_bulkpackagings`;
CREATE TABLE IF NOT EXISTS `virtualbriefcases_bulkpackagings` (
  `virtualbriefcase_id` int(10) unsigned NOT NULL,
  `bulkpackaging_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`virtualbriefcase_id`,`bulkpackaging_id`),
  KEY `fk_virtualbriefcase4_id` (`virtualbriefcase_id`),
  KEY `fk_bulkpackaging_id` (`bulkpackaging_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `virtualbriefcases_bulkpackagings`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `virtualbriefcases_documentlists`
--

DROP TABLE IF EXISTS `virtualbriefcases_documentlists`;
CREATE TABLE IF NOT EXISTS `virtualbriefcases_documentlists` (
  `virtualbriefcase_id` int(10) unsigned NOT NULL,
  `documentlist_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`virtualbriefcase_id`,`documentlist_id`),
  KEY `fk_virtualbriefcase3_id` (`virtualbriefcase_id`),
  KEY `fk_documentlist_id` (`documentlist_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `virtualbriefcases_documentlists`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `virtualbriefcases_documents`
--

DROP TABLE IF EXISTS `virtualbriefcases_documents`;
CREATE TABLE IF NOT EXISTS `virtualbriefcases_documents` (
  `virtualbriefcase_id` int(10) unsigned NOT NULL,
  `document_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`virtualbriefcase_id`,`document_id`),
  KEY `fk_virtualbriefcase2_id` (`virtualbriefcase_id`),
  KEY `fk_document_id` (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `virtualbriefcases_documents`
--

INSERT INTO `virtualbriefcases_documents` (`virtualbriefcase_id`, `document_id`) VALUES
(2, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `virtualbriefcases_virtualbriefcases`
--

DROP TABLE IF EXISTS `virtualbriefcases_virtualbriefcases`;
CREATE TABLE IF NOT EXISTS `virtualbriefcases_virtualbriefcases` (
  `virtualbriefcase1_id` int(10) unsigned NOT NULL,
  `virtualbriefcase2_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`virtualbriefcase1_id`,`virtualbriefcase2_id`),
  KEY `fk_virtualbriefcase5_id` (`virtualbriefcase1_id`),
  KEY `fk_virtualbriefcase6_id` (`virtualbriefcase2_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `virtualbriefcases_virtualbriefcases`
--

INSERT INTO `virtualbriefcases_virtualbriefcases` (`virtualbriefcase1_id`, `virtualbriefcase2_id`) VALUES
(2, 10);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `warehousebarcodes`
--

DROP TABLE IF EXISTS `warehousebarcodes`;
CREATE TABLE IF NOT EXISTS `warehousebarcodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `position_number` int(11) DEFAULT NULL,
  `warehouse_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_km_przypisany_do_m` (`warehouse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `warehousebarcodes`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `warehouses`
--

DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE IF NOT EXISTS `warehouses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_zarzadza` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Zrzut danych tabeli `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `description`, `customer_id`) VALUES
(2, 'MA 3', 'Magazyn Admina 3				', 0),
(3, 'MA 1', 'Magazyn Admina 1			', 0),
(4, 'MM 1', 'Magazyn 1 Mańka', 9),
(5, 'MM 2', 'Magazyn 2  Mańka', 9),
(6, 'MM 3', 'Magazyn 3 Mańka					', 9),
(13, 'MA 2', 'Magazyn Admina 2', 0);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `definiuje` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Ograniczenia dla tabeli `boxbarcodes`
--
ALTER TABLE `boxbarcodes`
  ADD CONSTRAINT `FK_kp_przypisany_do_p` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`);

--
-- Ograniczenia dla tabeli `boxes`
--
ALTER TABLE `boxes`
  ADD CONSTRAINT `FK_m_ma_na_stanie` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`),
  ADD CONSTRAINT `FK_p_przypisana_do_km` FOREIGN KEY (`storage_category_id`) REFERENCES `storagecategories` (`id`);

--
-- Ograniczenia dla tabeli `bulkpackagings_bulkpackagings`
--
ALTER TABLE `bulkpackagings_bulkpackagings`
  ADD CONSTRAINT `fk_bulkpackaging5_id` FOREIGN KEY (`bulkpackaging1_id`) REFERENCES `bulkpackagings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_bulkpackaging6_id` FOREIGN KEY (`bulkpackaging2_id`) REFERENCES `bulkpackagings` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `divisions`
--
ALTER TABLE `divisions`
  ADD CONSTRAINT `FK_nalezy_do` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Ograniczenia dla tabeli `divisions_users`
--
ALTER TABLE `divisions_users`
  ADD CONSTRAINT `divisions_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `divisions_users_ibfk_2` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `documentscans`
--
ALTER TABLE `documentscans`
  ADD CONSTRAINT `documentscans_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_3` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`),
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `liczona_wg_customer` FOREIGN KEY (`pricetable_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `liczona_wg_price` FOREIGN KEY (`pricetable_id`) REFERENCES `pricetables` (`id`);

--
-- Ograniczenia dla tabeli `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_z_adres` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `FK_z_zlozone` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`);

--
-- Ograniczenia dla tabeli `orders_boxes`
--
ALTER TABLE `orders_boxes`
  ADD CONSTRAINT `orders_boxes_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_boxes_ibfk_2` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`);

--
-- Ograniczenia dla tabeli `pricetables`
--
ALTER TABLE `pricetables`
  ADD CONSTRAINT `ma_przypisany` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Ograniczenia dla tabeli `roles_users`
--
ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_rejestruje_pracuje_w` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Ograniczenia dla tabeli `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `virtualbriefcases`
--
ALTER TABLE `virtualbriefcases`
  ADD CONSTRAINT `FK_wt_przypisana_do` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`);

--
-- Ograniczenia dla tabeli `virtualbriefcases_boxes`
--
ALTER TABLE `virtualbriefcases_boxes`
  ADD CONSTRAINT `fk_box_id` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_virtualbriefcase1_id` FOREIGN KEY (`virtualbriefcase_id`) REFERENCES `virtualbriefcases` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `virtualbriefcases_bulkpackagings`
--
ALTER TABLE `virtualbriefcases_bulkpackagings`
  ADD CONSTRAINT `fk_bulkpackaging_id` FOREIGN KEY (`bulkpackaging_id`) REFERENCES `bulkpackagings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_virtualbriefcase4_id` FOREIGN KEY (`virtualbriefcase_id`) REFERENCES `virtualbriefcases` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `virtualbriefcases_documentlists`
--
ALTER TABLE `virtualbriefcases_documentlists`
  ADD CONSTRAINT `fk_documentlist_id` FOREIGN KEY (`documentlist_id`) REFERENCES `documentlists` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_virtualbriefcase3_id` FOREIGN KEY (`virtualbriefcase_id`) REFERENCES `virtualbriefcases` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `virtualbriefcases_documents`
--
ALTER TABLE `virtualbriefcases_documents`
  ADD CONSTRAINT `fk_document_id` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_virtualbriefcase2_id` FOREIGN KEY (`virtualbriefcase_id`) REFERENCES `virtualbriefcases` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `virtualbriefcases_virtualbriefcases`
--
ALTER TABLE `virtualbriefcases_virtualbriefcases`
  ADD CONSTRAINT `fk_virtualbriefcase5_id` FOREIGN KEY (`virtualbriefcase1_id`) REFERENCES `virtualbriefcases` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_virtualbriefcase6_id` FOREIGN KEY (`virtualbriefcase2_id`) REFERENCES `virtualbriefcases` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `warehousebarcodes`
--
ALTER TABLE `warehousebarcodes`
  ADD CONSTRAINT `FK_km_przypisany_do_m` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`);

--
-- Ograniczenia dla tabeli `warehouses`
--
ALTER TABLE `warehouses`
  ADD CONSTRAINT `FK_zarzadza` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
