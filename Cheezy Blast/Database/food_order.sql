-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 06:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `Full_Name` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `Full_Name`, `Username`, `Password`) VALUES
(117, 'Sandeepa Sudharaka', 'Sandeepa@admin', '0000'),
(118, 'Heshan Praneeth', 'Heshan@admin', '0000'),
(119, 'Pubudu Lakshan', 'Pubudu@admin', '0000'),
(122, 'Sandeepa2', 'Sandeepa@admin', '0000');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(10) UNSIGNED NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Category_Image_Name` varchar(255) NOT NULL,
  `Featured` varchar(10) NOT NULL,
  `Active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Title`, `Category_Image_Name`, `Featured`, `Active`) VALUES
(44, 'Fried Rice', 'Food_Category_339.jpg', 'Yes', 'Yes'),
(45, 'Rice and Curry', 'Food_Category_535.jpg', 'Yes', 'Yes'),
(46, 'Pizza', 'Food_Category_697.jpg', 'Yes', 'Yes'),
(47, 'Burger', 'Food_Category_811.jpg', 'Yes', 'Yes'),
(48, 'Short Eats', 'Food_Category_614.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_ID` int(12) NOT NULL,
  `Full_Name` varchar(200) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile_number` int(20) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_ID`, `Full_Name`, `Username`, `Email`, `Mobile_number`, `Address`, `Password`) VALUES
(16, 'Nimal Gunasekara', 'Nimal@96', 'Nimal96@gmail.com', 712345678, '11/2B, Sumana Thissa Road.', 'Nima123');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_ID` int(10) NOT NULL,
  `Full_Name` varchar(250) NOT NULL,
  `Feedback` varchar(255) NOT NULL,
  `Satisfaction` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`Feedback_ID`, `Full_Name`, `Feedback`, `Satisfaction`) VALUES
(6, 'Heshan', 'Very Simply and friendly', 'Very satisfied');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `Food_ID` int(10) UNSIGNED NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Food_Description` text NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Food_Image_Name` varchar(200) NOT NULL,
  `Category_ID` int(10) UNSIGNED NOT NULL,
  `Featured` varchar(10) NOT NULL,
  `Active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`Food_ID`, `Title`, `Food_Description`, `Price`, `Food_Image_Name`, `Category_ID`, `Featured`, `Active`) VALUES
(16, 'Beef Kottu', 'Fresh Beef, \r\n', '1200.00', 'Food_Name_83.jpg', 43, 'Yes', 'Yes'),
(17, 'Cheese Kottu', 'kottu', '1800.00', 'Food_Name_553.jpg', 43, 'Yes', 'Yes'),
(18, 'Chicken And Cheese Kottu.', 'Fresh Chicken', '2500.00', 'Food_Name_847.jpg', 43, 'Yes', 'Yes'),
(19, 'Chicken Kottu', 'Chicken', '1900.00', 'Food_Name_926.jpg', 43, 'Yes', 'Yes'),
(20, 'Egg Kottu', 'Egg', '1500.00', 'Food_Name_944.jpg', 43, 'Yes', 'Yes'),
(21, 'Pork Kottu', 'Pork', '2000.00', 'Food_Name_340.jpg', 43, 'Yes', 'Yes'),
(22, 'Roast Chicken Kottu', 'Checken', '1900.00', 'Food_Name_672.jpg', 43, 'Yes', 'Yes'),
(23, 'Chicken Fride Rice', 'Checken', '1800.00', 'Food_Name_35.jpg', 44, 'Yes', 'Yes'),
(24, 'Egg Fried Rice', 'Egg', '1700.00', 'Food_Name_304.jpg', 44, 'Yes', 'Yes'),
(25, 'Fish Fried Rice', 'Fish', '1900.00', 'Food_Name_223.jpg', 44, 'Yes', 'Yes'),
(26, 'Mix Fried Rice', 'MIx', '2100.00', 'Food_Name_798.jpg', 44, 'Yes', 'Yes'),
(27, 'BBQ Chicken Pizza', 'BBQ', '2200.00', 'Food_Name_803.jpg', 46, 'Yes', 'Yes'),
(28, 'Cheese Pizza', 'Cheese Pizza', '2000.00', 'Food_Name_773.jpg', 46, 'Yes', 'Yes'),
(29, 'Bean Burger', 'Bean', '1200.00', 'Food_Name_257.jpg', 47, 'Yes', 'Yes'),
(30, 'Cheese Burger', 'Cheese Burger', '1500.00', 'Food_Name_128.jpg', 47, 'Yes', 'Yes'),
(31, 'Chicken Burger', 'Chicken', '1400.00', 'Food_Name_242.jpg', 47, 'Yes', 'Yes'),
(32, 'Beef Rice and Curry', 'Beef', '1500.00', 'Food_Name_173.jpg', 45, 'Yes', 'Yes'),
(33, 'Chicken Rice and Curry', 'Chicken', '1300.00', 'Food_Name_436.jpg', 45, 'Yes', 'Yes'),
(34, 'Buns Short Eats', 'Buns', '200.00', 'Food_Name_655.jpg', 48, 'Yes', 'Yes'),
(35, 'Rolls Short Eats', 'Rolld', '150.00', 'Food_Name_529.jpg', 48, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_ID` int(10) UNSIGNED NOT NULL,
  `Food` varchar(150) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  `Order_Date` datetime NOT NULL,
  `Order_Status` varchar(50) NOT NULL,
  `Customer_Name` varchar(200) NOT NULL,
  `Customer_Contact` varchar(20) NOT NULL,
  `Customer_Email` varchar(150) NOT NULL,
  `Customer_Address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_ID`, `Food`, `Price`, `Qty`, `Total`, `Order_Date`, `Order_Status`, `Customer_Name`, `Customer_Contact`, `Customer_Email`, `Customer_Address`) VALUES
(18, 'Chicken And Cheese Kottu.', '2500.00', 2, '5000.00', '2023-02-07 04:59:38', 'Delivered', 'Heshan', '0773016669', 'Pubudulaksahan@gmail.com', 'Mathara'),
(19, 'Cheese Burger', '1500.00', 3, '4500.00', '2023-02-07 05:03:28', 'Delivered', 'Sandeepa Sudharaka', '0715691384', 'jrsandeepa1999@gmail.com', '80/A/1,Mudunkotuwa West, Matuwagala, Kiriella.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_ID`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`Food_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Order_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_ID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `Food_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Order_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
