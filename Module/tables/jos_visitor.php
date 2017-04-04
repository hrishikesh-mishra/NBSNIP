CREATE TABLE `joomla15`.`jos_visitor` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `ipaddress` VARCHAR(20) NOT NULL DEFAULT '',
  `accesspages` TEXT NOT NULL,
  `accesstime` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;