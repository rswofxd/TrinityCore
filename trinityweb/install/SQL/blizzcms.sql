/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.2.6-MariaDB-log : Database - blizzcms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `fx_api_char` */

DROP TABLE IF EXISTS `fx_api_char`;

CREATE TABLE `fx_api_char` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `fx_api_char` */

insert  into `fx_api_char`(`id`,`type`) values 
(1,'char_principal'),
(2,'char_internal'),
(3,'char_position'),
(4,'char_skins'),
(5,'char_times'),
(6,'char_logins'),
(7,'char_points'),
(8,'char_kills'),
(9,'char_personal');

/*Table structure for table `fx_api_generator` */

DROP TABLE IF EXISTS `fx_api_generator`;

CREATE TABLE `fx_api_generator` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(1) unsigned NOT NULL DEFAULT 1,
  `active` int(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

/*Data for the table `fx_api_generator` */

/*Table structure for table `fx_avatars` */

DROP TABLE IF EXISTS `fx_avatars`;

CREATE TABLE `fx_avatars` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` int(1) unsigned NOT NULL DEFAULT 1 COMMENT '1 = user | 2 = staff',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `fx_avatars` */

insert  into `fx_avatars`(`id`,`name`,`type`) values 
(1,'default.png',1),
(2,'arthas.png',1),
(3,'deathwing.png',1),
(4,'garrosh.png',1),
(5,'ghoul.png',1),
(6,'hogger.png',1),
(7,'illidan.png',1),
(8,'kelthuzad.png',1),
(9,'kiljeaden.png',1),
(10,'lurker.png',1),
(11,'maiev.png',1),
(12,'malfurion.png',1),
(13,'neptulon.png',1),
(14,'nerzhul.png',1),
(15,'velen.png',1),
(16,'worgen.png',1),
(17,'imp.png',1),
(18,'vault_guardian.png',1);

/*Table structure for table `fx_bugtracker` */

DROP TABLE IF EXISTS `fx_bugtracker`;

CREATE TABLE `fx_bugtracker` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `url` text DEFAULT NULL,
  `status` int(1) unsigned NOT NULL DEFAULT 1,
  `type` int(1) unsigned NOT NULL DEFAULT 1,
  `priority` int(1) unsigned NOT NULL DEFAULT 1,
  `date` int(10) unsigned NOT NULL,
  `author` int(10) unsigned NOT NULL,
  `close` int(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_bugtracker` */

/*Table structure for table `fx_bugtracker_priority` */

DROP TABLE IF EXISTS `fx_bugtracker_priority`;

CREATE TABLE `fx_bugtracker_priority` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `fx_bugtracker_priority` */

insert  into `fx_bugtracker_priority`(`id`,`title`) values 
(1,'High'),
(2,'Medium'),
(3,'Low');

/*Table structure for table `fx_bugtracker_status` */

DROP TABLE IF EXISTS `fx_bugtracker_status`;

CREATE TABLE `fx_bugtracker_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `fx_bugtracker_status` */

insert  into `fx_bugtracker_status`(`id`,`title`) values 
(1,'New Report'),
(2,'Waiting more information'),
(3,'Report confirmed'),
(4,'In progress'),
(5,'Fix need test'),
(6,'Fix need review'),
(7,'Invalid'),
(8,'Resolved');

/*Table structure for table `fx_bugtracker_type` */

DROP TABLE IF EXISTS `fx_bugtracker_type`;

CREATE TABLE `fx_bugtracker_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `fx_bugtracker_type` */

insert  into `fx_bugtracker_type`(`id`,`title`) values 
(1,'Achievements'),
(2,'Battle Pets'),
(3,'Battlegrounds - Arena'),
(4,'Classes'),
(5,'Creatures'),
(6,'Exploits/Usebugs'),
(7,'Garrison'),
(8,'Guilds'),
(9,'Instances'),
(10,'Items'),
(11,'Other'),
(12,'Professions'),
(13,'Quests'),
(14,'Website');

/*Table structure for table `fx_changelogs` */

DROP TABLE IF EXISTS `fx_changelogs`;

CREATE TABLE `fx_changelogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` int(10) unsigned NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_changelogs` */

/*Table structure for table `fx_chars_annotations` */

DROP TABLE IF EXISTS `fx_chars_annotations`;

CREATE TABLE `fx_chars_annotations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idchar` int(10) unsigned NOT NULL,
  `annotation` text CHARACTER SET utf8 NOT NULL,
  `date` int(10) unsigned NOT NULL,
  `realmid` int(1) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fx_chars_annotations` */

/*Table structure for table `fx_chat` */

DROP TABLE IF EXISTS `fx_chat`;

CREATE TABLE `fx_chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL DEFAULT '',
  `to` varchar(255) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT 0,
  `from_name` varchar(100) NOT NULL,
  `to_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_chat` */

/*Table structure for table `fx_country` */

DROP TABLE IF EXISTS `fx_country`;

CREATE TABLE `fx_country` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=246 DEFAULT CHARSET=utf8;

/*Data for the table `fx_country` */

insert  into `fx_country`(`id`,`country_code`,`country_name`) values 
(1,'AF','Afghanistan'),
(2,'AL','Albania'),
(3,'DZ','Algeria'),
(4,'DS','American Samoa'),
(5,'AD','Andorra'),
(6,'AO','Angola'),
(7,'AI','Anguilla'),
(8,'AQ','Antarctica'),
(9,'AG','Antigua and Barbuda'),
(10,'AR','Argentina'),
(11,'AM','Armenia'),
(12,'AW','Aruba'),
(13,'AU','Australia'),
(14,'AT','Austria'),
(15,'AZ','Azerbaijan'),
(16,'BS','Bahamas'),
(17,'BH','Bahrain'),
(18,'BD','Bangladesh'),
(19,'BB','Barbados'),
(20,'BY','Belarus'),
(21,'BE','Belgium'),
(22,'BZ','Belize'),
(23,'BJ','Benin'),
(24,'BM','Bermuda'),
(25,'BT','Bhutan'),
(26,'BO','Bolivia'),
(27,'BA','Bosnia and Herzegovina'),
(28,'BW','Botswana'),
(29,'BV','Bouvet Island'),
(30,'BR','Brazil'),
(31,'IO','British Indian Ocean Territory'),
(32,'BN','Brunei Darussalam'),
(33,'BG','Bulgaria'),
(34,'BF','Burkina Faso'),
(35,'BI','Burundi'),
(36,'KH','Cambodia'),
(37,'CM','Cameroon'),
(38,'CA','Canada'),
(39,'CV','Cape Verde'),
(40,'KY','Cayman Islands'),
(41,'CF','Central African Republic'),
(42,'TD','Chad'),
(43,'CL','Chile'),
(44,'CN','China'),
(45,'CX','Christmas Island'),
(46,'CC','Cocos (Keeling) Islands'),
(47,'CO','Colombia'),
(48,'KM','Comoros'),
(49,'CG','Congo'),
(50,'CK','Cook Islands'),
(51,'CR','Costa Rica'),
(52,'HR','Croatia (Hrvatska)'),
(53,'CU','Cuba'),
(54,'CY','Cyprus'),
(55,'CZ','Czech Republic'),
(56,'DK','Denmark'),
(57,'DJ','Djibouti'),
(58,'DM','Dominica'),
(59,'DO','Dominican Republic'),
(60,'TP','East Timor'),
(61,'EC','Ecuador'),
(62,'EG','Egypt'),
(63,'SV','El Salvador'),
(64,'GQ','Equatorial Guinea'),
(65,'ER','Eritrea'),
(66,'EE','Estonia'),
(67,'ET','Ethiopia'),
(68,'FK','Falkland Islands (Malvinas)'),
(69,'FO','Faroe Islands'),
(70,'FJ','Fiji'),
(71,'FI','Finland'),
(72,'FR','France'),
(73,'FX','France, Metropolitan'),
(74,'GF','French Guiana'),
(75,'PF','French Polynesia'),
(76,'TF','French Southern Territories'),
(77,'GA','Gabon'),
(78,'GM','Gambia'),
(79,'GE','Georgia'),
(80,'DE','Germany'),
(81,'GH','Ghana'),
(82,'GI','Gibraltar'),
(83,'GK','Guernsey'),
(84,'GR','Greece'),
(85,'GL','Greenland'),
(86,'GD','Grenada'),
(87,'GP','Guadeloupe'),
(88,'GU','Guam'),
(89,'GT','Guatemala'),
(90,'GN','Guinea'),
(91,'GW','Guinea-Bissau'),
(92,'GY','Guyana'),
(93,'HT','Haiti'),
(94,'HM','Heard and Mc Donald Islands'),
(95,'HN','Honduras'),
(96,'HK','Hong Kong'),
(97,'HU','Hungary'),
(98,'IS','Iceland'),
(99,'IN','India'),
(100,'IM','Isle of Man'),
(101,'ID','Indonesia'),
(102,'IR','Iran (Islamic Republic of)'),
(103,'IQ','Iraq'),
(104,'IE','Ireland'),
(105,'IL','Israel'),
(106,'IT','Italy'),
(107,'CI','Ivory Coast'),
(108,'JE','Jersey'),
(109,'JM','Jamaica'),
(110,'JP','Japan'),
(111,'JO','Jordan'),
(112,'KZ','Kazakhstan'),
(113,'KE','Kenya'),
(114,'KI','Kiribati'),
(115,'KP','Korea, Democratic People\'s Republic of'),
(116,'KR','Korea, Republic of'),
(117,'XK','Kosovo'),
(118,'KW','Kuwait'),
(119,'KG','Kyrgyzstan'),
(120,'LA','Lao People\'s Democratic Republic'),
(121,'LV','Latvia'),
(122,'LB','Lebanon'),
(123,'LS','Lesotho'),
(124,'LR','Liberia'),
(125,'LY','Libyan Arab Jamahiriya'),
(126,'LI','Liechtenstein'),
(127,'LT','Lithuania'),
(128,'LU','Luxembourg'),
(129,'MO','Macau'),
(130,'MK','Macedonia'),
(131,'MG','Madagascar'),
(132,'MW','Malawi'),
(133,'MY','Malaysia'),
(134,'MV','Maldives'),
(135,'ML','Mali'),
(136,'MT','Malta'),
(137,'MH','Marshall Islands'),
(138,'MQ','Martinique'),
(139,'MR','Mauritania'),
(140,'MU','Mauritius'),
(141,'TY','Mayotte'),
(142,'MX','Mexico'),
(143,'FM','Micronesia, Federated States of'),
(144,'MD','Moldova, Republic of'),
(145,'MC','Monaco'),
(146,'MN','Mongolia'),
(147,'ME','Montenegro'),
(148,'MS','Montserrat'),
(149,'MA','Morocco'),
(150,'MZ','Mozambique'),
(151,'MM','Myanmar'),
(152,'NA','Namibia'),
(153,'NR','Nauru'),
(154,'NP','Nepal'),
(155,'NL','Netherlands'),
(156,'AN','Netherlands Antilles'),
(157,'NC','New Caledonia'),
(158,'NZ','New Zealand'),
(159,'NI','Nicaragua'),
(160,'NE','Niger'),
(161,'NG','Nigeria'),
(162,'NU','Niue'),
(163,'NF','Norfolk Island'),
(164,'MP','Northern Mariana Islands'),
(165,'NO','Norway'),
(166,'OM','Oman'),
(167,'PK','Pakistan'),
(168,'PW','Palau'),
(169,'PS','Palestine'),
(170,'PA','Panama'),
(171,'PG','Papua New Guinea'),
(172,'PY','Paraguay'),
(173,'PE','Peru'),
(174,'PH','Philippines'),
(175,'PN','Pitcairn'),
(176,'PL','Poland'),
(177,'PT','Portugal'),
(178,'PR','Puerto Rico'),
(179,'QA','Qatar'),
(180,'RE','Reunion'),
(181,'RO','Romania'),
(182,'RU','Russian Federation'),
(183,'RW','Rwanda'),
(184,'KN','Saint Kitts and Nevis'),
(185,'LC','Saint Lucia'),
(186,'VC','Saint Vincent and the Grenadines'),
(187,'WS','Samoa'),
(188,'SM','San Marino'),
(189,'ST','Sao Tome and Principe'),
(190,'SA','Saudi Arabia'),
(191,'SN','Senegal'),
(192,'RS','Serbia'),
(193,'SC','Seychelles'),
(194,'SL','Sierra Leone'),
(195,'SG','Singapore'),
(196,'SK','Slovakia'),
(197,'SI','Slovenia'),
(198,'SB','Solomon Islands'),
(199,'SO','Somalia'),
(200,'ZA','South Africa'),
(201,'GS','South Georgia South Sandwich Islands'),
(202,'ES','Spain'),
(203,'LK','Sri Lanka'),
(204,'SH','St. Helena'),
(205,'PM','St. Pierre and Miquelon'),
(206,'SD','Sudan'),
(207,'SR','Suriname'),
(208,'SJ','Svalbard and Jan Mayen Islands'),
(209,'SZ','Swaziland'),
(210,'SE','Sweden'),
(211,'CH','Switzerland'),
(212,'SY','Syrian Arab Republic'),
(213,'TW','Taiwan'),
(214,'TJ','Tajikistan'),
(215,'TZ','Tanzania, United Republic of'),
(216,'TH','Thailand'),
(217,'TG','Togo'),
(218,'TK','Tokelau'),
(219,'TO','Tonga'),
(220,'TT','Trinidad and Tobago'),
(221,'TN','Tunisia'),
(222,'TR','Turkey'),
(223,'TM','Turkmenistan'),
(224,'TC','Turks and Caicos Islands'),
(225,'TV','Tuvalu'),
(226,'UG','Uganda'),
(227,'UA','Ukraine'),
(228,'AE','United Arab Emirates'),
(229,'GB','United Kingdom'),
(230,'US','United States'),
(231,'UM','United States minor outlying islands'),
(232,'UY','Uruguay'),
(233,'UZ','Uzbekistan'),
(234,'VU','Vanuatu'),
(235,'VA','Vatican City State'),
(236,'VE','Venezuela'),
(237,'VN','Vietnam'),
(238,'VG','Virgin Islands (British)'),
(239,'VI','Virgin Islands (U.S.)'),
(240,'WF','Wallis and Futuna Islands'),
(241,'EH','Western Sahara'),
(242,'YE','Yemen'),
(243,'ZR','Zaire'),
(244,'ZM','Zambia'),
(245,'ZW','Zimbabwe');

/*Table structure for table `fx_credits` */

DROP TABLE IF EXISTS `fx_credits`;

CREATE TABLE `fx_credits` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `accountid` int(11) unsigned NOT NULL,
  `dp` int(11) unsigned NOT NULL DEFAULT 0,
  `vp` int(11) unsigned NOT NULL DEFAULT 0,
  `lastVote` int(10) unsigned NOT NULL DEFAULT 1490579700,
  `maxVotes` int(10) unsigned NOT NULL DEFAULT 5,
  UNIQUE KEY `id_2` (`id`),
  UNIQUE KEY `accountId` (`accountid`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_credits` */

/*Table structure for table `fx_donate` */

DROP TABLE IF EXISTS `fx_donate`;

CREATE TABLE `fx_donate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `tax` varchar(10) NOT NULL DEFAULT '0.00',
  `points` int(10) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `fx_donate` */

insert  into `fx_donate`(`id`,`name`,`price`,`tax`,`points`) values 
(1,'Simple','10.00','0.00',20),
(2,'Normal','20.00','2.00',22),
(3,'Professional','30.00','0.00',40);

/*Table structure for table `fx_donate_history` */

DROP TABLE IF EXISTS `fx_donate_history`;

CREATE TABLE `fx_donate_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `payment_id` varchar(100) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `total` varchar(10) NOT NULL,
  `complete` int(1) unsigned NOT NULL DEFAULT 0,
  `create_time` varchar(100) NOT NULL,
  `points` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `fx_donate_history` */

/*Table structure for table `fx_events` */

DROP TABLE IF EXISTS `fx_events`;

CREATE TABLE `fx_events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `date_event_start` int(10) unsigned NOT NULL,
  `date_event_end` int(10) unsigned NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fx_events` */

/*Table structure for table `fx_faq` */

DROP TABLE IF EXISTS `fx_faq`;

CREATE TABLE `fx_faq` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `type` int(1) unsigned NOT NULL DEFAULT 1,
  `description` text NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_faq` */

/*Table structure for table `fx_faq_type` */

DROP TABLE IF EXISTS `fx_faq_type`;

CREATE TABLE `fx_faq_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `fx_faq_type` */

insert  into `fx_faq_type`(`id`,`title`) values 
(1,'General'),
(2,'Server'),
(3,'Website');

/*Table structure for table `fx_forum_category` */

DROP TABLE IF EXISTS `fx_forum_category`;

CREATE TABLE `fx_forum_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`categoryName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fx_forum_category` */

/*Table structure for table `fx_forum_comments` */

DROP TABLE IF EXISTS `fx_forum_comments`;

CREATE TABLE `fx_forum_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `topic` int(10) unsigned NOT NULL,
  `author` int(10) unsigned NOT NULL,
  `commentary` text CHARACTER SET utf8 NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fx_forum_comments` */

/*Table structure for table `fx_forum_forums` */

DROP TABLE IF EXISTS `fx_forum_forums`;

CREATE TABLE `fx_forum_forums` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `category` int(10) unsigned NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `icon` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT 'icon1.png',
  `type` int(1) unsigned NOT NULL DEFAULT 1 COMMENT '1 = everyone | 2 = staff | 3 = staff post + everyone see',
  PRIMARY KEY (`id`),
  KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fx_forum_forums` */

/*Table structure for table `fx_forum_topics` */

DROP TABLE IF EXISTS `fx_forum_topics`;

CREATE TABLE `fx_forum_topics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `forums` int(10) unsigned NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` int(10) unsigned NOT NULL,
  `date` int(10) unsigned NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `locked` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `pined` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `archivar` int(1) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `fx_forum_topics` */

/*Table structure for table `fx_head_items` */

DROP TABLE IF EXISTS `fx_head_items`;

CREATE TABLE `fx_head_items` (
  `item_id` int(10) unsigned NOT NULL DEFAULT 0,
  `level` int(10) unsigned DEFAULT NULL,
  `quality_id` int(10) DEFAULT NULL,
  `class_id` int(10) DEFAULT NULL,
  `subclass_id` int(10) DEFAULT NULL,
  `display_id` int(10) DEFAULT NULL,
  `inventorySlot_id` int(100) DEFAULT NULL,
  `icon_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_head_items` */

/*Table structure for table `fx_head_items_local` */

DROP TABLE IF EXISTS `fx_head_items_local`;

CREATE TABLE `fx_head_items_local` (
  `id` int(10) unsigned NOT NULL,
  `name_de` varchar(100) DEFAULT NULL,
  `quality_de` varchar(100) DEFAULT NULL,
  `class_de` varchar(100) DEFAULT NULL,
  `subclass_de` varchar(100) DEFAULT NULL,
  `inventorySlot_de` varchar(100) DEFAULT NULL,
  `htmlTooltip_de` text DEFAULT NULL,
  `json_de` text DEFAULT NULL,
  `jsonEquip_de` text DEFAULT NULL,
  `name_en` varchar(100) DEFAULT NULL,
  `quality_en` varchar(100) DEFAULT NULL,
  `class_en` varchar(100) DEFAULT NULL,
  `subclass_en` varchar(100) DEFAULT NULL,
  `inventorySlot_en` varchar(100) DEFAULT NULL,
  `htmlTooltip_en` text DEFAULT NULL,
  `json_en` text DEFAULT NULL,
  `jsonEquip_en` text DEFAULT NULL,
  `name_es` varchar(100) DEFAULT NULL,
  `quality_es` varchar(100) DEFAULT NULL,
  `class_es` varchar(100) DEFAULT NULL,
  `subclass_es` varchar(100) DEFAULT NULL,
  `inventorySlot_es` varchar(100) DEFAULT NULL,
  `htmlTooltip_es` text DEFAULT NULL,
  `json_es` text DEFAULT NULL,
  `jsonEquip_es` text DEFAULT NULL,
  `name_fr` varchar(100) DEFAULT NULL,
  `quality_fr` varchar(100) DEFAULT NULL,
  `class_fr` varchar(100) DEFAULT NULL,
  `subclass_fr` varchar(100) DEFAULT NULL,
  `inventorySlot_fr` varchar(100) DEFAULT NULL,
  `htmlTooltip_fr` text DEFAULT NULL,
  `json_fr` text DEFAULT NULL,
  `jsonEquip_fr` text DEFAULT NULL,
  `name_it` varchar(100) DEFAULT NULL,
  `quality_it` varchar(100) DEFAULT NULL,
  `class_it` varchar(100) DEFAULT NULL,
  `subclass_it` varchar(100) DEFAULT NULL,
  `inventorySlot_it` varchar(100) DEFAULT NULL,
  `htmlTooltip_it` text DEFAULT NULL,
  `json_it` text DEFAULT NULL,
  `jsonEquip_it` text DEFAULT NULL,
  `name_pt` varchar(100) DEFAULT NULL,
  `quality_pt` varchar(100) DEFAULT NULL,
  `class_pt` varchar(100) DEFAULT NULL,
  `subclass_pt` varchar(100) DEFAULT NULL,
  `inventorySlot_pt` varchar(100) DEFAULT NULL,
  `htmlTooltip_pt` text DEFAULT NULL,
  `json_pt` text DEFAULT NULL,
  `jsonEquip_pt` text DEFAULT NULL,
  `name_ru` varchar(100) DEFAULT NULL,
  `quality_ru` varchar(100) DEFAULT NULL,
  `class_ru` varchar(100) DEFAULT NULL,
  `subclass_ru` varchar(100) DEFAULT NULL,
  `inventorySlot_ru` varchar(100) DEFAULT NULL,
  `htmlTooltip_ru` text DEFAULT NULL,
  `json_ru` text DEFAULT NULL,
  `jsonEquip_ru` text DEFAULT NULL,
  `name_ko` varchar(100) DEFAULT NULL,
  `quality_ko` varchar(100) DEFAULT NULL,
  `class_ko` varchar(100) DEFAULT NULL,
  `subclass_ko` varchar(100) DEFAULT NULL,
  `inventorySlot_ko` varchar(100) DEFAULT NULL,
  `htmlTooltip_ko` text DEFAULT NULL,
  `json_ko` text DEFAULT NULL,
  `jsonEquip_ko` text DEFAULT NULL,
  `name_cn` varchar(100) DEFAULT NULL,
  `quality_cn` varchar(100) DEFAULT NULL,
  `class_cn` varchar(100) DEFAULT NULL,
  `subclass_cn` varchar(100) DEFAULT NULL,
  `inventorySlot_cn` varchar(100) DEFAULT NULL,
  `htmlTooltip_cn` text DEFAULT NULL,
  `json_cn` text DEFAULT NULL,
  `jsonEquip_cn` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `fx_head_items_local` */

/*Table structure for table `fx_menu` */

DROP TABLE IF EXISTS `fx_menu`;

CREATE TABLE `fx_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `permissions` varchar(100) NOT NULL DEFAULT 'Permission_FREE',
  `extras` text DEFAULT NULL,
  `father` int(10) unsigned NOT NULL DEFAULT 0,
  `son` int(10) unsigned DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `fx_menu` */

insert  into `fx_menu`(`id`,`name`,`url`,`icon`,`permissions`,`extras`,`father`,`son`) values 
(1,'Menu','#','','Permission_FREE',NULL,1,0),
(2,'News','news','','Permission_News',NULL,0,0),
(3,'Faq','faq','ra ra-uncertainty','Permission_FREE',NULL,0,1),
(4,'Bugtracker','bugtracker','ra ra-book','Permission_Bugtracker',NULL,0,1),
(5,'Changelogs','changelogs','ra ra-clockwork','Permission_Changelogs',NULL,0,1),
(6,'PvP','pvp','ra ra-axe','Permission_PVPStats',NULL,0,1),
(7,'Arena','arena','ra ra-arena','Permission_ArenaStats',NULL,0,1),
(8,'Forums','forums',NULL,'Permission_Forums',NULL,0,0),
(9,'Store','store',NULL,'Permission_Store',NULL,0,0);

/*Table structure for table `fx_modules` */

DROP TABLE IF EXISTS `fx_modules`;

CREATE TABLE `fx_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` int(1) unsigned NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `fx_modules` */

insert  into `fx_modules`(`id`,`name`,`status`) values 
(1,'Discord Experimental',1),
(2,'Discord Classic',0),
(3,'Register',1),
(4,'Login',1),
(5,'Realm Status',1),
(6,'News',1),
(7,'Changelogs',1),
(8,'Forums',1),
(9,'Store',1),
(10,'Slides',1),
(11,'Events',1),
(12,'Ladder PVP',1),
(13,'User Panel',1),
(14,'Gifts',0),
(15,'Ladder Arena',1),
(16,'Bugtracker',1),
(17,'Captcha',1),
(18,'Messages',1),
(19,'Donation',1),
(20,'Installation',1),
(21,'Armory',1),
(22,'Vote',1),
(23,'Admin',1),
(24,'Faq',1);

/*Table structure for table `fx_news` */

DROP TABLE IF EXISTS `fx_news`;

CREATE TABLE `fx_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'new.jpg' COMMENT 'assets/images/news',
  `description` text NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `fx_news` */

insert  into `fx_news`(`id`,`title`,`image`,`description`,`date`) values 
(1,'Welcome to BlizzCMS','new1.jpg','<h1 style=\"color: white;\">This IS BlizzCMS!!</h1>',0);

/*Table structure for table `fx_news_comments` */

DROP TABLE IF EXISTS `fx_news_comments`;

CREATE TABLE `fx_news_comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_new` int(10) unsigned NOT NULL,
  `commentary` text NOT NULL,
  `date` int(10) unsigned NOT NULL,
  `author` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_new` (`id_new`),
  KEY `author` (`author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_news_comments` */

/*Table structure for table `fx_news_top` */

DROP TABLE IF EXISTS `fx_news_top`;

CREATE TABLE `fx_news_top` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_new` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_new` (`id_new`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `fx_news_top` */

insert  into `fx_news_top`(`id`,`id_new`) values 
(1,1);

/*Table structure for table `fx_pages` */

DROP TABLE IF EXISTS `fx_pages`;

CREATE TABLE `fx_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_pages` */

/*Table structure for table `fx_ranks_default` */

DROP TABLE IF EXISTS `fx_ranks_default`;

CREATE TABLE `fx_ranks_default` (
  `id` int(10) unsigned NOT NULL,
  `permission` int(1) unsigned NOT NULL DEFAULT 1,
  `comment` varchar(100) DEFAULT 'Rank BlizzCMS',
  KEY `id` (`id`),
  KEY `fx_ranks_ibfk_1` (`permission`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_ranks_default` */

insert  into `fx_ranks_default`(`id`,`permission`,`comment`) values 
(1,1,'Rank Admin'),
(2,2,'Rank Visitor'),
(3,3,'Rank User');

/*Table structure for table `fx_ranks_linked` */

DROP TABLE IF EXISTS `fx_ranks_linked`;

CREATE TABLE `fx_ranks_linked` (
  `id` int(10) unsigned NOT NULL,
  `permission` int(10) unsigned NOT NULL,
  KEY `fx_ranks_permissions_ibfk_1` (`id`),
  KEY `permission` (`permission`),
  CONSTRAINT `fx_ranks_linked_ibfk_1` FOREIGN KEY (`permission`) REFERENCES `fx_ranks_permissions` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_ranks_linked` */

insert  into `fx_ranks_linked`(`id`,`permission`) values 
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),
(1,6),
(1,7),
(1,8),
(1,9),
(1,10),
(1,11),
(1,12),
(1,13),
(1,14),
(1,15),
(1,16),
(1,17),
(2,3),
(2,4),
(2,5),
(2,6),
(2,7),
(2,8),
(2,9),
(2,10),
(2,11),
(2,13),
(2,14),
(2,17),
(1,18),
(2,18),
(3,2),
(3,5),
(3,6),
(3,7),
(3,8),
(3,9),
(3,10),
(3,11),
(3,12),
(3,13),
(3,14),
(3,15),
(3,16),
(3,17),
(3,18),
(1,19);

/*Table structure for table `fx_ranks_permissions` */

DROP TABLE IF EXISTS `fx_ranks_permissions`;

CREATE TABLE `fx_ranks_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `fx_ranks_permissions` */

insert  into `fx_ranks_permissions`(`id`,`name`) values 
(1,'Admin'),
(2,'Panel'),
(3,'Login'),
(4,'Register'),
(5,'Faq'),
(6,'Bugtracker'),
(7,'Pvp Stats'),
(8,'Arena Stats'),
(9,'News'),
(10,'Forums'),
(11,'Store'),
(12,'Chat'),
(13,'Armory'),
(14,'Changelogs'),
(15,'Donate'),
(16,'Vote'),
(17,'Events'),
(18,'API'),
(19,'Maintenance');

/*Table structure for table `fx_realms` */

DROP TABLE IF EXISTS `fx_realms`;

CREATE TABLE `fx_realms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `hostname` varchar(100) DEFAULT '127.0.0.1',
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `char_database` varchar(255) DEFAULT NULL,
  `realmID` int(1) unsigned NOT NULL,
  `console_hostname` varchar(100) DEFAULT '127.0.0.1',
  `console_username` varchar(255) DEFAULT NULL,
  `console_password` varchar(255) DEFAULT NULL,
  `console_port` int(6) unsigned DEFAULT 7878,
  `emulator` varchar(255) DEFAULT 'TC',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_realms` */

/*Table structure for table `fx_shop` */

DROP TABLE IF EXISTS `fx_shop`;

CREATE TABLE `fx_shop` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` int(11) unsigned DEFAULT NULL,
  `type` int(10) unsigned NOT NULL,
  `name` varchar(150) NOT NULL,
  `price_dp` int(10) unsigned DEFAULT NULL,
  `price_vp` int(10) unsigned DEFAULT NULL,
  `iconname` varchar(255) NOT NULL,
  `groups` int(1) unsigned NOT NULL,
  `qquery` text DEFAULT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'image1.jpg',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_shop` */

/*Table structure for table `fx_shop_groups` */

DROP TABLE IF EXISTS `fx_shop_groups`;

CREATE TABLE `fx_shop_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_shop_groups` */

/*Table structure for table `fx_shop_history` */

DROP TABLE IF EXISTS `fx_shop_history`;

CREATE TABLE `fx_shop_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idshop` int(10) unsigned NOT NULL,
  `itemid` int(10) unsigned DEFAULT NULL,
  `date` int(10) unsigned NOT NULL,
  `accountid` int(10) unsigned NOT NULL,
  `charid` int(10) unsigned DEFAULT NULL,
  `method` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_shop_history` */

/*Table structure for table `fx_shop_top` */

DROP TABLE IF EXISTS `fx_shop_top`;

CREATE TABLE `fx_shop_top` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_shop` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_shop` (`id_shop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_shop_top` */

/*Table structure for table `fx_slides` */

DROP TABLE IF EXISTS `fx_slides`;

CREATE TABLE `fx_slides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'image.jpg' COMMENT 'assets/images/slides',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `fx_slides` */

insert  into `fx_slides`(`id`,`title`,`image`) values 
(1,'BlizzCMS','slide1.jpg'),
(2,'Constant updates!','slide2.jpg');

/*Table structure for table `fx_tags` */

DROP TABLE IF EXISTS `fx_tags`;

CREATE TABLE `fx_tags` (
  `id` int(10) unsigned NOT NULL,
  `tag` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_tags` */

/*Table structure for table `fx_users` */

DROP TABLE IF EXISTS `fx_users`;

CREATE TABLE `fx_users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` int(10) unsigned NOT NULL,
  `profile` int(10) unsigned NOT NULL DEFAULT 1,
  `location` int(1) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_users` */

/*Table structure for table `fx_users_annotations` */

DROP TABLE IF EXISTS `fx_users_annotations`;

CREATE TABLE `fx_users_annotations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iduser` int(10) unsigned NOT NULL,
  `annotation` text NOT NULL,
  `date` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_users_annotations` */

/*Table structure for table `fx_users_permission` */

DROP TABLE IF EXISTS `fx_users_permission`;

CREATE TABLE `fx_users_permission` (
  `iduser` int(10) unsigned NOT NULL,
  `idrank` int(10) unsigned NOT NULL,
  KEY `idrank` (`idrank`),
  CONSTRAINT `fx_users_permission_ibfk_1` FOREIGN KEY (`idrank`) REFERENCES `fx_ranks_default` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_users_permission` */

/*Table structure for table `fx_votes` */

DROP TABLE IF EXISTS `fx_votes`;

CREATE TABLE `fx_votes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `time` int(10) unsigned NOT NULL,
  `points` int(10) unsigned NOT NULL DEFAULT 1,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `fx_votes` */

/*Table structure for table `fx_votes_logs` */

DROP TABLE IF EXISTS `fx_votes_logs`;

CREATE TABLE `fx_votes_logs` (
  `id` int(14) unsigned NOT NULL AUTO_INCREMENT,
  `idaccount` int(10) unsigned NOT NULL,
  `idvote` int(10) unsigned NOT NULL,
  `points` int(10) unsigned NOT NULL,
  `lasttime` int(10) unsigned NOT NULL,
  `expired_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `fx_votes_logs` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
