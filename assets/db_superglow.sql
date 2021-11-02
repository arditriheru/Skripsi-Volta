/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.20-MariaDB : Database - db_superglow
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_superglow` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_superglow`;

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id_customer` int(10) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  PRIMARY KEY (`id_customer`),
  KEY `id_customer` (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer` */

insert  into `customer`(`id_customer`,`nama`,`tgl_lahir`,`tempat_lahir`,`alamat`,`no_hp`) values 
(1,'Ardi Tri Heru','1995-08-28','Sleman','Sedogan lumbungrejo, tempel, sleman, yogyakarta','089629671717'),
(2,'Diah Yuniarsih Khorifah','1995-06-02','Sleman','Jalan Tengiri VIII Minomartani Ngaglik Sleman','089629671712');

/*Table structure for table `detail_penjualan` */

DROP TABLE IF EXISTS `detail_penjualan`;

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(100) NOT NULL AUTO_INCREMENT,
  `id_treatment` int(100) NOT NULL,
  `id_produk` int(100) NOT NULL,
  `harga_satuan` int(5) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_detail_penjualan`),
  KEY `id_detail_penjualan` (`id_detail_penjualan`),
  KEY `id_produk` (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_penjualan` */

insert  into `detail_penjualan`(`id_detail_penjualan`,`id_treatment`,`id_produk`,`harga_satuan`,`jumlah`,`tanggal`) values 
(1,7,1,55000,1,'2021-11-02 13:24:01'),
(2,7,2,75000,2,'2021-11-02 13:24:08'),
(3,7,3,75000,3,'2021-11-02 13:24:14');

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `id_penjualan` int(100) NOT NULL AUTO_INCREMENT,
  `id_treatment` int(100) NOT NULL,
  `total` int(5) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_penjualan`),
  KEY `id_penjualan` (`id_penjualan`),
  KEY `id_treatment` (`id_treatment`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `penjualan` */

insert  into `penjualan`(`id_penjualan`,`id_treatment`,`total`,`tanggal`) values 
(1,7,430000,'2021-11-02 13:25:09');

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` int(100) NOT NULL AUTO_INCREMENT,
  `id_produk_kategori` int(3) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(5) NOT NULL,
  PRIMARY KEY (`id_produk`),
  KEY `id_produk` (`id_produk`),
  KEY `id_produk_kategori` (`id_produk_kategori`),
  CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_produk_kategori`) REFERENCES `produk_kategori` (`id_produk_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `produk` */

insert  into `produk`(`id_produk`,`id_produk_kategori`,`nama_produk`,`harga`,`stok`) values 
(1,1,'LUX GLOW & WHITENING NIGHT CREAM',55000,97),
(2,2,'LUX ACNE SERUM',75000,97),
(3,2,'LUX GLOW SERUM',75000,94),
(4,3,'LUX GLOW TONER',55000,97),
(5,1,'LUX ACNE CALMING NIGHT CREAM',55000,100),
(6,3,'LUX ACNE TONER',55000,100);

/*Table structure for table `produk_kategori` */

DROP TABLE IF EXISTS `produk_kategori`;

CREATE TABLE `produk_kategori` (
  `id_produk_kategori` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_produk_kategori`),
  KEY `id_produk_kategori` (`id_produk_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `produk_kategori` */

insert  into `produk_kategori`(`id_produk_kategori`,`nama_kategori`) values 
(1,'Night Cream'),
(2,'Serum'),
(3,'Toner');

/*Table structure for table `treatment` */

DROP TABLE IF EXISTS `treatment`;

CREATE TABLE `treatment` (
  `id_treatment` int(100) NOT NULL AUTO_INCREMENT,
  `id_customer` int(10) NOT NULL,
  `id_user` int(3) NOT NULL,
  `dokter` varchar(50) NOT NULL,
  `konsultasi` varchar(100) NOT NULL,
  `note` varchar(100) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_treatment`),
  KEY `id_treatment` (`id_treatment`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `treatment` */

insert  into `treatment`(`id_treatment`,`id_customer`,`id_user`,`dokter`,`konsultasi`,`note`,`tanggal`,`status`) values 
(7,1,1,'dr. Ullya Nor Rosyidah','Treatment 1','Catatan 1','2021-11-02 13:25:09',3);

/*Table structure for table `treatment_detail` */

DROP TABLE IF EXISTS `treatment_detail`;

CREATE TABLE `treatment_detail` (
  `id_treatment_detail` int(100) NOT NULL AUTO_INCREMENT,
  `id_treatment` int(100) NOT NULL,
  `id_produk` int(100) NOT NULL,
  `dosis` varchar(20) NOT NULL,
  PRIMARY KEY (`id_treatment_detail`),
  KEY `id_treatment_detail` (`id_treatment_detail`),
  KEY `id_treatment` (`id_treatment`),
  KEY `id_produk` (`id_produk`),
  CONSTRAINT `treatment_detail_ibfk_1` FOREIGN KEY (`id_treatment`) REFERENCES `treatment` (`id_treatment`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `treatment_detail` */

insert  into `treatment_detail`(`id_treatment_detail`,`id_treatment`,`id_produk`,`dosis`) values 
(1,7,1,'1pcs'),
(2,7,2,'2pcs'),
(3,7,3,'3pcs');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jk` varchar(9) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama_user`,`username`,`password`,`email`,`no_hp`,`jk`) values 
(1,'Volta Mega','volta','volta','voltamega@gmail.com','08122232111','Laki-laki');

/* Trigger structure for table `detail_penjualan` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `barang_keluar` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `barang_keluar` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN

   UPDATE produk SET stok = stok - NEW.jumlah
   WHERE id_produk = NEW.id_produk;

END */$$


DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
