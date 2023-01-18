-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2023 at 05:29 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahah`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

DROP TABLE IF EXISTS `announcement`;
CREATE TABLE IF NOT EXISTS `announcement` (
  `ann_id` int NOT NULL AUTO_INCREMENT,
  `ann_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ann_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ann_date` date NOT NULL,
  `ann_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ann_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`ann_id`, `ann_title`, `ann_type`, `ann_date`, `ann_description`) VALUES
(1, 'Meeting For BS Faculty', 'Meeting', '2023-01-17', 'All teachers are invited'),
(2, 'Meeting in Mphill Lab', 'Meeting', '2023-01-20', 'kajak');

-- --------------------------------------------------------

--
-- Table structure for table `datesheet`
--

DROP TABLE IF EXISTS `datesheet`;
CREATE TABLE IF NOT EXISTS `datesheet` (
  `ds_id` int NOT NULL AUTO_INCREMENT,
  `ds_file` blob NOT NULL,
  PRIMARY KEY (`ds_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `pro_id` int NOT NULL,
  `pro_std_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_review_date` date NOT NULL,
  `project_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`pro_id`, `pro_std_name`, `pro_name`, `pro_review_date`, `project_description`) VALUES
(200, 'jkkajjks', 'csfds', '2023-01-19', 'eerfefef');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

DROP TABLE IF EXISTS `query`;
CREATE TABLE IF NOT EXISTS `query` (
  `que_id` int NOT NULL,
  `que_std_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `que_std_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `que_std_degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `que_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `que_response` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`que_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`que_id`, `que_std_name`, `que_std_email`, `que_std_degree`, `que_description`, `que_response`) VALUES
(63, 'JKD', 'JDHADK@gmail.com', 'phd', 'kjhsdjkfhfjksa', 'gand marao');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
CREATE TABLE IF NOT EXISTS `timetable` (
  `tt_id` int NOT NULL AUTO_INCREMENT,
  `tt_file` blob NOT NULL,
  PRIMARY KEY (`tt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`tt_id`, `tt_file`) VALUES
(1, 0x74696d657461626c65312e706466),
(2, 0x74696d657461626c65322e706466),
(3, 0x74696d657461626c65332e706466);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
