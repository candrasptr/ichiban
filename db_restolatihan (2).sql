-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Des 2020 pada 07.57
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
-- Struktur dari tabel `kosong`
--

CREATE TABLE `kosong` (
  `username` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `remember_token` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `nama_admin`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(13, 'admin', 'admin', '$2y$10$QdP8uA6ZfIvcZay9TszkcO1ROXoC1YFVXdJhUSzrGuEzQZjG346gS', '2020-11-25 02:21:06', '2020-11-25 02:21:06', NULL),
(14, 'adm', 'adm', '$2y$10$PvgHM4oJDfRJf0NzdP5vFurriAcKchZA635BmlEfWvN656XzvuSlO', '2020-11-25 02:23:21', '2020-11-25 02:23:21', NULL);

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
(1, 'saputraaaaaa', 'laki-laki', 'kdw', '088989', 'cs@g.com', 'kasir1', '$2y$10$X41nT/ek7vYyeLkWW7wRbOr/VnOK9X/wxhC2f6sAJN/CtNTMmP6/y', '2020-11-25', '2020-11-23'),
(2, 'a', 'a', 'a', '1', 'a', 'a', '$2y$10$uWVVb0GS4f5W6VjaiOfbR.GcHV1ZDNOZ4iwlUYDAknrNQt//dvpjW', '2020-11-25', '2020-11-25');

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
  `status_order` varchar(30) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `masakan_id`, `order_detail_id`, `user_order_id`, `tanggal_order`, `status_order`, `jumlah`, `sub_total`) VALUES
(1, 3, 0, 22, '2020-12-25', 'sudah_dipesan', 3, 30000),
(2, 7, 0, 23, '2020-12-25', 'sedang_dipesan', 1, 10000),
(3, 22, 0, 23, '2020-12-25', 'sedang_dipesan', 1, 10000),
(4, 25, 0, 22, '2020-12-25', 'sudah_dipesan', 1, 10000),
(5, 27, 0, 22, '2020-12-25', 'sudah_dipesan', 1, 10000),
(6, 3, 0, 22, '2020-12-25', 'sudah_dipesan', 1, 10000),
(7, 27, 0, 22, '2020-12-25', 'sudah_dipesan', 1, 10000),
(8, 3, 0, 22, '2020-12-25', 'sudah_dipesan', 1, 10000),
(9, 27, 0, 22, '2020-12-25', 'sudah_dipesan', 1, 10000),
(10, 26, 0, 22, '2020-12-25', 'sudah_dipesan', 1, 10000),
(11, 2, 11, 22, '2020-12-25', 'sudah_dipesan', 1, 10000),
(12, 28, 13, 22, '2020-12-25', 'batal_dipesan', 1, 10000),
(13, 27, 13, 22, '2020-12-25', 'batal_dipesan', 1, 10000),
(14, 1, 15, 22, '2020-12-25', 'sudah_dibayar', 2, 20000),
(15, 28, 15, 22, '2020-12-25', 'sudah_dibayar', 1, 10000),
(16, 22, 17, 24, '2020-12-26', 'sudah_dibayar', 1, 10000),
(17, 2, 17, 24, '2020-12-26', 'sudah_dibayar', 1, 10000),
(18, 23, 18, 24, '2020-12-26', 'sudah_dipesan', 1, 10000);

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
(5, 1),
(5, 4),
(5, 5),
(5, 1),
(5, 4),
(5, 5),
(7, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(13, 12),
(13, 13),
(15, 14),
(15, 15),
(17, 16),
(17, 17),
(18, 18);

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
(19, 'plg12', 'ca', 1, '$2y$10$2p3qfokxld.oCHnECJsm6OSRJctzBhxdlKu4RCI9qaUw2Tvgi0Z92', '2020-12-21 19:05:46', '2020-12-21 19:05:46', '2Loggr6r9nQ7tcKOKRWvQ4XjflOntn'),
(21, 'plg1', 'eren', 1, '$2y$10$R5m0KNeFREL/xIwirtO5Ce0MnkDoPCDvli1x8V3vfHuooAOltBtl.', '2020-12-23 19:37:38', '2020-12-23 19:37:38', '1G9iy8RAnAORymQGke1uDJLJ8lSlbUJpFXLj5r8JEnQDux5QKB3slbE7Hoou'),
(22, 'plg2', 'eer', 2, '$2y$10$5cYl/ahJY9VZX3IDi9yo4.QsL0XFtXdUGJ3nZW1rnNr5xBctmhDTm', '2020-12-24 18:21:29', '2020-12-24 18:21:29', 'qjDeMh3jW7XiNEpDFLi3wikwvkBXR7'),
(23, 'plg3', 'For', 1, '$2y$10$ABWRpJxQJGFywht2hPjPy.iVYZfqjidoyTTYnomR9DInWMhzPiTIu', '2020-12-24 18:52:54', '2020-12-24 18:52:54', 'uSFbKGxNWkqeyOIRDix26rF3NBfeU4'),
(24, 'plg4', 'candra', 1, '$2y$10$UNqgp.eAuShrTBPTmVjuw.G2eQ9eXvfW886CknPQ79XUs0QeILECe', '2020-12-25 21:46:05', '2020-12-25 21:46:05', 'pTfhk9MWtcbxro52LzBRoIsXZcCXfg');

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
('ICHBNRST3', 18, '2020-12-26', 10000, 0, 0, 24, 'belum_dibayar', 'belum'),
('ICHBNRST91', 15, '2020-12-25', 30000, 50000, -20000, 22, '', ''),
('ICHBNRST92', 17, '2020-12-26', 20000, 50000, 30000, 24, 'sudah_dibayar', '');

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
(1, 'candra', 'L', 'kdw', '088', 'cs@g.com', 'waiter1', '$2y$10$lLWxQ.vQla130zc36RywC.DCfC9Te3XILVUe7XdIbgU7BUhLDbPoG', '2020-11-23 00:45:47', '2020-11-23 00:45:47', 'FjMPglZug5WeIUZVPIJevugrH5sLU3JDPM8CoJLuFkR9tz1WmHiS1qtkIxtR'),
(3, 'add', 'Laki-Laki', 'ad', 'ad', 'ad', 'ad', '$2y$10$2i/X5lV0ijngXqDGX43WZetNnl9anrTVfKjY4tE0A1QjB9ixHoeQK', '2020-11-26 00:52:49', '2020-11-26 01:12:14', NULL);

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
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `order_id` (`order_detail_id`);

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
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_kasir`
--
ALTER TABLE `tbl_kasir`
  MODIFY `id_kasir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_owner`
--
ALTER TABLE `tbl_owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
-- AUTO_INCREMENT untuk tabel `tbl_waiter`
--
ALTER TABLE `tbl_waiter`
  MODIFY `id_waiter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
