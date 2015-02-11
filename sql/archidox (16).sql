-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 11 Lut 2015, 09:56
-- Wersja serwera: 5.1.41
-- Wersja PHP: 5.4.29

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `archidox`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `acls`
--

DROP TABLE IF EXISTS `acls`;
CREATE TABLE IF NOT EXISTS `acls` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `controller` varchar(32) NOT NULL,
  `action` varchar(32) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `menu` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT '0',
  `order` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=136 ;

--
-- Zrzut danych tabeli `acls`
--

INSERT INTO `acls` (`id`, `controller`, `action`, `icon`, `description`, `menu`, `parent`, `order`) VALUES
(1, 'admin', 'customer_add', '', '', 0, 7, 0),
(2, 'admin', 'customer_add_user', '', '', 0, 7, 0),
(3, 'admin', 'customer_delete', '', '', 0, 7, 0),
(4, 'admin', 'customer_edit', '', '', 0, 7, 0),
(5, 'admin', 'customers', 'icon-list', 'Lista klientów', 1, 7, 1),
(6, 'admin', 'customer_users', '', '', 0, 7, 0),
(7, 'admin', 'index', 'icon-user', 'Administracja', 1, 0, 1),
(8, 'admin', 'storagecategories', 'icon-layers', 'Kategorie', 1, 7, 4),
(9, 'admin', 'storagecategory_add', '', '', 0, 7, 0),
(10, 'admin', 'storagecategory_delete', '', '', 0, 7, 0),
(11, 'admin', 'storagecategory_edit', '', '', 0, 7, 0),
(12, 'admin', 'user_add', 'icon-user', 'Dodaj użytkownika', 1, 7, 3),
(13, 'admin', 'user_delete', '', '', 0, 7, 0),
(14, 'admin', 'user_edit', '', '', 0, 7, 0),
(15, 'admin', 'user_lock', '', '', 0, 7, 0),
(16, 'admin', 'users', 'icon-list', 'Lista użytkowników', 1, 7, 2),
(17, 'admin', 'user_unlock', '', '', 0, 7, 0),
(18, 'admin', 'shipmentcompanies', 'icon-handbag', 'Firmy kurierskie', 1, 7, 5),
(19, 'admin', 'shipmentcompany_add', '', '', 0, 7, 0),
(20, 'admin', 'shipmentcompany_delete', '', '', 0, 7, 0),
(21, 'admin', 'shipmentcompany_edit', '', '', 0, 7, 0),
(22, 'ajax', 'check_email_availability', '', '', 0, 0, 0),
(23, 'ajax', 'check_user_availability', '', '', 0, 0, 0),
(24, 'ajax', 'generate_password', '', '', 0, 0, 0),
(25, 'ajax', 'get_user_notifications', '', '', 0, 0, 0),
(26, 'ajax', 'get_utilisation_document', '', '', 0, 0, 0),
(27, 'ajax', 'get_utilisation_document_pdf', '', '', 0, 0, 0),
(28, 'ajax', 'index', '', '', 0, 0, 0),
(29, 'config', 'dashboard', '', '', 0, 0, 0),
(30, 'customer', 'add_address', '', '', 0, 35, 0),
(31, 'customer', 'division_add', '', '', 0, 35, 0),
(32, 'customer', 'division_edit', '', '', 0, 35, 0),
(33, 'customer', 'divisions', 'icon-list', 'Lista działów', 1, 35, 2),
(34, 'customer', 'division_view', '', '', 0, 35, 0),
(35, 'customer', 'index', 'icon-basket', 'Klient', 1, 0, 2),
(36, 'customer', 'info', 'icon-notebook', 'Informacje o firmie', 1, 35, 3),
(37, 'customer', 'edit', 'icon-globe', 'Edycja danych firmowych', 1, 35, 4),
(38, 'customer', 'search', '', '', 0, 35, 0),
(39, 'customer', 'user_add', '', '', 0, 35, 0),
(40, 'customer', 'user_edit', '', '', 0, 35, 0),
(41, 'customer', 'user_lock', '', '', 0, 35, 0),
(42, 'customer', 'users', 'icon-list', 'Lista użytkowników', 1, 35, 1),
(43, 'customer', 'user_unlock', '', '', 0, 35, 0),
(44, 'default', 'index', '', '', 0, 0, 0),
(45, 'default', 'login', '', '', 0, 0, 0),
(46, 'default', 'logout', 'icon-logout', 'Wyloguj', 1, 0, 999),
(47, 'default', 'reset', '', '', 0, 0, 0),
(48, 'finance', 'index', 'icon-diamond', 'Finanse', 1, 0, 5),
(49, 'finance', 'invoices', 'icon-doc', 'Faktury', 1, 48, 0),
(50, 'finance', 'prices', 'icon-list', 'Cenniki', 1, 48, 0),
(51, 'finance', 'pricetable_add', '', '', 0, 48, 0),
(52, 'order', 'accept', '', '', 0, 58, 0),
(53, 'order', 'add', 'icon-plus', 'Dodaj', 1, 58, 1),
(54, 'order', 'complete', '', '', 0, 58, 0),
(55, 'order', 'delete', '', '', 0, 58, 0),
(56, 'order', 'deliver', '', '', 0, 58, 0),
(57, 'order', 'edit_order', '', '', 0, 58, 0),
(58, 'order', 'index', 'icon-calculator', 'Zamówienia', 1, 0, 4),
(59, 'order', 'order_document', '', '', 0, 58, 0),
(60, 'order', 'orders', 'icon-list', 'Lista zamówień', 1, 58, 2),
(61, 'order', 'orders_inprogress', 'icon-basket-loaded', 'W trakcie', 1, 58, 3),
(62, 'order', 'orders_new', 'icon-basket', 'Nowe', 1, 58, 4),
(63, 'order', 'orders_realized', 'icon-cup', 'Zrealizowane', 1, 58, 5),
(64, 'order', 'orders_search', 'icon-direction', 'Szukaj', 1, 58, 7),
(65, 'order', 'send', '', '', 0, 58, 0),
(66, 'order', 'utilisation_document', '', '', 0, 58, 0),
(67, 'order', 'view_order', '', '', 0, 58, 0),
(68, 'profile', 'index', 'icon-user', 'Profil', 1, 0, 998),
(69, 'profile', 'profile', 'icon-ghost', 'Edytuj dane', 1, 68, 0),
(70, 'report', 'index', '', '', 0, 0, 0),
(71, 'user', 'calendar', '', '', 0, 0, 0),
(72, 'user', 'create', '', '', 0, 0, 0),
(73, 'user', 'dashboard', 'glyphicon glyphicon-dashboard', 'Panel', 1, 0, 0),
(74, 'user', 'index', '', '', 0, 0, 0),
(75, 'user', 'login', '', '', 0, 0, 0),
(76, 'user', 'logout', '', '', 0, 0, 0),
(77, 'user', 'profile', '', '', 0, 0, 0),
(78, 'virtualbriefcase', 'add_item_vb', 'icon-docs', 'Dodaj do teczki', 1, 93, 6),
(79, 'virtualbriefcase', 'box_add', '', '', 0, 93, 0),
(80, 'virtualbriefcase', 'boxes', 'glyphicon glyphicon-inbox', 'Pudła', 1, 93, 2),
(81, 'virtualbriefcase', 'box_remove', '', '', 0, 93, 0),
(82, 'virtualbriefcase', 'bulkpackaging_add', '', '', 0, 93, 0),
(83, 'virtualbriefcase', 'bulkpackaging_remove', '', '', 0, 93, 0),
(84, 'virtualbriefcase', 'bulkpackagings', 'glyphicon glyphicon-th', 'Teczki', 1, 93, 5),
(85, 'virtualbriefcase', 'childvirtualbriefcase_add', '', '', 0, 93, 0),
(86, 'virtualbriefcase', 'childvirtualbriefcase_remove', '', '', 0, 93, 0),
(87, 'virtualbriefcase', 'document_add', '', '', 0, 93, 0),
(88, 'virtualbriefcase', 'documentlist_add', '', '', 0, 93, 0),
(89, 'virtualbriefcase', 'documentlist_remove', '', '', 0, 93, 0),
(90, 'virtualbriefcase', 'documentlists', 'glyphicon glyphicon-list-alt ', 'Listy dokumentów', 1, 93, 4),
(91, 'virtualbriefcase', 'document_remove', '', '', 0, 93, 0),
(92, 'virtualbriefcase', 'documents', 'icon-pencil', 'Dokumenty', 1, 93, 3),
(93, 'virtualbriefcase', 'index', 'icon-list', 'Wirtualne teczki', 1, 0, 3.1),
(94, 'virtualbriefcase', 'nested_virtualbriefcases', '', '', 0, 93, 0),
(95, 'virtualbriefcase', 'virtualbriefcase_add', '', '', 0, 93, 0),
(96, 'virtualbriefcase', 'virtualbriefcase_delete', '', '', 0, 93, 0),
(97, 'virtualbriefcase', 'virtualbriefcase_edit', '', '', 0, 93, 0),
(98, 'virtualbriefcase', 'virtualbriefcases', 'icon-list', 'Lista wirtualnych teczek', 1, 93, 1),
(99, 'virtualbriefcase', 'virtualbriefcase_view', '', '', 0, 93, 0),
(100, 'warehouse', 'add_item', 'icon-docs', 'Dodaj do magazynu', 1, 129, 5),
(101, 'warehouse', 'add_item_bp', '', '', 0, 129, 0),
(102, 'warehouse', 'box_add', '', '', 0, 129, 0),
(103, 'warehouse', 'box_delete', '', '', 0, 129, 0),
(104, 'warehouse', 'box_edit', '', '', 0, 129, 0),
(105, 'warehouse', 'boxes', 'glyphicon glyphicon-inbox', 'Pudła', 1, 129, 2),
(106, 'warehouse', 'boxes_search', 'icon-magnifier', 'Wyszukaj...', 1, 129, 4),
(107, 'warehouse', 'boxes_search_result', '', '', 0, 129, 0),
(108, 'warehouse', 'box_view', '', '', 0, 129, 0),
(109, 'warehouse', 'bulkpackaging_add', '', '', 0, 129, 0),
(110, 'warehouse', 'bulkpackaging_delete', '', '', 0, 129, 0),
(111, 'warehouse', 'bulkpackaging_edit', '', '', 0, 129, 0),
(112, 'warehouse', 'bulkpackagings', 'glyphicon glyphicon-th', 'Teczki', 1, 105, 5),
(113, 'warehouse', 'bulkpackaging_view', '', '', 0, 129, 0),
(114, 'warehouse', 'childbulkpackaging_add', '', '', 0, 129, 0),
(115, 'warehouse', 'childbulkpackaging_remove', '', '', 0, 129, 0),
(116, 'warehouse', 'document_add', '', '', 0, 129, 0),
(117, 'warehouse', 'document_add_bp', '', '', 0, 129, 0),
(118, 'warehouse', 'document_delete', '', '', 0, 129, 0),
(119, 'warehouse', 'document_edit', '', '', 0, 129, 0),
(120, 'warehouse', 'documentlist_add', '', '', 0, 129, 0),
(121, 'warehouse', 'documentlist_add_bp', '', '', 0, 129, 0),
(122, 'warehouse', 'documentlist_delete', '', '', 0, 129, 0),
(123, 'warehouse', 'documentlist_edit', '', '', 0, 129, 0),
(124, 'warehouse', 'documentlists', 'glyphicon glyphicon-list-alt', 'Listy dokumentów', 1, 105, 3),
(125, 'warehouse', 'documentlist_view', '', '', 0, 129, 0),
(126, 'warehouse', 'documents', 'icon-pencil', 'Dokumenty', 1, 105, 2),
(127, 'warehouse', 'documents_search', '', '', 0, 129, 0),
(128, 'warehouse', 'documents_search_result', '', '', 0, 129, 0),
(129, 'warehouse', 'index', 'icon-grid', 'Magazyn', 1, 0, 3),
(130, 'warehouse', 'warehouse_add', '', '', 0, 129, 0),
(131, 'warehouse', 'warehouse_delete', '', '', 0, 129, 0),
(132, 'warehouse', 'warehouse_edit', '', '', 0, 129, 0),
(133, 'warehouse', 'warehouses', 'icon-layers', 'Magazyny', 1, 129, 1),
(134, 'warehouse', 'warehouse_view', '', '', 0, 129, 0),
(135, 'warehouse', 'boxes', 'glyphicon glyphicon-inbox', 'Lista pudeł', 1, 105, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `acls_roles`
--

DROP TABLE IF EXISTS `acls_roles`;
CREATE TABLE IF NOT EXISTS `acls_roles` (
  `role_id` int(11) unsigned DEFAULT NULL,
  `acl_id` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `acls_roles`
--

INSERT INTO `acls_roles` (`role_id`, `acl_id`) VALUES
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 52),
(2, 53),
(2, 54),
(2, 55),
(2, 56),
(2, 57),
(2, 58),
(2, 59),
(2, 60),
(2, 61),
(2, 62),
(2, 63),
(2, 64),
(2, 65),
(2, 66),
(2, 67),
(2, 68),
(2, 69),
(2, 70),
(2, 71),
(2, 72),
(2, 73),
(2, 74),
(2, 75),
(2, 76),
(2, 77),
(2, 78),
(2, 79),
(2, 80),
(2, 81),
(2, 82),
(2, 83),
(2, 84),
(2, 85),
(2, 86),
(2, 87),
(2, 88),
(2, 89),
(2, 90),
(2, 91),
(2, 92),
(2, 93),
(2, 94),
(2, 95),
(2, 96),
(2, 97),
(2, 98),
(2, 99),
(2, 100),
(2, 101),
(2, 102),
(2, 103),
(2, 104),
(2, 105),
(2, 106),
(2, 107),
(2, 108),
(2, 109),
(2, 110),
(2, 111),
(2, 112),
(2, 113),
(2, 114),
(2, 115),
(2, 116),
(2, 117),
(2, 118),
(2, 119),
(2, 120),
(2, 121),
(2, 122),
(2, 123),
(2, 124),
(2, 125),
(2, 126),
(2, 127),
(2, 128),
(2, 129),
(2, 130),
(2, 131),
(2, 132),
(2, 133),
(2, 134),
(2, 135),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(1, 68),
(1, 69),
(1, 70),
(1, 71),
(1, 72),
(1, 73),
(1, 74),
(1, 75),
(1, 76),
(1, 77),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(3, 41),
(3, 42),
(3, 43),
(3, 44),
(3, 45),
(3, 46),
(3, 47),
(3, 48),
(3, 49),
(3, 50),
(3, 52),
(3, 53),
(3, 54),
(3, 55),
(3, 56),
(3, 57),
(3, 58),
(3, 59),
(3, 60),
(3, 61),
(3, 62),
(3, 63),
(3, 64),
(3, 65),
(3, 66),
(3, 67),
(3, 68),
(3, 69),
(3, 70),
(3, 71),
(3, 72),
(3, 73),
(3, 74),
(3, 75),
(3, 76),
(3, 77),
(3, 78),
(3, 79),
(3, 80),
(3, 81),
(3, 82),
(3, 83),
(3, 84),
(3, 85),
(3, 86),
(3, 87),
(3, 88),
(3, 89),
(3, 90),
(3, 91),
(3, 92),
(3, 93),
(3, 94),
(3, 95),
(3, 96),
(3, 97),
(3, 98),
(3, 99),
(3, 100),
(3, 101),
(3, 102),
(3, 103),
(3, 104),
(3, 105),
(3, 106),
(3, 107),
(3, 108),
(3, 109),
(3, 110),
(3, 111),
(3, 112),
(3, 113),
(3, 114),
(3, 115),
(3, 116),
(3, 117),
(3, 118),
(3, 119),
(3, 120),
(3, 121),
(3, 122),
(3, 123),
(3, 124),
(3, 125),
(3, 126),
(3, 127),
(3, 128),
(3, 129),
(3, 130),
(3, 131),
(3, 132),
(3, 133),
(3, 134),
(3, 135),
(4, 22),
(4, 23),
(4, 24),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(4, 44),
(4, 45),
(4, 46),
(4, 47),
(4, 52),
(4, 53),
(4, 54),
(4, 55),
(4, 56),
(4, 57),
(4, 58),
(4, 59),
(4, 60),
(4, 61),
(4, 62),
(4, 63),
(4, 64),
(4, 65),
(4, 66),
(4, 67),
(4, 68),
(4, 69),
(4, 70),
(4, 71),
(4, 72),
(4, 73),
(4, 74),
(4, 75),
(4, 76),
(4, 77);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Zrzut danych tabeli `addresses`
--

INSERT INTO `addresses` (`id`, `city`, `street`, `number`, `flat`, `postal`, `country`, `telephone`, `address_type`, `customer_id`) VALUES
(1, 'Default', 'Detault', '1', '1', '00-000', 'Default', '600123123', 'firmowy', 0),
(13, '', '', '', '', '', '', '', 'wysyłki', 0),
(14, '', '', '', '', '', '', '', 'odbioru', 0),
(15, '', '', '', '', '', '', '', 'odbioru', 0),
(16, '', '', '', '', '', '', '', 'odbioru', 0),
(17, 'Warszawa', 'Kaliska', '1', '42', '02-316', 'Polska', '999999999', 'wysyłki', 0),
(18, 'Warszawa', 'Kaliska', '1', '42', '02-393', 'Polska', '4865656565', 'odbioru', 0),
(19, '', '', '', '', '', '', '', 'wysyłki', 0),
(20, '', '', '', '', '', '', '', 'wysyłki', 0),
(21, '', '', '', '', '', '', '', 'wysyłki', 0),
(22, '', '', '', '', '', '', '', 'wysyłki', 0),
(23, '', '', '', '', '', '', '', 'wysyłki', 0),
(24, '', '', '', '', '', '', '', 'wysyłki', 0),
(25, '', '', '', '', '', '', '', 'wysyłki', 0);

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
  `barcode` int(11) NOT NULL,
  `place` varchar(32) DEFAULT NULL,
  `storage_category_id` int(11) DEFAULT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `date_reception` date NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `lock` varchar(32) DEFAULT NULL,
  `seal` varchar(32) DEFAULT NULL,
  `status` enum('Puste','Na magazynie','W trakcie transportu','Wypożyczone','Przyjęcie na magazyn') DEFAULT 'Na magazynie',
  `utilisation_status` int(2) DEFAULT '0',
  `utilisation_document` varchar(255) DEFAULT NULL,
  `warehouse_id` int(11) unsigned DEFAULT NULL,
  `division_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_p_przypisana_do_km` (`storage_category_id`),
  KEY `FK_m_ma_na_stanie` (`warehouse_id`),
  KEY `status` (`status`),
  KEY `division_id` (`division_id`),
  KEY `barcode` (`barcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4568 ;

--
-- Zrzut danych tabeli `boxes`
--

INSERT INTO `boxes` (`id`, `barcode`, `place`, `storage_category_id`, `date_from`, `date_to`, `date_reception`, `description`, `lock`, `seal`, `status`, `utilisation_status`, `utilisation_document`, `warehouse_id`, `division_id`) VALUES
(123, 100001, '1001', 7, '2015-01-31', '2015-02-28', '2015-01-31', '', NULL, '', 'W trakcie transportu', 0, NULL, 3, 3),
(333, 100002, '1001', NULL, '2015-01-31', NULL, '2015-01-31', NULL, NULL, NULL, 'W trakcie transportu', 0, NULL, NULL, NULL),
(1234, 100003, '1001', NULL, '2015-01-31', NULL, '2015-01-31', NULL, NULL, NULL, 'W trakcie transportu', 0, NULL, NULL, NULL),
(4567, 100004, '1001', NULL, '2015-01-31', NULL, '2015-01-31', NULL, NULL, NULL, 'W trakcie transportu', 0, NULL, NULL, NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Zrzut danych tabeli `customers`
--

INSERT INTO `customers` (`id`, `name`, `nip`, `regon`, `code`, `comments`, `www`, `create_date`) VALUES
(0, '_Default', '123-123-12-12', '123456', 'DEFAULT', 'Domyślna firma - nie usuwać', 'https://www.bsdterminal.pl', '2014-01-01 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `description`, `customer_id`) VALUES
(1, 'DA 1', 'Dział testowy Admina 1', 0),
(2, 'DA 2', 'Dział testowy Admina 2', 0),
(3, 'DA 3', 'Dział testowy Admina 3			', 0);

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
(1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

--
-- Zrzut danych tabeli `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `message`, `status`) VALUES
(1, 1, 'Test', 1),
(2, 1, 'Nowe zamówienie w systemie<br /><p>Link do akceptacji: <a href="https://localhost/order/accept/27">Kliknij aby zaakceptować zamówienie</a></p>', 1),
(3, 1, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/28">Kliknij aby zaakceptować zamówienie</a></p>', 1),
(19, 1, 'Zamówienie 31 zmieniło status<br /><br />', 1),
(20, 1, 'Zamówienie 2 zmieniło status<br /><br />', 1),
(21, 1, 'Zamówienie 33 zmieniło status<br /><br />', 1),
(22, 1, 'Zamówienie 4 zmieniło status<br /><br />', 1),
(23, 1, 'Zamówienie 34 zmieniło status<br /><br />', 1),
(24, 1, 'Zamówienie 33 zmieniło status<br /><br />', 1),
(25, 1, 'Zamówienie 32 zmieniło status<br /><br />', 1),
(26, 1, 'Zamówienie 31 zmieniło status<br /><br />', 1),
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
(49, 1, 'Zamówienie 42 zmieniło status<br /><br />', 1),
(96, 1, 'Zamówienie 42 zmieniło status<br /><br />', 1),
(98, 1, 'Zamówienie 75 zmieniło status<br /><br />', 1),
(99, 1, 'Zamówienie 75 zmieniło status<br /><br />', 1),
(100, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/78">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(101, 1, 'Zamówienie 78 zmieniło status<br /><br />', 1),
(102, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/80">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(103, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/81">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(104, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/82">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(105, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/83">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(106, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/84">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(107, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/85">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(108, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/86">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(109, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/87">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(110, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/88">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(111, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/89">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(112, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/90">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(113, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/91">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(114, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/92">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(115, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/93">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(116, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/94">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(117, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/96">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(118, 1, 'Zamówienie 14 zmieniło status<br /><br />', 1),
(119, 1, 'Zamówienie 11 zmieniło status<br /><br />', 1),
(120, 1, 'Zamówienie 12 zmieniło status<br /><br />', 1),
(121, 1, 'Zamówienie 13 zmieniło status<br /><br />', 1),
(122, 1, 'Zamówienie 15 zmieniło status<br /><br />', 1),
(123, 1, 'Zamówienie 16 zmieniło status<br /><br />', 1),
(124, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/97">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(125, 1, 'Zamówienie 17 zmieniło status<br /><br />', 1),
(126, 1, 'Zamówienie 18 zmieniło status<br /><br />', 1),
(127, 1, 'Zamówienie 19 zmieniło status<br /><br />', 1),
(128, 1, 'Zamówienie 20 zmieniło status<br /><br />', 1),
(129, 1, 'Zamówienie 21 zmieniło status<br /><br />', 1),
(130, 1, 'Zamówienie 25 zmieniło status<br /><br />', 1),
(131, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/99">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(132, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/100">Kliknij aby zaakceptować zamówienie</a></p>', 0),
(133, 3, 'Nowe zamówienie w systemie<br /><br /><p>Link do akceptacji: <a href="https://localhost/order/accept/101">Kliknij aby zaakceptować zamówienie</a></p>', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=108 ;

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
(60, 0, 0, '', '1970-01-01', 75),
(61, 1, 1, 'asdfghhhfgds', '2016-10-09', 77),
(62, 2, 2, '3dgrdyu65', '2016-10-09', 77),
(63, 0, 0, '', '1970-01-01', 78),
(64, 0, 0, '', '1970-01-01', 86),
(65, 0, 0, '', '1970-01-01', 86),
(66, 0, 0, '', '1970-01-01', 86),
(67, 0, 0, '', '1970-01-01', 86),
(68, 0, 0, '', '1970-01-01', 86),
(69, 0, 0, '', '1970-01-01', 86),
(70, 0, 0, '', '1970-01-01', 86),
(71, 0, 0, '', '1970-01-01', 86),
(72, 0, 0, '', '1970-01-01', 86),
(73, 0, 0, '', '1970-01-01', 86),
(74, 0, 0, '', '1970-01-01', 86),
(75, 0, 0, '', '1970-01-01', 86),
(76, 0, 0, '', '1970-01-01', 97),
(77, 0, 0, '', '1970-01-01', 97),
(78, 0, 0, '', '1970-01-01', 97),
(79, 0, 0, '', '1970-01-01', 97),
(80, 0, 0, '', '1970-01-01', 97),
(81, 0, 0, '', '1970-01-01', 97),
(82, 0, 0, '', '1970-01-01', 97),
(83, 0, 0, '', '1970-01-01', 97),
(84, 0, 0, '', '1970-01-01', 97),
(85, 0, 0, '', '1970-01-01', 97),
(86, 0, 0, '', '1970-01-01', 99),
(87, 0, 0, '', '1970-01-01', 99),
(88, 0, 0, '', '1970-01-01', 99),
(89, 0, 0, '', '1970-01-01', 99),
(90, 0, 0, '', '1970-01-01', 99),
(91, 0, 0, '', '1970-01-01', 99),
(92, 0, 0, '', '1970-01-01', 99),
(93, 0, 0, '', '1970-01-01', 99),
(94, 0, 0, '', '1970-01-01', 99),
(95, 0, 0, '', '1970-01-01', 99),
(96, 0, 0, '', '1970-01-01', 99),
(97, 0, 0, '', '1970-01-01', 99),
(98, 0, 0, '', '1970-01-01', 101),
(99, 0, 0, '', '1970-01-01', 101),
(100, 0, 0, '', '1970-01-01', 101),
(101, 0, 0, '', '1970-01-01', 101),
(102, 0, 0, '', '1970-01-01', 101),
(103, 0, 0, '', '1970-01-01', 101),
(104, 0, 0, '', '1970-01-01', 101),
(105, 0, 0, '', '1970-01-01', 101),
(106, 0, 0, '', '1970-01-01', 101),
(107, 0, 0, '', '1970-01-01', 101);

-- --------------------------------------------------------

--
-- Struktura tabeli dla  `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `status` enum('Nowe','Przyjęte do realizacji','Oczekuje na wysłanie','W doręczeniu','Dostarczone','W trakcie realizacji','W trakcie odbioru','W dostrczeniu na magazyn','Na stanie magazynu','Odebrane','Zrealizowane') DEFAULT NULL,
  `type` enum('Zamówienie pustych pudeł i kodów kreskowych','Zamówienie odbioru i magazynowania pudeł','Zamówienie zniszczenie magazynowanych pudeł','Zamówienie skanowania, kopii dokumentów','Zamówienie kopii notarialnej dokumentów','Wypożyczenie pudeł') DEFAULT NULL,
  `address_id` int(11) unsigned NOT NULL,
  `warehouse_id` int(11) unsigned DEFAULT NULL,
  `division_id` int(11) unsigned DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `pickup_date` date NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_document` varchar(255) DEFAULT NULL,
  `utilisation_document` varchar(255) DEFAULT NULL,
  `shipmentcompany_id` int(11) unsigned DEFAULT NULL,
  `shipping_number` varchar(64) DEFAULT NULL,
  `pricetable_id` int(11) unsigned NOT NULL,
  `final_price` float DEFAULT NULL,
  `sealed_boxes` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_z_zlozone` (`user_id`),
  KEY `FK_z_adres` (`address_id`),
  KEY `warehouse_id_fk` (`warehouse_id`),
  KEY `division_id_fk` (`division_id`),
  KEY `quantity_idx` (`quantity`),
  KEY `order_document` (`order_document`),
  KEY `utlisation_document` (`utilisation_document`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=84 ;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `type`, `address_id`, `warehouse_id`, `division_id`, `quantity`, `pickup_date`, `create_date`, `order_document`, `utilisation_document`, `shipmentcompany_id`, `shipping_number`, `pricetable_id`, `final_price`, `sealed_boxes`) VALUES
(33, 1, 'Dostarczone', 'Zamówienie kopii notarialnej dokumentów', 1, 3, 2, -1, '0000-00-00', '2014-09-13 23:21:17', NULL, NULL, 1, '098765432', 0, NULL, 0),
(80, 1, 'Nowe', 'Zamówienie pustych pudeł i kodów kreskowych', 24, NULL, 1, -1, '0000-00-00', '2015-01-06 22:10:58', NULL, NULL, NULL, NULL, 3, 144, 0),
(81, 1, 'Nowe', 'Zamówienie pustych pudeł i kodów kreskowych', 25, NULL, 1, -1, '0000-00-00', '2015-01-06 22:23:37', NULL, NULL, NULL, NULL, 3, 144, 0),
(82, 1, 'Nowe', 'Zamówienie pustych pudeł i kodów kreskowych', 1, NULL, 1, -1, '0000-00-00', '2015-01-06 22:28:19', NULL, NULL, NULL, NULL, 3, 144, 0),
(83, 1, 'Nowe', 'Zamówienie pustych pudeł i kodów kreskowych', 1, NULL, 1, -1, '2015-01-30', '2015-01-06 22:41:34', NULL, NULL, NULL, NULL, 3, 144, 0);

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


-- --------------------------------------------------------

--
-- Struktura tabeli dla  `orders_documents`
--

DROP TABLE IF EXISTS `orders_documents`;
CREATE TABLE IF NOT EXISTS `orders_documents` (
  `order_id` int(11) unsigned NOT NULL,
  `document_id` int(11) unsigned NOT NULL,
  KEY `order_id` (`order_id`),
  KEY `document_id` (`document_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `orders_documents`
--


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
  `position_disposal` float NOT NULL,
  `discount` float DEFAULT NULL,
  `active` int(2) NOT NULL DEFAULT '1',
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ma_przypisany` (`customer_id`),
  KEY `active` (`active`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `pricetables`
--

INSERT INTO `pricetables` (`id`, `boxes_reception`, `boxes_sending`, `boxes_storage`, `document_scan`, `document_copy`, `document_notarial_copy`, `position_disposal`, `discount`, `active`, `customer_id`) VALUES
(1, 1, 1, 1, 1, 1, 1, 0, 1, 0, 0),
(3, 12, 12, 12, 12, 12, 12, 0, NULL, 1, 0);

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
(1, 2),
(2, 3),
(3, 4);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `shipmentcompanies`
--

INSERT INTO `shipmentcompanies` (`id`, `name`, `address`, `telephone`, `shipping_price`, `comments`, `customer_id`) VALUES
(1, 'DHL', 'Dhaelowa 123', '+48664043792', 19.1, 'Testowa firma																														', 0),
(2, 'Siudemka', 'Testowy 12', '456 456 456', 12.3, 'Testowa numer dwa																		', 0),
(3, 'Transport własny', 'Cibora 12', '123123123', 1, 'Dostawa transportem wewnętrznym					1							', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Zrzut danych tabeli `storagecategories`
--

INSERT INTO `storagecategories` (`id`, `name`, `description`) VALUES
(1, 'KAT A', 'Kategoria magazynowania A'),
(2, 'KAT B', 'Kategoria magazynowania B'),
(3, 'KAT C', 'Kategoria magazynowania CE'),
(5, 'KAT D', 'Kategoria D				'),
(6, 'Kategoria Demo', 'Kategoria Demo						'),
(7, 'Kategoria Testowa', 'Kategoria Testowa						');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`, `firstname`, `lastname`, `status`, `customer_id`) VALUES
(1, 'maciekk@bsdterminal.pl', 'admin', 'b18c10839e5f8bbc7b780e135c980bcf3e0086ea411fca2e65027a8a9f2f1efa', 38, 1422561727, '', '', 'Aktywny', 0),
(2, 'manager@bsdterminal.pl', 'manager', '7f4f6fe32b07da194b9ebb5f435c21bbbb3df5575815c27fda6b3624dcd1b77d', 24, 1420761762, 'Manager', 'Manadżerowski', 'Aktywny', 0),
(3, 'operator@bsdterminal.pl', 'operator', '7f4f6fe32b07da194b9ebb5f435c21bbbb3df5575815c27fda6b3624dcd1b77d', 39, 1422672658, 'Operator', 'Operatorski', 'Aktywny', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `virtualbriefcases`
--

INSERT INTO `virtualbriefcases` (`id`, `name`, `description`, `division_id`) VALUES
(2, 'TA 22', 'Teczka Admina 2', 2),
(10, 'Wirtualna Teczka 1001', 'Test 1', 2);

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
-- Struktura tabeli dla  `warehousehistories`
--

DROP TABLE IF EXISTS `warehousehistories`;
CREATE TABLE IF NOT EXISTS `warehousehistories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `operation_type` enum('Wejście na magazyn','Wyjście z magazynu','Przesunięcie') NOT NULL,
  `operation_description` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `warehouse_id` int(11) unsigned NOT NULL,
  `box_id` int(11) unsigned NOT NULL,
  `change_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `operation_type` (`operation_type`,`user_id`,`warehouse_id`,`box_id`),
  KEY `change_date` (`change_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `warehousehistories`
--

INSERT INTO `warehousehistories` (`id`, `operation_type`, `operation_description`, `user_id`, `warehouse_id`, `box_id`, `change_date`) VALUES
(1, 'Wejście na magazyn', 'Dodanie pudła do magazynu', 1, 2, 22, '2015-01-05 18:52:55');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `warehouses`
--

INSERT INTO `warehouses` (`id`, `name`, `description`, `customer_id`) VALUES
(3, 'MA 1', 'Magazyn Admina 1			', 0);

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
  ADD CONSTRAINT `boxes_ibfk_1` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE,
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
  ADD CONSTRAINT `divisions_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `invoices_ibfk_3` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`),
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
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_6` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_7` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`);

--
-- Ograniczenia dla tabeli `orders_boxes`
--
ALTER TABLE `orders_boxes`
  ADD CONSTRAINT `orders_boxes_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_boxes_ibfk_4` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `orders_documents`
--
ALTER TABLE `orders_documents`
  ADD CONSTRAINT `orders_documents_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_documents_ibfk_2` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `pricetables`
--
ALTER TABLE `pricetables`
  ADD CONSTRAINT `pricetables_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `virtualbriefcases`
--
ALTER TABLE `virtualbriefcases`
  ADD CONSTRAINT `virtualbriefcases_ibfk_1` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
