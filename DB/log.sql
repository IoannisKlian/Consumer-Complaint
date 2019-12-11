-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1:3306
-- Χρόνος δημιουργίας: 11 Δεκ 2019 στις 15:00:51
-- Έκδοση διακομιστή: 5.7.21
-- Έκδοση PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `consumer_complaint`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `complaint_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `log`
--

INSERT INTO `log` (`id`, `description`, `datetime`, `complaint_id`) VALUES
(7, 'Test', '2019-12-11 15:29:17', 27),
(6, 'Έγινε ανάληψη από Alexandros Kanakis', '2019-12-11 15:25:10', 27),
(5, 'Καταχώρηση καταγγελίας', '2019-12-11 15:24:13', 27),
(8, 'Test 2', '2019-12-11 15:31:51', 27),
(9, 'Καταχώρηση καταγγελίας', '2019-12-11 15:37:32', 28),
(10, 'Έγινε ανάληψη από Giannis Klian', '2019-12-11 15:37:32', 28),
(11, '&Tau;&epsilon;&sigma;&tau; 3', '2019-12-11 15:45:28', 28),
(12, 'Καταχώρηση καταγγελίας', '2019-12-11 15:49:44', 29),
(13, 'Έγινε ανάληψη από Dimos Panagiotaras', '2019-12-11 15:52:55', 29),
(14, 'Καταχώρηση καταγγελίας', '2019-12-11 15:56:47', 30),
(15, 'Καταχώρηση καταγγελίας', '2019-12-11 16:18:46', 0),
(16, 'Καταχώρηση καταγγελίας', '2019-12-11 16:19:57', 0),
(17, 'Καταχώρηση καταγγελίας', '2019-12-11 16:21:12', 0),
(18, 'Καταχώρηση καταγγελίας', '2019-12-11 16:27:31', 0),
(19, 'Καταχώρηση καταγγελίας', '2019-12-11 16:28:20', 31),
(20, 'Καταχώρηση καταγγελίας', '2019-12-11 16:29:34', 32),
(21, 'Καταχώρηση καταγγελίας', '2019-12-11 16:29:54', 33),
(22, 'Καταχώρηση καταγγελίας', '2019-12-11 16:30:11', 34),
(23, 'Καταχώρηση καταγγελίας', '2019-12-11 16:30:32', 35),
(24, 'Καταχώρηση καταγγελίας', '2019-12-11 16:31:07', 36),
(25, 'Καταχώρηση καταγγελίας', '2019-12-11 16:31:30', 37),
(26, 'Καταχώρηση καταγγελίας', '2019-12-11 16:31:52', 0),
(27, 'Καταχώρηση καταγγελίας', '2019-12-11 16:32:11', 38),
(28, 'Καταχώρηση καταγγελίας', '2019-12-11 16:32:32', 39),
(29, 'Καταχώρηση καταγγελίας', '2019-12-11 16:34:15', 40),
(30, 'Έγινε ανάληψη από Alexandros Kanakis', '2019-12-11 16:34:51', 40),
(31, 'Testing\r\n', '2019-12-11 16:35:30', 40),
(32, 'Testing 2', '2019-12-11 16:35:52', 40),
(33, 'Testing 3', '2019-12-11 16:38:13', 40);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
