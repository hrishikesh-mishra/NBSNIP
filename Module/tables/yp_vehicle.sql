CREATE TABLE `joomla15`.`jos_yp_vehicle` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `yid` INTEGER UNSIGNED NOT NULL,
  `orgname` VARCHAR(50) NOT NULL DEFAULT '',
   `category` VARCHAR(50) NOT NULL DEFAULT '',
  `owner` VARCHAR(50) NOT NULL DEFAULT '',
  `branch` VARCHAR(150) NOT NULL DEFAULT '',
  `products` VARCHAR(200) NOT NULL DEFAULT '',
  `facility` VARCHAR(250) NOT NULL DEFAULT '',
  `shopkeeperword` VARCHAR(200) NOT NULL DEFAULT '',
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
  CONSTRAINT `FK_jos_yp_vehicle_1` FOREIGN KEY `FK_jos_yp_vehicle_1` (`yid`)
    REFERENCES `jos_yellowpage` (`yid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;
