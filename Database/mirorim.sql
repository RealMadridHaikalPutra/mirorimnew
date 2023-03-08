-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 11:00 AM
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
  `ceker` varchar(200) NOT NULL,
  `stat` varchar(200) NOT NULL DEFAULT 'Not Approved',
  `timeout` timestamp NOT NULL DEFAULT current_timestamp(),
  `tempstat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exititem`
--

INSERT INTO `exititem` (`idbarang`, `image`, `nama`, `sku`, `picker`, `quantityrep`, `status`, `ceker`, `stat`, `timeout`, `tempstat`) VALUES
(1, '', 'coba', '4e1', 'w', 10, 'Refill', 'intan', 'Approved', '2023-02-20 04:24:55', 1),
(2, '', 'anjay', '3e2', 'w', 10, 'Refill', 'intan', 'Approved', '2023-02-20 04:24:55', 1),
(3, '', 'coba', '4e1', 'E', 20, 'Refill', 'Irma', 'Approved', '2023-02-20 04:37:37', 1),
(4, '', 'coba', '4e1', 'r', 100, 'Refill', '', 'Approved', '2023-02-21 06:48:47', 1),
(5, '', 'anjay', '3e2', 'E', 100, 'Refill', '', 'Approved', '2023-02-21 06:48:47', 1),
(6, '63e64230ab7bd81a1eaf394bca7f3c7c.jpg', 'anjay', '3e2', 'Dimas', 100, 'Refill', '', 'Approved', '2023-02-22 07:38:16', 1),
(7, '', 'coba', '4e1', 'Ogi', 100, 'Refill', '', 'Approved', '2023-02-22 07:38:16', 1);

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
  `status` varchar(20) NOT NULL DEFAULT 'Not Approved',
  `qtygudang` int(11) NOT NULL,
  `note` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `itembox`
--

INSERT INTO `itembox` (`idbarang`, `image`, `invoice`, `box`, `sku`, `nama`, `quantity`, `status`, `qtygudang`, `note`) VALUES
(1, 'a67ba768b4cccf60f2a34ec0300c938f.png', '1111', '1111', '7u5', 'coba 2', 2000, 'Approve', 2000, ''),
(2, '739d6b2eaaf2294344d960fdd0a3417d.jpg', '1111', '1111', '4e1', 'coba', 10000, 'Approve', 10000, ''),
(3, 'e19b7cfcc9e89112a9714200aa284cd4.png', '1111', '1111', '8c18', 'Resistor 200 ohm', 10000, 'No Approve', 0, ''),
(4, '2d76fb0ceda756fbc8ae1b704818e451.jpg', '1111', '1111', '', 'Banana Plug -GREEN', 100, 'No Approve', 0, ''),
(5, '2d76fb0ceda756fbc8ae1b704818e451.jpg', '1111', '1111', '', 'Banana Plug -BLUE', 100, 'No Approve', 0, ''),
(6, '2d76fb0ceda756fbc8ae1b704818e451.jpg', '1111', '1111', '', 'Banana Plug -YELLOW', 100, 'No Approve', 0, ''),
(7, '2d76fb0ceda756fbc8ae1b704818e451.jpg', '1111', '1111', '', 'Banana Plug -PINK', 100, 'No Approve', 0, ''),
(8, '53aa24965d8f6453225c10c651a2bfac.png', '1111', '1111', '', 'Banana Plug -UNGU', 100, 'No Approve', 0, ''),
(9, 'ee133c854207e52af7bef0a0a7ff8843.jpg', '1111', '1111', '', 'Banana Plug -ORANGE', 100, 'No Approve', 0, ''),
(10, 'c778f177385992913b9b9de7372f61e5.jpg', '2222', '22222', '', 'Resistor - 100 ohm', 1000, 'No Approve', 0, ''),
(11, 'c778f177385992913b9b9de7372f61e5.jpg', '2222', '22222', '', 'Resistor - 200 ohm', 1000, 'No Approve', 0, ''),
(12, 'c778f177385992913b9b9de7372f61e5.jpg', '2222', '22222', '', 'Resistor - 10 ohm', 1000, 'No Approve', 0, ''),
(13, 'c778f177385992913b9b9de7372f61e5.jpg', '2222', '22222', '', 'Resistor - 300 ohm', 1000, 'No Approve', 0, ''),
(14, 'c778f177385992913b9b9de7372f61e5.jpg', '2222', '22222', '', 'Resistor - 10k ohm', 1000, 'No Approve', 0, ''),
(15, 'd8aaba27f50ea2e7fbc286dc4220fec5.png', '222', '222', '', 'Resistor 200 ohm', 4000, 'Not Approved', 0, '');

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
  `id_pre` int(11) NOT NULL,
  `sku` varchar(200) NOT NULL,
  `skukomponen` varchar(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `komponen` varchar(200) NOT NULL,
  `skug` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listpre`
--

INSERT INTO `listpre` (`id_pre`, `sku`, `skukomponen`, `nama`, `komponen`, `skug`, `quantity`) VALUES
(1, '2k1', '2N9', 'Barang', 'Adaptor 1', '', 10),
(2, '2k1', '2M1', 'Barang', 'Adaptor 2', '', 20),
(3, '2o1', '2m2', 'akada', 'akada2', '', 20);

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
(2, 'admin', 'admin', 'admin'),
(3, 'gudang2', 'gudang2', 'gudang2');

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
  `sender` varchar(200) NOT NULL,
  `penerima` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `jamkeluar` timestamp NOT NULL DEFAULT current_timestamp(),
  `tempstat` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`idbarang`, `nama`, `image`, `sku`, `skug`, `quantitymut`, `sender`, `penerima`, `status`, `jamkeluar`, `tempstat`) VALUES
(5, 'anjay', 'f135051fc9ea777c5f718a7547a8f015.jpg', '3e2', 'x', 1000, '', '', 'Done', '2023-02-16 09:06:34', 1),
(6, 'coba', 'd315f884c94c03e1198590e1f2006607.jpg', '4e1', '1', 1000, '', '', 'Done', '2023-02-16 09:06:34', 1),
(7, 'anjay', 'f135051fc9ea777c5f718a7547a8f015.jpg', '3e2', 'x1a1', 1000, '', '', 'Done', '2023-02-16 09:09:33', 1),
(8, 'coba', 'd315f884c94c03e1198590e1f2006607.jpg', '4e1', 'x1a2', 5000, '', '', 'Done', '2023-02-16 09:09:33', 1),
(9, 'anjay', 'f135051fc9ea777c5f718a7547a8f015.jpg', '3e2', 'x1a1', 1000, '', '', 'Done', '2023-02-17 09:42:39', 1),
(10, 'coba', 'd315f884c94c03e1198590e1f2006607.jpg', '4e1', 'x1a2', 1000, '', '', 'Done', '2023-02-17 09:42:39', 1),
(11, 'anjay', 'f135051fc9ea777c5f718a7547a8f015.jpg', '3e2', 'x1a1', 1000, '', '', 'Done', '2023-02-17 09:48:57', 1),
(12, 'anjay', 'f135051fc9ea777c5f718a7547a8f015.jpg', '3e2', 'x1a1', 1000, 'Madrid', 'Rizaldi', 'Done', '2023-02-20 03:47:53', 1),
(13, 'coba', 'd315f884c94c03e1198590e1f2006607.jpg', '4e1', 'x1a2', 1000, 'Madrid', 'Rizaldi', 'Done', '2023-02-20 03:47:53', 1),
(14, 'anjay', '90691ff28cb3fcc601225ae850aae390.png', '3e2', 'x1a1', 1000, 'dimas', 'Chris', 'Done', '2023-02-22 07:50:53', 1),
(15, 'coba', 'd315f884c94c03e1198590e1f2006607.jpg', '4e1', 'x1a2', 1000, 'dimas', 'Chris', 'Done', '2023-02-22 07:50:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `preparation`
--

CREATE TABLE `preparation` (
  `id_item` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preparation`
--

INSERT INTO `preparation` (`id_item`, `nama`, `sku`, `image`, `quantity`) VALUES
(1, 'Barang', '2k1', '', 0),
(2, 'akada', '2o1', 'a49cf48322e49aab50235806b46dd948.jpg', 11),
(3, 'Sub filter + tone', '7U6', '53304e8cb71e86d608081c590e870c3f.png', 0),
(4, 'lna', '2n3', '591712e7fc7eb5c76cee9587cbf1249b.jpg', 0);

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
(1, '90691ff28cb3fcc601225ae850aae390.png', 'anjay', '3e2', 'x1a1', '', 5780),
(2, 'd315f884c94c03e1198590e1f2006607.jpg', 'coba', '4e1', 'x1a2', '', 7050);

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
  `gudang` varchar(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok2`
--

INSERT INTO `stok2` (`idbarang`, `nama`, `image`, `sku`, `skugudang`, `gudang`, `quantity`) VALUES
(1, 'anjay', 'f135051fc9ea777c5f718a7547a8f015.jpg', '3e2', '', '0', 7000),
(2, 'coba', 'd315f884c94c03e1198590e1f2006607.jpg', '4e1', '', '0', 9000);

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
  ADD PRIMARY KEY (`id_pre`);

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
-- Indexes for table `preparation`
--
ALTER TABLE `preparation`
  ADD PRIMARY KEY (`id_item`);

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
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `itembox`
--
ALTER TABLE `itembox`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kubikasi`
--
ALTER TABLE `kubikasi`
  MODIFY `iddus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listpre`
--
ALTER TABLE `listpre`
  MODIFY `id_pre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `preparation`
--
ALTER TABLE `preparation`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stok2`
--
ALTER TABLE `stok2`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temp_item`
--
ALTER TABLE `temp_item`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
