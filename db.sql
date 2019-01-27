/*
SQLyog Community v13.1.1 (64 bit)
MySQL - 10.1.37-MariaDB : Database - db_era
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

/*Table structure for table `tb_kriteria` */

DROP TABLE IF EXISTS `tb_kriteria`;

CREATE TABLE `tb_kriteria` (
  `id_kriteria` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kriteria` varchar(100) NOT NULL,
  `bobot` double NOT NULL,
  PRIMARY KEY (`id_kriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

/*Data for the table `tb_kriteria` */

insert  into `tb_kriteria`(`id_kriteria`,`nama_kriteria`,`bobot`) values 
(28,'Kemampuan',0),
(29,'Kedisiplinan',0),
(30,'Kerja Sama',0),
(31,'Penampilan',0),
(32,'Etos Kerja',0),
(34,'Hapus Semua WKWKWK',0);

/*Table structure for table `tb_pegawai` */

DROP TABLE IF EXISTS `tb_pegawai`;

CREATE TABLE `tb_pegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` varchar(20) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`),
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

/*Data for the table `tb_pegawai` */

insert  into `tb_pegawai`(`id_pegawai`,`nip`,`nama_pegawai`,`tgl_lahir`,`jk`,`no_hp`,`email`,`created_date`,`updated_date`) values 
(23,'00140224','Krisbiyan Nugroho','1995-06-05','L','081177479201','krisbiyan.nugroho@gmail.com',NULL,NULL),
(25,'00169929','WahyudiS','1984-12-20','P','089677584930','wahyudi@gmail.com',NULL,'2019-01-27 00:02:30'),
(26,'00150040','Siska Risma','1992-10-02','P','089788278184','siska.rismayani@gmail.com',NULL,NULL),
(27,'00160040','Galih Aufa','1996-08-12','P','08553329852','galih.aufa@gmail.com',NULL,NULL),
(28,'00179929','Heriyansyah','1987-07-02','L','081809098848','heriyanto@gmail.com',NULL,'2019-01-27 23:56:28'),
(29,'00152273','Eka Herdiansyah','1995-05-09','L','08127736152','eka@gmail.co.id',NULL,NULL),
(30,'00178846','Dani Putra','1992-06-01','L','08784462514','dani@gmail.com',NULL,NULL),
(31,'00137746','Rachmat Ramdani','2004-06-26','L','08995745142','ramdani@gmail.co.id',NULL,NULL),
(32,'00144636','Suprianto','1994-12-12','L','08956662517','supri@gmail.com',NULL,NULL),
(33,'00112234','Kuswantoe','1985-08-15','L','089977462514','kuswanto@gmail.com',NULL,NULL),
(34,'00168828','Dian Sastro','1978-11-11','P','089599492919','dian@gmail.com',NULL,NULL),
(35,'00129472','Vicky Prasetyo','1995-02-20','L','08969388171','vicky@gmail.com','2019-01-26 19:21:36','2019-01-26 19:22:14'),
(36,'00171561','Diterawang','1995-04-13','L','0812181381892','diterawang@yahoo.com','2019-01-26 20:13:05','2019-01-26 20:13:05');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tb_penilaian` */

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

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
(20,33,35,'{\"Kemampuan\":\"80\",\"Kedisiplinan\":\"85\",\"Kerja Sama\":\"80\",\"Penampilan\":\"90\",\"Etos Kerja\":\"60\"}','2019-01-27 23:55:26','2019-01-27 23:55:26','2019-01-28 00:09:10');

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`username`,`password`,`level`) values 
(1,'admin','18c6a866f38c8621bb4e21801fb323c1','admin'),
(3,'user','ee11cbb19052e40b07aac0ca060c23ee','user'),
(5,'pandi','7b17e99a9cd5e4b63e9f90114631e361','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
