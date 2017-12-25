-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 25, 2017 at 10:51 AM
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
(12, 'Wella 500 ml', 'uploads/flag_britain_color_texture_background_55280_1920x1080.jpg', 'flag_britain_color_texture_background_55280_1920x1080.jpg', '2018-08-01', '2018-01-29', 10, '2017-12-25'),
(13, 'Wella 500 ml', 'uploads/black_white_pattern_shape_patterns_7236_1920x1080.jpg', 'black_white_pattern_shape_patterns_7236_1920x1080.jpg', '2018-08-01', '2018-01-29', 5, '2017-12-25'),
(14, 'En ny produkt. igen!', 'uploads/board_black_line_texture_background_wood_55220_1920x1080.jpg', 'board_black_line_texture_background_wood_55220_1920x1080.jpg', '2018-08-01', '2018-01-29', 5, '2017-12-25'),
(15, 'En ny produkt. igen!', 'uploads/batman_arkham_city_joker_smile_suit_flower_fan_art_black_and_white_19699_1920x1080.jpg', 'batman_arkham_city_joker_smile_suit_flower_fan_art_black_and_white_19699_1920x1080.jpg', '2018-08-01', '2018-01-28', 12, '2017-12-25');

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
(16, 12, 2),
(17, 13, 2),
(18, 14, 2),
(19, 15, 2);

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
(1, 'Stockholm City'),
(2, 'Stockholm Globen'),
(3, 'Göteborg'),
(4, 'Malmö'),
(5, 'Uppsala'),
(6, 'Västerås'),
(7, 'Örebro'),
(8, 'Linköping'),
(9, 'Jönköping'),
(10, 'Norrköping'),
(11, 'Växjö');

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
  MODIFY `image_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `images_shops`
--
ALTER TABLE `images_shops`
  MODIFY `images_shops_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `shop_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
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
