-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2024 at 05:34 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `id` int(3) NOT NULL,
  `type` varchar(10) NOT NULL,
  `threshold` varchar(20) NOT NULL,
  `notificationMethod` varchar(20) NOT NULL,
  `accountNo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` varchar(5) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `date`, `time`, `purpose`, `name`, `phone`, `email`) VALUES
('p-001', '2024-05-01', '10:00:00.000000', 'Meeting', 'John Doe', '+8801619142827', 'john@example.com'),
('p-002', '2024-04-30', '11:00:00.000000', 'account issue', 'Nusaiba Inaya', '+8801772591412', 'inaya147@gmail.com');

--
-- Triggers `appointment`
--
DELIMITER $$
CREATE TRIGGER `appointment_insert_trigger` BEFORE INSERT ON `appointment` FOR EACH ROW BEGIN
    DECLARE new_id INT;
    SET new_id = (SELECT IFNULL(MAX(SUBSTRING(appointment_id, 3)) + 1, 0) FROM appointment);
    
    -- Check if the new ID already exists
    WHILE EXISTS (SELECT * FROM appointment WHERE appointment_id = CONCAT('p-', LPAD(new_id, 3, '0'))) DO
        SET new_id = new_id + 1;
    END WHILE;
    
    SET NEW.appointment_id = CONCAT('p-', LPAD(new_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(6) NOT NULL,
  `holder_name` varchar(255) NOT NULL,
  `father_name` varchar(255) NOT NULL,
  `mother_name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `holder_name`, `father_name`, `mother_name`, `message`, `postcode`, `username`, `password`, `email`, `website`, `phone`, `gender`, `blood_group`, `religion`, `city`, `country`, `created_at`) VALUES
('c-001', 'Md Ryan', 'Ali Mia', 'Noorjahan', 'Bashundhara', '1145', 'customerTwo', 'Customer@2', 'ryanmd@gmail.com', 'https://example.com', '+8801798546789', 'Male', 'B+', 'Islam', 'Dhaka', 'Bangladesh', '2024-04-28 12:14:39'),
('c-002', 'Akhtarul Islam', 'ABC', 'XYZ', 'XYZ Avenue', '1220', 'customer', 'Customer@1', 'sheam123@gmail.com', 'https://example.com', '+8801518172827', 'Male', 'O+', 'Islam', 'Rajshahi', 'Bangladesh', '2024-04-25 12:21:50');

--
-- Triggers `customer`
--
DELIMITER $$
CREATE TRIGGER `before_customer_insert` BEFORE INSERT ON `customer` FOR EACH ROW BEGIN
    DECLARE new_id INT;
    SET new_id = (SELECT IFNULL(MAX(SUBSTRING(customer_id, 3)) + 1, 0) FROM customer);
    
    -- Check if the new ID already exists
    WHILE EXISTS (SELECT * FROM customer WHERE customer_id = CONCAT('c-', LPAD(new_id, 3, '0'))) DO
        SET new_id = new_id + 1;
    END WHILE;
    
    SET NEW.customer_id = CONCAT('c-', LPAD(new_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` varchar(6) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `phone_number` varchar(14) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `street_address` varchar(50) NOT NULL,
  `city` text NOT NULL,
  `State` text NOT NULL,
  `postal_code` int(4) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `first_name`, `last_name`, `gender`, `phone_number`, `date_of_birth`, `email`, `street_address`, `city`, `State`, `postal_code`, `username`, `password`) VALUES
('e-001', 'Urmi', 'Faruk', 'Female', '+8801552591320', '2001-02-06', 'farhanafarukurmi0@gmail.com', 'XYZ', 'Chittagong', 'Bangladesh', 1217, 'employee', 'Employee@1'),
('e-002', 'Fariha', 'Fima', 'Female', '+8801552591320', '1999-06-15', 'farihafima147@gmail.com', 'Jashimuddin road', 'Dhaka', 'Bangladesh', 1230, 'employeeTWO', 'Employee@@2'),
('e-003', 'Farzia', 'Fiona', 'Female', '+8801552591412', '2003-10-09', 'farzia147@gmail.com', 'ABC Avenue', 'Barisal', 'Bangladesh', 1224, 'employeeThree', 'Employee@3'),
('e-004', 'Nusaiba', 'Inaya', 'Female', '+8801772591412', '1996-09-18', 'inaya147@gmail.com', 'Khalpar', 'Feni', 'Bangladesh', 1218, 'employeeFour', 'Employee@4'),
('e-005', 'Rushaida', 'Tuba', 'Female', '+8801794851211', '1996-02-12', 'tubarush@gmail.com', 'Bailey road', 'Dhaka', 'Bangladesh', 1239, 'employeeFive', 'Employee@@5'),
('e-006', 'Samiul', 'Islam', 'Male', '+8801795674578', '1999-06-07', 'samiulislam@yahoo.com', 'Bali road', 'Rajshahi', 'Bangladesh', 1304, 'employeeSix', 'Employee@6');

--
-- Triggers `employee`
--
DELIMITER $$
CREATE TRIGGER `before_employee_insert` BEFORE INSERT ON `employee` FOR EACH ROW BEGIN
    DECLARE new_id INT;
    SET new_id = (SELECT IFNULL(MAX(SUBSTRING(employee_id, 3)) + 1, 0) FROM employee);
    
    -- Check if the new ID already exists
    WHILE EXISTS (SELECT * FROM employee WHERE employee_id = CONCAT('e-', LPAD(new_id, 3, '0'))) DO
        SET new_id = new_id + 1;
    END WHILE;
    
    SET NEW.employee_id = CONCAT('e-', LPAD(new_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(3) NOT NULL,
  `amount` int(10) NOT NULL,
  `purpose` text NOT NULL,
  `monthlyIncome` int(10) NOT NULL,
  `phone` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `amount`, `purpose`, `monthlyIncome`, `phone`) VALUES
(1, 40000, 'build house', 20000, 2147483647),
(2, 30000, 'built house', 10000, 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `Serial` varchar(6) NOT NULL,
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
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`Serial`, `FirstName`, `LastName`, `NID`, `PresentAddress`, `PermanentAddress`, `PhoneNumber`, `Email`, `Username`, `Password`) VALUES
('m-001', 'Arnob', 'Dey', '12345678', 'mno Avenue', 'mno Avenue', 'Merchant@1', 'arnobdey@gmail.com', 'merchant', '+8801519142827'),
('m-002', 'Atlas', 'Ramsey', '23456789', 'Abdullahpur', 'Gazipur', 'Merchant@2', 'atlas@gmail.com', 'merchantTwo', '+8801765964827');

--
-- Triggers `merchant`
--
DELIMITER $$
CREATE TRIGGER `before_merchant_insert` BEFORE INSERT ON `merchant` FOR EACH ROW BEGIN
    DECLARE new_id INT;
    SET new_id = (SELECT IFNULL(MAX(SUBSTRING(Serial, 3)) + 1, 0) FROM merchant);
    
    -- Check if the new ID already exists
    WHILE EXISTS (SELECT * FROM merchant WHERE Serial = CONCAT('m-', LPAD(new_id, 3, '0'))) DO
        SET new_id = new_id + 1;
    END WHILE;
    
    SET NEW.Serial = CONCAT('m-', LPAD(new_id, 3, '0'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `serial` int(100) NOT NULL,
  `accountNo` int(10) NOT NULL,
  `amount` int(8) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `type` enum('Deposit','Withdraw') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`serial`, `accountNo`, `amount`, `description`, `type`) VALUES
(1, 12345678, 40000, 'null', 'Deposit'),
(3, 23456789, 50000, 'null', 'Withdraw');

-- --------------------------------------------------------

--
-- Table structure for table `transfer`
--

CREATE TABLE `transfer` (
  `serial` int(3) NOT NULL,
  `fromAccount` int(10) NOT NULL,
  `toAccount` int(10) NOT NULL,
  `amount` int(8) NOT NULL,
  `description` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transfer`
--

INSERT INTO `transfer` (`serial`, `fromAccount`, `toAccount`, `amount`, `description`) VALUES
(1, 12345678, 87654321, 0, 'null'),
(2, 11223344, 22334455, 0, 'null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`Serial`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `serial` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transfer`
--
ALTER TABLE `transfer`
  MODIFY `serial` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
