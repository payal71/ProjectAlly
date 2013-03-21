-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 21, 2013 at 05:07 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_type_id` int(11) NOT NULL,
  `profile_id` int(10) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `all_day` tinyint(1) NOT NULL DEFAULT '1',
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created` date DEFAULT NULL,
  `modified` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_type_id`, `profile_id`, `title`, `details`, `start`, `end`, `all_day`, `status`, `active`, `created`, `modified`) VALUES
(49, 8, 1, 'test nine', 'test nine', '2013-03-23 01:46:13', '2013-03-26 01:46:13', 0, 'In Progress', 1, '2013-03-21', '2013-03-21'),
(52, 8, 6, 'test eleven', 'test ten ', '2013-03-23 05:30:42', '2013-03-24 05:30:42', 0, 'In Progress', 1, '2013-03-21', '2013-03-21'),
(46, 8, 5, 'test one', 'test one', '2013-03-22 12:52:39', '2013-03-23 12:52:39', 1, 'Approved', 1, '2013-03-21', '2013-03-21');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE IF NOT EXISTS `event_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`id`, `name`, `color`) VALUES
(4, 'Leave', 'Pink'),
(5, 'National Holiday', 'Orange'),
(6, 'Medical', 'Green'),
(7, 'Emergency', 'Black'),
(8, 'Sickday', 'Brown');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `companyName` varchar(255) NOT NULL,
  `userRole` int(1) NOT NULL,
  `inputEmail` varchar(255) NOT NULL,
  `inputPassword` varchar(255) NOT NULL,
  `confirmPassword` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `leave_request` int(1) NOT NULL,
  `leave_taken` float NOT NULL,
  `userDob` varchar(15) NOT NULL,
  `userGender` varchar(10) NOT NULL,
  `workEmail` varchar(255) NOT NULL,
  `userAddress` varchar(255) NOT NULL,
  `userMobile` varchar(255) NOT NULL,
  `userHome` varchar(255) NOT NULL,
  `userPhoto` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `userName`, `companyName`, `userRole`, `inputEmail`, `inputPassword`, `confirmPassword`, `status`, `leave_request`, `leave_taken`, `userDob`, `userGender`, `workEmail`, `userAddress`, `userMobile`, `userHome`, `userPhoto`) VALUES
(1, 'Hardik Shah', 'Aecor', 1, 'hardik@gmail.com', 'testtest', 'testtest', 1, 0, 0, '', '', '', '', '', '', ''),
(2, 'Ankur Pandit', 'Aecor', 2, 'ankur@gmail.com', 'testtest', 'testtest', 1, 0, 2, '', '', '', '', '', '', ''),
(4, 'Aakash', 'Aecor', 2, 'aakash@aecor.com', 'testtest', 'testtest', 1, 0, 1, '', '', '', '', '', '', ''),
(5, 'Ruchi Shah', 'Aecor', 3, 'ruchi@gmail.com', 'testtest', 'testtest', 1, 0, 21, '', '', '', '', '', '', ''),
(6, 'Payal Shah', 'Aecor', 4, 'payal@gmail.com', 'testtest', 'testtest', 1, 1, 9, '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `projectName` varchar(255) NOT NULL,
  `projectDescription` varchar(255) NOT NULL,
  `projectMembers` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `projectName`, `projectDescription`, `projectMembers`) VALUES
(1, 'Sample Project 1', 'This project is created for testing purpose', '2,1'),
(2, 'ProjectAlly', 'Project and Employee Management Tool', ''),
(3, 'Sample Project 2', 'Project made for testing', '');
