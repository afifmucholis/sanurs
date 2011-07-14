-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 14, 2011 at 06:12 PM
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
(15, 'Hendra Hadhil', '1990-06-21', 2003, 2, 0),
(16, 'Ismail Sunni', '1990-07-13', 2003, 2, 0),
(17, 'Arifin Luthfi', '1990-11-26', 1996, 1, 0),
(18, 'Setia Negara', '1991-02-01', 1996, 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
