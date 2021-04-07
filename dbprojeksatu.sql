-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Apr 2021 pada 09.29
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbprojeksatu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_anggota` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_anggota` enum('siswa','guru','staf') COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `kode_anggota`, `nama`, `jenis_anggota`, `tempat_lahir`, `tgl_lahir`, `jk`, `no_hp`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'AGT00001', 'Septi', 'siswa', 'Jambi', '2021-04-08', 'L', '07455527', 'a', '2021-04-06 17:43:29', '2021-04-06 17:00:00'),
(3, 'AGT00002', 'Yessi', 'guru', 'Jambi @', '1999-12-30', 'L', '07455527555', 'Jambi', '2021-04-06 17:56:06', '2021-04-06 17:00:00'),
(4, 'AGT00004', 'putri', 'staf', 'a', '2021-03-31', 'P', '07455527', 'a', '2021-04-06 18:51:46', '2021-04-06 18:51:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_buku` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(90) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isbn` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pengarang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penerbit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_terbit` int(11) DEFAULT NULL,
  `jml_buku` int(11) NOT NULL,
  `jml_dipinjam` int(11) DEFAULT NULL,
  `sumber` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lokasi` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `isbn`, `pengarang`, `penerbit`, `tahun_terbit`, `jml_buku`, `jml_dipinjam`, `sumber`, `deskripsi`, `lokasi`, `cover`, `created_at`, `updated_at`) VALUES
(1, '89', 'uuu', '8', 'nkk', 'nnn', 2016, 91, 0, 'dak', 'Kerjakan', 'rak4', NULL, '2021-04-06 18:14:04', '2021-04-07 06:47:30'),
(2, '89', 'Bahasa Inggris', '456', 'jkl', 'hn', 2015, 8, 1, 'bos', 'Kerjakan di Rumah', 'rak1', NULL, '2021-04-06 18:52:24', '2021-04-07 07:09:21');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_14_155044__create_anggota_table', 1),
(5, '2021_01_14_165452__create_buku_table', 1),
(6, '2021_01_16_070912__create_transaksi_table', 1);

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
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anggota_id` bigint(20) UNSIGNED NOT NULL,
  `buku_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('pinjam','kembali') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_denda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `denda` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `kode_transaksi`, `anggota_id`, `buku_id`, `tgl_pinjam`, `tgl_kembali`, `status`, `status_denda`, `denda`, `created_at`, `updated_at`) VALUES
(1, 'TR00001', 3, 1, '2021-04-07', '2021-04-14', 'kembali', NULL, '0', '2021-04-06 18:45:42', '2021-04-06 17:00:00'),
(2, 'TR00002', 1, 1, '2021-04-07', '2021-04-14', 'kembali', NULL, '0', '2021-04-06 18:46:38', '2021-04-06 17:00:00'),
(3, 'TR00003', 1, 1, '2021-04-01', '2021-04-01', 'kembali', 'belum lunas', '6000', '2021-03-31 18:49:02', '2021-04-06 17:00:00'),
(4, 'TR00004', 3, 1, '2021-04-01', '2021-04-01', 'kembali', NULL, '0', '2021-04-07 06:43:07', '2021-04-06 17:00:00'),
(5, 'TR00005', 4, 1, '2021-04-01', '2021-04-01', 'kembali', NULL, '0', '2021-04-07 06:43:32', '2021-04-06 17:00:00'),
(6, 'TR00006', 3, 2, '2021-04-01', '2021-04-01', 'kembali', NULL, '0', '2021-04-07 06:44:30', '2021-04-06 17:00:00'),
(7, 'TR00007', 1, 2, '2021-04-01', '2021-04-01', 'kembali', 'belum lunas', '6000', '2021-04-07 06:47:45', '2021-04-06 17:00:00'),
(8, 'TR00008', 3, 2, '2021-04-07', '2021-04-14', 'pinjam', NULL, NULL, '2021-04-07 07:09:21', '2021-04-07 07:09:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `username`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin', 'admin@admin.com', NULL, '$2y$10$ekh0L9qCHZPn6HYLxZpNFuNSdRuvSP24aaoIQSWoM0B8Q/I23zSN.', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_anggota_id_foreign` (`anggota_id`),
  ADD KEY `transaksi_buku_id_foreign` (`buku_id`);

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
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_anggota_id_foreign` FOREIGN KEY (`anggota_id`) REFERENCES `anggota` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksi_buku_id_foreign` FOREIGN KEY (`buku_id`) REFERENCES `buku` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
