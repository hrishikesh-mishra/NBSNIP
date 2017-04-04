CREATE TABLE `joomla15`.`jos_classifieds` (
  `cid` INTEGER UNSIGNED  NOT NULL,
  `type` VARCHAR(50)  NOT NULL DEFAULT '',
  `description` TEXT NOT NULL,
  `image` TEXT NOT NULL,
  `checked_out` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `check_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` TEXT NOT NULL,
  `ordering` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `published` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`cid`)
)
ENGINE = InnoDB