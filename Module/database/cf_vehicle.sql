CREATE TABLE `cf_vehicle` (
  `id` INTEGER UNSIGNED   NOT NULL AUTO_INCREMENT,
  `cid` INTEGER UNSIGNED   NOT NULL,
  `vid` INTEGER UNSIGNED   NOT NULL,
  `title` VARCHAR(100) NOT NULL DEFAULT '',
  `category` VARCHAR(50) NOT NULL DEFAULT '',
  `companyname` VARCHAR(50) NOT NULL DEFAULT '',
  `phone` VARCHAR(50) NOT NULL DEFAULT '',
  `mobile` VARCHAR(50) NOT NULL DEFAULT '',
  `fax` VARCHAR(50) NOT NULL DEFAULT '',
  `location` VARCHAR(50) NOT NULL DEFAULT '',
  `city` VARCHAR(50) NOT NULL DEFAULT '',
  `state` VARCHAR(50) NOT NULL DEFAULT '',
  `emailid` VARCHAR(200) NOT NULL DEFAULT '',
  `website` VARCHAR(100) NOT NULL DEFAULT '',
  `description` TEXT NOT NULL,
  `regstartdate` DATE NOT NULL DEFAULT '0000-00-00',
  `regenddate` DATE NOT NULL DEFAULT '0000-00-00',
  `checked_out` INTEGER NOT NULL DEFAULT 0,
  `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` TEXT NOT NULL,
  `hits` INTEGER UNSIGNED   NOT NULL, 
  `published` INTEGER UNSIGNED   NOT NULL,
  PRIMARY KEY (`id`),
 CONSTRAINT `FK_cf_real` FOREIGN KEY `FK_cf_real` (`cid`)
    REFERENCES `classifieds` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
CONSTRAINT `FK_cf_real_ven` FOREIGN KEY `FK_cf_real_ven` (`vid`)
    REFERENCES `cf_vendor` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE  
)