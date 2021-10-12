-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 12, 2021 at 02:43 PM
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
