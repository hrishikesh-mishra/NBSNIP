CREATE TABLE `joomla15`.`jos_blog_comment` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `blogid` INTEGER UNSIGNED NOT NULL,
  `cname` VARCHAR(50) NOT NULL DEFAULT '',
  `comment` TEXT NOT NULL,
  `cdate` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `addedbyip` VARCHAR(30) NOT NULL DEFAULT '',
  `params` TEXT NOT NULL,
  `published` TINYINT(1) UNSIGNED NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
)
ENGINE = InnoDB
CHARACTER SET utf8 COLLATE utf8_general_ci;