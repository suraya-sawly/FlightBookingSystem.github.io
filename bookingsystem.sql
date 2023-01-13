-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2021 at 07:06 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `email`, `pass`) VALUES
('admin1', 'moonjarin@gmail.com', '123456'),
('admin2', 'musarrat@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `aircraft_name` varchar(30) NOT NULL,
  `aircraft_id` varchar(30) NOT NULL,
  `fromwhere` varchar(100) NOT NULL,
  `towhere` varchar(100) NOT NULL,
  `taka` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`aircraft_name`, `aircraft_id`, `fromwhere`, `towhere`, `taka`) VALUES
('BimanBD', '001', 'Dhaka', 'Chittagong', 5000),
('BimanBD', '002', 'Dhaka', 'Rangpur', 3000),
('BimanBD', '003', 'Dhaka', 'Sylhet', 8000),
('BimanBD', '004', 'Dhaka', 'Barishal', 6000),
('AirlineBD', '100', 'Chittagong', 'Dhaka', 6000),
('AirlineBD', '200', 'Sylhet', 'Dhaka', 5000),
('AirlineBD', '300', 'Rangpur', 'Dhaka', 7000),
('AirlineBD', '400', 'Barishal', 'Dhaka', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `serial_no` int(100) NOT NULL,
  `pass_num` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `credit_no` varchar(100) NOT NULL,
  `payment_amo` int(11) NOT NULL,
  `aircraft_id` varchar(30) NOT NULL,
  `aircraft_name` varchar(30) NOT NULL,
  `seat_nums` int(30) NOT NULL,
  `stat` varchar(100) NOT NULL,
  `booking_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`serial_no`, `pass_num`, `email`, `credit_no`, `payment_amo`, `aircraft_id`, `aircraft_name`, `seat_nums`, `stat`, `booking_date`) VALUES
(46, 'ABC1234567', 'moonjarintasu@gmail.com', '1234tyuio4567', 16000, '003', 'BimanBD', 2, 'Booked', '2021-05-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(10) NOT NULL,
  `passport_id` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`f_name`, `l_name`, `passport_id`, `phone`, `pass`, `email`) VALUES
('tahsin', 'prity', '345678uabcder', '12345678901', '1234', 'taharattajrin@gmail.com'),
('moon', 'zarin', 'ABC1234567', '01521735144', '1234', 'moonjarintasu@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`aircraft_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`serial_no`),
  ADD KEY `pass_num` (`pass_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`passport_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `serial_no` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`pass_num`) REFERENCES `users` (`passport_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
