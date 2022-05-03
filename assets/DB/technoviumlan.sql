-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2022 at 04:44 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technoviumlan`
--
CREATE DATABASE IF NOT EXISTS `technoviumlan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `technoviumlan`;

-- --------------------------------------------------------

--
-- Table structure for table `algemeen`
--

CREATE TABLE `algemeen` (
  `ID` int(5) NOT NULL,
  `plaatsen` int(3) NOT NULL,
  `startdatum` date NOT NULL,
  `einddatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `algemeen`
--

INSERT INTO `algemeen` (`ID`, `plaatsen`, `startdatum`, `einddatum`) VALUES
(1, 68, '2022-05-12', '2022-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `inschrijvingen`
--

CREATE TABLE `inschrijvingen` (
  `inschrijfID` int(5) NOT NULL,
  `userID` int(5) NOT NULL,
  `tafelnummer` int(2) NOT NULL,
  `datum` date NOT NULL,
  `betaald` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(5) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fullname`, `username`, `password`, `admin`) VALUES
(12, 'admin', 'admin', '$2y$10$Of5MG3AvUaq.bjDmIRX7HOvYqD4uoCTccclmcU/8yppJN7MVnn0wS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `algemeen`
--
ALTER TABLE `algemeen`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `inschrijvingen`
--
ALTER TABLE `inschrijvingen`
  ADD PRIMARY KEY (`inschrijfID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `algemeen`
--
ALTER TABLE `algemeen`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inschrijvingen`
--
ALTER TABLE `inschrijvingen`
  MODIFY `inschrijfID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
