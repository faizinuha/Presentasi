-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2024 at 05:45 AM
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
(3, 'Cojocaru12', 'Yokohama Toiin Uni', '08612360123', 'ohde.jpg'),
(4, 'Ikeda', 'Yokohama Central', '087576857658712', 'ikeda.jpg'),
(5, 'ando', 'Tokyo Central', '08767762312', 'ando.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `info_pribadi`
--

CREATE TABLE `info_pribadi` (
  `id` int NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `info_pribadi`
--

INSERT INTO `info_pribadi` (`id`, `nama`, `nisn`, `alamat`, `no_telp`) VALUES
(7, 'Alung', '09721731782361', 'Jambewangi', '081230417361');

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
(1, 'IPA'),
(2, 'BIOLOGI'),
(3, 'Bhs Myanmar'),
(4, 'Bhs Jepang'),
(5, 'Bisnis'),
(6, 'Bhs China'),
(7, 'Ips');

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
(1, 'Ketua Kelas'),
(2, 'Wakil osis'),
(3, 'DA'),
(4, 'Ketua Esport'),
(5, 'Wakiil ketua'),
(6, 'Katua Eskul');

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
(1, 'rozak', 3, 4),
(3, 'Alung', 6, 2),
(4, 'Fahriz', 4, 1),
(5, 'Farel Y', 2, 1),
(6, 'AL Ahan', 1, 1);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `info_pribadi`
--
ALTER TABLE `info_pribadi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jurusan_fakultas`
--
ALTER TABLE `jurusan_fakultas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `organisasi`
--
ALTER TABLE `organisasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
