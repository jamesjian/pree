-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 11, 2012 at 04:50 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `z2`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `title_en` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL DEFAULT '1',
  `keyword` varchar(255) NOT NULL DEFAULT '',
  `keyword_en` varchar(255) NOT NULL,
  `abstract` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `content` text,
  `rank` int(11) DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `title_en`, `cat_id`, `keyword`, `keyword_en`, `abstract`, `url`, `content`, `rank`, `status`, `date_created`) VALUES
(1, 'a1a111', '1', 1, '', '', 'bbbbbbbbbbbbbb', '', '<h1>\r\n	a1a1a111</h1>', 0, 1, NULL),
(2, 'c1', 'c1', 1, '', '', 'eeeeeeeeeeeeeee', '', '', 0, 1, NULL),
(3, 'c2', 'c2', 1, '', '', 'fffffffffffffff', '', '<p>\r\n	<img alt="" src="http://localhost/pree/upload/5074f3431c50bcfalogo.png" style="width: 360px; height: 60px; " /></p>', 0, 1, NULL),
(4, 'c3', 'c3', 2, '', '', 'ggggggggggggg', '', '<p>\r\n	<img alt="" src="http://localhost/pree/upload/5074f35d0ec91Acupuncturist.jpg" style="width: 141px; height: 116px; " /></p>', 0, 1, NULL),
(5, 'aaa1', '', 2, '', '', 'ccccccccccccccccccc', '', '<p>\r\n	bbb1</p>', 0, 1, NULL),
(6, 'ADFASFDS', '', 2, '', '', 'dddddddddddddddd', '', '<p>\r\n	ASDASDFSADF</p>', 0, 1, NULL),
(7, 'ccc3333', '', 1, '', '', 'hhhhhhhhhhhhhhhhh', '', '<p>\r\n	cccc<img alt="" src="http://localhost/pree/upload/5074f4814ecc6natura therapist.jpg" style="width: 141px; height: 116px; " /></p>', 0, 1, NULL),
(8, 'ccc111', '', 1, '', '', 'gggggggggggggggg', '', '<p>\r\n	<img alt="" src="http://localhost/pree/upload/5074f46ab4d51nurse.jpg" style="width: 141px; height: 116px; " /></p>', 0, 1, NULL),
(9, 'd1', '', 2, 'd1', 'd1', 'iiiiiiiiiiiii', 'd1', '<p>\r\n	d1</p>', 1, 1, NULL),
(10, 'd21', 'd21', 4, 'd21', 'd21', 'jjjjjjjjjjjj', 'd21', '<p>\r\n	d21</p>', 21, 0, NULL),
(11, 'a1', 'a1', 2, '', '', 'aaaaaaaaa', '', '<p>\r\n	<a href="http://localhost/pree/upload/5074f2a9187aecystic_fib_logo.png"><img alt="" src="http://localhost/pree/upload/5074f2e639a08cystic_fib_logo.png" style="width: 60px; height: 60px; " /></a></p>', 0, 1, NULL);

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
(1, 'c11', '', '', '', '', '<p>\r\n	c111</p>', 1, '2012-08-01 00:00:00'),
(2, 'b2', '', '', '', '', 'b2b2', 1, '2012-08-01 00:00:00'),
(3, 'b3', '', '', '', '', 'b3b3', 1, '2012-08-01 00:00:00'),
(4, 'b4', '', '', '', '', 'b4b4', 1, '2012-08-01 00:00:00'),
(5, 'd11', '', 'd11', 'd11', '', '<p>\r\n	d11</p>', 1, NULL),
(6, 'd21', 'd21', 'd21', 'd21', 'd21', '<p>\r\n	d21</p>', 0, NULL),
(7, 'd3', 'd3', 'd3', 'd3', 'd3', '<p>\r\n	d3</p>', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT '',
  `content` text,
  `cat_id` tinyint(2) DEFAULT '1',
  `status` tinyint(1) DEFAULT '1' COMMENT '1: published, 0: unpublished',
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `title`, `content`, `cat_id`, `status`, `date_created`) VALUES
(1, 'aaa', '<p>\r\n	aaa</p>', 1, 1, NULL),
(2, 'aaa', '<p>\r\n	aaaaa</p>', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `page_category`
--

CREATE TABLE IF NOT EXISTS `page_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `page_category`
--

INSERT INTO `page_category` (`id`, `title`, `description`, `status`, `date_created`) VALUES
(1, 'b11', 'b1b11', 1, '2012-08-01 00:00:00'),
(2, 'b2', 'b2b2', 1, '2012-08-01 00:00:00'),
(3, 'b3', 'b3b3', 1, '2012-08-01 00:00:00'),
(4, 'b4', 'b4b4', 1, '2012-08-01 00:00:00'),
(5, 'aaa11', '<p>\r\n	aaa11</p>', 1, NULL);

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
('2eopr7nql48m6c0u5iv12gi2s5', 'success_message|s:0:"";error_message|s:0:"";staff|a:1:{s:10:"staff_name";s:5:"admin";}CK_UPLOAD_PATH|s:4:"article";current_admin_page|s:38:"/pree/admin/article/retrieve/1/title/ASC/";l1_menu|s:4:"Blog";', 1349844159),
('88uded53b7bkpk4tvjbjmkr5u3', 'success_message|s:0:"";error_message|s:0:"";staff|a:1:{s:10:"staff_name";s:5:"admin";}CK_UPLOAD_PATH|s:4:"article";current_admin_page|s:33:"/pree/admin/articlecategory/retrieve";l1_menu|s:4:"Blog";', 1349824229),
('8qgiafjnqtpj784h76tp81q552', 'success_message|s:0:"";error_message|s:0:"";current_admin_page|s:39:"/pree/admin/article/retrieve/1/title/DESC/";staff|a:1:{s:10:"staff_name";s:5:"admin";}CK_UPLOAD_PATH|s:4:"article";', 1349758365),
('a3dvcsvihq47955hqiahboc3h7', 'success_message|s:0:"";error_message|s:0:"";CK_UPLOAD_PATH|s:4:"article";staff|a:1:{s:10:"staff_name";s:5:"admin";}current_admin_page|s:47:"/pree/public/admin/page/retrieve/1/title/ASC";', 1349421479),
('afcfqusd14ld9bg16o2k95dcu7', 'success_message|s:0:"";error_message|s:0:"";staff|a:1:{s:10:"staff_name";s:5:"admin";}', 1348367053),
('dgi7245a9tf0p13pvfo2umbfq1', 'success_message|s:0:"";error_message|s:0:"";', 1349292453),
('h62n9bhjb3od85pp19a8m9vt54', 'pk|s:4:"ppkk";', 1348173507),
('lt10ov83re123edgijkm80gih4', 'success_message|s:0:"";error_message|s:0:"";staff|a:1:{s:10:"staff_name";s:5:"admin";}', 1349744146),
('msesqvck2b499cjbod3n7ua8j3', 'success_message|s:0:"";error_message|s:0:"";staff|a:1:{s:10:"staff_name";s:5:"admin";}', 1349394425),
('q8qtotc22lg2ftqi29f9h0e1h3', 'success_message|s:0:"";error_message|s:0:"";staff|a:1:{s:10:"staff_name";s:5:"admin";}CK_UPLOAD_PATH|s:7:"article";current_admin_page|s:36:"/pree/admin/articlecategory/retrieve";l1_menu|s:7:"Article";', 1349932218),
('rrm27pvi8s4p4gchb1adoc3p36', 'success_message|s:0:"";error_message|s:0:"";staff|a:1:{s:10:"staff_name";s:5:"admin";}', 1349319984);

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
