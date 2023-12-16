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
-- Table structure for table `c_accounttb`
--

CREATE TABLE `c_accounttb` (
  `company_id` int(11) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `contactPerson` varchar(50) NOT NULL,
  `contactNum` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `c_accounttb`
--

INSERT INTO `c_accounttb` (`company_id`, `companyName`, `industry`, `contactPerson`, `contactNum`, `email`, `type`, `password`) VALUES
(1, ' Juan Dela Cruz', 'head', '', 0, 'juandelacruz123@gmail.com', 'admin', 'JuanDelaCruz_123'),
(4, 'Jeremy', 'Ruta', '', 0, 'jeremyruta@isda.com', 'user', 'jeremy'),
(5, 'super', 'admin', '', 0, 'superadmin@gmail.com', 'user', 'SuperAdmin'),
(6, 'sample', 'three', '', 0, 'samplethree@gmail.com', 'user', 'SampleThree'),
(7, 'Sample Four', 'staff', '', 912, 'samplefour4@gmail.com', 'user', 'SampleFour_4'),
(8, 'Sample Five', 'staff', '', 912, 'samplefive_5@gmail.com', 'user', 'SampleFive_5'),
(9, 'Peso One', 'staff', '', 912, 'pesoone1@gmail.com', 'user', 'PesoOne_1'),
(10, 'Company One', 'IT', 'Juan Dela Cruz', 912, 'companyone1@gmail.com', 'user', 'CompanyOne_1'),
(11, 'Company Three', 'IT', 'Company Three', 912, 'companythree3@gmail.com', 'user', 'CompanyThree_3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `c_accounttb`
--
ALTER TABLE `c_accounttb`
  ADD PRIMARY KEY (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `c_accounttb`
--
ALTER TABLE `c_accounttb`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
