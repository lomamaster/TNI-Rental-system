-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 05:07 PM
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
  `id` int(255) NOT NULL,
  `student_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `student_first_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `student_last_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `advicer` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `room_number` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `approve` int(3) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rental_time`
--

CREATE TABLE `rental_time` (
  `ID` int(11) NOT NULL,
  `time` time NOT NULL,
  `room_number` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `building` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rental_time`
--
ALTER TABLE `rental_time`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rental_detail`
--
ALTER TABLE `rental_detail`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
