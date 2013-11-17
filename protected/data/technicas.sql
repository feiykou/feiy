SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for department
-- ----------------------------
DROP TABLE IF EXISTS `department`;
CREATE TABLE `department` (
  `dept_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `organ_id` int(10) unsigned DEFAULT NULL COMMENT '机构id',
  `name` varchar(50) DEFAULT NULL COMMENT '部门名称',
  `sort` varchar(30) DEFAULT NULL COMMENT '部门排序',
  PRIMARY KEY (`dept_id`),
  KEY `department_organ_id` (`organ_id`),
  CONSTRAINT `department_organ_id` FOREIGN KEY (`organ_id`) REFERENCES `organization` (`organ_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of department
-- ----------------------------

-- ----------------------------
-- Table structure for organization
-- ----------------------------
DROP TABLE IF EXISTS `organization`;
CREATE TABLE `organization` (
  `organ_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '机构ID',
  `name` varchar(50) DEFAULT NULL COMMENT '机构名称',
  `sort` varchar(30) DEFAULT NULL COMMENT '机构排序',
  PRIMARY KEY (`organ_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of organization
-- ----------------------------

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `role_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '角色名称',
  `purview` varchar(200) DEFAULT NULL COMMENT '角色权限',
  `sort` tinyint(4) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of role
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `login_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `info_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sex` enum('2','1') DEFAULT '1' COMMENT '1：男 2：女',
  `birthday` varchar(30) DEFAULT NULL COMMENT '用户出生日期',
  `sort` tinyint(4) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`info_id`),
  KEY `userinfo_user_id` (`user_id`),
  CONSTRAINT `userinfo_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_info
-- ----------------------------
