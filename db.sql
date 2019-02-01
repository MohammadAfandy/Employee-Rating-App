/*
SQLyog Community v12.2.0 (64 bit)
MySQL - 10.1.19-MariaDB : Database - db_era
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_era` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_era`;

/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_assignment` */

insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values 
('admin-role','16',1548906178),
('atasan-role','20',1548931386),
('pegawai-role','17',1548907566);

/*Table structure for table `auth_item` */

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item` */

insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values 
('/*',2,NULL,NULL,NULL,1548906207,1548906207),
('/admin/*',2,NULL,NULL,NULL,1548906134,1548906134),
('/admin/assignment/*',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/assignment/assign',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/assignment/index',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/assignment/revoke',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/assignment/view',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/default/*',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/default/index',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/menu/*',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/menu/create',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/menu/delete',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/menu/index',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/menu/update',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/menu/view',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/permission/*',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/permission/assign',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/permission/create',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/permission/delete',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/permission/index',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/permission/remove',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/permission/update',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/permission/view',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/role/*',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/role/assign',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/role/create',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/role/delete',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/role/index',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/role/remove',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/role/update',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/role/view',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/route/*',2,NULL,NULL,NULL,1548906204,1548906204),
('/admin/route/assign',2,NULL,NULL,NULL,1548906204,1548906204),
('/admin/route/create',2,NULL,NULL,NULL,1548906204,1548906204),
('/admin/route/index',2,NULL,NULL,NULL,1548906203,1548906203),
('/admin/route/refresh',2,NULL,NULL,NULL,1548906204,1548906204),
('/admin/route/remove',2,NULL,NULL,NULL,1548906204,1548906204),
('/admin/rule/*',2,NULL,NULL,NULL,1548906204,1548906204),
('/admin/rule/create',2,NULL,NULL,NULL,1548906204,1548906204),
('/admin/rule/delete',2,NULL,NULL,NULL,1548906204,1548906204),
('/admin/rule/index',2,NULL,NULL,NULL,1548906204,1548906204),
('/admin/rule/update',2,NULL,NULL,NULL,1548906204,1548906204),
('/admin/rule/view',2,NULL,NULL,NULL,1548906204,1548906204),
('/debug/*',2,NULL,NULL,NULL,1548906205,1548906205),
('/debug/default/*',2,NULL,NULL,NULL,1548906205,1548906205),
('/debug/default/db-explain',2,NULL,NULL,NULL,1548906204,1548906204),
('/debug/default/download-mail',2,NULL,NULL,NULL,1548906205,1548906205),
('/debug/default/index',2,NULL,NULL,NULL,1548906204,1548906204),
('/debug/default/toolbar',2,NULL,NULL,NULL,1548906205,1548906205),
('/debug/default/view',2,NULL,NULL,NULL,1548906205,1548906205),
('/debug/user/*',2,NULL,NULL,NULL,1548906205,1548906205),
('/debug/user/reset-identity',2,NULL,NULL,NULL,1548906205,1548906205),
('/debug/user/set-identity',2,NULL,NULL,NULL,1548906205,1548906205),
('/gii/*',2,NULL,NULL,NULL,1548906205,1548906205),
('/gii/default/*',2,NULL,NULL,NULL,1548906205,1548906205),
('/gii/default/action',2,NULL,NULL,NULL,1548906205,1548906205),
('/gii/default/diff',2,NULL,NULL,NULL,1548906205,1548906205),
('/gii/default/index',2,NULL,NULL,NULL,1548906205,1548906205),
('/gii/default/preview',2,NULL,NULL,NULL,1548906205,1548906205),
('/gii/default/view',2,NULL,NULL,NULL,1548906205,1548906205),
('/kriteria/*',2,NULL,NULL,NULL,1548906205,1548906205),
('/kriteria/create',2,NULL,NULL,NULL,1548906205,1548906205),
('/kriteria/delete',2,NULL,NULL,NULL,1548906205,1548906205),
('/kriteria/index',2,NULL,NULL,NULL,1548906205,1548906205),
('/kriteria/reset-bobot',2,NULL,NULL,NULL,1548906205,1548906205),
('/kriteria/set-kriteria',2,NULL,NULL,NULL,1548906205,1548906205),
('/laporan/*',2,NULL,NULL,NULL,1548906206,1548906206),
('/laporan/export-pdf',2,NULL,NULL,NULL,1548906205,1548906205),
('/laporan/index',2,NULL,NULL,NULL,1548906205,1548906205),
('/pegawai/*',2,NULL,NULL,NULL,1548906206,1548906206),
('/pegawai/create',2,NULL,NULL,NULL,1548906206,1548906206),
('/pegawai/delete',2,NULL,NULL,NULL,1548906206,1548906206),
('/pegawai/index',2,NULL,NULL,NULL,1548835989,1548835989),
('/pegawai/update',2,NULL,NULL,NULL,1548906206,1548906206),
('/pegawai/view',2,NULL,NULL,NULL,1548906206,1548906206),
('/penilaian/*',2,NULL,NULL,NULL,1548906206,1548906206),
('/penilaian/create',2,NULL,NULL,NULL,1548906206,1548906206),
('/penilaian/delete',2,NULL,NULL,NULL,1548906206,1548906206),
('/penilaian/index',2,NULL,NULL,NULL,1548906206,1548906206),
('/penilaian/update',2,NULL,NULL,NULL,1548906206,1548906206),
('/penilaian/view',2,NULL,NULL,NULL,1548906206,1548906206),
('/site/*',2,NULL,NULL,NULL,1548906206,1548906206),
('/site/about',2,NULL,NULL,NULL,1548906206,1548906206),
('/site/captcha',2,NULL,NULL,NULL,1548906206,1548906206),
('/site/contact',2,NULL,NULL,NULL,1548906206,1548906206),
('/site/error',2,NULL,NULL,NULL,1548906206,1548906206),
('/site/index',2,NULL,NULL,NULL,1548906206,1548906206),
('/site/login',2,NULL,NULL,NULL,1548906206,1548906206),
('/site/logout',2,NULL,NULL,NULL,1548906206,1548906206),
('/user/*',2,NULL,NULL,NULL,1548906207,1548906207),
('/user/cek-nip',2,NULL,NULL,NULL,1548920820,1548920820),
('/user/change-password',2,NULL,NULL,NULL,1548918429,1548918429),
('/user/create',2,NULL,NULL,NULL,1548906206,1548906206),
('/user/delete',2,NULL,NULL,NULL,1548906207,1548906207),
('/user/index',2,NULL,NULL,NULL,1548906206,1548906206),
('/user/update',2,NULL,NULL,NULL,1548906206,1548906206),
('/user/view',2,NULL,NULL,NULL,1548906206,1548906206),
('admin-permission',2,'administrative permission',NULL,NULL,1548906157,1548906157),
('admin-role',1,'administrative role',NULL,NULL,1548906172,1548906172),
('atasan-permission',2,NULL,NULL,NULL,1548930710,1548930710),
('atasan-role',1,NULL,NULL,NULL,1548931381,1548931381),
('pegawai-permission',2,NULL,NULL,NULL,1548836537,1548837966),
('pegawai-role',1,NULL,NULL,NULL,1548836512,1548836512);

/*Table structure for table `auth_item_child` */

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item_child` */

insert  into `auth_item_child`(`parent`,`child`) values 
('admin-permission','/admin/assignment/*'),
('admin-permission','/admin/assignment/assign'),
('admin-permission','/admin/assignment/index'),
('admin-permission','/admin/assignment/revoke'),
('admin-permission','/admin/assignment/view'),
('admin-permission','/admin/default/*'),
('admin-permission','/admin/default/index'),
('admin-permission','/admin/menu/*'),
('admin-permission','/admin/menu/create'),
('admin-permission','/admin/menu/delete'),
('admin-permission','/admin/menu/index'),
('admin-permission','/admin/menu/update'),
('admin-permission','/admin/menu/view'),
('admin-permission','/admin/permission/*'),
('admin-permission','/admin/permission/assign'),
('admin-permission','/admin/permission/create'),
('admin-permission','/admin/permission/delete'),
('admin-permission','/admin/permission/index'),
('admin-permission','/admin/permission/remove'),
('admin-permission','/admin/permission/update'),
('admin-permission','/admin/permission/view'),
('admin-permission','/admin/role/*'),
('admin-permission','/admin/role/assign'),
('admin-permission','/admin/role/create'),
('admin-permission','/admin/role/delete'),
('admin-permission','/admin/role/index'),
('admin-permission','/admin/role/remove'),
('admin-permission','/admin/role/update'),
('admin-permission','/admin/role/view'),
('admin-permission','/admin/route/*'),
('admin-permission','/admin/route/assign'),
('admin-permission','/admin/route/create'),
('admin-permission','/admin/route/index'),
('admin-permission','/admin/route/refresh'),
('admin-permission','/admin/route/remove'),
('admin-permission','/admin/rule/*'),
('admin-permission','/admin/rule/create'),
('admin-permission','/admin/rule/delete'),
('admin-permission','/admin/rule/index'),
('admin-permission','/admin/rule/update'),
('admin-permission','/admin/rule/view'),
('admin-permission','/debug/*'),
('admin-permission','/debug/default/*'),
('admin-permission','/debug/default/db-explain'),
('admin-permission','/debug/default/download-mail'),
('admin-permission','/debug/default/index'),
('admin-permission','/debug/default/toolbar'),
('admin-permission','/debug/default/view'),
('admin-permission','/debug/user/*'),
('admin-permission','/debug/user/reset-identity'),
('admin-permission','/debug/user/set-identity'),
('admin-permission','/gii/*'),
('admin-permission','/gii/default/*'),
('admin-permission','/gii/default/action'),
('admin-permission','/gii/default/diff'),
('admin-permission','/gii/default/index'),
('admin-permission','/gii/default/preview'),
('admin-permission','/gii/default/view'),
('admin-permission','/kriteria/*'),
('admin-permission','/kriteria/create'),
('admin-permission','/kriteria/delete'),
('admin-permission','/kriteria/index'),
('admin-permission','/kriteria/reset-bobot'),
('admin-permission','/kriteria/set-kriteria'),
('admin-permission','/laporan/*'),
('admin-permission','/laporan/export-pdf'),
('admin-permission','/laporan/index'),
('admin-permission','/pegawai/*'),
('admin-permission','/pegawai/create'),
('admin-permission','/pegawai/delete'),
('admin-permission','/pegawai/index'),
('admin-permission','/pegawai/update'),
('admin-permission','/pegawai/view'),
('admin-permission','/penilaian/*'),
('admin-permission','/penilaian/create'),
('admin-permission','/penilaian/delete'),
('admin-permission','/penilaian/index'),
('admin-permission','/penilaian/update'),
('admin-permission','/penilaian/view'),
('admin-permission','/site/*'),
('admin-permission','/site/about'),
('admin-permission','/site/captcha'),
('admin-permission','/site/contact'),
('admin-permission','/site/error'),
('admin-permission','/site/index'),
('admin-permission','/site/login'),
('admin-permission','/site/logout'),
('admin-permission','/user/*'),
('admin-permission','/user/cek-nip'),
('admin-permission','/user/change-password'),
('admin-permission','/user/create'),
('admin-permission','/user/delete'),
('admin-permission','/user/index'),
('admin-permission','/user/update'),
('admin-permission','/user/view'),
('admin-role','admin-permission'),
('atasan-permission','/penilaian/*'),
('atasan-permission','/penilaian/create'),
('atasan-permission','/penilaian/delete'),
('atasan-permission','/penilaian/index'),
('atasan-permission','/penilaian/update'),
('atasan-permission','/penilaian/view'),
('atasan-permission','pegawai-permission'),
('atasan-role','atasan-permission'),
('pegawai-permission','/kriteria/index'),
('pegawai-permission','/laporan/export-pdf'),
('pegawai-permission','/laporan/index'),
('pegawai-permission','/pegawai/index'),
('pegawai-permission','/pegawai/view'),
('pegawai-permission','/user/change-password'),
('pegawai-permission','/user/view'),
('pegawai-role','pegawai-permission');

/*Table structure for table `auth_rule` */

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_rule` */

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`parent`,`route`,`order`,`data`) values 
(2,'Pegawai',NULL,'/pegawai/index',1,NULL),
(3,'Kriteria',NULL,'/kriteria/index',2,NULL),
(4,'Penilaian',NULL,'/penilaian/index',3,NULL),
(5,'Laporan',NULL,'/laporan/index',4,NULL);

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values 
('m140506_102106_rbac_init',1548835513),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id',1548835513),
('m180523_151638_rbac_updates_indexes_without_prefix',1548835514),
('m190201_031915_alter_table_kriteria_add_type',1548991426);

/*Table structure for table `tb_kriteria` */

DROP TABLE IF EXISTS `tb_kriteria`;

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(100) NOT NULL,
  `type` int(1) DEFAULT NULL COMMENT '0=cost, 1=benefit',
  `bobot` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`id_kriteria`,`nama_kriteria`,`type`,`bobot`) values 
(28,'Kemampuan',0,0.15),
(29,'Kedisiplinan',0,0.15),
(30,'Kerja Sama',0,0.1),
(31,'Penampilan',0,0.2),
(32,'Etos Kerja',0,0.25),
(35,'Keterampilan',0,0.15);

/*Table structure for table `tb_pegawai` */

DROP TABLE IF EXISTS `tb_pegawai`;

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pegawai` */

insert  into `tb_pegawai`(`id_pegawai`,`nip`,`nama_pegawai`,`tgl_lahir`,`jk`,`no_hp`,`created_date`,`updated_date`) values 
(23,'00140224','Krisbiyan Nugroho','1995-06-05','L','081177479201',NULL,NULL),
(25,'00169929','Wahyudi','1984-12-20','P','089677584930',NULL,'2019-01-28 16:35:30'),
(26,'00150040','Siska Risma','1992-10-02','P','089788278184',NULL,NULL),
(27,'00160040','Galih Aufa','1996-08-12','P','08553329852',NULL,NULL),
(28,'00179929','Heriyansyah','1987-07-02','L','081809098848',NULL,'2019-01-27 23:56:28'),
(29,'00152273','Eka Herdiansyah','1995-05-09','L','08127736152',NULL,NULL),
(30,'00178846','Dani Putra','1992-06-01','L','08784462514',NULL,NULL),
(31,'00137746','Rachmat Ramdani','2004-06-26','L','08995745142',NULL,NULL),
(32,'00144636','Suprianto','1994-12-12','L','08956662517',NULL,NULL),
(33,'00112234','Kuswanto','1985-08-15','L','089977462514',NULL,'2019-01-29 10:04:53'),
(34,'00168828','Dian Sastro','1978-11-11','P','089599492919',NULL,NULL),
(35,'00129472','Vicky Prasetyo','1995-02-20','L','08969388171','2019-01-26 19:21:36','2019-01-26 19:22:14'),
(36,'00171561','Diterawang','1995-04-13','L','0812181381892','2019-01-26 20:13:05','2019-01-26 20:13:05');

/*Table structure for table `tb_penilaian` */

DROP TABLE IF EXISTS `tb_penilaian`;

CREATE TABLE `tb_penilaian` (
  `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `penilaian` text NOT NULL COMMENT 'json penilaian',
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_penilaian`),
  KEY `FK_PenilaianPegawai` (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `tb_penilaian` */

insert  into `tb_penilaian`(`id_penilaian`,`id_pegawai`,`penilaian`,`created_date`,`updated_date`) values 
(12,25,'{\"28\":\"80\",\"29\":\"90\",\"30\":\"85\",\"31\":\"75\",\"32\":\"80\",\"35\":\"80\"}','2019-01-28 16:35:07','2019-01-28 16:35:07'),
(13,28,'{\"28\":\"70\",\"29\":\"80\",\"30\":\"85\",\"31\":\"80\",\"32\":\"90\",\"35\":\"85\"}','2019-01-28 16:35:17','2019-01-28 16:35:17'),
(14,29,'{\"28\":\"80\",\"29\":\"90\",\"30\":\"80\",\"31\":\"70\",\"32\":\"80\",\"35\":\"75\"}','2019-01-28 17:34:33','2019-01-28 17:34:33'),
(15,33,'{\"28\":\"80\",\"29\":\"90\",\"30\":\"85\",\"31\":\"90\",\"32\":\"85\",\"35\":\"70\"}','2019-01-28 17:35:11','2019-01-28 17:35:11'),
(16,27,'{\"28\":\"80\",\"29\":\"70\",\"30\":\"80\",\"31\":\"70\",\"32\":\"85\",\"35\":\"70\"}','2019-01-29 11:52:30','2019-01-29 11:52:30'),
(17,30,'{\"28\":\"90\",\"29\":\"80\",\"30\":\"65\",\"31\":\"70\",\"32\":\"70\",\"35\":\"75\"}','2019-01-29 11:59:23','2019-01-29 11:59:23'),
(18,31,'{\"28\":\"80\",\"29\":\"75\",\"30\":\"75\",\"31\":\"80\",\"32\":\"80\",\"35\":\"85\"}','2019-01-29 12:01:01','2019-01-29 12:01:01'),
(19,32,'{\"28\":\"80\",\"29\":\"70\",\"30\":\"80\",\"31\":\"70\",\"32\":\"80\",\"35\":\"75\"}','2019-01-31 18:12:39','2019-01-31 18:12:39');

/*Table structure for table `tb_penilaian__hapus` */

DROP TABLE IF EXISTS `tb_penilaian__hapus`;

CREATE TABLE `tb_penilaian__hapus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_penilaian` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `penilaian` text NOT NULL COMMENT 'json penilaian',
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `tb_penilaian__hapus` */

insert  into `tb_penilaian__hapus`(`id`,`id_penilaian`,`id_pegawai`,`penilaian`,`created_date`,`updated_date`,`delete_date`) values 
(7,19,28,'{\"Kemampuan\":\"80\",\"Disiplin\":\"70\",\"Kerja Sama\":\"60\",\"Penampilan\":\"80\",\"Keterampilan\":\"70\"}','2019-01-27 23:00:36','2019-01-27 23:00:36','2019-01-27 23:39:39'),
(8,21,27,'{\"Kemampuan\":\"70\",\"Disiplin\":\"80\",\"Kerja Sama\":\"70\",\"Penampilan\":\"80\",\"Keterampilan\":\"90\"}','2019-01-27 23:40:21','2019-01-27 23:40:21','2019-01-27 23:43:47'),
(9,22,32,'{\"Kemampuan\":\"70\",\"Disiplin\":\"80\",\"Kerja Sama\":\"60\",\"Penampilan\":\"80\",\"Keterampilan\":\"70\"}','2019-01-27 23:40:30','2019-01-27 23:40:30','2019-01-27 23:43:47'),
(10,23,35,'{\"Kemampuan\":\"75\",\"Disiplin\":\"80\",\"Kerja Sama\":\"95\",\"Penampilan\":\"70\",\"Keterampilan\":\"70\"}','2019-01-27 23:40:39','2019-01-27 23:40:39','2019-01-27 23:43:47'),
(11,24,34,'{\"Kemampuan\":\"70\",\"Disiplin\":\"80\",\"Kerja Sama\":\"70\",\"Penampilan\":\"60\",\"Keterampilan\":\"80\"}','2019-01-27 23:40:46','2019-01-27 23:40:46','2019-01-27 23:43:47'),
(12,25,33,'{\"Kemampuan\":\"75\",\"Disiplin\":\"90\",\"Kerja Sama\":\"70\",\"Penampilan\":\"90\",\"Keterampilan\":\"50\"}','2019-01-27 23:40:54','2019-01-27 23:40:54','2019-01-27 23:43:48'),
(13,26,28,'{\"Kemampuan\":\"90\",\"Kedisiplinan\":\"70\",\"Kerja Sama\":\"75\",\"Penampilan\":\"85\",\"Etos Kerja\":\"85\"}','2019-01-27 23:53:33','2019-01-27 23:53:33','2019-01-28 00:09:09'),
(14,27,30,'{\"Kemampuan\":\"75\",\"Kedisiplinan\":\"80\",\"Kerja Sama\":\"70\",\"Penampilan\":\"85\",\"Etos Kerja\":\"90\"}','2019-01-27 23:53:52','2019-01-27 23:53:52','2019-01-28 00:09:10'),
(15,28,32,'{\"Kemampuan\":\"75\",\"Kedisiplinan\":\"70\",\"Kerja Sama\":\"80\",\"Penampilan\":\"85\",\"Etos Kerja\":\"75\"}','2019-01-27 23:54:15','2019-01-27 23:54:15','2019-01-28 00:09:10'),
(16,29,34,'{\"Kemampuan\":\"90\",\"Kedisiplinan\":\"75\",\"Kerja Sama\":\"75\",\"Penampilan\":\"70\",\"Etos Kerja\":\"85\"}','2019-01-27 23:54:27','2019-01-27 23:54:27','2019-01-28 00:09:10'),
(17,30,31,'{\"Kemampuan\":\"75\",\"Kedisiplinan\":\"80\",\"Kerja Sama\":\"80\",\"Penampilan\":\"85\",\"Etos Kerja\":\"80\"}','2019-01-27 23:54:41','2019-01-27 23:54:41','2019-01-28 00:09:10'),
(18,31,33,'{\"Kemampuan\":\"80\",\"Kedisiplinan\":\"75\",\"Kerja Sama\":\"80\",\"Penampilan\":\"90\",\"Etos Kerja\":\"85\"}','2019-01-27 23:55:00','2019-01-27 23:55:00','2019-01-28 00:09:10'),
(19,32,29,'{\"Kemampuan\":\"80\",\"Kedisiplinan\":\"70\",\"Kerja Sama\":\"90\",\"Penampilan\":\"75\",\"Etos Kerja\":\"80\"}','2019-01-27 23:55:09','2019-01-27 23:55:09','2019-01-28 00:09:10'),
(20,33,35,'{\"Kemampuan\":\"80\",\"Kedisiplinan\":\"85\",\"Kerja Sama\":\"80\",\"Penampilan\":\"90\",\"Etos Kerja\":\"60\"}','2019-01-27 23:55:26','2019-01-27 23:55:26','2019-01-28 00:09:10'),
(21,1,30,'{\"Kemampuan\":\"90\",\"Kedisiplinan\":\"90\",\"Kerja Sama\":\"70\",\"Penampilan\":\"85\",\"Etos Kerja\":\"75\"}','2019-01-28 09:40:19','2019-01-28 11:05:15','2019-01-28 13:51:48'),
(22,2,28,'{\"Kemampuan\":\"60\",\"Kedisiplinan\":\"70\",\"Kerja Sama\":\"80\",\"Penampilan\":\"90\",\"Etos Kerja\":\"100\"}','2019-01-28 09:40:39','2019-01-28 11:26:34','2019-01-28 13:51:48'),
(23,4,29,'{\"Kemampuan\":\"80\",\"Kedisiplinan\":\"90\",\"Kerja Sama\":\"70\",\"Penampilan\":\"80\",\"Etos Kerja\":\"50\"}','2019-01-28 11:10:36','2019-01-28 11:10:55','2019-01-28 13:51:49'),
(24,7,27,'{\"Kemampuan\":\"85\",\"Kedisiplinan\":\"80\",\"Kerja Sama\":\"75\",\"Penampilan\":\"80\",\"Etos Kerja\":\"80\"}','2019-01-28 11:31:28','2019-01-28 13:13:45','2019-01-28 13:51:49'),
(25,8,23,'{\"Kemampuan\":\"80\",\"Kedisiplinan\":\"80\",\"Kerja Sama\":\"90\",\"Penampilan\":\"80\",\"Etos Kerja\":\"70\"}','2019-01-28 13:13:06','2019-01-28 13:13:06','2019-01-28 13:51:49'),
(26,9,26,'{\"Kemampuan\":\"80\",\"Kedisiplinan\":\"70\",\"Kerja Sama\":\"80\",\"Penampilan\":\"85\",\"Etos Kerja\":\"60\",\"Keterampilan\":\"75\"}','2019-01-28 13:52:55','2019-01-28 13:52:55','2019-01-28 16:19:52'),
(27,10,33,'{\"Kemampuan\":\"75\",\"Kedisiplinan\":\"75\",\"Kerja Sama\":\"80\",\"Penampilan\":\"75\",\"Etos Kerja\":\"80\",\"Keterampilan\":\"90\"}','2019-01-28 13:53:27','2019-01-28 13:53:27','2019-01-28 16:19:52'),
(28,11,32,'{\"Kemampuan\":\"80\",\"Kedisiplinan\":\"85\",\"Kerja Sama\":\"80\",\"Penampilan\":\"75\",\"Etos Kerja\":\"80\",\"Keterampilan\":\"80\"}','2019-01-28 13:53:45','2019-01-28 13:53:45','2019-01-28 16:19:52');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `status` smallint(6) DEFAULT '10',
  `auth_key` varchar(250) DEFAULT NULL,
  `password_reset_token` varchar(250) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id`,`nip`,`username`,`password_hash`,`email`,`status`,`auth_key`,`password_reset_token`,`created_date`,`updated_date`) values 
(16,'00140224','admin','$2y$13$XC4lzl1affRM2ZjZpBf1xu4KAIXGXiqR3Xo4CDbbIXxA0H7CrEDDi','admin@gmail.com',10,'G3oRb8PFyBWmDehWRTqJin1BZlK_ge0h',NULL,'2019-01-30 15:11:04','2019-01-31 14:18:48'),
(17,'00169929','pegawai','$2y$13$xG8rnaIvnhlzQTGwOl9VtO0tmXRRB2KWlVembnLLKIdNKtZY7XIPe','pegawai@gmail.com',10,'cENAMD9C9UN3YtTqwkK1dvDqckQIAB-E',NULL,'2019-01-31 11:04:16','2019-01-31 18:11:42'),
(20,'00112234','atasan','$2y$13$JQMEfaaLjOoTtIh9KFR5Tew.4NJFKd3g2EDEYAYtwLxOBREScNh62','atasan@yahoo.com',10,'W4_jbX8h8nxq0a3mqdcBCVmm-y8gzSPC',NULL,'2019-01-31 17:42:18','2019-01-31 18:07:26');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
