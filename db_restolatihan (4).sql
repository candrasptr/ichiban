-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Feb 2021 pada 08.31
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restolatihan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kosong`
--

CREATE TABLE `kosong` (
  `username` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(13, 'admin', 'admin', '$2y$10$QdP8uA6ZfIvcZay9TszkcO1ROXoC1YFVXdJhUSzrGuEzQZjG346gS', '2020-11-25 02:21:06', '2020-11-25 02:21:06', NULL),
(14, 'adm', 'adm', '$2y$10$PvgHM4oJDfRJf0NzdP5vFurriAcKchZA635BmlEfWvN656XzvuSlO', '2020-11-25 02:23:21', '2020-11-25 02:23:21', NULL),
(16, 'admon', 'admon', '$2y$10$mUgB2dlR9gZp2awdNZP2P.lOZFGR8Key1NsSRJgMSaLxNSfsGAMTe', '2021-01-21 00:08:09', '2021-01-21 00:08:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id_feedback` int(11) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kasir`
--

CREATE TABLE `tbl_kasir` (
  `id_kasir` int(11) NOT NULL,
  `nama_kasir` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kasir`
--

INSERT INTO `tbl_kasir` (`id_kasir`, `nama_kasir`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `username`, `password`, `updated_at`, `created_at`) VALUES
(4, 'candra', 'Laki-Laki', 'kedungwuluh', '0888', 'csaputra@gmail.com', 'kasir', '$2y$10$2I3meOGtwT/42sNV8ladW.RyrMMw0RKZUms1xsUEVfWN02YN3K2PW', '2020-12-29', '2020-12-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_masakan`
--

CREATE TABLE `tbl_masakan` (
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(100) NOT NULL,
  `gambar_masakan` varchar(100) NOT NULL,
  `nama_kategori` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_masakan`
--

INSERT INTO `tbl_masakan` (`id_masakan`, `nama_masakan`, `gambar_masakan`, `nama_kategori`, `harga`, `status`) VALUES
(1, 'Ichiban donut', 'donut.png', 'dessert', 10000, 'tersedia'),
(2, 'Ichiban lemon tea', 'esteh.png', 'minuman', 10000, 'tersedia'),
(3, 'Ichiban sashimi', 'sashimi.png', 'makanan', 10000, 'tersedia'),
(7, 'Ichiban ramen', 'produk_1607239257.png', 'makanan', 10000, 'tersedia'),
(22, 'Ichiban yakiniku', 'produk_1607408126.png', 'makanan', 10000, 'tersedia'),
(23, 'Ichiban spesial sushi', 'produk_1607408173.png', 'makanan', 10000, 'tersedia'),
(24, 'Ichiban orange juice', 'produk_1607408238.png', 'minuman', 10000, 'tersedia'),
(25, 'Ichiban matcha', 'produk_1607408277.png', 'minuman', 10000, 'tersedia'),
(26, 'Ichiban chocolate milkshake', 'produk_1607408305.png', 'minuman', 10000, 'tersedia'),
(27, 'Ichiban dorayaki', 'produk_1607408334.png', 'dessert', 10000, 'tersedia'),
(28, 'Ichiban mochi', 'produk_1607408354.png', 'dessert', 10000, 'tersedia'),
(29, 'ichiban takiyaki', 'produk_1607408376.png', 'dessert', 10000, 'tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `masakan_id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `user_order_id` int(11) NOT NULL,
  `tanggal_order` date NOT NULL,
  `status_order2` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `masakan_id`, `order_detail_id`, `user_order_id`, `tanggal_order`, `status_order2`, `jumlah`, `sub_total`) VALUES
(54, 22, 55, 41, '2021-01-21', 'sudah_dibayar', 1, 10000),
(55, 28, 55, 41, '2021-01-21', 'sudah_dibayar', 1, 10000),
(56, 23, 57, 41, '2021-01-21', 'sudah_dibayar', 1, 10000),
(57, 1, 57, 41, '2021-01-21', 'sudah_dibayar', 1, 10000),
(59, 22, 59, 45, '2021-02-02', 'sudah_dibayar', 2, 20000),
(61, 22, 61, 46, '2021-02-11', 'sudah_dipesan', 1, 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id_order_detail`, `order_id`) VALUES
(55, 54),
(55, 55),
(57, 56),
(57, 57),
(59, 59),
(61, 61);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_owner`
--

CREATE TABLE `tbl_owner` (
  `id_owner` int(11) NOT NULL,
  `nama_owner` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_owner`
--

INSERT INTO `tbl_owner` (`id_owner`, `nama_owner`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'candra', 'owner', '$2y$10$Dvk/CHWftcqP4hwTTPNTVezrzk1jiEOpcDWzmssNRzaJv.OFuWthe', '2020-12-29 22:18:36', '2020-12-29 22:18:36', 'tb8m7ZdgT9hgmBOAfuUXoxEgfGxlMbkZr8UunmQk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `kode`, `nama_pelanggan`, `no_meja`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(36, 'plg0', 'sa', 2, '$2y$10$L3./KJC0leG2ilwMeWed/Ot5J0xjsJF5lNEyK5h1X91AGwGP9KgHa', '2021-01-14 22:12:03', '2021-01-14 22:12:03', 'ItIqmWGv4CWNYZrCJEDBcMlujzQvND3kvQDKifzsS8HlAjuRdxgOF93pVOEK'),
(37, 'plg1', 'q', 1, '$2y$10$ppgMF5EWFgpMNRgvlFV81OoJoLgmLMamK3Xv147FG/ES3T2/1GXpK', '2021-01-17 23:14:36', '2021-01-17 23:14:36', 'aWIEka2tCwqJXVqupOdSKoDDeBINTH'),
(38, 'plg2', 'dra', 1, '$2y$10$CHhM1EYsKkFh6WvwSK3PvuofzmqxCWkz/x6xAp/Yi/mj.eegGDXEW', '2021-01-18 18:18:37', '2021-01-18 18:18:37', 'kVObE3kZ6ha0PNDEQdbvDQnBKnq935'),
(39, 'plg3', 'a', 1, '$2y$10$lQvaN8aqIiZCwN9CzHGt1OWXzj77IKeHM6c6r6jIHRDGQuKTgFXKK', '2021-01-18 20:44:48', '2021-01-18 20:44:48', 'WG3VHq6MctmvRZPWAXeShObDg9MwUp'),
(40, 'plg4', 'eren', 1, '$2y$10$8ig5JGj5IZ1SJysjNujGJuax3WzV1KGzojZS1KQh1w8SQI/6Cl4ii', '2021-01-19 17:27:31', '2021-01-19 17:27:31', 'p8DcE3bZVyez3mOqlsDQ8rsQ5qgcFK'),
(41, 'plg5', 'candra', 1, '$2y$10$N6xlrJYcrOt0QLv1o7hPsukkjcwAp26OAT6jdq9BM1ZZwj6Pohqw6', '2021-01-20 17:20:19', '2021-01-20 17:20:19', 'QTTuUBMHNbxJvrpCD1XM5S3ojrFwt4'),
(42, 'plg6', 'candra', 1, '$2y$10$2wCjlXaPm.E9oT81ouCmD.0QA3GzsXDaqj1aw5wrm4eM.PsZ13ZGu', '2021-01-21 17:58:45', '2021-01-21 17:58:45', '02BIVjBuwUh0csC5ocWA2s4wgMAgaB'),
(43, 'plg7', 'candra', 1, '$2y$10$J82aPjc57MXCTR7gfEEITOymzindMz3VW2W9BhK6rSoWtgrvVRnea', '2021-01-24 18:48:10', '2021-01-24 18:48:10', 'G1n8ZPCtHdmVQ9bfDqO5iY6OyGap1Y'),
(44, 'plg8', 'a', 1, '$2y$10$Sxt3cS/8a0x/.Xs5NcSGsOK2bKxYDGAAtusMZwr274SY5ENo6F.K6', '2021-02-01 19:01:29', '2021-02-01 19:01:29', 'kg00K6BdKH01pgldQeDu9iVoli4Wg3hfzao8achJrP2KUFEi7hdrPGDmnQWj'),
(45, 'plg9', 'candra', 1, '$2y$10$vNpwgFMUVn2jeVTSlcB0QOckchsUVqULzzpD7cRf68RjG8eT3EzlS', '2021-02-01 20:08:15', '2021-02-01 20:08:15', '1hN6EGDe7UyvuxfSujkjX9Rt38nWJt0oGG8IH8PxOFO7FWKeJY5l5MpcojlX'),
(46, 'plg10', 'candra', 1, '$2y$10$hpYMGSdzeX4n1WDTB4ZZ7uE.XciCc0eK0ceQSareaptXbG2een9Bm', '2021-02-10 23:03:10', '2021-02-10 23:03:10', 'cQ9ORqkrclLPFYGXyOjYZGrCB3PYOb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` varchar(100) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `user_transaksi_id` int(11) NOT NULL,
  `status_order` varchar(50) NOT NULL,
  `diantar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `order_detail_id`, `tanggal_transaksi`, `total_bayar`, `jumlah_pembayaran`, `kembalian`, `user_transaksi_id`, `status_order`, `diantar`) VALUES
('ICHBNRST1', 55, '2021-01-21', 20000, 20000, 0, 41, 'sudah_dibayar', 'sudah'),
('ICHBNRST2', 57, '2021-01-21', 20000, 20000, 0, 41, 'sudah_dibayar', 'sudah'),
('ICHBNRST3', 59, '2021-02-02', 20000, 20000, 0, 45, 'sudah_dibayar', 'sudah'),
('ICHBNRST4', 61, '2021-02-11', 10000, 0, 0, 46, 'batal_dipesan', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_waiter`
--

CREATE TABLE `tbl_waiter` (
  `id_waiter` int(11) NOT NULL,
  `nama_waiter` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_waiter`
--

INSERT INTO `tbl_waiter` (`id_waiter`, `nama_waiter`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'candra', 'Laki-Laki', 'kdw', '088', 'cs@g.com', 'waiter', '$2y$10$Tx4LI9f82x3Q6WqsMUYdEeRDZYRqfkmBwEsZASEZcQr75rdeHEVMu', '2020-11-23 00:45:47', '2020-12-29 03:54:18', 'FjMPglZug5WeIUZVPIJevugrH5sLU3JDPM8CoJLuFkR9tz1WmHiS1qtkIxtR');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indeks untuk tabel `tbl_kasir`
--
ALTER TABLE `tbl_kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indeks untuk tabel `tbl_masakan`
--
ALTER TABLE `tbl_masakan`
  ADD PRIMARY KEY (`id_masakan`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `masakan_id` (`masakan_id`);

--
-- Indeks untuk tabel `tbl_owner`
--
ALTER TABLE `tbl_owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `order_id` (`order_detail_id`);

--
-- Indeks untuk tabel `tbl_waiter`
--
ALTER TABLE `tbl_waiter`
  ADD PRIMARY KEY (`id_waiter`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_kasir`
--
ALTER TABLE `tbl_kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_masakan`
--
ALTER TABLE `tbl_masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `tbl_owner`
--
ALTER TABLE `tbl_owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `tbl_waiter`
--
ALTER TABLE `tbl_waiter`
  MODIFY `id_waiter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
