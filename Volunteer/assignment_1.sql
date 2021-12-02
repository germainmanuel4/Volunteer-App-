-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2019 at 08:36 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment_1`
--
CREATE DATABASE IF NOT EXISTS `assignment_1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `assignment_1`;

-- --------------------------------------------------------

--
-- Table structure for table `access_table`
--

CREATE TABLE `access_table` (
  `access_id` int(11) NOT NULL,
  `acess_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_table`
--

INSERT INTO `access_table` (`access_id`, `acess_level`) VALUES
(1, 'admin'),
(2, 'volunteer');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_action` text NOT NULL,
  `log_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `log_time`, `log_action`, `log_details`) VALUES
(150, '2019-10-04 14:53:58', 'boss31@yahoo.com, allocated Setup to germainpogi@gmail.com on Day 1, Morning', 'Organiser Allocating Task to volunteer'),
(151, '2019-10-04 14:54:14', 'boss31@yahoo.com, allocated Feed the animals to germainpogi@gmail.com on Day 1, Afternoon', 'Organiser Allocating Task to volunteer'),
(152, '2019-10-04 14:54:57', 'boss31@yahoo.com, cleared a task named Feed the animals for germainpogi@gmail.com for timeslot = Day 1, Afternoon ', 'Organiser Clearing Task to volunteer'),
(153, '2019-10-04 14:59:37', 'boss31@yahoo.com, allocated Setup to germainpogi@gmail.com on Day 1, Afternoon', 'Organiser Allocating Task to volunteer'),
(154, '2019-10-04 14:59:46', 'boss31@yahoo.com, allocated Clean toilet to germainpogi@gmail.com on Day 1, Afternoon', 'Organiser Allocating Task to volunteer'),
(155, '2019-10-04 15:01:19', 'boss31@yahoo.com, changed  description for germainpogi@gmail.com', 'Organiser Allocating Task to volunteer'),
(156, '2019-10-04 15:01:40', 'boss31@yahoo.com, changed  description for germainpogi@gmail.com', 'Organiser Allocating Task to volunteer'),
(157, '2019-10-04 15:03:11', 'boss31@yahoo.com, cleared a task named Clean toilet for germainpogi@gmail.com for timeslot = Day 1, Afternoon ', 'Organiser Clearing Task to volunteer'),
(158, '2019-10-04 15:03:16', 'boss31@yahoo.com, allocated Setup to germainpogi@gmail.com on Day 1, Afternoon', 'Organiser Allocating Task to volunteer'),
(159, '2019-10-04 15:03:21', 'boss31@yahoo.com, changed Setup description for germainpogi@gmail.com', 'Organiser Allocating Task to volunteer'),
(160, '2019-10-04 15:05:43', 'UnSuccessfull Login Organiser email = jbloggs@stuff.com', 'Suspicious Organiser Login'),
(161, '2019-10-04 15:05:48', 'UnSuccessfull Login Organiser email = jbloggs@stuff.com', 'Suspicious Organiser Login'),
(162, '2019-10-04 15:07:04', 'Successfull Login Organiser email = amanda@yahoo.com', 'Organiser Login'),
(163, '2019-10-04 15:07:18', 'amanda@yahoo.com, changed Setup description for germainpogi@gmail.com', 'Organiser Allocating Task to volunteer'),
(164, '2019-10-06 01:10:09', 'amanda@yahoo.com, cleared a task named  for germainpogi@gmail.com for timeslot = Day 3, Morning ', 'Organiser Clearing Task to volunteer'),
(165, '2019-10-06 01:11:57', 'Successfull Login Volunteer email = germainpogi@gmail.com', 'Volunteer Login'),
(166, '2019-10-06 01:12:23', 'germainpogi@gmail.com, Added a timeslot, Day 8, Night', 'Volunteer Adding TimeSlots'),
(182, '2019-10-07 03:09:02', 'UnSuccessfull Login Volunteer email = germainpogi@yahoo.com', 'Suspicious Volunteer Login'),
(183, '2019-10-07 03:09:07', 'Successfull Login Volunteer email = germainpogi@gmail.com', 'Volunteer Login'),
(184, '2019-10-07 03:37:33', 'Successfull Login Volunteer email = germainpogi@gmail.com', 'Volunteer Login'),
(185, '2019-10-07 03:40:45', 'Successfull Login Volunteer email = germainpogi@gmail.com', 'Volunteer Login'),
(186, '2019-10-07 03:53:17', 'UnSuccessfull Login Volunteer email = aaa', 'Suspicious Volunteer Login'),
(187, '2019-10-07 03:53:24', 'Successfull Login Volunteer email = aaa@yahoo.com', 'Volunteer Login'),
(188, '2019-10-07 03:55:31', 'Successfull Login Volunteer email = germainpogi@gmail.com', 'Volunteer Login'),
(189, '2019-10-07 04:01:18', 'Successfull Login Volunteer email = germainpogi@gmail.com', 'Volunteer Login'),
(215, '2019-10-07 06:01:50', 'germainpogi@gmail.com, Added a timeslot, Day 1, Morning', 'Volunteer Adding TimeSlots'),
(216, '2019-10-07 06:01:53', 'germainpogi@gmail.com, Added a timeslot, Day 1, Afternoon', 'Volunteer Adding TimeSlots'),
(217, '2019-10-07 06:02:15', 'germainpogi@gmail.com, Removed a timeslot with time slot = Day 1, Afternoon', 'Volunteer Removing TimeSlots'),
(218, '2019-10-07 06:02:18', 'germainpogi@gmail.com, Added a timeslot, Day 1, Afternoon', 'Volunteer Adding TimeSlots'),
(219, '2019-10-07 06:02:46', 'Successfull Login Organiser email = boss31@yahoo.com', 'Organiser Login'),
(220, '2019-10-07 06:08:47', 'boss31@yahoo.com, allocated Help Charity to germainpogi@gmail.com on Day 1, Morning', 'Organiser Allocating Task to volunteer'),
(221, '2019-10-07 06:19:41', 'Successfull Login Volunteer email = germainpogi@gmail.com', 'Volunteer Login'),
(222, '2019-10-07 06:32:48', 'germainpogi@gmail.com, Added a timeslot, Day 1, Night', 'Volunteer Adding TimeSlots'),
(223, '2019-10-08 02:07:48', 'Successfull Login Organiser email = boss31@yahoo.com', 'Organiser Login'),
(224, '2019-10-08 02:08:58', 'Successfull Login Volunteer email = germainpogi@gmail.com', 'Volunteer Login'),
(243, '2019-10-11 11:22:32', 'swoods@stuff.com, Added a timeslot, Day 1, Night', 'Volunteer Adding TimeSlots'),
(244, '2019-10-11 11:22:38', 'swoods@stuff.com, Added a timeslot, Day 3, Night', 'Volunteer Adding TimeSlots'),
(245, '2019-10-11 11:31:35', 'Newly Registered Volunteer email = .tri@gmail.com.', 'Volunteer Registration'),
(246, '2019-10-11 11:37:47', 'Newly Registered Volunteer email = .tri@gmail.com.', 'Volunteer Registration'),
(247, '2019-10-11 11:46:57', 'Newly Registered Volunteer email = .tri@gmail.com.', 'Volunteer Registration'),
(248, '2019-10-11 11:47:52', 'Newly Registered Volunteer email = .tri@gmail.com.', 'Volunteer Registration'),
(249, '2019-10-11 11:53:53', 'Newly Registered Volunteer email = .tri@gmail.com.', 'Volunteer Registration'),
(250, '2019-10-11 11:55:09', 'Successfull Login Volunteer email = tri@gmail.com', 'Volunteer Login'),
(251, '2019-10-11 11:55:13', 'tri@gmail.com, Added a timeslot, Day 1, Morning', 'Volunteer Adding TimeSlots'),
(252, '2019-10-11 11:59:02', 'tri@gmail.com, Added a timeslot, Day 2, Morning', 'Volunteer Adding TimeSlots'),
(253, '2019-10-11 12:11:25', 'Successfull Login Organiser email = ironMan', 'Organiser Login'),
(254, '2019-10-11 12:12:13', 'ironMan, allocated Clean toilet to blackwidow@vengers.com on Day 1, Morning', 'Organiser Allocating Task to volunteer'),
(255, '2019-10-11 12:12:37', 'ironMan, allocated Clean Area to swoods@stuff.com on Day 1, Night', 'Organiser Allocating Task to volunteer'),
(256, '2019-10-11 12:22:30', 'Newly Registered Volunteer email = .deadpool@ntihero.com.', 'Volunteer Registration'),
(257, '2019-10-11 12:23:07', 'Successfull Login Volunteer email = deadpool@ntihero.com', 'Volunteer Login'),
(258, '2019-10-11 12:23:16', 'deadpool@ntihero.com, Added a timeslot, Day 1, Morning', 'Volunteer Adding TimeSlots'),
(259, '2019-10-11 12:23:18', 'deadpool@ntihero.com, Added a timeslot, Day 2, Morning', 'Volunteer Adding TimeSlots'),
(260, '2019-10-11 12:23:23', 'deadpool@ntihero.com, Added a timeslot, Day 3, Morning', 'Volunteer Adding TimeSlots'),
(261, '2019-10-11 12:27:09', 'UnSuccessfull Login Volunteer email = ironMan', 'Suspicious Volunteer Login'),
(262, '2019-10-11 12:27:25', 'Successfull Login Organiser email = ironMan', 'Organiser Login'),
(263, '2019-10-11 12:29:19', 'ironMan, allocated Feed the children to deadpool@ntihero.com on Day 2, Morning', 'Organiser Allocating Task to volunteer'),
(264, '2019-10-11 12:29:19', 'ironMan, changed  description for deadpool@ntihero.com', 'Organiser Allocating Task to volunteer'),
(265, '2019-10-11 12:34:25', 'Successfull Login Volunteer email = deadpool@ntihero.com', 'Volunteer Login');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `MessageID` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `Message` text NOT NULL,
  `Response` varchar(250) DEFAULT 'No Response',
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`MessageID`, `username`, `email`, `Message`, `Response`, `Date`) VALUES
(1, 'boss31@yahoo.com', 'germainpogi@gmail.com', 'Make Sure', 'Germain', '2019-10-06 02:10:30'),
(2, 'boss31@yahoo.com', 'germainpogi@gmail.com', 'Do this and that', 'Good to Know', '2019-10-06 02:10:30'),
(17, 'ironMan', 'blackwidow@vengers.com', 'What are you doing in here?', 'No Response', '2019-10-11 12:14:50'),
(18, 'ironMan', 'deadpool@ntihero.com', 'Remember No talking', 'No Response', '2019-10-11 12:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `organisers_table`
--

CREATE TABLE `organisers_table` (
  `username` char(25) NOT NULL,
  `password` char(30) NOT NULL,
  `firstname` char(30) NOT NULL,
  `surname` char(30) NOT NULL,
  `access_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisers_table`
--

INSERT INTO `organisers_table` (`username`, `password`, `firstname`, `surname`, `access_id`) VALUES
('amanda@yahoo.com', '111111', 'amanda', 'devine', 1),
('boss31@yahoo.com', '111111', 'boss', 'germain', 1),
('gregg@ecu.com', '111111', 'Gregg', 'Baatard', 1),
('ironMan', '123456', 'Tony', 'Stark', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks_table`
--

CREATE TABLE `tasks_table` (
  `task_id` int(11) NOT NULL,
  `task_name` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks_table`
--

INSERT INTO `tasks_table` (`task_id`, `task_name`) VALUES
(73, 'Setup'),
(74, 'Admissions'),
(78, 'Help Charity'),
(81, 'Clean Area'),
(94, 'Feed the children'),
(96, 'Lift the boxes'),
(97, 'Feed the animals'),
(98, 'Clean toilet'),
(99, 'Sound System');

-- --------------------------------------------------------

--
-- Table structure for table `time_slots_table`
--

CREATE TABLE `time_slots_table` (
  `time_slot_id` int(11) NOT NULL,
  `time_slot_name` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_slots_table`
--

INSERT INTO `time_slots_table` (`time_slot_id`, `time_slot_name`) VALUES
(1, 'Day 1, Morning'),
(2, 'Day 1, Afternoon'),
(3, 'Day 1, Night'),
(147, 'Day 2, Morning'),
(330, 'Day 2, Afternoon'),
(331, 'Day 2, Night'),
(353, 'Day 3, Morning'),
(354, 'Day 3, Afternoon'),
(355, 'Day 3, Night');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers_table`
--

CREATE TABLE `volunteers_table` (
  `email` varchar(30) NOT NULL,
  `firstname` char(30) NOT NULL,
  `surname` char(30) NOT NULL,
  `addressline1` char(30) NOT NULL,
  `addressline2` char(30) DEFAULT NULL,
  `suburb` char(20) NOT NULL,
  `postcode` int(4) NOT NULL,
  `phonenumber` varchar(12) NOT NULL,
  `birthday` date NOT NULL,
  `password` char(30) NOT NULL,
  `access_id` int(11) NOT NULL,
  `image_dir` varchar(200) DEFAULT 'nopic.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteers_table`
--

INSERT INTO `volunteers_table` (`email`, `firstname`, `surname`, `addressline1`, `addressline2`, `suburb`, `postcode`, `phonenumber`, `birthday`, `password`, `access_id`, `image_dir`) VALUES
('aaa@yahoo.com', 'Ana', 'Ball', '3 cygnet', 'close', 'ballajura', 3333, '0421345678', '1989-08-31', '111111', 2, 'babe.jpg'),
('blackwidow@vengers.com', 'Natasha', 'Romanova', 'Marvel studio st', NULL, 'Perth', 6005, '04773423462', '1984-10-09', '123456', 2, 'blackwidow.jpg'),
('deadpool@ntihero.com', 'Wade', 'Wilson', 'X-Mansion', '', 'New York', 6034, '042839274', '1984-10-02', '123456', 2, 'deadpool.jpg'),
('germainpogi@gmail.com', 'Germain', 'manuel', '8 cygnet close', 'close road', 'ballajura', 6066, '0433543216', '1994-02-24', '123456', 2, 'orc.jpg'),
('jbloggs@stuff.com', 'John', 'Bloggs', '7 mtlawley', 'close', 'ballajura', 6066, '0421540939', '1989-08-31', '111111', 2, 'nopic.png'),
('swoods@stuff.com', 'Sam', 'Woods', 'Unit12', '41 Maple Rd', 'Dianela', 6059, '433430921', '1990-02-01', '111111', 2, 'babe2.jpg'),
('tri@gmail.com', 'tri', 'luong', '40 Money St', '', 'Perth', 6000, '0473429834', '1984-10-15', '123456', 2, 'nopic.png');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_times_table`
--

CREATE TABLE `volunteer_times_table` (
  `vol_time_id` int(11) NOT NULL,
  `volunteer_email` varchar(30) NOT NULL,
  `time_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer_times_table`
--

INSERT INTO `volunteer_times_table` (`vol_time_id`, `volunteer_email`, `time_id`, `task_id`, `description`) VALUES
(943, 'germainpogi@gmail.com', 1, 78, ''),
(945, 'germainpogi@gmail.com', 2, NULL, NULL),
(947, 'aaa@yahoo.com', 1, NULL, NULL),
(948, 'blackwidow@vengers.com', 1, 98, ''),
(949, 'blackwidow@vengers.com', 3, NULL, NULL),
(950, 'swoods@stuff.com', 3, 81, ''),
(951, 'swoods@stuff.com', 355, NULL, NULL),
(952, 'tri@gmail.com', 1, NULL, NULL),
(953, 'tri@gmail.com', 147, NULL, NULL),
(954, 'deadpool@ntihero.com', 1, NULL, NULL),
(955, 'deadpool@ntihero.com', 147, 94, 'Remember focus on your job\r\n'),
(956, 'deadpool@ntihero.com', 353, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_table`
--
ALTER TABLE `access_table`
  ADD PRIMARY KEY (`access_id`),
  ADD UNIQUE KEY `acess_id` (`access_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`),
  ADD UNIQUE KEY `log_id` (`log_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`MessageID`);

--
-- Indexes for table `organisers_table`
--
ALTER TABLE `organisers_table`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tasks_table`
--
ALTER TABLE `tasks_table`
  ADD PRIMARY KEY (`task_id`);

--
-- Indexes for table `time_slots_table`
--
ALTER TABLE `time_slots_table`
  ADD PRIMARY KEY (`time_slot_id`);

--
-- Indexes for table `volunteers_table`
--
ALTER TABLE `volunteers_table`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `volunteer_times_table`
--
ALTER TABLE `volunteer_times_table`
  ADD PRIMARY KEY (`vol_time_id`),
  ADD KEY `volunteer_email` (`volunteer_email`),
  ADD KEY `time_id` (`time_id`),
  ADD KEY `task_id` (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_table`
--
ALTER TABLE `access_table`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `MessageID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tasks_table`
--
ALTER TABLE `tasks_table`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `time_slots_table`
--
ALTER TABLE `time_slots_table`
  MODIFY `time_slot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;
--
-- AUTO_INCREMENT for table `volunteer_times_table`
--
ALTER TABLE `volunteer_times_table`
  MODIFY `vol_time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=957;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `volunteer_times_table`
--
ALTER TABLE `volunteer_times_table`
  ADD CONSTRAINT `volunteer_times_table_ibfk_1` FOREIGN KEY (`volunteer_email`) REFERENCES `volunteers_table` (`email`),
  ADD CONSTRAINT `volunteer_times_table_ibfk_2` FOREIGN KEY (`time_id`) REFERENCES `time_slots_table` (`time_slot_id`),
  ADD CONSTRAINT `volunteer_times_table_ibfk_3` FOREIGN KEY (`task_id`) REFERENCES `tasks_table` (`task_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
