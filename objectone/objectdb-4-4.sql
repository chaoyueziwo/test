/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : objectdb

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-04 18:29:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ht_admin
-- ----------------------------
DROP TABLE IF EXISTS `ht_admin`;
CREATE TABLE `ht_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `username` varchar(30) NOT NULL COMMENT '管理员账号',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号',
  `password` varchar(32) NOT NULL COMMENT '管理员密码',
  `rulerId` int(11) NOT NULL COMMENT '角色id',
  `organizeId` int(11) NOT NULL COMMENT '组织id',
  `isLeader` int(1) NOT NULL DEFAULT '0' COMMENT '是否组长',
  `position` varchar(30) NOT NULL DEFAULT '' COMMENT '职位',
  `description` varchar(100) NOT NULL DEFAULT '' COMMENT '描述备注',
  `isActive` int(1) NOT NULL DEFAULT '1' COMMENT '是否启动，1：已经启动，0：禁止启动',
  `isDisabled` int(1) NOT NULL DEFAULT '0' COMMENT '是否启动，1：已删除，0：未删除',
  `addTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `loginTime` int(11) DEFAULT '0' COMMENT '登录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of ht_admin
-- ----------------------------
INSERT INTO `ht_admin` VALUES ('1', 'admin', '', 'e10adc3949ba59abbe56e057f20f883e', '1', '0', '0', '', '', '1', '0', '0', '0');
INSERT INTO `ht_admin` VALUES ('2', 'smile', '18898522698', 'e10adc3949ba59abbe56e057f20f883e', '0', '2', '0', '员工', '人事管理', '1', '0', '0', '0');
INSERT INTO `ht_admin` VALUES ('3', 'feifei', '15888895980', 'e10adc3949ba59abbe56e057f20f883e', '0', '2', '1', '主管', '行政部主管', '1', '0', '0', '0');
INSERT INTO `ht_admin` VALUES ('4', 'Angelababy', '18869875896', 'e10adc3949ba59abbe56e057f20f883e', '0', '2', '0', '员工', '行政部', '1', '0', '0', '0');
INSERT INTO `ht_admin` VALUES ('5', 'Sam', '18896858998', 'e10adc3949ba59abbe56e057f20f883e', '0', '6', '0', '财务', '财务', '1', '0', '0', '0');

-- ----------------------------
-- Table structure for ht_admin_groups
-- ----------------------------
DROP TABLE IF EXISTS `ht_admin_groups`;
CREATE TABLE `ht_admin_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adminId` int(11) NOT NULL DEFAULT '0' COMMENT '角色名称',
  `gId` int(11) NOT NULL DEFAULT '0' COMMENT '群组id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员群组表';

-- ----------------------------
-- Records of ht_admin_groups
-- ----------------------------

-- ----------------------------
-- Table structure for ht_admin_ruler
-- ----------------------------
DROP TABLE IF EXISTS `ht_admin_ruler`;
CREATE TABLE `ht_admin_ruler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '角色名称',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '角色父id',
  `content` text COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='角色管理表';

-- ----------------------------
-- Records of ht_admin_ruler
-- ----------------------------
INSERT INTO `ht_admin_ruler` VALUES ('1', '超级管理员', '0', null);
INSERT INTO `ht_admin_ruler` VALUES ('2', '行政部', '1', null);
INSERT INTO `ht_admin_ruler` VALUES ('3', '会计部', '1', null);
INSERT INTO `ht_admin_ruler` VALUES ('4', '组长1-1', '3', null);
INSERT INTO `ht_admin_ruler` VALUES ('5', '会计', '1', '是几点开会');

-- ----------------------------
-- Table structure for ht_groups
-- ----------------------------
DROP TABLE IF EXISTS `ht_groups`;
CREATE TABLE `ht_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '群组名称',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '群组父id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='群组管理表';

-- ----------------------------
-- Records of ht_groups
-- ----------------------------

-- ----------------------------
-- Table structure for ht_key_tasks
-- ----------------------------
DROP TABLE IF EXISTS `ht_key_tasks`;
CREATE TABLE `ht_key_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '任务键名称',
  `isShow` tinyint(1) DEFAULT '1' COMMENT '任务状态，1：启用；2：禁用',
  `description` varchar(100) NOT NULL DEFAULT '' COMMENT '描述备注',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='产品任务集合';

-- ----------------------------
-- Records of ht_key_tasks
-- ----------------------------
INSERT INTO `ht_key_tasks` VALUES ('1', '流程666', '1', 'fghdfghhhghgh');
INSERT INTO `ht_key_tasks` VALUES ('2', '流程二', '1', '');
INSERT INTO `ht_key_tasks` VALUES ('3', '流程3', '0', '');
INSERT INTO `ht_key_tasks` VALUES ('4', '流程4', '0', '');
INSERT INTO `ht_key_tasks` VALUES ('8', '禁用流程', '0', '禁用流程');
INSERT INTO `ht_key_tasks` VALUES ('9', '草稿s', '2', '草稿');
INSERT INTO `ht_key_tasks` VALUES ('10', '草稿2', '2', '草稿');
INSERT INTO `ht_key_tasks` VALUES ('11', '草稿4', '1', '草稿4');
INSERT INTO `ht_key_tasks` VALUES ('12', '草稿55', '1', '草稿5');
INSERT INTO `ht_key_tasks` VALUES ('13', '草稿6', '1', '草稿6');
INSERT INTO `ht_key_tasks` VALUES ('14', '流程7', '1', '流程7');
INSERT INTO `ht_key_tasks` VALUES ('15', '流程8', '1', '流程8');
INSERT INTO `ht_key_tasks` VALUES ('16', '流程', '1', '流程');

-- ----------------------------
-- Table structure for ht_lanmu_cebiantype
-- ----------------------------
DROP TABLE IF EXISTS `ht_lanmu_cebiantype`;
CREATE TABLE `ht_lanmu_cebiantype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名称',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `key` varchar(100) NOT NULL COMMENT '关键字',
  `pid` int(11) NOT NULL COMMENT '父栏目id',
  `isShow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示到导航',
  `url` varchar(50) DEFAULT NULL COMMENT '链接',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '显示排序',
  `content` text COMMENT '栏目简介',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='侧边导航栏';

-- ----------------------------
-- Records of ht_lanmu_cebiantype
-- ----------------------------
INSERT INTO `ht_lanmu_cebiantype` VALUES ('1', '公司服务', '公司服务', '公司服务', '0', '1', null, '1', '公司服务');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('2', '公司服务', '公司注册', '公司注册', '1', '1', null, '20', '公司服务');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('3', '公司变更　', '公司变更　', '公司变更　', '1', '1', null, '23', '公司变更　');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('4', '外贸公司', '外贸公司', '外贸公司', '1', '1', null, '33', '外贸公司');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('5', '会计服务', '会计服务', '会计服务', '0', '1', null, '222', '会计服务');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('6', '代理记账', '代理记账', '代理记账', '5', '1', null, '18', '代理记账');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('7', '财税代理', '财税代理', '财税代理', '5', '1', null, '101', '财税代理');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('8', '财税代理1', '财税代理', '财税代理', '5', '1', '', '11', '财税代理');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('9', 'test', 'test', 'test', '0', '1', '', '5', 'test');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('10', 'test1', 'test1', 'test1', '0', '1', '', '6', 'test1');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('11', 'test2', 'test2', 'test2', '0', '1', '', '7', 'test2');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('12', 'test3', 'test3', 'test3', '0', '0', '', '7', 'test3');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('13', 'test3', 'test3', 'test3', '0', '1', '', '2', 'test3');

-- ----------------------------
-- Table structure for ht_lanmu_type
-- ----------------------------
DROP TABLE IF EXISTS `ht_lanmu_type`;
CREATE TABLE `ht_lanmu_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名称',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `key` varchar(100) NOT NULL COMMENT '关键字',
  `pid` int(11) NOT NULL COMMENT '父栏目id',
  `isShow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否显示到导航',
  `url` varchar(50) NOT NULL DEFAULT '' COMMENT '链接',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '显示排序',
  `content` varchar(200) NOT NULL DEFAULT '' COMMENT '栏目简介',
  `isShowNavPic` tinyint(1) DEFAULT '0' COMMENT '是否在导航栏右上角显示hot图标',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='横向导航栏';

-- ----------------------------
-- Records of ht_lanmu_type
-- ----------------------------
INSERT INTO `ht_lanmu_type` VALUES ('1', '公司注册1', '公司注册', '公司注册', '0', '0', '', '1', '公司注册', '0');
INSERT INTO `ht_lanmu_type` VALUES ('9', '代理记账', '代理记账1', '代理记账1', '0', '0', '', '35', '代理记账1', '0');
INSERT INTO `ht_lanmu_type` VALUES ('10', '深圳公司', '深圳公司', '深圳公司', '9', '0', '', '46', '深圳公司', '0');
INSERT INTO `ht_lanmu_type` VALUES ('12', '海外公司', '海外公司', '海外公司', '1', '0', '', '24', '海外公司', '0');
INSERT INTO `ht_lanmu_type` VALUES ('13', '知识库', '知识库', '知识库', '0', '1', '', '57', '知识库', '1');
INSERT INTO `ht_lanmu_type` VALUES ('14', '注册公司', '注册公司', '注册公司', '0', '1', '', '6', '注册公司', '0');

-- ----------------------------
-- Table structure for ht_orders
-- ----------------------------
DROP TABLE IF EXISTS `ht_orders`;
CREATE TABLE `ht_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` varchar(30) NOT NULL DEFAULT '' COMMENT '订单id',
  `clientId` int(11) NOT NULL DEFAULT '0' COMMENT '客户id',
  `productId` int(11) NOT NULL DEFAULT '0' COMMENT '产品id',
  `valueId` int(11) NOT NULL DEFAULT '0' COMMENT '产品属性id',
  `regAreaInfo` varchar(50) NOT NULL COMMENT '注册地区信息',
  `payStatus` int(1) NOT NULL DEFAULT '0' COMMENT '支付类型:0:未支付；1:已支付；2：已退款',
  `orderStatus` int(1) NOT NULL DEFAULT '0' COMMENT '支付类型:0:待填写资料；1:已填写资料；2：完成；3：申请退单；4：已退单',
  `commentStatus` int(1) NOT NULL DEFAULT '0' COMMENT '评价状态:0:待评价；1:已评价',
  `payType` int(1) NOT NULL DEFAULT '0' COMMENT '支付类型:1:微信；2:支付宝',
  `payPrice` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '支付价格',
  `payedPrice` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '已付价格',
  `payDate` int(11) NOT NULL DEFAULT '0' COMMENT '支付日期',
  `addTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建日期',
  `couponId` int(11) NOT NULL DEFAULT '0' COMMENT '优惠券id',
  `isInvoice` int(2) NOT NULL DEFAULT '0' COMMENT '是否开发票，0：不开，1：开',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='订单表';

-- ----------------------------
-- Records of ht_orders
-- ----------------------------
INSERT INTO `ht_orders` VALUES ('3', 'H404325850884004', '2', '20', '189', '', '0', '0', '0', '0', '6999.00', '0.00', '0', '1522832585', '0', '0');
INSERT INTO `ht_orders` VALUES ('4', 'H404335642034020', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833564', '0', '0');
INSERT INTO `ht_orders` VALUES ('5', 'H404337146234033', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833714', '0', '0');
INSERT INTO `ht_orders` VALUES ('6', 'H404337428774051', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833742', '0', '0');
INSERT INTO `ht_orders` VALUES ('7', 'H404337433684004', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833743', '0', '0');
INSERT INTO `ht_orders` VALUES ('8', 'H404337641854044', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833764', '0', '0');
INSERT INTO `ht_orders` VALUES ('9', 'H404337740434029', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833774', '0', '0');
INSERT INTO `ht_orders` VALUES ('10', 'H404339080154001', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833908', '0', '0');
INSERT INTO `ht_orders` VALUES ('11', 'H404339094014024', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833909', '0', '0');
INSERT INTO `ht_orders` VALUES ('12', 'H404339103194019', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833910', '0', '0');
INSERT INTO `ht_orders` VALUES ('13', 'H404339109324057', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833910', '0', '0');
INSERT INTO `ht_orders` VALUES ('14', 'H404339115044074', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833911', '0', '0');
INSERT INTO `ht_orders` VALUES ('15', 'H404339120724091', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833912', '0', '0');
INSERT INTO `ht_orders` VALUES ('16', 'H404339127584010', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833912', '0', '0');
INSERT INTO `ht_orders` VALUES ('17', 'H404339338754059', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833933', '0', '0');
INSERT INTO `ht_orders` VALUES ('18', 'H404339760354020', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522833976', '0', '0');
INSERT INTO `ht_orders` VALUES ('19', 'H404340910434024', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834091', '0', '0');
INSERT INTO `ht_orders` VALUES ('20', 'H404340922964059', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834092', '0', '0');
INSERT INTO `ht_orders` VALUES ('21', 'H404343483274030', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834348', '0', '0');
INSERT INTO `ht_orders` VALUES ('22', 'H404343803944093', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834380', '0', '0');
INSERT INTO `ht_orders` VALUES ('23', 'H404343807544002', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834380', '0', '0');
INSERT INTO `ht_orders` VALUES ('24', 'H404343819094059', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834381', '0', '0');
INSERT INTO `ht_orders` VALUES ('25', 'H404343823164055', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834382', '0', '0');
INSERT INTO `ht_orders` VALUES ('26', 'H404343827014059', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834382', '0', '0');
INSERT INTO `ht_orders` VALUES ('27', 'H404343830694048', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834383', '0', '0');
INSERT INTO `ht_orders` VALUES ('28', 'H404343838684004', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834383', '0', '0');
INSERT INTO `ht_orders` VALUES ('29', 'H404343926774027', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834392', '0', '0');
INSERT INTO `ht_orders` VALUES ('30', 'H404343933174044', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834393', '0', '0');
INSERT INTO `ht_orders` VALUES ('31', 'H404343937454095', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834393', '0', '0');
INSERT INTO `ht_orders` VALUES ('32', 'H404343941664006', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834394', '0', '0');
INSERT INTO `ht_orders` VALUES ('33', 'H404343945584027', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834394', '0', '0');
INSERT INTO `ht_orders` VALUES ('34', 'H404343949334023', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834394', '0', '0');
INSERT INTO `ht_orders` VALUES ('35', 'H404344493174039', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834449', '0', '0');
INSERT INTO `ht_orders` VALUES ('36', 'H404344900094042', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834490', '0', '0');
INSERT INTO `ht_orders` VALUES ('37', 'H404344956044050', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834495', '0', '0');
INSERT INTO `ht_orders` VALUES ('38', 'H404346362904063', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834636', '0', '0');
INSERT INTO `ht_orders` VALUES ('39', 'H404346374084044', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834637', '0', '0');
INSERT INTO `ht_orders` VALUES ('40', 'H404346377784098', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834637', '0', '0');
INSERT INTO `ht_orders` VALUES ('41', 'H404347551754013', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834755', '0', '0');
INSERT INTO `ht_orders` VALUES ('42', 'H404348012974088', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834801', '0', '0');
INSERT INTO `ht_orders` VALUES ('43', 'H404348021794098', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834802', '0', '0');
INSERT INTO `ht_orders` VALUES ('44', 'H404349088024012', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834908', '0', '0');
INSERT INTO `ht_orders` VALUES ('45', 'H404349098854047', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834909', '0', '0');
INSERT INTO `ht_orders` VALUES ('46', 'H404349102864044', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834910', '0', '0');
INSERT INTO `ht_orders` VALUES ('47', 'H404349116554003', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834911', '0', '0');
INSERT INTO `ht_orders` VALUES ('48', 'H404349279384051', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834927', '0', '0');
INSERT INTO `ht_orders` VALUES ('49', 'H404349290844065', '2', '0', '0', '', '0', '0', '0', '0', '0.00', '0.00', '0', '1522834929', '0', '0');

-- ----------------------------
-- Table structure for ht_order_product
-- ----------------------------
DROP TABLE IF EXISTS `ht_order_product`;
CREATE TABLE `ht_order_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) NOT NULL DEFAULT '0' COMMENT '订单id',
  `companyName` varchar(50) NOT NULL DEFAULT '' COMMENT '公司名称',
  `companyRegAddr` varchar(50) NOT NULL DEFAULT '' COMMENT '公司注册地址',
  `regCapital` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '注册资本',
  `capitalContriType` int(2) NOT NULL DEFAULT '0' COMMENT '出资类型：1：章程规定的其他期限；2：一次性缴费；3：分期缴费',
  `empCategoryId` int(11) NOT NULL DEFAULT '0' COMMENT '行业类型id',
  `busineScopeId` int(11) NOT NULL DEFAULT '0' COMMENT '经验范围id,值为0时未选,等待联系',
  `legalRepresent` varchar(20) NOT NULL DEFAULT '' COMMENT '法定代表人姓名',
  `legalRepresentId` varchar(20) NOT NULL DEFAULT '' COMMENT '法定代表人身份证号',
  `financeCharger` varchar(20) NOT NULL DEFAULT '' COMMENT '财务代表人姓名',
  `financeChargerId` varchar(20) NOT NULL DEFAULT '' COMMENT '财务代表人身份证号',
  `taxOffer` varchar(20) NOT NULL DEFAULT '' COMMENT '办税人姓名',
  `taxOfferId` varchar(20) NOT NULL DEFAULT '' COMMENT '办税人身份证号',
  `corpWatcherNum` int(11) NOT NULL DEFAULT '0' COMMENT '监视人数量',
  `shareHolderNum` int(11) NOT NULL DEFAULT '0' COMMENT '股东数量',
  `acceptAddr` varchar(50) NOT NULL DEFAULT '' COMMENT '公司注册地址',
  `accAddrDetail` varchar(50) NOT NULL DEFAULT '' COMMENT '注册详细地址',
  `acceptorName` varchar(20) NOT NULL DEFAULT '' COMMENT '接受人姓名',
  `acceptorPhone` varchar(20) NOT NULL DEFAULT '' COMMENT '接收人手机号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单产品表';

-- ----------------------------
-- Records of ht_order_product
-- ----------------------------

-- ----------------------------
-- Table structure for ht_organize
-- ----------------------------
DROP TABLE IF EXISTS `ht_organize`;
CREATE TABLE `ht_organize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '组织名称',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '组织父id',
  `person` varchar(30) NOT NULL DEFAULT '' COMMENT '负责人',
  `description` varchar(100) NOT NULL DEFAULT '' COMMENT '备注描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='组织表';

-- ----------------------------
-- Records of ht_organize
-- ----------------------------
INSERT INTO `ht_organize` VALUES ('2', '董事长2', '0', 'admin', '老总');
INSERT INTO `ht_organize` VALUES ('3', '经理', '2', 'Angelababy', '经理');
INSERT INTO `ht_organize` VALUES ('4', '财务部', '3', 'Angelababy', '财务');
INSERT INTO `ht_organize` VALUES ('6', '财务组2', '4', 'Angelababy', '财务组1');

-- ----------------------------
-- Table structure for ht_product
-- ----------------------------
DROP TABLE IF EXISTS `ht_product`;
CREATE TABLE `ht_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '产品名称',
  `description` varchar(100) NOT NULL DEFAULT '' COMMENT '产品描述',
  `lable` varchar(100) NOT NULL COMMENT '产品标签',
  `seoTitle` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO标题',
  `seoKey` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO关键词',
  `seoDesc` varchar(100) NOT NULL DEFAULT '' COMMENT 'SEO描述',
  `price` decimal(30,0) NOT NULL COMMENT '价格',
  `bigPic` varchar(100) NOT NULL DEFAULT '' COMMENT '大图',
  `middlePic` varchar(100) NOT NULL DEFAULT '' COMMENT '中图',
  `smallPic` varchar(100) NOT NULL DEFAULT '' COMMENT '小图',
  `isShow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否启用地区,0:未启用；1：启用',
  `audit` tinyint(3) NOT NULL DEFAULT '0' COMMENT '是否审核，0：未审核；1：已审核；2：草稿',
  `taskId` int(11) NOT NULL COMMENT '任务流程ID',
  `tip` text COMMENT '温馨提示',
  `content` text COMMENT '产品简介',
  `pid` int(11) NOT NULL COMMENT '栏目ID',
  `orderedCount` int(11) NOT NULL DEFAULT '0' COMMENT '下单次数',
  `payedCount` int(11) NOT NULL DEFAULT '0' COMMENT '支付次数',
  `addTime` int(11) NOT NULL DEFAULT '0',
  `recommend` int(11) NOT NULL DEFAULT '0' COMMENT '推荐分九级由1至9排序0为不推荐',
  `top` int(11) NOT NULL DEFAULT '0' COMMENT '头条分九级由1至9排序0为不是头条',
  `overhead` int(11) NOT NULL DEFAULT '0' COMMENT '置顶分九级由1至9排序0为不置顶',
  `state` int(11) NOT NULL DEFAULT '0' COMMENT '状态0为不启用1为启用',
  `taskName` varchar(30) NOT NULL DEFAULT '' COMMENT '任务流程名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='产品表';

-- ----------------------------
-- Records of ht_product
-- ----------------------------
INSERT INTO `ht_product` VALUES ('10', '产品7', '产品7', '产品7', '产品7', '产品7', '产品7', '888', 'uploads/20180319/94dac8bbd2afd764c33eeeb69f84f38d.jpg', 'uploads/20180319/103c348f28b8148be03d8c18697c2e81.jpg', 'uploads/20180319/812066f77e6e3d220586016c503b94a6.jpg', '0', '0', '4', '产品7', '产品7', '2', '0', '0', '1521426418', '1', '1', '1', '1', '流程4');
INSERT INTO `ht_product` VALUES ('11', '产品8', '产品8', '产品8', '产品8', '产品8', '产品8', '8999', 'uploads/20180319/6bdc5ad345a98f923d3c6c8859931675.jpg', 'uploads/20180319/f360354cc1fdf197bc4be01eb0212a2f.jpg', 'uploads/20180319/002acc43eb6c2c3e2289aa47189b75dc.jpg', '0', '0', '15', '产品8', '产品8', '2', '0', '0', '1521450198', '1', '3', '7', '1', '流程8');
INSERT INTO `ht_product` VALUES ('12', '停用产品', '停用产品', '停用产品', '停用产品', '停用产品', '停用产品', '8999', 'uploads/20180320/6c2206f10c25fa986c2f044536c7b5a6.jpg', 'uploads/20180320/996eb34fed1730290ee0b206411e8765.jpg', 'uploads/20180320/820ef961fc8c60d4f7818709e4992302.jpg', '0', '2', '2', '停用产品', '停用产品', '2', '0', '0', '1521507027', '9', '9', '9', '0', '流程二');
INSERT INTO `ht_product` VALUES ('13', '草稿产品', '草稿产品', '草稿产品', '草稿产品', '草稿产品', '草稿产品', '6888', 'uploads/20180320/35019e581635edd6943b3ee7232e135b.jpg', 'uploads/20180320/4c1731879277921a1aa681679e1a07e4.jpg', 'uploads/20180320/810cc1abb984adc301330d29dc9847c5.jpg', '1', '2', '13', '草稿产品', '草稿产品', '2', '0', '0', '1521512950', '8', '8', '9', '0', '草稿6');
INSERT INTO `ht_product` VALUES ('14', '香港注册公司', '香港注册公司', '香港注册公司', '香港注册公司', '香港注册公司', '香港注册公司', '6666', 'uploads/20180321/424a937e235077feff35f4be24a58d80.jpg', 'uploads/20180321/4b746ee39c5de1e2512977f61952ef42.jpg', 'uploads/20180321/dccd26adffd42c5b3896b75f33d3cca1.jpg', '0', '0', '2', '香港注册公司', '香港注册公司', '2', '0', '0', '1521594814', '1', '1', '0', '1', '流程二');
INSERT INTO `ht_product` VALUES ('15', '产品7', '产品7', '产品7', '产品7', '产品7', '产品7', '6666', 'uploads/20180322/53ffb8a3b4efe18e9033ab72d26991c6.jpg', 'uploads/20180322/e512331b9fb9e098903f5d1472fb6ff2.jpg', 'uploads/20180322/48761f9a65f839d3cf2729cd310d2b59.jpg', '0', '1', '2', '产品7产品7', '产品7产品7', '2', '0', '0', '1522723253', '7', '2', '6', '0', '流程二');
INSERT INTO `ht_product` VALUES ('16', '产品9', '产品9', '产品9', '产品9', '产品9', '产品9', '88888', 'uploads/20180323/daf5273d8e7c6fb4b1597cac07167fc4.jpg', 'uploads/20180323/a02db8e6dd8298398e79373ada5f1fd9.jpg', 'uploads/20180323/590a7dca9959591fcbb97d26c72994ff.jpg', '0', '1', '2', '产品9', '产品9', '2', '0', '0', '1521767571', '7', '2', '6', '1', '流程二');
INSERT INTO `ht_product` VALUES ('17', '产品98', '产品98', '产品98', '产品98', '产品98', '产品98', '0', 'uploads/20180323/027b083bb4032c428469d988359c515e.jpg', 'uploads/20180323/1000876bef0d68412533c887f1ccc5e1.jpg', 'uploads/20180323/e155f27b673ff0fd2659ce0823bea3c5.jpg', '0', '0', '1', '产品98', '产品98', '2', '0', '0', '1521783168', '0', '0', '0', '1', '流程666');
INSERT INTO `ht_product` VALUES ('18', '新产品', '新产品', '新产品', '新产品', '新产品', '新产品', '8888', 'uploads/20180326/6b87bb1b35bacd098e30adb86c081ade.jpg', 'uploads/20180326/64d54361af260a4b994465f8bb1c8965.jpg', 'uploads/20180326/9e953c4cf3723d7becbeed07868d4c7c.jpg', '0', '0', '2', '新产品', '新产品', '2', '0', '0', '1522044712', '1', '1', '1', '1', '流程二');
INSERT INTO `ht_product` VALUES ('19', '新产品', '新产品', '新产品', '新产品', '新产品', '新产品', '899', 'uploads/20180326/30c29a57772f3a7c1c8683ba01d087e6.jpg', 'uploads/20180326/f6c9dbe206c5ad6d95df8643842d4c1f.jpg', 'uploads/20180326/d72638b9c20b2ec62d1c2869f418124e.jpg', '0', '1', '2', '新产品', '新产品', '2', '0', '0', '1522045561', '2', '1', '0', '1', '流程二');
INSERT INTO `ht_product` VALUES ('20', '测试产品', '测试产品', '测试产品', '测试产品', '测试产品', '测试产品', '8999', 'uploads/20180329/3054d91a6af7310b54add91235dee4ab.jpg', 'uploads/20180329/ca967728ff0fc31e0cfd19cded220c44.jpg', 'uploads/20180329/4a42a7e1bb2b280443198f20c44d0266.jpg', '0', '1', '1', '测试产品', '测试产品', '2', '0', '0', '1522292673', '0', '0', '0', '1', '流程666');

-- ----------------------------
-- Table structure for ht_product_flow
-- ----------------------------
DROP TABLE IF EXISTS `ht_product_flow`;
CREATE TABLE `ht_product_flow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT '产品的ID',
  `title` text COMMENT '产品流程标题',
  `content` text COMMENT '产品流程内容',
  `addTime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `sort` int(11) NOT NULL DEFAULT '100' COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='产品办理流程表';

-- ----------------------------
-- Records of ht_product_flow
-- ----------------------------
INSERT INTO `ht_product_flow` VALUES ('5', '14', '领取执照刻制公章', '<ul class=\"pag-ul\" style=\"color:#333333;font-family:Tahoma, 微软雅黑, ', '1521617761', '100');
INSERT INTO `ht_product_flow` VALUES ('6', '14', '领取执照刻制公章', '<ul class=\"pag-ul\" style=\"color:#333333;font-family:Tahoma, 微软雅黑, ', '1521618691', '100');
INSERT INTO `ht_product_flow` VALUES ('7', '14', '技术的价格和', '的房间卡会框架撒娇快点恢复健康', '1521625500', '100');
INSERT INTO `ht_product_flow` VALUES ('8', '14', '黄金时代', '大家哈看手机号', '1521625952', '100');
INSERT INTO `ht_product_flow` VALUES ('21', '15', '非法打工的就', '发的是法国', '1521709807', '99');
INSERT INTO `ht_product_flow` VALUES ('23', '15', '对方答复', '地方干撒的的法国是', '1521686848', '101');
INSERT INTO `ht_product_flow` VALUES ('24', '15', '的方式GV都是v', '的发生改变v', '1521686858', '101');
INSERT INTO `ht_product_flow` VALUES ('25', '15', '地方GV现场v', '大师傅GV都是GV吧', '1521686868', '103');
INSERT INTO `ht_product_flow` VALUES ('26', '15', '好哥哥', '带饭', '1521709823', '100');
INSERT INTO `ht_product_flow` VALUES ('27', '16', '的空间发挥', '对方就考虑将', '1521768204', '100');
INSERT INTO `ht_product_flow` VALUES ('28', '17', '红色的高房价', '<p>\n	打法国风格和你发的\n</p>\n<p>\n	的方式GV带饭\n</p>', '1521788335', '100');
INSERT INTO `ht_product_flow` VALUES ('29', '19', '红色的环境', '<p>\n	的设计开发成圣诞节快回家看\n</p>\n<p>\n	到货时间会发出\n</p>', '1522045465', '100');
INSERT INTO `ht_product_flow` VALUES ('30', '19', '速度发货', '<p>\n	山东会计啊回复看\n</p>\n<p>\n	加快速度会尽快发\n</p>', '1522045477', '100');
INSERT INTO `ht_product_flow` VALUES ('31', '16', '合法的', '急急急', '1522228014', '100');
INSERT INTO `ht_product_flow` VALUES ('32', '16', '他还会给', '突然突然让他', '1522228720', '101');
INSERT INTO `ht_product_flow` VALUES ('33', '20', 'helloworld', 'helloworld', '1522292831', '100');

-- ----------------------------
-- Table structure for ht_product_property
-- ----------------------------
DROP TABLE IF EXISTS `ht_product_property`;
CREATE TABLE `ht_product_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名称',
  `pid` int(11) DEFAULT NULL COMMENT '父级ID',
  `isShow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否启用',
  `addTime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `sort` int(11) NOT NULL DEFAULT '100' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=utf8 COMMENT='产品属性表';

-- ----------------------------
-- Records of ht_product_property
-- ----------------------------
INSERT INTO `ht_product_property` VALUES ('2', '选项1', '3', '1', '0', '100');
INSERT INTO `ht_product_property` VALUES ('3', '选项2', '3', '1', '0', '100');
INSERT INTO `ht_product_property` VALUES ('4', '选项2', '1', '1', '0', '100');
INSERT INTO `ht_product_property` VALUES ('6', '选项3', '1', '1', '1517794814', '100');
INSERT INTO `ht_product_property` VALUES ('7', '选项1', '4', '1', '1521018614', '100');
INSERT INTO `ht_product_property` VALUES ('8', '选项2', '4', '1', '1521018762', '100');
INSERT INTO `ht_product_property` VALUES ('9', '选项8', '5', '1', '1521093940', '100');
INSERT INTO `ht_product_property` VALUES ('10', '选项88', '5', '1', '1521093976', '100');
INSERT INTO `ht_product_property` VALUES ('11', '尺码', '6', '1', '1521107655', '100');
INSERT INTO `ht_product_property` VALUES ('12', '颜色', '6', '1', '1521107765', '100');
INSERT INTO `ht_product_property` VALUES ('13', '颜色', '7', '1', '1521109193', '100');
INSERT INTO `ht_product_property` VALUES ('14', '颜色', '8', '1', '1521110353', '100');
INSERT INTO `ht_product_property` VALUES ('15', '尺码', '8', '1', '1521110696', '100');
INSERT INTO `ht_product_property` VALUES ('16', '颜色', '1', '1', '1521189693', '100');
INSERT INTO `ht_product_property` VALUES ('17', '颜色', '2', '1', '1521190585', '100');
INSERT INTO `ht_product_property` VALUES ('18', '尺码', '2', '1', '1521190633', '100');
INSERT INTO `ht_product_property` VALUES ('19', '风格', '2', '1', '1521191403', '100');
INSERT INTO `ht_product_property` VALUES ('20', '颜色', '9', '1', '1521425655', '100');
INSERT INTO `ht_product_property` VALUES ('21', '尺码', '9', '1', '1521425670', '100');
INSERT INTO `ht_product_property` VALUES ('22', '颜色', '10', '1', '1521426435', '100');
INSERT INTO `ht_product_property` VALUES ('23', '尺码', '10', '1', '1521426461', '100');
INSERT INTO `ht_product_property` VALUES ('48', '颜色', '11', '1', '1521458518', '100');
INSERT INTO `ht_product_property` VALUES ('49', '尺码', '11', '1', '1521459804', '100');
INSERT INTO `ht_product_property` VALUES ('50', '颜色', '12', '1', '1521507105', '100');
INSERT INTO `ht_product_property` VALUES ('51', '尺码', '12', '1', '1521508955', '100');
INSERT INTO `ht_product_property` VALUES ('88', '颜色', '13', '1', '1521540506', '100');
INSERT INTO `ht_product_property` VALUES ('90', '尺码', '13', '1', '1521541538', '100');
INSERT INTO `ht_product_property` VALUES ('91', '颜色类', '14', '1', '1521594853', '100');
INSERT INTO `ht_product_property` VALUES ('92', '尺码', '14', '1', '1521595051', '100');
INSERT INTO `ht_product_property` VALUES ('93', '颜色', '15', '1', '1521679077', '100');
INSERT INTO `ht_product_property` VALUES ('94', '尺码', '15', '1', '1521679186', '100');
INSERT INTO `ht_product_property` VALUES ('95', '颜色', '16', '1', '1521768028', '100');
INSERT INTO `ht_product_property` VALUES ('96', '尺码', '16', '1', '1521768085', '100');
INSERT INTO `ht_product_property` VALUES ('98', '颜色', '17', '1', '1521783177', '100');
INSERT INTO `ht_product_property` VALUES ('103', '尺码', '17', '1', '1521786382', '100');
INSERT INTO `ht_product_property` VALUES ('104', '类别', '17', '1', '1521786453', '100');
INSERT INTO `ht_product_property` VALUES ('105', '颜色', '19', '1', '1522045286', '100');
INSERT INTO `ht_product_property` VALUES ('106', '尺码', '19', '1', '1522045324', '100');
INSERT INTO `ht_product_property` VALUES ('107', '分类', '15', '1', '1522199181', '100');
INSERT INTO `ht_product_property` VALUES ('108', '颜色', '20', '1', '1522292687', '100');
INSERT INTO `ht_product_property` VALUES ('109', '尺码', '20', '1', '1522292715', '100');

-- ----------------------------
-- Table structure for ht_product_serve
-- ----------------------------
DROP TABLE IF EXISTS `ht_product_serve`;
CREATE TABLE `ht_product_serve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL COMMENT '产品的ID',
  `content` text COMMENT '产品服务介绍',
  `attention` text COMMENT '产品注意事项',
  `addTime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='产品服务介绍表';

-- ----------------------------
-- Records of ht_product_serve
-- ----------------------------
INSERT INTO `ht_product_serve` VALUES ('1', '15', '<p>\n	<img src=\"/juhui/objectone/public/static/kindeditor/php/../attached/image/20180322/20180322070744_43714.jpg\" alt=\"\" /> \n</p>\n<p>\n	<img src=\"/juhui/objectone/public/static/kindeditor/php/../attached/image/20180322/20180322070816_41585.jpg\" alt=\"\" /> \n</p>\n<p>\n	<img src=\"/juhui/objectone/public/static/kindeditor/php/../attached/image/20180322/20180322070902_55016.jpg\" alt=\"\" /> \n</p>', '<p>\n	的手机号\n</p>\n<p>\n	大华股份\n</p>\n<p>\n	电视开机后查看了\n</p>', '1522033223');
INSERT INTO `ht_product_serve` VALUES ('2', '16', '<p>\n	<img src=\"/juhui/objectone/public/static/kindeditor/php/../attached/image/20180323/20180323012340_42527.jpg\" alt=\"\" />\n</p>\n<p>\n	<img src=\"/juhui/objectone/public/static/kindeditor/php/../attached/image/20180323/20180323012354_43848.jpg\" alt=\"\" />\n</p>', '<p>\n	djhifdskm\n</p>\n<p>\n	觉得手机卡号\n</p>', '1521768246');
INSERT INTO `ht_product_serve` VALUES ('3', '17', '<p>\n	<img src=\"/juhui/objectone/public/static/kindeditor/php/../attached/image/20180323/20180323065910_85212.jpg\" alt=\"\" />\n</p>\n<p>\n	hello\n</p>\n<p>\n	<img src=\"/juhui/objectone/public/static/kindeditor/php/../attached/image/20180323/20180323065933_65274.jpg\" alt=\"\" />\n</p>', '<p>\n	电视剧\n</p>\n<p>\n	电视剧\n</p>', '1521788403');
INSERT INTO `ht_product_serve` VALUES ('4', '19', '<p>\n	<img src=\"/juhui/objectone/public/static/kindeditor/php/../attached/image/20180326/20180326062456_19824.jpg\" alt=\"\" />\n</p>\n<p>\n	还是个\n</p>\n<p>\n	<img src=\"/juhui/objectone/public/static/kindeditor/php/../attached/image/20180326/20180326062526_25441.jpg\" alt=\"\" />\n</p>', '<p>\n	说的话估计\n</p>\n<p>\n	的收款机返回\n</p>', '1522045545');
INSERT INTO `ht_product_serve` VALUES ('5', '20', 'hello world', 'helloworld', '1522292847');

-- ----------------------------
-- Table structure for ht_product_tasks
-- ----------------------------
DROP TABLE IF EXISTS `ht_product_tasks`;
CREATE TABLE `ht_product_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '名称',
  `isshow` tinyint(1) DEFAULT '1' COMMENT '任务状态',
  `typeId` int(11) NOT NULL DEFAULT '0' COMMENT '任务类型ID',
  `typeName` varchar(30) NOT NULL DEFAULT '0' COMMENT '类型名称',
  `rulerId` int(11) NOT NULL DEFAULT '0' COMMENT '部门ID',
  `rulerName` varchar(30) NOT NULL DEFAULT '0' COMMENT '角色名称或部门名称',
  `addTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `productId` int(11) NOT NULL DEFAULT '0' COMMENT '产品ID',
  `adminId` int(11) NOT NULL DEFAULT '0' COMMENT '管理员ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='产品任务流程表';

-- ----------------------------
-- Records of ht_product_tasks
-- ----------------------------

-- ----------------------------
-- Table structure for ht_product_value
-- ----------------------------
DROP TABLE IF EXISTS `ht_product_value`;
CREATE TABLE `ht_product_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名称',
  `sid` int(11) DEFAULT NULL COMMENT '父级ID',
  `isShow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否启用',
  `sort` int(11) NOT NULL DEFAULT '100' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=190 DEFAULT CHARSET=utf8 COMMENT='产品属性值表';

-- ----------------------------
-- Records of ht_product_value
-- ----------------------------
INSERT INTO `ht_product_value` VALUES ('1', '值1', '2', '1', '100');
INSERT INTO `ht_product_value` VALUES ('2', '值2', '2', '1', '100');
INSERT INTO `ht_product_value` VALUES ('3', '值3', '2', '1', '100');
INSERT INTO `ht_product_value` VALUES ('4', '值1', '3', '1', '100');
INSERT INTO `ht_product_value` VALUES ('5', '值2', '3', '1', '100');
INSERT INTO `ht_product_value` VALUES ('6', '值3', '3', '1', '100');
INSERT INTO `ht_product_value` VALUES ('7', '值1', '1', '1', '100');
INSERT INTO `ht_product_value` VALUES ('8', '值2', '1', '1', '100');
INSERT INTO `ht_product_value` VALUES ('9', '值3', '1', '1', '100');
INSERT INTO `ht_product_value` VALUES ('10', '值1', '4', '1', '100');
INSERT INTO `ht_product_value` VALUES ('11', '值2', '4', '1', '100');
INSERT INTO `ht_product_value` VALUES ('12', '值3', '4', '1', '100');
INSERT INTO `ht_product_value` VALUES ('13', '值1', '6', '1', '100');
INSERT INTO `ht_product_value` VALUES ('14', '值2', '6', '1', '100');
INSERT INTO `ht_product_value` VALUES ('15', '值1', '8', '1', '100');
INSERT INTO `ht_product_value` VALUES ('16', '值2', '8', '1', '100');
INSERT INTO `ht_product_value` VALUES ('17', '值3', '8', '1', '100');
INSERT INTO `ht_product_value` VALUES ('18', '值4', '7', '1', '100');
INSERT INTO `ht_product_value` VALUES ('19', '值5', '7', '1', '100');
INSERT INTO `ht_product_value` VALUES ('20', '红', '10', '1', '100');
INSERT INTO `ht_product_value` VALUES ('21', '黄', '10', '1', '100');
INSERT INTO `ht_product_value` VALUES ('22', '蓝', '10', '1', '100');
INSERT INTO `ht_product_value` VALUES ('23', 'm', '9', '1', '100');
INSERT INTO `ht_product_value` VALUES ('24', 'l', '10', '1', '100');
INSERT INTO `ht_product_value` VALUES ('25', 'xl', '10', '1', '100');
INSERT INTO `ht_product_value` VALUES ('26', 'xl', '9', '1', '100');
INSERT INTO `ht_product_value` VALUES ('27', 'l', '9', '1', '100');
INSERT INTO `ht_product_value` VALUES ('28', 'm', '11', '1', '100');
INSERT INTO `ht_product_value` VALUES ('29', 'l', '11', '1', '100');
INSERT INTO `ht_product_value` VALUES ('30', 'xl', '11', '1', '100');
INSERT INTO `ht_product_value` VALUES ('31', '红色', '12', '1', '100');
INSERT INTO `ht_product_value` VALUES ('32', '黄色', '12', '1', '100');
INSERT INTO `ht_product_value` VALUES ('33', '红色', '13', '1', '100');
INSERT INTO `ht_product_value` VALUES ('34', '蓝色', '13', '1', '100');
INSERT INTO `ht_product_value` VALUES ('35', '绿色', '13', '1', '100');
INSERT INTO `ht_product_value` VALUES ('36', '红色', '14', '1', '100');
INSERT INTO `ht_product_value` VALUES ('37', 'l', '15', '1', '100');
INSERT INTO `ht_product_value` VALUES ('38', 'lui', '14', '1', '100');
INSERT INTO `ht_product_value` VALUES ('39', '红色', '16', '1', '100');
INSERT INTO `ht_product_value` VALUES ('40', '红色', '17', '1', '100');
INSERT INTO `ht_product_value` VALUES ('41', '白色', '17', '1', '100');
INSERT INTO `ht_product_value` VALUES ('42', '灰色', '17', '1', '100');
INSERT INTO `ht_product_value` VALUES ('43', 'M', '18', '1', '100');
INSERT INTO `ht_product_value` VALUES ('44', 'L', '18', '1', '100');
INSERT INTO `ht_product_value` VALUES ('45', 'XL', '18', '1', '100');
INSERT INTO `ht_product_value` VALUES ('46', '风格1', '19', '1', '100');
INSERT INTO `ht_product_value` VALUES ('47', '风格2', '19', '1', '100');
INSERT INTO `ht_product_value` VALUES ('48', 'xxl', '18', '1', '100');
INSERT INTO `ht_product_value` VALUES ('49', 'xxxl', '19', '1', '100');
INSERT INTO `ht_product_value` VALUES ('50', 'xxxxxl', '19', '1', '100');
INSERT INTO `ht_product_value` VALUES ('51', 'xxxxl', '18', '1', '100');
INSERT INTO `ht_product_value` VALUES ('52', 'llllll', '18', '1', '100');
INSERT INTO `ht_product_value` VALUES ('53', '', '12', '1', '100');
INSERT INTO `ht_product_value` VALUES ('54', '', '15', '1', '100');
INSERT INTO `ht_product_value` VALUES ('55', 'L', '21', '1', '100');
INSERT INTO `ht_product_value` VALUES ('56', 'M', '21', '1', '100');
INSERT INTO `ht_product_value` VALUES ('57', 'XL', '21', '1', '100');
INSERT INTO `ht_product_value` VALUES ('58', '红色', '20', '1', '100');
INSERT INTO `ht_product_value` VALUES ('59', '绿色', '20', '1', '100');
INSERT INTO `ht_product_value` VALUES ('60', '红色', '22', '1', '100');
INSERT INTO `ht_product_value` VALUES ('61', '黄色', '22', '1', '100');
INSERT INTO `ht_product_value` VALUES ('62', 'M', '23', '1', '100');
INSERT INTO `ht_product_value` VALUES ('63', 'L', '23', '1', '100');
INSERT INTO `ht_product_value` VALUES ('64', 'XL', '23', '1', '100');
INSERT INTO `ht_product_value` VALUES ('75', '红色', '47', '0', '100');
INSERT INTO `ht_product_value` VALUES ('76', '黄色', '47', '0', '100');
INSERT INTO `ht_product_value` VALUES ('77', '红色', '48', '1', '100');
INSERT INTO `ht_product_value` VALUES ('78', '黄色', '48', '1', '100');
INSERT INTO `ht_product_value` VALUES ('79', 'M', '49', '1', '100');
INSERT INTO `ht_product_value` VALUES ('80', 'L', '49', '1', '100');
INSERT INTO `ht_product_value` VALUES ('81', '红色', '50', '1', '100');
INSERT INTO `ht_product_value` VALUES ('82', '黄色', '50', '1', '100');
INSERT INTO `ht_product_value` VALUES ('83', '绿色', '50', '1', '100');
INSERT INTO `ht_product_value` VALUES ('84', '红色', '52', '1', '100');
INSERT INTO `ht_product_value` VALUES ('85', '橙色', '52', '1', '100');
INSERT INTO `ht_product_value` VALUES ('86', 'M', '53', '1', '100');
INSERT INTO `ht_product_value` VALUES ('87', 'X', '53', '1', '100');
INSERT INTO `ht_product_value` VALUES ('88', 'XL', '53', '1', '100');
INSERT INTO `ht_product_value` VALUES ('146', '红色', '87', '1', '100');
INSERT INTO `ht_product_value` VALUES ('147', '橙色', '87', '1', '100');
INSERT INTO `ht_product_value` VALUES ('148', '红色', '88', '1', '100');
INSERT INTO `ht_product_value` VALUES ('149', '橙色', '88', '1', '100');
INSERT INTO `ht_product_value` VALUES ('150', 'M', '89', '1', '100');
INSERT INTO `ht_product_value` VALUES ('151', 'L', '89', '1', '100');
INSERT INTO `ht_product_value` VALUES ('152', 'L', '90', '0', '100');
INSERT INTO `ht_product_value` VALUES ('153', 'M', '90', '1', '100');
INSERT INTO `ht_product_value` VALUES ('154', '红色类', '91', '1', '100');
INSERT INTO `ht_product_value` VALUES ('155', '橙色', '91', '1', '100');
INSERT INTO `ht_product_value` VALUES ('156', 'M', '92', '1', '100');
INSERT INTO `ht_product_value` VALUES ('157', 'L', '92', '1', '100');
INSERT INTO `ht_product_value` VALUES ('158', 'XL', '92', '1', '100');
INSERT INTO `ht_product_value` VALUES ('160', '黄色', '93', '1', '100');
INSERT INTO `ht_product_value` VALUES ('161', 'A', '94', '1', '100');
INSERT INTO `ht_product_value` VALUES ('162', 'L', '94', '1', '101');
INSERT INTO `ht_product_value` VALUES ('163', '红色', '95', '1', '100');
INSERT INTO `ht_product_value` VALUES ('164', '黄色', '95', '1', '100');
INSERT INTO `ht_product_value` VALUES ('165', 'L', '96', '1', '100');
INSERT INTO `ht_product_value` VALUES ('166', 'M', '96', '1', '100');
INSERT INTO `ht_product_value` VALUES ('167', '红色', '98', '1', '100');
INSERT INTO `ht_product_value` VALUES ('168', '对方是个', '101', '1', '100');
INSERT INTO `ht_product_value` VALUES ('169', 'M', '103', '1', '100');
INSERT INTO `ht_product_value` VALUES ('170', '类别1', '104', '1', '100');
INSERT INTO `ht_product_value` VALUES ('178', '红色', '105', '1', '100');
INSERT INTO `ht_product_value` VALUES ('179', '蓝色', '105', '1', '100');
INSERT INTO `ht_product_value` VALUES ('180', 'L', '106', '1', '100');
INSERT INTO `ht_product_value` VALUES ('181', 'M', '106', '1', '100');
INSERT INTO `ht_product_value` VALUES ('182', 'XL', '94', '1', '100');
INSERT INTO `ht_product_value` VALUES ('183', '分类', '107', '1', '100');
INSERT INTO `ht_product_value` VALUES ('184', 'gerr', '95', '1', '100');
INSERT INTO `ht_product_value` VALUES ('185', '红色', '108', '1', '100');
INSERT INTO `ht_product_value` VALUES ('186', '白色', '108', '1', '100');
INSERT INTO `ht_product_value` VALUES ('187', 'M', '109', '1', '100');
INSERT INTO `ht_product_value` VALUES ('188', 'L', '109', '1', '100');
INSERT INTO `ht_product_value` VALUES ('189', 'XL', '109', '1', '100');

-- ----------------------------
-- Table structure for ht_property_price
-- ----------------------------
DROP TABLE IF EXISTS `ht_property_price`;
CREATE TABLE `ht_property_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` int(11) DEFAULT NULL COMMENT '属性ID',
  `price` varchar(30) DEFAULT NULL COMMENT '价格',
  `productId` int(11) NOT NULL DEFAULT '0' COMMENT '产品id',
  `keyId` varchar(50) NOT NULL DEFAULT '' COMMENT '拆分组合价格ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COMMENT='产品属性价格表';

-- ----------------------------
-- Records of ht_property_price
-- ----------------------------
INSERT INTO `ht_property_price` VALUES ('2', '62', '2888', '0', '');
INSERT INTO `ht_property_price` VALUES ('3', '61', '3666', '0', '');
INSERT INTO `ht_property_price` VALUES ('4', '53', '5288', '0', '');
INSERT INTO `ht_property_price` VALUES ('5', '52', '6666', '0', '');
INSERT INTO `ht_property_price` VALUES ('6', '51', '7888', '0', '');
INSERT INTO `ht_property_price` VALUES ('7', '43', '8888', '0', '');
INSERT INTO `ht_property_price` VALUES ('8', '42', '99999', '0', '');
INSERT INTO `ht_property_price` VALUES ('9', '41', '9888', '0', '');
INSERT INTO `ht_property_price` VALUES ('10', '128', '6666', '0', '');
INSERT INTO `ht_property_price` VALUES ('11', '127', '888888', '0', '');
INSERT INTO `ht_property_price` VALUES ('12', '128', '6666', '0', '');
INSERT INTO `ht_property_price` VALUES ('13', '118', '789', '0', '');
INSERT INTO `ht_property_price` VALUES ('14', '118', '997', '0', '');
INSERT INTO `ht_property_price` VALUES ('15', '117', '789', '0', '');
INSERT INTO `ht_property_price` VALUES ('16', '1719', '6666', '0', '');
INSERT INTO `ht_property_price` VALUES ('17', '1718', '8888', '0', '');
INSERT INTO `ht_property_price` VALUES ('18', '1619', '899', '0', '');
INSERT INTO `ht_property_price` VALUES ('19', '1618', '9888', '0', '');
INSERT INTO `ht_property_price` VALUES ('20', '1519', '88899', '0', '');
INSERT INTO `ht_property_price` VALUES ('21', '1518', '7888', '0', '');
INSERT INTO `ht_property_price` VALUES ('22', '3230', '1145', '0', '');
INSERT INTO `ht_property_price` VALUES ('23', '391312', '6888', '0', '');
INSERT INTO `ht_property_price` VALUES ('24', '391311', '9888', '0', '');
INSERT INTO `ht_property_price` VALUES ('25', '4541', '6666', '0', '');
INSERT INTO `ht_property_price` VALUES ('26', '4540', '6866', '0', '');
INSERT INTO `ht_property_price` VALUES ('27', '4441', '5588', '0', '');
INSERT INTO `ht_property_price` VALUES ('28', '4440', '9999', '0', '');
INSERT INTO `ht_property_price` VALUES ('29', '5758', '988', '0', '');
INSERT INTO `ht_property_price` VALUES ('30', '5658', '899', '0', '');
INSERT INTO `ht_property_price` VALUES ('31', '6460', '699', '0', '');
INSERT INTO `ht_property_price` VALUES ('32', '6260', '899', '0', '');
INSERT INTO `ht_property_price` VALUES ('33', '158154', '6888', '0', '');
INSERT INTO `ht_property_price` VALUES ('34', '157154', '8999', '0', '');
INSERT INTO `ht_property_price` VALUES ('35', '158154', '1999', '0', '');
INSERT INTO `ht_property_price` VALUES ('36', '157154', '1889', '0', '');
INSERT INTO `ht_property_price` VALUES ('37', '162160', '6666', '0', '');
INSERT INTO `ht_property_price` VALUES ('38', '162160', '12', '0', '');
INSERT INTO `ht_property_price` VALUES ('39', '166163', '8888', '0', '');
INSERT INTO `ht_property_price` VALUES ('40', '170169167', '888', '0', '');
INSERT INTO `ht_property_price` VALUES ('41', '181179', '888', '0', '');
INSERT INTO `ht_property_price` VALUES ('42', '181178', '5999', '0', '');
INSERT INTO `ht_property_price` VALUES ('43', '180179', '6888', '0', '');
INSERT INTO `ht_property_price` VALUES ('44', '180178', '899', '0', '');
INSERT INTO `ht_property_price` VALUES ('45', '183182160', '5454', '0', '');
INSERT INTO `ht_property_price` VALUES ('46', '183162160', '5899', '0', '');
INSERT INTO `ht_property_price` VALUES ('47', '183182160', '54', '0', '');
INSERT INTO `ht_property_price` VALUES ('48', '183182160', '888', '0', '');
INSERT INTO `ht_property_price` VALUES ('49', '166164', '4546', '0', '');
INSERT INTO `ht_property_price` VALUES ('50', '166163', '8888', '0', '');
INSERT INTO `ht_property_price` VALUES ('51', '165164', '1222', '0', '');
INSERT INTO `ht_property_price` VALUES ('52', '165184', '111111', '0', '');
INSERT INTO `ht_property_price` VALUES ('53', '165164', '5555', '0', '');
INSERT INTO `ht_property_price` VALUES ('54', '166164', '111111', '0', '');
INSERT INTO `ht_property_price` VALUES ('55', '166184', '111222', '0', '');
INSERT INTO `ht_property_price` VALUES ('56', '166164', '45', '0', '');
INSERT INTO `ht_property_price` VALUES ('57', '166164', '666', '0', '');
INSERT INTO `ht_property_price` VALUES ('58', null, '8888', '0', '');
INSERT INTO `ht_property_price` VALUES ('59', '184166', '454545', '0', '');
INSERT INTO `ht_property_price` VALUES ('60', '165184', '5555', '0', '');
INSERT INTO `ht_property_price` VALUES ('61', '2147483647', '3333', '0', '');
INSERT INTO `ht_property_price` VALUES ('62', '184165', '9999', '0', '');
INSERT INTO `ht_property_price` VALUES ('63', '184166', '111111$productId=16', '0', '');
INSERT INTO `ht_property_price` VALUES ('64', '184165', '888', '16', '');
INSERT INTO `ht_property_price` VALUES ('65', '184166', '8888', '16', '');
INSERT INTO `ht_property_price` VALUES ('66', '189185', '6999', '20', '');
INSERT INTO `ht_property_price` VALUES ('67', '188185', '8999', '20', '');
INSERT INTO `ht_property_price` VALUES ('68', '189186', '5555', '20', '');
INSERT INTO `ht_property_price` VALUES ('69', '189186', '555555', '20', '');
INSERT INTO `ht_property_price` VALUES ('70', '189186', '666', '20', '');
INSERT INTO `ht_property_price` VALUES ('71', '189185', '2888', '20', '$vids|$vids1|$vids2');
INSERT INTO `ht_property_price` VALUES ('72', '188186', '555', '20', '188|186|undefined');
INSERT INTO `ht_property_price` VALUES ('73', '187186', '999', '20', '187|186');
INSERT INTO `ht_property_price` VALUES ('74', '181179', '222', '19', '');
INSERT INTO `ht_property_price` VALUES ('75', '180179', '1111', '19', '');

-- ----------------------------
-- Table structure for ht_section_type
-- ----------------------------
DROP TABLE IF EXISTS `ht_section_type`;
CREATE TABLE `ht_section_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '????',
  `title` varchar(100) NOT NULL COMMENT '????',
  `gjz` varchar(100) NOT NULL COMMENT '?ؼ???',
  `paixu` int(11) DEFAULT NULL COMMENT '??ʾ????',
  `content` text COMMENT '???ż???',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='???ŷ??;

-- ----------------------------
-- Records of ht_section_type
-- ----------------------------
INSERT INTO `ht_section_type` VALUES ('1', '财务部', '财务部', '财务部', '1', '财务部');
INSERT INTO `ht_section_type` VALUES ('2', '企划部', '企划部', '企划部', '1', '企划部');

-- ----------------------------
-- Table structure for ht_share_holders
-- ----------------------------
DROP TABLE IF EXISTS `ht_share_holders`;
CREATE TABLE `ht_share_holders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) NOT NULL DEFAULT '0' COMMENT '订单id',
  `sex` int(2) NOT NULL DEFAULT '0' COMMENT '性别，1：男；2；女',
  `holderAttr` int(2) NOT NULL DEFAULT '0' COMMENT '股东属性，1：自然人。。。。。',
  `holderName` varchar(20) NOT NULL DEFAULT '' COMMENT '股东姓名',
  `idType` int(1) NOT NULL DEFAULT '1' COMMENT '身份类型，1：股东身份证号；2：社会企业统一型号代码',
  `holderId` varchar(20) NOT NULL DEFAULT '' COMMENT '股东身份证号or社会企业统一型号代码',
  `capitalAmount` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '出资金额',
  `adminDiv` varchar(40) NOT NULL DEFAULT '' COMMENT '身份证行政区划',
  `idAddr` varchar(40) NOT NULL DEFAULT '' COMMENT '身份证地址',
  `mobilePhone` varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  `fixPhone` varchar(30) NOT NULL DEFAULT '' COMMENT '固定电话',
  `mail` varchar(30) NOT NULL DEFAULT '' COMMENT '邮箱',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='股东表';

-- ----------------------------
-- Records of ht_share_holders
-- ----------------------------

-- ----------------------------
-- Table structure for ht_shop_cart
-- ----------------------------
DROP TABLE IF EXISTS `ht_shop_cart`;
CREATE TABLE `ht_shop_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车ID',
  `userId` int(11) NOT NULL COMMENT '用户d',
  `productId` int(11) NOT NULL COMMENT '产品id',
  `proQuantity` int(11) NOT NULL DEFAULT '1' COMMENT '产品数量',
  `isInvoice` int(2) NOT NULL DEFAULT '0' COMMENT '是否开发票，0：不开，1：开',
  `addTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `price` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '购买价格',
  `attrId` varchar(50) NOT NULL COMMENT '获取属性id相对应的价格',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='购物车表';

-- ----------------------------
-- Records of ht_shop_cart
-- ----------------------------
INSERT INTO `ht_shop_cart` VALUES ('21', '2', '20', '1', '1', '1522827155', '5555.00', '189,186');
INSERT INTO `ht_shop_cart` VALUES ('22', '2', '20', '1', '1', '1522827345', '8999.00', '188,185');
INSERT INTO `ht_shop_cart` VALUES ('24', '2', '20', '1', '1', '1522827793', '555.00', '188,186');
INSERT INTO `ht_shop_cart` VALUES ('25', '2', '20', '1', '1', '1522832277', '6999.00', '189,185');

-- ----------------------------
-- Table structure for ht_tasks
-- ----------------------------
DROP TABLE IF EXISTS `ht_tasks`;
CREATE TABLE `ht_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '名称',
  `isShow` tinyint(1) NOT NULL DEFAULT '1' COMMENT '任务状态',
  `typeId` int(11) NOT NULL DEFAULT '0' COMMENT '任务类型ID',
  `typeName` varchar(30) NOT NULL DEFAULT '0' COMMENT '类型名称',
  `rulerId` int(11) NOT NULL DEFAULT '0' COMMENT '部门ID',
  `rulerName` varchar(30) NOT NULL DEFAULT '0' COMMENT '角色名称或部门名称',
  `addTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '显示排序：降序',
  `content` varchar(20) DEFAULT NULL,
  `keyId` int(11) NOT NULL COMMENT '流程ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='任务流程表';

-- ----------------------------
-- Records of ht_tasks
-- ----------------------------
INSERT INTO `ht_tasks` VALUES ('2', '任务二', '1', '1', '0', '3', '0', '1519970098', '0', null, '0');
INSERT INTO `ht_tasks` VALUES ('3', '任务一', '1', '1', '0', '2', '0', '1519970187', '0', null, '0');
INSERT INTO `ht_tasks` VALUES ('4', '任务一', '1', '2', '0', '6', '0', '1520412568', '0', '收账', '5');
INSERT INTO `ht_tasks` VALUES ('5', '任务二', '1', '1', '0', '6', '0', '1520412645', '0', '收款', '5');
INSERT INTO `ht_tasks` VALUES ('6', '任务4', '0', '2', '0', '6', '0', '1520474292', '0', '对帐', '6');
INSERT INTO `ht_tasks` VALUES ('7', '任务55', '1', '2', '0', '4', '0', '1520479133', '0', '收账', '6');
INSERT INTO `ht_tasks` VALUES ('8', '任务7', '0', '2', '0', '4', '0', '1520488394', '0', '财务', '6');
INSERT INTO `ht_tasks` VALUES ('9', '任务8', '0', '1', '0', '2', '0', '1520488360', '0', '财务', '6');
INSERT INTO `ht_tasks` VALUES ('10', '啊啊', '0', '2', '0', '6', '0', '1520490051', '0', '额头也让他把', '6');
INSERT INTO `ht_tasks` VALUES ('11', '草稿任务1', '1', '1', '0', '4', '0', '1520588938', '0', '草稿任务1', '7');
INSERT INTO `ht_tasks` VALUES ('12', '草稿任务2', '1', '2', '0', '4', '0', '1520588956', '0', '草稿任务2', '7');
INSERT INTO `ht_tasks` VALUES ('13', '禁用任务1', '1', '2', '0', '4', '0', '1520590120', '0', '禁用任务1', '8');
INSERT INTO `ht_tasks` VALUES ('14', '禁用任务2', '1', '2', '0', '4', '0', '1520590137', '0', '禁用任务1', '8');
INSERT INTO `ht_tasks` VALUES ('15', '禁用任务3', '1', '2', '0', '6', '0', '1520590163', '0', '禁用任务3', '8');
INSERT INTO `ht_tasks` VALUES ('16', '禁用任务4', '1', '2', '0', '6', '0', '1520590187', '0', '禁用任务1', '8');
INSERT INTO `ht_tasks` VALUES ('17', '草搞1', '1', '2', '0', '6', '0', '1520590761', '0', '草搞1', '9');
INSERT INTO `ht_tasks` VALUES ('18', '草稿2', '1', '2', '0', '6', '0', '1520590802', '0', '草搞1', '9');
INSERT INTO `ht_tasks` VALUES ('19', '草稿3', '0', '1', '0', '2', '0', '1521160710', '0', '草稿3', '9');
INSERT INTO `ht_tasks` VALUES ('20', '草稿4', '0', '2', '0', '6', '0', '1520591143', '0', '草稿4', '9');
INSERT INTO `ht_tasks` VALUES ('21', '草稿任务一', '1', '2', '0', '4', '0', '1521013101', '0', '草稿任务一', '10');
INSERT INTO `ht_tasks` VALUES ('22', '草稿任务2', '1', '2', '0', '6', '0', '1521013127', '0', '草稿任务2', '10');
INSERT INTO `ht_tasks` VALUES ('23', '草稿4', '1', '2', '0', '6', '0', '1521015356', '0', '草稿4', '11');
INSERT INTO `ht_tasks` VALUES ('24', '草稿5', '0', '1', '0', '2', '0', '1521103431', '0', '草稿5', '12');
INSERT INTO `ht_tasks` VALUES ('25', '草稿5', '1', '2', '0', '6', '0', '1521017537', '0', '草稿6', '13');
INSERT INTO `ht_tasks` VALUES ('26', '草稿6', '1', '2', '0', '6', '0', '1521017549', '0', '草稿6', '13');
INSERT INTO `ht_tasks` VALUES ('27', '任务1', '1', '1', '0', '2', '0', '1521086035', '0', '任务1', '15');
INSERT INTO `ht_tasks` VALUES ('28', '草稿55', '1', '1', '0', '2', '0', '1521103277', '0', '草稿55', '12');
INSERT INTO `ht_tasks` VALUES ('29', 'ghghjg', '1', '1', '0', '2', '0', '1521165760', '0', 'fghdf', '1');
INSERT INTO `ht_tasks` VALUES ('30', 'ghhhg', '1', '2', '0', '4', '0', '1521165788', '0', 'ghghnhg', '1');

-- ----------------------------
-- Table structure for ht_task_type
-- ----------------------------
DROP TABLE IF EXISTS `ht_task_type`;
CREATE TABLE `ht_task_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名称',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `key` varchar(100) NOT NULL COMMENT '关键字',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '显示排序：降序',
  `content` text COMMENT '任务简介',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='任务类型';

-- ----------------------------
-- Records of ht_task_type
-- ----------------------------
INSERT INTO `ht_task_type` VALUES ('1', '任务类别1', '任务类别1', '任务类别1', '2', '任务类别1');
INSERT INTO `ht_task_type` VALUES ('2', '任务类别2', '任务类别2', '任务类别2', '1', '任务类别2');

-- ----------------------------
-- Table structure for ht_userinfo
-- ----------------------------
DROP TABLE IF EXISTS `ht_userinfo`;
CREATE TABLE `ht_userinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `memberId` varchar(20) NOT NULL DEFAULT '' COMMENT '会员id',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号',
  `mail` varchar(20) NOT NULL DEFAULT '' COMMENT '邮箱',
  `nickname` varchar(20) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(40) NOT NULL DEFAULT '' COMMENT '密码',
  `addTime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='用户信息';

-- ----------------------------
-- Records of ht_userinfo
-- ----------------------------
INSERT INTO `ht_userinfo` VALUES ('1', '', '18890575892', '1523698@qq.com', 'heoll', '1234567', '1522029886');
INSERT INTO `ht_userinfo` VALUES ('2', '', '15112597375', '1589@qq.com', 'test', '71b3b26aaa319e0cdf6fdb8429c112b0', '1522649862');

-- ----------------------------
-- Table structure for ht_watchers
-- ----------------------------
DROP TABLE IF EXISTS `ht_watchers`;
CREATE TABLE `ht_watchers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) NOT NULL DEFAULT '0' COMMENT '订单id',
  `watcherName` varchar(20) NOT NULL DEFAULT '' COMMENT '监视人姓名',
  `watcherId` varchar(20) NOT NULL DEFAULT '' COMMENT '监视人身份证号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='监视人表';

-- ----------------------------
-- Records of ht_watchers
-- ----------------------------
