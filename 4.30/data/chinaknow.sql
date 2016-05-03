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
DROP TABLE IF EXISTS `chinaknow_cate`;
CREATE TABLE `chinaknow_cate`(
	`id` smallint unsigned auto_increment key,
	`cName` varchar(50) unique
);

-- 问题表
DROP TABLE IF EXISTS `chinaknow_question`;
CREATE TABLE `chinaknow_question`(
	`id` int unsigned auto_increment key,
	`pubName` varchar(50) not null unique,
	`qDesc` text,
	`qTitle` text not null,
	`qImg` varchar(50) not null,
	`pubTime` int unsigned not null,
	`cId` int unsigned not null
);

-- 会员表
DROP TABLE IF EXISTS `chinaknow_user`;
CREATE TABLE `chinaknow_user`(
	`id` int unsigned auto_increment key,
	`username` varchar(20) not null,
	`password` char(32) not null,
	`sex` enum("男","女","保密") not null default "保密",
	`email` varchar(60) not null,
	`face` varchar(50) not null,
	`regTime` int unsigned not null
)charset='utf8';

-- 图片表
DROP TABLE IF EXISTS `chinaknow_album`;
CREATE TABLE `chinaknow_album`(
	`id` int unsigned auto_increment key,
	`pid` int unsigned not null,
	`albumPath` varchar(50) not null
);

-- 评论表
DROP TABLE IF EXISTS `chinaknow_comment`;
CREATE TABLE `chinaknow_comment`(
	`id` smallint not null auto_increment key,
	`pubName` varchar(255) not null,
	`cId` int unsigned,
	`qTitle` varchar(255) not null,
	`qDesc` mediumtext,
	`qImg` varchar(255),
	`pubTime` int unsigned not null
);