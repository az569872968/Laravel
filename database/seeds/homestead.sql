/*
Navicat MySQL Data Transfer

Source Server         : 本机
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : homestead

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-08-23 21:07:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin_users
-- ----------------------------
DROP TABLE IF EXISTS `admin_users`;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of admin_users
-- ----------------------------
INSERT INTO `admin_users` VALUES ('1', 'admin', 'admin@admin.com', '$2y$10$66x80Mfjhj4dLCRtmvmSHOPDDtoXoSjJ5zo92nfFqmcPPX7Go/yoW', 'EEq2bDENlpijQZticfr7Kj2gCD8oGcpBPi0nIf68Nv0GNRr9zm9dBiHVmmA3', '2016-05-25 05:56:33', '2016-08-23 20:40:38');
INSERT INTO `admin_users` VALUES ('4', 'admin916', 'zoudan916@163.com', '$2y$10$y2ncKaFg33g9fGhP/Vym7OMDMKCG62INduI/43fnE5d9E/tisK3Vu', 'fQl9ffv2maeueSF8YGbl1kIz0UOmCfCRAqyTMMmr4d1NwAsZpGnC3AJv2ZfY', '2016-08-18 12:41:21', '2016-08-23 18:04:41');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2016_05_25_054817_entrust_setup_tables', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cid` int(10) unsigned DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('5', 'admin.user.manage', '用户管理', '', '2016-05-27 09:14:31', '2016-05-30 12:25:59', '0', 'fa-users');
INSERT INTO `permissions` VALUES ('6', 'admin.permission.index', '权限列表', '', '2016-05-27 09:15:01', '2016-05-28 04:35:05', '5', null);
INSERT INTO `permissions` VALUES ('7', 'admin.permission.create', '添加权限', '', '2016-05-27 09:15:22', '2016-05-27 09:15:22', '5', null);
INSERT INTO `permissions` VALUES ('8', 'admin.permission.edit', '修改权限', '', '2016-05-27 09:15:34', '2016-05-27 09:15:34', '5', null);
INSERT INTO `permissions` VALUES ('9', 'admin.permission.destroy ', '删除权限', '', '2016-05-27 09:15:56', '2016-05-27 09:15:56', '5', null);
INSERT INTO `permissions` VALUES ('11', 'admin.user.index', '用户列表', '', '2016-05-27 10:55:55', '2016-05-27 10:55:55', '5', null);
INSERT INTO `permissions` VALUES ('12', 'admin.user.create', '添加用户', '', '2016-05-27 10:56:10', '2016-05-27 10:56:10', '5', null);
INSERT INTO `permissions` VALUES ('13', 'admin.user.edit', '编辑用户', '', '2016-05-27 10:56:26', '2016-05-27 10:56:26', '5', null);
INSERT INTO `permissions` VALUES ('14', 'admin.user.destroy', '删除用户', '', '2016-05-27 10:56:44', '2016-05-27 10:56:44', '5', null);
INSERT INTO `permissions` VALUES ('15', 'admin.role.index', '角色列表', '', '2016-05-27 10:57:35', '2016-05-27 10:57:35', '5', null);
INSERT INTO `permissions` VALUES ('16', 'admin.role.create', '添加角色', '', '2016-05-27 10:57:53', '2016-05-27 10:57:53', '5', null);
INSERT INTO `permissions` VALUES ('17', 'admin.role.edit', '编辑角色', '', '2016-05-27 10:58:13', '2016-05-27 10:58:13', '5', null);
INSERT INTO `permissions` VALUES ('18', 'admin.role.destroy', '删除角色', '', '2016-05-27 10:58:48', '2016-05-27 10:58:48', '5', null);
INSERT INTO `permissions` VALUES ('19', 'admin.article.manage', '内容管理', '文章内容', '2016-08-22 18:22:01', '2016-08-22 18:22:01', '0', 'fa-sliders');
INSERT INTO `permissions` VALUES ('20', 'admin.article.index', '文章列表', '', '2016-08-22 18:23:37', '2016-08-22 18:23:37', '19', null);
INSERT INTO `permissions` VALUES ('21', 'admin.article.add', '添加文章', '', '2016-08-23 12:48:27', '2016-08-23 12:48:27', '19', null);
INSERT INTO `permissions` VALUES ('22', 'admin.news.index', '新闻列表', '', '2016-08-23 12:56:52', '2016-08-23 12:56:52', '19', null);

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('6', '5');
INSERT INTO `permission_role` VALUES ('7', '5');
INSERT INTO `permission_role` VALUES ('8', '5');
INSERT INTO `permission_role` VALUES ('9', '5');
INSERT INTO `permission_role` VALUES ('11', '5');
INSERT INTO `permission_role` VALUES ('12', '5');
INSERT INTO `permission_role` VALUES ('13', '5');
INSERT INTO `permission_role` VALUES ('14', '5');
INSERT INTO `permission_role` VALUES ('15', '5');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('5', '高级管理员', '高级管理员', '高级管理员', '2016-08-18 12:41:02', '2016-08-18 12:41:02');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('4', '5');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
