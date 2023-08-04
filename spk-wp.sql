-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2023 pada 17.29
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-wp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(20) NOT NULL,
  `alternatif` varchar(100) NOT NULL,
  `k1` varchar(20) NOT NULL,
  `k2` varchar(20) NOT NULL,
  `k3` varchar(20) NOT NULL,
  `k4` varchar(20) NOT NULL,
  `k5` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `alternatif`, `k1`, `k2`, `k3`, `k4`, `k5`) VALUES
('15', 'produk 2', '4', '4', '3', '2', '1'),
('4', 'casetify Iphone 14 pro , case bounce pp 008', '5', '5', '4', '4', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(20) NOT NULL,
  `kriteria` varchar(100) NOT NULL,
  `kepentingan` varchar(20) NOT NULL,
  `cost_benefit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `kepentingan`, `cost_benefit`) VALUES
('1', 'c1 Ketersediaan Produk', '1', 'benefit'),
('2', 'c2 Desain Produk', '3', 'benefit'),
('3', 'c3 Kualitas Produk', '5', 'benefit'),
('4', 'c4 Bahan Produk', '2', 'benefit'),
('5', 'c5 Merk Produk', '4', 'benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(20) NOT NULL,
  `nama_kategori` varchar(300) NOT NULL,
  `photo_kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`, `photo_kategori`) VALUES
(3, 'casetify', 'Logo Casetify.png'),
(4, 'casion', 'logo casion.png'),
(5, 'ringke', 'logo ringke (1).jpg'),
(6, 'caudabe', 'logo caudabe (1).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(20) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `catatan` text NOT NULL,
  `nama_produk` text NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `id_user`, `jumlah`, `catatan`, `nama_produk`, `Status`) VALUES
(1, '1', 3, 'beli 10', 'casetify', 'Selesai'),
(2, '2', 3, 'Order baru', 'casetify Iphone 14 pro , case bounce pp 008', ''),
(3, '2', 2, 'Beli 1', 'casetify Iphone 14 pro , case bounce pp 008', ''),
(4, '3', 1, 'membeli 1', 'casetify Iphone 14 pro , case bounce pp 008', ''),
(5, '3', 1, 'catata', 'casetify Iphone 14 pro , case bounce pp 008', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `id_pembayaran` int(20) NOT NULL,
  `id_order` int(20) NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `catatan` text NOT NULL,
  `nama_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(20) NOT NULL,
  `id_kategori` int(20) NOT NULL,
  `nama_produk` varchar(300) NOT NULL,
  `harga_produk` int(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `photo_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `photo_produk`) VALUES
(4, 3, 'casetify Iphone 14 pro , case bounce pp 008', 1500000, 'iphone 14 pro', '23273597x2_iphone-14-pro_16004813.png.1000x1000-w.m80.jpg'),
(15, 4, 'produk 2', 650000, 'pembelian', 'WhatsApp Image 2023-07-31 at 23.02.09.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_terlaris`
--

CREATE TABLE `tbl_terlaris` (
  `id_produk` int(20) NOT NULL,
  `alternatif` varchar(100) NOT NULL,
  `nilai_akhir` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_terlaris`
--

INSERT INTO `tbl_terlaris` (`id_produk`, `alternatif`, `nilai_akhir`) VALUES
(0, 'Casetify Case bounce ', '0.191618'),
(0, 'Ringke Fusion', '0.178571'),
(0, 'Casion Space Facts - Moon', '0.196247'),
(0, 'Casion Flower FLR 18', '0.172735'),
(0, 'test', '0.124216'),
(0, '12', '0.221938'),
(0, '294730', '0.206826'),
(0, '420202', '0.227299'),
(0, '508079', '0.200067'),
(0, '950147', '0.14387'),
(0, 'test2', '0.136614'),
(0, 'produk 2', '0.368006'),
(0, 'casetify Iphone 14 pro , case bounce pp 008', '0.631994');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `email`, `password`, `alamat`, `no_telf`) VALUES
(2, 'cacaca', 'caca@gmail.com', 'caca', 'cacaca', 'cacaca'),
(3, 'stevanus ', 'stevanus@gmail.com', '12345', 'kp sugutamu', '087890816845');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  MODIFY `id_pembayaran` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
