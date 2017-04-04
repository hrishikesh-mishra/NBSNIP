CREATE TABLE `cf_jobs` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `cid` INTEGER UNSIGNED NOT NULL DEFAULT 2,
  `title` VARCHAR(100) NOT NULL DEFAULT '',
  `reference` VARCHAR(150) NOT NULL DEFAULT '',
  `jobtype` VARCHAR(50) NOT NULL DEFAULT '',
  `qualification` VARCHAR(200) NOT NULL DEFAULT '',
  `duration` VARCHAR(50) NOT NULL DEFAULT '',
  `howtoapply` VARCHAR(250) NOT NULL DEFAULT '',
  `joblocation` VARCHAR(100) NOT NULL DEFAULT '',
  `jobcity` VARCHAR(25) NOT NULL DEFAULT '',
  `jobstate` VARCHAR(25) NOT NULL DEFAULT '',
  `noofopenings` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `compensationrange` VARCHAR(100) NOT NULL DEFAULT '',
  `comname` VARCHAR(100) NOT NULL DEFAULT '',
  `comlocation` VARCHAR(100) NOT NULL DEFAULT '',
  `comcity` VARCHAR(25) NOT NULL DEFAULT '',
  `comstate` VARCHAR(25) NOT NULL DEFAULT '',
  `comemailid` VARCHAR(200) NOT NULL DEFAULT '',
  `comwebsite` VARCHAR(100) NOT NULL DEFAULT '',
  `contactname` VARCHAR(50) NOT NULL DEFAULT '',
  `contactphone` VARCHAR(50) NOT NULL DEFAULT '',
  `contactmobile` VARCHAR(50) NOT NULL DEFAULT '',
  `contactemailid` VARCHAR(200) NOT NULL DEFAULT '',
  `memberid` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `regstartdate` DATE NOT NULL DEFAULT '0000-00-00',
  `regenddate` DATE NOT NULL DEFAULT '0000-00-00',
  `description` TEXT NOT NULL,
  `checked_out` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` TEXT NOT NULL,
  `hits` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `published` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  CONSTRAINT `FK_cf_jobs` FOREIGN KEY `FK_cf_jobs` (`cid`)
    REFERENCES `classifieds` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
CONSTRAINT `FK_cf_job_ven` FOREIGN KEY `FK_cf_job_ven` (`vid`)
    REFERENCES `cf_vendor` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE  
);
