-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 04:51 AM
-- Server version: 8.0.28
-- PHP Version: 8.1.2

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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Id` int NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Id`, `Email`, `Phone`, `Password`) VALUES
(3, 'admin@mail.com', '60193721201', '123');

-- --------------------------------------------------------

--
-- Table structure for table `channel`
--

CREATE TABLE `channel` (
  `Id` int NOT NULL,
  `Channel_room` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Doctor_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Id` int NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Address` varchar(90) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Salary` int NOT NULL,
  `Category` varchar(30) NOT NULL,
  `Dp` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Id`, `Name`, `Email`, `Dob`, `Gender`, `Address`, `Phone`, `Password`, `Salary`, `Category`, `Dp`) VALUES
(5, 'Kevin Thomas', 'kevin@mail.com', '1983-05-04', 'Male', '20, Kajang, Malaysia', '60123456789', '123', 2200, 'Skin Treatment', NULL),
(6, 'James Cameron', 'james@mail.com', '1987-07-05', 'Male', 'No.22, Rawang, Selangor, Malaysia', '6013789456', '123', 3000, 'Skin Treatment', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointment`
--

CREATE TABLE `doctor_appointment` (
  `Id` int NOT NULL,
  `Doctor_id` int NOT NULL,
  `App_date` date NOT NULL,
  `App_time` time NOT NULL,
  `User_id` int NOT NULL,
  `User_name` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Report` text NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_appointment`
--

INSERT INTO `doctor_appointment` (`Id`, `Doctor_id`, `App_date`, `App_time`, `User_id`, `User_name`, `Report`, `Status`) VALUES
(21, 6, '2023-01-09', '09:28:00', 13, 'Zhan Wei', '', 'Rejected'),
(22, 6, '2023-01-07', '06:37:00', 13, 'Zhan Wei', '', 'Accepted'),
(23, 6, '2023-01-07', '06:39:00', 14, 'ricky kee', '', 'Accepted'),
(24, 5, '2023-01-07', '00:42:00', 13, 'Zhan Wei', '', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `Id` int NOT NULL,
  `Treatment_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Treatment_cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`Id`, `Treatment_name`, `Treatment_cost`) VALUES
(23, 'Eczema ', 500),
(24, 'Sunburn ', 750),
(27, 'Oily skin', 150),
(28, 'Acne', 200);

-- --------------------------------------------------------

--
-- Table structure for table `treatment_appointment`
--

CREATE TABLE `treatment_appointment` (
  `Id` int NOT NULL,
  `Treatment_id` int NOT NULL,
  `Treatment_time` time NOT NULL,
  `Treatment_date` date NOT NULL,
  `User_id` int NOT NULL,
  `Report` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment_appointment`
--

INSERT INTO `treatment_appointment` (`Id`, `Treatment_id`, `Treatment_time`, `Treatment_date`, `User_id`, `Report`) VALUES
(12, 24, '08:28:00', '2023-01-11', 13, ''),
(15, 23, '00:37:00', '2023-01-07', 13, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Dob` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Address` varchar(90) NOT NULL,
  `Phone` varchar(11) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Dp` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Name`, `Email`, `Dob`, `Gender`, `Address`, `Phone`, `Password`, `Dp`) VALUES
(13, 'Zhan Wei', 'wei@mail.com', '1999-06-29', 'Male', 'No.30, Batu Caves, Malaysia', '6019598752', '123', 'userdp/5773_doctor2.jpg'),
(14, 'ricky kee', 'kee@mail.com', '1986-06-06', 'Male', '32, Ampang, Malaysia', '60123456789', '123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `channel`
--
ALTER TABLE `channel`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Doctor_id` (`Doctor_id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `doctor_appointment`
--
ALTER TABLE `doctor_appointment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Users_id` (`User_id`),
  ADD KEY `Doctor_id` (`Doctor_id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `treatment_appointment`
--
ALTER TABLE `treatment_appointment`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Users_id` (`User_id`),
  ADD KEY `Test_id` (`Treatment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctor_appointment`
--
ALTER TABLE `doctor_appointment`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `treatment_appointment`
--
ALTER TABLE `treatment_appointment`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_appointment`
--
ALTER TABLE `doctor_appointment`
  ADD CONSTRAINT `doctor_appointment_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_appointment_ibfk_2` FOREIGN KEY (`Doctor_id`) REFERENCES `doctor` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `treatment_appointment`
--
ALTER TABLE `treatment_appointment`
  ADD CONSTRAINT `treatment_appointment_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `treatment_appointment_ibfk_2` FOREIGN KEY (`Treatment_id`) REFERENCES `treatment` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
