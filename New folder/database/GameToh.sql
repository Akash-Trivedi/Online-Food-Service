-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2020 at 01:20 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gametoh`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`name`, `link`) VALUES
('About Us', 'aboutus.php'),
('Contact', 'contactUs.php'),
('Culture', 'culture.php');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `categoryName` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `categoryName`) VALUES
(1, 'Beverages'),
(2, 'starter'),
(3, 'Fast Food'),
(4, 'Dinner'),
(5, 'Lunch'),
(6, 'Main Course');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `msgId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`msgId`, `customerId`, `subject`, `date`, `time`) VALUES
(1, 1, 'this website has potential bugs!', '0000-00-00', '0000-00-00 00:00:00'),
(2, 1, 'this website is towards completion!', '0000-00-00', '0000-00-00 00:00:00');

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
  `customerId` int(11) NOT NULL,
  `contact` varchar(10) COLLATE utf16_unicode_ci NOT NULL,
  `fullName` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `twitterHandle` varchar(18) COLLATE utf16_unicode_ci NOT NULL DEFAULT '-',
  `website` varchar(256) COLLATE utf16_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf16_unicode_ci NOT NULL,
  `creationDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customerId`, `contact`, `fullName`, `city`, `bio`, `twitterHandle`, `website`, `email`, `creationDate`) VALUES
(1, '8090607308', 'Akash Trivedi', 'Kanpur', 'Short coder', '-', '-', 'akash.trivedi14665@marwadieducation.edu.in', '2020-01-31'),
(2, '8980702003', 'Shardendu Awasthi', 'Kanpur', 'Mindfull', '-', '-', 'sawasthi11@gmail.com', '2020-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `deliverers`
--

CREATE TABLE `deliverers` (
  `deliverer_id` int(11) NOT NULL,
  `contact` varchar(10) COLLATE utf16_unicode_ci NOT NULL,
  `profile_photo` tinyblob NOT NULL,
  `email` varchar(256) COLLATE utf16_unicode_ci NOT NULL,
  `first_name` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `last_name` varchar(30) COLLATE utf16_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf16_unicode_ci NOT NULL,
  `bio` varchar(100) COLLATE utf16_unicode_ci NOT NULL,
  `gender` varchar(6) COLLATE utf16_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forfoodies`
--

CREATE TABLE `forfoodies` (
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forfoodies`
--

INSERT INTO `forfoodies` (`name`, `link`) VALUES
('Code of Conduct', 'codeOfConduct.php'),
('Community', 'Community.php');

-- --------------------------------------------------------

--
-- Table structure for table `forrestaurants`
--

CREATE TABLE `forrestaurants` (
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `forrestaurants`
--

INSERT INTO `forrestaurants` (`name`, `link`) VALUES
('Add Restaurant', 'addRestaurant.php'),
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
  `categoryId` int(2) NOT NULL,
  `cuisineId` int(2) NOT NULL,
  `itemStatus` int(1) NOT NULL,
  `rating` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`itemId`, `itemName`, `restaurantId`, `photo`, `price`, `categoryId`, `cuisineId`, `itemStatus`, `rating`) VALUES
(1, 'Cheese Butter Masala', 2, 'image/fooddefault.png', 150, 6, 5, 1, '0'),
(2, 'Paneer Tikka Masala', 2, 'image/fooddefault.png', 200, 6, 1, 1, '0'),
(3, 'Mushroom Masala', 2, 'image/fooddefault.png', 230, 6, 1, 1, '0'),
(4, 'Paneer Kadhai', 2, 'image/fooddefault.png', 200, 6, 1, 1, '0'),
(5, 'Paneer Masala', 2, 'image/fooddefault.png', 140, 6, 1, 1, '0'),
(6, 'Tawa Paneer', 2, 'image/fooddefault.png', 210, 6, 1, 1, '0'),
(7, 'Chilli Paneer', 2, 'image/fooddefault.png', 180, 6, 1, 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `ordersummary`
--

CREATE TABLE `ordersummary` (
  `productName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `customerId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `delivererId` int(11) NOT NULL,
  `restaurantId` int(2) NOT NULL,
  `quantity` int(2) NOT NULL,
  `price` int(3) NOT NULL,
  `dateOfOrder` date NOT NULL DEFAULT current_timestamp(),
  `timeOfOrder` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordersummary`
--

INSERT INTO `ordersummary` (`productName`, `customerId`, `orderId`, `delivererId`, `restaurantId`, `quantity`, `price`, `dateOfOrder`, `timeOfOrder`) VALUES
('Chilli Paneer', 1, 1, 0, 2, 1, 250, '2020-03-20', '15:51:34'),
('Biryani', 2, 2, 0, 2, 2, 100, '2020-03-20', '18:44:33');

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
  `verified` int(1) NOT NULL DEFAULT 0,
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
(4, '7706010032', 'Vijay InterContinental', 'Tilak Nagar, Near Rave3', 'Kanpur', 'Uttar Pradesh', 1, '208001', '2020-03-12 09:30:23'),
(5, '8566520650', 'Hotel Vijay Intercontinental', 'Tilka Nagar, near Rave 3', 'Kanpur', 'Uttar Pradesh', 1, '208001', '2020-04-07 10:07:09'),
(6, '8956232012', 'Kanha Galaxy', 'Near Coca Cola Street', 'Kanpur', 'Uttar Pradesh', 1, '208003', '2020-04-07 10:09:18'),
(7, '8956232015', 'Karnavati', 'Near HiraBhai Tower Chokdi', 'Ahmedabad', 'Gujarat', 1, '380002', '2020-04-19 10:17:23'),
(8, '9225623625', 'Jai Ambe Sandwich', 'Harsh Nagar, 80 feet Road', 'Kanpur', 'Uttar Pradesh', 0, '208003', '2020-04-20 10:29:44'),
(9, '8989566524', 'Masand Biryani', 'Gumti No.5, Near Golden Palace', 'Kanpur', 'Uttar Pradesh', 1, '208005', '2020-04-20 10:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `memberId` int(11) NOT NULL,
  `memberName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contactNumber` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profileImage` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`memberId`, `memberName`, `contactNumber`, `email`, `profileImage`) VALUES
(1, 'Akash Trivedi', '8989898989', 'akashsomething@gmail.com', 'image/fooddefault.png'),
(2, 'Maunang Soni', '8989898989', 'maunangsomething@gmail.com', 'image/fooddefault.png');

-- --------------------------------------------------------

--
-- Table structure for table `userprivilages`
--

CREATE TABLE `userprivilages` (
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userprivilages`
--

INSERT INTO `userprivilages` (`name`, `link`) VALUES
('Log out', 'profile.php'),
('Profile', 'profile.php'),
('Review', 'profile.php'),
('Settings', 'profile.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`msgId`),
  ADD KEY `cutomerId` (`customerId`);

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
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `deliverers`
--
ALTER TABLE `deliverers`
  ADD PRIMARY KEY (`deliverer_id`);

--
-- Indexes for table `forfoodies`
--
ALTER TABLE `forfoodies`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `forrestaurants`
--
ALTER TABLE `forrestaurants`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`itemId`),
  ADD KEY `restaurantConnection` (`restaurantId`),
  ADD KEY `cuisineConnection` (`cuisineId`),
  ADD KEY `categoryConnection` (`categoryId`);

--
-- Indexes for table `ordersummary`
--
ALTER TABLE `ordersummary`
  ADD PRIMARY KEY (`orderId`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`restaurantId`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`memberId`);

--
-- Indexes for table `userprivilages`
--
ALTER TABLE `userprivilages`
  ADD PRIMARY KEY (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `msgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deliverers`
--
ALTER TABLE `deliverers`
  MODIFY `deliverer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ordersummary`
--
ALTER TABLE `ordersummary`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `restaurantId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `memberId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contactus`
--
ALTER TABLE `contactus`
  ADD CONSTRAINT `contactus_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customers` (`customerId`);

--
-- Constraints for table `cuisine`
--
ALTER TABLE `cuisine`
  ADD CONSTRAINT `countryConnection` FOREIGN KEY (`countryCode`) REFERENCES `country` (`countryCode`);

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `categoryConnection` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`),
  ADD CONSTRAINT `cuisineConnection` FOREIGN KEY (`cuisineId`) REFERENCES `cuisine` (`cuisineId`),
  ADD CONSTRAINT `restaurantConnection` FOREIGN KEY (`restaurantId`) REFERENCES `restaurants` (`restaurantId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
