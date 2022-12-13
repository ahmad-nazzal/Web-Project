-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 10:08 PM
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
-- Database: `web_project_agarr`
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

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`user_email`, `item_id`, `type`) VALUES
('nazzala8@gmail.com', 2, 'c'),
('nazzala8@gmail.com', 2, 'l'),
('nazzala8@gmail.com', 3, 'c'),
('nazzala8@gmail.com', 3, 'l'),
('nazzala8@gmail.com', 4, 'l'),
('nazzala8@gmail.com', 7, 'l');

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
  `image_url` varchar(500) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_url`, `item_id`) VALUES
('../client_images/shoes240.webp', 1),
('../client_images/shoes240.webp', 2),
('../client_images/shoes240.webp', 3),
('../client_images/shoes240.webp', 4),
('../client_images/shoes240.webp', 5),
('../client_images/shoes240.webp', 6),
('../client_images/shoes240.webp', 7),
('../client_images/shoes240.webp', 8),
('../client_images/shoes240.webp', 9);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID` int(11) NOT NULL,
  `Description` varchar(512) NOT NULL,
  `Title` varchar(64) NOT NULL,
  `stat` tinyint(1) NOT NULL,
  `price_per_day` int(8) NOT NULL,
  `user_email` varchar(42) DEFAULT NULL,
  `location` varchar(40) DEFAULT NULL,
  `shipping_cost` int(2) DEFAULT NULL,
  `shipping` tinyint(1) DEFAULT NULL,
  `local_pickup` tinyint(1) DEFAULT NULL,
  `cash_method` tinyint(1) DEFAULT NULL,
  `credit_method` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `Description`, `Title`, `stat`, `price_per_day`, `user_email`, `location`, `shipping_cost`, `shipping`, `local_pickup`, `cash_method`, `credit_method`) VALUES
(1, 'nice item', 'our item', 1, 20, 'nazzala8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'hi', 'salah item', 1, 10, 'nazzala8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'hi', 'salah item', 1, 101, 'nazzala8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'hi', 'salah item', 1, 10, 'nazzala8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'hi', 'salah item', 1, 5, 'nazzala8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'hi', 'salah item', 1, 10, 'nazzala8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'hi', 'salah item', 1, 3, 'nazzala8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'hi', 'salah item', 1, 10, 'tanboursalah@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'hi', 'salah item', 1, 8, 'tanboursalah@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_tags`
--

CREATE TABLE `items_tags` (
  `item_id` int(11) DEFAULT NULL,
  `tag_category` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items_tags`
--

INSERT INTO `items_tags` (`item_id`, `tag_category`) VALUES
(3, 'أحذية'),
(2, 'أحذية'),
(3, 'أحذية'),
(2, 'فساتين'),
(3, 'العاب'),
(3, 'فساتين'),
(4, 'أحذية'),
(4, 'فساتين'),
(7, 'العاب'),
(6, 'فساتين'),
(1, 'العاب');

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
  `user_email` varchar(42) NOT NULL,
  `item_id` int(11) NOT NULL,
  `comment_text` varchar(500) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_email`, `item_id`, `comment_text`, `rating`) VALUES
('nazzala8@gmail.com', 2, NULL, 4),
('nazzala8@gmail.com', 3, NULL, 4),
('nazzala8@gmail.com', 4, NULL, 4),
('nazzala8@gmail.com', 5, NULL, 4),
('nazzala8@gmail.com', 6, NULL, 4),
('nazzala8@gmail.com', 7, NULL, 4),
('tanboursalah@gmail.com', 8, NULL, 4),
('tanboursalah@gmail.com', 9, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`category`) VALUES
('أحذية'),
('العاب'),
('فساتين');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Email` varchar(42) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `pass` varchar(42) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `bank_account_number` varchar(12) DEFAULT NULL,
  `bank_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `first_name`, `last_name`, `pass`, `phone`, `bank_account_number`, `bank_name`) VALUES
('nazzala8@gmail.com', 'أحمد', 'نزال', '911aff1adea7e8706b75a00dbbdc9a505b396c46', '0595036181', NULL, NULL),
('tanboursalah@gmail.com', 'salah', 'tanbour', '123456', NULL, NULL, NULL);

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
  ADD PRIMARY KEY (`image_url`,`item_id`),
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
  ADD PRIMARY KEY (`user_email`,`item_id`),
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
