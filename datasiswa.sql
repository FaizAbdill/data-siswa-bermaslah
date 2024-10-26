-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 08:46 AM
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
-- Database: `datasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bermasalah`
--

CREATE TABLE `bermasalah` (
  `nama` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `Kelas` varchar(11) NOT NULL,
  `alasan` varchar(100) NOT NULL,
  `Walikelas` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bermasalah`
--

INSERT INTO `bermasalah` (`nama`, `umur`, `Kelas`, `alasan`, `Walikelas`, `id`) VALUES
('faiz', 12, '2312121', '211', 'sdsadwada', 0),
('faiz', 12, '2312121', '211', 'sdsadwada', 0);

-- --------------------------------------------------------

--
-- Table structure for table `datasisswa`
--

CREATE TABLE `datasisswa` (
  `No` int(10) NOT NULL,
  `Nama` int(20) NOT NULL,
  `Kelas` int(20) NOT NULL,
  `Alasan` int(25) NOT NULL,
  `Wali Kelas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gendeng`
--

CREATE TABLE `gendeng` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umur` int(11) NOT NULL,
  `kelas` varchar(11) NOT NULL,
  `alasan` varchar(200) NOT NULL,
  `walikelas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gendeng`
--

INSERT INTO `gendeng` (`id`, `nama`, `umur`, `kelas`, `alasan`, `walikelas`) VALUES
(27, 'Muhammad Faiz Abdillah', 17, 'XII TJ', 'Karena Suka Kamu', 'MARYULI DARMAWAN, S.Pd,S.ST,M.Eng'),
(124, 'Muhammad Zulfikar Madani', 17, 'XII TJ', 'Karena suka game ketika guru sedang menerangkan materi', 'Marilia Dwi Ratna S,Pd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datasisswa`
--
ALTER TABLE `datasisswa`
  ADD PRIMARY KEY (`Nama`);

--
-- Indexes for table `gendeng`
--
ALTER TABLE `gendeng`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gendeng`
--
ALTER TABLE `gendeng`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
