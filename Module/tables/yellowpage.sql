CREATE TABLE `joomla15`.`jos_yellowpage` (
  `yid` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` TEXT NOT NULL,
  `description` TEXT NOT NULL, 	
  `check_out` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `check_out_time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `params` TEXT NOT NULL,
  `ordering` INTEGER UNSIGNED NOT NULL DEFAULT 0,
  `published` TINYINT(1) UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`yid`)
)
ENGINE = MyISAM
CHARACTER SET utf8 COLLATE utf8_general_ci;
insert into jos_yellowpage (yid,type,description) values(1,'Education','This yellowpage provide the information various information regarding about the education, institution, university, college, schools etc.');
insert into jos_yellowpage (yid,type,description) values(2,'Medical','This yellowpage provides the information regarding the medical stores, hospitals, nursing homes etc.');
insert into jos_yellowpage (yid,type,description) values(3,'Hotel-Lodge', 'This yellowpage provides the information about the Hotels, Lodges etc');
insert into jos_yellowpage (yid,type,description) values(4,'Club','This yellowpage provide the information regarding the clubs and their activity like sporting, pooja ect.');
insert into jos_yellowpage (yid,type,description) values(5,'Doctors','This yellowpage provides the information about the doctors and theirs specialist work, their working locations etc.');
insert into jos_yellowpage (yid,type,description) values(6,'Vehicle','This yellowpage provide the information regarding the vehicle shops.');