-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2023 at 04:33 PM
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
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `access_account`
--

INSERT INTO `access_account` (`access_id`, `peso_id`, `name`, `email`, `type`, `password`) VALUES
(4, 9, 'sample', 'sample@gmail.com', 'Applicant', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `access_requests`
--

CREATE TABLE `access_requests` (
  `access_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(255) NOT NULL,
  `accessType` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `access_requests`
--

INSERT INTO `access_requests` (`access_id`, `peso_id`, `name`, `email`, `message`, `accessType`, `date`, `password`) VALUES
(3, 9, 'Aaccess Two', 'aacesstwo2@gmail.com', 'Our Aaccess Two would like to request an access for Applicant.', 'Applicant', '2023-09-15 21:11:51', 'AaccessTwo_2');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile`
--

CREATE TABLE `applicant_profile` (
  `applicant_profile_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `ap_info_id` int(11) NOT NULL,
  `ap_educ_id` int(11) NOT NULL,
  `ap_prefer_id` int(11) NOT NULL,
  `ap_tvo_id` int(11) NOT NULL,
  `ap_elig_id` int(11) NOT NULL,
  `ap_exp_id` int(11) NOT NULL,
  `ap_skills_id` int(11) NOT NULL,
  `date_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_profile`
--

INSERT INTO `applicant_profile` (`applicant_profile_id`, `applicant_id`, `ap_info_id`, `ap_educ_id`, `ap_prefer_id`, `ap_tvo_id`, `ap_elig_id`, `ap_exp_id`, `ap_skills_id`, `date_created_at`) VALUES
(1, 2, 1, 1, 1, 1, 1, 1, 1, '2023-09-20 15:47:09');

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
  `c_jobpost_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `date_requested` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(50) NOT NULL,
  `answer_1` varchar(20) NOT NULL,
  `answer_2` varchar(20) NOT NULL,
  `answer_3` varchar(20) NOT NULL,
  `answer_4` varchar(20) NOT NULL,
  `answer_5` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_log`
--

INSERT INTO `application_log` (`application_log_id`, `c_jobpost_id`, `applicant_id`, `date_requested`, `status`, `answer_1`, `answer_2`, `answer_3`, `answer_4`, `answer_5`) VALUES
(1, 19, 2, '2023-09-20 15:47:25', 'Pending', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');

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
(1, 2, '', '', '', '', '', '');

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
(1, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ap_exp`
--

CREATE TABLE `ap_exp` (
  `a_profile6_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `company1` varchar(255) NOT NULL,
  `cpAddress1` varchar(255) NOT NULL,
  `company2` varchar(255) NOT NULL,
  `cpAddress2` varchar(255) NOT NULL,
  `company3` varchar(255) NOT NULL,
  `cpAddress3` varchar(255) NOT NULL,
  `company4` varchar(255) NOT NULL,
  `cpAddress4` varchar(255) NOT NULL,
  `position1` varchar(50) NOT NULL,
  `incluDate1` varchar(50) NOT NULL,
  `appointStat1` varchar(50) NOT NULL,
  `position2` varchar(50) NOT NULL,
  `incluDate2` varchar(50) NOT NULL,
  `appointStat2` varchar(50) NOT NULL,
  `position3` varchar(50) NOT NULL,
  `incluDate3` varchar(50) NOT NULL,
  `appointStat3` varchar(50) NOT NULL,
  `position4` varchar(50) NOT NULL,
  `incluDate4` varchar(50) NOT NULL,
  `appointStat4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ap_exp`
--

INSERT INTO `ap_exp` (`a_profile6_id`, `applicant_id`, `company1`, `cpAddress1`, `company2`, `cpAddress2`, `company3`, `cpAddress3`, `company4`, `cpAddress4`, `position1`, `incluDate1`, `appointStat1`, `position2`, `incluDate2`, `appointStat2`, `position3`, `incluDate3`, `appointStat3`, `position4`, `incluDate4`, `appointStat4`) VALUES
(1, 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
-- Dumping data for table `ap_info`
--

INSERT INTO `ap_info` (`a_profile1_id`, `applicant_id`, `lastName`, `firstName`, `midName`, `suffix`, `jobseekerType`, `birthplace`, `birthday`, `age`, `sex`, `civilStatus`, `citizenship`, `housenumPresent`, `brgyPresent`, `cityPresent`, `provincePresent`, `housenumPermanent`, `brgyPermanent`, `cityPermanent`, `provincePermanent`, `height`, `weight`, `landlineNum`, `mobilePnum`, `mobileSnum`, `email`, `disability`, `employmentStatus`, `activelyLooking`, `willinglyWork`, `fourPsBeneficiary`, `ofw`) VALUES
(1, 2, 'Manguerra', 'Rebo', '', '', '', '', '0000-00-00', 22, '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 2147483647, 0, 'rebrebmanguerra@gmail.com', 'None', '', '', '', '', '');

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
(1, 2, '', '', '', '', '', '', 'none', '', '');

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
(1, 2, '', '', '');

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
(1, 2, '', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '');

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
  `password` varchar(50) NOT NULL,
  `profile_img` text NOT NULL,
  `email_verified` tinyint(1) DEFAULT 0,
  `code` text NOT NULL,
  `code_created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a_accounttb`
--

INSERT INTO `a_accounttb` (`applicant_id`, `lastname`, `firstname`, `middlename`, `age`, `sex`, `Pnum`, `email`, `password`, `profile_img`, `email_verified`, `code`, `code_created_at`) VALUES
(1, 'Crown', 'Kreston', '', 23, 'Male', '9123456789', 'kreston52@gmail.com', 'KresTon_52', '', 0, '', '2023-09-14 13:55:56'),
(2, 'Manguerra', 'Rebo', '', 22, 'Male', '9011231234', 'rebrebmanguerra@gmail.com', 'Password_123', '', 0, '', '2023-09-15 13:43:29'),
(3, 'sample', 'sample', 'sample', 21, 'Male', '9123456789', 'sample@gmail.com', 'sample', '', 0, '', '2023-09-16 00:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `a_accounttb_draft`
--

CREATE TABLE `a_accounttb_draft` (
  `applicant_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `Pnum` int(11) NOT NULL,
  `age` int(90) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `jobseekerType` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a_accounttb_draft`
--

INSERT INTO `a_accounttb_draft` (`applicant_id`, `lastname`, `firstname`, `Pnum`, `age`, `sex`, `jobseekerType`, `email`, `password`, `profile_img`) VALUES
(36, 'akldja', 'fksjdf', 0, 20, 'Male', 'FirstTime', 'sample@yahoo.com', 'sample123', ''),
(37, 'A', 'A', 0, 18, 'Male', 'FirstTime', 'jncamposano025@gmail.com', 'aaaaa', ''),
(38, 'q', 'q', 0, 20, 'Male', 'Jobseeker', 'q@gmail.com', 'qqqqq', ''),
(39, 'z', 'z', 0, 45, 'Female', 'Jobseeker', 'z@gmail.com', 'zzzzz', ''),
(40, 'R', 'R', 0, 18, 'Female', 'Jobseeker', 'R@GMAIL.COM', 'RRRRR', ''),
(41, 'Dela Cruz', 'Juan', 2147483647, 25, 'Male', '', 'juandelacruz123@gmail.com', 'JuanDelaCruz_123', '');

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
  `contactNum` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `companyType` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `c_accounttb`
--

INSERT INTO `c_accounttb` (`company_id`, `companyName`, `industry`, `contactPerson`, `contactNum`, `email`, `type`, `password`, `companyType`, `date`) VALUES
(1, ' Juan Dela Cruz', 'head', '', 0, 'juandelacruz123@gmail.com', 'admin', 'JuanDelaCruz_123', '', '2023-09-15 19:56:15'),
(4, 'Jeremy', 'Ruta', '', 0, 'jeremyruta@isda.com', 'user', 'jeremy', '', '2023-09-15 19:56:15'),
(5, 'super', 'admin', '', 0, 'superadmin@gmail.com', 'user', 'SuperAdmin', '', '2023-09-15 19:56:15'),
(6, 'sample', 'staff', 'sample', 0, 'sample@gmail.com', 'user', 'sample', '', '2023-09-16 10:17:40'),
(7, 'sampletwo', 'staff', 'sampletwo', 912, 'sampletwo@gmail.com', 'user', 'sampletwo', '', '2023-09-15 22:20:41'),
(8, 'samplethree', 'staff', 'samplethree', 912, 'samplethree@gmail.com', 'user', 'samplethree', '', '2023-09-15 22:27:20'),
(9, 'dummy', 'staff', 'dummy', 912, 'dummy@gmail.com', 'user', 'dummy', '', '2023-09-15 22:36:39'),
(10, 'dummytwo', 'IT', 'dummytwo', 912, 'dummytwo@gmail.com', 'user', 'dummytwo', '', '2023-09-15 22:45:13'),
(11, 'Company Three', 'IT', 'Company Three', 912, 'companythree3@gmail.com', 'user', 'CompanyThree_3', '', '2023-09-15 19:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `c_accounttb_draft`
--

CREATE TABLE `c_accounttb_draft` (
  `company_id` int(11) NOT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `contactPerson` varchar(255) DEFAULT NULL,
  `contactNum` int(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c_accounttb_draft`
--

INSERT INTO `c_accounttb_draft` (`company_id`, `companyName`, `industry`, `contactPerson`, `contactNum`, `email`, `password`) VALUES
(2, 'sad', 'Industry 1', 'sad', 2147483647, 'sad@yahoo.com', 'sad123'),
(3, 'sample', 'Industry 1', 'sample', 2147483647, 'sample@yahoo.com', 'sample123'),
(4, 'a', 'Industry 1', 'a', 2147483647, 'a@gmail.com', 'aaaaa'),
(5, 'Capstone Company', 'Technology', 'Juan Dela Cruz', 2147483647, 'juandelacruz123@gmail.com', 'JuanDelaCruz_123');

-- --------------------------------------------------------

--
-- Table structure for table `c_accounttb_draft3`
--

CREATE TABLE `c_accounttb_draft3` (
  `company_id` int(11) NOT NULL,
  `companyName` varchar(50) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `contactPerson` varchar(50) NOT NULL,
  `contactNum` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `c_accounttb_draft3`
--

INSERT INTO `c_accounttb_draft3` (`company_id`, `companyName`, `industry`, `contactPerson`, `contactNum`, `email`, `type`, `password`) VALUES
(1, ' Juan Dela Cruz', 'head', '', '0', 'juandelacruz123@gmail.com', 'admin', 'JuanDelaCruz_123'),
(4, 'Jeremy', 'Ruta', '', '0', 'jeremyruta@isda.com', 'user', 'jeremy'),
(5, 'super', 'admin', '', '0', 'superadmin@gmail.com', 'user', 'SuperAdmin'),
(6, 'sample', 'three', '', '0', 'samplethree@gmail.com', 'user', 'SampleThree'),
(7, 'Sample Four', 'staff', '', '912', 'samplefour4@gmail.com', 'user', 'SampleFour_4'),
(8, 'Sample Five', 'staff', '', '912', 'samplefive_5@gmail.com', 'user', 'SampleFive_5'),
(9, 'Company One', 'IT', 'Juan Dela Cruz', '0912-345-67', 'companyone1@gmail.com', 'user', 'CompanyOne_1');

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
  `salary` varchar(50) NOT NULL,
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
(17, 6, 'Mitsubishi Motors Philippines Corporation', 'Manufacturing / Production', 'Supervisor', 'Supervisor/5 Years & Up Experienced Employee', '3', 'Laguna (Sta. Rosa City)', 'Supervisor IT Application', 1, '12,000', 'Computer/Information Technology, IT-Software', 'Do you manage conflict well?', 'Do you manage pressure well?', 'Are you a goal-oriented employee?', 'Are you a team player?', 'Have you done anything to enhance your skillset?', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '../jobpost_img/mitsubishi.png', '2023-09-18 12:35:40'),
(18, 7, 'Nestle Philippines, Inc.', 'Consumer Products / FMCG', 'Analyst II - Microbiology', 'Fresh Graduates', '1', 'Cabuyao Factory', 'NQAC analyst II - Microbiology', 2, '15,000-18,000', 'Sciences, Science & Technology', 'Are you ready to put this company before your own personal interests?', 'Are you okay with the amount of travel required for this position?', 'Do you have experience in business-to-business sales?', 'Are you able to work variable shifts?', 'Can you operate a cash register?', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '../jobpost_img/nestle.png', '2023-09-18 12:37:16'),
(19, 8, 'Shakey’s Pizza Asia Ventures Inc. (SPAVI)', 'Food & Beverage / Catering / Restaurant', 'Restaurant Manager', 'Bachelor\'s/College Degree', '2', 'Laguna (Sta. Rosa City)', 'Restaurant Managers - SM Sta. Rosa & Nuvali', 1, 'Unspecified', 'Hotel/Restaurant, Food/Beverage/Restaurant', 'Do you know how to use or operate a restuarant', 'Have you ever been fired from a job?', 'Are you able to work variable shifts?', 'Can you operate a cash register?', 'Do you manage pressure well?', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '../jobpost_img/shakeys.jpg', '2023-09-18 12:41:22'),
(20, 9, 'Monde Nissin Corporation', 'Manufacturing / Production', 'Network Engineer', 'Bachelor\'s/College Degree', '4', 'Laguna (Sta. Rosa City)', 'Network Engineer', 2, '25,000-26,000', 'Computer/Information Technology, IT-Network/Sys/DB Admin', 'Do you like giving presentations?', 'Do you ever take work home with you?', 'Do you manage pressure well?', 'Are you ready to put this company before your own personal interests?', 'Have you ever worked in a different industry?', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '../jobpost_img/monde_nissin.png', '2023-09-18 12:41:36'),
(21, 10, 'Toyota Motor Philippines Corporation', 'Manufacturing / Production', 'Safety Officer', 'Bachelor\'s/College Degree', '2', 'Laguna (Sta. Rosa City)', 'Safety Officer', 3, '20,000-25,000', 'Engineering, Environmental', 'Have you ever worked in a different industry?', 'You know a lot about team building, don\'t you?', 'I bet you\'re good at setting long-term goals. Right?', 'Is this the job that interests you most?', 'Do you ever talk to yourself?', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '../jobpost_img/toyota.jpg', '2023-09-18 12:32:41');

-- --------------------------------------------------------

--
-- Table structure for table `c_jobposts_draft`
--

CREATE TABLE `c_jobposts_draft` (
  `c_jobposts_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `jobTitle` varchar(50) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `industry` varchar(255) NOT NULL,
  `position` varchar(50) NOT NULL,
  `yrsExperience` varchar(50) NOT NULL,
  `workLocation` varchar(50) NOT NULL,
  `salary` decimal(8,2) NOT NULL,
  `educBg` varchar(255) NOT NULL,
  `numSlot` int(20) NOT NULL,
  `skills` varchar(300) NOT NULL,
  `question1` varchar(100) NOT NULL,
  `answer1` varchar(20) NOT NULL,
  `question2` varchar(100) NOT NULL,
  `answer2` varchar(20) NOT NULL,
  `question3` varchar(100) NOT NULL,
  `answer3` varchar(20) NOT NULL,
  `question4` varchar(100) NOT NULL,
  `answer4` varchar(20) NOT NULL,
  `question5` varchar(100) NOT NULL,
  `answer5` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c_jobposts_draft`
--

INSERT INTO `c_jobposts_draft` (`c_jobposts_id`, `company_id`, `jobTitle`, `companyName`, `industry`, `position`, `yrsExperience`, `workLocation`, `salary`, `educBg`, `numSlot`, `skills`, `question1`, `answer1`, `question2`, `answer2`, `question3`, `answer3`, `question4`, `answer4`, `question5`, `answer5`) VALUES
(1, 2, 'adjha', '', '', 'aksjdh', 'aksjdh', 'askdj', 2312.00, 'askjdha', 32131, '', '', '', '', '', '', '', '', '', '', ''),
(2, 3, 'dasjdgk', '', '', 'asjkdhga', 'jkdashgd', 'ajhd', 37481.00, 'dasgd', 34323, '', '', '', '', '', '', '', '', '', '', ''),
(3, 4, 'a', '', '', 'a', 'a', 'a', 1000.00, 'a', 13, '', '', '', '', '', '', '', '', '', '', ''),
(4, 4, 'g', '', '', 'g', 'g', 'g', 123.00, 'g', 2, '', '', '', '', '', '', '', '', '', '', ''),
(5, 4, 'y', '', '', 'y', 'y', 'y', 123.00, 'y', 3, '', '', '', '', '', '', '', '', '', '', ''),
(6, 4, 'c', '', '', 'c', 'c', 'c', 123.00, 'c', 8, '', 'c', 'Yes', 'c', 'Yes', 'c', 'Yes', 'cc', 'Yes', 'c', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `c_jobpost_draft2`
--

CREATE TABLE `c_jobpost_draft2` (
  `c_jobpost_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
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
-- Dumping data for table `c_jobpost_draft2`
--

INSERT INTO `c_jobpost_draft2` (`c_jobpost_id`, `image`, `title`, `companyName`, `industry`, `position`, `educBg`, `yrsExperience`, `workLocation`, `jobTitle`, `slot`, `salary`, `skills`, `question1`, `question2`, `question3`, `question4`, `question5`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`) VALUES
(8, '', '', 'Capstone Company', 'Technology', 'staff', 'IT graduate', '2', 'Santa Rosa', 'Developer', 10, 50000, 'php, html, css, js', '', '', '', '', '', '', '', '', '', ''),
(9, '', '', 'Capstone Company', 'Technology', 'staff', 'IT graduate', '2', 'Santa Rosa', 'Developer', 10, 50000, 'php, html, css, js', '', '', '', '', '', '', '', '', '', ''),
(10, '', '', 'Capstone Company', 'Technology', 'staff', 'IT graduate', '2', 'Santa Rosa', 'Developer', 10, 50000, 'php, html, css, js', 'a', 'b', 'c', 'd', 'e', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(11, '', '', 'Capstone Company', 'Technology', 'staff', 'IT graduate', '2', 'Santa Rosa', 'Developer', 10, 50000, 'php, html, css, js', 'a', 'b', 'c', 'd', 'e', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(12, '', '', 'Capstone Company', 'ghjk', 'sfsf', 'sdsssds', 'sds', 'sdssds', 'love', 0, 0, 'dshdsh', 's', 's', 's', 's', 's', 'No', 'Yes', 'No', 'Yes', 'Yes'),
(13, '', '', 'aaa', 'ghjk', 'sfsf', 'sdsssds', 'sds', 'sdssds', 'nnn', 0, 0, 'dshdsh', 's', 's', 's', 's', 's', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(14, '', '', 'aaa', 'ghjk', 'staff', 'sdsssds', 'sds', 'sdssds', 'nnn', 0, 789, 'dshdsh', 's', 's', 's', 's', 's', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(15, '', '', 'aaa', 'ghjk', 'staff', 'sdsssds', 'sds', 'sdssds', 'nnn', 0, 0, 'dshdsh', 's', 's', 's', 's', 's', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');

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

--
-- Dumping data for table `c_requests`
--

INSERT INTO `c_requests` (`company_id`, `companyName`, `industry`, `contactPerson`, `contactNum`, `email`, `password`, `message`, `companyType`, `date`) VALUES
(12, 'Capstone Company', 'IT', 'Juan Dela Cruz', '0912-345-67', 'juandelacruz123@gmail.com', 'JuanDelaCruz_123', 'Our Capstone Company would like to request an account.', '', '2023-09-08 16:19:39'),
(15, '', 'IT', 'Company Two', '0912-345-67', 'companytwo2@gmail.com', 'CompanyTwo_2', 'Company Two would like to request an account.', '', '2023-09-13 10:30:57'),
(17, 'Company Four', 'Technology', 'Company Four', '0912-345-67', 'companyfour4@gmail.com', 'CompanyFour_4', 'Company Four would like to request an account.', 'Direct Company', '2023-09-15 20:27:56');

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
-- Table structure for table `job_post_roles`
--

CREATE TABLE `job_post_roles` (
  `job_post_roles_id` int(11) NOT NULL,
  `roles` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_post_roles`
--

INSERT INTO `job_post_roles` (`job_post_roles_id`, `roles`) VALUES
(1, 'Company'),
(2, 'Peso');

-- --------------------------------------------------------

--
-- Table structure for table `p_accounttb`
--

CREATE TABLE `p_accounttb` (
  `peso_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(255) NOT NULL,
  `contactNum` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `p_accounttb`
--

INSERT INTO `p_accounttb` (`peso_id`, `name`, `position`, `contactNum`, `email`, `type`, `password`) VALUES
(1, ' Juan Dela Cruz', 'head', 0, 'juandelacruz123@gmail.com', 'admin', 'JuanDelaCruz_123'),
(4, 'Jeremy', 'Ruta', 0, 'jeremyruta@isda.com', 'user', 'jeremy'),
(5, 'admin', 'admin', 0, 'admin@gmail.com', 'user', 'admin'),
(6, 'sample', 'staff', 0, 'sample@gmail.com', 'user', 'sample'),
(7, 'Sample Four', 'staff', 912, 'samplefour4@gmail.com', 'user', 'SampleFour_4'),
(8, 'Sample Five', 'staff', 912, 'samplefive_5@gmail.com', 'user', 'SampleFive_5'),
(9, 'sample', 'staff', 912, 'sample@gmail.com', 'user', 'sample'),
(10, 'Rebo Barrameda Manguerra', 'staff', 901, 'rebrebmanguerra@gmail.com', 'user', 'Password_123');

-- --------------------------------------------------------

--
-- Table structure for table `p_accounttb_draft`
--

CREATE TABLE `p_accounttb_draft` (
  `peso_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `station` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `contactNum` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_accounttb_draft`
--

INSERT INTO `p_accounttb_draft` (`peso_id`, `name`, `station`, `position`, `contactNum`, `email`, `password`) VALUES
(1, 'sample', 'sample', '20', 0, 'sample@yahoo.com', 'sample'),
(2, 'aa', 'a', '52', 0, 'a@gmail.com', 'aaaaa'),
(3, 'Juan Dela Cruz', 'recruitment', 'staff', 2147483647, 'juandelacruz123@gmail.com', 'JuanDelaCruz_123');

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

-- --------------------------------------------------------

--
-- Table structure for table `p_requests`
--

CREATE TABLE `p_requests` (
  `peso_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `contactNum` varchar(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `p_requests`
--

INSERT INTO `p_requests` (`peso_id`, `name`, `position`, `contactNum`, `email`, `password`, `message`, `date`) VALUES
(3, 'sample', 'two', '0', 'sampletwo@gmail.com', 'SampleTwo', 'two sample would like to request an account.', '2023-09-05 11:19:08'),
(9, 'Sample Three', 'head', '912', 'samplethree3@gmail.com', 'SampleThree_3', 'Our head , Sample Three would like to request an account.', '2023-09-07 17:45:02');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `status_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`status_id`, `name`) VALUES
(1, 'Approved'),
(2, 'Rejected'),
(3, 'Pending'),
(4, 'In Review');

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
(1, 'Capstone Company', 'IT', 'Juan Dela Cruz', 2147483647, 'juandelacruz123@gmail.com', 'Santa Rosa, Laguna', '0123456789', '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `wap_educ`
--

CREATE TABLE `wap_educ` (
  `Wa_profile2_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `WschoolStatus` varchar(50) NOT NULL,
  `WeducLevel` varchar(50) NOT NULL,
  `WgradYear` varchar(50) NOT NULL,
  `Wschool` varchar(50) NOT NULL,
  `Wcourse` varchar(50) NOT NULL,
  `Waward` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wap_elig`
--

CREATE TABLE `wap_elig` (
  `Wa_profile5_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `WcareerServ1` varchar(50) NOT NULL,
  `WlicenceNum1` varchar(50) NOT NULL,
  `WexpiryDate1` varchar(50) NOT NULL,
  `WcareerServ2` varchar(50) NOT NULL,
  `WlicenceNum2` varchar(50) NOT NULL,
  `WexpiryDate2` varchar(50) NOT NULL,
  `WcareerServ3` varchar(50) NOT NULL,
  `WlicenceNum3` varchar(50) NOT NULL,
  `WexpiryDate3` varchar(50) NOT NULL,
  `WvalidDate` varchar(50) NOT NULL,
  `WlanguageCertifications` varchar(50) NOT NULL,
  `WotherCertification` varchar(50) NOT NULL,
  `WdialectsSpoken` varchar(50) NOT NULL,
  `WotherDialect` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wap_exp`
--

CREATE TABLE `wap_exp` (
  `Wa_profile6_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `WincluEDate1` varchar(50) NOT NULL,
  `WincluEDate2` varchar(50) NOT NULL,
  `WincluEDate3` varchar(50) NOT NULL,
  `WincluEDate4` varchar(50) NOT NULL,
  `Wcompany1` varchar(255) NOT NULL,
  `WcpAddress1` varchar(255) NOT NULL,
  `Wcompany2` varchar(255) NOT NULL,
  `WcpAddress2` varchar(255) NOT NULL,
  `Wcompany3` varchar(255) NOT NULL,
  `WcpAddress3` varchar(255) NOT NULL,
  `Wcompany4` varchar(255) NOT NULL,
  `WcpAddress4` varchar(255) NOT NULL,
  `Wposition1` varchar(50) NOT NULL,
  `WincluSDate1` varchar(50) NOT NULL,
  `WappointStat1` varchar(50) NOT NULL,
  `Wposition2` varchar(50) NOT NULL,
  `WincluSDate2` varchar(50) NOT NULL,
  `WappointStat2` varchar(50) NOT NULL,
  `Wposition3` varchar(50) NOT NULL,
  `WincluSDate3` varchar(50) NOT NULL,
  `WappointStat3` varchar(50) NOT NULL,
  `Wposition4` varchar(50) NOT NULL,
  `WincluSDate4` varchar(50) NOT NULL,
  `WappointStat4` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wap_info`
--

CREATE TABLE `wap_info` (
  `Wa_profile1_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `WlastName` varchar(50) NOT NULL,
  `WfirstName` varchar(50) NOT NULL,
  `WmidName` varchar(50) NOT NULL,
  `Wsuffix` varchar(50) NOT NULL,
  `WjobseekerType` varchar(50) NOT NULL,
  `Wbirthplace` varchar(50) NOT NULL,
  `Wbirthday` date NOT NULL,
  `Wage` int(11) NOT NULL,
  `Wsex` varchar(50) NOT NULL,
  `WcivilStatus` varchar(50) NOT NULL,
  `Wcitizenship` varchar(50) NOT NULL,
  `WhousenumPresent` varchar(50) NOT NULL,
  `WbrgyPresent` varchar(50) NOT NULL,
  `WcityPresent` varchar(50) NOT NULL,
  `WprovincePresent` varchar(50) NOT NULL,
  `WhousenumPermanent` varchar(50) DEFAULT NULL,
  `WbrgyPermanent` varchar(50) NOT NULL,
  `WcityPermanent` varchar(50) NOT NULL,
  `WprovincePermanent` varchar(50) NOT NULL,
  `Wheight` int(11) NOT NULL,
  `Wweight` int(11) NOT NULL,
  `WlandlineNum` int(11) NOT NULL,
  `WmobilePnum` int(11) NOT NULL,
  `WmobileSnum` int(11) NOT NULL,
  `Wemail` varchar(50) NOT NULL,
  `Wdisability` varchar(50) NOT NULL,
  `WemploymentStatus` varchar(50) NOT NULL,
  `WactivelyLooking` varchar(50) NOT NULL,
  `WwillinglyWork` varchar(50) NOT NULL,
  `WfourPsBeneficiary` varchar(50) NOT NULL,
  `Wofw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wap_prefer`
--

CREATE TABLE `wap_prefer` (
  `Wa_profile3_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `Wpoccupation1` varchar(50) NOT NULL,
  `Wpindustry1` varchar(50) NOT NULL,
  `Wpoccupation2` varchar(50) NOT NULL,
  `Wpindustry2` varchar(50) NOT NULL,
  `Wpoccupation3` varchar(50) NOT NULL,
  `Wpindustry3` varchar(50) NOT NULL,
  `WplocationType` varchar(50) NOT NULL,
  `Wplocation1` varchar(50) NOT NULL,
  `Wplocation2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wap_skills`
--

CREATE TABLE `wap_skills` (
  `Wa_profile7_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `Wskill` varchar(50) NOT NULL,
  `WtechSkill` varchar(50) NOT NULL,
  `WotherTechskill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wap_tvo`
--

CREATE TABLE `wap_tvo` (
  `Wa_profile4_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `WtrainingStatus` varchar(50) NOT NULL,
  `Wtraining1` varchar(50) NOT NULL,
  `WstartDuration1` date NOT NULL,
  `WendDuration1` date NOT NULL,
  `Wtraining2` varchar(50) NOT NULL,
  `WstartDuration2` date NOT NULL,
  `WendDuration2` date NOT NULL,
  `Wtraining3` varchar(50) NOT NULL,
  `WstartDuration3` date NOT NULL,
  `WendDuration3` date NOT NULL,
  `Winstitution1` varchar(50) NOT NULL,
  `Wcertificate1` varchar(50) NOT NULL,
  `Wcompletion1` varchar(50) NOT NULL,
  `Winstitution2` varchar(50) NOT NULL,
  `Wcertificate2` varchar(50) NOT NULL,
  `Wcompletion2` varchar(50) NOT NULL,
  `Winstitution3` varchar(50) NOT NULL,
  `Wcertificate3` varchar(50) NOT NULL,
  `Wcompletion3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `access_requests`
--
ALTER TABLE `access_requests`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `access_pk` (`peso_id`);

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
  ADD KEY `ap_skills_id_pk` (`ap_skills_id`);

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
  ADD KEY `c_jobpost_apply_pk` (`c_jobpost_id`);

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
-- Indexes for table `a_accounttb_draft`
--
ALTER TABLE `a_accounttb_draft`
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
-- Indexes for table `c_accounttb_draft`
--
ALTER TABLE `c_accounttb_draft`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `c_accounttb_draft3`
--
ALTER TABLE `c_accounttb_draft3`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `c_jobpost`
--
ALTER TABLE `c_jobpost`
  ADD PRIMARY KEY (`c_jobpost_id`),
  ADD KEY `c_jobpost_pk` (`company_id`);

--
-- Indexes for table `c_jobposts_draft`
--
ALTER TABLE `c_jobposts_draft`
  ADD PRIMARY KEY (`c_jobposts_id`),
  ADD KEY `company_idfk` (`company_id`);

--
-- Indexes for table `c_jobpost_draft2`
--
ALTER TABLE `c_jobpost_draft2`
  ADD PRIMARY KEY (`c_jobpost_id`);

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
-- Indexes for table `job_post_roles`
--
ALTER TABLE `job_post_roles`
  ADD PRIMARY KEY (`job_post_roles_id`);

--
-- Indexes for table `p_accounttb`
--
ALTER TABLE `p_accounttb`
  ADD PRIMARY KEY (`peso_id`);

--
-- Indexes for table `p_accounttb_draft`
--
ALTER TABLE `p_accounttb_draft`
  ADD PRIMARY KEY (`peso_id`);

--
-- Indexes for table `p_jobpost`
--
ALTER TABLE `p_jobpost`
  ADD PRIMARY KEY (`p_jobpost_id`),
  ADD KEY `p_jobpost_pk` (`peso_id`);

--
-- Indexes for table `p_requests`
--
ALTER TABLE `p_requests`
  ADD PRIMARY KEY (`peso_id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_account`
--
ALTER TABLE `access_account`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `access_requests`
--
ALTER TABLE `access_requests`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicant_profile`
--
ALTER TABLE `applicant_profile`
  MODIFY `applicant_profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicant_roles`
--
ALTER TABLE `applicant_roles`
  MODIFY `applicant_roles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `application_log`
--
ALTER TABLE `application_log`
  MODIFY `application_log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ap_educ`
--
ALTER TABLE `ap_educ`
  MODIFY `a_profile2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ap_elig`
--
ALTER TABLE `ap_elig`
  MODIFY `a_profile5_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ap_exp`
--
ALTER TABLE `ap_exp`
  MODIFY `a_profile6_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ap_info`
--
ALTER TABLE `ap_info`
  MODIFY `a_profile1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ap_prefer`
--
ALTER TABLE `ap_prefer`
  MODIFY `a_profile3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ap_skills`
--
ALTER TABLE `ap_skills`
  MODIFY `a_profile7_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ap_tvo`
--
ALTER TABLE `ap_tvo`
  MODIFY `a_profile4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `a_accounttb`
--
ALTER TABLE `a_accounttb`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `a_accounttb_draft`
--
ALTER TABLE `a_accounttb_draft`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `c_profile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_accounttb`
--
ALTER TABLE `c_accounttb`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `c_accounttb_draft`
--
ALTER TABLE `c_accounttb_draft`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `c_accounttb_draft3`
--
ALTER TABLE `c_accounttb_draft3`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `c_jobpost`
--
ALTER TABLE `c_jobpost`
  MODIFY `c_jobpost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `c_jobposts_draft`
--
ALTER TABLE `c_jobposts_draft`
  MODIFY `c_jobposts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `c_jobpost_draft2`
--
ALTER TABLE `c_jobpost_draft2`
  MODIFY `c_jobpost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- AUTO_INCREMENT for table `job_post_roles`
--
ALTER TABLE `job_post_roles`
  MODIFY `job_post_roles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `p_accounttb`
--
ALTER TABLE `p_accounttb`
  MODIFY `peso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `p_accounttb_draft`
--
ALTER TABLE `p_accounttb_draft`
  MODIFY `peso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `p_jobpost`
--
ALTER TABLE `p_jobpost`
  MODIFY `p_jobpost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p_requests`
--
ALTER TABLE `p_requests`
  MODIFY `peso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `walkin_applicant`
--
ALTER TABLE `walkin_applicant`
  MODIFY `W_applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `walkin_company`
--
ALTER TABLE `walkin_company`
  MODIFY `Wcompany_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wap_educ`
--
ALTER TABLE `wap_educ`
  MODIFY `Wa_profile2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wap_elig`
--
ALTER TABLE `wap_elig`
  MODIFY `Wa_profile5_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wap_exp`
--
ALTER TABLE `wap_exp`
  MODIFY `Wa_profile6_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wap_info`
--
ALTER TABLE `wap_info`
  MODIFY `Wa_profile1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wap_prefer`
--
ALTER TABLE `wap_prefer`
  MODIFY `Wa_profile3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wap_skills`
--
ALTER TABLE `wap_skills`
  MODIFY `Wa_profile7_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wap_tvo`
--
ALTER TABLE `wap_tvo`
  MODIFY `Wa_profile4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `ap_educ_id_pk` FOREIGN KEY (`ap_educ_id`) REFERENCES `ap_educ` (`a_profile2_id`),
  ADD CONSTRAINT `ap_elig_id_pk` FOREIGN KEY (`ap_elig_id`) REFERENCES `ap_elig` (`a_profile5_id`),
  ADD CONSTRAINT `ap_exp_id_pk` FOREIGN KEY (`ap_exp_id`) REFERENCES `ap_exp` (`a_profile6_id`),
  ADD CONSTRAINT `ap_info_id_pk` FOREIGN KEY (`ap_info_id`) REFERENCES `ap_info` (`a_profile1_id`),
  ADD CONSTRAINT `ap_prefer_id_pk` FOREIGN KEY (`ap_prefer_id`) REFERENCES `ap_prefer` (`a_profile3_id`),
  ADD CONSTRAINT `ap_skills_id_pk` FOREIGN KEY (`ap_skills_id`) REFERENCES `ap_skills` (`a_profile7_id`),
  ADD CONSTRAINT `ap_tvo_id_pk` FOREIGN KEY (`ap_tvo_id`) REFERENCES `ap_tvo` (`a_profile4_id`),
  ADD CONSTRAINT `applicant_id_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `application_log`
--
ALTER TABLE `application_log`
  ADD CONSTRAINT `applicant_id_apply_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`),
  ADD CONSTRAINT `c_jobpost_apply_pk` FOREIGN KEY (`c_jobpost_id`) REFERENCES `c_jobpost` (`c_jobpost_id`);

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
-- Constraints for table `c_jobpost`
--
ALTER TABLE `c_jobpost`
  ADD CONSTRAINT `c_jobpost_pk` FOREIGN KEY (`company_id`) REFERENCES `c_accounttb` (`company_id`);

--
-- Constraints for table `c_jobposts_draft`
--
ALTER TABLE `c_jobposts_draft`
  ADD CONSTRAINT `company_idfk` FOREIGN KEY (`company_id`) REFERENCES `c_accounttb_draft` (`company_id`);

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `requirement_pk` FOREIGN KEY (`company_id`) REFERENCES `c_requests` (`company_id`);

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
