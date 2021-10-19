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
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `customer` */

/*Table structure for table `detail_penjualan` */

DROP TABLE IF EXISTS `detail_penjualan`;

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(100) NOT NULL AUTO_INCREMENT,
  `id_penjualan` int(100) NOT NULL,
  `id_produk` int(100) NOT NULL,
  `harga_satuan` int(5) NOT NULL,
  `jumlah` int(3) NOT NULL,
  PRIMARY KEY (`id_detail_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_penjualan` */

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `id_penjualan` int(100) NOT NULL AUTO_INCREMENT,
  `id_treatment` int(100) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(5) NOT NULL,
  PRIMARY KEY (`id_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penjualan` */

/*Table structure for table `produk` */

DROP TABLE IF EXISTS `produk`;

CREATE TABLE `produk` (
  `id_produk` int(100) NOT NULL AUTO_INCREMENT,
  `id_produk_kategori` int(3) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(5) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `produk` */

/*Table structure for table `produk_kategori` */

DROP TABLE IF EXISTS `produk_kategori`;

CREATE TABLE `produk_kategori` (
  `id_produk_kategori` int(3) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) NOT NULL,
  PRIMARY KEY (`id_produk_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `produk_kategori` */

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
  PRIMARY KEY (`id_treatment`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `treatment` */

/*Table structure for table `treatment_detail` */

DROP TABLE IF EXISTS `treatment_detail`;

CREATE TABLE `treatment_detail` (
  `id_treatment_detail` int(100) NOT NULL AUTO_INCREMENT,
  `id_treatment` int(100) NOT NULL,
  `id_produk` int(100) NOT NULL,
  `dosis` varchar(20) NOT NULL,
  PRIMARY KEY (`id_treatment_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `treatment_detail` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `jk` varchar(9) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama_user`,`username`,`email`,`no_hp`,`jk`) values 
(1,'Volta Mega','voltamega','voltamega@gmail.com','08122232111','Laki-laki');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
