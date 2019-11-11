-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 11, 2019 at 09:02 AM
-- Server version: 5.7.21
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `consumer_complaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaint`
--

DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_adress` varchar(50) NOT NULL,
  `company_phone` varchar(50) NOT NULL,
  `company_taxid` varchar(50) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaint`
--

INSERT INTO `complaint` (`id`, `name`, `email`, `phonenumber`, `company_name`, `company_adress`, `company_phone`, `company_taxid`, `description`, `datetime`, `status`) VALUES
(40, 'a a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2019-10-31 17:01:44', 0),
(41, 'a a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '2019-10-31 17:03:36', 0),
(42, 's ss', 's', 's', 's', 's', 's', 's', 's', '2019-10-31 17:05:46', 0),
(43, 'd d', 'd', 'd', 'd', 'd', 'd', 'd', 'd', '2019-10-31 17:06:38', 0),
(44, 'y y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', '2019-10-31 17:11:24', 0),
(45, 'y y', 'y', 'y', 'y', 'y', 'y', 'y', 'y', '2019-10-31 17:12:43', 0),
(46, 'j j', 'j', 'j', 'j', 'j', 'j', 'j', 'j', '2019-10-31 17:24:58', 0),
(47, 'j j', 'j', 'j', 'j', 'j', 'j', 'j', 'j', '2019-10-31 17:26:33', 0),
(48, 'l l', 'l', 'l', 'l', 'l', 'l', 'l', 'l', '2019-10-31 17:29:47', 0),
(49, 'g g', 'g', 'g', 'g', 'g', 'g', 'g', 's', '2019-11-04 14:06:44', 0),
(50, 'empty', 'g', 'g', 'g', 'g', 'g', 'g', 'g', '2019-11-04 14:12:46', 0),
(51, 'h h', 'empty', 'ws', 'aaaa', 'a', 'a', 'a', 'a', '2019-11-04 14:51:40', 0),
(52, 'd d', 'd', 'd', 'd', 'd', 'dd', 'd', 'd', '2019-11-04 14:51:52', 0),
(53, 'j j', 'j', 'j', 'j', 'j', 'j', 'j', 'jj', '2019-11-11 10:59:37', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
