-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 06:21 AM
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
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_balances`
--

CREATE TABLE `account_balances` (
  `account_id` int(11) NOT NULL,
  `customer_id` varchar(6) NOT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `last_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_balances`
--

INSERT INTO `account_balances` (`account_id`, `customer_id`, `balance`, `last_updated`) VALUES
(1, 'c-001', 321.00, '2024-05-08 17:33:26'),
(2, 'c-002', 3219.00, '2024-05-08 17:33:38');

--
-- Triggers `account_balances`
--
DELIMITER $$
CREATE TRIGGER `before_insert_customer_idA` BEFORE INSERT ON `account_balances` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(6);
    SELECT COALESCE(MAX(SUBSTRING(customer_id, 3)), '000') INTO last_id
    FROM account_balances
    WHERE customer_id LIKE 'c-%';
    SET NEW.customer_id = CONCAT('c-', LPAD(CONV(SUBSTR(last_id, 3) + 1, 10, 36), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_log`
--

CREATE TABLE `customer_log` (
  `log_id` int(11) NOT NULL,
  `customer_id` varchar(6) NOT NULL,
  `activity_type` varchar(255) DEFAULT NULL,
  `activity_date` datetime DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `browser_info` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_log`
--

INSERT INTO `customer_log` (`log_id`, `customer_id`, `activity_type`, `activity_date`, `description`, `ip_address`, `browser_info`) VALUES
(1, 'c-004', 'login', '2024-05-15 02:53:31', 'adsadsa', '123.44.223.12', 'os');

--
-- Triggers `customer_log`
--
DELIMITER $$
CREATE TRIGGER `before_insert_customer_id23` BEFORE INSERT ON `customer_log` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(6);
    SELECT COALESCE(MAX(SUBSTRING(customer_id, 3)), '000') INTO last_id
    FROM user_logs
    WHERE customer_id LIKE 'c-%';
    SET NEW.customer_id = CONCAT('c-', LPAD(CONV(SUBSTR(last_id, 3) + 1, 10, 36), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` varchar(6) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `State` text NOT NULL,
  `postal_code` int(4) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL,
  `Status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `first_name`, `last_name`, `gender`, `phone_number`, `date_of_birth`, `email`, `street_address`, `city`, `State`, `postal_code`, `username`, `password`, `Status`) VALUES
('e-004', 'tamim', 'a', 'Male', '+8801780620311', '1999-01-31', 'tamim26mar@gmail.com', 'na', 'dhakaa', 'dsadsa', 5200223, 'emp', 'aA2@1', 'Active'),
('e-005', 'tamim', 'a', 'Male', '+8801780620311', '2000-01-03', 'tam@gmail.com', 'na', 'dhaka', 'AEDSA', 5200, 'empa', 'aA1@!', 'Inactive');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `employee_insert_trigger` BEFORE INSERT ON `employee` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(6);
    SELECT COALESCE(MAX(SUBSTRING(emp_id, 3)), '000') INTO last_id
    FROM employee
    WHERE emp_id LIKE 'e-%';
    SET NEW.emp_id = CONCAT('e-', LPAD(CONV(SUBSTR(last_id, 3) + 1, 10, 36), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `transc_id` int(11) NOT NULL,
  `customer_id` varchar(6) NOT NULL,
  `transc_type` enum('Deposit','Withdrawal','Transfer','') DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`transc_id`, `customer_id`, `transc_type`, `amount`, `transaction_date`, `status`) VALUES
(1, 'c-001', 'Deposit', 3211.00, '2024-04-08 08:59:33', 'Active'),
(3, 'c-002', 'Withdrawal', 3215.00, '2024-04-08 10:26:51', 'Active'),
(4, 'c-003', 'Transfer', 1023.00, '2024-04-08 14:41:08', 'Active'),
(5, 'c-004', 'Transfer', 3211.00, '2024-04-07 20:02:05', 'Active'),
(8, 'c-005', 'Withdrawal', 32311.00, '2024-05-08 16:23:08', 'Active');

--
-- Triggers `transactions`
--
DELIMITER $$
CREATE TRIGGER `before_insert_customer_id` BEFORE INSERT ON `transactions` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(6);
    SELECT COALESCE(MAX(SUBSTRING(customer_id, 3)), '000') INTO last_id
    FROM transactions
    WHERE customer_id LIKE 'c-%';
    SET NEW.customer_id = CONCAT('c-', LPAD(CONV(SUBSTR(last_id, 3) + 1, 10, 36), 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(6) NOT NULL,
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
('a-001', 'tamim', 'a', 'monsur alamxx', 'jannatul fardush', 'na', '12345', 'tamim', 'aA1@!', 'tamim26mar@gmail.com', 'https://example.com', '+8801780620311', 'Male', 'A+', 'Islam', 'Dhaka', 'Bangladesh', '2024-03-21 06:56:20'),
('a-002', 'tamim', 'a', 'SDADSAq', 'dsa', 'na', '5200', 'aaaa', 'aaA1@32', 'tamiar@gmail.com', 'https://www.aiub.edu/', '+8801780620315', 'Male', 'B+', 'Hinduism', 'Dhaka', 'Bangladesh', '2024-03-22 14:13:11'),
('a-003', 'tamim', 'a', 'dasdsa', 'dsa', 'dsa', '5200', 'dsa', 'aA1@!', 'tr@gmail.com', 'https://www.aiub.edu/', '+8801780620311', 'Female', 'B+', 'Islam', 'Dhaka', 'Bangladesh', '2024-05-13 18:52:40');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `users_insert_trigger` BEFORE INSERT ON `users` FOR EACH ROW BEGIN
    DECLARE last_id VARCHAR(6);
    SELECT COALESCE(MAX(SUBSTRING(id, 3)), '000') INTO last_id
    FROM users
    WHERE id LIKE 'a-%';
    SET NEW.id = CONCAT('a-', LPAD(CONV(SUBSTR(last_id, 3) + 1, 10, 36), 3, '0'));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_balances`
--
ALTER TABLE `account_balances`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `customer_log`
--
ALTER TABLE `customer_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transc_id`);

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
-- AUTO_INCREMENT for table `account_balances`
--
ALTER TABLE `account_balances`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_log`
--
ALTER TABLE `customer_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `transc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
