-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 04:39 PM
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
-- Database: `lost_and_found`
--

-- --------------------------------------------------------

--
-- Table structure for table `locfilter`
--

CREATE TABLE `locfilter` (
  `id` int(11) NOT NULL,
  `filt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `locfilter`
--

INSERT INTO `locfilter` (`id`, `filt`) VALUES
(0, 'Oval'),
(1, 'Academic Bldg. 1'),
(2, 'Academic Bldg. 2'),
(3, 'Academic Bldg. 3'),
(4, 'HPSB'),
(5, 'Admin Bldg.');

-- --------------------------------------------------------

--
-- Table structure for table `lost_items`
--

CREATE TABLE `lost_items` (
  `id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `place_found` varchar(255) NOT NULL,
  `time_found` varchar(255) DEFAULT NULL,
  `day_received` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lost_items`
--

INSERT INTO `lost_items` (`id`, `place_id`, `time_id`, `image_path`, `item_name`, `place_found`, `time_found`, `day_received`) VALUES
(32, 0, 12, 'uploads/bang.jpg', 'Bang', 'Oval', 'Evening', NULL),
(33, 4, 11, 'uploads/car.jpg', 'Car', 'HPSB', 'Afternoon', NULL),
(34, 3, 10, 'uploads/5.jpg', 'Nut', 'Academic Bldg. 3', 'Morning', NULL),
(35, 5, 12, 'uploads/1.jpg', 'Fisheye', 'Admin Bldg.', 'Evening', NULL),
(36, 2, 10, 'uploads/2.jpg', 'mask', 'Academic Bldg. 2', 'Morning', NULL),
(37, 1, 11, 'uploads/3.jpg', 'Kirby', 'Academic Bldg. 1', 'Afternoon', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timefilter`
--

CREATE TABLE `timefilter` (
  `id` int(11) NOT NULL,
  `time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timefilter`
--

INSERT INTO `timefilter` (`id`, `time`) VALUES
(10, 'Morning'),
(11, 'Afternoon'),
(12, 'Evening');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locfilter`
--
ALTER TABLE `locfilter`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `lost_items`
--
ALTER TABLE `lost_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timefilter`
--
ALTER TABLE `timefilter`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lost_items`
--
ALTER TABLE `lost_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
