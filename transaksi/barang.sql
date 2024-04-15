-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 07:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(12) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(12) NOT NULL,
  `u_input` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `tanggal`, `harga`, `stok`, `u_input`) VALUES
(172, 'jkjh', '2024-04-30', 12000, 11, 'fulan bin fulan');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(12) NOT NULL,
  `pesan` text NOT NULL,
  `user_i` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `pesan`, `user_i`) VALUES
(1, 'fulan bin fulan Menghapus data barang ', 'fulan bin fu'),
(2, 'fulan bin fulan Menambahkan data barang jkjh', 'fulan bin fu'),
(3, 'fulan bin fulan Mengedit data barang 15-Mon-Apr-2024 jkjh', 'fulan bin fu'),
(4, 'fulan bin fulan Mengedit data barang 15-Mon-Apr-2024 jkjh', 'fulan bin fu');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idt` int(12) NOT NULL,
  `idb` int(12) NOT NULL,
  `nama` varchar(24) NOT NULL,
  `tanggal` date NOT NULL,
  `jjual` int(12) NOT NULL,
  `uinput` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idt`, `idb`, `nama`, `tanggal`, `jjual`, `uinput`) VALUES
(15, 163, 'jkjh', '2024-04-03', 120, 'fulan bin fulan');

-- --------------------------------------------------------

--
-- Table structure for table `usser`
--

CREATE TABLE `usser` (
  `id` int(12) NOT NULL,
  `nama` varchar(24) NOT NULL,
  `email` varchar(64) NOT NULL,
  `user` varchar(12) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `lv` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usser`
--

INSERT INTO `usser` (`id`, `nama`, `email`, `user`, `pass`, `lv`) VALUES
(1, 'fulan bin fulan', 'admin@gmail.com', 'admin', '$2y$10$oSw72Pvtc3JzkaVPWw5tquMHTXYbuDMpNarzkpf1UYdjmLK9XVgJq', 'admin'),
(17, 'denis', 'admin@gmail.com', 'denis', '$2y$10$ws0XCzChW0gWqHpaei2Wm.DhZcOk9SgLcSAiZoks.6/.ygbhAOA0S', 'user'),
(19, 'jkjh', 'yuseras@gmail.com', 'sess', '$2y$10$kr10psTrx2qQHlF/2rxaNedfwdhC3sFigazyyy1fZIuM9oimyCt3C', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idt`);

--
-- Indexes for table `usser`
--
ALTER TABLE `usser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idt` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `usser`
--
ALTER TABLE `usser`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
