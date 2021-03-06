CREATE TABLE `yp_medical` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `yid` INTEGER UNSIGNED NOT NULL,
  `medname` VARCHAR(100) NOT NULL DEFAULT '',
  `category` VARCHAR(25) NOT NULL DEFAULT '',
  `speciality` VARCHAR(150) NOT NULL DEFAULT '',
  `doctors` VARCHAR(200) NOT NULL DEFAULT '',
  `workingtime` VARCHAR(20) NOT NULL DEFAULT '',
  `holiday` VARCHAR(20) NOT NULL DEFAULT '',
  `phone` VARCHAR(50) NOT NULL DEFAULT '',
  `mobile` VARCHAR(50) NOT NULL DEFAULT '',
  `location` VARCHAR(100) NOT NULL DEFAULT '',
  `city` VARCHAR(25) NOT NULL DEFAULT '',
  `state` VARCHAR(25) NOT NULL DEFAULT '',
  `emailid` VARCHAR(200) NOT NULL DEFAULT '',
  `website` VARCHAR(100) NOT NULL DEFAULT '',
  `description` TEXT NOT NULL,
  `checked_out` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` TEXT NOT NULL,
  `ordering` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `hits` INTEGER UNSIGNED NOT NULL DEFAULT 0,  
  `published` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_yp_medical` FOREIGN KEY `FK_yp_medical` (`yid`)
    REFERENCES `yellowpage` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);
