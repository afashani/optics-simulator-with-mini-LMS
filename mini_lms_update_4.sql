-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2022 at 06:07 PM
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

CREATE TABLE `activity` (
  `activity_id` int(3) NOT NULL,
  `activity_name` varchar(50) NOT NULL,
  `activity_fpath` varchar(200) NOT NULL,
  `added_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deadline` datetime NOT NULL,
  `answer_fpath` varchar(100) NOT NULL,
  `marksheet_id` char(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activity_id`, `activity_name`, `activity_fpath`, `added_time`, `deadline`, `answer_fpath`, `marksheet_id`) VALUES
(1, 'Activity-01', 'adActivity-01.pdf', '2022-03-07 16:05:28', '2022-03-29 12:00:00', 'ansActivity-01', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `activityscriptsviews`
-- (See below for the actual view)
--
CREATE TABLE `activityscriptsviews` (
`student_name` varchar(50)
,`submission_time` datetime
,`deadline` datetime
,`answer_id` int(10)
,`activity_id` int(3)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `activityviews`
-- (See below for the actual view)
--
CREATE TABLE `activityviews` (
`activity_id` int(3)
,`activity_name` varchar(50)
,`activity_fpath` varchar(200)
,`deadline` datetime
,`added_time` timestamp
,`date` date
,`marksheet_id` char(6)
,`answer_fpath` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` char(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
('1', 'chamara@gmail.com', 'a7f347cbea27f2331a56c2238fb15970c6a3dd00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_activity`
--

CREATE TABLE `admin_activity` (
  `admin_id` char(3) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `activity_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_activity`
--

INSERT INTO `admin_activity` (`admin_id`, `date`, `activity_id`) VALUES
('1', '2022-03-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_answer`
--

CREATE TABLE `admin_answer` (
  `admin_id` char(3) NOT NULL,
  `answer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin_marksheet`
--

CREATE TABLE `admin_marksheet` (
  `admin_id` char(3) NOT NULL,
  `marksheet_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_marksheet`
--

INSERT INTO `admin_marksheet` (`admin_id`, `marksheet_id`) VALUES
('1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_tutorial`
--

CREATE TABLE `admin_tutorial` (
  `admin_id` char(3) NOT NULL,
  `tutorial_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(10) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `student_id` char(10) NOT NULL,
  `submission_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `file_name`, `student_id`, `submission_time`) VALUES
(1, '1ansActivity-01', '1', '2022-03-07 22:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `marksheet`
--

CREATE TABLE `marksheet` (
  `marksheet_id` int(6) NOT NULL,
  `file_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marksheet`
--

INSERT INTO `marksheet` (`marksheet_id`, `file_name`) VALUES
(1, 'mcActivity-01');

-- --------------------------------------------------------

--
-- Stand-in structure for view `marksheetviews`
-- (See below for the actual view)
--
CREATE TABLE `marksheetviews` (
`marksheet_id` int(6)
,`activity_name` varchar(50)
,`file_name` varchar(100)
);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` char(10) NOT NULL,
  `student_name` varchar(50) NOT NULL,
  `address` varchar(150) NOT NULL,
  `tele` char(10) NOT NULL,
  `class` char(3) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(300) NOT NULL,
  `confirm` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `address`, `tele`, `class`, `email`, `password`, `confirm`) VALUES
('1', 'Shana Wishawajith', 'Badulla', '0718178191', '12', 'sahana@gmail.com', 'e454850cdc7f8cb8bd1abe76fa6781858e02aa34', 1),
('2', 'Janith Liyanage', 'Bandarawela', '0718172818', '13', 'janith@gmail.com', '9d1258077bcf57d48d94dcdcb7ca292a6d64fe1f', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_activity`
--

CREATE TABLE `student_activity` (
  `student_id` char(10) NOT NULL,
  `activity_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_activity`
--

INSERT INTO `student_activity` (`student_id`, `activity_id`) VALUES
('1', 1),
('1', 1),
('1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student_tutorial`
--

CREATE TABLE `student_tutorial` (
  `student_id` char(10) NOT NULL,
  `tutorial_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `tutorial_id` int(5) NOT NULL,
  `tutorial_name` varchar(150) NOT NULL,
  `tute_fpath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`tutorial_id`, `tutorial_name`, `tute_fpath`) VALUES
(0, 'Convex and Concave Lenses', 'https://www.youtube.com/watch?v=CJ6aB5ULqa0');

-- --------------------------------------------------------

--
-- Structure for view `activityscriptsviews`
--
DROP TABLE IF EXISTS `activityscriptsviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activityscriptsviews`  AS SELECT DISTINCT `student`.`student_name` AS `student_name`, `answer`.`submission_time` AS `submission_time`, `activity`.`deadline` AS `deadline`, `answer`.`answer_id` AS `answer_id`, `activity`.`activity_id` AS `activity_id` FROM (((`student` join `answer`) join `activity`) join `student_activity`) WHERE `answer`.`student_id` = `student`.`student_id` ;

-- --------------------------------------------------------

--
-- Structure for view `activityviews`
--
DROP TABLE IF EXISTS `activityviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `activityviews`  AS SELECT DISTINCT `activity`.`activity_id` AS `activity_id`, `activity`.`activity_name` AS `activity_name`, `activity`.`activity_fpath` AS `activity_fpath`, `activity`.`deadline` AS `deadline`, `activity`.`added_time` AS `added_time`, `admin_activity`.`date` AS `date`, `activity`.`marksheet_id` AS `marksheet_id`, `activity`.`answer_fpath` AS `answer_fpath` FROM (`activity` join `admin_activity`) WHERE `activity`.`activity_id` = `admin_activity`.`activity_id` ;

-- --------------------------------------------------------

--
-- Structure for view `marksheetviews`
--
DROP TABLE IF EXISTS `marksheetviews`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `marksheetviews`  AS SELECT `marksheet`.`marksheet_id` AS `marksheet_id`, `activity`.`activity_name` AS `activity_name`, `marksheet`.`file_name` AS `file_name` FROM (`activity` join `marksheet`) WHERE `activity`.`marksheet_id` = `marksheet`.`marksheet_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `marksheet_id` (`marksheet_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_activity`
--
ALTER TABLE `admin_activity`
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `admin_answer`
--
ALTER TABLE `admin_answer`
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- Indexes for table `admin_marksheet`
--
ALTER TABLE `admin_marksheet`
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `marksheet_id` (`marksheet_id`);

--
-- Indexes for table `admin_tutorial`
--
ALTER TABLE `admin_tutorial`
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `tutorial_id` (`tutorial_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `marksheet`
--
ALTER TABLE `marksheet`
  ADD PRIMARY KEY (`marksheet_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_activity`
--
ALTER TABLE `student_activity`
  ADD KEY `student_id` (`student_id`),
  ADD KEY `activity_id` (`activity_id`);

--
-- Indexes for table `student_tutorial`
--
ALTER TABLE `student_tutorial`
  ADD KEY `student_id` (`student_id`),
  ADD KEY `tutorial_id` (`tutorial_id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`tutorial_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activity_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marksheet`
--
ALTER TABLE `marksheet`
  MODIFY `marksheet_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
