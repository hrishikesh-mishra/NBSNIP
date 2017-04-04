CREATE TABLE `joomla15`.`jos_sn_group_discussion` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `gid` INTEGER UNSIGNED NOT NULL,
  `userid` VARCHAR(100) NOT NULL DEFAULT '',
  `discussion` TEXT NOT NULL,
  `adate` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ipaddress` VARCHAR(30) NOT NULL DEFAULT '',
  `params` TEXT NOT NULL,
  `published` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;