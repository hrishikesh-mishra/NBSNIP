CREATE TABLE `joomla15`.`jos_yp_doctors` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `yid` INTEGER UNSIGNED NOT NULL,
  `docname` VARCHAR(50) NOT NULL DEFAULT '',
  `specialist` VARCHAR(150) NOT NULL DEFAULT '',
  `areaofoperations` VARCHAR(250) NOT NULL DEFAULT '',
  `parmanentclinic` VARCHAR(150) NOT NULL DEFAULT '',
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
  CONSTRAINT `FK_jos_yp_doctors_1` FOREIGN KEY `FK_jos_yp_doctors_1` (`yid`)
    REFERENCES `jos_yellowpage` (`yid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE
)
ENGINE = InnoDB;
