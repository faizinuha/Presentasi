-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2024 at 08:06 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mahasiswi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_dosen`
--

CREATE TABLE `data_dosen` (
  `id` int NOT NULL,
  `nama_dosen` varchar(255) NOT NULL,
  `alamat_dosen` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `foto_dosen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_dosen`
--

INSERT INTO `data_dosen` (`id`, `nama_dosen`, `alamat_dosen`, `no_telp`, `foto_dosen`) VALUES
(23, 'Ikeda', 'Yokohama', '08752321312', '6685067d34235_ikeda.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `info_pribadi`
--

CREATE TABLE `info_pribadi` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `Nim` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `info_pribadi`
--

INSERT INTO `info_pribadi` (`id`, `nama`, `Nim`, `alamat`, `no_telp`) VALUES
(9, 'Rozak', '0003331682', 'Jambewangi', '0875775186281'),
(10, 'Alung', '00002112312', 'Jambewangi', '087512658263'),
(11, 'Farel Y', '000182341', 'Parastembok', '0865775123261'),
(12, 'IQBAL', '000123766123', 'Awu-Awu', '089968981212'),
(13, 'Friska', '09876587217712', 'Malang', '08656464134112');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan_fakultas`
--

CREATE TABLE `jurusan_fakultas` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jurusan_fakultas`
--

INSERT INTO `jurusan_fakultas` (`id`, `nama`) VALUES
(8, 'IPA'),
(9, 'BIOLOGI'),
(10, 'IPS'),
(11, 'FISIKA'),
(12, 'BHS MANDARIN'),
(13, 'Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `organisasi`
--

CREATE TABLE `organisasi` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `organisasi`
--

INSERT INTO `organisasi` (`id`, `nama`) VALUES
(7, 'Student_Council'),
(8, 'Toin University Sports Club:'),
(9, 'Cultural Club (Klub Budaya):'),
(10, 'Research and Innovation Society:'),
(11, 'International Students Association (Asosiasi Mahasiswa Internasional):'),
(12, 'Atlet');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `organisasi_id` int DEFAULT NULL,
  `jurusan_fakultas_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `nama`, `organisasi_id`, `jurusan_fakultas_id`) VALUES
(9, 'A_Rozak', 11, 11),
(10, 'Fahriz', 7, 8),
(11, 'Alung', 8, 12),
(12, 'Farel :)', 9, 10),
(13, 'Iqbal', 10, 9),
(14, 'Nopal', 7, 12),
(15, 'rtyui', 7, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_dosen`
--
ALTER TABLE `data_dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_pribadi`
--
ALTER TABLE `info_pribadi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurusan_fakultas`
--
ALTER TABLE `jurusan_fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisasi`
--
ALTER TABLE `organisasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organisasi_id` (`organisasi_id`),
  ADD KEY `jurusan_fakultas_id` (`jurusan_fakultas_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_dosen`
--
ALTER TABLE `data_dosen`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `info_pribadi`
--
ALTER TABLE `info_pribadi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jurusan_fakultas`
--
ALTER TABLE `jurusan_fakultas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`organisasi_id`) REFERENCES `organisasi` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`jurusan_fakultas_id`) REFERENCES `jurusan_fakultas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
