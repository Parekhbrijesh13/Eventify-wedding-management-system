-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2025 at 06:31 PM
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
-- Database: `eventify`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking_data`
--

CREATE TABLE `booking_data` (
  `booking_id` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `PhoneNumber` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Date` date NOT NULL,
  `NumberOfGuest` int(255) NOT NULL,
  `budget` int(255) DEFAULT NULL,
  `City` varchar(20) NOT NULL,
  `Venue` varchar(255) NOT NULL,
  `FunctionType` varchar(10) NOT NULL,
  `FunctionTime` varchar(10) NOT NULL,
  `status` enum('pending','approved','rejected','confirmed') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking_data`
--

INSERT INTO `booking_data` (`booking_id`, `FullName`, `PhoneNumber`, `Email`, `Date`, `NumberOfGuest`, `budget`, `City`, `Venue`, `FunctionType`, `FunctionTime`, `status`) VALUES
(1, 'Parmar Parth P', '9876543210', 'parth@gmail.com', '2025-08-26', 100, 500000, 'Amreli', 'Tulsi Partyplot Amreli.', 'Wedding', 'Day', 'confirmed'),
(2, 'Parekh brijesh a', '6359061142', 'parekhbrijesh901@gmail.com', '2025-09-03', 100, 50000, 'Amreli', 'Tulsi party plot', 'wedding', 'night', 'approved'),
(4, 'Parekh brijesh a', '6358061142', 'parekhbrijesh902@gmail.com', '2025-09-03', 100, 50000, 'Amreli', 'Tulsi party plot', 'wedding', 'night', 'rejected'),
(5, 'Parekh Brijesh A', '99874563210', 'parth@gmail.com', '2025-09-18', 100, 80000, 'amreli', 'Vrundavan Hall', 'Wedding', 'Day', 'approved'),
(6, 'NIL BHAVIN PAREKH', '6552369875', 'nil@gmail.com', '2025-09-29', 50, 150000, 'AHEMDABAD', 'GreenDivine Special For Night', 'Wedding', 'Evening', 'confirmed'),
(7, 'VISHAL MAKWANA', '7845123698', 'vishal@gmail.com', '2025-09-17', 50, 50000, 'amreli', 'Vrundavan Hall', 'Wedding', 'Evening', 'confirmed');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Help` varchar(50) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`Name`, `Email`, `Phone`, `Help`, `Message`) VALUES
('Parekh Brijesh', 'Parekhbrijesh901@gmail.com', '63590', 'Booking-inquiry.', 'send me your booking details.'),
('Parekh karan', 'karanparekh338@gmail.com', '9904449968', 'Booking-inquiry.', 'nwbdvwdbwjhbdhw');

-- --------------------------------------------------------

--
-- Table structure for table `signup_data`
--

CREATE TABLE `signup_data` (
  `id` int(11) NOT NULL,
  `UserName` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `number` varchar(15) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup_data`
--

INSERT INTO `signup_data` (`id`, `UserName`, `email`, `number`, `Password`) VALUES
(1, 'brijesh', 'parekhbrijesh901@gmail.com', '6359061142', '$2y$10$25B30FiQkgzHrc69bA741.Qrci0Cz1XpToEMvEOZ9t2hqlNojajKC'),
(2, 'karan123', 'karan@example.com', '9737670538', '$2y$10$2pZPyx5qPOVkCdUbqJkeE.C3bXteOW8wFWCz1xvTG8a7lWdFp1cOW'),
(3, 'krish123', 'krish@example.com', '9265903916', '$2y$10$f1wUeXTqLPx4unMAptfACu/JDTZ7ECa4qamqpzNyRddjFOcMlV83W'),
(4, 'parth123', 'parth@gmail.com', '9876543210', '$2y$10$VXBYxQ/AOkUCsvkQI7P0f.UmtK986.ZIsIs9Kos89EAevKtze1OJe'),
(5, 'darshan123', 'darshan@example.com', '9422207777', '$2y$10$jdg1U85wLH1BggDyYrdPZOgpz6T0adYEcCNULgjHZ0YQznXY0a74C'),
(6, 'keyur123', 'keyur@example.com', '9478936589', '$2y$10$o1cBWI6ICmJusQy.sITCf.Hih2sLE6aVvvh1xeDwo3jSTIKBvC1i2'),
(7, 'ankit@123', 'ankit@example.com', '9107778760', '$2y$10$gbsaowOUQOFs.Vu0OTsBc.JHn7UsYuaNcC0estSuMzGqauXYjagkK'),
(8, 'abhi12', 'abhi@gmail.com', '7845125487', '$2y$10$irbsEgiL4KRKZt0qAxmljOujaGTpOEdtSvHdg/9Y2HcOx3AHUTQdK'),
(9, 'nil123', 'nil@gmail.com', '7898745698', '$2y$10$90meGmSFMeb4VPxis16ZsOD6NKU0UcouDjZMcVteefwW1kpKiuR4a'),
(10, 'aryan123', 'aryan@gmail.com', '7898965874', '$2y$10$xRucsH6yyXcZEM15GNHAPuCA.tdwhpND48SfTkEt0Bfg1RovJ9js.'),
(11, 'vishal', 'vishal@gmail.com', '7858741254', '$2y$10$SvjkJouwC5E.Gmda5I9LfehZaryecf5IdcAp7BNmIdJRigJ84UC8O');

-- --------------------------------------------------------

--
-- Table structure for table `venues`
--

CREATE TABLE `venues` (
  `venue_id` int(11) NOT NULL,
  `venue_name` varchar(100) NOT NULL,
  `venue_price` decimal(10,2) NOT NULL,
  `venue_location` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venues`
--

INSERT INTO `venues` (`venue_id`, `venue_name`, `venue_price`, `venue_location`, `capacity`) VALUES
(1, 'Tulsi Partyplot Amreli.', 200000.00, 'Amreli', 300),
(2, 'GreenDivine Special For Night', 250000.00, 'Ahemdabad', 200),
(3, 'Vrundavan Hall', 100000.00, 'surat', 200),
(4, 'ThakarThal bunquet Hall', 300000.00, 'vadodara', 500),
(5, 'Hotel Darshan', 100000.00, 'Rajkot', 150),
(6, 'Ganesh Partyplot', 200000.00, 'jamnagar', 700),
(7, 'Udaypur Royal Suit Destination Wedding', 1500000.00, 'Udaypur', 1500),
(8, 'Heritage Garden Villa', 1500000.00, 'Udaypur', 1500),
(9, 'Your Personal Venue', 0.00, 'Your Location', 0),
(11, 'sahaj hole', 2000.00, 'amreli', 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking_data`
--
ALTER TABLE `booking_data`
  ADD PRIMARY KEY (`booking_id`),
  ADD UNIQUE KEY `PhoneNumber` (`PhoneNumber`,`Email`);

--
-- Indexes for table `signup_data`
--
ALTER TABLE `signup_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `venues`
--
ALTER TABLE `venues`
  ADD PRIMARY KEY (`venue_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking_data`
--
ALTER TABLE `booking_data`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `signup_data`
--
ALTER TABLE `signup_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `venues`
--
ALTER TABLE `venues`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
