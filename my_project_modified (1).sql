-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2022 at 08:12 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_address` varchar(50) NOT NULL,
  `employees` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`, `company_address`, `employees`) VALUES
(3, 'Google', 'south bopal,Ahmedabad', 100),
(4, 'Apple', 'south bopal,Ahmedabad', 500),
(5, 'Nvidia', 'south bopal,Ahmedabad', 500),
(6, 'Microsoft', 'south bopal,Ahmedabad', 500);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_type` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `company_id` int(50) NOT NULL,
  `salary_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `user_type`, `password`, `company_id`, `salary_id`) VALUES
(1, 'admin', 'admin@gmail.com', 'Admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, 1),
(2, 'Employee1', 'employee@gmail.com', '', '', 3, 2),
(3, 'Kandarp', 'kandarppatel555@gmail.com', '', '', 3, 1),
(4, 'Employee2', 'employee2@gmail.com', '', '', 3, 4),
(5, 'Employee3', 'employee3@gmail.com', '', '', 5, 2),
(6, 'Employee4', 'employee4@gmail.com', '', '', 6, 5),
(7, 'Employee5', 'employee5@gmail.com', '', '', 6, 2),
(8, 'Employee6', 'employee6@gmail.com', '', '', 4, 4),
(9, 'Employee7', 'employee7@gmail.com', '', '', 5, 4),
(10, 'Employee8', 'employee8@gmail.com', '', '', 4, 5),
(11, 'Employee8', 'employee8@gmail.com', '', '', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(50) NOT NULL,
  `salary_amount` int(50) NOT NULL,
  `salary_period` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `salary_amount`, `salary_period`) VALUES
(1, 500, 450),
(2, 800, 350),
(4, 4000, 100),
(5, 5000, 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
