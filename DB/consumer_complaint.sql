

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
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT για πίνακα `employee_complaint`
--
ALTER TABLE `employee_complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT για πίνακα `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT για πίνακα `govrn_emp`
--
ALTER TABLE `govrn_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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


