-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2012 at 11:13 AM
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
-- Table structure for table `article_category`
--

CREATE TABLE IF NOT EXISTS `article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `title_en` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `keyword_en` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`id`, `title`, `title_en`, `keyword`, `keyword_en`, `url`, `description`, `status`, `date_created`) VALUES
(1, 'æ¾³æ´²ä¿é™©å¸¸è¯†', 'Australia Insurance Knowledge', 'æ¾³æ´²,ä¿é™©,å¸¸è¯†', 'Australia Insurance Knowledge', '', '<p>\r\n	c111</p>', 1, '2012-08-01 00:00:00'),
(2, 'æ¾³æ´²ä¿é™©æ³•è§„', 'Australia Insurance Law', 'æ¾³æ´²,ä¿é™©,æ³•è§„', 'Australia Insurance Law', '', '<p>\r\n	b2b2</p>', 1, '2012-08-01 00:00:00'),
(3, 'æ¾³æ´²ä¿é™©æ•™è‚²', 'Australia Insurance Education', 'æ¾³æ´²,ä¿é™©,æ•™è‚²', 'Australia Insurance Education', '', '<p>\r\n	b3b3</p>', 1, '2012-08-01 00:00:00'),
(4, 'æ¾³æ´²ä¿é™©æœºæž„', 'Australia Insurance Organization', 'æ¾³æ´²,ä¿é™©,æœºæž„', 'Australia Insurance Organization', '', '<p>\r\n	b4b4</p>', 1, '2012-08-01 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
