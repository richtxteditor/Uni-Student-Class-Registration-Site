-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2023 at 07:13 PM
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
-- Database: `finalprojdatabase`
--
CREATE DATABASE IF NOT EXISTS `finalprojdatabase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `finalprojdatabase`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_name` varchar(60) NOT NULL,
  `admin_username` varchar(60) DEFAULT NULL,
  `admin_password` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_name`, `admin_username`, `admin_password`) VALUES
('Nathan', 'williamsn12', '$2y$10$Tk2Rnc7wBcsYGzAZarvodevq1GgC.aMxRdQitRByVgPHbwNuOEuam'),
('Richie', 'molinar4', '$2y$10$IkwkkKb/6KmhF3ztSxx82e41nc7bLTTfCOkcUOtjQbGTmpNEyxBfK'),
('Wanda', 'silvaw2', '$2y$10$TYSim6MWD7xq4jHPeV0v6eesYrBc7VQVzWTc8RsRaJASrrBSgGpOC');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cid` int(11) NOT NULL,
  `cname` varchar(60) NOT NULL,
  `instructor` varchar(60) NOT NULL,
  `day` char(3) DEFAULT NULL,
  `time` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cid`, `cname`, `instructor`, `day`, `time`) VALUES
(101, 'Introduction to Computer Science', 'Dr. Jane Smith', 'Mon', 'AM'),
(102, 'Algebra', 'Professor Sue', 'Tue', 'PM'),
(103, 'Modern Physics', 'Dr. Emily Johnson', 'Wed', 'AM'),
(104, 'World History', 'Dr. Michael Brown', 'Thu', 'PM'),
(105, 'Creative Writing', 'Prof. Anna Davis', 'Fri', 'AM'),
(106, 'Molecular Biology', 'Dr. Chris Wilson', 'Mon', 'PM'),
(107, 'Digital Marketing', 'Prof. Lisa White', 'Tue', 'AM'),
(108, 'Artificial Intelligence', 'Dr. Robert Taylor', 'Mon', 'PM'),
(109, 'Environmental Science', 'Dr. Sarah Martin', 'Wed', 'PM'),
(110, 'Business Management', 'Prof. Daniel Garcia', 'Thu', 'AM'),
(111, 'Advanced Mathematics', 'Prof. John Doe', 'Fri', 'PM'),
(201, 'Ceramics', 'Dr. Lopez', 'Mon', 'AM');

-- --------------------------------------------------------

--
-- Table structure for table `enrolled`
--

CREATE TABLE `enrolled` (
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrolled`
--

INSERT INTO `enrolled` (`sid`, `cid`) VALUES
(7087, 105),
(7087, 102),
(7087, 106),
(1234567, 101);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `sid` int(11) NOT NULL,
  `sname` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sid`, `sname`, `username`, `password`) VALUES
(190, 'Abby', '1234abc', '$2y$10$b4FHFfbKNz5.lfVbGaVfpOmFI5y3YO.JG7dWRng7GGept5TI4vBkW'),
(208, 'Jamie', 'castello14', '$2y$10$3GF2HYLp3B6fnZtn9SARGuykUzjfHkpEvu88G8qna0eAxdzz0tI3K'),
(720, 'Angela', 'gomez3', '$2y$10$rlT0qdklfMSB/21onOuJJuDvMIsVx7mPSC1zQya3tHrJMhh7hrA2m'),
(7086, 'Yuno', 'yunoawesome1223', '$2y$10$pLXhIVDuh9j2057GG0wqw.e.16JJPvIZSW55pgTWlu0n5Nmazwx7C'),
(7087, 'rich', 'richo', '$2y$10$5DKOnf9ff6gPEl23dJdikev9AXYCMJFZJq7Yt2JAwW5KPgBE8NagC'),
(7088, 'hello', 'helloagain', '$2y$10$vDEXAAF7R.hfJlsuvGvLW.EWHXKQqawhhd1r1ByxfdQqAaclVt2ly'),
(7089, '', '', '$2y$10$l.19PGCK2GR3sqmZ3NDoTOrLNbHeSrMBoyvKTo0lBrctWglsjmjIm'),
(7090, 'john', 'john@john.com', '$2y$10$aWei44rJ1Sb60B9.9PfLq.2DvwKLNgRvowXofHEXml89iAehWiTqG'),
(7091, 'richie', 'richie', '$2y$10$iiETN9XQaHvFm.fSePY5jeNGT8U.JJfjAKl5ehvrINMZXwC6QUUAW'),
(7092, 'test', 'tester', '$2y$10$3.Lyediim88c5znduS.7LOCK.zVJA4U6QXpSxSEAcni782OwAhnLO'),
(12345, 'karen', 'karen123', '$2y$10$oNAYYrfUVP9wBlv5hXZqpO5RnC9EbJx2iu4zYPHfQa6AuDbnUIJhG'),
(1234567, 'student', 'student_test', '$2y$10$KbqgyEZXwkpsYXuhfOPy/.KeLd5/LCcWxnnlPVh5NjeQmgmE70MdS'),
(999999999, 'testeroni', 'testeroni', '$2y$10$czoHlSthcPnkb.sMH99st.F/1oV75nIbh.P3zuJl.AiYbhO5pXn3K');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_name`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD KEY `cid` (`cid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrolled`
--
ALTER TABLE `enrolled`
  ADD CONSTRAINT `enrolled_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `courses` (`cid`),
  ADD CONSTRAINT `enrolled_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `students` (`sid`);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table admins
--

--
-- Metadata for table courses
--

--
-- Metadata for table enrolled
--

--
-- Metadata for table students
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'finalprojdatabase', 'students', '{\"sorted_col\":\"`students`.`sid` DESC\"}', '2023-12-09 23:30:03');

--
-- Metadata for database finalprojdatabase
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
