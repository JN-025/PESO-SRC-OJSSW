-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 10:14 AM
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
-- Database: `peso_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `p_accounttb`
--

CREATE TABLE `p_accounttb` (
  `peso_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(255) NOT NULL,
  `contactNum` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_added_at` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `p_accounttb`
--

INSERT INTO `p_accounttb` (`peso_id`, `name`, `position`, `contactNum`, `email`, `password`, `date_added_at`, `status`) VALUES
(11, 'sample', 'staff', '1', 'sample@gmail.com', 'sample', '2023-12-13', 'Approved'),
(13, 'admin', 'admin', '912', 'sample@gmail.com', 'Just_password123', '2023-12-05', 'Approved'),
(14, 'Sample Three', 'head', '912', 'samplethree3@gmail.com', 'SampleThree_3', '2023-12-13', 'Approved'),
(18, 'Sample Lang', 'staff', '0912-345-67', 'samplelang@gmail.com', 'Just_password123', '2023-12-13', 'Approved'),
(19, 'spam sample', 'staff', '0912-345-67', 'spamsample@gmail.com', 'Just_password123', '2023-12-13', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p_accounttb`
--
ALTER TABLE `p_accounttb`
  ADD PRIMARY KEY (`peso_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p_accounttb`
--
ALTER TABLE `p_accounttb`
  MODIFY `peso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
