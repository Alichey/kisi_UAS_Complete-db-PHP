-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 09, 2026 at 02:06 AM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventarisweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

DROP TABLE IF EXISTS `karyawan`;
CREATE TABLE IF NOT EXISTS `karyawan` (
  `idKaryawan` int NOT NULL AUTO_INCREMENT,
  `namaKaryawan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `jabatanKaryawan` enum('DIREKTUR','CEO','OPERASIONAL','ADMIN','IT','UMUM') COLLATE utf8mb4_general_ci NOT NULL,
  `posisiKaryawan` enum('GDG ARIES','GDG TAURUS','GDG GEMINI','GDG LEO','GDG VIRGO','GDG LIBRA','GDG SCORPIO','GDG SAGITTARIUS','GDG CAPRICORN','GDG AQUARIUS','GDG CANCER','GDG PISCES') COLLATE utf8mb4_general_ci NOT NULL,
  `del` int NOT NULL,
  `ctm` datetime DEFAULT NULL,
  `mtm` datetime DEFAULT NULL,
  `dtm` datetime DEFAULT NULL,
  `usr` int NOT NULL,
  PRIMARY KEY (`idKaryawan`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`idKaryawan`, `namaKaryawan`, `jabatanKaryawan`, `posisiKaryawan`, `del`, `ctm`, `mtm`, `dtm`, `usr`) VALUES
(1, 'Martin Garrix', 'CEO', 'GDG GEMINI', 0, NULL, NULL, NULL, 0),
(2, 'Deni', 'CEO', 'GDG SCORPIO', 0, '2026-06-09 08:45:04', '2026-06-09 08:51:04', NULL, 0),
(3, 'GIOVANUS', 'DIREKTUR', 'GDG TAURUS', 0, '2026-06-09 08:57:10', NULL, NULL, 0),
(4, 'test', 'DIREKTUR', 'GDG TAURUS', 1, '2026-06-09 08:57:23', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `del` int NOT NULL,
  `ctm` datetime DEFAULT NULL,
  `mtm` datetime DEFAULT NULL,
  `dtm` datetime DEFAULT NULL,
  `usr` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `del`, `ctm`, `mtm`, `dtm`, `usr`) VALUES
(1, 'admin1', 'adminsatu', 'ADMIN 1', 0, '2026-04-26 10:59:21', NULL, NULL, 0),
(2, 'admin2', 'admindua', 'ADMIN 2', 0, '2026-04-26 10:59:21', NULL, NULL, 0),
(3, 'admin3', 'admintiga', 'admin 3', 0, '2026-05-05 15:22:39', NULL, NULL, 0),
(4, 'admin4', 'adminempat', 'ADMIN 4', 0, '2026-05-11 10:46:16', NULL, NULL, 0),
(6, 'test', 'test', 'test', 1, '2026-05-19 18:29:29', NULL, NULL, 0),
(7, '1', '1', '1', 1, '2026-05-19 18:41:55', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `perangkat`
--

DROP TABLE IF EXISTS `perangkat`;
CREATE TABLE IF NOT EXISTS `perangkat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_perangkat` varchar(200) NOT NULL,
  `jenis_perangkat` enum('MOUSE','KEYBOARD','CPU','MONITOR') NOT NULL,
  `posisi` enum('LAB A','LAB B','LAB C','LAB D') NOT NULL,
  `del` int NOT NULL,
  `ctm` datetime DEFAULT NULL,
  `mtm` datetime DEFAULT NULL,
  `dtm` datetime DEFAULT NULL,
  `usr` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `perangkat`
--

INSERT INTO `perangkat` (`id`, `nama_perangkat`, `jenis_perangkat`, `posisi`, `del`, `ctm`, `mtm`, `dtm`, `usr`) VALUES
(1, 'CADXC', 'MOUSE', 'LAB A', 0, '2026-05-26 19:02:06', NULL, NULL, 0),
(2, 'AABBC', 'MOUSE', 'LAB B', 0, '2026-05-26 19:02:06', '2026-05-26 19:09:04', NULL, 0),
(3, 'AABBX', 'CPU', 'LAB B', 1, '2026-05-26 19:12:56', NULL, NULL, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
