-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2026 at 08:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gradedunit`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_rubrics`
--

CREATE TABLE `account_rubrics` (
  `Rubric_ID` int(20) NOT NULL,
  `company_ID` int(20) NOT NULL,
  `Rubric_date` date DEFAULT NULL,
  `points` int(3) DEFAULT NULL,
  `certificate_Level` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account_rubrics`
--

INSERT INTO `account_rubrics` (`Rubric_ID`, `company_ID`, `Rubric_date`, `points`, `certificate_Level`) VALUES
(1, 3, '2026-04-20', 200, 'Bronze'),
(2, 3, '2026-04-21', 200, 'Gold'),
(3, 3, '2026-04-21', 200, 'Gold'),
(4, 3, '2026-04-21', 185, 'Silver'),
(5, 3, '2026-04-21', 100, 'Bronze');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_progress`
--

CREATE TABLE `certificate_progress` (
  `certifice_ID` int(10) NOT NULL,
  `Rubric_ID` int(20) NOT NULL,
  `certificate_Ref` char(50) NOT NULL,
  `Voucher_Points` int(3) DEFAULT NULL,
  `amount_Paid` decimal(6,2) DEFAULT NULL,
  `Certificate_Achieved` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificate_progress`
--

INSERT INTO `certificate_progress` (`certifice_ID`, `Rubric_ID`, `certificate_Ref`, `Voucher_Points`, `amount_Paid`, `Certificate_Achieved`) VALUES
(1, 1, '46f3bfd19eb4b4f82fc6fd52d8701a21806e70e0f1e28474d4', 85, 8500.00, 1),
(2, 2, 'fcf485c92c949be3381f467dbdd87de5ba3ba2289b858d97fb', 0, 0.00, 1),
(3, 3, '3b91904489c09308901034b4ee2ea34bfb9fc1d748f049b1fa', 0, 0.00, 1),
(4, 4, 'd30f64597e2337f6ad23a6400fba56b36fee47999099878be5', 0, 0.00, 0),
(5, 5, '858fdbaf708e26259e5c63359e85bc14b603897ef33ce3f2b3', 0, 0.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `company_account`
--

CREATE TABLE `company_account` (
  `company_ID` int(11) NOT NULL,
  `CompanyName` varchar(50) NOT NULL,
  `Contactemail` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `accountStatus` varchar(50) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_account`
--

INSERT INTO `company_account` (`company_ID`, `CompanyName`, `Contactemail`, `password`, `created_at`, `accountStatus`) VALUES
(1, 'Testzon', 'Testzon@text.com', '$2y$10$yxv3mIw8Cuz4SbJ0O82r5OB5Fhi6KGEq54ir4nK3qxjG9P1r/GYrK', '2026-04-13 14:02:43', 'Active'),
(3, 'Das', 'Testzon1@text.com', '$2y$10$w3jUmFpItex5fDVrJ4/IEuD1pQYWkNFrrxeXfSTZtwHfC3Vq62bW2', '2026-04-19 10:57:22', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_ID` int(10) NOT NULL,
  `feedback` char(50) NOT NULL,
  `feedback_date` date NOT NULL,
  `ContactNumberforFeedback` int(15) DEFAULT NULL,
  `emailAdressforFeedback` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_rubrics`
--
ALTER TABLE `account_rubrics`
  ADD PRIMARY KEY (`Rubric_ID`),
  ADD KEY `fk_Company` (`company_ID`);

--
-- Indexes for table `certificate_progress`
--
ALTER TABLE `certificate_progress`
  ADD PRIMARY KEY (`certifice_ID`),
  ADD KEY `fk_Rubric` (`Rubric_ID`);

--
-- Indexes for table `company_account`
--
ALTER TABLE `company_account`
  ADD PRIMARY KEY (`company_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_rubrics`
--
ALTER TABLE `account_rubrics`
  MODIFY `Rubric_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `certificate_progress`
--
ALTER TABLE `certificate_progress`
  MODIFY `certifice_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `company_account`
--
ALTER TABLE `company_account`
  MODIFY `company_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_rubrics`
--
ALTER TABLE `account_rubrics`
  ADD CONSTRAINT `fk_Company` FOREIGN KEY (`company_ID`) REFERENCES `company_account` (`company_ID`);

--
-- Constraints for table `certificate_progress`
--
ALTER TABLE `certificate_progress`
  ADD CONSTRAINT `fk_Rubric` FOREIGN KEY (`Rubric_ID`) REFERENCES `account_rubrics` (`Rubric_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
