-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 02:48 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_No` int(10) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_No`, `Username`, `Password`) VALUES
(2, 'daniel', 'aa47f8215c6f30a0dcdb2a36a9f4168e'),
(3, 'johnmark', '3012a09d4c0a84891b36ba11915cd0b7');

-- --------------------------------------------------------

--
-- Table structure for table `leave_form`
--

CREATE TABLE `leave_form` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `letter` varchar(1000) NOT NULL,
  `status` enum('Approved','Rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_form`
--

INSERT INTO `leave_form` (`id`, `name`, `letter`, `status`) VALUES
(9, '', 'Sir pwede po ba akong umuwi this week.', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `logbook`
--

CREATE TABLE `logbook` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logbook`
--

INSERT INTO `logbook` (`id`, `name`, `type`, `date`) VALUES
(36, 'Mark Daniel Jimenez', 'in', '2022-12-12 23:18:00'),
(37, 'Mark Daniel Jimenez', 'out', '2022-12-29 04:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `studentno` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `course_section` text NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `school_year` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `dorm` varchar(50) NOT NULL,
  `room` varchar(50) NOT NULL,
  `value` int(50) NOT NULL,
  `date` datetime NOT NULL,
  `sem` varchar(50) NOT NULL,
  `point` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `email`, `password`, `studentno`, `name`, `course_section`, `sex`, `school_year`, `address`, `dorm`, `room`, `value`, `date`, `sem`, `point`) VALUES
(29, 'glenn@gmail.com', 'glenn', 202021, 'Glenn Cedrick Gonzaga', 'BSIT 3-3', 'Male', '2022-2023', 'Rizal, Nueva Ecija', 'Zeus', 'Room 1', 1500, '2023-01-16 20:07:00', 'Second Semester', 100),
(32, 'mark@gmail.com', 'mark', 201783, 'Mark Daniel Jimenez', 'BSIT 3-3', 'Male', '2022-2023', 'Purok. 5 Brgy. Bical Science City of Munoz , Nueva Ecija', 'Zeus', 'Room 10', 1500, '2022-08-06 09:16:00', 'First Semester', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Angelika Camus', 'angel@gmail.com', 'f4f068e71e0d87bf0ad51e6214ab84e9'),
(2, 'Mark Daniel Jimenez', 'daniel@gmail.com', '9180b4da3f0c7e80975fad685f7f134e'),
(3, 'glenn', 'glenn@gmail.com', '3c784bff199ef62ecc2f3a988f395c62'),
(4, 'Jimenez', 'mark@gmail.com', 'ea82410c7a9991816b5eeeebe195e20a'),
(5, 'Mark Daniel Jimenez', 'jimenez@gmail.com', 'ea82410c7a9991816b5eeeebe195e20a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_No`);

--
-- Indexes for table `leave_form`
--
ALTER TABLE `leave_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logbook`
--
ALTER TABLE `logbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_No` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `leave_form`
--
ALTER TABLE `leave_form`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `logbook`
--
ALTER TABLE `logbook`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
