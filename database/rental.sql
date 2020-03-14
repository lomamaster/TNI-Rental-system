-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2020 at 03:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `rental_detail`
--

CREATE TABLE `rental_detail` (
  `rentid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `student_first_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `student_last_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `advicer` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `room_number` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `approve` int(3) NOT NULL,
  `date` date NOT NULL,
  `time` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rental_detail`
--

INSERT INTO `rental_detail` (`rentid`, `student_id`, `student_first_name`, `student_last_name`, `advicer`, `reason`, `room_number`, `approve`, `date`, `time`, `email`) VALUES
('A303202003081617', '59122156-9', 'Tisatorn', 'Jornpradit', 'pwin', '<p>somtingh</p>\r\n', 'A303', 1, '2020-03-08', 'From 16:00:00 to 17:00:00 for 1 hour', 'voltexeez@gmail.com'),
('A415 202003091516', '59122156-9', 'Tisatorn', 'Jornpradit', 'pwin', '<p>somethind</p>\r\n', 'A415 ', 1, '2020-03-09', 'From 15:00:00 to 16:00:00 for 1 hour', 'voltexeez@gmail.com'),
('A416202003091516', '59122156-9', 'Tisatorn', 'Jornpradit', 'pwin', '<p>somethong</p>\r\n', 'A416', 1, '2020-03-09', 'From 15:00:00 to 16:00:00 for 1 hour', 'voltexeez@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `rental_time`
--

CREATE TABLE `rental_time` (
  `ID` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time_duration` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `room_number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `building` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `available` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rental_time`
--

INSERT INTO `rental_time` (`ID`, `time_duration`, `time_start`, `time_end`, `room_number`, `building`, `date`, `available`) VALUES
('A303202003080809', '1 hour', '08:00:00', '09:00:00', 'A303', 'A', '2020-03-08', 0),
('A303202003080910', '1 hour', '09:00:00', '10:00:00', 'A303', 'A', '2020-03-08', 0),
('A303202003081011', '1 hour', '10:00:00', '11:00:00', 'A303', 'A', '2020-03-08', 0),
('A303202003081112', '1 hour', '11:00:00', '12:00:00', 'A303', 'A', '2020-03-08', 0),
('A303202003081213', '1 hour', '12:00:00', '13:00:00', 'A303', 'A', '2020-03-08', 0),
('A303202003081314', '1 hour', '13:00:00', '14:00:00', 'A303', 'A', '2020-03-08', 0),
('A303202003081415', '1 hour', '14:00:00', '15:00:00', 'A303', 'A', '2020-03-08', 0),
('A303202003081516', '1 hour', '15:00:00', '16:00:00', 'A303', 'A', '2020-03-08', 0),
('A303202003081617', '1 hour', '16:00:00', '17:00:00', 'A303', 'A', '2020-03-08', 1),
('A303202003090809', '1 hour', '08:00:00', '09:00:00', 'A303', 'A', '2020-03-09', 0),
('A303202003090910', '1 hour', '09:00:00', '10:00:00', 'A303', 'A', '2020-03-09', 0),
('A303202003091011', '1 hour', '10:00:00', '11:00:00', 'A303', 'A', '2020-03-09', 0),
('A303202003091112', '1 hour', '11:00:00', '12:00:00', 'A303', 'A', '2020-03-09', 0),
('A303202003091213', '1 hour', '12:00:00', '13:00:00', 'A303', 'A', '2020-03-09', 0),
('A303202003091314', '1 hour', '13:00:00', '14:00:00', 'A303', 'A', '2020-03-09', 0),
('A303202003091415', '1 hour', '14:00:00', '15:00:00', 'A303', 'A', '2020-03-09', 0),
('A303202003091516', '1 hour', '15:00:00', '16:00:00', 'A303', 'A', '2020-03-09', 0),
('A303202003091617', '1 hour', '16:00:00', '17:00:00', 'A303', 'A', '2020-03-09', 0),
('A415 202003090809', '1 hour', '08:00:00', '09:00:00', 'A415 ', 'A', '2020-03-09', 0),
('A415 202003090910', '1 hour', '09:00:00', '10:00:00', 'A415 ', 'A', '2020-03-09', 0),
('A415 202003091011', '1 hour', '10:00:00', '11:00:00', 'A415 ', 'A', '2020-03-09', 0),
('A415 202003091112', '1 hour', '11:00:00', '12:00:00', 'A415 ', 'A', '2020-03-09', 0),
('A415 202003091213', '1 hour', '12:00:00', '13:00:00', 'A415 ', 'A', '2020-03-09', 0),
('A415 202003091314', '1 hour', '13:00:00', '14:00:00', 'A415 ', 'A', '2020-03-09', 0),
('A415 202003091415', '1 hour', '14:00:00', '15:00:00', 'A415 ', 'A', '2020-03-09', 0),
('A415 202003091516', '1 hour', '15:00:00', '16:00:00', 'A415 ', 'A', '2020-03-09', 1),
('A415 202003091617', '1 hour', '16:00:00', '17:00:00', 'A415 ', 'A', '2020-03-09', 0),
('A416202003090809', '1 hour', '08:00:00', '09:00:00', 'A416', 'A', '2020-03-09', 0),
('A416202003090910', '1 hour', '09:00:00', '10:00:00', 'A416', 'A', '2020-03-09', 0),
('A416202003091011', '1 hour', '10:00:00', '11:00:00', 'A416', 'A', '2020-03-09', 0),
('A416202003091112', '1 hour', '11:00:00', '12:00:00', 'A416', 'A', '2020-03-09', 0),
('A416202003091213', '1 hour', '12:00:00', '13:00:00', 'A416', 'A', '2020-03-09', 0),
('A416202003091314', '1 hour', '13:00:00', '14:00:00', 'A416', 'A', '2020-03-09', 0),
('A416202003091415', '1 hour', '14:00:00', '15:00:00', 'A416', 'A', '2020-03-09', 0),
('A416202003091516', '1 hour', '15:00:00', '16:00:00', 'A416', 'A', '2020-03-09', 1),
('A416202003091617', '1 hour', '16:00:00', '17:00:00', 'A416', 'A', '2020-03-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_number` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `building` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `count_use` int(255) NOT NULL,
  `floor` int(5) NOT NULL,
  `room_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_number`, `building`, `count_use`, `floor`, `room_name`) VALUES
('A303', 'A', 30, 3, 'study room'),
('A304', 'A', 30, 3, 'study room'),
('A310 ', 'A', 30, 3, 'study room'),
('A313 ', 'A', 30, 3, 'study room'),
('A314 ', 'A', 30, 3, 'study room'),
('A409 ', 'A', 30, 4, 'study room'),
('A411 ', 'A', 30, 4, 'study room'),
('A412 ', 'A', 30, 4, 'study room'),
('A413 ', 'A', 30, 4, 'study room'),
('A414 ', 'A', 30, 4, 'study room'),
('A415 ', 'A', 30, 4, 'study room'),
('A416', 'A', 30, 4, 'study room'),
('A601 ', 'A', 80, 6, 'lecher room'),
('A602 ', 'A', 80, 6, 'lecher room'),
('A603 ', 'A', 120, 6, 'conference room'),
('A604', 'A', 40, 6, 'Mac room');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `student_first_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `major` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `student_last_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `pass`, `student_first_name`, `major`, `student_last_name`) VALUES
('59122037-1', '81dc9bdb52d04dc20036dbd8313ed055', 'จารุงพษ์', 'MT', 'สุธิกุลไพบูลย์'),
('59122156-9', '4fc848051e4459b8a6afeb210c3664ec', 'ทิศธร', 'MT', 'จรประดิษฐ์'),
('admin', '81dc9bdb52d04dc20036dbd8313ed055', 'root', 'super', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rental_detail`
--
ALTER TABLE `rental_detail`
  ADD PRIMARY KEY (`rentid`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `room_number` (`room_number`);

--
-- Indexes for table `rental_time`
--
ALTER TABLE `rental_time`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `room_number` (`room_number`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_number`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rental_detail`
--
ALTER TABLE `rental_detail`
  ADD CONSTRAINT `rental_detail_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `rental_detail_ibfk_2` FOREIGN KEY (`room_number`) REFERENCES `room` (`room_number`);

--
-- Constraints for table `rental_time`
--
ALTER TABLE `rental_time`
  ADD CONSTRAINT `rental_time_ibfk_1` FOREIGN KEY (`room_number`) REFERENCES `room` (`room_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
