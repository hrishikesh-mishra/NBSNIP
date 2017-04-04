CREATE TABLE IF NOT EXISTS `#__guestbook`
          (`id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
          `message` text NOT NULL, `created_by` INTEGER UNSIGNED NOT NULL,
          `location` VARCHAR(45), `created` TIMESTAMP NOT NULL, 
          `userip` VARCHAR(16), PRIMARY KEY(`id`))
