CREATE TABLE `cf_realstate` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `cid` INTEGER UNSIGNED NOT NULL DEFAULT 1,
  `vid` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `title` VARCHAR(50) NOT NULL DEFAULT '',
  `company` VARCHAR(100) NOT NULL DEFAULT '',
  `phone` VARCHAR(50) NOT NULL DEFAULT '',
  `mobile` VARCHAR(50) NOT NULL DEFAULT '',
  `location` VARCHAR(100) NOT NULL DEFAULT '',
  `city` VARCHAR(25) NOT NULL DEFAULT '',
  `state` VARCHAR(20) NOT NULL DEFAULT '',
  `emailid` VARCHAR(200) NOT NULL DEFAULT '',
  `website` VARCHAR(100) NOT NULL DEFAULT '',
  `description` TEXT NOT NULL,
  `regstartdate` DATETIME NOT NULL DEFAULT '0000-00-00',
  `regenddate` DATETIME NOT NULL DEFAULT '0000-00-00',
  `checked_out` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` TEXT NOT NULL,
  `hits` INTEGER UNSIGNED NOT NULL DEFAULT 0,	  
  `published` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
   CONSTRAINT `FK_cf_real` FOREIGN KEY `FK_cf_real` (`cid`)
    REFERENCES `classifieds` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
CONSTRAINT `FK_cf_real_ven` FOREIGN KEY `FK_cf_real_ven` (`vid`)
    REFERENCES `cf_vendor` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE  
);