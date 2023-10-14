-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2023 at 06:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk-kel4`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `nim` varchar(25) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(15) DEFAULT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nim`, `nama`, `kelas`, `tempat_lahir`, `tgl_lahir`, `email`, `no_hp`, `alamat`) VALUES
(73, '10108009', 'Amelia Rosmaida', 'SI 3A', 'Sukabumi', '2002-06-12', 'amelia@gmail.com', '085465375374', 'Sukabumi'),
(74, '10108013', 'Cantika Tiara Maharnai', 'SI 3A', 'Purwakarta', '2001-09-06', 'cantika@gmail.com', '087756473854', 'Purwakarta'),
(75, '10108031', 'Kevin Abhista', 'SI 3A', 'Padang', '2002-07-06', 'kevin@gmail.com', '089657483531', 'Subang'),
(76, '10108041', 'Prita Nur Rifdah', 'SI 3A', 'Bekasi', '2002-03-03', 'pritanur@gmail.com', '085637452813', ''),
(77, '10108057', 'Syifa Mutiara Ramadan', 'SI 3A', 'Lampung', '2002-06-11', 'syifamutiara@gmail.com', '087726364521', 'Lampung'),
(78, '10108061', 'Wisnu', 'SI 3A', 'Subang', '2002-09-14', 'wisnuromdoni@gmail.com', '081395675211', 'Subang');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` varchar(3) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `bobot` int(11) NOT NULL,
  `jenis` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `jenis`) VALUES
('K1', 'IPK', 5, 'Benefit'),
('K2', 'TOEFL', 3, 'Benefit'),
('K3', 'Organisasi', 3, 'Cost'),
('K4', 'Prestasi', 4, 'Benefit'),
('K5', 'Psikotes', 3, 'Cost');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', '123456', 'Admin'),
(2, 'mahasiswa', '123456', 'Mahasiswa'),
(3, 'ameliarosmaida', 'ameliarosmaida', 'Mahasiswa'),
(6, 'cantika', 'cantika', 'Mahasiswa'),
(7, 'kevinabhista', 'kevinabhista', 'Mahasiswa'),
(8, 'pritanur', 'pritanur', 'Mahasiswa'),
(9, 'syifamutiara', 'syifamutiara', 'Mahasiswa'),
(10, 'wisnu', 'wisnu', 'Mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `matrix`
--

CREATE TABLE `matrix` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` varchar(3) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pangkat` (`kelas`),
  ADD KEY `pangkat_2` (`kelas`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matrix`
--
ALTER TABLE `matrix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `matrix`
--
ALTER TABLE `matrix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `matrix`
--
ALTER TABLE `matrix`
  ADD CONSTRAINT `matrix_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matrix_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
