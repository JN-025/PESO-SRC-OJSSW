-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2023 at 06:49 PM
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
-- Table structure for table `access_account`
--

CREATE TABLE `access_account` (
  `access_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `date_added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `access_account`
--

INSERT INTO `access_account` (`access_id`, `peso_id`, `name`, `email`, `type`, `password`, `date_added_at`, `status`) VALUES
(6, 11, 'sample', 'sample@gmail.com', 'Applicant', 'sample', '2023-12-13 12:23:30', 'Approved'),
(8, 11, 'sample', 'sample@gmail.com', 'Company', 'sample', '2023-12-13 16:26:40', 'Approved'),
(10, 11, 'sample', 'sample@gmail.com', 'Applicant', 'sample', '2023-12-13 12:22:29', 'Approved'),
(12, 11, 'sample', 'sample123@yahoo.com', '', 'Just_password123', '2023-12-13 12:22:29', 'Pending'),
(13, 11, 'juan', 'juan@yahoo.com', 'Training', 'Just_password123', '2023-12-13 12:22:29', 'Pending'),
(14, 11, 'Rebo Manguerra', 'rebomanguerra@gmail.com', 'Training', 'Just_password123', '2023-12-16 12:16:38', 'Approved'),
(15, 11, 'Juan Dela Cruz', 'Juan@gmail.com', 'Training', 'Just_password123', '2023-12-13 12:22:29', 'Pending'),
(16, 11, 'paaccess sa company', 'company@gmail.com', 'Company', 'sample', '2023-12-13 12:22:29', 'Pending'),
(17, 11, 'sample', 'sample@gmail.com', 'Training', '$2y$10$0ieZA8I8zRgFiB.MmJuwheBImWbNKpxuE7sm0JI9B5V7cLbCC4w02', '2023-12-17 13:38:59', 'Approved'),
(18, 11, 'pesotraining', 'peso@gmail.com', 'Training', '$2y$10$n13y99kjpvqrNRVDhmxzTe9p6U2XMBtewuxyXSdIvk32LK14P1tga', '2023-12-17 14:00:46', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `lastname`, `firstname`, `middlename`, `email`, `password`) VALUES
(1, 'Manguerra', 'Rebo', 'Barrameda', 'pesoadmin@gmail.com', 'peso_Admin2023');

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
  `ap_auth_id` int(11) NOT NULL,
  `date_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_profile`
--

INSERT INTO `applicant_profile` (`applicant_profile_id`, `applicant_id`, `peso_id`, `ap_info_id`, `ap_educ_id`, `ap_prefer_id`, `ap_tvo_id`, `ap_elig_id`, `ap_exp_id`, `ap_skills_id`, `ap_auth_id`, `date_created_at`, `type`) VALUES
(14, 4, NULL, 17, 17, 17, 17, 14, 74, 14, 14, '2023-12-17 16:22:39', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_roles`
--

CREATE TABLE `applicant_roles` (
  `applicant_roles_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_roles`
--

INSERT INTO `applicant_roles` (`applicant_roles_id`, `role`) VALUES
(1, 'First Time Jobseeker'),
(2, 'Jobseeker'),
(3, 'OFW');

-- --------------------------------------------------------

--
-- Table structure for table `application_log`
--

CREATE TABLE `application_log` (
  `application_log_id` int(11) NOT NULL,
  `jobpost_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `date_added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL,
  `answerNo1` varchar(20) NOT NULL,
  `answerNo2` varchar(20) NOT NULL,
  `answerNo3` varchar(20) NOT NULL,
  `answerNo4` varchar(20) NOT NULL,
  `answerNo5` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_log`
--

INSERT INTO `application_log` (`application_log_id`, `jobpost_id`, `applicant_id`, `date_added_at`, `status`, `answerNo1`, `answerNo2`, `answerNo3`, `answerNo4`, `answerNo5`) VALUES
(42, 40, 4, '2023-12-17 16:38:43', 'Approved', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `ap_auth`
--

CREATE TABLE `ap_auth` (
  `a_profile8_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `sign_img` varchar(255) NOT NULL,
  `date_submitted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ap_auth`
--

INSERT INTO `ap_auth` (`a_profile8_id`, `applicant_id`, `sign_img`, `date_submitted_at`) VALUES
(14, 4, '../assets/img/applicant/signature_img/cityhall (1).png', '2023-12-18');

-- --------------------------------------------------------

--
-- Table structure for table `ap_educ`
--

CREATE TABLE `ap_educ` (
  `a_profile2_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `schoolStatus` varchar(50) NOT NULL,
  `educLevel` varchar(50) NOT NULL,
  `gradYear` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `award` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ap_educ`
--

INSERT INTO `ap_educ` (`a_profile2_id`, `applicant_id`, `schoolStatus`, `educLevel`, `gradYear`, `school`, `course`, `award`) VALUES
(17, 4, 'yes', 'High School Graduate', '2019-06-06', 'Polytechnic University of the Philippines', 'Bachelor of Science in Information and Technology', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `ap_elig`
--

CREATE TABLE `ap_elig` (
  `a_profile5_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `careerServ1` varchar(50) NOT NULL,
  `licenceNum1` varchar(50) NOT NULL,
  `expiryDate1` varchar(50) NOT NULL,
  `careerServ2` varchar(50) NOT NULL,
  `licenceNum2` varchar(50) NOT NULL,
  `expiryDate2` varchar(50) NOT NULL,
  `careerServ3` varchar(50) NOT NULL,
  `licenceNum3` varchar(50) NOT NULL,
  `expiryDate3` varchar(50) NOT NULL,
  `validDate` varchar(50) NOT NULL,
  `languageCertifications` varchar(50) NOT NULL,
  `otherCertification` varchar(50) NOT NULL,
  `dialectsSpoken` varchar(50) NOT NULL,
  `otherDialect` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ap_elig`
--

INSERT INTO `ap_elig` (`a_profile5_id`, `applicant_id`, `careerServ1`, `licenceNum1`, `expiryDate1`, `careerServ2`, `licenceNum2`, `expiryDate2`, `careerServ3`, `licenceNum3`, `expiryDate3`, `validDate`, `languageCertifications`, `otherCertification`, `dialectsSpoken`, `otherDialect`) VALUES
(14, 4, 'Microsoft Certified: Azure Developer Associate', '2346578576', '2030-04-20', '', '', '', '', '', '', '2025-02-23', 'IELTS', '', 'tagalog', '');

-- --------------------------------------------------------

--
-- Table structure for table `ap_exp`
--

CREATE TABLE `ap_exp` (
  `a_profile6_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `cpAddress` varchar(255) NOT NULL,
  `position` varchar(50) NOT NULL,
  `startincluDate` date NOT NULL,
  `endincluDate` date NOT NULL,
  `appointStat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ap_exp`
--

INSERT INTO `ap_exp` (`a_profile6_id`, `applicant_id`, `company`, `cpAddress`, `position`, `startincluDate`, `endincluDate`, `appointStat`) VALUES
(72, 4, 'Senior Systems Analyst', 'Makati City, Philippines', 'Senior Systems Analyst', '2019-05-21', '2021-04-02', 'part_time'),
(73, 4, 'Senior Systems Analyst', 'Makati City, Philippines', 'Senior Systems Analyst', '2019-05-21', '2021-04-02', 'part_time'),
(74, 4, 'Senior Systems Analyst', 'Makati City, Philippines', 'Senior Systems Analyst', '2019-05-21', '2021-04-02', 'part_time');

-- --------------------------------------------------------

--
-- Table structure for table `ap_info`
--

CREATE TABLE `ap_info` (
  `a_profile1_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `midName` varchar(50) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `jobseekerType` varchar(50) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `civilStatus` varchar(50) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `housenumPresent` varchar(50) NOT NULL,
  `subdPresent` varchar(50) NOT NULL,
  `brgyPresent` varchar(50) NOT NULL,
  `cityPresent` varchar(50) NOT NULL,
  `provincePresent` varchar(50) NOT NULL,
  `housenumPermanent` varchar(50) DEFAULT NULL,
  `subdPermanent` varchar(50) NOT NULL,
  `brgyPermanent` varchar(50) NOT NULL,
  `cityPermanent` varchar(50) NOT NULL,
  `provincePermanent` varchar(50) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `mobilePnum` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `disability` varchar(50) NOT NULL,
  `employmentStatus` varchar(50) NOT NULL,
  `activelyLooking` varchar(50) NOT NULL,
  `willinglyWork` varchar(50) NOT NULL,
  `fourPsBeneficiary` varchar(50) NOT NULL,
  `ofw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ap_info`
--

INSERT INTO `ap_info` (`a_profile1_id`, `applicant_id`, `lastName`, `firstName`, `midName`, `suffix`, `jobseekerType`, `birthplace`, `birthday`, `age`, `sex`, `civilStatus`, `citizenship`, `housenumPresent`, `subdPresent`, `brgyPresent`, `cityPresent`, `provincePresent`, `housenumPermanent`, `subdPermanent`, `brgyPermanent`, `cityPermanent`, `provincePermanent`, `height`, `weight`, `mobilePnum`, `email`, `disability`, `employmentStatus`, `activelyLooking`, `willinglyWork`, `fourPsBeneficiary`, `ofw`) VALUES
(17, 4, 'Manguerra', 'Rebo', 'Barrameda', '', 'first time', 'Santa Rosa City, Laguna', '2001-09-11', 22, 'Male', 'Single', 'Filipino', '999', 'St. John', 'Ibaba', 'Santa Rosa', 'Laguna', '999', 'St. John', 'Ibaba', 'Santa Rosa', 'Laguna', 168, 55, '0912-345-67', 'rebrebmanguerra@gmail.com', 'None', 'Fresh Graduate', 'yes', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `ap_prefer`
--

CREATE TABLE `ap_prefer` (
  `a_profile3_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `occupation1` varchar(50) NOT NULL,
  `industry1` varchar(50) NOT NULL,
  `occupation2` varchar(50) NOT NULL,
  `industry2` varchar(50) NOT NULL,
  `occupation3` varchar(50) NOT NULL,
  `industry3` varchar(50) NOT NULL,
  `employment_status` varchar(50) NOT NULL,
  `location1` varchar(50) NOT NULL,
  `location2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ap_prefer`
--

INSERT INTO `ap_prefer` (`a_profile3_id`, `applicant_id`, `occupation1`, `industry1`, `occupation2`, `industry2`, `occupation3`, `industry3`, `employment_status`, `location1`, `location2`) VALUES
(17, 4, 'Software Developer', 'Technology/IT Indust', 'Fitness Trainer', 'Health and Wellness ', 'Social Worker', 'Social Services Indu', 'none', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ap_skills`
--

CREATE TABLE `ap_skills` (
  `a_profile7_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `skill` varchar(50) NOT NULL,
  `techSkill` varchar(50) NOT NULL,
  `otherTechskill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ap_skills`
--

INSERT INTO `ap_skills` (`a_profile7_id`, `applicant_id`, `skill`, `techSkill`, `otherTechskill`) VALUES
(14, 4, 'Problem Solving, Decision Making, Social Perceptiv', 'Gardening', '');

-- --------------------------------------------------------

--
-- Table structure for table `ap_tvo`
--

CREATE TABLE `ap_tvo` (
  `a_profile4_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `trainingStatus` varchar(50) NOT NULL,
  `training1` varchar(50) NOT NULL,
  `startDuration1` date NOT NULL,
  `endDuration1` date NOT NULL,
  `training2` varchar(50) NOT NULL,
  `startDuration2` date NOT NULL,
  `endDuration2` date NOT NULL,
  `training3` varchar(50) NOT NULL,
  `startDuration3` date NOT NULL,
  `endDuration3` date NOT NULL,
  `institution1` varchar(50) NOT NULL,
  `certificate1` varchar(50) NOT NULL,
  `completion1` varchar(50) NOT NULL,
  `institution2` varchar(50) NOT NULL,
  `certificate2` varchar(50) NOT NULL,
  `completion2` varchar(50) NOT NULL,
  `institution3` varchar(50) NOT NULL,
  `certificate3` varchar(50) NOT NULL,
  `completion3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ap_tvo`
--

INSERT INTO `ap_tvo` (`a_profile4_id`, `applicant_id`, `trainingStatus`, `training1`, `startDuration1`, `endDuration1`, `training2`, `startDuration2`, `endDuration2`, `training3`, `startDuration3`, `endDuration3`, `institution1`, `certificate1`, `completion1`, `institution2`, `certificate2`, `completion2`, `institution3`, `certificate3`, `completion3`) VALUES
(17, 4, '', 'Full Stack Web Development Bootcamp', '2023-12-10', '2023-12-20', 'Full Stack Web Development Bootcamp', '2023-12-10', '2023-12-20', 'Full Stack Web Development Bootcamp', '2023-12-10', '2023-12-20', 'Code Academy', 'none', 'yes', 'Code Academy', 'nome', 'yes', 'Code Academy', 'none', 'yes');

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
  `Pnum` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `profile_img` text NOT NULL,
  `email_verified` tinyint(1) DEFAULT 0,
  `code` text NOT NULL,
  `code_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a_accounttb`
--

INSERT INTO `a_accounttb` (`applicant_id`, `lastname`, `firstname`, `middlename`, `age`, `sex`, `Pnum`, `email`, `password`, `profile_img`, `email_verified`, `code`, `code_created_at`) VALUES
(4, 'Manguerra', 'Rebo', '', 23, 'Male', '9123456789', 'rebrebmanguerra@gmail.com', '$2y$10$95ntD/lk.4CjBcUQAte1XeHoRkQqMQEwhOnjmFkfi7C5/40vdrQAq', '', 0, '', '2023-12-17 04:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `c_profile_id` int(11) NOT NULL,
  `companyPname` varchar(50) NOT NULL,
  `industry` varchar(50) NOT NULL,
  `companyRegnum` int(20) NOT NULL,
  `contactNum` int(11) NOT NULL,
  `contactPerson` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `companyAddress` varchar(255) NOT NULL,
  `companyWeb` varchar(255) NOT NULL,
  `companySize` int(11) NOT NULL,
  `workHour` int(11) NOT NULL,
  `dresscode` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL,
  `benefits` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `c_accounttb`
--

CREATE TABLE `c_accounttb` (
  `company_id` int(11) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `contactPerson` varchar(50) NOT NULL,
  `contactNum` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `companyType` varchar(255) NOT NULL,
  `date_added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profile_img` text DEFAULT NULL,
  `bspermit_img` text DEFAULT NULL,
  `dolepermit_img` text DEFAULT NULL,
  `listclients_img` text DEFAULT NULL,
  `dolepermitcase_img` text DEFAULT NULL,
  `poeapermit_img` text DEFAULT NULL,
  `joborder_img` text DEFAULT NULL,
  `jobopening_img` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `c_accounttb`
--

INSERT INTO `c_accounttb` (`company_id`, `companyName`, `industry`, `contactPerson`, `contactNum`, `email`, `type`, `password`, `companyType`, `date_added_at`, `profile_img`, `bspermit_img`, `dolepermit_img`, `listclients_img`, `dolepermitcase_img`, `poeapermit_img`, `joborder_img`, `jobopening_img`, `status`, `code`) VALUES
(28, 'Shakey', 'Fast Food', 'Rebo Manguerra', '912-1234-234', 'rebrebmanguerra@gmail.com', 'Direct', '$2y$10$cYySfXODlA3tSpMU5/.7oeXufIZg4orKWRs2nZ9h0Fx', '', '2023-12-16 17:17:07', 'requirement_storage/side-eye.gif', NULL, 'requirement_storage/side-eye.gif', NULL, NULL, NULL, NULL, 'requirement_storage/side-eye.gif', 'Approved', ''),
(29, 'Mitsubishi', 'Automotive', 'Juan Dela Cruz', '0912-345-6789', 'juandelacruz@gmail.com', 'Local', '$2y$10$gA/phRzyJjgvk5CHXUp.iO8rsWIW0vyd0XDkh75P81N', '', '2023-12-16 17:33:02', 'requirement_storage/profilesample.png', NULL, 'requirement_storage/profilesample.png', 'requirement_storage/profilesample.png', 'requirement_storage/profilesample.png', NULL, NULL, 'requirement_storage/profilesample.png', 'Approved', ''),
(30, 'Pizza Hut', 'Fast Food', 'Rizzal', '0912-345-6789', 'rizzal@gmail.com', 'Local', '$2y$10$y51l2eiK7cPGnUve3i7hPeE2iUq6dKROWJpnoGbYknB', '', '2023-12-16 17:33:08', 'requirement_storage/profilesample.png', NULL, 'requirement_storage/profilesample.png', 'requirement_storage/profilesample.png', 'requirement_storage/profilesample.png', NULL, NULL, 'requirement_storage/profilesample.png', 'Approved', ''),
(32, 'sample', 'sample', 'sample', '0912-345-6787', 'sample@gmail.com', 'Direct', '$2y$10$rbnSsjbmz3njt1CJc/WAVOsHz4HV6jXFv.b81Yf9iO0VFNHg2cBWe', '', '2023-12-17 04:33:11', 'requirement_storage/profilesample.png', NULL, 'requirement_storage/profilesample.png', NULL, NULL, NULL, NULL, 'requirement_storage/profilesample.png', 'Approved', '');

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
  `companyType` varchar(255) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `file` varchar(100) NOT NULL,
  `file2` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `score` int(50) NOT NULL,
  `date_added_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobpost`
--

CREATE TABLE `jobpost` (
  `jobpost_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `access_id` int(11) DEFAULT NULL,
  `companyName` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `educBg` varchar(255) NOT NULL,
  `yrsExperience` varchar(255) NOT NULL,
  `workLocation` varchar(255) NOT NULL,
  `jobTitle` varchar(255) NOT NULL,
  `slot` int(11) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `typeofHiring` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `questionNo1` varchar(225) NOT NULL,
  `questionNo2` varchar(225) NOT NULL,
  `questionNo3` varchar(225) NOT NULL,
  `questionNo4` varchar(225) NOT NULL,
  `questionNo5` varchar(225) NOT NULL,
  `answerNo1` varchar(225) NOT NULL,
  `answerNo2` varchar(225) NOT NULL,
  `answerNo3` varchar(225) NOT NULL,
  `answerNo4` varchar(225) NOT NULL,
  `answerNo5` varchar(225) NOT NULL,
  `img` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobpost`
--

INSERT INTO `jobpost` (`jobpost_id`, `company_id`, `access_id`, `companyName`, `industry`, `position`, `educBg`, `yrsExperience`, `workLocation`, `jobTitle`, `slot`, `salary`, `skills`, `typeofHiring`, `description`, `questionNo1`, `questionNo2`, `questionNo3`, `questionNo4`, `questionNo5`, `answerNo1`, `answerNo2`, `answerNo3`, `answerNo4`, `answerNo5`, `img`, `date_added`) VALUES
(24, 28, NULL, 'Manufacturing / Production\', \'Supervisor', 'Supervisor', 'Supervisor/5 Years & Up Experienced Employee', 'College Graduate', '3 Years', 'Laguna (Sta. Rosa City)', 'Mitsubishi Motors Philippines Corporation', 1, '12000', 'Computer/Information Technology, IT-Software', 'Urgent Hiring', 'Mitsubishi Motors Philippines Corporation (MMPC) (formerly Philippine Automotive Manufacturing Corporation) is the Philippine operation of Mitsubishi Motors Corporation (MMC), where it is the second-biggest seller of automobiles. MMPC is one of MMC\\\'s four manufacturing facilities outside Japan, and currently produces the Mitsubishi Mirage, Mirage G4, and the L300. From 1987 to 2018, MMPC was the distributor of Mitsubishi Fuso commercial vehicles in the Philippines until Sojitz Fuso Philippines Corporation was established in September 2018.', 'Do you manage conflict well?', 'Do you manage pressure well?', 'Are you a goal-oriented employee?', 'Are you a team player?', 'Have you done anything to enhance your skillset?', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '../jobpost_img/shakeys.jpg', '2023-12-17 17:29:32'),
(25, 32, NULL, 'Ginebra San Miguel Inc.', 'Laboratory &amp; Technical Services (Science &amp; Technology)', 'Food Plant operator', 'Chemical Engineering and Chemical Technician license.', '1 Year', 'Cabuyao, Laguna', 'Technical Services Trainee (RChE &amp; RChT)', 1, '30000', 'Chemical Engineering,  Chemical Technician', 'Normal', 'Ginebra San Miguel, Inc. is the world’s largest gin producer by volume as well as the market leader in the domestic hard liquor market, with core products such as Ginebra San Miguel Gin, GSM Blue Gin, Primera Light Brandy and Vino Kulafu. It also produces and sells distilled spirits in Thailand under a joint venture agreement with Thai Life Group of Companies. In addition, Ginebra owns one distillery, three liquor bottling plants, one cassava starch milk plant and five toll bottlers strategically located throughout Philippines and one bottling plant and one distillery in Thailand.', 'Can you handle pressure well?', 'working with diverse teams and cultures.', 'Are you ready to put this company before your own personal interests?', 'Are you okay with the amount of travel required for this position?', 'Do you have experience in business-to-business sales?', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '../jobpost_img/ginebra.jpg', '2023-12-17 06:24:43'),
(40, NULL, 8, 'Monde Nissin Corporation', 'Analysis &amp; Reporting (Sales)', 'Sales Account Planner', 'Graduate of any business course', '2 Years', 'Santa Rosa City, Laguna', 'Sales Account Planner', 3, '25000', 'Must have excellent communication and presentation skills.', 'Normal', 'As a Sales Account Planner, you’re the lead person in providing information systems on sales operations to ensure timely, relevant, and accurate access of information. You will provide a detailed / in-depth analysis and recommendations taking into consideration the internal (PRMS &amp; Cognos) and external sales data available, DPC results, local marketing (below-the-line activities), and/or above-the-line (national) marketing activities, industry both national and local performance vs. company performance, other relevant industries’ performance; coupled with the field reports of the sales force in order to help the AMS/ASM come up with timely business decisions. You will act as the Chief Information Officer in the area.', 'Are you okay with the amount of travel required for this position?', 'Do you have experience in business-to-business sales?', 'Are you able to work variable shifts?', 'Can you operate a cash register?', 'Are you ready to put this company before your own personal interests?', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '../jobpost_img/monde_nissin.png', '2023-12-17 16:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notifications_id` int(11) NOT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `peso_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `spes_id` int(11) DEFAULT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date_added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notifications_id`, `applicant_id`, `peso_id`, `company_id`, `spes_id`, `title`, `description`, `date_added_at`, `is_read`) VALUES
(56, 4, NULL, NULL, NULL, 'Application Status Update', 'Your job application request has been Approved', '2023-12-17 16:38:44', 0);

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
(38, 8, 15, 'a', 'sample', '', '', '2000-10-10', 22, 'Male', 'Widow', 'w', 'Pulong Santa Cruz', 'hs', 'Student', 'Employed', 'Contractual', '0000-00-00', '', 'dsdf'),
(39, 1, 11, 'Manguerra', 'Reb', 'Barrameda', 'jr', '1999-01-01', 24, 'Male', 'Single', 'Santa Rosa City', 'Ibaba', 'College Undergraduate', 'Student', 'Unemployed', 'Regular', '2023-01-01', 'none', 'fsdfsd');

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
  `password` varchar(60) NOT NULL,
  `date_added_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `p_accounttb`
--

INSERT INTO `p_accounttb` (`peso_id`, `name`, `position`, `contactNum`, `email`, `password`, `date_added_at`, `status`) VALUES
(11, 'sample', 'staff', '1', 'sample@gmail.com', 'sample', '2023-12-15 21:06:16', 'Approved'),
(13, 'admin', 'admin', '912', 'sample@gmail.com', 'Just_password123', '2023-12-04 16:00:00', 'Approved'),
(14, 'Sample Three', 'head', '912', 'samplethree3@gmail.com', 'SampleThree_3', '2023-12-13 12:40:43', 'Approved'),
(18, 'Sample Lang', 'staff', '0912-345-67', 'samplelang@gmail.com', 'Just_password123', '2023-12-12 16:00:00', 'Approved'),
(19, 'spam sample', 'staff', '0912-345-68', 'spamsample@gmail.com', 'Just_password123', '2023-12-12 16:00:00', 'Pending'),
(20, 'spam sample', 'staff', '0912-345-69', 'spamsample@gmail.com', 'Just_password123', '2023-12-12 16:00:00', 'Pending'),
(21, 'sample', 'staff', '1', 'sample@gmail.com', 'sample', '2023-12-12 16:00:00', 'Approved'),
(22, 'admin', 'admin', '912', 'sample@gmail.com', 'Just_password123', '2023-12-04 16:00:00', 'Approved'),
(23, 'Sample Three', 'head', '912', 'samplethree3@gmail.com', 'SampleThree_3', '2023-12-12 16:00:00', 'Approved'),
(24, 'Sample Lang', 'staff', '0912-345-67', 'samplelang@gmail.com', 'Just_password123', '2023-12-12 16:00:00', 'Approved'),
(25, 'spam sample', 'staff', '0912-345-67', 'spamsample@gmail.com', 'Just_password123', '2023-12-12 16:00:00', 'Rejected'),
(26, 'spam sample', 'staff', '0912-345-67', 'spamsample@gmail.com', 'Just_password123', '2023-12-12 16:00:00', 'Approved'),
(27, 'sample', 'staff', '1', 'sample@gmail.com', 'sample', '2023-12-12 16:00:00', 'Approved'),
(28, 'admin', 'admin', '912', 'sample@gmail.com', 'Just_password123', '2023-12-04 16:00:00', 'Approved'),
(29, 'Sample Three', 'head', '912', 'samplethree3@gmail.com', 'SampleThree_3', '2023-12-12 16:00:00', 'Approved'),
(30, 'Sample Lang', 'staff', '0912-345-67', 'samplelang@gmail.com', 'Just_password123', '2023-12-12 16:00:00', 'Approved'),
(31, 'spam sample', 'staff', '0912-345-68', 'spamsample@gmail.com', 'Just_password123', '2023-12-12 16:00:00', 'Approved'),
(32, 'spam sample', 'staff', '0912-345-69', 'spamsample@gmail.com', 'Just_password123', '2023-12-12 16:00:00', 'Pending'),
(33, 'sample', 'staff', '1', 'sample@gmail.com', 'sample', '2023-12-12 16:00:00', 'Approved'),
(34, 'admin', 'admin', '912', 'sample@gmail.com', 'Just_password123', '2023-12-04 16:00:00', 'Approved'),
(35, 'Sample Three', 'head', '912', 'samplethree3@gmail.com', 'SampleThree_3', '2023-12-12 16:00:00', 'Approved'),
(36, 'Sample Lang', 'staff', '0912-345-67', 'samplelang@gmail.com', 'Just_password123', '2023-12-12 16:00:00', 'Approved'),
(37, 'spam sample', 'staff', '0912-345-67', 'spamsample@gmail.com', 'Just_password123', '2023-12-12 16:00:00', 'Pending'),
(38, 'spam sample', 'staff', '0912-345-67', 'spamsample@gmail.com', 'Just_password123', '2023-12-12 16:00:00', 'Pending'),
(39, 'Rebo Manguerra', 'staff', '0912-345-67', 'rebo@gmail.com', 'Just_password123', '2023-12-15 23:09:14', 'Pending'),
(40, 'Rebo', 'staff', '0912-345-67', 'sample@gmail.com', 'Just_password_911', '2023-12-16 14:13:52', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `p_jobpost`
--

CREATE TABLE `p_jobpost` (
  `p_jobpost_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
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
  `typeofHiring` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `questionNo1` varchar(225) NOT NULL,
  `questionNo2` varchar(225) NOT NULL,
  `questionNo3` varchar(225) NOT NULL,
  `questionNo4` varchar(225) NOT NULL,
  `questionNo5` varchar(225) NOT NULL,
  `answerNo1` varchar(10) NOT NULL,
  `answerNo2` varchar(10) NOT NULL,
  `answerNo3` varchar(10) NOT NULL,
  `answerNo4` varchar(10) NOT NULL,
  `answerNo5` varchar(10) NOT NULL,
  `img` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(8, 'Justine Nicole', 'Camposano', 22, 'Female', '0912-345-67', 'jncamposano@gmail.com', 'Justine_123', 'requirement_storage/Spes pic.png', 'requirement_storage/City Hall.png', 'requirement_storage/SPES.png', 'requirement_storage/About peso.png', 'requirement_storage/Job Fairs.png', 'requirement_storage/Training.png', 'requirement_storage/Career.png', NULL, NULL, 'Student', 'Approved', '2023-12-15 16:09:33'),
(9, 'sample', 'sample', 21, 'Male', '0912-345-67', 'sample@gmail.com', 'Just_password123', 'requirement_storage/side-eye.gif', 'requirement_storage/side-eye.gif', 'requirement_storage/side-eye.gif', 'requirement_storage/side-eye.gif', 'requirement_storage/side-eye.gif', 'requirement_storage/side-eye.gif', 'requirement_storage/side-eye.gif', NULL, NULL, 'Student', 'Pending', '2023-12-15 20:26:44');

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
(6, 'b', 'a', 'a', 'a', 'jobseeker', 'a', '2000-10-10', 13, 'Female', 'Single', 'c', 'c', 'c', 'c', 'c', 'cc', 'c', 'c', 'c', 13, 13, 12, 123, 0, 'c', 'none', 'wage_employed', 'a', 123, 'a', 'a', 'a', 'yes', 'yes', 'yes', ''),
(7, 'a', 'a', 'a', 'a', 'first_time', 'a', '0000-00-00', 0, 'a', 'a', 'a', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, 0, 'a', '', '', '', 0, '', '', '', '', '', '', ''),
(8, 'm', 'm', 'm', 'm', 'first_time', 'm', '1999-08-25', 25, 'm', 'm', 'm', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, 0, 'm', '', '', '', 0, '', '', '', '', '', '', ''),
(9, 'r', 't', 't', 't', 'first_time', 't', '2000-02-12', 36, 'Female', 'Single', 't', 't', 't', 't', 't', 't', 't', 't', 't', 123, 123, 123, 123, 0, 'tt', 'none', 'wage_employed', 't', 2023, 't', 't', 't', 'yes', 'yes', 'yes', '');

-- --------------------------------------------------------

--
-- Table structure for table `walkin_company`
--

CREATE TABLE `walkin_company` (
  `Wcompany_id` int(11) NOT NULL,
  `WcompanyName` varchar(255) NOT NULL,
  `Windustry` varchar(255) NOT NULL,
  `WcontactPerson` varchar(255) NOT NULL,
  `WcontactNum` int(11) NOT NULL,
  `Wemail` varchar(255) NOT NULL,
  `Wlocation` varchar(255) NOT NULL,
  `WregNum` varchar(255) NOT NULL,
  `WcompanyWeb` varchar(255) NOT NULL,
  `WcompanySize` int(11) NOT NULL,
  `WworkingHrs` int(11) NOT NULL,
  `WdressCode` varchar(255) NOT NULL,
  `WspokenLanguage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `walkin_company`
--

INSERT INTO `walkin_company` (`Wcompany_id`, `WcompanyName`, `Windustry`, `WcontactPerson`, `WcontactNum`, `Wemail`, `Wlocation`, `WregNum`, `WcompanyWeb`, `WcompanySize`, `WworkingHrs`, `WdressCode`, `WspokenLanguage`) VALUES
(1, 'Capstone Company', 'IT', 'Juan Dela Cruz', 2147483647, 'juandelacruz123@gmail.com', 'Santa Rosa, Laguna', '0123456789', '', 0, 0, '', ''),
(2, 'Senior Finance Associate', 'Computer / Information Technology (Software)', '', 2147483647, 'sample@gmail.com', 'Calamba, Laguna', '14235235', 'www.companywebsite.com', 200, 4, '2', '2'),
(3, 'Philippine Allied Enterprises Corporation', 'General & Wholesale Trading', '', 2147483647, 'juandelacruz@gmail.com', 'Santa Rosa, Laguna', '4235261514', 'www.paec.com', 500, 8, '2', 'Tagalog');

-- --------------------------------------------------------

--
-- Table structure for table `wap_educ`
--

CREATE TABLE `wap_educ` (
  `Wa_profile2_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `schoolStatus` varchar(50) NOT NULL,
  `educLevel` varchar(50) NOT NULL,
  `gradYear` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `award` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wap_educ`
--

INSERT INTO `wap_educ` (`Wa_profile2_id`, `peso_id`, `schoolStatus`, `educLevel`, `gradYear`, `school`, `course`, `award`) VALUES
(7, 11, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wap_elig`
--

CREATE TABLE `wap_elig` (
  `Wa_profile5_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `careerServ1` varchar(50) NOT NULL,
  `licenceNum1` varchar(50) NOT NULL,
  `expiryDate1` varchar(50) NOT NULL,
  `careerServ2` varchar(50) NOT NULL,
  `licenceNum2` varchar(50) NOT NULL,
  `expiryDate2` varchar(50) NOT NULL,
  `careerServ3` varchar(50) NOT NULL,
  `licenceNum3` varchar(50) NOT NULL,
  `expiryDate3` varchar(50) NOT NULL,
  `validDate` varchar(50) NOT NULL,
  `languageCertifications` varchar(50) NOT NULL,
  `otherCertification` varchar(50) NOT NULL,
  `dialectsSpoken` varchar(50) NOT NULL,
  `otherDialect` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wap_elig`
--

INSERT INTO `wap_elig` (`Wa_profile5_id`, `peso_id`, `careerServ1`, `licenceNum1`, `expiryDate1`, `careerServ2`, `licenceNum2`, `expiryDate2`, `careerServ3`, `licenceNum3`, `expiryDate3`, `validDate`, `languageCertifications`, `otherCertification`, `dialectsSpoken`, `otherDialect`) VALUES
(6, 11, '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wap_exp`
--

CREATE TABLE `wap_exp` (
  `Wa_profile6_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `incluEDate1` varchar(50) NOT NULL,
  `incluEDate2` varchar(50) NOT NULL,
  `incluEDate3` varchar(50) NOT NULL,
  `incluEDate4` varchar(50) NOT NULL,
  `company1` varchar(255) NOT NULL,
  `cpAddress1` varchar(255) NOT NULL,
  `company2` varchar(255) NOT NULL,
  `cpAddress2` varchar(255) NOT NULL,
  `company3` varchar(255) NOT NULL,
  `cpAddress3` varchar(255) NOT NULL,
  `company4` varchar(255) NOT NULL,
  `cpAddress4` varchar(255) NOT NULL,
  `position1` varchar(50) NOT NULL,
  `incluSDate1` varchar(50) NOT NULL,
  `appointStat1` varchar(50) NOT NULL,
  `position2` varchar(50) NOT NULL,
  `incluSDate2` varchar(50) NOT NULL,
  `appointStat2` varchar(50) NOT NULL,
  `position3` varchar(50) NOT NULL,
  `incluSDate3` varchar(50) NOT NULL,
  `appointStat3` varchar(50) NOT NULL,
  `position4` varchar(50) NOT NULL,
  `incluSDate4` varchar(50) NOT NULL,
  `appointStat4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wap_exp`
--

INSERT INTO `wap_exp` (`Wa_profile6_id`, `peso_id`, `incluEDate1`, `incluEDate2`, `incluEDate3`, `incluEDate4`, `company1`, `cpAddress1`, `company2`, `cpAddress2`, `company3`, `cpAddress3`, `company4`, `cpAddress4`, `position1`, `incluSDate1`, `appointStat1`, `position2`, `incluSDate2`, `appointStat2`, `position3`, `incluSDate3`, `appointStat3`, `position4`, `incluSDate4`, `appointStat4`) VALUES
(5, 11, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wap_info`
--

CREATE TABLE `wap_info` (
  `Wa_profile1_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `midName` varchar(50) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `jobseekerType` varchar(50) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `civilStatus` varchar(50) NOT NULL,
  `citizenship` varchar(50) NOT NULL,
  `housenumPresent` varchar(50) NOT NULL,
  `brgyPresent` varchar(50) NOT NULL,
  `cityPresent` varchar(50) NOT NULL,
  `provincePresent` varchar(50) NOT NULL,
  `housenumPermanent` varchar(50) DEFAULT NULL,
  `brgyPermanent` varchar(50) NOT NULL,
  `cityPermanent` varchar(50) NOT NULL,
  `provincePermanent` varchar(50) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `landlineNum` int(11) NOT NULL,
  `mobilePnum` int(11) NOT NULL,
  `mobileSnum` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `disability` varchar(50) NOT NULL,
  `employmentStatus` varchar(50) NOT NULL,
  `activelyLooking` varchar(50) NOT NULL,
  `willinglyWork` varchar(50) NOT NULL,
  `fourPsBeneficiary` varchar(50) NOT NULL,
  `ofw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wap_info`
--

INSERT INTO `wap_info` (`Wa_profile1_id`, `peso_id`, `lastName`, `firstName`, `midName`, `suffix`, `jobseekerType`, `birthplace`, `birthday`, `age`, `sex`, `civilStatus`, `citizenship`, `housenumPresent`, `brgyPresent`, `cityPresent`, `provincePresent`, `housenumPermanent`, `brgyPermanent`, `cityPermanent`, `provincePermanent`, `height`, `weight`, `landlineNum`, `mobilePnum`, `mobileSnum`, `email`, `disability`, `employmentStatus`, `activelyLooking`, `willinglyWork`, `fourPsBeneficiary`, `ofw`) VALUES
(12, 11, 'Dela Cruz', 'Juan', 'Rizal', '', 'first_time', 'Brgy. Sinalhan, Santa Rosa, Laguna', '2003-02-23', 20, 'Male', 'Married', 'Filipino', '234', 'Sinalhan', 'Santa Rosa', 'Laguna', '234', 'Sinalhan', 'Santa Rosa', 'Laguna', 170, 55, 2147483647, 2147483647, 0, 'sample@gmail.com', 'None', 'fresh_grad', 'yes', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `wap_prefer`
--

CREATE TABLE `wap_prefer` (
  `Wa_profile3_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `occupation1` varchar(50) NOT NULL,
  `industry1` varchar(50) NOT NULL,
  `occupation2` varchar(50) NOT NULL,
  `industry2` varchar(50) NOT NULL,
  `occupation3` varchar(50) NOT NULL,
  `industry3` varchar(50) NOT NULL,
  `locationType` varchar(50) NOT NULL,
  `location1` varchar(50) NOT NULL,
  `location2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wap_prefer`
--

INSERT INTO `wap_prefer` (`Wa_profile3_id`, `peso_id`, `occupation1`, `industry1`, `occupation2`, `industry2`, `occupation3`, `industry3`, `locationType`, `location1`, `location2`) VALUES
(6, 11, '', '', '', '', '', '', 'none', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wap_skills`
--

CREATE TABLE `wap_skills` (
  `Wa_profile7_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `skill` varchar(50) NOT NULL,
  `techSkill` varchar(50) NOT NULL,
  `otherTechskill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wap_skills`
--

INSERT INTO `wap_skills` (`Wa_profile7_id`, `peso_id`, `skill`, `techSkill`, `otherTechskill`) VALUES
(8, 11, '', '', ''),
(9, 11, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wap_tvo`
--

CREATE TABLE `wap_tvo` (
  `Wa_profile4_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `trainingStatus` varchar(50) NOT NULL,
  `training1` varchar(50) NOT NULL,
  `startDuration1` date NOT NULL,
  `endDuration1` date NOT NULL,
  `training2` varchar(50) NOT NULL,
  `startDuration2` date NOT NULL,
  `endDuration2` date NOT NULL,
  `training3` varchar(50) NOT NULL,
  `startDuration3` date NOT NULL,
  `endDuration3` date NOT NULL,
  `institution1` varchar(50) NOT NULL,
  `certificate1` varchar(50) NOT NULL,
  `completion1` varchar(50) NOT NULL,
  `institution2` varchar(50) NOT NULL,
  `certificate2` varchar(50) NOT NULL,
  `completion2` varchar(50) NOT NULL,
  `institution3` varchar(50) NOT NULL,
  `certificate3` varchar(50) NOT NULL,
  `completion3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wap_tvo`
--

INSERT INTO `wap_tvo` (`Wa_profile4_id`, `peso_id`, `trainingStatus`, `training1`, `startDuration1`, `endDuration1`, `training2`, `startDuration2`, `endDuration2`, `training3`, `startDuration3`, `endDuration3`, `institution1`, `certificate1`, `completion1`, `institution2`, `certificate2`, `completion2`, `institution3`, `certificate3`, `completion3`) VALUES
(6, 11, '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wcompany`
--

CREATE TABLE `wcompany` (
  `id` int(11) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profileName` varchar(255) NOT NULL,
  `companyWeb` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `companyType` varchar(255) NOT NULL,
  `regNum` varchar(255) NOT NULL,
  `workingHrs` int(11) NOT NULL,
  `contactNum` int(11) NOT NULL,
  `dressCode` varchar(255) NOT NULL,
  `contactPerson` varchar(255) NOT NULL,
  `companySize` int(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `spokenLanguage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wcompany`
--

INSERT INTO `wcompany` (`id`, `companyName`, `email`, `profileName`, `companyWeb`, `industry`, `companyType`, `regNum`, `workingHrs`, `contactNum`, `dressCode`, `contactPerson`, `companySize`, `address`, `spokenLanguage`) VALUES
(1, 'Capstone Company', 'IT', 'Juan Dela Cruz', '2147483647', 'juandelacruz123@gmail.com', 'Santa Rosa, Laguna', '0123456789', 0, 0, '0', '', 0, '', ''),
(2, 'a', 'a', '', '0', 'a', '', '', 0, 0, '0', '', 0, '', ''),
(7, 'Monde Corporation', 'juandelacruz123@gmail.com', 'Monde', 'www.monde.com', 'Food', 'Direct', '012345', 8, 912, 'uniform', 'Juan Dela Cruz', 5000, 'Santa Rosa, Laguna', 'Taglish');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_account`
--
ALTER TABLE `access_account`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `access_pk` (`peso_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

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
  ADD KEY `peso_id_pkk` (`peso_id`),
  ADD KEY `ap_auth_id_pk` (`ap_auth_id`);

--
-- Indexes for table `applicant_roles`
--
ALTER TABLE `applicant_roles`
  ADD PRIMARY KEY (`applicant_roles_id`);

--
-- Indexes for table `application_log`
--
ALTER TABLE `application_log`
  ADD PRIMARY KEY (`application_log_id`),
  ADD KEY `applicant_id_apply_pk` (`applicant_id`),
  ADD KEY `c_jobpost_apply_pk` (`jobpost_id`);

--
-- Indexes for table `ap_auth`
--
ALTER TABLE `ap_auth`
  ADD PRIMARY KEY (`a_profile8_id`),
  ADD KEY `a_profile8_pkk` (`applicant_id`);

--
-- Indexes for table `ap_educ`
--
ALTER TABLE `ap_educ`
  ADD PRIMARY KEY (`a_profile2_id`),
  ADD KEY `a_profile2_pk` (`applicant_id`);

--
-- Indexes for table `ap_elig`
--
ALTER TABLE `ap_elig`
  ADD PRIMARY KEY (`a_profile5_id`),
  ADD KEY `a_profile5_pk` (`applicant_id`);

--
-- Indexes for table `ap_exp`
--
ALTER TABLE `ap_exp`
  ADD PRIMARY KEY (`a_profile6_id`),
  ADD KEY `a_profile6_pk` (`applicant_id`);

--
-- Indexes for table `ap_info`
--
ALTER TABLE `ap_info`
  ADD PRIMARY KEY (`a_profile1_id`),
  ADD KEY `a_profile1_pk` (`applicant_id`);

--
-- Indexes for table `ap_prefer`
--
ALTER TABLE `ap_prefer`
  ADD PRIMARY KEY (`a_profile3_id`),
  ADD KEY `a_profile3_pk` (`applicant_id`);

--
-- Indexes for table `ap_skills`
--
ALTER TABLE `ap_skills`
  ADD PRIMARY KEY (`a_profile7_id`),
  ADD KEY `a_profile7_pk` (`applicant_id`);

--
-- Indexes for table `ap_tvo`
--
ALTER TABLE `ap_tvo`
  ADD PRIMARY KEY (`a_profile4_id`),
  ADD KEY `a_profile4_pk` (`applicant_id`);

--
-- Indexes for table `a_accounttb`
--
ALTER TABLE `a_accounttb`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`c_profile_id`);

--
-- Indexes for table `c_accounttb`
--
ALTER TABLE `c_accounttb`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `c_requests`
--
ALTER TABLE `c_requests`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requirement_pk` (`company_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD PRIMARY KEY (`jobpost_id`),
  ADD KEY `c_jobpost_pk` (`company_id`),
  ADD KEY `access_id_fk` (`access_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notifications_id`),
  ADD KEY `notifications_applicantpk` (`applicant_id`),
  ADD KEY `notifications_companyfk` (`company_id`),
  ADD KEY `notifications_pesofk` (`peso_id`),
  ADD KEY `notifications_spesfk` (`spes_id`);

--
-- Indexes for table `profiling_task`
--
ALTER TABLE `profiling_task`
  ADD PRIMARY KEY (`profiling_id`),
  ADD KEY `profilingtask_pk` (`spes_id`);

--
-- Indexes for table `p_accounttb`
--
ALTER TABLE `p_accounttb`
  ADD PRIMARY KEY (`peso_id`);

--
-- Indexes for table `p_jobpost`
--
ALTER TABLE `p_jobpost`
  ADD PRIMARY KEY (`p_jobpost_id`),
  ADD KEY `p_jobpost_pk` (`peso_id`);

--
-- Indexes for table `s_accounttb`
--
ALTER TABLE `s_accounttb`
  ADD PRIMARY KEY (`spes_id`);

--
-- Indexes for table `walkin_applicant`
--
ALTER TABLE `walkin_applicant`
  ADD PRIMARY KEY (`W_applicant_id`);

--
-- Indexes for table `walkin_company`
--
ALTER TABLE `walkin_company`
  ADD PRIMARY KEY (`Wcompany_id`);

--
-- Indexes for table `wap_educ`
--
ALTER TABLE `wap_educ`
  ADD PRIMARY KEY (`Wa_profile2_id`),
  ADD KEY `Wa_profile2_pk` (`peso_id`);

--
-- Indexes for table `wap_elig`
--
ALTER TABLE `wap_elig`
  ADD PRIMARY KEY (`Wa_profile5_id`),
  ADD KEY `Wa_profile5_pk` (`peso_id`);

--
-- Indexes for table `wap_exp`
--
ALTER TABLE `wap_exp`
  ADD PRIMARY KEY (`Wa_profile6_id`),
  ADD KEY `Wa_profile6_pk` (`peso_id`);

--
-- Indexes for table `wap_info`
--
ALTER TABLE `wap_info`
  ADD PRIMARY KEY (`Wa_profile1_id`),
  ADD KEY `Wa_profile1_pk` (`peso_id`);

--
-- Indexes for table `wap_prefer`
--
ALTER TABLE `wap_prefer`
  ADD PRIMARY KEY (`Wa_profile3_id`),
  ADD KEY `Wa_profile3_pk` (`peso_id`);

--
-- Indexes for table `wap_skills`
--
ALTER TABLE `wap_skills`
  ADD PRIMARY KEY (`Wa_profile7_id`),
  ADD KEY `Wa_profile7_pk` (`peso_id`);

--
-- Indexes for table `wap_tvo`
--
ALTER TABLE `wap_tvo`
  ADD PRIMARY KEY (`Wa_profile4_id`),
  ADD KEY `Wa_profile4_pk` (`peso_id`);

--
-- Indexes for table `wcompany`
--
ALTER TABLE `wcompany`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_account`
--
ALTER TABLE `access_account`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicant_profile`
--
ALTER TABLE `applicant_profile`
  MODIFY `applicant_profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `applicant_roles`
--
ALTER TABLE `applicant_roles`
  MODIFY `applicant_roles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `application_log`
--
ALTER TABLE `application_log`
  MODIFY `application_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `ap_auth`
--
ALTER TABLE `ap_auth`
  MODIFY `a_profile8_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ap_educ`
--
ALTER TABLE `ap_educ`
  MODIFY `a_profile2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ap_elig`
--
ALTER TABLE `ap_elig`
  MODIFY `a_profile5_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ap_exp`
--
ALTER TABLE `ap_exp`
  MODIFY `a_profile6_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `ap_info`
--
ALTER TABLE `ap_info`
  MODIFY `a_profile1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ap_prefer`
--
ALTER TABLE `ap_prefer`
  MODIFY `a_profile3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ap_skills`
--
ALTER TABLE `ap_skills`
  MODIFY `a_profile7_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ap_tvo`
--
ALTER TABLE `ap_tvo`
  MODIFY `a_profile4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `a_accounttb`
--
ALTER TABLE `a_accounttb`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `c_profile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_accounttb`
--
ALTER TABLE `c_accounttb`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `c_requests`
--
ALTER TABLE `c_requests`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobpost`
--
ALTER TABLE `jobpost`
  MODIFY `jobpost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notifications_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `profiling_task`
--
ALTER TABLE `profiling_task`
  MODIFY `profiling_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `p_accounttb`
--
ALTER TABLE `p_accounttb`
  MODIFY `peso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `p_jobpost`
--
ALTER TABLE `p_jobpost`
  MODIFY `p_jobpost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `s_accounttb`
--
ALTER TABLE `s_accounttb`
  MODIFY `spes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `walkin_applicant`
--
ALTER TABLE `walkin_applicant`
  MODIFY `W_applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `walkin_company`
--
ALTER TABLE `walkin_company`
  MODIFY `Wcompany_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wap_educ`
--
ALTER TABLE `wap_educ`
  MODIFY `Wa_profile2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wap_elig`
--
ALTER TABLE `wap_elig`
  MODIFY `Wa_profile5_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wap_exp`
--
ALTER TABLE `wap_exp`
  MODIFY `Wa_profile6_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `wap_info`
--
ALTER TABLE `wap_info`
  MODIFY `Wa_profile1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wap_prefer`
--
ALTER TABLE `wap_prefer`
  MODIFY `Wa_profile3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wap_skills`
--
ALTER TABLE `wap_skills`
  MODIFY `Wa_profile7_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wap_tvo`
--
ALTER TABLE `wap_tvo`
  MODIFY `Wa_profile4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wcompany`
--
ALTER TABLE `wcompany`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access_account`
--
ALTER TABLE `access_account`
  ADD CONSTRAINT `access_pk` FOREIGN KEY (`peso_id`) REFERENCES `p_accounttb` (`peso_id`);

--
-- Constraints for table `applicant_profile`
--
ALTER TABLE `applicant_profile`
  ADD CONSTRAINT `ap_auth_id_pk` FOREIGN KEY (`ap_auth_id`) REFERENCES `ap_auth` (`a_profile8_id`),
  ADD CONSTRAINT `ap_educ_id_pk` FOREIGN KEY (`ap_educ_id`) REFERENCES `ap_educ` (`a_profile2_id`),
  ADD CONSTRAINT `ap_elig_id_pk` FOREIGN KEY (`ap_elig_id`) REFERENCES `ap_elig` (`a_profile5_id`),
  ADD CONSTRAINT `ap_exp_id_pk` FOREIGN KEY (`ap_exp_id`) REFERENCES `ap_exp` (`a_profile6_id`),
  ADD CONSTRAINT `ap_info_id_pk` FOREIGN KEY (`ap_info_id`) REFERENCES `ap_info` (`a_profile1_id`),
  ADD CONSTRAINT `ap_prefer_id_pk` FOREIGN KEY (`ap_prefer_id`) REFERENCES `ap_prefer` (`a_profile3_id`),
  ADD CONSTRAINT `ap_skills_id_pk` FOREIGN KEY (`ap_skills_id`) REFERENCES `ap_skills` (`a_profile7_id`),
  ADD CONSTRAINT `ap_tvo_id_pk` FOREIGN KEY (`ap_tvo_id`) REFERENCES `ap_tvo` (`a_profile4_id`),
  ADD CONSTRAINT `applicant_id_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`),
  ADD CONSTRAINT `peso_id_pkk` FOREIGN KEY (`peso_id`) REFERENCES `p_accounttb` (`peso_id`);

--
-- Constraints for table `application_log`
--
ALTER TABLE `application_log`
  ADD CONSTRAINT `applicant_id_apply_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`),
  ADD CONSTRAINT `c_jobpost_apply_pk` FOREIGN KEY (`jobpost_id`) REFERENCES `jobpost` (`jobpost_id`);

--
-- Constraints for table `ap_auth`
--
ALTER TABLE `ap_auth`
  ADD CONSTRAINT `a_profile8_pkk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `ap_educ`
--
ALTER TABLE `ap_educ`
  ADD CONSTRAINT `a_profile2_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `ap_elig`
--
ALTER TABLE `ap_elig`
  ADD CONSTRAINT `a_profile5_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `ap_exp`
--
ALTER TABLE `ap_exp`
  ADD CONSTRAINT `a_profile6_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `ap_info`
--
ALTER TABLE `ap_info`
  ADD CONSTRAINT `a_profile1_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `ap_prefer`
--
ALTER TABLE `ap_prefer`
  ADD CONSTRAINT `a_profile3_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `ap_skills`
--
ALTER TABLE `ap_skills`
  ADD CONSTRAINT `a_profile7_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `ap_tvo`
--
ALTER TABLE `ap_tvo`
  ADD CONSTRAINT `a_profile4_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `requirement_pk` FOREIGN KEY (`company_id`) REFERENCES `c_requests` (`company_id`);

--
-- Constraints for table `jobpost`
--
ALTER TABLE `jobpost`
  ADD CONSTRAINT `access_id_fk` FOREIGN KEY (`access_id`) REFERENCES `access_account` (`access_id`),
  ADD CONSTRAINT `c_jobpost_pk` FOREIGN KEY (`company_id`) REFERENCES `c_accounttb` (`company_id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_applicantpk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`),
  ADD CONSTRAINT `notifications_companyfk` FOREIGN KEY (`company_id`) REFERENCES `c_accounttb` (`company_id`),
  ADD CONSTRAINT `notifications_pesofk` FOREIGN KEY (`peso_id`) REFERENCES `p_accounttb` (`peso_id`),
  ADD CONSTRAINT `notifications_spesfk` FOREIGN KEY (`spes_id`) REFERENCES `s_accounttb` (`spes_id`);

--
-- Constraints for table `profiling_task`
--
ALTER TABLE `profiling_task`
  ADD CONSTRAINT `profilingtask_pk` FOREIGN KEY (`spes_id`) REFERENCES `s_accounttb` (`spes_id`);

--
-- Constraints for table `p_jobpost`
--
ALTER TABLE `p_jobpost`
  ADD CONSTRAINT `p_jobpost_pk` FOREIGN KEY (`peso_id`) REFERENCES `p_accounttb` (`peso_id`);

--
-- Constraints for table `wap_educ`
--
ALTER TABLE `wap_educ`
  ADD CONSTRAINT `Wa_profile2_pk` FOREIGN KEY (`peso_id`) REFERENCES `p_accounttb` (`peso_id`);

--
-- Constraints for table `wap_elig`
--
ALTER TABLE `wap_elig`
  ADD CONSTRAINT `Wa_profile5_pk` FOREIGN KEY (`peso_id`) REFERENCES `p_accounttb` (`peso_id`);

--
-- Constraints for table `wap_exp`
--
ALTER TABLE `wap_exp`
  ADD CONSTRAINT `Wa_profile6_pk` FOREIGN KEY (`peso_id`) REFERENCES `p_accounttb` (`peso_id`);

--
-- Constraints for table `wap_info`
--
ALTER TABLE `wap_info`
  ADD CONSTRAINT `Wa_profile1_pk` FOREIGN KEY (`peso_id`) REFERENCES `p_accounttb` (`peso_id`);

--
-- Constraints for table `wap_prefer`
--
ALTER TABLE `wap_prefer`
  ADD CONSTRAINT `Wa_profile3_pk` FOREIGN KEY (`peso_id`) REFERENCES `p_accounttb` (`peso_id`);

--
-- Constraints for table `wap_skills`
--
ALTER TABLE `wap_skills`
  ADD CONSTRAINT `Wa_profile7_pk` FOREIGN KEY (`peso_id`) REFERENCES `p_accounttb` (`peso_id`);

--
-- Constraints for table `wap_tvo`
--
ALTER TABLE `wap_tvo`
  ADD CONSTRAINT `Wa_profile4_pk` FOREIGN KEY (`peso_id`) REFERENCES `p_accounttb` (`peso_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
