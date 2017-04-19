/*
Navicat MySQL Data Transfer

Source Server         : myj
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : build

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-04-18 19:48:18
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for anc_appreciate
-- ----------------------------
DROP TABLE IF EXISTS `anc_appreciate`;
CREATE TABLE `anc_appreciate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '非空，分为皇家，园林，宗教，民间，民族，其他',
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '非空，分为唐，宋，元，明，清，其他',
  `pictures` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_appreciate
-- ----------------------------

-- ----------------------------
-- Table structure for anc_cyclopedia
-- ----------------------------
DROP TABLE IF EXISTS `anc_cyclopedia`;
CREATE TABLE `anc_cyclopedia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '1为古建文化，2为古建技艺，3为古建人物，4为考古风水',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0为未发布，1为已发布',
  `addtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_cyclopedia
-- ----------------------------

-- ----------------------------
-- Table structure for anc_news
-- ----------------------------
DROP TABLE IF EXISTS `anc_news`;
CREATE TABLE `anc_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '1为古建动态法规，2为政策法规，3为古建观点，4为考古发现',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为未发布，1为已发布',
  `addtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_news
-- ----------------------------

-- ----------------------------
-- Table structure for anc_node
-- ----------------------------
DROP TABLE IF EXISTS `anc_node`;
CREATE TABLE `anc_node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fangfa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_node
-- ----------------------------
INSERT INTO `anc_node` VALUES ('1', '浏览管理员', 'User', 'index');
INSERT INTO `anc_node` VALUES ('2', '添加加管理员', 'User', 'add');
INSERT INTO `anc_node` VALUES ('3', '修改管理员权限', 'User', 'edit');
INSERT INTO `anc_node` VALUES ('4', '删除管理员', 'User', 'del');
INSERT INTO `anc_node` VALUES ('5', '启用与禁用管理员', 'User', 'status');
INSERT INTO `anc_node` VALUES ('6', '浏览新闻', 'News', 'index');
INSERT INTO `anc_node` VALUES ('7', '添加新闻', 'News', 'add');
INSERT INTO `anc_node` VALUES ('8', '修改新闻', 'News', 'edit');
INSERT INTO `anc_node` VALUES ('9', '删除新闻', 'News', 'del');
INSERT INTO `anc_node` VALUES ('10', '显示与不显示新闻', 'News', 'status');

-- ----------------------------
-- Table structure for anc_pic
-- ----------------------------
DROP TABLE IF EXISTS `anc_pic`;
CREATE TABLE `anc_pic` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pictures` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_pic
-- ----------------------------

-- ----------------------------
-- Table structure for anc_role
-- ----------------------------
DROP TABLE IF EXISTS `anc_role`;
CREATE TABLE `anc_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '非空、默认为0，0为普通用户、1为超级管理员2为文章编辑管理员，3为图片编辑管理员，4为视频编辑管理员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_role
-- ----------------------------
INSERT INTO `anc_role` VALUES ('1', '超级管理员');
INSERT INTO `anc_role` VALUES ('2', '文章编辑管理员');
INSERT INTO `anc_role` VALUES ('3', '图片编辑管理员');
INSERT INTO `anc_role` VALUES ('4', '视频编辑管理员');

-- ----------------------------
-- Table structure for anc_role_node
-- ----------------------------
DROP TABLE IF EXISTS `anc_role_node`;
CREATE TABLE `anc_role_node` (
  `rid` int(11) NOT NULL,
  `nid` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_role_node
-- ----------------------------
INSERT INTO `anc_role_node` VALUES ('1', '1');
INSERT INTO `anc_role_node` VALUES ('1', '2');
INSERT INTO `anc_role_node` VALUES ('1', '3');
INSERT INTO `anc_role_node` VALUES ('1', '4');
INSERT INTO `anc_role_node` VALUES ('1', '5');
INSERT INTO `anc_role_node` VALUES ('1', '6');
INSERT INTO `anc_role_node` VALUES ('1', '7');
INSERT INTO `anc_role_node` VALUES ('1', '8');
INSERT INTO `anc_role_node` VALUES ('1', '9');
INSERT INTO `anc_role_node` VALUES ('1', '10');
INSERT INTO `anc_role_node` VALUES ('2', '10');
INSERT INTO `anc_role_node` VALUES ('2', '9');
INSERT INTO `anc_role_node` VALUES ('2', '8');
INSERT INTO `anc_role_node` VALUES ('2', '7');
INSERT INTO `anc_role_node` VALUES ('2', '6');

-- ----------------------------
-- Table structure for anc_seting
-- ----------------------------
DROP TABLE IF EXISTS `anc_seting`;
CREATE TABLE `anc_seting` (
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_seting
-- ----------------------------

-- ----------------------------
-- Table structure for anc_users
-- ----------------------------
DROP TABLE IF EXISTS `anc_users`;
CREATE TABLE `anc_users` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为开启1为禁用',
  `addtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loginip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_users
-- ----------------------------
INSERT INTO `anc_users` VALUES ('1', 'admin', '', 'e1bad86cef109cb56370fd7096b35094', '0', '2017-04-18 10:21:22', '2017-04-18 19:39:33', '1657', '0.0.0.0', '7');
INSERT INTO `anc_users` VALUES ('3', 'admin009', '', 'ea9a72a3be67972401694dcee48e78ea', '0', '2017-04-18 17:11:11', '2017-04-18 17:40:10', '8271', '0.0.0.0', '2');
INSERT INTO `anc_users` VALUES ('4', 'admin001', '', 'c91640206928795f697c036e1db85c0d', '1', '2017-04-18 17:18:14', '0000-00-00 00:00:00', '3962', '', '0');
INSERT INTO `anc_users` VALUES ('5', 'admin002', '', '7f6791e21c7317cb2f8bf9af0c5bd34b', '0', '2017-04-18 17:18:43', '2017-04-18 19:05:12', '5338', '0.0.0.0', '1');

-- ----------------------------
-- Table structure for anc_users_role
-- ----------------------------
DROP TABLE IF EXISTS `anc_users_role`;
CREATE TABLE `anc_users_role` (
  `uid` int(11) NOT NULL,
  `rid` int(11) NOT NULL DEFAULT '0' COMMENT '非空、默认为0，0为普通用户、1为超级管理员2为文章编辑管理员，3为图片编辑管理员，4为视频编辑管理员'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_users_role
-- ----------------------------
INSERT INTO `anc_users_role` VALUES ('1', '1');
INSERT INTO `anc_users_role` VALUES ('5', '2');
INSERT INTO `anc_users_role` VALUES ('5', '3');
INSERT INTO `anc_users_role` VALUES ('6', '4');
INSERT INTO `anc_users_role` VALUES ('4', '2');
INSERT INTO `anc_users_role` VALUES ('3', '2');
INSERT INTO `anc_users_role` VALUES ('3', '3');

-- ----------------------------
-- Table structure for anc_video
-- ----------------------------
DROP TABLE IF EXISTS `anc_video`;
CREATE TABLE `anc_video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addtime` datetime NOT NULL,
  `updatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_video
-- ----------------------------
