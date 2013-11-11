/*
Navicat MySQL Data Transfer
Source Host     : localhost:3336
Source Database : technicas
Target Host     : localhost:3336
Target Database : technicas
Date: 2013-11-10 21:19:47
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `deptid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organid` int(10) unsigned DEFAULT NULL COMMENT '机构id',
  `name` varchar(50) DEFAULT NULL COMMENT '部门名称',
  `order` varchar(30) DEFAULT NULL COMMENT '部门排序',
  PRIMARY KEY (`deptid`),
  KEY `department_organ_id` (`organid`),
  CONSTRAINT `department_organ_id` FOREIGN KEY (`organid`) REFERENCES `organization` (`organid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------

-- ----------------------------
-- Table structure for organization
-- ----------------------------
DROP TABLE IF EXISTS `organization`;
CREATE TABLE `organization` (
  `organid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '机构ID',
  `name` varchar(50) DEFAULT NULL COMMENT '机构名称',
  `order` varchar(30) DEFAULT NULL COMMENT '机构排序',
  PRIMARY KEY (`organid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of organization
-- ----------------------------

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `roleid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '角色名称',
  `purview` varchar(200) DEFAULT NULL COMMENT '角色权限',
  `order` tinyint(4) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `userid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` int(11) DEFAULT NULL,
  `logintime` datetime DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `infoid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sex` enum('2','1') DEFAULT '1' COMMENT '1：男 2：女',
  `age` tinyint(4) DEFAULT NULL COMMENT '用户年龄',
  `birthday` varchar(30) DEFAULT NULL COMMENT '用户出生日期',
  `order` tinyint(4) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`infoid`),
  KEY `userinfo_user_id` (`userid`),
  CONSTRAINT `userinfo_user_id` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_info
-- ----------------------------
