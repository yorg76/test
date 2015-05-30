DROP TABLE IF EXISTS `attachment`;
CREATE TABLE IF NOT EXISTS `attachment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` text,
  `type` enum('image/gif','image/jpeg','image/pjpeg','image/png','image/bmp','image/svg+xml','image/tiff','image/vnd.djvu','application/pdf') NOT NULL,
  `file` varchar(255) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type` (`type`,`upload_date`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


ALTER TABLE `attachment` ADD INDEX (  `user_id` );

ALTER TABLE  `attachment` ADD FOREIGN KEY (  `user_id` ) REFERENCES  `archidox`.`users` (
`id`
);


ALTER TABLE  `documentlists` ADD  `attachment_id` INT( 11 ) UNSIGNED NULL AFTER  `box_id` , ADD INDEX (  `attachment_id` );

ALTER TABLE  `documentlists` ADD FOREIGN KEY (  `attachment_id` ) REFERENCES  `archidox`.`attachment` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;

ALTER TABLE  `documents` ADD  `attachment_id` INT( 11 ) UNSIGNED NULL AFTER  `box_id` , ADD INDEX (  `attachment_id` );

ALTER TABLE  `documents` ADD FOREIGN KEY (  `attachment_id` ) REFERENCES  `archidox`.`attachment` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;

ALTER TABLE  `virtualbriefcases` ADD  `attachment_id` INT( 11 ) UNSIGNED NULL AFTER  `division_id` , ADD INDEX (  `attachment_id` );

ALTER TABLE  `virtualbriefcases` ADD FOREIGN KEY (  `attachment_id` ) REFERENCES  `archidox`.`attachment` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;

ALTER TABLE  `bulkpackagings` ADD  `attachment_id` INT( 11 ) UNSIGNED NULL AFTER  `box_id` , ADD INDEX (  `attachment_id` );

ALTER TABLE  `bulkpackagings` ADD FOREIGN KEY (  `attachment_id` ) REFERENCES  `archidox`.`attachment` (
`id`
) ON DELETE CASCADE ON UPDATE CASCADE ;


RENAME TABLE  `archidox`.`attachment` TO  `archidox`.`attachments` ;
