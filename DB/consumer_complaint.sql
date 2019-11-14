-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Φιλοξενητής: 127.0.0.1
-- Χρόνος δημιουργίας: 14 Νοε 2019 στις 15:55:33
-- Έκδοση διακομιστή: 10.1.38-MariaDB
-- Έκδοση PHP: 7.3.2

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

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) CHARACTER SET latin1 NOT NULL,
  `phonenumber` varchar(50) CHARACTER SET latin1 NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_adress` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(50) CHARACTER SET latin1 NOT NULL,
  `company_taxid` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `complaint`
--

INSERT INTO `complaint` (`id`, `name`, `email`, `phonenumber`, `company_name`, `company_adress`, `company_phone`, `company_taxid`, `description`, `datetime`, `status`) VALUES
(62, 'dimos pan', 'dimpan@gmail.gr', '698989898', 'papapaulos', 'sdfkdsalkfdasmlf', 'sadfdsaf', 'dsafasdfasd', 'sadfadsfas', '2019-11-11 12:01:20', 1),
(63, 'giannis klian', 'iklian@athtech.gr', '454654', 'giannaros', 'strathgou', '2108877999', '15355555555', 'skata etairia', '2019-11-14 16:27:29', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `employee_complaint`
--

CREATE TABLE `employee_complaint` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `employee_complaint`
--

INSERT INTO `employee_complaint` (`id`, `employee_id`, `complaint_id`, `datetime`) VALUES
(10, 1, 62, '2019-11-14 16:08:13');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `govrn_emp`
--

CREATE TABLE `govrn_emp` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `govrn_emp`
--

INSERT INTO `govrn_emp` (`id`, `username`, `password`, `email`, `name`) VALUES
(1, 'giannisK', '1234', 'iklian@athtech.gr', 'Giannis Klian');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `employee_complaint`
--
ALTER TABLE `employee_complaint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_employee_id` (`employee_id`),
  ADD KEY `foreign_key_complaint_form_id` (`complaint_id`);

--
-- Ευρετήρια για πίνακα `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `foreign_key_complaint_id` (`complaint_id`);

--
-- Ευρετήρια για πίνακα `govrn_emp`
--
ALTER TABLE `govrn_emp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT για πίνακα `employee_complaint`
--
ALTER TABLE `employee_complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT για πίνακα `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `govrn_emp`
--
ALTER TABLE `govrn_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `employee_complaint`
--
ALTER TABLE `employee_complaint`
  ADD CONSTRAINT `foreign_key_complaint_form_id` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `foreign_key_employee_id` FOREIGN KEY (`employee_id`) REFERENCES `govrn_emp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Περιορισμοί για πίνακα `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `foreign_key_complaint_id` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
