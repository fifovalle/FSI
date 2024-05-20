-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 01:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unjani`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_Admin` int(11) NOT NULL,
  `Nama_Admin` varchar(100) NOT NULL,
  `Foto_Admin` longblob NOT NULL,
  `Email_Admin` varchar(100) NOT NULL,
  `Jenis_Kelamin_Admin` enum('Pria','Wanita') NOT NULL,
  `Status_Verifikasi_Email` enum('Terverifikasi','Belum Terverifikasi') NOT NULL,
  `Kata_Sandi` varchar(100) NOT NULL,
  `Konfirmasi_Kata_Sandi` varchar(100) NOT NULL,
  `Token_Verifikasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_Admin`, `Nama_Admin`, `Foto_Admin`, `Email_Admin`, `Jenis_Kelamin_Admin`, `Status_Verifikasi_Email`, `Kata_Sandi`, `Konfirmasi_Kata_Sandi`, `Token_Verifikasi`) VALUES
(50, 'Naufal FIFA', 0x363634333434646235386538612e6a7067, 'fifanaufal10@gmail.com', 'Pria', 'Terverifikasi', '$2y$10$LpzqSn3dpJdfe5BQHFvome10JGcdmN1ta24YcKBLt/qW4tExunjXK', '$2y$10$LpzqSn3dpJdfe5BQHFvome10JGcdmN1ta24YcKBLt/qW4tExunjXK', 0);

-- --------------------------------------------------------

--
-- Table structure for table `agenda`
--

CREATE TABLE `agenda` (
  `ID_Agenda` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Gambar_Agenda` longblob NOT NULL,
  `Judul_Agenda` varchar(225) NOT NULL,
  `Isi_Agenda` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE `beasiswa` (
  `ID_Beasiswa` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Gambar` longblob NOT NULL,
  `Nama_Penerima` varchar(225) NOT NULL,
  `Nama_Beasiswa` varchar(225) NOT NULL,
  `Durasi_Beasiswa` varchar(225) DEFAULT NULL,
  `Link_Instagram` varchar(225) NOT NULL,
  `Link_Website` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`ID_Beasiswa`, `ID_Admin`, `Gambar`, `Nama_Penerima`, `Nama_Beasiswa`, `Durasi_Beasiswa`, `Link_Instagram`, `Link_Website`) VALUES
(3, 50, 0x363634613961313963383833372e6a7067, 'Yolanda Charmenia Nadine Yusrin', 'Beasiswa Jabar Future Leaders Scholarship (JFLS)', 'Beasiswa Percepatan Akses Pendidikan Tinggi (1 Tahun)', 'https://www.instagram.com/p/Cw3xOpQPcHy/?utm_source=ig_web_copy_link&amp;igshid=MzRlODBiNWFlZA%3D%3D', 'https://beasiswa-jfl.jabarprov.go.id/'),
(4, 50, 0x363634613961353639396662662e6a7067, 'Dara Santika Putri Banaranto', 'Beasiswa Djarum Plus', NULL, 'https://www.instagram.com/p/CwxZdOhvGgz/?utm_source=ig_web_copy_link&amp;igshid=MzRlODBiNWFlZA%3D%3D', 'https://djarumbeasiswaplus.org/');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `ID_Berita` int(11) NOT NULL,
  `ID_Admin` int(11) DEFAULT NULL,
  `Gambar` longblob NOT NULL,
  `Judul` varchar(255) NOT NULL,
  `Isi_Berita` text NOT NULL,
  `Tanggal_Terbit` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`ID_Berita`, `ID_Admin`, `Gambar`, `Judul`, `Isi_Berita`, `Tanggal_Terbit`) VALUES
(12, 50, 0x363634396632343531656133612e706e67, 'ADA YANG BARU', 'AAAA', '2024-05-17');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `ID_Carousel` int(11) NOT NULL,
  `ID_Admin` int(11) DEFAULT NULL,
  `Judul` varchar(100) DEFAULT NULL,
  `Deskripsi` text DEFAULT NULL,
  `Gambar` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`ID_Carousel`, `ID_Admin`, `Judul`, `Deskripsi`, `Gambar`) VALUES
(27, 50, 'A', 'A', 0x363634396633323339333232322e6a7067),
(28, 50, 'B', 'B', 0x36363439663334633062623230322e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `kalender_akademik`
--

CREATE TABLE `kalender_akademik` (
  `ID_Akademik` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Gambar` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelulusan`
--

CREATE TABLE `kelulusan` (
  `ID_Kelulusan` int(11) NOT NULL,
  `ID_Prodi` int(11) NOT NULL,
  `Tahun_Kelulusan` year(4) NOT NULL,
  `Jumlah_lulus` int(11) NOT NULL,
  `Tingkat_Kelulusan` enum('S1','S2','S3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `ID_Navbar` int(11) NOT NULL,
  `ID_Admin` int(11) DEFAULT NULL,
  `Daftar_Nama` varchar(100) NOT NULL,
  `Tautan` varchar(255) NOT NULL,
  `Kategori` enum('Profil','SDM','Akademik','Fasilitas','Penjaminan Mutu') NOT NULL,
  `Sub_Kategori` enum('Survey','Dokumen Akademik') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`ID_Navbar`, `ID_Admin`, `Daftar_Nama`, `Tautan`, `Kategori`, `Sub_Kategori`) VALUES
(53, 50, 'Tentang Fakultas', 'http://localhost/UNJANI/src/pages/tentang-fakultas.php', 'Profil', NULL),
(54, 50, 'Visi &amp; Misi', 'http://localhost/UNJANI/src/pages/visi-misi.php', 'Profil', NULL),
(55, 50, 'Pimpinan', 'http://localhost/UNJANI/src/pages/pimpinan.php', 'Profil', NULL),
(56, 50, 'Struktur Organisasi', 'http://localhost/UNJANI/src/pages/struktur-organisasi.php', 'Profil', NULL),
(57, 50, 'Kerjasama', 'https://linktr.ee/KerjaSamaFSI', 'Profil', NULL),
(59, 50, 'Survey', 'http://localhost/UNJANI/src/pages/survey.php', 'Profil', 'Survey'),
(60, 50, 'Hasil Survey', 'http://localhost/UNJANI/src/pages/hasil-survey.php', 'Profil', 'Survey'),
(61, 50, 'Tenaga Pendidik/Dosen', 'http://localhost/UNJANI/src/pages/tenaga-dosen.php', 'SDM', NULL),
(62, 50, 'Tenaga Kependidikan', 'http://localhost/UNJANI/src/pages/tenaga-staff.php', 'SDM', NULL),
(63, 50, 'Kimia', 'https://kimia.unjani.ac.id/', 'Akademik', NULL),
(64, 50, 'Informatika', 'https://if.unjani.ac.id/', 'Akademik', NULL),
(65, 50, 'Sistem Informasi', 'https://si.unjani.ac.id/', 'Akademik', NULL),
(66, 50, 'Magister Kimia', 'https://magister.kimia.unjani.ac.id/', 'Akademik', NULL),
(67, 50, 'Jurnal Kartika (Kimia)', 'https://jkk.unjani.ac.id/index.php/jkk', 'Akademik', 'Dokumen Akademik'),
(68, 50, 'Jumanji (Informatika)', 'https://jumanji.unjani.ac.id/index.php/jumanji', 'Akademik', 'Dokumen Akademik'),
(69, 50, 'Kalender Akademik', 'http://localhost/UNJANI/src/pages/kalender-akademik.php', 'Akademik', 'Dokumen Akademik'),
(70, 50, 'Buku Aturan Akademik', 'http://localhost/UNJANI/src/pages/buku-pedoman.php', 'Akademik', 'Dokumen Akademik'),
(71, 50, 'Ruang Kelas', 'http://localhost/UNJANI/src/pages/ruang-kelas.php', 'Fasilitas', NULL),
(72, 50, 'Laboratorium', 'http://localhost/UNJANI/src/pages/laboratorium.php', 'Fasilitas', NULL),
(73, 50, 'Fasilitas Umum', 'http://localhost/UNJANI/src/pages/fasil-umum.php', 'Fasilitas', NULL),
(74, 50, 'Penjamin Mutu Internal', '	http://localhost/UNJANI/src/pages/akreditasi-internal.php', 'Penjaminan Mutu', NULL),
(75, 50, 'Penjamin Mutu Eksternal', 'http://localhost/UNJANI/src/pages/akreditasi.php', 'Penjaminan Mutu', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penelitian_if`
--

CREATE TABLE `penelitian_if` (
  `ID_Penelitian_If` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Judul_Penelitian` varchar(225) NOT NULL,
  `Link_Penelitian` varchar(225) NOT NULL,
  `Tingkatan` varchar(50) NOT NULL,
  `Judul_Jurnal` varchar(100) NOT NULL,
  `Link_Jurnal` varchar(225) NOT NULL,
  `Pencipta` varchar(50) NOT NULL,
  `Tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penelitian_if`
--

INSERT INTO `penelitian_if` (`ID_Penelitian_If`, `ID_Admin`, `Judul_Penelitian`, `Link_Penelitian`, `Tingkatan`, `Judul_Jurnal`, `Link_Jurnal`, `Pencipta`, `Tahun`) VALUES
(4, 50, 'Clothing type classification using convolutional neural networks', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Putri R.G.A', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `penelitian_kimia`
--

CREATE TABLE `penelitian_kimia` (
  `ID_Penelitian_Kimia` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Judul_Penelitian` varchar(255) NOT NULL,
  `Tautan_Penelitian` varchar(100) NOT NULL,
  `Tingkatan` varchar(50) NOT NULL,
  `Judul_Jurnal` varchar(100) NOT NULL,
  `Tautan_Jurnal` varchar(100) NOT NULL,
  `Pencipta` varchar(50) NOT NULL,
  `Tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penelitian_kimia`
--

INSERT INTO `penelitian_kimia` (`ID_Penelitian_Kimia`, `ID_Admin`, `Judul_Penelitian`, `Tautan_Penelitian`, `Tingkatan`, `Judul_Jurnal`, `Tautan_Jurnal`, `Pencipta`, `Tahun`) VALUES
(6, 50, 'Performance and economic evaluation of a pilot scale embedded ends-free membrane bioreactor (EEF-MBR)', 'https://www.scopus.com/home.uri', 'Q1 Journal', 'Applied Microbiology and Biotechnology', 'https://www.scopus.com/sourceid/14957', 'Siagian U.W.R', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `penelitian_magister_kimia`
--

CREATE TABLE `penelitian_magister_kimia` (
  `ID_Penelitian_Magister_Kimia` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Judul_Penelitian` varchar(255) NOT NULL,
  `Tautan_Penelitian` varchar(100) NOT NULL,
  `Tingkatan` varchar(50) NOT NULL,
  `Judul_Journal` varchar(100) NOT NULL,
  `Tautan_Journal` varchar(100) NOT NULL,
  `Pencipta` varchar(50) NOT NULL,
  `Tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penelitian_magister_kimia`
--

INSERT INTO `penelitian_magister_kimia` (`ID_Penelitian_Magister_Kimia`, `ID_Admin`, `Judul_Penelitian`, `Tautan_Penelitian`, `Tingkatan`, `Judul_Journal`, `Tautan_Journal`, `Pencipta`, `Tahun`) VALUES
(3, 50, 'Synthesis and Characterization of Fe-Doped CaTiO3 Polyhedra Prepared by Molten NaCl Salt', 'https://www.scopus.com/home.uri', 'Q2 Journal', 'Science and Technology Indonesia', 'https://www.scopus.com/sourceid/21101040666', 'Novianti D.R', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `penelitian_sistem_informasi`
--

CREATE TABLE `penelitian_sistem_informasi` (
  `ID_Sistem_Informasi` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Judul_Penelitian` varchar(255) NOT NULL,
  `Tautan_Penelitian` varchar(100) NOT NULL,
  `Tingkatan` varchar(50) NOT NULL,
  `Judul_Jurnal` varchar(100) NOT NULL,
  `Tautan_Jurnal` varchar(100) NOT NULL,
  `Pencipta` varchar(50) NOT NULL,
  `Tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengabdian_masyarakat`
--

CREATE TABLE `pengabdian_masyarakat` (
  `ID_Pengabdian` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Judul_Pengabdian` varchar(255) NOT NULL,
  `Tautan_Pengabdian` varchar(100) NOT NULL,
  `Leader` varchar(50) NOT NULL,
  `Event` varchar(100) NOT NULL,
  `Personil` varchar(50) NOT NULL,
  `Tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `ID_Pengumuman` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Foto_Pengumuman` longblob NOT NULL,
  `Judul_Pengumuman` varchar(225) NOT NULL,
  `Isi_Pengumuman` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `ID_Prestasi` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Gambar` longblob NOT NULL,
  `Nama_Mahasiswa` varchar(225) NOT NULL,
  `Kegiatan` varchar(225) NOT NULL,
  `Pencapaian` varchar(225) NOT NULL,
  `Tahun_Pencapaian` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`ID_Prestasi`, `ID_Admin`, `Gambar`, `Nama_Mahasiswa`, `Kegiatan`, `Pencapaian`, `Tahun_Pencapaian`) VALUES
(5, 50, 0x363634613938373434373334642e6a7067, 'Rifaz Muhammad Sukma', 'Capstone Project Bangkit 2023', 'Juara 2', '2023'),
(6, 50, 0x363634613938393666313932362e6a7067, 'Rifaz Muhammad Sukma Annisa Mufidah Sopia Saepurizal', 'Konferensi Perpustakaan Digital Indonesia Ke-13', 'Juara 1', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `produk_inovatif`
--

CREATE TABLE `produk_inovatif` (
  `ID_Produk` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Judul_Inovasi` varchar(255) NOT NULL,
  `Tautan_Inovasi` varchar(100) NOT NULL,
  `Leader` varchar(50) NOT NULL,
  `Event` varchar(50) NOT NULL,
  `Personil` varchar(50) NOT NULL,
  `Tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk_inovatif`
--

INSERT INTO `produk_inovatif` (`ID_Produk`, `ID_Admin`, `Judul_Inovasi`, `Tautan_Inovasi`, `Leader`, `Event`, `Personil`, `Tahun`) VALUES
(3, 50, 'Standardisasi, Uji Pra Klinik dan Toksisitas Kumis Kucing (Orthosiphon Aristatus (Blume) Miq.) Varietas Ungu Sebagai Dasar Pengembangan Obat Herbal Antihipertensi', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=services#!', 'Fahrauk Faramayuda', 'PENELITIAN DESENTRALISASI (PDUPT)', 'Soraya Riyanti; Suryani', '2024');

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `ID_Prodi` int(11) NOT NULL,
  `ID_Admin` int(11) DEFAULT NULL,
  `Nama_Prodi` varchar(100) DEFAULT NULL,
  `Gambar_Prodi` longblob NOT NULL,
  `Tautan_Prodi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_dosen`
--

CREATE TABLE `tenaga_dosen` (
  `ID_Dosen` int(11) NOT NULL,
  `NIP_NID_Dosen` int(11) NOT NULL,
  `Nama_Dosen` varchar(225) NOT NULL,
  `Jabatan_Dosen` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenaga_dosen`
--

INSERT INTO `tenaga_dosen` (`ID_Dosen`, `NIP_NID_Dosen`, `Nama_Dosen`, `Jabatan_Dosen`) VALUES
(5, 412126469, 'Dr. Yenny Febriani Yun, S.Si., M.Si.', 'Dosen Kimia'),
(6, 412139370, 'Hernandi Sujono, S.Si., M.Si.', 'Dosen Kimia'),
(7, 412143169, 'Dr. Lilis Siti Aisyah, S.Si., M.Si.', 'Dosen Kimia'),
(8, 412152772, 'Dewi Meliati Agustini, S.Si., M.Si.', 'Dosen Kimia'),
(9, 412157080, 'Dr. Rahmaniar Mulyani, S.Si., M.Si.', 'Dosen Kimia'),
(10, 412177782, 'Abdi Wadud Syafe\'i, S.Si., M.Si.', 'Dosen Kimia'),
(11, 412179681, 'Dr. Anggi Suprabawati, S.Si., M.Si.', 'Dosen Kimia'),
(12, 412187688, 'Sari Purbaya, S.Si., M.Si.', 'Dosen Kimia'),
(13, 412146459, 'Dra. Ade Kanianingsih, M. Stat.', 'Dosen Kimia'),
(14, 412187064, 'Dr. Trisna Yuliana, M.Si.', 'Dosen Kimia'),
(17, 412126369, 'Dr. Anceu Murniati, S.Si., M.Si.', 'Dosen Magister Kimia'),
(18, 412185787, 'Dr. Arie Hardian, S.Si., M.Si.', 'Dosen Magister Kimia'),
(19, 412141964, 'Dr. Drs. Jasmansyah, M.Si.', 'Dosen Magister Kimia'),
(20, 412114059, 'Dr. Drs. Senadi Budiman, M.Si.', 'Dosen Magister Kimia'),
(21, 412128864, 'Dr. Dra. Valentina Adimurti K., M.Si.', 'Dosen Magister Kimia'),
(22, 412176273, 'Wina Witanti, S.T., M.T.', 'Dosen Informatika'),
(23, 412175878, 'Agus Komarudin, S.Kom., M.T.', 'Dosen Informatika'),
(24, 412180078, 'Asep Id Hadiana, S.Si., M.Kom.', 'Dosen Informatika'),
(25, 412198688, 'Herdi Ashaury, S.Kom., M.T.', 'Dosen Informatika'),
(26, 412110561, 'Dr. Drs. Eddie Krishna Putra, M.T.', 'Dosen Informatika'),
(27, 412127670, 'Dr. Esmeralda C. Djamal, S.T., M.T.', 'Dosen Informatika'),
(28, 412157175, 'Gunawan Abdillah, S.Si., M.Cs.', 'Dosen Informatika'),
(29, 412166863, 'Yulison Herry Chrisnanto, S.T., M.T.', 'Dosen Informatika'),
(30, 412174182, 'Rezki Yuniarti, S.Si., M.T.', 'Dosen Informatika'),
(31, 412185888, 'Fajri Rakhmat Umbara, S.T., M.T.', 'Dosen Informatika'),
(32, 412190585, 'Puspita Nurul Sabrina, S.Kom., M.T.', 'Dosen Informatika'),
(33, 412182990, 'Ridwan Ilyas, S.Kom., M.T.', 'Dosen Informatika'),
(34, 412100879, 'Melina, S.Si., M.Si.', 'Dosen Informatika'),
(35, 412100992, 'Fatan Kasyidi, S.Kom., M.T.', 'Dosen Informatika'),
(36, 412105388, 'Edvin Ramadhan, S.Kom., M.T.', 'Dosen Informatika'),
(37, 412103969, 'Sigit Anggoro, S.T., M.T.', 'Dosen Sistem Informasi'),
(38, 412166969, 'Tacbir Hendro Pudjiantoro, S.Si., M.T.', 'Dosen Sistem Informasi'),
(39, 412196490, 'Irma Santikarama, S.Kom., M.T.', 'Dosen Sistem Informasi'),
(40, 412167079, 'Faiza Renaldi, S.T., M.Sc.', 'Dosen Sistem Informasi'),
(41, 412112596, 'Dea Destiani, S.Kom., M.Kom.', 'Dosen Sistem Informasi');

-- --------------------------------------------------------

--
-- Table structure for table `tenaga_staff`
--

CREATE TABLE `tenaga_staff` (
  `ID_Staff` int(11) NOT NULL,
  `NIP_NID_Staff` int(11) NOT NULL,
  `Nama_Staff` varchar(225) NOT NULL,
  `Jabatan_Staff` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenaga_staff`
--

INSERT INTO `tenaga_staff` (`ID_Staff`, `NIP_NID_Staff`, `Nama_Staff`, `Jabatan_Staff`) VALUES
(4, 200026072, 'Juhana, S.E.', 'Ka. Bag. Tata Usaha'),
(5, 200028572, 'Dani Risnandar SM., S.Sos.', 'Kaur. Rumga'),
(6, 199419970, 'Peryatna, S.Pd.', 'Kaur. Perpustakaan'),
(7, 200232376, 'Hermawan', 'Ka. Ur. Umum Fakultas'),
(8, 199213366, 'Yulia Puspita', 'Kaur. Akademik'),
(9, 199315665, 'Suroso', 'Ka. Ur. Kemahasiswaan'),
(10, 199008672, 'Roni Nuroni', 'Ka. Ur. Umum Prodi Kimia'),
(11, 201742282, 'Yayan Sopian', 'Ang. Rumga'),
(12, 199417372, 'Muhidin', 'Pengemudi'),
(13, 202004394, 'Ridwan Setiadi, S.Kom.', 'Ang. Akademik Prodi Sistem Informasi'),
(14, 201800975, 'Rahmansyah', 'Pengemudi'),
(15, 201944188, 'Vita Natalia P.', 'Kaur. Keuangan'),
(16, 202001396, 'Siti Rahma Irma Novalina, S.H.', 'Ang. Kemahasiswaan'),
(18, 0, 'Jalaludin', 'Ang. Rumga'),
(19, 202303696, 'Indriani Febrishaummy G., S.Si.', 'Ang. Umum Magister Kimia'),
(20, 0, 'Agus Suhana', 'Ang. Rumga'),
(21, 0, 'Hadi Jaya', 'Ang. Rumga'),
(22, 0, 'Marwan', 'Ang. Rumga'),
(23, 202303996, 'Vandariena Yoenita, S.Mat', 'Ang. Umum Prodi Sistem Informasi'),
(24, 202330293, 'Roby Bayu Maulana, S.ST.', 'Ang. Akademik Fakultas'),
(25, 200334470, 'Aam Muharam, S.Si', 'Ka. Sub. Bag Informatika'),
(26, 199110866, 'Yayat Hidayat', 'Kaur. Akademik'),
(27, 199111268, 'Putut Widiharto', 'Ang. Umum Informatika'),
(28, 201801081, 'Ari Saptari', 'Ang. Rumga'),
(29, 201600682, 'Asep Saepudin, S.Kom', 'Ang. Laboran Informatika'),
(30, 202004590, 'Priastu Kresna Murti, S.Kom.', 'Ang. Akademik'),
(31, 202001491, 'Ela Yulianti, S.Kom.', 'Ang. Umum'),
(32, 202303796, 'Dena Nur Ardiansyah, A.Md.', 'Ang. Laboran Informatika'),
(34, 201438270, 'Jaya Rudiantoro, S.Si', 'Ka. Sub. Bag Kimia'),
(35, 202004496, 'Issana Pramordha W. S.Si.', 'Ang. Akademik Kimia'),
(36, 200334673, 'Rosad', 'Teknisi Lab.'),
(37, 199214267, 'Suhandi', 'Kaur. Akademik Kimia'),
(38, 199315168, 'Kasno', 'Ang. Umum Kimia'),
(39, 0, 'Tia Setiawan', 'Ang. Rumga'),
(40, 0, 'Jumara', 'Ang. Rumga'),
(41, 202304797, 'Budi Saputra, S.Si.', 'Laboran Lab. Kimia'),
(42, 202304396, 'Restu Much. Ibrahim, S.Si.', 'Laboran Lab. Kimia'),
(43, 202303996, 'Sopi Widianingsih, S.Si.', 'Ang. Akademik Magister Kimia');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `ID_Testimoni` int(11) NOT NULL,
  `ID_Admin` int(11) DEFAULT NULL,
  `Foto_Mahasiswa` longblob NOT NULL,
  `Nama_Mahasiswa` varchar(100) NOT NULL,
  `Kesan_Mahasiswa` text NOT NULL,
  `Tanggal_Testimoni` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`ID_Testimoni`, `ID_Admin`, `Foto_Mahasiswa`, `Nama_Mahasiswa`, `Kesan_Mahasiswa`, `Tanggal_Testimoni`) VALUES
(32, 50, 0x6d61686173697377615f363634353763393430333666362e6a7067, 'Naufal', 'FSI KEREN', '2024-05-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`ID_Agenda`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`ID_Beasiswa`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`ID_Berita`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`ID_Carousel`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  ADD PRIMARY KEY (`ID_Akademik`),
  ADD UNIQUE KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `kelulusan`
--
ALTER TABLE `kelulusan`
  ADD PRIMARY KEY (`ID_Kelulusan`),
  ADD KEY `ID_Prodi` (`ID_Prodi`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`ID_Navbar`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `penelitian_if`
--
ALTER TABLE `penelitian_if`
  ADD PRIMARY KEY (`ID_Penelitian_If`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `penelitian_kimia`
--
ALTER TABLE `penelitian_kimia`
  ADD PRIMARY KEY (`ID_Penelitian_Kimia`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `penelitian_magister_kimia`
--
ALTER TABLE `penelitian_magister_kimia`
  ADD PRIMARY KEY (`ID_Penelitian_Magister_Kimia`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `penelitian_sistem_informasi`
--
ALTER TABLE `penelitian_sistem_informasi`
  ADD PRIMARY KEY (`ID_Sistem_Informasi`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `pengabdian_masyarakat`
--
ALTER TABLE `pengabdian_masyarakat`
  ADD PRIMARY KEY (`ID_Pengabdian`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`ID_Pengumuman`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`ID_Prestasi`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `produk_inovatif`
--
ALTER TABLE `produk_inovatif`
  ADD PRIMARY KEY (`ID_Produk`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`ID_Prodi`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `tenaga_dosen`
--
ALTER TABLE `tenaga_dosen`
  ADD PRIMARY KEY (`ID_Dosen`);

--
-- Indexes for table `tenaga_staff`
--
ALTER TABLE `tenaga_staff`
  ADD PRIMARY KEY (`ID_Staff`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`ID_Testimoni`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `ID_Agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `ID_Beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `ID_Berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `ID_Carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  MODIFY `ID_Akademik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelulusan`
--
ALTER TABLE `kelulusan`
  MODIFY `ID_Kelulusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `ID_Navbar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `penelitian_if`
--
ALTER TABLE `penelitian_if`
  MODIFY `ID_Penelitian_If` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penelitian_kimia`
--
ALTER TABLE `penelitian_kimia`
  MODIFY `ID_Penelitian_Kimia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penelitian_magister_kimia`
--
ALTER TABLE `penelitian_magister_kimia`
  MODIFY `ID_Penelitian_Magister_Kimia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penelitian_sistem_informasi`
--
ALTER TABLE `penelitian_sistem_informasi`
  MODIFY `ID_Sistem_Informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengabdian_masyarakat`
--
ALTER TABLE `pengabdian_masyarakat`
  MODIFY `ID_Pengabdian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `ID_Pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `ID_Prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `produk_inovatif`
--
ALTER TABLE `produk_inovatif`
  MODIFY `ID_Produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `ID_Prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tenaga_dosen`
--
ALTER TABLE `tenaga_dosen`
  MODIFY `ID_Dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tenaga_staff`
--
ALTER TABLE `tenaga_staff`
  MODIFY `ID_Staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `ID_Testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD CONSTRAINT `beasiswa_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carousel`
--
ALTER TABLE `carousel`
  ADD CONSTRAINT `carousel_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelulusan`
--
ALTER TABLE `kelulusan`
  ADD CONSTRAINT `kelulusan_ibfk_1` FOREIGN KEY (`ID_Prodi`) REFERENCES `program_studi` (`ID_Prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `navbar`
--
ALTER TABLE `navbar`
  ADD CONSTRAINT `navbar_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penelitian_if`
--
ALTER TABLE `penelitian_if`
  ADD CONSTRAINT `penelitian_if_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penelitian_kimia`
--
ALTER TABLE `penelitian_kimia`
  ADD CONSTRAINT `penelitian_kimia_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penelitian_magister_kimia`
--
ALTER TABLE `penelitian_magister_kimia`
  ADD CONSTRAINT `penelitian_magister_kimia_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penelitian_sistem_informasi`
--
ALTER TABLE `penelitian_sistem_informasi`
  ADD CONSTRAINT `penelitian_sistem_informasi_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengabdian_masyarakat`
--
ALTER TABLE `pengabdian_masyarakat`
  ADD CONSTRAINT `pengabdian_masyarakat_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk_inovatif`
--
ALTER TABLE `produk_inovatif`
  ADD CONSTRAINT `produk_inovatif_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD CONSTRAINT `program_studi_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
