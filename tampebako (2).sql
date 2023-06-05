-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jun 2023 pada 16.01
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tampebako`
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
-- Struktur dari tabel `masakans`
--

CREATE TABLE `masakans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_06_041202_create_masakans_table', 1);

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
(14, 'adm', 'adm', '$2y$10$PvgHM4oJDfRJf0NzdP5vFurriAcKchZA635BmlEfWvN656XzvuSlO', '2020-11-25 02:23:21', '2020-11-25 02:23:21', NULL),
(16, 'admon', 'admon', '$2y$10$mUgB2dlR9gZp2awdNZP2P.lOZFGR8Key1NsSRJgMSaLxNSfsGAMTe', '2021-01-21 00:08:09', '2021-01-21 00:08:09', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bahan_baku`
--

CREATE TABLE `tbl_bahan_baku` (
  `id_bahanbaku` int(11) NOT NULL,
  `nama_bahanbaku` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bahan_baku`
--

INSERT INTO `tbl_bahan_baku` (`id_bahanbaku`, `nama_bahanbaku`, `gambar`, `qty`) VALUES
(2, 'jhjj', 'bahan_1685694456.jpeg', 18);

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
(43, 'Iced Latte', 'produk_1685807000.png', 'makanan', 20000, 'tersedia'),
(44, 'Goth Chorcoal', 'produk_1685807024.png', 'minuman', 22000, 'tersedia'),
(45, 'Nasi Goreng', 'produk_1685807342.png', 'dessert', 25000, 'tersedia');

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
(1, 43, 1, 98, '2023-06-05', 'sudah_dibayar', 4, 80000),
(2, 44, 2, 98, '2023-06-05', 'sudah_dibayar', 2, 44000),
(3, 45, 0, 98, '2023-06-05', 'sedang_dipesan', 1, 25000);

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
(1, 1),
(2, 2);

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
(46, 'plg10', 'candra', 1, '$2y$10$hpYMGSdzeX4n1WDTB4ZZ7uE.XciCc0eK0ceQSareaptXbG2een9Bm', '2021-02-10 23:03:10', '2021-02-10 23:03:10', 'cQ9ORqkrclLPFYGXyOjYZGrCB3PYOb'),
(47, 'plg11', 'Aan', 111, '$2y$10$s2ydJ/IMo8lzWE.90SUQQ.VQPBRPcU0sBiSoSyBhhACShJU0ti2B.', '2023-05-30 08:05:00', '2023-05-30 08:05:00', 'fLhKANLHLNpgDEWXyzYxb5qmoOAEXg'),
(48, 'plg12', 'Aan', 111, '$2y$10$lD1KXYKw0zOM7/oxyKvBH.sCCkhDt1.0I9bX5EbYq21eeQQKnRt.q', '2023-05-30 08:16:33', '2023-05-30 08:16:33', 'LzFbDWUnvoxMh5H6yzOzHuXHipvCDt'),
(49, 'plg13', 'Aan', 111, '$2y$10$Gj1.K5lvgce05TZHAyW0WeJKFcpC8MMNjcbaEu1dOeruO9KlvroFG', '2023-05-30 08:16:35', '2023-05-30 08:16:35', 'WQa3gGZIAu1t6F0gGkNHrXUykJ3UwF'),
(50, 'plg14', 'subhan', 11231, '$2y$10$O.Insy5df5ZmJRAFM3JXReHC7rPyOqk.lE6aZA9ZlmKDktaboFDHe', '2023-05-30 08:18:13', '2023-05-30 08:18:13', 'bjPgehTCeUHLSOulbMywj6vmHJav8z'),
(51, 'plg15', 'Slamet', 2, '$2y$10$rRlX7lWiVTAJXiMv2d7b8uCJbjlVS7T0zeCtVWm0rmnltGBEW5K8W', '2023-05-30 08:22:04', '2023-05-30 08:22:04', '7Fb88ZXlB7wKQxx8BhEkuv1mcmNmjx'),
(52, 'plg16', 'Slamet', 2, '$2y$10$tSuB.ZUa35bPdhvFFXuhTepHvbrWOI80oSmNRzqzY4bLyFG0Y9HXu', '2023-05-30 08:22:06', '2023-05-30 08:22:06', 'ST2h6LhTd6fAAwOeoGAJdgCO0sj1pS'),
(53, 'plg17', 'cer', 1, '$2y$10$R6/3JTP8xbGqCSML5SmUCe55mh3NdD1D1SZqZBlsCHOE9ivbIAieS', '2023-05-30 09:05:47', '2023-05-30 09:05:47', 'BegxkuFE9Qqy7F7m1i0Zu6kmtAkGKU'),
(54, 'plg18', 'aan', 1, '$2y$10$YEojMj11P7PzCoVUY9koFel47.9zDv.MOrwJfmrJ6IPs0jqKN5nkm', '2023-05-30 09:24:39', '2023-05-30 09:24:39', '7FtmmzfpoX0SG0mItpGR0Hvlivc7SO'),
(55, 'plg19', 'aan', 1, '$2y$10$F9SUwNWDWA3.DXVM2lv/9uWsETlkomgcWQdQnJaJJpft1QAc8LbCK', '2023-05-30 09:24:42', '2023-05-30 09:24:42', '5veClE0P4v1RkuxE7UAIQuhaXnsJjp'),
(56, 'plg20', 'cher', 123, '$2y$10$Mbfxz1tSusOaUhP/Lr5hL..OuKoSmNIfJh.rN26gcHlLHuYBucgHS', '2023-05-30 10:50:14', '2023-05-30 10:50:14', 'hgo9ipLjoGVRo4xLY8ultO5DEdzNri'),
(57, 'plg21', 'asdas', 11, '$2y$10$I4MYeCLa3PR2wgIqdIZlx.FK3BKJoXKpRfhP1Dib/OCqSgI94E5I6', '2023-05-30 11:19:06', '2023-05-30 11:19:06', 'Yl1MtRSdOUYC1xU9ebTsFZ8zl0th8u'),
(58, 'plg22', 'asdasdasd', 11, '$2y$10$189vS5RWPHOSq4hdMy04WeMvQP0/GspcMJXKqP7Ef9aRn/ldr1ojK', '2023-05-30 11:40:22', '2023-05-30 11:40:22', 'LnJCOafeXfRMpGOePaGENE7IsxDQ1L'),
(59, 'plg23', 'asdasdasdasda', 1223123123, '$2y$10$Yb0X6Va3hv52mtg7AFFjeOxWxU8vjWN/8kgRQoXFVejlhS1jyok/C', '2023-05-30 11:46:30', '2023-05-30 11:46:30', 'tW4ATdeVmxM79W2QxDZp7crd1zcfEq'),
(60, 'plg24', 'halo', 123, '$2y$10$Rj8ZqfLYVP9B124z2mW9wufI1OMAfM0m5OEB63kjj24qMqaYyoMy.', '2023-05-31 10:03:47', '2023-05-31 10:03:47', 'x8Ozg0uGrVD1idEI0S0qXz7oa6w3da'),
(61, 'plg25', 'aan', 123, '$2y$10$adVvEEQQTanafjOT7TM6AeiZl2yVQpZDHZTT8QBItvEhbrk3z00Ri', '2023-05-31 10:38:34', '2023-05-31 10:38:34', 'DjAVjktl6yfztfdzo0kM1p1KBSscLO'),
(62, 'plg26', 'aan', 123, '$2y$10$g0gPC2HgxGHIpMZx1iOU6eT4yAHWMDBDgOrD/n0BVDYPfUKG9sXD6', '2023-05-31 11:01:55', '2023-05-31 11:01:55', 'aDej3WDsGtq0wNxyP6NQLxt0yDp6jj'),
(63, 'plg27', 'aan', 123123, '$2y$10$yQEn7AAoYA0IvIAJbW1gpOFCIatMuNLq/C5o3yhOsLgCW98ncBIFK', '2023-06-01 00:55:23', '2023-06-01 00:55:23', 'szUCCcvHqFrIC6A1x0eFnqS3wpgdlq'),
(64, 'plg28', 'aan', 123, '$2y$10$BekXheJ9ozTfCpT.QHX4tuUoKbtxYIUo7NQFMEi3KN8r57qULXkVG', '2023-06-01 01:05:12', '2023-06-01 01:05:12', 'sXl3z4tjtCcger2M46KvGpL2sMukxj'),
(65, 'plg29', 'ASUS', 123, '$2y$10$DoftH7TZdcLn9vAENQcNOeCZOObEZi2p/pxMorm7X1RxOXHf4pGhe', '2023-06-01 01:14:21', '2023-06-01 01:14:21', 'rMOQZMZPUdWECJLEz0Twguee4biv84'),
(66, 'plg30', 'cher', 123123, '$2y$10$KZUU2vcgUuDDQe.av0pbTegO6GIBxXqTFD2E1tZFqdeI0HLYK1rOS', '2023-06-01 02:05:03', '2023-06-01 02:05:03', 'weFT6BM7iRCzWkA3UY13qbH1Z0E8LT'),
(67, 'plg31', 'asdasdasd', 122222, '$2y$10$Uq39reiO.L43wMMp32neYuAzKO7t2Bayni7iaVyEYso2niLfhzwL.', '2023-06-01 02:56:48', '2023-06-01 02:56:48', 'jNfy0xGxAYjxf6ef9cSy2bhCB1vJP9'),
(68, 'plg32', 'qweq', 123, '$2y$10$ZgHbZsSSJ2xziZ23q6161eeUrNmIR6qOfHdH9naxNwUQQryNqKhiu', '2023-06-01 04:22:12', '2023-06-01 04:22:12', 'mfpwdzGFahokABjjeZBrqhp7blz2oX'),
(69, 'plg33', 'asd', 12333, '$2y$10$XqdnZboGTTjYc3H9wFP.1eD6X6/.UiNCZKXBJDn0bnm0qpmg0mv7y', '2023-06-01 09:31:25', '2023-06-01 09:31:25', '1QHvOlbPM7Eyu8lNKcX5AyurqARC8p'),
(70, 'plg34', 'cher', 123123, '$2y$10$VcuGrwcyX5u1nOU4y5tsQOKjYb2DqrIhFWmh9a9htxZPLm9WYsgAq', '2023-06-03 03:03:04', '2023-06-03 03:03:04', 'rw3kOy8Z4wuG5HYMLRnOavr0knvBR1'),
(71, 'plg35', 'asdasd', 123, '$2y$10$O8LfPIrx4tIuehzOzeVBiuLE4RQxSsvMAeSwRHcy5E.4t5cpkBbB.', '2023-06-03 06:39:20', '2023-06-03 06:39:20', 'b79fTK074Kx6amEXGGILPUb9Nu31kX'),
(72, 'plg36', 'asdasd', 123, '$2y$10$iexoXBdIldXz/OsiqEYXSuCZfilGxDjGoYu9v/mZiCiP191nGCd5C', '2023-06-03 09:19:15', '2023-06-03 09:19:15', 'J9nYLDKSsR1PgH466oPjUV1NLicDZN'),
(73, 'plg37', 'asdasd', 123123, '$2y$10$pQsAvVTOOB59wr8Ak9.lkOQP1cKk46DOg8f/3S.KuvXt/0hetIpqm', '2023-06-03 09:48:36', '2023-06-03 09:48:36', 'l8C4bIgqXkiPB6oivuUTCU9FREzKXW'),
(74, 'plg38', 'asdasd', 123123, '$2y$10$fETyDS4YA5s3Vb7d36cNZ.luCEjGDD85Ml9YEqtARq30/yw6MvZ/i', '2023-06-03 09:54:27', '2023-06-03 09:54:27', 'PRIXTbGCiMi6hCQrcUIQTLrugt0988'),
(75, 'plg39', 'asdasd', 123, '$2y$10$nqO/UlmZ0QODY1IHOEtLA.rdxL.3H8Kr2HusGCObd6gSjx5Rx6CI2', '2023-06-03 09:57:56', '2023-06-03 09:57:56', '8WOr5jDYxBZCPc4NLcMETlny40z4Jr'),
(76, 'plg40', 'asd', 12, '$2y$10$g0ZKBuUz/QkZcJ8Yic1xjOdZr/l8V6DTY1mCHdGrpTZJYn7tdR5e.', '2023-06-03 13:30:52', '2023-06-03 13:30:52', 'rYfnmxOl61MnMFPoS65c694smgjVUmHVmhMApxlmQY8pxvRTX5TTaz0Ssi8T'),
(77, 'plg41', 'aaaaa', 121, '$2y$10$5YV0Oh/hdk0XjVjGc8oh2eDOk1470o/fmvZ.Z0fzJpYDTGKlcN6QK', '2023-06-03 13:39:49', '2023-06-03 13:39:49', 'iMqsRb3GU3c76PTSdU78Ue9nUmLjbtbESIn08AL9OmMymNmOhAitvvTlq4lm'),
(78, 'plg42', 'asdddd', 1122, '$2y$10$C/Cp1/3UGPTAjeSVYHhEi.pHhV47Y9BJ7KWoqjpsTuWK.J97dajrO', '2023-06-03 13:41:16', '2023-06-03 13:41:16', 'mLuY45cC5aj4mg9xq1VQm7CwOTfqNM5FS0xDzxz5wwxPmVWD2WML9TT91Itr'),
(79, 'plg43', 'qqq', 1, '$2y$10$gpmxM9DIb8ts7IWQxo8VkO21N0mgVyFRMy4CCHCFu8y1YpZJG0mci', '2023-06-03 13:44:12', '2023-06-03 13:44:12', 'GM2vgb43wh65bYGaumeSotgaiP8KutQHh8nvi30TTiiTjobttCaHF9TqupnD'),
(80, 'plg44', 'aasd', 122, '$2y$10$b8grn74y1Uv233lMI0aFKe1WflryMkT9KlSe2vyDCuoB8a1SyGWqi', '2023-06-03 13:45:20', '2023-06-03 13:45:20', '1ixzDoOtJQ9huDfcLQBm9LIXM3Vt2gdMJeGVSusvVgc1dE61MX29n4SMShPP'),
(81, 'plg45', 'aaa', 22, '$2y$10$CKkgBM5I90ih9Zs0gxRinOg/uBfa6sfhvfdV8HpsfW7sJ4YicFLOC', '2023-06-03 13:46:36', '2023-06-03 13:46:36', '79b00XjT8uGkbzyko7CjAyhDNyhdQWsHcp4mtJIr4q81BxOLQx3XkIuEHebt'),
(82, 'plg46', 'asddd', 1222, '$2y$10$qyApKOuM0eryFdrUIy3YSull4gVUPg47hz4OlJXNvZkEZ4POqgys6', '2023-06-03 13:47:19', '2023-06-03 13:47:19', 'SLooIRQ0bVOTqJVg70aGR9NQchSxY7'),
(83, 'plg47', 'asddd', 1222, '$2y$10$8l4z5dwGcNiZVwpIqwgI7uUcP.KHJZsBKQLqrCaVsWeDyZHraVK6G', '2023-06-03 13:47:20', '2023-06-03 13:47:20', 'RL2OXeWSgiJjCv5O06FbMksefiEEqJ7gz56H3cwBEIUf1gw5sE8bnAnhbCI3'),
(84, 'plg48', 'ass', 22, '$2y$10$w1LU.ugRxdZvSuWZeaAMNe7uNbeQJmMvKzm.F.qomzoQgLrFxW9Z.', '2023-06-03 13:51:53', '2023-06-03 13:51:53', 'X42r8lK4zKkES4zpWualTuunmUetDP'),
(85, 'plg49', 'aaa', 123, '$2y$10$G0SqNxHIGfFv7.jP/lyE4uV9g5CtjVW6anekhjSIto5.MqrOXtx5.', '2023-06-03 13:58:37', '2023-06-03 13:58:37', 'VJjWEoptXumrSJvQqbrSxqrBr33b5z'),
(86, 'plg50', 'asd', 111, '$2y$10$J1o0s3tce4Wl7EfHCSpyY.rU/bIgHKk/5BfPXwT8RVXkeDanGoqCK', '2023-06-03 14:45:30', '2023-06-03 14:45:30', 'IXWOGraep4L9DO2IiLqVecAFL7Rygy'),
(87, 'plg51', 'asdasd', 12, '$2y$10$7XO0f6AsVBwt8Aack2F/Rehf32yy46xg57RW51YknmPO4nRO.H2v2', '2023-06-04 04:22:38', '2023-06-04 04:22:38', 'A5hFTT18BinePlMhKFajG6lbSnQSBPeh7pnvEQpbXUuZMQiLqvNnWIQUSmGc'),
(88, 'plg52', 'aa', 11, '$2y$10$t5vblQa3UdIZH7z7IDq6B./Vyl9mJXRzYjQvJbcrUwaiH0BzXtmsW', '2023-06-04 04:36:50', '2023-06-04 04:36:50', '8FHjWkCKI8WxK0sP1jmfqbcvglWLry735tlGEqSaWj8U25oP1p48PADNEnI2'),
(89, 'plg53', 'ss', 11, '$2y$10$XYzlo2l8EigGCJ5wXjVCs.8hP0FcdVOC8bdkvqTjVyRHTEzsmE7iC', '2023-06-04 04:39:48', '2023-06-04 04:39:48', 'pia3j8dkT2n2HBMbLdf0RONCCv7awvEoPkguRBQK4RY2nuGWjvFwCSFjA0mf'),
(90, 'plg54', 'asd1', 1213, '$2y$10$2GszOKMXqWAFavvOHw16/uzifc6cU2MAFd0duRGqHviGtn..CDWKa', '2023-06-04 05:51:14', '2023-06-04 05:51:14', 'ma7XKgy9RjxPkw9FapF2JC2DkGWT2V'),
(91, 'plg55', 'aaa', 123, '$2y$10$s5LZUh/A6kRycqaKmD8jkO63Mzmo11DDq1JH3OhjuNq6QmY2hwME6', '2023-06-04 06:12:20', '2023-06-04 06:12:20', 'lTRiL5pJYeqLWgxLyOhuSgyqfvuuwZ'),
(92, 'plg56', 'asd1', 11, '$2y$10$94V7p2QgZdPVoUAnOSXbO.f4hboKngqHX5o5NxAG8HtDWtH/4xWt2', '2023-06-04 06:19:11', '2023-06-04 06:19:11', 'mSQU9d1QkEwuAiHIjI0B9qwIlePVtH'),
(93, 'plg57', 'aa', 11, '$2y$10$oNn6uZIpZVHwkkpZIY/n/evso65o9rLi.cjGicJF7gBReKEuAm/VG', '2023-06-04 07:29:23', '2023-06-04 07:29:23', 'HoCIuSPJKsVZPyoK02QIrcZauG1SOoUrtywiqRGBIRrXR74uzeYY1hycq9WA'),
(94, 'plg58', 'aaa', 111, '$2y$10$pgdhZ7M8lbnuOs52BAIIlOG/VxV.o.8F1ViurXXC/6XpwYuYaoBN2', '2023-06-04 08:01:15', '2023-06-04 08:01:15', 'fjTt6TvHeSbDGrhYim1D8nZmEDp28U'),
(95, 'plg59', 'asd', 123, '$2y$10$m3JBv0EUwMWlMthynfg3XOBGMCE.DHI28G5.IVaN1c7V.u5RMfUOO', '2023-06-04 10:55:40', '2023-06-04 10:55:40', '3kYhESMFJ1J2CMT1SnEF7nMCqTUVar'),
(96, 'plg60', 'aaa', 123, '$2y$10$nhFc.44Hf5T9ft35WpDSmueO0QLnn9Eb9XDXg9BRfAXPibeCA91Lm', '2023-06-04 10:58:46', '2023-06-04 10:58:46', 'LcXDRiNSlbAAsERlaFXvoNCZC7gT7H'),
(97, 'plg61', 'asd', 111, '$2y$10$jimmz8i39.J5W4rZ2TUWIeYV.1ZelZuZwodVGgJfveGfPTh39FS8q', '2023-06-05 01:00:52', '2023-06-05 01:00:52', 'vBEO4wQq1EbT78zzwleGEMOzGjKnGc'),
(98, 'plg62', 'aaa', 123, '$2y$10$Ih2nwHx4KiEy67EQuyTBAejBiOEJlM7cawAh9MM52FFn1T.bEh9zO', '2023-06-05 06:47:33', '2023-06-05 06:47:33', 'a9m0mOSYTdkyx2bkfRentcZnxpRHym'),
(99, 'plg63', 'aasd', 123, '$2y$10$chmvSq/E5zfIh6vD4Pfmpej8LPD5jirRRVOKaTTWAnpzr400v5E06', '2023-06-05 06:56:52', '2023-06-05 06:56:52', 'r3NljuGz0EOcU4P8wNjaTR4hTDv6fX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelayan`
--

CREATE TABLE `tbl_pelayan` (
  `id_pelayan` int(11) NOT NULL,
  `nama_pelayan` varchar(100) NOT NULL,
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
-- Dumping data untuk tabel `tbl_pelayan`
--

INSERT INTO `tbl_pelayan` (`id_pelayan`, `nama_pelayan`, `jenis_kelamin`, `alamat`, `no_hp`, `email`, `username`, `password`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'pelayan', 'Laki-Laki', 'asdkalskd', '012039310', 'cjkj@a.com', 'pelayan', '$2y$10$EkHECCIYy/NsD9sLJeodYOXn0So2TY/NWPO333kjgmHvPA9dYLzcC', '2023-06-03 10:04:07', '2023-06-03 10:04:07', NULL);

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
('TMP5', 1, '2023-06-05', 20000, 21999, 1999, 98, 'sudah_dibayar', 'sudah'),
('TMP6', 2, '2023-06-05', 22000, 22000, 0, 98, 'sudah_dibayar', 'belum');

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
(1, 'candra', 'Laki-Laki', 'kdw', '088', 'cs@g.com', 'waiter', '$2y$10$Tx4LI9f82x3Q6WqsMUYdEeRDZYRqfkmBwEsZASEZcQr75rdeHEVMu', '2020-11-23 00:45:47', '2020-12-29 03:54:18', '4k75dDdkwvb8x1KZ3Px33CDfpS6wjfaTUfrcashLVYv0C4ipasGM5MqoaEnk');

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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `masakans`
--
ALTER TABLE `masakans`
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
-- Indeks untuk tabel `tbl_bahan_baku`
--
ALTER TABLE `tbl_bahan_baku`
  ADD PRIMARY KEY (`id_bahanbaku`);

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
-- Indeks untuk tabel `tbl_pelayan`
--
ALTER TABLE `tbl_pelayan`
  ADD PRIMARY KEY (`id_pelayan`);

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
-- AUTO_INCREMENT untuk tabel `masakans`
--
ALTER TABLE `masakans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_bahan_baku`
--
ALTER TABLE `tbl_bahan_baku`
  MODIFY `id_bahanbaku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_masakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_owner`
--
ALTER TABLE `tbl_owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelayan`
--
ALTER TABLE `tbl_pelayan`
  MODIFY `id_pelayan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_waiter`
--
ALTER TABLE `tbl_waiter`
  MODIFY `id_waiter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
