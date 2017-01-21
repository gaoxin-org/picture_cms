
-- ----------------------------
-- Table structure for `picture_admin`
-- ----------------------------
DROP TABLE IF EXISTS `picture_admin`;
CREATE TABLE `picture_admin` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `lasttime` int(10) unsigned NOT NULL,
  `lastip` varchar(20) NOT NULL,
  `encrypt` char(6) NOT NULL,
  PRIMARY KEY (`id`)
) ;

-- ----------------------------
-- Table structure for `picture_article`
-- ----------------------------
DROP TABLE IF EXISTS `picture_article`;
CREATE TABLE `picture_article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `inputtime` int(10) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `thumb` varchar(100) NOT NULL,
  `updatetime` int(10) unsigned NOT NULL,
  `catid` smallint(6) unsigned NOT NULL,
  `description` varchar(200) NOT NULL,
  `keywords` varchar(50) NOT NULL,
  `hits` int(10) unsigned NOT NULL,
  `url` varchar(100) NOT NULL,
  `listorder` smallint(6) unsigned NOT NULL,
  `gallery` text NOT NULL,
  PRIMARY KEY (`id`)
) ;


-- ----------------------------
-- Table structure for `picture_attachment`
-- ----------------------------
DROP TABLE IF EXISTS `picture_attachment`;
CREATE TABLE `picture_attachment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(100) NOT NULL,
  `filepath` varchar(200) NOT NULL,
  `fileext` varchar(10) NOT NULL,
  `filesize` int(10) NOT NULL,
  `inputtime` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ;


-- ----------------------------
-- Table structure for `picture_category`
-- ----------------------------
DROP TABLE IF EXISTS `picture_category`;
CREATE TABLE `picture_category` (
  `catid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `catname` varchar(30) NOT NULL,
  `pid` smallint(6) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(100) NOT NULL,
  `listorder` smallint(6) unsigned NOT NULL,
  `category` varchar(100) NOT NULL,
  `list` varchar(100) NOT NULL,
  `show` varchar(100) NOT NULL,
  `ispart` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ishidden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `keywords` varchar(100) NOT NULL,
  PRIMARY KEY (`catid`)
) ;


-- ----------------------------
-- Table structure for `picture_system`
-- ----------------------------
DROP TABLE IF EXISTS `picture_system`;
CREATE TABLE `picture_system` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of picture_system
-- ----------------------------
INSERT INTO `picture_system` VALUES ('1', '我的网站', '我的网站', '我的网站');

-- ----------------------------
-- Table structure for `picture_tag`
-- ----------------------------
DROP TABLE IF EXISTS `picture_tag`;
CREATE TABLE `picture_tag` (
  `tagid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `hits` int(10) unsigned NOT NULL,
  PRIMARY KEY (`tagid`),
  KEY `keyword` (`tag`)
) ;

-- ----------------------------
-- Table structure for `picture_tag_data`
-- ----------------------------
DROP TABLE IF EXISTS `picture_tag_data`;
CREATE TABLE `picture_tag_data` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tagid` int(10) unsigned NOT NULL DEFAULT '0',
  `contentid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tagid` (`tagid`)
) ;
