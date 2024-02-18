-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2024 at 09:27 AM
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
-- Database: `wdt_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `bank_pay`
--

CREATE TABLE `bank_pay` (
  `name` varchar(50) NOT NULL,
  `number` int(16) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_pay`
--

INSERT INTO `bank_pay` (`name`, `number`, `amount`) VALUES
('dsafaf', 0, 123),
('dsafaf', 0, 123),
('asdfads', 123412341, 12341243),
('adfasdf', 1234, 1234),
('adfasfadsf', 124134124, 123412342),
('dsafaf', 1234321, 1111111),
('adfasfadsf', 1234321, 1234),
('adfa', 13241, 12341),
('aasdf', 123412, 21341322);

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `certificate_id` int(11) NOT NULL,
  `tree_amount` int(100) NOT NULL,
  `achievement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`certificate_id`, `tree_amount`, `achievement`) VALUES
(1, 1, 'Congratulations, you have planted 1 tree! '),
(2, 5, 'Congratulations, you have planted 5 trees!'),
(3, 10, 'Congratulations, you have planted 10 tree!'),
(4, 50, 'Congratulations, you have planted 50 tree!'),
(5, 100, 'Congratulations, you have planted 100 tree!');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(100) NOT NULL,
  `date` date NOT NULL,
  `tree_amount` int(100) NOT NULL,
  `certificate_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `user_id`, `amount`, `date`, `tree_amount`, `certificate_id`) VALUES
(1, 1, 100, '2024-02-15', 100, 5),
(2, 1, 50, '2024-02-08', 50, 4),
(3, 1, 50, '2024-02-08', 50, 4),
(6, 1, 1, '2024-02-17', 1, 1),
(7, 1, 5, '2024-02-17', 5, 2),
(8, 1, 10, '2024-02-18', 10, 3),
(9, 1, 5, '2024-02-18', 5, 2),
(13, 3, 100, '2024-02-18', 100, 5),
(14, 1, 100, '2024-02-18', 100, 5),
(15, 1, 50, '2024-02-18', 50, 4),
(16, 1, 10, '2024-02-18', 10, 3),
(17, 1, 10, '2024-02-18', 10, 3),
(18, 1, 5, '2024-02-18', 5, 2),
(19, 1, 10, '2024-02-18', 10, 3),
(20, 1, 50, '2024-02-18', 50, 4),
(21, 1, 5, '2024-02-18', 5, 2),
(22, 1, 10, '2024-02-18', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `receipt_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymentinfo`
--

CREATE TABLE `tblpaymentinfo` (
  `payment_id` int(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `cvv` int(4) NOT NULL,
  `card_num` varchar(19) NOT NULL,
  `expiry_month` varchar(3) NOT NULL,
  `expiry_year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpaymentinfo`
--

INSERT INTO `tblpaymentinfo` (`payment_id`, `name`, `cvv`, `card_num`, `expiry_month`, `expiry_year`) VALUES
(42, 'pang', 111, '12345', 'Feb', 2026),
(43, 'Peter', 123, '1324234123413242134', 'Jan', 2027),
(44, 'Peter', 123, '1324234123413242134', 'Jan', 2027),
(45, 'Peter', 1234, '123413241234', 'Jan', 2025),
(46, 'Peter', 123, '123123123213123', 'Jan', 2025);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `total_tree` int(10) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `total_tree`) VALUES
(1, 'pang', 'pang@gmail.com', 'pang123', 471),
(2, 'lim', 'lim@gmail.com', 'lim123', 0),
(3, 'low', 'low@gmail.com', 'low123', 100),
(4, 'lee', 'lee@gmail.com', 'lee123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificate_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user1` (`user_id`),
  ADD KEY `certificate` (`certificate_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`),
  ADD KEY `payment1` (`payment_id`);

--
-- Indexes for table `tblpaymentinfo`
--
ALTER TABLE `tblpaymentinfo`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpaymentinfo`
--
ALTER TABLE `tblpaymentinfo`
  MODIFY `payment_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `certificate` FOREIGN KEY (`certificate_id`) REFERENCES `certificate` (`certificate_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
  ADD CONSTRAINT `payment1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`payment_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
