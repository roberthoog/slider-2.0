-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2018 at 02:29 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `image_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `path` text,
  `filename` varchar(100) DEFAULT NULL,
  `display_start_date` varchar(10) DEFAULT NULL,
  `display_end_date` varchar(10) DEFAULT NULL,
  `display_delay` int(11) UNSIGNED DEFAULT NULL,
  `upload_date` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`image_id`, `title`, `path`, `filename`, `display_start_date`, `display_end_date`, `display_delay`, `upload_date`) VALUES
(53, '1', 'uploads/1.jpg', '1.jpg', '2018-01-19', '2018-01-20', 5, '2018-01-18'),
(54, '2', 'uploads/2.jpg', '2.jpg', '2018-01-18', '2018-01-24', 5, '2018-01-18'),
(55, '3', 'uploads/12.jpg', '12.jpg', '2018-01-11', '2018-02-04', 5, '2018-01-19'),
(56, '4', 'uploads/81557253.jpg', '81557253.jpg', '2018-01-15', '2018-02-28', 4, '2018-01-19'),
(58, '7', 'uploads/batman.jpg', 'batman.jpg', '2018-01-25', '2018-02-26', 5, '2018-01-21'),
(59, '10', 'uploads/flag_britain.jpg', 'flag_britain.jpg', '2018-03-01', '2018-04-01', 5, '2018-01-19');

-- --------------------------------------------------------

--
-- Table structure for table `images_shops`
--

CREATE TABLE `images_shops` (
  `images_shops_id` int(11) UNSIGNED NOT NULL,
  `image_id` int(11) UNSIGNED NOT NULL,
  `shop_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images_shops`
--

INSERT INTO `images_shops` (`images_shops_id`, `image_id`, `shop_id`) VALUES
(65, 53, 12),
(66, 54, 12),
(67, 55, 12),
(68, 56, 12),
(70, 58, 12),
(71, 59, 12);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `shop_id` int(11) UNSIGNED NOT NULL,
  `city` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`shop_id`, `city`) VALUES
(12, 'Alla');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `images_shops`
--
ALTER TABLE `images_shops`
  ADD PRIMARY KEY (`images_shops_id`),
  ADD KEY `fk1` (`image_id`),
  ADD KEY `fk2` (`shop_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`shop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `image_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `images_shops`
--
ALTER TABLE `images_shops`
  MODIFY `images_shops_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `shop_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `images_shops`
--
ALTER TABLE `images_shops`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`image_id`) REFERENCES `images` (`image_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`shop_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
