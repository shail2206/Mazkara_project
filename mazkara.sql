-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2015 at 12:34 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mazkara`
--

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE IF NOT EXISTS `pets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `owner` int(11) NOT NULL,
  `createdate` date DEFAULT NULL,
  `modifydate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`id`, `name`, `owner`, `createdate`, `modifydate`) VALUES
(1, 'Moti', 1, '2015-07-08', NULL),
(3, 'Jon', 1, '2015-07-08', NULL),
(4, 'my cat', 1, '2015-07-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pettype_service`
--

CREATE TABLE IF NOT EXISTS `pettype_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pettypeid` int(11) NOT NULL,
  `serviceid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pettype_service`
--

INSERT INTO `pettype_service` (`id`, `pettypeid`, `serviceid`) VALUES
(4, 2, 9),
(5, 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pet_pettype`
--

CREATE TABLE IF NOT EXISTS `pet_pettype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `petid` int(11) NOT NULL,
  `pettypeid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pet_pettype`
--

INSERT INTO `pet_pettype` (`id`, `petid`, `pettypeid`) VALUES
(4, 3, 2),
(5, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pet_type`
--

CREATE TABLE IF NOT EXISTS `pet_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pet_type_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `createdate` date DEFAULT NULL,
  `modifydate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pet_type`
--

INSERT INTO `pet_type` (`id`, `pet_type_name`, `status`, `createdate`, `modifydate`) VALUES
(2, 'Cat', 1, '2015-07-07', NULL),
(3, 'Dog', 1, '2015-07-08', NULL),
(4, 'Rabbits', 1, '2015-07-08', NULL),
(5, 'Tortoises', 1, '2015-07-08', NULL),
(6, 'Snakes', 1, '2015-07-08', NULL),
(7, 'ffff', 1, '2015-07-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `createdate` date DEFAULT NULL,
  `modifydate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_name`, `status`, `createdate`, `modifydate`) VALUES
(2, 'Washing', 1, '2015-07-07', NULL),
(3, 'shampooing', 1, '2015-07-07', NULL),
(4, 'Pedicure', 1, '2015-07-07', NULL),
(5, 'Manisure', 1, '2015-07-07', NULL),
(6, 'Polishing', 1, '2015-07-07', NULL),
(10, 'test service', 1, '2015-07-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usrs`
--

CREATE TABLE IF NOT EXISTS `tbl_usrs` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(60) NOT NULL,
  `status` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_usrs`
--

INSERT INTO `tbl_usrs` (`id`, `username`, `password`, `email`, `status`) VALUES
(1, 'shail', 'e10adc3949ba59abbe56e057f20f883e', 'fischer.shail@gmail.com', 'active');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
