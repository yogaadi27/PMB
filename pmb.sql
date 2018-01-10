-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 Agu 2017 pada 05.18
-- Versi Server: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pmb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `fullname`) VALUES
(1, 'admin', '$2y$10$y6c03I3NEko5qWME1LD4p.v89hEdux6LwXeMSe3M6bN6tXV066K/W', 'Administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda_tes`
--

CREATE TABLE IF NOT EXISTS `agenda_tes` (
`id` int(11) NOT NULL,
  `thak` year(4) NOT NULL,
  `nama_tes` varchar(150) NOT NULL,
  `mulai` varchar(10) NOT NULL,
  `sampai` varchar(10) NOT NULL,
  `tgl_tes` date NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agenda_tes`
--

INSERT INTO `agenda_tes` (`id`, `thak`, `nama_tes`, `mulai`, `sampai`, `tgl_tes`, `ket`) VALUES
(1, 2012, 'TES POTENSI AKADEMIK (TPA)', '07:00', '16:20', '2017-06-01', '- atk bawa sendiri<br>\r\n- harap hadir tepat waktu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE IF NOT EXISTS `informasi` (
`id_info` int(11) NOT NULL,
  `thak` year(4) NOT NULL,
  `info` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `informasi`
--

INSERT INTO `informasi` (`id_info`, `thak`, `info`, `created_at`) VALUES
(2, 2012, 'Bekali diri anda kompetensi untuk meningkatkan karier dan peluang usaha.', '2017-07-11 09:28:52'),
(3, 2012, 'Bergabunglah bersama Akademi Komunitas Negeri Nganjuk dengan pilihan Program Studi (Prodi) pilihan. ', '2017-07-14 14:08:23'),
(4, 2012, 'Pendaftaran telah dibuka...Ayo Daftarkan diri Anda Sekarang..!', '2017-07-17 18:48:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenjang`
--

CREATE TABLE IF NOT EXISTS `jenjang` (
`kode_jenjang` int(11) NOT NULL,
  `jenjang` varchar(5) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenjang`
--

INSERT INTO `jenjang` (`kode_jenjang`, `jenjang`, `created_at`) VALUES
(2, 'D2', '2017-06-17 16:29:57'),
(3, 'D3', '2017-06-17 16:30:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE IF NOT EXISTS `pendaftaran` (
`id_daftar` int(11) NOT NULL,
  `thak` year(4) NOT NULL,
  `nama_pendaftar` varchar(50) NOT NULL,
  `nisn` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jkel` enum('L','P') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `sekolah` varchar(50) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `email` varchar(100) NOT NULL,
  `prodi` varchar(10) NOT NULL,
  `nilai_un` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nilai_tes` decimal(4,2) NOT NULL,
  `input_tes_tgl` datetime NOT NULL,
  `daftar_tgl` datetime NOT NULL,
  `fc_ijazah` tinyint(1) NOT NULL,
  `fc_skhu` tinyint(1) NOT NULL,
  `pas_foto` tinyint(1) NOT NULL,
  `verifikasi_tgl` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_daftar`, `thak`, `nama_pendaftar`, `nisn`, `tgl_lahir`, `jkel`, `agama`, `sekolah`, `kota`, `alamat`, `no_hp`, `email`, `prodi`, `nilai_un`, `foto`, `nilai_tes`, `input_tes_tgl`, `daftar_tgl`, `fc_ijazah`, `fc_skhu`, `pas_foto`, `verifikasi_tgl`) VALUES
(3, 2012, 'VELA CUTIE', '12345', '2017-06-01', 'L', 'ISLAM', 'SMAN 1 KOTABARU', 'JAKARTA', 'JAKARTA PUSAT', '0876778545332', 'ADMIN@GMAIL.COM', 'MIF', 56, '3x4-Danamound.jpg', '9.99', '2017-06-29 19:36:05', '2017-06-29 00:00:00', 1, 1, 1, '2017-07-29 19:10:49'),
(8, 2012, 'GABRIEL IVAN HEINZE', '12345678', '1996-10-22', 'L', 'ISLAM', 'SMAN 1 BANDUNG', 'BANDUNG', 'JL.PANDAAN NO 12 ,BANDUNG', '09287987987', 'example@gmail.com', 'MIF', 68, '3x4-new.jpg', '9.99', '2017-07-11 18:57:27', '2017-07-11 18:44:39', 1, 1, 1, '2017-07-29 08:30:31'),
(10, 2012, 'BRUNO MARS', '545354355', '2017-07-20', 'L', 'KRISTEN', 'SMAN 1 BANDUNG', 'BANDUNG', 'CALIFORNIA', '09977867655', 'example@gmail.com', 'TIP', 66, '3x4_(38)1.jpg', '31.00', '2017-07-12 09:13:47', '2017-07-12 09:12:33', 1, 1, 0, '2017-07-29 08:31:21'),
(11, 2012, 'BRUNO MARS 1', '545354355A', '2017-07-20', 'L', 'KRISTEN', 'SMAN 1 BANDUNG', 'BANDUNG', 'CALIFORNIA', '09977867655', 'example@gmail.com', 'TIP', 66, '3x4_(38)2.jpg', '0.00', '2017-07-12 09:13:51', '2017-07-12 09:13:01', 1, 1, 1, '2017-08-01 11:26:15'),
(13, 2012, 'JACK THE RIPPERJACK THE RIPPER', '3243454543', '2017-07-04', 'L', 'ISLAM', 'SMAN 1 BANDUNG', 'BANDUNG', 'JL. MELBAOURNE NO:12 ,SYDNEY', '09383676476', 'example@gmail.com', 'MIF', 66, 'cow2.jpg', '57.87', '2017-07-13 21:01:19', '2017-07-13 10:49:53', 0, 0, 0, '0000-00-00 00:00:00'),
(17, 2012, 'HUGO', '768768754', '2017-07-08', 'L', 'ISLAM', 'SMAN 1 NGANJUK', 'NGANJUK', 'NGANJUK', '09887878657', 'example@gmail.com', 'TIP', 58, '3x4-new2.jpg', '94.00', '2017-07-27 16:06:22', '2017-07-27 16:04:33', 0, 0, 0, '0000-00-00 00:00:00'),
(18, 2012, 'HUGO', '768768754768', '2017-07-08', 'P', 'ISLAM', 'SMAN 1 NGANJUK', 'NGANJUK', 'NGANJUK', '09887878657', 'example@gmail.com', 'TIP', 58, '3x4-Danamound1.jpg', '94.00', '2017-07-27 16:06:27', '2017-07-27 16:05:07', 0, 0, 0, '0000-00-00 00:00:00'),
(19, 2012, 'FIA VELISA', '76843454768', '2017-07-08', 'P', 'ISLAM', 'SMAN 1 NGANJUK', 'NGANJUK', 'NGANJUK 79', '09887878657', 'example@gmail.com', 'MIF', 55, '3x4-Danamound2.jpg', '99.99', '2017-07-27 16:06:35', '2017-07-27 16:05:51', 0, 0, 0, '0000-00-00 00:00:00'),
(20, 2012, 'YOGA ADI NUGRAHA', '8372948274', '2017-07-19', 'L', 'ISLAM', 'SMAN 1 NGANJUK', 'NGANJUK', 'JL.PANDAN ,KRMAT,NGANJUK', '09873276387', 'example@gmail.com', 'MIF', 89, '3x4-new4.jpg', '89.99', '2017-07-27 18:29:32', '2017-07-27 18:27:29', 0, 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `kode_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(40) NOT NULL,
  `kuota` int(3) NOT NULL,
  `created_at` datetime NOT NULL,
  `jenjang_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`kode_prodi`, `nama_prodi`, `kuota`, `created_at`, `jenjang_id`) VALUES
('MIF', 'MANAJEMEN INFORMATIKA', 3, '2017-06-18 09:58:26', 2),
('TIP', 'TEKNOLOGI INDUSTRI PANGAN ', 5, '2017-06-18 11:32:25', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `thak`
--

CREATE TABLE IF NOT EXISTS `thak` (
  `thak` year(4) NOT NULL,
  `tahun_ajaran` varchar(12) NOT NULL,
  `status` enum('Aktif','Nonaktif') NOT NULL,
  `ket` enum('Dibuka','Ditutup') NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `thak`
--

INSERT INTO `thak` (`thak`, `tahun_ajaran`, `status`, `ket`, `created_at`) VALUES
(2012, ' 2012/2013', 'Aktif', 'Dibuka', '2017-06-19 17:01:00'),
(2018, ' 2018/2019', 'Nonaktif', 'Ditutup', '2017-07-27 18:46:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `agenda_tes`
--
ALTER TABLE `agenda_tes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
 ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
 ADD PRIMARY KEY (`kode_jenjang`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
 ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
 ADD PRIMARY KEY (`kode_prodi`);

--
-- Indexes for table `thak`
--
ALTER TABLE `thak`
 ADD PRIMARY KEY (`thak`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `agenda_tes`
--
ALTER TABLE `agenda_tes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenjang`
--
ALTER TABLE `jenjang`
MODIFY `kode_jenjang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
