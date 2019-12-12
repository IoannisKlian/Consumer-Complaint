-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1:3306
-- Χρόνος δημιουργίας: 11 Δεκ 2019 στις 15:00:17
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
-- Δομή πίνακα για τον πίνακα `employee_complaint`
--

DROP TABLE IF EXISTS `employee_complaint`;
CREATE TABLE IF NOT EXISTS `employee_complaint` (
  `employee_id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`complaint_id`),
  KEY `foreign_key_employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `employee_complaint`
--

INSERT INTO `employee_complaint` (`employee_id`, `complaint_id`, `datetime`) VALUES
(4, 27, '2019-12-11 15:25:10'),
(1, 28, '2019-12-11 15:37:32'),
(3, 29, '2019-12-11 15:52:55'),
(4, 40, '2019-12-11 16:34:51');

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `employee_complaint`
--
ALTER TABLE `employee_complaint`
  ADD CONSTRAINT `foreign_key_complaint_form_id` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `foreign_key_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `govrn_emp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
