-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 04:31 AM
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
-- Table structure for table `p_jobpost`
--

CREATE TABLE `p_jobpost` (
  `p_jobpost_id` int(11) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `educBg` varchar(255) NOT NULL,
  `yrsExperience` varchar(255) NOT NULL,
  `workLocation` varchar(255) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `slot` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `question1` varchar(225) NOT NULL,
  `question2` varchar(225) NOT NULL,
  `question3` varchar(225) NOT NULL,
  `question4` varchar(225) NOT NULL,
  `question5` varchar(225) NOT NULL,
  `answer1` varchar(225) NOT NULL,
  `answer2` varchar(225) NOT NULL,
  `answer3` varchar(225) NOT NULL,
  `answer4` varchar(225) NOT NULL,
  `answer5` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_jobpost`
--

INSERT INTO `p_jobpost` (`p_jobpost_id`, `companyName`, `industry`, `position`, `educBg`, `yrsExperience`, `workLocation`, `jobTitle`, `slot`, `salary`, `skills`, `question1`, `question2`, `question3`, `question4`, `question5`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`) VALUES
(8, 'Capstone Company', 'Technology', 'staff', 'IT graduate', '2', 'Santa Rosa', 'Developer', 10, 50000, 'php, html, css, js', '', '', '', '', '', '', '', '', '', ''),
(9, 'Capstone Company', 'Technology', 'staff', 'IT graduate', '2', 'Santa Rosa', 'Developer', 10, 50000, 'php, html, css, js', '', '', '', '', '', '', '', '', '', ''),
(10, 'Capstone Company', 'Technology', 'staff', 'IT graduate', '2', 'Santa Rosa', 'Developer', 10, 50000, 'php, html, css, js', 'a', 'b', 'c', 'd', 'e', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(11, 'Capstone Company', 'Technology', 'staff', 'IT graduate', '2', 'Santa Rosa', 'Developer', 10, 50000, 'php, html, css, js', 'a', 'b', 'c', 'd', 'e', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(12, 'Capstone Company', 'Technology', 'staff', 'IT graduate', '2', 'Santa Rosa', 'Manager', 10, 50000, 'php, html, css, js', 'a', 'b', 'c', 'd', 'e', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `p_jobpost`
--
ALTER TABLE `p_jobpost`
  ADD PRIMARY KEY (`p_jobpost_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `p_jobpost`
--
ALTER TABLE `p_jobpost`
  MODIFY `p_jobpost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
