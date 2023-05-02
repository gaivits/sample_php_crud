-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2022 at 05:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kando`
--

-- --------------------------------------------------------

--
-- Table structure for table `kando`
--

CREATE TABLE `kando` (
  `EmployeeId` int(11) NOT NULL,
  `NewsId` int(9) NOT NULL,
  `NameNews` varchar(255) NOT NULL,
  `Detail` text NOT NULL,
  `Status` int(11) NOT NULL,
  `UpdatedDate` varchar(255) NOT NULL DEFAULT current_timestamp(),
  `ButtonView` int(11) NOT NULL,
  `ButtonEdit` int(11) NOT NULL,
  `ButtonDelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kando`
--

INSERT INTO `kando` (`EmployeeId`, `NewsId`, `NameNews`, `Detail`, `Status`, `UpdatedDate`, `ButtonView`, `ButtonEdit`, `ButtonDelete`) VALUES
(3, 2, '123456', '1234567', 0, '11/11/2565 7:00', 1, 0, 1),
(3, 3, '123456aa', '1234567bb', 1, '11/11/2565 7:00', 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kando`
--
ALTER TABLE `kando`
  ADD PRIMARY KEY (`NewsId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kando`
--
ALTER TABLE `kando`
  MODIFY `NewsId` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
