-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2018 at 09:15 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gotaxi`
--

-- --------------------------------------------------------

--
-- Table structure for table `driverdetails`
--

CREATE TABLE `driverdetails` (
  `id` int(10) NOT NULL,
  `nic` varchar(14) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `contact` int(15) NOT NULL,
  `vehicletype` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driverdetails`
--

INSERT INTO `driverdetails` (`id`, `nic`, `firstname`, `lastname`, `age`, `contact`, `vehicletype`) VALUES
(1, '96235261V', 'Pasan', 'Ekanayake ', 24, 711368373, 'car'),
(2, '953454345V', 'Chanuka ', 'Pamaljith', 23, 776363837, 'Bike'),
(3, '963736738V', 'Thisura', 'Senanayake', 28, 722337343, 'Van'),
(4, '8737029484V', 'Sunil ', 'Malhotra', 47, 746282902, 'Bus');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(13, 'gayath', 'gayath@gmail.com', '$2y$10$RMirM93DoH2o2v920FE.WOyhiIwgDUNSBbk5hkY/DX5YRfhjReeiK'),
(14, 'amanda', 'amanda@gmail.com', '$2y$10$V9Hp/e0REuni/LysyA/tGOnqJSc6oBvsUF8ziicbCa/QMzsD6URkm'),
(15, 'ucsc', 'ucsc@gmail.com', '$2y$10$9L7AtsyN8OOIS166HpN3tOD55u4wZVmQEHZkDHSHJCSFC0wjXwh6.');

-- --------------------------------------------------------

--
-- Table structure for table `vehicledetails`
--

CREATE TABLE `vehicledetails` (
  `id` int(100) NOT NULL,
  `vehitype` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `regNo` varchar(15) NOT NULL,
  `seats` int(100) NOT NULL,
  `aircondition` varchar(40) NOT NULL,
  `fueltype` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicledetails`
--

INSERT INTO `vehicledetails` (`id`, `vehitype`, `brand`, `model`, `regNo`, `seats`, `aircondition`, `fueltype`) VALUES
(1, 'car', 'Toyota', 'Corolla', 'CAA-4546', 5, 'ac,fulloption,', 'petrol'),
(2, 'van', 'Nissan', 'Vanette ', 'HD-7493', 13, 'ac,', 'diesel'),
(3, 'tuk', 'Bajaj', 'Re', 'BJJ-4343', 3, '', 'petrol'),
(4, 'bus', 'Ashok', 'Layland', 'NA-7565', 57, '', 'diesel'),
(5, 'car', 'Nissan ', 'Leaf', 'CAV-5453', 5, 'ac,fulloption,', 'electric');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `driverdetails`
--
ALTER TABLE `driverdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `driverdetails`
--
ALTER TABLE `driverdetails`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
