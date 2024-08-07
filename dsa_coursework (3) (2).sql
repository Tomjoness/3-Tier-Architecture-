-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 10:26 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsa_coursework`
--

-- --------------------------------------------------------

--
-- Table structure for table `citys`
--

CREATE TABLE `citys` (
  `id` int(11) NOT NULL DEFAULT 0,
  `c_name` varchar(45) DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `size` int(11) NOT NULL,
  `country` varchar(45) NOT NULL,
  `c_lat` decimal(11,6) NOT NULL,
  `c_long` decimal(11,6) NOT NULL,
  `c_wiki_page` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `citys`
--

INSERT INTO `citys` (`id`, `c_name`, `population`, `size`, `country`, `c_lat`, `c_long`, `c_wiki_page`) VALUES
(28218, 'Birmingham', 1149000, 268, 'english', '52.489471', '-1.898575', 'https://en.wikipedia.org/wiki/Birmingham'),
(727232, 'chicago', 2697000, 607, 'america', '41.881832', '-87.623177', 'https://en.wikipedia.org/wiki/Chicago');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `city_fk` int(11) NOT NULL,
  `poi_fk` int(11) NOT NULL,
  `photo_fk` int(11) NOT NULL,
  `date_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `city_fk`, `poi_fk`, `photo_fk`, `date_time`) VALUES
(1, 727232, 1, 1, ''),
(2, 727232, 1, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `site_link` varchar(90) NOT NULL,
  `poid_id_fk` int(11) NOT NULL,
  `citys_id_fk` int(11) NOT NULL,
  `desc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `site_link`, `poid_id_fk`, `citys_id_fk`, `desc`) VALUES
(1, 'https://www.birminghammuseums.org.uk/bmag/visit', 1, 28218, 'Birmingham museum'),
(2, 'https://www.cadburyworld.co.uk/', 2, 28218, 'cadbury world '),
(3, 'https://www.visitsealife.com/birmingham/', 3, 28218, 'sealife'),
(4, 'https://www.birminghambotanicalgardens.org.uk/', 4, 28218, 'gardens'),
(5, 'https://www.bullring.co.uk/', 5, 28218, 'bull ring'),
(6, 'https://visitbirmingham.com/things-to-see-and-do/the-library-of-birmingham-p1321551', 6, 28218, 'library'),
(7, 'https://www.inflatanation.com/locations/birmingham/', 7, 28218, 'theme park'),
(8, 'https://www.academymusicgroup.com/o2academybirmingham/', 8, 28218, 'music venue'),
(9, 'https://www.artic.edu/', 9, 727232, 'art'),
(10, 'https://navypier.org/', 10, 727232, 'navy pier'),
(11, 'https://www.chicago.gov/city/en/depts/dca/supp_info/millennium_park.html', 11, 727232, 'park'),
(12, 'https://www.sheddaquarium.org/', 12, 727232, 'aquarium'),
(13, 'https://www.msichicago.org/', 13, 727232, 'museum'),
(14, 'https://en.wikipedia.org/wiki/Cloud_Gate', 14, 727232, 'cloud gate'),
(15, 'https://www.willistower.com/', 15, 727232, 'willis tower'),
(16, 'https://www.fieldmuseum.org/', 16, 727232, 'museum');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `poi_id` int(11) NOT NULL,
  `p_name` varchar(45) DEFAULT NULL,
  `c_id_fk` int(11) DEFAULT NULL,
  `p_dec` varchar(500) DEFAULT NULL,
  `p_rating` varchar(20) DEFAULT NULL,
  `p_lat` decimal(11,6) NOT NULL,
  `p_long` decimal(11,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`poi_id`, `p_name`, `c_id_fk`, `p_dec`, `p_rating`, `p_lat`, `p_long`) VALUES
(1, 'Birmingham Museum  Art Gallery', 28218, 'Museum', '4.4', '52.480080', '-1.903530'),
(2, 'Cadbury World', 28218, 'factory and history of cadbury', '4.3', '52.430020', '-1.932180'),
(3, 'National Sea Life Centre', 28218, 'aquarium', '4.3', '52.478810', '-1.913880'),
(4, 'The Botanical Gardens', 28218, 'tropical rainforest and gardens', '4.5', '52.275947', '-1.554548'),
(5, 'Bullring Grand Central', 28218, 'Shopping center', '4.4', '52.476680', '-1.897660'),
(6, 'Library of Birmingham', 28218, 'Library', '4.5', '52.479680', '-1.908570'),
(7, 'InflataNation Inflatable Theme Park', 28218, 'Theme park of inflatables for families', '4.1', '52.478200', '-1.824870'),
(8, '02 academy', 28218, 'music and concert attraction', '4.6', '52.473300', '-1.899900'),
(9, 'The Art Institute of Chicago', 727232, 'art museum of over 300,000 works', '4.8', '41.880330', '-87.625200'),
(10, 'Navy pier', 727232, 'Former Navy training center draws crowds with carnival rides, restaurants, shops and fireworks.', '4.6', '41.891830', '-87.605160'),
(11, 'Millennium Park', 727232, '24.5 acre green space with a video display the reflective Bean sculpture  an outdoor theater.', '4.8', '41.882600', '-87.622600'),
(12, 'Shedd Aquarium', 727232, 'State-of-the-art indoor aquarium, famous for its variety of habitats and  views of Lake Michigan.\r\n\r\n', '4.6', '41.867540', '-87.614100'),
(13, 'Museum of Science and Industry, Chicago', 727232, 'Sprawling, hands-on museum full of informative, child-friendly scientific industrial exhibits.', '4.7', '41.790540', '-87.583130'),
(14, 'Cloud Gate', 727232, 'Huge outdoor sculpture shaped like a bean and allowing for views from its many mirrored sides.\r\n\r\n', '4.8', '41.882620', '-87.623300'),
(15, 'Willis Tower', 727232, 'Iconic, 110-story skyscraper featuring expansive views of Chicago from its 103rd story Skydeck.', '4.5', '41.878840', '-87.635900'),
(16, 'Field Museum', 727232, 'State-of-the-art museum of science invention, with the worlds largest Tyrannosaurus Rex.', '4.7', '41.866230', '-87.617040');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `t_id` int(11) NOT NULL,
  `t_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`t_id`, `t_name`) VALUES
(1, 'music venue'),
(2, 'shopping center'),
(3, 'attraction'),
(4, 'family'),
(5, 'landmark'),
(6, 'museum ');

-- --------------------------------------------------------

--
-- Table structure for table `types_poi`
--

CREATE TABLE `types_poi` (
  `id` int(11) NOT NULL,
  `p_id_fk` int(11) NOT NULL,
  `t_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types_poi`
--

INSERT INTO `types_poi` (`id`, `p_id_fk`, `t_id_fk`) VALUES
(1, 1, 3),
(2, 1, 6),
(3, 2, 4),
(4, 3, 3),
(5, 10, 3),
(6, 10, 5),
(7, 1, 6),
(8, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcity` (`city_fk`,`poi_fk`,`photo_fk`),
  ADD KEY `poi_` (`poi_fk`),
  ADD KEY `photo_` (`photo_fk`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poid_id` (`poid_id_fk`),
  ADD KEY `city_id` (`citys_id_fk`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`poi_id`),
  ADD KEY `city` (`c_id_fk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
