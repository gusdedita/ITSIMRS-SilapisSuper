/*
SQLyog Ultimate v10.42 
MySQL - 5.5.5-10.1.13-MariaDB : Database - rsud_supervisi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rsud_supervisi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `rsud_supervisi`;

/*Table structure for table `supervisi_masalah` */

DROP TABLE IF EXISTS `supervisi_masalah`;

CREATE TABLE `supervisi_masalah` (
  `id_supervisi` varchar(255) DEFAULT NULL,
  `masalah_medis` text,
  `masalah_pelayanan` text,
  `masalah_umum` text,
  `status_medis` set('Belum','Sudah') DEFAULT NULL,
  `status_pelayanan` set('Belum','Sudah') DEFAULT NULL,
  `status_umum` set('Belum','Sudah') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `supervisi_masalah` */

/*Table structure for table `supervisi_pasien` */

DROP TABLE IF EXISTS `supervisi_pasien`;

CREATE TABLE `supervisi_pasien` (
  `id_supervisi` varchar(255) NOT NULL,
  `nama_unit` varchar(255) DEFAULT NULL,
  `tgl_supervisi` date DEFAULT NULL,
  `jam_supervisi` time DEFAULT NULL,
  `jum_umum` int(11) DEFAULT NULL,
  `jum_jkn` int(11) DEFAULT NULL,
  `jum_umum_iii` int(11) DEFAULT NULL,
  `jum_jkn_iii` int(11) DEFAULT NULL,
  `jum_umum_ii` int(11) DEFAULT NULL,
  `jum_jkn_ii` int(11) DEFAULT NULL,
  `jum_umum_i` int(11) DEFAULT NULL,
  `jum_jkn_i` int(11) DEFAULT NULL,
  `rujuk_umum` int(11) DEFAULT NULL,
  `rujuk_jkn` int(11) DEFAULT NULL,
  `meninggal_umum` int(11) DEFAULT NULL,
  `meninggal_jkn` int(11) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `id_user` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_supervisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `supervisi_pasien` */

/*Table structure for table `unit` */

DROP TABLE IF EXISTS `unit`;

CREATE TABLE `unit` (
  `nama_unit` varchar(255) NOT NULL,
  `jenis_unit` set('Kelas','Non Kelas','VIP') DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status_del` set('Y','N') DEFAULT NULL,
  PRIMARY KEY (`nama_unit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `unit` */

insert  into `unit`(`nama_unit`,`jenis_unit`,`date_created`,`id_user`,`status_del`) values ('Ruang Apel','Kelas','2018-06-08',1,'N'),('Ruang Belimbing','Kelas','2018-06-08',1,'N'),('Ruang ICU','Non Kelas','2018-06-08',1,'N'),('Ruang VIP Pratama','Non Kelas','2018-06-08',1,'N');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` varchar(100) NOT NULL,
  `nama_user` text,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `jabatan` set('Admin','Pegawai','Wadir Medis','Wadir Pelayanan','Wadir Umum') DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `status_active` set('Active','Non Active') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
