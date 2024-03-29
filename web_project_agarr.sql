-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2022 at 02:41 PM
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
('../client_images/242.webp', 3),
('../client_images/dress1.webp', 5),
('../client_images/equpym.jpg', 4),
('../client_images/gaming.jfif', 1),
('../client_images/gaming1.png', 6),
('../client_images/gaming3.webp', 7),
('../client_images/shoes241.webp', 2);

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
(1, 'nice item', 'our item', 1, 20, 'nazzala8@gmail.com', NULL, 1, 1, 1, 1, 1),
(2, 'hi', 'salah item', 1, 10, 'nazzala8@gmail.com', 'Nablus', NULL, 1, 1, 1, 1),
(3, 'hi', 'salah item', 1, 101, 'nazzala8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'hi', 'lqlqlq', 1, 10, 'nazzala8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'hi', 'salah item', 1, 5, 'nazzala8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'hi', 'salah item', 1, 10, 'nazzala8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'hi', 'salah item', 1, 3, 'nazzala8@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items_tags`
--

CREATE TABLE `items_tags` (
  `item_id` int(11) NOT NULL,
  `tag_category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items_tags`
--

INSERT INTO `items_tags` (`item_id`, `tag_category`) VALUES
(1, 'العاب'),
(2, 'أدوات رياضة'),
(3, 'أدوات رياضة'),
(4, 'أدوات رياضة'),
(5, 'فساتين'),
(6, 'العاب'),
(7, 'العاب');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `user_email` varchar(42) NOT NULL,
  `item_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`user_email`, `item_id`, `start_date`, `end_date`, `status`) VALUES
('nazzala8@gmail.com', 2, '2022-12-15', '2022-12-23', 1),
('nazzala8@gmail.com', 2, '2022-12-18', '2022-12-03', 0),
('nazzala8@gmail.com', 5, '2022-12-11', '2022-12-14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `user_email` varchar(42) NOT NULL,
  `item_id` int(11) NOT NULL,
  `comment_text` varchar(500) DEFAULT NULL,
  `rating` int(1) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_email`, `item_id`, `comment_text`, `rating`, `id`) VALUES
('nazzala8@gmail.com', 2, 'dfdfdsg', 2, 0),
('nazzala8@gmail.com', 3, NULL, 5, 1),
('nazzala8@gmail.com', 4, NULL, 3, 2),
('nazzala8@gmail.com', 5, NULL, 5, 3),
('nazzala8@gmail.com', 6, NULL, 4, 4),
('nazzala8@gmail.com', 7, NULL, 4, 5);

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
('أدوات رياضة'),
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
  `bank_name` varchar(30) DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `first_name`, `last_name`, `pass`, `phone`, `bank_account_number`, `bank_name`, `image`) VALUES
('nazzala8@gmail.com', 'أحمد', 'نزال', '2438b3d7fdfb5f57c3ecebb4bdd61c365e31ab3a', '0595036181', '5185064654', 'فلسطين', NULL),
('tanboursalah@gmail.com', 'صلاح ', 'طنبور', '7c222fb2927d828af22f592134e8932480637c0d', '0592605800', NULL, NULL, NULL);

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
  ADD PRIMARY KEY (`item_id`,`tag_category`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `tag_category` (`tag_category`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`user_email`,`item_id`,`start_date`),
  ADD KEY `user_email` (`user_email`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
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
  ADD CONSTRAINT `action_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `action_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items_tags`
--
ALTER TABLE `items_tags`
  ADD CONSTRAINT `items_tags_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `items_tags_ibfk_2` FOREIGN KEY (`tag_category`) REFERENCES `tags` (`category`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rent`
--
ALTER TABLE `rent`
  ADD CONSTRAINT `rent_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rent_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_email`) REFERENCES `users` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
