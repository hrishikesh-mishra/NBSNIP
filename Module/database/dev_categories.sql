CREATE TABLE `dev_categories` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `category` VARCHAR(100) NOT NULL DEFAULT '',
  `about` TEXT NOT NULL,
  `image` VARCHAR(100) NOT NULL DEFAULT '',
  `params` TEXT NOT NULL,
  `checked_out` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `checked_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
   `published` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
);
