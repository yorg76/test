-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 12 Wrz 2014, 08:01
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Zrzut danych tabeli `addresses`
--

INSERT INTO `addresses` (`id`, `city`, `street`, `number`, `flat`, `postal`, `country`, `telephone`, `address_type`, `customer_id`) VALUES
(1, 'Default', 'Detault', '1', '1', '00-000', 'Default', '600123123', 'firmowy', 0),
(2, 'Warszawa', 'Kaliska', '1', '42', '02-316', 'Polska', '664043792', 'firmowy', 1),
(11, 'Baniocha', 'Łubińska', '14', '', '05-532', 'Polska', '+48223579112', 'firmowy', 9),
(12, 'Warszawa', 'ul. Tymczasowa', '123', '1', '02-001', 'Polska', '+48664043792', 'firmowy', 10);

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
  `warehouse_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_p_przypisana_do_km` (`storage_category_id`),
  KEY `FK_m_ma_na_stanie` (`warehouse_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Zrzut danych tabeli `boxes`
--

INSERT INTO `boxes` (`id`, `storage_category_id`, `date_from`, `date_to`, `date_reception`, `description`, `lock`, `seal`, `warehouse_id`) VALUES
(11, 1, '2014-01-01', '2014-01-01', '2014-01-01', NULL, '0', '1', 2),
(12, 2, '2014-01-01', '2014-01-01', '2014-01-01', NULL, '0', '1', 4),
(13, 3, '2014-01-01', '2014-01-01', '2014-01-01', NULL, '0', '1', 13),
(20, 1, '2014-09-08', '2014-09-09', '2014-09-29', NULL, '123', '123', 2);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `documents`
--

INSERT INTO `documents` (`id`, `name`, `description`, `documentlist_id`, `bulkpackaging_id`, `box_id`) VALUES
(1, 'Dokument A - CCA', 'Dokument magazynowania A - CCA												', 0, 0, 20),
(2, 'Dokument B', 'Dokument magazynowania B', 0, 0, 11),
(3, 'Dokument C', 'Dokument magazynowania C', 0, 0, 12),
(5, 'Dokument D', 'Dokument magazynowania D', 0, 0, 13);

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
  `order_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wystawiona_na` (`customer_id`),
  KEY `liczona_wg` (`pricetable_id`),
  KEY `FK_order_przypisany_do_p` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `invoices`
--


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
  PRIMARY KEY (`id`),
  KEY `FK_z_zlozone` (`user_id`),
  KEY `FK_z_adres` (`address_id`),
  KEY `warehouse_id_fk` (`warehouse_id`),
  KEY `division_id_fk` (`division_id`),
  KEY `quantity_idx` (`quantity`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `type`, `address_id`, `warehouse_id`, `division_id`, `quantity`, `pickup_date`, `create_date`) VALUES
(2, 1, 'Nowe', 'Zamówienie pudeł i kodów kreskowych', 1, 2, 1, -1, '0000-00-00', '2014-09-12 07:22:58'),
(3, 1, 'Przyjęte do realizacji', 'Zamówienie pudeł i kodów kreskowych', 1, 2, 1, -1, '0000-00-00', '2014-09-12 07:23:56'),
(4, 1, 'Nowe', 'Zamówienie odbioru i magazynowania pudeł', 1, 2, 1, 12, '2014-09-12', '2014-09-12 07:40:15'),
(5, 1, 'Zrealizowane', 'Zamówienie odbioru i magazynowania pudeł', 1, 2, 1, 12, '2014-09-12', '2014-09-12 07:52:46');

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
(3, 20);

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
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ma_przypisany` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `pricetables`
--


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
(1, 2);

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
(1, 'maciekk@bsdterminal.pl', 'admin', 'b18c10839e5f8bbc7b780e135c980bcf3e0086ea411fca2e65027a8a9f2f1efa', 23, 1410467355, '', '', 'Aktywny', 0),
(2, 'h31180y@gmail.com', 'h31180y', 'b18c10839e5f8bbc7b780e135c980bcf3e0086ea411fca2e65027a8a9f2f1efa', 0, NULL, 'Maciej', 'Kowalczyk-Tepfer', 'Aktywny', 1),
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Zrzut danych tabeli `virtualbriefcases`
--

INSERT INTO `virtualbriefcases` (`id`, `name`, `description`, `division_id`) VALUES
(1, 'TA 1', 'Teczka Admina 1', 1),
(2, 'TA 2', 'Teczka Admina 2', 2),
(3, 'TA 3', 'Teczka Admina 3', 3),
(5, 'TM 1', 'Teczka Mańka 1			', 4),
(6, 'TM 2', 'Teczka Mańka 2', 5),
(7, 'TM 3', 'Teczka Mańka 3', 6),
(8, 'TA 4', 'Teczka Admina 4', 3);

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
(1, 1),
(1, 2),
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
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `liczona_wg_customer` FOREIGN KEY (`pricetable_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `liczona_wg_price` FOREIGN KEY (`pricetable_id`) REFERENCES `pricetables` (`id`);

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`),
  ADD CONSTRAINT `FK_z_adres` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `FK_z_zlozone` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`);

--
-- Ograniczenia dla tabeli `orders_boxes`
--
ALTER TABLE `orders_boxes`
  ADD CONSTRAINT `orders_boxes_ibfk_2` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`),
  ADD CONSTRAINT `orders_boxes_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

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
