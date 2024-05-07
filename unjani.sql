-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2024 at 08:30 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
(32, 'Naufal FIFA', 0x363633393831363164373632352e6a7067, 'fifanaufal10@gmail.com', 'Pria', 'Terverifikasi', '$2y$10$.n9ty8talBPZkPMV6KXXguep5je6POYf5IrN3mwA1omwvKq/wiplO', '$2y$10$.n9ty8talBPZkPMV6KXXguep5je6POYf5IrN3mwA1omwvKq/wiplO', 0),
(33, 'a', 0x363633396339343533363033392e6a7067, 'a@gmail.com', 'Pria', 'Belum Terverifikasi', '$2y$10$MM4p9FHTQqcusngnmUHw3OeK4pRqTw7hg3yWeGCktUzRtW/vPRtbe', '$2y$10$MM4p9FHTQqcusngnmUHw3OeK4pRqTw7hg3yWeGCktUzRtW/vPRtbe', 81552822),
(34, 'a', 0x2e2e2f75706c6f6164732f64656661756c742e6a706567, 'sandroanugrahtambunan6@gmail.com', 'Pria', 'Belum Terverifikasi', '$2y$10$37YW.dcgq9OPdM86WJU5eOTj7DkRIRCoVfKqdSEspCMliNWNi2MgS', '$2y$10$37YW.dcgq9OPdM86WJU5eOTj7DkRIRCoVfKqdSEspCMliNWNi2MgS', 26012618);

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
  `Tautan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `ID_Prodi` int(11) NOT NULL,
  `ID_Admin` int(11) DEFAULT NULL,
  `Nama_Prodi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_Admin`);

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
  ADD UNIQUE KEY `ID_Admin_2` (`ID_Admin`),
  ADD KEY `ID_Admin` (`ID_Admin`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`ID_Prodi`),
  ADD KEY `ID_Admin` (`ID_Admin`);

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
  MODIFY `ID_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `ID_Berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `ID_Carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
  MODIFY `ID_Navbar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `ID_Prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `ID_Testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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
