-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 24, 2013 at 02:49 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE IF NOT EXISTS `attachments` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `bug_id` int(5) NOT NULL,
  `attachment` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bugs_and_features`
--

CREATE TABLE IF NOT EXISTS `bugs_and_features` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `reported_by` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `priority_id` int(5) NOT NULL,
  `assigned_to` int(5) NOT NULL,
  `milestone_id` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `estimate` int(5) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `bugs_and_features`
--

INSERT INTO `bugs_and_features` (`id`, `reported_by`, `status`, `priority_id`, `assigned_to`, `milestone_id`, `title`, `description`, `estimate`, `project_id`, `created`, `modified`) VALUES
(10, '1', '3', 2, 5, 1, 'Sample ticket', 'Ticket made for testing...', 3, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '1', '3', 4, 2, 1, 'Sample ticket 2', 'Ticket for testing 2', 1, 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `estimate`
--

CREATE TABLE IF NOT EXISTS `estimate` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `estimate`
--

INSERT INTO `estimate` (`id`, `type`) VALUES
(1, 'None'),
(2, 'Small'),
(3, 'Medium'),
(4, 'Large');

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
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=56 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_type_id`, `profile_id`, `title`, `details`, `start`, `end`, `all_day`, `status`, `active`, `created`, `modified`) VALUES
(49, 8, 1, 'test nine', 'test nine', '2013-03-23 01:46:13', '2013-03-26 01:46:13', 0, 'In Progress', 1, '2013-03-21 00:00:00', '2013-03-21 00:00:00'),
(52, 8, 6, 'test eleven', 'test ten ', '2013-03-23 05:30:42', '2013-03-24 05:30:42', 0, 'Approved', 1, '2013-03-21 00:00:00', '2013-03-21 00:00:00'),
(46, 8, 5, 'test one', 'test one', '2013-03-22 12:52:39', '2013-03-23 12:52:39', 1, 'Approved', 1, '2013-03-21 00:00:00', '2013-03-21 00:00:00');

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
-- Table structure for table `milestones`
--

CREATE TABLE IF NOT EXISTS `milestones` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `responsible_user` int(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `planner` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `project_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `milestones`
--

INSERT INTO `milestones` (`id`, `responsible_user`, `title`, `due_date`, `planner`, `description`, `project_id`, `created`, `modified`) VALUES
(1, 2, 'testing', '2013-03-28', '0', 'sample desc', 4, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 'Testing 2', '2013-03-29', '0', 'Sample Milestone for testing', 5, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `priority`
--

CREATE TABLE IF NOT EXISTS `priority` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `priority`
--

INSERT INTO `priority` (`id`, `type`) VALUES
(1, 'Highest'),
(2, 'High'),
(3, 'Normal'),
(4, 'Low'),
(5, 'Lowest');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `user_role` int(1) NOT NULL,
  `input_email` varchar(255) NOT NULL,
  `input_password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `leave_request` int(5) NOT NULL,
  `leave_taken` float NOT NULL,
  `user_dob` varchar(15) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `work_email` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_mobile` varchar(255) NOT NULL,
  `user_home` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `user_name`, `company_name`, `user_role`, `input_email`, `input_password`, `confirm_password`, `status`, `leave_request`, `leave_taken`, `user_dob`, `user_gender`, `work_email`, `user_address`, `user_mobile`, `user_home`, `user_photo`, `created`, `modified`) VALUES
(1, 'Hardik Shah', 'Aecor', 1, 'hardik@gmail.com', 'testtest', 'testtest', 1, 0, 0, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Ankur Pandit', 'Aecor', 2, 'ankur@gmail.com', 'testtest', 'testtest', 1, 0, 2, '11/27/1991', '', '', 'abc, xyz', '', '', '', '0000-00-00 00:00:00', '2013-03-24 14:31:52'),
(4, 'Aakash', 'Aecor', 2, 'aakash@aecor.com', 'testtest', 'testtest', 1, 0, 1, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Ruchi Shah', 'Aecor', 3, 'ruchi@gmail.com', 'testtest', 'testtest', 1, 0, 21, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Payal Shah', 'Aecor', 4, 'payal@gmail.com', 'testtest', 'testtest', 1, 0, 10, '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `project_description` varchar(255) NOT NULL,
  `project_members` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `project_description`, `project_members`, `created`, `modified`) VALUES
(4, 'Project Management Testing', 'this is a sample project created for testing of project management feature', '1,5,2', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'dummy ', 'for testing', '1,4,6', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attachment` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `bugs_and_features_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
