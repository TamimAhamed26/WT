-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2024 at 11:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AiubVault`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `balance`) VALUES
(1, 212020.00),
(2, 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT 'default_value',
  `amount` decimal(10,2) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `username`, `amount`, `type`, `payment_method`) VALUES
(1, 'default_value', 3232.00, 'school', 'bankAccount'),
(2, 'default_value', 3232.00, 'gas', 'card'),
(3, 'default_value', 32321.00, 'gas', 'card'),
(4, 'default_value', 5664.00, 'gas', 'card'),
(5, 'default_value', 0.00, 'school', 'bankAccount'),
(6, 'default_value', 0.00, 'school', 'bankAccount'),
(7, 'default_value', 0.00, 'school', 'bankAccount'),
(8, 'default_value', 21313.00, 'college', 'bankAccount'),
(9, 'default_value', 12.00, 'school', 'bankAccount'),
(10, 'default_value', 12.00, 'school', 'bankAccount'),
(11, 'default_value', 243.00, 'other', 'card'),
(12, 'default_value', 65.00, 'school', 'bankAccount'),
(13, 'default_value', 239.00, 'school', 'bankAccount'),
(14, 'default_value', 9.00, 'school', 'bankAccount'),
(15, 'default_value', 995.00, 'school', 'bankAccount'),
(16, 'default_value', 9848.00, 'school', 'bankAccount'),
(17, 'default_value', 101.00, 'school', 'bankAccount'),
(18, 'default_value', 102.00, 'internet', 'bankAccount'),
(19, 'default_value', 999.00, 'gas', 'card');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `application_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `name`, `email`, `amount`, `application_date`) VALUES
(1, 't3t', 'icecakesam@gmail.com', 44.00, '2024-05-14 08:54:35'),
(2, 'werwe', 'icecakesam@gmail.com', 11.00, '2024-05-14 08:58:16');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `debit` decimal(10,2) DEFAULT NULL,
  `credit` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `balance`, `debit`, `credit`) VALUES
(1, 1000.00, NULL, 500.00),
(3, 1300.00, 100.00, NULL),
(4, 1200.00, 0.00, 200.00),
(6, 1400.00, 0.00, 300.00),
(7, 1600.00, 0.00, 200.00),
(8, 1800.00, 100.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `blood_group` varchar(3) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `father_name`, `mother_name`, `message`, `postcode`, `username`, `password`, `email`, `website`, `phone`, `gender`, `blood_group`, `religion`, `city`, `country`, `created_at`) VALUES
(1, 'dvaas', 'dvds', 'verfd', 'ferf', 'kuril,Dhaka', '1100', 'ds', 'Aa1@', 'icecakeddsam@gmail.com', 'https://www.abc', '+8801704680068', 'Male', 'A-', 'Hinduism', 'Dhaka', 'Bangladesh', '2024-03-30 08:28:03'),
(39, 'rege', 'gege', 'gertg', 'gergter', 'rferfgegf', '34242', 'fofo', 'Aa1@', 'djfnwkjn@gmai.com', 'https://www.aiub.edu', '+8801704680068', 'Male', 'A+', 'Hinduism', 'Dhaka', 'Canada', '2024-03-31 20:57:53'),
(40, 'Akhtarul', 'Islam', 'fefe', 'fvevfe', 'kuril,Dhaka', '1100', 'igo', 'Aa1@', 'iccccecakesam@gmail.com', 'https://www.yu.com', '+8801704680068', 'Male', 'A-', 'Islam', 'Dhaka', 'Bangladesh', '2024-03-31 21:17:10'),
(41, 'fwef', 'wfwfw', 'fvwv', 'fveve', 'sdcdf', '323242', 'uiuy', 'Aa1@', 'dsdfs@gmail.com', 'https://www.aiub.edu', '+8801704680068', 'Male', 'A+', 'Islam', 'Dhaka', 'Canada', '2024-03-31 21:30:03'),
(42, 'Akhtarul', 'Islam', 'the', 'the', 'kuril,Dhaka', '1100', 'poo', 'Aa1@', 'icecathrkesam@gmail.com', 'https://www.xtx.com', '+8801704680068', 'Male', 'A+', 'Islam', 'Dhaka', 'Bangladesh', '2024-03-31 21:47:33'),
(43, 'rw', 'ww', 'rge', 'rgw', 'fe', '3242', 'eee', 'Aa1@', 'bfjhwb@gmail.com', 'https://www.ifi.com', '+8801704680068', 'Male', 'A+', 'Islam', 'Dhaka', 'Bangladesh', '2024-03-31 21:53:38'),
(44, 'rgweg', 'erg', 'wrgw', 'wgw', 'fefe', '4353', 'fffr', 'Aa1@', 'rgw@gmail.com', 'https://www.hbfe.com', '+8801704680068', 'Male', 'A+', 'Islam', 'Dhaka', 'Bangladesh', '2024-03-31 21:55:38'),
(45, 'fgf', 'sfw', 'fw', 'wefe', 'kjfvnkj', '433', 'jnjn', 'Aa1@', 'fgeg@gmail.com', 'https://www.aiub.edu', '+8801704680068', 'Male', 'A+', 'Islam', 'Dhaka', 'Bangladesh', '2024-03-31 22:18:44'),
(46, 'ggeg', 'egte', 'ebe', 'gebe', 'ever', '242', 'uiu', 'Aa1@', 'tgjn@gmail.com', 'https://www.aiub.edu', '+8801704680068', 'Male', 'A-', 'Islam', 'Dhaka', 'Bangladesh', '2024-03-31 22:23:03'),
(47, 'reer', 'rewew', 'wg', 'rwgw', 'free', '32242', 'bv', 'Aa1@', 'ygefuqy@gmail.com', 'https://www.nn.com', '+8801717253576', 'Male', 'A+', 'Islam', 'Dhaka', 'Canada', '2024-03-31 22:28:43'),
(48, 'as', 'd', 'dsfs', 'dfs', 'dsds', '1100', 'gpp', 'Aa1@', 'dsfs@gmail.com', 'https://www.df.com', '+8801704680068', 'Male', 'A+', 'Islam', 'Dhaka', 'Bangladesh', '2024-04-19 06:44:13'),
(49, 'Akhtarul', 'Islam', 'fq', 'qfq', 'kuril,Dhaka', '1100', 'cppp', 'Aa1@', 'icecakesawwwm@gmail.com', 'https://www.df.com', '+8801704680068', 'Male', 'A+', 'Islam', 'Dhaka', 'Bangladesh', '2024-04-20 03:06:10'),
(50, 'Akhtarul', 'Islam', 'ede', 'w', 'kuril,Dhaka', '1100', 'ss', 'Aa1@', 'icecakewfqsam@gmail.com', 'https://www.cc.com', '+8801704680068', 'Male', 'A+', 'Islam', 'Dhaka', 'Bangladesh', '2024-04-21 04:48:08'),
(51, 'er', 'ree', 'df', 'q', 'gg', '111', 'rt', 'Aa1@', 'foaqqi@gud.com', 'https://www.pp.com', '+8801704680068', 'Male', 'A+', 'Islam', 'Dhaka', 'Bangladesh', '2024-04-21 18:07:31'),
(52, 'er', 'ree', 'wrr', 'ww', 'gg', '111', 'poi', 'Aa1@', 'foaiwewe@gud.com', 'https://www.vv.com', '+8801704680068', 'Male', 'A+', 'Hinduism', 'Dhaka', 'Bangladesh', '2024-04-21 18:08:27'),
(53, 'er', 'ree', 'efw', 'ewfew', 'gg', '111', 'popoz', 'Aa1@', 'foaewfewi@gud.com', 'https://www.cc.com', '+8801704680068', 'Male', 'A+', 'Islam', 'Dhaka', 'Bangladesh', '2024-04-21 18:11:13'),
(54, 'Akhtarul', 'Islam', 'dfwef', 'wefwe', 'kuril,Dhaka', '1100', 'sopp', 'Ss1@', 'icecakesefwefwam@gmail.com', 'https://www.xyz.com', '+8801704680068', 'Male', 'A+', 'Islam', 'Dhaka', 'Bangladesh', '2024-04-22 01:46:54'),
(55, 'Akhtarul', 'Islam', 'ewqwef', 'efwqef', 'kuril,Dhaka', '1100', 'yut', 'Ss1@', 'idscecawewewkesam@gmail.com', 'https://www.xpp.com', '+8801704680068', 'Male', 'A+', 'Islam', 'Dhaka', 'Bangladesh', '2024-04-22 01:54:18'),
(56, 'Akhtarul', 'Islam', 'rrty', 'yhty', 'kuril,Dhaka', '1100', 'tfg', 'Ss1@', 'icecaketgrt4sam@gmail.com', 'https://www.cece.com', '+8801704680068', 'Male', 'A+', 'Islam', 'Dhaka', 'Bangladesh', '2024-04-22 04:36:13'),
(57, 'Akhtarul', 'Islam', 'tjyjr', 'jyujy', 'kuril,Dhaka', '1100', 'iuti', 'Ss1@', 'ice44ytcayhkesam@gmail.com', 'https://www.cdcd.com', '+8801704680068', 'Male', 'A-', 'Islam', 'Dhaka', 'Bangladesh', '2024-04-22 04:54:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
