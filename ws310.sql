-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2025 at 04:34 PM
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
-- Database: `ws310`
--

-- --------------------------------------------------------

--
-- Table structure for table `midterm`
--

CREATE TABLE `midterm` (
  `id` int(11) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `midterm`
--

INSERT INTO `midterm` (`id`, `address`) VALUES
(1, 'san fernando'),
(2, 'toledo city'),
(3, 'cebu city'),
(4, 'naga city'),
(5, 'talisay city'),
(6, 'minglanilla');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_full_name` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `civil_status` varchar(100) DEFAULT NULL,
  `tax_identification_number` varchar(15) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `place_of_birth` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `telephone_number` varchar(15) DEFAULT NULL,
  `region` varchar(50) DEFAULT NULL,
  `region_code` varchar(100) NOT NULL,
  `province` varchar(50) DEFAULT NULL,
  `province_code` varchar(100) NOT NULL,
  `municipality` varchar(50) DEFAULT NULL,
  `municipality_code` varchar(100) NOT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `barangay_code` varchar(100) NOT NULL,
  `home_address` varchar(250) NOT NULL,
  `zip_code` varchar(10) DEFAULT NULL,
  `fathers_full_name` varchar(100) DEFAULT NULL,
  `mothers_full_name` varchar(100) DEFAULT NULL,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_full_name`, `date_of_birth`, `sex`, `civil_status`, `tax_identification_number`, `nationality`, `religion`, `place_of_birth`, `phone_number`, `email_address`, `telephone_number`, `region`, `region_code`, `province`, `province_code`, `municipality`, `municipality_code`, `barangay`, `barangay_code`, `home_address`, `zip_code`, `fathers_full_name`, `mothers_full_name`, `date_created`) VALUES
(1056, 'archie amas albarico', '2000-10-24', 'male', 'married', '123123132', 'filipino', 'Eius qui atque est', 'vicente sotto memorial medical center', '09491853866', 'archiealbarico69@gmail.com', '', 'Region VII (Central Visayas)', '0700000000', 'Cebu', '0702200000', 'Minglanilla', '0702232000', 'Poblacion Ward IV', '0702232013', 'Tunghaan, Minglanilla, Cebu', '6046', 'mario beduya albarico', 'jessie amas luna', '2025-03-16');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `first_name`, `dob`) VALUES
(1, 'archie', '2000-03-12'),
(2, 'archie', '2000-03-12'),
(3, 'Lacy', '2004-12-29'),
(4, 'Shannon', '2000-03-12'),
(5, 'archie', '2000-10-24'),
(6, 'archie', '2000-10-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `midterm`
--
ALTER TABLE `midterm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `midterm`
--
ALTER TABLE `midterm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1058;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
