
-- Βάση δεδομένων: `consumer_complaint`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `complainant_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) CHARACTER SET latin1 NOT NULL,
  `phonenumber` varchar(50) CHARACTER SET latin1 NOT NULL,
  `company_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_adress` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_phone` varchar(50) CHARACTER SET latin1 NOT NULL,
  `company_taxid` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subdate` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `complaint`
--

INSERT INTO `complaint` (`id`, `complainant_name`, `email`, `phonenumber`, `company_name`, `company_adress`, `company_phone`, `company_taxid`, `description`, `subdate`, `status`) VALUES
(1, 'empty', 'empty', 'empty', 'test1', 'empty', 'empty', 'empty', 'test1', '2019-11-28 15:18:59', 1),
(2, 'empty', 'empty', 'empty', 'test2', 'empty', 'empty', 'empty', 'test2', '2019-11-28 15:19:13', 0),
(3, 'empty', 'empty', 'empty', 'test3 assign to else', 'empty', 'empty', 'empty', 'test3 to else', '2019-11-28 15:19:37', 1),
(4, 'empty', 'empty', 'empty', 'test4', 'empty', 'empty', 'empty', 'test4', '2019-11-28 15:31:06', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `complaint_log`
--

CREATE TABLE `complaint_log` (
  `complaint_id` int(20) NOT NULL,
  `log` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `complaint_log`
--

INSERT INTO `complaint_log` (`complaint_id`, `log`) VALUES
(1, 'Καταχώρηση καταγγελίας - 2019-11-28 15:18:59\n Έγινε ανάληψη από Giannis Klian στις 2019-11-28 15:19:58\ntest1					\r\n				 - 2019-11-28 15:24:50\ntest2 - 2019-11-28 15:25:45\ntest3 - 2019-11-28 15:27:00'),
(2, 'Καταχώρηση καταγγελίας - 2019-11-28 15:19:13'),
(3, 'Καταχώρηση καταγγελίας - 2019-11-28 15:19:37\n Έγινε ανάληψη από Dimos Panagiotaras στις 2019-11-28 15:21:12'),
(4, '\nΚαταχώρηση καταγγελίας - 2019-11-28 15:31:06');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `employee_complaint`
--

CREATE TABLE `employee_complaint` (
  `employee_id` int(11) NOT NULL,
  `complaint_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `employee_complaint`
--

INSERT INTO `employee_complaint` (`employee_id`, `complaint_id`, `datetime`) VALUES
(1, 1, '2019-11-28 15:19:58'),
(3, 3, '2019-11-28 15:21:12');

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
(1, 'giannisK', '1234', 'iklian@athtech.gr', 'Giannis Klian'),
(3, 'dimosPan', '1234', 'dpanagiotars@athtech.gr', 'Dimos Panagiotaras');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `complaint_log`
--
ALTER TABLE `complaint_log`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Ευρετήρια για πίνακα `employee_complaint`
--
ALTER TABLE `employee_complaint`
  ADD PRIMARY KEY (`complaint_id`),
  ADD KEY `foreign_key_employee_id` (`employee_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT για πίνακα `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `govrn_emp`
--
ALTER TABLE `govrn_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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

