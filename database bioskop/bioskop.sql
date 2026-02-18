-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 04:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `id_film` varchar(20) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `genre` varchar(50) DEFAULT NULL,
  `rating` varchar(5) DEFAULT NULL,
  `produksi` varchar(50) DEFAULT NULL,
  `distributor` varchar(50) DEFAULT NULL,
  `durasi` varchar(20) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`id_film`, `judul`, `genre`, `rating`, `produksi`, `distributor`, `durasi`, `country`, `created_at`, `updated_at`) VALUES
('1001', 'The Quintessential Quintuplets Movie', 'Comedy, Romance', '7.8', '	\r\nBibury Animation Studios', 'Pony Canyon', '2 jam 16 menit', 'Japan', '2022-06-23 01:12:51', '2022-06-24 23:46:59'),
('1002', 'I Want to Eat Your Pancreas', 'Drama, Romance, Slice of Life', '8.0', 'Studio VOLN', 'Aniplex', '1 jam 49 menit', 'Japan', '2022-06-23 01:19:37', '2022-06-24 23:46:59'),
('1003', 'Your Name', 'Drama, Supernatural', '8.87', 'CoMix Wave Films', 'Funimation, NYAV Post', '1 jam 46 menit', 'Japan', '2022-06-23 01:24:23', '2022-06-24 23:46:59'),
('1004', 'Hello World', ' Drama, Romance, Sci-Fi', '7.52', 'Graphinica', 'Toho', '1 jam 37 menit', 'Japan', '2022-06-23 01:30:30', '2022-06-24 23:46:59'),
('1005', 'Avengers: Endgame', 'Adventure, Action, Drama', '8.4', 'Marvel Studios', 'Walt Disney Studios Motion Pictures', '3 jam 1 menit', 'United States', '2022-06-23 01:26:46', '2022-06-25 00:00:25');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(20) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `harga` varchar(11) NOT NULL,
  `id_film` varchar(20) NOT NULL,
  `id_teater` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `hari`, `jam`, `harga`, `id_film`, `id_teater`, `created_at`, `updated_at`) VALUES
('2001', 'Minggu', '19.00', '120000', '1001', '5002', '2022-06-25 01:48:13', '2022-06-24 23:50:23'),
('2002', 'Minggu', '15.00', '120000', '1002', '5003', '2022-06-25 01:48:13', '2022-06-24 23:50:23'),
('2003', 'Sabtu', '18.00', '120000', '1003', '5001', '2022-06-25 01:48:13', '2022-06-24 23:50:23'),
('2004', 'Sabtu', '14.00', '120000', '1004', '5003', '2022-06-25 01:48:13', '2022-06-24 23:50:23'),
('2005', 'Jum\'at', '17.30', '100000', '1005', '5002', '2022-06-25 01:48:13', '2022-06-24 23:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `kursi`
--

CREATE TABLE `kursi` (
  `id_kursi` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_teater` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kursi`
--

INSERT INTO `kursi` (`id_kursi`, `nama`, `id_teater`, `created_at`, `updated_at`) VALUES
('3009', 'Yusuf Hanagaki', '5002', '2022-06-25 01:50:43', '2022-06-24 23:54:29'),
('3310', 'Zikri Nurrahman', '5001', '2022-06-25 01:50:43', '2022-06-24 23:54:29'),
('3311', 'Kitou Akari', '5001', '2022-06-25 01:50:43', '2022-06-24 23:54:29'),
('3315', 'Anton Prikitiw', '5003', '2022-06-25 01:50:43', '2022-06-24 23:54:29'),
('3508', 'Bambang Watanabe', '5003', '2022-06-25 01:50:43', '2022-06-24 23:54:29'),
('3710', 'Anwar Slebew', '5002', '2022-06-25 01:50:43', '2022-06-25 00:16:39');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `data` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `data`) VALUES
(1, 'admin', '1234', 'ADMIN'),
(2, 'user', '1234', 'USER');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `nama`, `password`, `created_at`, `updated_at`) VALUES
('4001', 'Yanto Bagaskara', 'aezakmi', '2022-06-25 01:54:40', '2022-06-24 23:56:09'),
('4002', 'Santi Cazorla', 'yntkts', '2022-06-25 01:54:40', '2022-06-24 23:56:09'),
('4003', 'Ani Ina', 'BeCareFul', '2022-06-25 01:54:40', '2022-06-25 00:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `teater`
--

CREATE TABLE `teater` (
  `id_teater` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teater`
--

INSERT INTO `teater` (`id_teater`, `nama`, `created_at`, `updated_at`) VALUES
('5001', 'Studio One', '2022-06-23 01:33:09', '2022-06-24 23:46:06'),
('5002', 'CGV Cinemas', '2022-06-23 01:33:09', '2022-06-24 23:46:06'),
('5003', 'Cinepolis', '2022-06-23 01:33:09', '2022-06-25 00:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) NOT NULL,
  `id_operator` varchar(20) NOT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  `id_kursi` varchar(20) NOT NULL,
  `jumlah_dibayar` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_operator`, `id_jadwal`, `id_kursi`, `jumlah_dibayar`, `kembalian`, `created_at`) VALUES
('6001', '4001', '2003', '3310', 150000, 30000, '2022-06-25 01:56:18'),
('6002', '4001', '2003', '3311', 150000, 30000, '2022-06-25 01:56:19'),
('6003', '4002', '2001', '3009', 150000, 30000, '2022-06-25 01:56:19'),
('6004', '4002', '2005', '3710', 120000, 0, '2022-06-25 01:56:19'),
('6005', '4003', '2002', '3315', 100000, 0, '2022-06-25 01:56:19'),
('6006', '4003', '2004', '3508', 100000, 0, '2022-06-25 01:56:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_film` (`id_film`),
  ADD KEY `id_teater` (`id_teater`);

--
-- Indexes for table `kursi`
--
ALTER TABLE `kursi`
  ADD PRIMARY KEY (`id_kursi`),
  ADD KEY `id_teater` (`id_teater`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `teater`
--
ALTER TABLE `teater`
  ADD PRIMARY KEY (`id_teater`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_operator` (`id_operator`),
  ADD KEY `id_jadwal` (`id_jadwal`),
  ADD KEY `id_kursi` (`id_kursi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_teater`) REFERENCES `teater` (`id_teater`);

--
-- Constraints for table `kursi`
--
ALTER TABLE `kursi`
  ADD CONSTRAINT `kursi_ibfk_1` FOREIGN KEY (`id_teater`) REFERENCES `teater` (`id_teater`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_operator`) REFERENCES `operator` (`id_operator`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_kursi`) REFERENCES `kursi` (`id_kursi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
