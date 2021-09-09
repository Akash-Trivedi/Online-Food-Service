-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 05, 2020 at 08:35 AM
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
-- Database: `GameToh`
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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryCode` int(3) NOT NULL,
  `countryName` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryCode`, `countryName`) VALUES
(1, 'Indian'),
(2, 'Mexico'),
(3, 'Italy'),
(4, 'Cajun'),
(5, 'Soul'),
(6, 'Thai'),
(7, 'Greek'),
(8, 'American');

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
-- Table structure for table `cuisine`
--

CREATE TABLE `cuisine` (
  `cuisineId` int(11) NOT NULL,
  `cuisineName` varchar(20) COLLATE utf16_unicode_ci NOT NULL,
  `countryCode` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci COMMENT='cuisine and country links.';

--
-- Dumping data for table `cuisine`
--

INSERT INTO `cuisine` (`cuisineId`, `cuisineName`, `countryCode`) VALUES
(1, 'North-Indian', 1),
(2, 'South-Indian', 1),
(3, 'Gujarati-Indian', 1),
(4, 'Kashmiri-Indian', 1),
(5, 'Punjabi-Indian', 1),
(6, 'Mexican', 2),
(7, 'Italian', 3),
(8, 'Cajun', 4),
(9, 'Soul', 5),
(10, 'Thai', 6),
(11, 'Greek', 7),
(12, 'American', 8);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cust_id` int(11) NOT NULL,
  `contact` varchar(10) COLLATE utf16_unicode_ci NOT NULL,
  `full_name` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `twitter_handle` varchar(18) COLLATE utf16_unicode_ci NOT NULL DEFAULT '-',
  `website` varchar(256) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf16_unicode_ci NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cust_id`, `contact`, `full_name`, `city`, `bio`, `twitter_handle`, `website`, `email`, `creation_date`) VALUES
(1, '8090607308', 'Akash Trivedi', 'Kanpur', 'Short coder', '-', '-', 'akash.trivedi14665@marwadieducation.edu.in', '2020-01-31'),
(2, '8980702003', 'Shardendu Awasthi', 'Kanpur', 'Mindfull', '-', '-', 'sawasthi11@gmail.com', '2020-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `deliverer`
--

CREATE TABLE `deliverer` (
  `deliverer_id` int(11) NOT NULL,
  `contact` varchar(10) COLLATE utf16_unicode_ci NOT NULL,
  `profile_photo` blob NOT NULL,
  `email` varchar(256) COLLATE utf16_unicode_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

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
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `itemId` int(11) NOT NULL,
  `itemName` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `restaurantId` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'image/fooddefault.png',
  `price` int(3) NOT NULL,
  `itemCategory` int(2) NOT NULL,
  `cuisineId` int(2) NOT NULL,
  `itemStatus` int(1) NOT NULL,
  `rating` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`itemId`, `itemName`, `restaurantId`, `photo`, `price`, `itemCategory`, `cuisineId`, `itemStatus`, `rating`) VALUES
(1, 'Cheese Butter Masala', 2, 'image/fooddefault.png', 150, 1, 1, 1, '0'),
(2, 'Paneer Tikka Masala', 2, 'image/fooddefault.png', 200, 1, 1, 1, '0'),
(3, 'Mushroom Masala', 2, 'image/fooddefault.png', 230, 1, 1, 1, '0'),
(4, 'Paneer Kadhai', 2, 'image/fooddefault.png', 200, 1, 1, 1, '0'),
(5, 'Paneer Masala', 2, 'image/fooddefault.png', 140, 1, 1, 1, '0'),
(6, 'Tawa Paneer', 2, 'image/fooddefault.png', 210, 1, 1, 1, '0'),
(7, 'Chilli Paneer', 2, 'image/fooddefault.png', 180, 1, 1, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `orderSummary`
--

CREATE TABLE `orderSummary` (
  `productName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `ordeId` int(11) NOT NULL,
  `restaurantId` int(2) NOT NULL,
  `quantity` int(2) NOT NULL,
  `price` int(3) NOT NULL,
  `dateOfOrder` date NOT NULL DEFAULT current_timestamp(),
  `timeOfOrder` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderSummary`
--

INSERT INTO `orderSummary` (`productName`, `userId`, `ordeId`, `restaurantId`, `quantity`, `price`, `dateOfOrder`, `timeOfOrder`) VALUES
('Chilli Paneer', 1, 1, 2, 1, 250, '2020-03-20', '15:51:34'),
('Biryani', 2, 2, 2, 2, 100, '2020-03-20', '18:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `restaurantId` int(11) NOT NULL,
  `contact` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nm` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `street` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rstate` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `verified` int(1) NOT NULL,
  `std` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `request` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`restaurantId`, `contact`, `nm`, `street`, `city`, `rstate`, `verified`, `std`, `request`) VALUES
(1, '8090607308', 'Hayat', 'Bhikaji Cama Palace, Ring Road', 'Delhi', 'Uttar Pradesh', 1, '208012', '2020-03-12 09:26:51'),
(2, '8980702003', 'Honest', 'Kalawad Road , Kotecha Chowk Raiya Road', 'Rajkot', 'Gujarat', 1, '360020', '2020-03-12 09:26:51'),
(3, '8980605632', 'The Grand Thaker', 'Kalawar Road', 'Rajkot', 'Gujarat', 1, '360004', '2020-03-12 09:26:51'),
(4, '7706010032', 'Vijay InterContinental', 'Tilak Nagar, Near Rave3', 'Kanpur', 'Uttar Pradesh', 1, '208001', '2020-03-12 09:30:23');

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryCode`);

--
-- Indexes for table `credentials`
--
ALTER TABLE `credentials`
  ADD PRIMARY KEY (`adminName`);

--
-- Indexes for table `cuisine`
--
ALTER TABLE `cuisine`
  ADD PRIMARY KEY (`cuisineId`),
  ADD KEY `countryConnection` (`countryCode`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `deliverer`
--
ALTER TABLE `deliverer`
  ADD PRIMARY KEY (`deliverer_id`);

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
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `restaurantConnection` (`restaurantId`),
  ADD KEY `cuisineConnection` (`cuisineId`);

--
-- Indexes for table `orderSummary`
--
ALTER TABLE `orderSummary`
  ADD PRIMARY KEY (`ordeId`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurantId`);

--
-- Indexes for table `userPrivilages`
--
ALTER TABLE `userPrivilages`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryCode` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cuisine`
--
ALTER TABLE `cuisine`
  MODIFY `cuisineId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deliverer`
--
ALTER TABLE `deliverer`
  MODIFY `deliverer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orderSummary`
--
ALTER TABLE `orderSummary`
  MODIFY `ordeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cuisine`
--
ALTER TABLE `cuisine`
  ADD CONSTRAINT `countryConnection` FOREIGN KEY (`countryCode`) REFERENCES `country` (`countryCode`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `cuisineConnection` FOREIGN KEY (`cuisineId`) REFERENCES `cuisine` (`cuisineId`),
  ADD CONSTRAINT `restaurantConnection` FOREIGN KEY (`restaurantId`) REFERENCES `restaurants` (`restaurantId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
