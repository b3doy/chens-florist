-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 31, 2022 at 01:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chens`
--

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `nama_konsumen` varchar(155) NOT NULL,
  `tujuan` text NOT NULL,
  `ucapan` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `jenis_pembayaran` varchar(55) DEFAULT NULL,
  `rekening` varchar(255) DEFAULT NULL,
  `produk_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `tanggal`, `nama_konsumen`, `tujuan`, `ucapan`, `jumlah`, `harga`, `total_harga`, `jenis_pembayaran`, `rekening`, `produk_id`, `created_at`, `updated_at`) VALUES
(1, '2022-07-27 00:00:00', 'PT Angin Ribut', 'PT Sarewelah', 'Selamat & Sukses, Milad PT Sarewelah ke-10, tahun 2022. \r\nDari PT. Angin Ribut', 2, 450000, 900000, NULL, NULL, 1, '2022-07-28 22:34:01', '2022-07-31 04:51:57'),
(3, '2022-07-28 00:00:00', 'Barinage MC', 'Godzali MC', 'Selamat Milad Godzali MC ke-40', 2, 250000, 500000, NULL, NULL, 2, '2022-07-28 22:53:05', '2022-07-31 05:40:14'),
(4, '2022-07-29 00:00:00', 'PT Alim Rugi', 'PT Saayana', 'Selamat & Sukses Atas Pindahnya PT Saayana ke Gedung Baru', 1, 650000, 650000, NULL, NULL, 1, '2022-07-28 22:55:07', '2022-07-28 22:55:07'),
(5, '2022-07-29 00:00:00', 'ColdMeat Inc', 'Release Production', 'Selamat & Sukses\r\nMilad ke-40 Release Production', 1, 840000, 840000, NULL, NULL, 1, '2022-07-29 02:18:05', '2022-07-29 02:18:05'),
(6, '2022-07-29 00:00:00', 'Dimanayah', 'Okehlah', 'Happy Sunday', 1, 240000, 240000, 'Transfer', 'Bank Mandiri Sukabumi No Rek. 182 002 8888881 a/n SRIYANTI', 2, '2022-07-29 02:19:16', '2022-07-31 05:58:36'),
(7, '2022-07-29 00:00:00', 'Hotel Permata Hijau', 'Panitia HUT Bhayangkara\r\nMapolres Sukabumi Kota', 'Selamat & Sukses\r\nHUT Bhayangkara Ke-76\r\nTahun 2022', 1, 650000, 650000, NULL, NULL, 1, '2022-07-29 21:42:26', '2022-07-29 21:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `deskripsi_produk` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `created_at`, `updated_at`) VALUES
(1, 'Papan Bunga', 'Karangan Bunga', '2022-07-28 09:26:43', '2022-07-28 09:26:43'),
(2, 'Bunga Meja', 'Bunga Hiasan di Meja', '2022-07-28 09:30:04', '2022-07-28 09:30:04'),
(3, 'Hand Bouqouet', 'Karangan Bunga Tangan', '2022-07-28 09:30:45', '2022-07-28 09:30:45'),
(4, 'Krans Bunga', 'Karangan bunga dengan bentuk bulat', '2022-07-28 09:31:16', '2022-07-28 09:31:16'),
(5, 'Standing Flower', 'Bunga Yang Disimpan Diatas Rangka Besi atau Kayu', '2022-07-28 09:33:04', '2022-07-28 09:33:04'),
(6, 'Bunga Tabur', 'Bunga untuk ditaburkan', '2022-07-28 09:33:21', '2022-07-28 09:33:21'),
(10, 'Bunga Lainnya', 'Karangan Bunga Lainnya', '2022-07-28 18:55:16', '2022-07-28 18:56:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
