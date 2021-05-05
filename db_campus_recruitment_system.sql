-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2020 at 10:05 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_campus_recruitment_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(4) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `title`, `description`) VALUES
(2, 'About Us', 'We are pleased to introduce ourselves as a professional placement services organization. We are a prominent Recruitment Firm offering out of the box Campus recruitment solutions to Institutes.Fundamentally, recruitment websites, such as Recruiter.com, are facilitators; catalysts; information sources, guides and repositories; and professional communities serving the needs of job seekers, recruiters and employers.\r\n\r\nBy replacing the office face-to-face with digital and virtual interfaces, while playing the traditional role of intermediary, recruiting websites not only save time, money, space and energy, but also create new synergies, networks and critical masses that catalyze the posting, vetting and hiring processes.\r\n\r\nAmong the critical things they disseminate are job listings and descriptions, resumes and profiles, contacts for networking, validation of jobs and job seekers, guidelines to effective recruitment, employment issue analysis and updates, and valuable perspectives on all ');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `adminname`, `email`, `mobile`, `password`, `username`) VALUES
(1, 'admin', 'admin@gmail.com', '9876543210', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `applyjob`
--

CREATE TABLE `applyjob` (
  `applyjob_id` int(10) NOT NULL,
  `job_id` int(10) NOT NULL,
  `usr_id` int(10) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applyjob`
--

INSERT INTO `applyjob` (`applyjob_id`, `job_id`, `usr_id`, `remark`, `status`) VALUES
(1, 1, 11, '', 'rejected'),
(2, 1, 9, '', 'rejected'),
(3, 2, 9, '', 'selected'),
(5, 8, 12, '', 'rejected'),
(6, 2, 11, '', 'selected');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `comp_id` int(10) NOT NULL,
  `companyname` varchar(100) NOT NULL,
  `contactperson` varchar(100) NOT NULL,
  `companyemail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `companyurl` varchar(50) NOT NULL,
  `companyaddress` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`comp_id`, `companyname`, `contactperson`, `companyemail`, `password`, `mobile`, `companyurl`, `companyaddress`) VALUES
(1, 'Infosys', 'human resource', 'infosys@gmail.com', 'abcd', '4387786173', 'www.infosys.com', '404 montreal'),
(2, 'hsbc', 'Anshuman babbar', 'anshuman@hsbc.com', 'anshumanhsbc', '4387786173', 'www.hsbc.com', '404 montreal'),
(3, 'jp morgan', 'steve', 'steve@jpmorgan.com', 'steve123', '1234567890', 'www.jpmorgan.com', '501 montreal'),
(4, 'Scotiabank', 'HR', 'hr@scotiabank.com', 'abcd123456', '9034462463', 'www.scotiabank.com', 'montreal'),
(5, 'Td Bank', 'Human resource', 'hr@tdbank.com', 'abcd123456', '4387786173', 'www.tdbank.com', 'montreal');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(4) NOT NULL,
  `address` varchar(200) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `address`, `mobile`, `email`) VALUES
(1, '401-A Saint Catherine Montreal Canada.', '5148905678', 'campusrecruitmentsystem@canada.ca');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `educationid` int(10) NOT NULL,
  `usr_id` int(10) NOT NULL,
  `schoolboard` varchar(20) NOT NULL,
  `schoolyear` varchar(10) NOT NULL,
  `schoolpercent` varchar(5) NOT NULL,
  `collegename` varchar(20) NOT NULL,
  `collegeyear` varchar(10) NOT NULL,
  `collegepercent` varchar(5) NOT NULL,
  `universityname` varchar(30) NOT NULL,
  `universityyear` varchar(10) NOT NULL,
  `universitypercent` varchar(5) NOT NULL,
  `certifications` varchar(100) NOT NULL,
  `skills` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`educationid`, `usr_id`, `schoolboard`, `schoolyear`, `schoolpercent`, `collegename`, `collegeyear`, `collegepercent`, `universityname`, `universityyear`, `universitypercent`, `certifications`, `skills`) VALUES
(2, 12, 'CBSE', '2015', '89', 'College Lasalle', '2018', '95', 'Bishop University', '2020', '90', 'Java, C++, C#, Python ', 'Java, C++, C#, Python '),
(10, 12, 'CBSE', '2012', '78', 'Lasalle', '2014', '88', 'Mcgill', '90', '2018', 'IT', 'IT'),
(11, 14, 'CBSE', '2012', '78', 'Lasalle', '2014', '88', 'Mcgill', '90', '2018', 'IT', 'IT'),
(12, 14, 'ABC', '2012', '78', 'Lasalle', '2016', '89', 'Concordia', '2018', '89', 'IT', 'Programming'),
(81, 14, 'CBSE', '2012', '78', 'Lasalle', '2014', '88', 'Mcgill', '90', '2018', 'IT', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usr_id` int(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `sid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usr_id`, `fullname`, `email`, `mobile`, `gender`, `password`, `sid`) VALUES
(9, 'anshuman', 'anshuman.babbar21@gmail.com', '4387786173', 'male', 'anshu', '100'),
(11, 'mark', 'mark@gmail.com', '4389968548', 'female', 'mar123', 'st_200'),
(12, 'akansha', 'akanksha@gmail.com', '5146327465', 'female', 'akanksha', 'st_500'),
(14, 'usernew', 'user@gmail.com', '4387786137', 'male', 'abcd123456', '258');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `job_id` int(10) NOT NULL,
  `comp_id` int(10) NOT NULL,
  `jobtitle` varchar(100) NOT NULL,
  `jobdescription` varchar(500) NOT NULL,
  `joblocation` varchar(30) NOT NULL,
  `noofopening` varchar(10) NOT NULL,
  `monthlysalary` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`job_id`, `comp_id`, `jobtitle`, `jobdescription`, `joblocation`, `noofopening`, `monthlysalary`) VALUES
(1, 1, 'Software Engineer/Junior Software Engineer C++', 'Job Description\r\nSoftware Engineer/ Junior Software Engineer C++\r\nGeneral Description: \r\nObtaining in- depth understanding of design and implementation of existing software product. \r\nDesign, implement and deliver new features required in the product as per deadlines. \r\n\r\nApplying innovation and creativity in design and implementation of features. \r\n\r\nResolve issues observed during testing and usage of the product. \r\n', 'toronto', '15', '4000'),
(2, 2, 'Sql Server Database Administrator', 'The SQL Server DBA will be responsible for the implementation, configuration, maintenance, and performance of critical SQL Server RDBMS systems, to ensure the database availability catering to various applications. Provide 24x7 support for critical production systems Perform scheduled maintenance and support release deployment activities after hours. Skills and Qualifications 3 to 5 years MS SQL Server Administration experience required Excellent hand on managing SQL Server version 2005 to 2017 ', 'Vancouver', '15', '5000'),
(3, 1, 'Web Developers', 'PHP (Must)\r\nMySQL (Must)\r\nShould have knowledge of HTML, Bootstrap, and CSS ', 'Montreal', '3', '3500'),
(8, 5, 'python developer', 'experience in python', 'montreal', '20', '3500'),
(9, 1, 'Full stack developer', 'must have knowledge of ajax, angular js , web development', 'montreal', '20', '5000'),
(10, 4, 'web developer', 'must have knowledge of ajax, angular js , web development', 'montreal', '20', '4000'),
(11, 1, 'php developer', '• Strong knowledge of PHP 5, JavaScript, jQuery\r\n• Strong knowledge of Magento (or Magento 2 if you are a true ninja)\r\n• Strong knowledge of MVC systems (Laravel is a plus)\r\n• Strong knowledge of MySQL relational databases\r\n• An experienced Git user\r\n• Experience with Wordpress and other CMS\r\n• Strong knowledge of System Administration (Apache, server security procedures, Linux and *Nix CLI, DNS, Domains, Records, as well as Knowledge of email headers SPF / MX recor', 'montreal', '25', '2500'),
(12, 3, 'Junior Java Developer', 'Main responsibilities:\r\n• Design and implement Java logic modules and algorithms;\r\n• Design and implement Java user interface;\r\n• Detect and analyze highly complex problems and define effective solutions;\r\n• Be active during the design and implementation phases, communicating ideas and issues;\r\n• Coding efficiently and reliably in a team;\r\n• Follow best practices and design templates;\r\n• Participate in code reviews to evaluate performance and quality;\r\n• Other related tasks', 'Montreal', '15', '5500'),
(13, 5, 'Full stack developer', 'must have knowledge of ajax, angular js , web development', 'montreal', '20', '6000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `applyjob`
--
ALTER TABLE `applyjob`
  ADD PRIMARY KEY (`applyjob_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`comp_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`educationid`),
  ADD KEY `usr_id` (`usr_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_id`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `comp_id` (`comp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applyjob`
--
ALTER TABLE `applyjob`
  MODIFY `applyjob_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `comp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `educationid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `usr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `job_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applyjob`
--
ALTER TABLE `applyjob`
  ADD CONSTRAINT `applyjob_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `vacancy` (`job_id`),
  ADD CONSTRAINT `applyjob_ibfk_2` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `user` (`usr_id`);

--
-- Constraints for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD CONSTRAINT `vacancy_ibfk_1` FOREIGN KEY (`comp_id`) REFERENCES `company` (`comp_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
