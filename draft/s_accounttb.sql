-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 05:13 PM
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
-- Table structure for table `s_accounttb`
--

CREATE TABLE `s_accounttb` (
  `spes_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `age` int(90) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `contactNum` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `appForm_front_img` text DEFAULT NULL,
  `appForm_back_img` text DEFAULT NULL,
  `birthCert_img` text DEFAULT NULL,
  `voterID_img` text DEFAULT NULL,
  `indigencyCert_img` text DEFAULT NULL,
  `regCard_img` text DEFAULT NULL,
  `classCard_img` text DEFAULT NULL,
  `goodMoral_img` text DEFAULT NULL,
  `classCard_osy_img` text DEFAULT NULL,
  `type` varchar(55) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date_added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `s_accounttb`
--

INSERT INTO `s_accounttb` (`spes_id`, `firstname`, `lastname`, `age`, `sex`, `contactNum`, `email`, `password`, `appForm_front_img`, `appForm_back_img`, `birthCert_img`, `voterID_img`, `indigencyCert_img`, `regCard_img`, `classCard_img`, `goodMoral_img`, `classCard_osy_img`, `type`, `status`, `date_added_at`) VALUES
(1, 'JN', 'Camposano', 22, 'Female', '0912-345-67', 'jncamposano@gmail.com', 'Password_123', 'requirement_storage/Job Fairs.png', NULL, 'requirement_storage/Training.png', 'requirement_storage/Training.png', 'requirement_storage/Job Fairs.png', 'requirement_storage/Job Fairs.png', 'requirement_storage/Career.png', NULL, NULL, 'Student', 'Approved', '2023-12-15 05:07:22'),
(2, 'JN', 'Camposano', 22, 'Female', '0912-345-67', 'jncamposano@gmail.com', 'Password_123', 'requirement_storage/Job Fairs.png', NULL, 'requirement_storage/Training.png', 'requirement_storage/Training.png', 'requirement_storage/Job Fairs.png', 'requirement_storage/Job Fairs.png', 'requirement_storage/Career.png', NULL, NULL, 'Student', 'Pending', '2023-12-15 05:00:12'),
(3, 'Justine', 'Camposano', 22, 'Female', '0912-345-67', 'jncamposano123@gmail.com', 'Password_123', 'requirement_storage/Career.png', NULL, 'requirement_storage/Training.png', 'requirement_storage/Training.png', 'requirement_storage/Job Fairs.png', 'requirement_storage/Career.png', 'requirement_storage/Training.png', NULL, NULL, 'Student', 'Approved', '2023-12-15 05:44:42'),
(4, 's123', 'ss12sff', 22, 'Male', '0912-345-67', 'aaccessone1@gmail.com', 'Asdfg_123', 'requirement_storage/Career.png', NULL, 'requirement_storage/Job Fairs.png', 'requirement_storage/Training.png', 'requirement_storage/Job Fairs.png', 'requirement_storage/Training.png', 'requirement_storage/Career.png', NULL, NULL, 'Student', 'Approved', '2023-12-15 13:04:23'),
(5, 'dsd556', 'sdsf2115', 22, 'Female', '0912-345-67', 'aaccessone1@gmail.com', 'Asdfg_123', 'requirement_storage/Training.png', NULL, 'requirement_storage/Career.png', 'requirement_storage/Training.png', 'requirement_storage/Career.png', 'requirement_storage/Career.png', 'requirement_storage/Training.png', NULL, NULL, 'Student', 'Pending', '2023-12-15 06:15:35'),
(6, 'Justine', 'Camposano', 22, 'Female', '0912-345-67', 'jncamposano@gmail.com', 'Justine_123', 'requirement_storage/Career.png', NULL, 'requirement_storage/Job Fairs.png', 'requirement_storage/About peso.png', 'requirement_storage/SPES.png', 'requirement_storage/City Hall.png', 'requirement_storage/Spes pic.png', NULL, NULL, 'Student', 'Rejected', '2023-12-15 16:00:54'),
(7, 'Nicole', 'Camposano', 22, 'Female', '0912-345-67', 'jncamposano@gmail.com', 'Nicole_1123', 'requirement_storage/Career.png', NULL, 'requirement_storage/Job Fairs.png', 'requirement_storage/About peso.png', 'requirement_storage/SPES.png', 'requirement_storage/City Hall.png', 'requirement_storage/Spes pic.png', NULL, NULL, 'Student', 'Pending', '2023-12-15 16:03:17'),
(8, 'Justine Nicole', 'Camposano', 22, 'Female', '0912-345-67', 'jncamposano@gmail.com', 'Justine_123', 'requirement_storage/Spes pic.png', 'requirement_storage/City Hall.png', 'requirement_storage/SPES.png', 'requirement_storage/About peso.png', 'requirement_storage/Job Fairs.png', 'requirement_storage/Training.png', 'requirement_storage/Career.png', NULL, NULL, 'Student', 'Approved', '2023-12-15 16:09:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `s_accounttb`
--
ALTER TABLE `s_accounttb`
  ADD PRIMARY KEY (`spes_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `s_accounttb`
--
ALTER TABLE `s_accounttb`
  MODIFY `spes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
