-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 15 Jun 2022 pada 03.53
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kpi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `departemen_id` int(11) NOT NULL,
  `kode_departemen` varchar(20) NOT NULL,
  `nama_departemen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`departemen_id`, `kode_departemen`, `nama_departemen`) VALUES
(4, 'D0001', 'HC'),
(5, 'D0002', 'DEV IT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_login`
--

CREATE TABLE `history_login` (
  `history_login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `info` text NOT NULL,
  `user_agent` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history_login`
--

INSERT INTO `history_login` (`history_login_id`, `user_id`, `info`, `user_agent`, `tanggal`) VALUES
(12, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 07:51:09'),
(13, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 08:05:05'),
(14, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 08:51:31'),
(15, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 08:51:41'),
(16, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 08:52:04'),
(17, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 08:52:43'),
(18, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 10:16:12'),
(19, 5, 'superadmin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 10:23:26'),
(20, 5, 'superadmin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 10:26:01'),
(21, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 10:28:45'),
(22, 5, 'superadmin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 10:32:16'),
(23, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 10:48:27'),
(24, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 11:20:19'),
(25, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 14:49:34'),
(26, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 15:13:16'),
(27, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 15:35:35'),
(28, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-11 16:09:22'),
(29, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-12 14:09:10'),
(30, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-12 14:47:12'),
(31, 8, 'supervisor Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-12 14:50:40'),
(32, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-12 14:57:58'),
(33, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-12 15:12:55'),
(34, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-12 15:17:58'),
(35, 12, '2017310023 Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-12 15:37:49'),
(36, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-12 15:38:43'),
(37, 12, '2017310023 Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-12 15:48:29'),
(38, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-12 15:49:11'),
(39, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-13 04:44:09'),
(40, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-13 07:36:07'),
(41, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-13 10:27:40'),
(42, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-14 08:49:02'),
(43, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-14 08:49:35'),
(44, 12, '2017310023 Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-14 10:48:05'),
(45, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-14 16:48:58'),
(46, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-14 16:49:35'),
(47, 12, '2017310023 Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-14 19:10:47'),
(48, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-15 01:59:48'),
(49, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-15 02:06:25'),
(50, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-15 03:09:54'),
(51, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-15 03:19:37'),
(52, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-15 03:21:46'),
(53, 1, 'admin Telah melakukan login', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.0.0 Safari/537.36', '2022-06-15 03:22:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(11) NOT NULL,
  `kode_jabatan` varchar(20) NOT NULL,
  `nama_jabatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `kode_jabatan`, `nama_jabatan`) VALUES
(1, 'J0001', 'Supervisor'),
(2, 'J0002', 'Pegawai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `karyawan_id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama_karyawan` varchar(200) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `departemen_id` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `no_telpon` varchar(50) NOT NULL,
  `status_karyawan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`karyawan_id`, `nik`, `nama_karyawan`, `jabatan_id`, `departemen_id`, `alamat`, `jenis_kelamin`, `tanggal_lahir`, `tanggal_masuk`, `no_telpon`, `status_karyawan`) VALUES
(5, '2017310023', 'Muhammad Saeful Ramdan', 1, 5, 'Bogor', 'Laki-laki', '2022-06-12', '2022-06-12', '083874731480', 'Aktif'),
(9, '123', 'Muhammad Saeful Ramdan', 2, 5, 'Bogor', 'Laki-laki', '2022-06-15', '2022-06-15', '083874731480', 'Aktif'),
(10, '9090', 'Anisa', 2, 5, 'XXX', 'Perempuan', '2022-06-16', '2022-06-08', '083874731480', 'Aktif'),
(11, '1000', 'Abyan', 2, 5, 'Bogor', 'Laki-laki', '2022-06-15', '2022-06-15', '083874731480', 'Aktif'),
(12, '456', 'Rahmawati', 2, 4, 'xxxx', 'Perempuan', '2022-06-16', '2022-06-15', '083874731480', 'Aktif'),
(13, 'Modi aspernatur vel', 'Maiores ut anim quid', 1, 4, 'Reprehenderit ut qu', 'Laki-laki', '2015-04-24', '2009-05-27', 'Esse nostrum sed cul', 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kode_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kode_kategori`, `nama_kategori`, `bobot`) VALUES
(6, 'K0001', 'Kualitas Kerja', 10),
(7, 'K0002', 'Kuantitas Kerja', 10),
(8, 'K0003', 'Inisiatif', 10),
(9, 'K0004', 'Disiplin', 10),
(10, 'K0005', 'Tanggung Jawab', 10),
(11, 'K0006', 'Motivasi', 10),
(12, 'K0007', 'Kerjasama', 10),
(13, 'K0008', 'Pemahaman Terhadap Tugas', 10),
(14, 'K0009', 'Pemecahan Masalah', 10),
(15, 'K0010', 'Penyesuaian DIri', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `laporan_id` int(11) NOT NULL,
  `kode_laporan` varchar(50) NOT NULL,
  `jenis_laporan` varchar(100) NOT NULL,
  `nama_laporan` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `nama_terlapor` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`laporan_id`, `kode_laporan`, `jenis_laporan`, `nama_laporan`, `tanggal`, `deskripsi`, `photo`, `status`, `nama_terlapor`) VALUES
(5, 'LAP/2022/0001', 'Aduan', 'test', '2022-06-11', 'test', 'File-220611-6361d1f2ba.PNG', 'In Review', NULL),
(6, 'LAP/2022/0002', 'Saran', 'test', '2022-06-11', 'test', 'File-220611-6361d1f2ba.PNG', 'In Review', NULL),
(7, 'LAP/2022/0003', 'Keluhan', 'test', '2022-06-11', 'test', 'File-220611-6361d1f2ba.PNG', 'In Review', NULL),
(8, 'LAP/2022/0004', 'Aduan', 'anisa', '2022-06-11', 'anisa', 'File-220611-8520250a0f.jpg', 'In Review', 'ramdan'),
(9, 'LAP/2022/0005', 'Keluhan', 'fdsf', '2022-06-11', 'fdsf', 'File-220611-8b4a75ac4e', 'In Review', ''),
(10, 'LAP/2022/0006', 'Keluhan', 'dsa', '2022-06-12', 'dsad', 'File-220612-0b607e60d7', 'In Review', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `nilai_id` int(11) NOT NULL,
  `priode` varchar(11) NOT NULL,
  `karyawan_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `penilai_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`nilai_id`, `priode`, `karyawan_id`, `kategori_id`, `nilai`, `penilai_id`) VALUES
(30, '2022-06', 9, 6, 6, 1),
(31, '2022-06', 10, 6, 7, 1),
(32, '2022-06', 11, 6, 8, 1),
(33, '2022-06', 12, 6, 7, 1),
(34, '2022-06', 9, 7, 5, 1),
(35, '2022-06', 10, 7, 6, 1),
(36, '2022-06', 11, 7, 7, 1),
(37, '2022-06', 12, 7, 8, 1),
(38, '2022-06', 9, 8, 8, 1),
(39, '2022-06', 10, 8, 9, 1),
(40, '2022-06', 11, 8, 5, 1),
(41, '2022-06', 12, 8, 4, 1),
(42, '2022-06', 9, 9, 8, 1),
(43, '2022-06', 10, 9, 7, 1),
(44, '2022-06', 11, 9, 7, 1),
(45, '2022-06', 12, 9, 6, 1),
(46, '2022-06', 9, 10, 9, 1),
(47, '2022-06', 10, 10, 7, 1),
(48, '2022-06', 11, 10, 9, 1),
(49, '2022-06', 12, 10, 8, 1),
(50, '2022-06', 9, 11, 7, 1),
(51, '2022-06', 10, 11, 7, 1),
(52, '2022-06', 11, 11, 7, 1),
(53, '2022-06', 12, 11, 7, 1),
(54, '2022-06', 9, 12, 8, 1),
(55, '2022-06', 10, 12, 8, 1),
(56, '2022-06', 11, 12, 9, 1),
(57, '2022-06', 12, 12, 9, 1),
(58, '2022-06', 9, 13, 7, 1),
(59, '2022-06', 10, 13, 6, 1),
(60, '2022-06', 11, 13, 8, 1),
(61, '2022-06', 12, 13, 6, 1),
(62, '2022-06', 9, 14, 9, 1),
(63, '2022-06', 10, 14, 7, 1),
(64, '2022-06', 11, 14, 8, 1),
(65, '2022-06', 12, 14, 9, 1),
(66, '2022-06', 9, 15, 7, 1),
(67, '2022-06', 10, 15, 6, 1),
(68, '2022-06', 11, 15, 9, 1),
(69, '2022-06', 12, 15, 7, 1),
(70, '2022-07', 9, 6, 8, 1),
(71, '2022-07', 10, 6, 8, 1),
(72, '2022-07', 11, 6, 8, 1),
(73, '2022-07', 12, 6, 8, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level_id` int(2) NOT NULL COMMENT '1:admin,2:supervisor,3:pegawai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `level_id`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(12, '2017310023', 'eb8ee16ff78065b3426fb747c4201ac26b2fcc4e', 2),
(15, '123', '648112a5c2c2f6e10627d6635fbac010884f1def', 3),
(16, '9090', '648112a5c2c2f6e10627d6635fbac010884f1def', 3),
(17, '1000', 'c82d0d61d09a320743d6602a998b3d48a0ac4f82', 3),
(18, '456', '648112a5c2c2f6e10627d6635fbac010884f1def', 3),
(19, 'Modi aspernatur vel', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`departemen_id`);

--
-- Indeks untuk tabel `history_login`
--
ALTER TABLE `history_login`
  ADD PRIMARY KEY (`history_login_id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`laporan_id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`nilai_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `nilai_ibfk_1` (`karyawan_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `departemen`
--
ALTER TABLE `departemen`
  MODIFY `departemen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `history_login`
--
ALTER TABLE `history_login`
  MODIFY `history_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `karyawan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `laporan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `nilai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`karyawan_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`kategori_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
