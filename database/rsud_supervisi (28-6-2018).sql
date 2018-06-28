/*
SQLyog Enterprise v10.42 
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
  `status_medis` set('Belum','Sudah','Tidak Ada') DEFAULT NULL,
  `status_pelayanan` set('Belum','Sudah','Tidak Ada') DEFAULT NULL,
  `status_umum` set('Belum','Sudah','Tidak Ada') DEFAULT NULL,
  `tanggapan_medis` text,
  `tanggapan_pelayanan` text,
  `tanggapan_umum` text,
  `user_medis` varchar(20) DEFAULT NULL,
  `user_pelayanan` varchar(20) DEFAULT NULL,
  `user_umum` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `supervisi_masalah` */

insert  into `supervisi_masalah`(`id_supervisi`,`masalah_medis`,`masalah_pelayanan`,`masalah_umum`,`status_medis`,`status_pelayanan`,`status_umum`,`tanggapan_medis`,`tanggapan_pelayanan`,`tanggapan_umum`,`user_medis`,`user_pelayanan`,`user_umum`) values ('2018-06-11/Pagi/Ruang ICU','Masalah Medis','-Masalah\r\n-Penunjang','-Maslah\r\n-Umum','Belum','Sudah','Sudah',NULL,'Masalah Penunjang Selesai','Umum Selesai',NULL,'USR-0','USR-0'),('2018-06-11/Pagi/Ruang Apel','Apel masalah','Apel masalah penunjang pelayanan','apel administrasi umum masalah','Sudah','Belum','Belum','Masalah Selesai',NULL,NULL,'USR-0',NULL,NULL),('2018-06-19/Siang/Ruang VIP Pratama','- masalah medis','- masalah pelayanan','- masalah umum','Belum','Belum','Sudah',NULL,NULL,'Umum ini juga selesai',NULL,NULL,'USR-0'),('2018-06-19/Sore/Ruang Apel','- tidak ada masalah','- tidak ada masalah','- tidak ada masalah','Belum','Belum','Belum',NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `supervisi_pasien` */

DROP TABLE IF EXISTS `supervisi_pasien`;

CREATE TABLE `supervisi_pasien` (
  `id_supervisi` varchar(255) NOT NULL,
  `nama_unit` varchar(255) DEFAULT NULL,
  `tgl_supervisi` date DEFAULT NULL,
  `jam_supervisi` time DEFAULT NULL,
  `jadwal_supervisi` set('Pagi','Siang','Sore') DEFAULT NULL,
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

insert  into `supervisi_pasien`(`id_supervisi`,`nama_unit`,`tgl_supervisi`,`jam_supervisi`,`jadwal_supervisi`,`jum_umum`,`jum_jkn`,`jum_umum_iii`,`jum_jkn_iii`,`jum_umum_ii`,`jum_jkn_ii`,`jum_umum_i`,`jum_jkn_i`,`rujuk_umum`,`rujuk_jkn`,`meninggal_umum`,`meninggal_jkn`,`date_created`,`id_user`) values ('2018-06-11/Pagi/Ruang Apel','Ruang Apel','2018-06-11','12:12:00','Pagi',0,0,9,8,7,6,5,4,3,2,1,0,'2018-06-18','USR-0'),('2018-06-11/Pagi/Ruang ICU','Ruang ICU','2018-06-11','19:44:00','Pagi',1,2,0,0,0,0,0,0,3,4,5,6,'2018-06-11','USR-4'),('2018-06-19/Siang/Ruang VIP Pratama','Ruang VIP Pratama','2018-06-19','00:12:00','Siang',12,13,0,0,0,0,0,0,14,15,16,17,'2018-06-19','USR-0'),('2018-06-19/Sore/Ruang Apel','Ruang Apel','2018-06-19','12:12:00','Sore',0,0,1,2,3,4,5,6,7,8,9,10,'2018-06-19','USR-0');

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
  `nip` varchar(20) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `otoritas` set('Admin','Pegawai','Bid. Medis','Bid. Penunjang Pelayanan','Bid. Adm Umum') DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `golongan` varchar(255) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `status_active` set('Active','Non Active') DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama_user`,`nip`,`username`,`password`,`otoritas`,`jabatan`,`golongan`,`date_created`,`status_active`) values ('USR-0','Administrator','0000000000','admin','admin','Admin','IT','-','2018-06-11','Active'),('USR-1','dr. Ni Ketut Siti Sudari\r\n','123456','siti','siti','Bid. Medis','Wakil Direktur','-','2018-06-11','Active'),('USR-2','drg. Ni Nyoman Sujartini Aryanti','789101','nyoman','nyoman','Bid. Penunjang Pelayanan','Wakil Direktur','-','2018-06-11','Active'),('USR-3','dr. I Wayan Swatama, M.Kes','564789','wayan','wayan','Bid. Adm Umum','Wakil Direktur','-','2018-06-11','Active'),('USR-4','Ni Putu Arini, A.Md. Kep','987654','arini','arini','Pegawai','Ka. Instalasi Rawat Jalan','-','2018-06-11','Active');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
