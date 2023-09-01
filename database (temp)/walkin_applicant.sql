-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2023 at 08:46 PM
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
-- Table structure for table `walkin_applicant`
--

CREATE TABLE `walkin_applicant` (
  `W_applicant_id` int(11) NOT NULL,
  `W_lastName` varchar(50) NOT NULL,
  `W_firstName` varchar(50) NOT NULL,
  `W_midName` varchar(50) NOT NULL,
  `W_suffix` varchar(50) NOT NULL,
  `W_jobseekerType` varchar(50) NOT NULL,
  `W_birthplace` varchar(50) NOT NULL,
  `W_birthday` date NOT NULL,
  `W_age` int(11) NOT NULL,
  `W_sex` varchar(50) NOT NULL,
  `W_civilStatus` varchar(50) NOT NULL,
  `W_citizenship` varchar(50) NOT NULL,
  `W_housenumPresent` varchar(50) NOT NULL,
  `W_brgyPresent` varchar(50) NOT NULL,
  `W_cityPresent` varchar(50) NOT NULL,
  `W_provincePresent` varchar(50) NOT NULL,
  `W_housenumPermanent` varchar(50) DEFAULT NULL,
  `W_brgyPermanent` varchar(50) NOT NULL,
  `W_cityPermanent` varchar(50) NOT NULL,
  `W_provincePermanent` varchar(50) NOT NULL,
  `W_height` int(11) NOT NULL,
  `W_weight` int(11) NOT NULL,
  `W_landlineNum` int(11) NOT NULL,
  `W_mobilePnum` int(11) NOT NULL,
  `W_mobileSnum` int(11) NOT NULL,
  `W_email` varchar(50) NOT NULL,
  `W_disability` varchar(50) NOT NULL,
  `W_employmentStatus` varchar(50) NOT NULL,
  `W_educLevel` varchar(50) NOT NULL,
  `W_gradYear` int(4) NOT NULL,
  `W_school` varchar(50) NOT NULL,
  `W_course` varchar(50) NOT NULL,
  `W_preferIndustry` varchar(50) NOT NULL,
  `W_activelyLooking` varchar(50) NOT NULL,
  `W_willinglyWork` varchar(50) NOT NULL,
  `W_fourPsBeneficiary` varchar(50) NOT NULL,
  `W_ofw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `walkin_applicant`
--

INSERT INTO `walkin_applicant` (`W_applicant_id`, `W_lastName`, `W_firstName`, `W_midName`, `W_suffix`, `W_jobseekerType`, `W_birthplace`, `W_birthday`, `W_age`, `W_sex`, `W_civilStatus`, `W_citizenship`, `W_housenumPresent`, `W_brgyPresent`, `W_cityPresent`, `W_provincePresent`, `W_housenumPermanent`, `W_brgyPermanent`, `W_cityPermanent`, `W_provincePermanent`, `W_height`, `W_weight`, `W_landlineNum`, `W_mobilePnum`, `W_mobileSnum`, `W_email`, `W_disability`, `W_employmentStatus`, `W_educLevel`, `W_gradYear`, `W_school`, `W_course`, `W_preferIndustry`, `W_activelyLooking`, `W_willinglyWork`, `W_fourPsBeneficiary`, `W_ofw`) VALUES
(6, 'a', 'a', 'a', 'a', 'jobseeker', '', '0000-00-00', 0, '', '', '', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0, '', '', '', '', '', '', ''),
(7, 'a', 'a', 'a', 'a', 'first_time', 'a', '0000-00-00', 0, 'a', 'a', 'a', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, 0, 'a', '', '', '', 0, '', '', '', '', '', '', ''),
(8, 'm', 'm', 'm', 'm', 'first_time', 'm', '1999-08-25', 25, 'm', 'm', 'm', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, 0, 'm', '', '', '', 0, '', '', '', '', '', '', ''),
(9, 'r', 't', 't', 't', 'first_time', 't', '2000-02-12', 36, 'Female', 'Single', 't', 't', 't', 't', 't', 't', 't', 't', 't', 123, 123, 123, 123, 0, 'tt', 'none', 'wage_employed', 't', 2023, 't', 't', 't', 'yes', 'yes', 'yes', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `walkin_applicant`
--
ALTER TABLE `walkin_applicant`
  ADD PRIMARY KEY (`W_applicant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `walkin_applicant`
--
ALTER TABLE `walkin_applicant`
  MODIFY `W_applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
