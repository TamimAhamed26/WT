-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 10:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking`
--

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Serial` int(11) NOT NULL,
  `Merchant_id` int(11) NOT NULL,
  `Merchant_name` varchar(250) NOT NULL,
  `Product_Name` varchar(250) NOT NULL,
  `Price` varchar(250) NOT NULL,
  `Customernmbr` varchar(250) NOT NULL,
  `PayMethod` varchar(250) NOT NULL,
  `BillingAddress` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Serial`, `Merchant_id`, `Merchant_name`, `Product_Name`, `Price`, `Customernmbr`, `PayMethod`, `BillingAddress`) VALUES
(1, 3, 'Arnob', 'Laptop', '180000', '01736743087', 'Bkash', 'Bashundhara dhaka'),
(2, 3, 'Arnob', 'Laptop', '140000', '+8801518911165', 'Cash', 'Patuakhali'),
(3, 3, 'Arnob', 'Mobile', '45000', '+8801234567899', 'Cash', 'Rangpur'),
(4, 3, 'Arnob', 'Laptop', '120000', '+8801736743087', 'Cash', 'Dhaka Bangladesh'),
(5, 3, 'Arnob', 'Laptop', '122345', '+8801736743087', 'Cash', 'Dhaka, Bangladesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
