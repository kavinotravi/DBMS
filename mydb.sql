-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2019 at 10:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dugc`
--

CREATE TABLE `dugc` (
  `name` varchar(20) NOT NULL,
  `fac_id` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `department` varchar(10) NOT NULL,
  `active` varchar(2) NOT NULL,
  `dugc_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dugc`
--

INSERT INTO `dugc` (`name`, `fac_id`, `user_id`, `department`, `active`, `dugc_id`) VALUES
('Arnab ', '1', 'arnab', 'CSE', 'Y', 'cse_dugc'),
('Ketan Rajawat', '5', 'ketan', 'EE', 'Y', 'ee_dugc');

-- --------------------------------------------------------

--
-- Table structure for table `fac_table`
--

CREATE TABLE `fac_table` (
  `name` varchar(20) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `department` varchar(20) NOT NULL,
  `fac_id` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `campus_address` varchar(20) NOT NULL,
  `ph_no` int(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `yr_joining` int(10) NOT NULL,
  `user_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fac_table`
--

INSERT INTO `fac_table` (`name`, `gender`, `dob`, `department`, `fac_id`, `address`, `campus_address`, `ph_no`, `designation`, `yr_joining`, `user_id`) VALUES
('Arnab Bhattacharya', 'M', '1985/3/8', 'CSE  ', '1', '234  ', '8888', 888888888, 'Assistant Professor ', 2011, 'arnab'),
('Sumit Ganguly', 'F', '1989/1/4', 'CSE', '2', 'Kolkata', 'somewhere', 888888888, 'Professor', 2010, 'sumit'),
('Abanti Ganguly', 'F', '1985/1/10', 'CSE', '3', 'sgagduisag', 'gsgidsgaohas', 7811569, 'Assistant Professor', 2013, 'abanti'),
('Ketan Rajawat', 'M', '1986/4/11', 'EE', '5', 'gasigasoud', 'dhgiakh', 4654, 'Associate Professor', 2009, 'ketan');

-- --------------------------------------------------------

--
-- Table structure for table `leave_applications`
--

CREATE TABLE `leave_applications` (
  `applicant_type` varchar(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `id` varchar(10) NOT NULL,
  `nature_leave` varchar(10) NOT NULL,
  `Reason` text NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `approval` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_applications`
--

INSERT INTO `leave_applications` (`applicant_type`, `name`, `id`, `nature_leave`, `Reason`, `start_date`, `end_date`, `approval`) VALUES
('Staff', 'Ravi', 'ravi', 'Medical', 'aaaa', '1985/2/1', '1988/2/16', 'Y'),
('Student', 'Nitish Pratik', '150470', 'Medical', 'shit', '2002/8/15', '2003/10/16', 'Y'),
('teacher', 'Arnab Bhattacharya', '1', 'Medical', 'aaaaaaaaaaa', '1999/9/17', '2001/9/16', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `add_drop` varchar(2) NOT NULL,
  `new_registration` varchar(2) NOT NULL,
  `grade_submission` varchar(2) NOT NULL,
  `year` int(4) NOT NULL,
  `semester` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`add_drop`, `new_registration`, `grade_submission`, `year`, `semester`) VALUES
('N', 'N', 'Y', 2018, 2);

-- --------------------------------------------------------

--
-- Table structure for table `master_course_list`
--

CREATE TABLE `master_course_list` (
  `course_name` varchar(20) NOT NULL,
  `course_id` varchar(6) NOT NULL,
  `department` varchar(6) NOT NULL,
  `credits` int(2) NOT NULL,
  `modular` varchar(2) NOT NULL,
  `prereq` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_course_list`
--

INSERT INTO `master_course_list` (`course_name`, `course_id`, `department`, `credits`, `modular`, `prereq`) VALUES
('DBMS', 'CS315', 'CSE', 9, 'N', 'ESO207'),
('Algo 2', 'CS345', 'CSE', 9, 'N', 'ESO207'),
('Networks', 'CS425', 'CSE', 9, 'N', 'ESO207'),
('Datamining', 'CS654', 'CSE', 9, 'N', ''),
('ML', 'CS771', 'CSE', 9, 'N', ''),
('ESO207', 'DS', 'CSE', 12, 'N', 'ESC101'),
('Signal Processing', 'EE200', 'EE', 11, 'N', ''),
('Convex Optimization', 'EE680', 'EE', 11, 'N', ''),
('C', 'ESC101', 'CSE', 14, 'N', '');

-- --------------------------------------------------------

--
-- Table structure for table `minor_applications`
--

CREATE TABLE `minor_applications` (
  `name` varchar(20) NOT NULL,
  `roll_number` int(10) NOT NULL,
  `department` varchar(10) NOT NULL,
  `specialization` varchar(20) NOT NULL,
  `courses` varchar(20) NOT NULL,
  `approval` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minor_applications`
--

INSERT INTO `minor_applications` (`name`, `roll_number`, `department`, `specialization`, `courses`, `approval`) VALUES
('Nitish Pratik', 150470, 'CSE', 'shitt', 'ESC101', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `offering`
--

CREATE TABLE `offering` (
  `course_id` varchar(6) NOT NULL,
  `year` int(4) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `fac_id` varchar(10) NOT NULL,
  `modular` varchar(2) NOT NULL,
  `venue` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offering`
--

INSERT INTO `offering` (`course_id`, `year`, `semester`, `fac_id`, `modular`, `venue`) VALUES
('CS315', 2018, '1', '1', 'N', ''),
('CS315', 2018, '2', '3', 'N', ''),
('CS345', 2018, '1', '2', 'N', ''),
('CS425', 2018, '2', '1', 'N', ''),
('CS654', 2018, '2', '2', 'N', ''),
('CS771', 2018, '1', '3', 'N', ''),
('CS771', 2018, '2', '5', 'N', ''),
('DS', 2018, '1', '1', 'N', 'l19'),
('EE200', 2018, '2', '5', 'N', ''),
('EE680', 2018, '1', '5', 'N', '');

-- --------------------------------------------------------

--
-- Table structure for table `staff_table`
--

CREATE TABLE `staff_table` (
  `name` varchar(20) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `ph_no` int(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `yr_joining` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_table`
--

INSERT INTO `staff_table` (`name`, `user_id`, `dob`, `address`, `ph_no`, `designation`, `location`, `yr_joining`) VALUES
('Ravi', 'ravi', '1987/4/12', 'vjafdyi', 463546, 'chowkidar', 'hall 1', 2010),
('Shipli Gupta', 'shilpi', '1985/7/8', 'agdugdu', 8464961, 'clerk', 'kanpur', 2015);

-- --------------------------------------------------------

--
-- Table structure for table `student_reg_forms`
--

CREATE TABLE `student_reg_forms` (
  `roll_number` int(10) NOT NULL,
  `course_id` varchar(6) NOT NULL,
  `year` int(4) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `credits` int(2) NOT NULL,
  `type` varchar(10) NOT NULL,
  `nature` varchar(10) NOT NULL,
  `status` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_reg_forms`
--

INSERT INTO `student_reg_forms` (`roll_number`, `course_id`, `year`, `semester`, `credits`, `type`, `nature`, `status`) VALUES
(150470, 'CS654', 2018, '2', 9, 'IC', 'Fresh', 'A'),
(150470, 'CS771', 2018, '2', 9, 'IC', 'Fresh', 'A'),
(150470, 'EE200', 2018, '2', 11, 'IC', 'Fresh', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `stu_acad`
--

CREATE TABLE `stu_acad` (
  `roll_number` int(10) NOT NULL,
  `course_id` varchar(6) NOT NULL,
  `semester` varchar(5) NOT NULL,
  `year` int(4) NOT NULL,
  `type` varchar(6) NOT NULL,
  `credits` int(2) NOT NULL,
  `nature` varchar(8) NOT NULL,
  `grade` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_acad`
--

INSERT INTO `stu_acad` (`roll_number`, `course_id`, `semester`, `year`, `type`, `credits`, `nature`, `grade`) VALUES
(150470, 'CS315', '1', 2018, 'IC', 9, 'Fresh', 8),
(150470, 'CS345', '1', 2018, 'IC', 9, 'Fresh', 10),
(150470, 'CS425', '2', 2018, 'IC', 9, 'Fresh', 8),
(150470, 'DS', '1', 2018, 'IC', 12, 'Fresh', 8),
(150470, 'EE680', '1', 2018, 'IC', 11, 'Fresh', 8);

-- --------------------------------------------------------

--
-- Table structure for table `stu_table`
--

CREATE TABLE `stu_table` (
  `name` varchar(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `department` varchar(10) NOT NULL,
  `roll_number` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `hall` varchar(5) NOT NULL,
  `ph_no` int(10) NOT NULL,
  `programme` varchar(10) NOT NULL,
  `year_joining` int(4) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `cpi` varchar(3) NOT NULL,
  `minor` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stu_table`
--

INSERT INTO `stu_table` (`name`, `gender`, `dob`, `department`, `roll_number`, `address`, `hall`, `ph_no`, `programme`, `year_joining`, `user_id`, `cpi`, `minor`) VALUES
('Nitish Pratik', 'M', '1997/5/12', 'CSE', 150470, 'bhopal', '1', 78996666, 'BS', 2015, 'nnitish', '8.3', ' shitt shitt'),
('Pranjal Giri', 'M', '1996/9/11', 'EE ', 150505, 'howrah', '1', 48644646, 'BT', 2015, 'pranjal', '', ''),
('shubham chouhan', 'M', '1996/11/14', 'EE', 150697, 'bhopal', '1', 78996666, 'BT', 2014, 'shubham', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `user_id` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `pass`, `type`) VALUES
('abanti', 'ganguly', 'teacher'),
('admin', 'admin', 'admin'),
('arnab', 'alia    ', 'teacher'),
('cse_dugc', 'cse', 'dugc'),
('ee_dugc', 'ee', 'dugc'),
('ketan', 'rajawat', 'teacher'),
('nipun', 'gupta', 'student'),
('nnitish', 'pratik', 'student'),
('pranjal', 'giri', 'student'),
('ravi', 'sinha', 'staff'),
('shilpi', 'gupta', 'staff'),
('shubham', 'chouhan', 'student'),
('sumit', 'ganguly', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dugc`
--
ALTER TABLE `dugc`
  ADD PRIMARY KEY (`fac_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `dugc_id` (`dugc_id`);

--
-- Indexes for table `fac_table`
--
ALTER TABLE `fac_table`
  ADD PRIMARY KEY (`fac_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `leave_applications`
--
ALTER TABLE `leave_applications`
  ADD PRIMARY KEY (`applicant_type`,`id`);

--
-- Indexes for table `master_course_list`
--
ALTER TABLE `master_course_list`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `minor_applications`
--
ALTER TABLE `minor_applications`
  ADD PRIMARY KEY (`roll_number`,`department`,`specialization`);

--
-- Indexes for table `offering`
--
ALTER TABLE `offering`
  ADD PRIMARY KEY (`course_id`,`year`,`semester`),
  ADD KEY `fac_id` (`fac_id`);

--
-- Indexes for table `staff_table`
--
ALTER TABLE `staff_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `student_reg_forms`
--
ALTER TABLE `student_reg_forms`
  ADD PRIMARY KEY (`roll_number`,`course_id`,`year`,`semester`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `stu_acad`
--
ALTER TABLE `stu_acad`
  ADD PRIMARY KEY (`roll_number`,`course_id`,`semester`,`year`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `stu_table`
--
ALTER TABLE `stu_table`
  ADD PRIMARY KEY (`roll_number`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dugc`
--
ALTER TABLE `dugc`
  ADD CONSTRAINT `dugc_ibfk_1` FOREIGN KEY (`dugc_id`) REFERENCES `user_table` (`user_id`);

--
-- Constraints for table `fac_table`
--
ALTER TABLE `fac_table`
  ADD CONSTRAINT `fac_table_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);

--
-- Constraints for table `minor_applications`
--
ALTER TABLE `minor_applications`
  ADD CONSTRAINT `minor_applications_ibfk_1` FOREIGN KEY (`roll_number`) REFERENCES `stu_table` (`roll_number`);

--
-- Constraints for table `offering`
--
ALTER TABLE `offering`
  ADD CONSTRAINT `offering_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `master_course_list` (`course_id`),
  ADD CONSTRAINT `offering_ibfk_2` FOREIGN KEY (`fac_id`) REFERENCES `fac_table` (`fac_id`);

--
-- Constraints for table `staff_table`
--
ALTER TABLE `staff_table`
  ADD CONSTRAINT `staff_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);

--
-- Constraints for table `student_reg_forms`
--
ALTER TABLE `student_reg_forms`
  ADD CONSTRAINT `student_reg_forms_ibfk_1` FOREIGN KEY (`roll_number`) REFERENCES `stu_table` (`roll_number`),
  ADD CONSTRAINT `student_reg_forms_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `master_course_list` (`course_id`);

--
-- Constraints for table `stu_acad`
--
ALTER TABLE `stu_acad`
  ADD CONSTRAINT `stu_acad_ibfk_1` FOREIGN KEY (`roll_number`) REFERENCES `stu_table` (`roll_number`),
  ADD CONSTRAINT `stu_acad_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `master_course_list` (`course_id`);

--
-- Constraints for table `stu_table`
--
ALTER TABLE `stu_table`
  ADD CONSTRAINT `stu_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
