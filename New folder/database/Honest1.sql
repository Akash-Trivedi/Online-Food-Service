-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2020 at 03:31 PM
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
  `price` int(3) NOT NULL,
  `itemCategory` int(2) NOT NULL,
  `itemCuisine` int(2) NOT NULL,
  `itemStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `Honest`
--

INSERT INTO `Honest` (`itemId`, `itemName`, `price`, `itemCategory`, `itemCuisine`, `itemStatus`) VALUES
(1, 'Cheese Butter Masala', 150, 1, 1, 1),
(2, 'Paneer Tikka Masala', 200, 1, 1, 1),
(3, 'Mushroom Masala', 230, 1, 1, 1),
(4, 'Paneer Kadhai', 200, 1, 1, 1),
(5, 'Paneer Masala', 140, 1, 1, 1),
(6, 'Tawa Paneer', 210, 1, 1, 1),
(7, 'Chilli Paneer', 180, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Honest`
--
ALTER TABLE `Honest`
  ADD PRIMARY KEY (`itemId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Honest`
--
ALTER TABLE `Honest`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
