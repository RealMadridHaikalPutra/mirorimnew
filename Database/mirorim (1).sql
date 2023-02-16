-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2023 at 05:22 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
  `kubikasi` varchar(200) NOT NULL,
  `ctkubik` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Tidak Diterima',
  `tempstat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `box`
--

INSERT INTO `box` (`iddus`, `box`, `qtybox`, `boxcount`, `invoice`, `resi`, `kubikasi`, `ctkubik`, `note`, `status`, `tempstat`) VALUES
(1, '1111', 1111, 11, '1111', '1111', '11.1', '44.4', '', 'Diterima', 1),
(2, '222', 222, 22, '222', '222', '22.2', '22.2', '', 'Diterima', 1),
(3, '333', 333, 11, '333', '333', '33.3', '', '', 'Diterima', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exititem`
--

CREATE TABLE `exititem` (
  `idbarang` int(11) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `picker` varchar(20) NOT NULL,
  `quantityrep` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `timerefill` timestamp NOT NULL DEFAULT current_timestamp(),
  `tempstat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exititem`
--

INSERT INTO `exititem` (`idbarang`, `image`, `nama`, `sku`, `picker`, `quantityrep`, `status`, `timerefill`, `tempstat`) VALUES
(6, '', 'coba', '4e1', 'e', 150, 'Refill', '2023-02-16 16:21:36', 1),
(7, '', 'coba', '4e1', 'e', 50, 'Refill', '2023-02-16 16:21:36', 1),
(8, '', 'coba', '4e1', 'w', 50, 'Refill', '2023-02-16 16:21:36', 1),
(9, '', 'coba', '4e1', 'e', 50, 'Refill', '2023-02-16 16:21:36', 1),
(10, '', 'coba', '4e1', 'd', 50, 'Refill', '2023-02-16 16:21:36', 1),
(11, '', 'coba', '4e1', 'r', 50, 'Refill', '2023-02-16 16:21:36', 1),
(12, '', 'coba', '4e1', 'c', 200, 'Refill', '2023-02-16 16:21:36', 1),
(13, '', '', '', '', 0, 'On process', '2023-02-16 16:21:36', 0),
(14, '', '', '', '', 0, 'On process', '2023-02-16 16:21:36', 0),
(15, '', '', '', '', 0, 'On process', '2023-02-16 16:21:36', 0),
(16, '', 'coba', '4e1', 'e', 50, 'Refill', '2023-02-16 16:21:36', 1);

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
(1, 'f135051fc9ea777c5f718a7547a8f015.jpg', '1111', '1111', '', 'anjay', 2000, 'Approve', 2000, ''),
(2, 'd315f884c94c03e1198590e1f2006607.jpg', '1111', '1111', '4e1', 'coba', 10000, 'Approve', 10000, ''),
(3, '2d76fb0ceda756fbc8ae1b704818e451.jpg', '1111', '1111', '', 'Banana Plug -RED', 100, 'No Approve', 0, ''),
(4, '2d76fb0ceda756fbc8ae1b704818e451.jpg', '1111', '1111', '', 'Banana Plug -GREEN', 100, 'No Approve', 0, ''),
(5, '2d76fb0ceda756fbc8ae1b704818e451.jpg', '1111', '1111', '', 'Banana Plug -BLUE', 100, 'No Approve', 0, ''),
(6, '2d76fb0ceda756fbc8ae1b704818e451.jpg', '1111', '1111', '', 'Banana Plug -YELLOW', 100, 'No Approve', 0, ''),
(7, '2d76fb0ceda756fbc8ae1b704818e451.jpg', '1111', '1111', '', 'Banana Plug -PINK', 100, 'No Approve', 0, ''),
(8, '2d76fb0ceda756fbc8ae1b704818e451.jpg', '1111', '1111', '', 'Banana Plug -UNGU', 100, 'No Approve', 0, ''),
(9, '2d76fb0ceda756fbc8ae1b704818e451.jpg', '1111', '1111', '', 'Banana Plug -ORANGE', 100, 'No Approve', 0, '');

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
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `idbarang` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `image` mediumtext NOT NULL,
  `sku` varchar(200) NOT NULL,
  `skug` varchar(200) NOT NULL,
  `quantitymut` int(11) NOT NULL,
  `status` varchar(200) NOT NULL,
  `jamkeluar` timestamp NOT NULL DEFAULT current_timestamp(),
  `tempstat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`idbarang`, `nama`, `image`, `sku`, `skug`, `quantitymut`, `status`, `jamkeluar`, `tempstat`) VALUES
(5, 'anjay', 'f135051fc9ea777c5f718a7547a8f015.jpg', '3e2', 'x', 1000, 'On process', '2023-02-16 09:06:34', 0),
(6, 'coba', 'd315f884c94c03e1198590e1f2006607.jpg', '4e1', '1', 1000, 'On process', '2023-02-16 09:06:34', 0),
(7, 'anjay', 'f135051fc9ea777c5f718a7547a8f015.jpg', '3e2', 'x1a1', 1000, 'On process', '2023-02-16 09:09:33', 0),
(8, 'coba', 'd315f884c94c03e1198590e1f2006607.jpg', '4e1', 'x1a2', 5000, 'On process', '2023-02-16 09:09:33', 0);

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
(1, 'f135051fc9ea777c5f718a7547a8f015.jpg', 'anjay', '3e2', 'x1a1', '', -601),
(2, 'd315f884c94c03e1198590e1f2006607.jpg', 'coba', '4e1', 'x1a2', '', 7400);

-- --------------------------------------------------------

--
-- Table structure for table `stok2`
--

CREATE TABLE `stok2` (
  `idbarang` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `image` mediumtext NOT NULL,
  `sku` varchar(200) NOT NULL,
  `skugudang` varchar(200) NOT NULL,
  `gudang` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `exititem`
--
ALTER TABLE `exititem`
  ADD PRIMARY KEY (`idbarang`);

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
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `stok2`
--
ALTER TABLE `stok2`
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
  MODIFY `iddus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exititem`
--
ALTER TABLE `exititem`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `itembox`
--
ALTER TABLE `itembox`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stok2`
--
ALTER TABLE `stok2`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_item`
--
ALTER TABLE `temp_item`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
