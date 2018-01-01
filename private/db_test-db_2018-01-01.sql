-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 01, 2018 at 07:40 PM
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
(15, 'En ny produkt. igen!', 'uploads/batman_arkham_city_joker_smile_suit_flower_fan_art_black_and_white_19699_1920x1080.jpg', 'batman_arkham_city_joker_smile_suit_flower_fan_art_black_and_white_19699_1920x1080.jpg', '2018-08-01', '2018-01-28', 12, '2017-12-25'),
(16, 'Wella 500 ml', 'uploads/anime_blood_murder_boy_girl_29960_1920x1080.jpg', 'anime_blood_murder_boy_girl_29960_1920x1080.jpg', '2017-12-25', '2017-12-27', 15, '2017-12-26'),
(19, 'En ny produkt. igen!', 'uploads/cat_face_glasses.jpg', 'cat_face_glasses.jpg', '2017-12-25', '2018-01-20', 10, '2017-12-26'),
(23, 'Växjö', 'uploads/bokeh.jpg', 'bokeh.jpg', '2017-12-25', '2018-11-20', 20, '2017-12-26'),
(24, 'Wella 500 ml', 'uploads/boats.jpg', 'boats.jpg', '2017-12-25', '2018-01-28', 28, '2017-12-26'),
(25, 'En ny produkt.', 'uploads/dash.jpg', 'dash.jpg', '2017-12-25', '2018-01-28', 4, '2018-01-01'),
(26, 'Blandat', 'uploads/7240329000.jpg', '7240329000.jpg', '2017-12-25', '2018-11-20', 10, '2017-12-26'),
(27, 'Nytt', 'uploads/downloaded (1).jpg', 'downloaded (1).jpg', '2017-12-25', '2018-01-28', 10, '2017-12-26'),
(28, 'Begagnad skatt', 'uploads/1.jpg', '1.jpg', '2017-12-25', '2018-01-28', 10, '2017-12-26'),
(29, '666', 'uploads/6.jpg', '6.jpg', '2017-12-25', '2018-01-28', 10, '2017-12-26'),
(30, '666', 'uploads/4.jpg', '4.jpg', '2017-12-25', '2018-01-28', 10, '2017-12-26'),
(31, '666', 'uploads/3.jpg', '3.jpg', '2017-12-25', '2018-01-28', 10, '2017-12-26'),
(33, 'En ny produkt. igen!', 'uploads/IMG_3430.jpg', 'IMG_3430.jpg', '2017-12-25', '2018-01-29', 20, '2017-12-26'),
(34, 'En ny produkt. igen!', 'uploads/route66.jpg', 'route66.jpg', '2017-12-25', '2018-01-29', 20, '2017-12-26'),
(35, 'En ny produkt.2w2w2w2w2w2', 'uploads/USA,-fullsize-1-140.jpg', 'USA,-fullsize-1-140.jpg', '2017-12-25', '2018-01-29', 20, '2017-12-26'),
(37, 'En ny produkt. igen!', 'uploads/12.jpg', '12.jpg', '2017-12-25', '2018-11-20', 7, '2017-12-30'),
(38, 'anette', 'uploads/anette.jpg', 'anette.jpg', '2017-12-25', '2018-01-28', 5, '2017-12-30'),
(40, 'anette', 'uploads/8x400.jpg', '8x400.jpg', '2017-12-25', '2018-01-28', 5, '2017-12-30'),
(41, 'En ny produkt.', 'uploads/lykta.jpg', 'lykta.jpg', '2017-12-25', '2018-01-29', 20, '2017-12-30'),
(43, 'Örebro', 'uploads/01032015-20150301_232108.jpg', '01032015-20150301_232108.jpg', '2017-12-25', '2018-01-28', 10, '2017-12-30'),
(44, 'Växjö', 'uploads/IMG_20150816_022804.jpg', 'IMG_20150816_022804.jpg', '2017-12-25', '2018-01-28', 10, '2017-12-30'),
(46, 'Växjö', 'uploads/USA, fullsize-1-13.jpg', 'USA, fullsize-1-13.jpg', '2017-12-25', '2018-01-28', 10, '2017-12-30'),
(47, 'Växjö', 'uploads/DSC_0355.JPG', 'DSC_0355.JPG', '2017-12-25', '2018-01-28', 10, '2017-12-30'),
(48, 'Växjö', 'uploads/20150824_171408.jpg', '20150824_171408.jpg', '2017-12-25', '2018-01-28', 10, '2017-12-30'),
(49, 'En ny produkt. igen!', 'uploads/20150817_090807.jpg', '20150817_090807.jpg', '2017-12-25', '2018-01-29', 6, '2017-12-31'),
(50, '123', 'uploads/20150823_134305.jpg', '20150823_134305.jpg', '2018-08-01', '2018-01-29', 5, '2018-01-01'),
(51, '567', 'uploads/09032015-IMG_7155.jpg', '09032015-IMG_7155.jpg', '2018-08-01', '2018-01-28', 6, '2018-01-01');

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
(22, 19, 12),
(28, 25, 12),
(30, 26, 12),
(40, 34, 12),
(61, 49, 12),
(62, 50, 12),
(63, 51, 12);

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
(11, 'Växjö'),
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
  MODIFY `image_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `images_shops`
--
ALTER TABLE `images_shops`
  MODIFY `images_shops_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
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
