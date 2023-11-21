-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2023 at 11:47 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cocomelon`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `Book_Str` char(2) NOT NULL DEFAULT 'B',
  `Book_No` int(4) NOT NULL,
  `Book_ID` char(5) NOT NULL,
  `Cust_ID` char(5) NOT NULL,
  `Trainer_ID` char(5) DEFAULT NULL,
  `Book_Date` date NOT NULL,
  `Book_StartTime` time NOT NULL,
  `Book_EndTime` time NOT NULL,
  `Status` text NOT NULL,
  `Court` char(5) NOT NULL,
  `Amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`Book_Str`, `Book_No`, `Book_ID`, `Cust_ID`, `Trainer_ID`, `Book_Date`, `Book_StartTime`, `Book_EndTime`, `Status`, `Court`, `Amount`) VALUES
('B', 1, 'B1', 'U1', '', '2023-10-02', '15:00:00', '17:00:00', 'Booked', '1', 16.00),
('B', 2, 'B2', 'U1', 'U3', '2023-10-02', '16:00:00', '18:00:00', 'Booked', '2', 56.00),
('B', 3, 'B3', '', '', '2023-10-02', '10:00:00', '11:00:00', 'Booked', '3', 30.00),
('B', 4, 'B4', '', '', '2023-10-03', '20:00:00', '22:00:00', 'Booked', '1', 30.00),
('B', 5, 'B5', 'U5', 'U7', '2023-10-04', '15:00:00', '16:00:00', 'Booked', '2', 28.00),
('B', 6, 'B6', 'U6', '', '2023-10-05', '14:00:00', '15:00:00', 'Booked', '4', 8.00),
('B', 8, 'B8', 'U6', '', '2023-10-04', '14:00:00', '16:00:00', 'Booked', '4', 16.00),
('B', 10, 'B10', '', '', '2023-10-03', '10:00:00', '11:00:00', 'Booked', '1', 15.00),
('B', 11, 'B11', 'U6', '', '2023-10-11', '15:00:00', '17:00:00', 'Booked', '2', 16.00),
('B', 15, 'B15', 'U5', 'U7', '2023-10-07', '18:00:00', '19:00:00', 'Booked', '3', 28.00),
('B', 17, 'B17', 'U1', '', '2023-10-10', '14:00:00', '16:00:00', 'Cancelled', '4', 16.00),
('B', 19, 'B19', 'U6', '', '2023-10-13', '16:00:00', '18:00:00', 'Booked', '5', 8.00),
('B', 22, 'B22', 'U6', '', '2023-10-16', '21:00:00', '22:00:00', 'Booked', '5', 8.00),
('B', 23, 'B23', 'U6', '', '2023-10-17', '21:00:00', '23:00:00', 'Booked', '2', 16.00),
('B', 24, 'B24', 'U6', '', '2023-10-19', '14:00:00', '16:00:00', 'Booked', '1', 16.00),
('B', 25, 'B25', 'U1', '', '2023-10-10', '10:00:00', '11:00:00', 'Booked', '4', 8.00),
('B', 26, 'B26', 'U1', '', '2023-10-30', '10:00:00', '11:00:00', 'Booked', '20', 8.00),
('B', 27, 'B27', 'U4', '', '2023-10-31', '19:00:00', '22:00:00', 'Booked', '1', 24.00),
('B', 28, 'B28', 'U4', '', '2023-10-31', '19:00:00', '22:00:00', 'Booked', '1', 24.00),
('B', 30, 'B30', 'U1', '', '2023-11-15', '22:00:00', '23:00:00', 'Cancelled', '1', 8.00),
('B', 31, 'B31', 'U1', 'U3', '2023-11-15', '08:00:00', '11:00:00', 'Booked', '1', 84.00),
('B', 32, 'B32', 'U6', '', '2023-11-30', '13:00:00', '16:00:00', 'Cancelled', '1', 24.00),
('B', 33, 'B33', 'U6', '', '2023-11-30', '17:00:00', '19:00:00', 'Cancelled', '14', 16.00),
('B', 34, 'B34', 'U6', '', '2023-12-01', '18:00:00', '20:00:00', 'Cancelled', '1', 16.00),
('B', 35, 'B35', 'U6', '', '2023-12-01', '09:00:00', '11:00:00', 'Booked', '10', 16.00),
('B', 36, 'B36', '', '', '2023-11-16', '16:00:00', '19:00:00', 'Booked', '15', 45.00);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_Str` char(2) NOT NULL DEFAULT 'F',
  `Feedback_No` int(4) NOT NULL,
  `Feedback_ID` char(5) NOT NULL,
  `Feedback_Date` date NOT NULL,
  `User_ID` char(5) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone_Num` varchar(11) NOT NULL,
  `Category` varchar(20) NOT NULL,
  `Subject` varchar(30) NOT NULL,
  `Description` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Feedback_Str`, `Feedback_No`, `Feedback_ID`, `Feedback_Date`, `User_ID`, `Email`, `Phone_Num`, `Category`, `Subject`, `Description`) VALUES
('F', 1, 'F1', '2023-10-04', NULL, 'j1234@email.com', '1234567890', 'Classes', 'Hi', 'Hi'),
('F', 2, 'F2', '2023-10-28', NULL, 'test@gmail.com', '123345', 'Others', 'hi', 'hi'),
('F', 3, 'F3', '2023-11-01', 'U1', 'jyeelau2002@gmail.com', '123345', 'facilities', 'Design', 'hi'),
('F', 4, 'F4', '2023-11-10', 'U6', 'test@gmail.com', '123345', 'classes', 'Design ', 'lablabla');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `User_ID` char(5) NOT NULL,
  `Status` text NOT NULL,
  `Active_Date` date NOT NULL,
  `End_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`User_ID`, `Status`, `Active_Date`, `End_Date`) VALUES
('U1', 'Active', '2023-10-05', '2024-10-05'),
('U10', 'Inactive', '2022-12-01', '2023-12-01'),
('U11', 'Active', '2023-10-09', '2024-10-09'),
('U12', 'Active', '2023-10-12', '2024-10-12'),
('U16', 'Active', '2023-10-12', '2024-10-12'),
('U5', 'Active', '2023-10-09', '2024-10-09'),
('U6', 'Active', '2023-10-09', '2024-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_Str` varchar(2) NOT NULL DEFAULT 'P',
  `Payment_No` int(4) NOT NULL,
  `Payment_ID` char(5) NOT NULL,
  `Cust_ID` char(5) NOT NULL,
  `Book_ID` char(5) NOT NULL,
  `Payment_Date` date NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_Str`, `Payment_No`, `Payment_ID`, `Cust_ID`, `Book_ID`, `Payment_Date`, `Amount`, `Status`) VALUES
('P', 1, 'P1', 'U1', 'B1', '2023-10-01', 28.00, 'done'),
('P', 2, 'P2', 'U1', 'B2', '2023-10-01', 16.00, 'done'),
('P', 3, 'P3', '', 'B3', '2023-10-02', 30.00, 'done'),
('P', 4, 'P4', '', 'B4', '2023-10-03', 30.00, 'done'),
('P', 5, 'P5', 'U5', 'B5', '2023-10-04', 28.00, 'done'),
('P', 6, 'P6', 'U6', 'B6', '2023-10-05', 8.00, 'done'),
('P', 7, 'P7', 'U6', 'B7', '2023-10-05', 8.00, 'done'),
('P', 8, 'P8', 'U6', 'B8', '2023-10-04', 16.00, 'done'),
('P', 9, 'P9', 'U6', 'B9', '2023-10-04', 16.00, 'done'),
('P', 10, 'P10', 'U6', 'B10', '2023-10-06', 16.00, 'done'),
('P', 11, 'P11', 'U6', 'B11', '2023-10-06', 16.00, 'done'),
('P', 12, 'P12', 'U6', 'B12', '2023-10-06', 16.00, 'done'),
('P', 13, 'P13', 'U6', 'B13', '2023-10-06', 16.00, 'done'),
('P', 14, 'P14', 'U6', 'B10', '2023-10-06', 16.00, 'done'),
('P', 15, 'P15', '', 'B10', '2023-10-03', 15.00, 'done'),
('P', 16, 'P16', 'U6', 'B11', '2023-10-11', 16.00, 'done'),
('P', 17, 'P17', 'U6', 'B12', '2023-10-11', 16.00, 'done'),
('P', 18, 'P18', 'U6', 'B14', '2023-10-11', 16.00, 'done'),
('P', 19, 'P19', 'U5', 'B15', '2023-10-07', 28.00, 'done'),
('P', 20, 'P20', 'U5', 'B16', '2023-10-07', 28.00, 'done'),
('P', 21, 'P21', 'U1', 'B17', '2023-10-10', 16.00, 'done'),
('P', 22, 'P22', 'U1', 'B18', '2023-10-10', 8.00, 'done'),
('P', 23, 'P23', 'U6', 'B19', '2023-10-13', 8.00, 'done'),
('P', 24, 'P24', 'U6', 'B20', '2023-10-16', 8.00, 'done'),
('P', 25, 'P25', 'U6', 'B21', '2023-10-17', 8.00, 'done'),
('P', 26, 'P26', 'U6', 'B22', '2023-10-16', 8.00, 'done'),
('P', 27, 'P27', 'U6', 'B23', '2023-10-17', 16.00, 'done'),
('P', 28, 'P28', 'U6', 'B24', '2023-10-19', 16.00, 'done'),
('P', 29, 'P29', 'U1', 'B25', '2023-10-10', 8.00, 'done'),
('P', 30, 'P30', 'U1', 'B26', '2023-10-30', 8.00, 'done'),
('P', 31, 'P31', 'U4', 'B27', '2023-10-31', 24.00, 'done'),
('P', 32, 'P32', 'U4', 'B28', '2023-10-31', 24.00, 'done'),
('P', 33, 'P33', 'U1', 'B29', '2023-11-06', 24.00, 'done'),
('P', 34, 'P34', 'U1', 'B30', '2023-11-15', 8.00, 'done'),
('P', 35, 'P35', 'U1', 'B31', '2023-11-15', 84.00, 'done'),
('P', 36, 'P36', 'U6', 'B32', '2023-11-30', 24.00, 'done'),
('P', 37, 'P37', 'U6', 'B33', '2023-11-30', 16.00, 'done'),
('P', 38, 'P38', 'U6', 'B34', '2023-12-01', 16.00, 'done'),
('P', 39, 'P39', 'U6', 'B35', '2023-12-01', 16.00, 'done'),
('P', 40, 'P40', '', 'B36', '2023-11-16', 45.00, 'done');

-- --------------------------------------------------------

--
-- Table structure for table `personal_details`
--

CREATE TABLE `personal_details` (
  `User_Str` varchar(5) DEFAULT 'U',
  `ID` int(5) NOT NULL,
  `User_ID` char(5) DEFAULT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone_Num` varchar(11) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Roles` varchar(10) NOT NULL,
  `Profile_Pic` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personal_details`
--

INSERT INTO `personal_details` (`User_Str`, `ID`, `User_ID`, `Name`, `Email`, `Phone_Num`, `Password`, `Roles`, `Profile_Pic`) VALUES
('U', 1, 'U1', 'Chong Ming Herng', 'chong1@gmail.com', '011123123', '123456', 'member', ''),
('U', 2, 'U2', 'Chong Ming Herng 2', 'chong2@gmail.com', '012123123', '123123', 'staff', ''),
('U', 3, 'U3', 'Mr. Faizal', 'chong3@gmail.com', '013123123', 'Abcd1234', 'trainer', ''),
('U', 4, 'U4', 'Joeyee', 'j1@gmail.com', '014123123', '123456', 'head', 'badminton.jpg'),
('U', 6, 'U6', 'Test', 'swetesting1@gmail.com', '017123456', 'Swetest20001', 'member', 'badminton.jpg'),
('U', 7, 'U7', 'Mr. Shan', 'yagulan@gmail.com', '014123456', '123456', 'trainer', ''),
('U', 8, 'U8', 'Yagu', 'yagulan1@gmail.com', '014123456', '123456', 'staff', ''),
('U', 9, 'U9', 'Alicia', 'alicia@gmail.com', '015456456', '0123456', 'head', ''),
('U', 10, 'U10', 'alicia1', 'alicia1@gmail.com', '0123456456', 'Abcde12345@', 'member', ''),
('U', 11, 'U11', 'joeyee', 'test@gmail.com', '01234567', 'Abcd1234', 'member', ''),
('U', 12, 'U12', 'test', 'test1@gmail.com', '0123123123', 'Abcd1234', 'member', ''),
('U', 16, 'U16', 'Chong', 'chong09980@gmail.com', '01234569', 'Swe20001', 'member', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `Refund_Str` varchar(2) NOT NULL DEFAULT 'R',
  `Refund_No` int(4) NOT NULL,
  `Refund_ID` char(5) NOT NULL,
  `Refund_Date` date NOT NULL,
  `Book_ID` char(5) NOT NULL,
  `User_ID` char(5) NOT NULL,
  `Bank` varchar(30) NOT NULL,
  `Bank_Name` varchar(40) NOT NULL,
  `Bank_Acc` int(15) NOT NULL,
  `Status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`Refund_Str`, `Refund_No`, `Refund_ID`, `Refund_Date`, `Book_ID`, `User_ID`, `Bank`, `Bank_Name`, `Bank_Acc`, `Status`) VALUES
('R', 1, 'R1', '2023-10-02', 'B1', 'U1', 'Maybank', 'ABDCS', 123456789, 'approve'),
('R', 2, 'R2', '2023-10-02', 'B2', 'U1', 'Maybank', 'ABDCS', 123456789, 'reject'),
('R', 3, 'R3', '2023-10-28', 'B26', 'U1', 'adaad', 'chong', 123451530, 'pending'),
('R', 8, 'R8', '2023-10-28', 'B28', 'U4', 'adaad', 'joeyee', 123451530, 'pending'),
('R', 9, 'R9', '2023-11-01', 'B30', 'U1', 'adaad', 'chong', 123451530, 'pending'),
('R', 10, 'R10', '2023-11-10', 'B32', 'U6', 'adaad', 'test', 123451530, 'approve'),
('R', 11, 'R11', '2023-11-16', 'B33', 'U6', 'adaad', 'chong', 123451530, 'reject');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `row` int(5) NOT NULL,
  `Trainer_ID` char(5) NOT NULL,
  `Trainer_Name` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `From_Time` time NOT NULL,
  `To_Time` time NOT NULL,
  `Status` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`row`, `Trainer_ID`, `Trainer_Name`, `Date`, `From_Time`, `To_Time`, `Status`) VALUES
(1, 'U3', 'Mr. Faizal', '2023-10-02', '16:00:00', '18:00:00', 'Unavailable'),
(4, 'U7', 'Mr. Shan', '2023-10-04', '15:38:00', '16:38:00', 'Unavailable'),
(5, 'U7', 'Mr. Shan', '2023-10-07', '18:55:00', '19:55:00', 'Unavailable'),
(6, 'U7', 'Mr. Shan', '2023-10-07', '18:55:00', '19:55:00', 'Unavailable'),
(7, 'U3', 'Mr. Faizal', '2023-11-15', '08:00:00', '11:00:00', 'Unavailable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Book_No`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_No`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_No`);

--
-- Indexes for table `personal_details`
--
ALTER TABLE `personal_details`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`Refund_No`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`row`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `Book_No` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_No` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_No` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_details`
--
ALTER TABLE `personal_details`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `Refund_No` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `row` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
