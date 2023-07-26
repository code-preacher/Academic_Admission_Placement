
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`id`, `username`, `password`, `name`) VALUES
(1, 'admin', '123456', 'Admin');

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `faculty` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `prerequisites` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `prerequisites` (`id`, `name`) VALUES
(2, 'English Language'),
(3, 'Mathematics'),
(4, 'Physics'),
(5, 'Chemistry'),
(6, 'Geography'),
(7, 'Economics'),
(8, 'History'),
(9, 'Government'),
(10, 'CRK'),
(11, 'Computer Studies'),
(12, 'Dyeing and Bleaching'),
(13, 'Visual Arts'),
(14, 'Fisheries'),
(15, 'Agricultural Science'),
(16, 'Food and Nutrition'),
(17, 'Home Management'),
(18, 'Technical Drawing'),
(19, 'Welding and Fabrication'),
(20, 'Financial Accounting'),
(21, 'Commerce'),
(22, 'Marketing'),
(23, 'French'),
(24, 'Civic Education'),
(25, 'Literature in English'),
(26, 'Biology'),
(27, 'Insurance'),
(28, 'Building Construction'),
(31, 'Home Economics'),
(32, 'Any science subject'),
(33, 'Any art subject'),
(34, 'Any commercial subject');


CREATE TABLE `school_courses` (
  `id` int(11) NOT NULL,
  `course_id` int(3) NOT NULL,
  `school_id` int(3) NOT NULL,
  `s1` varchar(100) NOT NULL,
  `sn1` varchar(200) NOT NULL,
  `sg1` varchar(10) NOT NULL,
  `s2` varchar(100) NOT NULL,
  `sn2` varchar(30) NOT NULL,
  `sg2` varchar(10) NOT NULL,
  `s3` varchar(100) NOT NULL,
  `sn3` varchar(30) NOT NULL,
  `sg3` varchar(30) NOT NULL,
  `s4` varchar(100) NOT NULL,
  `sn4` varchar(30) NOT NULL,
  `sg4` varchar(30) NOT NULL,
  `s5` varchar(100) NOT NULL,
  `sn5` varchar(30) NOT NULL,
  `sg5` varchar(30) NOT NULL,
  `jamb` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom '),
(4, 'Anambra '),
(5, 'Bauchi'),
(6, 'Bayelsa '),
(7, 'Benue '),
(8, 'Borno '),
(9, 'Cross River '),
(10, 'Delta '),
(11, 'Ebonyi '),
(12, 'Edo '),
(13, 'Ekiti '),
(14, 'Enugu '),
(15, 'FCT'),
(16, 'Gombe '),
(17, 'Imo '),
(18, 'Jigawa '),
(19, 'Kaduna '),
(20, 'Kano '),
(21, 'Katsina '),
(22, 'Kebbi '),
(23, 'Kogi '),
(24, 'Kwara '),
(25, 'Lagos '),
(26, 'Nasarawa '),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau '),
(33, 'Rivers '),
(34, 'Sokoto '),
(35, 'Taraba '),
(36, 'Yobe '),
(37, 'Zamfara ');

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `subjects` (`id`, `name`) VALUES
(2, 'English Language'),
(3, 'Mathematics'),
(4, 'Physics'),
(5, 'Chemistry'),
(6, 'Geography'),
(7, 'Economics'),
(8, 'History'),
(9, 'Government'),
(10, 'CRK'),
(11, 'Computer Studies'),
(12, 'Dyeing and Bleaching'),
(13, 'Visual Arts'),
(14, 'Fisheries'),
(15, 'Agricultural Science'),
(16, 'Food and Nutrition'),
(17, 'Home Management'),
(18, 'Technical Drawing'),
(19, 'Welding and Fabrication'),
(20, 'Financial Accounting'),
(21, 'Commerce'),
(22, 'Marketing'),
(23, 'French'),
(24, 'Civic Education'),
(25, 'Literature in English'),
(26, 'Biology'),
(27, 'Insurance'),
(28, 'Building Construction'),
(31, 'Home Economics');


CREATE TABLE `universities` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `owned` varchar(200) NOT NULL,
  `state` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `web` varchar(200) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `universities` (`id`, `name`, `owned`, `state`, `location`, `web`, `phone`, `email`) VALUES
(1, 'Benue State University', 'State', 'Benue ', 'Makurdi, Benue State.', 'https://www.bsum.edu.ng', '044533811', 'admissions@bsum.edu.ng'),
(2, 'Federal University of Agriculture, Makurdi', 'Federal', 'Benue ', 'Makurdi, Benue State.', 'https://www.uam.edu.ng', '0445332045', 'admissions@uam.edu.ng'),
(3, 'Imo State University', 'State', 'Benue ', 'Owerri, Imo State', 'https://www.imsu.edu.ng', '08133323773', 'admissions@imsu.edu.ng'),
(4, 'Lagos State University, Ojo', 'State', 'Lagos ', 'Apapa, Lagos.', 'https://www.lasu.edu.ng', '01884043', 'admissions@lasu.edu.ng'),
(5, 'Sule Lamido State University', 'State', 'Benue ', 'Kafin Hausa, Jigawa State.', 'https://www.jsu.edu.ng', '08133323773', 'ayribadu@yahoo.com'),
(6, 'Northwest University', 'State', 'Benue ', 'Kano, Kano', 'https://www.nwuk.edu.ng', '08133323773', 'odehemmanuel5@gmail.com'),
(7, 'Plateau State University, Bokkos', 'State', 'Benue ', 'Bokkos, Plateau State', 'https:www.plasu.edu.ng', '08133323773', 'info!@plasu.edu.ng'),
(8, 'Abubakar Tafawa Balewa University', 'Federal', 'Bauchi', 'Bauchi, Bauchi', 'https://www.atbu.edu.ng', '0775435001', 'admissions@atbu.edu.ng'),
(10, 'University of Lagos', 'Federal', 'Lagos ', 'Akoka, Lagos State', 'https:www.unilag.edu.ng', '017432778', 'admissions@unilag.edu.ng'),
(12, 'University of Nigeria Nsukka.', 'Federal', 'Enugu', 'Nsukka, Enugu state', 'https://www.unn.edu.ng', '07088617000', 'unn@unn.edu.ng'),
(13, 'University of Ibadan', 'Federal', 'Oyo', 'Ibadan, Oyo State', 'https://www.ui.edu.ng', '400550614', 'admissions@ui.edu.ng'),
(14, 'Covenant University, Canaan Land', 'Private', 'Ogun', 'KM 10, Idiroko Road, P.M.B. 1023 Ota, Ogun State', 'https://www.cu.edu.ng', '0179475468', 'registrar@covenantuniversity.org'),
(15, 'Benue State Polytechnic Ugbokolo', 'State', 'Benue ', 'After club 4 ugbokolo', 'https://www.benpoly.edu.ng', '09087767675', 'benpoly@gmail.com');

ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `prerequisites`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `school_courses`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `prerequisites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `school_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
