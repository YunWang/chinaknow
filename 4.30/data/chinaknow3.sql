-- 公司表
DROP TABLE IF EXISTS `chinaknow_company`;
CREATE TABLE `chinaknow_company`(
	`id` tinyint unsigned auto_increment key,
	`companyName` varchar(255) not null unique,
	`companyDescription` mediumtext not null,
	`registerTime` int unsigned not null,
	`companyLogo` varchar(255) default "../iamges/pikaqiu.jpg"
);

-- 意见表
DROP TABLE IF EXISTS `chinaknow_contact`;
CREATE TABLE `chinaknow_contact`(
	`id` tinyint unsigned auto_increment key,
	`username` varchar(255) not null unique,
	`message` mediumtext not null,
	`email` varchar(30) not null
);

-- activity
DROP TABLE IF EXISTS `chinaknow_activity`;
CREATE TABLE `chinaknow_activity`(
	`id` int unsigned auto_increment key,
	`publishName` varchar(50) not null unique,
	`activityDetail` text not null,
	`activityTitle` text not null,
	`activityImg` varchar(50),
	`publishTime` int unsigned not null,
	`tagName` varchar(20),
	`isHot` tinyint(1) default 0,
	`isHighQuality` tinyint(1) default 0,
	`likeNumber` mediumint(10) default 0
);

-- activity
DROP TABLE IF EXISTS `chinaknow_article`;
CREATE TABLE `chinaknow_article`(
	`id` int unsigned auto_increment key,
	`publishName` varchar(50) not null unique,
	`articleDetail` text not null,
	`articleTitle` text not null,
	`articleImg` varchar(50),
	`publishTime` int unsigned not null,
	`tagName` varchar(20),
	`isHot` tinyint(1) default 0,
	`isHighQuality` tinyint(1) default 0,
	`likeNumber` mediumint(10) default 0
);