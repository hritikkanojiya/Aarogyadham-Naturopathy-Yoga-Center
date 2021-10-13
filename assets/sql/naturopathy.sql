-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 13, 2021 at 07:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naturopathy`
--

-- --------------------------------------------------------

--
-- Table structure for table `healthquestionnaire`
--

CREATE TABLE `healthquestionnaire` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `q1` varchar(20) NOT NULL COMMENT 'Do you feel fresh after getting up in the morning',
  `q2` varchar(20) NOT NULL COMMENT 'Do you sleep in the afternoon',
  `q3` varchar(20) NOT NULL COMMENT 'Anything specially required for night sleep',
  `q4` varchar(20) NOT NULL COMMENT 'Do you dream',
  `q5` varchar(20) NOT NULL COMMENT 'Is your sleep interrupted',
  `q6` varchar(20) NOT NULL COMMENT 'How is your sleep',
  `q7` varchar(20) NOT NULL COMMENT 'Do you feel fatigue after day''s work',
  `q8` varchar(20) NOT NULL COMMENT 'Can you Concentrate your work',
  `q9` varchar(20) NOT NULL COMMENT 'Do you remain firm on your decision',
  `q10` varchar(20) NOT NULL COMMENT 'Do you become emotional instantly',
  `q11` varchar(20) NOT NULL COMMENT 'Is your appetite normal',
  `q12` varchar(20) NOT NULL COMMENT 'Do you Pass regular motions',
  `q13` varchar(20) NOT NULL COMMENT 'Any medicine required for Passing daily motions',
  `q14` varchar(20) NOT NULL COMMENT 'Food Timing(Breakfast)',
  `q15` varchar(20) NOT NULL COMMENT 'Food Timing(Evening Snacks)',
  `q16` varchar(20) NOT NULL COMMENT 'Food Timing(Lunch)',
  `q17` varchar(20) NOT NULL COMMENT 'Food Timing(Dinner)',
  `q18` varchar(20) NOT NULL COMMENT 'Timing of Tea/Coffee/Milk(First)',
  `q19` varchar(20) NOT NULL COMMENT 'Timing of Tea/Coffee/Milk(Second)',
  `q20` varchar(20) NOT NULL COMMENT 'Timing of Tea/Coffee/Milk(Third)',
  `q21` varchar(256) NOT NULL COMMENT 'Addictions'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `illnessinformation`
--

CREATE TABLE `illnessinformation` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `q1` varchar(600) NOT NULL COMMENT 'How long are you suffering from the present illness ?',
  `q2` varchar(600) NOT NULL COMMENT 'Is it related to any specific incident ? If so, please state the incident.',
  `q3` varchar(600) NOT NULL COMMENT 'State, in detail the nature of complaints being experienced by you',
  `q4` varchar(600) NOT NULL COMMENT 'Details of present treatment',
  `q5` varchar(600) NOT NULL COMMENT 'Details of various medical tests Conducted and their results.',
  `q6` varchar(600) NOT NULL COMMENT 'Recommendation of your Doctor.',
  `is_delete` int(11) NOT NULL DEFAULT 0 COMMENT '1=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ladiesonly`
--

CREATE TABLE `ladiesonly` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `q1` varchar(20) NOT NULL COMMENT 'Menses',
  `q2` varchar(256) NOT NULL COMMENT 'How Irregular',
  `q3` varchar(20) NOT NULL COMMENT 'Discharge',
  `q4` varchar(20) NOT NULL COMMENT 'Discharge Detail',
  `q5` varchar(20) NOT NULL COMMENT 'Is there white discharge',
  `q6` varchar(256) NOT NULL COMMENT 'How many days',
  `q7` varchar(20) NOT NULL COMMENT 'Backache during menses',
  `q8` varchar(512) NOT NULL COMMENT 'Do you have pain before or during menses',
  `q9` varchar(512) NOT NULL COMMENT 'Any other trouble during menses',
  `q10` varchar(20) NOT NULL COMMENT 'Any issues regarding menses in the past',
  `q11` varchar(512) NOT NULL COMMENT 'Surgeries',
  `q12` varchar(20) NOT NULL COMMENT 'Maritial Status',
  `q13` varchar(20) NOT NULL COMMENT 'Date of Marriage',
  `q14` varchar(256) NOT NULL COMMENT 'Pregnancy (No. and Year)',
  `q15` varchar(256) NOT NULL COMMENT 'Delivery (No. and Year)',
  `q16` varchar(256) NOT NULL COMMENT 'Miscarriage (No. and Year)',
  `q17` varchar(128) NOT NULL COMMENT 'Children',
  `q18` varchar(128) NOT NULL COMMENT 'Sons',
  `q19` varchar(128) NOT NULL COMMENT 'Daughters',
  `q20` varchar(128) NOT NULL COMMENT 'Method used for Family planning',
  `q21` varchar(256) NOT NULL COMMENT 'Any Other Information'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patientdetails`
--

CREATE TABLE `patientdetails` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `fullName` varchar(128) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(512) NOT NULL,
  `age` int(3) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `occupation` varchar(64) NOT NULL,
  `natureOfDailyWork` varchar(256) NOT NULL,
  `execriseDoneBefore` varchar(256) NOT NULL,
  `natureofPresentExercise` varchar(256) NOT NULL,
  `pastSurgeries` varchar(256) NOT NULL,
  `pastMajorIllnesses` varchar(256) NOT NULL,
  `presentPhysicalComplaints` varchar(256) NOT NULL,
  `ongoingTreatment` tinyint(1) NOT NULL COMMENT '0 => No, 1 => Yes',
  `doctorName` varchar(128) NOT NULL,
  `doctorPhone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientdetails`
--

INSERT INTO `patientdetails` (`id`, `patientId`, `fullName`, `gender`, `address`, `age`, `dob`, `phone`, `occupation`, `natureOfDailyWork`, `execriseDoneBefore`, `natureofPresentExercise`, `pastSurgeries`, `pastMajorIllnesses`, `presentPhysicalComplaints`, `ongoingTreatment`, `doctorName`, `doctorPhone`) VALUES
(5, 12, 'Hritik Kanojiya', 'Male', 'abcd', 21, '2001-02-13', '7506211129', 'Study', 'abcd', 'abcd', 'abcd', 'abcd', 'abcd', 'abcd', 1, 'abcd', ''),
(6, 12, 'Hritik Kanojiya', 'Male', 'abcd', 21, '2001-02-13', '7506211129', 'Study', 'abcd', 'abcd', 'abcd', 'abcd', 'abcd', 'abcd', 1, 'abcd', '');

-- --------------------------------------------------------

--
-- Table structure for table `patientregistration`
--

CREATE TABLE `patientregistration` (
  `id` int(11) NOT NULL,
  `regdNo` varchar(15) NOT NULL,
  `fullName` varchar(128) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientregistration`
--

INSERT INTO `patientregistration` (`id`, `regdNo`, `fullName`, `gender`, `phone`, `password`) VALUES
(12, 'ANYC4974', 'Hritik Kanojiya', 'Male', '7506211129', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `physicalexamination`
--

CREATE TABLE `physicalexamination` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `q1` varchar(20) NOT NULL COMMENT 'Examination Date',
  `q2` varchar(20) NOT NULL COMMENT 'Height (cms)',
  `q3` varchar(20) NOT NULL COMMENT 'Chest (After Inhalation) in cms',
  `q4` varchar(20) NOT NULL COMMENT 'Chest (After Exhalation) in cms',
  `q5` varchar(20) NOT NULL COMMENT 'Abdomen (Circumference) in cms',
  `q6` varchar(20) NOT NULL COMMENT 'Arch of the sole',
  `q7` varchar(20) NOT NULL COMMENT 'Body Appearance',
  `q8` varchar(20) NOT NULL COMMENT 'Constitution',
  `q9` varchar(20) NOT NULL COMMENT 'Weight (Kg) (First)',
  `q10` varchar(20) NOT NULL COMMENT 'Weight Date (First)',
  `q11` varchar(20) NOT NULL COMMENT 'Weight (Kg) (Second)',
  `q12` varchar(20) NOT NULL COMMENT 'Weight Date (Second)',
  `q13` varchar(20) NOT NULL COMMENT 'Pulse(First)',
  `q14` varchar(20) NOT NULL COMMENT 'B.P(First)',
  `q15` varchar(20) NOT NULL COMMENT 'Date(First)',
  `q16` varchar(20) NOT NULL COMMENT 'Pulse(Second)',
  `q17` varchar(20) NOT NULL COMMENT 'B.P(Second)',
  `q18` varchar(20) NOT NULL COMMENT 'Date(Second)',
  `q19` longtext NOT NULL COMMENT 'Remark and Opinion of the Experts',
  `q20` varchar(512) NOT NULL COMMENT 'Important Instruction to the patient'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `treatmentprocedure`
--

CREATE TABLE `treatmentprocedure` (
  `id` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `q1` varchar(64) NOT NULL COMMENT 'Pranayam',
  `q2` varchar(64) NOT NULL COMMENT 'Purak + Bhramari Rechak',
  `q3` varchar(64) NOT NULL COMMENT 'Suraya Mantra Japa',
  `q4` varchar(64) NOT NULL COMMENT 'Bharmari Pranayam',
  `q5` varchar(64) NOT NULL COMMENT 'Jalaneti (Times in a Week)',
  `q6` varchar(64) NOT NULL COMMENT 'L. S. P (Times in a Week)',
  `q7` varchar(64) NOT NULL COMMENT 'Vaman (Times in a Week)',
  `q8` varchar(64) NOT NULL COMMENT 'F. S. P. (Times in a Week)',
  `q9` varchar(64) NOT NULL COMMENT 'Hot fomentation and Massage (Times)',
  `q10` varchar(64) NOT NULL COMMENT 'Local steam application (Times)',
  `q11` varchar(64) NOT NULL COMMENT 'Steambath (Times)',
  `q12` varchar(64) NOT NULL COMMENT 'Tail / Sanjivan Basti (Times)',
  `q13` varchar(20) NOT NULL COMMENT 'Yognidra __ daily',
  `q14` varchar(20) NOT NULL COMMENT '__ Times. Before sleep Omkar Jap daily',
  `q15` varchar(20) NOT NULL COMMENT 'minutes',
  `q16` varchar(20) NOT NULL COMMENT '(__ times)',
  `q17` varchar(20) NOT NULL COMMENT 'times (in lieu tea)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `healthquestionnaire`
--
ALTER TABLE `healthquestionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `illnessinformation`
--
ALTER TABLE `illnessinformation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ladiesonly`
--
ALTER TABLE `ladiesonly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientdetails`
--
ALTER TABLE `patientdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patientregistration`
--
ALTER TABLE `patientregistration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `physicalexamination`
--
ALTER TABLE `physicalexamination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatmentprocedure`
--
ALTER TABLE `treatmentprocedure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `healthquestionnaire`
--
ALTER TABLE `healthquestionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `illnessinformation`
--
ALTER TABLE `illnessinformation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ladiesonly`
--
ALTER TABLE `ladiesonly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patientdetails`
--
ALTER TABLE `patientdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patientregistration`
--
ALTER TABLE `patientregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `physicalexamination`
--
ALTER TABLE `physicalexamination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `treatmentprocedure`
--
ALTER TABLE `treatmentprocedure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
