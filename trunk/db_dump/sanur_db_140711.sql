-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2011 at 05:19 
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

DROP TABLE IF EXISTS `alumni`;
CREATE TABLE IF NOT EXISTS `alumni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `birthdate` date NOT NULL,
  `graduate_year` year(4) NOT NULL,
  `last_unit_id` int(11) NOT NULL,
  `is_registered` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `name`, `birthdate`, `graduate_year`, `last_unit_id`, `is_registered`) VALUES
(1, 'Mariana Pudy Prima Forever Alone', '1989-07-11', 2007, 4, 1),
(2, 'Si A', '2011-07-14', 2011, 4, 0),
(3, 'Si B', '2011-07-14', 2011, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_event`
--

DROP TABLE IF EXISTS `category_event`;
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

DROP TABLE IF EXISTS `education`;
CREATE TABLE IF NOT EXISTS `education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `graduate_year` year(4) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `major` varchar(255) DEFAULT NULL,
  `minor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `level_id`, `graduate_year`, `school`, `major`, `minor`) VALUES
(5, 2, 3, 2012, 'ITB', 'Informatics Engineering', 'None'),
(4, 2, 1, 2008, 'SMAN 2 Jombang', 'None', 'None');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `venue` varchar(255) NOT NULL,
  `category_event_id` int(11) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `start_time`, `venue`, `category_event_id`, `image_url`) VALUES
(1, 'Deadline Sanur', 'Ini adalah deskripsinya', '2011-07-15 13:19:58', 'Kantor SP', 1, 'res/event/1.jpg'),
(2, 'Tes ajah', 'Cuma tes', '2011-07-14 15:19:40', 'Meja Kantor', 1, 'res/event/2.jpg'),
(3, 'Tes Lagi ', 'Cuma tes aja', '2011-07-14 14:35:49', 'Kubikel', 1, NULL),
(4, 'Event Kemarin', 'Kemarin', '2011-07-13 15:28:37', 'Tempat Kemarin', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `friend_relationship`
--

DROP TABLE IF EXISTS `friend_relationship`;
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

DROP TABLE IF EXISTS `friend_request`;
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

DROP TABLE IF EXISTS `gender`;
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

DROP TABLE IF EXISTS `host_event`;
CREATE TABLE IF NOT EXISTS `host_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `host_event`
--

INSERT INTO `host_event` (`id`, `user_id`, `event_id`) VALUES
(1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `interest`
--

DROP TABLE IF EXISTS `interest`;
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

DROP TABLE IF EXISTS `interested_in`;
CREATE TABLE IF NOT EXISTS `interested_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `interest_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `interested_in`
--

INSERT INTO `interested_in` (`id`, `user_id`, `interest_id`) VALUES
(1, 2, 3),
(2, 2, 5),
(3, 2, 6),
(4, 2, 7),
(5, 2, 10),
(6, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id`, `label`) VALUES
(1, 'High School (SMA)'),
(2, 'Sekolah Kejuruan (D3)'),
(3, 'Bachelor Degree (S1)'),
(4, 'Master Degree (S2)'),
(5, 'Doctorate Degree (S3)');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `userid_from` int(11) NOT NULL,
  `userid_to` int(11) NOT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--


-- --------------------------------------------------------

--
-- Table structure for table `rsvp_event`
--

DROP TABLE IF EXISTS `rsvp_event`;
CREATE TABLE IF NOT EXISTS `rsvp_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status_rsvp_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `rsvp_event`
--

INSERT INTO `rsvp_event` (`id`, `user_id`, `event_id`, `status_rsvp_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rsvp_status`
--

DROP TABLE IF EXISTS `rsvp_status`;
CREATE TABLE IF NOT EXISTS `rsvp_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rsvp_status`
--

INSERT INTO `rsvp_status` (`id`, `label`) VALUES
(1, 'Attending'),
(2, 'Not Attending');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

DROP TABLE IF EXISTS `unit`;
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

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `home_address` varchar(255) DEFAULT NULL,
  `home_telephone` varchar(20) DEFAULT NULL,
  `handphone` varchar(20) DEFAULT NULL,
  `graduate_year` year(4) NOT NULL,
  `last_unit_id` int(11) NOT NULL,
  `profpict_url` varchar(50) DEFAULT NULL,
  `location_latitude` decimal(20,10) DEFAULT NULL,
  `location_longitude` decimal(20,10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `birthdate`, `gender_id`, `home_address`, `home_telephone`, `handphone`, `graduate_year`, `last_unit_id`, `profpict_url`, `location_latitude`, `location_longitude`) VALUES
(1, 'Akbar Gumbira', 'Abay', 'gumbira.mymind@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-10-09', 1, 'Jln. Jeruk', '02632222', '085624545876', 2005, 3, NULL, '-6.8228071168', '107.1812438965'),
(2, 'Danang Tri Massandy', NULL, 'danang@danang.com', '6a17faad3b1275fd2558d5435c58440e', '1990-03-20', 1, 'Pelesiran 7B, Bandung', '022282828', '08563214165', 2008, 4, NULL, '-6.8969350000', '107.6087020000'),
(5, 'Mariana Pudy Prima Forever Alone', NULL, 'pudy@yahoo.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1989-07-11', NULL, NULL, NULL, NULL, 2007, 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visibility_status`
--

DROP TABLE IF EXISTS `visibility_status`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `visibility_status`
--

INSERT INTO `visibility_status` (`id`, `user_id`, `home_address`, `home_telephone`, `handphone`, `email`, `interest`, `S1`, `S2`, `S3`, `work_experience`, `current_experience`) VALUES
(1, 2, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1),
(2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

DROP TABLE IF EXISTS `work_experience`;
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `user_id`, `company`, `year`, `position`, `address`, `telephone`, `fax`, `work_hp`, `work_email`, `is_current_work`) VALUES
(1, 2, 'PT. Sumarno Pabottingi', 2011, 'Programmer', 'Jl Cikini Raya 5 No. 12, Jakarta Pusat', '021 315-1271', '021 314-4172', NULL, 'sp@sp.com', 1),
(2, 1, '', 0000, '', '', '', '', '', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
