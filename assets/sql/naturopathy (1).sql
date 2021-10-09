-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2021 at 06:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

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
-- Table structure for table `patientdetails`
--

CREATE TABLE `patientdetails` (
  `id` int(11) NOT NULL,
  `fullName` varchar(512) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `address` longtext NOT NULL,
  `age` int(3) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `occupation` longtext NOT NULL,
  `natureOfDailyWork` longtext NOT NULL,
  `execriseDoneBefore` longtext NOT NULL,
  `natureofPresentExercise` longtext NOT NULL,
  `pastSurgeries` longtext NOT NULL,
  `pastMajorIllnesses` longtext NOT NULL,
  `presentPhysicalComplaints` longtext NOT NULL,
  `ongoingTreatment` tinyint(1) NOT NULL COMMENT '0 => No, 1 => Yes',
  `doctorName` varchar(128) NOT NULL,
  `doctorPhone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientdetails`
--

INSERT INTO `patientdetails` (`id`, `fullName`, `gender`, `address`, `age`, `dob`, `phone`, `occupation`, `natureOfDailyWork`, `execriseDoneBefore`, `natureofPresentExercise`, `pastSurgeries`, `pastMajorIllnesses`, `presentPhysicalComplaints`, `ongoingTreatment`, `doctorName`, `doctorPhone`) VALUES
(1, 'Bhavesh', 'Male', '', 0, '0000-00-00', '1234567890', '', '', '', '', '', '', '', 0, '', '0'),
(3, 'Bhavesh Sanjay Bhusare', 'Male', 'Shiv Shankar Chawl, Hanuman Tekadi\r\nKajupada, Borivali East', 20, '2000-10-05', '8104026178', 'Student', 'sitting', 'gym', 'normal', 'nothing', 'nothing', 'lower back pain', 1, 'Dr. Bhushan', '1234567854'),
(4, 'Bhavesh Sanjay Bhusare', 'Male', 'Shiv Shankar Chawl, Hanuman Tekadi\r\nKajupada, Borivali East', 20, '2000-10-05', '8104026178', 'Student', 'sitting', 'gym', 'normal', 'nothing', 'nothing', 'lower back pain', 1, 'Dr. Bhushan', '1234567854');

-- --------------------------------------------------------

--
-- Table structure for table `patientregistration`
--

CREATE TABLE `patientregistration` (
  `id` int(11) NOT NULL,
  `fullName` varchar(128) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `phone` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientregistration`
--

INSERT INTO `patientregistration` (`id`, `fullName`, `gender`, `phone`, `password`) VALUES
(1, 'Bhavesh', 'Male', '8104026178', 'Bhavesh@05'),
(6, 'qwqw', 'Male', 'dsd', 'asas'),
(7, 'Bhavesh Sanjay Bhusare', 'Male', '7506211129', 'asas'),
(8, 'Bhavesh Sanjay Bhusare', 'Male', '8104026178sa', 'asasas'),
(9, 'qwqw', 'Male', '66454', 'asas'),
(10, 'Bhavesh', 'Male', '123', '123');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patientdetails`
--
ALTER TABLE `patientdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patientregistration`
--
ALTER TABLE `patientregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
