-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 01:33 PM
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
-- Table structure for table `c_requests`
--

CREATE TABLE `c_requests` (
  `company_id` int(11) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `contactPerson` varchar(255) NOT NULL,
  `contactNum` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `c_requests`
--

INSERT INTO `c_requests` (`company_id`, `companyName`, `industry`, `contactPerson`, `contactNum`, `email`, `password`, `message`, `date`) VALUES
(12, 'Capstone Company', 'IT', 'Juan Dela Cruz', '0912-345-67', 'juandelacruz123@gmail.com', 'JuanDelaCruz_123', 'Our Capstone Company would like to request an account.', '2023-09-08 16:19:39'),
(15, '', 'IT', 'Company Two', '0912-345-67', 'companytwo2@gmail.com', 'CompanyTwo_2', 'Company Two would like to request an account.', '2023-09-13 10:30:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c_requests`
--
ALTER TABLE `c_requests`
  ADD PRIMARY KEY (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `c_requests`
--
ALTER TABLE `c_requests`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
