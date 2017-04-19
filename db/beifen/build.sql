/*
Navicat MySQL Data Transfer

Source Server         : myj
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : build

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-04-19 18:49:16
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
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0为未发布，1为已发布',
  `addtime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updatetime` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mastermap` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/Uploads/default.png',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_cyclopedia
-- ----------------------------
INSERT INTO `anc_cyclopedia` VALUES ('3', '古建文化', '阿斯顿发地方', '<p style=\"text-align: center;\">阿斯顿发生地方地</p><p style=\"text-align: center;\">&nbsp;&nbsp;&nbsp;&nbsp; <img src=\"/Public/uploads/image/20170419/1492594498114920.jpg\" title=\"1492594498114920.jpg\" alt=\"a71ea8d3fd1f413465fb8b3f221f95cad0c85ea7.jpg\"/></p>', '0', '2017-04-19', '2017-04-19', 'admin', '/Uploads/default.png');
INSERT INTO `anc_cyclopedia` VALUES ('4', '古建人物', '阿斯顿发到', '<p style=\"text-align: center;\"><strong>阿斯顿发送方空间</strong></p><p style=\"text-align: center;\"><strong><img src=\"/Public/uploads/image/20170419/1492594531971399.jpg\" title=\"1492594531971399.jpg\" alt=\"a71ea8d3fd1f413465fb8b3f221f95cad0c85ea7.jpg\"/></strong></p>', '1', '2017-04-19', '2017-04-19', 'admin', '/Uploads/2017-04-19/58f72f7d086ed.png');
INSERT INTO `anc_cyclopedia` VALUES ('7', '古建技艺', '杀了的开发将地方', '<p>阿斯顿发地方</p><p>阿斯顿解放路口</p><p>阿斯顿福建；考虑</p><p><img src=\"/Public/uploads/image/20170419/1492594787108044.jpg\" title=\"1492594787108044.jpg\" alt=\"a71ea8d3fd1f413465fb8b3f221f95cad0c85ea7.jpg\"/></p>', '0', '2017-04-19', '2017-04-19', 'admin', '/Uploads/default.png');
INSERT INTO `anc_cyclopedia` VALUES ('10', '古建技艺', '撒打发斯蒂芬', '<p>阿斯顿发生地方</p><p><img src=\"/Public/uploads/image/20170419/1492598601237320.jpg\" title=\"1492598601237320.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></p>', '0', '2017-04-19', '', 'admin', '/Uploads/default.png');
INSERT INTO `anc_cyclopedia` VALUES ('9', '古建风水', '阿双方各的双方各', '<p>啊撒发生地方</p><p><br/></p><p><img src=\"/Public/uploads/image/20170419/1492594856603735.jpg\" title=\"1492594856603735.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></p>', '0', '2017-04-19', '2017-04-19', 'admin', '/Uploads/default.png');
INSERT INTO `anc_cyclopedia` VALUES ('11', '古建技艺', '阿斯顿发送方', '<p><img src=\"/Public/uploads/image/20170419/1492598734628177.jpg\" title=\"1492598734628177.jpg\" alt=\"a71ea8d3fd1f413465fb8b3f221f95cad0c85ea7.jpg\"/></p>', '0', '2017-04-19', '', 'admin', '/Uploads/default.png');

-- ----------------------------
-- Table structure for anc_cyclopedia_type
-- ----------------------------
DROP TABLE IF EXISTS `anc_cyclopedia_type`;
CREATE TABLE `anc_cyclopedia_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_cyclopedia_type
-- ----------------------------
INSERT INTO `anc_cyclopedia_type` VALUES ('1', '古建文化');
INSERT INTO `anc_cyclopedia_type` VALUES ('2', '古建技艺');
INSERT INTO `anc_cyclopedia_type` VALUES ('3', '古建人物');
INSERT INTO `anc_cyclopedia_type` VALUES ('4', '古建风水');

-- ----------------------------
-- Table structure for anc_news
-- ----------------------------
DROP TABLE IF EXISTS `anc_news`;
CREATE TABLE `anc_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '1为古建动态法规，2为政策法规，3为古建观点，4为考古发现',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为未发布，1为已发布',
  `addtime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updatetime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mastermap` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/Uploads/default.png',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_news
-- ----------------------------
INSERT INTO `anc_news` VALUES ('15', 'admin', '考古发现', '2017西安古城三日游', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style=\"font-family: 宋体,SimSun; font-size: 18px;\">西安，古称</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E9%95%BF%E5%AE%89/31540\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">长安</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">、</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E9%95%90%E4%BA%AC\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">镐京</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">，</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E9%99%95%E8%A5%BF%E7%9C%81\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">陕西省</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">省会、</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E5%89%AF%E7%9C%81%E7%BA%A7%E5%B8%82\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">副省级市</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">、</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E5%9B%BD%E5%AE%B6%E5%8C%BA%E5%9F%9F%E4%B8%AD%E5%BF%83%E5%9F%8E%E5%B8%82\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">国家区域中心城市</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">（西北），是国务院批复确定的中国</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E8%A5%BF%E9%83%A8%E5%9C%B0%E5%8C%BA\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">西部地区</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">重要的中心城市，国家重要的科研、教育和工业基地，联合国科教文组织1981年确定的“</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E4%B8%96%E7%95%8C%E5%8E%86%E5%8F%B2%E5%90%8D%E5%9F%8E\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">世界历史名城</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">”。<sup>[1]</sup></span><a class=\"sup-anchor\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">&nbsp;</span></a></p><p><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">西安地处</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E5%85%B3%E4%B8%AD%E5%B9%B3%E5%8E%9F\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">关中平原</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">中部，北濒</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E6%B8%AD%E6%B2%B3\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">渭河</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">，南依</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E7%A7%A6%E5%B2%AD\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">秦岭</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">，八水润长安。全市下辖11区2县，<sup>[2]</sup></span><a class=\"sup-anchor\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">&nbsp;</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">总面积10108平方公里。2015年末常住人口870.56万，其中城镇人口635.68万，城镇化率72.61%。<sup>[3-4]</sup></span><a class=\"sup-anchor\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">&nbsp;</span></a></p><p><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">长安自古帝王都，其先后有西周、秦、西汉、新莽、西晋、前赵、前秦、后秦、西魏、北周、隋、唐13个王朝在西安地区建都。<sup>[5]</sup></span><a class=\"sup-anchor\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">&nbsp;</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">是中华文明和中华民族重要发祥地之一，</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E4%B8%9D%E7%BB%B8%E4%B9%8B%E8%B7%AF\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">丝绸之路</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">的起点。<sup>[6-7]</sup></span><a class=\"sup-anchor\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">&nbsp;</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">丰镐都城、秦阿房宫、兵马俑，汉</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E6%9C%AA%E5%A4%AE%E5%AE%AB/22415\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">未央宫</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">、</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E9%95%BF%E4%B9%90%E5%AE%AB/28229\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">长乐宫</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">，隋</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E5%A4%A7%E5%85%B4%E5%9F%8E\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">大兴城</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">，唐</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E5%A4%A7%E6%98%8E%E5%AE%AB/8061\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">大明宫</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">、</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E5%85%B4%E5%BA%86%E5%AE%AB\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">兴庆宫</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">等勾勒出“长安情结”。<sup>[8]</sup></span><a class=\"sup-anchor\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">&nbsp;</span></a></p><p><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">西安是中国最佳旅游目的地、</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E5%85%A8%E5%9B%BD%E6%96%87%E6%98%8E%E5%9F%8E%E5%B8%82\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">全国文明城市</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">之一<sup>[9]</sup></span><a class=\"sup-anchor\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">&nbsp;</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">，有两项六处遗产被列入《</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E4%B8%96%E7%95%8C%E9%81%97%E4%BA%A7%E5%90%8D%E5%BD%95\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">世界遗产名录</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">》，分别是：</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E7%A7%A6%E5%A7%8B%E7%9A%87%E9%99%B5\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">秦始皇陵</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">及</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E5%85%B5%E9%A9%AC%E4%BF%91\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">兵马俑</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">、</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E5%A4%A7%E9%9B%81%E5%A1%94\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">大雁塔</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">、</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E5%B0%8F%E9%9B%81%E5%A1%94\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">小雁塔</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">、</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E5%94%90%E9%95%BF%E5%AE%89%E5%9F%8E%E5%A4%A7%E6%98%8E%E5%AE%AB%E9%81%97%E5%9D%80\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">唐长安城大明宫遗址</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">、</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E6%B1%89%E9%95%BF%E5%AE%89%E5%9F%8E%E6%9C%AA%E5%A4%AE%E5%AE%AB%E9%81%97%E5%9D%80\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">汉长安城未央宫遗址</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">、</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E5%85%B4%E6%95%99%E5%AF%BA%E5%A1%94\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">兴教寺塔</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">。<sup>[10]</sup></span><a class=\"sup-anchor\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">&nbsp;</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">西安也是国家重要的科教中心，拥有</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E8%A5%BF%E5%AE%89%E4%BA%A4%E9%80%9A%E5%A4%A7%E5%AD%A6\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">西安交通大学</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">、</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E8%A5%BF%E5%8C%97%E5%B7%A5%E4%B8%9A%E5%A4%A7%E5%AD%A6\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">西北工业大学</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">、</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/%E8%A5%BF%E5%AE%89%E7%94%B5%E5%AD%90%E7%A7%91%E6%8A%80%E5%A4%A7%E5%AD%A6\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">西安电子科技大学</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">等7所985或</span><a target=\"_blank\" href=\"http://baike.baidu.com/item/211%E5%B7%A5%E7%A8%8B\" style=\"text-decoration: underline; font-family: 宋体,SimSun; font-size: 18px;\"><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">211工程</span></a><span style=\"font-family: 宋体,SimSun; font-size: 18px;\">类大学。</span></p><p><img src=\"/Public/uploads/image/20170419/1492583360535186.jpg\" title=\"1492583360535186.jpg\" alt=\"dbb44aed2e738bd4fc853c5ea68b87d6277ff93d.jpg\"/></p><p><br/></p>', '0', '2017-04-18', '', '/Uploads/default.png');
INSERT INTO `anc_news` VALUES ('14', 'admin', '古建观点', '爱的色放阿斯顿发啊', '<p><img src=\"/Public/uploads/image/20170419/1492580029867821.jpg\" title=\"1492580029867821.jpg\" alt=\"a71ea8d3fd1f413465fb8b3f221f95cad0c85ea7.jpg\"/></p><p><br/></p><p><br/></p><p>阿斯顿发生的发放萨芬的<br/></p>', '0', '2017-04-19', '', '/Uploads/default.png');
INSERT INTO `anc_news` VALUES ('13', 'admin', '古建动态', '阿斯顿发第三方方法2017', '&lt;p&gt;阿斯顿发&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/Public/uploads/image/20170419/1492572799100922.jpg&quot; title=&quot;1492572799100922.jpg&quot; alt=&quot;9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&amp;nbsp; 撒飞洒发顺丰&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/Public/uploads/image/20170419/1492572817877590.jpg&quot; title=&quot;1492572817877590.jpg&quot; alt=&quot;a71ea8d3fd1f413465fb8b3f221f95cad0c85ea7.jpg&quot;/&gt;&lt;/p&gt;&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p&gt;撒发生地方&lt;/p&gt;&lt;p&gt;&lt;img src=&quot;/Public/uploads/image/20170419/1492572832110036.jpg&quot; title=&quot;1492572832110036.jpg&quot; alt=&quot;9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg&quot;/&gt;&lt;/p&gt;', '0', '2017-04-19', '', '/Uploads/default.png');
INSERT INTO `anc_news` VALUES ('16', 'admin', '政策法规', '阿斯顿发送到', '<p>摩萨德两方面</p><p><img src=\"/Public/uploads/image/20170419/1492583443312539.png\" title=\"1492583443312539.png\" alt=\"QQ截图20170328103058.png\"/></p>', '0', '2017-04-19', '', '/Uploads/default.png');
INSERT INTO `anc_news` VALUES ('17', 'admin', '政策法规', '阿拉丁开房间', '<p>阿法斯蒂芬</p><p><img src=\"/Public/uploads/image/20170419/1492583742238180.jpg\" title=\"1492583742238180.jpg\"/></p><p><img src=\"/Public/uploads/image/20170419/1492583743762264.jpg\" title=\"1492583743762264.jpg\"/></p><p><br/></p>', '0', '2017-04-19', '', '/Uploads/default.png');
INSERT INTO `anc_news` VALUES ('20', 'admin', '政策法规', '撒旦法第三方', '<p>阿斯顿发地方</p><p><img src=\"/Public/uploads/image/20170419/1492585342678525.jpg\" title=\"1492585342678525.jpg\" alt=\"1.jpg\"/></p>', '0', '2017-04-19', '', '/Uploads/default.png');
INSERT INTO `anc_news` VALUES ('21', 'admin', '古建观点', '阿斯顿发生地方阿斯顿发', '<p>阿斯顿发生地方</p><p><br/></p><p><img src=\"/Public/uploads/image/20170419/1492589538125846.jpg\" title=\"1492589538125846.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></p>', '0', '2017-04-19', '', '/Uploads/2017-04-19/58f71c537377f.jpg');
INSERT INTO `anc_news` VALUES ('27', 'admin', '考古发现', '打发斯蒂芬', '<p>阿斯顿发送方</p><p><img src=\"/Public/uploads/image/20170419/1492591029118436.jpg\" title=\"1492591029118436.jpg\" alt=\"a71ea8d3fd1f413465fb8b3f221f95cad0c85ea7.jpg\"/></p>', '0', '2017-04-19', '2017-04-19', '/Uploads/2017-04-19/58f7270cac5b9.jpg');
INSERT INTO `anc_news` VALUES ('28', 'admin', '古建人物', '阿斯顿发到', '<p style=\"text-align: center;\"><strong>阿斯顿发送方空间</strong></p><p style=\"text-align: center;\"><strong><img src=\"/Public/uploads/image/20170419/1492594117132245.jpg\" title=\"1492594117132245.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></strong></p>', '0', '2017-04-19', '2017-04-19', '/Uploads/default.png');
INSERT INTO `anc_news` VALUES ('24', 'admin', '古建观点', '哈斯领导还爱的色放', '<p>洒大地风景<img src=\"/Public/uploads/image/20170419/1492584759115962.jpeg\" title=\"1492584759115962.jpeg\" alt=\"0e727ff7053df8243865c58dbc5cffab.jpeg\"/></p>', '0', '2017-04-17', '2017-04-19', '/Uploads/default.png');
INSERT INTO `anc_news` VALUES ('26', 'admin', '古建动态', '阿黄经理考核分卡拉胶', '<p>啊所发生的换句话</p><p><br/></p><p><img src=\"/Public/uploads/image/20170419/1492592325197042.jpg\" title=\"1492592325197042.jpg\" alt=\"a71ea8d3fd1f413465fb8b3f221f95cad0c85ea7.jpg\"/></p>', '0', '2017-04-19', '2017-04-19', '/Uploads/default.png');
INSERT INTO `anc_news` VALUES ('29', 'admin', '古建人物', '阿斯顿发到', '<p style=\"text-align: center;\"><strong>阿斯顿发送方空间</strong></p><p style=\"text-align: center;\"><strong><img src=\"/Public/uploads/image/20170419/1492594221112971.jpg\" title=\"1492594221112971.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></strong></p>', '0', '2017-04-19', '2017-04-19', '/Uploads/default.png');
INSERT INTO `anc_news` VALUES ('30', 'admin', '古建人物', '阿斯顿发到', '<p style=\"text-align: center;\"><strong>阿斯顿发送方空间</strong></p><p style=\"text-align: center;\"><strong><img src=\"/Public/uploads/image/20170419/1492594221112971.jpg\" title=\"1492594221112971.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></strong></p>', '0', '2017-04-19', '2017-04-19', '/Uploads/default.png');
INSERT INTO `anc_news` VALUES ('31', 'admin', '古建人物', '阿斯顿发到', '<p style=\"text-align: center;\"><strong>阿斯顿发送方空间</strong></p><p style=\"text-align: center;\"><strong><img src=\"/Public/uploads/image/20170419/1492594322394257.jpg\" title=\"1492594322394257.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></strong></p>', '0', '2017-04-19', '2017-04-19', '/Uploads/default.png');
INSERT INTO `anc_news` VALUES ('32', 'admin', '古建文化', '阿斯顿发地方', '<p style=\"text-align: center;\">阿斯顿发生地方地</p><p style=\"text-align: center;\">&nbsp;&nbsp;&nbsp;&nbsp; <img src=\"/Public/uploads/image/20170419/1492594422474382.jpg\" title=\"1492594422474382.jpg\" alt=\"a71ea8d3fd1f413465fb8b3f221f95cad0c85ea7.jpg\"/></p>', '0', '2017-04-19', '2017-04-19', '/Uploads/default.png');
INSERT INTO `anc_news` VALUES ('33', 'admin', '政策法规', '阿斯顿发第三方', '<p>阿斯顿发生地方</p><p><img src=\"/Public/uploads/image/20170419/1492598714842562.jpg\" title=\"1492598714842562.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></p>', '0', '2017-04-19', '', '/Uploads/default.png');

-- ----------------------------
-- Table structure for anc_news_type
-- ----------------------------
DROP TABLE IF EXISTS `anc_news_type`;
CREATE TABLE `anc_news_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_news_type
-- ----------------------------
INSERT INTO `anc_news_type` VALUES ('1', '古建动态');
INSERT INTO `anc_news_type` VALUES ('2', '政策法规');
INSERT INTO `anc_news_type` VALUES ('3', '古建观点');
INSERT INTO `anc_news_type` VALUES ('4', '考古发现');

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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
INSERT INTO `anc_node` VALUES ('11', '查看新闻', 'News', 'look');
INSERT INTO `anc_node` VALUES ('12', '浏览古建百科', 'Cyclopedia', 'index');
INSERT INTO `anc_node` VALUES ('13', '添加古建百科', 'Cyclopedia', 'add');
INSERT INTO `anc_node` VALUES ('14', '修改古建百科', 'Cyclopedia', 'edit');
INSERT INTO `anc_node` VALUES ('15', '删除古建百科', 'Cyclopedia', 'del');
INSERT INTO `anc_node` VALUES ('16', '查看古建百科', 'Cyclopedia', 'look');
INSERT INTO `anc_node` VALUES ('17', '显示与不显示百科', 'Cyclopedia', 'status');
INSERT INTO `anc_node` VALUES ('18', '浏览古建保护文章', 'Protect', 'index');
INSERT INTO `anc_node` VALUES ('19', '添加古建保护文章', 'Protect', 'add');
INSERT INTO `anc_node` VALUES ('20', '修改古建保护文章', 'Protect', 'edit');
INSERT INTO `anc_node` VALUES ('21', '删除古建保护文章', 'Protect', 'del');
INSERT INTO `anc_node` VALUES ('22', '显示与不显示古建保护文章', 'Protect', 'status');
INSERT INTO `anc_node` VALUES ('23', '查看古建保护文章', 'Protect', 'look');

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
-- Table structure for anc_protect
-- ----------------------------
DROP TABLE IF EXISTS `anc_protect`;
CREATE TABLE `anc_protect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0为未启用，1为已启用',
  `addtime` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `updatetime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `mastermap` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '/Uploads/default.png',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of anc_protect
-- ----------------------------
INSERT INTO `anc_protect` VALUES ('2', '撒的发货了', '<p>阿斯顿发生地方路口</p><p><img src=\"/Public/uploads/image/20170419/1492598009113410.jpg\" title=\"1492598009113410.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></p><p>阿斯顿浪费空间了<br/></p>', '1', '2017-04-19', '2017-04-19', 'admin', '/Uploads/default.png');
INSERT INTO `anc_protect` VALUES ('4', '阿斯顿发黑龙江了', '<p>发收到货了付款就好了<img src=\"/Public/uploads/image/20170419/1492598081124060.jpg\" title=\"1492598081124060.jpg\" alt=\"a71ea8d3fd1f413465fb8b3f221f95cad0c85ea7.jpg\"/></p>', '0', '2017-04-19', '2017-04-19', 'admin', '/Uploads/default.png');
INSERT INTO `anc_protect` VALUES ('6', '哈里斯的解放了', '<p>发哈斯两地分居</p><p>静安寺乐府；的</p><p><img src=\"/Public/uploads/image/20170419/1492598196119284.jpg\" title=\"1492598196119284.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></p>', '0', '2017-04-19', '2017-04-19', 'admin', '/Uploads/default.png');
INSERT INTO `anc_protect` VALUES ('9', '东方广场', '<p><img src=\"/Public/uploads/image/20170419/1492598514906335.jpg\" title=\"1492598514906335.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></p>', '0', '2017-04-19', '', 'admin', '/Uploads/default.png');
INSERT INTO `anc_protect` VALUES ('8', '地方公司打个', '<p>撒的发生<img src=\"/Public/uploads/image/20170419/1492598252138480.jpg\" title=\"1492598252138480.jpg\" alt=\"9c16fdfaaf51f3de7bc4372593eef01f3a297979.jpg\"/></p>', '0', '2017-04-19', '2017-04-19', 'admin', '/Uploads/default.png');
INSERT INTO `anc_protect` VALUES ('10', '阿斯顿发生', '<p><img src=\"/Public/uploads/image/20170419/1492598753376226.jpg\" title=\"1492598753376226.jpg\" alt=\"a71ea8d3fd1f413465fb8b3f221f95cad0c85ea7.jpg\"/></p>', '0', '2017-04-19', '', 'admin', '/Uploads/default.png');

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
INSERT INTO `anc_role_node` VALUES ('1', '11');
INSERT INTO `anc_role_node` VALUES ('2', '11');
INSERT INTO `anc_role_node` VALUES ('1', '12');
INSERT INTO `anc_role_node` VALUES ('1', '13');
INSERT INTO `anc_role_node` VALUES ('1', '14');
INSERT INTO `anc_role_node` VALUES ('1', '15');
INSERT INTO `anc_role_node` VALUES ('1', '16');
INSERT INTO `anc_role_node` VALUES ('2', '12');
INSERT INTO `anc_role_node` VALUES ('2', '13');
INSERT INTO `anc_role_node` VALUES ('2', '14');
INSERT INTO `anc_role_node` VALUES ('2', '15');
INSERT INTO `anc_role_node` VALUES ('2', '16');
INSERT INTO `anc_role_node` VALUES ('1', '17');
INSERT INTO `anc_role_node` VALUES ('2', '17');
INSERT INTO `anc_role_node` VALUES ('2', '18');
INSERT INTO `anc_role_node` VALUES ('2', '19');
INSERT INTO `anc_role_node` VALUES ('2', '20');
INSERT INTO `anc_role_node` VALUES ('2', '21');
INSERT INTO `anc_role_node` VALUES ('2', '22');
INSERT INTO `anc_role_node` VALUES ('1', '23');
INSERT INTO `anc_role_node` VALUES ('1', '18');
INSERT INTO `anc_role_node` VALUES ('1', '19');
INSERT INTO `anc_role_node` VALUES ('1', '20');
INSERT INTO `anc_role_node` VALUES ('1', '21');
INSERT INTO `anc_role_node` VALUES ('1', '22');
INSERT INTO `anc_role_node` VALUES ('2', '23');

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
INSERT INTO `anc_users` VALUES ('1', 'admin', '', 'e1bad86cef109cb56370fd7096b35094', '0', '2017-04-18 10:21:22', '2017-04-19 18:22:07', '1657', '0.0.0.0', '13');
INSERT INTO `anc_users` VALUES ('3', 'admin009', '', 'ea9a72a3be67972401694dcee48e78ea', '0', '2017-04-18 17:11:11', '2017-04-18 17:40:10', '8271', '0.0.0.0', '2');
INSERT INTO `anc_users` VALUES ('5', 'admin002', '', '7f6791e21c7317cb2f8bf9af0c5bd34b', '1', '2017-04-18 17:18:43', '2017-04-18 19:05:12', '5338', '0.0.0.0', '1');

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
