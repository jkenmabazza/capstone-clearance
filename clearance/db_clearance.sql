-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 05:41 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_clearance`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `user_type` char(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `contactno`, `gender`, `avatar`, `user_type`, `timestamp`, `salt`) VALUES
(29, 'faculty', '847991efffb9ba1debfbcf25fe13d2493cf60f4f', 'CARLOS', 'BABARAN', 'carlosbabaran@gmail.com', '09222222222', 'M', 'img/uploads/site.png', '1', '2018-11-25 08:55:01', '37505785497d00c5a0a68b4ace76f85199322d15'),
(37, 'officer', '847991efffb9ba1debfbcf25fe13d2493cf60f4f', 'KRIZEL', 'ABAD', 'kriz@yahoo.com', '09222222222', 'F', 'img/uploads/site.png', '2', '2018-11-25 19:03:46', '7869fe9286192de6d915b7883c0d947f4a7a0a24'),
(38, 'dean', '847991efffb9ba1debfbcf25fe13d2493cf60f4f', 'JEININ LEI', 'ARELLANO', 'kri@yahoo.com', '0922222222222', 'F', 'img/uploads/site.png', '3', '2018-11-25 19:04:48', '7aa2c7c58b44cf93c50f9e6efedff1a5053295bf');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `start_date` varchar(20) NOT NULL,
  `end_date` varchar(20) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `archive` char(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_event`
--

INSERT INTO `tbl_event` (`event_id`, `event_name`, `start_date`, `end_date`, `venue`, `archive`, `timestamp`, `salt`) VALUES
(1, 'CYBER SUMMIT', '2018-08-17', '2018-08-18', 'GLOBAL CONFERENCE', '0', '2018-11-25 16:21:15', '42123123FeaASd9123213213DA12312sd'),
(2, 'UNIWEEK', '2018-12-03', '2018-12-07', 'SPUP', '0', '2018-11-25 16:30:31', '412fe87e2f60c4efb0a5b9c83c8fb6df156d2192'),
(3, 'TCON 4', '2018-11-30', '2018-12-02', 'GLOBAL CENTER', '0', '2018-12-06 02:31:58', 'a2d6e5d65df4acbfdadf00fbe8f33ed0ec5ee6e0'),
(4, 'GOVERNORS HEALTH SEMINAR', '2018-12-06', '2018-12-07', 'GLOBAL CENTER', '0', '2018-12-06 02:32:59', '8fa4655783e5aad89d6a1d6c6d5f33852e97fde2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` int(11) NOT NULL,
  `log_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`log_id`, `log_name`, `username`, `fullname`, `date`, `time`) VALUES
(2, 'Insert student 804747', 'admin', 'CARLOS BABARAN', '0000-00-00', '12:07:11'),
(3, 'Insert event UNIWEEK', 'admin', 'CARLOS BABARAN', '0000-00-00', '12:30:31'),
(4, 'Insert sanction FLASH DRIVE', 'admin', 'CARLOS BABARAN', '0000-00-00', '12:57:45'),
(5, 'Insert sanction MANILA PAPER', 'admin', 'CARLOS BABARAN', '0000-00-00', '12:58:54'),
(6, 'Insert Remarks 4', 'admin', 'CARLOS BABARAN', '0000-00-00', '02:31:20'),
(7, 'Insert Remarks 4', 'admin', 'CARLOS BABARAN', '0000-00-00', '02:46:35'),
(8, 'Insert Remarks 4', 'admin', 'CARLOS BABARAN', '0000-00-00', '02:47:34'),
(9, 'Insert Remarks 4', 'admin', 'CARLOS BABARAN', '0000-00-00', '02:48:56'),
(10, 'Update event CYBER SUMMITT', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:02:40'),
(11, 'Update event CYBER SUMMIT', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:03:12'),
(12, 'Update event CYBER SUMMITt', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:03:53'),
(13, 'Update event CYBER SUMMIT', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:04:28'),
(14, 'Update sanction FLASH DRIVEeEEEE', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:44:05'),
(15, 'Update sanction FLASH DRIVEeEEEE', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:45:12'),
(16, 'Update sanction FLASH DRIVE', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:45:29'),
(17, 'Update student 804747', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:57:58'),
(18, 'Update student 804747', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:58:05'),
(19, 'Update student 124545', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:58:11'),
(20, 'Insert student 321678', 'admin', 'CARLOS BABARAN', '0000-00-00', '09:17:15'),
(21, 'Insert sanction CARTOLINA', 'admin', 'CARLOS BABARAN', '0000-00-00', '09:31:15'),
(22, 'Insert Remarks 4', 'admin', 'CARLOS BABARAN', '0000-00-00', '01:31:25'),
(23, 'Insert Remarks 4', 'admin', 'CARLOS BABARAN', '0000-00-00', '01:32:29'),
(24, 'Insert Remarks 4', 'admin', 'CARLOS BABARAN', '0000-00-00', '01:37:24'),
(25, 'Insert Remarks 4', 'admin', 'CARLOS BABARAN', '0000-00-00', '01:40:32'),
(26, 'Insert Remarks 4', 'admin', 'CARLOS BABARAN', '0000-00-00', '01:41:09'),
(27, 'Insert Remarks 4', 'admin', 'CARLOS BABARAN', '0000-00-00', '01:48:53'),
(28, 'Insert student 2017-033', 'admin', 'CARLOS BABARAN', '0000-00-00', '10:24:50'),
(29, 'Update student 124545', 'admin', 'CARLOS BABARAN', '0000-00-00', '10:32:32'),
(30, 'Update student 2017-033', 'admin', 'CARLOS BABARAN', '0000-00-00', '10:33:17'),
(31, 'Update student 2017-034', 'admin', 'CARLOS BABARAN', '0000-00-00', '10:33:31'),
(32, 'Update School Year and Semester into2019-2020 1ST', 'admin', 'CARLOS BABARAN', '0000-00-00', '10:50:10'),
(33, 'Update School Year and Semester into2019-2020 3RD', 'admin', 'CARLOS BABARAN', '0000-00-00', '10:51:29'),
(34, 'Update School Year and Semester into2018-2019 1ST', 'admin', 'CARLOS BABARAN', '0000-00-00', '10:51:35'),
(35, 'Insert student 2018-012', 'admin', 'CARLOS BABARAN', '0000-00-00', '10:54:01'),
(36, 'Update school year and semester of regular student : 2018-2019 - 2ND', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:13:52'),
(37, 'Update school year and semester of regular student : 2019-2020 - SUMMER', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:16:09'),
(38, 'Update school year and semester of regular student : 2019-2020 - SUMMER', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:16:33'),
(39, 'Update school year and semester of regular student : 2019-2020 - SUMMER', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:17:04'),
(40, 'Update school year and semester of regular student : 2018-2019 - 1ST', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:17:28'),
(41, 'Update school year and semester of regular student : 2018-2019 - 2ND', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:18:44'),
(42, 'Update school year and semester of regular student : 2020-2021 - 2ND', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:19:09'),
(43, 'Update school year and semester of regular student : 2018-2019 - 1ST', 'admin', 'CARLOS BABARAN', '0000-00-00', '11:19:20'),
(44, 'Insert sanction PAPER CUTTER', 'admin', 'CARLOS BABARAN', '0000-00-00', '01:02:24'),
(45, 'Update school year and semester of regular student : 2019-2020 - 2ND', 'admin', 'CARLOS BABARAN', '0000-00-00', '02:11:26'),
(46, 'Update School Year and Semester into2018-2019 1ST', 'admin', 'CARLOS BABARAN', '0000-00-00', '09:14:01'),
(47, 'Insert student 2018-333', 'admin', 'CARLOS BABARAN', '0000-00-00', '09:19:32'),
(48, 'Update sanction', 'admin', 'CARLOS BABARAN', '0000-00-00', '10:06:40'),
(49, 'Update sanction', 'admin', 'CARLOS BABARAN', '0000-00-00', '10:07:07'),
(50, 'Update sanction', 'faculty', 'CARLOS BABARAN', '0000-00-00', '10:42:29'),
(51, 'Update sanction', 'faculty', 'CARLOS BABARAN', '0000-00-00', '10:42:36'),
(52, 'Update sanction', 'officer', 'KRIZEL ABAD', '0000-00-00', '10:44:14'),
(53, 'Update sanction', 'officer', 'KRIZEL ABAD', '0000-00-00', '10:47:18'),
(54, 'Update sanction', 'officer', 'KRIZEL ABAD', '0000-00-00', '10:47:23'),
(55, 'Update sanction', 'officer', 'KRIZEL ABAD', '0000-00-00', '10:47:57'),
(56, 'Update sanction', 'officer', 'KRIZEL ABAD', '0000-00-00', '10:48:04'),
(57, 'Update sanction', 'officer', 'KRIZEL ABAD', '0000-00-00', '10:48:29'),
(58, 'Update sanction', 'dean', 'JEININ LEI ARELLANO', '0000-00-00', '11:21:00'),
(59, 'Insert Violation ', 'faculty', 'CARLOS BABARAN', '0000-00-00', '01:00:10'),
(60, 'Insert Violation 4', 'faculty', 'CARLOS BABARAN', '0000-00-00', '01:01:24'),
(61, 'Insert Violation 4', 'faculty', 'CARLOS BABARAN', '0000-00-00', '01:02:13'),
(62, 'Insert Violation 4', 'faculty', 'CARLOS BABARAN', '0000-00-00', '01:03:21'),
(63, 'Update sanction', 'faculty', 'CARLOS BABARAN', '0000-00-00', '04:49:51'),
(64, 'Update sanction', 'faculty', 'CARLOS BABARAN', '0000-00-00', '04:49:57'),
(65, 'Update sanction', 'faculty', 'CARLOS BABARAN', '0000-00-00', '04:53:35'),
(66, 'Update sanction', 'faculty', 'CARLOS BABARAN', '0000-00-00', '04:54:06'),
(67, 'Update sanction', 'faculty', 'CARLOS BABARAN', '0000-00-00', '04:54:21'),
(68, 'Update sanction', 'faculty', 'CARLOS BABARAN', '0000-00-00', '04:54:50'),
(69, 'Update sanction', 'faculty', 'CARLOS BABARAN', '0000-00-00', '04:55:06'),
(70, 'Insert event TCON 4', 'faculty', 'CARLOS BABARAN', '0000-00-00', '10:31:58'),
(71, 'Insert event GOVERNORS HEALTH SEMINAR', 'faculty', 'CARLOS BABARAN', '0000-00-00', '10:32:59'),
(72, 'Insert Remarks 4', 'faculty', 'CARLOS BABARAN', '0000-00-00', '10:33:55'),
(73, 'Insert Remarks 4', 'faculty', 'CARLOS BABARAN', '0000-00-00', '10:35:45'),
(74, 'Insert Violation 4', 'officer', 'KRIZEL ABAD', '0000-00-00', '11:26:40'),
(75, 'Insert Violation 4', 'officer', 'KRIZEL ABAD', '0000-00-00', '11:29:06'),
(76, 'Insert Violation 4', 'officer', 'KRIZEL ABAD', '0000-00-00', '11:33:46'),
(77, 'Insert Violation 4', 'officer', 'KRIZEL ABAD', '0000-00-00', '11:35:03'),
(78, 'Insert Violation 4', 'officer', 'KRIZEL ABAD', '0000-00-00', '11:35:44'),
(79, 'Update student 124545', 'faculty', 'CARLOS BABARAN', '0000-00-00', '03:49:43'),
(80, 'Update student 2018-333', 'faculty', 'CARLOS BABARAN', '0000-00-00', '03:50:19'),
(81, 'Insert Remarks 117', 'faculty', 'CARLOS BABARAN', '0000-00-00', '09:04:13'),
(82, 'Update student 2016-00048', 'faculty', 'CARLOS BABARAN', '0000-00-00', '09:07:45'),
(83, 'Insert Remarks 117', 'faculty', 'CARLOS BABARAN', '0000-00-00', '10:01:09'),
(84, 'Insert Remarks 51', 'faculty', 'CARLOS BABARAN', '0000-00-00', '10:01:35'),
(85, 'Update student 2016-00048', 'dean', 'JEININ LEI ARELLANO', '0000-00-00', '10:34:52'),
(86, 'Insert Remarks 117', 'dean', 'JEININ LEI ARELLANO', '0000-00-00', '10:55:28'),
(87, 'Insert Remarks 117', 'dean', 'JEININ LEI ARELLANO', '0000-00-00', '10:56:33'),
(88, 'Insert Remarks 52', 'dean', 'JEININ LEI ARELLANO', '0000-00-00', '11:00:03'),
(89, 'Insert Remarks 52', 'dean', 'JEININ LEI ARELLANO', '0000-00-00', '11:04:42'),
(90, 'Insert Remarks 52', 'dean', 'JEININ LEI ARELLANO', '0000-00-00', '11:06:50'),
(91, 'Insert Remarks 52', 'dean', 'JEININ LEI ARELLANO', '0000-00-00', '11:07:49'),
(92, 'Insert Remarks 117', 'dean', 'JEININ LEI ARELLANO', '0000-00-00', '11:23:11'),
(93, 'Insert Remarks 117', 'dean', 'JEININ LEI ARELLANO', '0000-00-00', '11:25:00'),
(94, 'Insert Remarks 117', 'faculty', 'CARLOS BABARAN', '0000-00-00', '12:24:11'),
(95, 'Insert Remarks 117', 'faculty', 'CARLOS BABARAN', '0000-00-00', '12:25:11'),
(96, 'Insert Remarks 51', 'faculty', 'CARLOS BABARAN', '0000-00-00', '12:35:27'),
(97, 'Insert Remarks 51', 'faculty', 'CARLOS BABARAN', '0000-00-00', '12:35:39'),
(98, 'Insert Remarks 1', 'faculty', 'CARLOS BABARAN', '0000-00-00', '12:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requirements`
--

CREATE TABLE `tbl_requirements` (
  `id` int(11) NOT NULL,
  `requirements` varchar(100) NOT NULL,
  `due_date` varchar(50) NOT NULL,
  `student_id` varchar(50) NOT NULL,
  `status` char(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_requirements`
--

INSERT INTO `tbl_requirements` (`id`, `requirements`, `due_date`, `student_id`, `status`, `timestamp`) VALUES
(1, 'Annual Reports, Evaluation', '2018-12-09', '117', 'N', '2018-12-08 04:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanction`
--

CREATE TABLE `tbl_sanction` (
  `sanction_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `archive` char(1) NOT NULL DEFAULT '0',
  `for_officer` char(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sanction`
--

INSERT INTO `tbl_sanction` (`sanction_id`, `item_name`, `quantity`, `archive`, `for_officer`, `timestamp`, `salt`) VALUES
(1, 'PENCIL', 2, '0', 'N', '2018-11-25 16:34:39', 'AsdsaAdsadas31321ASDas012321312Aqwedhdfhsc51212'),
(2, 'FLASH DRIVE', 1, '0', 'N', '2018-11-25 16:57:45', 'ec1bb5145915e78c06663831d8db201441fd8555'),
(3, 'MANILA PAPER', 5, '0', 'N', '2018-11-25 16:58:54', '40dc35569d62e726174666f3035289390f1fcdb9'),
(4, 'CARTOLINA', 5, '0', 'N', '2018-11-27 13:31:15', 'bf00e670fca9556ed8c77d2364e365ece2048142'),
(5, 'PAPER CUTTER', 1, '0', 'Y', '2018-12-03 05:02:24', '8a7355fb000f50a73eb7cf197a1da915ce58fc70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanctionlink`
--

CREATE TABLE `tbl_sanctionlink` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `sanction_id` varchar(50) NOT NULL,
  `sanction_type` varchar(7) NOT NULL,
  `sanction_date` varchar(20) NOT NULL,
  `ampm` varchar(2) NOT NULL,
  `C1` char(1) NOT NULL DEFAULT 'N',
  `C2` char(1) NOT NULL DEFAULT 'N',
  `C3` char(1) NOT NULL DEFAULT 'N',
  `school_year` varchar(10) NOT NULL,
  `sem` varchar(6) NOT NULL,
  `qty` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sanctionlink`
--

INSERT INTO `tbl_sanctionlink` (`id`, `student_id`, `event_id`, `sanction_id`, `sanction_type`, `sanction_date`, `ampm`, `C1`, `C2`, `C3`, `school_year`, `sem`, `qty`, `timestamp`, `salt`) VALUES
(1, 117, 2, '5', 'Absent', '2018-12-10', 'AM', 'N', 'N', 'N', '2018-2019', '1ST', 1, '2018-12-08 04:25:11', '688f70dbddbd282325d7521a82fc2469faa560cd'),
(2, 117, 2, '5', 'Absent', '2018-12-9', 'AM', 'N', 'N', 'N', '2018-2019', '1ST', 1, '2018-12-08 04:28:57', 'ASDQW22Q13ASDSADASDSADAS'),
(3, 51, 1, '1', 'Absent', '2018-12-07', 'AM', 'N', 'N', 'N', '2018-2019', '1ST', 2, '2018-12-08 04:35:27', '810558e5d8f71c6ed0c59b12b5308ea2f23a6fa7'),
(4, 51, 4, '1', 'Absent', '2018-12-13', 'AM', 'N', 'N', 'N', '2018-2019', '1ST', 2, '2018-12-08 04:35:39', 'b99bb541badb0363cbb92c499b48780d0196762b'),
(5, 1, 3, '1', 'Absent', '2018-12-08', 'AM', 'N', 'N', 'N', '2018-2019', '1ST', 2, '2018-12-08 04:38:47', '313193bae418a126566cf5b8bf8c124961ae0f58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_semyear`
--

CREATE TABLE `tbl_semyear` (
  `id` int(11) NOT NULL,
  `school_year` varchar(10) NOT NULL,
  `sem` varchar(6) NOT NULL,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_semyear`
--

INSERT INTO `tbl_semyear` (`id`, `school_year`, `sem`, `salt`) VALUES
(1, '2018-2019', '1ST', 'ASDAasd12312adasEsadasda');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year` varchar(11) NOT NULL,
  `section` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `officer` char(1) NOT NULL,
  `gender` char(1) NOT NULL,
  `archive` char(1) NOT NULL DEFAULT '0',
  `status` varchar(50) NOT NULL,
  `school_year` varchar(50) NOT NULL,
  `sem` varchar(11) NOT NULL,
  `remove_status` char(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `student_id`, `firstname`, `middlename`, `lastname`, `course`, `year`, `section`, `email`, `contact`, `officer`, `gender`, `archive`, `status`, `school_year`, `sem`, `remove_status`, `timestamp`, `salt`) VALUES
(1, '2018-01-0317', 'Johanes Paulus', 'D', 'Abuyuan', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1ST', '', '2018-12-08 03:25:00', 'ASD123'),
(2, '2016-01648', 'Joyan Noel', 'M', 'Aggarao', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1ST', '', '2018-12-08 03:25:00', 'ASD124'),
(3, '2018-01-0001', 'Paul Arwin', 'Suguitan', 'Alda', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1ST', '', '0000-00-00 00:00:00', 'ASD125'),
(4, '2013-00221', 'Gerald Martin', 'V', 'Balabis', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1ST', '', '0000-00-00 00:00:00', 'ASD126'),
(5, '2016-00635', 'Bryan', 'Q', 'Baliuag', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1ST', '', '0000-00-00 00:00:00', 'ASD127'),
(6, '2018-01-1222', 'Dan Angelo', 'Q', 'Baliuag', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1ST', '', '0000-00-00 00:00:00', 'ASD128'),
(7, '2016-01646', 'Kurt Roland', 'M', 'Bayadog', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1ST', '', '0000-00-00 00:00:00', 'ASD129'),
(8, '2018-01-0678', 'Orlando Jr.', 'C', 'Bunagan', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD130'),
(9, '2012-00010', 'Vince Lesther', 'A', 'Calimag', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD131'),
(10, '2018-01-1000', 'Darren Angelo', 'S', 'Callueng', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD132'),
(11, '2018-01-0857', 'Ceazar Christ', 'A', 'Canceran', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD133'),
(12, '2018-01-1016', 'Arman Paul Jr.', 'A', 'Cortes', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD134'),
(13, '2016-01745', 'Kelvin Kharl', 'S', 'Dabo', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD135'),
(14, '2016-01487', 'Keith Angelo', 'D', 'De Leon', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD136'),
(15, '2018-01-1108', 'Florido III', 'A', 'Deray', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD137'),
(16, '2016-01099', 'Kim Randel', 'D', 'Dolozon', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD138'),
(17, '2018-01-0030', 'David ', 'A', 'Domaguina', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD139'),
(18, '2018-01-0074', 'Joshua', 'C', 'Dumbrique', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD140'),
(19, '2012-00001', 'Miguel Francisco', '', 'Gamiao', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD141'),
(20, '2012-02299', 'Elymar', '', 'Gongob', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD142'),
(21, '2016-00771', 'Granduer Majesty', 'T', 'Labang', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD143'),
(22, '2018-01-1265', 'Joh Karl', 'F', 'Labang', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD144'),
(23, '2018-01-1040', 'Jerick Steven', 'J', 'Lara', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD145'),
(24, '2018-01-1018', 'Allen Paul', 'F', 'Liong', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD146'),
(25, '2018-01-0044', 'Michael Angelo', 'B', 'Macarubbo', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '2018-12-08 02:06:00', 'ASD147'),
(26, '2018-01-0975', 'Fritz Allen Rae', 'L', 'Malana', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD148'),
(27, '2018-01-1150', 'Zeus Marou', 'B', 'Marigocio', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD149'),
(28, '2018-01-0006', 'Renz Christian', 'C', 'Mesa', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD150'),
(29, '2016-01050', 'Rodston', 'R', 'Millare', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD151'),
(30, '2004-00037', 'Francis Prim', 'S', 'Pagunuran', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD152'),
(31, '2018-01-1095', 'Lito John', 'F', 'Portos', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD153'),
(32, '2003-00194', 'Jonas Gabriel', 'C', 'Rivera', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD154'),
(33, '2006-10556', 'Alec Jiro', 'C', 'Saludes', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD155'),
(34, '2017-030043', 'Jean Lloyd', 'B', 'Taguba', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD156'),
(35, '2018-01-0037', 'Jowel', 'C', 'Utanes', 'BSIT', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD157'),
(36, '2016-01080', 'Wardita Marie', 'R', 'Agustin', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD158'),
(37, '2016-00681', 'Cassandra Marie', 'C', 'Andal', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD159'),
(38, '2016-01735', 'Jay Vee', 'S', 'Apostol', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD160'),
(39, '2016-01677', 'Maricar', 'B', 'Arzadon', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD161'),
(40, '2018-01-0023', 'Mary Joyce', 'H', 'Baletan', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD162'),
(41, '2018-01-1203', 'Ritchelle Joy', 'D', 'Catabian', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD163'),
(42, '2016-00701', 'Thaniela Cayl', 'S', 'Chan', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD164'),
(43, '2016-00612', 'Marcy Clarete', '', 'Clemente', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD165'),
(44, '2018-01-0052', 'Jessa', 'R', 'Parungao', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD166'),
(45, '2018-01-0010', 'Mary Xylex', 'B', 'Pasion', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD167'),
(46, '2018-01-1232', 'Julie Ann', 'A', 'Ramil', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD168'),
(47, '2018-01-0756', 'Athena Mae', 'B', 'Santiago', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD169'),
(48, '2018-01-1221', 'Naomi', 'S', 'Tanaka', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD170'),
(49, '2018-01-0914', 'Jezarene', 'C', 'Valiente', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD171'),
(50, '2016-00785', 'Alyssa Jane', 'Masirag', 'Villanueva', 'BSIT', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD172'),
(51, '2015-01060', 'Adrinel Shane', 'T', 'Abella', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD173'),
(52, '2015-00135', 'Kurt Kovien', 'B', 'Acoba', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD174'),
(53, '2014-00629', 'Christian Paul', 'T', 'Agpuon', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD175'),
(54, '2014-00756', 'Daniel', '', 'Bangayan', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD176'),
(55, '2014-00436', 'Tomas Jr.', 'M', 'Binag', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD177'),
(56, '2015-00572', 'Wendelle', 'A', 'Buncag', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD178'),
(57, '2012-02-02337', 'Markavin  ', '', 'Cabildo', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD179'),
(58, '2015-00526', 'Vincent Carl', 'S', 'Caddauan', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD180'),
(59, '2015-00675', 'Rheiner', 'C', 'Calizar', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD181'),
(60, '2012-01-01735', 'Christian Jay', '', 'Carag', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD182'),
(61, '2015-00520', 'Isabelo Jr.', 'A', 'Cari?o', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD183'),
(62, '2014-00933', 'Arnel', 'D', 'Casay', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD184'),
(63, '2017-0100270', 'Adrian Louis', 'E', 'Casibang', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD185'),
(64, '2015-01013', 'Karl Patrick', 'C', 'Cellona', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD186'),
(65, '2015-00127', 'Joel John', 'De Guzman', 'Centeno', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD187'),
(66, '2015-01073', 'Russel Kim Alexis', 'Despabelade', 'Cristobal', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD188'),
(67, '2017-030015', 'Christian Marie', 'L', 'Danao', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD189'),
(68, '2017-0100276', 'Leorex Keith', 'W', 'Danao', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD190'),
(69, '2015-00638', 'Seth Joshua', 'M', 'Dannang', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD191'),
(70, '2015-00603', 'Vincent Cenen', 'Dionisio', 'Dayag', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD192'),
(71, '2015-00956', 'John Paul', 'Patricio', 'Dulin', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD193'),
(72, '2016-2-00089', 'Diego Gracias', 'Acera', 'Dumaua', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD194'),
(73, '2015-00607', 'King Shalomrabi', 'Mabborang', 'Feliciano', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD195'),
(74, '2015-00699', 'Aris June', 'Pamittan', 'Fernandez', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD196'),
(75, '2015-00706', 'Mark Darylle', 'Apostol', 'Formose', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD197'),
(76, '2015-00347', 'Brian', 'Agustin', 'Foronda', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD198'),
(77, '2015-01239', 'Jaylord', 'Turingan', 'Frace', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD199'),
(78, '2016-00120', 'Christian', 'Maggay', 'Francinilla', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD200'),
(79, '2011-02-01230', 'Raymond', 'Zu?iga', 'Gamiao', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD201'),
(80, '2015-00051', 'Zahn Xandre', 'Acorda', 'Gavino', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD202'),
(81, '2016-2-00085', 'Joemel', 'Umblas', 'Gersaniba', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD203'),
(82, '2014-00392', ' Joshua James', 'Talattad', 'Ginez', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD204'),
(83, '2015-01020', 'Brylle Geno', 'Sanchez', 'Gumabay', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD205'),
(84, '2015-00785', 'Eljone', 'Yoma', 'Hermano', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD206'),
(85, '2017-0100277', 'Juan Miguel Rafael', 'P', 'Iba?ez', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD207'),
(86, '2015-00713', 'Prince Gio', 'Pagaduan', 'Lacsamana', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD208'),
(87, '2017-03-0018', 'Mark Bryan', 'Calayan', 'Lagundi', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD209'),
(88, '2016-2-00084', 'Joseph Carlo', 'M', 'Liban', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD210'),
(89, '2015-00843', 'John Kenneth', 'Cannu', 'Mabazza', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD211'),
(90, '2015-00269', 'Daniel', 'Agustin', 'Mabborang', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD212'),
(91, '2015-00710', 'Reuel Jascha', 'Guibani', 'Mabborang', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD213'),
(92, '2015-00608', 'Kevin Enryll', 'Miguel', 'Maggay', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD214'),
(93, '2012-02-02285', 'John Rovan', 'Abedes', 'Mallillin', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD215'),
(94, '2015-00024', 'Mario Emmanuel', 'Morales', 'Mallillin', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD216'),
(95, '2016-2-00092', 'Jasper', 'Malenab', 'Melad', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD217'),
(96, '2017-030015', 'Ervin Roi', 'C', 'Mesina', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD218'),
(97, '2017-0100312', 'Jefferson', 'P', 'Oledan', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD219'),
(98, '2015-00962', 'Mark Anthony', 'Pimentel', 'Orence', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD220'),
(99, '2015-00674', 'John Bernard', 'Pastera', 'Orpilla', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD221'),
(100, '2015-00200', 'Jules Lemuel', 'Tabaldo', 'Pastoral', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD222'),
(101, '2015-00414', 'Dlanorson', 'Teja', 'Patay', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD223'),
(102, '2015-00678', 'Keith Russel', 'Delmendo', 'Que', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD224'),
(103, '2016-00035', 'Jan Giled', 'Barnedo', 'Reyes', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD225'),
(104, '2014-00757', 'Evanz', 'Espita', 'Saguibo', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD226'),
(105, '2013-01-03360', 'Constante Jr.', 'Recolizado', 'Sapla', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD227'),
(106, '2014-00554', 'John Paul ', 'Melad', 'Silvestre', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD228'),
(107, '2015-00107', 'Jayvee', 'Cabaddu', 'Siuagan', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD229'),
(108, '2014-00857', 'Homer Charles', 'Acebedo', 'Tillenuis', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD230'),
(109, '2013-01-03123', 'John Rico ', 'Corral', 'Toribio', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD231'),
(110, '2015-00948', 'Mark Angelo', 'Mactal', 'Torres', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD232'),
(111, '2015-00120', 'Ralph Gabriel', 'Ballad', 'Tuapin', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD233'),
(112, '2015-00625', 'Asher Winfrey', 'Agustin', 'Udarbe', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD234'),
(113, '2015-00321', 'Ralph Lauren-j', 'Arcines', 'Viernes', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD235'),
(114, '2015-00248', 'Allan Jay', 'Masirag', 'Villanueva', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD236'),
(115, '2015-00541', 'Marc Angelo', 'Sablay', 'Yadao', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD237'),
(116, '2016-00031', 'Marulan', '', 'Yuga', 'BSIT', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD238'),
(117, '2016-00048', 'Criselda', 'Sumaoang', 'Abad', 'BSIT', '4', '', '', '', 'Y', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD239'),
(118, '2015-00874', 'Ann Marie Kristine', 'Guerrero', 'Addatu', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD240'),
(119, '2015-00324', 'Reina', 'Soller', 'Altura', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD241'),
(120, '2015-00057', 'Kristel Joy', 'Lucas', 'Apelado', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD242'),
(121, '2016-00039', 'Jeinin Lei', 'Lustica', 'Arellano', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD243'),
(122, '2015-00292', 'Odhessa Ross', 'Batan', 'Barba', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD244'),
(123, '2015-01279', 'Shaina Mae', 'Sabado', 'Beligan', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD245'),
(124, '2015-00307', 'Junross Gaile', 'Dela Cruz', 'Binarao', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD246'),
(125, '2017-0100273', 'Ma. Angelica', 'G', 'Callangan', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD247'),
(126, '2015-01085', 'Regina Joyce', 'Llobrera', 'Canlas', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD248'),
(127, '2015-00297', 'Kharen Dayle', 'Lim', 'Cuevas', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD249'),
(128, '2015-00029', 'Heidie', 'Aggabao', 'Dela Cruz', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD250'),
(129, '2015-00336', 'Rolayne', 'Montelibano', 'Dela Paz', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD251'),
(130, '2015-00131', 'Reni Shane', 'Pancho', 'Denna', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD252'),
(131, '2015-00458', 'Jezrille Kylie', 'Bisquera', 'Espartero', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD253'),
(132, '2015-00210', 'Diana', 'Magaddatu', 'Galang', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD254'),
(133, '2015-00344', 'Ellaine ', 'Yoma', 'Hermano', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD255'),
(134, '2015-00305', 'Jyzel', 'Conciso', 'Hernandez', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD256'),
(135, '2016-2-00090', 'Noami', 'Macababbad', 'Marciano', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD257'),
(136, '2016-00062', 'Sandy Anne', 'Battad', 'Mecate', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD258'),
(137, '2015-00279', 'Chrysiele', 'Lizardo', 'Pal', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD259'),
(138, '2017-0100295', 'Jhanika Mhae', 'Ona', 'Pe?a', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD260'),
(139, '03-02676', 'Marie Monique', 'Lingan', 'Sabban', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD261'),
(140, '2015-00719', 'Johana Mae', 'Arizo', 'Tangan', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD262'),
(141, '2015-00108', 'Clarence Joy', 'Rojero', 'Torrado', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD263'),
(142, '2016-000075', 'Kate Charmaine ', 'Bangayan', 'Viraguas', 'BSIT', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD264'),
(143, '2015-00017', 'Mariel', 'Capalungan', 'Addatu', 'BLIS', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD265'),
(144, '2015-00204', 'Ma. Trinidad', 'Suyu', 'Baccay', 'BLIS', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD266'),
(145, '2015-00753', 'Jiberly', 'Basilio', 'Corpuz', 'BLIS', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD267'),
(146, '2016-00114', 'Jale', 'Saquing', 'Valdez', 'BLIS', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD268'),
(147, '2016-00055', 'Ena Alodia', 'Amistad', 'Yanga', 'BLIS', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD269'),
(148, '2018-01-0111', 'Christian Darell', 'D', 'Bandayrel', 'BSCOE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD270'),
(149, '2016-00687', 'John Carlo', 'G', 'Binarao', 'BSCOE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD271'),
(150, '2018-01-1044', 'Henry Jr.', 'O', 'Caligan', 'BSCOE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD272'),
(151, '2018-01-1268', 'Ryan Eleazar', 'G', 'Calngao', 'BSCOE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD273'),
(152, '2018-01-0744', 'Paul Jacob', 'D', 'Capitle', 'BSCOE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD274'),
(153, '2018-01-0745', 'Ronald', 'C', 'Llanera', 'BSCOE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD275'),
(154, '2016-00901', 'Mark Jester', 'A', 'Nicolas', 'BSCOE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD276'),
(155, '2015-01592', 'Adrian Emil', 'Sinchioco', 'Taganas', 'BSCOE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD277'),
(156, '2016-01056', 'Sarah Lei', 'C', 'Piagan', 'BSCOE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD278'),
(157, '2018-01-1107', 'Micahella', 'L', 'Tamondon', 'BSCOE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD279'),
(158, '2015-00569', 'Timothy John', 'Genobili', 'Alindayu', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD280'),
(159, '2018-01-1238', 'Philipe Anthony', 'C', 'Battung', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD281'),
(160, '2017-030028', 'John Elrom', 'V', 'Baylon', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD282'),
(161, '2013-01-03104', 'John Dale', 'Guingab', 'Bulusan', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD283'),
(162, '2018-01-1239', 'Romel', 'G', 'Bunagan', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD284'),
(163, '2017-030013', 'Eugene Anthony', 'T', 'Columna', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD285'),
(164, '2017-0100274', 'James', 'C', 'Dulin', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD286'),
(165, '2013-01-02639', 'James Jr.', 'Consuelo', 'Gonzales', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD287'),
(166, '2015-00862', 'Anthony', 'Datul', 'Hernandez', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD288'),
(167, '2018-01-1235', 'Roger Jr.', 'T', 'Leal', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD289'),
(168, '2012-01-02090', 'Mark Anthony ', 'Buraga', 'Macarubbo', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD290'),
(169, '2017-030016', 'John Alex', 'M', 'Miranda', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD291'),
(170, '2018-01-1237', 'Caimon Keith', 'C', 'Nool', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD292'),
(171, '2017-0100293', 'Karl Aldrin', 'Bisquera', 'Paredes', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD293'),
(172, '2017-030011', 'Kaymar', 'C', 'Ramachandran', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD294'),
(173, '2015-00009', 'Joseph Anthony', 'Malana', 'Tabbu', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD295'),
(174, '2015-01251', 'Evan', '', 'Talosig', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD296'),
(175, '2013-01-03271', 'Mark Ashley', 'Cagurangan', 'Tumanguil', 'BSCOE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD297'),
(176, '2016-00033', 'Pauli Angeli', 'Tulauan', 'Aguilar', 'BSCOE', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD298'),
(177, '2017-03-0001', 'Fatima Yvonne', 'L', 'Allam', 'BSCOE', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD299'),
(178, '2017-0100279', 'Maria Clarissa', 'L', 'Aquino', 'BSCOE', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD300'),
(179, '2015-00380', 'Kimberly', 'Sumer', 'Quejado', 'BSCOE', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD301'),
(180, '2015-00813', 'Patricia', 'Ejiroghene', 'Temile', 'BSCOE', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD302'),
(181, '2016-01165', 'Christine', 'P', 'Bancud', 'BSENSE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD303'),
(182, '2016-01877', 'Jenalyn', 'Acera', 'Corpuz', 'BSENSE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD304'),
(183, '2016-01111', 'Jenmizeth Kaye', 'C', 'Ludovice', 'BSENSE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD305'),
(184, '2015-00501', 'Bryan', 'Hosmillo', 'Angoluan', 'BSENSE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD306'),
(185, '2015-00360', 'Aaron Henrich', 'Barrias', 'Bambalan', 'BSENSE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD307'),
(186, '2015-01257', 'Enrico', 'Ortega', 'Bernardino', 'BSENSE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD308'),
(187, '2015-00205', 'Winfreynel', 'Elizaga', 'Dadia', 'BSENSE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD309'),
(188, '2015-00665', 'Patrick Leo', 'Ruiz', 'Dela Cruz', 'BSENSE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD310'),
(189, '2015-00475', 'Jake', 'Pascua', 'Encarnacion', 'BSENSE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD311'),
(190, '2015-01277', 'Marty Niko', 'Manaligod', 'Liban', 'BSENSE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD312'),
(191, '2016-000002', 'Edward John', 'Pacis', 'Marallag', 'BSENSE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD313'),
(192, '2015-00590', 'Joshua', 'Calamasa', 'Navarro', 'BSENSE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD314'),
(193, '2013-01-02694', 'Kent Jude', 'Uman', 'Pascual', 'BSENSE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD315'),
(194, '2015-00504', 'Juben', '', 'Salvador', 'BSENSE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD316'),
(195, '2015-01256', 'Marc Dylan', '', 'Vargas', 'BSENSE', '4', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD317'),
(196, '2013-02-03570', 'Jayanne', 'Favila', 'Apostol', 'BSENSE', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD318'),
(197, '2017-03-0009', 'Coleen Joy ', 'Ganipan', 'Cammayo', 'BSENSE', '4', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD319'),
(198, '2018-01-1210', 'Angelica', 'Calipdan', 'Baquiran', 'BSGE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD320'),
(199, '2018-01-0640', 'Steven Kent', 'A', 'Alonzo', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD321'),
(200, '2018-01-0084', 'Anford', 'A', 'Aquino', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD322'),
(201, '2012-00232', 'Carl Steven', 'R', 'Aragon', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD323'),
(202, '2012-00230', 'William Harvey', 'Unida', 'Ariniego', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD324'),
(203, '2018-01-0971', 'Jaybie', 'P', 'Barit', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD325'),
(204, '2018-01-1165', 'Charlie', 'B', 'Bugnay', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD326'),
(205, '2018-01-0709', 'Clifford', 'M', 'Clemencia', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD327'),
(206, '2018-01-1169', 'Jared Kyle', 'D', 'Daguitan', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD328'),
(207, '2018-01-1138', 'Kenny Mark', 'B', 'Dongan', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD329'),
(208, '2018-01-0858', 'Irvin Kent', 'G', 'Echalar', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD330'),
(209, '2018-01-0894', 'Paul Christian', 'R', 'Fabro', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD331'),
(210, '2018-01-0742', 'Danielle Angelo', 'A', 'Fieror', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD332'),
(211, '2018-01-0990', 'Charles Harold', 'R', 'Galiza', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD333'),
(212, '2018-01-0076', 'Paul Clifford', 'L', 'Garcia', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD334'),
(213, '2018-01-1013', 'Makk Mogim', 'J', 'Imperio', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD335'),
(214, '2016-01289', 'Gio', 'U', 'Malapira', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD336'),
(215, '2018-01-1039', 'Ariel Jude', 'M', 'Mangrubang', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD337'),
(216, '2018-01-0086', 'Winchel', 'C', 'Mendoza', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD338'),
(217, '2016-01914', 'Eliezer', 'Dela Pena', 'Orge', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD339'),
(218, '2018-01-0905', 'Peter Angelo', 'R', 'Padilla', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD340'),
(219, '2016-01443', 'Mark Howard', 'E', 'Parallag', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD341'),
(220, '2018-01-0079', 'Keith Dylan', 'G', 'Pasion', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD342'),
(221, '2018-01-0305', 'Joefferson', 'D', 'Salcedo', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD343'),
(222, '2018-01-1067', 'Jason Lloyd', 'P', 'Salmo', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD344'),
(223, '2018-01-1258', 'Jastine Vomett Harold', 'W', 'Tabanganay', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD345'),
(224, '2018-01-1020', 'Vincent', 'V', 'Viernes', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD346'),
(225, '2018-01-1228', 'Raymart', 'E', 'Villanueva', 'BSCE', '1', '', '', '', 'N', 'M', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD347'),
(226, '2018-01-0927', 'Anna Cristina', 'D', 'Alvarez', 'BSCE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD348'),
(227, '2016-01733', 'Lyka', 'Agregado', 'Aron', 'BSCE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD349'),
(228, '2016-00994', 'Jeanne David', 'F', 'Ba?ares', 'BSCE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD350'),
(229, '2018-01-0075', 'Relyn Mae', 'D', 'Bayani', 'BSCE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD351'),
(230, '2016--1888', 'Leah Sheilamae', 'B', 'Cusipag', 'BSCE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD352'),
(231, '2018-01-0087', 'Cherry Faye', 'R', 'Lamusao', 'BSCE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD353'),
(232, '2014-00680', 'Aravel', 'Reyes', 'Lutoc', 'BSCE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD354'),
(233, '2012-00014', 'Lorraine', 'M', 'Talattad', 'BSCE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD355'),
(234, '2018-01-1010', 'Karren Mae', 'G', 'Umbay', 'BSCE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '0000-00-00 00:00:00', 'ASD356'),
(235, '2018-01-0945', 'Pamela Jezreel', 'T', 'Villanueva', 'BSCE', '1', '', '', '', 'N', 'F', '0', 'R', '2018-2019', '1st', '', '2018-12-08 03:25:00', 'ASD357');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_violation`
--

CREATE TABLE `tbl_violation` (
  `id` int(11) NOT NULL,
  `violation` varchar(100) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `date` varchar(11) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `salt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_violation`
--

INSERT INTO `tbl_violation` (`id`, `violation`, `student_id`, `date`, `timestamp`, `salt`) VALUES
(4, 'C', '4', '2018-12-04', '2018-12-04 01:03:21', '64328030405aaf0eec33bf88933d13c7786c1bce'),
(6, 'A', '4', '2018-12-04', '2018-12-06 11:29:06', 'fe6b72bc309e7d053ba46c0975715c754db608d3'),
(8, 'A', '4', '2018-12-05', '2018-12-06 11:35:03', '9de3bf746bae3c5dc937a610ffafe7804d20e008'),
(9, 'A, B, C, D, E, F, G, H, I', '4', '2018-05-03', '2018-12-06 11:35:44', '3cbc7f0ad04fbfd3b44b37b9b31a59be0e19d953');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sanction`
--
ALTER TABLE `tbl_sanction`
  ADD PRIMARY KEY (`sanction_id`);

--
-- Indexes for table `tbl_sanctionlink`
--
ALTER TABLE `tbl_sanctionlink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_semyear`
--
ALTER TABLE `tbl_semyear`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_violation`
--
ALTER TABLE `tbl_violation`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `tbl_requirements`
--
ALTER TABLE `tbl_requirements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sanction`
--
ALTER TABLE `tbl_sanction`
  MODIFY `sanction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sanctionlink`
--
ALTER TABLE `tbl_sanctionlink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_semyear`
--
ALTER TABLE `tbl_semyear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `tbl_violation`
--
ALTER TABLE `tbl_violation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
