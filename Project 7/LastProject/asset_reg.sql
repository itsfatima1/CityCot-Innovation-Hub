-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 05:57 PM
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
-- Database: `citycot`
--

-- --------------------------------------------------------

--
-- Table structure for table `asset_reg`
--

CREATE TABLE `asset_reg` (
  `AssetID` int(11) NOT NULL,
  `AssetName` varchar(100) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `PurchasedDate` date NOT NULL,
  `Locations` varchar(100) NOT NULL,
  `Conditions` varchar(100) NOT NULL,
  `AssignedTo` varchar(100) NOT NULL,
  `Notes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `asset_reg`
--

INSERT INTO `asset_reg` (`AssetID`, `AssetName`, `Category`, `PurchasedDate`, `Locations`, `Conditions`, `AssignedTo`, `Notes`) VALUES
(100, 'Monitor', 'Electronics', '2025-01-31', 'Nakhil Cumpus', 'Scrap', 'Fatima', 'Test'),
(101, 'Chair', 'Furniture', '2024-12-29', 'Main Campus', 'Scrap', 'Khalid Ahmed', 'Test'),
(103, 'Printer', 'Office Equipment ', '2025-01-01', 'Nakhil Campus', 'Working', 'Admin Staff ', 'Ensure toner is refilled monthly'),
(104, 'Monitor', 'Electronics', '2025-01-09', 'Nakhil Cumpus', 'Working', 'IT Department', 'Working');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asset_reg`
--
ALTER TABLE `asset_reg`
  ADD PRIMARY KEY (`AssetID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asset_reg`
--
ALTER TABLE `asset_reg`
  MODIFY `AssetID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
