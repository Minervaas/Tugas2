-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2025 at 05:09 PM
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
-- Database: `tugas2`
--

-- --------------------------------------------------------

--
-- Table structure for table `keluhan_data`
--

CREATE TABLE `keluhan_data` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keluhan` text NOT NULL,
  `masukan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keluhan_data`
--

INSERT INTO `keluhan_data` (`id`, `nama`, `keluhan`, `masukan`) VALUES
(1, 'ww', 'ww', 'ww');

-- --------------------------------------------------------

--
-- Table structure for table `rating_feedback`
--

CREATE TABLE `rating_feedback` (
  `id` int(11) NOT NULL,
  `keluhan_id` int(11) NOT NULL,
  `rating` int(2) NOT NULL,
  `puas` enum('Ya','Tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating_feedback`
--

INSERT INTO `rating_feedback` (`id`, `keluhan_id`, `rating`, `puas`) VALUES
(1, 1, 10, 'Ya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keluhan_data`
--
ALTER TABLE `keluhan_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating_feedback`
--
ALTER TABLE `rating_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keluhan_id` (`keluhan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keluhan_data`
--
ALTER TABLE `keluhan_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rating_feedback`
--
ALTER TABLE `rating_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rating_feedback`
--
ALTER TABLE `rating_feedback`
  ADD CONSTRAINT `rating_feedback_ibfk_1` FOREIGN KEY (`keluhan_id`) REFERENCES `keluhan_data` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
