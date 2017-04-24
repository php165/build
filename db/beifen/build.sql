/*
Navicat MySQL Data Transfer

Source Server         : myj
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : build

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-04-24 15:41:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for anc_article
-- ----------------------------
DROP TABLE IF EXISTS `anc_article`;
CREATE TABLE `anc_article` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `columnone` int(11) unsigned NOT NULL COMMENT '一级栏目名称',
  `columntwo` int(11) unsigned NOT NULL COMMENT '二级栏目名称',
  `columnthird` int(11) unsigned NOT NULL COMMENT '三级栏目名称',
  `mastermap` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/Uploads/default.png' COMMENT '主图',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '标题',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '文章内容',
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '视频',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1为已启用0为未启用',
  `addtime` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updatetime` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `istop` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为不显示在主页，1为显示在主页',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_article
-- ----------------------------
INSERT INTO `anc_article` VALUES ('9', '2', '18', '0', '/Uploads/2017-04-24/58fda71da8781.jpg', '艾丝凡', '<p>撒旦法<br/></p>', '', '0', '2017-04-24', '', 'admin', '0');
INSERT INTO `anc_article` VALUES ('4', '4', '7', '22', '/Uploads/2017-04-22/58fb0b4fcd911.jpg', '阿萨德飞', '<p><img src=\"/ueditor/php/upload/image/20170422/1492845218686270.jpg\" title=\"1492845218686270.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></p><p>撒旦法是否<br/></p>', '', '1', '2017-04-22', '2017-04-22', 'admin', '0');
INSERT INTO `anc_article` VALUES ('5', '2', '18', '0', '/Uploads/2017-04-22/58fb0b0ad043f.jpg', '加速到廊坊', '<p><img src=\"/ueditor/php/upload/image/20170422/1492845555568880.jpg\" title=\"1492845555568880.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></p><p>围绕我<br/></p>', '', '1', '2017-04-22', '2017-04-22', 'admin', '1');
INSERT INTO `anc_article` VALUES ('6', '1', '47', '0', '/Uploads/2017-04-22/58fb066a6ac3e.jpeg', '沙发上', '<p><img src=\"/ueditor/php/upload/image/20170422/1492846052139965.jpg\" title=\"1492846052139965.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></p>', '', '1', '2017-04-22', '', 'admin', '0');
INSERT INTO `anc_article` VALUES ('8', '1', '0', '0', '/Uploads/2017-04-24/58fd75ca3ddd5.jpg', '的发生', '<p>阿斯蒂芬<br/></p>', '', '1', '2017-04-24', '', 'admin', '1');

-- ----------------------------
-- Table structure for anc_node
-- ----------------------------
DROP TABLE IF EXISTS `anc_node`;
CREATE TABLE `anc_node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fangfa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pid` int(11) unsigned NOT NULL,
  `salt` int(11) unsigned NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_node
-- ----------------------------
INSERT INTO `anc_node` VALUES ('1', '分类模块', 'Type', 'index', '0', '1', '0-1');
INSERT INTO `anc_node` VALUES ('2', '添加分类', 'Type', 'add', '1', '2', '0-1-2');
INSERT INTO `anc_node` VALUES ('3', '修改分类', 'Type', 'edit', '1', '2', '0-1-3');
INSERT INTO `anc_node` VALUES ('4', '分类状态', 'Type', 'status', '1', '2', '0-1-4');
INSERT INTO `anc_node` VALUES ('5', '删除分类', 'Type', 'del', '1', '2', '0-1-5');
INSERT INTO `anc_node` VALUES ('6', '文章模块', 'Article', 'index', '0', '1', '0-6');
INSERT INTO `anc_node` VALUES ('7', '添加文章', 'Article', 'add', '6', '2', '0-6-7');
INSERT INTO `anc_node` VALUES ('8', '修改文章', 'Article', 'edit', '6', '2', '0-6-8');
INSERT INTO `anc_node` VALUES ('9', '文章状态', 'Article', 'status', '6', '2', '0-6-9');
INSERT INTO `anc_node` VALUES ('10', '删除文章', 'Article', 'del', '6', '2', '0-6-10');
INSERT INTO `anc_node` VALUES ('11', '管理员模块', 'User', 'index', '0', '1', '0-11');
INSERT INTO `anc_node` VALUES ('12', '添加管理员', 'User', 'add', '11', '2', '0-11-12');
INSERT INTO `anc_node` VALUES ('13', '修改管理员', 'User', 'edit', '11', '2', '0-11-13');
INSERT INTO `anc_node` VALUES ('14', '管理员状态', 'User', 'status', '11', '2', '0-11-14');
INSERT INTO `anc_node` VALUES ('15', '删除管理员', 'User', 'del', '11', '2', '0-11-15');
INSERT INTO `anc_node` VALUES ('16', '角色模块', 'Role', 'index', '0', '1', '0-16');
INSERT INTO `anc_node` VALUES ('17', '添加角色', 'Role', 'add', '16', '2', '0-16-17');
INSERT INTO `anc_node` VALUES ('18', '修改角色', 'Role', 'edit', '16', '2', '0-16-18');
INSERT INTO `anc_node` VALUES ('19', '角色状态', 'Role', 'status', '16', '2', '0-16-19');
INSERT INTO `anc_node` VALUES ('20', '删除角色', 'Role', 'del', '16', '2', '0-16-20');
INSERT INTO `anc_node` VALUES ('21', '系统设置', 'Set', 'index', '0', '1', '0-21');
INSERT INTO `anc_node` VALUES ('22', '修改系统设置', 'Set', 'edit', '21', '2', '0-21-22');
INSERT INTO `anc_node` VALUES ('23', '三级分类ajax', 'Article', 'ajaxType', '6', '2', '0-6-23');
INSERT INTO `anc_node` VALUES ('24', '查看文章', 'Article', 'look', '6', '2', '0-6-24');
INSERT INTO `anc_node` VALUES ('25', '修改联系人', 'Set', 'addperson', '21', '2', '0-21-25');
INSERT INTO `anc_node` VALUES ('26', '执行修改联系人', 'Set', 'updateperson', '21', '2', '0-21-26');
INSERT INTO `anc_node` VALUES ('27', '轮播图模块', 'Pic', 'index', '0', '1', '0-27');
INSERT INTO `anc_node` VALUES ('28', '添加轮播图', 'Pic', 'add', '27', '2', '0-27-28');
INSERT INTO `anc_node` VALUES ('33', '轮播图启用', 'Pic', 'status', '27', '2', '0-27-33');
INSERT INTO `anc_node` VALUES ('29', '执行添加轮播图', 'Pic', 'insert', '27', '2', '0-27-29');
INSERT INTO `anc_node` VALUES ('30', '修改轮播图', 'Pic', 'edit', '27', '2', '0-27-30');
INSERT INTO `anc_node` VALUES ('31', '执行修改轮播图', 'Pic', 'update', '27', '2', '0-27-31');
INSERT INTO `anc_node` VALUES ('32', '删除轮播图', 'Pic', 'del', '27', '2', '0-27-32');
INSERT INTO `anc_node` VALUES ('34', '添加子分类', 'Type', 'addchild', '1', '2', '0-1-34');
INSERT INTO `anc_node` VALUES ('35', '执行添加子分类', 'Type', 'insertchild', '1', '2', '0-1-35');
INSERT INTO `anc_node` VALUES ('40', '系统设置查看', 'Set', 'index', '21', '2', '0-21-40');
INSERT INTO `anc_node` VALUES ('41', '浏览轮播图列表', 'Pic', 'index', '27', '2', '0-27-41');
INSERT INTO `anc_node` VALUES ('36', '浏览分类', 'Type', 'index', '1', '2', '0-1-36');
INSERT INTO `anc_node` VALUES ('37', '浏览文章', 'Article', 'index', '6', '2', '0-6-36');
INSERT INTO `anc_node` VALUES ('38', '浏览管理员', 'User', 'index', '11', '2', '0-11-38');
INSERT INTO `anc_node` VALUES ('39', '浏览角色', 'Role', 'index', '16', '2', '0-16-39');
INSERT INTO `anc_node` VALUES ('44', '文章是否显示在首页', 'Article', 'istop', '6', '2', '0-6-44');

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

-- ----------------------------
-- Table structure for anc_role
-- ----------------------------
DROP TABLE IF EXISTS `anc_role`;
CREATE TABLE `anc_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '非空、默认为0，0为普通用户、1为超级管理员2为文章编辑管理员，3为图片编辑管理员，4为视频编辑管理员',
  `addtime` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updatetime` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未启用1为启用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `role` (`role`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_role
-- ----------------------------
INSERT INTO `anc_role` VALUES ('1', '超级管理员', '2017-04-17', '', '0');
INSERT INTO `anc_role` VALUES ('16', '文章管理', '2017-04-23', '', '0');
INSERT INTO `anc_role` VALUES ('18', '管理员管理', '2017-04-24', '', '0');
INSERT INTO `anc_role` VALUES ('15', '分类管理员', '2017-04-23', '', '0');

-- ----------------------------
-- Table structure for anc_role_node
-- ----------------------------
DROP TABLE IF EXISTS `anc_role_node`;
CREATE TABLE `anc_role_node` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rid` int(11) unsigned NOT NULL,
  `nid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=193 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_role_node
-- ----------------------------
INSERT INTO `anc_role_node` VALUES ('1', '1', '1');
INSERT INTO `anc_role_node` VALUES ('2', '1', '2');
INSERT INTO `anc_role_node` VALUES ('3', '1', '3');
INSERT INTO `anc_role_node` VALUES ('4', '1', '4');
INSERT INTO `anc_role_node` VALUES ('5', '1', '5');
INSERT INTO `anc_role_node` VALUES ('6', '1', '6');
INSERT INTO `anc_role_node` VALUES ('7', '1', '7');
INSERT INTO `anc_role_node` VALUES ('8', '1', '8');
INSERT INTO `anc_role_node` VALUES ('9', '1', '9');
INSERT INTO `anc_role_node` VALUES ('10', '1', '10');
INSERT INTO `anc_role_node` VALUES ('11', '1', '11');
INSERT INTO `anc_role_node` VALUES ('12', '1', '12');
INSERT INTO `anc_role_node` VALUES ('13', '1', '13');
INSERT INTO `anc_role_node` VALUES ('14', '1', '14');
INSERT INTO `anc_role_node` VALUES ('15', '1', '15');
INSERT INTO `anc_role_node` VALUES ('16', '1', '16');
INSERT INTO `anc_role_node` VALUES ('17', '1', '17');
INSERT INTO `anc_role_node` VALUES ('18', '1', '18');
INSERT INTO `anc_role_node` VALUES ('19', '1', '19');
INSERT INTO `anc_role_node` VALUES ('20', '1', '20');
INSERT INTO `anc_role_node` VALUES ('21', '1', '21');
INSERT INTO `anc_role_node` VALUES ('22', '1', '22');
INSERT INTO `anc_role_node` VALUES ('23', '1', '23');
INSERT INTO `anc_role_node` VALUES ('24', '1', '24');
INSERT INTO `anc_role_node` VALUES ('25', '1', '25');
INSERT INTO `anc_role_node` VALUES ('26', '1', '26');
INSERT INTO `anc_role_node` VALUES ('183', '16', '24');
INSERT INTO `anc_role_node` VALUES ('190', '15', '34');
INSERT INTO `anc_role_node` VALUES ('189', '15', '5');
INSERT INTO `anc_role_node` VALUES ('188', '15', '4');
INSERT INTO `anc_role_node` VALUES ('187', '15', '3');
INSERT INTO `anc_role_node` VALUES ('186', '15', '2');
INSERT INTO `anc_role_node` VALUES ('177', '1', '44');
INSERT INTO `anc_role_node` VALUES ('176', '1', '43');
INSERT INTO `anc_role_node` VALUES ('175', '1', '42');
INSERT INTO `anc_role_node` VALUES ('174', '18', '38');
INSERT INTO `anc_role_node` VALUES ('173', '18', '15');
INSERT INTO `anc_role_node` VALUES ('172', '18', '14');
INSERT INTO `anc_role_node` VALUES ('45', '1', '27');
INSERT INTO `anc_role_node` VALUES ('46', '1', '28');
INSERT INTO `anc_role_node` VALUES ('47', '1', '29');
INSERT INTO `anc_role_node` VALUES ('48', '1', '30');
INSERT INTO `anc_role_node` VALUES ('49', '1', '31');
INSERT INTO `anc_role_node` VALUES ('50', '1', '32');
INSERT INTO `anc_role_node` VALUES ('51', '1', '33');
INSERT INTO `anc_role_node` VALUES ('52', '1', '34');
INSERT INTO `anc_role_node` VALUES ('53', '1', '35');
INSERT INTO `anc_role_node` VALUES ('171', '18', '13');
INSERT INTO `anc_role_node` VALUES ('170', '18', '12');
INSERT INTO `anc_role_node` VALUES ('182', '16', '23');
INSERT INTO `anc_role_node` VALUES ('181', '16', '10');
INSERT INTO `anc_role_node` VALUES ('180', '16', '9');
INSERT INTO `anc_role_node` VALUES ('72', '1', '36');
INSERT INTO `anc_role_node` VALUES ('73', '1', '37');
INSERT INTO `anc_role_node` VALUES ('74', '1', '38');
INSERT INTO `anc_role_node` VALUES ('75', '1', '39');
INSERT INTO `anc_role_node` VALUES ('76', '1', '40');
INSERT INTO `anc_role_node` VALUES ('77', '1', '41');
INSERT INTO `anc_role_node` VALUES ('179', '16', '8');
INSERT INTO `anc_role_node` VALUES ('178', '16', '7');
INSERT INTO `anc_role_node` VALUES ('184', '16', '37');
INSERT INTO `anc_role_node` VALUES ('185', '16', '44');
INSERT INTO `anc_role_node` VALUES ('191', '15', '35');
INSERT INTO `anc_role_node` VALUES ('192', '15', '36');

-- ----------------------------
-- Table structure for anc_seting
-- ----------------------------
DROP TABLE IF EXISTS `anc_seting`;
CREATE TABLE `anc_seting` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/Uploads/default.png',
  `mastermap` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/Uploads/default.png',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `linkman` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_seting
-- ----------------------------
INSERT INTO `anc_seting` VALUES ('1', '阿斯顿发', '阿斯顿发放', '/Uploads/2017-04-20/58f862b9eecb2.jpg', '/Uploads/2017-04-20/58f862b9ef482.jpg', '阿斯顿发生打发斯蒂芬', '老六啊', '2147483647', '北京海淀区中关村');

-- ----------------------------
-- Table structure for anc_type
-- ----------------------------
DROP TABLE IF EXISTS `anc_type`;
CREATE TABLE `anc_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(11) unsigned NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `addtime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0未开启，1开启',
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `salt` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1为1级，2为2级，3为3级，依次类推',
  `isshow` tinyint(1) DEFAULT '0' COMMENT '0不显示到导航栏，1显示到导航栏',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_type
-- ----------------------------
INSERT INTO `anc_type` VALUES ('1', '0', '古建新闻', '0-1', '0', '1', '顶级分类', '1', '0');
INSERT INTO `anc_type` VALUES ('2', '0', '古建百科', '0-2', '0', '1', '', '1', '0');
INSERT INTO `anc_type` VALUES ('3', '0', '古建保护', '0-3', '0', '1', '', '1', '0');
INSERT INTO `anc_type` VALUES ('4', '0', '古建欣赏', '0-4', '0', '1', '', '1', '0');
INSERT INTO `anc_type` VALUES ('5', '0', '古建图库', '0-5', '0', '1', '', '1', '0');
INSERT INTO `anc_type` VALUES ('6', '0', '古建视频', '0-6', '0', '1', '', '1', '0');
INSERT INTO `anc_type` VALUES ('7', '4', '功能分类', '0-4-7', '0', '1', '功能分类', '2', '1');
INSERT INTO `anc_type` VALUES ('8', '4', '时代分类', '0-4-8', '0', '1', '时代分类', '2', '1');
INSERT INTO `anc_type` VALUES ('9', '8', '唐', '0-4-8-9', '0', '1', '', '3', '0');
INSERT INTO `anc_type` VALUES ('10', '8', '宋', '0-4-8-10', '0', '1', '', '3', '0');
INSERT INTO `anc_type` VALUES ('11', '8', '元', '0-4-8-11', '0', '1', '', '3', '0');
INSERT INTO `anc_type` VALUES ('12', '8', '明', '0-4-8-12', '0', '1', '', '3', '0');
INSERT INTO `anc_type` VALUES ('57', '1', '古建动态', '0-1-57', '2017-04-24', '1', '古建动态文章', '2', '1');
INSERT INTO `anc_type` VALUES ('14', '1', '政策法规', '0-1-14', '0', '1', '二级分类s', '2', '1');
INSERT INTO `anc_type` VALUES ('16', '1', '考古发现', '0-1-16', '0', '1', '考古发现文章图集', '2', '1');
INSERT INTO `anc_type` VALUES ('17', '2', '古建文化', '0-2-17', '0', '1', '古建文化文章', '2', '1');
INSERT INTO `anc_type` VALUES ('18', '2', '古建技艺', '0-2-18', '0', '1', '古建技艺文章', '2', '1');
INSERT INTO `anc_type` VALUES ('19', '2', '古建人物', '0-2-19', '0', '1', '古建人物图集', '2', '1');
INSERT INTO `anc_type` VALUES ('20', '2', '古建风水', '0-2-20', '0', '1', '古建风水文章', '2', '1');
INSERT INTO `anc_type` VALUES ('21', '7', '民间', '0-4-7-21', '0', '1', '', '3', '0');
INSERT INTO `anc_type` VALUES ('22', '7', '宗教', '0-4-7-22', '0', '1', '', '3', '0');
INSERT INTO `anc_type` VALUES ('23', '7', '园林', '0-4-7-23', '0', '1', '', '3', '0');
INSERT INTO `anc_type` VALUES ('24', '7', '皇家', '0-4-7-24', '0', '1', '', '3', '0');
INSERT INTO `anc_type` VALUES ('25', '7', '民族', '0-4-7-25', '0', '1', '', '3', '0');
INSERT INTO `anc_type` VALUES ('26', '7', '其他', '0-4-7-26', '0', '1', '', '3', '0');
INSERT INTO `anc_type` VALUES ('27', '8', '清', '0-4-8-27', '0', '1', '', '3', '0');
INSERT INTO `anc_type` VALUES ('28', '8', '其他', '0-4-8-28', '0', '1', '', '3', '0');
INSERT INTO `anc_type` VALUES ('58', '1', '古建观点', '0-1-58', '2017-04-24', '1', '古建观点文章', '2', '1');
INSERT INTO `anc_type` VALUES ('53', '5', '时代分类', '0-5-53', '2017-04-23', '1', '按照时代分类', '2', '1');
INSERT INTO `anc_type` VALUES ('52', '5', '功能分类', '0-5-52', '2017-04-23', '1', '功能', '2', '1');
INSERT INTO `anc_type` VALUES ('49', '0', '经典案列', '0-49', '2017-04-22', '1', '经典案例介绍', '1', '0');
INSERT INTO `anc_type` VALUES ('56', '6', '功能分类', '0-6-56', '2017-04-23', '1', '功能', '2', '1');
INSERT INTO `anc_type` VALUES ('55', '6', '时代分类', '0-6-55', '2017-04-23', '1', '时代', '2', '1');
INSERT INTO `anc_type` VALUES ('60', '55', '唐', '0-6-55-60', '2017-04-24', '1', '唐朝的', '3', '0');
INSERT INTO `anc_type` VALUES ('61', '55', '宋', '0-6-55-61', '2017-04-24', '1', '宋朝的', '3', '0');

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
  `addtime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updatetime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loginip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_users
-- ----------------------------
INSERT INTO `anc_users` VALUES ('1', 'admin', '', 'e1bad86cef109cb56370fd7096b35094', '0', '2017-04-18', '2017-04-24 15:40:19', '1657', '0.0.0.0', '72');
INSERT INTO `anc_users` VALUES ('7', 'admin009', '', 'a337a4c7079e023b41bffc903f83f356', '0', '2017-04-23', '2017-04-24 11:27:48', '9914', '0.0.0.0', '6');
INSERT INTO `anc_users` VALUES ('5', 'admin002', '', '7f6791e21c7317cb2f8bf9af0c5bd34b', '0', '2017-04-18', '2017-04-18', '5338', '0.0.0.0', '1');

-- ----------------------------
-- Table structure for anc_users_role
-- ----------------------------
DROP TABLE IF EXISTS `anc_users_role`;
CREATE TABLE `anc_users_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL,
  `rid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '非空、默认为0，0为普通用户、1为超级管理员2为文章编辑管理员，3为图片编辑管理员，4为视频编辑管理员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_users_role
-- ----------------------------
INSERT INTO `anc_users_role` VALUES ('1', '1', '1');
INSERT INTO `anc_users_role` VALUES ('3', '5', '15');
INSERT INTO `anc_users_role` VALUES ('4', '7', '16');
