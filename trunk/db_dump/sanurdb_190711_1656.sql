-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 19, 2011 at 05:55 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `name`, `birthdate`, `graduate_year`, `last_unit_id`, `is_registered`) VALUES
(1, 'Akbar Gumbira', '1990-10-09', 2008, 4, 0),
(2, 'Danang Tri Massandy', '1990-03-20', 2008, 4, 0),
(3, 'Pudy Prima', '1989-11-30', 2007, 4, 1),
(4, 'William Eka Putra', '1990-06-21', 2007, 4, 0),
(5, 'Darwin Soesanto', '1990-06-18', 2009, 4, 0),
(6, 'Nikolaus Indra', '1989-03-18', 2009, 4, 0),
(7, 'Bobby Hartanto', '1989-08-23', 2005, 3, 0),
(8, 'Mukhammad Ifanto', '1990-12-15', 2005, 3, 0),
(9, 'Fitriana Passa', '1990-04-17', 2004, 3, 0),
(10, 'Sandy Socrates', '1990-02-10', 2004, 3, 0),
(11, 'Yudhistira Natawisastra', '1990-04-16', 2006, 3, 0),
(12, 'Rezan Achmad', '1991-05-13', 2006, 3, 0),
(13, 'Zakiy Firdaus', '1990-06-27', 2002, 2, 0),
(14, 'Irwan Fathurrahman', '1990-04-16', 2002, 2, 0),
(15, 'Hendra Hadhil', '1990-06-21', 2003, 2, 1),
(16, 'Ismail Sunni', '1990-07-13', 2003, 2, 1),
(17, 'Arifin Luthfi', '1990-11-26', 1996, 1, 0),
(18, 'Setia Negara', '1991-02-01', 1996, 1, 0);

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
(1, 'Social'),
(2, 'Concert'),
(3, 'Party');

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
  `major_id` int(11) DEFAULT NULL,
  `minor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `level_id`, `graduate_year`, `school`, `major_id`, `minor_id`) VALUES
(4, 2, 1, 2008, 'SMAN 2 Jombang', 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `friend_relationship`
--

INSERT INTO `friend_relationship` (`id`, `userid_1`, `userid_2`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 2, 3),
(4, 1, 4);

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
-- Table structure for table `major`
--

DROP TABLE IF EXISTS `major`;
CREATE TABLE IF NOT EXISTS `major` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `major` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`id`, `major`) VALUES
(1, 'Informatics Engineering'),
(2, 'Electric Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  `userid_from` int(11) NOT NULL,
  `userid_to` int(11) NOT NULL,
  `message` text,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `subject`, `userid_from`, `userid_to`, `message`, `date`) VALUES
(1, 'Data 1', 1, 2, 'Tes tes tes', '2011-07-19 17:41:00'),
(2, 'Data 2', 1, 3, 'Tes tes tes', '2011-07-19 17:41:00'),
(3, 'Data 3', 2, 3, 'Tes tes tes tes', '2011-07-19 17:41:35'),
(4, 'Data 4', 2, 1, 'Tes tes tes tes', '2011-07-19 17:41:35'),
(5, 'Spam 1', 1, 3, 'huahahahaha', '2011-07-19 17:42:35'),
(6, 'Spam 2', 1, 3, 'huahahahahaha', '2011-07-19 17:42:47'),
(7, 'Spam 3', 1, 3, 'huahahahaha', '2011-07-19 17:43:01'),
(8, 'Spam 4', 1, 3, 'huahahaha', '2011-07-19 17:43:15'),
(9, 'Spam 5', 1, 3, 'huahahahahah', '2011-07-19 17:43:26'),
(10, 'Spam 6', 1, 3, 'huahahahahaha', '2011-07-19 17:43:39'),
(11, 'Spam 7', 1, 3, 'huahahaha', '2011-07-19 17:43:54');

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
  `nickname` varchar(255) DEFAULT NULL,
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

INSERT INTO `user` (`id`, `name`, `nickname`, `email`, `password`, `birthdate`, `gender_id`, `home_address`, `home_telephone`, `handphone`, `graduate_year`, `last_unit_id`, `profpict_url`, `location_latitude`, `location_longitude`) VALUES
(1, 'Akbar Gumbira', 'Abay', 'gumbira.mymind@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-10-09', 1, 'Jln. Jeruk', '02632222', '085624545876', 2008, 3, 'res/user/user_1.jpg', '-6.8228071168', '107.1812438965'),
(2, 'Danang Tri Massandy', NULL, 'danang@danang.com', '6a17faad3b1275fd2558d5435c58440e', '1990-03-20', 1, 'Pelesiran 7B, Bandung', '022282828', '08563214165', 2008, 4, NULL, '-6.8969350000', '107.6087020000'),
(3, 'Pudy Prima', 'Pudy', 'pudy@yahoo.com', '68e721821dc8892481c8c5ab680eab3b', '1989-11-30', NULL, 'Jalan Mawar Ungu 38 Jakarta Timur 13790', '', '', 2007, 4, 'res/user/user_3.JPG', '-37.8131869000', '144.9629796000'),
(4, 'Ismail Sunni', NULL, 'sunni@yahoo.com', 'c9c3ea8acf0eeeec518a0c3ffaf01eba', '1990-07-13', NULL, NULL, NULL, NULL, 2003, 2, NULL, NULL, NULL),
(5, 'Hendra Hadhil', NULL, 'tes@yahoo.com', '28b662d883b6d76fd96e4ddc5e9ba780', '1990-06-21', NULL, NULL, NULL, NULL, 2003, 2, NULL, NULL, NULL);

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
  `birthdate` tinyint(1) NOT NULL DEFAULT '0',
  `S1` tinyint(1) NOT NULL DEFAULT '0',
  `S2` tinyint(1) NOT NULL DEFAULT '0',
  `S3` tinyint(1) NOT NULL DEFAULT '0',
  `work_experience` tinyint(1) NOT NULL DEFAULT '0',
  `current_experience` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `visibility_status`
--

INSERT INTO `visibility_status` (`id`, `user_id`, `home_address`, `home_telephone`, `handphone`, `email`, `interest`, `birthdate`, `S1`, `S2`, `S3`, `work_experience`, `current_experience`) VALUES
(1, 1, 1, 1, 1, 1, 1, 0, 0, 1, 1, 1, 1),
(2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
(2, 1, 'PT. GCD Corporation', 2009, '', '', '', '', '', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
