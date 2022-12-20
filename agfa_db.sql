-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 04:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agfa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cs_id` int(11) NOT NULL,
  `cs_name` varchar(255) NOT NULL,
  `cs_start` time NOT NULL,
  `cs_end` time NOT NULL,
  `cs_date` date NOT NULL,
  `cs_room` varchar(255) DEFAULT NULL,
  `site_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cs_id`, `cs_name`, `cs_start`, `cs_end`, `cs_date`, `cs_room`, `site_id`, `role_name`) VALUES
(1, 'Radiology Example', '08:00:00', '10:00:00', '2022-11-22', 'Room 300', 123456, 'Radiology'),
(2, 'Cardiology Example', '10:00:00', '12:00:00', '2022-11-22', 'Room 701', 123456, 'Cardiology'),
(3, 'Cardiology Tech Example', '08:00:00', '10:00:00', '2022-11-23', 'Room 500', 123456, 'Cardiology Tech'),
(4, 'Mammography Example', '08:00:00', '10:00:00', '2022-11-16', 'Room 300', 234567, 'Mammography'),
(5, 'Mammography Example 2', '10:00:00', '12:00:00', '2022-11-16', 'Room 400', 234567, 'Mammography'),
(6, 'Radiology Tech Example', '08:00:00', '10:00:00', '2022-11-12', 'Room 300', 345678, 'Radiology Tech'),
(7, 'Mammography Example', '08:00:00', '10:00:00', '2022-11-10', 'Room 300', 345678, 'Mammography');

-- --------------------------------------------------------

--
-- Table structure for table `course_attendee`
--

CREATE TABLE `course_attendee` (
  `att_id` int(11) NOT NULL,
  `cs_id` int(11) NOT NULL,
  `att_status` varchar(255) NOT NULL,
  `att_name` varchar(255) NOT NULL,
  `att_email` varchar(255) NOT NULL,
  `site_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_attendee`
--

INSERT INTO `course_attendee` (`att_id`, `cs_id`, `att_status`, `att_name`, `att_email`, `site_id`) VALUES
(1, 1, 'Scheduled', 'Justin Delgado', 'delgajus@kean.edu', 123456),
(2, 1, 'Attended', 'Ani Laitusis', 'laitusia@kean.edu', 123456),
(3, 2, 'Attended', 'Ahmad Hodges', 'hodgesa@kean.edu', 123456),
(4, 2, 'Confirmed', 'Justin Delgado', 'delgajus@kean.edu', 123456),
(5, 3, 'Scheduled', 'Justin Delgado', 'delgajus@kean.edu', 123456),
(6, 3, 'Scheduled', 'Ani Laitusis', 'laitusia@kean.edu', 123456),
(7, 3, 'Scheduled', 'Ahmad Hodges', 'hodgesa@kean.edu', 123456),
(8, 4, 'Scheduled', 'Kathleen Blain', 'blaink@kean.edu', 234567),
(9, 5, 'Scheduled', 'Kathleen Blain', 'blaink@kean.edu', 234567),
(10, 5, 'Scheduled', 'Sammy Pips', 'desronvs@kean.edu', 234567),
(11, 6, 'Scheduled', 'Justin Delgado', 'delgajus@kean.edu', 123456),
(12, 7, 'Scheduled', 'Andrea Gualpa', 'gualpaa@kean.edu', 345678),
(13, 7, 'Scheduled', 'Jay Tomasello', 'tomaselj@kean.edu', 345678);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_name` varchar(255) NOT NULL,
  `num_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_name`, `num_seats`) VALUES
('Cardiology', 2),
('Cardiology Tech', 10),
('Mammography', 2),
('Radiology', 2),
('Radiology Tech', 10);

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `site_id` int(6) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`site_id`, `site_name`, `start_date`, `end_date`) VALUES
(123456, 'General Hospital', '2022-11-21', '2022-11-25'),
(234567, 'Johns Hopkins', '2022-11-14', '2022-11-18'),
(345678, 'Jackson Memorial Hospital', '2022-11-08', '2022-11-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cs_id`),
  ADD KEY `site_id` (`site_id`),
  ADD KEY `role_name` (`role_name`);

--
-- Indexes for table `course_attendee`
--
ALTER TABLE `course_attendee`
  ADD PRIMARY KEY (`att_id`),
  ADD KEY `cs_id` (`cs_id`),
  ADD KEY `site_id` (`site_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_name`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`site_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_attendee`
--
ALTER TABLE `course_attendee`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`role_name`) REFERENCES `role` (`role_name`);

--
-- Constraints for table `course_attendee`
--
ALTER TABLE `course_attendee`
  ADD CONSTRAINT `course_attendee_ibfk_1` FOREIGN KEY (`cs_id`) REFERENCES `course` (`cs_id`),
  ADD CONSTRAINT `course_attendee_ibfk_2` FOREIGN KEY (`site_id`) REFERENCES `site` (`site_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
