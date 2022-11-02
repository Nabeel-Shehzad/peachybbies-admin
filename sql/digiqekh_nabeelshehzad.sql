-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2022 at 12:28 PM
-- Server version: 10.3.36-MariaDB-log-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digiqekh_nabeelshehzad`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `username` int(11) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `total_working_time` varchar(255) NOT NULL,
  `target_working_time` varchar(255) NOT NULL,
  `bathroom_break` varchar(255) NOT NULL,
  `general_break` varchar(255) NOT NULL,
  `meal_break` varchar(255) NOT NULL,
  `shelving_break` varchar(255) NOT NULL,
  `other_break` varchar(255) NOT NULL,
  `target_quota` double NOT NULL,
  `actual_quota` double NOT NULL,
  `sku_packed` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `date`, `username`, `start_time`, `end_time`, `total_working_time`, `target_working_time`, `bathroom_break`, `general_break`, `meal_break`, `shelving_break`, `other_break`, `target_quota`, `actual_quota`, `sku_packed`) VALUES
(1, '2022-10-27', 1, '2022-10-27 09:18:02', '2022-10-27 13:19:18', '04:00:05', 'null', '0', '0', '0', '0', '00:01:13', 0, 406, 0),
(2, '2022-10-27', 1, '2022-10-27 10:00:24', '2022-10-27 13:32:54', '03:11:14', 'null', '00:05:17', '0', '00:14:11', '0', '00:01:50', 0, 195, 0),
(3, '2022-10-27', 1, '2022-10-27 13:35:27', '2022-10-27 14:09:37', '00:34:12', 'null', '0', '0', '0', '0', '0', 0, 196, 0),
(4, '2022-10-27', 1, '2022-10-27 09:47:27', '2022-10-27 15:24:55', '05:25:36', 'null', '0', '0', '00:09:47', '0', '00:02:07', 0, 194, 0),
(5, '2022-10-27', 1, '2022-10-27 11:40:47', '2022-10-27 15:34:58', '03:49:45', 'null', '00:00:33', '0', '00:02:19', '00:01:36', '0', 0, 800, 0),
(6, '2022-10-27', 1, '2022-10-27 09:07:08', '2022-10-27 15:42:59', '06:30:04', 'null', '00:03:22', '0', '00:01:13', '0', '00:01:14', 0, 424, 0),
(7, '2022-10-27', 1, '2022-10-27 15:27:54', '2022-10-27 16:16:56', '00:35:18', 'null', '0', '0', '0', '00:13:45', '0', 0, 197, 0),
(8, '2022-10-27', 1, '2022-10-27 12:41:59', '2022-10-27 17:10:06', '04:25:08', 'null', '00:01:39', '0', '0', '0', '00:01:21', 0, 346, 0),
(9, '2022-10-27', 1, '2022-10-27 16:35:40', '2022-10-27 17:13:23', '00:37:45', 'null', '0', '0', '0', '0', '0', 0, 59, 0),
(10, '2022-10-27', 1, '2022-10-27 16:01:28', '2022-10-27 17:13:51', '01:12:25', 'null', '0', '0', '0', '0', '0', 0, 126, 0),
(11, '2022-10-27', 1, '2022-10-27 10:44:35', '2022-10-27 17:19:35', '05:49', 'null', '00:07:16', '0', '00:30:25', '0', '00:08:20', 0, 299, 0),
(12, '2022-10-27', 1, '2022-10-27 13:17:30', '2022-10-27 17:19:51', '04:01:08', 'null', '0', '0', '0', '0', '00:01:14', 0, 210, 0),
(13, '2022-10-27', 1, '2022-10-27 17:15:14', '2022-10-27 17:28:41', '00:13:29', 'null', '0', '0', '0', '0', '0', 0, 126, 0),
(14, '2022-10-27', 1, '2022-10-27 17:35:50', '2022-10-27 20:58:54', '02:47:27', 'null', '0', '00:31:37', '0', '0', '00:04:01', 0, 259, 0),
(15, '2022-10-28', 1, '2022-10-27 12:00:10', '2022-10-28 09:05:42', '18:48:15', 'null', '0', '0', '00:09:34', '0', '02:07:45', 0, 0, 0),
(16, '2022-10-28', 1, '2022-10-28 08:57:04', '2022-10-28 10:12:25', '01:15:22', 'null', '0', '0', '0', '0', '0', 0, 123, 0),
(17, '2022-10-28', 1, '2022-10-28 10:13:52', '2022-10-28 10:27:50', '00:14', 'null', '0', '0', '0', '0', '0', 0, 123, 0),
(18, '2022-10-28', 1, '2022-10-28 11:32:23', '2022-10-28 11:49:32', '00:12:41', 'null', '0:4:29', '0', '0', '0', '0', 0, 25, 1),
(19, '2022-10-28', 1, '2022-10-28 09:05:02', '2022-10-28 11:48:41', '02:41:19', 'null', '0', '0', '0', '00:01:11', '00:01:11', 0, 138, 0),
(20, '2022-10-28', 1, '2022-10-27 15:54:38', '2022-10-28 13:15:13', '20:51:28', 'null', '0', '0', '0', '0', '00:29:09', 0, 424, 0),
(21, '2022-10-28', 1, '2022-10-28 10:57:02', '2022-10-28 13:40:16', '02:41:02', 'null', '0', '0', '00:02:14', '0', '0', 0, 126, 0),
(22, '2022-10-28', 1, '2022-10-28 09:06:06', '2022-10-28 14:22:39', '05:11:58', 'null', '00:01:15', '0', '00:02:14', '0', '00:01:08', 0, 188, 0),
(23, '2022-10-28', 1, '2022-10-28 09:06:28', '2022-10-28 14:52:38', '05:42:18', 'null', '00:01:20', '0', '00:02:34', '0', '0', 0, 372, 0),
(24, '2022-10-28', 1, '2022-10-28 13:07:58', '2022-10-28 15:04:24', '01:52:33', 'null', '0', '0', '0', '00:01:39', '00:02:16', 0, 97, 0),
(25, '2022-10-28', 1, '2022-10-28 14:30:35', '2022-10-28 15:43:42', '01:11:48', 'null', '00:01:21', '0', '0', '0', '0', 0, 450, 0),
(26, '2022-10-28', 1, '2022-10-28 11:55:20', '2022-10-28 16:45:55', '04:31:53', 'null', '0', '0', '0', '0:18:43', '0', 0, 50, 1),
(27, '2022-10-28', 1, '2022-10-28 09:27:11', '2022-10-28 15:48:35', '06:14:39', 'null', '00:01:18', '0', '00:02:49', '00:02:40', '0', 0, 327, 0),
(28, '2022-10-28', 1, '2022-10-28 13:16:59', '2022-10-28 15:49:08', '02:32:11', 'null', '0', '0', '0', '0', '0', 0, 253, 0),
(29, '2022-10-28', 1, '2022-10-28 13:48:40', '2022-10-28 16:01:57', '02:04:51', 'null', '00:08:28', '0', '0', '0', '0', 0, 182, 0),
(30, '2022-10-28', 1, '2022-10-28 14:53:17', '2022-10-28 16:16:41', '01:21:57', 'null', '0', '0', '0', '00:01:28', '0', 0, 372, 0),
(31, '2022-10-28', 1, '2022-10-28 15:57:45', '2022-10-28 16:33:47', '00:36:04', 'null', '0', '0', '0', '0', '0', 0, 253, 0),
(32, '2022-10-28', 1, '2022-10-28 16:09:25', '2022-10-28 16:40:39', '00:31:16', 'null', '0', '0', '0', '0', '0', 0, 308, 0),
(33, '2022-10-28', 1, '2022-10-28 15:09:51', '2022-10-28 17:12:07', '02:02:17', 'null', '0', '0', '0', '0', '0', 0, 150, 0),
(34, '2022-10-28', 1, '2022-10-28 09:07:22', '2022-10-28 17:14:33', '08:03:32', 'null', '00:01:40', '0', '00:02:00', '0', '0', 0, 245, 0),
(35, '2022-10-31', 1, '2022-10-31 08:57:26', '2022-10-31 15:33:20', '06:02:37', 'null', '0', '0', '00:33:18', '0', '0', 0, 250, 0),
(36, '2022-10-31', 1, '2022-10-31 09:14:16', '2022-10-31 15:37:39', '06:18:27', 'null', '00:01:12', '0', '00:02:25', '0', '00:01:21', 0, 2100, 0),
(37, '2022-10-31', 1, '2022-10-31 09:21:40', '2022-10-31 15:42:05', '06:17', 'null', '00:01:14', '0', '00:02:13', '0', '0', 0, 354, 0),
(38, '2022-10-31', 1, '2022-10-31 15:57:19', '2022-10-31 16:24:34', '00:00:34', 'null', '0', '0:26:43', '0', '0', '0', 0, 10, 4),
(39, '2022-10-31', 1, '2022-10-31 15:43:51', '2022-10-31 17:21:23', '01:27:33', 'null', '0:10:1', '0', '0', '0', '0', 0, 113, 1),
(40, '2022-10-31', 1, '2022-10-31 15:38:36', '2022-10-31 17:29:45', '01:46:41', 'null', '0', '0', '0', '0', '0:4:29', 0, 2, 3),
(41, '2022-10-31', 2, '2022-10-31 16:04:50', '2022-10-31 19:30:31', '03:17:03', 'null', '0:4:27', '0:4:13', '0', '0', '0', 0, 208, 8),
(42, '2022-10-31', 1, '2022-10-31 15:18:04', '2022-10-31 21:24:19', '05:01:09', 'null', '0:5:42', '0', '0:59:25', '0', '0', 0, 183, 5),
(43, '2022-11-01', 1, '2022-11-01 09:26:38', '2022-11-01 09:26:40', '00:00:03', 'null', '0', '0', '0', '0', '0', 0, 0, 1),
(44, '2022-11-01', 1, '2022-11-01 09:00:21', '2022-11-01 09:32:27', '00:32:08', 'null', '0', '0', '0', '0', '0', 0, 38, 1),
(45, '2022-11-01', 1, '2022-11-01 09:37:18', '2022-11-01 10:42:33', '01:01:56', 'null', '0', '0', '0', '0', '0:3:21', 0, 90, 1),
(46, '2022-11-01', 5, '2022-11-01 10:19:30', '2022-11-01 10:48:21', '00:28:53', 'null', '0', '0', '0', '0', '0', 0, 65, 8),
(47, '2022-11-01', 2, '2022-11-01 11:27:36', '2022-11-01 11:37:48', '00:08:40', 'null', '0', '0:1:33', '0', '0', '0', 0, 123, 4),
(48, '2022-11-01', 1, '2022-11-01 11:38:13', '2022-11-01 11:41:32', '00:03:20', 'null', '0', '0', '0', '0', '0', 0, 12, 4),
(49, '2022-11-01', 2, '2022-11-01 11:42:08', '2022-11-01 12:02:54', '00:20:48', 'null', '0', '0', '0', '0', '0', 0, 22, 3),
(50, '2022-11-01', 1, '2022-11-01 12:03:56', '2022-11-01 12:07:28', '00:03:34', 'null', '0', '0', '0', '0', '0', 0, 22, 5),
(51, '2022-11-01', 2, '2022-11-01 12:30:54', '2022-11-01 12:30:54', '00:00:02', 'null', '0', '0', '0', '0', '0', 0, 0, 8),
(52, '2022-11-01', 3, '2022-11-01 08:58:07', '2022-11-01 13:18:41', '04:20:36', 'null', '0', '0', '0', '0', '0', 0, 3, 3),
(53, '2022-11-01', 6, '2022-11-01 11:13:27', '2022-11-01 13:18:57', '00:46:41', 'null', '0', '0', '1:18:51', '0', '0', 0, 74, 1),
(54, '2022-11-01', 1, '2022-11-01 10:52:39', '2022-11-01 13:52:39', '01:32:42', 'null', '0', '0', '1:0:46', '0:26:33', '0', 0, 0, 3),
(55, '2022-11-01', 3, '2022-11-01 13:19:37', '2022-11-01 14:14:11', '00:50:12', 'null', '0', '0', '0', '0', '0:4:24', 0, 171, 1),
(56, '2022-11-01', 5, '2022-11-01 11:30:20', '2022-11-01 17:03:27', '04:13:57', 'null', '0:12:36', '0:1:8', '1:5:28', '0', '0', 0, 540, 1),
(57, '2022-11-01', 1, '2022-11-01 13:19:38', '2022-11-01 17:04:15', '03:37:23', 'null', '0:4:39', '0', '0', '0', '0:2:36', 0, 306, 1),
(58, '2022-11-01', 1, '2022-11-01 15:57:58', '2022-11-01 17:12:40', '01:09:45', 'null', '0:4:59', '0', '0', '0', '0', 0, 184, 1),
(59, '2022-11-01', 1, '2022-11-01 14:34:46', '2022-11-01 17:13:20', '02:33:49', 'null', '0:4:47', '0', '0', '0', '0', 0, 211, 2),
(60, '2022-11-01', 1, '2022-11-01 16:15:55', '2022-11-01 17:24:51', '01:02:29', 'null', '0:6:29', '0', '0', '0', '0', 0, 243, 6),
(61, '2022-11-01', 1, '2022-11-01 14:04:06', '2022-11-01 17:27:33', '03:23:28', 'null', '0', '0', '0', '0', '0', 0, 238, 8),
(62, '2022-11-01', 1, '2022-11-01 17:07:35', '2022-11-01 17:29:06', '00:21:33', 'null', '0', '0', '0', '0', '0', 0, 120, 3),
(63, '2022-11-01', 1, '2022-11-01 17:31:56', '2022-11-01 17:31:57', '00:00:03', 'null', '0', '0', '0', '0', '0', 0, 0, 3),
(64, '2022-11-01', 1, '2022-11-01 11:05:13', '2022-11-01 19:31:11', '06:47:49', 'null', '0:6:33', '0:23:24', '1:4:22', '0', '0:3:52', 0, 548, 5),
(65, '2022-11-01', 2, '2022-11-01 12:31:17', '2022-11-01 20:13:15', '06:44:56', 'null', '0:7:10', '0', '0:40:51', '0', '0:9:3', 0, 339, 8),
(66, '2022-11-01', 1, '2022-11-01 19:36:30', '2022-11-01 21:15:46', '01:21:57', 'null', '0', '0', '0', '0:17:21', '0', 0, 731, 3),
(67, '2022-11-02', 1, '2022-11-02 09:05:41', '2022-11-02 09:05:42', '00:00:02', 'null', '0', '0', '0', '0', '0', 0, 0, 3),
(68, '2022-11-02', 1, '2022-11-02 09:03:28', '2022-11-02 09:22:16', '00:18:50', 'null', '0', '0', '0', '0', '0', 0, 120, 3),
(69, '2022-11-02', 1, '2022-11-02 09:04:12', '2022-11-02 09:49:09', '00:37:39', 'null', '0:5:26', '0', '0', '0', '0:1:53', 0, 253, 3),
(70, '2022-11-02', 5, '2022-11-02 09:55:47', '2022-11-02 10:01:39', '00:05:54', 'null', '0', '0', '0', '0', '0', 0, 335, 3),
(71, '2022-11-02', 5, '2022-11-02 10:02:15', '2022-11-02 10:03:29', '00:01:15', 'null', '0', '0', '0', '0', '0', 0, 3, 3),
(72, '2022-11-02', 9, '2022-11-02 09:37:49', '2022-11-02 10:24:14', '00:46:26', 'null', '0', '0', '0', '0', '0', 0, 76, 2),
(73, '2022-11-02', 9, '2022-11-02 10:27:17', '2022-11-02 10:35:11', '00:07:55', 'null', '0', '0', '0', '0', '0', 0, 76, 3),
(74, '2022-11-02', 5, '2022-11-02 10:08:05', '2022-11-02 10:36:25', '00:28:21', 'null', '0', '0', '0', '0', '0', 0, 155, 3),
(75, '2022-11-02', 1, '2022-11-02 09:06:02', '2022-11-02 11:20:19', '02:06:19', 'null', '0:7:59', '0', '0', '0', '0', 0, 174, 1);

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `portfolio` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `client` varchar(255) NOT NULL,
  `project_date` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `desc` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `portfolio`, `image`, `category`, `client`, `project_date`, `title`, `desc`) VALUES
(1, 1, 'portfolio-details-1_1.png', 'Desktop', 'Cricket Club', '24-Oct-2020', 'Sports Club', 'This is a web and mobile-based application to be used as a sports matchmaker where you can register your team and can place challenge requests where other teams can accept the request. After the acceptance of challenge by the opponent team, both teams will play the match fee and the admin will organize the match which includes an umpire. After a certain period of time, a tournament will be organized. The umpires can also register themselves in the system. This app also allows viewers to view newsfeed according to their interests.'),
(2, 1, 'portfolio-details-2_1.png', 'Desktop', 'Cricket Club', '24-Oct-2020', 'Sports Club', 'This is a web and mobile-based application to be used as a sports matchmaker where you can register your team and can place challenge requests where other teams can accept the request. After the acceptance of challenge by the opponent team, both teams will play the match fee and the admin will organize the match which includes an umpire. After a certain period of time, a tournament will be organized. The umpires can also register themselves in the system. This app also allows viewers to view newsfeed according to their interests.'),
(3, 1, 'portfolio-details-3_1.png', 'Desktop', 'Cricket Club', '24-Oct-2020', 'Sports Club', 'This is a web and mobile-based application to be used as a sports matchmaker where you can register your team and can place challenge requests where other teams can accept the request. After the acceptance of challenge by the opponent team, both teams will play the match fee and the admin will organize the match which includes an umpire. After a certain period of time, a tournament will be organized. The umpires can also register themselves in the system. This app also allows viewers to view newsfeed according to their interests.'),
(4, 2, 'portfolio-details-1_2.png', 'Desktop', 'Elton Canada', 'Feb-2022', 'Client Management System', 'The application is for clients personal use in his company where he can hande his employees and the details of their employees he can generate pdf file from the applican, theres also dark mode enabled in the application and fullfill all the requirements of the client'),
(5, 2, 'portfolio-details-2_2.png', 'Desktop', 'Elton Canada', 'Feb-2022', 'Client Management System', 'The application is for clients personal use in his company where he can hande his employees and the details of their employees he can generate pdf file from the applican, theres also dark mode enabled in the application and fullfill all the requirements of the client'),
(6, 2, 'portfolio-details-3_2.png', 'Desktop', 'Elton Canada', 'Feb-2022', 'Client Management System', 'The application is for clients personal use in his company where he can hande his employees and the details of their employees he can generate pdf file from the applican, theres also dark mode enabled in the application and fullfill all the requirements of the client'),
(7, 2, 'portfolio-details-4_2.png', 'Desktop', 'Elton Canada', 'Feb-2022', 'Client Management System', 'The application is for clients personal use in his company where he can hande his employees and the details of their employees he can generate pdf file from the applican, theres also dark mode enabled in the application and fullfill all the requirements of the client'),
(8, 2, 'portfolio-details-5_2.png', 'Desktop', 'Elton Canada', 'Feb-2022', 'Client Management System', 'The application is for clients personal use in his company where he can hande his employees and the details of their employees he can generate pdf file from the applican, theres also dark mode enabled in the application and fullfill all the requirements of the client'),
(9, 2, 'portfolio-details-6_2.png', 'Desktop', 'Elton Canada', 'Feb-2022', 'Client Management System', 'The application is for clients personal use in his company where he can hande his employees and the details of their employees he can generate pdf file from the applican, theres also dark mode enabled in the application and fullfill all the requirements of the client'),
(10, 2, 'portfolio-details-7_2.png', 'Desktop', 'Elton Canada', 'Feb-2022', 'Client Management System', 'The application is for clients personal use in his company where he can hande his employees and the details of their employees he can generate pdf file from the applican, theres also dark mode enabled in the application and fullfill all the requirements of the client'),
(11, 3, 'portfolio-details-1_3.png', 'Mobile App', 'Christopher Myers', '14-Aug-2022', 'PeachyBbies', 'develop a tablet-based, internal use only time tracking application for our internal product packing process. \r\nThe goal is to track an employee’s time while packing our products and while pausing for various reasons. \r\n'),
(12, 3, 'portfolio-details-2_3.png', 'Mobile App', 'Christopher Myers', '14-Aug-2022', 'PeachyBbies', 'develop a tablet-based, internal use only time tracking application for our internal product packing process. \r\nThe goal is to track an employee’s time while packing our products and while pausing for various reasons. \r\n'),
(13, 4, 'portfolio-details-1_4.png', 'Web App', 'Christopher Myers', '10-Aug-2022', 'PeachyBbies', 'develop a tablet-based, internal use only time tracking application for our internal product packing process. \r\nThe goal is to track an employee’s time while packing our products and while pausing for various reasons. \r\n'),
(14, 4, 'portfolio-details-2_4.png', 'Web App', 'Christopher Myers', '10-Aug-2022', 'PeachyBbies', 'develop a tablet-based, internal use only time tracking application for our internal product packing process. \r\nThe goal is to track an employee’s time while packing our products and while pausing for various reasons. \r\n');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `first_name`, `last_name`, `status`) VALUES
(1, 'Chris', 'Myers', 0),
(3, 'Amanda', 'Jones', 0),
(4, 'Austin', 'Elmore', 0),
(5, 'Ana', 'Zuniga', 0),
(6, 'Ash', 'Bradford', 0),
(7, 'Asya', 'Arterberry', 0),
(8, 'Christian', 'Hebenstreich', 0),
(9, 'Dustin', 'Oliver', 0),
(10, 'Jumpy', 'Tarket', 0),
(11, 'Erika', 'Roa', 0),
(12, 'Hailey', 'Allen', 0),
(13, 'Iesha', 'Millard', 0),
(14, 'Julie', 'Johnson', 0),
(15, 'Kyle', 'King', 0),
(16, 'Micah', 'Boyd', 0),
(17, 'Prenice', 'Gilstad', 0),
(18, 'Ryan', 'Moss', 0),
(19, 'Sabrina', 'Stafin', 0),
(20, 'Sandra', 'Aguas', 0),
(21, 'Shelby', 'Devitt', 0),
(22, 'Sofia', 'Torres Navarro', 0),
(23, 'Tatiyana', 'Villareal', 0),
(24, 'Chandler', 'Porter', 0),
(25, 'Jose', 'Lopez', 0),
(26, 'Nettie', 'Markus', 0),
(27, 'Quinton', 'Mosley', 0),
(28, 'Amber', 'Bosch', 0),
(29, 'Remy', 'Van Kampen', 0);

-- --------------------------------------------------------

--
-- Table structure for table `slime`
--

CREATE TABLE `slime` (
  `id` int(11) NOT NULL,
  `slime_name` varchar(255) NOT NULL,
  `slime_texture` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slime`
--

INSERT INTO `slime` (`id`, `slime_name`, `slime_texture`, `status`) VALUES
(5, 'Star Bar CLAY Kit', 'Plop', 0),
(6, 'Banana Jellybean', '2 Part Horizontal', 0),
(7, 'Space Mushroom', '2 Part Horizontal', 0),
(8, 'Axolotl Sundea', '2 Part Horizontal', 0),
(9, 'Aphrodites Love Spell Float', 'Icee Cloud', 0),
(10, 'Honeycube Squish Jelly', 'Plop', 0),
(11, 'De-Stress Dough', 'Plop', 0),
(12, 'Cotton Candy Waffle CLAY Kit', 'Plop', 0),
(13, 'Froggy Boba', 'Icee Cloud', 0),
(14, 'Strawberry Skies', '2 Part Horizontal', 0),
(15, 'Zeus Crunch Cake', '2 Part Vertical', 0),
(16, 'Cows in Space', 'Cow', 0),
(17, 'Cotton Candy Clouds', 'Icee Cloud', 0),
(18, 'Strawberry Cow', 'Cow', 0),
(19, 'Pink Lemonda Fizz', '2 Part Twist', 0),
(20, 'Hawaiian Punch', 'Plop', 0),
(21, 'Campfire Smores CLAY Kit', 'Plop', 0),
(22, 'Dreamscape Cloud Frost', '2 Part Twist', 0),
(23, 'Rainbow Road', 'Plop', 0),
(24, 'Blueberry Puff', 'Plop', 0),
(25, 'Dino Exhibit', 'Plop', 0),
(26, 'DragonFruit Candy Crunch', '2 Part Horizontal', 0),
(27, 'Emo Girl Jelly', 'Plop', 0),
(28, 'Lemon Ice Cream', 'Plop', 0),
(29, 'Asteroid Crunch', 'Plop', 0),
(30, 'Fairy Dust Fizz', '2 Part Twist', 0),
(31, 'Witching Hour', 'Plop ', 0),
(32, 'Lavender Sorbet', 'Plop', 0),
(33, 'Kitten Snacks', '2 Part Vertical', 0),
(34, 'Whipped Vanilla Sugar', 'Plop ', 0),
(35, 'Chocolate Chip Cookie Dough', 'Plop', 0),
(36, 'Syrup', 'All Syrup packing', 0),
(37, 'Baggies', 'All baggie actions', 0),
(38, 'Labeling', 'All slime labeling', 0),
(39, 'Lids', 'Labeling Lids', 0),
(40, 'Packets', 'Packet creation', 0),
(41, 'Test', 'Testing only', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `access`) VALUES
(1, 'NabeelShehzad', 'Nabeel@786', 'Nabeel Shehzad', 1),
(2, 'peachybbies', 'peachybbies', 'Peachy', 0),
(3, 'export', 'sms', 'SMS', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slime`
--
ALTER TABLE `slime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `slime`
--
ALTER TABLE `slime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
