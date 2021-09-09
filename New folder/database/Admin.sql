-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 03, 2020 at 11:51 AM
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
-- Database: `Admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutUs`
--

CREATE TABLE `aboutUs` (
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aboutUs`
--

INSERT INTO `aboutUs` (`name`, `link`) VALUES
('About Us', 'xyz.php'),
('Contact', 'contact.php'),
('Culture', 'culture.php');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

CREATE TABLE `credentials` (
  `adminName` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `passkey` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`adminName`, `passkey`) VALUES
('Akash', 'Motulal');

-- --------------------------------------------------------

--
-- Table structure for table `forFoodies`
--

CREATE TABLE `forFoodies` (
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forFoodies`
--

INSERT INTO `forFoodies` (`name`, `link`) VALUES
('Code of Conduct', 'codeOfConduct.php'),
('Community', 'Community.php');

-- --------------------------------------------------------

--
-- Table structure for table `forRestaurants`
--

CREATE TABLE `forRestaurants` (
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forRestaurants`
--

INSERT INTO `forRestaurants` (`name`, `link`) VALUES
('Add Restaurant', 'add_restaurant.php'),
('Business App', 'app.php'),
('Business Owner Guidelines', 'guidLines.php'),
('Claim your Listing', 'claimListing.php'),
('Products for Businesses', 'products.php');

-- --------------------------------------------------------

--
-- Table structure for table `userPrivilages`
--

CREATE TABLE `userPrivilages` (
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userPrivilages`
--

INSERT INTO `userPrivilages` (`name`, `link`) VALUES
('Bookmark', 'profile/index.php'),
('Log out', 'send_otp/logout.php'),
('Notification', 'profile/index.php'),
('Profile', 'userprofile.php'),
('Review', 'profile/index.php'),
('Settings', 'settings.php'),
('Socialize', 'v.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutUs`
--
ALTER TABLE `aboutUs`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`adminName`);

--
-- Indexes for table `forFoodies`
--
ALTER TABLE `forFoodies`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `forRestaurants`
--
ALTER TABLE `forRestaurants`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `userPrivilages`
--
ALTER TABLE `userPrivilages`
  ADD PRIMARY KEY (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
