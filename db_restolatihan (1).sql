-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2020 pada 13.09
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
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'admin', 'admin', 'admin', '2020-11-17 09:13:07', '2020-11-17 09:13:07', ''),
(2, 'candra', 'adminn', '$2y$10$zpYLbBzFtGntL0qL8zY2Iu1JDFA5eaSVpCwkmz5SnBcaYbVJlvp1m', '2020-11-21 19:00:32', '2020-11-21 19:00:32', 'db329hKomkAOfpKMElkUzVDra8jwR5Dg9lgCyaYiKy13iZNqL9BGJWmyBj25');

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
(1, 'saputra', 'laki-laki', 'kdw', '088989', 'cs@g.com', 'kasir1', '$2y$10$X/uWK5BqeG/JBStZbAd6fOjQis/QYZaEQuVWa49pfplfIQe8apLPy', '2020-11-23', '2020-11-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_laporan`
--

CREATE TABLE `tbl_laporan` (
  `id_laporan` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah_pelanggan` int(11) NOT NULL,
  `jumlah_penghasilan` int(11) NOT NULL,
  `jumlah_suplier_masuk` int(11) NOT NULL,
  `jumlah_produk_terjual` int(11) NOT NULL,
  `jumlah_uang_masuk` int(11) NOT NULL,
  `jumlah_uang_keluar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_masakan`
--

CREATE TABLE `tbl_masakan` (
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(100) NOT NULL,
  `id_kategori` int(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_masakan`
--

INSERT INTO `tbl_masakan` (`id_masakan`, `nama_masakan`, `id_kategori`, `nama_kategori`, `deskripsi`, `harga`, `diskon`) VALUES
(1, 'a', 1, 'a', 'a', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_masakan` int(11) NOT NULL,
  `nama_masakan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'candra', 'candra', '2020-11-21 23:24:27', '2020-11-21 23:24:27', 'nU5DuJxnbbv4acdVDWFZv3JueuRjM2L5cKDjwFcSdWQWBHqPln'),
(2, 'candraa', '$2y$10$aSd58JErRH72uTVgUE31vOScYhBUxTqwavExxM6bp39av4lb28Xf2', '2020-11-22 05:21:42', '2020-11-22 05:21:42', 'AiEfGnHiyykkJ0TJuA83R3Dj9pM03DNTltsxHX2x'),
(3, 'abc', '$2y$10$6TFhuzJy4zOPcT.vyX59F.ua0wtna1R4KX9oWadd1R7/qmgH5.I2.', '2020-11-22 05:49:27', '2020-11-22 05:49:27', 'TLKueSGCHkKuaQQWJhRmbASIZ24Pc2'),
(4, 'abcd', '$2y$10$9xALfl5STL7lSM8t4l.Tl.a.XCA54SvAeqv3ieGmVuWveeNNv2nyK', '2020-11-22 05:51:14', '2020-11-22 05:51:14', 'tWEMfOlkkW2FZKrQ0e1MIlxfgIilHu'),
(5, 'a', '$2y$10$t0F81geCWaT5dkopUvyfROnYNA/yEFMQhK6L/1W0/oul/YMFd6ZaW', '2020-11-23 01:59:19', '2020-11-23 01:59:19', 'hELKAMJoXtwTVHH3H9TNctHdEIazrS'),
(6, 'aaa', '$2y$10$GWNUdDtmvRM1bttYjVP1/uYYF/XcNLrn/b4Rmg6gdUD9lLMFU3Dse', '2020-11-23 03:03:41', '2020-11-23 03:03:41', '2TaHtcAAg8rdV919EhN96C7KgJLuOH'),
(7, 'candrasaputra', '$2y$10$fTS9blcSANSN741hJPTwi.l5EzervqbId85Xr2lefYVxDTJx1VJ3W', '2020-11-23 03:55:32', '2020-11-23 03:55:32', 'O86y3hdhVopAlBa5J7Ub40yw8UxlLn'),
(8, 'candrasaputra', '$2y$10$lF0YIDD6RoGpaKyDcmRXLuZVTlaWUNOzPnhI5EwpVm.xyTbpPQQPe', '2020-11-23 03:56:20', '2020-11-23 03:56:20', '5Qqzg88ArAXNShndvJ7Bdq7q6ua08q'),
(9, 'candrasaputra', '$2y$10$8GP2bo39PvtxQIAbJeMwoOcNI7cJod0ptX64817og3WYJdPSuVLH2', '2020-11-23 03:58:29', '2020-11-23 03:58:29', 'eyKpuSkIBtxg2oSRNhMDcs6hjTVQNa'),
(10, 'candrasaputraa', '$2y$10$apFn2OlQxjZg2NOU/s1TRu5Q4PtLICmSvNKBGPI3cX.Zoc4dLUXD.', '2020-11-23 04:06:08', '2020-11-23 04:06:08', 'T3qVcNIrAma2l0ZD6JYwFMGMZAta3T');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengaturan`
--

CREATE TABLE `tbl_pengaturan` (
  `id_pengaturan` int(11) NOT NULL,
  `logo_restoran` text NOT NULL,
  `nama_restoran` text NOT NULL,
  `banner_1` text NOT NULL,
  `banner_2` text NOT NULL,
  `banner_3` text NOT NULL,
  `small_banner1` text NOT NULL,
  `small_banner2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_suplier`
--

CREATE TABLE `tbl_suplier` (
  `id_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `id_kasir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_waiter`
--

CREATE TABLE `tbl_waiter` (
  `id_waiter` int(11) NOT NULL,
  `nama_waiter` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(8) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `remember_token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_waiter`
--

INSERT INTO `tbl_waiter` (`id_waiter`, `nama_waiter`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'candra', 'L', 'kdw', '088', 'cs@g.com', 'waiter1', '$2y$10$lLWxQ.vQla130zc36RywC.DCfC9Te3XILVUe7XdIbgU7BUhLDbPoG', '2020-11-23 00:45:47', '2020-11-23 00:45:47', '0dnuOevtFsknwS9e8PfB2pYfF165B41HWgo61wr8AZbMBwdxmJknPL79HVy0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@g.com', '2020-11-29 09:30:24', 'admin', NULL, '2020-11-17 09:30:24', '2020-11-17 09:30:24'),
(3, 'adminn', 'admin@gg.com', NULL, '21232f297a57a5a743894a0e4a801fc3', NULL, NULL, NULL),
(4, 'candra', 'adminnn', NULL, 'password', NULL, NULL, NULL),
(5, 'candraa', 'cs@g.com', NULL, '$2y$10$rPL9Qs4zC5K0Up7g9cWIOe2OwJzAe7wIQ4X/ygwcBtBIRfHivZre6', '26Rf2ZijiWLjHOHuaKI93CAzpXpbF9N1DW3T6n4YfBDPiiu8Ng', '2020-11-17 05:15:19', '2020-11-17 05:15:19');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_kasir`
--
ALTER TABLE `tbl_kasir`
  ADD PRIMARY KEY (`id_kasir`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indeks untuk tabel `tbl_masakan`
--
ALTER TABLE `tbl_masakan`
  ADD PRIMARY KEY (`id_masakan`,`id_kategori`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`,`id_pelanggan`,`id_masakan`);

--
-- Indeks untuk tabel `tbl_owner`
--
ALTER TABLE `tbl_owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  ADD PRIMARY KEY (`id_pengaturan`);

--
-- Indeks untuk tabel `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`,`id_pelanggan`,`id_order`,`id_kasir`);

--
-- Indeks untuk tabel `tbl_waiter`
--
ALTER TABLE `tbl_waiter`
  ADD PRIMARY KEY (`id_waiter`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_kasir`
--
ALTER TABLE `tbl_kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_laporan`
--
ALTER TABLE `tbl_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_masakan`
--
ALTER TABLE `tbl_masakan`
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_owner`
--
ALTER TABLE `tbl_owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  MODIFY `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_suplier`
--
ALTER TABLE `tbl_suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_waiter`
--
ALTER TABLE `tbl_waiter`
  MODIFY `id_waiter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
