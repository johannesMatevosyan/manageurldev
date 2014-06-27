-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2014 at 03:36 PM
-- Server version: 5.5.25
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `manageurls`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_manager`
--

CREATE TABLE IF NOT EXISTS `db_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header_title` varchar(128) DEFAULT NULL,
  `content` varchar(250) DEFAULT NULL,
  `alpha_num` enum('Alpha','Numeric') NOT NULL,
  `editable_cbx` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `db_manager`
--

INSERT INTO `db_manager` (`id`, `header_title`, `content`, `alpha_num`, `editable_cbx`) VALUES
(47, 'Position', NULL, 'Alpha', 1),
(49, 'email', NULL, 'Alpha', 1),
(54, 'URL', NULL, 'Alpha', 1),
(55, 'Number', NULL, 'Alpha', 0),
(56, 'PR', NULL, 'Alpha', 0),
(57, 'comment', NULL, 'Alpha', 0),
(58, 'ROOT', NULL, 'Alpha', 0),
(59, 'pass', NULL, 'Alpha', 0),
(60, 'Subnet', NULL, 'Alpha', 0),
(61, 'Note', NULL, 'Alpha', 0);

-- --------------------------------------------------------

--
-- Table structure for table `excel`
--

CREATE TABLE IF NOT EXISTS `excel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Position` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `URL` varchar(250) NOT NULL,
  `Number` varchar(250) NOT NULL,
  `PR` varchar(250) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `ROOT` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  `Subnet` varchar(250) NOT NULL,
  `Note` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `excel`
--

INSERT INTO `excel` (`id`, `Position`, `email`, `URL`, `Number`, `PR`, `comment`, `ROOT`, `pass`, `Subnet`, `Note`) VALUES
(1, '1', '', 'http://www.ebscohost.com', '', '', '', '', '', '', ''),
(2, '8', '', 'http://www.cartalk.com', '', '', '', '', '', '', ''),
(3, '25', '', 'http://www.stuff.co.nz', '', '', '', '', '', '', ''),
(4, '42', '', '', '', '', '', '', '', '', ''),
(5, '', '', 'http://www.ballarat.edu.au/centres/art-and-historical-collection/ballarat-and-district-industrial-heritage-project', '32993', '7', 'become a contributor', 'http://www.ballarat.edu.au', '', '', 'become a contributor'),
(6, '7', '', 'http://www.acponline.org/residents_fellows/career_counseling/malpractice_insurance.htm', '78990', '7', 'submit an article', 'http://www.acponline.org', '', '', 'submit an article'),
(7, '16', '', 'http://www.nursingtimes.net/home/clinical-zones/leadership/professionalism-is-the-best-regulator-of-nursing-care/5055309.article', '122494', '7', 'write for us', 'http://www.nursingtimes.net', '', '', 'write for us'),
(8, '16', '', 'http://consumerguideauto.howstuffworks.com', '9', '7', 'sent', 'http://consumerguideauto.howstuffworks.com', '', '', 'sent'),
(9, '28', '', 'http://www.dpreview.com/lensreviews/nikon_35_1p8g_n15', '9570', '7', 'write for us', 'http://www.dpreview.com', '', '', 'write for us'),
(10, '28', '', 'http://www.port.ac.uk/departments/services/academicregistry/qualitymanagementdivision/collaborativeprogrammes/oraclenewsletter/', '54303', '7', 'submit an article', 'http://www.port.ac.uk', '', '', 'submit an article'),
(11, '', 'hovmatevosyan@gmail.com', 'http://www.port.ac.uk/departments/', 'ghg', 'dfd', '', 'klkl', '', '', ''),
(12, '', '', 'http://blog.carfab.com/', '127', '4', 'sent message', 'http://blog.carfab.com', '', '', ''),
(13, '', '', 'http://blog.drivers-republic.com/', '128', '4', 'sent message', 'http://blog.drivers-republic.com', '', '', ''),
(14, '17', '', 'http://techcrunch.com/2009/06/23/the-government-comes-through-for-tesla-with-a-465-million-loan-for-its-electric-sedan/', '8893', '8', 'unsure guest post', 'http://techcrunch.com', '', '', 'unsure guest post'),
(15, '17', '', 'http://arxiv.org/help/submit', '34846', '8', 'academic journal', 'http://arxiv.org', '', '', 'Submit an Article'),
(16, '17', '', 'http://www.shutterstock.com/cat.mhtml?safesearch=1&search_language=en&search_type=similar&similar_photo_id=574517&tracking_id=543AAD26-8C0F-11E2-8497-108B71D9A14D', '9171', '8', 'cash for image submission', 'http://www.shutterstock.com', '', '', 'become a contributor');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Store registered users info' AUTO_INCREMENT=31 ;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `first_name`, `last_name`, `username`, `password`, `email_address`) VALUES
(27, '', '', 'tata', '81dc9bdb52d04dc20036dbd8313ed055', 'tt@gmail.com'),
(28, '', '', 'zozo', '81dc9bdb52d04dc20036dbd8313ed055', 'zz@yahoo.com'),
(29, '', '', 'davidadmin', '81dc9bdb52d04dc20036dbd8313ed055', 'grabdavid@gmail.com'),
(30, '', '', 'rara', '81dc9bdb52d04dc20036dbd8313ed055', 'rara@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `pagename` varchar(32) NOT NULL,
  `type` enum('admin','editor','viewer') NOT NULL DEFAULT 'viewer',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='This table joins ''membership'' and ''pages'' tables and gives a type or permission' AUTO_INCREMENT=22 ;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `username`, `pagename`, `type`) VALUES
(1, 'tata', 'statistics', 'viewer'),
(2, 'tata', 'dbmanager', 'editor'),
(3, 'zaza', 'url_preview', 'viewer'),
(4, 'zaza', 'url_upload', 'editor'),
(5, 'tata', 'url_download', 'viewer'),
(6, 'zozo', 'statistics', 'viewer'),
(7, 'zozo', 'dbmanager', 'viewer'),
(8, 'zozo', 'url_preview', 'editor'),
(9, 'zozo', 'url_upload', 'editor'),
(10, 'zozo', 'url_download', 'editor'),
(11, 'davidadmin', 'statistics', 'editor'),
(12, 'davidadmin', 'dbmanager', 'editor'),
(13, 'davidadmin', 'url_preview', 'editor'),
(14, 'davidadmin', 'url_upload', 'editor'),
(15, 'davidadmin', 'url_download', 'editor'),
(16, 'davidadmin', 'users_management', 'editor'),
(17, 'rara', 'statistics', 'viewer'),
(18, 'rara', 'dbmanager', 'editor'),
(19, 'rara', 'url_preview', 'editor'),
(20, 'rara', 'url_upload', 'editor'),
(21, 'rara', 'url_download', 'viewer');

-- --------------------------------------------------------

--
-- Table structure for table `store_id`
--

CREATE TABLE IF NOT EXISTS `store_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_id` int(11) NOT NULL,
  `last_id` int(11) NOT NULL,
  `insert_time` datetime NOT NULL,
  `file_name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='this table collects value of maximum id number per insert.' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `store_id`
--

INSERT INTO `store_id` (`id`, `first_id`, `last_id`, `insert_time`, `file_name`) VALUES
(1, 12, 11, '2014-06-13 17:27:58', '4-4.csv'),
(2, 12, 11, '2014-06-16 13:50:25', '5-5.csv'),
(3, 12, 16, '2014-06-16 13:53:37', '6-6.csv');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
