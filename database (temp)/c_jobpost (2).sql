-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2023 at 03:43 PM
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
-- Table structure for table `c_jobpost`
--

CREATE TABLE `c_jobpost` (
  `c_jobpost_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
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
  `answer5` varchar(225) NOT NULL,
  `img` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c_jobpost`
--

INSERT INTO `c_jobpost` (`c_jobpost_id`, `company_id`, `companyName`, `industry`, `position`, `educBg`, `yrsExperience`, `workLocation`, `jobTitle`, `slot`, `salary`, `skills`, `question1`, `question2`, `question3`, `question4`, `question5`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `img`, `date_added`) VALUES
(15, 7, 'Mitsubishi', 'Automotive Chemical Electronics Food Financial Metallurgy Mining Petroleum', 'Assistant Manager', 'College Graduate', '5', 'Santa Rosa', 'Assistant Manager', 1, 15000, 'Communication', 'question', 'question', 'question', 'question', 'question', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '../jobpost_img/mitsubishi.png', '2023-09-10 10:16:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c_jobpost`
--
ALTER TABLE `c_jobpost`
  ADD PRIMARY KEY (`c_jobpost_id`),
  ADD KEY `c_jobpost_pk` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `c_jobpost`
--
ALTER TABLE `c_jobpost`
  MODIFY `c_jobpost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `c_jobpost`
--
ALTER TABLE `c_jobpost`
  ADD CONSTRAINT `c_jobpost_pk` FOREIGN KEY (`company_id`) REFERENCES `c_accounttb` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
