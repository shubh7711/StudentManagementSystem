
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



-- Database: `student_db`

CREATE DATABASE IF NOT EXISTS `student_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `student_db`;



CREATE TABLE `banks` (
  `bank_no` int(4) NOT NULL,
  `bank_name` varchar(40) NOT NULL,
  `place` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



CREATE TABLE `gr_list` (
  `gr_no` int(10) NOT NULL,
  `sid` int(8) DEFAULT NULL,
  `admission_date` date NOT NULL,
  `school_leaving_date` date DEFAULT NULL,
  `std` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `students` (
  `sid` int(8) NOT NULL,
  `name` varchar(70) NOT NULL,
  `mother_name` varchar(25) DEFAULT NULL,
  `gender` char(1) NOT NULL,
  `birthdate` date NOT NULL,
  `cast` varchar(10) NOT NULL,
  `bank_no` varchar(5) DEFAULT NULL,
  `bank_ac_no` varchar(20) DEFAULT NULL,
  `aadhar_no` varchar(12) DEFAULT NULL,
  `uid_no` varchar(18) DEFAULT NULL,
  `contact_no` varchar(15) DEFAULT NULL,
  `rashan_no` varchar(15) DEFAULT NULL,
  `apl_bpl` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `banks`
  ADD PRIMARY KEY (`bank_no`);


ALTER TABLE `gr_list`
  ADD PRIMARY KEY (`gr_no`);


ALTER TABLE `students`
  ADD PRIMARY KEY (`sid`);



ALTER TABLE `banks`
  MODIFY `bank_no` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `students`
  MODIFY `sid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

Create table `Course`(
  `CourseId` int NOT NULL,
  `Course_name`  VarChar(20),PRIMARY KEY (CourseId));

Create table `Exam`(
  `Exam_Id` int NOT NULL,
  `Marks` int,PRIMARY KEY (Exam_id));