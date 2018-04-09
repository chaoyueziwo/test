/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : objectdb

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-02-08 12:53:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ht_admin
-- ----------------------------
DROP TABLE IF EXISTS `ht_admin`;
CREATE TABLE `ht_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `username` varchar(30) NOT NULL COMMENT '管理员账号',
  `password` varchar(32) NOT NULL COMMENT '管理员密码',
  `rulerId` int(11) NOT NULL COMMENT '角色id',
  `isLeader` int(11) NOT NULL DEFAULT '0' COMMENT '是否组长',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `logintime` int(11) DEFAULT '0' COMMENT '登录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of ht_admin
-- ----------------------------
INSERT INTO `ht_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', '0', '0', '0');

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
-- Table structure for ht_fuwu_type
-- ----------------------------
DROP TABLE IF EXISTS `ht_fuwu_type`;
CREATE TABLE `ht_fuwu_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '????',
  `title` varchar(100) NOT NULL COMMENT '????',
  `gjz` varchar(100) NOT NULL COMMENT '?ؼ???',
  `paixu` int(11) DEFAULT NULL COMMENT '??ʾ????',
  `content` text COMMENT '????????',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='???????????ͱ;

-- ----------------------------
-- Records of ht_fuwu_type
-- ----------------------------
INSERT INTO `ht_fuwu_type` VALUES ('1', '服务类型一', '服务类型一', '服务类型一', '1', '服务类型一');
INSERT INTO `ht_fuwu_type` VALUES ('2', '服务类型二', '服务类型二', '服务类型二', '2', '服务类型二');

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
  `ptaskId` int(11) NOT NULL DEFAULT '0' COMMENT '部门ID',
  `isshow` tinyint(1) DEFAULT '1' COMMENT '任务状态，1：启用；2：禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='产品任务集合';

-- ----------------------------
-- Records of ht_key_tasks
-- ----------------------------
INSERT INTO `ht_key_tasks` VALUES ('2', '流程一1', '1', '1');
INSERT INTO `ht_key_tasks` VALUES ('4', '流程三', '1', '1');

-- ----------------------------
-- Table structure for ht_lanmu_cebiantype
-- ----------------------------
DROP TABLE IF EXISTS `ht_lanmu_cebiantype`;
CREATE TABLE `ht_lanmu_cebiantype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名称',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `gjz` varchar(100) NOT NULL COMMENT '关键字',
  `fid` int(11) NOT NULL,
  `isshow` tinyint(1) DEFAULT '1' COMMENT '是否显示到导航',
  `url` varchar(50) DEFAULT NULL COMMENT '链接',
  `paixu` int(11) DEFAULT NULL COMMENT '显示排序',
  `content` text COMMENT '栏目简介',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='侧边导航栏';

-- ----------------------------
-- Records of ht_lanmu_cebiantype
-- ----------------------------
INSERT INTO `ht_lanmu_cebiantype` VALUES ('1', '公司服务', '公司服务', '公司服务', '0', '1', null, '1', '公司服务');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('2', '公司服务', '公司注册', '公司注册', '1', '1', null, '1', '公司服务');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('3', '公司变更　', '公司变更　', '公司变更　', '1', '1', null, '2', '公司变更　');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('4', '外贸公司', '外贸公司', '外贸公司', '1', '1', null, '3', '外贸公司');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('5', '会计服务', '会计服务', '会计服务', '0', '1', null, '2', '会计服务');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('6', '代理记账', '代理记账', '代理记账', '5', '1', null, '1', '代理记账');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('7', '财税代理', '财税代理', '财税代理', '5', '1', null, '4', '财税代理');
INSERT INTO `ht_lanmu_cebiantype` VALUES ('8', '财税代理', '财税代理', '财税代理', '5', '1', null, '4', '财税代理');

-- ----------------------------
-- Table structure for ht_lanmu_type
-- ----------------------------
DROP TABLE IF EXISTS `ht_lanmu_type`;
CREATE TABLE `ht_lanmu_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名称',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `gjz` varchar(100) NOT NULL COMMENT '关键字',
  `fid` int(11) NOT NULL,
  `isshow` tinyint(1) DEFAULT '1' COMMENT '是否显示到导航',
  `url` varchar(50) DEFAULT NULL COMMENT '链接',
  `paixu` int(11) DEFAULT NULL COMMENT '显示排序',
  `content` text COMMENT '栏目简介',
  `sfxstp` tinyint(1) DEFAULT '0' COMMENT '是否显示到导航图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='横向导航栏';

-- ----------------------------
-- Records of ht_lanmu_type
-- ----------------------------
INSERT INTO `ht_lanmu_type` VALUES ('1', '公司注册', '公司注册', '公司注册', '0', '1', '', '1', '公司注册', '0');
INSERT INTO `ht_lanmu_type` VALUES ('2', '代理记账', '代理记账', '代理记账', '0', '1', '', '0', '代理记账', '0');
INSERT INTO `ht_lanmu_type` VALUES ('3', '商标申请', '商标申请', '商标申请', '0', '1', '', '3', '商标申请', '0');

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
  `regAreaInfo` varchar(50) NOT NULL DEFAULT '' COMMENT '注册地区信息',
  `payType` int(1) NOT NULL DEFAULT '0' COMMENT '支付类型:1:微信；2:支付宝',
  `payStatus` int(1) NOT NULL DEFAULT '0' COMMENT '支付类型:0:未支付；2:已支付；3：已退款',
  `payPrice` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '支付价格',
  `payedPrice` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '已付价格',
  `payDate` int(11) NOT NULL DEFAULT '0' COMMENT '支付日期',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '创建日期',
  `couponId` int(11) NOT NULL DEFAULT '0' COMMENT '优惠券id',
  `isInvoice` int(2) NOT NULL DEFAULT '0' COMMENT '是否开发票，0：不开，1：开',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表';

-- ----------------------------
-- Records of ht_orders
-- ----------------------------

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
-- Table structure for ht_product
-- ----------------------------
DROP TABLE IF EXISTS `ht_product`;
CREATE TABLE `ht_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '产品名称',
  `miaoshu` varchar(100) NOT NULL COMMENT '产品描述',
  `biaoqian` varchar(100) NOT NULL COMMENT '产品标签',
  `seotitle` varchar(100) NOT NULL COMMENT 'SEO标题',
  `seogjc` varchar(100) NOT NULL COMMENT 'SEO关键词',
  `seoms` varchar(100) NOT NULL COMMENT 'SEO描述',
  `price` varchar(30) DEFAULT NULL COMMENT '价格',
  `image` varchar(100) NOT NULL COMMENT '图片',
  `isshow` tinyint(1) DEFAULT '1' COMMENT '是否启用地区,0:未启用；1：启用',
  `audit` tinyint(3) DEFAULT '0' COMMENT '是否审核，0：未审核；1：已审核；2：草稿',
  `taskId` int(11) NOT NULL COMMENT '任务流程ID',
  `tishi` text NOT NULL COMMENT '温馨提示',
  `content` text COMMENT '产品简介',
  `pid` int(11) DEFAULT NULL COMMENT '栏目ID',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='产品表';

-- ----------------------------
-- Records of ht_product
-- ----------------------------
INSERT INTO `ht_product` VALUES ('1', '产品1-1', '产品1', '产品1', '产品1', '产品1', '产品1', '99988', 'uploads/20180202/58ef3c751dd9c5993edab61b10001d82.jpg', '1', '1', '1', '产品1', '产品1', '2', '1517796125');
INSERT INTO `ht_product` VALUES ('2', '产品2', '产品2', '产品2', '产品2', '产品2', '产品2', '8888', 'uploads/20180202/aa484277c72fb995449e54e4f5efd8aa.jpg', '1', '1', '1', '产品2', '产品2', '2', '1517570709');
INSERT INTO `ht_product` VALUES ('3', '产品3', '产品3', '产品3', '产品3', '产品3', '产品3', '898', 'uploads/20180203/c7d9cd5ad596e5ef7e7b220e9e21a225.jpg', '1', '1', '1', '产品3', '产品3', '2', '1517624720');

-- ----------------------------
-- Table structure for ht_product_property
-- ----------------------------
DROP TABLE IF EXISTS `ht_product_property`;
CREATE TABLE `ht_product_property` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名称',
  `pid` int(11) DEFAULT NULL COMMENT '父级ID',
  `isshow` tinyint(1) DEFAULT '0' COMMENT '是否启用',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='产品属性表';

-- ----------------------------
-- Records of ht_product_property
-- ----------------------------
INSERT INTO `ht_product_property` VALUES ('2', '选项1', '3', '1', null);
INSERT INTO `ht_product_property` VALUES ('3', '选项2', '3', '1', null);
INSERT INTO `ht_product_property` VALUES ('4', '选项2', '1', '1', null);
INSERT INTO `ht_product_property` VALUES ('6', '选项3', '1', '1', '1517794814');

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
  `isshow` tinyint(1) DEFAULT '0' COMMENT '是否启用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='产品属性值表';

-- ----------------------------
-- Records of ht_product_value
-- ----------------------------
INSERT INTO `ht_product_value` VALUES ('1', '值1', '2', '1');
INSERT INTO `ht_product_value` VALUES ('2', '值2', '2', '1');
INSERT INTO `ht_product_value` VALUES ('3', '值3', '2', '1');
INSERT INTO `ht_product_value` VALUES ('4', '值1', '3', '1');
INSERT INTO `ht_product_value` VALUES ('5', '值2', '3', '1');
INSERT INTO `ht_product_value` VALUES ('6', '值3', '3', '1');
INSERT INTO `ht_product_value` VALUES ('7', '值1', '1', '1');
INSERT INTO `ht_product_value` VALUES ('8', '值2', '1', '1');
INSERT INTO `ht_product_value` VALUES ('9', '值3', '1', '1');
INSERT INTO `ht_product_value` VALUES ('10', '值1', '4', '1');
INSERT INTO `ht_product_value` VALUES ('11', '值2', '4', '1');
INSERT INTO `ht_product_value` VALUES ('12', '值3', '4', '1');
INSERT INTO `ht_product_value` VALUES ('13', '值1', '6', '1');
INSERT INTO `ht_product_value` VALUES ('14', '值2', '6', '1');

-- ----------------------------
-- Table structure for ht_property_price
-- ----------------------------
DROP TABLE IF EXISTS `ht_property_price`;
CREATE TABLE `ht_property_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` int(11) DEFAULT NULL COMMENT '属性ID',
  `price` varchar(30) DEFAULT NULL COMMENT '价格',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='产品属性价格表';

-- ----------------------------
-- Records of ht_property_price
-- ----------------------------
INSERT INTO `ht_property_price` VALUES ('2', '62', '2888');
INSERT INTO `ht_property_price` VALUES ('3', '61', '3666');
INSERT INTO `ht_property_price` VALUES ('4', '53', '5288');
INSERT INTO `ht_property_price` VALUES ('5', '52', '6666');
INSERT INTO `ht_property_price` VALUES ('6', '51', '7888');
INSERT INTO `ht_property_price` VALUES ('7', '43', '8888');
INSERT INTO `ht_property_price` VALUES ('8', '42', '99999');
INSERT INTO `ht_property_price` VALUES ('9', '41', '9888');
INSERT INTO `ht_property_price` VALUES ('10', '128', '6666');
INSERT INTO `ht_property_price` VALUES ('11', '127', '888888');
INSERT INTO `ht_property_price` VALUES ('12', '128', '6666');
INSERT INTO `ht_property_price` VALUES ('13', '118', '789');
INSERT INTO `ht_property_price` VALUES ('14', '118', '997');
INSERT INTO `ht_property_price` VALUES ('15', '117', '789');

-- ----------------------------
-- Table structure for ht_renwu
-- ----------------------------
DROP TABLE IF EXISTS `ht_renwu`;
CREATE TABLE `ht_renwu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '????????',
  `fuwuid` int(11) NOT NULL,
  `zhuangtai` int(11) NOT NULL DEFAULT '1' COMMENT '״̬',
  `rewuname` varchar(100) NOT NULL COMMENT '????????',
  `renwuzhuangtai` varchar(100) NOT NULL COMMENT '????״̬',
  `addtime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='???????̱;

-- ----------------------------
-- Records of ht_renwu
-- ----------------------------
INSERT INTO `ht_renwu` VALUES ('1', '流程一', '1', '1', '', '', null);

-- ----------------------------
-- Table structure for ht_renwu_add
-- ----------------------------
DROP TABLE IF EXISTS `ht_renwu_add`;
CREATE TABLE `ht_renwu_add` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '????',
  `isshow` tinyint(1) DEFAULT '1' COMMENT '????״̬',
  `typeid` int(11) NOT NULL COMMENT '????????ID',
  `sectionid` int(11) NOT NULL COMMENT '????ID',
  `addtime` int(11) DEFAULT NULL,
  `content` text COMMENT '????????',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='?????;

-- ----------------------------
-- Records of ht_renwu_add
-- ----------------------------
INSERT INTO `ht_renwu_add` VALUES ('1', '任务一', '1', '1', '1', '1517569980', '任务一');

-- ----------------------------
-- Table structure for ht_renwu_type
-- ----------------------------
DROP TABLE IF EXISTS `ht_renwu_type`;
CREATE TABLE `ht_renwu_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '????',
  `title` varchar(100) NOT NULL COMMENT '????',
  `gjz` varchar(100) NOT NULL COMMENT '?ؼ???',
  `paixu` int(11) DEFAULT NULL COMMENT '??ʾ????',
  `content` text COMMENT '????????',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='?????????;

-- ----------------------------
-- Records of ht_renwu_type
-- ----------------------------
INSERT INTO `ht_renwu_type` VALUES ('1', '任务类别1', '任务类别1', '任务类别1', '1', '任务类别1');
INSERT INTO `ht_renwu_type` VALUES ('2', '任务类别2', '任务类别2', '任务类别2', '2', '任务类别2');

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
-- Table structure for ht_tasks
-- ----------------------------
DROP TABLE IF EXISTS `ht_tasks`;
CREATE TABLE `ht_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '名称',
  `isshow` tinyint(1) DEFAULT '1' COMMENT '任务状态',
  `typeId` int(11) NOT NULL DEFAULT '0' COMMENT '任务类型ID',
  `typeName` varchar(30) NOT NULL DEFAULT '0' COMMENT '类型名称',
  `rulerId` int(11) NOT NULL DEFAULT '0' COMMENT '部门ID',
  `rulerName` varchar(30) NOT NULL DEFAULT '0' COMMENT '角色名称或部门名称',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `sort` int(11) DEFAULT NULL COMMENT '显示排序：降序',
  `keyId` int(11) DEFAULT NULL COMMENT '????ID',
  `content` text COMMENT '??ע',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='任务流程表';

-- ----------------------------
-- Records of ht_tasks
-- ----------------------------
INSERT INTO `ht_tasks` VALUES ('1', '任务一', '1', '1', '0', '1', '0', '0', null, '4', '任务一');
INSERT INTO `ht_tasks` VALUES ('2', '任务二1', '1', '1', '0', '2', '0', '1517803252', null, '4', '任务二');
INSERT INTO `ht_tasks` VALUES ('4', '任务三', '1', '1', '0', '1', '0', '1517817926', null, '4', '任务三');

-- ----------------------------
-- Table structure for ht_task_type
-- ----------------------------
DROP TABLE IF EXISTS `ht_task_type`;
CREATE TABLE `ht_task_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL COMMENT '名称',
  `title` varchar(100) NOT NULL COMMENT '标题',
  `key` varchar(100) NOT NULL COMMENT '关键字',
  `sort` int(11) DEFAULT NULL COMMENT '显示排序：降序',
  `content` text COMMENT '任务简介',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='任务类型';

-- ----------------------------
-- Records of ht_task_type
-- ----------------------------
INSERT INTO `ht_task_type` VALUES ('1', '任务类型一', '任务类型一', '任务类型一', '1', '任务类型一');
INSERT INTO `ht_task_type` VALUES ('2', '任务类型二', '任务类型二', '任务类型二', '2', '任务类型二');

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户信息';

-- ----------------------------
-- Records of ht_userinfo
-- ----------------------------

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
