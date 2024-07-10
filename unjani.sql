-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jul 2024 pada 16.33
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

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
-- Struktur dari tabel `admin`
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_Admin`, `Nama_Admin`, `Foto_Admin`, `Email_Admin`, `Jenis_Kelamin_Admin`, `Status_Verifikasi_Email`, `Kata_Sandi`, `Konfirmasi_Kata_Sandi`, `Token_Verifikasi`) VALUES
(50, 'Naufal FIFA', 0x363634333434646235386538612e6a7067, 'fifanaufal10@gmail.com', 'Pria', 'Terverifikasi', '$2y$10$LpzqSn3dpJdfe5BQHFvome10JGcdmN1ta24YcKBLt/qW4tExunjXK', '$2y$10$LpzqSn3dpJdfe5BQHFvome10JGcdmN1ta24YcKBLt/qW4tExunjXK', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `ID_Agenda` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Gambar_Agenda` longblob NOT NULL,
  `Judul_Agenda` varchar(225) NOT NULL,
  `Isi_Agenda` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`ID_Agenda`, `ID_Admin`, `Gambar_Agenda`, `Judul_Agenda`, `Isi_Agenda`) VALUES
(9, 50, 0x6167656e64615f363638336333313761326430622e706e67, 'Selamat dan Sukses', 'Selamat dan Sukses atas diraihnya Pendanaan Program Kreativitas Mahasiswa (PKM) Kemendikbudristekdikti Tahun 2024	');

-- --------------------------------------------------------

--
-- Struktur dari tabel `beasiswa`
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
-- Dumping data untuk tabel `beasiswa`
--

INSERT INTO `beasiswa` (`ID_Beasiswa`, `ID_Admin`, `Gambar`, `Nama_Penerima`, `Nama_Beasiswa`, `Durasi_Beasiswa`, `Link_Instagram`, `Link_Website`) VALUES
(3, 50, 0x363634613961313963383833372e6a7067, 'Yolanda Charmenia Nadine Yusrin', 'Beasiswa Jabar Future Leaders Scholarship (JFLS)', 'Beasiswa Percepatan Akses Pendidikan Tinggi (1 Tahun)', 'https://www.instagram.com/p/Cw3xOpQPcHy/?utm_source=ig_web_copy_link&amp;igshid=MzRlODBiNWFlZA%3D%3D', 'https://beasiswa-jfl.jabarprov.go.id/'),
(4, 50, 0x363634613961353639396662662e6a7067, 'Dara Santika Putri Banaranto', 'Beasiswa Djarum Plus', NULL, 'https://www.instagram.com/p/CwxZdOhvGgz/?utm_source=ig_web_copy_link&amp;igshid=MzRlODBiNWFlZA%3D%3D', 'https://djarumbeasiswaplus.org/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
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
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`ID_Berita`, `ID_Admin`, `Gambar`, `Judul`, `Isi_Berita`, `Tanggal_Terbit`) VALUES
(12, 50, 0x363638336365353830343664352e6a706567, 'Tim Kimia FSI Unjani menjadi Juara Favorit di PIMNAS ke-34, USU, Medan', 'Selamat kepada Natasha, Aryza, dan Lutfia serta Bu Yenny selaku pembimbing yang telah membawa nama harum Universitas Jenderal Achmad Yani (Unjani) umumnya dan Jurusan Kimia FSI Unjani khususnya. Semoga pencapaian ini dapat memberikan atmosfer semangat dalam berkompetisi khususnya kompetisi berbasis riset/ penelitian kepada seluruh sivitas akademik Kimia FSI Unjani terutama bagi mahasiswa aktif.', '2021-11-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `carousel`
--

CREATE TABLE `carousel` (
  `ID_Carousel` int(11) NOT NULL,
  `ID_Admin` int(11) DEFAULT NULL,
  `Judul` varchar(100) DEFAULT NULL,
  `Deskripsi` text DEFAULT NULL,
  `Gambar` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `carousel`
--

INSERT INTO `carousel` (`ID_Carousel`, `ID_Admin`, `Judul`, `Deskripsi`, `Gambar`) VALUES
(27, 50, 'Fakultas Sains dan Informatika', 'Selamat datang di Website Official Fakultas Sains dan Informatika Universitas Jenderal Achmad Yani', 0x363634396633323339333232322e6a7067),
(28, 50, 'Selamat Wisuda Kepada Seluruh Wisudawan', 'Selamat Wisuda Kepada Seluruh Wisudawan Periode 1 Tahun 2024', 0x363638336265666262613166352e6a706567),
(29, 50, 'Penerimaan Mahasiswa Baru Tahun 2024', 'Terdapat berbagai jalur masuk yang tersedia di Universitas Jenderal Achmad Yani', 0x36363833626638613731633533312e6a7067),
(30, 50, 'Penerimaan Mahasiswa Baru Tahun 2024', 'Terdapat banyak kemudahan pembiayaan kuliah di Universitas Jenderal Achmad Yani', 0x36363833633032633439373830322e6a7067),
(31, 50, 'Penerimaan Mahasiswa Baru Tahun 2024', 'Terdapat berbagai fasilitas yang tersedia di Universitas Jenderal Achmad Yani', 0x36363833633036383739356531332e6a7067),
(32, 50, 'Selamat dan Sukses Kepada Rekan-Rekan', 'Selamat dan Sukses atas diraihnya Pendanaan Program Kreativitas Mahasiswa (PKM) Kemendikbudristekdikti Tahun 2024 ', 0x36363833633230333138346661312e706e67),
(33, 50, 'Penjajakan Kerja Sama ', 'Penjajakan Kerja Sama FSI UNJANI bersama FMIPA UNUD', 0x36363833633235653766306635322e706e67);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kalender_akademik`
--

CREATE TABLE `kalender_akademik` (
  `ID_Akademik` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Gambar` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelulusan`
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
-- Struktur dari tabel `navbar`
--

CREATE TABLE `navbar` (
  `ID_Navbar` int(11) NOT NULL,
  `ID_Admin` int(11) DEFAULT NULL,
  `Daftar_Nama` varchar(100) NOT NULL,
  `Tautan` varchar(255) NOT NULL,
  `Kategori` enum('Profil','SDM','Akademik','Fasilitas','Penjaminan Mutu','Penelitian Dan Pengabdian','Mahasiswa','Siterpadu') NOT NULL,
  `Sub_Kategori` enum('Survey','Dokumen Akademik','Penelitian') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `navbar`
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
(75, 50, 'Penjamin Mutu Eksternal', 'http://localhost/UNJANI/src/pages/akreditasi.php', 'Penjaminan Mutu', NULL),
(77, 50, 'Pengabdian Kepada Masyarakat', 'http://localhost/UNJANI/src/pages/pengabdian-masyarakat.php', 'Penelitian Dan Pengabdian', NULL),
(78, 50, 'Produk Inovatif', 'http://localhost/UNJANI/src/pages/produk-inovatif.php', 'Penelitian Dan Pengabdian', NULL),
(79, 50, 'Info Penerimaan Mahasiswa Baru', 'https://pmb.unjani.ac.id/', 'Mahasiswa', NULL),
(80, 50, 'Organisasi Kemahasiswaan', 'https://www.unjani.ac.id/organisasi-mahasiswa-dan-ukm/', 'Mahasiswa', NULL),
(81, 50, 'Kegiatan Kemahasiswaan', 'http://localhost/UNJANI/src/pages/kegiatan-kemahasiswaan.php', 'Mahasiswa', NULL),
(82, 50, 'Prestasi', 'http://localhost/UNJANI/src/pages/prestasi.php', 'Mahasiswa', NULL),
(83, 50, 'Beasiswa', 'http://localhost/UNJANI/src/pages/beasiswa.php', 'Mahasiswa', NULL),
(84, 50, 'Portal Lecturer', 'https://lecturer.unjani.ac.id/', 'Siterpadu', NULL),
(85, 50, 'Portal Student', 'https://student.unjani.ac.id/', 'Siterpadu', NULL),
(86, 50, 'Portal Tenaga Pendidikan', 'https://stpd.unjani.ac.id/', 'Siterpadu', NULL),
(88, 50, 'Kimia S-1', 'http://localhost/UNJANI/src/pages/penelitian-kimia.php', 'Penelitian Dan Pengabdian', 'Penelitian'),
(89, 50, 'Magister Kimia S-2', 'http://localhost/UNJANI/src/pages/penelitian-kimia2.php', 'Penelitian Dan Pengabdian', 'Penelitian'),
(90, 50, 'Teknik Informatika S-1', 'http://localhost/UNJANI/src/pages/penelitian-informatika.php', 'Penelitian Dan Pengabdian', 'Penelitian'),
(91, 50, 'Sistem Informasi  S-1', 'http://localhost/UNJANI/src/pages/penelitian-sisteminformasi.php', 'Penelitian Dan Pengabdian', 'Penelitian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penelitian_if`
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
-- Dumping data untuk tabel `penelitian_if`
--

INSERT INTO `penelitian_if` (`ID_Penelitian_If`, `ID_Admin`, `Judul_Penelitian`, `Link_Penelitian`, `Tingkatan`, `Judul_Jurnal`, `Link_Jurnal`, `Pencipta`, `Tahun`) VALUES
(4, 50, 'Clothing type classification using convolutional neural networks', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Putri R.G.A', '2023'),
(6, 50, 'Spatial and Temporal Analysis of COVID-19 Cases in West Java, Indonesia and Its Influencing Factors', 'https://www.scopus.com/home.uri', 'Q1 Journal', 'Engineering Letters', 'https://www.scopus.com/sourceid/17800156701', 'Melina', '2022'),
(7, 50, 'Classifier types of personal document imagery using convolutional neural network', 'https://www.scopus.com/home.uri', 'Q3 Journal', 'International Journal of Environmental Research and Public Health', 'https://www.scopus.com/sourceid/144989', 'Putri D.I.P', '2023'),
(8, 50, 'A Conceptual Model of Investment-Risk Prediction in the Stock Market Using Extreme Value Theory with Machine Learning: A Semisystematic Literature Review', 'https://www.scopus.com/home.uri', 'Q1 Journal', 'Risks', 'https://www.scopus.com/sourceid/21100886347', 'Melina', '2023'),
(9, 50, 'Recognition of cat ras of face and body using convolutional neural networks', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Aji A.W.', '2023'),
(10, 50, 'Recommendations for cardiac disease prevention packages based on medical records with collaborative filtering recommendations using factorization matrix', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Nova C.C', '2023'),
(11, 50, 'Microservices technology in citizen-centric E-government', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Saepuloh R.M.', '2023'),
(12, 50, 'Wind speed prediction using independent component analysis and convolutional neural networks', 'https://www.scopus.com/home.uri	', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Melawati M.', '2023'),
(13, 50, 'IImplementing geographical information system in selecting a proper health facilities based on analytical hierarchy process', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Reanto A.H.', '2023'),
(14, 50, 'Indoor temporal spatial analysis on the movement of nurses in hospitals based on local Wi-Fi networks', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Mediyanti M.', '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penelitian_kimia`
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
-- Dumping data untuk tabel `penelitian_kimia`
--

INSERT INTO `penelitian_kimia` (`ID_Penelitian_Kimia`, `ID_Admin`, `Judul_Penelitian`, `Tautan_Penelitian`, `Tingkatan`, `Judul_Jurnal`, `Tautan_Jurnal`, `Pencipta`, `Tahun`) VALUES
(11, 50, 'Performance and economic evaluation of a pilot scale embedded ends-free membrane bioreactor (EEF-MBR)', 'https://www.scopus.com/home.uri', 'Q1 Journal', 'Applied Microbiology and Biotechnology', 'https://www.scopus.com/sourceid/14957', 'Siagian U.W.R', '2023'),
(12, 50, 'Pyrolysis of styrofoam plastic waste (SPW) using mount Krakatau’s volcanic ash catalyst', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Suhartono S.', '2023'),
(13, 50, 'Ultra low-pressure reverse osmosis (ULPRO) membrane for desalination: Current challenges and future directions', 'https://www.scopus.com/home.uri', 'Q1 Journal', 'Desalination', 'https://www.scopus.com/sourceid/16322', 'Aryanti P.T.P', '2023'),
(14, 50, 'Effect of addition of slag in cement mortar products on mechanical and chemical properties', 'https://www.scopus.com/home.uri', 'Q2 Journal', 'Innovative Infrastructure Solutions', 'https://www.scopus.com/sourceid/21100888788', 'Suharto', '2023'),
(15, 50, 'Analyses of sustainable indicators of water resources for redesigning the health promoting water delivery networks: A case study in Sahneh, Iran', 'https://www.scopus.com/home.uri', 'Q1 Journal', 'Case Studies in Chemical and Environmental Engineering', 'https://www.scopus.com/sourceid/21101055712', 'Moussavi S.P', '2023'),
(16, 50, 'Converting Styrofoam Waste into Fuel Using a Sequential Pyrolysis Reactor and Natural Zeolite Catalytic Reformer', 'https://www.scopus.com/home.uri', 'Q2 Journal', 'International Journal of Technology', 'https://www.scopus.com/sourceid/21100235612', 'Suhartono', '2023'),
(17, 50, 'A novel pico-hydro power (PHP)-Microbial electrolysis cell (MEC) coupled system for sustainable hydrogen production during palm oil mill effluent (POME) wastewater treatment', 'https://www.scopus.com/home.uri', 'Q1 Journal', 'International Journal of Hydrogen Energy', 'https://www.scopus.com/sourceid/26991', 'Kadier A.', '2023'),
(18, 50, 'PVC-based gravity driven ultrafiltration membrane for river water treatment', 'https://www.scopus.com/home.uri', 'Q3 Journal', 'Materials Today: Proceedings', 'https://www.scopus.com/sourceid/21100370037', 'Teta Prihartini Aryanti P.', '2023'),
(19, 50, 'The Influence of Mixing on Electrocoagulation Performance During Soy Sauce Wastewater Treatment', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Nugroho F.A', '2023'),
(20, 50, 'Polymeric membranes in electrodialysis, electrodialysis reversal, and capacitive deionization technologies', 'https://www.scopus.com/home.uri', 'no-Q Journal', 'Advancement in Polymer-Based Membranes for Water Remediation', 'https://shop.elsevier.com/books/advancement-in-polymer-based-membranes-for-water-remediation/nayak/9', 'Khoiruddin K.', '2022'),
(21, 50, 'Antimicrobial Activity of ?-Sitosterol Isolated from Kalanchoe tomentosa Leaves Against Staphylococcus aureus and Klebsiella pneumonia', 'https://www.scopus.com/home.uri', 'Q3 Journal', 'Pakistan Journal of Biological Sciences', 'https://www.scopus.com/sourceid/3900148614', 'Anwar R.', '2022'),
(22, 50, 'Flavonoid Compounds from leaf of Kalanchoe tomentosa', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'Research Journal of Chemistry and Environment', 'https://www.scopus.com/sourceid/5300152224', 'Aisyah L.S.', '2021'),
(23, 50, '?-Sitosterol Compound from Dichloromethane Extracts of Kalanchoe tomentosa (Crassulacea) Leaves and Inhibition of ?-amilase Activity', 'https://www.scopus.com/home.uri', 'no-Q Journal', 'Jurnal Kimia Valensi', 'https://www.scopus.com/sourceid/21101145675', 'Aisyah L.S.', '2021'),
(24, 50, 'Crosslinked CMC-urea hydrogel made from natural carboxymethyl cellulose (CMC) as slow-release fertilizer coating', 'https://www.scopus.com/home.uri	', 'Q2 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Suprabawati A.', '2020'),
(25, 50, 'Antibacterial activity of extract and two secondary metabolite compounds from the leaves of Hydrangea macrophylla', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'Research Journal of Chemistry and Environment', 'https://www.scopus.com/sourceid/5300152224', 'Agustini D.M.', '2020'),
(26, 50, 'Identification of flavonoid compounds from ethyl acetate extract of Kalanchoe millotii (Crassulaceae) and endodontics antibacterial activity', 'https://www.scopus.com/home.uri	', 'Q4 Journal', 'Research Journal of Chemistry and Environment', 'https://www.scopus.com/sourceid/5300152224', 'Yun Y.F', '2020'),
(27, 50, 'Cellulose isolation from gracilaria genus and its potential as bioethanol raw material', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'Research Journal of Chemistry and Environment', 'https://www.scopus.com/sourceid/5300152224', 'Budi S.', '2018'),
(28, 50, 'Flavonoid compounds from the leaves of Kalanchoe prolifera and their cytotoxic activity against P-388 murine leukimia cells', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'Natural Product Sciences', 'https://www.scopus.com/sourceid/79053', 'Aisyah L.', '2017'),
(29, 50, 'The phenolic compound from Kalanchoe blossfeldiana (Crassulaceae) leaf and its antiplasmodial activity against Plasmodium falciparum 3D7', 'https://www.scopus.com/home.uri	', 'Q4 Journal', 'Indonesian Journal of Chemistry', 'https://www.scopus.com/sourceid/21100223536', 'Yun Y.F.', '2016');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penelitian_magister_kimia`
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
-- Dumping data untuk tabel `penelitian_magister_kimia`
--

INSERT INTO `penelitian_magister_kimia` (`ID_Penelitian_Magister_Kimia`, `ID_Admin`, `Judul_Penelitian`, `Tautan_Penelitian`, `Tingkatan`, `Judul_Journal`, `Tautan_Journal`, `Pencipta`, `Tahun`) VALUES
(3, 50, 'Synthesis and Characterization of Fe-Doped CaTiO3 Polyhedra Prepared by Molten NaCl Salt', 'https://www.scopus.com/home.uri', 'Q2 Journal', 'Science and Technology Indonesia', 'https://www.scopus.com/sourceid/21101040666', 'Novianti D.R', '2022'),
(6, 50, 'Artificial Neural Network-Based Machine Learning Approach to Stock Market Prediction Model on the Indonesia Stock Exchange During the COVID-19', 'https://www.scopus.com/home.uri', 'Q2 Journal', 'Engineering Letters', 'https://www.scopus.com/sourceid/17800156701', 'Melina', '2022'),
(7, 50, 'Synthesis and characterization of plate-like vanadium doped SrBi4Ti4O15 prepared via KCl molten salt method', 'https://www.scopus.com/home.uri', 'Q3 Journal', 'Communications in Science and Technology', 'https://www.scopus.com/sourceid/21101017727', 'Sari P. ', '2022'),
(8, 50, 'IMMOBILIZATION OF CRUDE POLYPHENOL OXIDASE PURPLE EGGPLANT EXTRACT ON CHITOSANMEMBRANE FOR REMOVAL OF PHENOL WASTEWATER', 'https://www.scopus.com/home.uri', 'Q3 Journal', 'European Chemical Bulletin', 'https://www.scopus.com/sourceid/21100898023', 'Murniati A. ', '2022'),
(9, 50, 'Utilization of Tephrosia vogelii in post-mining land reclamation', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'IOP Conference Series: Earth and Environmental Science', 'https://www.scopus.com/sourceid/19900195068', 'Kusumaningtyas V.A', '2021'),
(10, 50, 'Green synthesis of silver@carbon dots nanocomposites for enhancing the antimicrobial activity', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Primadona I.', '2021'),
(11, 50, 'Cu-Mn Co-doped NiFe2O4based thick ceramic film as negative temperature coefficient thermistors', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'IOP Conference Series: Earth and Environmental Science', 'https://www.scopus.com/sourceid/19900195068', 'Hardian A.', '2021'),
(12, 50, 'The potency of Cassia siamea as phytostabilization in post-mining land reclamation', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'IOP Conference Series: Earth and Environmental Science', 'https://www.scopus.com/sourceid/19900195068', 'Kusumaningtyas V.A.', '2021'),
(13, 50, 'Synthesis, characterization, and evaluation of ZrSiO4/Fe2O3adsorbent for methylene blue removal in aqueous solutions', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'IOP Conference Series: Earth and Environmental Science', 'https://www.scopus.com/sourceid/19900195068', 'Yuliana T.', '2021'),
(14, 50, 'Effect of heat treatment on preparation of expanded perlite from Indonesian perlite rock', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Wahyudi A.', '2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penelitian_sistem_informasi`
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

--
-- Dumping data untuk tabel `penelitian_sistem_informasi`
--

INSERT INTO `penelitian_sistem_informasi` (`ID_Sistem_Informasi`, `ID_Admin`, `Judul_Penelitian`, `Tautan_Penelitian`, `Tingkatan`, `Judul_Jurnal`, `Tautan_Jurnal`, `Pencipta`, `Tahun`) VALUES
(8, 50, 'Implementing secure rest API on the integration of electronic medical records between a local hospital and nearby private clinics', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Suryanto H.', '2023'),
(9, 50, 'Dynamic Patient Categorization Based on Medical Records Using Fuzzy C-Means Clustering Technique', 'https://www.scopus.com/home.uri', 'no-Q Journal', 'ICCoSITE 2023 – International Conference on Computer Science, Information Technology and Engineering', 'https://www.scopus.com/sourceid/21101161002', 'Wati D.F.', '2023'),
(10, 50, 'Microservices technology in citizen-centric E-government', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Saepuloh R.M.', '2023'),
(11, 50, 'Indoor temporal spatial analysis on the movement of nurses in hospitals based on local Wi-Fi networks', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Mediyanti M.', '2023'),
(12, 50, 'Smart queueing for outpatient in a private hospital using location-based service', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Sukmanisa S.S.', '2023'),
(13, 50, 'Recommendations for cardiac disease prevention packages based on medical records with collaborative filtering recommendations using factorization matrix', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Nova C.C.', '2023'),
(14, 50, 'Two factor authentication in E-voting system using time based one time password', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Hermawan A.F.', '2023'),
(15, 50, 'IImplementing geographical information system in selecting a proper health facilities based on analytical hierarchy process', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Reanto A.H.', '2023'),
(16, 50, 'Implementing public participation geographical information system to determine subsidized market operation of primary commodities in Indonesia using analytical hierarchy process', 'https://www.scopus.com/home.uri', 'Q4 Journal', 'AIP Conference Proceedings', 'https://www.scopus.com/sourceid/26916', 'Almauludin M.G.', '2023'),
(17, 50, 'Prediction Analysis of Four Disease Risk Using Decision Tree C4.5', 'https://www.scopus.com/home.uri', 'no-Q Journal', 'ICCoSITE 2023 – International Conference on Computer Science, Information Technology and Engineering', 'https://www.scopus.com/sourceid/21101161002', 'Rusyana N.R.', '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengabdian_masyarakat`
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

--
-- Dumping data untuk tabel `pengabdian_masyarakat`
--

INSERT INTO `pengabdian_masyarakat` (`ID_Pengabdian`, `ID_Admin`, `Judul_Pengabdian`, `Tautan_Pengabdian`, `Leader`, `Event`, `Personil`, `Tahun`) VALUES
(5, 50, 'PELATIHAN PENYUSUNAN LAPORAN KEUANGAN DANA MASJID PADA MASJID-MASJID JAMI DI DESA JAMBUDIPA CISARUA BANDUNG BARAT', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=services#!', 'Siti Kustinah', 'HIBAH INTERNAL ( KU )', 'Romli; Eddy Winarso;', '2023'),
(6, 50, 'PELATIHAN DAN PENDAMPINGAN DIGITAL MARKETING SERTA PENYUSUNAN LAPORAN KEUANGAN UMKM SESUAI SAK EMKM BERBASIS APLIKASI', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=services#!', 'Raden Budi Hendaris', 'HIBAH INTERNAL ( KU )', 'Neni Maryani; Muhammad Anggionaldi;', '2023'),
(7, 50, 'OPTIMALISASI PROGRAM PEMBERIAN TABLET BESI DAN SKRINING ANEMIA KEPADA REMAJA USIA 13-15 TAHUN DI KABUPATEN BANDUNG BARAT', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=services#!', 'Desy Linasari', 'HIBAH INTERNAL ( KU )', 'Endry Septiadi; Anastasia Yani Triningtyas;', '2023'),
(8, 50, 'PENYULUHAN, PEMERIKSAAN FUNGSI PENDENGARAN, DAN FAKTOR RISIKO GANGGUAN DENGAR PADA PADA PRAJURIT DENGAN RISIKO TRAUMA AKUSTIK AKIBAT LEDAKAN MERIAM HOWITZER 105.', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=services#!', 'Asti Kristiani', 'HIBAH INTERNAL ( KU )', 'Sigit Sasongko;', '2023'),
(9, 50, 'PENINGKATAN PERAN GURU DAN SISWA DALAM KEBERHASILAN MITIGASI BENCANA DI WILAYAH SESAR LEMBANG', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=services#!', 'Khirisna Wisnu Sakti', 'HIBAH INTERNAL ( KU )', 'Fini Ainun Qolbi Wasdili; Diki Ardiansyah, S.kep.,', '2023'),
(10, 50, 'PEMERIKSAAN KESEHATAN GIGI MULUT DAN PENYULUHAN BAHAN ALAM UNTUK KESEHATAN GIGI MULUT DI KAMPUNG ADAT CIREUNDEU KOTA CIMAHI', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=services#!', 'Euis Reni Yuslianti', 'HIBAH INTERNAL ( KU )', 'Asoh Rahaju; Soraya Riyanti;', '2023'),
(11, 50, 'PENGEMBANGAN UNIT USAHA UNGGULAN MELALUI E-COMMERCE DAN MEDIA SOSIAL MARKETING PADA SMKN 3 CIMAHI', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=services#!', 'Abdul Ahmad Hafidh Nurmansyah', 'HIBAH INTERNAL ( KU )', 'Dian Lestari; Novi Susyani;', '2023'),
(12, 50, 'PENGENALAN SAFETY MATERIAL DATA SHEET (MSDS) PADA PENGELOLA LABORATORIUM DAN SISWA SMK KESEHATAN', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=services#!', 'Sitti Romlah', 'HIBAH INTRNAL ( KU )', 'Iis Herawati; Ariana Novilla;', '2023'),
(13, 50, 'PELATIHAN BANTUAN HIDUP DASAR PADA ANGGOTA ASOSIASI PENGUSAHA JASA BOGA INDONESIA (APJI) PROVINSI JAWA BARAT', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=services#!', 'Tezza Adriansyah Anwar', 'HIBAH INTERNAL ( KU )', 'Ridono Caesar Suhud; Indarti Trimurtini;', '2023'),
(14, 50, 'PKM PENINGKATAN KOMPETENSI SISWA SMKN 3 CIMAHI MELALUI PELATIHAN SUPPLY CHAIN MANAGEMENT', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=services#!', 'Aam Rachmat Mulyana', 'HIBAH INTERNAL ( KU )', 'Khaerul Rizal Abdurahman; Edi Nurtjahjadi;', '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
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
-- Struktur dari tabel `prestasi`
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
-- Dumping data untuk tabel `prestasi`
--

INSERT INTO `prestasi` (`ID_Prestasi`, `ID_Admin`, `Gambar`, `Nama_Mahasiswa`, `Kegiatan`, `Pencapaian`, `Tahun_Pencapaian`) VALUES
(5, 50, 0x363634613938373434373334642e6a7067, 'Rifaz Muhammad Sukma', 'Capstone Project Bangkit 2023', 'Juara 2', '2023'),
(6, 50, 0x363634613938393666313932362e6a7067, 'Rifaz Muhammad Sukma Annisa Mufidah Sopia Saepurizal', 'Konferensi Perpustakaan Digital Indonesia Ke-13', 'Juara 1', '2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_inovatif`
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
-- Dumping data untuk tabel `produk_inovatif`
--

INSERT INTO `produk_inovatif` (`ID_Produk`, `ID_Admin`, `Judul_Inovasi`, `Tautan_Inovasi`, `Leader`, `Event`, `Personil`, `Tahun`) VALUES
(3, 50, 'Standardisasi, Uji Pra Klinik dan Toksisitas Kumis Kucing (Orthosiphon Aristatus (Blume) Miq.) Varietas Ungu Sebagai Dasar Pengembangan Obat Herbal Antihipertensi', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=services#!', 'Fahrauk Faramayuda', 'PENELITIAN DESENTRALISASI (PDUPT)', 'Soraya Riyanti; Suryani', '2024'),
(5, 50, 'KAJIAN ASPEK-ASPEK YANG BERHUBUNGAN TERHADAP RENDAHNYA CAKUPAN TES INSPEKSI VISUAL ASAM ASETAT DALAM PENEMUAN AWAL KANKER SERVIKS DI KOTA CIMAHI', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=researches#!', 'Nasir Ahmad', 'HIBAH INTERNAL (KU)', 'Nanik Cahyati;', '2023'),
(6, 50, 'PENGARUH PROSEDUR AUDIT BERBASIS TEKNOLOGI INFORMASI DAN PENGALAMAN AUDITOR TERHADAP KUALITAS AUDIT', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=researches#!', 'Neni Maryani', 'HIBAH INTERNAL (KU)', 'Rendi Kusuma Natita;Ali Rahman Reza Zaputra;', '2023'),
(7, 50, 'PROFIL FITOKIMIA EKSTRAK DAUN BUNGUR DAN DAUN MANGKOKAN SEBAGAI KOMBINASI HERBAL PENURUN GLUKOSA DARAH', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=researches#!', 'Soraya Riyanti', 'Soraya Riyanti', '-', '2023'),
(8, 50, 'KAJIAN MEKANISME KERJA RESVERATROL SEBAGAI ANTIMALARIA SECARA IN VITRO', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=researches#!', 'Faizal Hermanto', 'HIBAH INTERNAL (KU)', '-', '2023'),
(9, 50, 'INTERAKSI ANTIMIKROBA EKSTRAK ETANOL DAUN SIRIH HIJAU (PIPER BETLE L.) DAN DAUN SIRIH MERAH (PIPER CROCATUM RUIZ &amp;amp; PAV.) DENGAN BAKTERI S. MUTANS DAN JAMUR C. ALBICANS', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=researches#!', 'Anna Choirunnisa', 'HIBAH INTERNAL (KU)', '-', '2023'),
(10, 50, 'PEMILU DAN POLITIK IDENTITAS DI INDONESIA : SEBUAH PERSEPEKTIF DEMOKRASI MULTIKULTURAL', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=researches#!', 'Lukman Munafar Fauzi', 'HIBAH INTERNAL (KU)', 'Arlan Siddah; Dadan Kurnia;', '2023'),
(11, 50, 'STUDI GAMBARAN RADIOGRAFI UNTUK MENGETAHUI POSISI ANATOMI GIGI IMPAKSI, SINUS MAKSILARIS, DAN FORAMEN MENTAL SEHINGGA MENCEGAH KOMPLIKASI PADA PROSEDUR ODONTEKTOMI TAHUN KE-2', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=researches#!', 'Mutiara Sukma Suntana', 'HIBAH INTERNAL (KU)', 'Ratna Trisusanti', '2023'),
(12, 50, 'ANALYSIS OF FIRM SPECIFIC FACTORS INFLUENCING DIVIDEND POLICY ON THE INDONESIAN STOCK EXCHANGE SHARIA CAPITAL MARKET (STUDY ON CORPORTE CORPORATIONS IN JAKARTA ISLAMIC INDEX)', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=researches#!', 'Desmiza', 'HIBAH INTERNAL (KU)', 'Rosmini Ramli;', '2023'),
(13, 50, 'PENGEMBANGAN MODEL KOMUNIKASI UMPAN BALIK PADA PENILAIAN KLINIK DALAM KULTUR HIERARKIS DAN KOLEKTIVIS', 'https://sinta.kemdikbud.go.id/affiliations/profile/1409/?view=researches#!', 'Sylvia Mustika Sari', 'HIBAH INTERNAL (KU)', 'Arlisa Wulandari', '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `program_studi`
--

CREATE TABLE `program_studi` (
  `ID_Prodi` int(11) NOT NULL,
  `ID_Admin` int(11) DEFAULT NULL,
  `Nama_Prodi` varchar(100) DEFAULT NULL,
  `Gambar_Prodi` longblob NOT NULL,
  `Tautan_Prodi` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `program_studi`
--

INSERT INTO `program_studi` (`ID_Prodi`, `ID_Admin`, `Nama_Prodi`, `Gambar_Prodi`, `Tautan_Prodi`) VALUES
(23, 50, 'S-1 Kimia', 0x363638336333353331666264632e706e67, 'https://kimia.unjani.ac.id/'),
(24, 50, 'S-1 Sistem Informasi', 0x363638336333393065356662652e706e67, 'https://si.unjani.ac.id/'),
(25, 50, 'S-1 Informatika', 0x363638336333623838303037362e706e67, 'https://if.unjani.ac.id/'),
(26, 50, 'S-2 Magister Kimia', 0x363638336333646262353666652e706e67, 'https://magister.kimia.unjani.ac.id/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `struktur_organisasi`
--

CREATE TABLE `struktur_organisasi` (
  `ID_Organisasi` int(11) NOT NULL,
  `ID_Admin` int(11) NOT NULL,
  `Foto_Dosen_Organisasi` longblob NOT NULL,
  `Nama_Dosen_Organisasi` varchar(225) NOT NULL,
  `Jabatan_Dosen_Organisasi` varchar(225) NOT NULL,
  `Kasubag_Organisasi` enum('Akademik','Umum') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `struktur_organisasi`
--

INSERT INTO `struktur_organisasi` (`ID_Organisasi`, `ID_Admin`, `Foto_Dosen_Organisasi`, `Nama_Dosen_Organisasi`, `Jabatan_Dosen_Organisasi`, `Kasubag_Organisasi`) VALUES
(3, 50, 0x646f73656e5f363638626239396437623934322e6a7067, 'Dr.Anceu Murniati, S.Si., M.Si', 'DEKAN', 'Akademik'),
(4, 50, 0x363638626262386462386361662e6a7067, 'Dr.Arie Hardian, S.Si., M.Si', 'Wakil Dekan I', 'Akademik'),
(5, 50, 0x646f73656e5f363638626262356265636237642e6a7067, 'Wina Witanti, S.T., M.T.', 'Wakil Dekan II', 'Akademik'),
(6, 50, 0x646f73656e5f363638626262376664656231652e6a7067, 'Agus Komarudin, S.Kom., M.T.', 'Wakil Dekan III', 'Akademik'),
(7, 50, 0x646f73656e5f363638626262646466333435662e6a7067, 'Juhana, S.E', 'Kabag TU', 'Akademik'),
(8, 50, 0x646f73656e5f363638626263313634623930392e6a7067, 'Peryatna, S.Pd', 'Kaur ADM Perpustakaan', 'Akademik'),
(9, 50, 0x646f73656e5f363638626263336536363033622e6a7067, 'Yulia Puspita', 'Kaur ADM Akademik', 'Akademik'),
(10, 50, 0x646f73656e5f363638626263373231383636312e6a7067, 'Roby Bayu M, S.ST.', 'Anggota Akademik FSI', 'Akademik'),
(11, 50, 0x646f73656e5f363638626263613536666332362e6a7067, 'Hermawan', 'Kaur ADM. Personel', 'Umum'),
(12, 50, 0x646f73656e5f363638626263653633633838382e6a7067, 'Dani R SM., S.Sos', 'Kaur ADM Umum', 'Umum'),
(13, 50, 0x646f73656e5f363638626264313036343435612e6a7067, 'Vita Natalia P, A.Md', 'Kaur ADM Keuangan', 'Umum'),
(14, 50, 0x646f73656e5f363638626264343265626638632e6a7067, 'Ari Saptari', 'Anggota Personel FSI', 'Umum'),
(15, 50, 0x646f73656e5f363638626264363164663130312e6a7067, 'Muhidin', 'Anggota Umum FSI', 'Umum'),
(17, 50, 0x646f73656e5f363638626632623334616430652e6a7067, 'Yayan Sopyan', 'Anggota Urdal FSI', 'Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tenaga_dosen`
--

CREATE TABLE `tenaga_dosen` (
  `ID_Dosen` int(11) NOT NULL,
  `NIP_NID_Dosen` int(11) NOT NULL,
  `Nama_Dosen` varchar(225) NOT NULL,
  `Jabatan_Dosen` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tenaga_dosen`
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
-- Struktur dari tabel `tenaga_staff`
--

CREATE TABLE `tenaga_staff` (
  `ID_Staff` int(11) NOT NULL,
  `NIP_NID_Staff` int(11) NOT NULL,
  `Nama_Staff` varchar(225) NOT NULL,
  `Jabatan_Staff` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tenaga_staff`
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
-- Struktur dari tabel `testimoni`
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
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`ID_Testimoni`, `ID_Admin`, `Foto_Mahasiswa`, `Nama_Mahasiswa`, `Kesan_Mahasiswa`, `Tanggal_Testimoni`) VALUES
(35, 50, 0x6d61686173697377615f363638623937353237663864652e6a7067, 'Syntax Squad', 'FSI KEREN !!!', '2024-07-08'),
(36, 50, 0x6d61686173697377615f363638623937643836373939622e6a7067, 'Syntax Squad', 'FSI, JAYA JAYA JAYA !!!', '2024-07-08'),
(37, 50, 0x6d61686173697377615f363638623961356336366661352e6a7067, 'Syntax Squad ', 'JAYA JAYA JAYA!!!!!', '2024-07-12'),
(38, 50, 0x6d61686173697377615f363638623961616564353166652e6a7067, 'Syntax Squad ', 'FSIIIIII', '2024-07-13');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_Admin`);

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`ID_Agenda`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD PRIMARY KEY (`ID_Beasiswa`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`ID_Berita`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`ID_Carousel`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  ADD PRIMARY KEY (`ID_Akademik`),
  ADD UNIQUE KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `kelulusan`
--
ALTER TABLE `kelulusan`
  ADD PRIMARY KEY (`ID_Kelulusan`),
  ADD KEY `ID_Prodi` (`ID_Prodi`);

--
-- Indeks untuk tabel `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`ID_Navbar`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `penelitian_if`
--
ALTER TABLE `penelitian_if`
  ADD PRIMARY KEY (`ID_Penelitian_If`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `penelitian_kimia`
--
ALTER TABLE `penelitian_kimia`
  ADD PRIMARY KEY (`ID_Penelitian_Kimia`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `penelitian_magister_kimia`
--
ALTER TABLE `penelitian_magister_kimia`
  ADD PRIMARY KEY (`ID_Penelitian_Magister_Kimia`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `penelitian_sistem_informasi`
--
ALTER TABLE `penelitian_sistem_informasi`
  ADD PRIMARY KEY (`ID_Sistem_Informasi`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `pengabdian_masyarakat`
--
ALTER TABLE `pengabdian_masyarakat`
  ADD PRIMARY KEY (`ID_Pengabdian`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`ID_Pengumuman`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`ID_Prestasi`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `produk_inovatif`
--
ALTER TABLE `produk_inovatif`
  ADD PRIMARY KEY (`ID_Produk`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`ID_Prodi`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD PRIMARY KEY (`ID_Organisasi`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indeks untuk tabel `tenaga_dosen`
--
ALTER TABLE `tenaga_dosen`
  ADD PRIMARY KEY (`ID_Dosen`);

--
-- Indeks untuk tabel `tenaga_staff`
--
ALTER TABLE `tenaga_staff`
  ADD PRIMARY KEY (`ID_Staff`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`ID_Testimoni`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `ID_Agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  MODIFY `ID_Beasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `ID_Berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `carousel`
--
ALTER TABLE `carousel`
  MODIFY `ID_Carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `kalender_akademik`
--
ALTER TABLE `kalender_akademik`
  MODIFY `ID_Akademik` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelulusan`
--
ALTER TABLE `kelulusan`
  MODIFY `ID_Kelulusan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `navbar`
--
ALTER TABLE `navbar`
  MODIFY `ID_Navbar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `penelitian_if`
--
ALTER TABLE `penelitian_if`
  MODIFY `ID_Penelitian_If` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `penelitian_kimia`
--
ALTER TABLE `penelitian_kimia`
  MODIFY `ID_Penelitian_Kimia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `penelitian_magister_kimia`
--
ALTER TABLE `penelitian_magister_kimia`
  MODIFY `ID_Penelitian_Magister_Kimia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `penelitian_sistem_informasi`
--
ALTER TABLE `penelitian_sistem_informasi`
  MODIFY `ID_Sistem_Informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pengabdian_masyarakat`
--
ALTER TABLE `pengabdian_masyarakat`
  MODIFY `ID_Pengabdian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `ID_Pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `ID_Prestasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produk_inovatif`
--
ALTER TABLE `produk_inovatif`
  MODIFY `ID_Produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `ID_Prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  MODIFY `ID_Organisasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tenaga_dosen`
--
ALTER TABLE `tenaga_dosen`
  MODIFY `ID_Dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tenaga_staff`
--
ALTER TABLE `tenaga_staff`
  MODIFY `ID_Staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `ID_Testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD CONSTRAINT `agenda_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `beasiswa`
--
ALTER TABLE `beasiswa`
  ADD CONSTRAINT `beasiswa_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `carousel`
--
ALTER TABLE `carousel`
  ADD CONSTRAINT `carousel_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelulusan`
--
ALTER TABLE `kelulusan`
  ADD CONSTRAINT `kelulusan_ibfk_1` FOREIGN KEY (`ID_Prodi`) REFERENCES `program_studi` (`ID_Prodi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `navbar`
--
ALTER TABLE `navbar`
  ADD CONSTRAINT `navbar_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penelitian_if`
--
ALTER TABLE `penelitian_if`
  ADD CONSTRAINT `penelitian_if_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penelitian_kimia`
--
ALTER TABLE `penelitian_kimia`
  ADD CONSTRAINT `penelitian_kimia_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penelitian_magister_kimia`
--
ALTER TABLE `penelitian_magister_kimia`
  ADD CONSTRAINT `penelitian_magister_kimia_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penelitian_sistem_informasi`
--
ALTER TABLE `penelitian_sistem_informasi`
  ADD CONSTRAINT `penelitian_sistem_informasi_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengabdian_masyarakat`
--
ALTER TABLE `pengabdian_masyarakat`
  ADD CONSTRAINT `pengabdian_masyarakat_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `prestasi_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk_inovatif`
--
ALTER TABLE `produk_inovatif`
  ADD CONSTRAINT `produk_inovatif_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `program_studi`
--
ALTER TABLE `program_studi`
  ADD CONSTRAINT `program_studi_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `struktur_organisasi`
--
ALTER TABLE `struktur_organisasi`
  ADD CONSTRAINT `struktur_organisasi_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
