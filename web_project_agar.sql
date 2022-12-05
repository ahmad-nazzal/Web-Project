-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 03:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project_agar`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `user_email` varchar(42) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `user_email` varchar(42) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `street` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_url` varchar(2048) NOT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID` int(11) NOT NULL,
  `Description` varchar(512) NOT NULL,
  `Title` varchar(64) NOT NULL,
  `stat` tinyint(1) NOT NULL,
  `shipping_type` varchar(1) NOT NULL,
  `price_per_day` int(8) NOT NULL,
  `payment_method` varchar(1) NOT NULL,
  `user_email` varchar(42) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items_tags`
--

CREATE TABLE `items_tags` (
  `item_id` int(11) DEFAULT NULL,
  `tag_category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `user_email` varchar(42) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_email` varchar(42) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `comment_text` varchar(500) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Email` varchar(42) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `middle_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `birth_date` date NOT NULL,
  `pass` varchar(42) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `bank_account_number` varchar(12) DEFAULT NULL,
  `bank_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`user_email`,`item_id`,`type`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_email` (`user_email`);

--
-- Indexes for table `items_tags`
--
ALTER TABLE `items_tags`
  ADD KEY `item_id` (`item_id`),
  ADD KEY `tag_category` (`tag_category`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD KEY `user_email` (`user_email`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD KEY `user_email` (`user_email`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`category`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `action`
--
ALTER TABLE `action`
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`Email`),
  ADD CONSTRAINT `action_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`ID`);

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`Email`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`ID`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`Email`);

--
-- Constraints for table `items_tags`
--
ALTER TABLE `items_tags`
  ADD CONSTRAINT `items_tags_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`ID`),
  ADD CONSTRAINT `items_tags_ibfk_2` FOREIGN KEY (`tag_category`) REFERENCES `tags` (`category`);

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`Email`),
  ADD CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`ID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`Email`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
