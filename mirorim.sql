-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 05:28 AM
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
  `qtybox` int(11) NOT NULL,
  `boxcount` int(11) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `resi` varchar(200) NOT NULL,
  `kubikasi` float NOT NULL,
  `count` float NOT NULL,
  `note` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Tidak Diterima',
  `tempstat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`iddus`, `box`, `qtybox`, `boxcount`, `invoice`, `resi`, `kubikasi`, `count`, `note`, `status`, `tempstat`) VALUES
(1, '666', 7, 9, '6666', '66666', 6.6, 15, '', 'Diterima', 1),
(2, '777', 6, 8, '7777', '77777', 0.7, 15, '', 'Diterima', 1),
(3, '888', 8, 7, '8888', '88888', 0.8, 15, '', 'Diterima', 1),
(4, '999', 9, 6, '9999', '99999', 5, 15, '', 'Diterima', 1),
(933, '111', 11, 11, '1111', '11111', 1.1, 8.8, '', 'Diterima', 1),
(934, '222', 2, 2, '2222', '22222', 2.2, 6.7, 'Dus Basah 2', 'Diterima', 1),
(935, '333', 33, 33, '3333', '33333', 3.3, 8.8, '', 'Diterima', 1),
(936, '444', 44, 44, '4444', '44444', 4.4, 6.7, 'Dus Rusak 2', 'Diterima', 1),
(937, '22KJ567', 44, 44, '24979401412', '748179417974919009', 2, 2, 'dus basah 4', 'Diterima', 1);

-- --------------------------------------------------------

--
-- Table structure for table `itembox`
--

CREATE TABLE `itembox` (
  `idbarang` int(11) NOT NULL,
  `image` varchar(10000) DEFAULT NULL,
  `invoice` varchar(200) NOT NULL,
  `box` varchar(200) NOT NULL,
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

INSERT INTO `itembox` (`idbarang`, `image`, `invoice`, `box`, `sku`, `nama`, `quantity`, `status`, `qtygudang`, `note`) VALUES
(1, 'c157d83b32879689627411c3d0f1911b.jpg', '2016K-DEERHA-112230', '', '', 'LED Module White ', 20000, 'Approve', 20000, ''),
(6, 'b06df2e8d9cc30e0815a766b69e1df81.png', '6666', '666', '5K2', 'Tang', 2000, 'Approve', 40, ''),
(7, '4a3615196e3f123a9ca83dc7a1423674.png', '6666', '666', '2k2', 'Batre Holder', 1005, 'Approve', 1000, ''),
(8, 'e769f66afe310a91329a0c8901e02fbe.jpg', '6666', '666', '', 'digital', 2001, 'Approve', 2000, '');

-- --------------------------------------------------------

--
-- Table structure for table `kubikasi`
--

CREATE TABLE `kubikasi` (
  `iddus` int(11) NOT NULL,
  `resi` varchar(200) NOT NULL,
  `invoice` varchar(200) NOT NULL,
  `kubikasi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `iduser` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`iduser`, `username`, `password`, `role`) VALUES
(1, 'gudang', 'gudang', 'gudang'),
(2, 'admin', 'admin', 'admin');

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
(1, 'c157d83b32879689627411c3d0f1911b.jpg', 'LED Module White ', '1i1', '', '', 20000),
(2, 'b06df2e8d9cc30e0815a766b69e1df81.png', 'Tang', '5K2', '', '', 40),
(3, '4a3615196e3f123a9ca83dc7a1423674.png', 'Batre Holder', '2k2', '', '', 1000),
(4, 'e769f66afe310a91329a0c8901e02fbe.jpg', 'digital', '', '', '', 2000);

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
-- Indexes for table `kubikasi`
--
ALTER TABLE `kubikasi`
  ADD PRIMARY KEY (`iddus`);

--
-- Indexes for table `listpre`
--
ALTER TABLE `listpre`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`iduser`);

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
  MODIFY `iddus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=938;

--
-- AUTO_INCREMENT for table `itembox`
--
ALTER TABLE `itembox`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kubikasi`
--
ALTER TABLE `kubikasi`
  MODIFY `iddus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listpre`
--
ALTER TABLE `listpre`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temp_item`
--
ALTER TABLE `temp_item`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
