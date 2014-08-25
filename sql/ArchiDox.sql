SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

SET foreign_key_checks = 0;

-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 25 Sie 2014, 22:34
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
-- Struktura tabeli dla  `addresses`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Zrzut danych tabeli `addresses`
--

INSERT INTO `addresses` (`id`, `city`, `street`, `number`, `flat`, `postal`, `country`, `telephone`, `address_type`, `customer_id`) VALUES
(1, 'Default', 'Detault', '1', '1', '00-000', 'Default', '600123123', 'firmowy', 0),
(2, 'Warszawa', 'Kaliska', '1', '42', '02-316', 'Polska', '664043792', 'firmowy', 1),
(11, 'Baniocha', 'Łubińska', '14', '', '05-532', 'Polska', '+48223579112', 'firmowy', 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `boxbarcodes`
--

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

CREATE TABLE IF NOT EXISTS `boxes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `storage_category` int(11) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `blokada` tinyint(1) DEFAULT NULL,
  `plomba` tinyint(1) DEFAULT NULL,
  `virtualbriefcase_id` int(11) unsigned NOT NULL,
  `boxbarcode_id` int(11) unsigned NOT NULL,
  `warehouse_id` int(11) unsigned NOT NULL,
  `warehousebarcode_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_p_przypisana_do_wt` (`virtualbriefcase_id`),
  KEY `FK_kp_przypisany_do_p` (`boxbarcode_id`),
  KEY `FK_m_ma_na_stanie` (`warehouse_id`),
  KEY `FK_km_przypisany_do_p` (`warehousebarcode_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `boxes`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `bulkpackagings`
--

CREATE TABLE IF NOT EXISTS `bulkpackagings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `box_id` int(11) unsigned NOT NULL,
  `virtualbriefcase_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_oz_przypisane_do` (`box_id`),
  KEY `FK_oz_przypisana_do_wt` (`virtualbriefcase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `bulkpackagings`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `nip` varchar(32) DEFAULT NULL,
  `regon` varchar(32) DEFAULT NULL,
  `code` varchar(32) DEFAULT NULL,
  `comments` varchar(1024) NOT NULL,
  `www` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Zrzut danych tabeli `customers`
--

INSERT INTO `customers` (`id`, `name`, `nip`, `regon`, `code`, `comments`, `www`) VALUES
(0, '_Default', '123-123-12-12', '123456', 'DEFAULT', '', ''),
(1, 'BSDterminal', '951-197-60-37', '123456', 'BSD', 'Test', ''),
(9, 'PHAR', '123-120-13-77', '', 'PHAR', '', 'http://www.phar.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `divisions`
--

CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` int(255) DEFAULT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_nalezy_do` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `divisions`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `divisions_users`
--

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


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `documentlists`
--

CREATE TABLE IF NOT EXISTS `documentlists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `bulkpackaging_id` int(11) unsigned NOT NULL,
  `virtualbriefcase_id` int(11) unsigned NOT NULL,
  `box_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ld_przypisana_do_wt` (`virtualbriefcase_id`),
  KEY `FK_ld_przypisana_do_oz` (`bulkpackaging_id`),
  KEY `FK_ld_przypisana_do_p` (`box_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `documentlists`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `documents`
--

CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `documentlist_id` int(11) unsigned NOT NULL,
  `bulkpackaging_id` int(11) unsigned NOT NULL,
  `virtualbriefcase_id` int(11) unsigned NOT NULL,
  `box_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_d_przypisany_do_ld` (`documentlist_id`),
  KEY `FK_d_przypisany_do_oz` (`bulkpackaging_id`),
  KEY `FK_d_przypisany_do_wt` (`virtualbriefcase_id`),
  KEY `FK_d_przypisany_do_p` (`box_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `documents`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(32) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `pricetable_id` int(11) unsigned NOT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wystawiona_na` (`customer_id`),
  KEY `liczona_wg` (`pricetable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `invoices`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `status` enum('Nowe','Przyjęte do realizacji','Oczekuje na wysłanie','W doręczeniu','Dostarczone','W trakcie realizacji','W trakcie odbioru','W dostrczeniu na magazyn','Na stanie magazynu','Odebrane','Zrealizowane') DEFAULT NULL,
  `type` enum('Zamówienie pudeł i kodów kreskowych','Zamówienie odbioru i magazynowania pudeł','Zamówienie zniszczenie magazynowanych pozycji','Zamówienie skanowania, kopii dokumentów','Zamówienie kopii notarialnej dokumentów') DEFAULT NULL,
  `address_id` int(11) unsigned NOT NULL,
  `invoice_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_z_zlozone` (`user_id`),
  KEY `FK_z_adres` (`address_id`),
  KEY `FK_f_przypisana_do_z` (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `orders`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `pricetables`
--

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
(1, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `users`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`, `firstname`, `lastname`, `status`, `customer_id`) VALUES
(1, 'maciekk@bsdterminal.pl', 'admin', 'b18c10839e5f8bbc7b780e135c980bcf3e0086ea411fca2e65027a8a9f2f1efa', 14, 1408601062, '', '', 'Aktywny', 0),
(2, 'h31180y@gmail.com', 'h31180y', 'b18c10839e5f8bbc7b780e135c980bcf3e0086ea411fca2e65027a8a9f2f1efa', 0, NULL, 'Maciej', 'Kowalczyk-Tepfer', 'Aktywny', 1),
(3, 'test@polki.xxx', 'test', 'df40d08b0fd67fbbe09d8aec96325703f5bbe72e613efce9b0413262b5365bca', 0, NULL, 'Test', 'Tester', 'Aktywny', 1),
(4, 'Robert.Wrobel@phar.pl', 'robert', '5a6e5e110a8844c7863de9bbafb8f55270e8a6e33f60e62ce5f4ebfa6765f7fd', 0, NULL, 'Robert', 'Wróbel', 'Aktywny', 9),
(5, 'ptys@polki.xxx', 'ptys', '6a5adf59f783869f06768124d43d8792a43ba7ebe86952065393a1e8b9db6f33', 0, NULL, 'Ptyś', 'Ptysiowy', 'Aktywny', 0),
(6, 'bigdicks@polki.xxx', 'mistrz', '28b4e319f8eb94e043d6ae1849e840996a65d26a9c996ca5a223274f48b81234', 0, NULL, 'Mistrzuniu', 'Duża pyta', 'Aktywny', 0),
(7, 'mocna_krycha@polki.xxx', 'krystyna', '4497c14659584316e6011819763310f05020ff0c01641f7043cb13284127c894', 0, NULL, 'Kryśka', 'Mocnossąca', 'Aktywny', 0),
(8, 'luce23k@polki.xxx', 'lucek', 'ddd59b5daee56e68ae59e072da46619ec227e37414ad48e0913dc40a14fb04dd', 0, NULL, 'Lucjan', 'Miśkiewicz', 'Aktywny', 0),
(9, 'pedrylek@polki.xxx', 'pedryl', '96380b623ba0cb5bca13e16566c2c0ab321722673706b445bbc8571f9072201f', 0, NULL, 'Peneloposław', 'Pedrylek', 'Aktywny', 0),
(10, 'adam_z_hujami_nie_gadam@polki.xxx', 'adamos', 'cb629ec69688645da8100c959930f1d071f519ee03671c243f492d4d56e3f597', 0, NULL, 'Adam', 'Tester', 'Aktywny', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `user_tokens`
--

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

CREATE TABLE IF NOT EXISTS `virtualbriefcases` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `division_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_wt_przypisana_do` (`division_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `virtualbriefcases`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `warehousebarcodes`
--

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

CREATE TABLE IF NOT EXISTS `warehouses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_zarzadza` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `warehouses`
--


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
  ADD CONSTRAINT `FK_km_przypisany_do_p` FOREIGN KEY (`warehousebarcode_id`) REFERENCES `warehousebarcodes` (`id`),
  ADD CONSTRAINT `FK_kp_przypisany_do_p_1` FOREIGN KEY (`boxbarcode_id`) REFERENCES `boxbarcodes` (`id`),
  ADD CONSTRAINT `FK_m_ma_na_stanie` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`),
  ADD CONSTRAINT `FK_p_przypisana_do_wt` FOREIGN KEY (`virtualbriefcase_id`) REFERENCES `virtualbriefcases` (`id`);

--
-- Ograniczenia dla tabeli `bulkpackagings`
--
ALTER TABLE `bulkpackagings`
  ADD CONSTRAINT `FK_oz_przypisana_do_wt` FOREIGN KEY (`virtualbriefcase_id`) REFERENCES `virtualbriefcases` (`id`),
  ADD CONSTRAINT `FK_oz_przypisane_do` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`);

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
-- Ograniczenia dla tabeli `documentlists`
--
ALTER TABLE `documentlists`
  ADD CONSTRAINT `FK_ld_przypisana_do_oz` FOREIGN KEY (`bulkpackaging_id`) REFERENCES `bulkpackagings` (`id`),
  ADD CONSTRAINT `FK_ld_przypisana_do_p` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`),
  ADD CONSTRAINT `FK_ld_przypisana_do_wt` FOREIGN KEY (`virtualbriefcase_id`) REFERENCES `virtualbriefcases` (`id`);

--
-- Ograniczenia dla tabeli `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `FK_d_przypisany_do_ld` FOREIGN KEY (`documentlist_id`) REFERENCES `documentlists` (`id`),
  ADD CONSTRAINT `FK_d_przypisany_do_oz` FOREIGN KEY (`bulkpackaging_id`) REFERENCES `bulkpackagings` (`id`),
  ADD CONSTRAINT `FK_d_przypisany_do_p` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`),
  ADD CONSTRAINT `FK_d_przypisany_do_wt` FOREIGN KEY (`virtualbriefcase_id`) REFERENCES `virtualbriefcases` (`id`);

--
-- Ograniczenia dla tabeli `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `liczona_wg_price` FOREIGN KEY (`pricetable_id`) REFERENCES `pricetables` (`id`),
  ADD CONSTRAINT `liczona_wg_customer` FOREIGN KEY (`pricetable_id`) REFERENCES `customers` (`id`);

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_f_przypisana_do_z` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `FK_z_adres` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `FK_z_zlozone` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
-- Ograniczenia dla tabeli `warehousebarcodes`
--
ALTER TABLE `warehousebarcodes`
  ADD CONSTRAINT `FK_km_przypisany_do_m` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`);

--
-- Ograniczenia dla tabeli `warehouses`
--
ALTER TABLE `warehouses`
  ADD CONSTRAINT `FK_zarzadza` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

SET foreign_key_checks = 1;