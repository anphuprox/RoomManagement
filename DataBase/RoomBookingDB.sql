-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 06, 2024 at 02:40 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `RoomBookingDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `BOOKINGS`
--

CREATE TABLE `BOOKINGS` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `BOOKINGS`
--

INSERT INTO `BOOKINGS` (`booking_id`, `user_id`, `created_date`, `status`) VALUES
(1, 1, '2024-09-01', 'confirmed'),
(2, 2, '2024-09-02', 'pending'),
(3, 3, '2024-09-03', 'cancelled'),
(4, 4, '2024-09-04', 'finished'),
(5, 5, '2024-09-05', 'rejected'),
(6, 6, '2024-09-06', 'confirmed'),
(7, 7, '2024-09-07', 'pending'),
(8, 8, '2024-09-08', 'cancelled'),
(9, 9, '2024-09-09', 'finished'),
(10, 10, '2024-09-10', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `BOOKING_DETAILS`
--

CREATE TABLE `BOOKING_DETAILS` (
  `booking_detail_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_id` varchar(10) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `BOOKING_DETAILS`
--

INSERT INTO `BOOKING_DETAILS` (`booking_detail_id`, `booking_id`, `room_id`, `start_time`, `end_time`) VALUES
(1, 1, 'A101', '2024-09-10 08:00:00', '2024-09-10 10:00:00'),
(3, 2, 'B202', '2024-09-15 09:00:00', '2024-09-15 11:00:00'),
(4, 3, 'C303', '2024-09-16 13:00:00', '2024-09-16 15:00:00'),
(9, 8, 'H808', '2024-09-22 14:00:00', '2024-09-22 16:00:00'),
(10, 9, 'A102', '2024-09-23 15:00:00', '2024-09-23 17:00:00'),
(11, 10, 'B203', '2024-09-24 17:00:00', '2024-09-24 19:00:00'),
(12, 3, 'C303', '2024-09-25 08:00:00', '2024-09-25 10:00:00'),
(13, 3, 'C304', '2024-09-25 10:30:00', '2024-09-25 12:30:00'),
(14, 3, 'C305', '2024-09-26 14:00:00', '2024-09-26 16:00:00'),
(15, 4, 'D404', '2024-09-27 09:00:00', '2024-09-27 11:00:00'),
(16, 4, 'D405', '2024-09-27 11:30:00', '2024-09-27 13:30:00'),
(17, 4, 'D406', '2024-09-28 15:00:00', '2024-09-28 17:00:00'),
(18, 5, 'E505', '2024-09-29 08:00:00', '2024-09-29 10:00:00'),
(19, 5, 'E506', '2024-09-29 10:30:00', '2024-09-29 12:30:00'),
(20, 5, 'E507', '2024-09-30 14:00:00', '2024-09-30 16:00:00'),
(21, 6, 'F606', '2024-10-01 08:00:00', '2024-10-01 10:00:00'),
(22, 6, 'F607', '2024-10-01 10:30:00', '2024-10-01 12:30:00'),
(23, 6, 'F608', '2024-10-02 14:00:00', '2024-10-02 16:00:00'),
(24, 7, 'G707', '2024-10-03 09:00:00', '2024-10-03 11:00:00'),
(25, 7, 'G708', '2024-10-03 11:30:00', '2024-10-03 13:30:00'),
(26, 7, 'G709', '2024-10-04 15:00:00', '2024-10-04 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `ROOMS`
--

CREATE TABLE `ROOMS` (
  `room_id` varchar(10) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL,
  `block` varchar(2) NOT NULL,
  `room_condition` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ROOMS`
--

INSERT INTO `ROOMS` (`room_id`, `room_name`, `capacity`, `block`, `room_condition`, `type`) VALUES
('A101', 'Room A101', 50, 'A', 'good', 'public'),
('A102', 'Room A102', 60, 'A', 'good', 'private'),
('A103', 'Room A103', 40, 'A', 'good', 'public'),
('A104', 'Room A104', 35, 'A', 'bad', 'private'),
('A105', 'Room A105', 50, 'A', 'good', 'public'),
('B202', 'Room B202', 30, 'B', 'good', 'private'),
('B203', 'Room B203', 80, 'B', 'good', 'public'),
('B204', 'Room B204', 45, 'B', 'good', 'private'),
('B205', 'Room B205', 55, 'B', 'bad', 'public'),
('B206', 'Room B206', 60, 'B', 'good', 'private'),
('C303', 'Room C303', 20, 'C', 'bad', 'public'),
('C304', 'Room C304', 30, 'C', 'good', 'public'),
('C305', 'Room C305', 25, 'C', 'bad', 'private'),
('C306', 'Room C306', 35, 'C', 'good', 'public'),
('D404', 'Room D404', 100, 'D', 'good', 'private'),
('D405', 'Room D405', 40, 'D', 'good', 'private'),
('D406', 'Room D406', 50, 'D', 'good', 'public'),
('D407', 'Room D407', 45, 'D', 'bad', 'private'),
('E505', 'Room E505', 25, 'E', 'bad', 'public'),
('E506', 'Room E506', 35, 'E', 'good', 'public'),
('E507', 'Room E507', 30, 'E', 'bad', 'private'),
('E508', 'Room E508', 50, 'E', 'good', 'public'),
('F606', 'Room F606', 40, 'F', 'good', 'public'),
('F607', 'Room F607', 40, 'F', 'good', 'private'),
('F608', 'Room F608', 55, 'F', 'bad', 'public'),
('F609', 'Room F609', 45, 'F', 'good', 'private'),
('G707', 'Room G707', 35, 'G', 'good', 'private'),
('G708', 'Room G708', 50, 'G', 'good', 'public'),
('G709', 'Room G709', 60, 'G', 'bad', 'private'),
('G710', 'Room G710', 70, 'G', 'good', 'public'),
('H808', 'Room H808', 45, 'H', 'bad', 'public'),
('H809', 'Room H809', 55, 'H', 'good', 'public'),
('H810', 'Room H810', 40, 'H', 'bad', 'private'),
('H811', 'Room H811', 65, 'H', 'good', 'public');

-- --------------------------------------------------------

--
-- Table structure for table `USERS`
--

CREATE TABLE `USERS` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `USERS`
--

INSERT INTO `USERS` (`user_id`, `username`, `email`, `password`, `status`, `user_type`) VALUES
(1, 'john_doe', 'john@example.com', 'password123', 'active', 'member'),
(2, 'admin', 'jane@example.com', 'password456', 'active', 'admin'),
(3, 'alice_jones', 'alice@example.com', 'password789', 'inactive', 'member'),
(4, 'bob_brown', 'bob@example.com', 'password000', 'active', 'member'),
(5, 'charlie_davis', 'charlie@example.com', 'password321', 'inactive', 'admin'),
(6, 'emily_white', 'emily@example.com', 'password654', 'active', 'member'),
(7, 'george_black', 'george@example.com', 'password987', 'inactive', 'admin'),
(8, 'david_clark', 'david@example.com', 'password111', 'active', 'member'),
(9, 'hannah_green', 'hannah@example.com', 'password222', 'active', 'admin'),
(10, 'oliver_turner', 'oliver@example.com', 'password333', 'inactive', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BOOKINGS`
--
ALTER TABLE `BOOKINGS`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `BOOKING_DETAILS`
--
ALTER TABLE `BOOKING_DETAILS`
  ADD PRIMARY KEY (`booking_detail_id`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `ROOMS`
--
ALTER TABLE `ROOMS`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `USERS`
--
ALTER TABLE `USERS`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BOOKINGS`
--
ALTER TABLE `BOOKINGS`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `BOOKING_DETAILS`
--
ALTER TABLE `BOOKING_DETAILS`
  MODIFY `booking_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `USERS`
--
ALTER TABLE `USERS`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BOOKINGS`
--
ALTER TABLE `BOOKINGS`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `USERS` (`user_id`);

--
-- Constraints for table `BOOKING_DETAILS`
--
ALTER TABLE `BOOKING_DETAILS`
  ADD CONSTRAINT `booking_details_ibfk_1` FOREIGN KEY (`booking_id`) REFERENCES `BOOKINGS` (`booking_id`),
  ADD CONSTRAINT `booking_details_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `ROOMS` (`room_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
