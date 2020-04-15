-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 15, 2020 at 08:30 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hostel management`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `Course_no` int(3) NOT NULL,
  `Course_name` varchar(15) NOT NULL,
  `Course_credit` int(2) NOT NULL,
  `Student_id` varchar(9) NOT NULL,
  `Faculty_id` varchar(15) NOT NULL,
  PRIMARY KEY (`Course_no`,`Student_id`,`Faculty_id`),
  KEY `Faculty_id` (`Faculty_id`),
  KEY `Student_id` (`Student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `Department_name` varchar(15) NOT NULL,
  `D_no` int(10) NOT NULL,
  PRIMARY KEY (`D_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_name`, `D_no`) VALUES
('CSE', 100),
('EC', 101),
('IC', 102),
('Civil', 103),
('Mechanical', 104),
('EE', 105),
('Design', 106),
('Management', 107);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `Faculty_name` varchar(20) NOT NULL,
  `Faculty_id` varchar(15) NOT NULL,
  `Designation` varchar(15) NOT NULL,
  `D_no` int(10) NOT NULL,
  `Salary` float NOT NULL,
  PRIMARY KEY (`Faculty_id`,`D_no`),
  KEY `D_no` (`D_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

DROP TABLE IF EXISTS `hostel`;
CREATE TABLE IF NOT EXISTS `hostel` (
  `Hostel_name` varchar(15) NOT NULL,
  `Hostel_id` int(4) NOT NULL,
  `Student_id` varchar(9) NOT NULL,
  PRIMARY KEY (`Hostel_id`,`Student_id`),
  KEY `Student_id` (`Student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student1`
--

DROP TABLE IF EXISTS `student1`;
CREATE TABLE IF NOT EXISTS `student1` (
  `Student_name` varchar(15) NOT NULL,
  `Student_id` varchar(9) NOT NULL,
  `Age` int(2) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `D_no` int(4) NOT NULL,
  PRIMARY KEY (`Student_id`),
  KEY `D_no` (`D_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`Faculty_id`) REFERENCES `faculty` (`Faculty_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`Student_id`) REFERENCES `student` (`Student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`D_no`) REFERENCES `department` (`D_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostel`
--
ALTER TABLE `hostel`
  ADD CONSTRAINT `hostel_ibfk_1` FOREIGN KEY (`Student_id`) REFERENCES `student1` (`Student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student1`
--
ALTER TABLE `student1`
  ADD CONSTRAINT `student1_ibfk_1` FOREIGN KEY (`D_no`) REFERENCES `department` (`D_no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
