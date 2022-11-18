-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 07:45 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_rpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluasis`
--

CREATE TABLE `evaluasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `masalah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ide_baru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `momen_spesial` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rpp` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluasis`
--

INSERT INTO `evaluasis` (`id`, `masalah`, `ide_baru`, `momen_spesial`, `id_rpp`, `created_at`, `updated_at`) VALUES
(1, 'sasasa', 'sss', '4444', 1, '2022-11-18 09:13:56', '2022-11-18 09:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `indikators`
--

CREATE TABLE `indikators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kodeKD` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` bigint(20) NOT NULL,
  `mata_pelajaran` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_siswa` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`, `jumlah_siswa`, `created_at`, `updated_at`) VALUES
(1, 'Kelas 1', NULL, NULL, NULL),
(2, 'Kelas 2', NULL, NULL, NULL),
(3, 'Kelas 3', NULL, NULL, NULL),
(4, 'Kelas 4', NULL, NULL, NULL),
(5, 'Kelas 5', NULL, NULL, NULL),
(6, 'Kelas 6', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi_dasars`
--

CREATE TABLE `kompetensi_dasars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kodeKD` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kompetensiDasar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mataPelajaran` bigint(20) UNSIGNED NOT NULL,
  `indikator` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kompetensi_dasars`
--

INSERT INTO `kompetensi_dasars` (`id`, `kodeKD`, `kompetensiDasar`, `mataPelajaran`, `indikator`, `kelas`, `created_at`, `updated_at`) VALUES
(1, '3.1', 'Menyimpulkan informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca.', 1, '3.1.1 Memahami informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca.\r\n3.1.2 Mengetahui cara menyimpulkan teks laporan hasil pengamatan.', 6, '2022-11-09 17:00:00', '2022-11-11 08:06:53'),
(7, '3.2', 'Menyimpulkan informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca.', 1, '3.2.1 Memahami informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca.\r\n3.1.2 Mengetahui cara menyimpulkan teks laporan hasil pengamatan.', 6, '2022-11-09 17:00:00', '2022-11-11 08:06:53'),
(8, '3.3', 'Menyimpulkan informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca.', 1, '3.3.1 Memahami informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca.\r\n3.1.2 Mengetahui cara menyimpulkan teks laporan hasil pengamatan.', 6, '2022-11-09 17:00:00', '2022-11-11 08:06:53'),
(9, '3.2', 'Menyimpulkan informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca.', 2, '3.2.1 Memahami informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca. ', 6, '2022-11-09 17:00:00', '2022-11-11 08:06:53'),
(11, 'as', 'asas', 3, 'sasaasassaas', 6, '2022-11-18 08:06:57', '2022-11-18 08:06:57'),
(12, 'sass', 'asassa', 1, 'saasas', 6, '2022-11-18 08:12:53', '2022-11-18 08:12:53'),
(13, '1212', '222', 2, 'asasasa', 6, '2022-11-18 08:13:17', '2022-11-18 08:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi_inti`
--

CREATE TABLE `kompetensi_inti` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_kompetensi_inti` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajarans`
--

CREATE TABLE `mata_pelajarans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mata_pelajarans`
--

INSERT INTO `mata_pelajarans` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Bahasa Indonesia', '-', NULL, NULL),
(2, 'IPA', 'Ilmu Pengetahuan Alam', NULL, NULL),
(3, 'IPS', 'Ilmu Pengetahuan Sosial', NULL, NULL),
(4, 'Matematika', '-', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2022_09_28_071723_create_kelas_table', 2),
(5, '2022_09_28_072132_create_siswa_table', 3),
(6, '2022_11_10_065207_create_mata_pelajarans_table', 4),
(7, '2022_11_10_070629_create_kompetensi_dasars_table', 4),
(9, '2022_11_10_153836_create_indikators_table', 5),
(12, '2022_11_15_123838_create_kompetensi_inti_table', 6),
(13, '2022_11_13_162027_create_rpp_table', 7),
(14, '2022_11_15_145212_create_tema_table', 8),
(15, '2022_11_13_163357_create_evaluasi_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rpps`
--

CREATE TABLE `rpps` (
  `id_rpp` bigint(20) UNSIGNED NOT NULL,
  `satuan_pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_tema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembelajaran_ke` int(11) NOT NULL,
  `alokasi_waktu` int(11) NOT NULL,
  `kompetensi_inti` bigint(20) UNSIGNED NOT NULL,
  `muatan` bigint(20) UNSIGNED NOT NULL,
  `kompetensi_dasar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `indikator` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendekatan_metode` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegiatan_pendahuluan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_pendahuluan` int(11) NOT NULL,
  `kegiatan_inti` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_inti` int(11) NOT NULL,
  `kegiatan_penutup` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_penutup` int(11) NOT NULL,
  `penilaian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `remediasi_pengayaan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber_media` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rpps`
--

INSERT INTO `rpps` (`id_rpp`, `satuan_pendidikan`, `kelas`, `semester`, `tahun_ajaran`, `tema`, `sub_tema`, `pembelajaran_ke`, `alokasi_waktu`, `kompetensi_inti`, `muatan`, `kompetensi_dasar`, `indikator`, `tujuan`, `materi`, `pendekatan_metode`, `kegiatan_pendahuluan`, `waktu_pendahuluan`, `kegiatan_inti`, `waktu_inti`, `kegiatan_penutup`, `waktu_penutup`, `penilaian`, `remediasi_pengayaan`, `sumber_media`, `created_at`, `updated_at`) VALUES
(1, 'SD Negeri 1 Sruweng', '6', '1', '2022/2023', 'Selamatkan Makhluk Hidup', 'Tumbuhan Sahabatku', 1, 1, 1, 2, 'nope', 'nope', 'nope', 'nope', 'nope', 'nope', 15, 'nope', 120, 'nope', 15, 'nope', 'nope', 'nope', '2022-11-15 07:00:30', '2022-11-15 07:00:30'),
(2, 'SD Negeri 1 Sruweng', '6', '1', '2022/2023', 'Selamatkan Makhluk Hidup', 'Hewan Sahabatku', 2, 1, 1, 2, 'nope', 'nope', 'nope', 'nope', 'nope', 'nope', 15, 'nope', 120, 'nope', 15, 'nope', 'nope', 'nope', '2022-11-15 07:00:30', '2022-11-15 07:00:30'),
(3, 'SD Negeri 1 Sruweng', '6', '1', '2022/2023', 'Selamatkan Makhluk Hidup', 'Ayo, Selamatkan Hewan dan Tumbuhan', 2, 1, 1, 2, 'nope', 'nope', 'nope', 'nope', 'nope', 'nope', 15, 'nope', 120, 'nope', 15, 'nope', 'nope', 'nope', '2022-11-15 07:00:30', '2022-11-15 07:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `temas`
--

CREATE TABLE `temas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_tema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin1@gmail.com', 2, NULL, '$2y$10$6ESfPM7i34tPPRLUnjIEMOkX8/YsG9k1LTTDVFoaSRtTl5eGpVdte', NULL, '2022-09-20 01:02:47', '2022-09-20 01:02:47'),
(2, 'Guru', 'guru1@gmail.com', 1, NULL, '$2y$10$Wum/TsJL/qbLMW9/43qM8uy8fys2Xml4/fhu9QjOdr1QRlmmi0iAK', NULL, '2022-09-20 02:41:13', '2022-09-20 02:41:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluasis`
--
ALTER TABLE `evaluasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluasi_id_rpp` (`id_rpp`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indikators`
--
ALTER TABLE `indikators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kompetensi_dasars`
--
ALTER TABLE `kompetensi_dasars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kompetensi_mapel` (`mataPelajaran`),
  ADD KEY `kompetensi_kelas` (`kelas`);

--
-- Indexes for table `kompetensi_inti`
--
ALTER TABLE `kompetensi_inti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `rpps`
--
ALTER TABLE `rpps`
  ADD PRIMARY KEY (`id_rpp`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluasis`
--
ALTER TABLE `evaluasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indikators`
--
ALTER TABLE `indikators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kompetensi_dasars`
--
ALTER TABLE `kompetensi_dasars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kompetensi_inti`
--
ALTER TABLE `kompetensi_inti`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rpps`
--
ALTER TABLE `rpps`
  MODIFY `id_rpp` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temas`
--
ALTER TABLE `temas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evaluasis`
--
ALTER TABLE `evaluasis`
  ADD CONSTRAINT `evaluasi_id_rpp` FOREIGN KEY (`id_rpp`) REFERENCES `rpps` (`id_rpp`);

--
-- Constraints for table `kompetensi_dasars`
--
ALTER TABLE `kompetensi_dasars`
  ADD CONSTRAINT `kompetensi_kelas` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `kompetensi_mapel` FOREIGN KEY (`mataPelajaran`) REFERENCES `mata_pelajarans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
