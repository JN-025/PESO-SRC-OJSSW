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
-- Table structure for table `profiling_task`
--

CREATE TABLE `profiling_task` (
  `profiling_id` int(11) NOT NULL,
  `spes_id` int(11) NOT NULL,
  `householdNum` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(90) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `civilStatus` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `brgy` varchar(255) NOT NULL,
  `educAttainment` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `employmentStatus` varchar(50) NOT NULL,
  `employmentType` varchar(255) NOT NULL,
  `arrivalDate` date NOT NULL,
  `disabilityType` varchar(255) NOT NULL,
  `encodedBy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profiling_task`
--

INSERT INTO `profiling_task` (`profiling_id`, `spes_id`, `householdNum`, `lastname`, `firstname`, `middlename`, `suffix`, `birthday`, `age`, `sex`, `civilStatus`, `address`, `brgy`, `educAttainment`, `status`, `employmentStatus`, `employmentType`, `arrivalDate`, `disabilityType`, `encodedBy`) VALUES
(22, 4, 2, 'adff', 'fgf', 'sgs', 'dfd', '0000-00-00', 18, 'Male', 'Separated', 'dfhd', 'Malusak', 'fdfd', 'Senior Citizen', 'Kasambahay', 'Contractual', '0000-00-00', 'dsd', 'dsdf'),
(31, 1, 4, 'Crown', 'sample', '', '', '0000-00-00', 18, 'Male', 'Widow', 'q', 'Pook', 'fdfd', 'Senior Citizen', 'Unemployed', '', '0000-00-00', '', 'jn'),
(32, 1, 8, 'Crown', 'sample', 'Antenor', '', '0000-00-00', 18, 'Female', 'Single', 'w', 'Market Area', 'a', 'Senior Citizen', 'Unemployed', '', '0000-00-00', '', 'a'),
(33, 1, 10, 'Camposano', 'JN', 'Antenor', '', '0000-00-00', 22, 'Female', 'Single', 'Santa Rosa, Laguna', 'Tagapo', 'hs', 'Student', 'Employed', '', '0000-00-00', '', 'jn'),
(34, 1, 10, 'Camposano', 'JN', 'Antenor', '', '0000-00-00', 22, 'Female', 'Single', 'Santa Rosa, Laguna', 'Tagapo', 'hs', 'Student', 'Unemployed', '', '0000-00-00', '', 'jn'),
(35, 1, 10, 'Camposano', 'JN', 'Antenor', '', '2001-10-25', 22, 'Female', 'Single', 'Santa Rosa, Laguna', 'Tagapo', 'hs', 'Student', 'Employed', '', '0000-00-00', '', 'jn'),
(36, 1, 10, 'Camposano', 'JN', 'Antenor', '', '2001-10-25', 22, 'Female', 'Single', 'Santa Rosa, Laguna', 'Tagapo', 'hs', 'Student', 'Unemployed', '', '0000-00-00', '', 'jn'),
(38, 8, 15, 'a', 'sample', '', '', '2000-10-10', 22, 'Male', 'Widow', 'w', 'Pulong Santa Cruz', 'hs', 'Student', 'Employed', 'Contractual', '0000-00-00', '', 'dsdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiling_task`
--
ALTER TABLE `profiling_task`
  ADD PRIMARY KEY (`profiling_id`),
  ADD KEY `profilingtask_pk` (`spes_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profiling_task`
--
ALTER TABLE `profiling_task`
  MODIFY `profiling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profiling_task`
--
ALTER TABLE `profiling_task`
  ADD CONSTRAINT `profilingtask_pk` FOREIGN KEY (`spes_id`) REFERENCES `s_accounttb` (`spes_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
