/*
Navicat MySQL Data Transfer

Source Server         : 140
Source Server Version : 50542
Source Host           : 10.10.11.140:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50542
File Encoding         : 65001

Date: 2016-08-23 16:29:37
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `front_img` varchar(255) DEFAULT '',
  `content` text,
  `add_time` int(11) DEFAULT '0',
  `last_time` int(11) DEFAULT '0',
  `flag_id` tinyint(4) DEFAULT '0',
  `class_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for article_class
-- ----------------------------
DROP TABLE IF EXISTS `article_class`;
CREATE TABLE `article_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(30) DEFAULT '',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for user_ext
-- ----------------------------
DROP TABLE IF EXISTS `user_ext`;
CREATE TABLE `user_ext` (
  `user_id` int(11) DEFAULT NULL,
  `email` varchar(30) DEFAULT '',
  `sex` enum('2','1','0') DEFAULT '0',
  `avater` varchar(255) DEFAULT '',
  `signature` varchar(255) DEFAULT '',
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
