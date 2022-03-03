-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 02:59 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini_lms`
--
CREATE DATABASE IF NOT EXISTS `mini_lms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mini_lms`;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `activity_id` char(3) NOT NULL,
  `activity_name` varchar(50) NOT NULL,
  `activity_fpath` varchar(200) NOT NULL,
  `added_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deadline` datetime NOT NULL,
  `answer_fpath` varchar(100) NOT NULL,
  `marksheet_id` char(6) DEFAULT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `marksheet_id` (`marksheet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `activity`
--

TRUNCATE TABLE `activity`;
--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_name`, `activity_fpath`, `added_time`, `deadline`, `answer_fpath`, `marksheet_id`) VALUES
('1', 'Activity-01', 'ac_Activity-01', '2022-03-01 00:28:40', '2022-03-23 23:54:24', 'ans_Activity-01', NULL),
('2', 'Activity-02', 'ac_Activity-02', '2022-03-01 23:10:35', '2022-03-31 23:57:53', 'ans_Activity-02', NULL),
('3', 'Activity-03', 'adActivity-03', '2022-03-03 12:14:05', '2022-03-31 01:01:00', 'ansActivity-03', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `activityscriptsviews`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `activityscriptsviews` (
`student_name` varchar(50)
,`submission_time` datetime
,`deadline` datetime
,`answer_id` char(10)
,`activity_id` char(3)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `activityviews`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `activityviews` (
`activity_id` char(3)
,`activity_name` varchar(50)
,`activity_fpath` varchar(200)
,`deadline` datetime
,`added_time` timestamp
,`date` date
,`marksheet_id` char(6)
);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` char(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `admin`
--

TRUNCATE TABLE `admin`;
--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
('1', 'ishan@gmail.com', 'ishanpw');

-- --------------------------------------------------------

--
-- Table structure for table `admin_activity`
--

CREATE TABLE IF NOT EXISTS `admin_activity` (
  `admin_id` char(3) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `activity_id` char(3) NOT NULL,
  KEY `admin_id` (`admin_id`),
  KEY `activity_id` (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `admin_activity`
--

TRUNCATE TABLE `admin_activity`;
--
-- Dumping data for table `admin_activity`
--

INSERT INTO `admin_activity` (`admin_id`, `date`, `activity_id`) VALUES
('1', '2022-03-03', '1'),
('1', '2022-03-03', '2'),
('1', '2022-03-03', '3');

-- --------------------------------------------------------

--
-- Table structure for table `admin_answer`
--

CREATE TABLE IF NOT EXISTS `admin_answer` (
  `admin_id` char(3) NOT NULL,
  `answer_id` char(10) NOT NULL,
  KEY `admin_id` (`admin_id`),
  KEY `answer_id` (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `admin_answer`
--

TRUNCATE TABLE `admin_answer`;
-- --------------------------------------------------------

--
-- Table structure for table `admin_marksheet`
--

CREATE TABLE IF NOT EXISTS `admin_marksheet` (
  `admin_id` char(3) NOT NULL,
  `marksheet_id` char(6) NOT NULL,
  KEY `admin_id` (`admin_id`),
  KEY `marksheet_id` (`marksheet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `admin_marksheet`
--

TRUNCATE TABLE `admin_marksheet`;
--
-- Dumping data for table `admin_marksheet`
--

INSERT INTO `admin_marksheet` (`admin_id`, `marksheet_id`) VALUES
('1', '1'),
('1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `admin_tutorial`
--

CREATE TABLE IF NOT EXISTS `admin_tutorial` (
  `admin_id` char(3) NOT NULL,
  `tutorial_id` char(5) NOT NULL,
  KEY `admin_id` (`admin_id`),
  KEY `tutorial_id` (`tutorial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `admin_tutorial`
--

TRUNCATE TABLE `admin_tutorial`;
--
-- Dumping data for table `admin_tutorial`
--

INSERT INTO `admin_tutorial` (`admin_id`, `tutorial_id`) VALUES
('1', '1'),
('1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` char(10) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `student_id` char(10) NOT NULL,
  `submission_time` datetime NOT NULL,
  PRIMARY KEY (`answer_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `answer`
--

TRUNCATE TABLE `answer`;
--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `file_name`, `student_id`, `submission_time`) VALUES
('1', 'Titlle1_Std1_Answer', '1', '2022-03-01 18:58:08'),
('2', 'Activity1_Std2_answer', 'G120001', '2022-03-01 18:58:54'),
('3', 'Ac2_Student3', 'G120003', '2022-03-01 19:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `marksheet`
--

CREATE TABLE IF NOT EXISTS `marksheet` (
  `marksheet_id` char(6) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  PRIMARY KEY (`marksheet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `marksheet`
--

TRUNCATE TABLE `marksheet`;
--
-- Dumping data for table `marksheet`
--

INSERT INTO `marksheet` (`marksheet_id`, `file_name`) VALUES
('1', '%PDF-1.5\r\n%????\r\n1 0 obj\r\n<</Type/Catalog/Pages 2 0 R/Lang(en-US) /StructTreeRoot 10 0 R/MarkInfo<</'),
('2', '%PDF-1.5\r\n%????\r\n1 0 obj\r\n<</Type/Catalog/Pages 2 0 R/Lang(en-US) /StructTreeRoot 10 0 R/MarkInfo<</');

-- --------------------------------------------------------

--
-- Stand-in structure for view `marksheetviews`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `marksheetviews` (
`marksheet_id` char(6)
,`activity_name` varchar(50)
,`file_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` char(10) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `tele` char(10) NOT NULL,
  `class` char(3) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `student`
--

TRUNCATE TABLE `student`;
--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `address`, `tele`, `class`, `email`, `password`) VALUES
('1', 'chamra silvaa', 'Badulla', '0718190929', '12', 'chamara@gmail.com', 'chamarapw'),
('G120001', 'sahana', 'Dehiwala', '0718191891', '12', 'shana@gmail.com', ''),
('G120003', 'fashas', 'Rathnapura', '0718729102', '13', 'fashas@gmail.com', '948dd4c2c436ca435a18');

-- --------------------------------------------------------

--
-- Table structure for table `student_activity`
--

CREATE TABLE IF NOT EXISTS `student_activity` (
  `student_id` char(10) NOT NULL,
  `activity_id` char(3) NOT NULL,
  KEY `student_id` (`student_id`),
  KEY `activity_id` (`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `student_activity`
--

TRUNCATE TABLE `student_activity`;
-- --------------------------------------------------------

--
-- Table structure for table `student_tutorial`
--

CREATE TABLE IF NOT EXISTS `student_tutorial` (
  `student_id` char(10) NOT NULL,
  `tutorial_id` char(5) NOT NULL,
  KEY `student_id` (`student_id`),
  KEY `tutorial_id` (`tutorial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `student_tutorial`
--

TRUNCATE TABLE `student_tutorial`;
-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE IF NOT EXISTS `tutorial` (
  `tutorial_id` char(5) NOT NULL,
  `tutorial_name` varchar(20) NOT NULL,
  `tute_fpath` varchar(100) NOT NULL,
  PRIMARY KEY (`tutorial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Truncate table before insert `tutorial`
--

TRUNCATE TABLE `tutorial`;
--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`tutorial_id`, `tutorial_name`, `tute_fpath`) VALUES
('1', 'Tute 1', '%PDF-1.5\r\n%????\r\n1 0 obj\r\n<</Type/Catalog/Pages 2 0 R/Lang(en-US) /StructTreeRoot 10 0 R/MarkInfo<</'),
('2', 'Tute 2', '%PDF-1.5\r\n%????\r\n1 0 obj\r\n<</Type/Catalog/Pages 2 0 R/Lang(en-US) /StructTreeRoot 10 0 R/MarkInfo<</');

-- --------------------------------------------------------

--
-- Structure for view `activityscriptsviews`
--
DROP TABLE IF EXISTS `activityscriptsviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activityscriptsviews`  AS SELECT `student`.`student_name` AS `student_name`, `answer`.`submission_time` AS `submission_time`, `activity`.`deadline` AS `deadline`, `answer`.`answer_id` AS `answer_id`, `activity`.`activity_id` AS `activity_id` FROM (((`student` join `answer`) join `activity`) join `student_activity`) WHERE `answer`.`student_id` = `student`.`student_id` AND `student_activity`.`student_id` = `activity`.`activity_id` GROUP BY `answer`.`student_id` ;

-- --------------------------------------------------------

--
-- Structure for view `activityviews`
--
DROP TABLE IF EXISTS `activityviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activityviews`  AS SELECT `activity`.`activity_id` AS `activity_id`, `activity`.`activity_name` AS `activity_name`, `activity`.`activity_fpath` AS `activity_fpath`, `activity`.`deadline` AS `deadline`, `activity`.`added_time` AS `added_time`, `admin_activity`.`date` AS `date`, `activity`.`marksheet_id` AS `marksheet_id` FROM (`activity` join `admin_activity`) WHERE `activity`.`activity_id` = `admin_activity`.`activity_id` ;

-- --------------------------------------------------------

--
-- Structure for view `marksheetviews`
--
DROP TABLE IF EXISTS `marksheetviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `marksheetviews`  AS SELECT `marksheet`.`marksheet_id` AS `marksheet_id`, `activity`.`activity_name` AS `activity_name`, `marksheet`.`file_name` AS `file_name` FROM (`activity` join `marksheet`) WHERE `activity`.`marksheet_id` = `marksheet`.`marksheet_id` ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`marksheet_id`) REFERENCES `marksheet` (`marksheet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_activity`
--
ALTER TABLE `admin_activity`
  ADD CONSTRAINT `admin_activity_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `admin_activity_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_answer`
--
ALTER TABLE `admin_answer`
  ADD CONSTRAINT `admin_answer_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`answer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_answer_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `admin_marksheet`
--
ALTER TABLE `admin_marksheet`
  ADD CONSTRAINT `admin_marksheet_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `admin_marksheet_ibfk_2` FOREIGN KEY (`marksheet_id`) REFERENCES `marksheet` (`marksheet_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `admin_tutorial`
--
ALTER TABLE `admin_tutorial`
  ADD CONSTRAINT `admin_tutorial_ibfk_1` FOREIGN KEY (`tutorial_id`) REFERENCES `tutorial` (`tutorial_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `admin_tutorial_ibfk_2` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `student_activity`
--
ALTER TABLE `student_activity`
  ADD CONSTRAINT `student_activity_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `student_activity_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_tutorial`
--
ALTER TABLE `student_tutorial`
  ADD CONSTRAINT `student_tutorial_ibfk_1` FOREIGN KEY (`tutorial_id`) REFERENCES `tutorial` (`tutorial_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_tutorial_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
