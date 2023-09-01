-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 08:46 PM
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
-- Database: `peso_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `a_accounttb`
--

CREATE TABLE `a_accounttb` (
  `applicant_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `age` int(90) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `Pnum` int(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_img` text NOT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT 0,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a_accounttb`
--

INSERT INTO `a_accounttb` (`applicant_id`, `lastname`, `firstname`, `middlename`, `age`, `sex`, `Pnum`, `email`, `password`, `profile_img`, `verification_code`, `email_verified`, `code`) VALUES
(48, 'sample', 'sample', '', 31, 'Male', 2147483647, 'sample@gmail.com', 'password123', '', NULL, 0, ''),
(50, 'asdas', 'asdas', '', 45, 'Female', 2147483647, 'sample123@gmail.com', '456', '', NULL, 0, ''),
(51, 'sdf', 'sdf', '', 22, 'Female', 2147483647, 'sdfsdgd@gmail.com', 'qweqwe', '', NULL, 0, ''),
(52, 'adfa', 'fadf', '', 34, 'Male', 945634624, 'skgjhsljasdask@yahoo.com', 'qwerty', '', NULL, 0, ''),
(69, 'Manguerra', 'Rebo', '', 21, 'Male', 2147483647, 'rebrebmanguerra@gmail.com', 'password123', '', NULL, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_accounttb`
--
ALTER TABLE `a_accounttb`
  ADD PRIMARY KEY (`applicant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_accounttb`
--
ALTER TABLE `a_accounttb`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
