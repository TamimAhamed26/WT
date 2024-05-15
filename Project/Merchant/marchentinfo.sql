-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2024 at 10:44 AM
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
-- Table structure for table `marchentinfo`
--

CREATE TABLE `marchentinfo` (
  `Serial` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `NID` varchar(255) DEFAULT NULL,
  `PresentAddress` varchar(255) DEFAULT NULL,
  `PermanentAddress` varchar(255) DEFAULT NULL,
  `PhoneNumber` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marchentinfo`
--

INSERT INTO `marchentinfo` (`Serial`, `FirstName`, `LastName`, `NID`, `PresentAddress`, `PermanentAddress`, `PhoneNumber`, `Email`, `Username`, `Password`) VALUES
(1, 'arnob', 'dey', '12231321', 'asd', 'das', '+8801765502394', 'arnobdey@gmail.com', 'arnob', 'ARNOB'),
(2, 'tamim', 'a', 'DAS', 'na', 'DAS', '+8801780620311', 'tamim26mar@gmail.com', 'DASDAS', 'aA1!3'),
(3, 'Arnob', 'Dey', '123456', 'Bashundhara Dhaka', 'Patuakhali Sadar, Patuakhali', '+8801736743087', 'deyarnob087@gmail.com', 'ad', 'aA2@'),
(4, 'ad', 'a', '1454', 'afawfaw', 'sfgsaes', '+8801736743087', 'examole@gmail.com', 'as', 'bB2@'),
(5, 'ad', 'a', '1234124', 'afawfaw', 'sfdsgaef', '+8801736743087', 'examole@gmail.com', 'ap', 'aA2@');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marchentinfo`
--
ALTER TABLE `marchentinfo`
  ADD PRIMARY KEY (`Serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marchentinfo`
--
ALTER TABLE `marchentinfo`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
