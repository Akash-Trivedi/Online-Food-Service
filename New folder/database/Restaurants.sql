-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2020 at 12:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Restaurants`
--

-- --------------------------------------------------------

--
-- Table structure for table `Honest`
--

CREATE TABLE `Honest` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'image/fooddefault.png',
  `price` int(3) NOT NULL,
  `itemCategory` int(2) NOT NULL,
  `itemCuisine` int(2) NOT NULL,
  `itemStatus` int(1) NOT NULL,
  `rating` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Honest`
--

INSERT INTO `Honest` (`itemId`, `itemName`, `photo`, `price`, `itemCategory`, `itemCuisine`, `itemStatus`, `rating`) VALUES
(1, 'Cheese Butter Masala', 'image/fooddefault.png', 150, 1, 1, 1, '0'),
(2, 'Paneer Tikka Masala', 'image/fooddefault.png', 200, 1, 1, 1, '0'),
(3, 'Mushroom Masala', 'image/fooddefault.png', 230, 1, 1, 1, '0'),
(4, 'Paneer Kadhai', 'image/fooddefault.png', 200, 1, 1, 1, '0'),
(5, 'Paneer Masala', 'image/fooddefault.png', 140, 1, 1, 1, '0'),
(6, 'Tawa Paneer', 'image/fooddefault.png', 210, 1, 1, 1, '0'),
(7, 'Chilli Paneer', 'image/fooddefault.png', 180, 1, 1, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `Imperial`
--

CREATE TABLE `Imperial` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `itemCategory` int(2) NOT NULL,
  `itemCuisine` int(2) NOT NULL,
  `itemStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Talk of the Town`
--

CREATE TABLE `Talk of the Town` (
  `itemId` int(11) NOT NULL,
  `itemCategory` int(2) NOT NULL,
  `itemCuisine` int(2) NOT NULL,
  `itemPrice` int(3) NOT NULL,
  `itemStatus` int(1) NOT NULL,
  `itemName` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Honest`
--
ALTER TABLE `Honest`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `Imperial`
--
ALTER TABLE `Imperial`
  ADD PRIMARY KEY (`itemId`);

--
-- Indexes for table `Talk of the Town`
--
ALTER TABLE `Talk of the Town`
  ADD PRIMARY KEY (`itemId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Honest`
--
ALTER TABLE `Honest`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Imperial`
--
ALTER TABLE `Imperial`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Talk of the Town`
--
ALTER TABLE `Talk of the Town`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
