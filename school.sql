-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2018 at 01:59 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `5th`
--

CREATE TABLE IF NOT EXISTS `5th` (
  `id` int(3) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `Unit 1` int(3) NOT NULL,
  `Sem 1` int(3) NOT NULL,
  `Unit 2` int(3) NOT NULL,
  `Sem 2` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `6th`
--

CREATE TABLE IF NOT EXISTS `6th` (
  `id` int(3) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `Unit 1` int(3) NOT NULL,
  `Sem 1` int(3) NOT NULL,
  `Unit 2` int(3) NOT NULL,
  `Sem 2` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `7th`
--

CREATE TABLE IF NOT EXISTS `7th` (
  `id` int(3) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `Unit 1` int(3) NOT NULL,
  `Sem 1` int(3) NOT NULL,
  `Unit 2` int(3) NOT NULL,
  `Sem 2` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `8th`
--

CREATE TABLE IF NOT EXISTS `8th` (
  `id` int(3) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `Unit 1` int(3) NOT NULL,
  `Sem 1` int(3) NOT NULL,
  `Unit 2` int(3) NOT NULL,
  `Sem 2` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `9th`
--

CREATE TABLE IF NOT EXISTS `9th` (
  `id` int(3) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `Unit 1` int(3) NOT NULL,
  `Sem 1` int(3) NOT NULL,
  `Unit 2` int(3) NOT NULL,
  `Sem 2` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `10th`
--

CREATE TABLE IF NOT EXISTS `10th` (
`id` int(3) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `Unit 1` int(3) NOT NULL,
  `Sem 1` int(3) NOT NULL,
  `Unit 2` int(3) NOT NULL,
  `Sem 2` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `10th`
--

INSERT INTO `10th` (`id`, `subject`, `roll_no`, `Unit 1`, `Sem 1`, `Unit 2`, `Sem 2`) VALUES
(1, 'Maths', 10, 20, 79, 20, 78),
(3, 'English', 10, 19, 78, 19, 75),
(6, 'Marathi', 10, 12, 64, 15, 69),
(7, 'Hindi', 10, 16, 64, 18, 74),
(10, 'Science', 10, 20, 80, 20, 80),
(11, 'History', 10, 17, 72, 0, 0),
(16, 'Geography', 10, 17, 71, 16, 70);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(10) NOT NULL,
  `user_firstname` varchar(30) NOT NULL,
  `user_lastname` varchar(30) NOT NULL,
  `roll_no` int(11) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_role` varchar(15) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `Std` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_lastname`, `roll_no`, `user_email`, `user_role`, `user_password`, `Std`) VALUES
(1, 'test', 'test', 0, 'test@gmail.com', 'user', '$2y$10$5uFm7lD7z1YPCTd.6byA2OsQvvQ8oMHHUQpjrqmJG75', 0),
(7, 'test', 'test', 10, 'test@gmail.com', 'student', '$2y$10$nyYlJjLCghwmf1FFGw1zJ.htPZs2xr4e1Uujt2Lxz8o', 10),
(3, 'test', 'test', 12, 'a@gmail.com', 'teacher', '$2y$10$NU7p1XTeDWRLIj4hSOB14OJ3L/TsxKYH0xTIJZxSFqU', 0),
(5, 'test', 'test', 13, 'test@gmail.com', 'teacher', '$2y$10$UXsjNwNAK4lqJ/761Hv4HOEuZ4c2BqCNGck1WpCPdwb', 0),
(6, 'Purvesh', 'Purvesh', 50, 'Purvesh@gmail.com', 'teacher', '$2y$10$g6NZ9eC2dvbew4E9lQ6mEOGgbWUCrr2j0DZRyc1EYA6', 0),
(4, 'test_login', 'test_login', 123, 'test_login@gmail.com', 'teacher', '$2y$10$hFhDszNI8sZveQaaKUvjCObPHA5Ckvw06oFJPEQ2Xtf', 10),
(2, 'test', 'test', 329, 'test@gmail.com', 'user', '$2y$10$1o2ZbmmZVPM1o73XlMssee4mBXT6M98aaYRIBr9X77A', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `5th`
--
ALTER TABLE `5th`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `6th`
--
ALTER TABLE `6th`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `7th`
--
ALTER TABLE `7th`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `8th`
--
ALTER TABLE `8th`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `9th`
--
ALTER TABLE `9th`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `10th`
--
ALTER TABLE `10th`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`roll_no`), ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `10th`
--
ALTER TABLE `10th`
MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
