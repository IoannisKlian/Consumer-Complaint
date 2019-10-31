

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_adress` varchar(50) NOT NULL,
  `company_phone` varchar(50) NOT NULL,
  `company_taxid` varchar(50) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `file`
--

CREATE TABLE `file` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `complaint_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `govrn_emp`
--

CREATE TABLE `govrn_emp` (
  `id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `govrn_emp`
--

INSERT INTO `govrn_emp` (`id`, `username`, `password`, `name`) VALUES
(1, 'boredemp1', 'password', 'papadopoulosioannis');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT για πίνακα `file`
--
ALTER TABLE `file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT για πίνακα `govrn_emp`
--
ALTER TABLE `govrn_emp`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `foreign_key_complaint_id` FOREIGN KEY (`complaint_id`) REFERENCES `complaint` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;


