-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2011 at 05:51 PM
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=864 ;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id`, `name`, `birthdate`, `graduate_year`, `last_unit_id`, `is_registered`) VALUES
(1, 'Akbar Gumbira', '1990-10-09', 2008, 4, 1),
(2, 'Danang Tri Massandy', '1990-03-20', 2008, 4, 1),
(3, 'Pudy Prima', '1989-11-30', 2007, 4, 1),
(4, 'William Eka Putra', '1990-06-21', 2007, 4, 0),
(5, 'Darwin Soesanto', '1990-06-18', 2009, 4, 1),
(6, 'Nikolaus Indra', '1989-03-18', 2009, 4, 1),
(7, 'Bobby Hartanto', '1989-08-23', 2005, 3, 0),
(8, 'Mukhammad Ifanto', '1990-12-15', 2005, 3, 1),
(9, 'Fitriana Passa', '1990-04-17', 2004, 3, 0),
(10, 'Sandy Socrates', '1990-02-10', 2004, 3, 1),
(11, 'Yudhistira Natawisastra', '1990-04-16', 2006, 3, 1),
(12, 'Rezan Achmad', '1991-05-13', 2006, 3, 1),
(13, 'Zakiy Firdaus', '1990-06-27', 2002, 2, 1),
(14, 'Irwan Fathurrahman', '1990-04-16', 2002, 2, 0),
(15, 'Hendra Hadhil', '1990-06-21', 2003, 2, 1),
(16, 'Ismail Sunni', '1990-07-13', 2003, 2, 1),
(17, 'Arifin Luthfi', '1990-11-26', 1996, 1, 0),
(18, 'Setia Negara', '1991-02-01', 1996, 1, 1),
(19, 'Adinta Esti Widurini', '1984-06-20', 2003, 4, 0),
(20, 'Agata Novi Gipsani', '1985-02-12', 2003, 4, 0),
(21, 'Agnes Adella Andriana', '1985-03-24', 2003, 4, 0),
(22, 'Agnes Bunga Andriana', '1985-03-24', 2003, 4, 0),
(23, 'Agnes Emmanuella Wagey', '1985-03-09', 2003, 4, 0),
(24, 'Airin Christa', '1985-04-08', 2003, 4, 0),
(25, 'Altami Chrysan Arasty', '1985-05-13', 2003, 4, 0),
(26, 'Anastasia', '1985-08-25', 2003, 4, 0),
(27, 'Anastasia Intan', '1985-09-25', 2003, 4, 0),
(28, 'Anastasia Yoveline', '1985-02-23', 2003, 4, 0),
(29, 'Anindhita Virgeenie', '1985-10-05', 2003, 4, 0),
(30, 'Anita Komala', '1985-05-05', 2003, 4, 0),
(31, 'Ariani', '1985-04-04', 2003, 4, 0),
(32, 'Asteria Tiar Novita', '1984-11-26', 2003, 4, 0),
(33, 'Astrid Salome Evelina', '1985-10-07', 2003, 4, 0),
(34, 'Astuti Pitarini', '1985-02-09', 2003, 4, 0),
(35, 'Audry Astari', '1985-05-11', 2003, 4, 0),
(36, 'Ayang', '1985-01-11', 2003, 4, 0),
(37, 'Ayu Meithia', '1985-05-17', 2003, 4, 0),
(38, 'Belinda Djimandjaja', '1984-09-02', 2003, 4, 0),
(39, 'Bernadeth Yollanda Beatrik', '1985-10-08', 2003, 4, 0),
(40, 'Bernadette Bianca', '1985-04-23', 2003, 4, 0),
(41, 'Bonandi Elisabeth', '1984-12-29', 2003, 4, 0),
(42, 'Brigita Gumarus', '1985-04-14', 2003, 4, 0),
(43, 'Bunga Rahmathia', '1985-04-16', 2003, 4, 0),
(44, 'Caroline Noviane', '1985-11-24', 2003, 4, 0),
(45, 'Charissa Gianina', '1984-08-01', 2003, 4, 0),
(46, 'Chinthea Anggreni', '1985-08-10', 2003, 4, 0),
(47, 'Christella Natali', '1984-12-26', 2003, 4, 0),
(48, 'Christina Yohana', '1985-08-09', 2003, 4, 0),
(49, 'Christine Natalia', '1984-12-28', 2003, 4, 0),
(50, 'Cindy Lestari', '1985-03-13', 2003, 4, 0),
(51, 'Citra', '1985-08-27', 2003, 4, 0),
(52, 'Ciynthia Viriyadhika Setiawan', '1985-10-01', 2003, 4, 0),
(53, 'Claudia Triastuti Suwito', '1985-04-30', 2003, 4, 0),
(54, 'Cornelia Frandy', '1984-12-13', 2003, 4, 0),
(55, 'Cynthia Dewi Sandjaja', '1985-06-06', 2003, 4, 0),
(56, 'Cynthia Dwiyanti', '1984-10-30', 2003, 4, 0),
(57, 'Dayu Rengganis', '1985-02-01', 2003, 4, 0),
(58, 'Dea Gitanya Sani', '1985-03-29', 2003, 4, 0),
(59, 'Debby Rahayu', '1985-01-23', 2003, 4, 0),
(60, 'Desrina Mira Rosari', '1985-12-02', 2003, 4, 0),
(61, 'Desy Gloria', '1984-12-30', 2003, 4, 0),
(62, 'Devy Caroline', '1985-03-22', 2003, 4, 0),
(63, 'Dewi Fransiska', '1985-12-10', 2003, 4, 0),
(64, 'Dhammadinna Surarini Tanzil', '1985-06-10', 2003, 4, 0),
(65, 'Dharmmavadi Metta', '1985-05-21', 2003, 4, 0),
(66, 'Dian Pratiwi', '1985-10-23', 2003, 4, 0),
(67, 'Diana Widyasanti', '1985-03-14', 2003, 4, 0),
(68, 'Diana Zerlina', '1985-10-07', 2003, 4, 0),
(69, 'Diana Zerlina S.', '1985-10-07', 2003, 4, 0),
(70, 'Dina Irvina', '1985-09-14', 2003, 4, 0),
(71, 'Dosmaria', '1985-05-15', 2003, 4, 0),
(72, 'Edina Matta', '1985-03-19', 2003, 4, 0),
(73, 'Edith Melissa Tanaga', '1985-06-30', 2003, 4, 0),
(74, 'Elfrida Harry Esti', '1985-09-22', 2003, 4, 0),
(75, 'Emilia Tri Tani', '1985-09-06', 2003, 4, 0),
(76, 'Engelin Sutanti Sjofian', '1984-10-02', 2003, 4, 0),
(77, 'Erika Tirtasari Wijaya', '1985-10-17', 2003, 4, 0),
(78, 'Erline Sugiarto', '1984-10-02', 2003, 4, 0),
(79, 'Ester Laura Kartini', '1985-05-21', 2003, 4, 0),
(80, 'Eugenia Monika S. Legawa', '1985-10-16', 2003, 4, 0),
(81, 'Eva Rosalin', '1985-12-24', 2003, 4, 0),
(82, 'Ezther Lastania M. Rompas', '1985-07-18', 2003, 4, 0),
(83, 'Febiana Katerina Pratomo', '1985-02-23', 2003, 4, 0),
(84, 'Ferani Leman', '1985-02-01', 2003, 4, 0),
(85, 'Ferita Tarida', '1985-08-25', 2003, 4, 0),
(86, 'Fitri Juniarta', '1985-06-22', 2003, 4, 0),
(87, 'Fitria Ramadhini', '1985-06-16', 2003, 4, 0),
(88, 'Florentina', '1985-04-24', 2003, 4, 0),
(89, 'Fransesca Gabby Suriyata', '1985-02-01', 2003, 4, 0),
(90, 'Fransilia Poedyaningrum', '1985-10-24', 2003, 4, 0),
(91, 'Fransisca Krisantia Nugraha', '1985-10-10', 2003, 4, 0),
(92, 'Gina Dwitania Caswara', '1985-10-10', 2003, 4, 0),
(93, 'Gina Yoviana', '1983-12-28', 2003, 4, 0),
(94, 'Gladys Rani Kusumowidagdo', '1985-05-01', 2003, 4, 0),
(95, 'Grace Wiryawan', '1985-10-25', 2003, 4, 0),
(96, 'Gracia Kartika', '1985-10-18', 2003, 4, 0),
(97, 'Henny Nur Hidayati', '1985-03-09', 2003, 4, 0),
(98, 'Hilda Kitti', '0000-00-00', 2003, 4, 0),
(99, 'Ignathia Cathy Dewi', '1985-08-13', 2003, 4, 0),
(100, 'Inneke', '1985-04-13', 2003, 4, 0),
(101, 'Irene Augustine Inkiriwang', '1985-08-13', 2003, 4, 0),
(102, 'Irene Lydia Jovita', '1985-06-28', 2003, 4, 0),
(103, 'Irma Juanita', '1985-06-10', 2003, 4, 0),
(104, 'Jesslyn Angela Tany', '1985-06-08', 2003, 4, 0),
(105, 'Joanita Belinda Salim', '1985-06-06', 2003, 4, 0),
(106, 'Josefina Eka Utama', '1984-12-09', 2003, 4, 0),
(107, 'Juvena Elizabeth', '1985-05-31', 2003, 4, 0),
(108, 'Karnia Cicilia S.', '0000-00-00', 2003, 4, 0),
(109, 'Katarina Dian Purwandari', '1985-04-06', 2003, 4, 0),
(110, 'Katryn N .P.', '1984-11-13', 2003, 4, 0),
(111, 'Kristiana Pertiwi', '1984-12-22', 2003, 4, 0),
(112, 'Laurencia Stefana Widiana Ho', '1984-12-28', 2003, 4, 0),
(113, 'Levana', '1985-09-06', 2003, 4, 0),
(114, 'Levana Rusli', '1985-10-06', 2003, 4, 0),
(115, 'Lia Angelia', '1985-04-13', 2003, 4, 0),
(116, 'Liady Prima Vera', '1985-09-30', 2003, 4, 0),
(117, 'Lita Rosalia', '1985-05-15', 2003, 4, 0),
(118, 'Luisa Yolena Handoyo', '1985-03-19', 2003, 4, 0),
(119, 'Lusia Shandy', '1985-04-17', 2003, 4, 0),
(120, 'Magda Liliana', '1985-07-25', 2003, 4, 0),
(121, 'Marcella', '1985-10-03', 2003, 4, 0),
(122, 'Marcella Ristianti', '1985-03-09', 2003, 4, 0),
(123, 'Marcia Stephanie', '1985-05-09', 2003, 4, 0),
(124, 'Margareta Melviana', '1985-05-10', 2003, 4, 0),
(125, 'Maria  Elizabeth', '1986-01-02', 2003, 4, 0),
(126, 'Maria Aras Kerti Endrayanti', '1985-03-25', 2003, 4, 0),
(127, 'Maria Berlian', '1985-09-25', 2003, 4, 0),
(128, 'Maria Dewi Indrawati', '1985-05-10', 2003, 4, 0),
(129, 'Maria Elfani', '1985-03-29', 2003, 4, 0),
(130, 'Maria Elizabeth', '1986-01-02', 2003, 4, 0),
(131, 'Maria Frisca Ledy', '1984-12-07', 2003, 4, 0),
(132, 'Maria G.R. Kusumaningrum', '1985-02-17', 2003, 4, 0),
(133, 'Maria Helena Iwo', '1985-07-27', 2003, 4, 0),
(134, 'Maria Margaretha Elvina Lim', '1985-04-14', 2003, 4, 0),
(135, 'Maria Monica Lamonge', '1984-11-22', 2003, 4, 0),
(136, 'Maria Primastianti Ardiani', '1985-07-05', 2003, 4, 0),
(137, 'Maria Putri Utami', '1985-12-03', 2003, 4, 0),
(138, 'Maria Valentine', '1985-02-14', 2003, 4, 0),
(139, 'Maria Vinisia Pradita', '1984-07-28', 2003, 4, 0),
(140, 'Maria Y. Retta Oktaviani', '1985-10-30', 2003, 4, 0),
(141, 'Marissa Maria Dewi', '1985-08-07', 2003, 4, 0),
(142, 'Martha Marisca Kuntadi', '1985-05-19', 2003, 4, 0),
(143, 'Maurin Merlina', '1985-04-23', 2003, 4, 0),
(144, 'Meilina Winardi', '1984-10-31', 2003, 4, 0),
(145, 'Melicia Kurniawan', '1985-05-21', 2003, 4, 0),
(146, 'Melisa Fransiska', '1985-04-27', 2003, 4, 0),
(147, 'Mellissa', '1985-05-13', 2003, 4, 0),
(148, 'Mira Kusuma Wardhani', '1985-10-05', 2003, 4, 0),
(149, 'Mirna Farika', '1984-10-31', 2003, 4, 0),
(150, 'Monique', '1984-12-02', 2003, 4, 0),
(151, 'Monnica', '1985-04-11', 2003, 4, 0),
(152, 'Murrytania Rehulina', '1986-02-19', 2003, 4, 0),
(153, 'Natalia', '1984-12-11', 2003, 4, 0),
(154, 'Natalie Suwignyo Puteri', '1984-12-12', 2003, 4, 0),
(155, 'Nathania Karina', '1986-02-15', 2003, 4, 0),
(156, 'Nina Lea', '1985-06-14', 2003, 4, 0),
(157, 'Nita Felia Pambudi', '1985-02-28', 2003, 4, 0),
(158, 'Prisilia Paramita', '1986-09-19', 2003, 4, 0),
(159, 'Prita Riski', '1985-09-03', 2003, 4, 0),
(160, 'Rachel Dwiyutia', '1985-06-25', 2003, 4, 0),
(161, 'Rani Ayudia Siswadi', '1985-05-04', 2003, 4, 0),
(162, 'Rani Ayudia Siswadi', '1985-05-04', 2003, 4, 0),
(163, 'Regina Julia', '1985-07-15', 2003, 4, 0),
(164, 'Regina Ruslie', '1984-07-29', 2003, 4, 0),
(165, 'Revita', '1985-01-28', 2003, 4, 0),
(166, 'Riesa Renata', '1985-04-30', 2003, 4, 0),
(167, 'Riza Natsya Bukit', '1985-10-08', 2003, 4, 0),
(168, 'Rumondang Stella Retta', '1985-07-10', 2003, 4, 0),
(169, 'Sandra Amelia', '1984-09-28', 2003, 4, 0),
(170, 'Sandra Monica', '1985-03-23', 2003, 4, 0),
(171, 'Sativa Clara Toar Nari Tarigan', '1985-10-11', 2003, 4, 0),
(172, 'Shekina H. Esther Rondonuwu', '1986-04-13', 2003, 4, 0),
(173, 'Silvia Boen', '1985-02-25', 2003, 4, 0),
(174, 'Sista Dewi Nurahani', '1986-06-29', 2003, 4, 0),
(175, 'Spica Pratita', '1985-07-11', 2003, 4, 0),
(176, 'Spica Pratita', '1985-07-11', 2003, 4, 0),
(177, 'Stefanie Josepha', '1984-12-12', 2003, 4, 0),
(178, 'Stefanny Mosiana', '1985-08-07', 2003, 4, 0),
(179, 'Stella', '1985-07-02', 2003, 4, 0),
(180, 'Stella Maria', '1985-07-20', 2003, 4, 0),
(181, 'Stephanie', '1985-10-16', 2003, 4, 0),
(182, 'Stephanie', '1985-10-03', 2003, 4, 0),
(183, 'Stephanie Irma Anindita', '1985-06-27', 2003, 4, 0),
(184, 'Stephanie Joviana Karnali', '1985-02-15', 2003, 4, 0),
(185, 'Stephanie Larasati', '1985-04-22', 2003, 4, 0),
(186, 'Stephanie Sjah', '1985-05-08', 2003, 4, 0),
(187, 'Stephanie Valentia', '1985-01-28', 2003, 4, 0),
(188, 'Syafira Hasni', '1985-05-15', 2003, 4, 0),
(189, 'Tamara Melinda', '1985-03-04', 2003, 4, 0),
(190, 'Tania Sananta', '1985-11-20', 2003, 4, 0),
(191, 'Teresa Kusnadi', '1985-01-12', 2003, 4, 0),
(192, 'Teresa Naomi', '1985-10-01', 2003, 4, 0),
(193, 'Theresia Hadiani', '1985-03-26', 2003, 4, 0),
(194, 'Theresia Tutur Melania', '1986-02-21', 2003, 4, 0),
(195, 'Tiara Parahita', '1985-05-25', 2003, 4, 0),
(196, 'Tjahjadi Sabrina Putri', '1985-07-19', 2003, 4, 0),
(197, 'Tyas Suryaningrum', '1985-09-18', 2003, 4, 0),
(198, 'Ursula Stefanny Hardiman', '1985-06-05', 2003, 4, 0),
(199, 'Valentcia Silvy', '1985-03-03', 2003, 4, 0),
(200, 'Varani Kosasih', '1985-06-25', 2003, 4, 0),
(201, 'Vebiana Himawan', '1985-05-06', 2003, 4, 0),
(202, 'Veronika Erlayasna', '1985-07-27', 2003, 4, 0),
(203, 'Vinna Violetta Leone', '1985-01-07', 2003, 4, 0),
(204, 'Vinsensia Hafendy', '1985-04-12', 2003, 4, 0),
(205, 'Vitra Kristianti', '1984-10-09', 2003, 4, 0),
(206, 'Vony Yunia', '1984-03-24', 2003, 4, 0),
(207, 'Widya Utami Dewi', '1985-05-28', 2003, 4, 0),
(208, 'Windy Ardelia', '1985-05-22', 2003, 4, 0),
(209, 'Yemima Yasmin Sugandhi', '1985-05-04', 2003, 4, 0),
(210, 'Yofi', '1985-11-15', 2003, 4, 0),
(211, 'Yohana', '1985-04-09', 2003, 4, 0),
(212, 'Yohana Sorta Nevilya Siregar', '1985-07-25', 2003, 4, 0),
(213, 'Yohanan Evasari Setiawan', '1984-12-13', 2003, 4, 0),
(214, 'Yohanna', '1985-04-09', 2003, 4, 0),
(215, 'Yolena Handoyo', '1985-03-15', 2003, 4, 0),
(216, 'Yotrin', '1985-05-21', 2003, 4, 0),
(217, 'Yuanita Inggriani', '1985-09-18', 2003, 4, 0),
(218, 'Yudit Anastasia Sari', '1984-12-15', 2003, 4, 0),
(219, 'Yuliana Tanuwidjaja', '1985-07-17', 2003, 4, 0),
(220, 'Yulietta Fransisca', '1985-06-28', 2003, 4, 0),
(221, 'Zweisty Septiarini', '1985-10-18', 2003, 4, 0),
(222, 'Adelina', '1986-03-06', 2004, 4, 0),
(223, 'Adinda Tisalita Permata', '1987-02-27', 2004, 4, 0),
(224, 'Adreng Kusuma Ayuningtyas', '1986-09-12', 2004, 4, 0),
(225, 'Adriani Trina', '1986-09-25', 2004, 4, 0),
(226, 'Afrianinov Angelina', '1986-04-24', 2004, 4, 0),
(227, 'Agnes Gloria Wiguna', '1986-06-06', 2004, 4, 0),
(228, 'Agustina Sekar Tandjoeng A.', '1986-05-28', 2004, 4, 0),
(229, 'Alexandra Maria Claudia Sugiarto', '1986-03-09', 2004, 4, 0),
(230, 'Alexandrina Everdine Rosali', '1986-02-02', 2004, 4, 0),
(231, 'Alice Anastasia Jovita Tjahjadi', '1985-10-22', 2004, 4, 0),
(232, 'Aloisia Permata Sari Rusli', '1986-07-24', 2004, 4, 0),
(233, 'Amelia Hartati', '1985-10-26', 2004, 4, 0),
(234, 'Anastasia Aileen Listiany B.', '1986-01-30', 2004, 4, 0),
(235, 'Anastasia Andrea Agnes Halim', '1986-07-11', 2004, 4, 0),
(236, 'Anastasia Caecilia Laura Wijaya', '1986-05-16', 2004, 4, 0),
(237, 'Anastasia Gracia Lityo', '1986-04-29', 2004, 4, 0),
(238, 'Anastasia Marcella', '1986-10-28', 2004, 4, 0),
(239, 'Angela Chrsitianti Natalia', '1986-12-20', 2004, 4, 0),
(240, 'Angela Febyani Susanto', '1986-02-15', 2004, 4, 0),
(241, 'Angela Maria Ariani Christianti', '1985-09-09', 2004, 4, 0),
(242, 'Angela Odilia Priclia Mulyadi', '1986-04-18', 2004, 4, 0),
(243, 'Angelina Wina Junvianna', '1986-04-21', 2004, 4, 0),
(244, 'Anna Denty Rahayu', '1986-01-10', 2004, 4, 0),
(245, 'Antoniette Isabelle Alexandra Janvlyn', '1986-01-02', 2004, 4, 0),
(246, 'Ariane Marsela Lestari', '1986-04-26', 2004, 4, 0),
(247, 'Ariani', '1986-01-02', 2004, 4, 0),
(248, 'Arlene Rieneke', '1986-05-08', 2004, 4, 0),
(249, 'As Happy Fransisca', '1987-02-11', 2004, 4, 0),
(250, 'Asima Oktavia Sitanggang', '1985-10-07', 2004, 4, 0),
(251, 'Astrid Anastastasia', '1986-05-31', 2004, 4, 0),
(252, 'Astrid P. Kusumawidjaya', '1986-05-20', 2004, 4, 0),
(253, 'Aurelia Maria R M Puspita Sari', '1985-01-16', 2004, 4, 0),
(254, 'Ayuditya Trias Kristianty', '1986-06-24', 2004, 4, 0),
(255, 'Barbara Dwi Desiari Wubawani', '1985-12-03', 2004, 4, 0),
(256, 'Benedicta Karina', '1985-12-15', 2004, 4, 0),
(257, 'Bernadeta D. Kusbrahmiani', '1986-12-30', 2004, 4, 0),
(258, 'Bernika Yustisiana Narang', '1986-01-22', 2004, 4, 0),
(259, 'Bertha Aprina Nainggolan', '1986-04-14', 2004, 4, 0),
(260, 'Brigitta Florencia Nathalia Tjandra', '1986-08-25', 2004, 4, 0),
(261, 'Caecilia Michaela Maria Naba', '1986-06-02', 2004, 4, 0),
(262, 'Casandra Tania', '1986-03-10', 2004, 4, 0),
(263, 'Chrisanti', '1986-11-18', 2004, 4, 0),
(264, 'Christina', '1986-10-09', 2004, 4, 0),
(265, 'Christina Isadora', '1986-08-02', 2004, 4, 0),
(266, 'Citra Dewi', '1985-11-16', 2004, 4, 0),
(267, 'Clara Claudia Anggi Citra Putri', '1986-11-29', 2004, 4, 0),
(268, 'Clementia Lauretta Adriana', '1986-03-17', 2004, 4, 0),
(269, 'Danica Adhitama', '1986-05-27', 2004, 4, 0),
(270, 'Daniella Gabriella Soplantila', '1986-10-02', 2004, 4, 0),
(271, 'Deasty Elvina', '1985-12-07', 2004, 4, 0),
(272, 'Devi Rita Rihani Girsang', '1986-09-17', 2004, 4, 0),
(273, 'Dewi Aprilia Lukman', '1986-04-18', 2004, 4, 0),
(274, 'Dewi Rosaria', '1986-05-30', 2004, 4, 0),
(275, 'Dhina Mutiara Kartikasari', '1986-12-26', 2004, 4, 0),
(276, 'Dian', '1986-04-11', 2004, 4, 0),
(277, 'Dian Herlini', '1986-03-06', 2004, 4, 0),
(278, 'Dorotha Ervina', '1986-04-13', 2004, 4, 0),
(279, 'Dyah Widyawati Soetandyo', '1985-06-09', 2004, 4, 0),
(280, 'Eclesia Ramadhani', '1986-05-29', 2004, 4, 0),
(281, 'Edesia Sekarwiri', '1986-10-27', 2004, 4, 0),
(282, 'Elisabeth Felisitas Lidia Feniati', '1986-02-16', 2004, 4, 0),
(283, 'Elisabeth Vania', '1986-11-19', 2004, 4, 0),
(284, 'Elisabeth Vina Nathania', '1986-07-16', 2004, 4, 0),
(285, 'Eliza Constantine Utama', '1986-05-04', 2004, 4, 0),
(286, 'Elrica', '1986-10-21', 2004, 4, 0),
(287, 'Elsa Rumiris Monika', '1986-04-20', 2004, 4, 0),
(288, 'Elvira Indirani', '1986-09-12', 2004, 4, 0),
(289, 'Elysia Vani Kartawijaya', '1989-01-27', 2004, 4, 0),
(290, 'Emilia Wenni Wahyuni Halim', '1986-06-27', 2004, 4, 0),
(291, 'Enggar Rindu Primandani', '1986-05-03', 2004, 4, 0),
(292, 'Erika Danusasmita', '1986-03-14', 2004, 4, 0),
(293, 'Erika Fransesa', '1986-07-12', 2004, 4, 0),
(294, 'Eunike Tarigan', '1986-10-30', 2004, 4, 0),
(295, 'F. Alexandra Febryanti Pratiwi', '1986-02-28', 2004, 4, 0),
(296, 'Fara Sirad', '1986-01-21', 2004, 4, 0),
(297, 'Feegy Wijayaputri', '0000-00-00', 1998, 2, 0),
(298, 'Ferda Yogasara', '1986-05-12', 2004, 4, 0),
(299, 'Fero Yabba Cory Win A.', '1986-03-12', 2004, 4, 0),
(300, 'Florencia Melissa', '1985-12-01', 2004, 4, 0),
(301, 'Florencia Melissa S.', '1986-04-14', 2004, 4, 0),
(302, 'Forensia Andrea Celvia Junus', '1986-10-13', 2004, 4, 0),
(303, 'Franka Faithilia Ezra Tuelah', '1987-02-15', 2004, 4, 0),
(304, 'Fransisca', '1986-11-09', 2004, 4, 0),
(305, 'Fransisca Indraswari', '1986-01-18', 2004, 4, 0),
(306, 'Fransiska Arlene', '1986-02-09', 2004, 4, 0),
(307, 'Fransiska Hanny Laurentsia', '1986-06-02', 2004, 4, 0),
(308, 'Fulvia', '1986-02-08', 2004, 4, 0),
(309, 'Gisela Andrea Sterphanie Angelica Sugani', '1986-05-07', 2004, 4, 0),
(310, 'Gita Regina', '1986-07-22', 2004, 4, 0),
(311, 'Glory Teresa Febriana', '1986-02-01', 2004, 4, 0),
(312, 'Grace Yoanna Lawadinata', '1985-12-28', 2004, 4, 0),
(313, 'Gracia Hadiwidjaja', '1986-03-07', 2004, 4, 0),
(314, 'Gracia Purnami Kurniawan', '1986-10-27', 2004, 4, 0),
(315, 'Harisma Lovian Ishwari Sibarani', '1986-05-26', 2004, 4, 0),
(316, 'Helena Kusuma', '1986-01-10', 2004, 4, 0),
(317, 'Herliana Hutabarat', '1986-05-09', 2004, 4, 0),
(318, 'Hilda Sucipto', '1986-05-10', 2004, 4, 0),
(319, 'Ilona Femmy Novena S', '1986-04-12', 2004, 4, 0),
(320, 'Imelda Djatmiko', '1986-10-16', 2004, 4, 0),
(321, 'Immaculata Astrid Budiman', '1986-01-16', 2004, 4, 0),
(322, 'Inge Metania', '1986-05-13', 2004, 4, 0),
(323, 'Intan Fourdiana', '1985-06-11', 2004, 4, 0),
(324, 'Irene Christianti', '1985-10-02', 2004, 4, 0),
(325, 'Irene Lucia Yessica Irawan', '1986-03-31', 2004, 4, 0),
(326, 'Irene Trisbiantara', '1986-06-21', 2004, 4, 0),
(327, 'Jane Eka Putri', '1986-01-16', 2004, 4, 0),
(328, 'Jenifer', '1986-04-14', 2004, 4, 0),
(329, 'Jessica Ariani', '1986-10-26', 2004, 4, 0),
(330, 'Jessica Geraldine', '1986-05-18', 2004, 4, 0),
(331, 'Jessica Mestaka', '1986-01-10', 2004, 4, 0),
(332, 'Jessica Olivia Lontoh', '1985-11-14', 2004, 4, 0),
(333, 'Jessica Santoso', '1986-05-05', 2004, 4, 0),
(334, 'Julya Gani', '1986-07-07', 2004, 4, 0),
(335, 'Karina Widagdo', '1986-03-22', 2004, 4, 0),
(336, 'Klara Astrid Wardana', '1986-12-07', 2004, 4, 0),
(337, 'Laura', '1986-05-16', 2004, 4, 0),
(338, 'Lauransia Limas', '1986-02-11', 2004, 4, 0),
(339, 'Laurencia Febby Hutomo', '1986-08-12', 2004, 4, 0),
(340, 'Laurensia Limas', '1986-02-11', 2004, 4, 0),
(341, 'Leoni Sarmauli Sihombing', '1986-07-25', 2004, 4, 0),
(342, 'Levina Augusta Geraldine Pieter', '1986-08-09', 2004, 4, 0),
(343, 'Lucia Lema Styasih', '1986-01-01', 2004, 4, 0),
(344, 'Lucia Suci Sulistyaningrum', '1986-03-27', 2004, 4, 0),
(345, 'Margaret Laurens', '1985-10-26', 2004, 4, 0),
(346, 'Margareta Astaman', '1985-12-14', 2004, 4, 0),
(347, 'Margareta Vinka Armelia', '1986-01-16', 2004, 4, 0),
(348, 'Margareth Florencia Stevani', '1985-11-07', 2004, 4, 0),
(349, 'Maria Agatha C. Gandasutrisna', '1986-01-31', 2004, 4, 0),
(350, 'Maria Agustina Sasongko', '1986-08-17', 2004, 4, 0),
(351, 'Maria Alexandra Ludwina Sari', '1986-02-07', 2004, 4, 0),
(352, 'Maria Alexandra Sinta Pramesthi HSSW', '1986-01-10', 2004, 4, 0),
(353, 'Maria Anastasia Stephanie K.', '1986-04-23', 2004, 4, 0),
(354, 'Maria Anastasia Widya Solichin', '1986-02-10', 2004, 4, 0),
(355, 'Maria Angelina', '1986-11-01', 2004, 4, 0),
(356, 'Maria Angglica Diana Listiyani', '1986-04-04', 2004, 4, 0),
(357, 'Maria Benedicta Diah Kristanti', '1987-04-16', 2004, 4, 0),
(358, 'Maria Christina Hutasoit', '1986-05-06', 2004, 4, 0),
(359, 'Maria Christina Laura', '1985-11-20', 2004, 4, 0),
(360, 'Maria Christy Tania Angwidjaja', '1986-10-22', 2004, 4, 0),
(361, 'Maria Irene Noviyani Sugiarto', '1986-11-09', 2004, 4, 0),
(362, 'Maria Leonita Widjaja', '1982-08-15', 2004, 4, 0),
(363, 'Maria Melissa Kartawinata', '1986-06-09', 2004, 4, 0),
(364, 'Maria Monika Larasati', '1986-02-07', 2004, 4, 0),
(365, 'Maria Natalia Puspadewi', '1985-12-14', 2004, 4, 0),
(366, 'Maria Priska Aryadani Kartika', '1986-02-08', 2004, 4, 0),
(367, 'Maria Yohana Archiadi', '1986-10-11', 2004, 4, 0),
(368, 'Martina Suwita', '1986-02-13', 2004, 4, 0),
(369, 'Maureen', '1986-08-20', 2004, 4, 0),
(370, 'Mechtildis Cerisnanda', '1986-01-18', 2004, 4, 0),
(371, 'Meiske Adriani', '1986-07-21', 2004, 4, 0),
(372, 'Melisa Chandra', '1986-05-22', 2004, 4, 0),
(373, 'Melissa Febriani', '1986-02-18', 2004, 4, 0),
(374, 'Merryna Nurhaga S.S.', '1986-12-17', 2004, 4, 0),
(375, 'Metta Sagita', '1985-12-03', 2004, 4, 0),
(376, 'Michaela Maria', '1986-06-02', 2004, 4, 0),
(377, 'Minetta Roselani Nadesul', '1986-04-22', 2004, 4, 0),
(378, 'Mira Riyani', '1986-05-09', 2004, 4, 0),
(379, 'Monica Halim', '1985-11-21', 2004, 4, 0),
(380, 'Monica Michelle Haryadi', '0000-00-00', 2004, 4, 0),
(381, 'Monica Miranti', '1986-07-13', 2004, 4, 0),
(382, 'Monica Yuan Marchelia', '1986-03-22', 2004, 4, 0),
(383, 'Mutiara Riani', '1986-06-25', 2004, 4, 0),
(384, 'Nancy Urusula Muljana', '1986-05-21', 2004, 4, 0),
(385, 'Natalia Rani Anggriyani', '1985-12-26', 2004, 4, 0),
(386, 'Natasha Dame Novita Sitorus', '1986-11-24', 2004, 4, 0),
(387, 'Nurshesari Budiasriati', '1986-11-07', 2004, 4, 0),
(388, 'Olivia Natasha', '1986-03-07', 2004, 4, 0),
(389, 'Olivia Sulistio', '1985-12-11', 2004, 4, 0),
(390, 'Pamela Madelen', '1986-07-06', 2004, 4, 0),
(391, 'Patricia Jessica', '1986-10-03', 2004, 4, 0),
(392, 'Patricia Petrina Clara Winoto', '1985-12-24', 2004, 4, 0),
(393, 'Paulina Dessy Wulandari', '1985-12-02', 2004, 4, 0),
(394, 'Peggy Gozali', '1986-03-29', 2004, 4, 0),
(395, 'Putri Setiadi', '1986-05-20', 2004, 4, 0),
(396, 'Putri Yulia Kristi', '1985-12-25', 2004, 4, 0),
(397, 'Raisha Stephanie', '1986-01-21', 2004, 4, 0),
(398, 'Ratih Prima Nugroho', '1986-01-04', 2004, 4, 0),
(399, 'Regina Agatha Christa Gunawan', '1986-09-17', 2004, 4, 0),
(400, 'Retnasih Supraba Adiwibowo', '1985-02-15', 2004, 4, 0),
(401, 'Reyna Cheryl', '1986-01-20', 2004, 4, 0),
(402, 'Rhanisa Hirawan', '1987-01-05', 2004, 4, 0),
(403, 'Riani Anggraeni', '1987-01-03', 2004, 4, 0),
(404, 'Rica Kartika H', '1985-10-25', 2004, 4, 0),
(405, 'Rosgita', '1986-09-22', 2004, 4, 0),
(406, 'Rumandang Puji N. Sitorus', '1986-01-23', 2004, 4, 0),
(407, 'Ruth Hutapea', '1985-09-17', 2004, 4, 0),
(408, 'Ryana Rahmat', '1986-05-17', 2004, 4, 0),
(409, 'Sabine Versayanti', '1986-01-31', 2004, 4, 0),
(410, 'Sandy Wiraatmadja', '1986-04-09', 2004, 4, 0),
(411, 'Sarah Rafika Nursyirwan', '1986-10-28', 2004, 4, 0),
(412, 'Saskia Aziza Nusyirwan', '1986-10-28', 2004, 4, 0),
(413, 'Seri', '1985-11-09', 2004, 4, 0),
(414, 'Shanti K. Atmodjo', '1986-11-22', 2004, 4, 0),
(415, 'Shanti Kusumaningurm Atmodjo', '1986-11-22', 2004, 4, 0),
(416, 'Shelda Aini', '1986-04-06', 2004, 4, 0),
(417, 'Shendy Meike Sari', '1986-05-11', 2004, 4, 0),
(418, 'Shirley Nirmalasari', '1985-12-01', 2004, 4, 0),
(419, 'Stefanie B. Anita Kurniawati', '1985-09-04', 2004, 4, 0),
(420, 'Stefannie Widya Kodrat', '1987-01-31', 2004, 4, 0),
(421, 'Stella Hidayat', '1985-12-17', 2004, 4, 0),
(422, 'Stephanie Janice', '1986-09-24', 2004, 4, 0),
(423, 'Swasti Adicita', '1986-05-15', 2004, 4, 0),
(424, 'Sylvia Francisca Hartono', '1986-11-19', 2004, 4, 0),
(425, 'Tania Orenz Sutedja', '1985-09-22', 2004, 4, 0),
(426, 'Teresa Liana', '1986-06-21', 2004, 4, 0),
(427, 'Theresia Agatha VJ Tanuwijaya', '1986-10-06', 2004, 4, 0),
(428, 'Ursula A.Febyana Susanto', '1986-02-15', 2004, 4, 0),
(429, 'Ursula Chrstina Natalia Wijaya', '1985-12-22', 2004, 4, 0),
(430, 'Ursula Felisitas Intan Purwandari', '1986-10-12', 2004, 4, 0),
(431, 'Ursula Nia', '1986-09-14', 2004, 4, 0),
(432, 'VA Audrey Sukanegara', '1986-08-22', 2004, 4, 0),
(433, 'Valensia Tania Kuswadi', '1986-12-29', 2004, 4, 0),
(434, 'Valerie Mitziani', '1986-12-25', 2004, 4, 0),
(435, 'Veronika Hotnida Simorangkir', '1986-05-23', 2004, 4, 0),
(436, 'Victoria Petra Kristiner Susilo', '1986-02-24', 2004, 4, 0),
(437, 'Vinita Surya', '1986-01-12', 2004, 4, 0),
(438, 'Virginia Samantha', '1985-09-01', 2004, 4, 0),
(439, 'Widya Solichin', '1986-02-10', 2004, 4, 0),
(440, 'Widyamurti Paramita', '1987-05-12', 2004, 4, 0),
(441, 'Widyamurti Paramita', '1987-05-12', 2004, 4, 0),
(442, 'Winda Rafianty', '1986-03-10', 2004, 4, 0),
(443, 'Winna Edwina', '1987-03-14', 2004, 4, 0),
(444, 'Wulan Sari', '1987-02-09', 2004, 4, 0),
(445, 'Yanti Novita', '1986-01-28', 2004, 4, 0),
(446, 'Yosepin Sri Ningsih', '1986-10-22', 2004, 4, 0),
(447, 'Yuanita', '1987-03-14', 2004, 4, 0),
(448, 'Yuliana Horii', '1986-07-21', 2004, 4, 0),
(449, 'A.G. Linda Linarta', '1987-03-15', 2005, 4, 0),
(450, 'Ada Deabryana Dominica B.', '1986-06-01', 2005, 4, 0),
(451, 'Adeline Christy Kwan', '1985-12-01', 2005, 4, 0),
(452, 'Adeline Ditirtono', '1986-10-01', 2005, 4, 0),
(453, 'Adisti Widyapuspa Adityaputri', '1987-09-25', 2005, 4, 0),
(454, 'Adriani Valentina Pambudi', '1987-02-14', 2005, 4, 0),
(455, 'Agnes Budihardja', '1987-08-17', 2005, 4, 0),
(456, 'Agnes Larasati Vidya W', '1986-11-05', 2005, 4, 0),
(457, 'Agnes Prasetyo', '1987-05-21', 2005, 4, 0),
(458, 'Aisyah Hamid', '1987-06-26', 2005, 4, 0),
(459, 'Amanda Aprilanie Simandjuntak', '1987-04-16', 2005, 4, 0),
(460, 'Anastasia Adeline', '1988-02-19', 2005, 4, 0),
(461, 'Anastasia Desy Arianty', '1987-12-29', 2005, 4, 0),
(462, 'Anastasia Diajeng', '1987-08-21', 2005, 4, 0),
(463, 'Anastasia Livana', '1987-03-09', 2005, 4, 0),
(464, 'Andreani Anastasia E. Marpaung', '1987-05-25', 2005, 4, 0),
(465, 'Angela A. Kartikasari Wipranata', '1987-01-27', 2005, 4, 0),
(466, 'Angela Clarissa', '1986-08-29', 2005, 4, 0),
(467, 'Angela Yoke', '1987-09-13', 2005, 4, 0),
(468, 'Angela Yosephin D.A.Dewayani', '1988-04-22', 2005, 4, 0),
(469, 'Angelina Yonata', '1987-02-22', 2005, 4, 0),
(470, 'Anne Wahyuni', '1987-06-01', 2005, 4, 0),
(471, 'Ardina Desnita Tinaor', '1986-12-05', 2005, 4, 0),
(472, 'Astrid Kartika Rahayu Setiawan', '1987-04-15', 2005, 4, 0),
(473, 'Aurelia Natasha', '1987-02-18', 2005, 4, 0),
(474, 'Ayuningtyas Pratita Sarwono', '1987-07-08', 2005, 4, 0),
(475, 'Benedicta Tiffany', '1986-11-26', 2005, 4, 0),
(476, 'Benedikta Satya Putri', '1987-03-25', 2005, 4, 0),
(477, 'Birgitta Nugraheni', '1987-10-04', 2005, 4, 0),
(478, 'Calista Pratama Kurniawan', '1987-09-20', 2005, 4, 0),
(479, 'Carissa Franto Fong', '1986-01-09', 2005, 4, 0),
(480, 'Caroline', '1987-05-25', 2005, 4, 0),
(481, 'Cheryl Hermann', '1987-06-29', 2005, 4, 0),
(482, 'Christie', '1987-10-07', 2005, 4, 0),
(483, 'Christie Linanto', '1987-10-07', 2005, 4, 0),
(484, 'Christinauly Hasibuan', '1986-11-14', 2005, 4, 0),
(485, 'Cindy Yio', '1986-07-10', 2005, 4, 0),
(486, 'Clara Agatha Mayang Anggraeni', '1985-12-02', 2005, 4, 0),
(487, 'Clara Vania Kitti', '1987-09-23', 2005, 4, 0),
(488, 'Clarentia Prameta Swasti', '1987-04-07', 2005, 4, 0),
(489, 'Clarissa Kwok', '1987-06-25', 2005, 4, 0),
(490, 'Claudia Anastasia Stephanie Koesuma', '1986-01-03', 2005, 4, 0),
(491, 'Claudia Wibowo', '1987-05-23', 2005, 4, 0),
(492, 'Cynthia Cecilie', '0000-00-00', 2002, 3, 0),
(493, 'Dea Natalia', '1986-12-24', 2005, 4, 0),
(494, 'Devianti Indi Putri', '1986-12-15', 2005, 4, 0),
(495, 'Devita', '1986-12-15', 2005, 4, 0),
(496, 'Dian Arliyana', '1986-09-16', 2005, 4, 0),
(497, 'Diant Ayu Wulandari', '1987-01-30', 2005, 4, 0),
(498, 'Donata Desideria', '1986-12-31', 2005, 4, 0),
(499, 'Dyta Anggraeni', '1987-06-24', 2005, 4, 0),
(500, 'Elise Desire', '1986-12-21', 2005, 4, 0),
(501, 'Eliska Lim', '1987-02-26', 2005, 4, 0),
(502, 'Elrica Sapphira', '1987-04-25', 2005, 4, 0),
(503, 'Eswytha Fadzilah', '1986-08-28', 2005, 4, 0),
(504, 'Eugenia Fransisca Yoanita', '1987-10-26', 2005, 4, 0),
(505, 'Finy Irawan', '1987-06-30', 2005, 4, 0),
(506, 'Fiona Laoda', '1987-02-26', 2005, 4, 0),
(507, 'Florensia Wiria T', '1986-12-10', 2005, 4, 0),
(508, 'Frances Maryanne Elise Stanlie', '1987-04-30', 2005, 4, 0),
(509, 'Fransisca', '1988-05-26', 2005, 4, 0),
(510, 'Fransisca Mediana Indrawati', '1988-09-19', 2005, 4, 0),
(511, 'Friesca Vienna Saputra', '1987-08-29', 2005, 4, 0),
(512, 'Giasinta Angguni Pranandhita', '1987-02-18', 2005, 4, 0),
(513, 'Grace Putri Sejati', '1987-05-12', 2005, 4, 0),
(514, 'Gracia Augusta', '1987-08-21', 2005, 4, 0),
(515, 'Hanna Danudirgo', '1987-09-26', 2005, 4, 0),
(516, 'Helena Yoanita Clara Wiaryo', '1987-08-18', 2005, 4, 0),
(517, 'Herin Devianti', '1987-07-27', 2005, 4, 0),
(518, 'Indah Lestari', '1987-02-01', 2005, 4, 0),
(519, 'Indriati', '1987-09-21', 2005, 4, 0),
(520, 'Ines', '1987-07-29', 2005, 4, 0),
(521, 'Ingrid', '1987-03-03', 2005, 4, 0),
(522, 'Irene Kencana Wikanta', '1987-08-18', 2005, 4, 0),
(523, 'Isabela Suryanti', '1987-03-27', 2005, 4, 0),
(524, 'Jauventia Renata Rucitawati', '1987-01-08', 2005, 4, 0),
(525, 'Jessica', '1987-06-23', 2005, 4, 0),
(526, 'Jessica Prissilia', '1987-04-11', 2005, 4, 0),
(527, 'Jessica Sutanto', '1988-01-31', 2005, 4, 0),
(528, 'Jessica Wardana', '1987-07-24', 2005, 4, 0),
(529, 'Kamelia Tulus Hardiwati', '1987-11-04', 2005, 4, 0),
(530, 'Karina', '1986-12-21', 2005, 4, 0),
(531, 'Kartika Dian Fransisca', '1987-03-09', 2005, 4, 0),
(532, 'Katharina Stephanie Hoetomo', '1987-01-19', 2005, 4, 0),
(533, 'Komang Natalia Indihapsari', '1986-12-25', 2005, 4, 0),
(534, 'Krista Ekaputri', '1986-10-28', 2005, 4, 0),
(535, 'Laurentihia Wiyanty', '1987-04-18', 2005, 4, 0),
(536, 'Lidwina Elisa', '1987-08-02', 2005, 4, 0),
(537, 'Lidwitianingrum', '1987-03-27', 2005, 4, 0),
(538, 'Like Andini', '1987-06-07', 2005, 4, 0),
(539, 'Lilia Wati', '1987-11-22', 2005, 4, 0),
(540, 'Louisa Lidwina Laura Lukmanto', '1987-08-17', 2005, 4, 0),
(541, 'Ludovika Jessica Virginia', '1987-10-10', 2005, 4, 0),
(542, 'M. Angelina Susanti Himawan', '1987-09-11', 2005, 4, 0),
(543, 'Maria Angela', '1986-09-07', 2005, 4, 0),
(544, 'Maria Anggita Kusalasari', '1987-05-11', 2005, 4, 0),
(545, 'Maria Florencia Deslivia', '1987-12-28', 2005, 4, 0),
(546, 'Maria Jaclyn', '1987-01-20', 2005, 4, 0),
(547, 'Maria Laurentia Stefanie', '1985-12-07', 2005, 4, 0),
(548, 'Maria Lidwina Utami', '1987-05-20', 2005, 4, 0),
(549, 'Maria Marcellina', '1987-08-15', 2005, 4, 0),
(550, 'Maria Merry Kusumawardhani', '1987-10-05', 2005, 4, 0),
(551, 'Maria Priscilla', '1987-04-25', 2005, 4, 0),
(552, 'Maria Sesilia Cindy Permana', '1987-10-13', 2005, 4, 0),
(553, 'Maria Yuniar Ardiati', '1987-06-21', 2005, 4, 0),
(554, 'Mariska', '1987-05-12', 2005, 4, 0),
(555, 'Mariska Febriyani', '1987-02-03', 2005, 4, 0),
(556, 'Martina Suryanata', '1987-09-04', 2005, 4, 0),
(557, 'Maryana Hermawan', '1987-09-18', 2005, 4, 0),
(558, 'Maureen Tandiono', '1986-10-17', 2005, 4, 0),
(559, 'Meirita Kaniar', '1987-05-25', 2005, 4, 0),
(560, 'Melissa Angelina Ngantung', '1987-02-10', 2005, 4, 0),
(561, 'Michaella Michelle Johanna', '1987-05-20', 2005, 4, 0),
(562, 'Michelle', '1987-02-03', 2005, 4, 0),
(563, 'Michelle Owen', '1987-02-05', 2005, 4, 0),
(564, 'Mirna Efar', '1987-11-09', 2005, 4, 0),
(565, 'Monica Lestiani', '1987-06-24', 2005, 4, 0),
(566, 'Monika Lestiani', '1987-06-24', 2005, 4, 0),
(567, 'Monika Tjee', '1987-03-15', 2005, 4, 0),
(568, 'Nadia Febyani', '1986-12-21', 2005, 4, 0),
(569, 'Nadia Henrietta', '1987-09-11', 2005, 4, 0),
(570, 'Nathania Nenny Wibowo', '1986-10-29', 2005, 4, 0),
(571, 'Ni Wayan Ratnamaheshwari', '1988-11-01', 2005, 4, 0),
(572, 'Novianti Rentauli Susilorni', '1987-11-03', 2005, 4, 0),
(573, 'Petra Damiana Ajeng Kenyo Rhinjandini', '1986-12-25', 2005, 4, 0),
(574, 'Pradila Galuh Savitri', '1987-05-28', 2005, 4, 0),
(575, 'Pricilia Cindy', '1987-04-20', 2005, 4, 0),
(576, 'Priscilla Mareita Halim', '1987-03-01', 2005, 4, 0),
(577, 'RA Dewi Rosanti Retno Ambar Kusumo', '1985-01-15', 2005, 4, 0),
(578, 'Regina Jessica Widjanarko', '1986-03-15', 2005, 4, 0),
(579, 'Rhita Pinta Berliana Simorangkir', '1987-06-22', 2005, 4, 0),
(580, 'Riffany Anastasia Muliadi', '1987-04-22', 2005, 4, 0),
(581, 'Rivani Liana Syaiful', '1987-11-07', 2005, 4, 0),
(582, 'Rizky Beta Puspita Sari', '1987-09-14', 2005, 4, 0),
(583, 'Rosalia', '1986-05-12', 2005, 4, 0),
(584, 'Rosaline Paramitha', '1987-01-27', 2005, 4, 0),
(585, 'Rr. Angela Lukytosari S.', '1986-03-28', 2005, 4, 0),
(586, 'Sarma Da Hita Silalahi', '1987-03-21', 2005, 4, 0),
(587, 'Shanti Nata', '1987-02-07', 2005, 4, 0),
(588, 'Sonia Suriaranie', '1987-02-08', 2005, 4, 0),
(589, 'Stefani Dian Angelie', '1988-01-23', 2005, 4, 0),
(590, 'Stefani Eka Utama', '1987-04-15', 2005, 4, 0),
(591, 'Steffi Setiawan Praworo', '1987-06-14', 2005, 4, 0),
(592, 'Stella Ilone', '1987-12-30', 2005, 4, 0),
(593, 'Stella Lukman', '1987-03-02', 2005, 4, 0),
(594, 'Stella Ryani Gunawan', '1987-08-03', 2005, 4, 0),
(595, 'Stephani Melisa Krisna', '1987-08-24', 2005, 4, 0),
(596, 'Stephani Melisa Krisna', '1987-08-24', 2005, 4, 0),
(597, 'Stephanie Fedora', '1986-12-06', 2005, 4, 0),
(598, 'Sunny Orlena', '1986-10-25', 2005, 4, 0),
(599, 'Tamara Kristiani', '1987-01-17', 2005, 4, 0),
(600, 'Tarida Christia Ersanna', '1986-12-12', 2005, 4, 0),
(601, 'Terena', '1987-10-30', 2005, 4, 0),
(602, 'Theresia Yinski Pistari', '1986-10-18', 2005, 4, 0),
(603, 'Tiara Kartika', '1987-12-31', 2005, 4, 0),
(604, 'Tike Marita Tosim', '1987-06-13', 2005, 4, 0),
(605, 'Ursula Gita Astuti', '1986-10-21', 2005, 4, 0),
(606, 'Utari Paramita Sarwono', '1987-06-04', 2005, 4, 0),
(607, 'Veronica Amanda', '1987-04-03', 2005, 4, 0),
(608, 'Virginia Permata Sari', '1987-03-08', 2005, 4, 0),
(609, 'Vita Aprillia', '1987-04-30', 2005, 4, 0),
(610, 'Winnie Fauza Primadewi', '1987-04-03', 2005, 4, 0),
(611, 'Wuri Utari Adiwibowo', '1987-11-23', 2005, 4, 0),
(612, 'Yasinta Stephanie Datrix Sitomang', '1987-03-04', 2005, 4, 0),
(613, 'Yoanita', '1987-10-26', 2005, 4, 0),
(614, 'Yoanita', '1987-08-18', 2005, 4, 0),
(615, 'Yoselda Malona', '1986-09-05', 2005, 4, 0),
(616, 'Yosephine Finyta', '1986-06-12', 2002, 3, 0),
(617, 'Yovita Irma Gunawan', '1987-02-11', 2005, 4, 0),
(618, 'Adela Pranindiati', '1988-04-14', 2006, 4, 0),
(619, 'Adelia Stefina', '1988-02-08', 2006, 4, 0),
(620, 'Adeline Kornelus', '1988-06-18', 2006, 4, 0),
(621, 'Adytha Dwi Astuti', '1988-05-07', 2006, 4, 0),
(622, 'Agatha Dwi Astuti', '1988-01-03', 2006, 4, 0),
(623, 'Agnes Eufrasia lim', '1987-09-24', 2006, 4, 0),
(624, 'Agnes Juniper Husada', '1988-06-30', 2006, 4, 0),
(625, 'Agnes Nathania', '1988-08-12', 2006, 4, 0),
(626, 'Alicia Gunterus', '1988-02-15', 2006, 4, 0),
(627, 'Alvita Wina Kartika', '1989-01-10', 2006, 4, 0),
(628, 'Amanda Juwita', '1988-01-10', 2006, 4, 0),
(629, 'Anastasia Tiffany Valens', '1988-04-20', 2006, 4, 0),
(630, 'Anastasia Viandita', '1988-07-27', 2006, 4, 0),
(631, 'Angela Elvina Simanjutak', '1988-08-18', 2006, 4, 0),
(632, 'Angela Indah Purnamsari', '1988-05-11', 2006, 4, 0),
(633, 'Angela Jessica Utari', '1988-08-22', 2006, 4, 0),
(634, 'Angela Retie', '1988-10-10', 2006, 4, 0),
(635, 'Angelica Y M Vianey Helen Wijaya', '1988-08-04', 2006, 4, 0),
(636, 'Angelina Kornelus', '1988-06-18', 2006, 4, 0),
(637, 'Anggun Soraya', '1988-07-09', 2006, 4, 0),
(638, 'Anindiana Puspitarini', '1988-03-26', 2006, 4, 0),
(639, 'Anindita Pamaputri', '1987-10-12', 2006, 4, 0),
(640, 'Anna Aurelia', '1988-07-22', 2006, 4, 0),
(641, 'Anneline Pratiwi', '1988-02-22', 2006, 4, 0),
(642, 'Arini Astasari', '1987-08-12', 2006, 4, 0),
(643, 'Ariyanti Dragona', '1988-05-04', 2006, 4, 0),
(644, 'Astrid Indriani', '1987-05-21', 2006, 4, 0),
(645, 'Belle Bintang Biarezky', '1987-08-12', 2003, 3, 0),
(646, 'Carolina Hasiana Noviyanti Sinurat', '1988-11-04', 2006, 4, 0),
(647, 'Caroline Larissa Gozali', '1987-12-17', 2006, 4, 0),
(648, 'Cassandra Theodora', '1988-06-21', 2006, 4, 0),
(649, 'Catharina Rani Mustika Laras', '1988-04-28', 2006, 4, 0),
(650, 'Charlotte Octaria', '1988-10-01', 2006, 4, 0),
(651, 'Chitra Laras', '1988-01-07', 2006, 4, 0),
(652, 'Christina Alfiani', '1987-05-24', 2006, 4, 0),
(653, 'Cindy Aprilia Hiemawan', '1988-04-09', 2006, 4, 0),
(654, 'Cindy Kartika', '1988-03-17', 2006, 4, 0),
(655, 'Clarissa Tania', '1987-09-17', 2006, 4, 0),
(656, 'Claudia Hartono', '1988-01-16', 2006, 4, 0),
(657, 'Clementia Christina Olivia D.', '1987-12-29', 2006, 4, 0),
(658, 'Cuni Candrika', '1987-05-14', 2006, 4, 0),
(659, 'Cynthia Ruslan', '1988-01-01', 2006, 4, 0),
(660, 'Deasy Noviany', '1987-11-18', 2006, 4, 0),
(661, 'Debby Sarita', '1988-10-07', 2006, 4, 0),
(662, 'Devina Chrisanti', '1988-12-27', 2006, 4, 0),
(663, 'Dhammakshanti Paramita', '1988-08-24', 2006, 4, 0),
(664, 'Dwitiya Kusuma', '1988-06-16', 2006, 4, 0),
(665, 'Eliani', '1988-04-10', 2006, 4, 0),
(666, 'Eline Putriani', '1987-09-28', 2006, 4, 0),
(667, 'Elisabeth Natalia', '1987-12-19', 2006, 4, 0),
(668, 'Elizabeth Andri Rusli', '1987-10-20', 2006, 4, 0),
(669, 'Ellen Haneska', '1988-11-24', 2006, 4, 0),
(670, 'En Rogel Betty Angel', '1989-02-17', 2006, 4, 0),
(671, 'Evelin Bingei', '1988-06-01', 2006, 4, 0),
(672, 'Everina Hansa', '1987-11-11', 2006, 4, 0),
(673, 'Evylina', '1988-04-05', 2006, 4, 0),
(674, 'Falvia K. Amanda Juwita Sendjaja', '1988-01-10', 2006, 4, 0),
(675, 'Fanny Oktavia', '1988-10-21', 2006, 4, 0),
(676, 'Febrina', '1988-02-03', 2006, 4, 0),
(677, 'Felicia Kathleen', '1988-06-21', 2006, 4, 0),
(678, 'Felicia Mettaswari', '1988-05-19', 2006, 4, 0),
(679, 'Felinda Stefika', '1988-02-08', 2006, 4, 0),
(680, 'Felisia', '1988-02-12', 2006, 4, 0),
(681, 'Fiona Ekaristi Putri', '1987-07-11', 2006, 4, 0),
(682, 'Florensia Restian Dwi Anggraini', '1988-09-20', 2006, 4, 0),
(683, 'Florentina Agnes Kresnawan', '1988-06-23', 2006, 4, 0),
(684, 'Fransisca Triani', '1988-05-05', 2006, 4, 0),
(685, 'Fransisca Yuliana', '1988-07-31', 2006, 4, 0),
(686, 'Frieda Widyasari', '1988-05-31', 2006, 4, 0),
(687, 'Gita Maria', '1988-07-18', 2006, 4, 0),
(688, 'Grace Monika Ramli', '1988-07-22', 2006, 4, 0),
(689, 'Imelda Paraditha', '1988-10-16', 2006, 4, 0),
(690, 'Ines Dyah Iswara', '1988-07-08', 2006, 4, 0),
(691, 'Inez Hanida', '1988-02-11', 2006, 4, 0),
(692, 'Inez Maria kartika', '1987-05-10', 2006, 4, 0),
(693, 'Irene', '1988-05-22', 2006, 4, 0),
(694, 'Irene Natalia', '1988-12-17', 2006, 4, 0),
(695, 'Irene Patricia Schoggers', '1988-02-09', 2006, 4, 0),
(696, 'Irma Anindita', '1987-10-15', 2006, 4, 0),
(697, 'Irma Anindita Siswadi', '1987-11-15', 2006, 4, 0),
(698, 'Jennifer', '1988-02-22', 2006, 4, 0),
(699, 'Jessica', '1988-03-05', 2006, 4, 0),
(700, 'Jessica Adriana', '1988-03-18', 2006, 4, 0),
(701, 'Jessica Chandika', '1988-03-05', 2006, 4, 0),
(702, 'Jessica Farolan', '1988-09-02', 2006, 4, 0),
(703, 'Jessica Susilo', '1988-04-11', 2006, 4, 0),
(704, 'Jocelin Go', '1989-07-11', 2006, 4, 0),
(705, 'Johana Mustika', '1988-07-15', 2006, 4, 0),
(706, 'Josephine', '1988-05-28', 2006, 4, 0),
(707, 'Josephine Lembong', '1988-05-01', 2006, 4, 0),
(708, 'Juliane Christina (Kurisu-tin)', '1988-07-18', 2006, 4, 0),
(709, 'Kania Wandaputri', '1988-06-28', 2006, 4, 0),
(710, 'Kara Lumban Toruan Sihombing', '1989-05-03', 2006, 4, 0),
(711, 'Karina Ayu Putri', '1987-12-30', 2006, 4, 0),
(712, 'Karina Natasha', '1988-11-19', 2006, 4, 0),
(713, 'Katrina Maria Kurniati', '1988-11-13', 2006, 4, 0),
(714, 'Keffi Karina', '1988-04-12', 2006, 4, 0),
(715, 'Kresentia Editha Septianingtyas', '1988-09-07', 2006, 4, 0),
(716, 'Krizia Magdalena', '1988-09-22', 2006, 4, 0),
(717, 'Laura Althea', '1988-05-08', 2006, 4, 0),
(718, 'Laurencia Chrisyanti Wibawa', '1988-05-16', 2006, 4, 0),
(719, 'Laurentya Olga', '1988-10-29', 2006, 4, 0),
(720, 'Lavina Kristie', '1987-12-21', 2006, 4, 0),
(721, 'Leona Vicky Djajadi', '1988-03-15', 2006, 4, 0),
(722, 'Leona Victoria', '1988-03-15', 2006, 4, 0),
(723, 'Leona Victoria', '1988-03-15', 2006, 4, 0),
(724, 'Levi Mahardja', '1988-09-14', 2006, 4, 0),
(725, 'Lilyanan', '1988-04-06', 2006, 4, 0),
(726, 'Lisa Maria Iwo', '1988-05-28', 2006, 4, 0),
(727, 'Lucia Yasmin Sondang Sianipar', '1987-10-19', 2006, 4, 0),
(728, 'Marcella', '1988-03-21', 2006, 4, 0),
(729, 'Marcella Yolina Srihastuty', '1988-03-20', 2006, 4, 0),
(730, 'Marchella Yasinta', '1988-03-06', 2006, 4, 0),
(731, 'Mardina', '1988-03-19', 2006, 4, 0),
(732, 'Maria Agustini', '1988-09-27', 2006, 4, 0),
(733, 'Maria Agustini', '1988-09-27', 2006, 4, 0),
(734, 'Maria Angela Gita Ayudya', '1988-01-27', 2006, 4, 0),
(735, 'Maria Eko Pratiwi', '1987-06-19', 2006, 4, 0),
(736, 'Maria Jessica', '1987-11-19', 2006, 4, 0),
(737, 'Maria Lindy Arlini', '1987-12-31', 2006, 4, 0),
(738, 'Maria Meilita', '1988-05-10', 2006, 4, 0),
(739, 'Maria Puspita Ayudiah Roosno', '1987-11-08', 2006, 4, 0),
(740, 'Maria Regina Putri', '1987-10-21', 2006, 4, 0),
(741, 'Maria Yoanita Gunawan', '1988-08-04', 2006, 4, 0),
(742, 'Maria Yovita Lisanti', '1988-10-10', 2006, 4, 0),
(743, 'Mariska Tantri', '1987-11-05', 2006, 4, 0),
(744, 'Marla Eka Putri', '1988-03-13', 2006, 4, 0),
(745, 'Melissa', '1988-04-06', 2006, 4, 0),
(746, 'Melita Suwan Djaja', '1988-05-18', 2006, 4, 0),
(747, 'Metta Susanto', '1988-02-13', 2006, 4, 0),
(748, 'Michiko Ananda', '1988-02-11', 2006, 4, 0),
(749, 'Mita Anindya', '1988-05-31', 2006, 4, 0),
(750, 'Monica Meryl Aletra Sangari', '1987-10-19', 2006, 4, 0),
(751, 'Mudita Sucarita', '1989-04-14', 2006, 4, 0),
(752, 'Mudita Sucarita', '1989-04-14', 2006, 4, 0),
(753, 'Mulianingsih', '1988-02-18', 2006, 4, 0),
(754, 'Nadia Aliany', '1987-09-20', 2006, 4, 0),
(755, 'Naritalia Tessanica', '1988-06-22', 2006, 4, 0),
(756, 'Natasha', '1988-01-11', 2006, 4, 0),
(757, 'Nathania Astria', '1988-01-22', 2006, 4, 0),
(758, 'Ni Luh Gede Lydia Kusumadewi', '1988-05-06', 2006, 4, 0),
(759, 'Niken Wulandari', '1988-03-03', 2006, 4, 0),
(760, 'Nina Gandayana', '1989-04-19', 2006, 4, 0),
(761, 'Noviana', '1987-11-05', 2006, 4, 0),
(762, 'Nuti Indrani Alviana', '1988-04-26', 2006, 4, 0),
(763, 'Olivia Jiuwengky', '1988-04-26', 2006, 4, 0),
(764, 'Patricia Sanjoto', '1988-01-10', 2006, 4, 0),
(765, 'Priska Eugenia Kalista', '1988-01-17', 2006, 4, 0),
(766, 'Priska Gabriella', '1988-06-20', 2006, 4, 0),
(767, 'Puti Alia Harsa', '1988-01-29', 2006, 4, 0),
(768, 'Putri', '1988-08-16', 2006, 4, 0),
(769, 'Raesa Yolanda', '1989-02-23', 2006, 4, 0),
(770, 'Raisa Merliza', '1988-06-16', 2006, 4, 0),
(771, 'Regina Cindy Tjota', '1988-08-30', 2006, 4, 0),
(772, 'Rieke Caroline', '1988-05-19', 2006, 4, 0),
(773, 'Rika Indrawan', '1988-07-04', 2006, 4, 0),
(774, 'Rini Hapsari Santosa', '1987-10-05', 2006, 4, 0),
(775, 'Rizky Vanesha', '1989-01-25', 2006, 4, 0),
(776, 'Rosalia', '1987-10-29', 2006, 4, 0),
(777, 'Rosianna Patricia Rusly', '1988-04-19', 2006, 4, 0),
(778, 'Rr. Titah Lestari Regina Haryani', '1988-03-09', 2006, 4, 0),
(779, 'Ruri Fitriyanti', '1988-05-17', 2006, 4, 0),
(780, 'Shally Tanoto', '1988-09-18', 2006, 4, 0),
(781, 'Sharon Louivina', '1988-09-22', 2006, 4, 0),
(782, 'Shula Zuleika Sumana', '1989-10-31', 2006, 4, 0),
(783, 'Stefani Pramudita', '1988-05-08', 2006, 4, 0),
(784, 'Stella', '1987-08-18', 2006, 4, 0),
(785, 'Stephani Putri Fajar', '1988-09-19', 2006, 4, 0),
(786, 'Stephanie Kartika Lestari', '1988-06-08', 2006, 4, 0),
(787, 'Susan', '1988-06-23', 2006, 4, 0),
(788, 'Synthia Rachel', '1988-05-12', 2006, 4, 0),
(789, 'Tara Puspita Sani', '1988-10-29', 2006, 4, 0),
(790, 'Teresia Evita', '0000-00-00', 2006, 4, 0),
(791, 'Thanya Madeline Abigail Ponggawa', '1988-01-06', 2006, 4, 0),
(792, 'Theresia Puji Natadja', '1988-02-17', 2006, 4, 0),
(793, 'Tiur Laurensia', '1987-05-25', 2006, 4, 0),
(794, 'Valentina Sanny Salim', '1988-07-01', 2006, 4, 0),
(795, 'Valentine', '1988-02-14', 2006, 4, 0),
(796, 'Valerie Adeningtyas', '1988-04-10', 2006, 4, 0),
(797, 'Valerie Franto', '1987-12-01', 2006, 4, 0),
(798, 'Valiska Nathania', '1988-11-08', 2006, 4, 0),
(799, 'Vanessa', '1988-04-04', 2006, 4, 0),
(800, 'Vienesia', '1988-06-07', 2006, 4, 0),
(801, 'Vionita Kinarwan', '1988-03-17', 2006, 4, 0),
(802, 'Wellina', '1988-03-19', 2006, 4, 0),
(803, 'Widya Yuniarti', '1988-06-10', 2006, 4, 0),
(804, 'Winda Ekayanti', '1988-04-30', 2006, 4, 0),
(805, 'Wiryani Winata Nagawijaya', '1989-04-15', 2006, 4, 0),
(806, 'Yessica', '1988-08-13', 2006, 4, 0),
(807, 'Yurika', '1987-09-15', 2006, 4, 0),
(808, 'Adysti Raissa Fitri', '1990-04-30', 2007, 4, 0),
(809, 'Alexandra Karman', '1990-01-06', 2007, 4, 0),
(810, 'Angela', '1989-09-10', 2007, 4, 0),
(811, 'Angela Jessica', '1989-08-01', 2007, 4, 0),
(812, 'Bernadeth Margritta', '1990-04-16', 2007, 4, 0),
(813, 'Debby', '1988-09-19', 2007, 4, 0),
(814, 'Federica Setiawan', '1989-08-11', 2007, 4, 0),
(815, 'Irawati veronica andries', '1987-12-11', 2007, 4, 0),
(816, 'Jessica Kesumah', '1989-06-20', 2007, 4, 0),
(817, 'Maria Goretti', '1989-03-10', 2007, 4, 0),
(818, 'Maria Josephina', '1989-03-23', 2007, 4, 0),
(819, 'Myriam Shasmitha Larasati', '1989-04-03', 2007, 4, 0),
(820, 'Vanissa', '1989-02-17', 2007, 4, 0),
(821, 'Vina Danica', '1989-03-13', 2007, 4, 0),
(822, 'Zaskya Mansur', '1989-07-22', 2007, 4, 0),
(823, 'Adela', '1990-03-30', 2008, 4, 0),
(824, 'Adelheid Astrid', '1989-12-11', 2008, 4, 0),
(825, 'Anindya Intan', '1989-12-29', 2008, 4, 0),
(826, 'Augustine Merriska', '1990-08-28', 2008, 4, 0),
(827, 'Caecilia Michella', '1990-10-29', 2008, 4, 0),
(828, 'Catherine Dhammamitta Viriya', '1990-04-12', 2008, 4, 0),
(829, 'Felita Ciputra', '1991-02-19', 2008, 4, 0),
(830, 'Fernisia Richtia Winnferdy', '1990-03-07', 2008, 4, 0),
(831, 'Grace Silvana Wiradjaja', '1990-05-20', 2008, 4, 0),
(832, 'Gracia Naftali', '1990-05-01', 2008, 4, 0),
(833, 'Ignatia Wulandari', '1989-09-20', 2008, 4, 0),
(834, 'Ines Olivia W.', '1990-08-01', 2008, 4, 0),
(835, 'Kamelia Astrid', '1990-02-28', 2008, 4, 0),
(836, 'Khattiya Pannindriya', '1990-06-13', 2008, 4, 0),
(837, 'Lidwina', '1990-01-29', 2008, 4, 0),
(838, 'Lidwina Ayu Andarini', '1990-08-02', 2008, 4, 0),
(839, 'Liliana', '1990-12-14', 2008, 4, 0),
(840, 'Lusia Novita Sari', '1990-06-02', 2008, 4, 0),
(841, 'Margaretha Frida', '1990-03-10', 2008, 4, 0),
(842, 'Maria Clarissa Wiraputranto', '1990-07-01', 2008, 4, 0),
(843, 'Maria Devianna Avisena Lieka', '1990-01-16', 2008, 4, 0),
(844, 'Marsella', '1990-03-22', 2008, 4, 0),
(845, 'Maureen', '1990-04-16', 2008, 4, 0),
(846, 'Maya Oktaviani Sari', '1990-10-09', 2008, 4, 0),
(847, 'Melvina', '1990-11-17', 2008, 4, 0),
(848, 'Meutia Ayuputeri', '1989-12-20', 2008, 4, 0),
(849, 'Natalia Iskandar Setiawan', '1989-12-23', 2008, 4, 0),
(850, 'Natalia Rialucky Tampubolon', '1990-12-24', 2008, 4, 0),
(851, 'Niken Sekar Melati', '1990-09-15', 2008, 4, 0),
(852, 'Pusparani Krisnamurthi', '1989-12-07', 2008, 4, 0),
(853, 'Regita Dian pertiwi', '1990-07-15', 2008, 4, 0),
(854, 'Rissa Margareta', '1989-10-11', 2008, 4, 0),
(855, 'Shirly', '1990-09-16', 2008, 4, 0),
(856, 'Silvyana', '1991-02-18', 2008, 4, 0),
(857, 'Stephanie Rengkung', '1990-08-24', 2008, 4, 0),
(858, 'Tabita Diela ', '1990-03-26', 2008, 4, 0),
(859, 'Tatiana Nobianka Dewi', '1989-11-03', 2008, 4, 0),
(860, 'Tissy Fabiola', '1990-08-26', 2008, 4, 0),
(861, 'Vania Januari', '1990-01-24', 2008, 4, 0),
(862, 'Veronica Jenny Tanzil', '1991-01-16', 2008, 4, 0),
(863, 'Yena Saribhawani', '1990-05-30', 2008, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `latitude` decimal(20,10) NOT NULL,
  `longitude` decimal(20,10) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`id`, `name`, `latitude`, `longitude`, `count`) VALUES
(1, 'Australia', '-29.5328037000', '145.4914770000', 0),
(2, 'Indonesia', '-0.7892750000', '113.9213270000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `area_user`
--

DROP TABLE IF EXISTS `area_user`;
CREATE TABLE IF NOT EXISTS `area_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `area_user`
--

INSERT INTO `area_user` (`id`, `user_id`, `area_id`) VALUES
(1, 3, 2);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `level_id`, `graduate_year`, `school`, `major_id`, `minor_id`) VALUES
(4, 2, 1, 2008, 'SMAN 2 Jombang', 0, 0),
(6, 1, 3, 2012, 'Institut Teknologi Bandung', 1, 0),
(7, 1, 1, 0000, 'SMAN 1 Cianjur', 0, 0);

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
  `cp_name` varchar(255) DEFAULT NULL,
  `cp_hp` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `start_time`, `venue`, `category_event_id`, `image_url`, `cp_name`, `cp_hp`) VALUES
(1, 'Deadline Sanur', 'Ini adalah deskripsinya', '2011-07-15 13:19:58', 'Kantor SP', 1, 'res/event/1.jpg', NULL, NULL),
(2, 'Tes ajah', 'Cuma tes', '2011-07-20 15:19:40', 'Meja Kantor', 1, 'res/event/2.jpg', NULL, NULL),
(3, 'Tes Lagi ', 'Cuma tes aja', '2011-07-20 11:06:29', 'Kubikel', 1, 'res/event/3.jpg', NULL, NULL),
(4, 'Event Kemarin', 'Kemarin', '2011-07-20 11:06:44', 'Tempat Kemarin', 1, 'res/event/4.jpg', NULL, NULL);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `friend_relationship`
--

INSERT INTO `friend_relationship` (`id`, `userid_1`, `userid_2`) VALUES
(5, 2, 3);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

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
(1, 'Male'),
(2, 'Female');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `interested_in`
--

INSERT INTO `interested_in` (`id`, `user_id`, `interest_id`) VALUES
(1, 2, 3),
(2, 2, 5),
(3, 2, 6),
(4, 2, 7),
(5, 2, 10),
(6, 2, 11),
(7, 3, 1),
(8, 3, 5),
(9, 3, 6);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

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
(11, 'Spam 7', 1, 3, 'huahahaha', '2011-07-19 17:43:54'),
(12, 'a', 2, 3, 'hai juga pudy', '2011-07-20 17:59:11'),
(13, 'a', 2, 3, 'Type your message here....', '2011-07-20 18:00:38'),
(14, 'asdf', 2, 1, 'hoi', '2011-07-29 15:50:15'),
(15, 'Subject', 1, 2, 'Type your message here...', '2011-08-02 14:53:52'),
(16, 'Subject', 1, 2, 'Type your message here...', '2011-08-02 14:54:07');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `publishing_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `content` text,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `publishing_date`, `content`, `title`) VALUES
(5, '2011-07-29 14:41:20', '<span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; "><b><img src="http://upload.wikimedia.org/wikipedia/en/thumb/9/9e/JQuery_logo.svg/220px-JQuery_logo.svg.png" alt="" align="none">jQuery</b>&nbsp;is a&nbsp;<a href="http://en.wikipedia.org/wiki/Cross-browser" title="Cross-browser" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">cross-browser</a>&nbsp;<a href="http://en.wikipedia.org/wiki/JavaScript_library" title="JavaScript library" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">JavaScript library</a>&nbsp;designed to simplify the&nbsp;<a href="http://en.wikipedia.org/wiki/Client-side_scripting" title="Client-side scripting" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">client-side scripting</a>&nbsp;of&nbsp;<a href="http://en.wikipedia.org/wiki/HTML" title="HTML" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">HTML</a>.<sup id="cite_ref-jquery.com_0-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JQuery#cite_note-jquery.com-0" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>1<span>]</span></a></sup>&nbsp;It was released in January 2006 at<a href="http://en.wikipedia.org/wiki/BarCamp" title="BarCamp" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">BarCamp</a>&nbsp;NYC by&nbsp;<a href="http://en.wikipedia.org/wiki/John_Resig" title="John Resig" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">John Resig</a>. Used by over 46% of the 10,000 most visited websites, jQuery is the most popular&nbsp;<a href="http://en.wikipedia.org/wiki/JavaScript_library" title="JavaScript library" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">JavaScript library</a>&nbsp;in use today.<sup id="cite_ref-1" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JQuery#cite_note-1" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>2<span>]</span></a></sup><sup id="cite_ref-2" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JQuery#cite_note-2" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>3<span>]</span></a></sup></p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">jQuery is&nbsp;<a href="http://en.wikipedia.org/wiki/Free_and_open_source_software" title="Free and open source software" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">free, open source software</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Dual-licensing" title="Dual-licensing" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">dual-licensed</a>&nbsp;under the&nbsp;<a href="http://en.wikipedia.org/wiki/MIT_License" title="MIT License" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">MIT License</a>&nbsp;and the&nbsp;<a href="http://en.wikipedia.org/wiki/GNU_General_Public_License#Version_2" title="GNU General Public License" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">GNU General Public License, Version 2</a>.<sup id="cite_ref-3" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JQuery#cite_note-3" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>4<span>]</span></a></sup>&nbsp;jQuery''s syntax is designed to make it easier to navigate a document, select&nbsp;<a href="http://en.wikipedia.org/wiki/Document_Object_Model" title="Document Object Model" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">DOM</a>&nbsp;elements, create&nbsp;<a href="http://en.wikipedia.org/wiki/Animation" title="Animation" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">animations</a>, handle&nbsp;<a href="http://en.wikipedia.org/wiki/Event_(computing)" title="Event (computing)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">events</a>, and develop&nbsp;<a href="http://en.wikipedia.org/wiki/Ajax_(programming)" title="Ajax (programming)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Ajax applications</a>. jQuery also provides capabilities for developers to create&nbsp;<a href="http://en.wikipedia.org/wiki/Plug-in_(computing)" title="Plug-in (computing)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">plug-ins</a>&nbsp;on top of the JavaScript library. This enables developers to create&nbsp;<a href="http://en.wikipedia.org/wiki/Abstraction_(computer_science)" title="Abstraction (computer science)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">abstractions</a>&nbsp;for low-level interaction and animation, advanced effects and high-level, theme-able widgets. The modular approach to the jQuery framework allows the creation of powerful and dynamic web pages and web applications.</p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; "><a href="http://en.wikipedia.org/wiki/Microsoft" title="Microsoft" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Microsoft</a>&nbsp;and&nbsp;<a href="http://en.wikipedia.org/wiki/Nokia" title="Nokia" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Nokia</a>&nbsp;have announced plans to bundle jQuery on their platforms,<sup id="cite_ref-2008-09-28_4-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JQuery#cite_note-2008-09-28-4" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>5<span>]</span></a></sup>&nbsp;Microsoft is adopting it initially within&nbsp;<a href="http://en.wikipedia.org/wiki/Visual_Studio" title="Visual Studio" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Visual Studio</a><sup id="cite_ref-5" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JQuery#cite_note-5" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>6<span>]</span></a></sup>&nbsp;for use within Microsoft''s&nbsp;<a href="http://en.wikipedia.org/wiki/ASP.NET_AJAX" title="ASP.NET AJAX" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">ASP.NET AJAX</a>&nbsp;framework and&nbsp;<a href="http://en.wikipedia.org/wiki/ASP.NET_MVC_Framework" title="ASP.NET MVC Framework" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">ASP.NET MVC Framework</a>&nbsp;while Nokia has integrated it into their Web Run-Time widget development platform.<sup id="cite_ref-6" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JQuery#cite_note-6" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>7<span>]</span></a></sup>&nbsp;jQuery has also been used in&nbsp;<a href="http://en.wikipedia.org/wiki/MediaWiki" title="MediaWiki" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">MediaWiki</a>&nbsp;since version 1.16.<sup id="cite_ref-7" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JQuery#cite_note-7" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; ">[</span><font class="Apple-style-span" color="#0645ad"><span class="Apple-style-span" style="background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; ">8</span></font><span style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; ">]</span></a></sup></p></span><span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">jQuery contains the following features:</p><ul style="line-height: 1.5em; list-style-type: square; margin-top: 0.3em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 1.6em; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; list-style-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAUAAAANCAYAAABhPKSIAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAACtJREFUeF7NjbEJAAAIw7zRu/w5ouBUBEeHDM2QGiA8kObBULuFcJbSXN8T78SqnpKltAIAAAAASUVORK5CYII=); "><li style="margin-bottom: 0.1em; "><a href="http://en.wikipedia.org/wiki/Document_Object_Model" title="Document Object Model" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">DOM</a>&nbsp;element selections using the cross-browser open source selector engine&nbsp;<a href="http://en.wikipedia.org/w/index.php?title=Sizzle_selector_engine&amp;action=edit&amp;redlink=1" class="new" title="Sizzle selector engine (page does not exist)" style="text-decoration: none; color: rgb(186, 0, 0); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Sizzle</a>, a spin-off out of the jQuery project<sup id="cite_ref-8" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JQuery#cite_note-8" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>9<span>]</span></a></sup></li><li style="margin-bottom: 0.1em; ">DOM traversal and modification (including support for CSS 1-3)</li><li style="margin-bottom: 0.1em; ">Events</li><li style="margin-bottom: 0.1em; "><a href="http://en.wikipedia.org/wiki/Cascading_Style_Sheets" title="Cascading Style Sheets" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">CSS</a>&nbsp;manipulation</li><li style="margin-bottom: 0.1em; ">Effects and animations</li><li style="margin-bottom: 0.1em; "><a href="http://en.wikipedia.org/wiki/AJAX_(programming)" title="AJAX (programming)" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Ajax</a></li><li style="margin-bottom: 0.1em; "><a href="http://en.wikipedia.org/wiki/Extensibility" title="Extensibility" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Extensibility</a>&nbsp;through plug-ins</li><li style="margin-bottom: 0.1em; ">Utilities - such as browser version and the&nbsp;<code lang="jQuery" xml:lang="jQuery" style="font-family: monospace, ''Courier New''; background-color: rgb(249, 249, 249); ">each</code>&nbsp;function.</li><li style="margin-bottom: 0.1em; ">Cross-browser support</li></ul></span>                    ', 'Article 1'),
(6, '2011-07-29 14:42:18', '<span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; "><b>JavaScript</b>, also known as&nbsp;<a href="http://en.wikipedia.org/wiki/ECMAScript" title="ECMAScript" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">ECMAScript</a>,<sup id="cite_ref-JSConf_US_5-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JavaScript#cite_note-JSConf_US-5" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>6<span>]</span></a></sup>&nbsp;is a&nbsp;<a href="http://en.wikipedia.org/wiki/Prototype-based" title="Prototype-based" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">prototype-based</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Object-oriented_programming" title="Object-oriented programming" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">object-oriented</a><sup id="cite_ref-ECMA-262_6-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JavaScript#cite_note-ECMA-262-6" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>7<span>]</span></a></sup>&nbsp;<a href="http://en.wikipedia.org/wiki/Scripting_language" title="Scripting language" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">scripting language</a>&nbsp;that is&nbsp;<a href="http://en.wikipedia.org/wiki/Dynamic_language" title="Dynamic language" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">dynamic</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Weak_typing" title="Weak typing" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">weakly typed</a>&nbsp;and has<a href="http://en.wikipedia.org/wiki/First-class_function" title="First-class function" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">first-class functions</a>. It is also considered a&nbsp;<a href="http://en.wikipedia.org/wiki/Functional_programming" title="Functional programming" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">functional programming</a>&nbsp;language<sup id="cite_ref-jsfunc_0-1" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JavaScript#cite_note-jsfunc-0" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>1<span>]</span></a></sup>&nbsp;like&nbsp;<a href="http://en.wikipedia.org/wiki/Scheme_(programming_language)" title="Scheme (programming language)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Scheme</a>&nbsp;and&nbsp;<a href="http://en.wikipedia.org/wiki/OCaml" title="OCaml" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">OCaml</a>&nbsp;because it has&nbsp;<a href="http://en.wikipedia.org/wiki/Closure_(computer_science)" title="Closure (computer science)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">closures</a>&nbsp;and supports&nbsp;<a href="http://en.wikipedia.org/wiki/Higher-order_function" title="Higher-order function" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">higher-order functions</a>.<sup id="cite_ref-7" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JavaScript#cite_note-7" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>8<span>]</span></a></sup></p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">JavaScript is an&nbsp;<a href="http://en.wikipedia.org/wiki/Implementation" title="Implementation" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">implementation</a>&nbsp;of the&nbsp;<a href="http://en.wikipedia.org/wiki/ECMAScript" title="ECMAScript" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">ECMAScript</a>&nbsp;language standard and is primarily used in the form of&nbsp;<a href="http://en.wikipedia.org/wiki/Client-side_JavaScript" title="Client-side JavaScript" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">client-side JavaScript</a>, implemented as part of a&nbsp;<a href="http://en.wikipedia.org/wiki/Web_browser" title="Web browser" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">web browser</a>&nbsp;in order to provide enhanced&nbsp;<a href="http://en.wikipedia.org/wiki/User_interface" title="User interface" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">user interfaces</a>&nbsp;and dynamic&nbsp;<a href="http://en.wikipedia.org/wiki/Website" title="Website" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">websites</a>. This enables&nbsp;<a href="http://en.wikipedia.org/wiki/Computer_programming" title="Computer programming" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">programmatic</a>access to computational objects within a host environment.</p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">JavaScript''s use in&nbsp;<a href="http://en.wikipedia.org/wiki/Application_software" title="Application software" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">applications</a>&nbsp;outside web pages—for example in&nbsp;<a href="http://en.wikipedia.org/wiki/Portable_Document_Format" title="Portable Document Format" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">PDF</a>&nbsp;documents,&nbsp;<a href="http://en.wikipedia.org/wiki/Site-specific_browser" title="Site-specific browser" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">site-specific browsers</a>, and&nbsp;<a href="http://en.wikipedia.org/wiki/Desktop_widget" title="Desktop widget" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">desktop widgets</a>—is also significant. Newer and faster JavaScript&nbsp;<a href="http://en.wikipedia.org/wiki/Virtual_machine" title="Virtual machine" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">VMs</a>&nbsp;and frameworks built upon them (notably&nbsp;<a href="http://en.wikipedia.org/wiki/Node.js" title="Node.js" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Node.js</a>) have also increased the popularity of JavaScript for server-side web apps.</p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">JavaScript uses syntax influenced by that of&nbsp;<a href="http://en.wikipedia.org/wiki/C_(programming_language)" title="C (programming language)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">C</a>. JavaScript copies many names and naming conventions from&nbsp;<a href="http://en.wikipedia.org/wiki/Java_(programming_language)" title="Java (programming language)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Java</a>, but the two languages are otherwise unrelated and have very different semantics. The key design principles within JavaScript are taken from the&nbsp;<a href="http://en.wikipedia.org/wiki/Self_(programming_language)" title="Self (programming language)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Self</a>&nbsp;and&nbsp;<a href="http://en.wikipedia.org/wiki/Scheme_(programming_language)" title="Scheme (programming language)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Scheme</a>programming languages.<sup id="cite_ref-8" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/JavaScript#cite_note-8" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; ">[</span><font class="Apple-style-span" color="#0645ad"><span class="Apple-style-span" style="background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap;">9</span></font><span style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; ">]</span></a></sup></p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; "><br></p></span>                    ', 'Article 2'),
(7, '2011-07-29 14:42:56', '<span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; "><b>Portable Document Format</b>&nbsp;(<b>PDF</b>) is an&nbsp;<a href="http://en.wikipedia.org/wiki/Open_standard" title="Open standard" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">open standard</a>&nbsp;for document exchange. This&nbsp;<a href="http://en.wikipedia.org/wiki/File_format" title="File format" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">file format</a>&nbsp;created by&nbsp;<a href="http://en.wikipedia.org/wiki/Adobe_Systems" title="Adobe Systems" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Adobe Systems</a>&nbsp;in 1993 is used for representing&nbsp;<a href="http://en.wikipedia.org/wiki/Documents" title="Documents" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">documents</a>&nbsp;in a manner independent of&nbsp;<a href="http://en.wikipedia.org/wiki/Application_software" title="Application software" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">application software</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Personal_computer_hardware" title="Personal computer hardware" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">hardware</a>, and&nbsp;<a href="http://en.wikipedia.org/wiki/Operating_system" title="Operating system" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">operating systems</a>.<sup id="cite_ref-pdf-ref-1.7_1-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Portable_Document_Format#cite_note-pdf-ref-1.7-1" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>2<span>]</span></a></sup>&nbsp;Each PDF file encapsulates a complete description of a fixed-layout flat document, including the text, fonts, graphics, and other information needed to display it.</p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">In 1991&nbsp;<a href="http://en.wikipedia.org/wiki/Adobe_Systems" title="Adobe Systems" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Adobe Systems</a>&nbsp;co-founder&nbsp;<a href="http://en.wikipedia.org/wiki/John_Warnock" title="John Warnock" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">John Warnock</a>&nbsp;outlined a system called "Camelot"<sup id="cite_ref-2" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Portable_Document_Format#cite_note-2" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>3<span>]</span></a></sup>&nbsp;that evolved into the Portable Document Format (PDF).</p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">While the PDF specification was available for free since at least 2001,<sup id="cite_ref-3" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Portable_Document_Format#cite_note-3" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>4<span>]</span></a></sup>&nbsp;PDF was originally a&nbsp;<a href="http://en.wikipedia.org/wiki/Proprietary_format" title="Proprietary format" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">proprietary format</a>&nbsp;controlled by Adobe, and was officially released as an&nbsp;<a href="http://en.wikipedia.org/wiki/Open_standard" title="Open standard" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">open standard</a>&nbsp;on July 1, 2008, and published by the&nbsp;<a href="http://en.wikipedia.org/wiki/International_Organization_for_Standardization" title="International Organization for Standardization" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">International Organization for Standardization</a>&nbsp;as&nbsp;<a href="http://en.wikipedia.org/wiki/ISO_32000-1" title="ISO 32000-1" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">ISO 32000-1</a>:2008.<sup id="cite_ref-iso-standard_0-1" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Portable_Document_Format#cite_note-iso-standard-0" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>1<span>]</span></a></sup><sup id="cite_ref-4" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Portable_Document_Format#cite_note-4" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>5<span>]</span></a></sup>&nbsp;The ISO 32000-1 allows use of some specifications, which are not standardized (e.g. Adobe XML Forms Architecture<sup id="cite_ref-gnupdf-fdf_5-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Portable_Document_Format#cite_note-gnupdf-fdf-5" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>6<span>]</span></a></sup><sup id="cite_ref-acroforms-appligent_6-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Portable_Document_Format#cite_note-acroforms-appligent-6" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>7<span>]</span></a></sup>). ISO 32000-1 does not specify methods for validating the conformance of PDF files or readers.<sup id="cite_ref-iso-standard_0-2" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Portable_Document_Format#cite_note-iso-standard-0" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>1<span>]</span></a></sup>&nbsp;In 2008, Adobe published a Public Patent License to ISO 32000-1 granting a royalty-free rights for all patents owned by Adobe that are necessary to make, use, sell and distribute PDF compliant implementations.<sup id="cite_ref-7" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Portable_Document_Format#cite_note-7" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>8<span>]</span></a></sup></p></span>                    ', 'Article 3');
INSERT INTO `news` (`id`, `publishing_date`, `content`, `title`) VALUES
(9, '2011-07-29 14:48:45', '<span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><b>John Edward Warnock</b>&nbsp;(born October 6, 1940) is an American&nbsp;<a href="http://en.wikipedia.org/wiki/Computer_scientist" title="Computer scientist" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">computer scientist</a>&nbsp;best known as the co-founder with&nbsp;<a href="http://en.wikipedia.org/wiki/Charles_Geschke" title="Charles Geschke" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Charles Geschke</a>&nbsp;of&nbsp;<a href="http://en.wikipedia.org/wiki/Adobe_Systems" title="Adobe Systems" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Adobe Systems</a>&nbsp;Inc., the graphics and publishing software company. Dr. Warnock was President of Adobe for his first two years and Chairman and CEO for his remaining sixteen years at the company. Although retired as&nbsp;<a href="http://en.wikipedia.org/wiki/CEO" title="CEO" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">CEO</a>&nbsp;in&nbsp;<a href="http://en.wikipedia.org/wiki/2001" title="2001" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">2001</a>, he still co-chairs the board with Geschke. Warnock has pioneered the development of graphics, publishing, Web and electronic document technologies that have revolutionized the field of publishing and visual communications.</span>                    <div><span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><br></span></div><div><span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">The recipient of numerous scientific and technical awards, Warnock won the Software Systems Award from the&nbsp;<a href="http://en.wikipedia.org/wiki/Association_for_Computing_Machinery" title="Association for Computing Machinery" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Association for Computing Machinery</a>&nbsp;in 1989.<sup id="cite_ref-7" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/John_Warnock#cite_note-7" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>8<span>]</span></a></sup>&nbsp;In 1995 Warnock received the&nbsp;<a href="http://en.wikipedia.org/wiki/University_of_Utah" title="University of Utah" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">University of Utah</a>&nbsp;Distinguished Alumnus Award and in 1999 he was inducted as a Fellow of the&nbsp;<a href="http://en.wikipedia.org/wiki/Association_for_Computing_Machinery" title="Association for Computing Machinery" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Association for Computing Machinery</a>. Warnock was awarded the Edwin H. Land Medal from the&nbsp;<a href="http://en.wikipedia.org/wiki/Optical_Society_of_America" title="Optical Society of America" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Optical Society of America</a>&nbsp;in 2000.<sup id="cite_ref-8" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/John_Warnock#cite_note-8" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>9<span>]</span></a></sup>&nbsp;<a href="http://en.wikipedia.org/wiki/Oxford_University" title="Oxford University" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Oxford University</a>''s&nbsp;<a href="http://en.wikipedia.org/wiki/Bodleian_Library" title="Bodleian Library" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Bodleian Library</a>&nbsp;bestowed the&nbsp;<a href="http://en.wikipedia.org/wiki/Bodley_Medal" title="Bodley Medal" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Bodley Medal</a>&nbsp;on Warnock in November, 2003.<sup id="cite_ref-9" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/John_Warnock#cite_note-9" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>10<span>]</span></a></sup>&nbsp;<sup id="cite_ref-10" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/John_Warnock#cite_note-10" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>11<span>]</span></a></sup>&nbsp;In 2004, Warnock received the&nbsp;<a href="http://en.wikipedia.org/wiki/Lovelace_Medal" title="Lovelace Medal" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Lovelace Medal</a>&nbsp;from the&nbsp;<a href="http://en.wikipedia.org/wiki/British_Computer_Society" title="British Computer Society" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">British Computer Society</a>&nbsp;in London.<sup id="cite_ref-11" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/John_Warnock#cite_note-11" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>12<span>]</span></a></sup>&nbsp;In October 2006, Warnock—along with Adobe co-founder Charles Geschke—received the&nbsp;<a href="http://en.wikipedia.org/wiki/American_Electronics_Association" title="American Electronics Association" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">American Electronics Association</a>''s Annual Medal of Achievement Award, being the first software executives to receive this award. In 2008, Warnock and Geschke received the&nbsp;<a href="http://en.wikipedia.org/wiki/Computer_Entrepreneur_Award" title="Computer Entrepreneur Award" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Computer Entrepreneur Award</a>&nbsp;from the&nbsp;<a href="http://en.wikipedia.org/wiki/IEEE_Computer_Society" title="IEEE Computer Society" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">IEEE Computer Society</a>&nbsp;"for inventing PostScript and PDF and helping to launch the desktop publishing revolution and change the way people engage with information and entertainment".<sup id="cite_ref-12" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/John_Warnock#cite_note-12" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>13<span>]</span></a></sup>&nbsp;In September 2009, Warnock and Geschke were chosen to receive the&nbsp;<a href="http://en.wikipedia.org/wiki/National_Medal_of_Technology_and_Innovation" title="National Medal of Technology and Innovation" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">National Medal of Technology and Innovation</a>, one of the nation''s highest honors bestowed on scientists, engineers and inventors.<sup id="cite_ref-13" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/John_Warnock#cite_note-13" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>14<span>]</span></a></sup><sup id="cite_ref-14" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/John_Warnock#cite_note-14" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>15<span>]</span></a></sup>&nbsp;In 2010, Warnock and Geschke received the&nbsp;<a href="http://en.wikipedia.org/wiki/Marconi_Prize" title="Marconi Prize" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Marconi Prize</a>, considered the highest honor specifically for contributions to information science and communications.<sup id="cite_ref-15" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/John_Warnock#cite_note-15" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>16<span>]</span></a></sup></p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">Warnock is a member of the&nbsp;<a href="http://en.wikipedia.org/wiki/National_Academy_of_Engineering" title="National Academy of Engineering" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">National Academy of Engineering</a>, the&nbsp;<a href="http://en.wikipedia.org/wiki/American_Academy_of_Arts_and_Sciences" title="American Academy of Arts and Sciences" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">American Academy of Arts and Sciences</a>, and the&nbsp;<a href="http://en.wikipedia.org/wiki/American_Philosophical_Society" title="American Philosophical Society" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">American Philosophical Society</a>, the latter being America''s oldest learned society.</p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">He has received Honorary Degrees from the&nbsp;<a href="http://en.wikipedia.org/wiki/University_of_Utah" title="University of Utah" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">University of Utah</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/American_Film_Institute" title="American Film Institute" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">American Film Institute</a>&nbsp;and&nbsp;<a href="http://en.wikipedia.org/wiki/The_University_of_Nottingham" title="The University of Nottingham" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">The University of Nottingham</a>, UK.<sup id="cite_ref-16" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/John_Warnock#cite_note-16" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>17<span>]</span></a></sup></p></span></div>', 'Article 5'),
(12, '2011-07-29 14:52:32', '            <span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); ">The Adobe Flash Professional multimedia authoring program is used to create content for the&nbsp;<a href="http://en.wikipedia.org/wiki/Adobe_Engagement_Platform" title="Adobe Engagement Platform" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Adobe Engagement Platform</a>, such as web applications, games and movies, and content for mobile phones and other embedded devices.</span>                    <div><span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><img src="http://upload.wikimedia.org/wikipedia/en/thumb/0/0b/Adobe_Flash_CS5.5_Screenshot.png/300px-Adobe_Flash_CS5.5_Screenshot.png" alt="" align="none"><br></span></div><div><span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><br></span></div><div><span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><br></span></div><div><span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">Adobe Flash Professional is the successor of a software product known as&nbsp;<b>FutureSplash Animator</b>, a&nbsp;<a href="http://en.wikipedia.org/wiki/Vector_graphics" title="Vector graphics" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">vector graphics</a>&nbsp;and vector animations program released in May 1996. FutureSplash Animator was developed by&nbsp;<a href="http://en.wikipedia.org/wiki/FutureWave_Software" title="FutureWave Software" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">FutureWave Software</a>, a small software company whose first product, SmartSketch, was a vector-based drawing program for pen-based computers. In 1995, the company decided to add animation capabilities to their product and to create a vector-based animation platform for&nbsp;<a href="http://en.wikipedia.org/wiki/World_Wide_Web" title="World Wide Web" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">World Wide Web</a>; hence FutureSplash Animator was created. Initially, the only way to deploy such animations on the web was through the use of&nbsp;<a href="http://en.wikipedia.org/wiki/Java_platform" title="Java platform" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Java platform</a>; however, the Java platform was later replaced with the&nbsp;<a href="http://en.wikipedia.org/wiki/Netscape" title="Netscape" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Netscape</a>''s&nbsp;<a href="http://en.wikipedia.org/wiki/Plug-in_(computing)" title="Plug-in (computing)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">plug-in</a>&nbsp;architecture. The FutureSplash animation technology was used on several notable websites such as&nbsp;<a href="http://en.wikipedia.org/wiki/MSN" title="MSN" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">MSN</a>, the official&nbsp;<i><a href="http://en.wikipedia.org/wiki/The_Simpsons" title="The Simpsons" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">The Simpsons</a></i>&nbsp;website and<i>Disney Daily Blast</i>&nbsp;of&nbsp;<a href="http://en.wikipedia.org/wiki/The_Walt_Disney_Company" title="The Walt Disney Company" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">The Walt Disney Company</a>.<sup id="cite_ref-SA-history-official_0-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Adobe_Flash_Professional#cite_note-SA-history-official-0" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>1<span>]</span></a></sup></p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">In December 1996,&nbsp;<a href="http://en.wikipedia.org/wiki/Macromedia" title="Macromedia" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Macromedia</a>&nbsp;bought FutureWave and so re-branded and released FutureSplash Animator as&nbsp;<i>Macromedia Flash</i>&nbsp;v1.0. In 2005, Adobe Systems acquired Macromedia; subsequently, in 2007,&nbsp;<i>Adobe Flash CS3 Professional</i>, the next version of Macromedia Flash was released. aaaa</p></span></div>        ', 'Article 4'),
(13, '2011-07-29 14:55:47', '<span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; "><b>Microsoft Windows</b>&nbsp;is a series of&nbsp;<a href="http://en.wikipedia.org/wiki/Operating_system" title="Operating system" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">operating systems</a>&nbsp;produced by&nbsp;<a href="http://en.wikipedia.org/wiki/Microsoft" title="Microsoft" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Microsoft</a>.</p></span><span class="Apple-style-span" style="font-family: ARIAL; font-size: 12px; line-height: 18px; background-color: rgb(255, 255, 255); "><img src="http://upload.wikimedia.org/wikipedia/en/thumb/b/bd/Windows_7.png/300px-Windows_7.png" alt="" align="none"></span><span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">Microsoft first introduced an&nbsp;<a href="http://en.wikipedia.org/wiki/Operating_environment" title="Operating environment" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">operating environment</a>&nbsp;named&nbsp;<i>Windows</i>&nbsp;on November 20, 1985 as an add-on to&nbsp;<a href="http://en.wikipedia.org/wiki/MS-DOS" title="MS-DOS" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">MS-DOS</a>&nbsp;in response to the growing interest in&nbsp;<a href="http://en.wikipedia.org/wiki/Graphical_user_interface" title="Graphical user interface" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">graphical user interfaces</a>&nbsp;(GUIs).<sup id="cite_ref-aboutcomnov_1-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Microsoft_Windows#cite_note-aboutcomnov-1" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>2<span>]</span></a></sup>&nbsp;Microsoft Windows came to&nbsp;<a href="http://en.wikipedia.org/wiki/Market_dominance" title="Market dominance" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">dominate</a>&nbsp;the world''s&nbsp;<a href="http://en.wikipedia.org/wiki/Personal_computer" title="Personal computer" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">personal computer</a>&nbsp;market, overtaking&nbsp;<a href="http://en.wikipedia.org/wiki/Mac_OS" title="Mac OS" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Mac OS</a>, which had been introduced in 1984. As of October 2009, Windows had approximately 90% of the market share of the&nbsp;<a href="http://en.wikipedia.org/wiki/Client_(computing)" title="Client (computing)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">client</a>&nbsp;operating systems for usage on the&nbsp;<a href="http://en.wikipedia.org/wiki/Internet" title="Internet" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Internet</a>.<sup id="cite_ref-2" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Microsoft_Windows#cite_note-2" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>3<span>]</span></a></sup><sup id="cite_ref-3" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Microsoft_Windows#cite_note-3" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>4<span>]</span></a></sup><sup id="cite_ref-4" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Microsoft_Windows#cite_note-4" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; ">[</span><font class="Apple-style-span" color="#0645ad"><span class="Apple-style-span" style="background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap;">5</span></font><span style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; ">]</span></a>&nbsp;</sup></p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">The most recent client version of Windows is&nbsp;<a href="http://en.wikipedia.org/wiki/Windows_7" title="Windows 7" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Windows 7</a>; the most recent&nbsp;<a href="http://en.wikipedia.org/wiki/Server_(computing)" title="Server (computing)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">server</a>&nbsp;version is&nbsp;<a href="http://en.wikipedia.org/wiki/Windows_Server_2008_R2" title="Windows Server 2008 R2" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Windows Server 2008 R2</a>; the most recent&nbsp;<a href="http://en.wikipedia.org/wiki/Mobile_operating_system" title="Mobile operating system" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">mobile</a>&nbsp;version is&nbsp;<a href="http://en.wikipedia.org/wiki/Windows_Phone_7" title="Windows Phone 7" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Windows Phone 7</a>.</p></span>                    ', 'Article 7');
INSERT INTO `news` (`id`, `publishing_date`, `content`, `title`) VALUES
(14, '2011-08-03 12:09:40', '            <span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><b>Windows 8</b>&nbsp;is the codename for an upcoming version of&nbsp;<a href="http://en.wikipedia.org/wiki/Microsoft_Windows" title="Microsoft Windows" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Microsoft Windows</a>, a series of&nbsp;<a href="http://en.wikipedia.org/wiki/Operating_systems" title="Operating systems" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">operating systems</a>&nbsp;produced by&nbsp;<a href="http://en.wikipedia.org/wiki/Microsoft" title="Microsoft" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Microsoft</a>for use on&nbsp;<a href="http://en.wikipedia.org/wiki/Personal_computer" title="Personal computer" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">personal computers</a>, including home and business&nbsp;<a href="http://en.wikipedia.org/wiki/Desktop_computer" title="Desktop computer" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">desktops</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Laptop" title="Laptop" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">laptops</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Netbook" title="Netbook" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">netbooks</a>,&nbsp;<a href="http://en.wikipedia.org/wiki/Tablet_PC" title="Tablet PC" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">tablet PCs</a>, and&nbsp;<a href="http://en.wikipedia.org/wiki/Home_theater_PC" title="Home theater PC" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">media center PCs</a>.<sup id="cite_ref-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-0" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; ">[</span><font class="Apple-style-span" color="#0645ad" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; "><span class="Apple-style-span" style="background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap;">1</span></font><span style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; ">]</span></a>&nbsp;</sup></span><img src="http://upload.wikimedia.org/wikipedia/en/thumb/5/58/Windows_8_pre-release_at_D9_conference.png/290px-Windows_8_pre-release_at_D9_conference.png" alt="" align="none"><div><span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><br></span></div><div><span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">At the 2011&nbsp;<a href="http://en.wikipedia.org/wiki/Consumer_Electronics_Show" title="Consumer Electronics Show" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Consumer Electronics Show</a>&nbsp;in Las Vegas, Microsoft announced that it would be including support for&nbsp;<a href="http://en.wikipedia.org/wiki/System-on-a-chip" title="System-on-a-chip" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">system-on-a-chip</a>&nbsp;(SoC) and mobile&nbsp;<a href="http://en.wikipedia.org/wiki/ARM_architecture" title="ARM architecture" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">ARM processors</a>&nbsp;in Windows 8.<sup id="cite_ref-1" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-1" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>2<span>]</span></a></sup><sup id="cite_ref-2" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-2" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>3<span>]</span></a></sup><sup id="cite_ref-3" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-3" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>4<span>]</span></a></sup></p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">A 32-bit Milestone 1 build, build 7850, with a build date of September 22, 2010, was leaked to BetaArchive, an online beta community, which was soon leaked to P2P/torrent sharing networks on April 12, 2011.<sup id="cite_ref-4" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-4" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>5<span>]</span></a></sup>&nbsp;Milestone 1 includes a&nbsp;<a href="http://en.wikipedia.org/wiki/Ribbon_(computing)" title="Ribbon (computing)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">ribbon</a>&nbsp;interface for Windows Explorer,<sup id="cite_ref-5" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-5" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>6<span>]</span></a></sup>&nbsp;a&nbsp;<a href="http://en.wikipedia.org/wiki/PDF" title="PDF" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">PDF</a>&nbsp;reader called&nbsp;<i>Modern Reader</i>, an updated&nbsp;<a href="http://en.wikipedia.org/wiki/Windows_Task_Manager" title="Windows Task Manager" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">task manager</a>&nbsp;called&nbsp;<i>Modern Task Manager</i>,<sup id="cite_ref-6" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-6" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>7<span>]</span></a></sup>&nbsp;and native&nbsp;<a href="http://en.wikipedia.org/wiki/ISO_image" title="ISO image" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">ISO image</a>&nbsp;mounting.<sup id="cite_ref-7" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-7" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>8<span>]</span></a></sup></p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">A 32-bit Milestone 2 build, build 7955, was leaked to BetaArchive on April 25, 2011.<sup id="cite_ref-8" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-8" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>9<span>]</span></a></sup>&nbsp;Features of this build were a new pattern login and more.<sup id="cite_ref-9" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-9" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>10<span>]</span></a></sup></p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">A 64-bit Milestone 3 build, build 7959, was leaked to BetaArchive on May 1, 2011.<sup id="cite_ref-10" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-10" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>11<span>]</span></a></sup>&nbsp;This build is notable for being the first publicly leaked Windows Server 8 build, as well as the first leaked 64-bit build.<sup id="cite_ref-11" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-11" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>12<span>]</span></a></sup></p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">A Milestone 3 build, build 7971, was released to close partners of Microsoft on March 29, 2011<sup id="cite_ref-12" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-12" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>13<span>]</span></a></sup>&nbsp;but was kept under heavy security. However, a few screenshots were leaked. The "Windows 7 Basic" theme now uses similar metrics to the Aero style, but maintains its non-hardware accelerated design, and also supports taskbar thumbnails. The boxes that encase the "close, maximize, and minimize" buttons have been removed, leaving just the signs.<sup id="cite_ref-13" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/Windows_8#cite_note-13" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>14<span>]</span></a></sup></p></span></div>        ', 'Article 8'),
(19, '2011-08-03 15:21:20', '            <span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); ">"<b>What the Hell</b>" is a song by Canadian recording artist&nbsp;<a href="http://en.wikipedia.org/wiki/Avril_Lavigne" title="Avril Lavigne" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Avril Lavigne</a>, taken from her fourth studio album&nbsp;<i><a href="http://en.wikipedia.org/wiki/Goodbye_Lullaby" title="Goodbye Lullaby" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Goodbye Lullaby</a></i>&nbsp;(2011). The song, written by Lavigne with its producers&nbsp;<a href="http://en.wikipedia.org/wiki/Max_Martin" title="Max Martin" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Max Martin</a>&nbsp;and&nbsp;<a href="http://en.wikipedia.org/wiki/Shellback_(songwriter)" title="Shellback (songwriter)" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Shellback</a>&nbsp;was released on 7 January 2011 as the&nbsp;<a href="http://en.wikipedia.org/wiki/Lead_single" title="Lead single" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">lead single</a>&nbsp;from&nbsp;<i>Goodbye Lullaby</i>. The song was successful, reaching number one in Japan, the top five in Asia, the Top 10 in Europe, Australia, South America, Mexico, Canada, and the Top 20 in the US, peaking at eleven. It received generally positive reviews from music critics, with many complimenting its catchiness and comparing it to her 2007 single "<a href="http://en.wikipedia.org/wiki/Girlfriend_(Avril_Lavigne_song)" title="Girlfriend (Avril Lavigne song)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Girlfriend</a>".</span>                    <div><span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">"What the Hell" made its debut on the US&nbsp;<a href="http://en.wikipedia.org/wiki/Billboard_Hot_100" title="Billboard Hot 100" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; "><i>Billboard</i>&nbsp;Hot 100</a>&nbsp;on 19 January 2011 at number thirteen and on the US&nbsp;<a href="http://en.wikipedia.org/wiki/Hot_Digital_Songs" title="Hot Digital Songs" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; "><i>Billboard</i>&nbsp;Hot Digital Songs</a>&nbsp;at number six, with digital sales of over 166,000 units.<sup id="cite_ref-debutus_19-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/What_the_Hell#cite_note-debutus-19" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>20<span>]</span></a></sup>&nbsp;The following week,&nbsp;<i>What the Hell</i>&nbsp;fell to number 31 on the US&nbsp;<i>Billboard</i>&nbsp;Hot 100 and number 22 on Hot Digital Songs with register sales of 77,000<sup id="cite_ref-secondweek_20-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/What_the_Hell#cite_note-secondweek-20" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>21<span>]</span></a></sup>&nbsp;but climbed back up to 24 on the Billboard Hot 100 chart and 13 on the Hot Digital Charts on its third week, climbing to 23 on its fourth week. In its fifth week, it peaked at number 11 on Billboard Hot 100. The next week it fell to 13.&nbsp;<i>What the Hell</i>&nbsp;sold over 1,700,000 digital copies in the USA.<sup id="cite_ref-new.music.yahoo.com_21-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/What_the_Hell#cite_note-new.music.yahoo.com-21" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>22<span>]</span></a></sup>&nbsp;The song debuted at number eight on the&nbsp;<a href="http://en.wikipedia.org/wiki/Canadian_Hot_100" title="Canadian Hot 100" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Canadian Hot 100</a>. "What the Hell" also debuted at number four of Canada''s Digital Songs chart, with 16,000 downloads. The single becoming Lavigne''s third best debut to date, following "<a href="http://en.wikipedia.org/wiki/Girlfriend_(Avril_Lavigne_song)" title="Girlfriend (Avril Lavigne song)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Girlfriend</a>" and "<a href="http://en.wikipedia.org/wiki/Keep_Holding_On" title="Keep Holding On" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Keep Holding On</a>".<sup id="cite_ref-canchart_22-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/What_the_Hell#cite_note-canchart-22" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>23<span>]</span></a></sup>&nbsp;The song cracked the top-forty on&nbsp;<a href="http://en.wikipedia.org/wiki/Radio_Songs" title="Radio Songs" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Radio Songs</a>, reaching number twenty-seven; her last single to chart on the Radio charts was "<a href="http://en.wikipedia.org/wiki/When_You%27re_Gone" title="When You''re Gone" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">When You''re Gone</a>" (2007) at number thirty-seven. "What the Hell" surpassed this Radio Songs peak when it climbed to number thirty-four, being her most played song since "Girlfriend" (2007).<sup id="cite_ref-www.billboard.com_23-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/What_the_Hell#cite_note-www.billboard.com-23" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>24<span>]</span></a></sup></p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">The single also debuted on the&nbsp;<a href="http://en.wikipedia.org/wiki/UK_Singles_Chart" title="UK Singles Chart" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">UK Singles Chart</a>&nbsp;at number 29 on 23 January 2011, marking her twelfth top thirty hit on the chart. In its second charting week, the single fell to number 45, in its third week it rose to number 32, and in its eighth week, it has risen to a peak position of number 16.<sup id="cite_ref-www.bbc.co.uk_24-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/What_the_Hell#cite_note-www.bbc.co.uk-24" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>25<span>]</span></a></sup>&nbsp;The song debuted at #15 on the&nbsp;<a href="http://en.wikipedia.org/wiki/Oricon" title="Oricon" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Oricon</a>&nbsp;in Japan, and sold 5,598 copies the first week. It has been certified Gold in&nbsp;<a href="http://en.wikipedia.org/wiki/Australia" title="Australia" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Australia</a>&nbsp;in its third week for sales of 35,000 copies, and in its sixth week, it has been certified Platinum for sales over 70,000 copies, and has been certified 2x Platinum in its 16th week, for sales over 140,000.<sup id="cite_ref-ariaaccreds_25-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/What_the_Hell#cite_note-ariaaccreds-25" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; ">[</span><font class="Apple-style-span" color="#0645ad"><span class="Apple-style-span" style="background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap;">26</span></font><span style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; ">]</span></a></sup></p></span><span class="Apple-style-span" style="font-family: sans-serif; font-size: 13px; line-height: 19px; background-color: rgb(255, 255, 255); "><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">The video begins with Lavigne in lingerie lying in bed with her love interest, played by Spencer Hill. She walks over to a mirror, applies her two fragrances,&nbsp;<a href="http://en.wikipedia.org/wiki/Black_Star_(fragrance)" title="Black Star (fragrance)" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Black Star</a>&nbsp;and&nbsp;<a href="http://en.wikipedia.org/wiki/Forbidden_Rose" title="Forbidden Rose" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Forbidden Rose</a>, and then locks her love interest in a walk-in closet before leaving the house. She walks down the road and steals a taxi. As Lavigne''s lover chases her on a bike, she gets out of the taxi, which crashes into another vehicle. As Lavigne plays in a basketball court at the&nbsp;<a href="http://en.wikipedia.org/wiki/Sixth_Street_Viaduct" title="Sixth Street Viaduct" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Sixth Street Viaduct</a>, her love interest is still chasing her. She runs into an&nbsp;<a href="http://en.wikipedia.org/wiki/Abbey_Dawn" title="Abbey Dawn" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Abbey Dawn</a>&nbsp;store, which leads to a venue. Lavigne''s mother, Judy, makes a cameo appearance in the video as a store clerk. Lavigne climbs on stage and begins performing with her band. She stage dives, and the video ends with Lavigne and her love interest again lying in bed.</p><p style="margin-top: 0.4em; margin-right: 0px; margin-bottom: 0.5em; margin-left: 0px; line-height: 1.5em; ">The video directed by&nbsp;<a href="http://en.wikipedia.org/wiki/Marcus_Raboy" title="Marcus Raboy" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Marcus Raboy</a>&nbsp;and recorded in&nbsp;<a href="http://en.wikipedia.org/wiki/3-D_film" title="3-D film" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">3D</a>. It made its television debut on 23 January 2011,<sup id="cite_ref-dose_26-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/What_the_Hell#cite_note-dose-26" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>27<span>]</span></a></sup>&nbsp;on&nbsp;<a href="http://en.wikipedia.org/wiki/ABC_Family" title="ABC Family" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">ABC Family</a>&nbsp;and on UK music channel&nbsp;<a href="http://en.wikipedia.org/wiki/4Music" title="4Music" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">4Music</a>.&nbsp;<i><a href="http://en.wikipedia.org/wiki/The_New_York_Post" title="The New York Post" class="mw-redirect" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">The New York Post</a></i>criticized the video with its&nbsp;<a href="http://en.wikipedia.org/wiki/Product_placement" title="Product placement" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">product placement</a>&nbsp;for&nbsp;<a href="http://en.wikipedia.org/wiki/Sony" title="Sony" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Sony</a>&nbsp;and&nbsp;<a href="http://en.wikipedia.org/wiki/Abbey_Dawn" title="Abbey Dawn" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; background-position: initial initial; background-repeat: initial initial; ">Abbey Dawn</a>.<sup id="cite_ref-www.nypost.com_27-0" class="reference" style="line-height: 1em; font-style: normal; "><a href="http://en.wikipedia.org/wiki/What_the_Hell#cite_note-www.nypost.com-27" style="text-decoration: none; color: rgb(6, 69, 173); background-image: none; background-attachment: initial; background-origin: initial; background-clip: initial; background-color: initial; white-space: nowrap; background-position: initial initial; background-repeat: initial initial; "><span>[</span>28<span>]</span></a></sup></p></span></div>        ', 'Article text doang');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid_to` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_read` tinyint(1) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `userid_to`, `message`, `date`, `status_read`, `link`) VALUES
(1, 2, 'Pudy Prima wants to be your friend.', '2011-07-20 17:34:25', 1, 'friend/friend_request'),
(2, 2, 'Akbar Gumbira wants to be your friend.', '2011-07-20 17:37:45', 1, 'friend/friend_request'),
(4, 3, 'Danang Tri Massandy has accepted your friend request.', '2011-07-20 17:58:53', 1, NULL),
(5, 1, 'Danang Tri Massandy has accepted your friend request.', '2011-07-20 17:58:58', 1, NULL),
(7, 3, 'Danang Tri Massandy send you a new message.', '2011-07-20 18:00:38', 1, 'message/view/inbox_view'),
(8, 1, 'Rezan Achmad wants to be your friend.', '2011-07-21 17:54:58', 1, 'friend/friend_request'),
(9, 1, 'Yudhistira Natawisastra wants to be your friend.', '2011-07-21 17:58:16', 1, 'friend/friend_request'),
(10, 1, 'Mukhammad Ifanto wants to be your friend.', '2011-07-21 17:59:35', 1, 'friend/friend_request'),
(11, 1, 'Sandy Socrates wants to be your friend.', '2011-07-21 18:00:52', 1, 'friend/friend_request'),
(12, 1, 'Zakiy Firdaus wants to be your friend.', '2011-07-21 18:02:29', 1, 'friend/friend_request'),
(13, 1, 'Setia Negara wants to be your friend.', '2011-07-21 18:03:52', 1, 'friend/friend_request'),
(14, 6, 'Akbar Gumbira has accepted your friend request.', '2011-07-21 18:04:36', 0, NULL),
(15, 7, 'Akbar Gumbira has accepted your friend request.', '2011-07-21 18:04:38', 0, NULL),
(16, 8, 'Akbar Gumbira has accepted your friend request.', '2011-07-21 18:04:41', 0, NULL),
(17, 9, 'Akbar Gumbira has accepted your friend request.', '2011-07-21 18:04:43', 0, NULL),
(18, 10, 'Akbar Gumbira has accepted your friend request.', '2011-07-21 18:04:44', 0, NULL),
(19, 11, 'Akbar Gumbira has accepted your friend request.', '2011-07-21 18:04:45', 0, NULL),
(20, 1, 'Danang Tri Massandy send you a new message.', '2011-07-29 15:50:15', 1, 'message/view/inbox_view'),
(21, 2, 'Akbar Gumbira send you a new message.', '2011-08-02 14:53:52', 0, 'message/view/inbox_view'),
(22, 2, 'Akbar Gumbira send you a new message.', '2011-08-02 14:54:07', 0, 'message/view/inbox_view');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rsvp_event`
--

INSERT INTO `rsvp_event` (`id`, `user_id`, `event_id`, `status_rsvp_id`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 2, 2, 1),
(4, 1, 2, 2);

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
  `status_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `nickname`, `email`, `password`, `birthdate`, `gender_id`, `home_address`, `home_telephone`, `handphone`, `graduate_year`, `last_unit_id`, `profpict_url`, `location_latitude`, `location_longitude`, `status_admin`) VALUES
(1, 'Akbar Gumbira', 'Abay', 'gumbira.mymind@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-10-09', 1, 'Jln. Jeruk', '02632222', '085624545876', 2008, 4, 'res/user/user_1.jpg', '-6.8228071168', '107.1812438965', 0),
(2, 'Danang Tri Massandy', 'Danz', 'danang@danang.com', 'af433efb936c8d3b23ae9edeaf04d6bb', '1990-03-20', 1, 'Pelesiran 7B, Bandung', '022282828', '08563214165', 2008, 4, 'res/user/user_2.jpg', '-6.8969350000', '107.6087020000', 0),
(3, 'Pudy Prima', 'Pudy', 'pudy@yahoo.com', '68e721821dc8892481c8c5ab680eab3b', '1989-11-30', 2, 'Jalan Mawar Ungu 38 Jakarta Timur 13790', '', '', 2007, 4, 'res/user/user_3.JPG', '-6.2115440000', '106.8451720000', 0),
(4, 'Ismail Sunni', NULL, 'sunni@yahoo.com', 'c9c3ea8acf0eeeec518a0c3ffaf01eba', '1990-07-13', NULL, NULL, NULL, NULL, 2003, 2, NULL, NULL, NULL, 0),
(5, 'Hendra Hadhil', NULL, 'tes@yahoo.com', '28b662d883b6d76fd96e4ddc5e9ba780', '1990-06-21', NULL, NULL, NULL, NULL, 2003, 2, NULL, NULL, NULL, 0),
(6, 'Rezan Achmad', NULL, 'rezan@rezan.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1991-05-13', NULL, NULL, NULL, NULL, 2006, 3, 'res/default.jpg', NULL, NULL, 0),
(7, 'Yudhistira Natawisastra', NULL, 'yudhis@yudhis.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-04-16', NULL, NULL, NULL, NULL, 2006, 3, 'res/default.jpg', NULL, NULL, 0),
(8, 'Mukhammad Ifanto', NULL, 'ifan@ifan.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-12-15', NULL, NULL, NULL, NULL, 2005, 3, 'res/default.jpg', NULL, NULL, 0),
(9, 'Sandy Socrates', NULL, 'sandy@sandy.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-02-10', NULL, NULL, NULL, NULL, 2004, 3, 'res/default.jpg', NULL, NULL, 0),
(10, 'Zakiy Firdaus', NULL, 'zakiy@zakiy.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-06-27', NULL, NULL, NULL, NULL, 2002, 2, 'res/default.jpg', NULL, NULL, 0),
(11, 'Setia Negara', NULL, 'setia@setia.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1991-02-01', NULL, NULL, NULL, NULL, 1996, 1, 'res/default.jpg', NULL, NULL, 0),
(12, 'admin', NULL, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '1990-03-20', NULL, NULL, NULL, NULL, 2008, 4, NULL, NULL, NULL, 1),
(13, 'Darwin Soesanto', NULL, 'a@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1990-06-18', NULL, NULL, NULL, NULL, 2009, 4, 'res/default.jpg', NULL, NULL, 0),
(14, 'Nikolaus Indra', NULL, 'danang2@danang.com', 'e80b5017098950fc58aad83c8c14978e', '1989-03-18', NULL, NULL, NULL, NULL, 2009, 4, 'res/default.jpg', NULL, NULL, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `visibility_status`
--

INSERT INTO `visibility_status` (`id`, `user_id`, `home_address`, `home_telephone`, `handphone`, `email`, `interest`, `birthdate`, `S1`, `S2`, `S3`, `work_experience`, `current_experience`) VALUES
(1, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 1),
(2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 0, 0, 0, 1, 1, 1, 1, 0, 0, 0, 1),
(4, 4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 6, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 7, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 8, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(9, 9, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(10, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(11, 11, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(12, 12, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(13, 13, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `user_id`, `company`, `year`, `position`, `address`, `telephone`, `fax`, `work_hp`, `work_email`, `is_current_work`) VALUES
(1, 2, 'PT. Sumarno Pabottingi', 2011, 'Programmer', 'Jl Cikini Raya 5 No. 12, Jakarta Pusat', '021 315-1271', '021 314-4172', NULL, 'sp@sp.com', 1),
(2, 1, 'PT. GCD Corporation', 2009, '', '', '', '', '', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
