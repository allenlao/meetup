-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: raysplastering.co.uk.mysql:3306
-- Generation Time: Apr 28, 2017 at 01:15 AM
-- Server version: 10.1.21-MariaDB-1~xenial
-- PHP Version: 5.4.45-0+deb7u8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `raysplastering_co_uk`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
  `interest_name` varchar(20) NOT NULL DEFAULT '',
  `group_id` int(20) NOT NULL,
  PRIMARY KEY (`group_id`,`interest_name`),
  KEY `interest_name` (`interest_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`interest_name`, `group_id`) VALUES
('bars', 1),
('clubs', 2);

-- --------------------------------------------------------

--
-- Table structure for table `attend`
--

DROP TABLE IF EXISTS `attend`;
CREATE TABLE IF NOT EXISTS `attend` (
  `event_id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `rsvp` tinyint(1) NOT NULL,
  `rating` int(1) NOT NULL,
  PRIMARY KEY (`event_id`,`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attend`
--

INSERT INTO `attend` (`event_id`, `username`, `rsvp`, `rating`) VALUES
(1, 'admin', 1, 8),
(1, 'normal', 1, 0),
(1, 'test', 1, 2),
(2, 'admin', 1, 0),
(2, 'test', 1, 0),
(5, 'test', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `belongs_to`
--

DROP TABLE IF EXISTS `belongs_to`;
CREATE TABLE IF NOT EXISTS `belongs_to` (
  `group_id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  `authorized` tinyint(1) NOT NULL,
  PRIMARY KEY (`group_id`,`username`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `belongs_to`
--

INSERT INTO `belongs_to` (`group_id`, `username`, `authorized`) VALUES
(1, 'admin', 1),
(1, 'normal', 0),
(1, 'test', 1),
(2, 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `event_id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `group_id` int(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `zip` int(5) NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `group_id` (`group_id`),
  KEY `lname` (`lname`,`zip`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `description`, `start_time`, `end_time`, `group_id`, `lname`, `zip`) VALUES
(1, 'title', 'description', '2017-04-12 05:00:00', '2017-04-14 00:00:00', 1, 'new york', 10001),
(2, 'Title2', 'Description 2', '2017-04-22 00:00:00', '2017-04-12 00:00:00', 1, 'new york', 10001),
(5, 'Ramping Tigers', 'the tigers of passedena have come', '2017-01-01 00:00:00', '2018-02-02 00:00:00', 1, 'Circus Jacks', 70440);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(20) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(20) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `username` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`group_id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `description`, `username`) VALUES
(1, 'group1', 'We do this', 'test'),
(2, 'group2', 'group 2 description', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

DROP TABLE IF EXISTS `interest`;
CREATE TABLE IF NOT EXISTS `interest` (
  `interest_name` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`interest_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`interest_name`) VALUES
('bars'),
('clubs');

-- --------------------------------------------------------

--
-- Table structure for table `interested_in`
--

DROP TABLE IF EXISTS `interested_in`;
CREATE TABLE IF NOT EXISTS `interested_in` (
  `username` varchar(20) NOT NULL DEFAULT '',
  `interest_name` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`username`,`interest_name`),
  KEY `interest_name` (`interest_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `lname` varchar(20) NOT NULL DEFAULT '',
  `zip` int(5) NOT NULL,
  `street` varchar(50) NOT NULL DEFAULT '',
  `city` varchar(20) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `latitude` bigint(50) NOT NULL,
  `longitude` bigint(50) NOT NULL,
  PRIMARY KEY (`lname`,`zip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`lname`, `zip`, `street`, `city`, `description`, `latitude`, `longitude`) VALUES
('Circus Jacks', 70440, 'Church St', 'Texas', 'the tigers of passedena have come', 1003, 3001),
('fgwe', 1001, 'fweg', 'gewg', 'descip', 33, 32),
('location', 12203, '321321', 'LA', 'tgowgop', 10, 20),
('new york', 10001, '2nd street', 'NY', 'This is the place its at.', 10, 11),
('rew', 0, 'n', 'nio', 'opop', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `firstname` varchar(20) NOT NULL DEFAULT '',
  `lastname` varchar(20) NOT NULL DEFAULT '',
  `zipcode` int(5) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`username`, `password`, `firstname`, `lastname`, `zipcode`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 10001),
('normal', 'fea087517c26fadd409bd4b9dc642555', 'normal', 'normal', 10001),
('test', '5f4dcc3b5aa765d61d8327deb882cf99', 'test', 'test', 10001),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'name', 'lname', 2001);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `about_ibfk_2` FOREIGN KEY (`interest_name`) REFERENCES `interest` (`interest_name`);

--
-- Constraints for table `attend`
--
ALTER TABLE `attend`
  ADD CONSTRAINT `attend_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`),
  ADD CONSTRAINT `attend_ibfk_2` FOREIGN KEY (`username`) REFERENCES `member` (`username`);

--
-- Constraints for table `belongs_to`
--
ALTER TABLE `belongs_to`
  ADD CONSTRAINT `belongs_to_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `belongs_to_ibfk_2` FOREIGN KEY (`username`) REFERENCES `member` (`username`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`lname`, `zip`) REFERENCES `location` (`lname`, `zip`);

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`username`) REFERENCES `member` (`username`);

--
-- Constraints for table `interested_in`
--
ALTER TABLE `interested_in`
  ADD CONSTRAINT `interested_in_ibfk_1` FOREIGN KEY (`username`) REFERENCES `member` (`username`),
  ADD CONSTRAINT `interested_in_ibfk_2` FOREIGN KEY (`interest_name`) REFERENCES `interest` (`interest_name`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
