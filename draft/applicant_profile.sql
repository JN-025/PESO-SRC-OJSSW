-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 09:04 PM
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
-- Table structure for table `applicant_profile`
--

CREATE TABLE `applicant_profile` (
  `applicant_profile_id` int(11) NOT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `peso_id` int(11) DEFAULT NULL,
  `ap_info_id` int(11) NOT NULL,
  `ap_educ_id` int(11) NOT NULL,
  `ap_prefer_id` int(11) NOT NULL,
  `ap_tvo_id` int(11) NOT NULL,
  `ap_elig_id` int(11) NOT NULL,
  `ap_exp_id` int(11) NOT NULL,
  `ap_skills_id` int(11) NOT NULL,
  `date_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant_profile`
--
ALTER TABLE `applicant_profile`
  ADD PRIMARY KEY (`applicant_profile_id`),
  ADD KEY `applicant_id_pk` (`applicant_id`),
  ADD KEY `ap_info_id_pk` (`ap_info_id`),
  ADD KEY `ap_educ_id_pk` (`ap_educ_id`),
  ADD KEY `ap_prefer_id_pk` (`ap_prefer_id`),
  ADD KEY `ap_tvo_id_pk` (`ap_tvo_id`),
  ADD KEY `ap_elig_id_pk` (`ap_elig_id`),
  ADD KEY `ap_exp_id_pk` (`ap_exp_id`),
  ADD KEY `ap_skills_id_pk` (`ap_skills_id`),
  ADD KEY `peso_id_pk` (`peso_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant_profile`
--
ALTER TABLE `applicant_profile`
  MODIFY `applicant_profile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicant_profile`
--
ALTER TABLE `applicant_profile`
  ADD CONSTRAINT `ap_educ_id_pk` FOREIGN KEY (`ap_educ_id`) REFERENCES `ap_educ` (`a_profile2_id`),
  ADD CONSTRAINT `ap_elig_id_pk` FOREIGN KEY (`ap_elig_id`) REFERENCES `ap_elig` (`a_profile5_id`),
  ADD CONSTRAINT `ap_exp_id_pk` FOREIGN KEY (`ap_exp_id`) REFERENCES `ap_exp` (`a_profile6_id`),
  ADD CONSTRAINT `ap_info_id_pk` FOREIGN KEY (`ap_info_id`) REFERENCES `ap_info` (`a_profile1_id`),
  ADD CONSTRAINT `ap_prefer_id_pk` FOREIGN KEY (`ap_prefer_id`) REFERENCES `ap_prefer` (`a_profile3_id`),
  ADD CONSTRAINT `ap_skills_id_pk` FOREIGN KEY (`ap_skills_id`) REFERENCES `ap_skills` (`a_profile7_id`),
  ADD CONSTRAINT `ap_tvo_id_pk` FOREIGN KEY (`ap_tvo_id`) REFERENCES `ap_tvo` (`a_profile4_id`),
  ADD CONSTRAINT `applicant_id_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`),
  ADD CONSTRAINT `peso_id_pk` FOREIGN KEY (`peso_id`) REFERENCES `p_accounttb` (`peso_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
