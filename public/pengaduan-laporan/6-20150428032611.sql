-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2015 at 03:26 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ppl_pengaduan`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_04_05_055228_create_user_table', 1),
('2015_04_05_055229_create_masyarakat_table', 1),
('2015_04_05_055245_create_status_table', 1),
('2015_04_05_055304_create_skpd_table', 1),
('2015_04_05_061705_create_admin_table', 1),
('2015_04_05_071444_create_kategori_table', 1),
('2015_04_05_071505_create_penanggungjawab_table', 1),
('2015_04_05_071521_create_pengaduan_table', 1),
('2015_04_05_074252_create_komentar_table', 1),
('2015_04_05_105004_add_slug_to_pengaduan_table', 2),
('2014_10_12_000000_create_users_table', 3),
('2014_10_12_100000_create_password_resets_table', 3),
('2015_04_05_223320_create_kategoris_table', 4),
('2015_04_05_225100_create_statuses_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ppl_citizenreport_admin`
--

CREATE TABLE IF NOT EXISTS `ppl_citizenreport_admin` (
  `id_user` int(10) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `admin_id_user_unique` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ppl_citizenreport_admin`
--

INSERT INTO `ppl_citizenreport_admin` (`id_user`, `nama`, `created_at`, `updated_at`) VALUES
(25, 'admin', '2015-04-20 17:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ppl_citizenreport_kategori`
--

CREATE TABLE IF NOT EXISTS `ppl_citizenreport_kategori` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `ppl_citizenreport_kategori`
--

INSERT INTO `ppl_citizenreport_kategori` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`) VALUES
(4, 'Infrastruktur Umum', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00'),
(5, 'Kependudukan', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00'),
(6, 'Kesehatan', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00'),
(7, 'Komunikasi dan Informasi', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00'),
(8, 'Perdagangan dan Perindustrian', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00'),
(9, 'Perpajakan', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00'),
(10, 'Pertamanan dan Pemakaman', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00'),
(11, 'Pendidikan', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00'),
(12, 'Transportasi/Perhubungan', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00'),
(13, 'Sosial', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00'),
(14, 'Tata Ruang dan Bangunan', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00'),
(15, 'Ketenagakerjaan', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00'),
(16, 'Ketetertiban dan Ketentraman Lingkungan', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00'),
(17, 'Kriminal dan Keamanan', NULL, '2015-04-06 06:47:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ppl_citizenreport_komentar`
--

CREATE TABLE IF NOT EXISTS `ppl_citizenreport_komentar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_pengaduan` int(10) unsigned NOT NULL,
  `id_komentator` int(10) unsigned NOT NULL,
  `komentar` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `komentar_id_pengaduan_foreign` (`id_pengaduan`),
  KEY `komentar_id_komentator_foreign` (`id_komentator`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ppl_citizenreport_masyarakat`
--

CREATE TABLE IF NOT EXISTS `ppl_citizenreport_masyarakat` (
  `id_user` int(10) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `NIK` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `masyarakat_id_user_unique` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ppl_citizenreport_masyarakat`
--

INSERT INTO `ppl_citizenreport_masyarakat` (`id_user`, `nama`, `NIK`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Ridwan Kamil', '1234567890123', 'Jl Dago No 1, Bandung', '2015-04-05 15:36:17', '2015-04-05 15:36:17'),
(2, 'Mario Filino', '192837456592011', 'Jl. Dago no. 999, Bandung', '2015-04-06 13:20:39', '2015-04-06 13:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `ppl_citizenreport_penanggungjawab`
--

CREATE TABLE IF NOT EXISTS `ppl_citizenreport_penanggungjawab` (
  `id_kategori` int(10) unsigned NOT NULL,
  `id_skpd` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id_kategori`,`id_skpd`),
  KEY `penanggungjawab_id_skpd_foreign` (`id_skpd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ppl_citizenreport_penanggungjawab`
--

INSERT INTO `ppl_citizenreport_penanggungjawab` (`id_kategori`, `id_skpd`, `created_at`, `updated_at`) VALUES
(4, 2, '2015-04-06 09:08:35', '0000-00-00 00:00:00'),
(5, 5, '2015-04-06 09:08:35', '0000-00-00 00:00:00'),
(6, 6, '2015-04-06 09:08:35', '0000-00-00 00:00:00'),
(7, 10, '2015-04-06 09:08:35', '0000-00-00 00:00:00'),
(8, 11, '2015-04-06 09:08:35', '0000-00-00 00:00:00'),
(9, 12, '2015-04-06 09:08:35', '0000-00-00 00:00:00'),
(10, 13, '2015-04-06 09:08:35', '0000-00-00 00:00:00'),
(11, 15, '2015-04-06 09:11:59', '0000-00-00 00:00:00'),
(12, 17, '2015-04-06 09:11:59', '0000-00-00 00:00:00'),
(13, 19, '2015-04-06 09:11:59', '0000-00-00 00:00:00'),
(14, 20, '2015-04-06 09:11:59', '0000-00-00 00:00:00'),
(15, 21, '2015-04-06 09:11:59', '0000-00-00 00:00:00'),
(16, 22, '2015-04-06 09:11:59', '0000-00-00 00:00:00'),
(17, 23, '2015-04-06 09:11:59', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ppl_citizenreport_pengaduan`
--

CREATE TABLE IF NOT EXISTS `ppl_citizenreport_pengaduan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_kategori` int(10) unsigned NOT NULL,
  `lampiran` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `id_masyarakat` int(10) unsigned NOT NULL,
  `id_status` int(10) unsigned NOT NULL,
  `komentar_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `laporan` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `feedback` text COLLATE utf8_unicode_ci,
  `komentar_feedback` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pengaduan_slug_unique` (`slug`),
  KEY `pengaduan_id_kategori_foreign` (`id_kategori`),
  KEY `pengaduan_id_masyarakat_foreign` (`id_masyarakat`),
  KEY `pengaduan_id_status_foreign` (`id_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=55 ;

--
-- Dumping data for table `ppl_citizenreport_pengaduan`
--

INSERT INTO `ppl_citizenreport_pengaduan` (`id`, `judul`, `id_kategori`, `lampiran`, `gambar`, `deskripsi`, `id_masyarakat`, `id_status`, `komentar_status`, `laporan`, `feedback`, `komentar_feedback`, `created_at`, `updated_at`, `slug`) VALUES
(19, 'Banjir di Bantaran Sungai Cikapundung ', 4, 'NULL', 'NULL', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 1, NULL, NULL, NULL, NULL, '2015-04-12 04:52:10', '2015-04-20 19:20:50', 'banjir-di-bantaran-sungai-cikapundung'),
(23, 'Macet Parah di Depan Mall BIP', 12, 'NULL', 'NULL', '<p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Aenean lacinia bibendum nulla sed consectetur. Maecenas faucibus mollis interdum. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Maecenas faucibus mollis interdum.\r\n</p>\r\n<p>\r\nNullam quis risus eget urna mollis ornare vel eu leo. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Donec sed odio dui. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Sed posuere consectetur est at lobortis. Vestibulum id ligula porta felis euismod semper. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur blandit tempus porttitor. Vestibulum id ligula porta felis euismod semper. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui.</p>', 2, 2, NULL, NULL, NULL, NULL, '2015-04-12 05:09:37', '2015-04-12 05:09:37', 'macet-parah-di-depan-mall-bip'),
(33, 'Banyak Preman di Terminal Leuwipanjang', 16, 'NULL', 'NULL', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula ut id elit. Maecenas faucibus mollis interdum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\n</p>\r\n<p>\r\nNullam id dolor id nibh ultricies vehicula ut id elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.\r\n</p>\r\n<p>\r\nAenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Sed posuere consectetur est at lobortis. Curabitur blandit tempus porttitor. Cras mattis consectetur purus sit amet fermentum.\r\n</p>\r\n<p>\r\nDonec ullamcorper nulla non metus auctor fringilla. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a pharetra augue. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nulla vitae elit libero, a pharetra augue.</p>', 2, 3, NULL, NULL, NULL, NULL, '2015-04-12 05:23:10', '2015-04-12 05:23:10', 'banyak-preman-di-terminal-leuwipanjang'),
(34, 'Jalan di Cisitu Banyak yang Berlubang', 4, 'NULL', 'NULL', '</p>\r\nMorbi leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id elit non mi porta gravida at eget metus. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.\r\n</p>\r\n<p>\r\nPraesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam quis risus eget urna mollis ornare vel eu leo. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui.\r\n</p>\r\n<p>\r\nPraesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Donec ullamcorper nulla non metus auctor fringilla. Aenean lacinia bibendum nulla sed consectetur. Donec id elit non mi porta gravida at eget metus. Donec sed odio dui.\r\n<p>\r\n', 2, 4, NULL, NULL, NULL, NULL, '2015-04-12 05:25:05', '2015-04-12 05:25:05', 'jalan-di-cisitu-banyak-yang-berlubang'),
(35, 'Parkir Liar Tolong Ditertibkan di Jalan ABC', 12, 'NULL', 'NULL', '</p>\r\nMorbi leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec id elit non mi porta gravida at eget metus. Donec sed odio dui. Cras mattis consectetur purus sit amet fermentum. Nullam quis risus eget urna mollis ornare vel eu leo. Nullam id dolor id nibh ultricies vehicula ut id elit.\r\n</p>\r\n<p>\r\nPraesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam quis risus eget urna mollis ornare vel eu leo. Nulla vitae elit libero, a pharetra augue. Donec sed odio dui.\r\n</p>\r\n<p>\r\nPraesent commodo cursus magna, vel scelerisque nisl consectetur et. Etiam porta sem malesuada magna mollis euismod. Donec ullamcorper nulla non metus auctor fringilla. Aenean lacinia bibendum nulla sed consectetur. Donec id elit non mi porta gravida at eget metus. Donec sed odio dui.\r\n<p>\r\n', 2, 5, NULL, NULL, NULL, NULL, '2015-04-12 05:26:30', '2015-04-12 05:26:30', 'parkir-liar-tolong-ditertibkan-di-jalan-abc'),
(36, 'Lampu di Sepanjang Jalan Dago Mati', 12, 'NULL', 'NULL', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 6, NULL, NULL, NULL, NULL, '2015-04-12 05:39:13', '2015-04-12 05:39:13', 'lampu-di-sepanjang-jalan-dago-mati'),
(37, 'Bikin E-KTP Lama Jadinya', 5, 'NULL', '2-20150412124506.jpg', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 6, NULL, NULL, NULL, NULL, '2015-04-12 05:45:07', '2015-04-12 05:45:07', 'bikin-e-ktp-lama-jadinya'),
(38, 'Pelayanan BPJS di RSHS Mengecewakan', 6, 'NULL', '2-20150412124538.jpg', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 3, NULL, NULL, NULL, NULL, '2015-04-12 05:45:38', '2015-04-12 05:45:38', 'pelayanan-bpjs-di-rshs-mengecewakan'),
(39, 'Layanan WiFi BandungJuara di Dago Mati', 7, 'NULL', '2-20150412124627.jpg', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 4, NULL, NULL, NULL, NULL, '2015-04-12 05:46:27', '2015-04-12 05:46:27', 'layanan-wifi-bandungjuara-di-dago-mati'),
(40, 'Pengurusan SIUP Tidak Kunjung Selesai', 8, 'NULL', '2-20150412124700.jpg', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 2, NULL, NULL, NULL, NULL, '2015-04-12 05:47:00', '2015-04-12 05:47:00', 'pengurusan-siup-tidak-kunjung-selesai'),
(41, 'Banyak Calo Berkeliaran Saat Membayar Pajak', 9, 'NULL', '2-20150412124733.jpg', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 3, NULL, NULL, NULL, NULL, '2015-04-12 05:47:33', '2015-04-12 05:47:33', 'banyak-calo-berkeliaran-saat-membayar-pajak'),
(42, 'Lahan Kuburan Semakin Mahal dan Susah', 10, 'NULL', '2-20150412124803.jpg', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 5, NULL, NULL, NULL, NULL, '2015-04-12 05:48:03', '2015-04-12 05:48:03', 'lahan-kuburan-semakin-mahal-dan-susah'),
(43, 'Kekurangan Tenaga Pengajar di SDN 01 Sadang Serang', 11, 'NULL', '2-20150412124908.jpg', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 5, NULL, NULL, NULL, NULL, '2015-04-12 05:49:08', '2015-04-12 05:49:08', 'kekurangan-tenaga-pengajar-di-sdn-01-sadang-serang'),
(44, 'Pengamen dan Pengemis Berkeliaran di Pasar Baru', 13, 'NULL', '2-20150412124942.jpg', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 4, NULL, NULL, NULL, NULL, '2015-04-12 05:49:42', '2015-04-12 05:49:42', 'pengamen-dan-pengemis-berkeliaran-di-pasar-baru'),
(45, 'Polusi Akibat Pembangunan Mall BEC yang Baru', 14, 'NULL', '2-20150412125023.jpg', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 2, NULL, NULL, NULL, NULL, '2015-04-12 05:50:23', '2015-04-12 05:50:23', 'polusi-akibat-pembangunan-mall-bec-yang-baru'),
(46, 'Rumah Diduga Tempat Penampungan TKI Illegal', 15, 'NULL', '2-20150412125116.jpg', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 4, NULL, NULL, NULL, NULL, '2015-04-12 05:51:16', '2015-04-12 05:51:16', 'rumah-diduga-tempat-penampungan-tki-illegal'),
(47, 'Pungutan Liar kepada Pedagang di Pasar Baru', 16, '2-20150412125211.zip', '2-20150412125211.jpg', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 5, NULL, NULL, NULL, NULL, '2015-04-12 05:52:11', '2015-04-12 05:52:11', 'pungutan-liar-kepada-pedagang-di-pasar-baru'),
(48, 'Ruko Diduga Markas Tempat ISIS di Caheum', 17, '2-20150412125318.mdj', '2-20150412125318.jpg', '<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>\r\n<p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Aenean lacinia bibendum nulla sed consectetur.\r\n</p>\r\n<p>\r\nEtiam porta sem malesuada magna mollis euismod. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Nullam quis risus eget urna mollis ornare vel eu leo. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Sed posuere consectetur est at lobortis.</p>', 2, 3, NULL, NULL, NULL, NULL, '2015-04-12 05:53:18', '2015-04-12 05:53:18', 'ruko-diduga-markas-tempat-isis-di-caheum'),
(52, 'Maneh teu jelas pisan woy', 4, 'NULL', 'NULL', 'Wewewewewewewewewe', 2, 6, NULL, NULL, NULL, NULL, '2015-04-25 11:32:00', '2015-04-25 11:32:22', 'maneh-teu-jelas-pisan-woy'),
(53, 'Real Madrid bantai Celta Vigo 4-2', 4, 'NULL', 'NULL', 'Hore Real Madrid menang lagi. Perburuan gelar La Liga makin ketat.', 2, 2, NULL, NULL, NULL, NULL, '2015-04-27 02:58:54', '2015-04-27 02:59:24', 'real-madrid-bantai-celta-vigo-4-2'),
(54, 'Akun Bank BCA Bobol', 7, 'NULL', 'NULL', 'Heran saya rekening saya bisa merosot tajam hanya dalam waktu 1 hari saja ???', 2, 2, NULL, NULL, NULL, NULL, '2015-04-27 03:01:37', '2015-04-27 03:18:29', 'akun-bank-bca-bobol');

-- --------------------------------------------------------

--
-- Table structure for table `ppl_citizenreport_skpd`
--

CREATE TABLE IF NOT EXISTS `ppl_citizenreport_skpd` (
  `id_user` int(10) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `telp` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  UNIQUE KEY `skpd_id_user_unique` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ppl_citizenreport_skpd`
--

INSERT INTO `ppl_citizenreport_skpd` (`id_user`, `nama`, `alamat`, `telp`, `created_at`, `updated_at`) VALUES
(2, 'Dinas Bina Marga dan Pengairan', 'Jl. Cianjur No.34 Bandung', '(022) 7278853', '2015-04-05 04:00:00', '0000-00-00 00:00:00'),
(5, 'Dinas Kependudukan dan Pencatatan Sipil', 'Jl. Ambon No.1 Bandung', '(022) 4209891', '2015-04-05 04:00:00', '0000-00-00 00:00:00'),
(6, 'Dinas Kesehatan', 'Jl. Supratman No.73 Bandung', '(022) 4203752', '2015-04-05 04:00:00', '0000-00-00 00:00:00'),
(10, 'Dinas Komunikasi dan Informatika', 'Jl. Wastukancana No 2 Bandung', '(022) 4234892', '2015-04-06 08:53:37', '0000-00-00 00:00:00'),
(11, 'Dinas Koperasi, UKM dan Perindustrian Perdagangan', 'Jl. Kawaluyaan No. 2 Bandung', '(022) 7308358', '2015-04-06 08:53:37', '0000-00-00 00:00:00'),
(12, 'Dinas Pelayanan Pajak Kota Bandung', 'Jl. Wastukencana No.2 Bandung', '(022) 7215323', '2015-04-06 08:53:37', '0000-00-00 00:00:00'),
(13, 'Dinas Pemakaman dan Pertamanan', 'Jl. Ambon No.1 A Bandung', '(022) 4231921', '2015-04-06 08:53:38', '0000-00-00 00:00:00'),
(15, 'Dinas Pendidikan', 'Jl.A.Yani No. 239 Bandung', '(022) 7106568', '2015-04-06 08:53:38', '0000-00-00 00:00:00'),
(17, 'Dinas Perhubungan', 'Jl. Soekarno Hatta No 205 Bandung', '(022) 5220768', '2015-04-06 08:53:38', '0000-00-00 00:00:00'),
(19, ' Dinas Sosial', 'Jl. Sindang sirna no 40 Bandung', '(022) 2013139', '2015-04-06 08:53:38', '0000-00-00 00:00:00'),
(20, 'Dinas Tata Ruang dan Cipta Karya', 'Jalan Cianjur No. 34 Bandung', '(022) 7217451', '2015-04-06 08:53:38', '0000-00-00 00:00:00'),
(21, 'Dinas Tenaga Kerja', 'Jl. RE. Martanegara No. 4 Bandung', '(022) 7311330', '2015-04-06 08:53:38', '0000-00-00 00:00:00'),
(22, 'Satuan Polisi Pamong Praja', 'Jl. RE. Martanegara No. 4', '(022) 4264991', '2015-04-06 08:53:38', '0000-00-00 00:00:00'),
(23, 'Polres', 'Jl. Bhayangkara No.1 Bandung', '(022) 224234558', '2015-04-06 08:53:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ppl_citizenreport_status`
--

CREATE TABLE IF NOT EXISTS `ppl_citizenreport_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `progress` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `ppl_citizenreport_status`
--

INSERT INTO `ppl_citizenreport_status` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`, `progress`) VALUES
(1, 'pending', 'Pengaduan belum diteruskan ke SKPD dan masih menunggu verifikasi.', '2015-04-05 15:34:34', '2015-04-05 15:34:34', 20),
(2, 'forwarded', '', '2015-04-06 06:25:25', '2015-04-06 06:25:25', 40),
(3, 'on progress', '', '2015-04-06 06:25:25', '2015-04-06 06:25:25', 60),
(4, 'finished', '', '2015-04-06 06:26:31', '2015-04-06 06:26:31', 80),
(5, 'closed', '', '2015-04-06 06:26:31', '2015-04-06 06:26:31', 100),
(6, 'rejected', '', '2015-04-06 06:29:26', '2015-04-06 06:29:26', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ppl_citizenreport_user`
--

CREATE TABLE IF NOT EXISTS `ppl_citizenreport_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'default.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `ppl_citizenreport_user`
--

INSERT INTO `ppl_citizenreport_user` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`, `avatar`) VALUES
(1, 'kangemil', 'bandunggeulis', 'MASYARAKAT', '2015-04-05 15:33:39', '2015-04-05 15:33:39', 'default.jpg'),
(2, 'binamarga', 'binamarga123', 'MASYARAKAT', '2015-04-05 04:00:00', '0000-00-00 00:00:00', 'default.jpg'),
(5, 'disdukcapil', 'disdukcapil123', 'SKPD', '2015-04-05 04:00:00', '0000-00-00 00:00:00', 'default.jpg'),
(6, 'dinkes', 'dinkes123', 'SKPD', '2015-04-05 04:00:00', '0000-00-00 00:00:00', 'default.jpg'),
(10, 'diskominfo', 'diskominfo123', 'SKPD', '2015-04-06 05:55:56', '0000-00-00 00:00:00', 'default.jpg'),
(11, 'diskumdag', 'diskumdag123', 'SKPD', '2015-04-06 05:55:56', '0000-00-00 00:00:00', 'default.jpg'),
(12, 'dispajak', 'dispajak123', 'SKPD', '2015-04-06 06:07:44', '0000-00-00 00:00:00', 'default.jpg'),
(13, 'diskamtam', 'diskamtam123', 'SKPD', '2015-04-06 06:15:22', '0000-00-00 00:00:00', 'default.jpg'),
(15, 'disdik', 'disdik123', 'SKPD', '2015-04-06 06:15:22', '0000-00-00 00:00:00', 'default.jpg'),
(17, 'dishub', 'dishub123', 'SKPD', '2015-04-06 06:15:22', '0000-00-00 00:00:00', 'default.jpg'),
(19, 'dinsos', 'dinsos123', 'SKPD', '2015-04-06 06:15:22', '0000-00-00 00:00:00', 'default.jpg'),
(20, 'distarcip', 'distarcip123', 'SKPD', '2015-04-06 06:15:22', '0000-00-00 00:00:00', 'default.jpg'),
(21, 'disnaker', 'disnaker123', 'SKPD', '2015-04-06 06:15:22', '0000-00-00 00:00:00', 'default.jpg'),
(22, 'satpolpp', 'satpolpp123', 'SKPD', '2015-04-06 06:15:22', '0000-00-00 00:00:00', 'default.jpg'),
(23, 'pakpolisi', 'pakpolisi123', 'SKPD', '2015-04-06 10:47:13', '0000-00-00 00:00:00', 'default.jpg'),
(25, 'admin', 'admin', 'ADMIN', '2015-04-20 17:00:00', '0000-00-00 00:00:00', 'default.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ppl_citizenreport_admin`
--
ALTER TABLE `ppl_citizenreport_admin`
  ADD CONSTRAINT `admin_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `ppl_citizenreport_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ppl_citizenreport_komentar`
--
ALTER TABLE `ppl_citizenreport_komentar`
  ADD CONSTRAINT `komentar_id_komentator_foreign` FOREIGN KEY (`id_komentator`) REFERENCES `ppl_citizenreport_user` (`id`),
  ADD CONSTRAINT `komentar_id_pengaduan_foreign` FOREIGN KEY (`id_pengaduan`) REFERENCES `ppl_citizenreport_pengaduan` (`id`);

--
-- Constraints for table `ppl_citizenreport_masyarakat`
--
ALTER TABLE `ppl_citizenreport_masyarakat`
  ADD CONSTRAINT `masyarakat_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `ppl_citizenreport_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ppl_citizenreport_penanggungjawab`
--
ALTER TABLE `ppl_citizenreport_penanggungjawab`
  ADD CONSTRAINT `penanggungjawab_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `ppl_citizenreport_kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penanggungjawab_id_skpd_foreign` FOREIGN KEY (`id_skpd`) REFERENCES `ppl_citizenreport_skpd` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ppl_citizenreport_pengaduan`
--
ALTER TABLE `ppl_citizenreport_pengaduan`
  ADD CONSTRAINT `pengaduan_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `ppl_citizenreport_kategori` (`id`),
  ADD CONSTRAINT `pengaduan_id_masyarakat_foreign` FOREIGN KEY (`id_masyarakat`) REFERENCES `ppl_citizenreport_masyarakat` (`id_user`),
  ADD CONSTRAINT `pengaduan_id_status_foreign` FOREIGN KEY (`id_status`) REFERENCES `ppl_citizenreport_status` (`id`);

--
-- Constraints for table `ppl_citizenreport_skpd`
--
ALTER TABLE `ppl_citizenreport_skpd`
  ADD CONSTRAINT `skpd_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `ppl_citizenreport_user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
