CREATE DATABASE IF NOT EXISTS `chinaknow`;
USE `chinaknow`;
-- 管理员
DROP TABLE IF EXISTS `chinaknow_admin`;
CREATE TABLE `chinaknow_admin`(
	`id` tinyint unsigned auto_increment key,
	`username` varchar(20) not null unique,
	`password` char(32) not null,
	`email` varchar(50) not null
);

-- 标签表
DROP TABLE IF EXISTS `chinaknow_tag`;
CREATE TABLE `chinaknow_tag`(
	`id` smallint unsigned auto_increment key,
	`tagName` varchar(30) unique,
	`parentTag` varchar(30)
);

-- 帖子表
DROP TABLE IF EXISTS `chinaknow_post`;
CREATE TABLE `chinaknow_post`(
	`id` int unsigned auto_increment key,
	`publishName` varchar(50) not null unique,
	`postDetail` text not null,
	`postTitle` text not null,
	`postImg` varchar(50),
	`publishTime` int unsigned not null,
	`tagName` int unsigned,
	`isHot` tinyint(1) default 0,
	`isHighQuality` tinyint(1) default 0,
	`likeNumber` mediumint(10) default 0
);

-- 帖子表
DROP TABLE IF EXISTS `chinaknow_achivement`;
CREATE TABLE `chinaknow_achivement`(
	`id` int unsigned auto_increment key,
	`publishName` varchar(50) not null unique,
	`achivementDetail` text not null,
	`achivementTitle` text not null,
	`achivementImg` varchar(50),
	`publishTime` int unsigned not null,
	`tagName` int unsigned,
	`isHot` tinyint(1) default 0,
	`isHighQuality` tinyint(1) default 0,
	`likeNumber` mediumint(10) default 0
);

-- 会员表
DROP TABLE IF EXISTS `chinaknow_user`;
CREATE TABLE `chinaknow_user`(
	`id` int unsigned auto_increment key,
	`username` varchar(20) not null,
	`password` char(32) not null,
	`gender` enum("male","female","secrecy") default "secrecy",
	`email` varchar(60) not null,
	`face` varchar(50),
	`regTime` int unsigned not null,
	`city` varchar(30),
	`country` varchar(30),
	`address` varchar(128),
	`university` varchar(30),
	`phone` varchar(30),
	`countryCode` varchar(30),
	`invitationCode` varchar(30),
	`integration` int default 0,
	`identity` enum("enterprise","student") default "student",
	`level` varchar(10),
	`AuditState` int default 0
);

-- 图片表
DROP TABLE IF EXISTS `chinaknow_album`;
CREATE TABLE `chinaknow_album`(
	`id` int unsigned auto_increment key,
	`postId` int unsigned not null,
	`albumPath` varchar(50) not null
);

-- 评论表
DROP TABLE IF EXISTS `chinaknow_articlecomment`;
CREATE TABLE `chinaknow_articlecomment`(
	`id` smallint not null auto_increment key,
	`publishName` varchar(255) not null,
	`postId` int unsigned not null,
	`commentDetail` mediumtext not null,
	`publishTime` int unsigned not null,
	`likeNumber` mediumint(10) default 0
);

-- 评论表
DROP TABLE IF EXISTS `chinaknow_postcomment`;
CREATE TABLE `chinaknow_postcomment`(
	`id` smallint not null auto_increment key,
	`publishName` varchar(255) not null,
	`postId` int unsigned not null,
	`commentDetail` mediumtext not null,
	`publishTime` int unsigned not null,
	`likeNumber` mediumint(10) default 0
);

-- 评论表
DROP TABLE IF EXISTS `chinaknow_activitycomment`;
CREATE TABLE `chinaknow_activitycomment`(
	`id` smallint not null auto_increment key,
	`publishName` varchar(255) not null,
	`activityId` int unsigned not null,
	`commentDetail` mediumtext not null,
	`publishTime` int unsigned not null,
	`likeNumber` mediumint(10) default 0
);

-- 评论表
DROP TABLE IF EXISTS `chinaknow_achivementcomment`;
CREATE TABLE `chinaknow_achivementcomment`(
	`id` smallint not null auto_increment key,
	`publishName` varchar(255) not null,
	`achivementId` int unsigned not null,
	`commentDetail` mediumtext not null,
	`publishTime` int unsigned not null,
	`likeNumber` mediumint(10) default 0
);

-- 评论表
DROP TABLE IF EXISTS `chinaknow_commentincomment`;
CREATE TABLE `chinaknow_commentincomment`(
	`id` smallint not null auto_increment key,
	`publishName` varchar(255) not null,
	`commentId` int unsigned not null,
	`commentDetail` mediumtext not null,
	`publishTime` int unsigned not null,
	`likeNumber` mediumint(10) default 0
);
