-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2021 at 11:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psbd_indahfarmadb_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_obat`
--

CREATE TABLE `log_obat` (
  `kode_log` int(10) NOT NULL,
  `kode_obat` varchar(10) DEFAULT NULL,
  `harga_lama` int(11) DEFAULT NULL,
  `harga_baru` int(11) DEFAULT NULL,
  `waktu` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_obat`
--

INSERT INTO `log_obat` (`kode_log`, `kode_obat`, `harga_lama`, `harga_baru`, `waktu`) VALUES
(52, 'SLMNZ1520', 18000, 21000, '2020-12-23'),
(53, 'SRSCF1723', 62500, 65000, '2020-12-23'),
(54, 'SRZNP1723', 15000, 22000, '2020-12-23'),
(55, 'KPRNS1723', 45000, 47000, '2020-12-23'),
(56, 'TBALD1723', 51000, 55000, '2020-12-23'),
(57, 'gg5', 5666, 5666, '2021-01-06'),
(58, 'SLMNZ1520', 21000, 0, '2021-01-06'),
(59, 'gg5', 5666, 5666, '2021-01-06'),
(60, 'SLMNZ1520', 0, 5555, '2021-01-06'),
(61, 'hy5', 5555, 55555, '2021-01-06'),
(62, 'SLMNZ1520', 5555, 18000, '2021-01-06'),
(63, 'bg5', 55, 1000, '2021-01-06'),
(64, 'coba', 2000, 2000, '2021-01-07'),
(65, 'coba', 2000, 2000, '2021-01-07'),
(66, 'coba', 2000, 2000, '2021-01-07'),
(67, 'coba', 2000, 2000, '2021-01-07'),
(68, 'coba', 2000, 2000, '2021-01-07'),
(69, 'coba', 2000, 2000, '2021-01-07'),
(70, 'cobaaaa', 200, 200, '2021-01-07'),
(71, 'cobaaaa', 200, 200, '2021-01-07'),
(72, 'coba', 2000, 2000, '2021-01-07');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `bentuk_obat` varchar(20) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_user` int(3) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tgl_produksi` date NOT NULL,
  `tgl_kadaluarsa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `harga_jual`, `bentuk_obat`, `created_user`, `created_date`, `updated_user`, `updated_date`, `tgl_produksi`, `tgl_kadaluarsa`) VALUES
('KPRNS1723', 'RHINNOS', 47000, 'Kaplet', 1, '2020-12-23 08:54:23', 1, '2020-12-23 16:45:03', '2017-02-02', '2023-01-30'),
('SLMNZ1520', 'MICONAZOLE', 18000, 'Salep', 1, '2020-12-22 12:29:24', 1, '2021-01-06 14:04:17', '2015-09-15', '2020-09-14'),
('SRSCF1723', 'SUCRALFATE', 65000, 'Syrup', 1, '2020-12-23 08:52:52', 1, '2020-12-23 16:44:41', '2017-03-23', '2023-03-20'),
('SRZNP1723', 'ZINCPRO', 22000, 'Syrup', 1, '2020-12-23 08:52:52', 1, '2020-12-23 16:44:51', '2017-02-02', '2023-03-20'),
('TBALD1723', 'AMLODIPINE', 55000, 'Tablet', 1, '2020-12-23 08:54:23', 1, '2020-12-23 16:45:13', '2017-02-02', '2023-01-30');

--
-- Triggers `obat`
--
DELIMITER $$
CREATE TRIGGER `update_harga_obat` BEFORE UPDATE ON `obat` FOR EACH ROW BEGIN
insert into log_obat
set kode_obat = OLD.kode_obat,
harga_lama = OLD.harga_jual,
harga_baru = NEW.harga_jual,
waktu = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `persediaan`
--

CREATE TABLE `persediaan` (
  `kode_obat` varchar(10) CHARACTER SET latin1 NOT NULL,
  `jumlah_sedia` int(11) DEFAULT NULL,
  `created_user` int(3) NOT NULL,
  `updated_user` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persediaan`
--

INSERT INTO `persediaan` (`kode_obat`, `jumlah_sedia`, `created_user`, `updated_user`) VALUES
('KPRNS1723', 100, 1, 1),
('SLMNZ1520', 100, 1, 1),
('SRSCF1723', 100, 1, 1),
('SRZNP1723', 100, 1, 1),
('TBALD1723', 100, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_obat`
--

CREATE TABLE `transaksi_obat` (
  `kode_transaksi` varchar(15) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `kode_obat` varchar(10) NOT NULL,
  `jumlah_terjual` int(11) NOT NULL,
  `created_user` int(3) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_obat`
--

INSERT INTO `transaksi_obat` (`kode_transaksi`, `tanggal_transaksi`, `kode_obat`, `jumlah_terjual`, `created_user`, `created_date`) VALUES
('T-001', '2019-01-15', 'SLMNZ1520', 32, 1, '2020-12-23 15:41:13'),
('T-002', '2019-01-15', 'SRSCF1723', 14, 1, '2020-12-23 15:41:26'),
('T-003', '2019-01-15', 'SRZNP1723', 5, 1, '2020-12-23 15:41:45'),
('T-004', '2019-01-15', 'KPRNS1723', 51, 1, '2020-12-23 15:41:58'),
('T-005', '2019-01-15', 'TBALD1723', 40, 1, '2020-12-23 15:42:08'),
('T-006', '2019-02-02', 'SRZNP1723', 12, 1, '2020-12-23 15:42:36'),
('T-007', '2019-02-02', 'TBALD1723', 20, 1, '2020-12-23 15:42:46'),
('T-008', '2019-03-21', 'SLMNZ1520', 2, 1, '2020-12-23 15:43:23'),
('T-009', '2019-03-15', 'SRSCF1723', 6, 1, '2020-12-23 15:43:41'),
('T-010', '2019-03-30', 'TBALD1723', 21, 1, '2020-12-23 15:44:53'),
('T-011', '2019-04-05', 'SLMNZ1520', 2, 1, '2021-01-06 14:24:07'),
('T-012', '2019-04-06', 'SRSCF1723', 2, 1, '2021-01-06 14:24:33'),
('T-013', '2019-04-07', 'SRZNP1723', 10, 1, '2021-01-06 14:24:56'),
('T-014', '2019-04-08', 'KPRNS1723', 8, 1, '2021-01-06 14:25:17'),
('T-015', '2019-04-09', 'TBALD1723', 19, 1, '2021-01-06 14:25:41');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_obat_view`
--

CREATE TABLE `transaksi_obat_view` (
  `kode_transaksi` varchar(15) DEFAULT NULL,
  `kode_obat` varchar(10) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `jumlah_terjual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trans_april`
--

CREATE TABLE `trans_april` (
  `kode_transaksi` varchar(15) CHARACTER SET latin1 NOT NULL,
  `kode_obat` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jumlah_terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_april`
--

INSERT INTO `trans_april` (`kode_transaksi`, `kode_obat`, `tanggal_transaksi`, `jumlah_terjual`) VALUES
('T-011', 'SLMNZ1520', '2019-04-05', 2),
('T-012', 'SRSCF1723', '2019-04-06', 2),
('T-013', 'SRZNP1723', '2019-04-07', 10),
('T-014', 'KPRNS1723', '2019-04-08', 8),
('T-015', 'TBALD1723', '2019-04-09', 19);

-- --------------------------------------------------------

--
-- Table structure for table `trans_februari`
--

CREATE TABLE `trans_februari` (
  `kode_transaksi` varchar(15) CHARACTER SET latin1 NOT NULL,
  `kode_obat` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jumlah_terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_februari`
--

INSERT INTO `trans_februari` (`kode_transaksi`, `kode_obat`, `tanggal_transaksi`, `jumlah_terjual`) VALUES
('T-006', 'SRZNP1723', '2019-02-02', 12),
('T-007', 'TBALD1723', '2019-02-10', 20);

-- --------------------------------------------------------

--
-- Table structure for table `trans_januari`
--

CREATE TABLE `trans_januari` (
  `kode_transaksi` varchar(15) CHARACTER SET latin1 NOT NULL,
  `kode_obat` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jumlah_terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_januari`
--

INSERT INTO `trans_januari` (`kode_transaksi`, `kode_obat`, `tanggal_transaksi`, `jumlah_terjual`) VALUES
('T-004', 'KPRNS1723', '2019-01-15', 51),
('T-001', 'SLMNZ1520', '2019-01-15', 32),
('T-002', 'SRSCF1723', '2019-01-15', 14),
('T-003', 'SRZNP1723', '2019-01-15', 5),
('T-005', 'TBALD1723', '2019-01-15', 40);

-- --------------------------------------------------------

--
-- Table structure for table `trans_maret`
--

CREATE TABLE `trans_maret` (
  `kode_transaksi` varchar(15) CHARACTER SET latin1 NOT NULL,
  `kode_obat` varchar(10) CHARACTER SET latin1 NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `jumlah_terjual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans_maret`
--

INSERT INTO `trans_maret` (`kode_transaksi`, `kode_obat`, `tanggal_transaksi`, `jumlah_terjual`) VALUES
('T-008', 'SLMNZ1520', '2019-03-21', 2),
('T-009', 'SRSCF1723', '2019-03-15', 6),
('T-010', 'TBALD1723', '2019-03-30', 21);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `hak_akses` enum('Super Admin','EndUser') NOT NULL,
  `status` enum('aktif','blokir') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `nama_user`, `password`, `email`, `telepon`, `foto`, `hak_akses`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', 'adm123456789', 'adm@gmail.com', '082132972137', 'woman-1.png', 'Super Admin', 'aktif', '2017-04-01 08:15:15', '2020-12-23 15:52:32'),
(2, 'user', 'User', 'user123456789', 'user@gmail.com', '085680892909', 'woman-2.png', 'EndUser', 'aktif', '2017-04-01 08:15:15', '2021-01-06 16:44:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_obat`
--
ALTER TABLE `log_obat`
  ADD PRIMARY KEY (`kode_log`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `kode_obat` (`kode_obat`),
  ADD KEY `created_user` (`created_user`),
  ADD KEY `updated_user` (`updated_user`);

--
-- Indexes for table `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD PRIMARY KEY (`kode_transaksi`),
  ADD KEY `id_barang` (`kode_obat`),
  ADD KEY `created_user` (`created_user`);

--
-- Indexes for table `trans_februari`
--
ALTER TABLE `trans_februari`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `kode_transaksi` (`kode_transaksi`,`kode_obat`);

--
-- Indexes for table `trans_januari`
--
ALTER TABLE `trans_januari`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `kode_obat` (`kode_obat`);

--
-- Indexes for table `trans_maret`
--
ALTER TABLE `trans_maret`
  ADD PRIMARY KEY (`kode_obat`),
  ADD KEY `kode_transaksi` (`kode_transaksi`,`kode_obat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `level` (`hak_akses`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_obat`
--
ALTER TABLE `log_obat`
  MODIFY `kode_log` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`created_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `obat_ibfk_2` FOREIGN KEY (`updated_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `persediaan`
--
ALTER TABLE `persediaan`
  ADD CONSTRAINT `persediaan_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persediaan_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `persediaan_ibfk_3` FOREIGN KEY (`updated_user`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `transaksi_obat`
--
ALTER TABLE `transaksi_obat`
  ADD CONSTRAINT `transaksi_obat_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_obat_ibfk_2` FOREIGN KEY (`created_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trans_februari`
--
ALTER TABLE `trans_februari`
  ADD CONSTRAINT `trans_februari_ibfk_1` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`),
  ADD CONSTRAINT `trans_februari_ibfk_2` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi_obat` (`kode_transaksi`);

--
-- Constraints for table `trans_januari`
--
ALTER TABLE `trans_januari`
  ADD CONSTRAINT `trans_januari_ibfk_1` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi_obat` (`kode_transaksi`),
  ADD CONSTRAINT `trans_januari_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);

--
-- Constraints for table `trans_maret`
--
ALTER TABLE `trans_maret`
  ADD CONSTRAINT `trans_maret_ibfk_1` FOREIGN KEY (`kode_transaksi`) REFERENCES `transaksi_obat` (`kode_transaksi`),
  ADD CONSTRAINT `trans_maret_ibfk_2` FOREIGN KEY (`kode_obat`) REFERENCES `obat` (`kode_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
