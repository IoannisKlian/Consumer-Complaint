-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1:3306
-- Χρόνος δημιουργίας: 11 Δεκ 2019 στις 14:59:55
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
-- Δομή πίνακα για τον πίνακα `complaint`
--

DROP TABLE IF EXISTS `complaint`;
CREATE TABLE IF NOT EXISTS `complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complainant_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) CHARACTER SET latin1 NOT NULL,
  `phonenumber` varchar(50) CHARACTER SET latin1 NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_adress` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(50) CHARACTER SET latin1 NOT NULL,
  `company_taxid` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subdate` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `complaint`
--

INSERT INTO `complaint` (`id`, `complainant_name`, `email`, `phonenumber`, `company_name`, `company_adress`, `company_phone`, `company_taxid`, `description`, `subdate`, `status`) VALUES
(27, 'Alpha Beta (Ανώνυμη)', 'delta@delta', '123', 'Epsilon', 'Zeta', 'empty', '456', 'Ita', '2019-12-11 15:24:13', 1),
(28, 'Theta Iota (Επώνυμη)', 'Kappa@lambda', '12345', 'Mi', 'NI', '54321', '109876', 'Xi', '2019-12-11 15:36:30', 1),
(29, 'Omikron Pi (Ανώνυμη)', 'ro@sigma', '13579', 'Taph', 'Ipsilon', '11111111111111', '246810', 'Fi', '2019-12-11 15:49:44', 1),
(30, 'Chi Psi (Επώνυμη)', '09887@44123', '123456', 'Omega', 'empty', 'empty', 'empty', 'Testing Testing 123', '2019-12-11 15:56:47', 0),
(40, 'NDbrFmgX TfzDCQpi (Ανώνυμη)', 'gpyNUJbC@gmail.com', '48059011', 'qALCgwlD', 'umCBMDvR 100', '71638058', '92606807', 'JtPJxVhHewndIBFXQKvUugiclXhGaXACvlryIhDkYQPuxBFObcnqwCJItlcxdPoqrKjIJKSWrSmDrwfQwmJUqjubLGnkCfHpByYX', '2019-12-11 16:34:15', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
