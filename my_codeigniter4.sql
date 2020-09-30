-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 02:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_codeigniter4`
--

-- --------------------------------------------------------

--
-- Table structure for table `comics`
--

CREATE TABLE `comics` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `author` varchar(128) NOT NULL,
  `publisher` varchar(128) NOT NULL,
  `cover_manga` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comics`
--

INSERT INTO `comics` (`id`, `title`, `slug`, `author`, `publisher`, `cover_manga`, `created_at`, `updated_at`) VALUES
(1, 'Ero Manga Sensei', 'ero-manga-sensei', 'Tsukasa Fushimi', 'Dark Manga Author', '1600508412_144a749596a123b7c04d.png', NULL, '2020-09-19 04:40:12'),
(2, 'sakura-so no pet na kanojo', 'sakura-so-no-pet-na-kanojo', 'kamoshida hajime', 'Anime work', '1600508295_383045955ebc3fd3ac96.png', NULL, '2020-09-19 04:38:15'),
(4, 'Oreimoto', 'oreimoto', 'Natsume-san', 'Anime core', 'default.png', '2020-09-16 03:24:34', '2020-09-18 02:58:04'),
(5, 'Watashi tachi Benkyou Dekinai', 'watashi-tachi-benkyou-dekinai', 'Menhara-desu', 'Anime cute', 'default.png', '2020-09-16 07:09:17', '2020-09-18 02:58:59'),
(6, 'Domestic Kanojo', 'domestic-kanojo', 'Hatsume-miku', 'Akihabara anime', 'default.png', '2020-09-16 07:13:59', '2020-09-18 02:58:31'),
(7, 'Kuzuno Honkai', 'kuzuno-honkai', 'Kira-kira', 'Akihabara anime', 'default.png', '2020-09-16 07:15:24', '2020-09-19 03:49:48'),
(8, 'Nisekoi', 'nisekoi', 'akibara senju', 'nanatsu compaty', 'default.png', '2020-09-18 02:51:10', '2020-09-18 02:59:51'),
(9, 'KissxSis', 'kissxsis', ' Anohotiro', 'Mutsuya Anime', 'default.png', '2020-09-18 03:01:30', '2020-09-18 03:01:30'),
(10, 'Hight school DxD', 'hight-school-dxd', ' anatano youra', 'kiba hentai manga', 'default.png', '2020-09-19 01:05:28', '2020-09-19 01:05:28'),
(12, 'Rikudai Kishi Calvary', 'rikudai-kishi-calvary', 'Matsuyuna kire', 'Bam Bam Manga', 'default.png', '2020-09-19 01:46:08', '2020-09-19 01:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2020-09-20-024001', 'App\\Database\\Migrations\\Orang', 'default', 'App', 1600570608, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orang`
--

CREATE TABLE `orang` (
  `id` int(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orang`
--

INSERT INTO `orang` (`id`, `nama`, `alamat`, `created_at`, `update_at`) VALUES
(1, 'Tira Indah Wulandari', 'Ki. Setia Budi No. 126, Administrasi Jakarta Utara 25153, NTT', '2015-10-12 18:36:54', '2020-09-20 02:36:46'),
(2, 'Gangsar Marbun', 'Ds. Supono No. 523, Samarinda 86776, KalTeng', '1993-11-24 20:03:48', '2020-09-20 02:36:46'),
(3, 'Usyi Puspita', 'Gg. Mahakam No. 582, Pekanbaru 96573, NTB', '1995-12-09 02:22:44', '2020-09-20 02:36:48'),
(4, 'Anita Usamah S.Psi', 'Ds. Dago No. 781, Pasuruan 42842, DKI', '2014-09-22 23:53:02', '2020-09-20 02:36:49'),
(5, 'Tantri Pudjiastuti', 'Kpg. K.H. Maskur No. 862, Tegal 57057, Jambi', '1986-08-14 17:41:12', '2020-09-20 02:36:49'),
(6, 'Bakidin Samosir', 'Kpg. Nangka No. 887, Semarang 47561, JaBar', '1981-06-03 22:06:36', '2020-09-20 02:36:49'),
(7, 'Bella Astuti', 'Ki. Bacang No. 729, Pekanbaru 20839, Maluku', '1975-01-15 15:58:44', '2020-09-20 02:36:49'),
(8, 'Puji Puji Mardhiyah', 'Ki. Rumah Sakit No. 838, Padang 27524, BaBel', '1973-09-05 05:48:10', '2020-09-20 02:36:50'),
(9, 'Jail Ajiono Budiyanto', 'Ki. Astana Anyar No. 148, Blitar 37922, Riau', '2001-07-04 12:41:22', '2020-09-20 02:36:51'),
(10, 'Julia Kusmawati', 'Ki. Bahagia  No. 759, Bau-Bau 53680, SumSel', '2010-05-09 19:39:12', '2020-09-20 02:36:52'),
(11, 'Jaeman Haryanto', 'Gg. M.T. Haryono No. 476, Ternate 84737, JaBar', '2017-04-21 05:56:11', '2020-09-20 02:36:52'),
(12, 'Rosman Narpati', 'Kpg. Imam Bonjol No. 217, Palopo 98415, Papua', '2008-12-08 23:51:06', '2020-09-20 02:36:52'),
(13, 'Yuliana Nasyidah', 'Ki. Honggowongso No. 130, Administrasi Jakarta Pusat 95709, MalUt', '1975-03-10 10:56:42', '2020-09-20 02:36:52'),
(14, 'Anastasia Wahyuni', 'Psr. Sampangan No. 72, Bandar Lampung 74800, JaTeng', '2012-06-26 13:07:54', '2020-09-20 02:36:52'),
(15, 'Diah Lestari', 'Dk. S. Parman No. 348, Padangsidempuan 77764, PapBar', '1982-05-06 00:47:53', '2020-09-20 02:36:52'),
(16, 'Xanana Wage Sinaga S.Gz', 'Kpg. Sudiarto No. 521, Padangpanjang 43630, Lampung', '1980-01-30 19:29:50', '2020-09-20 02:36:53'),
(17, 'Salimah Hassanah', 'Gg. HOS. Cjokroaminoto (Pasirkaliki) No. 791, Administrasi Jakarta Selatan 26378, DIY', '1999-04-23 02:43:28', '2020-09-20 02:36:53'),
(18, 'Ade Prakasa', 'Jln. Pasir Koja No. 399, Surabaya 56517, BaBel', '1984-01-05 19:38:30', '2020-09-20 02:36:53'),
(19, 'Lantar Jarwa Setiawan S.Ked', 'Gg. Otista No. 240, Bitung 21988, SulUt', '1984-12-21 11:52:53', '2020-09-20 02:36:53'),
(20, 'Elma Endah Oktaviani S.T.', 'Jr. Kyai Gede No. 464, Bandung 70710, KalTim', '2017-10-03 02:02:15', '2020-09-20 02:36:53'),
(21, 'Erik Irawan S.Pd', 'Dk. Halim No. 758, Banjar 85749, BaBel', '1984-12-05 08:26:42', '2020-09-20 02:36:53'),
(22, 'Jinawi Sakti Mahendra', 'Dk. Bahagia  No. 511, Bengkulu 58835, DIY', '1994-02-27 10:51:34', '2020-09-20 02:36:53'),
(23, 'Shakila Talia Rahayu', 'Kpg. Teuku Umar No. 164, Payakumbuh 87766, KalTeng', '2011-06-10 18:24:07', '2020-09-20 02:36:53'),
(24, 'Lili Rahayu', 'Kpg. Villa No. 355, Manado 55677, KepR', '1992-12-01 00:08:32', '2020-09-20 02:36:53'),
(25, 'Kartika Uli Novitasari', 'Gg. Lada No. 474, Medan 76573, SulTra', '1999-09-17 13:22:18', '2020-09-20 02:36:53'),
(26, 'Cahyo Lukman Widodo', 'Gg. Sam Ratulangi No. 108, Lhokseumawe 63754, KalTeng', '2019-04-20 15:14:27', '2020-09-20 02:36:54'),
(27, 'Candra Permadi S.E.', 'Jln. Laksamana No. 404, Depok 42919, Gorontalo', '2017-07-26 22:39:36', '2020-09-20 02:36:54'),
(28, 'Candrakanta Damanik', 'Psr. Lembong No. 502, Singkawang 77692, SumSel', '2010-04-05 06:57:49', '2020-09-20 02:36:54'),
(29, 'Latika Zelda Widiastuti', 'Kpg. Warga No. 597, Bima 44971, PapBar', '2003-03-30 06:20:03', '2020-09-20 02:36:54'),
(30, 'Lintang Mayasari', 'Gg. Antapani Lama No. 868, Bengkulu 43900, KalTeng', '2009-05-23 00:38:10', '2020-09-20 02:36:54'),
(31, 'Jinawi Prasasta M.M.', 'Gg. Acordion No. 472, Pekanbaru 11815, JaTeng', '2013-07-21 00:18:47', '2020-09-20 02:36:54'),
(32, 'Johan Wardi Maryadi', 'Jr. Ujung No. 258, Pariaman 92097, DIY', '2005-09-01 05:37:29', '2020-09-20 02:36:54'),
(33, 'Gamblang Prayoga', 'Ds. Barat No. 390, Sukabumi 35430, Gorontalo', '1970-09-17 22:50:20', '2020-09-20 02:36:54'),
(34, 'Darimin Cawisono Setiawan', 'Ki. Basuki No. 629, Tarakan 89476, Papua', '2013-02-18 10:01:41', '2020-09-20 02:36:54'),
(35, 'Yuni Rahimah', 'Ds. Reksoninten No. 295, Lhokseumawe 27066, KalSel', '1990-01-07 02:36:54', '2020-09-20 02:36:54'),
(36, 'Mutia Laksmiwati', 'Kpg. Ekonomi No. 996, Balikpapan 76215, KepR', '1978-01-05 00:59:32', '2020-09-20 02:36:54'),
(37, 'Kasiran Pradipta', 'Dk. Achmad No. 58, Sibolga 81521, PapBar', '1977-06-02 02:07:37', '2020-09-20 02:36:55'),
(38, 'Lutfan Hakim M.Pd', 'Gg. Ciumbuleuit No. 712, Jambi 58017, DIY', '2005-11-28 00:41:20', '2020-09-20 02:36:55'),
(39, 'Ibun Hutagalung S.Gz', 'Jr. Abdul. Muis No. 368, Parepare 26649, DIY', '2015-05-25 03:47:30', '2020-09-20 02:36:55'),
(40, 'Mariadi Situmorang M.Kom.', 'Ds. B.Agam Dlm No. 674, Malang 18184, JaTeng', '2014-11-25 04:04:52', '2020-09-20 02:36:55'),
(41, 'Iriana Pratiwi S.Pd', 'Jr. Suniaraja No. 676, Tegal 85558, SulSel', '2020-07-19 18:18:41', '2020-09-20 02:36:55'),
(42, 'Gina Wahyuni', 'Gg. Tambak No. 454, Bengkulu 23175, NTB', '2005-07-05 14:50:28', '2020-09-20 02:36:55'),
(43, 'Yessi Ulva Nasyiah', 'Ds. Jayawijaya No. 714, Mojokerto 90215, Riau', '2000-01-12 15:17:26', '2020-09-20 02:36:55'),
(44, 'Puti Nurdiyanti', 'Kpg. Madrasah No. 236, Padangpanjang 86007, KalUt', '2015-04-23 18:59:27', '2020-09-20 02:36:55'),
(45, 'Paiman Prasetya', 'Jr. Adisucipto No. 190, Balikpapan 28543, Banten', '1988-07-23 07:06:12', '2020-09-20 02:36:55'),
(46, 'Paramita Eli Hariyah S.Psi', 'Jln. Ters. Kiaracondong No. 639, Bekasi 68461, Bengkulu', '2009-02-21 13:41:07', '2020-09-20 02:36:55'),
(47, 'Karja Samosir', 'Ki. Ir. H. Juanda No. 571, Bandar Lampung 28216, KalUt', '2016-10-18 23:59:58', '2020-09-20 02:36:56'),
(48, 'Kani Kamila Novitasari', 'Jr. Sampangan No. 176, Dumai 52070, Papua', '1976-05-10 10:18:56', '2020-09-20 02:36:56'),
(49, 'Ganjaran Utama S.Kom', 'Dk. R.E. Martadinata No. 467, Surakarta 88709, JaTim', '1995-06-19 01:06:05', '2020-09-20 02:36:56'),
(50, 'Maras Siregar', 'Ds. Wahidin Sudirohusodo No. 596, Banda Aceh 40746, SulUt', '1995-06-19 13:41:05', '2020-09-20 02:36:56'),
(51, 'Tedi Bakda Thamrin S.IP', 'Psr. Sutami No. 708, Administrasi Jakarta Selatan 47771, Banten', '1981-04-11 18:48:27', '2020-09-20 02:36:56'),
(52, 'Rudi Wibowo', 'Jln. Kebangkitan Nasional No. 973, Bandar Lampung 33019, KalSel', '2008-02-15 12:24:15', '2020-09-20 02:36:56'),
(53, 'Jayeng Pangestu', 'Kpg. HOS. Cjokroaminoto (Pasirkaliki) No. 694, Sawahlunto 41789, KepR', '1984-02-02 00:12:53', '2020-09-20 02:36:56'),
(54, 'Labuh Cagak Saptono', 'Kpg. Bak Mandi No. 882, Administrasi Jakarta Pusat 94611, Bali', '1975-08-17 16:33:53', '2020-09-20 02:36:56'),
(55, 'Simon Umay Pratama S.Pt', 'Jln. HOS. Cjokroaminoto (Pasirkaliki) No. 464, Semarang 43386, KalUt', '1979-03-04 09:05:14', '2020-09-20 02:36:56'),
(56, 'Nilam Wahyuni', 'Ki. Baik No. 221, Binjai 45493, Gorontalo', '1976-01-13 11:32:06', '2020-09-20 02:36:56'),
(57, 'Melinda Titin Usada', 'Gg. Kebonjati No. 832, Administrasi Jakarta Barat 77939, Papua', '1971-12-31 15:16:37', '2020-09-20 02:36:56'),
(58, 'Natalia Yulianti', 'Jr. Labu No. 820, Prabumulih 56909, SulSel', '1990-09-04 17:53:50', '2020-09-20 02:36:56'),
(59, 'Calista Elvina Nasyidah S.Sos', 'Ds. Rajawali Barat No. 837, Solok 72989, Aceh', '1971-08-06 03:42:14', '2020-09-20 02:36:56'),
(60, 'Tantri Puji Fujiati', 'Ds. Ujung No. 238, Lhokseumawe 17140, KalTeng', '1977-02-27 20:09:33', '2020-09-20 02:36:56'),
(61, 'Shania Ira Anggraini', 'Gg. Baik No. 494, Cilegon 95989, Jambi', '2006-08-07 11:24:31', '2020-09-20 02:36:57'),
(62, 'Putri Maryati', 'Jln. Dahlia No. 287, Subulussalam 39267, SumBar', '1970-09-22 01:07:57', '2020-09-20 02:36:57'),
(63, 'Tirtayasa Nalar Prasetya', 'Psr. Arifin No. 561, Pekalongan 28834, KalTim', '2007-08-15 08:37:40', '2020-09-20 02:36:57'),
(64, 'Karimah Ratih Pratiwi', 'Ds. Jakarta No. 387, Tanjung Pinang 84835, JaTeng', '1975-09-27 06:22:31', '2020-09-20 02:36:57'),
(65, 'Karsa Okto Sihombing', 'Psr. Qrisdoren No. 677, Bontang 36383, SulTra', '1976-02-17 15:52:02', '2020-09-20 02:36:57'),
(66, 'Ika Nurdiyanti', 'Kpg. Agus Salim No. 559, Subulussalam 58096, Riau', '2010-08-21 09:42:13', '2020-09-20 02:36:57'),
(67, 'Dipa Pangestu', 'Jln. Banal No. 888, Banda Aceh 81220, NTT', '1975-05-20 21:25:18', '2020-09-20 02:36:57'),
(68, 'Ratna Vanya Astuti M.M.', 'Dk. Veteran No. 837, Cimahi 63739, BaBel', '2020-02-03 06:48:15', '2020-09-20 02:36:57'),
(69, 'Kenzie Gunarto S.Gz', 'Jln. Baya Kali Bungur No. 867, Palangka Raya 37924, Maluku', '2001-06-18 00:15:35', '2020-09-20 02:36:57'),
(70, 'Alika Hassanah', 'Gg. BKR No. 446, Tidore Kepulauan 25142, Banten', '1995-11-22 02:09:54', '2020-09-20 02:36:57'),
(71, 'Gamani Kusumo', 'Gg. Kebangkitan Nasional No. 477, Palembang 37434, KalTim', '1991-03-24 11:54:25', '2020-09-20 02:36:57'),
(72, 'Asmuni Prasetyo', 'Ds. Raya Ujungberung No. 70, Sukabumi 56839, Maluku', '2000-12-22 05:49:11', '2020-09-20 02:36:57'),
(73, 'Paramita Padmi Permata S.Psi', 'Jln. Taman No. 450, Sungai Penuh 78414, SulUt', '2011-07-07 01:30:50', '2020-09-20 02:36:57'),
(74, 'Jessica Rahimah', 'Ki. Muwardi No. 751, Batu 20681, KalSel', '2007-05-10 11:33:33', '2020-09-20 02:36:58'),
(75, 'Yahya Pranata Prasetya S.Psi', 'Dk. Diponegoro No. 760, Pangkal Pinang 85048, Jambi', '1987-12-27 07:52:08', '2020-09-20 02:36:58'),
(76, 'Devi Susanti', 'Gg. Katamso No. 705, Bukittinggi 20349, Bali', '1979-05-18 22:52:06', '2020-09-20 02:36:58'),
(77, 'Pangestu Natsir S.Pt', 'Ki. Kalimantan No. 363, Banjarmasin 77729, SulUt', '2010-07-13 06:52:26', '2020-09-20 02:36:58'),
(78, 'Virman Sihotang S.Psi', 'Dk. Bayam No. 731, Kendari 80836, KalUt', '2006-11-08 08:38:59', '2020-09-20 02:36:58'),
(79, 'Elvina Faizah Wijayanti', 'Dk. Yosodipuro No. 578, Cimahi 66046, KepR', '1976-06-24 22:19:09', '2020-09-20 02:36:58'),
(80, 'Cinta Namaga', 'Jr. Muwardi No. 474, Pematangsiantar 36584, JaBar', '2014-06-07 07:19:36', '2020-09-20 02:36:58'),
(81, 'Ega Suwarno', 'Jr. Banda No. 309, Administrasi Jakarta Selatan 71807, SumSel', '2005-04-16 16:53:06', '2020-09-20 02:36:58'),
(82, 'Nilam Usada', 'Dk. Elang No. 122, Tangerang Selatan 85838, KalSel', '1983-08-26 11:53:03', '2020-09-20 02:36:58'),
(83, 'Ellis Rahmawati', 'Dk. Jayawijaya No. 758, Parepare 85909, DKI', '1980-12-24 07:20:23', '2020-09-20 02:36:58'),
(84, 'Kawaya Wacana', 'Jr. Suniaraja No. 929, Pariaman 28946, Gorontalo', '1982-10-19 06:29:11', '2020-09-20 02:36:59'),
(85, 'Vivi Yolanda M.Kom.', 'Ds. Ters. Buah Batu No. 194, Singkawang 19297, Gorontalo', '1978-02-11 00:22:38', '2020-09-20 02:36:59'),
(86, 'Najib Sihombing', 'Jr. M.T. Haryono No. 653, Administrasi Jakarta Timur 82879, JaTim', '1973-06-15 00:15:00', '2020-09-20 02:36:59'),
(87, 'Cindy Silvia Astuti', 'Jln. Wora Wari No. 256, Metro 52843, SulTra', '2003-11-22 22:19:48', '2020-09-20 02:36:59'),
(88, 'Paramita Permata', 'Dk. Baan No. 553, Banjar 61617, SulUt', '1986-02-25 17:49:47', '2020-09-20 02:36:59'),
(89, 'Luwar Salahudin', 'Ki. Hang No. 275, Batam 97033, KalSel', '2004-11-02 01:23:35', '2020-09-20 02:36:59'),
(90, 'Tina Safitri', 'Psr. Urip Sumoharjo No. 989, Singkawang 67604, Bengkulu', '2005-01-05 10:49:23', '2020-09-20 02:36:59'),
(91, 'Balidin Purwanto Dabukke S.I.Kom', 'Psr. Suharso No. 843, Palu 97415, JaBar', '2007-03-29 13:02:27', '2020-09-20 02:36:59'),
(92, 'Johan Anggriawan', 'Kpg. PHH. Mustofa No. 801, Probolinggo 54646, Lampung', '1994-01-19 11:15:56', '2020-09-20 02:36:59'),
(93, 'Muni Lanang Prayoga', 'Dk. Rajawali Barat No. 422, Batam 79594, SulSel', '2013-12-05 02:30:38', '2020-09-20 02:36:59'),
(94, 'Eko Mansur S.Ked', 'Jr. Bakit  No. 441, Pagar Alam 18245, JaTeng', '1986-12-23 02:22:48', '2020-09-20 02:36:59'),
(95, 'Panji Prasetya', 'Dk. Rajawali No. 997, Banjarmasin 72426, SumSel', '2004-05-24 22:29:44', '2020-09-20 02:36:59'),
(96, 'Zulaikha Lestari M.Farm', 'Dk. Katamso No. 463, Kendari 95695, KalSel', '2013-07-06 01:31:45', '2020-09-20 02:37:00'),
(97, 'Eka Melinda Palastri', 'Kpg. HOS. Cjokroaminoto (Pasirkaliki) No. 941, Langsa 31420, Maluku', '2002-08-06 19:48:59', '2020-09-20 02:37:00'),
(98, 'Rahayu Gasti Yulianti', 'Kpg. Babah No. 686, Administrasi Jakarta Barat 41800, KepR', '1997-12-08 21:24:59', '2020-09-20 02:37:00'),
(99, 'Lukita Gatot Setiawan S.Ked', 'Jln. Tambak No. 140, Bau-Bau 37589, JaTeng', '2008-06-16 16:13:30', '2020-09-20 02:37:00'),
(100, 'Najwa Melani', 'Ki. Gotong Royong No. 872, Salatiga 66644, JaTeng', '2010-08-03 07:39:58', '2020-09-20 02:37:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comics`
--
ALTER TABLE `comics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orang`
--
ALTER TABLE `orang`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comics`
--
ALTER TABLE `comics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orang`
--
ALTER TABLE `orang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
