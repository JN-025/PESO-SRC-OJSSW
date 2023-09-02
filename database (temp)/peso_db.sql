-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2023 at 05:01 AM
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
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `access_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `employeeNum` int(50) NOT NULL,
  `passcode` int(50) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `access`
--

INSERT INTO `access` (`access_id`, `name`, `email`, `employeeNum`, `passcode`, `status_id`) VALUES
(2, 'wew', 'wews@yahoo.com', 123, 123, 1),
(3, 'asdasd', 'asd@yahoo.com', 0, 123, 2);

-- --------------------------------------------------------

--
-- Table structure for table `access_statuses`
--

CREATE TABLE `access_statuses` (
  `access_statuses_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `access_statuses`
--

INSERT INTO `access_statuses` (`access_statuses_id`, `name`) VALUES
(1, 'Applicant'),
(2, 'Company'),
(3, 'Database'),
(4, 'Job Posting'),
(5, 'Report');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile`
--

CREATE TABLE `applicant_profile` (
  `a_profile1_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `midName` varchar(50) NOT NULL,
  `suffix` varchar(50) NOT NULL,
  `birthplace` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
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
  `mobilePnum` varchar(50) NOT NULL,
  `mobileSnum` varchar(50) NOT NULL,
  `disability` varchar(50) NOT NULL,
  `employmentStatus` varchar(50) NOT NULL,
  `educLevel` varchar(50) NOT NULL,
  `gradYear` int(4) NOT NULL,
  `school` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `preferIndustry` varchar(50) NOT NULL,
  `activelyLooking` varchar(50) NOT NULL,
  `willinglyWork` varchar(50) NOT NULL,
  `fourpsBeneficiary` varchar(50) NOT NULL,
  `ofw` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile01`
--

CREATE TABLE `applicant_profile01` (
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

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile02`
--

CREATE TABLE `applicant_profile02` (
  `a_profile2_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `schoolStatus` varchar(50) NOT NULL,
  `educLevel` varchar(50) NOT NULL,
  `gradYear` varchar(50) NOT NULL,
  `school` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `award` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile03`
--

CREATE TABLE `applicant_profile03` (
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

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile04`
--

CREATE TABLE `applicant_profile04` (
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

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile05`
--

CREATE TABLE `applicant_profile05` (
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

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile06`
--

CREATE TABLE `applicant_profile06` (
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

-- --------------------------------------------------------

--
-- Table structure for table `applicant_profile07`
--

CREATE TABLE `applicant_profile07` (
  `a_profile7_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `skill` varchar(50) NOT NULL,
  `techSkill` varchar(50) NOT NULL,
  `otherTechskill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `Pnum` int(12) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_img` text NOT NULL,
  `verification_code` varchar(255) DEFAULT NULL,
  `email_verified` tinyint(1) DEFAULT 0,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `a_accounttb`
--

INSERT INTO `a_accounttb` (`applicant_id`, `lastname`, `firstname`, `middlename`, `age`, `sex`, `Pnum`, `email`, `password`, `profile_img`, `verification_code`, `email_verified`, `code`) VALUES
(48, 'sample', 'sample', '', 31, 'Male', 2147483647, 'sample@gmail.com', 'password123', '', NULL, 0, ''),
(50, 'asdas', 'asdas', '', 45, 'Female', 2147483647, 'sample123@gmail.com', '456', '', NULL, 0, ''),
(51, 'sdf', 'sdf', '', 22, 'Female', 2147483647, 'sdfsdgd@gmail.com', 'qweqwe', '', NULL, 0, ''),
(52, 'adfa', 'fadf', '', 34, 'Male', 945634624, 'skgjhsljasdask@yahoo.com', 'qwerty', '', NULL, 0, ''),
(69, 'Manguerra', 'Rebo', '', 21, 'Male', 2147483647, 'rebrebmanguerra@gmail.com', 'password123', '', NULL, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE `company_profile` (
  `c_profile_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
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
  `companyName` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `contactPerson` varchar(255) DEFAULT NULL,
  `contactNum` int(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c_accounttb`
--

INSERT INTO `c_accounttb` (`company_id`, `companyName`, `industry`, `contactPerson`, `contactNum`, `email`, `password`) VALUES
(2, 'sad', 'Industry 1', 'sad', 2147483647, 'sad@yahoo.com', 'sad123'),
(3, 'sample', 'Industry 1', 'sample', 2147483647, 'sample@yahoo.com', 'sample123'),
(4, 'dasd', 'Industry 1', '092331412412312321312', 2147483647, 'asjkdlhaskjH@yahoo.com', 'sample123'),
(5, 'sad', 'Industry 1', 'sad', 2147483647, 'sad@yahoo.com', 'sad'),
(7, 'coffee shop', 'shop', 'rebo manguerra', 2147483647, 'rebrebmanguerra@gmail.com', 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `c_jobpost`
--

CREATE TABLE `c_jobpost` (
  `c_jobpost_id` int(11) NOT NULL,
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
-- Dumping data for table `c_jobpost`
--

INSERT INTO `c_jobpost` (`c_jobpost_id`, `companyName`, `industry`, `position`, `educBg`, `yrsExperience`, `workLocation`, `jobTitle`, `slot`, `salary`, `skills`, `question1`, `question2`, `question3`, `question4`, `question5`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`) VALUES
(8, 'Capstone Company', 'Technology', 'staff', 'IT graduate', '2', 'Santa Rosa', 'Developer', 10, 50000, 'php, html, css, js', '', '', '', '', '', '', '', '', '', ''),
(9, 'Capstone Company', 'Technology', 'staff', 'IT graduate', '2', 'Santa Rosa', 'Developer', 10, 50000, 'php, html, css, js', '', '', '', '', '', '', '', '', '', ''),
(10, 'Capstone Company', 'Technology', 'staff', 'IT graduate', '2', 'Santa Rosa', 'Developer', 10, 50000, 'php, html, css, js', 'a', 'b', 'c', 'd', 'e', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(11, 'Capstone Company', 'Technology', 'staff', 'IT graduate', '2', 'Santa Rosa', 'Developer', 10, 50000, 'php, html, css, js', 'a', 'b', 'c', 'd', 'e', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(12, 'coffee shop', 'dasdsa', 'asdas', 'dasd', '234', 'asd', 'sad', 2342, 342, 'asdas', 'asdasd', 'asdasd', 'asd', 'asdas', 'dasd', 'Yes', 'Yes', 'Yes', 'No', 'No'),
(13, 'coffee shop', 'fsd', 'fsd', 'fsdf', 'sdf', 'sdfsd', 'sdfsd', 0, 0, 'sdf', 'sdsad', 'asd', 'asd', 'asda', 'sdasd', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes'),
(14, 'coffee shop', 'fsdfsd', 'fsdfsd', 'fsd', 'fsdf', 'sdfsd', 'dsfsd123', 0, 0, 'asdas', 'asdasd', 'asdas', 'dasd', 'asd', 'asdasd', 'Yes', 'No', 'Yes', 'Yes', 'Yes'),
(15, 'coffee shop', 'shop', 'staff', 'IT graduate', '2', 'Santa Rosa, Laguna', 'coffee', 10, 2000, 'chef', 's', 's', 's', 's', 's', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `c_job_posts_backup`
--

CREATE TABLE `c_job_posts_backup` (
  `c_job_posts_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `jobTitle` varchar(50) NOT NULL,
  `roleType` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `yrsExperience` varchar(50) NOT NULL,
  `jobSpecialization` varchar(50) NOT NULL,
  `workLocation` varchar(50) NOT NULL,
  `salary` decimal(8,2) NOT NULL,
  `educBg` varchar(255) NOT NULL,
  `numSlot` int(20) NOT NULL,
  `jobDescription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `c_job_posts_backup`
--

INSERT INTO `c_job_posts_backup` (`c_job_posts_id`, `company_id`, `jobTitle`, `roleType`, `position`, `yrsExperience`, `jobSpecialization`, `workLocation`, `salary`, `educBg`, `numSlot`, `jobDescription`) VALUES
(1, 2, 'adjha', 'aksdh', 'aksjdh', 'aksjdh', 'aksjdh', 'askdj', '2312.00', 'askjdha', 32131, 'skjdhaskdh'),
(2, 3, 'dasjdgk', 'jaksgdka', 'asjkdhga', 'jkdashgd', 'ajkhgds', 'ajhd', '37481.00', 'dasgd', 34323, 'asdkasgd');

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
  `station` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `contactNum` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_accounttb`
--

INSERT INTO `p_accounttb` (`peso_id`, `name`, `station`, `position`, `contactNum`, `email`, `password`) VALUES
(1, 'sample', 'sample', '20', 0, 'sample@yahoo.com', 'sample'),
(2, 'aa', 'a', '52', 0, 'a@gmail.com', 'aaaaa'),
(3, 'Juan Dela Cruz', 'recruitment', 'staff', 2147483647, 'juandelacruz123@gmail.com', 'JuanDelaCruz_123'),
(4, 'asdasdasdasasd', 'asdas', 'das', 0, 'rebrebmanguerra@gmail.com', 'password123'),
(5, 'asd', 'asd', 'asd', 0, 'rebrebmanguerra@gmail.com', 'password123');

-- --------------------------------------------------------

--
-- Table structure for table `p_accounttb_backup`
--

CREATE TABLE `p_accounttb_backup` (
  `peso_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `position` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `p_accounttb_backup`
--

INSERT INTO `p_accounttb_backup` (`peso_id`, `name`, `age`, `sex`, `position`, `email`, `password`) VALUES
(1, 'sample', 20, 'Female', 'Position1', 'sample@yahoo.com', 'sample');

-- --------------------------------------------------------

--
-- Table structure for table `p_job_posts`
--

CREATE TABLE `p_job_posts` (
  `p_job_posts_id` int(11) NOT NULL,
  `peso_id` int(11) NOT NULL,
  `jobTitle` varchar(50) NOT NULL,
  `roleType` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `yrsExperience` varchar(50) NOT NULL,
  `jobSpecialization` varchar(50) NOT NULL,
  `workLocation` varchar(50) NOT NULL,
  `salary` decimal(8,2) NOT NULL,
  `educBg` varchar(255) NOT NULL,
  `numSlot` int(20) NOT NULL,
  `jobDescription` text NOT NULL,
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
-- Dumping data for table `p_job_posts`
--

INSERT INTO `p_job_posts` (`p_job_posts_id`, `peso_id`, `jobTitle`, `roleType`, `position`, `yrsExperience`, `jobSpecialization`, `workLocation`, `salary`, `educBg`, `numSlot`, `jobDescription`, `question1`, `answer1`, `question2`, `answer2`, `question3`, `answer3`, `question4`, `answer4`, `question5`, `answer5`) VALUES
(1, 2, 'a', 'aa', 'a', 'a', 'a', 'a', '1235.00', 'a', 112, 'aaaa aaa aaa', 'a', 'Yes', 'a', 'Yes', 'a', 'Yes', 'a', 'Yes', 'a', 'Yes');

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

-- --------------------------------------------------------

--
-- Table structure for table `walkin_applicant_backup`
--

CREATE TABLE `walkin_applicant_backup` (
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
-- Dumping data for table `walkin_applicant_backup`
--

INSERT INTO `walkin_applicant_backup` (`W_applicant_id`, `W_lastName`, `W_firstName`, `W_midName`, `W_suffix`, `W_jobseekerType`, `W_birthplace`, `W_birthday`, `W_age`, `W_sex`, `W_civilStatus`, `W_citizenship`, `W_housenumPresent`, `W_brgyPresent`, `W_cityPresent`, `W_provincePresent`, `W_housenumPermanent`, `W_brgyPermanent`, `W_cityPermanent`, `W_provincePermanent`, `W_height`, `W_weight`, `W_landlineNum`, `W_mobilePnum`, `W_mobileSnum`, `W_email`, `W_disability`, `W_employmentStatus`, `W_educLevel`, `W_gradYear`, `W_school`, `W_course`, `W_preferIndustry`, `W_activelyLooking`, `W_willinglyWork`, `W_fourPsBeneficiary`, `W_ofw`) VALUES
(6, 'a', 'a', 'a', 'a', 'jobseeker', '', '0000-00-00', 0, '', '', '', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, 0, '', '', '', '', 0, '', '', '', '', '', '', ''),
(7, 'a', 'a', 'a', 'a', 'first_time', 'a', '0000-00-00', 0, 'a', 'a', 'a', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, 0, 'a', '', '', '', 0, '', '', '', '', '', '', ''),
(8, 'm', 'm', 'm', 'm', 'first_time', 'm', '1999-08-25', 25, 'm', 'm', 'm', '', '', '', '', NULL, '', '', '', 0, 0, 0, 0, 0, 'm', '', '', '', 0, '', '', '', '', '', '', ''),
(10, 'dasd', 'asjdkh', 'aksjdh', 'akjshd', 'first_time', 'asd', '0001-01-01', 20, 'Female', 'Single', 'asdasd', 'dasd', 'asdas', 'dasd', 'asdas', 'das', 'das', 'asd', 'asdas', 342, 233, 9123312, 312312, 0, 'asdas', 'none', 'wage_employed', 'asdas', 2147483647, 'dasd', 'sadas', 'dasdas', 'yes', 'yes', 'yes', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `access_status_fk` (`status_id`);

--
-- Indexes for table `access_statuses`
--
ALTER TABLE `access_statuses`
  ADD PRIMARY KEY (`access_statuses_id`);

--
-- Indexes for table `applicant_profile`
--
ALTER TABLE `applicant_profile`
  ADD PRIMARY KEY (`a_profile1_id`),
  ADD KEY `a_profile_fk` (`applicant_id`);

--
-- Indexes for table `applicant_profile01`
--
ALTER TABLE `applicant_profile01`
  ADD PRIMARY KEY (`a_profile1_id`),
  ADD KEY `a_profile1_pk` (`applicant_id`);

--
-- Indexes for table `applicant_profile02`
--
ALTER TABLE `applicant_profile02`
  ADD PRIMARY KEY (`a_profile2_id`),
  ADD KEY `a_profile2_pk` (`applicant_id`);

--
-- Indexes for table `applicant_profile03`
--
ALTER TABLE `applicant_profile03`
  ADD PRIMARY KEY (`a_profile3_id`),
  ADD KEY `a_profile3_pk` (`applicant_id`);

--
-- Indexes for table `applicant_profile04`
--
ALTER TABLE `applicant_profile04`
  ADD PRIMARY KEY (`a_profile4_id`),
  ADD KEY `a_profile4_pk` (`applicant_id`);

--
-- Indexes for table `applicant_profile05`
--
ALTER TABLE `applicant_profile05`
  ADD PRIMARY KEY (`a_profile5_id`),
  ADD KEY `a_profile5_pk` (`applicant_id`);

--
-- Indexes for table `applicant_profile06`
--
ALTER TABLE `applicant_profile06`
  ADD PRIMARY KEY (`a_profile6_id`),
  ADD KEY `a_profile6_pk` (`applicant_id`);

--
-- Indexes for table `applicant_profile07`
--
ALTER TABLE `applicant_profile07`
  ADD PRIMARY KEY (`a_profile7_id`),
  ADD KEY `a_profile7_pk` (`applicant_id`);

--
-- Indexes for table `a_accounttb`
--
ALTER TABLE `a_accounttb`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD PRIMARY KEY (`c_profile_id`),
  ADD KEY `c_profile_fk` (`company_id`);

--
-- Indexes for table `c_accounttb`
--
ALTER TABLE `c_accounttb`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `c_jobpost`
--
ALTER TABLE `c_jobpost`
  ADD PRIMARY KEY (`c_jobpost_id`);

--
-- Indexes for table `c_job_posts_backup`
--
ALTER TABLE `c_job_posts_backup`
  ADD PRIMARY KEY (`c_job_posts_id`),
  ADD KEY `company_idfk` (`company_id`);

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
-- Indexes for table `p_accounttb_backup`
--
ALTER TABLE `p_accounttb_backup`
  ADD PRIMARY KEY (`peso_id`);

--
-- Indexes for table `p_job_posts`
--
ALTER TABLE `p_job_posts`
  ADD PRIMARY KEY (`p_job_posts_id`);

--
-- Indexes for table `walkin_applicant`
--
ALTER TABLE `walkin_applicant`
  ADD PRIMARY KEY (`W_applicant_id`);

--
-- Indexes for table `walkin_applicant_backup`
--
ALTER TABLE `walkin_applicant_backup`
  ADD PRIMARY KEY (`W_applicant_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `access_statuses`
--
ALTER TABLE `access_statuses`
  MODIFY `access_statuses_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `applicant_profile`
--
ALTER TABLE `applicant_profile`
  MODIFY `a_profile1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicant_profile01`
--
ALTER TABLE `applicant_profile01`
  MODIFY `a_profile1_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `applicant_profile02`
--
ALTER TABLE `applicant_profile02`
  MODIFY `a_profile2_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applicant_profile03`
--
ALTER TABLE `applicant_profile03`
  MODIFY `a_profile3_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `applicant_profile04`
--
ALTER TABLE `applicant_profile04`
  MODIFY `a_profile4_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applicant_profile05`
--
ALTER TABLE `applicant_profile05`
  MODIFY `a_profile5_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant_profile06`
--
ALTER TABLE `applicant_profile06`
  MODIFY `a_profile6_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant_profile07`
--
ALTER TABLE `applicant_profile07`
  MODIFY `a_profile7_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `a_accounttb`
--
ALTER TABLE `a_accounttb`
  MODIFY `applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `company_profile`
--
ALTER TABLE `company_profile`
  MODIFY `c_profile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `c_accounttb`
--
ALTER TABLE `c_accounttb`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `c_jobpost`
--
ALTER TABLE `c_jobpost`
  MODIFY `c_jobpost_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `c_job_posts_backup`
--
ALTER TABLE `c_job_posts_backup`
  MODIFY `c_job_posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_post_roles`
--
ALTER TABLE `job_post_roles`
  MODIFY `job_post_roles_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `p_accounttb`
--
ALTER TABLE `p_accounttb`
  MODIFY `peso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `p_accounttb_backup`
--
ALTER TABLE `p_accounttb_backup`
  MODIFY `peso_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `p_job_posts`
--
ALTER TABLE `p_job_posts`
  MODIFY `p_job_posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `walkin_applicant`
--
ALTER TABLE `walkin_applicant`
  MODIFY `W_applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `walkin_applicant_backup`
--
ALTER TABLE `walkin_applicant_backup`
  MODIFY `W_applicant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `access`
--
ALTER TABLE `access`
  ADD CONSTRAINT `access_status_fk` FOREIGN KEY (`status_id`) REFERENCES `access_statuses` (`access_statuses_id`) ON DELETE CASCADE;

--
-- Constraints for table `applicant_profile`
--
ALTER TABLE `applicant_profile`
  ADD CONSTRAINT `a_profile_fk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `applicant_profile01`
--
ALTER TABLE `applicant_profile01`
  ADD CONSTRAINT `a_profile1_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `applicant_profile02`
--
ALTER TABLE `applicant_profile02`
  ADD CONSTRAINT `a_profile2_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `applicant_profile03`
--
ALTER TABLE `applicant_profile03`
  ADD CONSTRAINT `a_profile3_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `applicant_profile04`
--
ALTER TABLE `applicant_profile04`
  ADD CONSTRAINT `a_profile4_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `applicant_profile05`
--
ALTER TABLE `applicant_profile05`
  ADD CONSTRAINT `a_profile5_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `applicant_profile06`
--
ALTER TABLE `applicant_profile06`
  ADD CONSTRAINT `a_profile6_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `applicant_profile07`
--
ALTER TABLE `applicant_profile07`
  ADD CONSTRAINT `a_profile7_pk` FOREIGN KEY (`applicant_id`) REFERENCES `a_accounttb` (`applicant_id`);

--
-- Constraints for table `company_profile`
--
ALTER TABLE `company_profile`
  ADD CONSTRAINT `c_profile_fk` FOREIGN KEY (`company_id`) REFERENCES `c_accounttb` (`company_id`);

--
-- Constraints for table `c_job_posts_backup`
--
ALTER TABLE `c_job_posts_backup`
  ADD CONSTRAINT `company_idfk` FOREIGN KEY (`company_id`) REFERENCES `c_accounttb` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
