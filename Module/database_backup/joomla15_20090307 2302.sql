-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.67-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema joomla15
--

CREATE DATABASE IF NOT EXISTS joomla15;
USE joomla15;

--
-- Definition of table `geodesic_classifieds`
--

DROP TABLE IF EXISTS `geodesic_classifieds`;
CREATE TABLE `geodesic_classifieds` (
  `id` int(14) NOT NULL auto_increment,
  `seller` varchar(13) default NULL,
  `title` tinytext,
  `date` int(14) default NULL,
  `description` text,
  `image_url` tinytext,
  `category` int(11) default NULL,
  `duration` char(2) default NULL,
  `location_state` tinytext,
  `location_zip` varchar(10) default NULL,
  `ends` int(14) default NULL,
  `search_text` mediumblob NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `geodesic_classifieds`
--

/*!40000 ALTER TABLE `geodesic_classifieds` DISABLE KEYS */;
/*!40000 ALTER TABLE `geodesic_classifieds` ENABLE KEYS */;


--
-- Definition of table `geodesic_classifieds_categories`
--

DROP TABLE IF EXISTS `geodesic_classifieds_categories`;
CREATE TABLE `geodesic_classifieds_categories` (
  `category_id` int(4) NOT NULL auto_increment,
  `parent_id` int(4) default NULL,
  `category_name` tinytext,
  `description` tinyblob,
  `display_order` tinyint(4) default NULL,
  PRIMARY KEY  (`category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `geodesic_classifieds_categories`
--

/*!40000 ALTER TABLE `geodesic_classifieds_categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `geodesic_classifieds_categories` ENABLE KEYS */;


--
-- Definition of table `geodesic_classifieds_logins`
--

DROP TABLE IF EXISTS `geodesic_classifieds_logins`;
CREATE TABLE `geodesic_classifieds_logins` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `geodesic_classifieds_logins`
--

/*!40000 ALTER TABLE `geodesic_classifieds_logins` DISABLE KEYS */;
INSERT INTO `geodesic_classifieds_logins` (`id`,`username`,`password`) VALUES 
 (1,'admin','geodesic');
/*!40000 ALTER TABLE `geodesic_classifieds_logins` ENABLE KEYS */;


--
-- Definition of table `geodesic_classifieds_states`
--

DROP TABLE IF EXISTS `geodesic_classifieds_states`;
CREATE TABLE `geodesic_classifieds_states` (
  `abbreviation` varchar(5) NOT NULL,
  `name` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `geodesic_classifieds_states`
--

/*!40000 ALTER TABLE `geodesic_classifieds_states` DISABLE KEYS */;
INSERT INTO `geodesic_classifieds_states` (`abbreviation`,`name`) VALUES 
 ('AL','Alabama'),
 ('AK','Alaska'),
 ('AZ','Arizona'),
 ('AR','Arkansas'),
 ('CA','California'),
 ('CO','Colorado'),
 ('CT','Connecticut'),
 ('DE','Delaware'),
 ('DC','District of Columbia'),
 ('FL','Florida'),
 ('GA','Georgia'),
 ('HI','Hawaii'),
 ('ID','Idaho'),
 ('IL','Illinois'),
 ('IN','Indiana'),
 ('IA','Iowa'),
 ('KS','Kansas'),
 ('KY','Kentucky'),
 ('LA','Louisiana'),
 ('ME','Maine'),
 ('MD','Maryland'),
 ('MA','Massachusetts'),
 ('MI','Michigan'),
 ('MN','Minnesota'),
 ('MS','Mississippi'),
 ('MO','Missouri'),
 ('MT','Montana'),
 ('NE','Nebraska'),
 ('NV','Nevada'),
 ('NH','New Hampshire'),
 ('NJ','New Jersey'),
 ('NM','New Mexico'),
 ('NY','New York'),
 ('NC','North Carolina'),
 ('ND','North Dakota'),
 ('OH','Ohio'),
 ('OK','Oklahoma'),
 ('OR','Oregon'),
 ('PA','Pennsylvania'),
 ('RI','Rhode Island'),
 ('SC','South Carolina'),
 ('SD','South Dakota'),
 ('TN','Tenessee'),
 ('TX','Texas'),
 ('UT','Utah'),
 ('VT','Vermont'),
 ('VA','Virginia'),
 ('WA','Washington'),
 ('WV','West Virginia'),
 ('WI','Wisconsin'),
 ('WY','Wyoming');
/*!40000 ALTER TABLE `geodesic_classifieds_states` ENABLE KEYS */;


--
-- Definition of table `geodesic_classifieds_userdata`
--

DROP TABLE IF EXISTS `geodesic_classifieds_userdata`;
CREATE TABLE `geodesic_classifieds_userdata` (
  `id` int(11) NOT NULL default '0',
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `newsletter` smallint(1) NOT NULL default '1',
  `level` int(1) NOT NULL default '0',
  `company_name` varchar(50) NOT NULL,
  `business_type` varchar(30) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `address_2` varchar(50) default NULL,
  `zip` varchar(12) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `phone2` varchar(50) NOT NULL,
  `fax` varchar(50) default NULL,
  `url` tinyblob,
  `rate_sum` int(11) NOT NULL default '0',
  `rate_num` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `geodesic_classifieds_userdata`
--

/*!40000 ALTER TABLE `geodesic_classifieds_userdata` DISABLE KEYS */;
INSERT INTO `geodesic_classifieds_userdata` (`id`,`username`,`email`,`newsletter`,`level`,`company_name`,`business_type`,`firstname`,`lastname`,`address`,`address_2`,`zip`,`city`,`state`,`country`,`phone`,`phone2`,`fax`,`url`,`rate_sum`,`rate_num`) VALUES 
 (1,'admininstration','',0,1,'','','admin','admin','','','','','','','','','','',0,0);
/*!40000 ALTER TABLE `geodesic_classifieds_userdata` ENABLE KEYS */;


--
-- Definition of table `geodesic_confirm`
--

DROP TABLE IF EXISTS `geodesic_confirm`;
CREATE TABLE `geodesic_confirm` (
  `id` varchar(30) NOT NULL,
  `mdhash` varchar(100) default NULL,
  `username` varchar(25) default NULL,
  `password` varchar(25) default NULL,
  `email` varchar(50) default NULL,
  `date` int(14) NOT NULL default '0',
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `address_2` varchar(50) default NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip` varchar(15) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `phone_2` varchar(25) default NULL,
  `fax` varchar(25) default NULL,
  `company_name` varchar(50) NOT NULL,
  `business_type` varchar(30) NOT NULL,
  `url` varchar(75) default NULL,
  `newsletter` varchar(10) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `geodesic_confirm`
--

/*!40000 ALTER TABLE `geodesic_confirm` DISABLE KEYS */;
/*!40000 ALTER TABLE `geodesic_confirm` ENABLE KEYS */;


--
-- Definition of table `geodesic_confirm_email`
--

DROP TABLE IF EXISTS `geodesic_confirm_email`;
CREATE TABLE `geodesic_confirm_email` (
  `id` int(8) NOT NULL default '0',
  `email` varchar(50) default NULL,
  `mdhash` varchar(100) default NULL,
  `date` int(14) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `geodesic_confirm_email`
--

/*!40000 ALTER TABLE `geodesic_confirm_email` DISABLE KEYS */;
/*!40000 ALTER TABLE `geodesic_confirm_email` ENABLE KEYS */;


--
-- Definition of table `jos_banner`
--

DROP TABLE IF EXISTS `jos_banner`;
CREATE TABLE `jos_banner` (
  `bid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `type` varchar(30) NOT NULL default 'banner',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `imptotal` int(11) NOT NULL default '0',
  `impmade` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `imageurl` varchar(100) NOT NULL default '',
  `clickurl` varchar(200) NOT NULL default '',
  `date` datetime default NULL,
  `showBanner` tinyint(1) NOT NULL default '0',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `custombannercode` text,
  `catid` int(10) unsigned NOT NULL default '0',
  `description` text NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `tags` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`bid`),
  KEY `viewbanner` (`showBanner`),
  KEY `idx_banner_catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_banner`
--

/*!40000 ALTER TABLE `jos_banner` DISABLE KEYS */;
INSERT INTO `jos_banner` (`bid`,`cid`,`type`,`name`,`alias`,`imptotal`,`impmade`,`clicks`,`imageurl`,`clickurl`,`date`,`showBanner`,`checked_out`,`checked_out_time`,`editor`,`custombannercode`,`catid`,`description`,`sticky`,`ordering`,`publish_up`,`publish_down`,`tags`,`params`) VALUES 
 (1,1,'','OSM 1','osm-1',0,43,0,'','http://www.opensourcematters.org','2009-02-08 21:05:36',1,0,'0000-00-00 00:00:00','','Hrihsikesh Kumar Mishra',13,'',0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','ljjl','width=0\nheight=0'),
 (2,1,'banner','OSM 2','osm-2',0,49,0,'osmbanner2.png','http://www.opensourcematters.org','2004-07-07 15:31:29',1,0,'0000-00-00 00:00:00','','',13,'',0,2,'0000-00-00 00:00:00','0000-00-00 00:00:00','',''),
 (3,1,'','Joomla!','joomla',0,877,0,'','http://www.joomla.org','2006-05-29 14:21:28',1,0,'0000-00-00 00:00:00','','<a href=\"{CLICKURL}\" target=\"_blank\">{NAME}</a>\r\n<br/>\r\nJoomla! The most popular and widely used Open Source CMS Project in the world.',14,'',0,1,'0000-00-00 00:00:00','0000-00-00 00:00:00','',''),
 (4,1,'','JoomlaCode','joomlacode',0,877,0,'','http://joomlacode.org','2006-05-29 14:19:26',1,0,'0000-00-00 00:00:00','','<a href=\"{CLICKURL}\" target=\"_blank\">{NAME}</a>\r\n<br/>\r\nJoomlaCode, development and distribution made easy.',14,'',0,2,'0000-00-00 00:00:00','0000-00-00 00:00:00','',''),
 (5,1,'','Joomla! Extensions','joomla-extensions',0,872,0,'','http://extensions.joomla.org','2006-05-29 14:23:21',1,0,'0000-00-00 00:00:00','','<a href=\"{CLICKURL}\" target=\"_blank\">{NAME}</a>\r\n<br/>\r\nJoomla! Components, Modules, Plugins and Languages by the bucket load.',14,'',0,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','',''),
 (6,1,'','Joomla! Shop','joomla-shop',0,872,0,'','http://shop.joomla.org','2006-05-29 14:23:21',1,0,'0000-00-00 00:00:00','','<a href=\"{CLICKURL}\" target=\"_blank\">{NAME}</a>\r\n<br/>\r\nFor all your Joomla! merchandise.',14,'',0,4,'0000-00-00 00:00:00','0000-00-00 00:00:00','',''),
 (7,1,'','Joomla! Promo Shop','joomla-promo-shop',0,3952,2,'','http://shop.joomla.org','2009-02-12 12:43:48',1,0,'0000-00-00 00:00:00','','',33,'',0,3,'0000-00-00 00:00:00','0000-00-00 00:00:00','','width=0\nheight=0'),
 (8,1,'','Joomla! Promo Books','joomla-promo-books',0,3930,0,'','http://shop.joomla.org/amazoncom-bookstores.html','2009-02-12 12:51:11',1,0,'0000-00-00 00:00:00','','',33,'',0,4,'0000-00-00 00:00:00','0000-00-00 00:00:00','','width=0\nheight=0');
/*!40000 ALTER TABLE `jos_banner` ENABLE KEYS */;


--
-- Definition of table `jos_bannerclient`
--

DROP TABLE IF EXISTS `jos_bannerclient`;
CREATE TABLE `jos_bannerclient` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `contact` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `extrainfo` text NOT NULL,
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` time default NULL,
  `editor` varchar(50) default NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_bannerclient`
--

/*!40000 ALTER TABLE `jos_bannerclient` DISABLE KEYS */;
INSERT INTO `jos_bannerclient` (`cid`,`name`,`contact`,`email`,`extrainfo`,`checked_out`,`checked_out_time`,`editor`) VALUES 
 (1,'Open Source Matters','Administrator','admin@opensourcematters.org','',0,'00:00:00',NULL);
/*!40000 ALTER TABLE `jos_bannerclient` ENABLE KEYS */;


--
-- Definition of table `jos_bannertrack`
--

DROP TABLE IF EXISTS `jos_bannertrack`;
CREATE TABLE `jos_bannertrack` (
  `track_date` date NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_bannertrack`
--

/*!40000 ALTER TABLE `jos_bannertrack` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_bannertrack` ENABLE KEYS */;


--
-- Definition of table `jos_blastchatc`
--

DROP TABLE IF EXISTS `jos_blastchatc`;
CREATE TABLE `jos_blastchatc` (
  `id` int(11) NOT NULL auto_increment,
  `url` varchar(100) default NULL,
  `intra_id` varchar(100) default NULL,
  `priv_key` varchar(100) default NULL,
  `detached` binary(1) NOT NULL default '0',
  `adm_expand` binary(1) NOT NULL default '1',
  `width` varchar(6) NOT NULL default '100%',
  `height` varchar(6) NOT NULL default '480',
  `d_width` varchar(6) NOT NULL default '640',
  `d_height` varchar(6) NOT NULL default '480',
  `frame_border` binary(1) NOT NULL default '0',
  `m_width` varchar(6) NOT NULL default '0',
  `m_height` varchar(6) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_blastchatc`
--

/*!40000 ALTER TABLE `jos_blastchatc` DISABLE KEYS */;
INSERT INTO `jos_blastchatc` (`id`,`url`,`intra_id`,`priv_key`,`detached`,`adm_expand`,`width`,`height`,`d_width`,`d_height`,`frame_border`,`m_width`,`m_height`) VALUES 
 (1,'localhost:100/joomla15','99c798e54b9742ba1260c91e2ef2adb6','30061984',0x31,0x31,'100%','480','640','480',0x31,'0','0');
/*!40000 ALTER TABLE `jos_blastchatc` ENABLE KEYS */;


--
-- Definition of table `jos_blastchatc_users`
--

DROP TABLE IF EXISTS `jos_blastchatc_users`;
CREATE TABLE `jos_blastchatc_users` (
  `bc_userid` int(11) NOT NULL default '0',
  `bc_lastEntry` datetime NOT NULL default '0000-00-00 00:00:00',
  `bc_idle` varchar(5) default NULL,
  `bc_rid` int(11) NOT NULL default '0',
  `bc_rsid` int(11) NOT NULL default '0',
  `bc_rname` varchar(100) default NULL,
  PRIMARY KEY  (`bc_userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_blastchatc_users`
--

/*!40000 ALTER TABLE `jos_blastchatc_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_blastchatc_users` ENABLE KEYS */;


--
-- Definition of table `jos_categories`
--

DROP TABLE IF EXISTS `jos_categories`;
CREATE TABLE `jos_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` varchar(255) NOT NULL default '',
  `section` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_categories`
--

/*!40000 ALTER TABLE `jos_categories` DISABLE KEYS */;
INSERT INTO `jos_categories` (`id`,`parent_id`,`title`,`name`,`alias`,`image`,`section`,`image_position`,`description`,`published`,`checked_out`,`checked_out_time`,`editor`,`ordering`,`access`,`count`,`params`) VALUES 
 (1,0,'Latest','','latest-news','taking_notes.jpg','1','left','The latest news from the Joomla! Team',1,0,'0000-00-00 00:00:00','',1,0,1,''),
 (2,0,'Joomla! Specific Links','','joomla-specific-links','clock.jpg','com_weblinks','left','A selection of links that are all related to the Joomla! Project.',1,0,'0000-00-00 00:00:00',NULL,1,0,0,''),
 (3,0,'Newsflash','','newsflash','','1','left','',1,0,'0000-00-00 00:00:00','',2,0,0,''),
 (4,0,'Joomla!','','joomla','','com_newsfeeds','left','',1,0,'0000-00-00 00:00:00',NULL,2,0,0,''),
 (5,0,'Free and Open Source Software','','free-and-open-source-software','','com_newsfeeds','left','<p><img src=\"images/stories/image7.bmp\" border=\"0\" width=\"365\" height=\"513\" /></p>',1,0,'0000-00-00 00:00:00',NULL,3,0,0,''),
 (6,0,'Related Projects','','related-projects','','com_newsfeeds','left','Joomla builds on and collaborates with many other free and open source projects. Keep up with the latest news from some of them.',1,0,'0000-00-00 00:00:00',NULL,4,0,0,''),
 (12,0,'Contacts','','contacts','','com_contact_details','left','<p>Code Guru<img src=\"images/stories/3-d46h.jpg\" border=\"0\" width=\"800\" height=\"473\" /></p><p>  JMS BYte hacker</p>',1,0,'0000-00-00 00:00:00',NULL,0,0,0,''),
 (13,0,'Joomla','','joomla','','com_banner','left','',1,0,'0000-00-00 00:00:00',NULL,0,0,0,''),
 (14,0,'Text Ads','','text-ads','','com_banner','left','',1,0,'0000-00-00 00:00:00',NULL,0,0,0,''),
 (15,0,'Features','','features','','com_content','left','',0,0,'0000-00-00 00:00:00',NULL,6,0,0,''),
 (17,0,'Benefits','','benefits','','com_content','left','',0,0,'0000-00-00 00:00:00',NULL,4,0,0,''),
 (18,0,'Platforms','','platforms','','com_content','left','',0,0,'0000-00-00 00:00:00',NULL,3,0,0,''),
 (19,0,'Other Resources','','other-resources','','com_weblinks','left','',1,0,'0000-00-00 00:00:00',NULL,2,0,0,''),
 (29,0,'The CMS','','the-cms','','4','left','Information about the software behind Joomla!<br />',1,0,'0000-00-00 00:00:00',NULL,2,0,0,''),
 (28,0,'Current Users','','current-users','','3','left','Questions that users migrating to Joomla! 1.5 are likely to raise<br />',1,0,'0000-00-00 00:00:00',NULL,2,0,0,''),
 (25,0,'The Project','','the-project','','4','left','General facts about Joomla!<br />',1,0,'0000-00-00 00:00:00',NULL,1,0,0,''),
 (27,0,'New to Joomla!','','new-to-joomla','','3','left','Questions for new users of Joomla!',1,0,'0000-00-00 00:00:00',NULL,3,0,0,''),
 (30,0,'The Community','','the-community','','4','left','About the millions of Joomla! users and Web sites<br />',1,0,'0000-00-00 00:00:00',NULL,3,0,0,''),
 (31,0,'General','','general','','3','left','General questions about the Joomla! CMS',1,0,'0000-00-00 00:00:00',NULL,1,0,0,''),
 (32,0,'Languages','','languages','','3','left','Questions related to localisation and languages',1,0,'0000-00-00 00:00:00',NULL,4,0,0,''),
 (33,0,'Joomla! Promo','','joomla-promo','','com_banner','left','',1,0,'0000-00-00 00:00:00',NULL,1,0,0,'');
/*!40000 ALTER TABLE `jos_categories` ENABLE KEYS */;


--
-- Definition of table `jos_cf_computer`
--

DROP TABLE IF EXISTS `jos_cf_computer`;
CREATE TABLE `jos_cf_computer` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `cid` int(10) unsigned NOT NULL,
  `vid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL default '',
  `shopname` varchar(50) NOT NULL default '',
  `offer` varchar(250) NOT NULL default '',
  `productdetail` varchar(250) NOT NULL default '',
  `phone` varchar(50) NOT NULL default '',
  `mobile` varchar(50) NOT NULL default '',
  `fax` varchar(50) NOT NULL default '',
  `location` varchar(100) NOT NULL default '',
  `city` varchar(25) NOT NULL default '',
  `state` varchar(25) NOT NULL default '',
  `emailid` varchar(200) NOT NULL default '',
  `website` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `regstartdate` date NOT NULL default '0000-00-00',
  `regenddate` date NOT NULL default '0000-00-00',
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `hits` int(10) unsigned NOT NULL default '0',
  `ordering` int(10) unsigned NOT NULL default '0',
  `published` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_cf_computer`
--

/*!40000 ALTER TABLE `jos_cf_computer` DISABLE KEYS */;
INSERT INTO `jos_cf_computer` (`id`,`cid`,`vid`,`title`,`shopname`,`offer`,`productdetail`,`phone`,`mobile`,`fax`,`location`,`city`,`state`,`emailid`,`website`,`description`,`regstartdate`,`regenddate`,`checked_out`,`checked_out_time`,`params`,`hits`,`ordering`,`published`) VALUES 
 (2,4,2,'MyPC','san\'s comp system','buy one get one free','LG PC','123456','33221','147','Savok Road','siliguri','siliguri','support@gmail.com','http://www.sans.com','<p>&nbsp;</p><p>good morning</p>','2009-02-20','2009-02-26',0,'0000-00-00 00:00:00','show_shopname=1\nshow_offer=1\nshow_productdetail=1\nshow_website=1\nshow_email=1\nshow_phone=1\nshow_mobile=1\nshow_fax=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=1\ncomputer_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1);
/*!40000 ALTER TABLE `jos_cf_computer` ENABLE KEYS */;


--
-- Definition of table `jos_cf_jobs`
--

DROP TABLE IF EXISTS `jos_cf_jobs`;
CREATE TABLE `jos_cf_jobs` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `cid` int(10) unsigned NOT NULL default '2',
  `title` varchar(100) NOT NULL default '',
  `reference` varchar(150) NOT NULL default '',
  `jobtype` varchar(50) NOT NULL default '',
  `qualification` varchar(200) NOT NULL default '',
  `duration` varchar(50) NOT NULL default '',
  `howtoapply` varchar(250) NOT NULL default '',
  `joblocation` varchar(100) NOT NULL,
  `jobcity` varchar(25) NOT NULL,
  `jobstate` varchar(25) NOT NULL,
  `noofopenings` int(10) unsigned NOT NULL default '0',
  `compensationrange` varchar(100) NOT NULL default '',
  `comname` varchar(100) NOT NULL default '',
  `comlocation` varchar(100) NOT NULL default '',
  `comcity` varchar(25) NOT NULL default '',
  `comstate` varchar(25) NOT NULL default '',
  `comemailid` varchar(200) NOT NULL default '',
  `comwebsite` varchar(100) NOT NULL default '',
  `contactname` varchar(50) NOT NULL default '',
  `contactphone` varchar(50) NOT NULL default '',
  `contactmobile` varchar(50) NOT NULL default '',
  `contactemailid` varchar(200) NOT NULL default '',
  `memberid` int(10) unsigned NOT NULL default '0',
  `regstartdate` date NOT NULL default '0000-00-00',
  `regenddate` date NOT NULL default '0000-00-00',
  `description` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `hits` int(10) unsigned NOT NULL default '0',
  `ordering` int(10) unsigned NOT NULL default '0',
  `published` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_cf_jobs`
--

/*!40000 ALTER TABLE `jos_cf_jobs` DISABLE KEYS */;
INSERT INTO `jos_cf_jobs` (`id`,`cid`,`title`,`reference`,`jobtype`,`qualification`,`duration`,`howtoapply`,`joblocation`,`jobcity`,`jobstate`,`noofopenings`,`compensationrange`,`comname`,`comlocation`,`comcity`,`comstate`,`comemailid`,`comwebsite`,`contactname`,`contactphone`,`contactmobile`,`contactemailid`,`memberid`,`regstartdate`,`regenddate`,`description`,`checked_out`,`checked_out_time`,`params`,`hits`,`ordering`,`published`) VALUES 
 (2,2,'computer hardware','reg 1254','Full_Time','mca, mtech','8 hour','direct interview','shiv mandir ','siliguri','west bengal',5,'10000-15000','Jms software & co','siliguri','siliguri','west bengal','sd.hrishi@gmail.com','http://www.jms.com','hrishikesh','9932586724','9932586724','sd.hrishikesh@gmail.com',3,'2009-02-13','2009-03-26','<p>&nbsp;</p><p><strong>A new jobs for all siliguri workers.</strong></p><p><strong>it will be the boon for all siliguri hardware engineers.</strong></p>',0,'0000-00-00 00:00:00','show_reference=1\nshow_jobtype=1\nshow_qualification=1\nshow_duration=1\nshow_howtoapply=1\nshow_joblocation=1\nshow_jobcity=1\nshow_jobstate=1\nshow_noofopening=1\nshow_compensationrange=1\nshow_comname=0\nshow_comlocation=1\nshow_comcity=1\nshow_comstate=1\nshow_comemailid=1\nshow_comwebsite=1\nshow_contactname=1\nshow_contactphone=1\nshow_contactmobile=1\nshow_contactemailid=1\nshow_description=1\njobs_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,0);
/*!40000 ALTER TABLE `jos_cf_jobs` ENABLE KEYS */;


--
-- Definition of table `jos_cf_personal`
--

DROP TABLE IF EXISTS `jos_cf_personal`;
CREATE TABLE `jos_cf_personal` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `cid` int(10) unsigned NOT NULL,
  `vid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL default '',
  `requirement` varchar(250) NOT NULL default '',
  `contactperson` varchar(50) NOT NULL default '',
  `phone` varchar(50) NOT NULL default '',
  `mobile` varchar(50) NOT NULL default '',
  `fax` varchar(50) NOT NULL default '',
  `location` varchar(100) NOT NULL default '',
  `city` varchar(25) NOT NULL default '',
  `state` varchar(25) NOT NULL default '',
  `emailid` varchar(200) NOT NULL default '',
  `website` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `regstartdate` date NOT NULL default '0000-00-00',
  `regenddate` date NOT NULL default '0000-00-00',
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `hits` int(10) unsigned NOT NULL default '0',
  `ordering` int(10) unsigned NOT NULL default '0',
  `published` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_cf_personal`
--

/*!40000 ALTER TABLE `jos_cf_personal` DISABLE KEYS */;
INSERT INTO `jos_cf_personal` (`id`,`cid`,`vid`,`title`,`requirement`,`contactperson`,`phone`,`mobile`,`fax`,`location`,`city`,`state`,`emailid`,`website`,`description`,`regstartdate`,`regenddate`,`checked_out`,`checked_out_time`,`params`,`hits`,`ordering`,`published`) VALUES 
 (2,5,3,'doctor require','Doctor Requires','Mr. Hrishikesh','123','3321','147','H C Road','siliguri','west bengal','support@gmail.com','http://www.support.com','<strong><font color=\"#999999\">welcome</font></strong>','2009-02-21','2009-02-26',0,'0000-00-00 00:00:00','show_requirement=1\nshow_contactperson=1\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_fax=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=0\npersonal_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1);
/*!40000 ALTER TABLE `jos_cf_personal` ENABLE KEYS */;


--
-- Definition of table `jos_cf_realstate`
--

DROP TABLE IF EXISTS `jos_cf_realstate`;
CREATE TABLE `jos_cf_realstate` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `cid` int(10) unsigned NOT NULL default '1',
  `vid` int(10) unsigned NOT NULL default '0',
  `title` varchar(50) NOT NULL default '',
  `company` varchar(100) NOT NULL default '',
  `phone` varchar(50) NOT NULL default '',
  `mobile` varchar(50) NOT NULL default '',
  `location` varchar(100) NOT NULL default '',
  `city` varchar(25) NOT NULL default '',
  `state` varchar(20) NOT NULL default '',
  `emailid` varchar(200) NOT NULL default '',
  `website` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `regstartdate` date NOT NULL default '0000-00-00',
  `regenddate` date NOT NULL default '0000-00-00',
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `hits` int(10) unsigned NOT NULL default '0',
  `ordering` int(10) unsigned NOT NULL default '0',
  `published` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jos_cf_realstate`
--

/*!40000 ALTER TABLE `jos_cf_realstate` DISABLE KEYS */;
INSERT INTO `jos_cf_realstate` (`id`,`cid`,`vid`,`title`,`company`,`phone`,`mobile`,`location`,`city`,`state`,`emailid`,`website`,`description`,`regstartdate`,`regenddate`,`checked_out`,`checked_out_time`,`params`,`hits`,`ordering`,`published`) VALUES 
 (2,1,3,'sanker home maker','sanker & sons','123456','654321','H C Road ','siliguri','w b','sanker@gmail.com','http://www.sns.com','<p><strong>Hello Sir</strong></p>','2000-02-20','2010-02-23',0,'0000-00-00 00:00:00','show_company=1\nshow_website=1\nshow_email=1\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=1\nrealstate_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1),
 (3,1,1,'new home','Shri home producation','0353-5256','+94582','Bihar more','bagdogra','west bengal','raj@raj.com','http://www.shrihome.com','<p>&nbsp;</p><p>Welcome to the shri home. We provide the best home in the world. Our branches are at many placeses in the world. </p><p>&nbsp;</p><p><strong>Thanx.</strong></p>','2009-02-18','2009-02-25',0,'0000-00-00 00:00:00','show_company=1\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=1\nrealstate_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1);
/*!40000 ALTER TABLE `jos_cf_realstate` ENABLE KEYS */;


--
-- Definition of table `jos_cf_vehicle`
--

DROP TABLE IF EXISTS `jos_cf_vehicle`;
CREATE TABLE `jos_cf_vehicle` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `cid` int(10) unsigned NOT NULL,
  `vid` int(10) unsigned NOT NULL,
  `title` varchar(100) NOT NULL default '',
  `category` varchar(50) NOT NULL default '',
  `companyname` varchar(50) NOT NULL default '',
  `phone` varchar(50) NOT NULL default '',
  `mobile` varchar(50) NOT NULL default '',
  `fax` varchar(50) NOT NULL default '',
  `location` varchar(50) NOT NULL default '',
  `city` varchar(50) NOT NULL default '',
  `state` varchar(50) NOT NULL default '',
  `emailid` varchar(200) NOT NULL default '',
  `website` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `regstartdate` date NOT NULL default '0000-00-00',
  `regenddate` date NOT NULL default '0000-00-00',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `hits` int(10) unsigned NOT NULL,
  `ordering` int(10) unsigned NOT NULL,
  `published` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_cf_vehicle`
--

/*!40000 ALTER TABLE `jos_cf_vehicle` DISABLE KEYS */;
INSERT INTO `jos_cf_vehicle` (`id`,`cid`,`vid`,`title`,`category`,`companyname`,`phone`,`mobile`,`fax`,`location`,`city`,`state`,`emailid`,`website`,`description`,`regstartdate`,`regenddate`,`checked_out`,`checked_out_time`,`params`,`hits`,`ordering`,`published`) VALUES 
 (2,3,4,'Rajdoot','2 wheeler','rajdoot','123456','654321','142536','baghagjoti park','siliguri','w b','raj@dd.com','http://www.rajdoot.com','sdafasdf','2009-02-20','2009-02-26',0,'0000-00-00 00:00:00','show_category=1\nshow_company=1\nshow_website=1\nshow_email=1\nshow_phone=1\nshow_mobile=1\nshow_fax=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=1\nvehicle_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1),
 (3,3,4,'Pulser 200 cc','2 wheeler','Bajaj','123456','963258','454545','N.H 15 Road','malda','west bengal','support@pulser.com','http://www.pulser.com','<p>&nbsp;</p><p>&nbsp;</p><p><strong>Hello World, we provide the best collection in the world.</strong></p>','2009-02-18','2009-02-27',0,'0000-00-00 00:00:00','show_category=1\nshow_company=1\nshow_website=1\nshow_email=1\nshow_phone=1\nshow_mobile=1\nshow_fax=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=1\nvehicle_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1);
/*!40000 ALTER TABLE `jos_cf_vehicle` ENABLE KEYS */;


--
-- Definition of table `jos_cf_vendor`
--

DROP TABLE IF EXISTS `jos_cf_vendor`;
CREATE TABLE `jos_cf_vendor` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `phone` varchar(50) NOT NULL default '',
  `mobile` varchar(50) NOT NULL default '',
  `location` varchar(100) NOT NULL default '',
  `city` varchar(50) NOT NULL default '',
  `state` varchar(50) NOT NULL default '',
  `emailid` varchar(200) NOT NULL default '',
  `website` varchar(100) NOT NULL default '',
  `image` text NOT NULL,
  `about` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `ordering` int(10) unsigned NOT NULL default '0',
  `published` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_cf_vendor`
--

/*!40000 ALTER TABLE `jos_cf_vendor` DISABLE KEYS */;
INSERT INTO `jos_cf_vendor` (`id`,`name`,`phone`,`mobile`,`location`,`city`,`state`,`emailid`,`website`,`image`,`about`,`checked_out`,`checked_out_time`,`params`,`ordering`,`published`) VALUES 
 (1,'hrishi','0333317387','9932586724','H C Road ','Siliguri','wb','sd.hrishi@gmail.com','http://www.hrishi.com','3-d46h.jpg','',0,'0000-00-00 00:00:00','',0,1),
 (2,'ravi sharma','123','332','bagdogra','siliguri','wb','ravi@gmail.com','','powered_by.png','',0,'0000-00-00 00:00:00','',0,1),
 (3,'alok','123','321','kadamtal ','siliguri','wb','alok@rediffmail.com','','taking_notes.jpg','',0,'0000-00-00 00:00:00','',0,1),
 (4,'rohit kumar','456','233','shiv mandir','siliguri','w b','rohit123@gmail.com','','0101_061208.jpg','',0,'0000-00-00 00:00:00','',0,1);
/*!40000 ALTER TABLE `jos_cf_vendor` ENABLE KEYS */;


--
-- Definition of table `jos_classifieds`
--

DROP TABLE IF EXISTS `jos_classifieds`;
CREATE TABLE `jos_classifieds` (
  `cid` int(10) unsigned NOT NULL,
  `type` varchar(50) NOT NULL default '',
  `description` text NOT NULL,
  `image` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL default '0',
  `check_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  `ordering` int(10) unsigned NOT NULL default '0',
  `published` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_classifieds`
--

/*!40000 ALTER TABLE `jos_classifieds` DISABLE KEYS */;
INSERT INTO `jos_classifieds` (`cid`,`type`,`description`,`image`,`checked_out`,`check_out_time`,`params`,`ordering`,`published`) VALUES 
 (1,'RealState','<p>The <strong>Realstate </strong>section will provide the information regarding the realstate. </p>','',0,'0000-00-00 00:00:00','',0,1),
 (2,'Jobs','The job section wiill prodvies the job of various type like full-time, part-time, intership jobs, with complete information like how  to apply etc.','',0,'0000-00-00 00:00:00','',0,1),
 (3,'Computer','The computer section is full developed the IT world. Here you can get the information regarding new hardware and software, complete price and retailer and wholer shop information.','',0,'0000-00-00 00:00:00','',0,1),
 (4,'Vehicles','<p>The vehicle section will take you the world of vehicle. Here you can get the infomation regarding the vehcile shops, category offer etc.</p>','',0,'0000-00-00 00:00:00','',0,1),
 (5,'Personals','Personal section is devoted to the various ads.','',0,'0000-00-00 00:00:00','',0,1);
/*!40000 ALTER TABLE `jos_classifieds` ENABLE KEYS */;


--
-- Definition of table `jos_components`
--

DROP TABLE IF EXISTS `jos_components`;
CREATE TABLE `jos_components` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `menuid` int(11) unsigned NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `admin_menu_link` varchar(255) NOT NULL default '',
  `admin_menu_alt` varchar(255) NOT NULL default '',
  `option` varchar(50) NOT NULL default '',
  `ordering` int(11) NOT NULL default '0',
  `admin_menu_img` varchar(255) NOT NULL default '',
  `iscore` tinyint(4) NOT NULL default '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `parent_option` (`parent`,`option`(32))
) ENGINE=MyISAM AUTO_INCREMENT=322 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_components`
--

/*!40000 ALTER TABLE `jos_components` DISABLE KEYS */;
INSERT INTO `jos_components` (`id`,`name`,`link`,`menuid`,`parent`,`admin_menu_link`,`admin_menu_alt`,`option`,`ordering`,`admin_menu_img`,`iscore`,`params`,`enabled`) VALUES 
 (1,'Banners','',0,0,'','Banner Management','com_banners',0,'js/ThemeOffice/component.png',0,'track_impressions=0\ntrack_clicks=0\ntag_prefix=\n\n',1),
 (2,'Banners','',0,1,'option=com_banners','Active Banners','com_banners',1,'js/ThemeOffice/edit.png',0,'',1),
 (3,'Clients','',0,1,'option=com_banners&c=client','Manage Clients','com_banners',2,'js/ThemeOffice/categories.png',0,'',1),
 (4,'Web Links','option=com_weblinks',0,0,'','Manage Weblinks','com_weblinks',0,'js/ThemeOffice/component.png',0,'show_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n',1),
 (5,'Links','',0,4,'option=com_weblinks','View existing weblinks','com_weblinks',1,'js/ThemeOffice/edit.png',0,'',1),
 (6,'Categories','',0,4,'option=com_categories&section=com_weblinks','Manage weblink categories','',2,'js/ThemeOffice/categories.png',0,'',1),
 (7,'Contacts','option=com_contact',0,0,'','Edit contact details','com_contact',0,'js/ThemeOffice/component.png',1,'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nallow_vcard=0\nbanned_email=\nbanned_subject=\nbanned_text=\nvalidate_session=1\ncustom_reply=0\n\n',1),
 (8,'Contacts','',0,7,'option=com_contact','Edit contact details','com_contact',0,'js/ThemeOffice/edit.png',1,'',1),
 (9,'Categories','',0,7,'option=com_categories&section=com_contact_details','Manage contact categories','',2,'js/ThemeOffice/categories.png',1,'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n',1),
 (10,'Polls','option=com_poll',0,0,'option=com_poll','Manage Polls','com_poll',0,'js/ThemeOffice/component.png',0,'',1),
 (11,'News Feeds','option=com_newsfeeds',0,0,'','News Feeds Management','com_newsfeeds',0,'js/ThemeOffice/component.png',0,'',1),
 (12,'Feeds','',0,11,'option=com_newsfeeds','Manage News Feeds','com_newsfeeds',1,'js/ThemeOffice/edit.png',0,'show_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n',1),
 (13,'Categories','',0,11,'option=com_categories&section=com_newsfeeds','Manage Categories','',2,'js/ThemeOffice/categories.png',0,'',1),
 (14,'User','option=com_user',0,0,'','','com_user',0,'',1,'',1),
 (15,'Search','option=com_search',0,0,'option=com_search','Search Statistics','com_search',0,'js/ThemeOffice/component.png',1,'enabled=0\n\n',1),
 (16,'Categories','',0,1,'option=com_categories&section=com_banner','Categories','',3,'',1,'',1),
 (17,'Wrapper','option=com_wrapper',0,0,'','Wrapper','com_wrapper',0,'',1,'',1),
 (18,'Mail To','',0,0,'','','com_mailto',0,'',1,'',1),
 (19,'Media Manager','',0,0,'option=com_media','Media Manager','com_media',0,'',1,'upload_extensions=bmp,csv,doc,epg,gif,ico,jpg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,EPG,GIF,ICO,JPG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nfile_path=images\nimage_path=images/stories\nrestrict_uploads=1\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html\nenable_flash=0\n\n',1),
 (20,'Articles','option=com_content',0,0,'','','com_content',0,'',1,'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=0\n\n',1),
 (21,'Configuration Manager','',0,0,'','Configuration','com_config',0,'',1,'',1),
 (22,'Installation Manager','',0,0,'','Installer','com_installer',0,'',1,'',1),
 (23,'Language Manager','',0,0,'','Languages','com_languages',0,'',1,'',1),
 (24,'Mass mail','',0,0,'','Mass Mail','com_massmail',0,'',1,'mailSubjectPrefix=\nmailBodySuffix=\n\n',1),
 (25,'Menu Editor','',0,0,'','Menu Editor','com_menus',0,'',1,'',1),
 (27,'Messaging','',0,0,'','Messages','com_messages',0,'',1,'',1),
 (28,'Modules Manager','',0,0,'','Modules','com_modules',0,'',1,'',1),
 (29,'Plugin Manager','',0,0,'','Plugins','com_plugins',0,'',1,'',1),
 (30,'Template Manager','',0,0,'','Templates','com_templates',0,'',1,'',1),
 (31,'User Manager','',0,0,'','Users','com_users',0,'',1,'allowUserRegistration=1\nnew_usertype=Registered\nuseractivation=1\nfrontend_userparams=1\n\n',1),
 (32,'Cache Manager','',0,0,'','Cache','com_cache',0,'',1,'',1),
 (33,'Control Panel','',0,0,'','Control Panel','com_cpanel',0,'',1,'',1),
 (204,'Hello World!','option=com_hello',0,0,'option=com_hello','Hello World!','com_hello',0,'js/ThemeOffice/component.png',0,'',1),
 (246,'YellowPage','option=com_yellowpage',0,0,'option=com_yellowpage','YellowPage','com_yellowpage',0,'js/ThemeOffice/component.png',0,'',1),
 (135,'BlastChat Client','option=com_blastchatc',0,0,'option=com_blastchatc','BlastChat Client','com_blastchatc',0,'../components/com_blastchatc/images/blastchat.ico',0,'',1),
 (205,'Guestbook','option=com_guestbook',0,0,'option=com_guestbook','Guestbook','com_guestbook',0,'js/ThemeOffice/component.png',0,'',1),
 (136,'Configuration - Client','',0,135,'option=com_blastchatc&task=configc','Configuration - Client','com_blastchatc',0,'../components/com_blastchatc/images/config.png',0,'',1),
 (137,'Configuration - Server','',0,135,'option=com_blastchatc&task=configs','Configuration - Server','com_blastchatc',1,'../components/com_blastchatc/images/config.png',0,'',1),
 (138,'Registration','',0,135,'option=com_blastchatc&task=register','BlastChat Client - Registration','com_blastchatc',2,'../components/com_blastchatc/images/credits.png',0,'',1),
 (139,'Credits','',0,135,'option=com_blastchatc&task=credits','BlastChat Client - Credits','com_blastchatc',3,'../components/com_blastchatc/images/credits.png',0,'',1),
 (203,'My Extension','option=com_myextension',0,0,'option=com_myextension','My Extension','com_myextension',0,'js/ThemeOffice/component.png',0,'',1),
 (253,'Categories','',0,246,'option=com_yellowpage&controller=categories','Categories','com_yellowpage',6,'js/ThemeOffice/component.png',0,'',1),
 (252,'Vehicle','',0,246,'option=com_yellowpage&controller=vehicle','Vehicle','com_yellowpage',5,'js/ThemeOffice/component.png',0,'',1),
 (251,'Doctors','',0,246,'option=com_yellowpage&controller=doctors','Doctors','com_yellowpage',4,'js/ThemeOffice/component.png',0,'',1),
 (250,'Club','',0,246,'option=com_yellowpage&controller=club','Club','com_yellowpage',3,'js/ThemeOffice/component.png',0,'',1),
 (249,'Hotel/Lodge','',0,246,'option=com_yellowpage&controller=hotellodge','Hotel/Lodge','com_yellowpage',2,'js/ThemeOffice/component.png',0,'',1),
 (247,'Education','',0,246,'option=com_yellowpage&controller=education','Education','com_yellowpage',0,'js/ThemeOffice/component.png',0,'',1),
 (248,'Medical','',0,246,'option=com_yellowpage&controller=medical','Medical','com_yellowpage',1,'js/ThemeOffice/component.png',0,'',1),
 (262,'EasyBook','option=com_easybook',0,0,'option=com_easybook','EasyBook','com_easybook',0,'components/com_easybook/images/easybook_ico.png',0,'',1),
 (263,'Manage Entries','',0,262,'option=com_easybook','Manage Entries','com_easybook',0,'components/com_easybook/images/easybook_edit.png',0,'',1),
 (264,'Badwordfilter','',0,262,'option=com_easybook&controller=badwords','Badwordfilter','com_easybook',1,'components/com_easybook/images/easybook_unhappy.png',0,'',1),
 (265,'About','',0,262,'option=com_easybook&task=about','About','com_easybook',2,'components/com_easybook/images/easybook_info.png',0,'',1),
 (291,'Classifieds','option=com_classifieds',0,0,'option=com_classifieds','Classifieds','com_classifieds',0,'js/ThemeOffice/component.png',0,'',1),
 (292,'RealState','',0,291,'option=com_classifieds&controller=realstate','RealState','com_classifieds',0,'js/ThemeOffice/component.png',0,'',1),
 (293,'Jobs','',0,291,'option=com_classifieds&controller=jobs','Jobs','com_classifieds',1,'js/ThemeOffice/component.png',0,'',1),
 (294,'Vehicle','',0,291,'option=com_classifieds&controller=vehicle','Vehicle','com_classifieds',2,'js/ThemeOffice/component.png',0,'',1),
 (298,'Category','',0,291,'option=com_classifieds&controller=category','Category','com_classifieds',6,'js/ThemeOffice/component.png',0,'',1),
 (297,'Vendor','',0,291,'option=com_classifieds&controller=vendor','Vendor','com_classifieds',5,'js/ThemeOffice/component.png',0,'',1),
 (296,'personal','',0,291,'option=com_classifieds&controller=personal','personal','com_classifieds',4,'js/ThemeOffice/component.png',0,'',1),
 (295,'computer','',0,291,'option=com_classifieds&controller=computer','computer','com_classifieds',3,'js/ThemeOffice/component.png',0,'',1),
 (299,'Classifieds','option=com_lg',0,0,'option=com_lg','Classifieds','com_lg',0,'js/ThemeOffice/component.png',0,'',1),
 (306,'Matrimonial','option=com_matrimonial',0,0,'option=com_matrimonial','Matrimonial','com_matrimonial',0,'js/ThemeOffice/component.png',0,'',1),
 (307,'Users','',0,306,'option=com_matrimonial&controller=user','Users','com_matrimonial',0,'js/ThemeOffice/component.png',0,'',1),
 (308,'Profile','',0,306,'option=com_matrimonial&controller=profile','Profile','com_matrimonial',1,'js/ThemeOffice/component.png',0,'',1),
 (309,'Message','',0,306,'option=com_matrimonial&controller=msg','Message','com_matrimonial',2,'js/ThemeOffice/component.png',0,'',1),
 (318,'Developer-Zone','option=com_developerzone',0,0,'option=com_developerzone','Developer-Zone','com_developerzone',0,'js/ThemeOffice/component.png',0,'',1),
 (319,'Categories','',0,318,'option=com_developerzone&controller=categories','Categories','com_developerzone',0,'js/ThemeOffice/component.png',0,'',1),
 (320,'Code-Files','',0,318,'option=com_developerzone&controller=codefile','Code-Files','com_developerzone',1,'js/ThemeOffice/component.png',0,'',1),
 (321,'Articles','',0,318,'option=com_developerzone&controller=articles','Articles','com_developerzone',2,'js/ThemeOffice/component.png',0,'',1);
/*!40000 ALTER TABLE `jos_components` ENABLE KEYS */;


--
-- Definition of table `jos_contact_details`
--

DROP TABLE IF EXISTS `jos_contact_details`;
CREATE TABLE `jos_contact_details` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `con_position` varchar(255) default NULL,
  `address` text,
  `suburb` varchar(100) default NULL,
  `state` varchar(100) default NULL,
  `country` varchar(100) default NULL,
  `postcode` varchar(100) default NULL,
  `telephone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `misc` mediumtext,
  `image` varchar(255) default NULL,
  `imagepos` varchar(20) default NULL,
  `email_to` varchar(255) default NULL,
  `default_con` tinyint(1) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `catid` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `mobile` varchar(255) NOT NULL default '',
  `webpage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_contact_details`
--

/*!40000 ALTER TABLE `jos_contact_details` DISABLE KEYS */;
INSERT INTO `jos_contact_details` (`id`,`name`,`alias`,`con_position`,`address`,`suburb`,`state`,`country`,`postcode`,`telephone`,`fax`,`misc`,`image`,`imagepos`,`email_to`,`default_con`,`published`,`checked_out`,`checked_out_time`,`ordering`,`params`,`user_id`,`catid`,`access`,`mobile`,`webpage`) VALUES 
 (1,'Byte Hacker','hrishi','Siliguri','Shiv Mandir,','Siliguri','West Bengal','INDIA','734011','0353-256632','0353-2645242','','','top','sd.hrishi@gmail.com',0,1,62,'2009-02-19 19:37:23',1,'show_name=1\nshow_position=1\nshow_email=0\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=0\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=0\ncontact_icons=0\nicon_address=indent5.png\nicon_email=\nicon_telephone=\nicon_mobile=sort_asc.png\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=This is Byte hacker Raise Code GurU\nshow_email_copy=0\nbanned_email=Guru Banned E-Mail\nbanned_subject=Guru Banned subject\nbanned_text=Guru Banned Text',0,12,0,'+91-9932856724','http://www.bytehacker.com');
/*!40000 ALTER TABLE `jos_contact_details` ENABLE KEYS */;


--
-- Definition of table `jos_content`
--

DROP TABLE IF EXISTS `jos_content`;
CREATE TABLE `jos_content` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `title_alias` varchar(255) NOT NULL default '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL default '0',
  `sectionid` int(11) unsigned NOT NULL default '0',
  `mask` int(11) unsigned NOT NULL default '0',
  `catid` int(11) unsigned NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL default '0',
  `created_by_alias` varchar(255) NOT NULL default '',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL default '1',
  `parentid` int(11) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `metadata` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_content`
--

/*!40000 ALTER TABLE `jos_content` DISABLE KEYS */;
INSERT INTO `jos_content` (`id`,`title`,`alias`,`title_alias`,`introtext`,`fulltext`,`state`,`sectionid`,`mask`,`catid`,`created`,`created_by`,`created_by_alias`,`modified`,`modified_by`,`checked_out`,`checked_out_time`,`publish_up`,`publish_down`,`images`,`urls`,`attribs`,`version`,`parentid`,`ordering`,`metakey`,`metadesc`,`access`,`hits`,`metadata`) VALUES 
 (1,'Welcome to Joomla!','welcome-to-joomla','','<div align=\"left\"><strong>Joomla! is a free open source framework and content publishing system designed for quickly creating highly interactive multi-language Web sites, online communities, media portals, blogs and eCommerce applications. <br /></strong></div><p><strong><br /></strong><img src=\"images/stories/powered_by.png\" border=\"0\" alt=\"Joomla! Logo\" title=\"Example Caption\" hspace=\"6\" vspace=\"0\" width=\"165\" height=\"68\" align=\"left\" />Joomla! provides an easy-to-use graphical user interface that simplifies the management and publishing of large volumes of content including HTML, documents, and rich media.  Joomla! is used by organisations of all sizes for intranets and extranets and is supported by a community of tens of thousands of users. </p>','With a fully documented library of developer resources, Joomla! allows the customisation of every aspect of a Web site including presentation, layout, administration, and the rapid integration with third-party applications.<p>Joomla! now provides more developer power while making the user experience all the more friendly. For those who always wanted increased extensibility, Joomla! 1.5 can make this happen.</p><p>A new framework, ground-up refactoring, and a highly-active development team brings the excitement of \'the next generation CMS\' to your fingertips.  Whether you are a systems architect or a complete \'noob\' Joomla! can take you to the next level of content delivery. \'More than a CMS\' is something we have been playing with as a catchcry because the new Joomla! API has such incredible power and flexibility, you are free to take whatever direction your creative mind takes you and Joomla! can help you get there so much more easily than ever before.</p><p>Thinking Web publishing? Think Joomla!</p>',1,1,0,1,'2008-08-12 10:00:00',62,'','2008-08-12 10:00:00',62,0,'0000-00-00 00:00:00','2006-01-03 01:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',29,0,1,'','',0,96,'robots=\nauthor='),
 (2,'Newsflash 1','newsflash-1','','<p>Joomla! makes it easy to launch a Web site of any kind. Whether you want a brochure site or you are building a large online community, Joomla! allows you to deploy a new site in minutes and add extra functionality as you need it. The hundreds of available Extensions will help to expand your site and allow you to deliver new services that extend your reach into the Internet.</p>','',1,1,0,3,'2008-08-10 06:30:34',62,'','2008-08-10 06:30:34',62,0,'0000-00-00 00:00:00','2004-08-09 10:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',7,0,3,'','',0,1,'robots=\nauthor='),
 (3,'Newsflash 2','newsflash-2','','<p>The one thing about a Web site, it always changes! Joomla! makes it easy to add Articles, content, images, videos, and more. Site administrators can edit and manage content \'in-context\' by clicking the \'Edit\' link. Webmasters can also edit content through a graphical Control Panel that gives you complete control over your site.</p>','',1,1,0,3,'2008-08-09 22:30:34',62,'','2008-08-09 22:30:34',62,0,'0000-00-00 00:00:00','2004-08-09 06:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',6,0,4,'','',0,0,'robots=\nauthor='),
 (4,'Newsflash 3','newsflash-3','','<p>With a library of thousands of free <a href=\"http://extensions.joomla.org\" target=\"_blank\" title=\"The Joomla! Extensions Directory\">Extensions</a>, you can add what you need as your site grows. Don\'t wait, look through the <a href=\"http://extensions.joomla.org/\" target=\"_blank\" title=\"Joomla! Extensions\">Joomla! Extensions</a>  library today. </p>','',1,1,0,3,'2008-08-10 06:30:34',62,'','2008-08-10 06:30:34',62,0,'0000-00-00 00:00:00','2004-08-09 10:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',7,0,5,'','',0,1,'robots=\nauthor='),
 (5,'Joomla! License Guidelines','joomla-license-guidelines','joomla-license-guidelines','<p>This Web site is powered by <a href=\"http://joomla.org/\" target=\"_blank\" title=\"Joomla!\">Joomla!</a> The software and default templates on which it runs are Copyright 2005-2008 <a href=\"http://www.opensourcematters.org/\" target=\"_blank\" title=\"Open Source Matters\">Open Source Matters</a>. The sample content distributed with Joomla! is licensed under the <a href=\"http://docs.joomla.org/JEDL\" target=\"_blank\" title=\"Joomla! Electronic Document License\">Joomla! Electronic Documentation License.</a> All data entered into this Web site and templates added after installation, are copyrighted by their respective copyright owners.</p> <p>If you want to distribute, copy, or modify Joomla!, you are welcome to do so under the terms of the <a href=\"http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC1\" target=\"_blank\" title=\"GNU General Public License\"> GNU General Public License</a>. If you are unfamiliar with this license, you might want to read <a href=\"http://www.gnu.org/licenses/old-licenses/gpl-2.0.html#SEC4\" target=\"_blank\" title=\"How To Apply These Terms To Your Program\">\'How To Apply These Terms To Your Program\'</a> and the <a href=\"http://www.gnu.org/licenses/old-licenses/gpl-2.0-faq.html\" target=\"_blank\" title=\"GNU General Public License FAQ\">\'GNU General Public License FAQ\'</a>.</p> <p>The Joomla! licence has always been GPL.</p>','',0,4,0,25,'2008-08-20 10:11:07',62,'','2008-08-20 10:11:07',62,0,'0000-00-00 00:00:00','2004-08-19 06:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',7,0,2,'','',0,102,'robots=\nauthor='),
 (6,'We are Volunteers','we-are-volunteers','','<p>The Joomla Core Team and Working Group members are volunteer developers, designers, administrators and managers who have worked together to take Joomla! to new heights in its relatively short life. Joomla! has some wonderfully talented people taking Open Source concepts to the forefront of industry standards.  Joomla! 1.5 is a major leap forward and represents the most exciting Joomla! release in the history of the project. </p>','',0,1,0,1,'2007-07-07 09:54:06',62,'','2007-07-07 09:54:06',62,0,'0000-00-00 00:00:00','2004-07-06 22:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',10,0,4,'','',0,54,'robots=\nauthor='),
 (9,'Millions of Smiles','millions-of-smiles','','<p>The Joomla! team has millions of good reasons to be smiling about the Joomla! 1.5. In its current incarnation, it\'s had millions of downloads, taking it to an unprecedented level of popularity.  The new code base is almost an entire re-factor of the old code base.  The user experience is still extremely slick but for developers the API is a dream.  A proper framework for real PHP architects seeking the best of the best.</p><p>If you\'re a former Mambo User or a 1.0 series Joomla! User, 1.5 is the future of CMSs for a number of reasons.  It\'s more powerful, more flexible, more secure, and intuitive.  Our developers and interface designers have worked countless hours to make this the most exciting release in the content management system sphere.</p><p>Go on ... get your FREE copy of Joomla! today and spread the word about this benchmark project. </p>','',0,1,0,1,'2007-07-07 09:54:06',62,'','2007-07-07 09:54:06',62,0,'0000-00-00 00:00:00','2004-07-06 22:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',5,0,7,'','',0,23,'robots=\nauthor='),
 (10,'How do I localise Joomla! to my language?','how-do-i-localise-joomla-to-my-language','','<h4>General<br /></h4><p>In Joomla! 1.5 all User interfaces can be localised. This includes the installation, the Back-end Control Panel and the Front-end Site.</p><p>The core release of Joomla! 1.5 is shipped with multiple language choices in the installation but, other than English (the default), languages for the Site and Administration interfaces need to be added after installation. Links to such language packs exist below.</p>','<p>Translation Teams for Joomla! 1.5 may have also released fully localised installation packages where site, administrator and sample data are in the local language. These localised releases can be found in the specific team projects on the <a href=\"http://extensions.joomla.org/component/option,com_mtree/task,listcats/cat_id,1837/Itemid,35/\" target=\"_blank\" title=\"JED\">Joomla! Extensions Directory</a>.</p><h4>How do I install language packs?</h4><ul><li>First download both the admin and the site language packs that you require.</li><li>Install each pack separately using the Extensions-&gt;Install/Uninstall Menu selection and then the package file upload facility.</li><li>Go to the Language Manager and be sure to select Site or Admin in the sub-menu. Then select the appropriate language and make it the default one using the Toolbar button.</li></ul><h4>How do I select languages?</h4><ul><li>Default languages can be independently set for Site and for Administrator</li><li>In addition, users can define their preferred language for each Site and Administrator. This takes affect after logging in.</li><li>While logging in to the Administrator Back-end, a language can also be selected for the particular session.</li></ul><h4>Where can I find Language Packs and Localised Releases?</h4><p><em>Please note that Joomla! 1.5 is new and language packs for this version may have not been released at this time.</em> </p><ul><li><a href=\"http://joomlacode.org/gf/project/jtranslation/\" target=\"_blank\" title=\"Accredited Translations\">The Joomla! Accredited Translations Project</a>  - This is a joint repository for language packs that were developed by teams that are members of the Joomla! Translations Working Group.</li><li><a href=\"http://extensions.joomla.org/component/option,com_mtree/task,listcats/cat_id,1837/Itemid,35/\" target=\"_blank\" title=\"Translations\">The Joomla! Extensions Site - Translations</a>  </li><li><a href=\"http://community.joomla.org/translations.html\" target=\"_blank\" title=\"Translation Work Group Teams\">List of Translation Teams and Translation Partner Sites for Joomla! 1.5</a> </li></ul>',1,3,0,32,'2008-07-30 14:06:37',62,'','2008-07-30 14:06:37',62,0,'0000-00-00 00:00:00','2006-09-29 10:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',9,0,5,'','',0,10,'robots=\nauthor='),
 (11,'How do I upgrade to Joomla! 1.5 ?','how-do-i-upgrade-to-joomla-15','','<p>Joomla! 1.5 does not provide an upgrade path from earlier versions. Converting an older site to a Joomla! 1.5 site requires creation of a new empty site using Joomla! 1.5 and then populating the new site with the content from the old site. This migration of content is not a one-to-one process and involves conversions and modifications to the content dump.</p> <p>There are two ways to perform the migration:</p>',' <div id=\"post_content-107\"><li>An automated method of migration has been provided which uses a migrator Component to create the migration dump out of the old site (Mambo 4.5.x up to Joomla! 1.0.x) and a smart import facility in the Joomla! 1.5 Installation that performs required conversions and modifications during the installation process.</li> <li>Migration can be performed manually. This involves exporting the required tables, manually performing required conversions and modifications and then importing the content to the new site after it is installed.</li>  <p><!--more--></p> <h2><strong> Automated migration</strong></h2>  <p>This is a two phased process using two tools. The first tool is a migration Component named <font face=\"courier new,courier\">com_migrator</font>. This Component has been contributed by Harald Baer and is based on his <strong>eBackup </strong>Component. The migrator needs to be installed on the old site and when activated it prepares the required export dump of the old site\'s data. The second tool is built into the Joomla! 1.5 installation process. The exported content dump is loaded to the new site and all conversions and modification are performed on-the-fly.</p> <h3><u> Step 1 - Using com_migrator to export data from old site:</u></h3> <li>Install the <font face=\"courier new,courier\">com_migrator</font> Component on the <u><strong>old</strong></u> site. It can be found at the <a href=\"http://joomlacode.org/gf/project/pasamioprojects/frs/\" target=\"_blank\" title=\"JoomlaCode\">JoomlaCode developers forge</a>.</li> <li>Select the Component in the Component Menu of the Control Panel.</li> <li>Click on the <strong>Dump it</strong> icon. Three exported <em>gzipped </em>export scripts will be created. The first is a complete backup of the old site. The second is the migration content of all core elements which will be imported to the new site. The third is a backup of all 3PD Component tables.</li> <li>Click on the download icon of the particular exports files needed and store locally.</li> <li>Multiple export sets can be created.</li> <li>The exported data is not modified in anyway and the original encoding is preserved. This makes the <font face=\"courier new,courier\">com_migrator</font> tool a recommended tool to use for manual migration as well.</li> <h3><u> Step 2 - Using the migration facility to import and convert data during Joomla! 1.5 installation:</u></h3><p>Note: This function requires the use of the <em><font face=\"courier new,courier\">iconv </font></em>function in PHP to convert encodings. If <em><font face=\"courier new,courier\">iconv </font></em>is not found a warning will be provided.</p> <li>In step 6 - Configuration select the \'Load Migration Script\' option in the \'Load Sample Data, Restore or Migrate Backed Up Content\' section of the page.</li> <li>Enter the table prefix used in the content dump. For example: \'jos_\' or \'site2_\' are acceptable values.</li> <li>Select the encoding of the dumped content in the dropdown list. This should be the encoding used on the pages of the old site. (As defined in the _ISO variable in the language file or as seen in the browser page info/encoding/source)</li> <li>Browse the local host and select the migration export and click on <strong>Upload and Execute</strong></li> <li>A success message should appear or alternately a listing of database errors</li> <li>Complete the other required fields in the Configuration step such as Site Name and Admin details and advance to the final step of installation. (Admin details will be ignored as the imported data will take priority. Please remember admin name and password from the old site)</li> <p><u><br /></u></p></div>',1,3,0,28,'2008-07-30 20:27:52',62,'','2008-07-30 20:27:52',62,0,'0000-00-00 00:00:00','2006-09-29 12:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',10,0,3,'','',0,14,'robots=\nauthor='),
 (12,'Why does Joomla! 1.5 use UTF-8 encoding?','why-does-joomla-15-use-utf-8-encoding','','<p>Well... how about never needing to mess with encoding settings again?</p><p>Ever needed to display several languages on one page or site and something always came up in Giberish?</p><p>With utf-8 (a variant of Unicode) glyphs (character forms) of basically all languages can be displayed with one single encoding setting. </p>','',1,3,0,31,'2008-08-05 01:11:29',62,'','2008-08-05 01:11:29',62,0,'0000-00-00 00:00:00','2006-10-03 10:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',8,0,8,'','',0,29,'robots=\nauthor='),
 (13,'What happened to the locale setting?','what-happened-to-the-locale-setting','','This is now defined in the Language [<em>lang</em>].xml file in the Language metadata settings. If you are having locale problems such as dates do not appear in your language for example, you might want to check/edit the entries in the locale tag. Note that multiple locale strings can be set and the host will usually accept the first one recognised.','',1,3,0,28,'2008-08-06 16:47:35',62,'','2008-08-06 16:47:35',62,0,'0000-00-00 00:00:00','2006-10-05 14:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',7,0,2,'','',0,11,'robots=\nauthor='),
 (14,'What is the FTP layer for?','what-is-the-ftp-layer-for','','<p>The FTP Layer allows file operations (such as installing Extensions or updating the main configuration file) without having to make all the folders and files writable. This has been an issue on Linux and other Unix based platforms in respect of file permissions. This makes the site admin\'s life a lot easier and increases security of the site.</p><p>You can check the write status of relevent folders by going to \'\'Help-&gt;System Info\" and then in the sub-menu to \"Directory Permissions\". With the FTP Layer enabled even if all directories are red, Joomla! will operate smoothly.</p><p>NOTE: the FTP layer is not required on a Windows host/server. </p>','',1,3,0,31,'2008-08-06 21:27:49',62,'','2008-08-06 21:27:49',62,0,'0000-00-00 00:00:00','2006-10-05 16:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=',6,0,6,'','',0,23,'robots=\nauthor='),
 (15,'Can Joomla! 1.5 operate with PHP Safe Mode On?','can-joomla-15-operate-with-php-safe-mode-on','','<p>Yes it can! This is a significant security improvement.</p><p>The <em>safe mode</em> limits PHP to be able to perform actions only on files/folders who\'s owner is the same as PHP is currently using (this is usually \'apache\'). As files normally are created either by the Joomla! application or by FTP access, the combination of PHP file actions and the FTP Layer allows Joomla! to operate in PHP Safe Mode.</p>','',1,3,0,31,'2008-08-06 19:28:35',62,'','2008-08-06 19:28:35',62,0,'0000-00-00 00:00:00','2006-10-05 14:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',7,0,4,'','',0,8,'robots=\nauthor='),
 (16,'Only one edit window! How do I create \"Read more...\"?','only-one-edit-window-how-do-i-create-read-more','','<p>This is now implemented by inserting a <strong>Read more...</strong> tag (the button is located below the editor area) a dotted line appears in the edited text showing the split location for the <em>Read more....</em> A new Plugin takes care of the rest.</p><p>It is worth mentioning that this does not have a negative effect on migrated data from older sites. The new implementation is fully backward compatible.</p>','',0,3,0,28,'2008-08-06 19:29:28',62,'','2008-08-06 19:29:28',62,0,'0000-00-00 00:00:00','2006-10-05 14:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',7,0,4,'','',0,21,'robots=\nauthor='),
 (17,'My MySQL database does not support UTF-8. Do I have a problem?','my-mysql-database-does-not-support-utf-8-do-i-have-a-problem','','No you don\'t. Versions of MySQL lower than 4.1 do not have built in UTF-8 support. However, Joomla! 1.5 has made provisions for backward compatibility and is able to use UTF-8 on older databases. Let the installer take care of all the settings and there is no need to make any changes to the database (charset, collation, or any other).','',1,3,0,31,'2008-08-07 09:30:37',62,'','2008-08-07 09:30:37',62,0,'0000-00-00 00:00:00','2006-10-05 20:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',10,0,7,'','',0,9,'robots=\nauthor='),
 (18,'Joomla! Features','joomla-features','','<h4><font color=\"#ff6600\">Joomla! features:</font></h4> <ul><li>Completely database driven site engines </li><li>News, products, or services sections fully editable and manageable</li><li>Topics sections can be added to by contributing Authors </li><li>Fully customisable layouts including <em>left</em>, <em>center</em>, and <em>right </em>Menu boxes </li><li>Browser upload of images to your own library for use anywhere in the site </li><li>Dynamic Forum/Poll/Voting booth for on-the-spot results </li><li>Runs on Linux, FreeBSD, MacOSX server, Solaris, and AIX','  </li></ul> <h4>Extensive Administration:</h4> <ul><li>Change order of objects including news, FAQs, Articles etc. </li><li>Random Newsflash generator </li><li>Remote Author submission Module for News, Articles, FAQs, and Links </li><li>Object hierarchy - as many Sections, departments, divisions, and pages as you want </li><li>Image library - store all your PNGs, PDFs, DOCs, XLSs, GIFs, and JPEGs online for easy use </li><li>Automatic Path-Finder. Place a picture and let Joomla! fix the link </li><li>News Feed Manager. Easily integrate news feeds into your Web site.</li><li>E-mail a friend and Print format available for every story and Article </li><li>In-line Text editor similar to any basic word processor software </li><li>User editable look and feel </li><li>Polls/Surveys - Now put a different one on each page </li><li>Custom Page Modules. Download custom page Modules to spice up your site </li><li>Template Manager. Download Templates and implement them in seconds </li><li>Layout preview. See how it looks before going live </li><li>Banner Manager. Make money out of your site.</li></ul>',1,4,0,29,'2008-08-08 23:32:45',62,'','2008-08-08 23:32:45',62,0,'0000-00-00 00:00:00','2006-10-07 06:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',11,0,4,'','',0,59,'robots=\nauthor='),
 (19,'Joomla! Overview','joomla-overview','','<p>If you\'re new to Web publishing systems, you\'ll find that Joomla! delivers sophisticated solutions to your online needs. It can deliver a robust enterprise-level Web site, empowered by endless extensibility for your bespoke publishing needs. Moreover, it is often the system of choice for small business or home users who want a professional looking site that\'s simple to deploy and use. <em>We do content right</em>.<br /> </p><p>So what\'s the catch? How much does this system cost?</p><p> Well, there\'s good news ... and more good news! Joomla! 1.5 is free, it is released under an Open Source license - the GNU/General Public License v 2.0. Had you invested in a mainstream, commercial alternative, there\'d be nothing but moths left in your wallet and to add new functionality would probably mean taking out a second mortgage each time you wanted something adding!</p><p>Joomla! changes all that ... <br />Joomla! is different from the normal models for content management software. For a start, it\'s not complicated. Joomla! has been developed for everybody, and anybody can develop it further. It is designed to work (primarily) with other Open Source, free, software such as PHP, MySQL, and Apache. </p><p>It is easy to install and administer, and is reliable. </p><p>Joomla! doesn\'t even require the user or administrator of the system to know HTML to operate it once it\'s up and running.</p><p>To get the perfect Web site with all the functionality that you require for your particular application may take additional time and effort, but with the Joomla! Community support that is available and the many Third Party Developers actively creating and releasing new Extensions for the 1.5 platform on an almost daily basis, there is likely to be something out there to meet your needs. Or you could develop your own Extensions and make these available to the rest of the community. </p>','',1,4,0,29,'2008-08-09 07:49:20',62,'','2008-08-09 07:49:20',62,0,'0000-00-00 00:00:00','2006-10-07 10:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',13,0,2,'','',0,157,'robots=\nauthor='),
 (20,'Support and Documentation','support-and-documentation','','<h1>Support </h1><p>Support for the Joomla! CMS can be found on several places. The best place to start would be the <a href=\"http://docs.joomla.org/\" target=\"_blank\" title=\"Joomla! Official Documentation Wiki\">Joomla! Official Documentation Wiki</a>. Here you can help yourself to the information that is regularly published and updated as Joomla! develops. There is much more to come too!</p> <p>Of course you should not forget the Help System of the CMS itself. On the <em>topmenu </em>in the Back-end Control panel you find the Help button which will provide you with lots of explanation on features.</p> <p>Another great place would of course be the <a href=\"http://forum.joomla.org/\" target=\"_blank\" title=\"Forum\">Forum</a> . On the Joomla! Forum you can find help and support from Community members as well as from Joomla! Core members and Working Group members. The forum contains a lot of information, FAQ\'s, just about anything you are looking for in terms of support.</p> <p>Two other resources for Support are the <a href=\"http://developer.joomla.org/\" target=\"_blank\" title=\"Joomla! Developer Site\">Joomla! Developer Site</a> and the <a href=\"http://extensions.joomla.org/\" target=\"_blank\" title=\"Joomla! Extensions Directory\">Joomla! Extensions Directory</a> (JED). The Joomla! Developer Site provides lots of technical information for the experienced Developer as well as those new to Joomla! and development work in general. The JED whilst not a support site in the strictest sense has many of the Extensions that you will need as you develop your own Web site.</p> <p>The Joomla! Developers and Bug Squad members are regularly posting their blog reports about several topics such as programming techniques and security issues.</p> <h1>Documentation</h1> <p>Joomla! Documentation can of course be found on the <a href=\"http://docs.joomla.org/\" target=\"_blank\" title=\"Joomla! Official Documentation Wiki\">Joomla! Official Documentation Wiki</a>. You can find information for beginners, installation, upgrade, Frequently Asked Questions, developer topics, and a lot more. The Documentation Team helps oversee the wiki but you are invited to contribute content, as well.</p> <p>There are also books written about Joomla! You can find a listing of these books in the <a href=\"http://shop.joomla.org/\" target=\"_blank\" title=\"Joomla! Shop\">Joomla! Shop</a>.</p>','',1,4,0,25,'2008-08-09 08:33:57',62,'','2008-08-09 08:33:57',62,0,'0000-00-00 00:00:00','2006-10-07 10:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',13,0,1,'','',0,6,'robots=\nauthor='),
 (21,'Joomla! Facts','joomla-facts','','<p>Here are some interesting facts about Joomla!</p><ul><li><span>Over 210,000 active registered Users on the <a href=\"http://forum.joomla.org\" target=\"_blank\" title=\"Joomla Forums\">Official Joomla! community forum</a> and more on the many international community sites.</span><ul><li><span>over 1,000,000 posts in over 200,000 topics</span></li><li>over 1,200 posts per day</li><li>growing at 150 new participants each day!</li></ul></li><li><span>1168 Projects on the JoomlaCode (<a href=\"http://joomlacode.org/\" target=\"_blank\" title=\"JoomlaCode\">joomlacode.org</a> ). All for open source addons by third party developers.</span><ul><li><span>Well over 6,000,000 downloads of Joomla! since the migration to JoomlaCode in March 2007.<br /></span></li></ul></li><li><span>Nearly 4,000 extensions for Joomla! have been registered on the <a href=\"http://extensions.joomla.org\" target=\"_blank\" title=\"http://extensions.joomla.org\">Joomla! Extension Directory</a>  </span></li><li><span>Joomla.org exceeds 2 TB of traffic per month!</span></li></ul>','',1,4,0,30,'2008-08-09 16:46:37',62,'','2008-08-09 16:46:37',62,0,'0000-00-00 00:00:00','2006-10-07 14:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',13,0,1,'','',0,50,'robots=\nauthor='),
 (22,'What\'s New in 1.5?','whats-new-in-15','','<p>As with previous releases, Joomla! provides a unified and easy-to-use framework for delivering content for Web sites of all kinds. To support the changing nature of the Internet and emerging Web technologies, Joomla! required substantial restructuring of its core functionality and we also used this effort to simplify many challenges within the current user interface. Joomla! 1.5 has many new features.</p>','<p style=\"margin-bottom: 0in\">In Joomla! 1.5, you\'ll notice: </p>    <ul><li>     <p style=\"margin-bottom: 0in\">       Substantially improved usability, manageability, and scalability far beyond the original Mambo foundations</p>   </li><li>     <p style=\"margin-bottom: 0in\"> Expanded accessibility to support internationalisation, double-byte characters and right-to-left support for Arabic, Farsi, and Hebrew languages among others</p>   </li><li>     <p style=\"margin-bottom: 0in\"> Extended integration of external applications through Web services and remote authentication such as the Lightweight Directory Access Protocol (LDAP)</p>   </li><li>     <p style=\"margin-bottom: 0in\"> Enhanced content delivery, template and presentation capabilities to support accessibility standards and content delivery to any destination</p>   </li><li>     <p style=\"margin-bottom: 0in\">       A more sustainable and flexible framework for Component and Extension developers</p>   </li><li>     <p style=\"margin-bottom: 0in\">Backward compatibility with previous releases of Components, Templates, Modules, and other Extensions</p></li></ul>',1,4,0,29,'2008-08-11 22:13:58',62,'','2008-08-11 22:13:58',62,0,'0000-00-00 00:00:00','2006-10-10 18:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',10,0,1,'','',0,95,'robots=\nauthor='),
 (23,'Platforms and Open Standards','platforms-and-open-standards','','<p class=\"MsoNormal\">Joomla! runs on any platform including Windows, most flavours of Linux, several Unix versions, and the Apple OS/X platform.  Joomla! depends on PHP and the MySQL database to deliver dynamic content.  </p>            <p class=\"MsoNormal\">The minimum requirements are:</p>      <ul><li>Apache 1.x, 2.x and higher</li><li>PHP 4.3 and higher</li><li>MySQL 3.23 and higher</li></ul>It will also run on alternative server platforms such as Windows IIS - provided they support PHP and MySQL - but these require additional configuration in order for the Joomla! core package to be successful installed and operated.','',1,4,0,25,'2008-08-11 04:22:14',62,'','2008-08-11 04:22:14',62,0,'0000-00-00 00:00:00','2006-10-10 08:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',7,0,3,'','',0,11,'robots=\nauthor='),
 (24,'Content Layouts','content-layouts','','<p>Joomla! provides plenty of flexibility when displaying your Web content. Whether you are using Joomla! for a blog site, news or a Web site for a company, you\'ll find one or more content styles to showcase your information. You can also change the style of content dynamically depending on your preferences. Joomla! calls how a page is laid out a <strong>layout</strong>. Use the guide below to understand which layouts are available and how you might use them. </p> <h2>Content </h2> <p>Joomla! makes it extremely easy to add and display content. All content  is placed where your mainbody tag in your template is located. There are three main types of layouts available in Joomla! and all of them can be customised via parameters. The display and parameters are set in the Menu Item used to display the content your working on. You create these layouts by creating a Menu Item and choosing how you want the content to display.</p> <h3>Blog Layout<br /> </h3> <p>Blog layout will show a listing of all Articles of the selected blog type (Section or Category) in the mainbody position of your template. It will give you the standard title, and Intro of each Article in that particular Category and/or Section. You can customise this layout via the use of the Preferences and Parameters, (See Article Parameters) this is done from the Menu not the Section Manager!</p> <h3>Blog Archive Layout<br /> </h3> <p>A Blog Archive layout will give you a similar output of Articles as the normal Blog Display but will add, at the top, two drop down lists for month and year plus a search button to allow Users to search for all Archived Articles from a specific month and year.</p> <h3>List Layout<br /> </h3> <p>Table layout will simply give you a <em>tabular </em>list<em> </em>of all the titles in that particular Section or Category. No Intro text will be displayed just the titles. You can set how many titles will be displayed in this table by Parameters. The table layout will also provide a filter Section so that Users can reorder, filter, and set how many titles are listed on a single page (up to 50)</p> <h2>Wrapper</h2> <p>Wrappers allow you to place stand alone applications and Third Party Web sites inside your Joomla! site. The content within a Wrapper appears within the primary content area defined by the \"mainbody\" tag and allows you to display their content as a part of your own site. A Wrapper will place an IFRAME into the content Section of your Web site and wrap your standard template navigation around it so it appears in the same way an Article would.</p> <h2>Content Parameters</h2> <p>The parameters for each layout type can be found on the right hand side of the editor boxes in the Menu Item configuration screen. The parameters available depend largely on what kind of layout you are configuring.</p>','',1,4,0,29,'2008-08-12 22:33:10',62,'','2008-08-12 22:33:10',62,0,'0000-00-00 00:00:00','2006-10-11 06:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',11,0,5,'','',0,78,'robots=\nauthor='),
 (25,'What are the requirements to run Joomla! 1.5?','what-are-the-requirements-to-run-joomla-15','','<p>Joomla! runs on the PHP pre-processor. PHP comes in many flavours, for a lot of operating systems. Beside PHP you will need a Web server. Joomla! is optimized for the Apache Web server, but it can run on different Web servers like Microsoft IIS it just requires additional configuration of PHP and MySQL. Joomla! also depends on a database, for this currently you can only use MySQL. </p>Many people know from their own experience that it\'s not easy to install an Apache Web server and it gets harder if you want to add MySQL, PHP and Perl. XAMPP, WAMP, and MAMP are easy to install distributions containing Apache, MySQL, PHP and Perl for the Windows, Mac OSX and Linux operating systems. These packages are for localhost installations on non-public servers only.<br />The minimum version requirements are:<br /><ul><li>Apache 1.x or 2.x</li><li>PHP 4.3 or up</li><li>MySQL 3.23 or up</li></ul>For the latest minimum requirements details, see <a href=\"http://www.joomla.org/about-joomla/technical-requirements.html\" target=\"_blank\" title=\"Joomla! Technical Requirements\">Joomla! Technical Requirements</a>.','',1,3,0,31,'2008-08-11 00:42:31',62,'','2008-08-11 00:42:31',62,0,'0000-00-00 00:00:00','2006-10-10 06:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',6,0,5,'','',0,28,'robots=\nauthor='),
 (26,'Extensions','extensions','','<p>Out of the box, Joomla! does a great job of managing the content needed to make your Web site sing. But for many people, the true power of Joomla! lies in the application framework that makes it possible for developers all around the world to create powerful add-ons that are called <strong>Extensions</strong>. An Extension is used to add capabilities to Joomla! that do not exist in the base core code. Here are just some examples of the hundreds of available Extensions:</p> <ul>   <li>Dynamic form builders</li>   <li>Business or organisational directories</li>   <li>Document management</li>   <li>Image and multimedia galleries</li>   <li>E-commerce and shopping cart engines</li>   <li>Forums and chat software</li>   <li>Calendars</li>   <li>E-mail newsletters</li>   <li>Data collection and reporting tools</li>   <li>Banner advertising systems</li>   <li>Paid subscription services</li>   <li>and many, many, more</li> </ul> <p>You can find more examples over at our ever growing <a href=\"http://extensions.joomla.org\" target=\"_blank\" title=\"Joomla! Extensions Directory\">Joomla! Extensions Directory</a>. Prepare to be amazed at the amount of exciting work produced by our active developer community!</p><p>A useful guide to the Extension site can be found at:<br /><a href=\"http://extensions.joomla.org/content/view/15/63/\" target=\"_blank\" title=\"Guide to the Joomla! Extension site\">http://extensions.joomla.org/content/view/15/63/</a> </p> <h3>Types of Extensions </h3><p>There are five types of extensions:</p> <ul>   <li>Components</li>   <li>Modules</li>   <li>Templates</li>   <li>Plugins</li>   <li>Languages</li> </ul> <p>You can read more about the specifics of these using the links in the Article Index - a Table of Contents (yet another useful feature of Joomla!) - at the top right or by clicking on the <strong>Next </strong>link below.<br /> </p> <hr title=\"Components\" class=\"system-pagebreak\" /> <h3><img src=\"images/stories/ext_com.png\" border=\"0\" alt=\"Component - Joomla! Extension Directory\" title=\"Component - Joomla! Extension Directory\" width=\"17\" height=\"17\" /> Components</h3> <p>A Component is the largest and most complex of the Extension types.  Components are like mini-applications that render the main body of the  page. An analogy that might make the relationship easier to understand  would be that Joomla! is a book and all the Components are chapters in  the book. The core Article Component (<font face=\"courier new,courier\">com_content</font>), for example, is the  mini-application that handles all core Article rendering just as the  core registration Component (<font face=\"courier new,courier\">com_user</font>) is the mini-application  that handles User registration.</p> <p>Many of Joomla!\'s core features are provided by the use of default Components such as:</p> <ul>   <li>Contacts</li>   <li>Front Page</li>   <li>News Feeds</li>   <li>Banners</li>   <li>Mass Mail</li>   <li>Polls</li></ul><p>A Component will manage data, set displays, provide functions, and in general can perform any operation that does not fall under the general functions of the core code.</p> <p>Components work hand in hand with Modules and Plugins to provide a rich variety of content display and functionality aside from the standard Article and content display. They make it possible to completely transform Joomla! and greatly expand its capabilities.</p>  <hr title=\"Modules\" class=\"system-pagebreak\" /> <h3><img src=\"images/stories/ext_mod.png\" border=\"0\" alt=\"Module - Joomla! Extension Directory\" title=\"Module - Joomla! Extension Directory\" width=\"17\" height=\"17\" /> Modules</h3> <p>A more lightweight and flexible Extension used for page rendering is a Module. Modules are used for small bits of the page that are generally  less complex and able to be seen across different Components. To  continue in our book analogy, a Module can be looked at as a footnote  or header block, or perhaps an image/caption block that can be rendered  on a particular page. Obviously you can have a footnote on any page but  not all pages will have them. Footnotes also might appear regardless of  which chapter you are reading. Simlarly Modules can be rendered  regardless of which Component you have loaded.</p> <p>Modules are like little mini-applets that can be placed anywhere on your site. They work in conjunction with Components in some cases and in others are complete stand alone snippets of code used to display some data from the database such as Articles (Newsflash) Modules are usually used to output data but they can also be interactive form items to input data for example the Login Module or Polls.</p> <p>Modules can be assigned to Module positions which are defined in your Template and in the back-end using the Module Manager and editing the Module Position settings. For example, \"left\" and \"right\" are common for a 3 column layout. </p> <h4>Displaying Modules</h4> <p>Each Module is assigned to a Module position on your site. If you wish it to display in two different locations you must copy the Module and assign the copy to display at the new location. You can also set which Menu Items (and thus pages) a Module will display on, you can select all Menu Items or you can pick and choose by holding down the control key and selecting multiple locations one by one in the Modules [Edit] screen</p> <p>Note: Your Main Menu is a Module! When you create a new Menu in the Menu Manager you are actually copying the Main Menu Module (<font face=\"courier new,courier\">mod_mainmenu</font>) code and giving it the name of your new Menu. When you copy a Module you do not copy all of its parameters, you simply allow Joomla! to use the same code with two separate settings.</p> <h4>Newsflash Example</h4> <p>Newsflash is a Module which will display Articles from your site in an assignable Module position. It can be used and configured to display one Category, all Categories, or to randomly choose Articles to highlight to Users. It will display as much of an Article as you set, and will show a <em>Read more...</em> link to take the User to the full Article.</p> <p>The Newsflash Component is particularly useful for things like Site News or to show the latest Article added to your Web site.</p>  <hr title=\"Plugins\" class=\"system-pagebreak\" /> <h3><img src=\"images/stories/ext_plugin.png\" border=\"0\" alt=\"Plugin - Joomla! Extension Directory\" title=\"Plugin - Joomla! Extension Directory\" width=\"17\" height=\"17\" /> Plugins</h3> <p>One  of the more advanced Extensions for Joomla! is the Plugin. In previous  versions of Joomla! Plugins were known as Mambots. Aside from changing their name their  functionality has been expanded. A Plugin is a section of code that  runs when a pre-defined event happens within Joomla!. Editors are Plugins, for example, that execute when the Joomla! event <font face=\"courier new,courier\">onGetEditorArea</font> occurs. Using a Plugin allows a developer to change  the way their code behaves depending upon which Plugins are installed  to react to an event.</p>  <hr title=\"Languages\" class=\"system-pagebreak\" /> <h3><img src=\"images/stories/ext_lang.png\" border=\"0\" alt=\"Language - Joomla! Extensions Directory\" title=\"Language - Joomla! Extensions Directory\" width=\"17\" height=\"17\" /> Languages</h3> <p>New  to Joomla! 1.5 and perhaps the most basic and critical Extension is a Language. Joomla! is released with multiple Installation Languages but the base Site and Administrator are packaged in just the one Language <strong>en-GB</strong> - being English with GB spelling for example. To include all the translations currently available would bloat the core package and make it unmanageable for uploading purposes. The Language files enable all the User interfaces both Front-end and Back-end to be presented in the local preferred language. Note these packs do not have any impact on the actual content such as Articles. </p> <p>More information on languages is available from the <br />   <a href=\"http://community.joomla.org/translations.html\" target=\"_blank\" title=\"Joomla! Translation Teams\">http://community.joomla.org/translations.html</a></p>','',1,4,0,29,'2008-08-11 06:00:00',62,'','2008-08-11 06:00:00',62,0,'0000-00-00 00:00:00','2006-10-10 22:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',24,0,3,'About Joomla!, General, Extensions','',0,107,'robots=\nauthor='),
 (27,'The Joomla! Community','the-joomla-community','','<p><strong>Got a question? </strong>With more than 210,000 members, the Joomla! Discussion Forums at <a href=\"http://forum.joomla.org/\" target=\"_blank\" title=\"Forums\">forum.joomla.org</a> are a great resource for both new and experienced users. Ask your toughest questions the community is waiting to see what you\'ll do with your Joomla! site.</p><p><strong>Do you want to show off your new Joomla! Web site?</strong> Visit the <a href=\"http://forum.joomla.org/viewforum.php?f=514\" target=\"_blank\" title=\"Site Showcase\">Site Showcase</a> section of our forum.</p><p><strong>Do you want to contribute?</strong></p><p>If you think working with Joomla is fun, wait until you start working on it. We\'re passionate about helping Joomla users become contributors. There are many ways you can help Joomla\'s development:</p><ul>	<li>Submit news about Joomla. We syndicate Joomla-related news on <a href=\"http://news.joomla.org\" target=\"_blank\" title=\"JoomlaConnect\">JoomlaConnect<sup>TM</sup></a>. If you have Joomla news that you would like to share with the community, find out how to get connected <a href=\"http://community.joomla.org/connect.html\" target=\"_blank\" title=\"JoomlaConnect\">here</a>.</li>	<li>Report bugs and request features in our <a href=\"http://joomlacode.org/gf/project/joomla/tracker/\" target=\"_blank\" title=\"Joomla! developement trackers\">trackers</a>. Please read <a href=\"http://docs.joomla.org/Filing_bugs_and_issues\" target=\"_blank\" title=\"Reporting Bugs\">Reporting Bugs</a>, for details on how we like our bug reports served up</li><li>Submit patches for new and/or fixed behaviour. Please read <a href=\"http://docs.joomla.org/Patch_submission_guidelines\" target=\"_blank\" title=\"Submitting Patches\">Submitting Patches</a>, for details on how to submit a patch.</li><li>Join the <a href=\"http://forum.joomla.org/viewforum.php?f=509\" target=\"_blank\" title=\"Joomla! development forums\">developer forums</a> and share your ideas for how to improve Joomla. We\'re always open to suggestions, although we\'re likely to be sceptical of large-scale suggestions without some code to back it up.</li><li>Join any of the <a href=\"http://www.joomla.org/about-joomla/the-project/working-groups.html\" target=\"_blank\" title=\"Joomla! working groups\">Joomla Working Groups</a> and bring your personal expertise to the Joomla community. </li></ul><p>These are just a few ways you can contribute. See <a href=\"http://www.joomla.org/about-joomla/contribute-to-joomla.html\" target=\"_blank\" title=\"Contribute\">Contribute to Joomla</a> for many more ways.</p>','',1,4,0,30,'2008-08-12 16:50:48',62,'','2008-08-12 16:50:48',62,0,'0000-00-00 00:00:00','2006-10-11 02:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',12,0,2,'','',0,58,'robots=\nauthor='),
 (28,'How do I install Joomla! 1.5?','how-do-i-install-joomla-15','','<p>Installing of Joomla! 1.5 is pretty easy. We assume you have set-up your Web site, and it is accessible with your browser.<br /><br />Download Joomla! 1.5, unzip it and upload/copy the files into the directory you Web site points to, fire up your browser and enter your Web site address and the installation will start.  </p><p>For full details on the installation processes check out the <a href=\"http://help.joomla.org/content/category/48/268/302\" target=\"_blank\" title=\"Joomla! 1.5 Installation Manual\">Installation Manual</a> on the <a href=\"http://help.joomla.org\" target=\"_blank\" title=\"Joomla! Help Site\">Joomla! Help Site</a> where you will also find download instructions for a PDF version too. </p>','',1,3,0,31,'2008-08-11 01:10:59',62,'','2008-08-11 01:10:59',62,0,'0000-00-00 00:00:00','2006-10-10 06:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',5,0,3,'','',0,5,'robots=\nauthor='),
 (29,'What is the purpose of the collation selection in the installation screen?','what-is-the-purpose-of-the-collation-selection-in-the-installation-screen','','The collation option determines the way ordering in the database is done. In languages that use special characters, for instance the German umlaut, the database collation determines the sorting order. If you don\'t know which collation you need, select the \"utf8_general_ci\" as most languages use this. The other collations listed are exceptions in regards to the general collation. If your language is not listed in the list of collations it most likely means that \"utf8_general_ci is suitable.','',1,3,0,32,'2008-08-11 03:11:38',62,'','2008-08-11 03:11:38',62,0,'0000-00-00 00:00:00','2006-10-10 08:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=',4,0,4,'','',0,6,'robots=\nauthor='),
 (30,'What languages are supported by Joomla! 1.5?','what-languages-are-supported-by-joomla-15','','Within the Installer you will find a wide collection of languages. The installer currently supports the following languages: Arabic, Bulgarian, Bengali, Czech, Danish, German, Greek, English, Spanish, Finnish, French, Hebrew, Devanagari(India), Croatian(Croatia), Magyar (Hungary), Italian, Malay, Norwegian bokmal, Dutch, Portuguese(Brasil), Portugues(Portugal), Romanian, Russian, Serbian, Svenska, Thai and more are being added all the time.<br />By default the English language is installed for the Back and Front-ends. You can download additional language files from the <a href=\"http://extensions.joomla.org\" target=\"_blank\" title=\"Joomla! Extensions Directory\">Joomla!Extensions Directory</a>. ','',0,3,0,32,'2008-08-11 01:12:18',62,'','2008-08-11 01:12:18',62,0,'0000-00-00 00:00:00','2006-10-10 06:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',5,0,2,'','',0,8,'robots=\nauthor='),
 (31,'Is it useful to install the sample data?','is-it-useful-to-install-the-sample-data','','Well you are reading it right now! This depends on what you want to achieve. If you are new to Joomla! and have no clue how it all fits together, just install the sample data. If you don\'t like the English sample data because you - for instance - speak Chinese, then leave it out.','',1,3,0,27,'2008-08-11 09:12:55',62,'','2008-08-11 09:12:55',62,0,'0000-00-00 00:00:00','2006-10-10 10:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',6,0,3,'','',0,3,'robots=\nauthor='),
 (32,'Where is the Static Content Item?','where-is-the-static-content','','<p>In Joomla! versions prior to 1.5 there were separate processes for creating a Static Content Item and normal Content Items. The processes have been combined now and whilst both content types are still around they are renamed as Articles for Content Items and Uncategorized Articles for Static Content Items. </p><p>If you want to create a static item, create a new Article in the same way as for standard content and rather than relating this to a particular Section and Category just select <span style=\"font-style: italic\">Uncategorized</span> as the option in the Section and Category drop down lists.</p>','',1,3,0,28,'2008-08-10 23:13:33',62,'','2008-08-10 23:13:33',62,0,'0000-00-00 00:00:00','2006-10-10 04:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',6,0,6,'','',0,5,'robots=\nauthor='),
 (33,'What is an Uncategorised Article?','what-is-uncategorised-article','','Most Articles will be assigned to a Section and Category. In many cases, you might not know where you want it to appear so put the Article in the <em>Uncategorized </em>Section/Category. The Articles marked as <em>Uncategorized </em>are handled as static content.','',1,3,0,31,'2008-08-11 15:14:11',62,'','2008-08-11 15:14:11',62,0,'0000-00-00 00:00:00','2006-10-10 12:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',8,0,2,'','',0,6,'robots=\nauthor='),
 (34,'Does the PDF icon render pictures and special characters?','does-the-pdf-icon-render-pictures-and-special-characters','','Yes! Prior to Joomla! 1.5, only the text values of an Article and only for ISO-8859-1 encoding was allowed in the PDF rendition. With the new PDF library in place, the complete Article including images is rendered and applied to the PDF. The PDF generator also handles the UTF-8 texts and can handle any character sets from any language. The appropriate fonts must be installed but this is done automatically during a language pack installation.','',1,3,0,32,'2008-08-11 17:14:57',62,'','2008-08-11 17:14:57',62,0,'0000-00-00 00:00:00','2006-10-10 14:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',7,0,3,'','',0,6,'robots=\nauthor='),
 (35,'Is it possible to change A Menu Item\'s Type?','is-it-possible-to-change-the-types-of-menu-entries','','<p>You indeed can change the Menu Item\'s Type to whatever you want, even after they have been created. </p><p>If, for instance, you want to change the Blog Section of a Menu link, go to the Control Panel-&gt;Menus Menu-&gt;[menuname]-&gt;Menu Item Manager and edit the Menu Item. Select the <strong>Change Type</strong> button and choose the new style of Menu Item Type from the available list. Thereafter, alter the Details and Parameters to reconfigure the display for the new selection  as you require it.</p>','',1,3,0,31,'2008-08-10 23:15:36',62,'','2008-08-10 23:15:36',62,0,'0000-00-00 00:00:00','2006-10-10 04:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',6,0,1,'','',0,18,'robots=\nauthor='),
 (36,'Where did the Installers go?','where-did-the-installer-go','','The improved Installer can be found under the Extensions Menu. With versions prior to Joomla! 1.5 you needed to select a specific Extension type when you wanted to install it and use the Installer associated with it, with Joomla! 1.5 you just select the Extension you want to upload, and click on install. The Installer will do all the hard work for you.','',1,3,0,28,'2008-08-10 23:16:20',62,'','2008-08-10 23:16:20',62,0,'0000-00-00 00:00:00','2006-10-10 04:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',6,0,1,'','',0,4,'robots=\nauthor='),
 (37,'Where did the Mambots go?','where-did-the-mambots-go','','<p>Mambots have been renamed as Plugins. </p><p>Mambots were introduced in Mambo and offered possibilities to add plug-in logic to your site mainly for the purpose of manipulating content. In Joomla! 1.5, Plugins will now have much broader capabilities than Mambots. Plugins are able to extend functionality at the framework layer as well.</p>','',1,3,0,28,'2008-08-11 09:17:00',62,'','2008-08-11 09:17:00',62,0,'0000-00-00 00:00:00','2006-10-10 10:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',6,0,5,'','',0,4,'robots=\nauthor='),
 (38,'I installed with my own language, but the Back-end is still in English','i-installed-with-my-own-language-but-the-back-end-is-still-in-english','','<p>A lot of different languages are available for the Back-end, but by default this language may not be installed. If you want a translated Back-end, get your language pack and install it using the Extension Installer. After this, go to the Extensions Menu, select Language Manager and make your language the default one. Your Back-end will be translated immediately.</p><p>Users who have access rights to the Back-end may choose the language they prefer in their Personal Details parameters. This is of also true for the Front-end language.</p><p> A good place to find where to download your languages and localised versions of Joomla! is <a href=\"http://extensions.joomla.org/index.php?option=com_mtree&task=listcats&cat_id=1837&Itemid=35\" target=\"_blank\" title=\"Translations for Joomla!\">Translations for Joomla!</a> on JED.</p>','',1,3,0,32,'2008-08-11 17:18:14',62,'','2008-08-11 17:18:14',62,0,'0000-00-00 00:00:00','2006-10-10 14:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',7,0,1,'','',0,8,'robots=\nauthor='),
 (39,'How do I remove an Article?','how-do-i-remove-an-article','','<p>To completely remove an Article, select the Articles that you want to delete and move them to the Trash. Next, open the Article Trash in the Content Menu and select the Articles you want to delete. After deleting an Article, it is no longer available as it has been deleted from the database and it is not possible to undo this operation.  </p>','',1,3,0,27,'2008-08-11 09:19:01',62,'','2008-08-11 09:19:01',62,0,'0000-00-00 00:00:00','2006-10-10 10:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',6,0,2,'','',0,4,'robots=\nauthor='),
 (40,'What is the difference between Archiving and Trashing an Article? ','what-is-the-difference-between-archiving-and-trashing-an-article','','<p>When you <em>Archive </em>an Article, the content is put into a state which removes it from your site as published content. The Article is still available from within the Control Panel and can be <em>retrieved </em>for editing or republishing purposes. Trashed Articles are just one step from being permanently deleted but are still available until you Remove them from the Trash Manager. You should use Archive if you consider an Article important, but not current. Trash should be used when you want to delete the content entirely from your site and from future search results.  </p>','',1,3,0,27,'2008-08-11 05:19:43',62,'','2008-08-11 05:19:43',62,0,'0000-00-00 00:00:00','2006-10-10 06:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',8,0,1,'','',0,5,'robots=\nauthor='),
 (41,'Newsflash 5','newsflash-5','','Joomla! 1.5 - \'Experience the Freedom\'!. It has never been easier to create your own dynamic Web site. Manage all your content from the best CMS admin interface and in virtually any language you speak.','',1,1,0,3,'2008-08-12 00:17:31',62,'','2008-08-12 00:17:31',62,0,'0000-00-00 00:00:00','2006-10-11 06:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',5,0,2,'','',0,5,'robots=\nauthor=');
INSERT INTO `jos_content` (`id`,`title`,`alias`,`title_alias`,`introtext`,`fulltext`,`state`,`sectionid`,`mask`,`catid`,`created`,`created_by`,`created_by_alias`,`modified`,`modified_by`,`checked_out`,`checked_out_time`,`publish_up`,`publish_down`,`images`,`urls`,`attribs`,`version`,`parentid`,`ordering`,`metakey`,`metadesc`,`access`,`hits`,`metadata`) VALUES 
 (42,'Newsflash 4','newsflash-4','','Yesterday all servers in the U.S. went out on strike in a bid to get more RAM and better CPUs. A spokes person said that the need for better RAM was due to some fool increasing the front-side bus speed. In future, buses will be told to slow down in residential motherboards.','',1,1,0,3,'2008-08-12 00:25:50',62,'','2008-08-12 00:25:50',62,0,'0000-00-00 00:00:00','2006-10-11 06:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',5,0,1,'','',0,5,'robots=\nauthor='),
 (43,'Example Pages and Menu Links','example-pages-and-menu-links','','<p>This page is an example of content that is <em>Uncategorized</em>; that is, it does not belong to any Section or Category. You will see there is a new Menu in the left column. It shows links to the same content presented in 4 different page layouts.</p><ul><li>Section Blog</li><li>Section Table</li><li> Blog Category</li><li>Category Table</li></ul><p>Follow the links in the <strong>Example Pages</strong> Menu to see some of the options available to you to present all the different types of content included within the default installation of Joomla!.</p><p>This includes Components and individual Articles. These links or Menu Item Types (to give them their proper name) are all controlled from within the <strong><font face=\"courier new,courier\">Menu Manager-&gt;[menuname]-&gt;Menu Items Manager</font></strong>. </p>','',1,0,0,0,'2008-08-12 09:26:52',62,'','2008-08-12 09:26:52',62,0,'0000-00-00 00:00:00','2006-10-11 10:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',7,0,1,'Uncategorized, Uncategorized, Example Pages and Menu Links','',0,48,'robots=\nauthor='),
 (44,'Joomla! Security Strike Team','joomla-security-strike-team','','<p>The Joomla! Project has assembled a top-notch team of experts to form the new Joomla! Security Strike Team. This new team will solely focus on investigating and resolving security issues. Instead of working in relative secrecy, the JSST will have a strong public-facing presence at the <a href=\"http://developer.joomla.org/security.html\" target=\"_blank\" title=\"Joomla! Security Center\">Joomla! Security Center</a>.</p>','<p>The new JSST will call the new <a href=\"http://developer.joomla.org/security.html\" target=\"_blank\" title=\"Joomla! Security Center\">Joomla! Security Center</a> their home base. The Security Center provides a public presence for <a href=\"http://developer.joomla.org/security/news.html\" target=\"_blank\" title=\"Joomla! Security News\">security issues</a> and a platform for the JSST to <a href=\"http://developer.joomla.org/security/articles-tutorials.html\" target=\"_blank\" title=\"Joomla! Security Articles\">help the general public better understand security</a> and how it relates to Joomla!. The Security Center also offers users a clearer understanding of how security issues are handled. There\'s also a <a href=\"http://feeds.joomla.org/JoomlaSecurityNews\" target=\"_blank\" title=\"Joomla! Security News Feed\">news feed</a>, which provides subscribers an up-to-the-minute notification of security issues as they arise.</p>',0,1,0,1,'2007-07-07 09:54:06',62,'','2007-07-07 09:54:06',62,0,'0000-00-00 00:00:00','2004-07-06 22:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',1,0,3,'','',0,0,'robots=\nauthor='),
 (45,'Joomla! Community Portal','joomla-community-portal','','<p>The <a href=\"http://community.joomla.org/\" target=\"_blank\" title=\"Joomla! Community Portal\">Joomla! Community Portal</a> is now online. There, you will find a constant source of information about the activities of contributors powering the Joomla! Project. Learn about <a href=\"http://community.joomla.org/events.html\" target=\"_blank\" title=\"Joomla! Events\">Joomla! Events</a> worldwide, and see if there is a <a href=\"http://community.joomla.org/user-groups.html\" target=\"_blank\" title=\"Joomla! User Groups\">Joomla! User Group</a> nearby.</p><p>The <a href=\"http://community.joomla.org/magazine.html\" target=\"_blank\" title=\"Joomla! Community Magazine\">Joomla! Community Magazine</a> promises an interesting overview of feature articles, community accomplishments, learning topics, and project updates each month. Also, check out <a href=\"http://community.joomla.org/connect.html\" target=\"_blank\" title=\"JoomlaConnect\">JoomlaConnect&#0153;</a>. This aggregated RSS feed brings together Joomla! news from all over the world in your language. Get the latest and greatest by clicking <a href=\"http://community.joomla.org/connect.html\" target=\"_blank\" title=\"JoomlaConnect\">here</a>.</p>','',0,1,0,1,'2007-07-07 09:54:06',62,'','2007-07-07 09:54:06',62,0,'0000-00-00 00:00:00','2004-07-06 22:00:00','0000-00-00 00:00:00','','','show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=',2,0,2,'','',0,5,'robots=\nauthor=');
/*!40000 ALTER TABLE `jos_content` ENABLE KEYS */;


--
-- Definition of table `jos_content_frontpage`
--

DROP TABLE IF EXISTS `jos_content_frontpage`;
CREATE TABLE `jos_content_frontpage` (
  `content_id` int(11) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_content_frontpage`
--

/*!40000 ALTER TABLE `jos_content_frontpage` DISABLE KEYS */;
INSERT INTO `jos_content_frontpage` (`content_id`,`ordering`) VALUES 
 (45,2),
 (6,3),
 (44,4),
 (5,5),
 (9,6),
 (30,7),
 (16,8);
/*!40000 ALTER TABLE `jos_content_frontpage` ENABLE KEYS */;


--
-- Definition of table `jos_content_rating`
--

DROP TABLE IF EXISTS `jos_content_rating`;
CREATE TABLE `jos_content_rating` (
  `content_id` int(11) NOT NULL default '0',
  `rating_sum` int(11) unsigned NOT NULL default '0',
  `rating_count` int(11) unsigned NOT NULL default '0',
  `lastip` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_content_rating`
--

/*!40000 ALTER TABLE `jos_content_rating` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_content_rating` ENABLE KEYS */;


--
-- Definition of table `jos_core_acl_aro`
--

DROP TABLE IF EXISTS `jos_core_acl_aro`;
CREATE TABLE `jos_core_acl_aro` (
  `id` int(11) NOT NULL auto_increment,
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `jos_section_value_value_aro` (`section_value`(100),`value`(100)),
  KEY `jos_gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_acl_aro`
--

/*!40000 ALTER TABLE `jos_core_acl_aro` DISABLE KEYS */;
INSERT INTO `jos_core_acl_aro` (`id`,`section_value`,`value`,`order_value`,`name`,`hidden`) VALUES 
 (10,'users','62',0,'Administrator',0),
 (11,'users','63',0,'hrishikesh',0),
 (12,'users','64',0,'mantu',0),
 (13,'users','65',0,'dd',0),
 (14,'users','66',0,'kk',0),
 (15,'users','67',0,'ankur',0),
 (16,'users','68',0,'aa',0),
 (17,'users','69',0,'rja',0),
 (18,'users','70',0,'ad',0),
 (19,'users','71',0,'adk',0),
 (20,'users','72',0,'rjd',0);
/*!40000 ALTER TABLE `jos_core_acl_aro` ENABLE KEYS */;


--
-- Definition of table `jos_core_acl_aro_groups`
--

DROP TABLE IF EXISTS `jos_core_acl_aro_groups`;
CREATE TABLE `jos_core_acl_aro_groups` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `lft` int(11) NOT NULL default '0',
  `rgt` int(11) NOT NULL default '0',
  `value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `jos_gacl_parent_id_aro_groups` (`parent_id`),
  KEY `jos_gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_acl_aro_groups`
--

/*!40000 ALTER TABLE `jos_core_acl_aro_groups` DISABLE KEYS */;
INSERT INTO `jos_core_acl_aro_groups` (`id`,`parent_id`,`name`,`lft`,`rgt`,`value`) VALUES 
 (17,0,'ROOT',1,22,'ROOT'),
 (28,17,'USERS',2,21,'USERS'),
 (29,28,'Public Frontend',3,12,'Public Frontend'),
 (18,29,'Registered',4,11,'Registered'),
 (19,18,'Author',5,10,'Author'),
 (20,19,'Editor',6,9,'Editor'),
 (21,20,'Publisher',7,8,'Publisher'),
 (30,28,'Public Backend',13,20,'Public Backend'),
 (23,30,'Manager',14,19,'Manager'),
 (24,23,'Administrator',15,18,'Administrator'),
 (25,24,'Super Administrator',16,17,'Super Administrator');
/*!40000 ALTER TABLE `jos_core_acl_aro_groups` ENABLE KEYS */;


--
-- Definition of table `jos_core_acl_aro_map`
--

DROP TABLE IF EXISTS `jos_core_acl_aro_map`;
CREATE TABLE `jos_core_acl_aro_map` (
  `acl_id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default '0',
  `value` varchar(100) NOT NULL,
  PRIMARY KEY  (`acl_id`,`section_value`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_acl_aro_map`
--

/*!40000 ALTER TABLE `jos_core_acl_aro_map` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_core_acl_aro_map` ENABLE KEYS */;


--
-- Definition of table `jos_core_acl_aro_sections`
--

DROP TABLE IF EXISTS `jos_core_acl_aro_sections`;
CREATE TABLE `jos_core_acl_aro_sections` (
  `id` int(11) NOT NULL auto_increment,
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `jos_gacl_value_aro_sections` (`value`),
  KEY `jos_gacl_hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_acl_aro_sections`
--

/*!40000 ALTER TABLE `jos_core_acl_aro_sections` DISABLE KEYS */;
INSERT INTO `jos_core_acl_aro_sections` (`id`,`value`,`order_value`,`name`,`hidden`) VALUES 
 (10,'users',1,'Users',0);
/*!40000 ALTER TABLE `jos_core_acl_aro_sections` ENABLE KEYS */;


--
-- Definition of table `jos_core_acl_groups_aro_map`
--

DROP TABLE IF EXISTS `jos_core_acl_groups_aro_map`;
CREATE TABLE `jos_core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '',
  `aro_id` int(11) NOT NULL default '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_acl_groups_aro_map`
--

/*!40000 ALTER TABLE `jos_core_acl_groups_aro_map` DISABLE KEYS */;
INSERT INTO `jos_core_acl_groups_aro_map` (`group_id`,`section_value`,`aro_id`) VALUES 
 (18,'',11),
 (18,'',12),
 (18,'',13),
 (18,'',14),
 (18,'',15),
 (18,'',16),
 (18,'',17),
 (18,'',18),
 (18,'',19),
 (18,'',20),
 (25,'',10);
/*!40000 ALTER TABLE `jos_core_acl_groups_aro_map` ENABLE KEYS */;


--
-- Definition of table `jos_core_log_items`
--

DROP TABLE IF EXISTS `jos_core_log_items`;
CREATE TABLE `jos_core_log_items` (
  `time_stamp` date NOT NULL default '0000-00-00',
  `item_table` varchar(50) NOT NULL default '',
  `item_id` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_log_items`
--

/*!40000 ALTER TABLE `jos_core_log_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_core_log_items` ENABLE KEYS */;


--
-- Definition of table `jos_core_log_searches`
--

DROP TABLE IF EXISTS `jos_core_log_searches`;
CREATE TABLE `jos_core_log_searches` (
  `search_term` varchar(128) NOT NULL default '',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_core_log_searches`
--

/*!40000 ALTER TABLE `jos_core_log_searches` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_core_log_searches` ENABLE KEYS */;


--
-- Definition of table `jos_dev_articles`
--

DROP TABLE IF EXISTS `jos_dev_articles`;
CREATE TABLE `jos_dev_articles` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` varchar(100) NOT NULL default '',
  `title` varchar(100) NOT NULL default '',
  `article` text NOT NULL,
  `author` text NOT NULL,
  `createdate` datetime NOT NULL default '0000-00-00 00:00:00',
  `addedby` varchar(20) NOT NULL default '',
  `params` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(10) unsigned NOT NULL default '0',
  `hits` int(10) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_dev_articles`
--

/*!40000 ALTER TABLE `jos_dev_articles` DISABLE KEYS */;
INSERT INTO `jos_dev_articles` (`id`,`category`,`title`,`article`,`author`,`createdate`,`addedby`,`params`,`checked_out`,`checked_out_time`,`ordering`,`hits`,`published`) VALUES 
 (2,'21','database','database programmig with java is very easy to connect with any database .','Administrator','2009-03-05 20:25:02','server','',0,'0000-00-00 00:00:00',0,0,1),
 (3,'20','Begining Of HTML','HTML AND HTTP  were both invented by Tim Berners-Lee, who was then working as a computer and networkin g specialist at a Swiss research instituted. He wanted to give the institute\'s researchers as simple markup language that would enable them to share their research parpers via the Internet. Berners-Lee based HTML on Standard Generalize Markup Language (SGML), an internationa statndard for marking up text for presentation on a variety of physical devices. The basic idea of SGML is that the document\'s structure should be separeted from its presentation.','Administrator','2009-03-07 11:54:31','server','',0,'0000-00-00 00:00:00',0,0,1),
 (4,'36','About Joomla','Joomla! is a modular and extensible PHP MySQL CMS. Joomla! is an open-source project, which is released under version 2 of the GPL license. Joomla! has fast become one of the most popular open-source CMS, as is proved by its numerous awards and massive online community.','Hrishikesh','2009-03-07 16:17:29','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,1);
/*!40000 ALTER TABLE `jos_dev_articles` ENABLE KEYS */;


--
-- Definition of table `jos_dev_categories`
--

DROP TABLE IF EXISTS `jos_dev_categories`;
CREATE TABLE `jos_dev_categories` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` varchar(100) NOT NULL default '',
  `about` text NOT NULL,
  `image` varchar(100) NOT NULL default '',
  `params` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(10) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_dev_categories`
--

/*!40000 ALTER TABLE `jos_dev_categories` DISABLE KEYS */;
INSERT INTO `jos_dev_categories` (`id`,`category`,`about`,`image`,`params`,`checked_out`,`checked_out_time`,`ordering`,`published`) VALUES 
 (19,'Perl','Perl programing','','',0,'0000-00-00 00:00:00',0,1),
 (20,'HTML','Html programing','3-d124e.jpg','',0,'0000-00-00 00:00:00',0,1),
 (21,'Java','java programing','','',0,'0000-00-00 00:00:00',0,1),
 (22,'C','C programming','','',0,'0000-00-00 00:00:00',0,1),
 (23,'C++','C++  programming','','',0,'0000-00-00 00:00:00',0,1),
 (24,'PHP','PhP programming.','','',0,'0000-00-00 00:00:00',0,1),
 (25,'OS','','0101_061208.jpg','',0,'0000-00-00 00:00:00',0,1),
 (26,'ADA','','','',0,'0000-00-00 00:00:00',0,1),
 (27,'C#.NET','','','',0,'0000-00-00 00:00:00',0,1),
 (29,'C++.NET','','','',0,'0000-00-00 00:00:00',0,1),
 (30,'JavaScript','','','',0,'0000-00-00 00:00:00',0,1),
 (31,'DHTML','','','',0,'0000-00-00 00:00:00',0,1),
 (32,'FoxPro','','','',0,'0000-00-00 00:00:00',0,1),
 (33,'Assembly Lng','','','',0,'0000-00-00 00:00:00',0,1),
 (34,'Ajax','','','',0,'0000-00-00 00:00:00',0,1),
 (35,'AutoCAD','','','',0,'0000-00-00 00:00:00',0,1),
 (36,'joomla','joomla programming for web development.','0101_061208.jpg','',0,'0000-00-00 00:00:00',0,1),
 (37,'CSS','','','',0,'0000-00-00 00:00:00',0,1),
 (38,'Linux','','','',0,'0000-00-00 00:00:00',0,1);
/*!40000 ALTER TABLE `jos_dev_categories` ENABLE KEYS */;


--
-- Definition of table `jos_dev_codefile`
--

DROP TABLE IF EXISTS `jos_dev_codefile`;
CREATE TABLE `jos_dev_codefile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `category` varchar(100) NOT NULL default '',
  `title` varchar(100) NOT NULL default '',
  `description` text NOT NULL,
  `codefile` varchar(100) NOT NULL default '',
  `creationdate` datetime NOT NULL default '0000-00-00 00:00:00',
  `addedby` varchar(20) NOT NULL default '',
  `params` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(10) unsigned NOT NULL default '0',
  `hits` int(10) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_dev_codefile`
--

/*!40000 ALTER TABLE `jos_dev_codefile` DISABLE KEYS */;
INSERT INTO `jos_dev_codefile` (`id`,`category`,`title`,`description`,`codefile`,`creationdate`,`addedby`,`params`,`checked_out`,`checked_out_time`,`ordering`,`hits`,`published`) VALUES 
 (2,'22','C DataStucture','data-stucture','devzone_2_codefile.zip','2009-03-05 19:29:12','server','',0,'0000-00-00 00:00:00',0,0,1),
 (3,'25','operation system code','','devzone_3_codefile.zip','2009-03-06 18:19:34','server','',0,'0000-00-00 00:00:00',0,0,1),
 (4,'22','C variables','When the formatting need to change, the CSS document alone can be updated, and the changes are then reflected in all documents that use that style sheet. The \"cascade\" in  the name refers to the featue that allows styles to be overridden by subsequest styles. For example, the HR deparment Web pages. for Acme Inc. can use the company style sheet but also use styles specific for the individual department. The result is that all of the Aceme Inc. can use the company style sheet.','devzone_4_keyboard.zip','2009-03-07 08:42:21','server','',0,'0000-00-00 00:00:00',0,0,1),
 (5,'','','','','2009-03-07 13:18:39','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (6,'','','','','2009-03-07 13:20:07','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (7,'','','','','2009-03-07 13:21:24','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (8,'19','Perl with NotePad','','','2009-03-07 13:26:10','server','',0,'0000-00-00 00:00:00',0,0,1),
 (9,'19','C++ Program','','devzone_9_notepad++.zip','2009-03-07 13:27:25','server','',0,'0000-00-00 00:00:00',0,0,0),
 (10,'','','','','2009-03-07 13:28:15','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (11,'','','','','2009-03-07 13:28:26','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (12,'','','','','2009-03-07 13:32:02','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (13,'','','','','2009-03-07 13:32:14','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (14,'','','','devzone_14_notepad++.zip','2009-03-07 13:32:26','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (15,'','','','devzone_15_notepad++.zip','2009-03-07 13:34:02','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (16,'','','','devzone_16_notepad++.zip','2009-03-07 13:34:14','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (17,'','','','devzone_17_notepad++.zip','2009-03-07 13:34:23','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (18,'21','Java with notepad','The is java code update by hrishikesh','devzone_18_notepad++.zip','2009-03-07 13:35:10','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (19,'21','Java with notepad','The is java code update by hrishikesh','devzone_19_notepad++.zip','2009-03-07 13:35:34','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (20,'21','Java with notepad','The is java code update by hrishikesh','devzone_20_notepad++.zip','2009-03-07 13:38:18','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0),
 (21,'31','Dhtml Programin with notepad++ ','this is notepade, it will use in DHTML programming.','devzone_21_notepad++.zip','2009-03-07 13:39:30','127.0.0.1','',0,'0000-00-00 00:00:00',0,0,0);
/*!40000 ALTER TABLE `jos_dev_codefile` ENABLE KEYS */;


--
-- Definition of table `jos_easybook`
--

DROP TABLE IF EXISTS `jos_easybook`;
CREATE TABLE `jos_easybook` (
  `id` int(10) NOT NULL auto_increment,
  `gbip` varchar(15) NOT NULL default '',
  `gbname` varchar(40) NOT NULL default '',
  `gbmail` varchar(60) default NULL,
  `gbmailshow` tinyint(1) NOT NULL default '0',
  `gbloca` varchar(50) default NULL,
  `gbpage` varchar(150) default NULL,
  `gbvote` int(10) default NULL,
  `gbtext` text NOT NULL,
  `gbdate` datetime default NULL,
  `gbcomment` text,
  `published` tinyint(1) NOT NULL default '0',
  `gbicq` varchar(20) default NULL,
  `gbaim` varchar(50) default NULL,
  `gbmsn` varchar(50) default NULL,
  `gbyah` varchar(50) default NULL,
  `gbskype` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_easybook`
--

/*!40000 ALTER TABLE `jos_easybook` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_easybook` ENABLE KEYS */;


--
-- Definition of table `jos_easybook_badwords`
--

DROP TABLE IF EXISTS `jos_easybook_badwords`;
CREATE TABLE `jos_easybook_badwords` (
  `id` int(10) NOT NULL auto_increment,
  `word` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=534 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_easybook_badwords`
--

/*!40000 ALTER TABLE `jos_easybook_badwords` DISABLE KEYS */;
INSERT INTO `jos_easybook_badwords` (`id`,`word`) VALUES 
 (2,'analdrilling'),
 (3,'20six'),
 (4,'ndsfrwudG'),
 (5,'Tadalafil'),
 (6,'hosting'),
 (7,'avacor'),
 (8,'gation'),
 (9,'ruptcy'),
 (10,'obli'),
 (11,'morta'),
 (12,'remoV'),
 (13,'fffd5'),
 (14,'ffffd5'),
 (15,'Wavefrt'),
 (16,'Cialis'),
 (17,'eyebrow-upper-left-corner'),
 (18,'B0000AZJVC'),
 (19,'right-topnav-default-2'),
 (20,'edit1'),
 (21,'display-variation'),
 (22,'erection'),
 (23,'wvvvvv'),
 (24,'mpage.jp'),
 (25,'20six.de'),
 (26,'o o o o o o o o o o o o o'),
 (27,'aasgeier'),
 (28,'abspritzer'),
 (29,'sdfds'),
 (30,'ackerfresse'),
 (31,'affenarsch'),
 (32,'affenhirn'),
 (33,'affenkotze'),
 (34,'afterlecker'),
 (35,'aktivex.info'),
 (36,'almosenarsch'),
 (37,'amazing'),
 (38,'am-sperma-riecher'),
 (39,'anal*'),
 (40,'analadmiral'),
 (41,'analbesamer'),
 (42,'analbohrer'),
 (43,'analdrill'),
 (44,'analentjungferer'),
 (45,'analerotiker'),
 (46,'analfetischist'),
 (47,'analförster'),
 (48,'anal-frosch'),
 (49,'analnegerdildo'),
 (50,'analratte'),
 (51,'analritter'),
 (52,'aok-chopper'),
 (53,'armleuchter'),
 (54,'arsch'),
 (55,'arschaufreißer'),
 (56,'arschbackenschänder'),
 (57,'arschbesamer'),
 (58,'ärsche'),
 (59,'arschentjungferer'),
 (60,'arschficker'),
 (61,'arschgeburt'),
 (62,'arschgefickte gummifotze'),
 (63,'arschgeige'),
 (64,'arschgesicht'),
 (65,'arschhaarfetischist'),
 (66,'arschhaarrasierer'),
 (67,'arschhöhlenforscher'),
 (68,'arschkrampe'),
 (69,'arschkratzer'),
 (70,'arschlecker'),
 (71,'arschloch'),
 (72,'arschlöcher'),
 (73,'arschmade'),
 (74,'arschratte'),
 (75,'arschzapfen'),
 (76,'arsebandit'),
 (77,'arsehole'),
 (78,'arsejockey'),
 (79,'arselicker'),
 (80,'arsenuts'),
 (81,'arsewipe'),
 (82,'assel'),
 (83,'assfuck'),
 (84,'assfucking'),
 (85,'assgrabber'),
 (86,'asshol'),
 (87,'asshole'),
 (88,'asshole'),
 (89,'assi'),
 (90,'assrammer'),
 (91,'assreamer'),
 (92,'asswipe'),
 (93,'astlochficker'),
 (94,'auspufflutscher'),
 (95,'bad motherfucker'),
 (96,'badass'),
 (97,'badenutte'),
 (98,'bananenstecker'),
 (99,'bastard'),
 (100,'bastard'),
 (101,'bauernschlampe'),
 (102,'beating the meat'),
 (103,'beef curtains'),
 (104,'beef flaps'),
 (105,'behindis'),
 (106,'bekloppter'),
 (107,'muttergeficktes'),
 (108,'beklopter'),
 (109,'bettnässer'),
 (110,'betrüger'),
 (111,'Betrüger'),
 (112,'bettpisser'),
 (113,'bettspaltenficker'),
 (114,'biatch'),
 (115,'bimbo'),
 (116,'bitch'),
 (117,'bitches'),
 (118,'bitchnutte'),
 (119,'bitsch'),
 (120,'bizzach'),
 (121,'blechfotze'),
 (122,'blödmann'),
 (123,'blogspoint'),
 (124,'blow job'),
 (125,'bohnenfresser'),
 (126,'boob'),
 (127,'boobes'),
 (128,'boobie'),
 (129,'boobies'),
 (130,'boobs'),
 (131,'booby'),
 (132,'boy love'),
 (133,'breasts'),
 (134,'brechfurz'),
 (135,'bückfleisch'),
 (136,'bückstück'),
 (137,'bückvieh'),
 (138,'buggery'),
 (139,'bullensohn'),
 (140,'bullshit'),
 (141,'bummsen'),
 (142,'bumsen'),
 (143,'bumsklumpen'),
 (144,'buschnutte'),
 (145,'busty'),
 (146,'butt pirate'),
 (147,'buttfuc'),
 (148,'buttfuck'),
 (149,'buttfucker'),
 (150,'buttfucking'),
 (151,'carpet muncher'),
 (152,'carpet munchers'),
 (153,'carpetlicker'),
 (154,'carpetlickers'),
 (155,'chausohn'),
 (156,'clitsuck'),
 (157,'clitsucker'),
 (158,'clitsucking'),
 (159,'cock'),
 (160,'cock sucker'),
 (161,'cockpouch'),
 (162,'cracka'),
 (163,'crap'),
 (164,'craper'),
 (165,'crapers'),
 (166,'crapping'),
 (167,'craps'),
 (168,'cunt'),
 (169,'cunt'),
 (170,'cunts'),
 (171,'dachlattengesicht'),
 (172,'dackelficker'),
 (173,'dickhead'),
 (174,'dicklicker'),
 (175,'diplomarschloch'),
 (176,'doofi'),
 (177,'douglette'),
 (178,'drecksack'),
 (179,'drecksau'),
 (180,'dreckschlitz'),
 (181,'dreckschüppengesicht'),
 (182,'drecksfotze'),
 (183,'drecksmösendagmar'),
 (184,'drecksnigger'),
 (185,'drecksnutte'),
 (186,'dreckspack'),
 (187,'dreckstürke'),
 (188,'dreckvotze'),
 (189,'dumbo'),
 (190,'dummschwätzer'),
 (191,'dumpfbacke'),
 (192,'dünnpfifftrinker'),
 (193,'eichellecker'),
 (194,'eierkopf'),
 (195,'eierlutscher'),
 (196,'eiswürfelpisser'),
 (197,'ejaculate'),
 (198,'entenfisterer'),
 (199,'epilepi'),
 (200,'epilepis'),
 (201,'epileppis'),
 (202,'fagette'),
 (203,'fagitt'),
 (204,'fäkalerotiker'),
 (205,'faltenficker'),
 (206,'fatass'),
 (207,'ferkelficker'),
 (208,'ferkel-ficker'),
 (209,'fettarsch'),
 (210,'fettsack'),
 (211,'fettsau'),
 (212,'feuchtwichser'),
 (213,'fick'),
 (214,'fick*'),
 (215,'fickarsch'),
 (216,'fickdreck'),
 (217,'ficken'),
 (218,'ficker'),
 (219,'fickfehler'),
 (220,'fickfetzen'),
 (221,'fickfresse'),
 (222,'fickfrosch'),
 (223,'fickfucker'),
 (224,'fickgelegenheit'),
 (225,'fickgesicht'),
 (226,'fickmatratze'),
 (227,'ficknudel'),
 (228,'ficksau'),
 (229,'fickschlitz'),
 (230,'fickschnitte'),
 (231,'fickschnitzel'),
 (232,'fingerfuck'),
 (233,'fingerfucking'),
 (234,'fisch-stinkender hodenfresser'),
 (235,'fistfuck'),
 (236,'fistfucking'),
 (237,'flachtitte'),
 (238,'flussfotze'),
 (239,'fotze'),
 (240,'fotzenforscher'),
 (241,'fotzenfresse'),
 (242,'fotzenknecht'),
 (243,'fotzenkruste'),
 (244,'fotzenkuchen'),
 (245,'fotzenlecker'),
 (246,'fotzenlöckchen'),
 (247,'fotzenpisser'),
 (248,'fotzenschmuser'),
 (249,'fotzhobel'),
 (250,'frisösenficker'),
 (251,'frisösenfotze'),
 (252,'fritzfink'),
 (253,'froschfotze'),
 (254,'froschfotzenficker'),
 (255,'froschfotzenleder'),
 (256,'fuck'),
 (257,'fucked'),
 (258,'fucker'),
 (259,'fucker'),
 (260,'fucking'),
 (261,'fuckup'),
 (262,'fudgepacker'),
 (263,'futtgesicht'),
 (264,'gay lord'),
 (265,'geilriemen'),
 (266,'gesichtsfotze'),
 (267,'göring'),
 (268,'großmaul'),
 (269,'gummifotzenficker'),
 (270,'gummipuppenbumser'),
 (271,'gummisklave'),
 (272,'hackfresse'),
 (273,'hafensau'),
 (274,'hartgeldhure'),
 (275,'heil hitler'),
 (276,'hi hoper'),
 (277,'hinterlader'),
 (278,'hirni'),
 (279,'hitler'),
 (280,'hodenbeißer'),
 (281,'hodensohn'),
 (282,'homo'),
 (283,'hosenpisser'),
 (284,'hosenscheißer'),
 (285,'hühnerficker'),
 (286,'huhrensohn'),
 (287,'hundeficker'),
 (288,'hundesohn'),
 (289,'hurenlecker'),
 (290,'hurenpeter'),
 (291,'hurensohn'),
 (292,'hurentocher'),
 (293,'idiot'),
 (294,'idioten'),
 (295,'itakker'),
 (296,'ittaker'),
 (297,'jack off'),
 (298,'jackass'),
 (299,'jackshit'),
 (300,'jerk off'),
 (301,'jizz'),
 (302,'judensau'),
 (303,'kackarsch'),
 (304,'kacke'),
 (305,'kacken'),
 (306,'kackfass'),
 (307,'kackfresse'),
 (308,'kacknoob'),
 (309,'kaktusficker'),
 (310,'kanacke'),
 (311,'kanake'),
 (312,'kanaken'),
 (313,'kanaldeckelbefruchter'),
 (314,'kartoffelficker'),
 (315,'kinderficken'),
 (316,'kinderficker'),
 (317,'kinderporno'),
 (318,'kitzler fresser'),
 (319,'klapposkop'),
 (320,'klolecker'),
 (321,'klötenlutscher'),
 (322,'knoblauchfresser'),
 (323,'konzentrationslager'),
 (324,'kotgeburt'),
 (325,'kotnascher'),
 (326,'kümmeltürke'),
 (327,'kümmeltürken'),
 (328,'lackaffe'),
 (329,'lebensunwert'),
 (330,'lesbian'),
 (331,'lurchi'),
 (332,'lustbolzen'),
 (333,'lutscher'),
 (334,'magerschwanz'),
 (335,'manwhore'),
 (336,'masturbate'),
 (337,'meat puppet'),
 (338,'missgeburt'),
 (339,'mißgeburt'),
 (340,'mistsau'),
 (341,'miststück'),
 (342,'mitternachtsficker'),
 (343,'mohrenkopf'),
 (344,'mokkastübchenveredler'),
 (345,'mongo'),
 (346,'möse'),
 (347,'mösenficker'),
 (348,'mösenlecker'),
 (349,'mösenputzer'),
 (350,'möter'),
 (351,'mother fucker'),
 (352,'mother fucking'),
 (353,'motherfucker'),
 (354,'muschilecker'),
 (355,'muschischlitz'),
 (356,'mutterficker'),
 (357,'nazi'),
 (358,'nazis'),
 (359,'neger'),
 (360,'nigga'),
 (361,'nigger'),
 (362,'niggerlover'),
 (363,'niggers'),
 (364,'niggerschlampe'),
 (365,'nignog'),
 (366,'nippelsauger'),
 (367,'nutte'),
 (368,'nuttensohn'),
 (369,'nuttenstecher'),
 (370,'nuttentochter'),
 (371,'ochsenpimmel'),
 (372,'ölauge'),
 (373,'oral sex'),
 (374,'penis licker'),
 (375,'penis licking'),
 (376,'penis sucker'),
 (377,'penis sucking'),
 (378,'penis'),
 (379,'peniskopf'),
 (380,'penislecker'),
 (381,'penislutscher'),
 (382,'penissalat'),
 (383,'penner'),
 (384,'pferdearsch'),
 (385,'phentermine'),
 (386,'pimmel'),
 (387,'pimmelkopf'),
 (388,'pimmellutscher'),
 (389,'pimmelpirat'),
 (390,'pimmelprinz'),
 (391,'pimmelschimmel'),
 (392,'pimmelvinni'),
 (393,'pindick'),
 (394,'piss off'),
 (395,'piss'),
 (396,'pissbirne'),
 (397,'pissbotte'),
 (398,'pisse'),
 (399,'pisser'),
 (400,'pissetrinker'),
 (401,'pissfisch'),
 (402,'pissflitsche'),
 (403,'pissnelke'),
 (404,'polacke'),
 (405,'polacken'),
 (406,'poop'),
 (407,'popellfresser'),
 (408,'popostecker'),
 (409,'popunterlage'),
 (410,'porn'),
 (411,'porno'),
 (412,'pornografie'),
 (413,'pornoprengel'),
 (414,'pottsau'),
 (415,'prärieficker'),
 (416,'prick'),
 (417,'quiff'),
 (418,'randsteinwichser'),
 (419,'rasierte votzen'),
 (420,'rimjob'),
 (421,'rindsriemen'),
 (422,'ritzenfummler'),
 (423,'rollbrooden'),
 (424,'roseten putzer'),
 (425,'roseten schlemmer'),
 (426,'rosettenhengst'),
 (427,'rosettenkönig'),
 (428,'rosettenlecker'),
 (429,'rosettentester'),
 (430,'sackfalter'),
 (431,'sackgesicht'),
 (432,'sacklutscher'),
 (433,'sackratte'),
 (434,'saftarsch'),
 (435,'sakfalter'),
 (436,'schamhaarlecker'),
 (437,'schamhaarschädel'),
 (438,'schandmaul'),
 (439,'scheisse'),
 (440,'scheisser'),
 (441,'scheissgesicht'),
 (442,'scheisshaufen'),
 (443,'scheißhaufen'),
 (444,'schlammfotze'),
 (445,'schlampe'),
 (446,'schleimmöse'),
 (447,'schlitzpisser'),
 (448,'schmalspurficker'),
 (449,'schmeue'),
 (450,'schmuckbert'),
 (451,'schnuddelfresser'),
 (452,'schnurbeltatz'),
 (453,'schrumpelfotze'),
 (454,'schwanzlurch'),
 (455,'schwanzlutscher'),
 (456,'schweinepriester'),
 (457,'schweineschwanzlutscher'),
 (458,'schwuchtel'),
 (459,'schwutte'),
 (460,'sex'),
 (461,'shiter'),
 (462,'shiting'),
 (463,'shitlist'),
 (464,'shitomatic'),
 (465,'shits'),
 (466,'shitty'),
 (467,'shlong'),
 (468,'shut the fuckup'),
 (469,'sieg heil'),
 (470,'sitzpisser'),
 (471,'skullfuck'),
 (472,'skullfucker'),
 (473,'skullfucking'),
 (474,'slut'),
 (475,'smegmafresser'),
 (476,'spack'),
 (477,'spacko'),
 (478,'spaghettifresser'),
 (479,'spastard'),
 (480,'spasti'),
 (481,'spastis'),
 (482,'spermafresse'),
 (483,'spermarutsche'),
 (484,'spritzer'),
 (485,'stinkschlitz'),
 (486,'stricher'),
 (487,'suck my cock'),
 (488,'suck my dick'),
 (489,'threesome'),
 (490,'tittenficker'),
 (491,'tittenspritzer'),
 (492,'titties'),
 (493,'titty'),
 (494,'tunte'),
 (495,'untermensch'),
 (496,'vagina'),
 (497,'vergasen'),
 (498,'viagra'),
 (499,'volldepp'),
 (500,'volldeppen'),
 (501,'vollhorst'),
 (502,'vollidiot'),
 (503,'vollpfosten'),
 (504,'vollspack'),
 (505,'vollspacken'),
 (506,'vollspasti'),
 (507,'vorhaut'),
 (508,'votze'),
 (509,'votzenkopf'),
 (510,'wanker'),
 (511,'wankers'),
 (512,'weichei'),
 (513,'whoar'),
 (514,'whore'),
 (515,'wichsbart'),
 (516,'wichsbirne'),
 (517,'wichser'),
 (518,'wichsfrosch'),
 (519,'wichsgriffel'),
 (520,'wichsvorlage'),
 (521,'wickspickel'),
 (522,'wixa'),
 (523,'wixen'),
 (524,'wixer'),
 (525,'wixxer'),
 (526,'wixxxer'),
 (527,'wixxxxer'),
 (528,'wurstsemmelfresser'),
 (529,'yankee'),
 (530,'zappler'),
 (531,'zyclon b'),
 (532,'zyklon b'),
 (533,'x x x');
/*!40000 ALTER TABLE `jos_easybook_badwords` ENABLE KEYS */;


--
-- Definition of table `jos_easycaptchas`
--

DROP TABLE IF EXISTS `jos_easycaptchas`;
CREATE TABLE `jos_easycaptchas` (
  `id` int(10) NOT NULL auto_increment,
  `name` varchar(70) NOT NULL default '0',
  `description` text,
  `published` tinyint(3) NOT NULL default '0',
  `params` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_easycaptchas`
--

/*!40000 ALTER TABLE `jos_easycaptchas` DISABLE KEYS */;
INSERT INTO `jos_easycaptchas` (`id`,`name`,`description`,`published`,`params`) VALUES 
 (1,'Secimg-Captcha','This captcha generates an image with a small mathematic task, which has to be solved by the user. This Captcha does not require any graphic librarys.',1,'random_min=100000\nrandom_max=999999\n\n'),
 (2,'Dpaulus-Captcha','This captcha generates an image with several numbers which have to be entered. This Captcha requires the GD library with freetype-support.',0,'random_min=100000\nrandom_max=999999\n\n');
/*!40000 ALTER TABLE `jos_easycaptchas` ENABLE KEYS */;


--
-- Definition of table `jos_easycaptchas_dpaulus`
--

DROP TABLE IF EXISTS `jos_easycaptchas_dpaulus`;
CREATE TABLE `jos_easycaptchas_dpaulus` (
  `CodeID` varchar(6) NOT NULL default '',
  `CodeMD5` varchar(32) NOT NULL default '',
  `codedate` decimal(14,0) NOT NULL default '0',
  PRIMARY KEY  (`CodeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_easycaptchas_dpaulus`
--

/*!40000 ALTER TABLE `jos_easycaptchas_dpaulus` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_easycaptchas_dpaulus` ENABLE KEYS */;


--
-- Definition of table `jos_easycaptchas_secimg`
--

DROP TABLE IF EXISTS `jos_easycaptchas_secimg`;
CREATE TABLE `jos_easycaptchas_secimg` (
  `CodeID` varchar(6) NOT NULL default '',
  `ImageID` varchar(32) NOT NULL default '',
  `codedate` decimal(14,0) NOT NULL default '0',
  PRIMARY KEY  (`CodeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_easycaptchas_secimg`
--

/*!40000 ALTER TABLE `jos_easycaptchas_secimg` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_easycaptchas_secimg` ENABLE KEYS */;


--
-- Definition of table `jos_groups`
--

DROP TABLE IF EXISTS `jos_groups`;
CREATE TABLE `jos_groups` (
  `id` tinyint(3) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_groups`
--

/*!40000 ALTER TABLE `jos_groups` DISABLE KEYS */;
INSERT INTO `jos_groups` (`id`,`name`) VALUES 
 (0,'Public'),
 (1,'Registered'),
 (2,'Special');
/*!40000 ALTER TABLE `jos_groups` ENABLE KEYS */;


--
-- Definition of table `jos_guestbook`
--

DROP TABLE IF EXISTS `jos_guestbook`;
CREATE TABLE `jos_guestbook` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `message` text NOT NULL,
  `created_by` int(10) unsigned NOT NULL,
  `location` varchar(45) default NULL,
  `created` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `userip` varchar(16) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_guestbook`
--

/*!40000 ALTER TABLE `jos_guestbook` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_guestbook` ENABLE KEYS */;


--
-- Definition of table `jos_hello`
--

DROP TABLE IF EXISTS `jos_hello`;
CREATE TABLE `jos_hello` (
  `id` int(11) NOT NULL auto_increment,
  `greeting` varchar(25) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_hello`
--

/*!40000 ALTER TABLE `jos_hello` DISABLE KEYS */;
INSERT INTO `jos_hello` (`id`,`greeting`) VALUES 
 (1,'Hello, World!'),
 (2,'Bonjour, Monde!'),
 (3,'Ciao, Mondo!');
/*!40000 ALTER TABLE `jos_hello` ENABLE KEYS */;


--
-- Definition of table `jos_joomap_backup`
--

DROP TABLE IF EXISTS `jos_joomap_backup`;
CREATE TABLE `jos_joomap_backup` (
  `version` varchar(255) default NULL,
  `classname` varchar(255) default NULL,
  `expand_category` int(11) default NULL,
  `expand_section` int(11) default NULL,
  `show_menutitle` int(11) default NULL,
  `columns` int(11) default NULL,
  `exlinks` int(11) default NULL,
  `ext_image` varchar(255) default NULL,
  `menus` text,
  `exclmenus` varchar(255) default NULL,
  `includelink` int(11) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_joomap_backup`
--

/*!40000 ALTER TABLE `jos_joomap_backup` DISABLE KEYS */;
INSERT INTO `jos_joomap_backup` (`version`,`classname`,`expand_category`,`expand_section`,`show_menutitle`,`columns`,`exlinks`,`ext_image`,`menus`,`exclmenus`,`includelink`) VALUES 
 ('2.0','sitemap',1,1,1,1,1,'img_grey.gif','ExamplePages,0,1\nmainmenu,1,1\nhrihikesh,2,1\nothermenu,3,1\nkeyconcepts,4,1\ntopmenu,5,1\nusermenu,6,1','',0);
/*!40000 ALTER TABLE `jos_joomap_backup` ENABLE KEYS */;


--
-- Definition of table `jos_mat_msg`
--

DROP TABLE IF EXISTS `jos_mat_msg`;
CREATE TABLE `jos_mat_msg` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sender` varchar(100) NOT NULL default '',
  `receiver` varchar(100) NOT NULL default '',
  `title` varchar(50) NOT NULL default '',
  `msg` text NOT NULL,
  `sdate` datetime NOT NULL default '0000-00-00 00:00:00',
  `ipaddress` varchar(45) NOT NULL default '',
  `params` text NOT NULL,
  `ordering` int(10) unsigned NOT NULL default '0',
  `read` tinyint(1) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_mat_msg`
--

/*!40000 ALTER TABLE `jos_mat_msg` DISABLE KEYS */;
INSERT INTO `jos_mat_msg` (`id`,`sender`,`receiver`,`title`,`msg`,`sdate`,`ipaddress`,`params`,`ordering`,`read`,`published`) VALUES 
 (1,'rakesh','shipra','raj','hello kumar, this is hrishikesh.','2009-03-01 21:18:56','127.0.0.1','',0,0,1),
 (2,'hrishikesh','rajan','hello','this is hrishikesh.','2009-03-02 14:32:21','127.0.0.1','',0,0,1),
 (3,'hrishikesh','mantu','hello','hello bos','2009-03-03 19:38:14','127.0.0.1','',0,0,1),
 (4,'mantu','kangana','ok','this is hrihsikesh.','2009-03-04 02:24:34','','',0,0,1),
 (5,'rakesh','karisma','Joomla','joomla is a cms system. please read about it.','2009-03-04 03:01:16','server','',0,0,1);
/*!40000 ALTER TABLE `jos_mat_msg` ENABLE KEYS */;


--
-- Definition of table `jos_mat_profile`
--

DROP TABLE IF EXISTS `jos_mat_profile`;
CREATE TABLE `jos_mat_profile` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` varchar(50) NOT NULL default '',
  `pcby` varchar(45) NOT NULL default '',
  `gender` varchar(20) NOT NULL default '',
  `mstatus` varchar(20) NOT NULL default '',
  `weight` varchar(30) NOT NULL default '',
  `age` varchar(30) NOT NULL default '',
  `bodytype` varchar(45) NOT NULL default '',
  `complexion` varchar(45) NOT NULL default '',
  `height` varchar(30) NOT NULL default '',
  `mothertongue` varchar(45) NOT NULL default '',
  `community` varchar(50) NOT NULL default '',
  `zodic` varchar(20) NOT NULL default '',
  `manglik` varchar(20) NOT NULL default '',
  `education` varchar(45) NOT NULL default '',
  `specificdegree` varchar(200) NOT NULL default '',
  `profession` varchar(100) NOT NULL default '',
  `monthlyincome` varchar(100) NOT NULL default '',
  `familyvalue` varchar(45) NOT NULL default '',
  `diet` varchar(20) NOT NULL default '',
  `smoke` varchar(20) NOT NULL default '',
  `drink` varchar(20) NOT NULL default '',
  `bloodgroup` varchar(10) NOT NULL default '',
  `hobbies` varchar(200) NOT NULL default '',
  `about` text NOT NULL,
  `location` varchar(100) NOT NULL default '',
  `city` varchar(25) NOT NULL default '',
  `state` varchar(25) NOT NULL default '',
  `phone` varchar(50) NOT NULL default '',
  `mobile` varchar(50) NOT NULL default '',
  `image` varchar(200) NOT NULL default '',
  `lfheight1` varchar(50) NOT NULL default '',
  `lfheight2` varchar(50) NOT NULL default '',
  `lfage1` varchar(10) NOT NULL default '',
  `lfage2` varchar(45) NOT NULL default '',
  `lfmstatus` varchar(50) NOT NULL default '',
  `lfcommunity` varchar(50) NOT NULL default '',
  `lfmothertongue` varchar(50) NOT NULL default '',
  `lfmanglik` varchar(50) NOT NULL default '',
  `lfprofession` varchar(100) NOT NULL default '',
  `lfcomplexion` varchar(45) NOT NULL default '',
  `lfotherrequirement` text,
  `params` text NOT NULL,
  `ordering` int(10) unsigned NOT NULL default '0',
  `hits` int(10) unsigned NOT NULL default '0',
  `published` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jos_mat_profile`
--

/*!40000 ALTER TABLE `jos_mat_profile` DISABLE KEYS */;
INSERT INTO `jos_mat_profile` (`id`,`userid`,`pcby`,`gender`,`mstatus`,`weight`,`age`,`bodytype`,`complexion`,`height`,`mothertongue`,`community`,`zodic`,`manglik`,`education`,`specificdegree`,`profession`,`monthlyincome`,`familyvalue`,`diet`,`smoke`,`drink`,`bloodgroup`,`hobbies`,`about`,`location`,`city`,`state`,`phone`,`mobile`,`image`,`lfheight1`,`lfheight2`,`lfage1`,`lfage2`,`lfmstatus`,`lfcommunity`,`lfmothertongue`,`lfmanglik`,`lfprofession`,`lfcomplexion`,`lfotherrequirement`,`params`,`ordering`,`hits`,`published`) VALUES 
 (3,'shipra','self','female','Never Married','55-to-60','18','average','Fair','210','Hindi','hindu','cancer','No','Masters','','Not working','10000','Moderate','Veg','No','No','O+','reading','hello world i am computer engineer. and working with the microsoft for last 10 years. And want to become computer scientist.','siliguri','siliguri','West Bengal','123455','123456','shipra.JPG','134','210','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (4,'aftab','self','male','Never Married','55-to-60','18','average','Fair','210','Hindi','hindu','cancer','No','Masters','','Not working','10 lakhs','Moderate','Veg','No','No','O+','reading','Hello world, this aftab alam saying good morining to all the person in the world. And going to marry now.','siliguri','siliguri','West Bengal','1425','1425','','134','210','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (5,'rajan','self','male','Never Married','55-to-60','18','average','Fair','5ft 5in - 165cm','Hindi','hindu','cancer','No','Masters','','Not working','10 lakh','Moderate','Veg','No','No','O+','reading','Hello world this rajan kumar. doing MCA from ignou. all the person reading in ignou are invited to my marriage ceromony\r\nadded by hrishi','siliguri','siliguri','West Bengal','1425','1425','rajan.JPG','134','210','18','18','Never Married','hindu','Hindi','No','Not working','Fair','loving person.','',0,0,1),
 (6,'kausal','self','male','Never Married','55-to-60','18','average','Fair','180','Hindi','hindu','cancer','No','Masters','','Not working','no','Moderate','Veg','No','No','O+','travelling','Hello world i am kausal. who like only to eating and only eating at any time. in night or in day.    ','malda','malda','West Bengal','1245','124','','150','180','18','18','Never Married','hindu','Hindi','No','Not working','Fair','kauasal','',0,0,1),
 (7,'kavita','self','male','Never Married','55-to-60','18','average','Fair','5ft 5in - 165cm','Hindi','hindu','cancer','No','Masters','','Not working','no thing','Moderate','Veg','No','No','O+','reading','Hello world how r u and what is going. this is the time of sleeping so why r u working on system ,plz give up the system.','malda','malda','West Bengal','123456','123456','kavita.jpg','134','210','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (8,'rakesh','self','male','Never Married','55-to-60','18','average','Fair','145','Hindi','hindu','cancer','No','Masters','','Not working','no thing','Moderate','Veg','No','No','O+','reading','hello sir ji good morning but for u good night, now go and sleep its 5:15am now. and also do not distrub me.','siliguri','siliguri','West Bengal','147','147','','145','165','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (9,'shiv','self','male','Never Married','55-to-60','18','average','Fair','145','Hindi','muslim','cancer','No','Masters','','Not working','nothing','Moderate','Veg','No','No','O+','reading books','hello world this is shiv shanker. and wanting to marry. to beautiful girl in the world. Please help in  finding the girl.','delhi','delhi','Delhi','147258','147258','','150','175','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (10,'ankur','self','male','Never Married','55-to-60','18','average','Fair','150','Hindi','muslim','cancer','No','Masters','','Factory worker','nothing','Moderate','Veg','No','No','O+','playing ','hello world this is ankur. I am a software developer. and crrently working with the microsoft and linux.','kolkata','kolkata','West Bengal','123456','123456','','175','175','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (11,'ankita','self','male','Never Married','55-to-60','18','average','Fair','5ft 5in - 165cm','Hindi','hindu','cancer','No','Masters','','Not working','1000 lakhs','Moderate','Veg','No','No','O+','reading','hello sir this is ankit, i am MBA holder and what become like dhiru bhai ambani. so please help me  .','siliguri','siliguri','West Bengal','147258','147258','ankita.jpg','134','210','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (12,'anamika','self','female','Never Married','55-to-60','18','average','Fair','158','Hindi','hindu','cancer','No','Masters','','Not working','10 lakhs','Moderate','Veg','No','No','O+','reading ','hai this is anakita singh and writing about myself, that i am most beautiful girl in the world, so think about me.','siliguri','siliguri','West Bengal','147258','147258','','174','184','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (13,'anjali','self','female','Never Married','55-to-60','18','average','Fair','175','Hindi','hindu','cancer','No','Masters','','Not working','no thing','Moderate','Veg','No','No','O+','reading ','hai this anjali singh, and writing about myself, i am MBA student. and doing PhD. and current working with dell','delhi','delhi','Delhi','1472588','147258','','145','147','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (14,'ashok','self','male','Never Married','55-to-60','18','average','Fair','152','Hindi','hindu','cancer','No','Masters','','Not working','10 lakhs','Moderate','Veg','No','No','O+','reading ','hai this ashok and writing about myself please read it any time. My name is ashok which isn\'t ashoka.','siliguri','siliguri','West Bengal','21445','212115454','','175','180','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (15,'kaushal','self','male','Never Married','55-to-60','18','average','Fair','145','Hindi','hindu','cancer','No','Masters','','Not working','10 lankhs','Moderate','Veg','No','No','O+','playing ','hello this is kausal. and writing about myself. and writing about myself. I like playing cricket. hello sir','siliguri','siliguri','West Bengal','147258','258147','','150','180','18','18','Never Married','buddhist','Hindi','No','Not working','Fair','','',0,0,1),
 (16,'biswadeep','self','male','Never Married','55-to-60','18','average','Fair','185','Hindi','hindu','cancer','No','Masters','','Not working','no thing','Moderate','Veg','No','No','O+','playing ','hai this is biswadeep. and writing about myself. welcome to profile zone. i am doing mca for ignou. ','siliguri','siliguri','West Bengal','147258','147258','','145','155','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (17,'rakesh123','self','male','Never Married','55-to-60','18','average','Fair','210','Hindi','hindu','cancer','No','Masters','','Not working','10 lakhs','Moderate','Veg','No','No','O+','playing','this is rakesh myself. writing about myself. i am writing about. this is rakesh myself. writing about myself. i am writing about. ','siliguri','siliguri','West Bengal','147258','147258','','134','210','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (18,'tanweer','self','male','Never Married','55-to-60','18','average','Fair','145','Hindi','hindu','cancer','No','Masters','','Not working','10 lakhs','Moderate','Veg','No','No','O+','reading ','Hai this is tanweer alam. I am writing my profile. and want to marry. I live in delhi, and my village is kne','kne','kne','West Bengal','147258','147258','','175','180','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (19,'jakir','self','male','Never Married','55-to-60','21','average','Fair','160','Hindi','hindu','cancer','No','Masters','','Not working','10 lakhs','Moderate','Veg','No','No','O+','playing','i am jakir husaan. I am writing my profile.\r\ni am jakir husaan. I am writing my profile.\r\ni am jakir husaan. I am writing my profile.\r\n','delhi','delhi','West Bengal','147','147','','150','175','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (20,'lata','self','female','Never Married','55-to-60','22','average','Fair','175','Hindi','hindu','cancer','No','Masters','','Not working','1 corer','Moderate','Veg','No','Yes','AB-','reading','hai this lata.hai this lata.hai this lata.hai this lata.hai this lata.hai this lata.hai this lata.hai this lata.','delhi','delhi','West Bengal','14725','147258','','140','155','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (21,'shaker','self','male','Never Married','55-to-60','18','average','Fair','175','Hindi','hindu','cancer','No','Masters','','Not working','10 lakhs','Moderate','Veg','No','No','O+','travelling','hai this shanker.hai this shanker.hai this shanker.hai this shanker.hai this shanker.hai this shanker.hai this shanker.hai this shanker.','siliguri','siliguri','West Bengal','147258','147258','','145','160','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (22,'karam','self','male','Never Married','55-to-60','18','average','Fair','177','Hindi','hindu','cancer','No','Masters','','Not working','10 lakhs','Liberal','Veg','No','No','O+','reading','hai this is karam.hai this shanker.hai this shanker.hai this shanker.hai this shanker.hai this shanker.hai this shanker.hai this shanker.hai this shanker.hai this shanker.hai this shanker.hai this shanker.hai this shanker.hai this shanker.','siliguri','siliguri','West Bengal','147147','1477147','','150','160','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (23,'karisma','self','female','Divorced','55-to-60','18','average','Fair','152','Hindi','hindu','cancer','No','Masters','','Not working','no thing','Moderate','Veg','No','No','O+','reading','hai this is karisma.hai this is karisma.hai this is karisma.hai this is karisma.hai this is karisma.hai this is karisma.hai this is karisma.hai this is karisma.hai this is karisma.hai this is karisma.hai this is karisma.','siliguri','siliguri','West Bengal','14714','14744','','162','180','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (24,'kangana','self','female','Never Married','55-to-60','18','average','Fair','5ft 5in - 165cm','Hindi','hindu','cancer','No','Masters','','Not working','no thing','Moderate','Veg','No','No','O+','reading','hai this is kangna. hai this is kangna. hai this is kangna.\r\nhai this is kangna.\r\nhai this is kangna.','siliguri','siliguri','West Bengal','147','147','kangana.jpg','134','210','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (25,'ravi','self','male','Never Married','55-to-60','18','average','Fair','145','Hindi','hindu','cancer','No','Masters','','Not working','10 lakhs','Moderate','Veg','No','Occasionally','O-','travelling','hai this ravi.hai this ravi.hai this ravi.hai this ravi.hai this ravi.hai this ravi.hai this ravi.hai this ravi.hai this ravi.hai this ravi.','siliguri','siliguri','West Bengal','14','14','ravi.JPG','170','180','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (26,'krishana','self','male','Never Married','55-to-60','18','average','Fair','152','Hindi','hindu','cancer','No','Masters','','Not working','10 lakah','Moderate','Veg','No','No','O+','reading','Hello world this is Krishana.Hello world this is Krishana.Hello world this is Krishana.Hello world this is Krishana.Hello world this is Krishana.Hello world this is Krishana.Hello world this is Krishana.Hello world this is Krishana.','siliguri','siliguri','West Bengal','14725','147','krishana.gif','145','175','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (27,'kanti','self','male','Never Married','55-to-60','18','average','Fair','154','Hindi','hindu','cancer','No','Masters','','Not working','no thing','Moderate','Veg','No','Yes','AB-','studing ','this is kantithis is kantithis is kantithis is kantithis is kantithis is kantithis is kantithis is kanti','siliguri','siliguri','West Bengal','147258','147258','kanti.JPG','175','185','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (28,'mantu','self','male','Never Married','55-to-60','18','average','Fair','165','Hindi','hindu','cancer','No','Masters','phd','Not working','no money','Moderate','Veg','No','No','O+','reading','hello world this is mantu mishra writing the profile for the matrimonail. we all are the human being .','siliguri','siliguri','West Bengal','9932586724','122452','mantu.jpg','5ft 5in - 165cm','5ft 5in - 165cm','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (29,'ranjan','self','male','Never Married','55-to-60','18','average','Fair','165','Hindi','hindu','cancer','No','Masters','','Not working','10 lakhs','Moderate','Veg','No','No','O+','playing','hello this ranjan and writing my profile for matrimonail.hello this ranjan and writing my profile for matrimonail.hello this ranjan and writing my profile for matrimonail.hello this ranjan and writing my profile for matrimonail.hello this ranjan and writing my profile for matrimonail.','kne','kne','Bihar','1245','241','','5ft 5in - 165cm','5ft 5in - 165cm','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (30,'','self','male','Never Married','55-to-60','18','average','Fair','5ft 5in - 165cm','Hindi','hindu','cancer','No','Masters','','Not working','','Moderate','Veg','No','No','O+','','','','','West Bengal','','','.JPG','134','210','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (31,'','self','male','Never Married','55-to-60','18','average','Fair','5ft 5in - 165cm','Hindi','hindu','cancer','No','Masters','','Not working','','Moderate','Veg','No','No','O+','','','','','West Bengal','','','.JPG','134','210','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (32,'','self','male','Never Married','55-to-60','18','average','Fair','5ft 5in - 165cm','Hindi','hindu','cancer','No','Masters','','Not working','','Moderate','Veg','No','No','O+','','','','','West Bengal','','','.JPG','134','210','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (33,'','self','male','Never Married','55-to-60','18','average','Fair','5ft 5in - 165cm','Hindi','hindu','cancer','No','Masters','','Not working','100 lakhs','Moderate','Veg','No','No','O+','reading','hewhewhewhewhewhewhewhewhewhewhewasddsfhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewhewv','siliguri','siliguri','West Bengal','122455','221452','.JPG','134','210','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1),
 (34,'','self','male','Never Married','55-to-60','18','average','Fair','210','Hindi','hindu','cancer','No','Masters','','Not working','sadf','Moderate','Veg','No','No','O+','asdf','asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdf','adf','asdf','West Bengal','asdf','as','','134','210','18','18','Never Married','hindu','Hindi','No','Not working','Fair','','',0,0,1);
/*!40000 ALTER TABLE `jos_mat_profile` ENABLE KEYS */;


--
-- Definition of table `jos_mat_users`
--

DROP TABLE IF EXISTS `jos_mat_users`;
CREATE TABLE `jos_mat_users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `userid` varchar(50) NOT NULL default '',
  `username` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `block` tinyint(1) unsigned NOT NULL default '1',
  `registrationdate` datetime NOT NULL default '0000-00-00 00:00:00',
  `lastvisitdate` datetime NOT NULL default '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL default '',
  `emailid` varchar(200) NOT NULL default '',
  `addedat` varchar(50) NOT NULL default 'server',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_mat_users`
--

/*!40000 ALTER TABLE `jos_mat_users` DISABLE KEYS */;
INSERT INTO `jos_mat_users` (`id`,`userid`,`username`,`password`,`block`,`registrationdate`,`lastvisitdate`,`activation`,`emailid`,`addedat`,`params`) VALUES 
 (3,'shipra','shipra','7c4a8d09ca3762af61e59520943dc26494f8941b',0,'2009-02-28 21:23:50','0000-00-00 00:00:00','e13c71c7dfaf53bb2043f75b50c614c08d69bdb4','shi@gmail.com','127.0.0.1',''),
 (4,'aftab','aftab','7c4a8d09ca3762af61e59520943dc26494f8941b',0,'2009-02-28 21:32:31','0000-00-00 00:00:00','','haiaftab@indaitimes.com','127.0.0.1',''),
 (5,'rajan','rajan','7c4a8d09ca3762af61e59520943dc26494f8941b',0,'2009-02-28 21:35:19','2009-03-05 20:12:41','','rajan@yahoo.com','127.0.0.1',''),
 (6,'kausal','kausal','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-02-28 21:43:59','0000-00-00 00:00:00','','ka@gmail.com','127.0.0.1',''),
 (7,'kavita','kavita','7c4a8d09ca3762af61e59520943dc26494f8941b',0,'2009-02-28 21:50:49','0000-00-00 00:00:00','5a9e94da64e24e430ccf04044617c1ffa42a0b9a','kavita@gmail.com','127.0.0.1',''),
 (8,'rakesh','rakesh','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-02-28 23:44:01','0000-00-00 00:00:00','f35fd2f7d447027db6f5851bb31ead24e655c7c0','rakesh@gmail.com','127.0.0.1',''),
 (9,'shiv','shiv shankar','7c4a8d09ca3762af61e59520943dc26494f8941b',0,'2009-03-01 09:24:40','0000-00-00 00:00:00','7b52726141f3e0f4ec9e28b037dfa802b42dbd44','shiv@gmail.com','127.0.0.1',''),
 (10,'ankur','ankur','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 09:27:43','0000-00-00 00:00:00','4487bb4f53c9ac5d2594554c94e0bda19b422ed3','ankur@yahoo.com','127.0.0.1',''),
 (11,'ankita','ankit','7c4a8d09ca3762af61e59520943dc26494f8941b',0,'2009-03-01 09:31:23','0000-00-00 00:00:00','6eaf50149dd4c091c8cf369530f966ed829aeb86','ank@gmail.com','127.0.0.1',''),
 (12,'anamika','anamika','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 09:36:54','0000-00-00 00:00:00','b7d9d7b645ed0bdf3c3fe43b8d8f2bf0d58333d9','ank@sify.com','127.0.0.1',''),
 (13,'anjali','anjali','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 09:41:07','0000-00-00 00:00:00','f48b9d42f845e7da66bdb4e30a82c9235c1a1f63','anj@gmail.com','127.0.0.1',''),
 (14,'ashok','ashok','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 09:50:05','0000-00-00 00:00:00','a3f6b92ccd923ad8202837a197fcc5ac3d59ca40','ashok@gmail.com','127.0.0.1',''),
 (15,'kaushal','kaushal','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 09:59:17','0000-00-00 00:00:00','fb3e6e1553fc51be7ecca9238ce705083670fc31','kausal@gmail.com','127.0.0.1',''),
 (16,'biswadeep','biswadeep','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 10:03:54','0000-00-00 00:00:00','87f513356bb1378043991a985f28f29e7e7f909c','bis@yahoo.com','127.0.0.1',''),
 (17,'rakesh123','rakesh','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 10:06:37','0000-00-00 00:00:00','03ac031a62c25501194ee132cbc9db3dcba491e0','rakesh123@gmail.com','127.0.0.1',''),
 (18,'tanweer','tanweer','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 10:56:35','0000-00-00 00:00:00','2295f2168518c74fe6cc3788d0bd68606a85b8b7','tanu@gmail.com','127.0.0.1',''),
 (19,'jakir','jakir','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 11:12:52','0000-00-00 00:00:00','f48b9d42f845e7da66bdb4e30a82c9235c1a1f63','jakir@yahoo.com','127.0.0.1',''),
 (20,'lata','lata','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 11:28:44','0000-00-00 00:00:00','4487bb4f53c9ac5d2594554c94e0bda19b422ed3','lata@yahoo.com','127.0.0.1',''),
 (21,'shaker','shaker','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 11:30:55','0000-00-00 00:00:00','dc5a5d2822ec1c3379eb307c7e33fa646fef8b50','ss@gmail.com','127.0.0.1',''),
 (22,'karam','karam','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 11:33:54','0000-00-00 00:00:00','44fa092e0bc4eddd817c12f1a7161a2c6f2938c1','karam@gmail.com','127.0.0.1',''),
 (23,'karisma','karisma','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 11:35:37','0000-00-00 00:00:00','9fdd068511818283fb115aa491bb3de8d46db74f','ks@yahoo.com','127.0.0.1',''),
 (24,'kangana','kangana','7c4a8d09ca3762af61e59520943dc26494f8941b',0,'2009-03-01 11:41:12','0000-00-00 00:00:00','a8611751d1b313dbf56cfc3d91153bd02e039113','kang@yahoo.com','127.0.0.1',''),
 (25,'ravi','ravi','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-01 11:52:41','0000-00-00 00:00:00','f2b84dd49952e8d988961a5f9901ffe2b0580e02','ravi@yahoo.com','127.0.0.1',''),
 (26,'krishana','krishna','7c4a8d09ca3762af61e59520943dc26494f8941b',0,'2009-03-01 15:06:31','0000-00-00 00:00:00','5f3a2ad2b1d8ba9912471cdb26e7dfebad66ad80','krs@sify.com','127.0.0.1',''),
 (27,'kanti','kanti','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-02 00:52:47','0000-00-00 00:00:00','e4e8c7f8a52f2d41d976706bfd75f4ad8e749336','kanti@gmail.com','127.0.0.1',''),
 (28,'mantu','mantu','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-03 19:37:33','0000-00-00 00:00:00','24ea692f2dadb5f98a2d8767d927258b28ab982d','mantu@gmail.com','127.0.0.1',''),
 (29,'ranjan','ranjan','7c4a8d09ca3762af61e59520943dc26494f8941b',1,'2009-03-03 20:06:19','0000-00-00 00:00:00','e13c71c7dfaf53bb2043f75b50c614c08d69bdb4','rajan@gmail.com','127.0.0.1','');
/*!40000 ALTER TABLE `jos_mat_users` ENABLE KEYS */;


--
-- Definition of table `jos_menu`
--

DROP TABLE IF EXISTS `jos_menu`;
CREATE TABLE `jos_menu` (
  `id` int(11) NOT NULL auto_increment,
  `menutype` varchar(75) default NULL,
  `name` varchar(255) default NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text,
  `type` varchar(50) NOT NULL default '',
  `published` tinyint(1) NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `componentid` int(11) unsigned NOT NULL default '0',
  `sublevel` int(11) default '0',
  `ordering` int(11) default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL default '0',
  `browserNav` tinyint(4) default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `utaccess` tinyint(3) unsigned NOT NULL default '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL default '0',
  `rgt` int(11) unsigned NOT NULL default '0',
  `home` int(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_menu`
--

/*!40000 ALTER TABLE `jos_menu` DISABLE KEYS */;
INSERT INTO `jos_menu` (`id`,`menutype`,`name`,`alias`,`link`,`type`,`published`,`parent`,`componentid`,`sublevel`,`ordering`,`checked_out`,`checked_out_time`,`pollid`,`browserNav`,`access`,`utaccess`,`params`,`lft`,`rgt`,`home`) VALUES 
 (1,'mainmenu','Home','home','index.php?option=com_content&view=frontpage','component',1,0,20,0,1,0,'0000-00-00 00:00:00',0,0,0,3,'num_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=front\nmulti_column_order=1\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\nfeed_summary=\npage_title=Welcome to the Frontpage\nshow_page_title=1\npageclass_sfx=\nmenu_image=0101_061208.jpg\nsecure=0\n\n',0,0,1),
 (2,'mainmenu','Joomla! License','joomla-license','index.php?option=com_content&view=article&id=5','component',1,0,20,0,7,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (41,'mainmenu','FAQ','faq','index.php?option=com_content&view=section&id=3','component',1,0,20,0,9,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1',0,0,0),
 (11,'othermenu','Joomla! Home','joomla-home','http://www.joomla.org','url',1,0,0,0,1,0,'0000-00-00 00:00:00',0,0,0,3,'menu_image=-1\n\n',0,0,0),
 (12,'othermenu','Joomla! Forums','joomla-forums','http://forum.joomla.org','url',1,0,0,0,2,0,'0000-00-00 00:00:00',0,0,0,3,'menu_image=-1\n\n',0,0,0),
 (13,'othermenu','Joomla! Documentation','joomla-documentation','http://docs.joomla.org','url',1,0,0,0,4,0,'0000-00-00 00:00:00',0,0,0,3,'menu_image=-1\n\n',0,0,0),
 (14,'othermenu','Joomla! Community','joomla-community','http://community.joomla.org','url',1,0,0,0,5,0,'0000-00-00 00:00:00',0,0,0,3,'menu_image=-1\n\n',0,0,0),
 (15,'othermenu','Joomla! Magazine','joomla-community-magazine','http://community.joomla.org/magazine.html','url',1,0,0,0,6,0,'0000-00-00 00:00:00',0,0,0,3,'menu_image=-1\n\n',0,0,0),
 (16,'othermenu','OSM Home','osm-home','http://www.opensourcematters.org','url',1,0,0,0,7,0,'0000-00-00 00:00:00',0,0,0,6,'menu_image=-1\n\n',0,0,0),
 (17,'othermenu','Administrator','administrator','administrator/','url',1,0,0,0,8,0,'0000-00-00 00:00:00',0,0,0,3,'menu_image=-1\n\n',0,0,0),
 (18,'topmenu','News','news','index.php?option=com_newsfeeds&view=newsfeed&id=1&feedid=1','component',0,0,11,0,3,0,'0000-00-00 00:00:00',0,0,0,3,'show_page_title=1\npage_title=News\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n',0,0,0),
 (20,'usermenu','Your Details','your-details','index.php?option=com_user&view=user&task=edit','component',1,0,14,0,1,0,'0000-00-00 00:00:00',0,0,1,3,'',0,0,0),
 (24,'usermenu','Logout','logout','index.php?option=com_user&view=login','component',1,0,14,0,4,62,'2009-02-14 07:04:56',0,0,1,3,'',0,0,0),
 (38,'keyconcepts','Content Layouts','content-layouts','index.php?option=com_content&view=article&id=24','component',1,0,20,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (27,'mainmenu','Joomla! Overview','joomla-overview','index.php?option=com_content&view=article&id=19','component',1,0,20,0,6,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (28,'topmenu','About Joomla!','about-joomla','index.php?option=com_content&view=article&id=25','component',0,0,20,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (29,'topmenu','Features','features','index.php?option=com_content&view=article&id=22','component',0,0,20,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (30,'topmenu','The Community','the-community','index.php?option=com_content&view=article&id=27','component',0,0,20,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (34,'mainmenu','What\'s New in 1.5?','what-is-new-in-1-5','index.php?option=com_content&view=article&id=22','component',1,27,20,1,1,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (40,'keyconcepts','Extensions','extensions','index.php?option=com_content&view=article&id=26','component',1,0,20,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (37,'mainmenu','More about Joomla!','more-about-joomla','index.php?option=com_content&view=section&id=4','component',1,0,20,0,8,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1',0,0,0),
 (43,'keyconcepts','Example Pages','example-pages','index.php?option=com_content&view=article&id=43','component',1,0,20,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'pageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (44,'ExamplePages','Section Blog','section-blog','index.php?option=com_content&view=section&layout=blog&id=3','component',1,0,20,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\npage_title=Example of Section Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (45,'ExamplePages','Section Table','section-table','index.php?option=com_content&view=section&id=3','component',1,0,20,0,2,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\npage_title=Example of Table Blog layout (FAQ section)\nshow_description=0\nshow_description_image=0\nshow_categories=1\nshow_empty_categories=0\nshow_cat_num_articles=1\nshow_category_description=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby=\nshow_noauth=0\nshow_title=1\nnlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (46,'ExamplePages','Category Blog','categoryblog','index.php?option=com_content&view=category&layout=blog&id=31','component',1,0,20,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\npage_title=Example of Category Blog layout (FAQs/General category)\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (47,'ExamplePages','Category Table','category-table','index.php?option=com_content&view=category&id=32','component',1,0,20,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\npage_title=Example of Category Table layout (FAQs/Languages category)\nshow_headings=1\nshow_date=0\ndate_format=\nfilter=1\nfilter_type=title\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_sec=\nshow_pagination=1\nshow_pagination_limit=1\nshow_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (48,'mainmenu','Web Links','web-links','index.php?option=com_weblinks&view=categories','component',1,0,4,0,11,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=Weblinks\nimage=-1\nimage_align=right\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_comp_description=1\ncomp_description=\nshow_link_hits=1\nshow_link_description=1\nshow_other_cats=1\nshow_headings=1\nshow_page_title=1\nlink_target=0\nlink_icons=\n\n',0,0,0),
 (49,'mainmenu','News Feeds','news-feeds','index.php?option=com_newsfeeds&view=categories','component',1,0,11,0,12,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\npage_title=Newsfeeds\nshow_comp_description=1\ncomp_description=\nimage=-1\nimage_align=right\npageclass_sfx=\nmenu_image=-1\nsecure=0\nshow_headings=1\nshow_name=1\nshow_articles=1\nshow_link=1\nshow_other_cats=1\nshow_cat_description=1\nshow_cat_items=1\nshow_feed_image=1\nshow_feed_description=1\nshow_item_description=1\nfeed_word_count=0\n\n',0,0,0),
 (50,'mainmenu','The News','the-news','index.php?option=com_content&view=category&layout=blog&id=1','component',1,0,20,0,10,0,'0000-00-00 00:00:00',0,0,0,0,'show_page_title=1\npage_title=The News\nshow_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\nshow_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\norderby_pri=\norderby_sec=\nshow_pagination=2\nshow_pagination_results=1\nshow_noauth=0\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=1\nshow_create_date=1\nshow_modify_date=1\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=1\nshow_pdf_icon=1\nshow_print_icon=1\nshow_email_icon=1\nshow_hits=1\n\n',0,0,0),
 (51,'usermenu','Submit an Article','submit-an-article','index.php?option=com_content&view=article&layout=form','component',1,0,20,0,2,0,'0000-00-00 00:00:00',0,0,2,0,'',0,0,0),
 (52,'usermenu','Submit a Web Link','submit-a-web-link','index.php?option=com_weblinks&view=weblink&layout=form','component',1,0,4,0,3,0,'0000-00-00 00:00:00',0,0,2,0,'',0,0,0),
 (53,'usermenu','New Menu','byte-hacker-add-new-menu','index.php?option=com_content&view=category&layout=blog&id=29','component',1,0,20,0,5,62,'2009-02-14 07:06:01',0,0,1,0,'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=1\n\n',0,0,0),
 (54,'mainmenu','Guest Book','guest-book','index.php?option=com_guestbook','component',-2,0,42,0,5,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (55,'mainmenu','Guest Book','guest-book','index.php?option=com_guestbook','component',-2,0,43,0,4,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (56,'mainmenu','Guest book','new-guest-book','index.php?option=com_guestbook','component',-2,0,65,1,2,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (57,'mainmenu','Student','student-info-','index.php?option=com_student','component',-2,0,91,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (63,'othermenu','Student Info','student-info','index.php?option=com_student','component',1,0,93,0,3,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (62,'hrihikesh','Guest Book','guest-book','index.php?option=com_guestbook','component',1,0,65,0,1,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (64,'mainmenu','Guest Book','guest-book','index.php?option=com_guestbook','component',1,0,65,0,13,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (65,'mainmenu','Student Info','student-info','index.php?option=com_student','component',1,0,93,0,14,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (66,'mainmenu','hello sir','hello-sir','index.php?option=com_hello&view=hello','component',1,0,122,0,15,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (67,'mainmenu','Joo map','joo-map','index.php?option=com_joomap','component',1,0,121,0,16,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (68,'mainmenu','Blast Chat','blast-chat','index.php?option=com_blastchatc','component',1,0,135,0,17,62,'2009-02-07 12:22:31',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (69,'mainmenu','Contact','contact','index.php?option=com_contact&view=contact&id=1','component',1,0,7,0,18,62,'2009-02-14 08:08:03',0,0,0,0,'show_contact_list=0\nshow_category_crumb=0\ncontact_icons=\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_headings=\nshow_position=\nshow_email=\nshow_telephone=\nshow_mobile=\nshow_fax=\nallow_vcard=\nbanned_email=\nbanned_subject=\nbanned_text=\nvalidate_session=\ncustom_reply=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (70,'mainmenu','Yellow Page','yellow-page','index.php?option=com_yellowpage&view=categories','component',1,0,246,0,19,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=Yellow Page\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (71,'mainmenu','Easy book','easy-book','index.php?option=com_easybook&view=entry&layout=form','component',1,0,262,0,20,0,'0000-00-00 00:00:00',0,0,0,0,'show_logo=\nsend_mail=\nentries_perpage=5\nentries_order=\nshow_introtext=\nintrotext=\nsupport_bbcode=\nsupport_smilie=\nsupport_link=\nsupport_mail=\nsupport_pic=\nwordwrap=\nmaxlength=75\nrating_max=5\nshow_rating=\nenable_log=\nshow_mail=\nrequire_mail=\nshow_home=\nshow_icq=\nshow_aim=\nshow_msn=\nshow_yah=\nshow_skype=\ndefault_published=\nbadwordfilter=\nenable_captcha=0\nadd_acl=18\nadmin_acl=20\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (72,'mainmenu','captcah','captcah','index.php?option=com_easycaptcha','component',1,0,258,0,21,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (73,'mainmenu','Classifieds','classifieds','index.php?option=com_classifieds&view=categories','component',1,0,291,0,22,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (74,'topmenu','Classifieds','classifieds','index.php?option=com_classifieds&view=categories','component',1,0,291,0,5,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (75,'topmenu','Yellowpage','yellowpage','index.php?option=com_yellowpage&view=categories','component',1,0,246,0,6,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (76,'topmenu','Login','login','index.php?option=com_lg&view=login','component',1,0,299,0,7,62,'2009-02-26 06:51:11',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (77,'topmenu','Matrimonail','matrimonail','index.php?option=com_matrimonial&view=matrimonial','component',1,0,306,0,8,0,'0000-00-00 00:00:00',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0),
 (78,'topmenu','Developer-Zone','developer-zone','index.php?option=com_developerzone&view=developerzone','component',1,0,318,0,9,62,'2009-03-07 17:30:03',0,0,0,0,'page_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n',0,0,0);
/*!40000 ALTER TABLE `jos_menu` ENABLE KEYS */;


--
-- Definition of table `jos_menu_types`
--

DROP TABLE IF EXISTS `jos_menu_types`;
CREATE TABLE `jos_menu_types` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `menutype` varchar(75) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `menutype` (`menutype`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_menu_types`
--

/*!40000 ALTER TABLE `jos_menu_types` DISABLE KEYS */;
INSERT INTO `jos_menu_types` (`id`,`menutype`,`title`,`description`) VALUES 
 (1,'mainmenu','Main Menu','The main menu for the site'),
 (2,'usermenu','User Menu','A Menu for logged in Users'),
 (3,'topmenu','Top Menu','Top level navigation'),
 (4,'othermenu','Resources','Additional links'),
 (5,'ExamplePages','Example Pages','Example Pages'),
 (6,'keyconcepts','Key Concepts','This describes some critical information for new Users.'),
 (10,'hrihikesh','Hrishikesh','my menu');
/*!40000 ALTER TABLE `jos_menu_types` ENABLE KEYS */;


--
-- Definition of table `jos_messages`
--

DROP TABLE IF EXISTS `jos_messages`;
CREATE TABLE `jos_messages` (
  `message_id` int(10) unsigned NOT NULL auto_increment,
  `user_id_from` int(10) unsigned NOT NULL default '0',
  `user_id_to` int(10) unsigned NOT NULL default '0',
  `folder_id` int(10) unsigned NOT NULL default '0',
  `date_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `state` int(11) NOT NULL default '0',
  `priority` int(1) unsigned NOT NULL default '0',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_messages`
--

/*!40000 ALTER TABLE `jos_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_messages` ENABLE KEYS */;


--
-- Definition of table `jos_messages_cfg`
--

DROP TABLE IF EXISTS `jos_messages_cfg`;
CREATE TABLE `jos_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `cfg_name` varchar(100) NOT NULL default '',
  `cfg_value` varchar(255) NOT NULL default '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_messages_cfg`
--

/*!40000 ALTER TABLE `jos_messages_cfg` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_messages_cfg` ENABLE KEYS */;


--
-- Definition of table `jos_migration_backlinks`
--

DROP TABLE IF EXISTS `jos_migration_backlinks`;
CREATE TABLE `jos_migration_backlinks` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `sefurl` text NOT NULL,
  `newurl` text NOT NULL,
  PRIMARY KEY  (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_migration_backlinks`
--

/*!40000 ALTER TABLE `jos_migration_backlinks` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_migration_backlinks` ENABLE KEYS */;


--
-- Definition of table `jos_modules`
--

DROP TABLE IF EXISTS `jos_modules`;
CREATE TABLE `jos_modules` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `position` varchar(50) default NULL,
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `module` varchar(50) default NULL,
  `numnews` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `showtitle` tinyint(3) unsigned NOT NULL default '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  `control` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_modules`
--

/*!40000 ALTER TABLE `jos_modules` DISABLE KEYS */;
INSERT INTO `jos_modules` (`id`,`title`,`content`,`ordering`,`position`,`checked_out`,`checked_out_time`,`published`,`module`,`numnews`,`access`,`showtitle`,`params`,`iscore`,`client_id`,`control`) VALUES 
 (1,'Main Menu','',4,'left',0,'0000-00-00 00:00:00',0,'mod_mainmenu',0,0,1,'menutype=mainmenu\nmoduleclass_sfx=_menu\n',1,0,''),
 (2,'Login','',1,'login',0,'0000-00-00 00:00:00',1,'mod_login',0,0,1,'',1,1,''),
 (3,'Popular','',3,'cpanel',0,'0000-00-00 00:00:00',1,'mod_popular',0,2,1,'',0,1,''),
 (4,'Recent added Articles','',4,'cpanel',0,'0000-00-00 00:00:00',1,'mod_latest',0,2,1,'ordering=c_dsc\nuser_id=0\ncache=0\n\n',0,1,''),
 (5,'Menu Stats','',5,'cpanel',0,'0000-00-00 00:00:00',1,'mod_stats',0,2,1,'',0,1,''),
 (6,'Unread Messages','',1,'header',0,'0000-00-00 00:00:00',1,'mod_unread',0,2,1,'',1,1,''),
 (7,'Online Users','',2,'header',0,'0000-00-00 00:00:00',1,'mod_online',0,2,1,'',1,1,''),
 (8,'Toolbar','',1,'toolbar',0,'0000-00-00 00:00:00',1,'mod_toolbar',0,2,1,'',1,1,''),
 (9,'Quick Icons','',1,'icon',0,'0000-00-00 00:00:00',1,'mod_quickicon',0,2,1,'',1,1,''),
 (10,'Logged in Users','',2,'cpanel',0,'0000-00-00 00:00:00',1,'mod_logged',0,2,1,'',0,1,''),
 (11,'Footer','',0,'footer',0,'0000-00-00 00:00:00',1,'mod_footer',0,0,1,'',1,1,''),
 (12,'Admin Menu','',1,'menu',0,'0000-00-00 00:00:00',1,'mod_menu',0,2,1,'',0,1,''),
 (13,'Admin SubMenu','',1,'submenu',0,'0000-00-00 00:00:00',1,'mod_submenu',0,2,1,'',0,1,''),
 (14,'User Status','',1,'status',0,'0000-00-00 00:00:00',1,'mod_status',0,2,1,'',0,1,''),
 (15,'Title','',1,'title',0,'0000-00-00 00:00:00',1,'mod_title',0,2,1,'',0,1,''),
 (16,'Polls','',1,'right',0,'0000-00-00 00:00:00',1,'mod_poll',0,0,1,'id=14\ncache=1',0,0,''),
 (17,'User Menu','',7,'left',0,'0000-00-00 00:00:00',1,'mod_mainmenu',0,1,1,'menutype=usermenu\nmoduleclass_sfx=_menu\ncache=1',1,0,''),
 (18,'Login Form','',10,'left',62,'2009-02-23 20:48:15',1,'mod_login',0,0,1,'cache=0\nmoduleclass_sfx=\npretext=Hellow\nposttext=\nlogin=\nlogout=\ngreeting=1\nname=0\nusesecure=0\n\n',1,0,''),
 (19,'Latest News','',4,'user1',0,'0000-00-00 00:00:00',1,'mod_latestnews',0,0,1,'cache=1',1,0,''),
 (20,'Statistics','',9,'left',0,'0000-00-00 00:00:00',0,'mod_stats',0,0,1,'serverinfo=1\nsiteinfo=1\ncounter=1\nincrease=0\nmoduleclass_sfx=',0,0,''),
 (21,'Who\'s Online','',1,'right',0,'0000-00-00 00:00:00',1,'mod_whosonline',0,0,1,'online=1\nusers=1\nmoduleclass_sfx=',0,0,''),
 (22,'Popular','',6,'user2',0,'0000-00-00 00:00:00',1,'mod_mostread',0,0,1,'cache=1',0,0,''),
 (23,'Archive','',11,'left',0,'0000-00-00 00:00:00',0,'mod_archive',0,0,1,'cache=1',1,0,''),
 (24,'Sections','',12,'left',0,'0000-00-00 00:00:00',0,'mod_sections',0,0,1,'cache=1',1,0,''),
 (25,'Newsflash','',1,'top',0,'0000-00-00 00:00:00',1,'mod_newsflash',0,0,1,'catid=3\r\nstyle=random\r\nitems=\r\nmoduleclass_sfx=',0,0,''),
 (26,'Related Items','',13,'left',0,'0000-00-00 00:00:00',0,'mod_related_items',0,0,1,'',0,0,''),
 (27,'Search','',1,'user4',0,'0000-00-00 00:00:00',1,'mod_search',0,0,0,'cache=1',0,0,''),
 (28,'Random Image','',9,'right',0,'0000-00-00 00:00:00',1,'mod_random_image',0,0,1,'',0,0,''),
 (29,'Top Menu','',0,'user3',62,'2009-02-23 21:23:21',1,'mod_mainmenu',0,0,0,'menutype=topmenu\nmenu_style=list_flat\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=-nav\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images_link=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=sort1.png\nindent_image2=pdf_button.png\nindent_image3=-1\nindent_image4=-1\nindent_image5=-1\nindent_image6=-1\nspacer=\nend_spacer=\n\n',1,0,''),
 (30,'Banners','',1,'footer',0,'0000-00-00 00:00:00',1,'mod_banners',0,0,0,'target=1\ncount=1\ncid=1\ncatid=33\ntag_search=0\nordering=random\nheader_text=\nfooter_text=\nmoduleclass_sfx=\ncache=1\ncache_time=15\n\n',1,0,''),
 (31,'Resources','',5,'left',0,'0000-00-00 00:00:00',0,'mod_mainmenu',0,0,1,'menutype=othermenu\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=_menu\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n',0,0,''),
 (32,'Wrapper','',14,'left',0,'0000-00-00 00:00:00',0,'mod_wrapper',0,0,1,'',0,0,''),
 (33,'Footer','',2,'footer',0,'0000-00-00 00:00:00',1,'mod_footer',0,0,0,'cache=1\n\n',1,0,''),
 (34,'Feed Display','',15,'left',0,'0000-00-00 00:00:00',0,'mod_feed',0,0,1,'',1,0,''),
 (35,'Breadcrumbs','',1,'breadcrumb',0,'0000-00-00 00:00:00',1,'mod_breadcrumbs',0,0,1,'moduleclass_sfx=\ncache=0\nshowHome=1\nhomeText=Home\nshowComponent=1\nseparator=\n\n',1,0,''),
 (36,'Syndication','',3,'syndicate',0,'0000-00-00 00:00:00',1,'mod_syndicate',0,0,0,'',1,0,''),
 (38,'Advertisement','',3,'right',0,'0000-00-00 00:00:00',1,'mod_banners',0,0,1,'count=4\r\nrandomise=0\r\ncid=0\r\ncatid=14\r\nheader_text=Featured Links:\r\nfooter_text=<a href=\"http://www.joomla.org\">Ads by Joomla!</a>\r\nmoduleclass_sfx=_text\r\ncache=0\r\n\r\n',0,0,''),
 (39,'Example Pages','',8,'left',0,'0000-00-00 00:00:00',1,'mod_mainmenu',0,0,1,'cache=1\nclass_sfx=\nmoduleclass_sfx=_menu\nmenutype=ExamplePages\nmenu_style=list_flat\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nfull_active_id=0\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\nwindow_open=\n\n',0,0,''),
 (40,'Key Concepts','',6,'left',0,'0000-00-00 00:00:00',0,'mod_mainmenu',0,0,1,'cache=1\nclass_sfx=\nmoduleclass_sfx=_menu\nmenutype=keyconcepts\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nfull_active_id=0\nmenu_images=0\nmenu_images_align=0\nexpand_menu=0\nactivate_parent=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\nwindow_open=\n\n',0,0,''),
 (41,'Welcome to Joomla!','<div style=\"padding: 5px\">  <p>   Congratulations on choosing Joomla! as your content management system. To   help you get started, check out these excellent resources for securing your   server and pointers to documentation and other helpful resources. </p> <p>   <strong>Security</strong><br /> </p> <p>   On the Internet, security is always a concern. For that reason, you are   encouraged to subscribe to the   <a href=\"http://feedburner.google.com/fb/a/mailverify?uri=JoomlaSecurityNews\" target=\"_blank\">Joomla!   Security Announcements</a> for the latest information on new Joomla! releases,   emailed to you automatically. </p> <p>   If this is one of your first Web sites, security considerations may   seem complicated and intimidating. There are three simple steps that go a long   way towards securing a Web site: (1) regular backups; (2) prompt updates to the   <a href=\"http://www.joomla.org/download.html\" target=\"_blank\">latest Joomla! release;</a> and (3) a <a href=\"http://docs.joomla.org/Security_Checklist_2_-_Hosting_and_Server_Setup\" target=\"_blank\" title=\"good Web host\">good Web host</a>. There are many other important security considerations that you can learn about by reading the <a href=\"http://docs.joomla.org/Category:Security_Checklist\" target=\"_blank\" title=\"Joomla! Security Checklist\">Joomla! Security Checklist</a>. </p> <p>If you believe your Web site was attacked, or you think you have discovered a security issue in Joomla!, please do not post it in the Joomla! forums. Publishing this information could put other Web sites at risk. Instead, report possible security vulnerabilities to the <a href=\"http://developer.joomla.org/security/contact-the-team.html\" target=\"_blank\" title=\"Joomla! Security Task Force\">Joomla! Security Task Force</a>.</p><p><strong>Learning Joomla!</strong> </p> <p>   A good place to start learning Joomla! is the   \"<a href=\"http://docs.joomla.org/beginners\" target=\"_blank\">Absolute Beginner\'s   Guide to Joomla!.</a>\" There, you will find a Quick Start to Joomla!   <a href=\"http://help.joomla.org/ghop/feb2008/task048/joomla_15_quickstart.pdf\" target=\"_blank\">guide</a>   and <a href=\"http://help.joomla.org/ghop/feb2008/task167/index.html\" target=\"_blank\">video</a>,   amongst many other tutorials. The   <a href=\"http://community.joomla.org/magazine/view-all-issues.html\" target=\"_blank\">Joomla!   Community Magazine</a> also has   <a href=\"http://community.joomla.org/magazine/article/522-introductory-learning-joomla-using-sample-data.html\" target=\"_blank\">articles   for new learners</a> and experienced users, alike. A great place to look for   answers is the   <a href=\"http://docs.joomla.org/Category:FAQ\" target=\"_blank\">Frequently Asked   Questions (FAQ)</a>. If you are stuck on a particular screen in the   Administrator (which is where you are now), try clicking the Help toolbar   button to get assistance specific to that page. </p> <p>   If you still have questions, please feel free to use the   <a href=\"http://forum.joomla.org/\" target=\"_blank\">Joomla! Forums.</a> The forums   are an incredibly valuable resource for all levels of Joomla! users. Before   you post a question, though, use the forum search (located at the top of each   forum page) to see if the question has been asked and answered. </p> <p>   <strong>Getting Involved</strong> </p> <p>   <a name=\"twjs\" title=\"twjs\"></a> If you want to help make Joomla! better, consider getting   involved. There are   <a href=\"http://www.joomla.org/about-joomla/contribute-to-joomla.html\" target=\"_blank\">many ways   you can make a positive difference.</a> Have fun using Joomla!.</p></div>',0,'cpanel',0,'0000-00-00 00:00:00',1,'mod_custom',0,2,1,'moduleclass_sfx=\n\n',1,1,''),
 (42,'Joomla! Security Newsfeed','',6,'cpanel',0,'0000-00-00 00:00:00',1,'mod_feed',0,0,1,'cache=1\ncache_time=15\nmoduleclass_sfx=\nrssurl=http://feeds.joomla.org/JoomlaSecurityNews\nrssrtl=0\nrsstitle=1\nrssdesc=0\nrssimage=1\nrssitems=1\nrssitemdesc=1\nword_count=0\n\n',0,1,''),
 (43,'Hello World','',3,'left',0,'0000-00-00 00:00:00',0,'mod_helloworld',0,0,1,'',0,0,''),
 (48,'mod_mainmenu','',1,'left',0,'0000-00-00 00:00:00',0,'mod_mainmenu',0,0,1,'menutype=hrihikesh',0,0,''),
 (46,'Contact Us module','',2,'left',0,'0000-00-00 00:00:00',0,'mod_contactus',0,0,0,'publiccat=1\n\n',0,0,''),
 (51,'ulti Counter','',4,'left',62,'2009-02-04 14:16:59',1,'mod_ulti_counter',0,0,1,'day=01\nmonth=01\nyear=2009\nhour=00\nminute=00\nsecond=00\noffset=0\nformat=6\nleading=Hello\ntailing=\nkeepCounting=1\nmoduleclass_sfx=\n\n',0,0,''),
 (50,'Time Zone Clock','',0,'left',0,'0000-00-00 00:00:00',0,'mod_tz_clock',0,0,1,'Text_Color=red\nBackground_Color=green\nindividual_bg=0\nBorders=1\nBorder_Color=\ncellpad=3\nFont_Family=courier new,courier,monospace\nFont_Size=medium\nFont_Weight=bold\nShow_Debug=0\nZoneFirst=1\nDisplay_Style=0\nDispAM_PM=0\nDisplay_Seconds=1\nDispDay=0\nZone1=Delhi\nZ1Offset=tzbb\ndaylight1=0\nbgcolor1=Green\nZone2=\nZ2Offset=-12\ndaylight2=0\nbgcolor2=\nZone3=\nZ3Offset=-12\ndaylight3=0\nbgcolor3=\nZone4=\nZ4Offset=-12\ndaylight4=0\nbgcolor4=\nZone5=\nZ5Offset=-12\ndaylight5=0\nbgcolor5=\nZone6=\nZ6Offset=-12\ndaylight6=0\nbgcolor6=\nZone7=\nZ7Offset=-12\ndaylight7=0\nbgcolor7=\nZone8=\nZ8Offset=-12\ndaylight8=0\nbgcolor8=\nZone9=\nZ9Offset=-12\ndaylight9=0\nbgcolor9=\nZone10=\nZ10Offset=-12\ndaylight10=0\nbgcolor10=\n\n',0,0,'');
/*!40000 ALTER TABLE `jos_modules` ENABLE KEYS */;


--
-- Definition of table `jos_modules_menu`
--

DROP TABLE IF EXISTS `jos_modules_menu`;
CREATE TABLE `jos_modules_menu` (
  `moduleid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`moduleid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_modules_menu`
--

/*!40000 ALTER TABLE `jos_modules_menu` DISABLE KEYS */;
INSERT INTO `jos_modules_menu` (`moduleid`,`menuid`) VALUES 
 (1,0),
 (16,1),
 (17,0),
 (18,1),
 (19,1),
 (19,2),
 (19,4),
 (19,27),
 (19,36),
 (21,1),
 (22,1),
 (22,2),
 (22,4),
 (22,27),
 (22,36),
 (25,0),
 (27,0),
 (29,0),
 (30,0),
 (31,1),
 (32,0),
 (33,0),
 (34,0),
 (35,0),
 (36,0),
 (38,1),
 (39,43),
 (39,44),
 (39,45),
 (39,46),
 (40,0),
 (43,0),
 (46,1),
 (47,0),
 (48,0),
 (50,0),
 (51,53);
/*!40000 ALTER TABLE `jos_modules_menu` ENABLE KEYS */;


--
-- Definition of table `jos_myextension_foobars`
--

DROP TABLE IF EXISTS `jos_myextension_foobars`;
CREATE TABLE `jos_myextension_foobars` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `content` text NOT NULL,
  `checked_out` int(10) unsigned NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `params` text NOT NULL,
  `ordering` int(10) unsigned NOT NULL,
  `hits` int(10) unsigned NOT NULL,
  `published` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_myextension_foobars`
--

/*!40000 ALTER TABLE `jos_myextension_foobars` DISABLE KEYS */;
INSERT INTO `jos_myextension_foobars` (`id`,`content`,`checked_out`,`checked_out_time`,`params`,`ordering`,`hits`,`published`) VALUES 
 (3,'<p> <strong>I love My India</strong></p><p><img src=\"plugins/editors/tinymce/jscripts/tiny_mce/plugins/emotions/images/smiley-frown.gif\" border=\"0\" alt=\"Frown\" title=\"Frown\" /></p>',0,'0000-00-00 00:00:00','show_name=1\nshow_position=1\nshow_email=1\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=0\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=',0,0,1),
 (4,'hrishikesh kumar',0,'0000-00-00 00:00:00','show_name=1\nshow_position=1\nshow_email=0\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=0\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=',0,0,1),
 (5,'CODE GURU ',0,'0000-00-00 00:00:00','show_name=1\nshow_position=1\nshow_email=0\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=0\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=',0,0,1),
 (6,'hello sir JMS Code Guru',0,'0000-00-00 00:00:00','',0,0,1),
 (7,'<font face=\"#mce_temp_font#\"><table border=\"0\" width=\"261\" align=\"center\" style=\"width: 261px; height: 116px; background-color: #f4550a; border: #48e816 0px solid\" dir=\"ltr\"><tbody><tr><td> JMS</td><td> Byte</td></tr><tr><td> Code</td><td> GURU</td></tr></tbody></table></font>',0,'0000-00-00 00:00:00','show_name=1\nshow_position=1\nshow_email=0\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=0\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=',0,0,1),
 (8,'Deep Narayan Mishra',0,'0000-00-00 00:00:00','show_name=1\nshow_position=1\nshow_email=0\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=0\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=',0,0,1),
 (12,'<p>&nbsp;</p><p dir=\"ltr\"> Hello sir how r u ?????????????????????????</p><div style=\"left: 315px; width: 141px; position: absolute; top: 37px; height: 101px\">India is great country in  the world.</div>',0,'0000-00-00 00:00:00','show_name=1\nshow_position=1\nshow_email=0\nshow_street_address=1\nshow_suburb=1\nshow_state=1\nshow_postcode=1\nshow_country=1\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=1\nshow_image=1\nallow_vcard=0\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=',0,0,1);
/*!40000 ALTER TABLE `jos_myextension_foobars` ENABLE KEYS */;


--
-- Definition of table `jos_newsfeeds`
--

DROP TABLE IF EXISTS `jos_newsfeeds`;
CREATE TABLE `jos_newsfeeds` (
  `catid` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text NOT NULL,
  `filename` varchar(200) default NULL,
  `published` tinyint(1) NOT NULL default '0',
  `numarticles` int(11) unsigned NOT NULL default '1',
  `cache_time` int(11) unsigned NOT NULL default '3600',
  `checked_out` tinyint(3) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `rtl` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `published` (`published`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_newsfeeds`
--

/*!40000 ALTER TABLE `jos_newsfeeds` DISABLE KEYS */;
INSERT INTO `jos_newsfeeds` (`catid`,`id`,`name`,`alias`,`link`,`filename`,`published`,`numarticles`,`cache_time`,`checked_out`,`checked_out_time`,`ordering`,`rtl`) VALUES 
 (4,1,'Joomla! Announcements','joomla-official-news','http://feeds.joomla.org/JoomlaAnnouncements','',1,5,3600,0,'0000-00-00 00:00:00',1,0),
 (4,2,'Joomla! Core Team Blog','joomla-core-team-blog','http://feeds.joomla.org/JoomlaCommunityCoreTeamBlog','',1,5,3600,0,'0000-00-00 00:00:00',2,0),
 (4,3,'Joomla! Community Magazine','joomla-community-magazine','http://feeds.joomla.org/JoomlaMagazine','',1,20,3600,0,'0000-00-00 00:00:00',3,0),
 (4,4,'Joomla! Developer News','joomla-developer-news','http://feeds.joomla.org/JoomlaDeveloper','',1,5,3600,0,'0000-00-00 00:00:00',4,0),
 (4,5,'Joomla! Security News','joomla-security-news','http://feeds.joomla.org/JoomlaSecurityNews','',1,5,3600,0,'0000-00-00 00:00:00',5,0),
 (5,6,'Free Software Foundation Blogs','free-software-foundation-blogs','http://www.fsf.org/blogs/RSS',NULL,1,5,3600,0,'0000-00-00 00:00:00',4,0),
 (5,7,'Free Software Foundation','free-software-foundation','http://www.fsf.org/news/RSS',NULL,1,5,3600,0,'0000-00-00 00:00:00',3,0),
 (5,8,'Software Freedom Law Center Blog','software-freedom-law-center-blog','http://www.softwarefreedom.org/feeds/blog/',NULL,1,5,3600,0,'0000-00-00 00:00:00',2,0),
 (5,9,'Software Freedom Law Center News','software-freedom-law-center','http://www.softwarefreedom.org/feeds/news/',NULL,1,5,3600,0,'0000-00-00 00:00:00',1,0),
 (5,10,'Open Source Initiative Blog','open-source-initiative-blog','http://www.opensource.org/blog/feed',NULL,1,5,3600,0,'0000-00-00 00:00:00',5,0),
 (6,11,'PHP News and Announcements','php-news-and-announcements','http://www.php.net/feed.atom',NULL,1,5,3600,0,'0000-00-00 00:00:00',1,0),
 (6,12,'Planet MySQL','planet-mysql','http://www.planetmysql.org/rss20.xml',NULL,1,5,3600,0,'0000-00-00 00:00:00',2,0),
 (6,13,'Linux Foundation Announcements','linux-foundation-announcements','http://www.linuxfoundation.org/press/rss20.xml',NULL,1,5,3600,0,'0000-00-00 00:00:00',3,0),
 (6,14,'Mootools Blog','mootools-blog','http://feeds.feedburner.com/mootools-blog',NULL,1,5,3600,0,'0000-00-00 00:00:00',4,0);
/*!40000 ALTER TABLE `jos_newsfeeds` ENABLE KEYS */;


--
-- Definition of table `jos_plugins`
--

DROP TABLE IF EXISTS `jos_plugins`;
CREATE TABLE `jos_plugins` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `element` varchar(100) NOT NULL default '',
  `folder` varchar(100) NOT NULL default '',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `published` tinyint(3) NOT NULL default '0',
  `iscore` tinyint(3) NOT NULL default '0',
  `client_id` tinyint(3) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_plugins`
--

/*!40000 ALTER TABLE `jos_plugins` DISABLE KEYS */;
INSERT INTO `jos_plugins` (`id`,`name`,`element`,`folder`,`access`,`ordering`,`published`,`iscore`,`client_id`,`checked_out`,`checked_out_time`,`params`) VALUES 
 (1,'Authentication - Joomla','joomla','authentication',0,1,1,1,0,0,'0000-00-00 00:00:00',''),
 (2,'Authentication - LDAP','ldap','authentication',0,2,0,1,0,0,'0000-00-00 00:00:00','host=\nport=389\nuse_ldapV3=0\nnegotiate_tls=0\nno_referrals=0\nauth_method=bind\nbase_dn=\nsearch_string=\nusers_dn=\nusername=\npassword=\nldap_fullname=fullName\nldap_email=mail\nldap_uid=uid\n\n'),
 (3,'Authentication - GMail','gmail','authentication',0,4,0,0,0,0,'0000-00-00 00:00:00',''),
 (4,'Authentication - OpenID','openid','authentication',0,3,0,0,0,0,'0000-00-00 00:00:00',''),
 (5,'User - Joomla!','joomla','user',0,0,1,0,0,0,'0000-00-00 00:00:00','autoregister=1\n\n'),
 (6,'Search - Content','content','search',0,1,1,1,0,0,'0000-00-00 00:00:00','search_limit=50\nsearch_content=1\nsearch_uncategorised=1\nsearch_archived=1\n\n'),
 (7,'Search - Contacts','contacts','search',0,3,1,1,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),
 (8,'Search - Categories','categories','search',0,4,1,0,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),
 (9,'Search - Sections','sections','search',0,5,1,0,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),
 (10,'Search - Newsfeeds','newsfeeds','search',0,6,1,0,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),
 (11,'Search - Weblinks','weblinks','search',0,2,1,1,0,0,'0000-00-00 00:00:00','search_limit=50\n\n'),
 (12,'Content - Pagebreak','pagebreak','content',0,10000,1,1,0,0,'0000-00-00 00:00:00','enabled=1\ntitle=1\nmultipage_toc=1\nshowall=1\n\n'),
 (13,'Content - Rating','vote','content',0,4,1,1,0,0,'0000-00-00 00:00:00',''),
 (14,'Content - Email Cloaking','emailcloak','content',0,5,1,0,0,0,'0000-00-00 00:00:00','mode=1\n\n'),
 (15,'Content - Code Hightlighter (GeSHi)','geshi','content',0,5,0,0,0,0,'0000-00-00 00:00:00',''),
 (16,'Content - Load Module','loadmodule','content',0,6,1,0,0,0,'0000-00-00 00:00:00','enabled=1\nstyle=0\n\n'),
 (17,'Content - Page Navigation','pagenavigation','content',0,2,1,1,0,0,'0000-00-00 00:00:00','position=1\n\n'),
 (18,'Editor - No Editor','none','editors',0,0,1,1,0,0,'0000-00-00 00:00:00',''),
 (19,'Editor - TinyMCE 2.0','tinymce','editors',0,0,1,1,0,0,'0000-00-00 00:00:00','theme=advanced\ncleanup=1\ncleanup_startup=0\nautosave=0\ncompressed=0\nrelative_urls=1\ntext_direction=ltr\nlang_mode=0\nlang_code=en\ninvalid_elements=applet\ncontent_css=1\ncontent_css_custom=\nnewlines=0\ntoolbar=top\nhr=1\nsmilies=1\ntable=1\nstyle=1\nlayer=1\nxhtmlxtras=0\ntemplate=0\ndirectionality=1\nfullscreen=1\nhtml_height=550\nhtml_width=750\npreview=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\n\n'),
 (20,'Editor - XStandard Lite 2.0','xstandard','editors',0,0,0,1,0,0,'0000-00-00 00:00:00',''),
 (21,'Editor Button - Image','image','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00',''),
 (22,'Editor Button - Pagebreak','pagebreak','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00',''),
 (23,'Editor Button - Readmore','readmore','editors-xtd',0,0,1,0,0,0,'0000-00-00 00:00:00',''),
 (24,'XML-RPC - Joomla','joomla','xmlrpc',0,7,0,1,0,0,'0000-00-00 00:00:00',''),
 (25,'XML-RPC - Blogger API','blogger','xmlrpc',0,7,0,1,0,0,'0000-00-00 00:00:00','catid=1\nsectionid=0\n\n'),
 (27,'System - SEF','sef','system',0,1,1,0,0,0,'0000-00-00 00:00:00',''),
 (28,'System - Debug','debug','system',0,2,1,0,0,0,'0000-00-00 00:00:00','queries=1\nmemory=1\nlangauge=1\n\n'),
 (29,'System - Legacy','legacy','system',0,3,0,1,0,0,'0000-00-00 00:00:00','route=0\n\n'),
 (30,'System - Cache','cache','system',0,4,0,1,0,0,'0000-00-00 00:00:00','browsercache=0\ncachetime=15\n\n'),
 (31,'System - Log','log','system',0,5,0,1,0,0,'0000-00-00 00:00:00',''),
 (32,'System - Remember Me','remember','system',0,6,1,1,0,0,'0000-00-00 00:00:00',''),
 (33,'System - Backlink','backlink','system',0,7,0,1,0,0,'0000-00-00 00:00:00',''),
 (34,'NOAH\'s classifields bridge - AUTH','noah','authentication',0,0,1,0,0,0,'0000-00-00 00:00:00','noah_path=../noah\n'),
 (35,'NOAH\'s classifields bridge - SYSTEM','noah','system',0,0,0,0,0,0,'0000-00-00 00:00:00','noah_path=../noah\n'),
 (36,'NOAH\'s classifields bridge - USER','noah','user',0,0,0,0,0,0,'0000-00-00 00:00:00','noah_path=../noah\n');
/*!40000 ALTER TABLE `jos_plugins` ENABLE KEYS */;


--
-- Definition of table `jos_poll_data`
--

DROP TABLE IF EXISTS `jos_poll_data`;
CREATE TABLE `jos_poll_data` (
  `id` int(11) NOT NULL auto_increment,
  `pollid` int(11) NOT NULL default '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pollid` (`pollid`,`text`(1))
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_poll_data`
--

/*!40000 ALTER TABLE `jos_poll_data` DISABLE KEYS */;
INSERT INTO `jos_poll_data` (`id`,`pollid`,`text`,`hits`) VALUES 
 (1,14,'Community Sites',3),
 (2,14,'Public Brand Sites',3),
 (3,14,'eCommerce',1),
 (4,14,'Blogs',0),
 (5,14,'Intranets',0),
 (6,14,'Photo and Media Sites',2),
 (7,14,'All of the Above!',3),
 (8,14,'',0),
 (9,14,'',0),
 (10,14,'',0),
 (11,14,'',0),
 (12,14,'',0);
/*!40000 ALTER TABLE `jos_poll_data` ENABLE KEYS */;


--
-- Definition of table `jos_poll_date`
--

DROP TABLE IF EXISTS `jos_poll_date`;
CREATE TABLE `jos_poll_date` (
  `id` bigint(20) NOT NULL auto_increment,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL default '0',
  `poll_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_poll_date`
--

/*!40000 ALTER TABLE `jos_poll_date` DISABLE KEYS */;
INSERT INTO `jos_poll_date` (`id`,`date`,`vote_id`,`poll_id`) VALUES 
 (1,'2006-10-09 13:01:58',1,14),
 (2,'2006-10-10 15:19:43',7,14),
 (3,'2006-10-11 11:08:16',7,14),
 (4,'2006-10-11 15:02:26',2,14),
 (5,'2006-10-11 15:43:03',7,14),
 (6,'2006-10-11 15:43:38',7,14),
 (7,'2006-10-12 00:51:13',2,14),
 (8,'2007-05-10 19:12:29',3,14),
 (9,'2007-05-14 14:18:00',6,14),
 (10,'2007-06-10 15:20:29',6,14),
 (11,'2007-07-03 12:37:53',2,14),
 (12,'2009-02-03 08:31:37',1,14);
/*!40000 ALTER TABLE `jos_poll_date` ENABLE KEYS */;


--
-- Definition of table `jos_poll_menu`
--

DROP TABLE IF EXISTS `jos_poll_menu`;
CREATE TABLE `jos_poll_menu` (
  `pollid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pollid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_poll_menu`
--

/*!40000 ALTER TABLE `jos_poll_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_poll_menu` ENABLE KEYS */;


--
-- Definition of table `jos_polls`
--

DROP TABLE IF EXISTS `jos_polls`;
CREATE TABLE `jos_polls` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `voters` int(9) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `access` int(11) NOT NULL default '0',
  `lag` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_polls`
--

/*!40000 ALTER TABLE `jos_polls` DISABLE KEYS */;
INSERT INTO `jos_polls` (`id`,`title`,`alias`,`voters`,`checked_out`,`checked_out_time`,`published`,`access`,`lag`) VALUES 
 (14,'Joomla! is used for?','joomla-is-used-for',12,0,'0000-00-00 00:00:00',1,0,86400);
/*!40000 ALTER TABLE `jos_polls` ENABLE KEYS */;


--
-- Definition of table `jos_rsgallery2_acl`
--

DROP TABLE IF EXISTS `jos_rsgallery2_acl`;
CREATE TABLE `jos_rsgallery2_acl` (
  `id` int(11) NOT NULL auto_increment,
  `gallery_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL default '0',
  `public_view` tinyint(1) NOT NULL default '1',
  `public_up_mod_img` tinyint(1) NOT NULL default '0',
  `public_del_img` tinyint(1) NOT NULL default '0',
  `public_create_mod_gal` tinyint(1) NOT NULL default '0',
  `public_del_gal` tinyint(1) NOT NULL default '0',
  `public_vote_view` tinyint(1) NOT NULL default '1',
  `public_vote_vote` tinyint(1) NOT NULL default '0',
  `registered_view` tinyint(1) NOT NULL default '1',
  `registered_up_mod_img` tinyint(1) NOT NULL default '1',
  `registered_del_img` tinyint(1) NOT NULL default '0',
  `registered_create_mod_gal` tinyint(1) NOT NULL default '1',
  `registered_del_gal` tinyint(1) NOT NULL default '0',
  `registered_vote_view` tinyint(1) NOT NULL default '1',
  `registered_vote_vote` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_rsgallery2_acl`
--

/*!40000 ALTER TABLE `jos_rsgallery2_acl` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_rsgallery2_acl` ENABLE KEYS */;


--
-- Definition of table `jos_rsgallery2_comments`
--

DROP TABLE IF EXISTS `jos_rsgallery2_comments`;
CREATE TABLE `jos_rsgallery2_comments` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_ip` varchar(50) NOT NULL default '0.0.0.0',
  `parent_id` int(11) NOT NULL default '0',
  `item_id` int(11) NOT NULL,
  `item_table` varchar(50) default NULL,
  `datetime` datetime NOT NULL,
  `subject` varchar(100) default NULL,
  `comment` text NOT NULL,
  `published` tinyint(1) NOT NULL default '1',
  `checked_out` int(11) default NULL,
  `checked_out_time` datetime default NULL,
  `ordering` int(11) NOT NULL,
  `params` text,
  `hits` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_rsgallery2_comments`
--

/*!40000 ALTER TABLE `jos_rsgallery2_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_rsgallery2_comments` ENABLE KEYS */;


--
-- Definition of table `jos_rsgallery2_config`
--

DROP TABLE IF EXISTS `jos_rsgallery2_config`;
CREATE TABLE `jos_rsgallery2_config` (
  `id` int(9) unsigned NOT NULL auto_increment,
  `name` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_rsgallery2_config`
--

/*!40000 ALTER TABLE `jos_rsgallery2_config` DISABLE KEYS */;
INSERT INTO `jos_rsgallery2_config` (`id`,`name`,`value`) VALUES 
 (1,'acl_enabled','0'),
 (2,'allowedFileTypes','jpg,jpeg,gif,png'),
 (3,'comment','1'),
 (4,'comment_allowed_public','1'),
 (5,'comment_once','0'),
 (6,'comment_security','1'),
 (7,'cookie_prefix','rsgvoting_'),
 (8,'createImgDirs',''),
 (9,'current_slideshow','slideshow_parth'),
 (10,'debug',''),
 (11,'dispLimitbox','1'),
 (12,'displayBranding','1'),
 (13,'displayComments','1'),
 (14,'displayDesc','1'),
 (15,'displayDownload','1'),
 (16,'displayEXIF','1'),
 (17,'displayHits','0'),
 (18,'displayLatest','1'),
 (19,'displayPopup','1'),
 (20,'displayRandom','1'),
 (21,'displaySearch','1'),
 (22,'displaySlideshow','1'),
 (23,'displayStatus','1'),
 (24,'displayVoting','1'),
 (25,'display_img_dynamicResize','5'),
 (26,'display_thumbs_colsPerPage','3'),
 (27,'display_thumbs_floatDirection','left'),
 (28,'display_thumbs_maxPerPage','9'),
 (29,'display_thumbs_showImgName','1'),
 (30,'display_thumbs_style','table'),
 (31,'exifTags','FileName|FileDateTime|resolution'),
 (32,'filter_order','ordering'),
 (33,'filter_order_Dir','ASC'),
 (34,'ftp_path',''),
 (35,'galcountNrs','5'),
 (36,'gallery_folders',''),
 (37,'graphicsLib','gd2'),
 (38,'hideRoot',''),
 (39,'imageMagick_path',''),
 (40,'image_width','400'),
 (41,'imgPath_display','/images/rsgallery/display'),
 (42,'imgPath_original','/images/rsgallery/original'),
 (43,'imgPath_thumb','/images/rsgallery/thumb'),
 (44,'imgPath_watermarked','/images/rsgallery/watermarked'),
 (45,'intro_text',''),
 (46,'jpegQuality','85'),
 (47,'keepOriginalImage','1'),
 (48,'netpbm_path',''),
 (49,'resize_portrait_by_height','1'),
 (50,'showGalleryDate','1'),
 (51,'showGalleryOwner','1'),
 (52,'showGallerySize','1'),
 (53,'show_mygalleries','0'),
 (54,'template','semantic'),
 (55,'thumb_style','1'),
 (56,'thumb_width','80'),
 (57,'uu_createCat','0'),
 (58,'uu_enabled','0'),
 (59,'uu_maxCat','5'),
 (60,'uu_maxImages','50'),
 (61,'version','1.16.0'),
 (62,'voting','1'),
 (63,'voting_once','1'),
 (64,'watermark','0'),
 (65,'watermark_angle','0'),
 (66,'watermark_font','arial.ttf'),
 (67,'watermark_font_size','20'),
 (68,'watermark_image','watermark.png'),
 (69,'watermark_position','5'),
 (70,'watermark_text','(c) 2007 - RSGallery2'),
 (71,'watermark_transparency','50'),
 (72,'watermark_type','text');
/*!40000 ALTER TABLE `jos_rsgallery2_config` ENABLE KEYS */;


--
-- Definition of table `jos_rsgallery2_files`
--

DROP TABLE IF EXISTS `jos_rsgallery2_files`;
CREATE TABLE `jos_rsgallery2_files` (
  `id` int(9) unsigned NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `descr` text,
  `gallery_id` int(9) unsigned NOT NULL default '0',
  `title` varchar(50) NOT NULL default '',
  `hits` int(11) unsigned NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `rating` int(10) unsigned NOT NULL default '0',
  `votes` int(10) unsigned NOT NULL default '0',
  `comments` int(10) unsigned NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '1',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(9) unsigned NOT NULL default '0',
  `approved` tinyint(1) unsigned NOT NULL default '1',
  `userid` int(10) NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `UK_name` (`name`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_rsgallery2_files`
--

/*!40000 ALTER TABLE `jos_rsgallery2_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_rsgallery2_files` ENABLE KEYS */;


--
-- Definition of table `jos_rsgallery2_galleries`
--

DROP TABLE IF EXISTS `jos_rsgallery2_galleries`;
CREATE TABLE `jos_rsgallery2_galleries` (
  `id` int(11) NOT NULL auto_increment,
  `parent` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `user` tinyint(4) NOT NULL default '0',
  `uid` int(11) unsigned NOT NULL default '0',
  `allowed` varchar(100) NOT NULL default '0',
  `thumb_id` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_rsgallery2_galleries`
--

/*!40000 ALTER TABLE `jos_rsgallery2_galleries` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_rsgallery2_galleries` ENABLE KEYS */;


--
-- Definition of table `jos_sections`
--

DROP TABLE IF EXISTS `jos_sections`;
CREATE TABLE `jos_sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` text NOT NULL,
  `scope` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_scope` (`scope`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_sections`
--

/*!40000 ALTER TABLE `jos_sections` DISABLE KEYS */;
INSERT INTO `jos_sections` (`id`,`title`,`name`,`alias`,`image`,`scope`,`image_position`,`description`,`published`,`checked_out`,`checked_out_time`,`ordering`,`access`,`count`,`params`) VALUES 
 (1,'News','','news','articles.jpg','content','right','Select a news topic from the list below, then select a news article to read.',1,0,'0000-00-00 00:00:00',3,0,2,''),
 (3,'FAQs','','faqs','key.jpg','content','left','From the list below choose one of our FAQs topics, then select an FAQ to read. If you have a question which is not in this section, please contact us.',1,0,'0000-00-00 00:00:00',5,0,23,''),
 (4,'About Joomla!','','about-joomla','','content','left','',1,0,'0000-00-00 00:00:00',2,0,14,'');
/*!40000 ALTER TABLE `jos_sections` ENABLE KEYS */;


--
-- Definition of table `jos_session`
--

DROP TABLE IF EXISTS `jos_session`;
CREATE TABLE `jos_session` (
  `username` varchar(150) default '',
  `time` varchar(14) default '',
  `session_id` varchar(200) NOT NULL default '0',
  `guest` tinyint(4) default '1',
  `userid` int(11) default '0',
  `usertype` varchar(50) default '',
  `gid` tinyint(3) unsigned NOT NULL default '0',
  `client_id` tinyint(3) unsigned NOT NULL default '0',
  `data` longtext,
  `bc_lastUpdate` varchar(14) default NULL,
  PRIMARY KEY  (`session_id`(64)),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_session`
--

/*!40000 ALTER TABLE `jos_session` DISABLE KEYS */;
INSERT INTO `jos_session` (`username`,`time`,`session_id`,`guest`,`userid`,`usertype`,`gid`,`client_id`,`data`,`bc_lastUpdate`) VALUES 
 ('','1236447069','3f8b3cd63f46f74cde7a04ddb1aef463',1,0,'',0,0,'__default|a:7:{s:15:\"session.counter\";i:21;s:19:\"session.timer.start\";i:1236446809;s:18:\"session.timer.last\";i:1236447065;s:17:\"session.timer.now\";i:1236447069;s:22:\"session.client.browser\";s:47:\"Opera/9.60 (Windows NT 5.1; U; en) Presto/2.1.1\";s:8:\"registry\";O:9:\"JRegistry\":3:{s:17:\"_defaultNameSpace\";s:7:\"session\";s:9:\"_registry\";a:1:{s:7:\"session\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:4:\"user\";O:5:\"JUser\":19:{s:2:\"id\";i:0;s:4:\"name\";N;s:8:\"username\";N;s:5:\"email\";N;s:8:\"password\";N;s:14:\"password_clear\";s:0:\"\";s:8:\"usertype\";N;s:5:\"block\";N;s:9:\"sendEmail\";i:0;s:3:\"gid\";i:0;s:12:\"registerDate\";N;s:13:\"lastvisitDate\";N;s:10:\"activation\";N;s:6:\"params\";N;s:3:\"aid\";i:0;s:5:\"guest\";i:1;s:7:\"_params\";O:10:\"JParameter\":7:{s:4:\"_raw\";s:0:\"\";s:4:\"_xml\";N;s:9:\"_elements\";a:0:{}s:12:\"_elementPath\";a:1:{i:0;s:64:\"C:\\xampp\\htdocs\\Joomla15\\libraries\\joomla\\html\\parameter\\element\";}s:17:\"_defaultNameSpace\";s:8:\"_default\";s:9:\"_registry\";a:1:{s:8:\"_default\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}}s:7:\"_errors\";a:0:{}}s:9:\"_errorMsg\";N;s:7:\"_errors\";a:0:{}}}',NULL),
 ('admin','1236447003','f600a1786a663b788e7e9b8b28600995',0,62,'Super Administrator',25,1,'__default|a:8:{s:15:\"session.counter\";i:35;s:19:\"session.timer.start\";i:1236446809;s:18:\"session.timer.last\";i:1236447003;s:17:\"session.timer.now\";i:1236447003;s:22:\"session.client.browser\";s:47:\"Opera/9.60 (Windows NT 5.1; U; en) Presto/2.1.1\";s:8:\"registry\";O:9:\"JRegistry\":3:{s:17:\"_defaultNameSpace\";s:7:\"session\";s:9:\"_registry\";a:5:{s:7:\"session\";a:1:{s:4:\"data\";O:8:\"stdClass\":0:{}}s:11:\"application\";a:1:{s:4:\"data\";O:8:\"stdClass\":1:{s:4:\"lang\";s:0:\"\";}}s:6:\"global\";a:1:{s:4:\"data\";O:8:\"stdClass\":1:{s:4:\"list\";O:8:\"stdClass\":1:{s:5:\"limit\";s:2:\"20\";}}}s:13:\"com_installer\";a:1:{s:4:\"data\";O:8:\"stdClass\":1:{s:10:\"limitstart\";O:8:\"stdClass\":1:{s:9:\"component\";i:0;}}}s:9:\"com_menus\";a:1:{s:4:\"data\";O:8:\"stdClass\":1:{s:8:\"menutype\";s:7:\"topmenu\";}}}s:7:\"_errors\";a:0:{}}s:4:\"user\";O:5:\"JUser\":19:{s:2:\"id\";s:2:\"62\";s:4:\"name\";s:13:\"Administrator\";s:8:\"username\";s:5:\"admin\";s:5:\"email\";s:19:\"sd.hrishi@gmail.com\";s:8:\"password\";s:65:\"5bbe294d2a2c6cf8186305790c7a49ed:hRFDZ4rEGZTOn5UjB6SgzceJMS3EyRvp\";s:14:\"password_clear\";s:0:\"\";s:8:\"usertype\";s:19:\"Super Administrator\";s:5:\"block\";s:1:\"0\";s:9:\"sendEmail\";s:1:\"1\";s:3:\"gid\";s:2:\"25\";s:12:\"registerDate\";s:19:\"2009-01-28 09:47:39\";s:13:\"lastvisitDate\";s:19:\"2009-03-07 16:18:35\";s:10:\"activation\";s:0:\"\";s:6:\"params\";s:87:\"page_title=Edit Your Details\nadmin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=5.5\n\n\";s:3:\"aid\";i:2;s:5:\"guest\";i:0;s:7:\"_params\";O:10:\"JParameter\":7:{s:4:\"_raw\";s:0:\"\";s:4:\"_xml\";N;s:9:\"_elements\";a:0:{}s:12:\"_elementPath\";a:1:{i:0;s:64:\"C:\\xampp\\htdocs\\Joomla15\\libraries\\joomla\\html\\parameter\\element\";}s:17:\"_defaultNameSpace\";s:8:\"_default\";s:9:\"_registry\";a:1:{s:8:\"_default\";a:1:{s:4:\"data\";O:8:\"stdClass\":6:{s:10:\"page_title\";s:17:\"Edit Your Details\";s:14:\"admin_language\";s:0:\"\";s:8:\"language\";s:0:\"\";s:6:\"editor\";s:0:\"\";s:8:\"helpsite\";s:0:\"\";s:8:\"timezone\";s:3:\"5.5\";}}}s:7:\"_errors\";a:0:{}}s:9:\"_errorMsg\";N;s:7:\"_errors\";a:0:{}}s:13:\"session.token\";s:32:\"b490b4b3f9e44901ad8b2e363c87b585\";}',NULL);
/*!40000 ALTER TABLE `jos_session` ENABLE KEYS */;


--
-- Definition of table `jos_stats_agents`
--

DROP TABLE IF EXISTS `jos_stats_agents`;
CREATE TABLE `jos_stats_agents` (
  `agent` varchar(255) NOT NULL default '',
  `type` tinyint(1) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_stats_agents`
--

/*!40000 ALTER TABLE `jos_stats_agents` DISABLE KEYS */;
/*!40000 ALTER TABLE `jos_stats_agents` ENABLE KEYS */;


--
-- Definition of table `jos_templates_menu`
--

DROP TABLE IF EXISTS `jos_templates_menu`;
CREATE TABLE `jos_templates_menu` (
  `template` varchar(255) NOT NULL default '',
  `menuid` int(11) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`menuid`,`client_id`,`template`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_templates_menu`
--

/*!40000 ALTER TABLE `jos_templates_menu` DISABLE KEYS */;
INSERT INTO `jos_templates_menu` (`template`,`menuid`,`client_id`) VALUES 
 ('rhuk_milkyway',0,0),
 ('khepri',0,1);
/*!40000 ALTER TABLE `jos_templates_menu` ENABLE KEYS */;


--
-- Definition of table `jos_users`
--

DROP TABLE IF EXISTS `jos_users`;
CREATE TABLE `jos_users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `username` varchar(150) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `usertype` varchar(25) NOT NULL default '',
  `block` tinyint(4) NOT NULL default '0',
  `sendEmail` tinyint(4) default '0',
  `gid` tinyint(3) unsigned NOT NULL default '1',
  `registerDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL default '',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_users`
--

/*!40000 ALTER TABLE `jos_users` DISABLE KEYS */;
INSERT INTO `jos_users` (`id`,`name`,`username`,`email`,`password`,`usertype`,`block`,`sendEmail`,`gid`,`registerDate`,`lastvisitDate`,`activation`,`params`) VALUES 
 (62,'Administrator','admin','sd.hrishi@gmail.com','5bbe294d2a2c6cf8186305790c7a49ed:hRFDZ4rEGZTOn5UjB6SgzceJMS3EyRvp','Super Administrator',0,1,25,'2009-01-28 09:47:39','2009-03-07 17:27:02','','page_title=Edit Your Details\nadmin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=5.5\n\n'),
 (63,'hrishikesh','hrishi','hrishi1947@yahoo.com','9ceb35f2da121fb74a149cbbbd1dc829:2RB7uBY6o50JT06XuFU6hKQfNObDlYmy','Registered',0,0,18,'2009-01-28 10:44:39','2009-02-25 05:16:13','68d26afba0cbe280b0751a4da4baff45','page_title=Edit Your Details\nshow_page_title=1\nlanguage=en-GB\ntimezone=0\n\n'),
 (64,'mantu','mantu','mantu@gmail.com','59ea40a8a6f118875849520eb7438bce:vtuPLYDhH0OwBAkliN0qMKBMF1wUkzRu','',1,0,18,'2009-02-24 17:58:23','0000-00-00 00:00:00','cf845fa5495266ca058fd5d392efd318','\n'),
 (65,'dd','dd','dd@gmail.com','a04a880623cb3e707135afc3366df8ff:xTaoXgAraSDL6FAmdbf3BVEzHk7rndBu','',1,0,18,'2009-02-24 18:02:12','0000-00-00 00:00:00','61b2d6c52d2a27080558dd1f9aaed915','\n'),
 (66,'kk','kkk','kk@gmail.com','405400a3ad82d9f096866699c2622d65:1h4tM0mgcvZdPE2KLsJFFlYsiI47eWMR','',1,0,18,'2009-02-24 18:06:07','0000-00-00 00:00:00','066d0511ae95c19f49f344303a7e0042','\n'),
 (67,'ankur','ankur','ankur@a.com','9853fc2dbcc057932e5d0769421491f7:ioIyVPTa74mWwNbsDD0anUB0BHVAiLDV','',1,0,18,'2009-02-26 16:27:39','0000-00-00 00:00:00','b447e6f382fcdae712ca2cd760d0676d','\n'),
 (68,'aa','aa','aa@gg.com','0e0b4b0665e6a5bc8ff4f1423e8ffc23:VuLadKWHsx5F562Umhfm4s8oo32xTPXg','',1,0,18,'2009-02-26 16:32:01','0000-00-00 00:00:00','e56ce71bc305b7bd8f0cefbebe93e8b1','\n'),
 (69,'rja','raj','afr@ar.com','eb39ca602668eaeba906dfc6f438dba7:TzUXO61zxdpwwFF3khss9wrNPciRn6aC','',1,0,18,'2009-02-26 16:32:42','0000-00-00 00:00:00','243909a21a5f2c67ca2d632a01d4fddb','\n'),
 (70,'ad','ad','ad@ad.com','a325af152805d3e4c278f1b1963194fb:8wRzvS2ziww7hGrEaWSlkcSkPUYopFPn','',1,0,18,'2009-02-26 16:38:08','0000-00-00 00:00:00','3761367e502fe1dcc93522ba0454f6b7','\n'),
 (71,'adk','adk','adk@ad.com','6a3df549270cd43b40a1c746ae48c1ab:WAMpQQbDogCvbV1msnmwEX30EzgZl8aV','',0,0,18,'2009-02-26 16:40:24','2009-02-26 16:44:16','','\n'),
 (72,'rjd','rjd','rjd@rjd.com','8d7a00f43b350be7d124a1305ec8c799:Kkk91xmKxEVnIDxRAL1BD6fDR4CYJGC7','',1,0,18,'2009-02-26 16:58:02','0000-00-00 00:00:00','8342743fbb93a852bc45eac7ee53d0e3','\n');
/*!40000 ALTER TABLE `jos_users` ENABLE KEYS */;


--
-- Definition of table `jos_weblinks`
--

DROP TABLE IF EXISTS `jos_weblinks`;
CREATE TABLE `jos_weblinks` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `catid` int(11) NOT NULL default '0',
  `sid` int(11) NOT NULL default '0',
  `title` varchar(250) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `url` varchar(250) NOT NULL default '',
  `description` text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL default '0',
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `archived` tinyint(1) NOT NULL default '0',
  `approved` tinyint(1) NOT NULL default '1',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`,`published`,`archived`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jos_weblinks`
--

/*!40000 ALTER TABLE `jos_weblinks` DISABLE KEYS */;
INSERT INTO `jos_weblinks` (`id`,`catid`,`sid`,`title`,`alias`,`url`,`description`,`date`,`hits`,`published`,`checked_out`,`checked_out_time`,`ordering`,`archived`,`approved`,`params`) VALUES 
 (1,2,0,'Joomla!','joomla','http://www.joomla.org','Home of Joomla!','2005-02-14 15:19:02',3,1,0,'0000-00-00 00:00:00',1,0,1,'target=0'),
 (2,2,0,'php.net','php','http://www.php.net','The language that Joomla! is developed in','2004-07-07 11:33:24',6,1,0,'0000-00-00 00:00:00',3,0,1,''),
 (3,2,0,'MySQL','mysql','http://www.mysql.com','The database that Joomla! uses','2004-07-07 10:18:31',1,1,0,'0000-00-00 00:00:00',5,0,1,''),
 (4,2,0,'OpenSourceMatters','opensourcematters','http://www.opensourcematters.org','Home of OSM','2005-02-14 15:19:02',11,1,0,'0000-00-00 00:00:00',2,0,1,'target=0'),
 (5,2,0,'Joomla! - Forums','joomla-forums','http://forum.joomla.org','Joomla! Forums','2005-02-14 15:19:02',4,1,0,'0000-00-00 00:00:00',4,0,1,'target=0'),
 (6,2,0,'Ohloh Tracking of Joomla!','ohloh-tracking-of-joomla','http://www.ohloh.net/projects/20','Objective reports from Ohloh about Joomla\'s development activity. Joomla! has some star developers with serious kudos.','2007-07-19 09:28:31',1,1,0,'0000-00-00 00:00:00',6,0,1,'target=0\n\n');
/*!40000 ALTER TABLE `jos_weblinks` ENABLE KEYS */;


--
-- Definition of table `jos_yellowpage`
--

DROP TABLE IF EXISTS `jos_yellowpage`;
CREATE TABLE `jos_yellowpage` (
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

--
-- Dumping data for table `jos_yellowpage`
--

/*!40000 ALTER TABLE `jos_yellowpage` DISABLE KEYS */;
INSERT INTO `jos_yellowpage` (`yid`,`type`,`description`,`checked_out`,`checked_out_time`,`params`,`ordering`,`published`) VALUES 
 (1,'Education','This yellowpage provide the information various information regarding about the education, institution, university, college, schools etc.',0,'0000-00-00 00:00:00','',0,1),
 (2,'Medical','This yellowpage provides the information regarding the medical stores, hospitals, nursing homes etc.',0,'0000-00-00 00:00:00','',0,1),
 (3,'Hotel-Lodge','This yellowpage provides the information about the Hotels, Lodges etc',0,'0000-00-00 00:00:00','',0,1),
 (4,'Club','This yellowpage provide the information regarding the clubs and their activity like sporting, pooja ect.',0,'0000-00-00 00:00:00','',0,1),
 (5,'Doctors','This yellowpage provides the information about the doctors and theirs specialist work, their working locations etc.',0,'0000-00-00 00:00:00','',0,1),
 (6,'Vehicle','This yellowpage provide the information regarding the vehicle shops.',0,'0000-00-00 00:00:00','',0,1);
/*!40000 ALTER TABLE `jos_yellowpage` ENABLE KEYS */;


--
-- Definition of table `jos_yp_club`
--

DROP TABLE IF EXISTS `jos_yp_club`;
CREATE TABLE `jos_yp_club` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jos_yp_club`
--

/*!40000 ALTER TABLE `jos_yp_club` DISABLE KEYS */;
INSERT INTO `jos_yp_club` (`id`,`yid`,`clubname`,`secretaryname`,`history`,`sportactivity`,`secretaryword`,`phone`,`mobile`,`location`,`city`,`state`,`emailid`,`website`,`description`,`checked_out`,`checked_out_time`,`params`,`odering`,`hits`,`published`,`addedby`) VALUES 
 (2,4,'Yuth Club','Mr. Sankar','history','sport','good work','12345','54321','shiv mandir','siliguri','w bengal','sd.hrishi@gmail.com','http://www.yuth.com','',0,'0000-00-00 00:00:00','show_secretaryname=1\nshow_history=1\nshow_sportactivity=1\nshow_secretaryword=1\nshow_website=1\nshow_email=1\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=1\nclub_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1,'server'),
 (3,4,'Lions Club','Mr. Mantu','since 1857','no','say some thing','123','321','khagra','kishanganj','wb','lion@gmail.com','http://www.lion.com','say',0,'0000-00-00 00:00:00','show_secretaryname=1\nshow_history=1\nshow_sportactivity=1\nshow_secretaryword=1\nshow_website=1\nshow_email=1\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=1\nclub_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1,'127.0.0.1');
/*!40000 ALTER TABLE `jos_yp_club` ENABLE KEYS */;


--
-- Definition of table `jos_yp_doctors`
--

DROP TABLE IF EXISTS `jos_yp_doctors`;
CREATE TABLE `jos_yp_doctors` (
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

--
-- Dumping data for table `jos_yp_doctors`
--

/*!40000 ALTER TABLE `jos_yp_doctors` DISABLE KEYS */;
INSERT INTO `jos_yp_doctors` (`id`,`yid`,`docname`,`specialist`,`areaofoperations`,`parmanentclinic`,`phone`,`mobile`,`location`,`city`,`state`,`emailid`,`website`,`description`,`checked_out`,`checked_out_time`,`params`,`ordering`,`hits`,`published`,`addedby`) VALUES 
 (2,5,'Dr. Bhagwati Charan','ENT','siliguri, kadamtal','siliguri','12345','54321','siliguri','siliguri','w b','bc@yahoo.com','http://www.bc.com','',0,'0000-00-00 00:00:00','show_specialist=1\nshow_aooperation=0\nshow_pclinic=1\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=0\ndoctors_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1,'server'),
 (3,5,'Mr. Hrishikesh','EYE','siliguri, kolkata, london','london','123','321','siliguri','siliguri','siliguri','hrishikesh@doc.com','http://www.doc.com','dsa',0,'0000-00-00 00:00:00','show_specialist=1\nshow_aooperation=1\nshow_pclinic=1\nshow_website=1\nshow_email=1\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=1\ndoctors_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1,'127.0.0.1');
/*!40000 ALTER TABLE `jos_yp_doctors` ENABLE KEYS */;


--
-- Definition of table `jos_yp_education`
--

DROP TABLE IF EXISTS `jos_yp_education`;
CREATE TABLE `jos_yp_education` (
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jos_yp_education`
--

/*!40000 ALTER TABLE `jos_yp_education` DISABLE KEYS */;
INSERT INTO `jos_yp_education` (`id`,`yid`,`eduname`,`category`,`standard`,`principal`,`totalstrength`,`phone`,`mobile`,`location`,`city`,`state`,`website`,`emailid`,`description`,`checked_out`,`checked_out_time`,`params`,`hits`,`published`,`addedby`) VALUES 
 (1,1,0x69676E6F7520,'university','MBA,BBA,MCA','Hrishikesh',0,'411','','','siliguri','','','','',0,'0000-00-00 00:00:00','show_category=1\nshow_standard=1\nshow_principal=1\nshow_totalstrength=1\nshow_website=1\nshow_email=1\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=1\neducation_icons=0\nicon_location=con_address.png\nicon_email=emailButton.png\nicon_phone=con_tel.png\nicon_mobile=con_mobile.png\nshow_email_form=0\nshow_email_copy=1',0,1,'server'),
 (4,1,0x4E494954,'institute','deploma','Raj Shrivastav',1000,'0353-253452','09775948440','H.C. Road ','Siliguri','West Bengal','http://www.niit.com','student@niit.com','<p><img src=\"plugins/editors/tinymce/jscripts/tiny_mce/plugins/emotions/images/smiley-money-mouth.gif\" border=\"0\" alt=\"Money mouth\" title=\"Money mouth\" /><img src=\"plugins/editors/tinymce/jscripts/tiny_mce/plugins/emotions/images/smiley-embarassed.gif\" border=\"0\" alt=\"Embarassed\" title=\"Embarassed\" />Hello World This NIIT Siliguri. You are most welcome to <strong><em><u><font color=\"#ff0000\"><a href=\"http://niit.com\">NIIT WORD OF PROGRAMMS</a>.<img src=\"images/stories/3-d46h.jpg\" border=\"0\" width=\"267\" height=\"200\" /></font></u></em></strong></p>',0,'0000-00-00 00:00:00','show_category=1\nshow_standard=1\nshow_principal=1\nshow_totalstrength=1\nshow_website=1\nshow_email=1\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=1\neducation_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,1,'server'),
 (5,1,0x4E4255,'university','','',0,'','','','siliguri','','','support@nbu.com','',0,'0000-00-00 00:00:00','show_category=1\nshow_standard=1\nshow_principal=0\nshow_totalstrength=0\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=0\neducation_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,1,'server'),
 (6,1,0x4B56207363686F6F6C20,'school','','',0,'','','','','','','','',0,'0000-00-00 00:00:00','show_category=1\nshow_standard=1\nshow_principal=0\nshow_totalstrength=0\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=0\neducation_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,1,'server'),
 (7,1,0x49494854,'Institute','','',0,'','','','','','','','',0,'0000-00-00 00:00:00','show_category=1\nshow_standard=1\nshow_principal=0\nshow_totalstrength=0\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=0\neducation_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,1,'server'),
 (8,1,0x53696C696775726920436F6C6C65646765,'colledge','','',0,'','','','','','','','',0,'0000-00-00 00:00:00','show_category=1\nshow_standard=1\nshow_principal=0\nshow_totalstrength=0\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=0\neducation_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,1,'server'),
 (10,1,0x627366207363686F6F6C,'school','12th','hrishi',1222,'0353-253','0353-253','siliguri','siliguri','wb','http://www.bsf.com/school/kadamtala','s@g.com','veriy good school',0,'0000-00-00 00:00:00','show_category=1\nshow_standard=1\nshow_principal=0\nshow_totalstrength=0\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=0\neducation_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,1,'server'),
 (16,1,0x616461727368206D61686120766964686179616C617961,'school','12','mr hrishikesh',1000,'1000','1000','siliguri','siliguri','wb','http://a','s@gmail.com','asl',0,'0000-00-00 00:00:00','show_category=1\nshow_standard=1\nshow_principal=0\nshow_totalstrength=0\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=0\neducation_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,1,'127.0.0.1');
/*!40000 ALTER TABLE `jos_yp_education` ENABLE KEYS */;


--
-- Definition of table `jos_yp_hotel_lodge`
--

DROP TABLE IF EXISTS `jos_yp_hotel_lodge`;
CREATE TABLE `jos_yp_hotel_lodge` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `jos_yp_hotel_lodge`
--

/*!40000 ALTER TABLE `jos_yp_hotel_lodge` DISABLE KEYS */;
INSERT INTO `jos_yp_hotel_lodge` (`id`,`yid`,`hotelname`,`category`,`speciality`,`phone`,`mobile`,`location`,`city`,`state`,`emailid`,`website`,`description`,`checked_out`,`checked_out_time`,`params`,`ordering`,`hits`,`published`,`addedby`) VALUES 
 (2,3,'TAJ Hotel','5 star hotel','excellent fooding ','0353-256985','099934722321','HC Road Siliguri','Siliguri','Web bengal','','','<img src=\"images/stories/joomla-dev_cycle.png\" border=\"0\" />',0,'0000-00-00 00:00:00','show_category=1\nshow_speciality=1\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=1\nhotellodge_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1,'server'),
 (3,3,'Nataraj Lodge','Lodge','','','','savok road','siliguri','west bengal','sd.hrishi@gmail.com','http://www.nataraj.com','',0,'0000-00-00 00:00:00','show_category=1\nshow_speciality=1\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=0\nhotellodge_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1,'server'),
 (4,3,'Mahabir Lodge','lodge','good room','123','321','H C Road','siliguri','w b','s@r.com','http://www.ml.com','good',0,'0000-00-00 00:00:00','show_category=1\nshow_speciality=1\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=0\nhotellodge_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1,'127.0.0.1');
/*!40000 ALTER TABLE `jos_yp_hotel_lodge` ENABLE KEYS */;


--
-- Definition of table `jos_yp_medical`
--

DROP TABLE IF EXISTS `jos_yp_medical`;
CREATE TABLE `jos_yp_medical` (
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

--
-- Dumping data for table `jos_yp_medical`
--

/*!40000 ALTER TABLE `jos_yp_medical` DISABLE KEYS */;
INSERT INTO `jos_yp_medical` (`id`,`yid`,`medname`,`category`,`speciality`,`doctors`,`workingtime`,`holiday`,`phone`,`mobile`,`location`,`city`,`state`,`emailid`,`website`,`description`,`checked_out`,`checked_out_time`,`params`,`ordering`,`hits`,`published`,`addedby`) VALUES 
 (2,2,'North Bengal Medical College','Medical College','Ortho, heart','Dr. Rakesh, Dr. Kausal','9am-10pm','9am-10pm','0353-245625','+91-99999999','near shiv mandir','siliguri','west bengal','support@nbmc.com','http://www.nbmc.com','<p>Hai Siliguri.</p><p>&nbsp;</p><p><strong><em><font color=\"#ea7f14\">This web site going to change the thinking of north bengal people..................</font></em></strong></p>',0,'0000-00-00 00:00:00','show_category=1\nshow_speciality=1\nshow_doctors=0\nshow_workingtime=0\nshow_holiday=0\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=0\nmedical_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1,'server'),
 (3,2,'AnandLok Nursing Home','Nursing Home','Heart,','Dr. Byte Hacker','24 hours','24 hours','0325325252','12254221445','Near Mahananda Bridge','Siliguri','West Bengal','client@yahoo.com','http://------------','',0,'0000-00-00 00:00:00','show_category=1\nshow_speciality=1\nshow_doctors=0\nshow_workingtime=0\nshow_holiday=0\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=0\nmedical_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1,'server'),
 (4,2,'Rainbaxy','shop','','','9am-9pm','9am-9pm','','','savok road','siliguri','wb','sd.hrishikesh','','good work',0,'0000-00-00 00:00:00','show_category=1\nshow_speciality=1\nshow_doctors=0\nshow_workingtime=0\nshow_holiday=0\nshow_website=1\nshow_email=0\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=0\nmedical_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1,'server'),
 (5,1,'Kunal Medical shop','shop','','','9am-10pm','sunday','2121','212','siliguri','siliguri','wb','s@g.com','','',0,'0000-00-00 00:00:00','',0,0,1,'127.0.0.1');
/*!40000 ALTER TABLE `jos_yp_medical` ENABLE KEYS */;


--
-- Definition of table `jos_yp_vehicle`
--

DROP TABLE IF EXISTS `jos_yp_vehicle`;
CREATE TABLE `jos_yp_vehicle` (
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

--
-- Dumping data for table `jos_yp_vehicle`
--

/*!40000 ALTER TABLE `jos_yp_vehicle` DISABLE KEYS */;
INSERT INTO `jos_yp_vehicle` (`id`,`yid`,`orgname`,`category`,`owner`,`branch`,`products`,`facility`,`shopkeeperword`,`phone`,`mobile`,`location`,`city`,`state`,`emailid`,`website`,`description`,`checked_out`,`checked_out_time`,`params`,`ordering`,`hits`,`published`,`addedby`) VALUES 
 (2,5,'Sanjay & bother motors','4 wheeler motors','Mr. Sanjay','kolkata','sumo, safari','24*7 hours','welcome ','123','321','HC Road','siliguri','wb ','support@sbn.com','http://www.sbm.com','<p><strong></strong></p><p><strong><font color=\"#ff0000\"><hr id=\"null\" /></font></strong></p><p><strong><font color=\"#ff0000\">Hello World</font></strong></p><hr id=\"null\" />',0,'0000-00-00 00:00:00','show_category=1\nshow_owner=1\nshow_branch=1\nshow_product=1\nshow_facility=1\nshow_swords=1\nshow_website=1\nshow_email=1\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=1\nvehcile_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1,'server'),
 (3,5,'Laxicon','4 wheeler','JMS','siliguri, kolkata, delhi','sumo, safari','any time','','123456','654321','matigarah','siliguri','wb','s@g.com','http://www.tata.com','hellow',0,'0000-00-00 00:00:00','show_category=1\nshow_owner=1\nshow_branch=1\nshow_product=1\nshow_facility=1\nshow_swords=1\nshow_website=1\nshow_email=1\nshow_phone=1\nshow_mobile=1\nshow_location=1\nshow_city=1\nshow_state=1\nshow_description=1\nvehcile_icons=0\nicon_location=\nicon_email=\nicon_phone=\nicon_mobile=\nshow_email_form=1\nshow_email_copy=1',0,0,1,'127.0.0.1');
/*!40000 ALTER TABLE `jos_yp_vehicle` ENABLE KEYS */;


--
-- Definition of table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `enl` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `pro` varchar(45) NOT NULL,
  `sc` varchar(45) NOT NULL,
  `rc` varchar(45) NOT NULL,
  `published` int(10) unsigned NOT NULL,
  `ordering` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;


--
-- Definition of table `subs`
--

DROP TABLE IF EXISTS `subs`;
CREATE TABLE `subs` (
  `s_id` varchar(10) default NULL,
  `pwd` varchar(40) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subs`
--

/*!40000 ALTER TABLE `subs` DISABLE KEYS */;
INSERT INTO `subs` (`s_id`,`pwd`) VALUES 
 ('MASTER','sharmatush'),
 ('SUBH050080','a'),
 ('SUBH050081','a'),
 ('SUBH050083','a'),
 ('SUBH050084','a'),
 ('SUBH050085','a'),
 ('SUBH050086','a'),
 ('SUBH050087','a'),
 ('SUBH050088','a'),
 ('SUBH050089','a'),
 ('SUBH050090','a'),
 ('SUBH050091','a'),
 ('SUBH050092','a'),
 ('SUBH050093','a'),
 ('SUBH050094','a'),
 ('SUBH050095','a'),
 ('SUBH050096','a'),
 ('SUBH050097','a'),
 ('SUBH050098','a'),
 ('SUBH050099','a'),
 ('SUBH050100','a'),
 ('SUBH050101','a'),
 ('SUBH050102','a'),
 ('SUBH050103','a'),
 ('SUBH050104','a'),
 ('SUBH050105','a'),
 ('SUBH050106','a'),
 ('SUBH050107','a'),
 ('SUBH050108','a'),
 ('SUBH050109','a'),
 ('SUBH050110','a'),
 ('SUBH050111','a'),
 ('SUBH050112','a'),
 ('SUBH050113','a'),
 ('SUBH050114','a'),
 ('SUBH050115','a'),
 ('SUBH050116','a'),
 ('SUBH050117','a'),
 ('SUBH050118','a'),
 ('SUBH050119','a'),
 ('SUBH050120','a'),
 ('SUBH050121','a'),
 ('SUBH050122','a'),
 ('SUBH050122','a'),
 ('SUBH050123','a'),
 ('SUBH050124','a'),
 ('SUBH050125','a'),
 ('SUBH050126','a'),
 ('SUBH050127','a'),
 ('SUBH050128','a'),
 ('SUBH050129','a'),
 ('SUBH050130','a'),
 ('SUBH050131','a'),
 ('SUBH050132','a'),
 ('SUBH050133','a'),
 ('SUBH050134','a'),
 ('SUBH050135','a'),
 ('SUBH050136','a'),
 ('SUBH050137','a'),
 ('SUBH050138','a'),
 ('SUBH050139','a'),
 ('SUBH050140','a'),
 ('SUBH050141','a'),
 ('SUBH050142','a'),
 ('SUBH050143','a'),
 ('SUBH050144','a'),
 ('SUBH050145','a'),
 ('SUBH050146','a'),
 ('SUBH050147','a'),
 ('SUBH050148','a'),
 ('SUBH050149','a'),
 ('SUBH050150','a'),
 ('SUBH050151','a'),
 ('SUBH050152','a'),
 ('SUBH050153','a'),
 ('SUBH050154','a'),
 ('SUBH050155','a'),
 ('SUBH050156','a'),
 ('SUBH050157','a'),
 ('SUBH050158','a'),
 ('SUBH050159','a'),
 ('SUBH050160','a'),
 ('SUBH050161','a'),
 ('SUBH050162','a'),
 ('SUBH050163','a'),
 ('SUBH050164','a'),
 ('SUBH050165','a'),
 ('SUBH050166','a'),
 ('SUBH050167','a'),
 ('SUBH050168','a'),
 ('SUBH050169','a'),
 ('SUBH050170','a'),
 ('SUBH050171','a'),
 ('SUBH050172','a'),
 ('SUBH050173','a'),
 ('SUBH050174','a'),
 ('SUBH050175','a'),
 ('SUBH050176','a'),
 ('SUBH050177','a'),
 ('SUBH050178','a'),
 ('SUBH050179','a'),
 ('SUBH050180','a'),
 ('SUBH050181','a'),
 ('SUBH050182','a'),
 ('SUBH050183','a'),
 ('SUBH050184','a'),
 ('SUBH050185','a'),
 ('SUBH050186','a'),
 ('SUBH050187','a'),
 ('SUBH050188','a'),
 ('SUBH050189','a'),
 ('SUBH050190','a'),
 ('SUBH050191','a'),
 ('SUBH050192','a'),
 ('SUBH050193','a'),
 ('SUBH050194','a'),
 ('SUBH050195','a'),
 ('SUBH050196','a'),
 ('SUBH050197','a'),
 ('SUBH050198','a'),
 ('SUBH050199','a'),
 ('SUBH050200','a'),
 ('SUBH050201','a'),
 ('SUBH050202','a'),
 ('SUBH050203','a'),
 ('SUBH050204','a'),
 ('SUBH050205','a'),
 ('SUBH050206','a'),
 ('SUBH050207','a'),
 ('SUBH050208','a'),
 ('SUBH050209','a'),
 ('SUBH050210','a'),
 ('SUBH050211','a'),
 ('SUBH050212','a'),
 ('SUBH050213','a'),
 ('SUBH050214','a'),
 ('SUBH050215','a'),
 ('SUBH050216','a'),
 ('SUBH050217','a'),
 ('SUBH050218','a'),
 ('SUBH050219','a'),
 ('SUBH050220','a'),
 ('SUBH050221','a'),
 ('SUBH050222','a'),
 ('SUBH050223','a'),
 ('SUBH050224','a'),
 ('SUBH050225','a'),
 ('SUBH050226','a'),
 ('SUBH050227','a'),
 ('SUBH050228','a'),
 ('SUBH050229','a'),
 ('SUBH050230','a'),
 ('SUBH050231','a'),
 ('SUBH050232','a'),
 ('SUBH050233','a'),
 ('SUBH050234','a'),
 ('SUBH050235','a'),
 ('SUBH050236','a'),
 ('SUBH050237','a'),
 ('SUBH050238','a'),
 ('SUBH060239','a'),
 ('SUBH060240','a'),
 ('SUBH060241','a'),
 ('SUBH060242','a'),
 ('SUBH060243','a'),
 ('SUBH060244','a'),
 ('SUBH060245','a'),
 ('SUBH060246','a'),
 ('SUBH060247','a'),
 ('SUBH060248','a'),
 ('SUBH060249','a'),
 ('SUBH060250','a'),
 ('SUBH060251','a'),
 ('SUBH060252','a'),
 ('SUBH060253','a'),
 ('SUBH060254','a'),
 ('SUBH060255','a'),
 ('SUBH060256','a'),
 ('SUBH060257','a'),
 ('SUBH060258','a'),
 ('SUBH060259','a'),
 ('SUBH060260','a'),
 ('SUBH060261','a'),
 ('SUBH060262','a'),
 ('SUBH060263','a'),
 ('SUBH060264','a'),
 ('SUBH060265','a'),
 ('SUBH060266','a'),
 ('SUBH060267','a'),
 ('SUBH060268','a'),
 ('SUBH060269','a'),
 ('SUBH060270','a'),
 ('SUBH060271','a'),
 ('SUBH060272','a'),
 ('SUBH060273','a'),
 ('SUBH060274','a'),
 ('SUBH060275','a'),
 ('SUBH060276','a'),
 ('SUBH060277','a'),
 ('SUBH060278','a'),
 ('SUBH060279','a'),
 ('SUBH060280','a'),
 ('SUBH060281','a'),
 ('SUBH060282','a'),
 ('SUBH070283','a'),
 ('SUBH070284','a'),
 ('SUBH070285','a'),
 ('SUBH070286','a'),
 ('SUBH070287','a'),
 ('SUBH070288','a'),
 ('SUBH070289','a'),
 ('SUBH070290','a'),
 ('SUBH070291','a'),
 ('SUBH070292','a'),
 ('SUBH070293','a'),
 ('SUBH070294','a'),
 ('SUBH070295','a'),
 ('SUBH070296','a'),
 ('SUBH070297','a'),
 ('SUBH070298','a'),
 ('SUBH070299','a'),
 ('SUBH070300','a'),
 ('SUBH070301','a'),
 ('SUBH070302','a'),
 ('SUBH070303','a'),
 ('SUBH070304','a'),
 ('SUBH070305','a'),
 ('SUBH070306','a'),
 ('SUBH070307','a'),
 ('SUBH070308','a'),
 ('SUBH070309','a'),
 ('SUBH070310','a'),
 ('SUBH070311','a'),
 ('SUBH070312','a'),
 ('SUBH070313','a'),
 ('SUBH070314','a'),
 ('SUBH080315','a'),
 ('SUBH080316','a'),
 ('SUBH080317','a'),
 ('SUBH080318','a'),
 ('SUBH080319','a'),
 ('SUBH080320','a'),
 ('SUBH080321','a'),
 ('SUBH080322','a'),
 ('SUBH080323','a'),
 ('SUBH080324','a'),
 ('SUBH080325','a'),
 ('SUBH080322','a'),
 ('SUBH080323','a'),
 ('SUBH080324','a'),
 ('SUBH080325','a'),
 ('SUBH080326','a'),
 ('SUBH080327','a'),
 ('SUBH080328','a'),
 ('SUBH080329','a'),
 ('SUBH080330','a'),
 ('SUBH080331','a'),
 ('SUBH080332','a'),
 ('SUBH080333','a'),
 ('SUBH080334','a'),
 ('SUBH080335','a'),
 ('SUBH080336','a'),
 ('SUBH080337','a'),
 ('SUBH080338','a'),
 ('SUBH080339','a'),
 ('SUBH080340','a'),
 ('SUBH080341','a'),
 ('SUBH080342','a'),
 ('SUBH080343','a'),
 ('SUBH080344','a'),
 ('SUBH080345','a'),
 ('SUBH080346','a'),
 ('SUBH080347','a'),
 ('SUBH080348','a'),
 ('SUBH080349','a'),
 ('SUBH090350','a'),
 ('SUBH090351','a'),
 ('SUBH090352','a'),
 ('SUBH090353','a'),
 ('SUBH090354','a'),
 ('SUBH090355','a'),
 ('SUBH090356','a'),
 ('SUBH090357','a');
/*!40000 ALTER TABLE `subs` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
