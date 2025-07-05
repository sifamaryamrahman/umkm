-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 07:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `platform`
--

CREATE TABLE `platform` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `blibli` varchar(255) DEFAULT NULL,
  `lazada` varchar(255) DEFAULT NULL,
  `shopee` varchar(255) DEFAULT NULL,
  `tokopedia` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `platform`
--

INSERT INTO `platform` (`id`, `id_produk`, `username`, `whatsapp`, `blibli`, `lazada`, `shopee`, `tokopedia`, `facebook`, `instagram`, `tiktok`, `twitter`) VALUES
(138, 161, 'owner', 'https://wa.me/62sad', 'https://www.blibli.com/user/sad', 'https://www.lazada.co.id/shop/sad', '', '', '', '', '', ''),
(141, 176, 'owner', 'https://wa.me/6224324', 'https://www.blibli.com/user/adsfdsf', '', '', '', '', '', 'https://www.tiktok.com/@asdsad', 'https://afsad');

-- --------------------------------------------------------

--
-- Table structure for table `promosi_pemasaran`
--

CREATE TABLE `promosi_pemasaran` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fasilitasi_promosi` varchar(255) NOT NULL,
  `hambatan_memasarkan_produk` varchar(255) NOT NULL,
  `bantuan_dibutuhkan` varchar(255) NOT NULL,
  `berminat_bazar_ramadhan` enum('Ya','Tidak') NOT NULL,
  `berminat_pelatihan_online` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_usaha` varchar(200) NOT NULL,
  `nama_merek_produk` varchar(200) NOT NULL,
  `kategori_produk` varchar(200) NOT NULL,
  `nib` varchar(255) NOT NULL,
  `pirt` varchar(255) NOT NULL,
  `bpom` varchar(255) NOT NULL,
  `halal` varchar(255) NOT NULL,
  `haki` varchar(255) NOT NULL,
  `lainnya` varchar(255) NOT NULL,
  `online` varchar(200) NOT NULL,
  `offline` varchar(200) NOT NULL,
  `agen_reseller` varchar(200) NOT NULL,
  `deskripsi_produk` varchar(900) NOT NULL,
  `photo` varchar(255) NOT NULL DEFAULT 'default.png',
  `status` enum('menunggu','disetujui') NOT NULL DEFAULT 'menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`id`, `username`, `nama_usaha`, `nama_merek_produk`, `kategori_produk`, `nib`, `pirt`, `bpom`, `halal`, `haki`, `lainnya`, `online`, `offline`, `agen_reseller`, `deskripsi_produk`, `photo`, `status`) VALUES
(182, 'owner', 'tes', 'tes', 'Kuliner', 'tes', '', '', '', '', '', 'Online', '', '', 'tes', 'default.png', 'disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `usertype` enum('Admin','Owner') DEFAULT 'Admin',
  `jalan` varchar(200) NOT NULL,
  `desa_kelurahan` varchar(200) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confpassword` varchar(255) NOT NULL,
  `photo` varchar(500) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `fullname`, `usertype`, `jalan`, `desa_kelurahan`, `kecamatan`, `nomor_hp`, `email`, `password`, `confpassword`, `photo`) VALUES
('admin', 'Test Admin', 'Admin', 'tes 1', 'tes 1', 'tes 1', '087976857', 'tes 1', '$2y$10$eqvqlRdMyFpJzXltgUt77O0JyADq.fm2sIJJFVHm6E1M9.wHJsn8u', '$2y$10$pmbjQf.FBlZZbihAEXD5XepTIumBWZUZD0qcxAbczVDjJCz8lBlqS', 'Transitions_2.gif'),
('owner', 'owner  1', 'Owner', 'owner 1', 'owner 1', 'owner 1', 'owner 1', 'owner 1', '$2y$10$30DfGaUVDVHjK6gwZRVEauVAbTMDJDGvWF4CTiXhgkvByaCF/yMJi', '$2y$10$S44QTi9YMc0n4FZ0BCewkuCFhnjKmnWdSITDswy4Squ3MyjKOKPFG', 'default.png'),
('owner2', 'owner 2', 'Owner', 'owner 2', 'owner 2', 'owner 2', 'owner 2', 'owner 2', '$2y$10$V2D0q.LCIKjgwa8I88x/tObbacbuqhBob3nZp9M6FaMvI4GdWzSFK', '$2y$10$MrjZZPALD46Xqpp6BSU90.x49u6fhOeLKD7KXgich9dajDrFvYcvm', 'default.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `platform`
--
ALTER TABLE `platform`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_produk` (`id_produk`),
  ADD KEY `fk_username` (`username`);

--
-- Indexes for table `promosi_pemasaran`
--
ALTER TABLE `promosi_pemasaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_username` (`username`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_umkm_users_username` (`username`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `platform`
--
ALTER TABLE `platform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `promosi_pemasaran`
--
ALTER TABLE `promosi_pemasaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `promosi_pemasaran`
--
ALTER TABLE `promosi_pemasaran`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `umkm`
--
ALTER TABLE `umkm`
  ADD CONSTRAINT `fk_umkm_users_username` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
