-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2022 at 10:50 AM
-- Server version: 10.3.37-MariaDB-log-cll-lve
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
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(10, 'Jumpy', 'Tarket', 1),
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
(29, 'Remy', 'Van Kampen', 0),
(30, 'Eric', 'Tarket', 0),
(31, 'David', 'Pham', 0),
(32, 'Hiro', 'Ocampo', 0),
(33, 'Jac', 'Oh', 0),
(34, 'Noel', 'Graham', 0),
(35, 'Scarlet', 'McClenny', 0),
(36, 'Fernando', 'Barron', 0),
(37, 'Jacq', 'Oh', 0),
(38, 'Manny', 'Walker', 0),
(39, 'Kandace', 'Davids', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
