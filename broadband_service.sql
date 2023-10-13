-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 06:19 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `broadband service`
--

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE `connection` (
  `connection_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `plan_id` int(30) NOT NULL,
  `approve_status` tinyint(4) NOT NULL,
  `payment_status` tinyint(1) NOT NULL,
  `approve_date` date NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `connection`
--

INSERT INTO `connection` (`connection_id`, `user_id`, `plan_id`, `approve_status`, `payment_status`, `approve_date`, `request_date`) VALUES
(38, 30, 12, 1, 0, '2023-09-27', '2023-09-27'),
(39, 30, 9, 1, 0, '2023-09-27', '2023-09-27'),
(40, 30, 9, 1, 1, '2023-09-27', '2023-09-27'),
(41, 30, 9, 1, 1, '2023-09-28', '2023-09-28'),
(42, 30, 12, 1, 1, '2023-09-28', '2023-09-28'),
(43, 30, 9, 1, 1, '2023-09-28', '2023-09-28'),
(44, 30, 12, 1, 1, '2023-09-28', '2023-09-28'),
(47, 30, 9, 1, 1, '2023-09-28', '2023-09-28'),
(48, 30, 9, 1, 1, '2023-09-28', '2023-09-28'),
(49, 30, 9, 1, 1, '2023-09-28', '2023-09-28'),
(50, 30, 13, 1, 0, '2023-09-28', '2023-09-28'),
(51, 30, 9, 1, 0, '2023-09-28', '2023-09-28'),
(52, 37, 21, 1, 0, '2023-10-04', '2023-10-04'),
(53, 37, 21, 1, 0, '2023-10-04', '2023-10-04'),
(54, 30, 9, 1, 0, '2023-10-04', '2023-10-04'),
(55, 30, 13, 1, 1, '2023-10-04', '2023-10-04'),
(56, 30, 13, 1, 0, '2023-10-04', '2023-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `D_id` int(10) NOT NULL,
  `D_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`D_id`, `D_name`) VALUES
(9, '6 month'),
(11, '1 month'),
(12, '2 week'),
(13, '28 days'),
(15, '3 month'),
(16, '1 year'),
(17, '1 day'),
(18, '15 days'),
(19, '2 year'),
(20, '56 days'),
(21, '84 days'),
(22, '30 days'),
(23, '14 days'),
(24, '70 days'),
(25, '180 days');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `user_id` int(10) NOT NULL,
  `F_date` date NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `rating` varchar(300) NOT NULL,
  `feedback_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`user_id`, `F_date`, `feedback`, `rating`, `feedback_id`) VALUES
(30, '2023-09-19', 'yyyyyyyyyy', 'Average', 2),
(34, '2023-09-29', 'good for using the internet connection ,thank you for providing good internet connection', 'Excellent', 4),
(37, '2023-10-04', 'Thieupathi ', 'Poor', 5),
(30, '2023-10-04', 'ghtrfdfd', 'Excellent', 6);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `usertype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`email`, `password`, `usertype`) VALUES
('admin@gmail.com', 'admin', 'admin'),
('aravindh@gmail.com', 'aravindh@123', 'user'),
('jeeva@gmail.com', 'milan@123', 'user'),
('jenysunish@gmail.com', 'jeny@123', 'user'),
('john@gmail.com', 'john@123', 'user'),
('joyalsunish@gmail.com', 'joyal@123', 'user'),
('pailysaji33@gmail.com', 'pass@1234', 'user'),
('rahul@gmail.com', '345612', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `user_id` int(10) NOT NULL,
  `connection_id` int(11) NOT NULL,
  `bank_name` varchar(100) NOT NULL,
  `card_type` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `payment_id` int(30) NOT NULL,
  `card_number` int(100) NOT NULL,
  `amount` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`user_id`, `connection_id`, `bank_name`, `card_type`, `date`, `payment_id`, `card_number`, `amount`) VALUES
(30, 39, 'State Bank of India (SBI)', 'mastercard', '2023-09-27', 16, 2435, 599),
(30, 40, 'Canara Bank', 'mastercard', '2023-09-27', 17, 234, 599),
(30, 41, 'Union Bank of India', 'visa', '2023-09-28', 18, 451453, 599),
(30, 42, 'IDBI Bank', 'mastercard', '2023-09-28', 19, 2147483647, 999),
(30, 43, 'ICICI Bank', 'amex', '2023-09-28', 20, 5765, 599),
(30, 44, 'Kotak Mahindra Bank', 'mastercard', '2023-09-28', 21, 2147483647, 999),
(30, 47, 'Bank of Baroda', 'visa', '2023-09-28', 22, 516643145, 599),
(30, 48, 'Union Bank of India', 'mastercard', '2023-09-28', 23, 5454455, 599),
(30, 49, 'Union Bank of India', 'visa', '2023-09-28', 24, 44554, 599),
(30, 55, 'Canara Bank', 'mastercard', '2023-10-04', 25, 2147483647, 1599);

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `plan_id` int(10) NOT NULL,
  `plan_name` varchar(30) NOT NULL,
  `D_id` int(10) NOT NULL,
  `amount` double NOT NULL,
  `describtion` varchar(100) NOT NULL,
  `data_type` varchar(100) NOT NULL,
  `data_limit_value` varchar(100) NOT NULL,
  `plan_speed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`plan_id`, `plan_name`, `D_id`, `amount`, `describtion`, `data_type`, `data_limit_value`, `plan_speed`) VALUES
(9, 'kirali shubham', 20, 599, '', 'Limited', '300 GB', '4 mpbs'),
(12, 'virgin media', 15, 999, '', 'Limited', '1000GB', '10 mpbs'),
(13, 'breezeline', 9, 1599, '', 'Unlimited', '--------', '15-20 mpbs'),
(14, 'limited306', 15, 1999, '', 'Limited', '20GB/day', '5Mbps'),
(16, 'limited11', 21, 799, '', 'Limited', '250GB', '4 mpbs'),
(18, 'kirali shubam', 22, 1479, '', 'Limited', '20GB/day', '40Mbps'),
(19, 'limited421', 25, 1299, '', 'Limited', '500GB', '10 mpbs'),
(20, 'limited10', 9, 1799, '', 'Limited', '10GB/day', '4 Mpbs'),
(21, 'limited22', 21, 1449, '', 'Limited', '10GB/day', '4 Mpbs');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE `user_reg` (
  `user_id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ph_no` bigint(10) NOT NULL,
  `place` varchar(30) NOT NULL,
  `aadhar_no` bigint(20) NOT NULL,
  `house_name` varchar(30) NOT NULL,
  `pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`user_id`, `name`, `email`, `password`, `ph_no`, `place`, `aadhar_no`, `house_name`, `pincode`) VALUES
(27, 'rahul', 'rahul@gmail.com', '345612', 9845671239, 'VAIKOM', 456789234567, 'manpatil', 686605),
(28, 'jeny', 'jenysunish@gmail.com', 'jeny@123', 9605090845, 'neerpara', 456734785316, 'illathukalayil', 686605),
(30, 'Joyal sunish ', 'joyalsunish@gmail.com', 'joyal@123', 7510762325, 'neerpara', 457681245628, 'illathukalayil', 686605),
(32, 'milan', 'jeeva@gmail.com', 'milan@123', 9867455678, 'velloor', 345612897648, 'hjhjh', 686605),
(34, 'Aravindh sunilkumar', 'aravindh@gmail.com', 'aravindh@123', 9812546783, 'kurikad', 457681245628, 'thavalkuzhiyil', 678990),
(36, 'john', 'john@gmail.com', 'john@123', 9622885410, 'muvattupuzha', 472387459834, 'madathil', 642318),
(37, 'Paily Saji', 'pailysaji33@gmail.com', 'pass@1234', 8281860108, 'Pothanicad', 123456789123, 'Narukkil', 686671);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `connection`
--
ALTER TABLE `connection`
  ADD PRIMARY KEY (`connection_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`D_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payment_ibfk_1` (`user_id`),
  ADD KEY `payment_ibfk_2` (`connection_id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`plan_id`),
  ADD KEY `plan` (`D_id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `connection`
--
ALTER TABLE `connection`
  MODIFY `connection_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `duration`
--
ALTER TABLE `duration`
  MODIFY `D_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `plan_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `connection`
--
ALTER TABLE `connection`
  ADD CONSTRAINT `plan_id` FOREIGN KEY (`plan_id`) REFERENCES `plan` (`plan_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `user_reg` (`user_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_reg` (`user_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_reg` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`connection_id`) REFERENCES `connection` (`connection_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan` FOREIGN KEY (`D_id`) REFERENCES `duration` (`D_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
