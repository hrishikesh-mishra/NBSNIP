CREATE TABLE `joomla15`.`jos_sn_user` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` VARCHAR(50) NOT NULL DEFAULT '',
  `firstname` VARCHAR(50) NOT NULL DEFAULT '',
  `lastname` VARCHAR(50) NOT NULL DEFAULT '',
  `sex` VARCHAR(10) NOT NULL DEFAULT '',
  `dob` DATE NOT NULL DEFAULT '0000-00-00',
  `highschool` VARCHAR(50) NOT NULL DEFAULT '',
  `college` VARCHAR(50) NOT NULL DEFAULT '',
  `university` VARCHAR(50) NOT NULL DEFAULT '',
  `specificdegree` VARCHAR(100) NOT NULL DEFAULT '',
  `jobtitle` VARCHAR(100) NOT NULL DEFAULT '',
  `profession` VARCHAR(100) NOT NULL DEFAULT '',
  `company` VARCHAR(100) NOT NULL DEFAULT '',
  `location` VARCHAR(100) NOT NULL DEFAULT '',
  `city` VARCHAR(25) NOT NULL DEFAULT '',
  `state` VARCHAR(25) NOT NULL DEFAULT '',
  `postalcode` VARCHAR(8) NOT NULL DEFAULT '',
  `phone` VARCHAR(25) NOT NULL DEFAULT '',
  `mobile` VARCHAR(25) NOT NULL DEFAULT '',
  `careerskill` VARCHAR(200) NOT NULL DEFAULT '',
  `careerinterest` VARCHAR(200) NOT NULL DEFAULT '',
  `aboutyourself` TEXT NOT NULL,
  `image` VARCHAR(100) NOT NULL DEFAULT '',
  `params` TEXT NOT NULL,
  `published` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;
