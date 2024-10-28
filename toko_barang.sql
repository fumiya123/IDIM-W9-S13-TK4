-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 03:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idBarang` char(5) NOT NULL,
  `namaBarang` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `idPengguna` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idBarang`, `namaBarang`, `keterangan`, `satuan`, `idPengguna`) VALUES
('BRG01', 'Beras', 'Beras Premium 5kg', 'Bungkus', 'USR02'),
('BRG02', 'Sabun Mandi', 'Sabun Mandi Aromatherapy', 'Botol', 'USR03'),
('BRG03', 'Sikat Gigi', 'Sikat Gigi Soft Bristles', 'Pcs', 'USR03'),
('BRG04', 'Mie Instan', 'Mie Instan Rasa Ayam Bawang', 'Bungkus', 'USR02'),
('BRG05', 'Minuman Soda', 'Minuman Ringan Soda 500ml', 'Botol', 'USR03'),
('BRG06', 'Shampoo', 'Shampoo Vitamin 250ml', 'Botol', 'USR03'),
('BRG07', 'Pisau Dapur', 'Pisau Dapur Stainless Steel', 'Pcs', 'USR02'),
('BRG08', 'Tisu Basah', 'Tisu Basah Aroma Lemon', 'Bungkus', 'USR02'),
('BRG09', 'Sikat Cuci', 'Sikat Cuci Serbaguna', 'Pcs', 'USR03'),
('BRG10', 'Teh Celup', 'Teh Celup Original 20pcs', 'Box', 'USR02');

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `idAkses` char(5) NOT NULL,
  `namaAkses` varchar(30) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hakakses`
--

INSERT INTO `hakakses` (`idAkses`, `namaAkses`, `keterangan`) VALUES
('AKS01', 'Admin', 'Hak akses penuh'),
('AKS02', 'Pegawai', 'Akses terbatas'),
('AKS03', 'Gudang', 'Akses ke data barang'),
('AKS04', 'Keuangan', 'Akses ke data keuangan'),
('AKS05', 'Pelanggan', 'Akses pelanggan'),
('AKS06', 'Marketing', 'Akses pemasaran'),
('AKS07', 'Supervisor', 'Akses supervisi / pengawas'),
('AKS08', 'Teknisi', 'Akses teknis'),
('AKS09', 'Pimpinan', 'Akses pimpinan'),
('AKS10', 'Logistik', 'Akses logistik');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `idPembelian` char(5) NOT NULL,
  `jumlahPembelian` int(11) NOT NULL,
  `hargaBeli` int(11) NOT NULL,
  `idBarang` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`idPembelian`, `jumlahPembelian`, `hargaBeli`, `idBarang`) VALUES
('PB001', 100, 500000, 'BRG01'),
('PB002', 50, 75000, 'BRG02'),
('PB003', 200, 120000, 'BRG03'),
('PB004', 80, 60000, 'BRG04'),
('PB005', 150, 300000, 'BRG05'),
('PB006', 120, 90000, 'BRG06'),
('PB007', 30, 25000, 'BRG07'),
('PB008', 90, 80000, 'BRG08'),
('PB009', 70, 50000, 'BRG09'),
('PB010', 180, 100000, 'BRG10');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idPengguna` char(5) NOT NULL,
  `namaPengguna` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `namaDepan` varchar(30) NOT NULL,
  `namaBelakang` varchar(30) NOT NULL,
  `noHp` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `idAkses` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idPengguna`, `namaPengguna`, `password`, `namaDepan`, `namaBelakang`, `noHp`, `alamat`, `idAkses`) VALUES
('USR01', 'admin', 'adminpass', 'Nadia', 'Olivia', '1234567890', 'Jl. Contoh No. 1', 'AKS01'),
('USR02', 'pegawai1', 'pegpass1', 'Habib', 'Azizul', '9876543210', 'Jl. Contoh No. 2', 'AKS02'),
('USR03', 'gudang1', 'gudpass1', 'Riski', 'Anugrah', '5556667777', 'Jl. Contoh No. 3', 'AKS03'),
('USR04', 'keuangan1', 'keupass1', 'Vinsen', 'Bagas', '1112233444', 'Jl. Contoh No. 4', 'AKS04'),
('USR05', 'pelanggan1', 'pelpass1', 'Dudung', 'Sutarman', '9998887777', 'Jl. Contoh No. 5', 'AKS05'),
('USR06', 'marketing1', 'markpass1', 'Dhimaz', 'Ramadadhan', '3332221111', 'Jl. Contoh No. 6', 'AKS06'),
('USR07', 'supervisor1', 'suppass1', 'Nur', 'Ramadhan', '4445556666', 'Jl. Contoh No. 7', 'AKS07'),
('USR08', 'teknisi1', 'tekpass1', 'Azizul', 'Haq', '7778889999', 'Jl. Contoh No. 8', 'AKS08'),
('USR09', 'pimpinan1', 'pimpass1', 'Yotsuba', 'Tatsuya', '6665554444', 'Jl. Contoh No. 9', 'AKS09'),
('USR10', 'logistik1', 'logpass1', 'Yotsuba', 'Maya', '2223334444', 'Jl. Contoh No. 10', 'AKS10');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `idPenjualan` char(5) NOT NULL,
  `jumlahPenjualan` int(11) NOT NULL,
  `hargaJual` int(11) NOT NULL,
  `idBarang` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`idPenjualan`, `jumlahPenjualan`, `hargaJual`, `idBarang`) VALUES
('PJ001', 80, 700000, 'BRG01'),
('PJ002', 40, 100000, 'BRG02'),
('PJ003', 180, 180000, 'BRG03'),
('PJ004', 60, 120000, 'BRG04'),
('PJ005', 100, 400000, 'BRG05'),
('PJ006', 90, 150000, 'BRG06'),
('PJ007', 25, 30000, 'BRG07'),
('PJ008', 75, 120000, 'BRG08'),
('PJ009', 50, 60000, 'BRG09'),
('PJ010', 120, 160000, 'BRG10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idBarang`),
  ADD KEY `idPengguna` (`idPengguna`);

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`idAkses`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idPembelian`),
  ADD KEY `idBarang` (`idBarang`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idPengguna`),
  ADD KEY `idAkses` (`idAkses`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`idPenjualan`),
  ADD KEY `idBarang` (`idBarang`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`idPengguna`) REFERENCES `pengguna` (`idPengguna`) ON DELETE SET NULL;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE SET NULL;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`idAkses`) REFERENCES `hakakses` (`idAkses`) ON DELETE SET NULL;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`idBarang`) REFERENCES `barang` (`idBarang`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
