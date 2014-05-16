-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2014 at 06:34 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `db_manager`
--

INSERT INTO `db_manager` (`id`, `header_title`, `content`, `alpha_num`, `editable_cbx`) VALUES
(1, 'DR', NULL, 'Alpha', 1),
(2, 'Likes', NULL, 'Alpha', 1),
(3, 'Shares', NULL, 'Alpha', 1),
(4, 'HH', NULL, 'Numeric', 0),
(5, 'ttttwww www', NULL, 'Alpha', 1),
(6, 'write something', NULL, 'Numeric', 1),
(7, 'adadad', NULL, 'Alpha', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Store registered users info' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `first_name`, `last_name`, `username`, `password`, `email_address`) VALUES
(1, 'Hovhannes', 'Matevosyan', 'johan', '81dc9bdb52d04dc20036dbd8313ed055', 'h.matevosyan@yahoo.com'),
(2, 'David', 'Hamman', 'davehmn', '81dc9bdb52d04dc20036dbd8313ed055', 'grabdavid@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
