CREATE TABLE `joomla15`.`jos_sn_user` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` VARCHAR(50) NOT NULL DEFAULT '',
  `password` VARCHAR(200) NOT NULL DEFAULT '',
  `activation` VARCHAR(200) NOT NULL DEFAULT '',
  `registrationdate` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitdate` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `emailid` VARCHAR(200) NOT NULL DEFAULT '',
  `addedbyip` VARCHAR(30) NOT NULL DEFAULT '',
  `lastvisitip` VARCHAR(30) NOT NULL DEFAULT '',
  `params` TEXT NOT NULL,
  `published` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;
