-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 11:43 PM
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
-- Table structure for table `loaninfo`
--

CREATE TABLE `loaninfo` (
  `Serial` int(11) NOT NULL,
  `Merchant_id` int(11) NOT NULL,
  `Merchant_name` varchar(250) NOT NULL,
  `LoanType` varchar(250) NOT NULL,
  `Reason` varchar(250) NOT NULL,
  `Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loaninfo`
--

INSERT INTO `loaninfo` (`Serial`, `Merchant_id`, `Merchant_name`, `LoanType`, `Reason`, `Amount`) VALUES
(1, 3, 'Arnob', 'Personal', 'Personal use', 50000),
(2, 3, 'Arnob', 'Business', 'For getting my business bigger', 500000),
(3, 3, 'Arnob', 'Car', 'TO buy a car', 500000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loaninfo`
--
ALTER TABLE `loaninfo`
  ADD PRIMARY KEY (`Serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loaninfo`
--
ALTER TABLE `loaninfo`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
