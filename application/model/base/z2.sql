-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 05, 2012 at 06:55 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`id`, `title`, `description`, `status`, `date_created`) VALUES
(1, 'b11', 'b1b11', 1, '2012-08-01 00:00:00'),
(2, 'b2', 'b2b2', 1, '2012-08-01 00:00:00'),
(3, 'b3', 'b3b3', 1, '2012-08-01 00:00:00'),
(4, 'b4', 'b4b4', 1, '2012-08-01 00:00:00'),
(5, 'aaa11', '<p>\r\n	aaa11</p>', 1, NULL);
