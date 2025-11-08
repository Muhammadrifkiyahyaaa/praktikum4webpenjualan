-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2025 at 08:04 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjualan`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int NOT NULL,
  `barkode` char(20) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `harga_jual` bigint NOT NULL,
  `harga_beli` bigint NOT NULL,
  `stok` int NOT NULL,
  `kategori_id` int NOT NULL,
  `satuan_id` int NOT NULL,
  `supplier_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `barkode`, `name`, `harga_jual`, `harga_beli`, `stok`, `kategori_id`, `satuan_id`, `supplier_id`, `user_id`) VALUES
(1, '141406', 'Minyak Goreng', 25000, 20000, 50, 1, 1, 1, 0),
(2, '414160', 'Beras', 75000, 65000, 30, 1, 1, 1, 0),
(3, '601414', 'Susu UHT Kotak', 12000, 10000, 100, 2, 2, 2, 0),
(4, '064141', 'Gula Pasir', 15000, 12000, 75, 1, 1, 1, 0),
(5, '050505', 'Teh Kotak', 5000, 3500, 200, 2, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int NOT NULL,
  `nik` varchar(16) NOT NULL,
  `name` char(100) NOT NULL,
  `telp` char(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nik`, `name`, `telp`, `email`, `alamat`) VALUES
(1, '6372620006', 'Abida', '081225735784', 'abida@gmail.com', 'Jl. Veteran'),
(2, '6372720007', 'Erdia', '081275387483', 'erdia@gmail.com', 'Jl. Handil Bakti'),
(3, '6372820008', 'Haisha', '081208359835', 'haisha@gmail.com', 'Jl. Keramat'),
(4, '6372920009', 'Uwais', '081209899358', 'uwais@gmail.com', 'Jl. Antasan Kecil Timur'),
(5, '6373020000', 'Yumna', '081294839076', 'yumna@gmail.com', 'Jl. Gatot Subroto');

-- --------------------------------------------------------

--
-- Table structure for table `detail_beli`
--

CREATE TABLE `detail_beli` (
  `id` int NOT NULL,
  `harga` int NOT NULL,
  `qty` int NOT NULL,
  `subtotal` bigint NOT NULL,
  `pembelian_id` int NOT NULL,
  `barang_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_jual`
--

CREATE TABLE `detail_jual` (
  `id` int NOT NULL,
  `harga` int NOT NULL,
  `qty` int NOT NULL,
  `subtotal` bigint NOT NULL,
  `penjualan_id` int NOT NULL,
  `barang_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int NOT NULL,
  `name` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `name`) VALUES
(1, 'Drinks'),
(2, 'Food'),
(3, 'Buku'),
(4, 'Kertas'),
(5, 'Penghapus'),
(6, 'Elektronik'),
(10, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `total` bigint NOT NULL,
  `bayar` bigint NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `supplier_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `invoice`, `total`, `bayar`, `deskripsi`, `tanggal`, `supplier_id`, `user_id`) VALUES
(1, 'BL-20251101-001', 310000, 310000, 'Pengadaan stok awal', '2025-11-01', 1, 1),
(2, 'BL-20251102-002', 150000, 150000, 'Pembelian alat tulis dan mie', '2025-11-02', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `total` bigint NOT NULL,
  `bayar` bigint NOT NULL,
  `kembali` bigint NOT NULL,
  `tanggal` date NOT NULL,
  `custome_id` int NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int NOT NULL,
  `name` char(100) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `name`, `deskripsi`) VALUES
(1, 'Pcs', 'Pieces/Buah'),
(2, 'Box', 'Kotak'),
(4, 'Lusin', '12 buah'),
(6, 'Set', 'Set/Kemasan');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int NOT NULL,
  `nik` int DEFAULT NULL,
  `name` char(100) NOT NULL,
  `telp` char(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `perusahaan` varchar(150) DEFAULT NULL,
  `nama_bank` varchar(150) DEFAULT NULL,
  `nama_akun_bank` varchar(150) DEFAULT NULL,
  `no_akun_bank` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nik`, `name`, `telp`, `email`, `alamat`, `perusahaan`, `nama_bank`, `nama_akun_bank`, `no_akun_bank`) VALUES
(1, 352410001, 'PT. Joyko Indonesia', '082187654321', 'joyko@example.com', 'Jl. Raya Jakarta Timur', 'PT Joyko Stationery', 'BCA', 'PT Joyko Indonesia', '1234567890'),
(2, 352410002, 'Montana Global', '081234567890', 'montanag@example.com', 'Jl. Asia Afrika, Bandung', 'CV Montana Supply', 'BNI', 'Montana Global', '0987654321'),
(3, 352410003, 'PT. Faber Indonesia', '082123456789', 'faber@example.com', 'Jl. Sudirman, Jakarta Pusat', 'PT Faber Castell Indo', 'Mandiri', 'PT Faber Indonesia', '1122334455'),
(4, 352410004, 'Vision Paper', '081122334455', 'vision@example.com', 'Jl. Ahmad Yani, Surabaya', 'Vision Tulis Media', 'BRI', 'Vision Paper', '2233445566'),
(5, 352410005, 'Sidu Supply', '082298765432', 'sidusupply@example.com', 'Jl. Kaliurang, Bekasi', 'Sinar Dunia Abadi', 'CIMB', 'Sidu Supply', '3344556677');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `nik` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` char(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `full_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `is_active` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nik`, `username`, `full_name`, `password`, `role`, `phone`, `email`, `address`, `last_login`, `is_active`) VALUES
(1, '6372120001', 'nmalaa_', 'Nurmala Sari', '$2y$10$9GNEpiz5bYghIg2U0bKNV.5Zxgf6DmQoSuzFU0YrFvhnyXOwOe7wq', 'KASIR', '081123058435', 'nurmalasri@gmail.com', '', '0000-00-00 00:00:00', 1),
(2, '6372220002', 'alyanormda', 'Alya Normaida', '$2y$10$d3DdiVRV/4/gHWOXO7fCKeE2k/matfWGuRSsSpVuU5tRVl614g.Hm', 'PEMILIK', '081245830206', 'alyanormaida1@gmail.com', '', '0000-00-00 00:00:00', 1),
(3, '6372320003', 'marini24', 'Marini Islami', '$2y$10$sClVCUjgQpht2.SgRdOV2Oc6BGAG/GmUKb3FZagIjHNAZ9BSgR6wm', 'KASIR', '081273973478', 'marinirini@gmail.com', '', '0000-00-00 00:00:00', 1),
(4, '6372420004', 'jmzahraa', 'Jamilatuzzahra', '$2y$10$tCF6iprfjknb.bN6LDVaoOmsB3L697cvUkmnlEVOfKQeLvk2/vjw.', 'KASIR', '081248395709', 'jmzara@gmail.com', '', '0000-00-00 00:00:00', 1),
(5, '6372520005', 'nanazkia', 'Nazwa Azkia', '$2y$10$00jp1ZQ2S8s/rj9Z5BBCoexSMpND7bqljkmHk7RYHj9BRDJ0Nsdz2', 'KASIR', '084850958467', 'azkianazwa@gmail.com', '', '0000-00-00 00:00:00', 1),
(6, '2310010266', 'r.rifkiii', 'Muhammad Rifki Yahya', '$2y$10$wkK5SOklexYZVB53x/QZI.kVtUOxBRE8i2Br9eoUBzK4PClSJ8D0e', 'ADMIN', '081314428332', 'admin@gmail.com', '', '2025-10-22 01:54:53', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_beli`
--
ALTER TABLE `detail_beli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembelian_id` (`pembelian_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penjualan_id` (`penjualan_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `custome_id` (`custome_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_beli`
--
ALTER TABLE `detail_beli`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_jual`
--
ALTER TABLE `detail_jual`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_beli`
--
ALTER TABLE `detail_beli`
  ADD CONSTRAINT `detail_beli_ibfk_1` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`),
  ADD CONSTRAINT `detail_beli_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);

--
-- Constraints for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD CONSTRAINT `detail_jual_ibfk_1` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`),
  ADD CONSTRAINT `detail_jual_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`custome_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
