DROP TABLE IF EXISTS `#__yellowpage`;
CREATE TABLE `#__yellowpage` (
  `yid` int(10) unsigned NOT NULL auto_increment,
  `type` text NOT NULL,
  `description` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `ordering` int(10) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`yid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__yp_club`;
CREATE TABLE `#__yp_club` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `yid` int(10) unsigned NOT NULL,
  `clubname` varchar(50) NOT NULL default '',
  `secretaryname` varchar(50) NOT NULL,
  `history` varchar(200) NOT NULL default '',
  `sportactivity` varchar(200) NOT NULL default '',
  `secretaryword` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL default '',
  `mobile` varchar(50) NOT NULL default '',
  `location` varchar(100) NOT NULL default '',
  `city` varchar(25) NOT NULL default '',
  `state` varchar(25) NOT NULL default '',
  `emailid` varchar(200) NOT NULL default '',
  `website` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `odering` int(10) unsigned NOT NULL default '0',
  `hits` int(10) unsigned NOT NULL default '0',
  `published` tinyint(3) unsigned NOT NULL default '0',
  `addedby` varchar(45) NOT NULL default 'server',
  PRIMARY KEY  (`id`),
  KEY `FK_jos_club_1` (`yid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__yp_doctors`;
CREATE TABLE `#__yp_doctors` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `yid` int(10) unsigned NOT NULL,
  `docname` varchar(50) NOT NULL default '',
  `specialist` varchar(150) NOT NULL default '',
  `areaofoperations` varchar(250) NOT NULL default '',
  `parmanentclinic` varchar(150) NOT NULL default '',
  `phone` varchar(50) NOT NULL default '',
  `mobile` varchar(50) NOT NULL default '',
  `location` varchar(100) NOT NULL default '',
  `city` varchar(25) NOT NULL default '',
  `state` varchar(25) NOT NULL default '',
  `emailid` varchar(200) NOT NULL default '',
  `website` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `ordering` int(10) unsigned NOT NULL default '0',
  `hits` int(10) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `addedby` varchar(45) NOT NULL default 'server',
  PRIMARY KEY  (`id`),
  KEY `FK_jos_yp_doctors_1` (`yid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__yp_education`;
CREATE TABLE `#__yp_education` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `yid` int(10) unsigned NOT NULL,
  `eduname` varchar(100) character set utf8 collate utf8_bin NOT NULL,
  `category` varchar(25) NOT NULL,
  `standard` varchar(250) NOT NULL,
  `principal` varchar(200) NOT NULL,
  `totalstrength` int(10) unsigned NOT NULL default '0',
  `phone` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) NOT NULL,
  `website` varchar(100) NOT NULL,
  `emailid` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `hits` int(10) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `addedby` varchar(45) NOT NULL default 'server',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ;

DROP TABLE IF EXISTS `#__yp_hotel_lodge`;
CREATE TABLE `#__yp_hotel_lodge` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `yid` int(10) unsigned NOT NULL,
  `hotelname` varchar(50) NOT NULL default '',
  `category` varchar(25) NOT NULL default '',
  `speciality` varchar(150) NOT NULL default '',
  `phone` varchar(50) NOT NULL default '',
  `mobile` varchar(50) NOT NULL default '',
  `location` varchar(100) NOT NULL default '',
  `city` varchar(25) NOT NULL default '',
  `state` varchar(25) NOT NULL default '',
  `emailid` varchar(200) NOT NULL default '',
  `website` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `ordering` int(10) unsigned NOT NULL default '0',
  `hits` int(10) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `addedby` varchar(45) NOT NULL default 'server',
  PRIMARY KEY  (`id`),
  KEY `FK_jos_yp_hotel_lodge_1` (`yid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ;

DROP TABLE IF EXISTS `#__yp_medical`;
CREATE TABLE `#__yp_medical` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `yid` int(10) unsigned NOT NULL,
  `medname` varchar(100) NOT NULL default '',
  `category` varchar(25) NOT NULL default '',
  `speciality` varchar(150) NOT NULL default '',
  `doctors` varchar(200) NOT NULL default '',
  `workingtime` varchar(20) NOT NULL default '',
  `holiday` varchar(20) NOT NULL default '',
  `phone` varchar(50) NOT NULL default '',
  `mobile` varchar(50) NOT NULL default '',
  `location` varchar(100) NOT NULL default '',
  `city` varchar(25) NOT NULL default '',
  `state` varchar(25) NOT NULL default '',
  `emailid` varchar(200) NOT NULL default '',
  `website` varchar(100) NOT NULL default '',
  `description` text,
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `ordering` int(10) unsigned NOT NULL default '0',
  `hits` int(10) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `addedby` varchar(45) NOT NULL default 'server',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `#__yp_vehicle`;
CREATE TABLE `#__yp_vehicle` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `yid` int(10) unsigned NOT NULL,
  `orgname` varchar(50) NOT NULL default '',
  `category` varchar(50) NOT NULL default '',
  `owner` varchar(50) NOT NULL default '',
  `branch` varchar(150) NOT NULL default '',
  `products` varchar(200) NOT NULL default '',
  `facility` varchar(250) NOT NULL default '',
  `shopkeeperword` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL default '',
  `mobile` varchar(50) NOT NULL default '',
  `location` varchar(100) NOT NULL default '',
  `city` varchar(25) NOT NULL default '',
  `state` varchar(25) NOT NULL default '',
  `emailid` varchar(200) NOT NULL default '',
  `website` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `ordering` int(10) unsigned NOT NULL default '0',
  `hits` int(10) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `addedby` varchar(45) NOT NULL default 'server',
  PRIMARY KEY  (`id`),
  KEY `FK_jos_yp_vehicle_1` (`yid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;