/*
Navicat MySQL Data Transfer

Source Server         : myj
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : build

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-04-24 12:48:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for anc_pic
-- ----------------------------
DROP TABLE IF EXISTS `anc_pic`;
CREATE TABLE `anc_pic` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `addtime` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updatetime` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未启用，1已启用',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_pic
-- ----------------------------
INSERT INTO `anc_pic` VALUES ('1', '/Uploads/2017-04-23/58fc5337228ef.jpg', '2017-04-23', '2017-04-23', '1', '而我却是是的');
INSERT INTO `anc_pic` VALUES ('2', '/Uploads/2017-04-23/58fc4d7119e1c.jpg', '2017-04-23', '', '1', '阿斯蒂芬');
INSERT INTO `anc_pic` VALUES ('5', '/Uploads/2017-04-24/58fd76d9b8cbe.jpg', '2017-04-24', '', '1', '阿道夫');
