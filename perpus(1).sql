-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2019 at 01:06 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(5) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keaktifan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`, `keaktifan`) VALUES
(12, 'Umum', 1),
(13, 'Sastra', 1),
(14, 'Pengatahuan umum', 1),
(17, 'Agama', 1),
(21, 'trial', 1),
(23, 'newjfn3egvn3ewgn', 1);

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi`
--

CREATE TABLE `klasifikasi` (
  `id` int(250) NOT NULL,
  `stem` varchar(250) NOT NULL,
  `count` int(250) NOT NULL,
  `kategori` varchar(250) NOT NULL,
  `keaktifan` int(250) NOT NULL,
  `prediksi` varchar(250) NOT NULL,
  `fakta` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klasifikasi`
--

INSERT INTO `klasifikasi` (`id`, `stem`, `count`, `kategori`, `keaktifan`, `prediksi`, `fakta`) VALUES
(11, 'cinta', 13, 'Agama', 1, 'Agama', 'Agama'),
(12, 'allah', 17, 'Agama', 1, 'Agama', 'Agama'),
(13, 'pada', 1, 'Agama', 1, 'Agama', 'Agama'),
(14, 'rabbi', 1, 'Agama', 1, 'Agama', 'Agama'),
(15, 'wdq', 1, '- Pilih Kategori -', 1, 'Agama', '- Pilih Kategori -'),
(16, 'ws', 1, '- Pilih Kategori -', 1, 'Agama', '- Pilih Kategori -'),
(17, 'de', 1, '- Pilih Kategori -', 1, 'Agama', '- Pilih Kategori -'),
(18, 'da', 1, '- Pilih Kategori -', 1, 'Agama', '- Pilih Kategori -'),
(19, 'satu', 1, 'Agama', 1, 'Agama', 'Agama'),
(20, 'd', 1, 'Agama', 1, 'Agama', 'Agama'),
(21, 'c', 1, 'Agama', 1, 'Agama', 'Agama'),
(22, 'dq', 1, 'Agama', 1, 'Agama', 'Agama'),
(23, 'ed', 1, 'Agama', 1, 'Agama', 'Agama'),
(24, 's', 2, 'Pengatahuan umum', 1, 'Agama', 'Pengatahuan umum'),
(25, 'd', 1, 'Pengatahuan umum', 1, 'Agama', 'Pengatahuan umum'),
(26, 'cinta', 2, 'Sastra', 1, 'Agama', 'Sastra'),
(27, 'allah', 2, 'Sastra', 1, 'Agama', 'Sastra'),
(28, 's', 2, 'Sastra', 1, 'Agama', 'Sastra'),
(29, 'apartemen', 2, 'Agama', 1, 'Sastra', 'Agama'),
(30, 's', 2, 'Agama', 1, 'Sastra', 'Agama'),
(31, 'sd', 1, 'Sastra', 1, 'Agama', 'Sastra'),
(32, 'aku', 1, 'Sastra', 1, 'Agama', 'Sastra'),
(33, 'revev', 1, 'Sastra', 1, 'Agama', 'Sastra'),
(34, 'vre4', 1, 'Sastra', 1, 'Agama', 'Sastra');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(100) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `kategori` varchar(700) NOT NULL,
  `keaktifan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `judul`, `kategori`, `keaktifan`) VALUES
(1, 'jejak jejak cinta sang hamba', 'Agama', 1),
(2, 'musim dingin di tokyo', 'Sastra', 1),
(3, 'Bening Hati Suci Jiwa', 'Agama', 1),
(4, 'Assalamualaikum Beijing', 'Sastra', 1),
(5, 'jangan tidur', 'Umum', 1),
(6, 'ini', 'Agama', 1),
(7, 'v', 'Agama', 1);

-- --------------------------------------------------------

--
-- Table structure for table `list_prediksi`
--

CREATE TABLE `list_prediksi` (
  `id` int(250) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `kategori` varchar(250) NOT NULL,
  `keaktifan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_prediksi`
--

INSERT INTO `list_prediksi` (`id`, `judul`, `kategori`, `keaktifan`) VALUES
(1, 'saya cinta Allah', 'Sastra', 1),
(2, 'apartemen', 'Agama', 1),
(3, 'apartemen', 'Agama', 1),
(4, 'saya cinta Allah', 'Sastra', 1),
(5, 'saya', 'Sastra', 1),
(6, 'revev', 'Sastra', 1);

-- --------------------------------------------------------

--
-- Table structure for table `prediksi`
--

CREATE TABLE `prediksi` (
  `id` int(250) NOT NULL,
  `judul` varchar(250) NOT NULL,
  `keaktifan` int(2) NOT NULL,
  `kategori` varchar(250) NOT NULL,
  `tp` int(2) NOT NULL,
  `fp` int(2) NOT NULL,
  `tn` int(2) NOT NULL,
  `fn` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prediksi`
--

INSERT INTO `prediksi` (`id`, `judul`, `keaktifan`, `kategori`, `tp`, `fp`, `tn`, `fn`) VALUES
(15, 'saya cinta Allah', 1, 'Agama', 1, 0, 0, 0),
(16, 'makan', 1, 'Sastra', 0, 0, 1, 0),
(17, 'd', 1, 'Agama', 0, 1, 0, 0),
(18, 'kkktra', 1, 'Sastra', 0, 0, 1, 0),
(19, 'saya cinta Allah', 1, 'Agama', 1, 0, 0, 0),
(20, 'makan', 1, 'Agama', 1, 0, 0, 0),
(21, 'apartemen', 1, 'Sastra', 0, 0, 1, 0),
(22, 'aku', 1, 'Agama', 1, 0, 0, 0),
(23, 'saya', 1, 'Sastra', 0, 1, 0, 0),
(24, 'q', 1, 'Sastra', 0, 0, 1, 0),
(25, 'allah', 1, 'Agama', 1, 0, 0, 0),
(26, 'anan', 1, 'Sastra', 0, 0, 1, 0),
(27, 'ksksks', 1, 'Sastra', 0, 0, 1, 0),
(28, 'wef', 1, 'Sastra', 0, 0, 1, 0),
(29, 'newkfc', 1, 'Sastra', 0, 0, 1, 0),
(30, 'ewc', 1, 'Sastra', 0, 0, 1, 0),
(31, 're', 1, 'Sastra', 0, 0, 1, 0),
(32, 'sasa', 1, 'Agama', 1, 0, 0, 0),
(33, 'nin', 1, 'Agama', 1, 0, 0, 0),
(34, 'revev', 1, 'Sastra', 0, 1, 0, 0),
(35, 'nv', 1, 'Agama', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `stem`
--

CREATE TABLE `stem` (
  `id` int(255) NOT NULL,
  `stem` varchar(500) NOT NULL,
  `count` int(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `keaktifan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stem`
--

INSERT INTO `stem` (`id`, `stem`, `count`, `kategori`, `keaktifan`) VALUES
(1, 'jejak', 4, 'Agama', 1),
(2, 'cinta', 11, 'Agama', 1),
(3, 'sang', 3, 'Agama', 1),
(4, 'hamba', 4, 'Agama', 1),
(5, 'anugerah', 3, 'Agama', 1),
(6, 'besar', 2, 'Agama', 1),
(7, 'karunia', 1, 'Agama', 1),
(8, 'allah', 3, 'Agama', 1),
(9, 'nya', 1, 'Agama', 1),
(10, 'rasa', 4, 'Agama', 1),
(11, 'abadi', 1, 'Agama', 1),
(12, 'pernah', 1, 'Agama', 1),
(13, 'lekang', 1, 'Agama', 1),
(14, 'akhir', 1, 'Agama', 1),
(15, 'zaman', 1, 'Agama', 1),
(16, 'namun', 1, 'Agama', 1),
(17, 'lama', 4, 'Agama', 1),
(18, 'hidup', 3, 'Agama', 1),
(19, 'dunia', 1, 'Agama', 1),
(20, 'dapat', 3, 'Agama', 1),
(21, 'benar', 2, 'Agama', 1),
(22, 'asal', 1, 'Agama', 1),
(23, 'hati', 7, 'Agama', 1),
(24, 'orang', 2, 'Agama', 1),
(25, 'bagi', 1, 'Agama', 1),
(26, 'siapa', 1, 'Agama', 1),
(27, 'raih', 2, 'Agama', 1),
(28, 'nikmat', 2, 'Agama', 1),
(29, 'bahagia', 2, 'Agama', 1),
(30, 'lezat', 1, 'Agama', 1),
(31, 'hendak', 1, 'Agama', 1),
(32, 'jalan', 6, 'Agama', 1),
(33, 'tunjuk', 2, 'Agama', 1),
(34, 'cipta', 1, 'Agama', 1),
(35, 'manusia', 1, 'Agama', 1),
(36, 'ketika', 1, 'Agama', 1),
(37, 'swt', 2, 'Agama', 1),
(38, 'ini', 2, 'Agama', 1),
(39, 'dalam', 1, 'Agama', 1),
(40, 'buku', 2, 'Agama', 1),
(41, 'tulis', 3, 'Agama', 1),
(42, 'ajak', 1, 'Agama', 1),
(43, 'semua', 2, 'Agama', 1),
(44, 'sama', 2, 'Agama', 1),
(45, 'mengga', 1, 'Agama', 1),
(46, 'pai', 1, 'Agama', 1),
(47, 'retas', 1, 'Agama', 1),
(48, 'tuju', 2, 'Agama', 1),
(49, 'llahi', 1, 'Agama', 1),
(50, 'musim', 1, 'Sastra', 1),
(51, 'dingin', 1, 'Sastra', 1),
(52, 'tokyo', 2, 'Sastra', 1),
(53, 'ishida', 1, 'Sastra', 1),
(54, 'keiko', 6, 'Sastra', 1),
(55, 'gadis', 1, 'Sastra', 1),
(56, 'manis', 1, 'Sastra', 1),
(57, 'blaster', 1, 'Sastra', 1),
(58, 'jepang', 3, 'Sastra', 1),
(59, 'indonesia', 1, 'Sastra', 1),
(60, 'kerja', 2, 'Sastra', 1),
(61, 'hari', 3, 'Sastra', 1),
(62, 'pegawai', 1, 'Sastra', 1),
(63, 'pustaka', 1, 'Sastra', 1),
(64, 'umum', 1, 'Sastra', 1),
(65, 'shinjuku', 1, 'Sastra', 1),
(66, 'tinggal', 3, 'Sastra', 1),
(67, 'apartemen', 7, 'Sastra', 1),
(68, 'sederhana', 2, 'Sastra', 1),
(69, 'tingkat', 1, 'Sastra', 1),
(70, 'letak', 1, 'Sastra', 1),
(71, 'pinggir', 1, 'Sastra', 1),
(72, 'kota', 2, 'Sastra', 1),
(73, 'lantai', 3, 'Sastra', 1),
(74, 'memilki', 1, 'Sastra', 1),
(75, 'apatemen', 1, 'Sastra', 1),
(76, 'saling', 1, 'Sastra', 1),
(77, 'hadap', 1, 'Sastra', 1),
(78, 'sendiri', 1, 'Sastra', 1),
(79, 'tempat', 2, 'Sastra', 1),
(80, 'nomor', 2, 'Sastra', 1),
(81, '202', 1, 'Sastra', 1),
(82, 'dua', 2, 'Sastra', 1),
(83, 'di', 2, 'Sastra', 1),
(84, 'huni', 2, 'Sastra', 1),
(85, 'lima', 1, 'Sastra', 1),
(86, 'tahun', 1, 'Sastra', 1),
(87, 'seberang', 1, 'Sastra', 1),
(88, 'pindah', 1, 'Sastra', 1),
(89, 'paris', 1, 'Sastra', 1),
(90, 'sampai', 1, 'Sastra', 1),
(91, 'suatu', 1, 'Sastra', 1),
(92, 'sewa', 2, 'Sastra', 1),
(93, 'baru', 1, 'Sastra', 1),
(94, '201', 1, 'Sastra', 1),
(95, 'tepat', 1, 'Sastra', 1),
(96, 'berangan', 1, 'Sastra', 1),
(97, 'dia', 1, 'Sastra', 1),
(98, 'pemuda', 2, 'Sastra', 1),
(99, 'nama', 1, 'Sastra', 1),
(100, 'nishimura', 1, 'Sastra', 1),
(101, 'kazuto', 3, 'Sastra', 1),
(102, 'pria', 1, 'Sastra', 1),
(103, 'turun', 1, 'Sastra', 1),
(104, 'lama', 4, 'Sastra', 1),
(105, 'new', 2, 'Sastra', 1),
(106, 'york', 2, 'Sastra', 1),
(107, 'rupa', 1, 'Sastra', 1),
(108, 'orang', 2, 'Sastra', 1),
(109, 'fotografer', 1, 'Sastra', 1),
(110, 'kenal', 1, 'Sastra', 1),
(111, 'alas', 1, 'Sastra', 1),
(112, 'pulang', 1, 'Sastra', 1),
(113, 'obat', 1, 'Sastra', 1),
(114, 'sakit', 1, 'Sastra', 1),
(115, 'hati', 7, 'Sastra', 1),
(116, 'wanita', 1, 'Sastra', 1),
(117, 'cinta', 3, 'Sastra', 1),
(118, 'kecil', 1, 'Sastra', 1),
(119, 'lebih', 1, 'Sastra', 1),
(120, 'pilih', 1, 'Sastra', 1),
(121, 'meni', 1, 'Sastra', 1),
(122, 'sahabat', 2, 'Sastra', 1),
(123, 'baik', 1, 'Sastra', 1),
(124, 'bening', 1, 'Agama', 1),
(125, 'suci', 3, 'Agama', 1),
(126, 'jiwa', 2, 'Agama', 1),
(127, 'bersih', 1, 'Agama', 1),
(128, 'juuga', 1, 'Agama', 1),
(129, 'butuh', 1, 'Agama', 1),
(130, 'buta', 3, 'Agama', 1),
(131, 'sangat', 2, 'Agama', 1),
(132, 'bahaya', 1, 'Agama', 1),
(133, 'apabila', 1, 'Agama', 1),
(134, 'derita', 1, 'Agama', 1),
(135, 'sakit', 1, 'Agama', 1),
(136, 'diri', 1, 'Agama', 1),
(137, 'cahaya', 1, 'Agama', 1),
(138, 'ilahi', 1, 'Agama', 1),
(139, 'upa', 2, 'Agama', 1),
(140, 'jalnnya', 1, 'Agama', 1),
(141, 'sesat', 1, 'Agama', 1),
(142, 'surga', 1, 'Agama', 1),
(143, 'malah', 1, 'Agama', 1),
(144, 'neraka', 1, 'Agama', 1),
(145, 'tempuh', 1, 'Agama', 1),
(146, 'sederhana', 2, 'Agama', 1),
(147, 'hadap', 1, 'Agama', 1),
(148, 'pandu', 1, 'Agama', 1),
(149, 'sejati', 1, 'Agama', 1),
(150, 'sebut', 1, 'Agama', 1),
(151, 'dengan', 1, 'Agama', 1),
(152, 'gaya', 1, 'Agama', 1),
(153, 'renung', 2, 'Agama', 1),
(154, 'guru', 1, 'Agama', 1),
(155, 'karya', 1, 'Agama', 1),
(156, 'ulama', 2, 'Agama', 1),
(157, 'muka', 1, 'Agama', 1),
(158, 'abad', 1, 'Agama', 1),
(159, 'tengah', 1, 'Agama', 1),
(160, 'perlu', 1, 'Agama', 1),
(161, 'baca', 1, 'Agama', 1),
(162, 'salah', 1, 'Agama', 1),
(163, 'satu', 1, 'Agama', 1),
(164, 'cara', 1, 'Agama', 1),
(165, 'syarat', 1, 'Agama', 1),
(166, 'segala', 1, 'Agama', 1),
(167, 'minta', 1, 'Agama', 1),
(168, 'kabul', 1, 'Agama', 1),
(169, 'assalamualaikum', 1, 'Sastra', 1),
(170, 'beijing', 2, 'Sastra', 1),
(171, 'dewa', 5, 'Sastra', 1),
(172, 'ra', 2, 'Sastra', 1),
(173, 'jalin', 1, 'Sastra', 1),
(174, 'hubung', 1, 'Sastra', 1),
(175, 'pacar', 1, 'Sastra', 1),
(176, 'sejak', 1, 'Sastra', 1),
(177, 'kuliah', 1, 'Sastra', 1),
(178, 'selang', 1, 'Sastra', 1),
(179, 'tuju', 1, 'Sastra', 1),
(180, 'gerbang', 1, 'Sastra', 1),
(181, 'nikah', 3, 'Sastra', 1),
(182, 'tidak', 1, 'Sastra', 1),
(183, 'sangka', 1, 'Sastra', 1),
(184, 'nyata', 1, 'Sastra', 1),
(185, 'sama', 1, 'Sastra', 1),
(186, 'anita', 5, 'Sastra', 1),
(187, 'rekan', 1, 'Sastra', 1),
(188, 'memang', 1, 'Sastra', 1),
(189, 'jatuh', 2, 'Sastra', 1),
(190, 'pada', 1, 'Sastra', 1),
(191, 'paksa', 1, 'Sastra', 1),
(192, 'hamil', 1, 'Sastra', 1),
(193, 'akibat', 2, 'Sastra', 1),
(194, 'jebak', 1, 'Sastra', 1),
(195, 'rangsang', 1, 'Sastra', 1),
(196, 'seksual', 1, 'Sastra', 1),
(197, 'laku', 1, 'Sastra', 1),
(198, 'tubuh', 2, 'Sastra', 1),
(199, 'dengan', 1, 'Sastra', 1),
(200, 'sementara', 2, 'Sastra', 1),
(201, 'itu', 2, 'Sastra', 1),
(202, 'jalan', 1, 'Sastra', 1),
(203, 'asma', 4, 'Sastra', 1),
(204, 'murah', 1, 'Sastra', 1),
(205, 'lalu', 1, 'Sastra', 1),
(206, 'temu', 2, 'Sastra', 1),
(207, 'zhongwen', 5, 'Sastra', 1),
(208, 'sangat', 1, 'Sastra', 1),
(209, 'kes', 1, 'Sastra', 1),
(210, 'kisah', 1, 'Sastra', 1),
(211, 'sejati', 1, 'Sastra', 1),
(212, 'ahei', 1, 'Sastra', 1),
(213, 'ashima', 1, 'Sastra', 1),
(214, 'lewat', 1, 'Sastra', 1),
(215, 'teman', 1, 'Sastra', 1),
(216, 'banyak', 1, 'Sastra', 1),
(217, 'dapat', 1, 'Sastra', 1),
(218, 'cerah', 1, 'Sastra', 1),
(219, 'islam', 2, 'Sastra', 1),
(220, 'allah', 1, 'Sastra', 1),
(221, 'swt', 1, 'Sastra', 1),
(222, 'hidayah', 1, 'Sastra', 1),
(223, 'akhir', 1, 'Sastra', 1),
(224, 'tuntun', 1, 'Sastra', 1),
(225, 'jadi', 1, 'Sastra', 1),
(226, 'mualaf', 1, 'Sastra', 1),
(227, 'usir', 1, 'Sastra', 1),
(228, 'keluarga', 1, 'Sastra', 1),
(229, 'bagi', 1, 'Sastra', 1),
(230, 'korban', 2, 'Sastra', 1),
(231, 'berapa', 1, 'Sastra', 1),
(232, 'banding', 1, 'Sastra', 1),
(233, 'musuh', 1, 'Sastra', 1),
(234, 'ab', 1, 'Sastra', 1),
(235, 'bin', 1, 'Sastra', 1),
(236, 'umair', 1, 'Sastra', 1),
(237, 'nabi', 1, 'Sastra', 1),
(238, 'muhammad', 1, 'Sastra', 1),
(239, 'rela', 1, 'Sastra', 1),
(240, 'lepas', 2, 'Sastra', 1),
(241, 'harta', 1, 'Sastra', 1),
(242, 'duduk', 1, 'Sastra', 1),
(243, 'hormat', 1, 'Sastra', 1),
(244, 'juang', 1, 'Sastra', 1),
(245, 'agama', 1, 'Sastra', 1),
(246, 'mati', 1, 'Sastra', 1),
(247, 'syahid', 1, 'Sastra', 1),
(248, 'perang', 1, 'Sastra', 1),
(249, 'lawan', 2, 'Sastra', 1),
(250, 'kaum', 1, 'Sastra', 1),
(251, 'musyrikin', 1, 'Sastra', 1),
(252, 'kondisi', 1, 'Sastra', 1),
(253, 'tangan', 1, 'Sastra', 1),
(254, 'putus', 1, 'Sastra', 1),
(255, 'tebas', 1, 'Sastra', 1),
(256, 'sisi', 1, 'Sastra', 1),
(257, 'lain', 1, 'Sastra', 1),
(258, 'mulai', 1, 'Sastra', 1),
(259, 'rasa', 1, 'Sastra', 1),
(260, 'usaha', 2, 'Sastra', 1),
(261, 'keras', 1, 'Sastra', 1),
(262, 'cari', 1, 'Sastra', 1),
(263, 'dadak', 1, 'Sastra', 1),
(264, 'hilang', 1, 'Sastra', 1),
(265, 'berita', 1, 'Sastra', 1),
(266, 'tak', 1, 'Sastra', 1),
(267, 'hasil', 2, 'Sastra', 1),
(268, 'bayang', 2, 'Sastra', 1),
(269, 'hidup', 1, 'Sastra', 1),
(270, 'rumah', 1, 'Sastra', 1),
(271, 'tangga', 1, 'Sastra', 1),
(272, 'bunuh', 1, 'Sastra', 1),
(273, 'diri', 1, 'Sastra', 1),
(274, 'meski', 1, 'Sastra', 1),
(275, 'karunia', 1, 'Sastra', 1),
(276, 'anak', 1, 'Sastra', 1),
(277, 'luar', 1, 'Sastra', 1),
(278, 'tetap', 1, 'Sastra', 1),
(279, 'sayang', 1, 'Sastra', 1),
(280, 'istri', 1, 'Sastra', 1),
(281, 'layak', 1, 'Sastra', 1),
(282, 'jangan', 1, 'Umum', 1),
(283, 'tidur', 1, 'Umum', 1),
(284, 'sasa', 1, 'Agama', 1),
(285, 'v', 1, 'Agama', 1),
(286, 'r', 1, 'Agama', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id` int(250) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `keaktifan` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`id`, `kategori`, `keaktifan`) VALUES
(3, 'coba', 1),
(5, 'makan', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list_prediksi`
--
ALTER TABLE `list_prediksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prediksi`
--
ALTER TABLE `prediksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stem`
--
ALTER TABLE `stem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `klasifikasi`
--
ALTER TABLE `klasifikasi`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `list_prediksi`
--
ALTER TABLE `list_prediksi`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prediksi`
--
ALTER TABLE `prediksi`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `stem`
--
ALTER TABLE `stem`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
