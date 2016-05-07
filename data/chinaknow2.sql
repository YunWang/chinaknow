CREATE DATABASE IF NOT EXISTS `chinaknow`;
USE `chinaknow`;
-- 管理员
DROP TABLE IF EXISTS `chinaknow_admin`;
CREATE TABLE `chinaknow_admin`(
	`id` tinyint unsigned auto_increment key,
	`username` varchar(20) not null,
	`password` char(32) not null,
	`email` varchar(50) not null
);

-- 标签表
DROP TABLE IF EXISTS `chinaknow_tag`;
CREATE TABLE `chinaknow_tag`(
	`id` smallint unsigned auto_increment key,
	`tagName` varchar(30),
	`parentTag` varchar(30)
);

-- 帖子表
DROP TABLE IF EXISTS `chinaknow_post`;
CREATE TABLE `chinaknow_post`(
	`id` int unsigned auto_increment key,
	`publishName` varchar(50) not null,
	`postDetail` text,
	`postTitle` text not null,
	`postImg` varchar(50) not null,
	`publishTime` int unsigned not null,
	`tagName` int unsigned not null,
	`isHot` tinyint(1) not null default 0,
	`isHighQuality` tinyint(1) not null default 0,
	`likeNumber` mediumint(10) default 0
);

-- 会员表
DROP TABLE IF EXISTS `chinaknow_user`;
CREATE TABLE `chinaknow_user`(
	`id` int unsigned auto_increment key,
	`username` varchar(20) not null,
	`password` char(32) not null,
	`gander` enum("male","female","secrecy") not null default "secrecy",
	`email` varchar(60) not null,
	`face` varchar(50),
	`regTime` int unsigned not null,
	`city` varchar(30) not null,
	`country` varchar(30) not null,
	`address` varchar(128) not null,
	`university` varchar(30) not null,
	`phone` varchar(30) not null,
	`countryCode` varchar(30) not null,
	`invitationCode` varchar(30),
	`integration` int default 0,
	`identity` enum("enterprise","student") default "student",
	`level` varchar(10)
);

-- 图片表
DROP TABLE IF EXISTS `chinaknow_album`;
CREATE TABLE `chinaknow_album`(
	`id` int unsigned auto_increment key,
	`postId` int unsigned not null,
	`albumPath` varchar(50) not null
);

-- 评论表
DROP TABLE IF EXISTS `chinaknow_comment`;
CREATE TABLE `chinaknow_comment`(
	`id` smallint not null auto_increment key,
	`publishName` varchar(255) not null,
	`postId` int unsigned not null,
	`commentDetail` mediumtext not null,
	`commentImg` varchar(255),
	`publishTime` int unsigned not null
);
