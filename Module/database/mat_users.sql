CREATE TABLE `mat_users` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `userid` VARCHAR(50) NOT NULL DEFAULT '',
  `username` VARCHAR(100) NOT NULL DEFAULT '',
  `password` VARCHAR(100) NOT NULL DEFAULT '',
  `block` TINYINT(4) UNSIGNED NOT NULL DEFAULT 1,
  `registrationdate` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastvisitdate` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activation` VARCHAR(100) NOT NULL DEFAULT '',
  `emailid` VARCHAR(200) NOT NULL DEFAULT '',
  `addedat` VARCHAR(50) NOT NULL DEFAULT 'server',
  `params` TEXT NOT NULL,
  PRIMARY KEY (`id`)
)
