-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2025 pada 11.19
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rumahsakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `poli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id`, `nama`, `poli`) VALUES
(1, 'Dr. Salsa', 'Poli Umum'),
(2, 'Dr. Budi', 'Poli Gigi'),
(3, 'Dr. Lestari', 'Poli Anak'),
(4, 'Dr. Tompi', 'Poli Kulit'),
(5, 'Dr. Kalula', 'Poli Jiwa'),
(6, 'Dr. Alvin', 'Poli Obgyn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `poli` varchar(100) DEFAULT NULL,
  `dokter` varchar(100) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `status` enum('menunggu','diterima','ditolak') DEFAULT 'menunggu',
  `tgl_lahir` date DEFAULT NULL,
  `alamat` text,
  `telepon` varchar(20) DEFAULT NULL,
  `keluhan` text,
  `jam` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `user_id`, `nama`, `poli`, `dokter`, `tanggal`, `status`, `tgl_lahir`, `alamat`, `telepon`, `keluhan`, `jam`) VALUES
(7, 13, 'cika', 'Poli Anak', 'Dr. Lestari', '2025-06-10', 'diterima', '2022-05-08', 'tangerang', '1234567855', 'pilek dan batuk berdahak', '12:18:00'),
(8, 2, 'Destiana', 'Poli Umum', 'Dr. Salsa', '2025-06-21', 'diterima', '2000-06-19', 'tangerang 1', '1234567855', 'pusing', '13:50:00'),
(9, 3, 'Endi', 'Poli Gigi', 'Dr. Budi', '2025-06-09', 'ditolak', '2003-09-09', 'Pasar kemis', '1234567890', 'gigi berlubang', '16:11:00'),
(10, 14, 'rifky', 'Poli Umum', 'Dr. Salsa', '2025-06-12', 'diterima', '2004-12-04', 'Rajeg', '08987654321', 'Sakit kepala sudah 3 hari', '20:00:00'),
(11, 1, 'Lia', 'Poli Anak', 'Dr. Lestari', '2025-06-13', 'menunggu', '2020-12-04', 'Pasar Anyar', '1234567855', 'Demam, pilek, pusing', '19:00:00'),
(12, 15, 'Ganu', 'Poli Gigi', 'Dr. Budi', '2025-06-13', 'menunggu', '2003-02-01', 'Pasar Kemis', '08982345678', 'Gigi bagian depan sakit', '09:00:00'),
(13, 16, 'salsa', 'Poli Umum', 'Dr. Salsa', '2025-06-13', 'diterima', '2025-06-01', 'pasarkemis', '0897654321', 'pusing', '17:00:00'),
(14, 17, 'pina', 'Poli Gigi', 'Dr. Budi', '2025-06-12', 'menunggu', '2023-03-02', 'tangerang', '087795643', 'sakit gigi', '18:00:00'),
(15, 18, 'caca', 'Poli Anak', 'Dr. Lestari', '2025-06-09', 'ditolak', '2023-08-11', 'bogor', '089798657', 'mual', '17:45:00'),
(16, 19, 'nisa', 'Poli Kulit', 'Dr. Tompi', '2025-06-13', 'menunggu', '2018-01-13', 'bandung', '0876586679', 'alergi', '20:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `role` enum('admin','pasien') NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `role`, `created_at`) VALUES
(4, 'admin', '$2y$10$fco5zgoMP3GbzFNvKmln9uOVzgjAhugRbs8dw1DEZcuRjd6EJ4Y.y', 'Admin', 'admin', '2025-06-07 01:41:39'),
(16, 'salsaeka', '$2y$10$JJRfbf0.soEG8UKj9IM3iOSNQjxCVSkvBNBSfibsnZX.ywcr5wd0K', 'salsa', 'pasien', '2025-06-13 14:57:51'),
(17, 'pinaya', '$2y$10$6gTp8Nwd49mZniDThFndvOnlN1kYLjvWNE3vgvDw1MV.0xG6nPKKa', 'pina', 'pasien', '2025-06-13 15:35:21'),
(18, 'caca', '$2y$10$456QQOED/ajxVakUlJtX8OElZkVJqz26jpdwqaubrmodn7R4PhMbm', 'caca', 'pasien', '2025-06-13 15:43:09'),
(19, 'nisa', '$2y$10$x3D3UfZ9qHVLlQXxQMsMHeg58.ANbF0H91HyI/X7KON/J17Y2gEku', 'nisa', 'pasien', '2025-06-13 15:58:58');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
