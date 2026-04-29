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
