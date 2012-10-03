-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 03, 2012 at 07:27 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `z2`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `description` text,
  `article_cat_id` tinyint(2) DEFAULT '1',
  `published` tinyint(1) DEFAULT '1' COMMENT '1: published, 0: unpublished',
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE IF NOT EXISTS `article_category` (
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`name`) VALUES
('about us'),
('faq'),
('term & condition');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `cat_id` int(11) NOT NULL DEFAULT '1',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `content` text,
  `rank` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE IF NOT EXISTS `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `session_id` varchar(100) COLLATE utf8_bin NOT NULL,
  `session_data` text COLLATE utf8_bin NOT NULL,
  `expires` int(11) NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `session_data`, `expires`) VALUES
('afcfqusd14ld9bg16o2k95dcu7', 'success_message|s:0:"";error_message|s:0:"";staff|a:1:{s:10:"staff_name";s:5:"admin";}', 1348367053),
('dgi7245a9tf0p13pvfo2umbfq1', 'success_message|s:0:"";error_message|s:0:"";', 1349292453),
('h62n9bhjb3od85pp19a8m9vt54', 'pk|s:4:"ppkk";', 1348173507);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `name` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `group_id` tinyint(1) NOT NULL DEFAULT '1',
  `email` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`name`, `password`, `group_id`, `email`, `date_created`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin@site.com', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
