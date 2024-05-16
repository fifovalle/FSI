-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 05:25 AM
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
(50, 'Naufal FIFA', 0x363634333434646235386538612e6a7067, 'fifanaufal10@gmail.com', 'Pria', 'Terverifikasi', '$2y$10$drIfs0sA2HIOF46sV12kDOMGu4AfiUxGYuzwTtQuMHDuyInVYpa7i', 'Naufal123.', 64802557);

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

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`ID_Carousel`, `ID_Admin`, `Judul`, `Deskripsi`, `Gambar`) VALUES
(27, 50, 'A', 'A', 0x36363435376231633732313663312e6a7067);

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
  `Kategori` enum('Profil','SDM','Akademik','Penelitian','Mahasiswa','Fasilitas','Peminjaman Mutu') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`ID_Navbar`, `ID_Admin`, `Daftar_Nama`, `Tautan`, `Kategori`) VALUES
(26, 50, 'a', 'http://c7', 'Profil');

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
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`ID_Pengumuman`),
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
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `ID_Berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `ID_Carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

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
  MODIFY `ID_Navbar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `ID_Pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Constraints for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD CONSTRAINT `pengumuman_ibfk_1` FOREIGN KEY (`ID_Admin`) REFERENCES `admin` (`ID_Admin`) ON DELETE CASCADE ON UPDATE CASCADE;

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
