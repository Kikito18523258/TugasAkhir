-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 02:42 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `ide_baru` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `masalah` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `momen_spesial` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_rpp` bigint(20) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluasis`
--

INSERT INTO `evaluasis` (`id`, `ide_baru`, `masalah`, `momen_spesial`, `id_rpp`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ide Baru', 'Masalah', 'Momen Spesial', 9, 1, '2022-12-05 07:10:17', '2022-12-05 07:10:17');

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
(9, '3.1', 'Membandingkan cara perkembangbiakan tumbuhan dan hewan.', 2, '3.1.1 Mengetahui cara perkembangbiakan tumbuhan dengan tepat.\r\n3.1.2 Mengidentifikasi cara perkembangbiakan tumbuhan.', 6, '2022-11-09 17:00:00', '2022-12-03 06:35:56'),
(11, '3.1', 'Mengidentifikasi karakteristik geografis dan kehidupan sosial budaya, ekonomi, politik di wilayah ASEAN.', 3, '3.1.1 Menganalisis karakateristik geografis dan kehidupan sosial buadaya di wilayah ASEAN.\r\n3.1.2 Menjelaskan kehidupan sosial budaya dari dua negara ASEAN terkait kondisi geografisnya dengan benar.', 6, '2022-11-18 08:06:57', '2022-12-03 06:23:55'),
(13, '3.2', 'Menyimpulkan informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca.', 2, '3.2.1 Memahami informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca.', 6, '2022-11-18 08:13:17', '2022-12-03 05:38:56'),
(14, '3.2', 'Menggali isi teks penjelasan (eksplanasi) ilmiah yang didengar dan dibaca.', 1, '3.2.1 Menganalisis teks penjelasan (eksplanasi) ilmiah.\r\n3.2.2 Memahami isi teks penjelasan (eksplanasi) ilmiah yang didengar dan dibaca.', 6, '2022-12-01 18:29:02', '2022-12-01 18:34:53'),
(15, '3.3', 'Menggali isi teks pidato yang didengar dan dibaca.', 1, '3.3.1', 6, '2022-12-01 18:32:52', '2022-12-01 18:35:03'),
(16, '3.4', 'Menggali informasi penting dari buku sejarah menggunakan aspek: apa, di  mana, kapan, siapa, mengapa,  dan bagaimana.', 1, '3.4.1 Menganalisis informasi penting dari buku sejarah menggunakan aspek: apa, dimana, kapan, siapa, mengapa, dan bagaimana.\r\n3.4.2 Memahami penggunaan aspek apa, dimana, kapan, siapa, mengapa dan bagaimana pada peta pikiran.', 6, '2022-12-01 18:33:23', '2022-12-01 18:35:48'),
(17, '3.3', 'Menganalisis cara makhluk hidup menyesuaikan diri dengan lingkungan.', 2, '3.3.1 Mengetahui cara makhluk hidup menyesuaikan diri dengan lingkungan.\r\n3.3.2 Mengidentifikasi cara tumbuhan beradaptasi dan melindungi diri di lingkungannya.', 6, '2022-12-03 05:42:14', '2022-12-03 05:42:14'),
(18, '3.3', 'Menganalisis cara makhluk hidup menyesuaikan diri dengan lingkungan.', 2, '3.3.1 Mengetahui cara makhluk hidup menyesuaikan diri dengan lingkungan.\r\n3.3.2 Mengidentifikasi cara tumbuhan beradaptasi dan melindungi diri di lingkungannya.', 6, '2022-12-03 05:43:01', '2022-12-03 05:43:01'),
(19, '4.1', 'Menyajikan hasil identifikasi karakteristik geografis dan kehidupan sosial budaya,  ekonomi, dan politik di wilayah ASEAN.', 3, '4.1.1 Mendiskusikan perbedaan kehidupan sosial budaya, ekonomi, dan  politik dari negara di ASEAN .\r\n4.1.2 Menuliskan laporan tentang perbedaan kehidupan sosial budaya, ekonomi, dan politik dari dua negara terkait kondisi geografisnya dengan benar melalui diagram Venn.', 6, '2022-12-03 06:25:34', '2022-12-03 06:25:34'),
(20, '1.1', 'Bersyukur kepada Tuhan Yang Maha Esa atas nilai-nilai Pancasila secara utuh sebagai satu kesatuan dalam kehidupan sehari-hari.', 5, '1.1.7 Meyakini nilai- nilai Pancasila secara utuh sebagai satu kesatuan dalam kehidupan sehari- hari.', 6, '2022-12-03 06:28:25', '2022-12-03 06:28:25'),
(21, '2.1', 'Bersikap penuh tanggung jawab sesuai nilai-nilai Pancasila dalam kehidupan sehari-hari.', 5, '2.1 Bersikap penuh tanggung jawab sesuai nilai-nilai Pancasila dalam kehidupan sehari-hari.	 2.1.1.  bersikap tanggung jawab sesuai nilai- nilai Pancasila dalam kehidupan sehari- hari', 6, '2022-12-03 06:28:47', '2022-12-03 06:28:47'),
(22, '3.1', 'Menganalisis penerapan nilai-nilai Pancasila dalam kehdupan sehari-hari.', 5, '3.1.1 Mengetahui penerapan nilai- nilai Pancasila dalamkehidupam sehari-hari.\r\n3.1.2 Mengidentifikasi penerapan nilai- nilai Pancasila dalam kehidupan sehari-hari.', 6, '2022-12-03 06:29:30', '2022-12-03 06:29:30'),
(23, '4.1', 'Menyajikan hasil analisis pelaksanaan nilai-nilai Pancasila dalam kehidupan sehari-hari.', 5, '4.1.1 Melaporkan hasil analisis pelaksanaan nilai- nilai pancasila dalam kehidupan sehari-hari.\r\n4.1.2 Menuliskan hasil analisis tentang pelakasanaan nilai- nilai pancasila dalam kehidupan sehari-hari.', 6, '2022-12-03 06:30:15', '2022-12-03 06:30:15'),
(24, '3.1', 'Memahami reklame.', 6, '3.1.1 Mengidentifikasi ciri- ciri reklame (Brosur).\r\n3.1.2 Mengetahui perbedaan reklame dan bukan reklame.', 6, '2022-12-03 06:32:18', '2022-12-03 06:35:29'),
(25, '3.2', 'Memahami interval nada.', 6, '3.2.1 Mengetahui Macam- macam interval nada.\r\n3.2.2 Mengidentifikasi berbagai contoh interval nada.', 6, '2022-12-03 06:33:10', '2022-12-03 06:35:33'),
(26, '3.3', 'Memahami penampilan tari  kreasi daerah.', 6, '3.3.1 Mengetahui pola lantai berbagai tarian daerah.\r\n3.3.2 Menjelaskan macam- macam pola lantai pada tarian daerah.', 6, '2022-12-03 06:33:44', '2022-12-03 06:33:44'),
(27, '3.4', 'Memahami patung.', 6, '3.4.1 Memahami macam- macam patung nusantara.\r\n3.4.2 Mengetahui langkah- langkah pembuatan patung dengan benar.', 6, '2022-12-03 06:35:15', '2022-12-03 06:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi_inti`
--

CREATE TABLE `kompetensi_inti` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kompetensi_inti`
--

INSERT INTO `kompetensi_inti` (`id`, `judul`, `kelas`, `created_at`, `updated_at`) VALUES
(1, 'Menerima dan menjalankan ajaran agama yang dianutnya', 6, '2022-12-01 13:53:26', '2022-12-01 13:53:26'),
(3, 'Memiliki perilaku jujur, disiplin, tanggung jawab, santun, peduli, dan percaya diri dalam berinteraksi dengan keluarga, teman dan guru', 6, '2022-12-01 07:57:58', '2022-12-01 07:57:58'),
(4, 'Memahami pengetahuan faktual dengan cara mengamati (mendengar, melihat, membaca) dan menanya berdasarkan rasa ingin tahu tentang dirinya, makhluk ciptaan Tuhan dan kegiatannya, dan benda-benda yang dijumpainya di rumah, sekolah.', 6, '2022-12-01 07:58:28', '2022-12-01 07:58:28'),
(5, 'Menyajikan pengetahuan faktual dalam bahasa yang jelas dan logis dan sistematis, dalam karya yang estetis dalam gerakan yang mencerminkan anak sehat, dan dalam tindakan yang mencerminkan perilaku anak beriman dan berakhlak mulia', 6, '2022-12-01 08:00:05', '2022-12-01 08:00:05');

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
(4, 'Matematika', '-', NULL, NULL),
(5, 'PPKN', 'Pendidikan Kewarganegaraan', NULL, NULL),
(6, 'SBdP', 'Seni Budaya dan Prakarya', NULL, NULL);

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
(15, '2022_11_13_163357_create_evaluasi_table', 9),
(16, '2022_12_02_015526_create_subtemas_table', 10),
(18, '2022_12_05_135130_create_evaluasis_table', 11);

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
  `muatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
(9, 'SD Negeri 1 Sruweng', '1', '1', '2020/2021', '1', '1', 1, 1, 5, '[\"1\"]', '{\"1\":[\"3.2 Menggali isi teks penjelasan (eksplanasi) ilmiah yang didengar dan dibaca.\",\"3.3 Menggali isi teks pidato yang didengar dan dibaca.\"]}', 'dummy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 15, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 120, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 15, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.\r\n\r\nWhere can I get some?\r\nThere are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2022-11-29 00:52:43', '2022-12-04 07:59:48'),
(10, 'SD Negeri 1 Sruweng', '6', '1', '2022/2023', '1', '1', 3, 1, 1, '[\"1\",\"2\",\"3\"]', '{\"1\":[\"3.2 Menyimpulkan informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca.\",\"3.3 Menyimpulkan informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca.\"],\"2\":[\"3.2 Menyimpulkan informasi berdasarkan teks laporan hasil pengamatan yang didengar dan dibaca.\"],\"3\":[\"as asas\"]}', 'asasas', 'ADAFA', 'nope', 'FAFASFA', 'FAWEAFAFA', 15, 'VSDVS', 120, 'FQWFQWFQ', 120, 'AFAWFA', 'AFWFAW', 'SDGSG', '2022-12-01 06:09:55', '2022-12-01 06:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `subtemas`
--

CREATE TABLE `subtemas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_tema` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subtemas`
--

INSERT INTO `subtemas` (`id`, `judul`, `id_tema`, `created_at`, `updated_at`) VALUES
(1, 'Tumbuhan Sahabatku (Sub Tema 1)', 1, NULL, NULL),
(2, 'Hewan Sahabatku (Sub Tema 2)', 1, NULL, NULL),
(3, 'Ayo, Selamatkan Hewan dan Tumbuhan (Sub Tema 3)', 1, NULL, NULL),
(4, 'Kegiatan Pembiasaan Literasi (Sub Tema 4)', 1, NULL, NULL),
(5, 'Rukun dalam Perbedaan (Sub Tema 1)', 2, NULL, NULL),
(6, 'Bekerja Sama Mencapai Tujuan (Sub Tema 2)', 2, NULL, NULL),
(7, 'Bersatu Kita Teguh (Sub Tema 3)', 2, NULL, NULL),
(8, 'Kegiatan Pembiasan Literasi (Sub Tema 4)', 2, NULL, NULL),
(9, 'Penemu yang Mengubah  Dunia (Sub Tema 1)', 3, NULL, NULL),
(10, 'Penemuan dan Manfaatnya (Sub Tema 2)', 3, NULL, NULL),
(11, 'Ayo, Menjadi Penemu (Sub Tema 3)', 3, NULL, NULL),
(12, 'Kegiatan Pembiasan Literasi (Sub Tema 4)', 3, NULL, NULL),
(13, 'Globalisasi di Sekitarku (Sub Tema 1)', 4, NULL, NULL),
(14, 'Globalisasi dan Manfaatnya (Sub Tema 2)', 4, NULL, NULL),
(15, 'Globalisasi dan Cinta Tanah Air (Sub Tema 3)', 4, NULL, NULL),
(16, 'Kegiatan Pembiasan Literasi (Sub Tema 4)', 4, NULL, NULL),
(17, 'Kerja Keras Berbuah Kesuksesan (Sub Tema 1)', 5, NULL, NULL),
(18, 'Usaha Di Sekitarku (Sub Tema 2)', 5, NULL, NULL),
(19, 'Ayo, Belajar Berwirausaha (Sub Tema 3)', 5, NULL, NULL),
(20, 'Kegiatan Pembiasan Literasi (Sub Tema 4)', 5, NULL, NULL);

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

--
-- Dumping data for table `temas`
--

INSERT INTO `temas` (`id`, `judul_tema`, `created_at`, `updated_at`) VALUES
(1, 'Tema 1 : Selamatkan Makhluk Hidup', NULL, NULL),
(2, 'Tema 2 : Persatuan Dalam Perbedaan', NULL, NULL),
(3, 'Tema 3 : Tokoh & Penemuan', NULL, NULL),
(4, 'Tema 4 : Globalisasi', NULL, NULL),
(5, 'Tema 5 : Wirausaha', NULL, NULL),
(6, 'Tema 6 : Menuju Masyarakat Sejahtera', NULL, NULL),
(7, 'Tema 7 : Kepemimpinan', NULL, NULL),
(8, 'Tema 8 : Bumiku', NULL, NULL),
(9, 'Tema 9 : Menjelajah Angkasa Luar', NULL, NULL);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `subtemas`
--
ALTER TABLE `subtemas`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kompetensi_inti`
--
ALTER TABLE `kompetensi_inti`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mata_pelajarans`
--
ALTER TABLE `mata_pelajarans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rpps`
--
ALTER TABLE `rpps`
  MODIFY `id_rpp` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subtemas`
--
ALTER TABLE `subtemas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `temas`
--
ALTER TABLE `temas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

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
