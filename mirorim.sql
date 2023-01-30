-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 07:56 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mirorim`
--

-- --------------------------------------------------------

--
-- Table structure for table `box`
--

CREATE TABLE `box` (
  `iddus` int(11) NOT NULL,
  `box` varchar(200) NOT NULL,
  `nobox` int(11) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Tidak Diterima'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`iddus`, `box`, `nobox`, `invoice`, `status`) VALUES
(1, '113020K', 1, '2016K-DEERHA-112230', 'Diterima'),
(2, '113020K', 2, '2016K-DEERHA-112230', 'Tidak Diterima'),
(3, '113020K', 3, '2016K-DEERHA-112230', 'Tidak Diterima'),
(4, '113020K', 4, '2016K-DEERHA-112230', 'Tidak Diterima'),
(5, '113020K', 5, '2016K-DEERHA-112230', 'Tidak Diterima'),
(6, '113020K', 6, '2016K-DEERHA-112230', 'Tidak Diterima'),
(7, '113020K', 7, '2016K-DEERHA-112230', 'Tidak Diterima'),
(8, '113020K', 8, '2016K-DEERHA-112230', 'Tidak Diterima'),
(9, '113020K', 9, '2016K-DEERHA-112230', 'Tidak Diterima'),
(10, '113020K', 10, '2016K-DEERHA-112230', 'Tidak Diterima'),
(11, '113020K', 11, '2016K-DEERHA-112230', 'Tidak Diterima'),
(12, '113020K', 12, '2016K-DEERHA-112230', 'Tidak Diterima'),
(13, '113020K', 13, '2016K-DEERHA-112230', 'Tidak Diterima'),
(14, '113020K', 14, '2016K-DEERHA-112230', 'Tidak Diterima'),
(15, '113020K', 15, '2016K-DEERHA-112230', 'Tidak Diterima'),
(16, '113020K', 16, '2016K-DEERHA-112230', 'Tidak Diterima'),
(17, '113020K', 17, '2016K-DEERHA-112230', 'Tidak Diterima'),
(18, '113020K', 18, '2016K-DEERHA-112230', 'Tidak Diterima'),
(19, '113020K', 19, '2016K-DEERHA-112230', 'Tidak Diterima'),
(20, '113020K', 20, '2016K-DEERHA-112230', 'Tidak Diterima'),
(21, '113020K', 21, '2016K-DEERHA-112230', 'Tidak Diterima'),
(22, '113020K', 22, '2016K-DEERHA-112230', 'Tidak Diterima'),
(23, '113020K', 23, '2016K-DEERHA-112230', 'Tidak Diterima'),
(24, '113020K', 24, '2016K-DEERHA-112230', 'Tidak Diterima'),
(25, '113020K', 25, '2016K-DEERHA-112230', 'Tidak Diterima'),
(26, '113020K', 26, '2016K-DEERHA-112230', 'Tidak Diterima'),
(27, '113020K', 27, '2016K-DEERHA-112230', 'Tidak Diterima'),
(28, '113020K', 28, '2016K-DEERHA-112230', 'Tidak Diterima'),
(29, '113020K', 29, '2016K-DEERHA-112230', 'Tidak Diterima'),
(30, '113020K', 30, '2016K-DEERHA-112230', 'Tidak Diterima'),
(31, '113020K', 31, '2016K-DEERHA-112230', 'Tidak Diterima'),
(32, '113020K', 32, '2016K-DEERHA-112230', 'Tidak Diterima'),
(33, '113020K', 33, '2016K-DEERHA-112230', 'Tidak Diterima'),
(34, '113020K', 34, '2016K-DEERHA-112230', 'Tidak Diterima'),
(35, '113020K', 35, '2016K-DEERHA-112230', 'Tidak Diterima'),
(36, '113020K', 36, '2016K-DEERHA-112230', 'Tidak Diterima'),
(37, '113020K', 37, '2016K-DEERHA-112230', 'Tidak Diterima'),
(38, '113020K', 38, '2016K-DEERHA-112230', 'Tidak Diterima'),
(39, '113020K', 39, '2016K-DEERHA-112230', 'Tidak Diterima'),
(40, '113020K', 40, '2016K-DEERHA-112230', 'Tidak Diterima'),
(41, '113020K', 41, '2016K-DEERHA-112230', 'Tidak Diterima'),
(42, '113020K', 42, '2016K-DEERHA-112230', 'Tidak Diterima'),
(43, '113020K', 43, '2016K-DEERHA-112230', 'Tidak Diterima'),
(44, '113020K', 44, '2016K-DEERHA-112230', 'Tidak Diterima');

-- --------------------------------------------------------

--
-- Table structure for table `itembox`
--

CREATE TABLE `itembox` (
  `idbarang` int(11) NOT NULL,
  `image` varchar(10000) DEFAULT NULL,
  `invoice` varchar(200) NOT NULL,
  `sku` varchar(6) NOT NULL,
  `nama` varchar(2000) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'No Approve',
  `qtygudang` int(11) NOT NULL,
  `note` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itembox`
--

INSERT INTO `itembox` (`idbarang`, `image`, `invoice`, `sku`, `nama`, `quantity`, `status`, `qtygudang`, `note`) VALUES
(1, 'c157d83b32879689627411c3d0f1911b.jpg', '2016K-DEERHA-112230', '', 'LED Module White ', 20000, 'Approve', 20000, '');

-- --------------------------------------------------------

--
-- Table structure for table `listpre`
--

CREATE TABLE `listpre` (
  `idbarang` int(11) NOT NULL,
  `sku` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `komponen` varchar(200) NOT NULL,
  `skug` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `idbarang` int(11) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `skug` varchar(20) NOT NULL,
  `gudang` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`idbarang`, `image`, `nama`, `sku`, `skug`, `gudang`, `quantity`) VALUES
(1, 'c157d83b32879689627411c3d0f1911b.jpg', 'LED Module White ', '', '', '', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `temp_item`
--

CREATE TABLE `temp_item` (
  `idbarang` int(11) NOT NULL,
  `image` mediumtext NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `sku` varchar(200) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `quantity_temp` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'ulang'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_item`
--

INSERT INTO `temp_item` (`idbarang`, `image`, `invoice`, `sku`, `nama`, `quantity_temp`, `status`) VALUES
(5, '03070184d907be862522780e4dfd925b.png', '6666', '', 'speaker', 700, 'ulang'),
(6, 'af6498efcd9337c4d3c5a980c0fe5438.jpg', '6666', '3J1', 'Adaptor 3', 200, 'Berhasil');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `box`
--
ALTER TABLE `box`
  ADD PRIMARY KEY (`iddus`);

--
-- Indexes for table `itembox`
--
ALTER TABLE `itembox`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `listpre`
--
ALTER TABLE `listpre`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `temp_item`
--
ALTER TABLE `temp_item`
  ADD PRIMARY KEY (`idbarang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `box`
--
ALTER TABLE `box`
  MODIFY `iddus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `itembox`
--
ALTER TABLE `itembox`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `listpre`
--
ALTER TABLE `listpre`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_item`
--
ALTER TABLE `temp_item`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
