-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `dinas`;

DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

TRUNCATE `banner`;
INSERT INTO `banner` (`id`, `url`, `created_at`, `updated_at`) VALUES
(2,	'./temp/banner/93784fb6d98a3ffec1510e7e65489f3f.png',	'2022-11-11 02:58:31',	NULL),
(4,	'./temp/banner/2f70ca42abb96e697470416b85811d71.png',	'0000-00-00 00:00:00',	NULL);

DROP TABLE IF EXISTS `dinas`;
CREATE TABLE `dinas` (
  `dinas_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_dinas` varchar(200) NOT NULL,
  PRIMARY KEY (`dinas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

TRUNCATE `dinas`;
INSERT INTO `dinas` (`dinas_id`, `nama_dinas`) VALUES
(1,	'Dinas Pertanian'),
(2,	'Dinas Perikanan');

DROP TABLE IF EXISTS `informasi`;
CREATE TABLE `informasi` (
  `informasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(200) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `author` varchar(200) NOT NULL,
  `tanggal` datetime NOT NULL,
  `thumbnail` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`informasi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

TRUNCATE `informasi`;
INSERT INTO `informasi` (`informasi_id`, `judul`, `kategori_id`, `deskripsi`, `author`, `tanggal`, `thumbnail`, `status`) VALUES
(7,	'Voluptas similique e',	4,	'Itaque occaecat qui',	'5',	'2022-11-07 23:16:41',	'File-221110-60ff3389bd.jpg',	'Publish'),
(8,	'Dolorem ipsam vel as',	2,	'Nisi provident labo',	'5',	'2022-11-07 23:28:38',	'File-221110-f9d13d8163.jpg',	'Publish'),
(9,	'Qui qui non et incid2',	3,	'Voluptas doloremque',	'5',	'2022-11-08 15:52:23',	'File-221110-aa3a5c7040.jpg',	'Publish'),
(10,	'Architecto voluptatu',	2,	'Culpa vero minima eu',	'5',	'2022-11-09 07:55:37',	'File-221110-17eb121ec4.jpg',	'Publish'),
(14,	'Repudiandae voluptat',	1,	'Soluta reprehenderit',	'5',	'2022-11-09 08:04:07',	'File-221110-f7651a4311.jpg',	'Publish');

DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(200) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

TRUNCATE `kategori`;
INSERT INTO `kategori` (`kategori_id`, `nama_kategori`) VALUES
(1,	'Jadwal Transportasi'),
(2,	'Pertanian'),
(3,	'Perdagangan'),
(4,	'Umum');

DROP TABLE IF EXISTS `komoditas`;
CREATE TABLE `komoditas` (
  `komoditas_id` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_update` date NOT NULL,
  `produk_id` int(11) NOT NULL,
  `user_dinas_id` int(11) NOT NULL,
  `stok` float(11,2) NOT NULL,
  `rencana_produksi` float(11,2) NOT NULL,
  `ketahanan_bulanan` int(11) NOT NULL,
  `bulan_tahun` varchar(50) NOT NULL,
  `data_minggu` int(11) NOT NULL,
  `jml_produksi_minggu` float(11,2) NOT NULL,
  `harga_dari_produsen` int(11) NOT NULL,
  `harga_pedagang` int(11) DEFAULT NULL,
  `user_validasi_harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`komoditas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

TRUNCATE `komoditas`;
INSERT INTO `komoditas` (`komoditas_id`, `tgl_update`, `produk_id`, `user_dinas_id`, `stok`, `rencana_produksi`, `ketahanan_bulanan`, `bulan_tahun`, `data_minggu`, `jml_produksi_minggu`, `harga_dari_produsen`, `harga_pedagang`, `user_validasi_harga`) VALUES
(8,	'1997-03-13',	1,	5,	8.30,	8.30,	14,	'1994-05',	37,	8.30,	1000,	90000,	5);

DROP TABLE IF EXISTS `kontak`;
CREATE TABLE `kontak` (
  `kontak_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  PRIMARY KEY (`kontak_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

TRUNCATE `kontak`;
INSERT INTO `kontak` (`kontak_id`, `nama`, `email`, `telpon`, `judul`, `deskripsi`) VALUES
(1,	'Provident et sint c',	'pyca@mailinator.com',	'Cupiditate faci',	'Incidunt labore dig',	'Iusto dolore beatae'),
(2,	'Hanna James',	'hycakuk@mailinator.com',	'Adipisci cupidi',	'Ullamco et nobis opt',	'Eligendi deserunt no'),
(3,	'Eliana Gaines',	'pexilurak@mailinator.com',	'In aut nisi con',	'Quaerat est labore ',	'Sapiente obcaecati q'),
(4,	'Keith Mcgowan',	'qerefex@mailinator.com',	'Necessitatibus ',	'Soluta provident re',	'Obcaecati irure do c');

DROP TABLE IF EXISTS `produk`;
CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  PRIMARY KEY (`produk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

TRUNCATE `produk`;
INSERT INTO `produk` (`produk_id`, `kode_produk`, `nama_produk`) VALUES
(1,	'P001',	'CABE'),
(2,	'P002',	'JAGUNG'),
(3,	'P003',	'BERAS');

DROP TABLE IF EXISTS `setting_website`;
CREATE TABLE `setting_website` (
  `setting_website` int(11) NOT NULL AUTO_INCREMENT,
  `nama_website` varchar(200) NOT NULL,
  `logo_dark` varchar(200) NOT NULL,
  `logo_light` varchar(200) NOT NULL,
  `telpon` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `about_us` text NOT NULL,
  `url_fb` varchar(200) NOT NULL,
  `url_yt` varchar(200) NOT NULL,
  `url_ig` varchar(200) NOT NULL,
  `url_twitter` varchar(200) NOT NULL,
  `peta_lokasi` text NOT NULL,
  PRIMARY KEY (`setting_website`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

TRUNCATE `setting_website`;
INSERT INTO `setting_website` (`setting_website`, `nama_website`, `logo_dark`, `logo_light`, `telpon`, `email`, `alamat`, `about_us`, `url_fb`, `url_yt`, `url_ig`, `url_twitter`, `peta_lokasi`) VALUES
(1,	'Aplikasi SIPIT',	'File-221110-206c6fe6db.png',	'File-221110-730a9035ae.png',	'083874731480',	'admin@mailinator.com',	'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.',	'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.',	'https://www.facebook.com/muhammadramdan599',	'https://www.youtube.com/watch?v=roVHXJB1iSw',	'https://www.facebook.com/muhammadramdan599',	'https://www.facebook.com/muhammadramdan599',	'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.4173704181176!2d106.75508491471793!3d-6.468695795320366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c29cd0b7aa8f:0xf4474b1251ae42a0!2sSAI Residence!5e0!3m2!1sid!2sid!4v1668071544370!5m2!1sid!2sid');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_id` int(2) NOT NULL COMMENT '1:admin,2:supervisor,3:pegawai',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4;

TRUNCATE `user`;
INSERT INTO `user` (`user_id`, `username`, `password`, `level_id`) VALUES
(24,	'22008962',	'356a192b7913b04c54574d18c28d46e6395428ab',	2),
(32,	'22008960',	'356a192b7913b04c54574d18c28d46e6395428ab',	2),
(33,	'22008961',	'356a192b7913b04c54574d18c28d46e6395428ab',	2),
(34,	'33002551',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(35,	'33002552',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(36,	'33002550',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(37,	'33002549',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(38,	'33002548',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(39,	'33002547',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(40,	'33002546',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(41,	'33002545',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(42,	'33002544',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(43,	'33002543',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(44,	'33002542',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(45,	'33002541',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(46,	'33002540',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(47,	'33002539',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(48,	'33002538',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(49,	'33002537',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(50,	'33002536',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(52,	'33002534',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(53,	'33002533',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(54,	'33002532',	'356a192b7913b04c54574d18c28d46e6395428ab',	3),
(55,	'admin',	'd033e22ae348aeb5660fc2140aec35850c4da997',	1);

DROP TABLE IF EXISTS `user_dinas`;
CREATE TABLE `user_dinas` (
  `user_dinas_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dinas_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `no_telpon` varchar(200) NOT NULL,
  `kelompok` varchar(200) DEFAULT NULL,
  `can_input_informasi` varchar(10) NOT NULL DEFAULT 'Tidak',
  `can_input_komoditas` varchar(10) NOT NULL DEFAULT 'Tidak',
  `can_update_harga` varchar(10) NOT NULL DEFAULT 'Tidak',
  PRIMARY KEY (`user_dinas_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

TRUNCATE `user_dinas`;
INSERT INTO `user_dinas` (`user_dinas_id`, `username`, `password`, `dinas_id`, `email`, `no_telpon`, `kelompok`, `can_input_informasi`, `can_input_komoditas`, `can_update_harga`) VALUES
(5,	'ramdan',	'd033e22ae348aeb5660fc2140aec35850c4da997',	1,	'wowyhesuwe@mailinator.com',	'Ipsum explicabo Qu',	'Qui in qui exercitat',	'Ya',	'Ya',	'Ya');

-- 2022-11-12 02:32:09
