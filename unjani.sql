-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 05:08 PM
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
(39, 'NAUFAL FIFA', 0x363633636530346631396365622e6a7067, 'fifanaufal10@gmail.com', 'Pria', 'Terverifikasi', '$2y$10$lIRda6l4/J1IPGQoPItcf.83diBBW49MIw95bcC/gHRavmcrnsJyu', 'Naufal123.', 0);

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
-- Table structure for table `tenaga_dosen`
--

CREATE TABLE `tenaga_dosen` (
  `ID_Dosen` int(11) NOT NULL,
  `NIP_NID_Dosen` int(11) NOT NULL,
  `Nama_Dosen` varchar(225) NOT NULL,
  `Jabatan_Dosen` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `ID_Admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `ID_Berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `ID_Carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `ID_Navbar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `ID_Prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tenaga_dosen`
--
ALTER TABLE `tenaga_dosen`
  MODIFY `ID_Dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tenaga_staff`
--
ALTER TABLE `tenaga_staff`
  MODIFY `ID_Staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `ID_Testimoni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
