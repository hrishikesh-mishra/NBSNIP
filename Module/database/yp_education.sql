CREATE TABLE `yp_education` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `yid` INTEGER UNSIGNED NOT NULL,
  `eduname` VARCHAR(100) NOT NULL,
  `category` VARCHAR(25) NOT NULL,
  `standard` VARCHAR(250) NOT NULL,
  `principal` VARCHAR(200) NOT NULL,
  `totalstrength` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `phone` VARCHAR(50) NOT NULL,
  `mobile` VARCHAR(50) NOT NULL,
  `location` VARCHAR(100) NOT NULL,
  `city` VARCHAR(25) NOT NULL,
  `state` VARCHAR(25) NOT NULL,
  `website` VARCHAR(100) NOT NULL,
  `emailid` VARCHAR(200) NOT NULL,
  `description` TEXT NOT NULL,
  `check_out` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `check_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` TEXT NOT NULL,
  `hits` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `published` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_yp_edu` FOREIGN KEY `FK_yp_edu` (`yid`)
    REFERENCES `yellowpage` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
);