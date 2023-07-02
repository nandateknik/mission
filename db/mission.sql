-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 08:52 AM
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
-- Database: `mission`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` int(11) NOT NULL,
  `bagian` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kemajuan_perbaikan`
--

CREATE TABLE `kemajuan_perbaikan` (
  `id` int(11) NOT NULL,
  `id_permintaan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(50) NOT NULL,
  `pelaksana` varchar(120) NOT NULL,
  `kemajuan` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kemajuan_perbaikan`
--

INSERT INTO `kemajuan_perbaikan` (`id`, `id_permintaan`, `tanggal`, `jam`, `pelaksana`, `kemajuan`, `status`) VALUES
(6, 5, '2023-06-27', '11:51', 'User Teknik', 'akan dilaksanakan', 'Dalam Perbaikan');

-- --------------------------------------------------------

--
-- Table structure for table `kemajuan_rencana`
--

CREATE TABLE `kemajuan_rencana` (
  `id` int(11) NOT NULL,
  `id_rencana` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(50) NOT NULL,
  `pelaksana` varchar(128) NOT NULL,
  `kemajuan` text NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`) VALUES
(1, 'Core'),
(2, 'Rencana Kerja'),
(3, 'Permintaan Perbaikan'),
(6, 'PENGATURAN');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` varchar(100) NOT NULL,
  `pemohon` varchar(120) NOT NULL,
  `permintaan` text NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `urgensi` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`id`, `tanggal`, `jam`, `pemohon`, `permintaan`, `bagian`, `urgensi`, `status`) VALUES
(5, '2023-06-27', '11:44', 'Admin Produksi', 'Lampu taman mati minta segera di betulkan', 'Elektrik', '1-3 Hari', 'Dalam Perbaikan');

-- --------------------------------------------------------

--
-- Table structure for table `rencana`
--

CREATE TABLE `rencana` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `rencana` text NOT NULL,
  `bagian` varchar(150) NOT NULL,
  `urgensi` varchar(250) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rencana`
--

INSERT INTO `rencana` (`id`, `tanggal`, `rencana`, `bagian`, `urgensi`, `status`) VALUES
(20, '2023-06-27', 'Tap Oli Vesel', 'Operator', '1-3 Hari', 'BARU');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `icon` varchar(220) NOT NULL,
  `submenu` varchar(100) NOT NULL,
  `link` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `id_menu`, `icon`, `submenu`, `link`) VALUES
(3, 2, 'fa fa-edit', 'Input Pekerjaan', 'aplikasi/rencana/create'),
(7, 6, 'fa fa-database', 'Data Menu', 'pengaturan/menu'),
(8, 1, 'fa fa-tachometer-alt', 'Dashboard', 'aplikasi'),
(9, 3, 'fa fa-book', 'Input Permintaan', 'aplikasi/permintaan/create'),
(10, 2, 'fa fa-folder', 'Data Pekerjaan', 'aplikasi/rencana/read/'),
(11, 3, 'fa fa-archive', 'Data Permintaan', 'aplikasi/permintaan/read/'),
(12, 6, 'fa fa-user', 'Data User', 'pengaturan/user'),
(13, 0, 'fa fa-folder', 'eqeqeqq', 'qeq');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(120) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `is_active`) VALUES
(1, 'Nur Holis', 'superadmin', 'superadmin', '1', 1),
(4, 'Admin Teknik', 'adminteknik', 'admin', '2', 1),
(5, 'Admin Produksi', 'adminproduksi', 'admin', '3', 1),
(6, 'User Teknik', 'userteknik', 'user', '4', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kemajuan_perbaikan`
--
ALTER TABLE `kemajuan_perbaikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kemajuan_rencana`
--
ALTER TABLE `kemajuan_rencana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rencana`
--
ALTER TABLE `rencana`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kemajuan_perbaikan`
--
ALTER TABLE `kemajuan_perbaikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kemajuan_rencana`
--
ALTER TABLE `kemajuan_rencana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rencana`
--
ALTER TABLE `rencana`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
