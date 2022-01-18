-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:4306
-- Generation Time: Dec 19, 2021 at 07:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinejob`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `appid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `jobid` int(11) DEFAULT NULL,
  `cv` varchar(1000) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `appstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`appid`, `userid`, `jobid`, `cv`, `date`, `appstatus`) VALUES
(32, 23, 21, 'CV_02.jpg', '2019-12-21', 'pending'),
(34, 24, 1, 'CV_03.png', '2019-12-21', 'pending'),
(35, 24, 1, 'CV_03.png', '2019-12-21', 'pending'),
(39, 17, 17, 'CV_01.jpg', '2019-12-21', 'pending'),
(40, 17, 17, 'CV_01.jpg', '2019-12-21', 'pending'),
(41, 17, 21, 'CV_01.jpg', '2019-12-21', 'Accepted'),
(42, 25, 17, 'CV_02.jpg', '2019-12-21', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `catstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catid`, `name`, `catstatus`) VALUES
(3, 'Cloud Computing', 'active'),
(15, 'Web Developer', 'active'),
(17, 'Big Scientist', 'active'),
(18, 'Full Stack Developer', 'active'),
(22, 'Machine Learning', 'active'),
(23, 'IOT', 'active'),
(25, 'Content Writer', 'active'),
(26, 'Blockchain Develper', 'active'),
(27, 'Metaverse Developer', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `jobid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `skill` varchar(50) NOT NULL,
  `timing` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `salary` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `catid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `nov` int(11) NOT NULL,
  `jobstatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`jobid`, `name`, `description`, `skill`, `timing`, `date`, `salary`, `location`, `catid`, `userid`, `nov`, `jobstatus`) VALUES
(1, 'salman', 'sas', 'web', '8 to 4', '2010-12-21', 500000, 'sasas', 15, 23, 8, 'open'),
(17, 'salman company', 'naan', 'C++', '8', '2014-12-21', 10000, 'karachi', 17, 14, 11, 'close'),
(18, 'Systems', 'bnlkdanlnln', 'html,css,javascript', '9 to 5', '2014-12-21', 20000, 'Karachi.', 15, 14, 10, 'open'),
(21, 'Raj Softwares', 'nslnlan', 'web developer, java,c#', '8 to 4', '2016-12-21', 500000, 'karachi', 3, 2, 6, 'open'),
(22, 'Raj Softwares', 'We need a skill based web developer', 'java,ruby', '8 to 4', '2019-12-21', 100000, 'islamabad', 18, 20, 23, 'open'),
(23, 'Systems ltd', 'We are one of the best and leading software tech in Pakistan!', 'html,css,javascript', '8 to 4', '2019-12-21', 20000, 'Lahore', 23, 14, 4, 'open'),
(24, 'folio', 'we are of our best Tech Companies', 'Python', '8 to 4', '2019-12-21', 20001, 'Sialkot', 25, 2, 11, 'open');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`userid`, `name`, `description`) VALUES
(23, 'Bolt Shoes', 'its a shoes website'),
(23, 'online ecommerce', 'its a react '),
(24, 'Covid tracker', 'its an online covid testing site'),
(24, 'Fastlead solution', 'it is a call center website'),
(17, 'Fast Duct Cleaning', 'duck cleaning websites for people where they easily book an appointment'),
(25, 'Shell Scripting', 'Its a linux Project which run on shell Commands!');

-- --------------------------------------------------------

--
-- Table structure for table `roletype`
--

CREATE TABLE `roletype` (
  `rollid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roletype`
--

INSERT INTO `roletype` (`rollid`, `name`) VALUES
(1, 'Employer'),
(2, 'Jobseeker'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `careerlevel` varchar(50) NOT NULL,
  `experience` varchar(50) NOT NULL,
  `Degree` varchar(50) NOT NULL,
  `rollid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `email`, `password`, `gender`, `careerlevel`, `experience`, `Degree`, `rollid`) VALUES
(2, 'admin', 'admin@gmail.com', 'admin123', 'Female', 'Intermediate', '4 year', 'BSCY', 1),
(13, 'dbadmin', 'k191462@nu.edu.pk', 'dbmsproject', 'Male', 'Entry level', '1 year', 'BSCS', 3),
(14, 'admin1', 'admin1@gmail.com', 'admin1pass', 'Female', 'Fresh', '2 year', 'BSAI', 1),
(17, 'Ali', 'k19@nu.edu.pk', 'ali111', 'Male', 'Entry level', '3 year', 'BBA', 2),
(19, 'Uzair', 'uzair@gmail.com', 'uzair123', 'Male', 'Intermediate', '2 year', 'BSCS', 2),
(20, 'Taha Softwares', 'taha1@gmail.com', 'taha1pass', 'Male', 'Medium level', '3 year', 'BSSE', 1),
(23, 'salman', 'salman123@gmail.com', 'salman123', 'Male', 'Medium level', '1 year', 'BSSE', 2),
(24, 'taimoor', 'taimoor1@gmail.com', 'taimoor123', 'Male', 'Entry level', '2 year', 'BSCS', 2),
(25, 'saboor', 'saboor@gmail.com', 'saboor123', 'Male', 'Entry level', '5 year', 'BSIT', 2),
(26, 'shakeeb', 'shakeeb@gmail.com', 'shakeeb123', 'male', 'Entry level', '3 year', 'BSCS', 2),
(27, 'Mahnoor', 'mahnoor@gmail.com', 'mahnoor123', 'Female', 'Intermediate', '2 year', 'BSCS', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`appid`),
  ADD KEY `application_ibfk_1` (`jobid`),
  ADD KEY `application_ibfk_2` (`userid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`jobid`),
  ADD KEY `jobs_ibfk_1` (`catid`),
  ADD KEY `use` (`userid`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD KEY `userid` (`userid`) USING BTREE;

--
-- Indexes for table `roletype`
--
ALTER TABLE `roletype`
  ADD PRIMARY KEY (`rollid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `rollid` (`rollid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `appid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `jobid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roletype`
--
ALTER TABLE `roletype`
  MODIFY `rollid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`jobid`) REFERENCES `jobs` (`jobid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `categories` (`catid`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `use` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `primed` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`rollid`) REFERENCES `roletype` (`rollid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
