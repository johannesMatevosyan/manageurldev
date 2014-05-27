-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2014 at 12:34 PM
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
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) DEFAULT NULL,
  `header_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `db_manager`
--

INSERT INTO `db_manager` (`id`, `header_title`, `content`, `alpha_num`, `editable_cbx`) VALUES
(2, 'ROOT', NULL, 'Alpha', 0),
(3, 'Likes', NULL, 'Alpha', 1);

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('viewer','editor') NOT NULL DEFAULT 'viewer',
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Store registered users info' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `type`, `first_name`, `last_name`, `username`, `password`, `email_address`) VALUES
(1, 'viewer', 'Hovhannes', 'Matevosyan', 'johan', '81dc9bdb52d04dc20036dbd8313ed055', 'h.matevosyan@yahoo.com'),
(2, 'editor', 'David', 'Hamman', 'davehmn', '81dc9bdb52d04dc20036dbd8313ed055', 'grabdavid@gmail.com'),
(3, 'viewer', 'David', 'Francis', 'davef', '81dc9bdb52d04dc20036dbd8313ed055', 'hovmatevosyan@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('user','admin') NOT NULL DEFAULT 'user',
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `type`, `email`, `password`, `date_added`) VALUES
(1, 'admin', 'stark@gmail.com', '04919baa7451464679ff5f80e333602188592262', '2014-05-26 00:00:00'),
(2, 'user', 'h.matevosyan@yahoo.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0000-00-00 00:00:00'),
(4, 'user', 'hovmatevosyan@gmail.com', '04919baa7451464679ff5f80e333602188592262', '0000-00-00 00:00:00'),
(5, 'user', 'hmatevosyan@yandex.ru', '04919baa7451464679ff5f80e333602188592262', '0000-00-00 00:00:00'),
(6, 'user', 'johan@yahoo.com', '04919baa7451464679ff5f80e333602188592262', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
