

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `complaint`
--

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `complainant_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Μαρία Παπαδημητρίου (Επώνυμη)', 'iklian@athtech.gr', 'empty', 'Nolan', 'Βουλής 31 33 Αθήνα Σύνταγμα', 'empty', 'empty', '&Mu;&epsilon;&tau;ά &alpha;&pi;ό &delta;&epsilon;ί&pi;&nu;&omicron; &sigma;&tau;&omicron; &sigma;&upsilon;&gamma;&kappa;&epsilon;&kappa;&rho;&iota;&mu;έ&nu;&omicron; &epsilon;&sigma;&tau;&iota;&alpha;&tau;ό&rho;&iota;&omicron; &tau;&omicron; &omicron;&pi;&omicron;ί&omicron; &pi;&epsilon;&rho;&iota;&epsilon;ί&chi;&epsilon; &psi;ά&rho;&iota;, &epsilon;&kappa;&delta;&eta;&lambda;ώ&theta;&eta;&kappa;&epsilon; &tau;ά&sigma;&eta; &gamma;&iota;&alpha; &epsilon;&mu;&epsilon;&tau;ό &kappa;&alpha;&iota; &nu;&alpha;&upsilon;&tau;ί&alpha;. Ύ&sigma;&tau;&epsilon;&rho;&alpha; &alpha;&pi;ό ά&mu;&epsilon;&sigma;&eta; &mu;&epsilon;&tau;&alpha;&phi;&omicron;&rho;ά &sigma;&tau;&omicron; &nu;&omicron;&sigma;&omicron;&kappa;&omicron;&mu;&epsilon;ί&omicron;, έ&gamma;&iota;&nu;&epsilon; &delta;&iota;ά&gamma;&nu;&omega;&sigma;&eta; &mu;&epsilon; &tau;&rho;&omicron;&phi;&iota;&kappa;ή &delta;&eta;&lambda;&eta;&tau;&eta;&rho;ί&alpha;&sigma;&eta; &kappa;&alpha;&iota; &sigma;&upsilon;&gamma;&kappa;&epsilon;&kappa;&rho;&iota;&mu;έ&nu;&alpha; &sigma;&alpha;&lambda;&mu;&omicron;&nu;έ&lambda;&alpha;.', '2020-03-05 14:34:08', 0),
(2, 'Δημήτρης Γεωργαντάς (Ανώνυμη)', 'iklian@athtech.gr', 'empty', 'Revoil', 'Θρασυβούλου Λεωφόρος ΝΑΤΟ', 'empty', 'empty', '&Kappa;&alpha;&tau;ά &tau;&omicron;&nu; &alpha;&nu;&epsilon;&phi;&omicron;&delta;&iota;&alpha;&sigma;&mu;ό &sigma;&tau;&omicron; &pi;&rho;&alpha;&tau;ή&rho;&iota;&omicron; &kappa;&alpha;&upsilon;&sigma;ί&mu;&omega;&nu; &delta;&epsilon;&nu; &epsilon;&kappa;&delta;ό&theta;&eta;&kappa;&epsilon; &alpha;&pi;ό&delta;&epsilon;&iota;&xi;&eta;!', '2020-03-05 14:40:39', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `employee_complaint`
--

CREATE TABLE `employee_complaint` (
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

--
-- Άδειασμα δεδομένων του πίνακα `file`
--

INSERT INTO `file` (`id`, `name`, `complaint_id`) VALUES
(1, '1fish.jpg', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `govrn_emp`
--

CREATE TABLE `govrn_emp` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `govrn_emp`
--

INSERT INTO `govrn_emp` (`id`, `username`, `password`, `email`, `name`, `admin`) VALUES
(1, 'iklian', 'iklian', 'john@athtech.gr', 'Ιωάννης Κλιάν', 1),
(3, 'dpanagiotaras', 'dpanagiotaras', 'dpanagiotaras@athtech.gr', 'Δημοσθένης Παναγιωταράς', 0),
(4, 'akanakis', 'akanakis', 'akanakis@athtech.gr', 'Αλέξανδρος Κανάκης', 0),
(5, 'pvasilopoulos', 'pvasilopoulos', 'pvasilopoulos@athtech.gr', 'Πρόδρομος Βασιλόπουλος', 0),
(6, 'igaviotis', 'igaviotis', 'igaviotis@athtech.gr', 'Ιωάννης Γαβιώτης', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `complaint_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Άδειασμα δεδομένων του πίνακα `log`
--

INSERT INTO `log` (`id`, `description`, `datetime`, `complaint_id`) VALUES
(1, 'Καταχώρηση καταγγελίας', '2020-03-05 14:34:08', 1),
(2, 'Καταχώρηση καταγγελίας', '2020-03-05 14:40:39', 2);

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
-- Ευρετήρια για πίνακα `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT για πίνακα `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT για πίνακα `govrn_emp`
--
ALTER TABLE `govrn_emp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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


