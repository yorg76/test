SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `city` varchar(64) COLLATE utf8_general_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `number` varchar(8) COLLATE utf8_general_ci DEFAULT NULL,
  `flat` varchar(8) COLLATE utf8_general_ci DEFAULT NULL,
  `postal` varchar(8) COLLATE utf8_general_ci DEFAULT NULL,
  `country` varchar(11), 
  `telephone` varchar(12) COLLATE utf8_general_ci DEFAULT NULL,
  `address_type` set('firmowy','odbioru','wysyłki') COLLATE utf8_general_ci DEFAULT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `definiuje` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `documentlist_id` int(11) unsigned NOT NULL,
  `bulkpackaging_id` int(11) unsigned NOT NULL,
  `virtualbriefcase_id` int(11) unsigned NOT NULL,
  `box_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_d_przypisany_do_ld` (`documentlist_id`),
  KEY `FK_d_przypisany_do_oz` (`bulkpackaging_id`),
  KEY `FK_d_przypisany_do_wt` (`virtualbriefcase_id`),
  KEY `FK_d_przypisany_do_p` (`box_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `divisions`;
CREATE TABLE IF NOT EXISTS `divisions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_general_ci DEFAULT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_nalezy_do` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `divisions_users`;
CREATE TABLE IF NOT EXISTS `divisions_users` (
  `division_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`division_id`,`user_id`),
  KEY `fk_division_id` (`division_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(32) COLLATE utf8_general_ci DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `pricetable_id` int(11) unsigned NOT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `wystawiona_na` (`customer_id`),
  KEY `liczona wg` (`pricetable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_general_ci DEFAULT NULL,
  `nip` varchar(32) COLLATE utf8_general_ci DEFAULT NULL,
  `regon` varchar(32) COLLATE utf8_general_ci DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_general_ci DEFAULT NULL,
  `www` varchar(32) NOT NULL,
  `comments` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

INSERT INTO `customers` VALUES (0,'BSDterminal','951-136-27-36','123456','BSD');

DROP TABLE IF EXISTS `warehousebarcodes`;
CREATE TABLE IF NOT EXISTS `warehousebarcodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `position_number` int(11) DEFAULT NULL,
  `warehouse_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_km_przypisany_do_m` (`warehouse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `boxbarcodes`;
CREATE TABLE IF NOT EXISTS `boxbarcodes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `box_number` int(11) DEFAULT NULL,
  `box_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;


DROP TABLE IF EXISTS `documentlists`;
CREATE TABLE IF NOT EXISTS `documentlists` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `bulkpackaging_id` int(11) unsigned NOT NULL,
  `virtualbriefcase_id` int(11) unsigned NOT NULL,
  `box_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ld_przypisana_do_wt` (`virtualbriefcase_id`),
  KEY `FK_ld_przypisana_do_oz` (`bulkpackaging_id`),
  KEY `FK_ld_przypisana_do_p` (`box_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `warehouses`;
CREATE TABLE IF NOT EXISTS `warehouses` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_zarzadza` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `bulkpackagings`;
CREATE TABLE IF NOT EXISTS `bulkpackagings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `box_id` int(11) unsigned NOT NULL,
  `virtualbriefcase_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_oz_przypisane_do` (`box_id`),
  KEY `FK_oz_przypisana_do_wt` (`virtualbriefcase_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `boxes`;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `roles` (`id`, `name`, `description`) VALUES
(1, 'login', 'Login privileges, granted after account concustomertion.'),
(2, 'admin', 'Administrative user, has access to everything.'),
(3, 'manager', 'Manager privileges - finance briefing, granted after account concustomertion. '),
(4, 'operator', 'Operator user, has access to manage orders.');

DROP TABLE IF EXISTS `roles_users`;
CREATE TABLE IF NOT EXISTS `roles_users` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `fk_role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO `roles_users` (`user_id`, `role_id`) VALUES
(1, 1),
(1, 2);

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
  `status` varchar(32) NOT NULL,
  `customer_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_username` (`username`),
  UNIQUE KEY `uniq_email` (`email`),
  KEY `fk_customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1;

INSERT INTO `users` (`id`, `email`, `username`, `password`, `logins`, `last_login`) VALUES
(1, 'maciekk@bsdterminal.pl', 'admin', 'b18c10839e5f8bbc7b780e135c980bcf3e0086ea411fca2e65027a8a9f2f1efa', 13, 1405889414);

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


DROP TABLE IF EXISTS `virtualbriefcases`;
CREATE TABLE IF NOT EXISTS `virtualbriefcases` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8_general_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_general_ci DEFAULT NULL,
  `division_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_wt_przypisana_do` (`division_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `status` enum('Nowe','Przyjęte do realizacji','Oczekuje na wysłanie','W doręczeniu','Dostarczone','W trakcie realizacji','W trakcie odbioru','W dostrczeniu na magazyn','Na stanie magazynu','Odebrane','Zrealizowane') COLLATE utf8_general_ci DEFAULT NULL,
  `type` enum('Zamówienie pudeł i kodów kreskowych','Zamówienie odbioru i magazynowania pudeł','Zamówienie zniszczenie magazynowanych pozycji','Zamówienie skanowania, kopii dokumentów','Zamówienie kopii notarialnej dokumentów') COLLATE utf8_general_ci DEFAULT NULL,
  `address_id` int(11) unsigned NOT NULL,
  `invoice_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_z_zlozone` (`user_id`),
  KEY `FK_z_adres` (`address_id`),
  KEY `FK_f_przypisana_do_z` (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci AUTO_INCREMENT=1 ;

ALTER TABLE `addresses`
  ADD CONSTRAINT `definiuje` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

ALTER TABLE `pricetables`
  ADD CONSTRAINT `ma_przypisany` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

ALTER TABLE `documents`
  ADD CONSTRAINT `FK_d_przypisany_do_p` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`),
  ADD CONSTRAINT `FK_d_przypisany_do_ld` FOREIGN KEY (`documentlist_id`) REFERENCES `documentlists` (`id`),
  ADD CONSTRAINT `FK_d_przypisany_do_oz` FOREIGN KEY (`bulkpackaging_id`) REFERENCES `bulkpackagings` (`id`),
  ADD CONSTRAINT `FK_d_przypisany_do_wt` FOREIGN KEY (`virtualbriefcase_id`) REFERENCES `virtualbriefcases` (`id`);

ALTER TABLE `divisions`
  ADD CONSTRAINT `FK_nalezy_do` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

ALTER TABLE `invoices`
  ADD CONSTRAINT `liczona_wg` FOREIGN KEY (`pricetable_id`) REFERENCES `pricetables` (`id`),
  ADD CONSTRAINT `liczona_wg` FOREIGN KEY (`pricetable_id`) REFERENCES `customers` (`id`);

ALTER TABLE `boxbarcodes`
  ADD CONSTRAINT `FK_kp_przypisany_do_p` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`);  

ALTER TABLE `warehousebarcodes`
  ADD CONSTRAINT `FK_km_przypisany_do_m` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`);

ALTER TABLE `documentlists`
  ADD CONSTRAINT `FK_ld_przypisana_do_p` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`),
  ADD CONSTRAINT `FK_ld_przypisana_do_oz` FOREIGN KEY (`bulkpackaging_id`) REFERENCES `bulkpackagings` (`id`),
  ADD CONSTRAINT `FK_ld_przypisana_do_wt` FOREIGN KEY (`virtualbriefcase_id`) REFERENCES `virtualbriefcases` (`id`);

ALTER TABLE `warehouses`
  ADD CONSTRAINT `FK_zarzadza` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

ALTER TABLE `bulkpackagings`
  ADD CONSTRAINT `FK_oz_przypisana_do_wt` FOREIGN KEY (`virtualbriefcase_id`) REFERENCES `virtualbriefcases` (`id`),
  ADD CONSTRAINT `FK_oz_przypisane_do` FOREIGN KEY (`box_id`) REFERENCES `boxes` (`id`);

ALTER TABLE `boxes`
  ADD CONSTRAINT `FK_km_przypisany_do_p` FOREIGN KEY (`warehousebarcode_id`) REFERENCES `warehousebarcodes` (`id`),
  ADD CONSTRAINT `FK_kp_przypisany_do_p_1` FOREIGN KEY (`boxbarcode_id`) REFERENCES `boxbarcodes` (`id`),
  ADD CONSTRAINT `FK_m_ma_na_stanie` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`id`),
  ADD CONSTRAINT `FK_p_przypisana_do_wt` FOREIGN KEY (`virtualbriefcase_id`) REFERENCES `virtualbriefcases` (`id`);

ALTER TABLE `divisions_users`
  ADD CONSTRAINT `divisions_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `divisions_users_ibfk_2` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

  ALTER TABLE `roles_users`
  ADD CONSTRAINT `roles_users_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `roles_users_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
  
ALTER TABLE `user_tokens`
  ADD CONSTRAINT `user_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

ALTER TABLE `users`
  ADD CONSTRAINT `FK_rejestruje_pracuje_w` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

ALTER TABLE `virtualbriefcases`
  ADD CONSTRAINT `FK_wt_przypisana_do` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`);

ALTER TABLE `orders`
ADD CONSTRAINT `FK_z_adres` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `FK_f_przypisana_do_z` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`),
  ADD CONSTRAINT `FK_z_zlozone` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

SET foreign_key_checks = 1;