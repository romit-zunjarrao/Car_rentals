-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 04:43 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `car_info`
--

CREATE TABLE `car_info` (
  `id` int(5) NOT NULL,
  `car_name` varchar(10) NOT NULL,
  `car_mileage` int(3) NOT NULL,
  `car_number` varchar(8) NOT NULL,
  `company_name` varchar(10) NOT NULL,
  `year` int(5) NOT NULL,
  `availablity` int(2) NOT NULL,
  `rate` int(10) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_info`
--

INSERT INTO `car_info` (`id`, `car_name`, `car_mileage`, `car_number`, `company_name`, `year`, `availablity`, `rate`, `type`) VALUES
(1, 'Patriot', 18, 'NJ5515C1', 'Jeep', 2017, 1, 150, 'SUV'),
(2, 'CRV', 13, 'BX154CE', 'Honda', 2018, 1, 85, 'SUV'),
(3, 'RS3', 17, 'FD5647', 'Audi', 2017, 1, 75, 'Sedan'),
(4, 'M4', 12, 'DF125X5', 'BMW', 2016, 1, 95, 'Convertibl'),
(10, 'CRV', 0, 'BX144CE', '', 2018, 1, 85, 'SUV'),
(11, 'Ciaz', 12, 'AB457VC3', 'Maruti', 2017, 1, 55, 'Sedan'),
(12, 'Ciaz', 12, 'RD15ABX2', 'Maruti', 2017, 1, 55, 'Sedan'),
(13, 'City', 12, 'AB45YVFB', 'Honda', 2018, 1, 50, 'Sedan');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `UserID` varchar(120) NOT NULL,
  `UserName` varchar(150) NOT NULL,
  `FirstName` varchar(150) DEFAULT NULL,
  `LastName` varchar(150) DEFAULT NULL,
  `Email` varchar(150) NOT NULL,
  `Password` varchar(1000) DEFAULT NULL,
  `Active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`UserID`, `UserName`, `FirstName`, `LastName`, `Email`, `Password`, `Active`) VALUES
('nc0kf6', 'admin', 'admin', 'admin', 'admin@eastcoastrentals.com', '7d4bcdddbfe6039764cb53782016db491c1bdcb1388421519046a9efbb938ae34', 1),
('02x1c2', 'Rohan', 'Rohan', 'Naik', 'rohan@g.vom', 'b9409771de24775a001e8b78b6f871bd4cff45538236994d9b38deac20e3bab98', 1),
('kxp80y', 'romit', 'romit', 'zunjarrao', 'romi', '89efb33c6fdc8bc6e1bb1eb76f7a53b6323f6479505782357c2b9b241e3df9961', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car_info`
--
ALTER TABLE `car_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_number` (`car_number`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`UserName`,`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car_info`
--
ALTER TABLE `car_info`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
