-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2019 at 12:09 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stok_bensin`
--

-- --------------------------------------------------------

--
-- Table structure for table `bensin`
--

CREATE TABLE `bensin` (
  `id_bbm` int(11) NOT NULL,
  `nama_bbm` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok_bbm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bensin`
--

INSERT INTO `bensin` (`id_bbm`, `nama_bbm`, `harga`, `stok_bbm`) VALUES
(1, 'Pertalite', 7650, 100),
(2, 'Pertamax', 9850, 100),
(3, 'Pertamax Turbo', 11200, 100),
(4, 'Solar', 6000, 100),
(5, 'Biosolar', 9800, 100),
(6, 'Dexlite', 10200, 100);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `no_penjualan` varchar(20) NOT NULL,
  `tgl_penjualan` date DEFAULT NULL,
  `id_bbm` int(11) NOT NULL,
  `bbm_terjual` int(11) NOT NULL,
  `total_penjualan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`no_penjualan`, `tgl_penjualan`, `id_bbm`, `bbm_terjual`, `total_penjualan`) VALUES
('SPBU2019112501', '2019-11-25', 1, 2, 15300),
('SPBU2019112502', '2019-11-25', 1, 2, 15300),
('SPBU2019112503', '2019-11-25', 2, 1, 9850),
('SPBU2019112504', '2019-11-25', 2, 1, 9850),
('SPBU2019112505', '2019-11-25', 3, 20, 224000),
('SPBU2019112506', '2019-11-25', 4, 15, 90000),
('SPBU2019112507', '2019-11-25', 5, 10, 98000),
('SPBU2019112508', '2019-11-25', 6, 3, 30600);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `gaji` int(10) NOT NULL,
  `level_user` enum('admin','karyawan') NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `alamat`, `bagian`, `gaji`, `level_user`) VALUES
(1, 'Admin', 'admin', 'admin', 'Sekaran', 'Manager', 10000000, 'admin'),
(2, 'Farhan', 'farhan', 'pilihsatu', 'Patemon', 'Operator', 3000000, 'karyawan'),
(3, 'Agaphier', 'aga', 'pilihdua', 'Banyumanik', 'Security', 1500000, 'karyawan'),
(7, 'Kahfi', 'kahfi', 'aulia', 'Ungaran', 'Cleaning Service', 500000, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bensin`
--
ALTER TABLE `bensin`
  ADD PRIMARY KEY (`id_bbm`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`no_penjualan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bensin`
--
ALTER TABLE `bensin`
  MODIFY `id_bbm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
