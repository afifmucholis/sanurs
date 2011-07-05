-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 04, 2011 at 12:11 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sanur_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE IF NOT EXISTS `alumni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `birthdate` date NOT NULL,
  `graduate_year` year(4) NOT NULL,
  `last_unit_id` int(11) NOT NULL,
  `is_registered` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `alumni`
--


-- --------------------------------------------------------

--
-- Table structure for table `category_event`
--

CREATE TABLE IF NOT EXISTS `category_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_event` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category_event`
--

INSERT INTO `category_event` (`id`, `category_event`) VALUES
(1, 'social'),
(2, 'concert'),
(3, 'party');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `SMA` varchar(255) DEFAULT NULL,
  `SMA_graduate_year` year(4) DEFAULT NULL,
  `D3_university` varchar(255) DEFAULT NULL,
  `D3_major` varchar(255) DEFAULT NULL,
  `D3_minor` varchar(255) DEFAULT NULL,
  `D3_graduate_year` year(4) DEFAULT NULL,
  `S1_university` varchar(255) DEFAULT NULL,
  `S1_major` varchar(255) DEFAULT NULL,
  `S1_minor` varchar(255) DEFAULT NULL,
  `S1_graduate_year` year(4) DEFAULT NULL,
  `S2_university` varchar(255) DEFAULT NULL,
  `S2_major` varchar(255) DEFAULT NULL,
  `S2_minor` varchar(255) DEFAULT NULL,
  `S2_graduate_year` year(4) DEFAULT NULL,
  `S3_university` varchar(255) DEFAULT NULL,
  `S3_major` varchar(255) DEFAULT NULL,
  `S3_minor` varchar(255) DEFAULT NULL,
  `S3_graduate_year` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `education`
--


-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `when` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `where` varchar(255) NOT NULL,
  `category_event_id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `event`
--


-- --------------------------------------------------------

--
-- Table structure for table `friend_relationship`
--

CREATE TABLE IF NOT EXISTS `friend_relationship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid_1` int(11) NOT NULL,
  `userid_2` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `friend_relationship`
--


-- --------------------------------------------------------

--
-- Table structure for table `friend_request`
--

CREATE TABLE IF NOT EXISTS `friend_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid_requester` int(11) NOT NULL,
  `userid_requested` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `friend_request`
--


-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE IF NOT EXISTS `gender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`id`, `label`) VALUES
(1, 'male'),
(2, 'female');

-- --------------------------------------------------------

--
-- Table structure for table `host_event`
--

CREATE TABLE IF NOT EXISTS `host_event` (
  `id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `host_event`
--


-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

CREATE TABLE IF NOT EXISTS `interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `interest` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `interest`
--

INSERT INTO `interest` (`id`, `interest`) VALUES
(1, 'business'),
(2, 'arts and design'),
(3, 'sciences'),
(4, 'political and social sciences'),
(5, 'engineering'),
(6, 'music'),
(7, 'sports'),
(8, 'literature'),
(9, 'religious and philosophical studies'),
(10, 'education'),
(11, 'military studies'),
(12, 'culinary');

-- --------------------------------------------------------

--
-- Table structure for table `interested_in`
--

CREATE TABLE IF NOT EXISTS `interested_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `interested_in`
--


-- --------------------------------------------------------

--
-- Table structure for table `rsvp_event`
--

CREATE TABLE IF NOT EXISTS `rsvp_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `rsvp_event`
--


-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `label`) VALUES
(1, 'TK'),
(2, 'SD'),
(3, 'SMP'),
(4, 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender_id` int(11) NOT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `home_telephone` varchar(20) DEFAULT NULL,
  `handphone` varchar(20) DEFAULT NULL,
  `graduate_year` year(4) NOT NULL,
  `last_unit_id` int(11) NOT NULL,
  `profpict_url` varchar(50) DEFAULT NULL,
  `location_latitude` decimal(20,10) NOT NULL,
  `location_longitude` decimal(20,10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--


-- --------------------------------------------------------

--
-- Table structure for table `visibility_status`
--

CREATE TABLE IF NOT EXISTS `visibility_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `home_address` tinyint(1) NOT NULL DEFAULT '0',
  `home_telephone` tinyint(1) NOT NULL DEFAULT '0',
  `handphone` tinyint(1) NOT NULL DEFAULT '0',
  `email` tinyint(1) NOT NULL DEFAULT '0',
  `interest` tinyint(1) NOT NULL DEFAULT '0',
  `S1` tinyint(1) NOT NULL DEFAULT '0',
  `S2` tinyint(1) NOT NULL DEFAULT '0',
  `S3` tinyint(1) NOT NULL DEFAULT '0',
  `work_experience` tinyint(1) NOT NULL DEFAULT '0',
  `current_experience` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `visibility_status`
--


-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE IF NOT EXISTS `work_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `work_hp` varchar(20) DEFAULT NULL,
  `work_email` varchar(255) DEFAULT NULL,
  `is_current_work` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `work_experience`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;