-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2018 at 06:53 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cabot_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE `accommodation` (
  `id` int(11) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `beds` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `page_meta_data_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `accommodation_features`
--

CREATE TABLE `accommodation_features` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `status` enum('A','H','D') DEFAULT 'H',
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accommodation_features`
--

INSERT INTO `accommodation_features` (`id`, `name`, `status`, `rank`) VALUES
(1, 'Test Feature', 'A', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `page_meta_data_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `page_meta_data_id`) VALUES
(1, 12),
(2, 13),
(3, 14),
(4, 15),
(5, 22);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `date_posted` datetime DEFAULT NULL,
  `page_meta_data_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `date_posted`, `page_meta_data_id`) VALUES
(1, '2018-04-19 00:00:00', 16),
(2, '2017-04-13 00:00:00', 17),
(3, '2018-03-16 00:00:00', 18),
(4, '2018-04-21 00:00:00', 19),
(5, '2018-04-22 00:00:00', 20),
(6, '2018-06-01 00:00:00', 23);

-- --------------------------------------------------------

--
-- Table structure for table `blog_post_has_category`
--

CREATE TABLE `blog_post_has_category` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_post_has_category`
--

INSERT INTO `blog_post_has_category` (`post_id`, `category_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(2, 1),
(2, 4),
(4, 1),
(4, 2),
(6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `cms_accessgroups`
--

CREATE TABLE `cms_accessgroups` (
  `access_id` int(11) NOT NULL,
  `access_name` varchar(100) NOT NULL,
  `access_users` char(1) NOT NULL DEFAULT 'N',
  `access_userpasswords` char(1) NOT NULL DEFAULT 'N',
  `access_useraccesslevel` char(1) NOT NULL DEFAULT 'N',
  `access_accessgroups` char(1) NOT NULL DEFAULT 'N',
  `access_cmssettings` char(1) NOT NULL DEFAULT 'N',
  `access_settings` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_accessgroups`
--

INSERT INTO `cms_accessgroups` (`access_id`, `access_name`, `access_users`, `access_userpasswords`, `access_useraccesslevel`, `access_accessgroups`, `access_cmssettings`, `access_settings`) VALUES
(1, 'Super Administrator', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y'),
(2, 'General Editor', 'Y', 'Y', 'Y', 'Y', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `cms_blacklist_user`
--

CREATE TABLE `cms_blacklist_user` (
  `id` int(11) NOT NULL,
  `first_failed_attempt_on` datetime DEFAULT NULL,
  `failed_login_attempt_count` int(11) NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_disabled` tinyint(1) NOT NULL DEFAULT '0',
  `disabled_on` datetime DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `recent_login_attempt_on` datetime DEFAULT NULL,
  `failed_hour_count` int(11) NOT NULL,
  `total_failed_attempt` int(11) NOT NULL,
  `is_notified` tinyint(1) NOT NULL DEFAULT '0',
  `ip_address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cms_login_attempt`
--

CREATE TABLE `cms_login_attempt` (
  `id` int(11) NOT NULL,
  `username` tinyblob NOT NULL,
  `access_key` tinyblob,
  `is_successful` enum('N','Y') NOT NULL DEFAULT 'N',
  `ip_address` varchar(255) NOT NULL,
  `record_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_login_attempt`
--

INSERT INTO `cms_login_attempt` (`id`, `username`, `access_key`, `is_successful`, `ip_address`, `record_date`) VALUES
(1, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xf31031b3fb3ead91fd4e1cf2e408144e, 'N', '127.0.0.1', '2017-10-16 03:39:00'),
(2, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xf31031b3fb3ead91fd4e1cf2e408144e, 'N', '127.0.0.1', '2017-10-16 03:39:07'),
(3, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2017-10-16 03:39:14'),
(4, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2017-10-16 03:50:22'),
(5, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xf31031b3fb3ead91fd4e1cf2e408144e, 'N', '127.0.0.1', '2018-03-19 00:01:48'),
(6, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-03-19 00:01:57'),
(7, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-03-20 22:55:39'),
(8, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-10 03:07:26'),
(9, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-10 05:41:45'),
(10, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-10 05:43:38'),
(11, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-10 05:44:17'),
(12, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-10 05:44:27'),
(13, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-10 05:45:25'),
(14, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-10 05:45:50'),
(15, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-10 05:45:52'),
(16, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-11 00:35:25'),
(17, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-11 01:07:24'),
(18, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-11 04:39:02'),
(19, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0x5bea73f5fb2123a117c08e94f159916d, 'N', '127.0.0.1', '2018-04-11 05:11:26'),
(20, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0x5bea73f5fb2123a117c08e94f159916d, 'N', '127.0.0.1', '2018-04-11 05:11:50'),
(21, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0x5bea73f5fb2123a117c08e94f159916d, 'N', '127.0.0.1', '2018-04-11 05:11:51'),
(22, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xf31031b3fb3ead91fd4e1cf2e408144e, 'N', '127.0.0.1', '2018-04-13 00:33:48'),
(23, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-13 00:33:59'),
(24, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-15 22:05:00'),
(25, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-16 21:45:35'),
(26, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0x4e22c90641ff54802f6fa7c4423113d7, 'N', '127.0.0.1', '2018-04-17 21:53:02'),
(27, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xf31031b3fb3ead91fd4e1cf2e408144e, 'N', '127.0.0.1', '2018-04-17 21:53:11'),
(28, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xf31031b3fb3ead91fd4e1cf2e408144e, 'N', '127.0.0.1', '2018-04-17 21:53:31'),
(29, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xf31031b3fb3ead91fd4e1cf2e408144e, 'N', '127.0.0.1', '2018-04-17 21:53:38'),
(30, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-17 21:54:02'),
(31, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-18 01:16:54'),
(32, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-18 01:44:15'),
(33, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-18 01:46:35'),
(34, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-18 01:46:45'),
(35, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-19 01:32:57'),
(36, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-19 02:17:27'),
(37, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-19 21:43:07'),
(38, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-23 01:19:19'),
(39, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-24 00:08:25'),
(40, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-25 22:04:16'),
(41, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-26 22:46:41'),
(42, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xf31031b3fb3ead91fd4e1cf2e408144e, 'N', '127.0.0.1', '2018-04-29 23:20:48'),
(43, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-04-29 23:20:56'),
(44, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '114.23.241.67', '2018-04-30 03:49:46'),
(45, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '114.23.241.67', '2018-04-30 03:54:46'),
(46, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '114.23.241.67', '2018-04-30 21:13:28'),
(47, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '114.23.241.67', '2018-04-30 22:50:35'),
(48, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '114.23.241.67', '2018-05-01 01:26:26'),
(49, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '114.23.241.67', '2018-05-01 03:40:59'),
(50, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '114.23.241.67', '2018-05-01 21:18:11'),
(51, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '114.23.241.67', '2018-05-02 23:29:04'),
(52, 0x5dd946d64029d62ed5093f93efcdf8b8cc7e05bda8449e6e9e93f94d12b2356b, 0xab29fbee0fcaed127e5cbc85753a9dca, 'Y', '127.0.0.1', '2018-05-15 00:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `cms_settings`
--

CREATE TABLE `cms_settings` (
  `cmsset_id` int(11) NOT NULL,
  `cmsset_name` varchar(100) NOT NULL,
  `cmsset_label` varchar(50) NOT NULL,
  `cmsset_explanation` varchar(255) NOT NULL,
  `cmsset_status` char(1) NOT NULL DEFAULT 'I',
  `cmsset_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_settings`
--

INSERT INTO `cms_settings` (`cmsset_id`, `cmsset_name`, `cmsset_label`, `cmsset_explanation`, `cmsset_status`, `cmsset_value`) VALUES
(2, 'pages_generations', 'Page Generation Limit', 'The number of levels of children pages that are allowed to be made.', 'A', '2'),
(10, 'pages_maximum', 'Page Limit', '', 'I', '12');

-- --------------------------------------------------------

--
-- Table structure for table `cms_users`
--

CREATE TABLE `cms_users` (
  `user_id` int(11) NOT NULL COMMENT 'Primary key for user',
  `user_fname` varchar(45) NOT NULL COMMENT 'User''s firstname',
  `user_lname` varchar(45) DEFAULT NULL COMMENT 'User''s lastname',
  `user_pass` varchar(255) DEFAULT NULL COMMENT 'User''s password (recommended as being sha256)',
  `user_email` varchar(100) DEFAULT NULL COMMENT 'User''s email address',
  `last_login_date` datetime DEFAULT NULL,
  `access_id` int(11) DEFAULT '1' COMMENT 'User''s rights - whether they are admin, banned, general user etc. This is totally customisable and is up to the programmer.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_users`
--

INSERT INTO `cms_users` (`user_id`, `user_fname`, `user_lname`, `user_pass`, `user_email`, `last_login_date`, `access_id`) VALUES
(1, 'Tomahawk', 'Support', '9bc129f7a46381be15f1329c4479e02c70d10d19', 'support@tomahawk.co.nz', '2018-05-15 00:28:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `content_column`
--

CREATE TABLE `content_column` (
  `content` mediumtext NOT NULL,
  `css_class` varchar(255) NOT NULL,
  `span` int(11) DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `content_row_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content_column`
--

INSERT INTO `content_column` (`content`, `css_class`, `span`, `rank`, `content_row_id`) VALUES
('<p>Column 1</p>', 'col-xs-12', NULL, 1, 100),
('<p>Column 1</p>', 'col-xs-12 col-sm-6 col-md-6', NULL, 1, 101),
('<p>Column 2</p>', 'col-xs-12 col-sm-6 col-md-6', NULL, 2, 101),
('<p>Column 1</p>', 'col-xs-12 col-sm-6 col-md-4', NULL, 1, 102),
('<p>Column 2</p>', 'col-xs-12 col-sm-6 col-md-4', NULL, 2, 102),
('<p>Column 3</p>', 'col-xs-12 col-sm-6 col-md-4', NULL, 3, 102),
('', 'col-xs-12 col-sm-6 col-md-3', NULL, 1, 103),
('<p><a href=\"/contact\">Contact</a></p>', 'col-xs-12 col-sm-6 col-md-3', NULL, 2, 103),
('<p>Column 3</p>', 'col-xs-12 col-sm-6 col-md-3', NULL, 3, 103),
('<p>Column 4</p>', 'col-xs-12 col-sm-6 col-md-3', NULL, 4, 103),
('<p>Column 1</p>', 'col-xs-12', NULL, 1, 219),
('<p>Column 1</p>', 'col-xs-12 col-sm-6 col-md-6', NULL, 1, 220),
('<p>Column 2</p>', 'col-xs-12 col-sm-6 col-md-6', NULL, 2, 220),
('<p><img alt=\"\" src=\"/library/testing/01-testing-image.jpg\" /></p>', 'col-xs-12 col-sm-6 col-md-4', NULL, 1, 221),
('<p><a href=\"https://newbasecms.netzone.nz/contact-us\">Contact</a></p>', 'col-xs-12 col-sm-6 col-md-4', NULL, 2, 221),
('<p>Column 3</p>', 'col-xs-12 col-sm-6 col-md-4', NULL, 3, 221),
('<p><a class=\"btn btn--brown-ghost text-uppercase\" href=\"#\">Book Now </a></p>', 'col-xs-12', NULL, 1, 299);

-- --------------------------------------------------------

--
-- Table structure for table `content_row`
--

CREATE TABLE `content_row` (
  `id` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `page_meta_data_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2;

--
-- Dumping data for table `content_row`
--

INSERT INTO `content_row` (`id`, `rank`, `page_meta_data_id`) VALUES
(100, 1, 21),
(101, 2, 21),
(102, 3, 21),
(103, 4, 21),
(219, 1, 24),
(220, 2, 24),
(221, 3, 24),
(299, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `comments` text,
  `status` enum('A','H','D') NOT NULL DEFAULT 'H',
  `date_of_enquiry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`id`, `first_name`, `last_name`, `email_address`, `contact_number`, `subject`, `comments`, `status`, `date_of_enquiry`, `ip_address`) VALUES
(1, 'Pinal', 'Desai', 'pinal.j.desai@gmail.com', '0273988446', 'r4ew34', '4343', 'A', '2018-04-30 23:42:55', '114.23.241.67'),
(2, 'Pinal', 'Desai', 'pinal.j.desai@gmail.com', '0273988446', 'Test email', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dignissim convallis eros, at varius velit commodo cursus. Phasellus vitae nunc non justo euismod efficitur. Phasellus porttitor augue in est sagittis tempor vel a leo. Duis malesuada eleifend felis non suscipit. In elementum rutrum orci vel blandit. Fusce nec urna tincidunt, iaculis tellus in, mollis lectus. Sed nisl odio, accumsan a aliquet id, viverra id quam. Morbi ullamcorper auctor lacus, at feugiat enim bibendum vel. Nullam elit lacus, posuere id est at, volutpat semper ex. Praesent sit amet sagittis purus. Donec quis ornare orci. Aenean in odio quis mauris dapibus molestie.', 'A', '2018-05-01 00:33:58', '114.23.241.67'),
(3, 'Pinal', 'Desai', 'pinal.j.desai@gmail.com', '0273988446', 'TEST contact email', 'Vestibulum molestie feugiat imperdiet. Praesent tristique neque id fringilla feugiat. Nullam neque ante, aliquam eu libero eu, mollis congue est. Donec ac dui vel ex tempor suscipit. Cras porta elit sed enim auctor ultrices. Cras mattis egestas mauris sit amet eleifend. Vestibulum vitae sodales ante, et lobortis quam. Sed ultricies ante risus, lacinia venenatis odio facilisis vel. Donec dolor nulla, sollicitudin pharetra risus a, ultricies viverra urna. Cras at libero feugiat, tempor massa non, tincidunt ex. Cras vestibulum suscipit dui, in suscipit urna ultrices non. Duis laoreet ac ipsum vitae condimentum.', 'A', '2018-05-01 00:56:23', '114.23.241.67'),
(4, 'Chrome', 'Test', 'alan@tomahawk.co.nz', '1234', 'Test Subject', 'Tomahawk testing.', 'A', '2018-05-01 03:43:02', '114.23.241.67'),
(5, 'Jed', 'Diaz', 'jed@test.com', '1231321', 'qdwqdwqdqw', 'dqwefewfewfewf', 'A', '2018-05-16 04:49:19', '127.0.0.1');

-- --------------------------------------------------------

--
-- Table structure for table `general_importantpages`
--

CREATE TABLE `general_importantpages` (
  `imppage_id` int(11) NOT NULL,
  `imppage_name` varchar(150) NOT NULL,
  `imppage_showincms` enum('N','Y') NOT NULL DEFAULT 'Y',
  `page_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_importantpages`
--

INSERT INTO `general_importantpages` (`imppage_id`, `imppage_name`, `imppage_showincms`, `page_id`) VALUES
(1, 'Home', 'N', 1),
(2, '404', 'Y', 4),
(3, 'Contact', 'Y', 3),
(4, 'Gallery', 'Y', 9),
(5, 'Reviews', 'Y', 8),
(6, 'Blog', 'Y', 7);

-- --------------------------------------------------------

--
-- Table structure for table `general_pages`
--

CREATE TABLE `general_pages` (
  `id` int(11) NOT NULL COMMENT 'Primary key for pages',
  `access_level` enum('P','L') NOT NULL DEFAULT 'P' COMMENT 'P = Public, L = Private',
  `meta_cache` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` int(11) DEFAULT NULL,
  `page_meta_data_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_pages`
--

INSERT INTO `general_pages` (`id`, `access_level`, `meta_cache`, `parent_id`, `page_meta_data_id`) VALUES
(1, 'P', 1, NULL, 1),
(2, 'P', 1, NULL, 2),
(3, 'P', 1, NULL, 3),
(4, 'P', 1, NULL, 4),
(5, 'P', 1, NULL, 5),
(6, 'P', 1, NULL, 6),
(7, 'P', 1, 2, 7),
(8, 'P', 1, 2, 8),
(9, 'P', 1, NULL, 9),
(10, 'P', 1, NULL, 10),
(11, 'P', 1, 3, 11),
(12, 'P', 1, NULL, 21),
(13, 'P', 1, NULL, 24);

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL COMMENT 'Company/Business/Website name	',
  `start_year` int(4) DEFAULT NULL,
  `email_address` mediumtext COMMENT 'Email Address',
  `phone_number` varchar(100) DEFAULT NULL,
  `address` mediumtext,
  `booking_url` varchar(255) DEFAULT NULL,
  `js_code_head_close` mediumtext,
  `js_code_body_open` mediumtext,
  `js_code_body_close` mediumtext,
  `adwords_code` mediumtext,
  `robot_meta_tag` enum('Y','N') NOT NULL DEFAULT 'N',
  `mailchimp_api_key` varchar(100) DEFAULT NULL,
  `mailchimp_list_id` varchar(50) DEFAULT NULL,
  `map_latitude` float(10,6) DEFAULT NULL,
  `map_longitude` float(10,6) DEFAULT NULL,
  `map_address` mediumtext,
  `map_heading` varchar(255) DEFAULT NULL,
  `map_zoom_level` smallint(6) DEFAULT '12',
  `map_marker_latitude` float(10,6) DEFAULT NULL,
  `map_marker_longitude` float(10,6) DEFAULT NULL,
  `map_styles` text,
  `slideshow_speed` int(11) DEFAULT '3000',
  `set_sitemapupdated` timestamp NULL DEFAULT NULL,
  `set_sitemapstatus` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `company_name`, `start_year`, `email_address`, `phone_number`, `address`, `booking_url`, `js_code_head_close`, `js_code_body_open`, `js_code_body_close`, `adwords_code`, `robot_meta_tag`, `mailchimp_api_key`, `mailchimp_list_id`, `map_latitude`, `map_longitude`, `map_address`, `map_heading`, `map_zoom_level`, `map_marker_latitude`, `map_marker_longitude`, `map_styles`, `slideshow_speed`, `set_sitemapupdated`, `set_sitemapstatus`) VALUES
(1, 'Cabot Lodge', 2017, 'alan@tomahawk.co.nz;pinal@tomahawk.co.nz', '9522233311', '17 Constellation Drive,\r\nMairangi Bay, Auckland 0632\r\nNew Zealand', 'http://www.example.com', NULL, NULL, NULL, NULL, 'N', '6577a17dd0a66458981c0b4126a86b45-us15', '3919cd1845', -36.746704, 174.736298, '17 Constellation Dr, Rosedale, Auckland 0632, New Zealand', 'Tomahawk Brand Management', 14, -36.746704, 174.736298, '[{\"featureType\":\"administrative\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"simplified\"}]},{\"featureType\":\"landscape\",\"elementType\":\"geometry\",\"stylers\":[{\"visibility\":\"simplified\"},{\"color\":\"#fcfcfc\"}]},{\"featureType\":\"poi\",\"elementType\":\"geometry\",\"stylers\":[{\"visibility\":\"simplified\"},{\"color\":\"#fcfcfc\"}]},{\"featureType\":\"road.highway\",\"elementType\":\"geometry\",\"stylers\":[{\"visibility\":\"simplified\"},{\"color\":\"#dddddd\"}]},{\"featureType\":\"road.arterial\",\"elementType\":\"geometry\",\"stylers\":[{\"visibility\":\"simplified\"},{\"color\":\"#dddddd\"}]},{\"featureType\":\"road.local\",\"elementType\":\"geometry\",\"stylers\":[{\"visibility\":\"simplified\"},{\"color\":\"#eeeeee\"}]},{\"featureType\":\"water\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"on\"},{\"color\":\"#acbcc9\"}]},{\"featureType\":\"water\",\"elementType\":\"geometry\",\"stylers\":[{\"saturation\":\"53\"}]},{\"featureType\":\"water\",\"elementType\":\"labels.text.fill\",\"stylers\":[{\"lightness\":\"-42\"},{\"saturation\":\"17\"}]},{\"featureType\":\"water\",\"elementType\":\"labels.text.stroke\",\"stylers\":[{\"lightness\":\"61\"}]}]', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `mod_id` int(11) NOT NULL COMMENT 'Primary key for include',
  `mod_name` varchar(255) NOT NULL COMMENT 'Include name',
  `mod_path` varchar(255) NOT NULL COMMENT 'Include URL/file path (exclude the extension)',
  `mod_showincms` enum('N','Y') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`mod_id`, `mod_name`, `mod_path`, `mod_showincms`) VALUES
(1, 'Slideshow', 'slideshow', 'N'),
(2, 'Gallery', 'gallery', 'N'),
(3, 'Contact', 'contact', 'Y'),
(4, 'Newsletter', 'newsletter', 'N'),
(5, 'Quicklinks', 'quicklinks', 'N'),
(6, 'Reviews', 'reviews', 'N'),
(7, 'Blog', 'blog', 'N'),
(8, 'Google Map', 'map', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `module_pages`
--

CREATE TABLE `module_pages` (
  `modpages_id` int(11) NOT NULL,
  `modpages_rank` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `module_pages`
--

INSERT INTO `module_pages` (`modpages_id`, `modpages_rank`, `mod_id`, `page_id`) VALUES
(2, 2, 8, 6),
(7, 2, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `module_templates`
--

CREATE TABLE `module_templates` (
  `tmplmod_id` int(11) NOT NULL,
  `tmplmod_rank` int(11) NOT NULL,
  `tmpl_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `module_templates`
--

INSERT INTO `module_templates` (`tmplmod_id`, `tmplmod_rank`, `tmpl_id`, `mod_id`) VALUES
(1, 20, 1, 1),
(2, 19, 1, 2),
(3, 6, 1, 4),
(4, 3, 1, 5),
(5, 18, 1, 6),
(6, 2, 1, 7),
(7, 20, 2, 1),
(8, 19, 2, 2),
(9, 6, 2, 4),
(10, 3, 2, 5),
(11, 18, 2, 6),
(12, 2, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `page_has_quicklink`
--

CREATE TABLE `page_has_quicklink` (
  `page_id` int(11) NOT NULL,
  `quicklink_page_id` int(11) NOT NULL,
  `type` enum('P','S') NOT NULL DEFAULT 'P',
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_has_quicklink`
--

INSERT INTO `page_has_quicklink` (`page_id`, `quicklink_page_id`, `type`, `rank`) VALUES
(10, 1, 'P', 0),
(10, 11, 'P', 0),
(11, 9, 'P', 0),
(11, 10, 'P', 0),
(13, 5, 'P', 3),
(13, 3, 'P', 1),
(13, 2, 'P', 2),
(1, 3, 'P', 2),
(1, 2, 'P', 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_meta_data`
--

CREATE TABLE `page_meta_data` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `menu_label` varchar(255) DEFAULT NULL,
  `footer_menu` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `sub_heading` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `full_url` varchar(255) DEFAULT NULL,
  `introduction` mediumtext,
  `short_description` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `photo_caption_heading` varchar(255) DEFAULT NULL,
  `photo_caption` varchar(255) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `thumb_photo_path` varchar(255) DEFAULT NULL,
  `thumb_portrait_photo_path` varchar(255) DEFAULT NULL,
  `video_id` varchar(45) DEFAULT NULL,
  `quicklink_heading` varchar(255) DEFAULT NULL,
  `quicklink_photo_path` varchar(255) DEFAULT NULL,
  `quicklink_description` text,
  `quicklink_button_text` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `meta_description` mediumtext,
  `og_title` varchar(255) DEFAULT NULL,
  `og_meta_description` mediumtext,
  `og_image` varchar(255) DEFAULT NULL,
  `page_code_head_close` mediumtext,
  `page_code_body_open` mediumtext,
  `page_code_body_close` mediumtext,
  `time_based_publishing` enum('N','Y') NOT NULL DEFAULT 'N',
  `publish_on` datetime DEFAULT NULL,
  `hide_on` datetime DEFAULT NULL,
  `is_locked` tinyint(1) NOT NULL DEFAULT '0',
  `status` enum('A','H','D') DEFAULT 'H',
  `rank` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `slideshow_id` int(11) DEFAULT NULL,
  `template_id` int(11) NOT NULL,
  `page_meta_index_id` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_meta_data`
--

INSERT INTO `page_meta_data` (`id`, `name`, `menu_label`, `footer_menu`, `heading`, `sub_heading`, `url`, `full_url`, `introduction`, `short_description`, `description`, `photo_caption_heading`, `photo_caption`, `photo_path`, `thumb_photo_path`, `thumb_portrait_photo_path`, `video_id`, `quicklink_heading`, `quicklink_photo_path`, `quicklink_description`, `quicklink_button_text`, `title`, `meta_description`, `og_title`, `og_meta_description`, `og_image`, `page_code_head_close`, `page_code_body_open`, `page_code_body_close`, `time_based_publishing`, `publish_on`, `hide_on`, `is_locked`, `status`, `rank`, `date_created`, `date_updated`, `date_deleted`, `created_by`, `updated_by`, `gallery_id`, `slideshow_id`, `template_id`, `page_meta_index_id`) VALUES
(1, 'Home', 'Home', 'Home', 'Experience spectacular Fiordland at Cabot Lodge on Cathedral Peaks Station.', NULL, 'home', '/', 'With 2000 acres of farmland bordering the Fiordland National Park and overlooking Lake Manapouri, the property showcases New Zealand at its best.', NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.</p>', 'Where the world meets wilderness', NULL, '/library/heroshots/manapouri-8404.jpg', '/uploads/manapouri-8404-wkcds.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Cabot Lodge - Home', 'Meta descriptions', 'OG Title', 'OG descriptions', '/library/general/alberto-restifo-4510-unsplash.jpg', NULL, NULL, NULL, 'N', NULL, NULL, 1, 'A', 1, NULL, '2018-05-16 04:27:26', NULL, NULL, 1, 3, NULL, 1, 1),
(2, 'About Us', 'About Us', NULL, 'About Us', NULL, 'about-us', '/about-us', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'About Us', '/library/general/mathew-waters-38056-unsplash.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna.', 'Find out More', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, 0, 'A', 13, '2018-03-19 00:28:00', '2018-05-16 06:40:50', NULL, 3, 1, NULL, NULL, 2, 1),
(3, 'Contact Us', 'Contact Us', NULL, 'Contact Us', NULL, 'contact-us', '/contact-us', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Contact Us', '/library/general/mathew-waters-38056-unsplash.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna. Suspendisse lobortis libero non lectus dictum tristique. Nulla vestibulum dignissim placerat. Fusce commodo pellentesque ante, sit amet pretium mi volutpat sed. Phasellus tincidunt ipsum in mi sodales facilisis sed vitae mi. Curabitur mollis orci quis sem pulvinar facilisis. Fusce eleifend gravida mattis. Duis sed tempor eros. Cras bibendum tempus lorem et vulputate. In id condimentum nunc. Aenean non quam ornare, fermentum mi ac, laoreet lorem.', 'Discover more', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, 0, 'A', 6, '2018-03-19 00:28:21', '2018-05-16 06:41:36', NULL, 3, 1, NULL, NULL, 2, 1),
(4, '404', NULL, NULL, '404', NULL, '404-page', '/404-page', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 'N', NULL, NULL, 0, 'A', 7, '2018-03-19 02:12:33', '2018-04-20 02:38:21', NULL, 3, 1, NULL, NULL, 1, 1),
(5, 'Tours', 'Tours', 'Tours', 'Tours', NULL, 'tours', '/tours', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Tours', '/library/general/mathew-waters-38056-unsplash.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna.', 'Discover more', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, 0, 'A', 2, '2018-04-17 02:45:47', '2018-05-01 03:44:33', NULL, 1, 1, NULL, NULL, 1, 1),
(6, 'Our Location', 'Our Location', 'Our Location', 'Our Location', NULL, 'our-location', '/our-location', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, 0, 'A', 3, '2018-04-19 21:53:20', '2018-04-30 03:09:10', NULL, 1, 1, NULL, NULL, 1, 1),
(7, 'Blog', 'Blog', NULL, 'Blog', NULL, 'blog', '/about-us/blog', NULL, NULL, NULL, NULL, NULL, '/library/general/mathew-waters-38056-unsplash.jpg', '/uploads/mathew-waters-38056-unsplash-4fmkq.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/library/general/mathew-waters-38056-unsplash.jpg', '<script>Blog Head Close</script>', '<script>Blog Body Open</script>', '<script>Blog Body Close</script>', 'N', NULL, NULL, 0, 'A', 1, '2018-04-19 21:54:28', '2018-04-27 00:55:56', NULL, 1, 1, NULL, NULL, 1, 1),
(8, 'Reviews', 'Reviews', NULL, 'Reviews', NULL, 'reviews', '/about-us/reviews', NULL, NULL, NULL, NULL, NULL, '/library/general/jonathan-bean-8540-unsplash.jpg', '/uploads/jonathan-bean-8540-unsplash-742fr.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/library/general/jonathan-bean-8540-unsplash.jpg', NULL, NULL, NULL, 'N', NULL, NULL, 0, 'A', 2, '2018-04-19 21:54:59', '2018-05-01 00:24:47', NULL, 1, 1, NULL, NULL, 1, 1),
(9, 'Gallery', 'Gallery', NULL, 'Gallery', NULL, 'gallery', '/gallery', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 'N', NULL, NULL, 0, 'A', 4, '2018-04-19 21:55:48', '2018-04-19 21:55:59', NULL, 1, 1, NULL, NULL, 1, 1),
(10, 'Terms and Conditions', NULL, 'Terms and Conditions', 'Terms and Conditions', NULL, 'terms-and-conditions', '/terms-and-conditions', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 'N', NULL, NULL, 0, 'A', 8, '2018-04-20 01:41:32', '2018-04-20 01:46:09', NULL, 1, 1, NULL, NULL, 1, 1),
(11, 'Reviews', 'Reviews', NULL, 'Reviews Contact Page', NULL, 'reviews', '/contact-us/reviews', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam justo sapien, gravida non pulvinar in, interdum tincidunt erat. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec et odio enim. Etiam nec elit suscipit, convallis ex id, molestie purus. Sed facilisis gravida convallis.', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 'N', NULL, NULL, 0, 'A', 1, '2018-04-20 01:44:21', '2018-04-20 04:13:31', NULL, 1, 1, NULL, NULL, 2, 1),
(12, 'Category 1', 'Category 1', NULL, NULL, NULL, 'category-1', '/category-1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Category 1 Meta Title', 'Category 1 Meta DESC', 'Category 1 Og Title', 'Category 1 og desc', '/library/general/aaron-birch-46477-unsplash.jpg', '<script>Blog Category 1 Head Close</script>', '<script>Blog Category 1 Body Open</script>', '<script>Blog Category 1 Body Close</script>', 'N', NULL, NULL, 0, 'A', 1, '2018-04-24 02:48:12', '2018-04-27 00:30:21', NULL, 1, 1, NULL, NULL, 1, 1),
(13, 'Category 2', 'Category 2', NULL, NULL, NULL, 'category-2', '/category-2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, 0, 'A', 2, '2018-04-24 02:55:32', '2018-04-24 02:55:54', NULL, 1, 1, NULL, NULL, 1, 1),
(14, 'Category 3', 'Category 3', NULL, NULL, NULL, 'category-3', '/category-3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, 0, 'A', 3, '2018-04-24 03:26:29', '2018-04-24 03:26:40', NULL, 1, 1, NULL, NULL, 1, 1),
(15, 'Category 4', 'Category 4', NULL, NULL, NULL, 'category-4', '/category-4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'N', NULL, NULL, 0, 'A', 4, '2018-04-24 03:27:01', '2018-04-24 03:27:11', NULL, 1, 1, NULL, NULL, 1, 1),
(16, 'Lorem ipsum dolor sit amet', NULL, NULL, 'Lorem ipsum dolor sit amet', NULL, 'lorem-ipsum-dolor-sit-amet', '/lorem-ipsum-dolor-sit-amet', 'Vestibulum libero risus, malesuada at est quis, faucibus vehicula felis. Aliquam ut mauris a orci feugiat hendrerit vel ac ante. In non accumsan orci.', 'Curabitur et ex rhoncus, lobortis odio in, lacinia quam. Nulla pretium rutrum neque, sed aliquam justo finibus venenatis. Morbi interdum pretium efficitur.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a metus ullamcorper, placerat tortor id, imperdiet sapien. Sed et nulla posuere, lacinia dui eget, tempor nibh. Pellentesque facilisis sit amet ligula euismod sollicitudin. Morbi sit amet pellentesque diam, eget consectetur ante. Cras a tincidunt diam. Sed ac risus lorem. Donec a vestibulum tortor. Aenean ultricies arcu ut tempus cursus. Curabitur auctor, nisl placerat dictum elementum, urna nibh aliquet libero, a convallis eros eros eu est.</p>\r\n\r\n<p>Phasellus sollicitudin hendrerit nibh. Aenean euismod vehicula nisi, ornare blandit ante sodales scelerisque. Phasellus nisi nisl, bibendum in nunc vel, pretium scelerisque ex. Sed quis turpis ut dui malesuada finibus non vel enim. Phasellus viverra nibh nisl, ut mattis erat sagittis a. Ut a purus vestibulum, commodo dolor eu, finibus ligula. Suspendisse vestibulum ipsum at est porttitor, quis tristique ante finibus. Maecenas eu sapien velit. Praesent tristique elit sed risus mattis, et fringilla nisi eleifend. Cras vel urna gravida, dignissim tellus nec, hendrerit felis. Aliquam erat volutpat. Nam lobortis, urna vitae sollicitudin pharetra, sem sapien dictum nisl, ac faucibus lectus mauris eu mauris. Phasellus luctus, felis at ullamcorper finibus, felis felis fringilla lorem, quis lacinia libero mi quis est. Cras ut accumsan purus. Nam sed tellus erat.</p>\r\n\r\n<p>Nunc gravida quam nec felis rhoncus suscipit. Duis posuere ante ac nulla laoreet pretium. Quisque in vestibulum arcu, sit amet pharetra neque. Curabitur lacinia mi et congue vehicula. Donec pulvinar magna nulla, eu fringilla risus molestie id. Donec porttitor quis lectus at consectetur. Quisque tellus sapien, rutrum at congue sit amet, feugiat vel dolor. Maecenas bibendum lobortis dui id commodo. Quisque sed sapien vel dolor placerat malesuada. Mauris interdum nisi est, id laoreet lorem mattis quis. Etiam efficitur justo in urna sagittis consequat. Suspendisse posuere sit amet ligula ac porta. Cras id dolor ac nibh imperdiet fermentum id vitae massa. Aenean sed faucibus sapien.</p>', 'Lorem ipsum dolor sit amet HCH', 'Lorem ipsum dolor sit amet HC', '/library/general/mathew-waters-38056-unsplash.jpg', '/uploads/mathew-waters-38056-unsplash-cvazj.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Blog 1 MT', 'Blog 1 MD', 'Blog 1 OGT', 'Blog 1 OGMD', '/library/general/mathew-waters-38056-unsplash.jpg', '<script>Blog POST 1 head Close</script>', '<script>Blog POST 1 body open</script>', '<script>Blog POST 1 body Close</script>', 'N', NULL, NULL, 0, 'A', NULL, '2018-04-24 05:34:01', '2018-04-27 00:45:46', NULL, 1, 1, NULL, NULL, 1, 1),
(17, 'Phasellus sollicitudin hendrerit nibh', NULL, NULL, 'Phasellus sollicitudin hendrerit nibh', NULL, 'phasellus-sollicitudin-hendrerit-nibh', '/phasellus-sollicitudin-hendrerit-nibh', 'Phasellus sollicitudin hendrerit nibh. Aenean euismod vehicula nisi, ornare blandit ante sodales scelerisque. Phasellus nisi nisl, bibendum in nunc vel, pretium scelerisque ex.', 'Suspendisse vestibulum ipsum at est porttitor, quis tristique ante finibus. Maecenas eu sapien velit. Praesent tristique elit sed risus mattis, et fringilla nisi eleifend.', '<p>Phasellus sollicitudin hendrerit nibh. Aenean euismod vehicula nisi, ornare blandit ante sodales scelerisque. Phasellus nisi nisl, bibendum in nunc vel, pretium scelerisque ex. Sed quis turpis ut dui malesuada finibus non vel enim. Phasellus viverra nibh nisl, ut mattis erat sagittis a. Ut a purus vestibulum, commodo dolor eu, finibus ligula. Suspendisse vestibulum ipsum at est porttitor, quis tristique ante finibus. Maecenas eu sapien velit. Praesent tristique elit sed risus mattis, et fringilla nisi eleifend. Cras vel urna gravida, dignissim tellus nec, hendrerit felis. Aliquam erat volutpat. Nam lobortis, urna vitae sollicitudin pharetra, sem sapien dictum nisl, ac faucibus lectus mauris eu mauris. Phasellus luctus, felis at ullamcorper finibus, felis felis fringilla lorem, quis lacinia libero mi quis est. Cras ut accumsan purus. Nam sed tellus erat.</p>\r\n\r\n<p>Phasellus&nbsp;viverra&nbsp;nibh&nbsp;nisl, ut&nbsp;mattis&nbsp;erat&nbsp;sagittis&nbsp;a. Ut a purus&nbsp;vestibulum,&nbsp;commodo&nbsp;dolor eu,&nbsp;finibus&nbsp;ligula.&nbsp;Suspendisse&nbsp;vestibulum&nbsp;ipsum&nbsp;at est&nbsp;porttitor,&nbsp;quis&nbsp;tristique&nbsp;ante&nbsp;finibus. Maecenas eu&nbsp;sapien&nbsp;velit.&nbsp;Praesent&nbsp;tristique&nbsp;elit&nbsp;sed&nbsp;risus&nbsp;mattis, et&nbsp;fringilla&nbsp;nisi&nbsp;eleifend.&nbsp;Cras&nbsp;vel&nbsp;urna&nbsp;gravida,&nbsp;dignissim&nbsp;tellus&nbsp;nec,&nbsp;hendrerit&nbsp;felis.&nbsp;Aliquam&nbsp;erat&nbsp;volutpat. Nam&nbsp;lobortis,&nbsp;urna&nbsp;vitae&nbsp;sollicitudin&nbsp;pharetra, sem&nbsp;sapien&nbsp;dictum&nbsp;nisl, ac&nbsp;faucibus&nbsp;lectus&nbsp;mauris&nbsp;eu&nbsp;mauris.&nbsp;Phasellus&nbsp;luctus,&nbsp;felis&nbsp;at&nbsp;ullamcorper&nbsp;finibus,&nbsp;felis&nbsp;felis&nbsp;fringilla&nbsp;lorem,&nbsp;quis&nbsp;lacinia&nbsp;libero mi&nbsp;quis&nbsp;est.&nbsp;Cras&nbsp;ut&nbsp;accumsan&nbsp;purus. Nam&nbsp;sed&nbsp;tellus&nbsp;erat.</p>', NULL, NULL, '/library/general/johannes-ludwig-348591-unsplash.jpg', '/uploads/johannes-ludwig-348591-unsplash-24cup.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/library/general/johannes-ludwig-348591-unsplash.jpg', NULL, NULL, NULL, 'N', NULL, NULL, 0, 'A', NULL, '2018-04-25 23:29:35', '2018-04-26 22:47:39', NULL, 1, 1, NULL, NULL, 1, 1),
(18, 'Quisque volutpat vel nibh ac ultricies', NULL, NULL, 'Quisque volutpat vel nibh ac ultricies', NULL, 'quisque-volutpat-vel-nibh-ac-ultricies', '/quisque-volutpat-vel-nibh-ac-ultricies', 'Etiam vel massa tincidunt, consectetur nibh id, congue lorem. Nam in laoreet ante. Donec posuere efficitur tortor non molestie. Pellentesque et mauris sed nunc sodales porta.', 'Donec ac tortor auctor, accumsan nibh sed, sagittis metus. Quisque eget posuere libero. Duis lectus nisi, tincidunt et vehicula vitae, suscipit id nibh.', '<p>Quisque volutpat vel nibh ac ultricies. Maecenas ultricies, turpis a accumsan pellentesque, orci leo hendrerit est, sed ultricies dui quam vel ex. Nunc vitae sodales leo. Sed non vestibulum enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus tincidunt enim id nunc elementum molestie non at dui. Quisque varius maximus quam, id iaculis massa lobortis ut. Praesent quis turpis lacinia, luctus urna ut, varius tortor. Cras eget faucibus nulla. Etiam dapibus ligula dui, nec euismod lorem scelerisque ut. Donec non auctor leo, eget aliquet mi. Sed ac ornare nisl. Nulla vestibulum, velit ut pulvinar ultricies, erat justo iaculis mauris, non pretium arcu massa sed tortor.</p>\r\n\r\n<p>Etiam vel massa tincidunt, consectetur nibh id, congue lorem. Nam in laoreet ante. Donec posuere efficitur tortor non molestie. Pellentesque et mauris sed nunc sodales porta. Morbi velit urna, gravida eget nisi eu, pretium imperdiet dolor. Nunc non vehicula diam, tempor aliquam urna. Integer sed tempus dui. Mauris ultricies velit ac varius consequat. Nullam rhoncus gravida metus, ut tincidunt nulla feugiat vel. Nullam ultricies non mauris eu tristique. Duis et arcu vel urna varius consequat.</p>\r\n\r\n<p>Donec ac tortor auctor, accumsan nibh sed, sagittis metus. Quisque eget posuere libero. Duis lectus nisi, tincidunt et vehicula vitae, suscipit id nibh. Sed sapien felis, volutpat sit amet ante sed, viverra tristique dui. In tristique, orci a aliquet viverra, dolor lacus vulputate dui, eget auctor augue orci et ligula. Duis velit quam, rhoncus nec enim eu, dapibus molestie ipsum. Phasellus a neque vulputate, accumsan nibh sed, consequat lacus. Vivamus condimentum vulputate augue, sit amet hendrerit risus laoreet vel. Quisque ullamcorper purus nunc, in rutrum purus scelerisque quis. Quisque in lectus ante. Vivamus lobortis ligula non lectus elementum, et tincidunt elit tempus. Proin dui velit, mattis vitae facilisis convallis, dictum ut dolor.</p>\r\n\r\n<p>In interdum eu enim vitae lacinia. Nunc et blandit diam. Phasellus egestas dui quam, vel elementum augue rhoncus pellentesque. Pellentesque sollicitudin est a diam scelerisque, rutrum finibus odio malesuada. Duis non dolor et lorem scelerisque ultricies a et lorem. Aenean et nisl pulvinar, aliquet tellus sit amet, gravida diam. Donec eu aliquam nulla. Vestibulum tempus lorem enim, sed sodales augue dictum vitae. Maecenas sit amet sem ornare, vehicula diam nec, bibendum arcu. Curabitur dignissim pulvinar nunc fermentum luctus. Nulla viverra justo eget ornare ultricies.</p>', NULL, NULL, '/library/general/david-marcu-28068-unsplash.jpg', '/uploads/david-marcu-28068-unsplash-g0a4r.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/library/general/david-marcu-28068-unsplash.jpg', NULL, NULL, NULL, 'N', NULL, NULL, 0, 'A', NULL, '2018-04-25 23:29:51', '2018-04-26 22:47:03', NULL, 1, 1, NULL, NULL, 1, 1),
(19, 'Quisque et diam nibh', NULL, NULL, 'Quisque et diam nibh', NULL, 'quisque-et-diam-nibh', '/quisque-et-diam-nibh', 'Nulla ipsum risus, pharetra eget mi vitae, suscipit maximus elit. Donec ut ex efficitur, viverra odio sit amet, dignissim justo. Aliquam ac orci sed orci gravida feugiat', 'Quisque et diam nibh. Suspendisse potenti. Quisque at pellentesque odio. Proin semper ex quis sem finibus, vel lacinia massa mollis. Quisque ut volutpat felis, dignissim viverra leo.', '<p>Quisque et diam nibh. Suspendisse potenti. Quisque at pellentesque odio. Proin semper ex quis sem finibus, vel lacinia massa mollis. Quisque ut volutpat felis, dignissim viverra leo. Nulla ipsum risus, pharetra eget mi vitae, suscipit maximus elit. Donec ut ex efficitur, viverra odio sit amet, dignissim justo. Aliquam ac orci sed orci gravida feugiat. Nullam lacinia porta magna, a accumsan mi viverra at. Donec felis nulla, ornare nec placerat in, pretium quis est. Quisque vitae dictum mi, aliquet viverra lectus. Pellentesque feugiat risus nec ligula elementum dapibus. Nullam condimentum velit lectus, eu sagittis tellus vehicula vel. Nulla porttitor tortor id convallis porta. Maecenas gravida tincidunt eros at sollicitudin. Aenean tempor turpis mollis dolor porta vehicula.</p>\r\n\r\n<p>Curabitur et ex rhoncus, lobortis odio in, lacinia quam. Nulla pretium rutrum neque, sed aliquam justo finibus venenatis. Morbi interdum pretium efficitur. Aliquam imperdiet ipsum nec odio porttitor scelerisque. Duis laoreet nunc vel ante blandit lobortis. Morbi ut tortor purus. Pellentesque aliquam in mauris nec posuere. Aenean accumsan diam sit amet diam cursus, nec euismod sapien rutrum. Nullam eleifend, dui et luctus imperdiet, neque libero sagittis nunc, non finibus sapien ex ac sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>', NULL, NULL, '/library/general/eugene-quek-111837-unsplash.jpg', '/uploads/eugene-quek-111837-unsplash-i69jt.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/library/general/eugene-quek-111837-unsplash.jpg', NULL, NULL, NULL, 'N', NULL, NULL, 0, 'A', NULL, '2018-04-25 23:36:25', '2018-04-26 00:04:28', NULL, 1, 1, NULL, NULL, 1, 1),
(20, 'Vivamus vitae ornare urna', NULL, NULL, 'Vivamus vitae ornare urna', NULL, 'vivamus-vitae-ornare-urna', '/vivamus-vitae-ornare-urna', 'Fusce purus tortor, tincidunt eu feugiat vel, molestie et nisi. Morbi ullamcorper eleifend augue, eu placerat tellus egestas a. Sed dignissim mattis vulputate. Ut at feugiat lacus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur malesuada at tortor tristique lobortis. Aliquam a porttitor dui.', 'Vivamus vitae ornare urna. In quam augue, efficitur suscipit neque vitae, posuere aliquet neque. Duis luctus a risus nec elementum. Sed tincidunt aliquet tempor', '<p>Vivamus vitae ornare urna. In quam augue, efficitur suscipit neque vitae, posuere aliquet neque. Duis luctus a risus nec elementum. Sed tincidunt aliquet tempor. Donec varius dolor non vestibulum pharetra. Fusce quis erat in ante pretium dignissim. Aliquam luctus vitae diam ac laoreet. Vivamus eu odio interdum, facilisis diam et, ullamcorper sapien. Etiam eget urna gravida, pulvinar augue vel, fermentum leo. Nullam quis iaculis orci, ac condimentum tortor. In sollicitudin id purus in eleifend. Phasellus vitae tellus odio.</p>\r\n\r\n<p>Fusce purus tortor, tincidunt eu feugiat vel, molestie et nisi. Morbi ullamcorper eleifend augue, eu placerat tellus egestas a. Sed dignissim mattis vulputate. Ut at feugiat lacus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur malesuada at tortor tristique lobortis. Aliquam a porttitor dui. Donec eu arcu justo. Praesent a elit quis odio egestas euismod. Aliquam erat volutpat. Donec placerat, neque eget rutrum volutpat, tellus mi facilisis dolor, id condimentum lorem sapien nec ex. Donec vitae nulla tellus. Vestibulum posuere mi neque.</p>\r\n\r\n<p>Aliquam et blandit ipsum, ut egestas metus. Morbi a suscipit dui. Donec ex nibh, ullamcorper eget libero non, tincidunt semper ligula. Proin accumsan fermentum dui eu venenatis. Aenean commodo eleifend metus, sit amet hendrerit lorem bibendum at. Integer sed fringilla felis. In tincidunt nibh at dui imperdiet pharetra. Cras ut ligula in massa porttitor dapibus. Pellentesque justo ipsum, tincidunt aliquam urna et, lobortis aliquam mauris. Phasellus condimentum lacus nec lorem blandit gravida. Sed eu auctor purus. Etiam ut tincidunt arcu, vel gravida nunc. Phasellus semper imperdiet maximus.</p>', NULL, NULL, '/library/general/aaron-birch-46477-unsplash.jpg', '/uploads/aaron-birch-46477-unsplash-02r18.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '/library/general/aaron-birch-46477-unsplash.jpg', NULL, NULL, NULL, 'N', NULL, NULL, 0, 'A', NULL, '2018-04-26 00:22:44', '2018-04-27 01:29:22', NULL, 1, 1, NULL, NULL, 1, 1),
(21, 'Testing General Page 01', 'Testing General Page 01', 'Testing General Page 01', 'Testing General Page 01', NULL, 'testing-general-page-01', '/testing-general-page-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna. Suspendisse lobortis libero non lectus dictum tristique. Nulla vestibulum dignissim placerat.', NULL, NULL, 'Caption Heading', 'Caption 01', NULL, '', NULL, NULL, 'Testing General Page 01', '/library/general/mathew-waters-38056-unsplash.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna. Suspendisse lobortis libero non lectus dictum tristique. Nulla vestibulum dignissim placerat. Fusce commodo pellentesque ante, sit amet pretium mi volutpat sed. Phasellus tincidunt ipsum in mi sodales facilisis sed vitae mi. Curabitur mollis orci quis sem pulvinar facilisis. Fusce eleifend gravida mattis. Duis sed tempor eros. Cras bibendum tempus lorem et vulputate. In id condimentum nunc. Aenean non quam ornare, fermentum mi ac, laoreet lorem.', 'Discover', 'Testing General Page 01', 'Testing General Page 01', 'Testing General Page 01', 'Testing General Page 01', '/library/general/mathew-waters-38056-unsplash.jpg', NULL, NULL, NULL, 'N', NULL, NULL, 0, 'D', NULL, '2018-04-30 21:16:12', '2018-05-01 03:49:27', '2018-05-01 03:49:30', 1, 1, NULL, NULL, 1, 1),
(22, 'Testing Category 01', 'Testing Category 01', NULL, NULL, NULL, 'testing-category-01', '/testing-category-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Testing Category 01', 'Testing Category 01', 'Testing Category 01', 'Testing Category 01', '/library/general/mathew-waters-38056-unsplash.jpg', NULL, NULL, NULL, 'N', NULL, NULL, 0, 'A', 10, '2018-04-30 22:23:46', '2018-04-30 22:24:14', NULL, 1, 1, NULL, NULL, 1, 1),
(23, 'Testing Blog Post 01', NULL, NULL, 'Testing Blog Post 01', NULL, 'testing-blog-post-01', '/testing-blog-post-01', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna. Suspendisse lobortis libero non lectus dictum tristique. Nulla vestibulum dignissim placerat. Fusce commodo pellentesque ante, sit amet pretium mi volutpat sed. Phasellus tincidunt ipsum in mi sodales facilisis sed vitae mi. Curabitur mollis orci quis sem pulvinar facilisis. Fusce eleifend gravida mattis. Duis sed tempor eros. Cras bibendum tempus lorem et vulputate. In id condimentum nunc. Aenean non quam ornare, fermentum mi ac, laoreet lorem.</p>\r\n\r\n<p><img alt=\"\" src=\"/library/general/mathew-waters-38056-unsplash.jpg\" /></p>', 'Heading 01', 'Caption 01', '/library/general/mathew-waters-38056-unsplash.jpg', '/uploads/mathew-waters-38056-unsplash-c08pl.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'Testing Blog Post 01', 'Testing Blog Post 01', 'Testing Blog Post 01', 'Testing Blog Post 01', '/library/general/mathew-waters-38056-unsplash.jpg', '<p>Head</p>', '<p>Body Open</p>', '<p>Body Close</p>', 'N', NULL, NULL, 0, 'A', NULL, '2018-04-30 22:50:42', '2018-05-01 03:59:27', NULL, 1, 1, NULL, NULL, 1, 1),
(24, 'Testing General Page 02', 'Testing General Page 02', 'Testing General Page 02', 'Testing General Page 02', NULL, 'testing-general-page-02', '/testing-general-page-02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna.', NULL, NULL, 'Heading 01', 'Caption 01', NULL, '', NULL, NULL, 'Testing General Page 02', '/library/general/mathew-waters-38056-unsplash.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna. Suspendisse lobortis libero non lectus dictum tristique. Nulla vestibulum dignissim placerat.', 'Discover', 'Testing General Page 02', 'Testing General Page 02', 'Testing General Page 02', 'Testing General Page 02', '/library/general/mathew-waters-38056-unsplash.jpg', NULL, NULL, NULL, 'N', NULL, NULL, 0, 'D', 20, '2018-04-30 23:04:22', '2018-05-01 23:06:57', '2018-05-15 13:59:07', 1, 1, 7, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `page_meta_index`
--

CREATE TABLE `page_meta_index` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `page_meta_index`
--

INSERT INTO `page_meta_index` (`id`, `name`, `value`, `title`) VALUES
(1, 'Index, Follow (Default)', 'INDEX, FOLLOW', 'Use this if you want to let search engines do their normal job.'),
(2, 'No Index, Follow', 'NOINDEX, FOLLOW', 'Search engine robots can follow any links on this page but will not include this page.'),
(3, 'Index, No Follow', 'INDEX, NOFOLLOW', 'Search engine robots should include this page but not follow any links on this page.'),
(4, 'No Index, No Follow', 'NOINDEX, NOFOLLOW', 'This is for sections of a site that shouldn\'t be indexed and shouldn\'t have links followed.');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `full_path` varchar(255) NOT NULL,
  `thumb_path` varchar(255) DEFAULT NULL,
  `caption_heading` varchar(255) DEFAULT NULL,
  `caption` text,
  `alt_text` varchar(255) DEFAULT NULL,
  `button_label` varchar(30) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `width` smallint(6) NOT NULL,
  `height` smallint(6) NOT NULL,
  `rank` int(11) DEFAULT NULL COMMENT 'Heirarchy/Order for the slides (lower is greater)',
  `photo_group_id` int(11) DEFAULT NULL COMMENT 'Foreign Key to the slideshow group for this slide'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`id`, `full_path`, `thumb_path`, `caption_heading`, `caption`, `alt_text`, `button_label`, `url`, `video_url`, `width`, `height`, `rank`, `photo_group_id`) VALUES
(6, '/library/general/alberto-restifo-4510-unsplash.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 6048, 4032, 2, 2),
(7, '/library/general/david-marcu-28068-unsplash.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 4288, 2848, 1, 2),
(8, '/library/general/alberto-restifo-4510-unsplash.jpg', '/uploads/alberto-restifo-4510-unsplash-juti1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 6048, 4032, 1, 3),
(9, '/library/general/cassie-matias-202987-unsplash.jpg', '/uploads/cassie-matias-202987-unsplash-tmke6.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 3870, 2902, 2, 3),
(10, '/library/general/eugene-quek-111837-unsplash.jpg', '/uploads/eugene-quek-111837-unsplash-o07xg.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 3595, 2397, 3, 3),
(11, '/library/general/nicolas-prieto-187290-unsplash.jpg', '/uploads/nicolas-prieto-187290-unsplash-at8lv.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 2620, 1653, 2, 4),
(12, '/library/general/vikas-kanwal-106091-unsplash.jpg', '/uploads/vikas-kanwal-106091-unsplash-wko4b.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 5472, 3648, 1, 4),
(13, '/library/general/jonathan-bean-8540-unsplash.jpg', '/uploads/jonathan-bean-8540-unsplash-in72r.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 4288, 2848, NULL, 5),
(14, '/library/general/sergei-akulich-39911-unsplash.jpg', '/uploads/sergei-akulich-39911-unsplash-vhfwo.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 8192, 4921, NULL, 5),
(16, '/library/testing/02-testing-image.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1125, 750, NULL, 1),
(17, '/library/testing/03-testing-image.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, 1260, 715, NULL, 1),
(22, '/library/testing/02-testing-image.jpg', '', 'Heading 04', 'Caption 04', 'Alt text 04', NULL, NULL, NULL, 1125, 750, 2, 8),
(23, '/library/testing/03-testing-image.jpg', '', 'Heading 03', 'Caption 03', 'Alt text 03', NULL, NULL, NULL, 1260, 715, 3, 8),
(24, '/library/testing/04-testing-image.jpg', '', 'Heading 02', 'Caption 02', 'Alt text 02', NULL, NULL, NULL, 1125, 750, 4, 8),
(25, '/library/testing/01-testing-image.jpg', '', 'Heading 01', 'Caption 01', 'Alt text 01', NULL, NULL, NULL, 1127, 750, 1, 8),
(26, '/library/testing/01-testing-image.jpg', '/uploads/01-testing-image-vew8t.jpg', 'Heading 01', 'Caption 01', 'Alt Text 01', NULL, NULL, NULL, 1127, 750, 1, 7),
(27, '/library/testing/02-testing-image.jpg', '/uploads/02-testing-image-7uik4.jpg', 'Heading 02', 'Caption 02', 'Alt Text 02', NULL, NULL, NULL, 1125, 750, 2, 7),
(28, '/library/testing/03-testing-image.jpg', '/uploads/03-testing-image-5wtda.jpg', 'Heading 03', 'Caption 03', 'Alt Text 03', NULL, NULL, NULL, 1260, 715, 3, 7),
(29, '/library/testing/04-testing-image.jpg', '/uploads/04-testing-image-fy67d.jpg', 'Heading 04', 'Caption 04', 'Alt Text 04', NULL, NULL, NULL, 1125, 750, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `photo_group`
--

CREATE TABLE `photo_group` (
  `id` int(11) NOT NULL COMMENT 'Primary key for the slideshow/gallery group',
  `name` varchar(255) NOT NULL,
  `menu_label` varchar(255) DEFAULT NULL,
  `type` enum('C','G','S') NOT NULL DEFAULT 'S' COMMENT 'C - Carousel, G - Gallery, S - Slideshow(Default)',
  `show_in_cms` enum('N','Y') NOT NULL DEFAULT 'Y',
  `show_on_gallery_page` enum('N','Y') NOT NULL DEFAULT 'N',
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `photo_group`
--

INSERT INTO `photo_group` (`id`, `name`, `menu_label`, `type`, `show_in_cms`, `show_on_gallery_page`, `rank`) VALUES
(1, 'Home Page Slideshow', NULL, 'S', 'Y', 'N', NULL),
(2, 'TEST2', NULL, 'S', 'Y', 'N', NULL),
(3, 'Gallery 1', 'Gallery 1 Tab', 'G', 'Y', 'Y', 1),
(4, 'Gallery 2', 'Gallery 2 Tab', 'G', 'Y', 'Y', 2),
(5, 'Gallery 3', 'Gallery 3', 'G', 'Y', 'Y', 3),
(6, 'Gallery 4', 'Gallery 4', 'G', 'Y', 'N', 4),
(7, 'Testing Gallery 01', 'Testing Gallery 01', 'G', 'Y', 'N', 10),
(8, 'Testing Slideshow 01', NULL, 'S', 'Y', 'N', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `redirect`
--

CREATE TABLE `redirect` (
  `id` int(11) NOT NULL,
  `old_url` longtext NOT NULL,
  `new_url` longtext,
  `status_code` int(11) NOT NULL DEFAULT '301',
  `status` enum('A','H','D') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `redirect`
--

INSERT INTO `redirect` (`id`, `old_url`, `new_url`, `status_code`, `status`) VALUES
(1, 'https://newbasecms.netzone.nz/about-us', 'https://newbasecms.netzone.nz/', 301, 'D'),
(2, 'https://newbasecms.netzone.nz/tours', 'https://newbasecms.netzone.nz/about-us', 301, 'H');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `person_name` varchar(150) DEFAULT NULL,
  `person_location` varchar(150) DEFAULT NULL,
  `photo_path` varchar(225) DEFAULT NULL,
  `description` text,
  `date_posted` date DEFAULT NULL,
  `status` enum('A','D','H') CHARACTER SET latin1 NOT NULL DEFAULT 'H',
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `person_name`, `person_location`, `photo_path`, `description`, `date_posted`, `status`, `rank`) VALUES
(1, 'John Doe', 'Auckland, New Zealand', '/library/general/jonathan-bean-8540-unsplash.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at accumsan leo. Maecenas eget lorem sit amet quam tempus faucibus. Nullam pellentesque vehicula elementum. Quisque pharetra sed turpis nec porta. Nulla facilisi. Proin at egestas leo. Aliquam eget eros magna.', '2017-10-23', 'A', 1),
(2, 'Jane Doe', 'Christchurch', '/library/avatars/avatar2.png', 'Maecenas vel lacus facilisis, consequat augue nec, viverra nisi. Phasellus lacinia, eros dictum varius faucibus, nisi arcu aliquam sem, ut dignissim justo neque in quam. Nullam hendrerit nulla sed blandit vehicula.', '2017-10-09', 'A', 2),
(3, 'Scott Doe', 'Auckland', '/library/avatars/avatar1.png', 'Aenean diam quam, scelerisque eget lorem in, pretium auctor ipsum. Praesent nec enim diam. Sed iaculis porta eros, vitae ornare leo sagittis vitae. Aliquam id tellus lobortis, faucibus ligula ut, accumsan nisi. Integer blandit iaculis neque ac accumsan. Morbi vitae nisi eleifend, ullamcorper tellus vel, lacinia sapien.', '2017-10-08', 'A', 3),
(4, 'Lucas Doe', 'Sydney', '/library/avatars/avatar2.png', 'Nunc semper orci nisl, vel sagittis nibh aliquam non. Curabitur mi justo, congue in ante a, auctor vehicula ipsum. Praesent sodales tellus vitae malesuada viverra. Integer mi eros, varius quis massa porta, imperdiet ullamcorper lacus.', '2017-10-13', 'A', 5),
(5, 'Ellie Doe', 'Perth', '', 'Suspendisse molestie imperdiet massa, porta sodales dolor elementum non. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam pretium consectetur leo, eget vulputate nibh pulvinar a. Aliquam erat volutpat.', '2017-10-12', 'A', 4),
(6, 'Untitled', NULL, NULL, NULL, NULL, 'H', 0),
(7, 'Tester', 'Auckland', '/library/general/mathew-waters-38056-unsplash.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna. Suspendisse lobortis libero non lectus dictum tristique. Nulla vestibulum dignissim placerat. Fusce commodo pellentesque ante, sit amet pretium mi volutpat sed. Phasellus tincidunt ipsum in mi sodales facilisis sed vitae mi. Curabitur mollis orci quis sem pulvinar facilisis. Fusce eleifend gravida mattis. Duis sed tempor eros. Cras bibendum tempus lorem et vulputate. In id condimentum nunc. Aenean non quam ornare, fermentum mi ac, laoreet lorem.', '2018-08-01', 'H', 10);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` int(11) NOT NULL,
  `label` varchar(100) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `icon_cls` varchar(255) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `is_external` enum('N','Y') NOT NULL DEFAULT 'Y',
  `is_active` enum('N','Y') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `label`, `url`, `title`, `icon_cls`, `rank`, `is_external`, `is_active`) VALUES
(1, 'Facebook', 'https://www.facebook.com', 'Join us on Facebook', 'fa fa-facebook', 1, 'Y', 'Y'),
(2, 'Instagram', 'http://www.instagram.com', 'Follow us on Instagram', 'fa fa-instagram', 2, 'Y', 'Y'),
(3, 'Twitter', 'http://www.twitter.com', 'Follow us on Twitter', 'fa fa-twitter', 3, 'Y', 'Y'),
(4, 'Pintrest', 'https://www.pinterest.com', 'Follow us on Pinterest\n', 'fa fa-pinterest', 4, 'Y', 'Y'),
(5, 'Youtube', 'https://www.youtube.com', 'Follow us on Youtube', 'social social-youtube', 5, 'Y', 'Y'),
(6, 'Tripadvisor', 'https://www.tripadvisor.com', 'Follow us on Tripadvisor', 'fa fa-tripadvisor', 6, 'Y', 'Y'),
(7, 'LinkedIn', 'http://www.linkedIn.com', 'Follow us on LinkedIn', 'fa fa-linkedin', 7, 'Y', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `templates_normal`
--

CREATE TABLE `templates_normal` (
  `tmpl_id` int(11) NOT NULL COMMENT 'Primary key for template',
  `tmpl_name` varchar(100) NOT NULL COMMENT 'Template name',
  `tmpl_path` varchar(100) NOT NULL COMMENT 'Template URL (i.e. ''default'', ''shop'', ''googlemap'' etc). It is recommended that you leave the extension up to the application/code.',
  `tmpl_showincms` enum('N','Y') NOT NULL DEFAULT 'Y',
  `cms_preview_thumb_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `templates_normal`
--

INSERT INTO `templates_normal` (`tmpl_id`, `tmpl_name`, `tmpl_path`, `tmpl_showincms`, `cms_preview_thumb_path`) VALUES
(1, 'Home', 'index.tmpl', 'N', NULL),
(2, 'Default', 'default.tmpl', 'Y', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodation`
--
ALTER TABLE `accommodation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accommodation_features`
--
ALTER TABLE `accommodation_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_blog_category_page_meta_data1_idx` (`page_meta_data_id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_blog_post_page_meta_data1_idx` (`page_meta_data_id`);

--
-- Indexes for table `blog_post_has_category`
--
ALTER TABLE `blog_post_has_category`
  ADD PRIMARY KEY (`post_id`,`category_id`),
  ADD KEY `fk_blog_post_has_blog_category_blog_category1_idx` (`category_id`),
  ADD KEY `fk_blog_post_has_blog_category_blog_post1_idx` (`post_id`);

--
-- Indexes for table `cms_accessgroups`
--
ALTER TABLE `cms_accessgroups`
  ADD PRIMARY KEY (`access_id`);

--
-- Indexes for table `cms_blacklist_user`
--
ALTER TABLE `cms_blacklist_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_login_attempt`
--
ALTER TABLE `cms_login_attempt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`cmsset_id`);

--
-- Indexes for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_cms_users_access_idx_idx` (`access_id`);

--
-- Indexes for table `content_row`
--
ALTER TABLE `content_row`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_importantpages`
--
ALTER TABLE `general_importantpages`
  ADD PRIMARY KEY (`imppage_id`),
  ADD KEY `fk_general_importantpages_general_page1_idx` (`page_id`);

--
-- Indexes for table `general_pages`
--
ALTER TABLE `general_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id_idx` (`parent_id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`mod_id`);

--
-- Indexes for table `module_pages`
--
ALTER TABLE `module_pages`
  ADD PRIMARY KEY (`modpages_id`,`mod_id`,`page_id`),
  ADD KEY `fk_module_pages_modules1_idx` (`mod_id`),
  ADD KEY `fk_module_pages_general_page1_idx` (`page_id`);

--
-- Indexes for table `module_templates`
--
ALTER TABLE `module_templates`
  ADD PRIMARY KEY (`tmplmod_id`),
  ADD KEY `fk_module_templates_tmpl_id_idx` (`tmpl_id`),
  ADD KEY `fk_module_templates_mod_idx` (`mod_id`);

--
-- Indexes for table `page_meta_data`
--
ALTER TABLE `page_meta_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bsh_query_1` (`status`,`menu_label`,`heading`,`title`,`sub_heading`);

--
-- Indexes for table `page_meta_index`
--
ALTER TABLE `page_meta_index`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `is_group` (`photo_group_id`);

--
-- Indexes for table `photo_group`
--
ALTER TABLE `photo_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redirect`
--
ALTER TABLE `redirect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates_normal`
--
ALTER TABLE `templates_normal`
  ADD PRIMARY KEY (`tmpl_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodation`
--
ALTER TABLE `accommodation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `accommodation_features`
--
ALTER TABLE `accommodation_features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cms_accessgroups`
--
ALTER TABLE `cms_accessgroups`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cms_blacklist_user`
--
ALTER TABLE `cms_blacklist_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cms_login_attempt`
--
ALTER TABLE `cms_login_attempt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `cmsset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for user', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `content_row`
--
ALTER TABLE `content_row`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;
--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `general_importantpages`
--
ALTER TABLE `general_importantpages`
  MODIFY `imppage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `general_pages`
--
ALTER TABLE `general_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for pages', AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for include', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `module_pages`
--
ALTER TABLE `module_pages`
  MODIFY `modpages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `module_templates`
--
ALTER TABLE `module_templates`
  MODIFY `tmplmod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `page_meta_data`
--
ALTER TABLE `page_meta_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `page_meta_index`
--
ALTER TABLE `page_meta_index`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `photo_group`
--
ALTER TABLE `photo_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for the slideshow/gallery group', AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `redirect`
--
ALTER TABLE `redirect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `templates_normal`
--
ALTER TABLE `templates_normal`
  MODIFY `tmpl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for template', AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD CONSTRAINT `fk_blog_category_page_meta_data1` FOREIGN KEY (`page_meta_data_id`) REFERENCES `page_meta_data` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `fk_blog_post_page_meta_data1` FOREIGN KEY (`page_meta_data_id`) REFERENCES `page_meta_data` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `blog_post_has_category`
--
ALTER TABLE `blog_post_has_category`
  ADD CONSTRAINT `fk_blog_post_has_blog_category_blog_category1` FOREIGN KEY (`category_id`) REFERENCES `blog_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_blog_post_has_blog_category_blog_post1` FOREIGN KEY (`post_id`) REFERENCES `blog_post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cms_users`
--
ALTER TABLE `cms_users`
  ADD CONSTRAINT `fk_cms_users_access_idx` FOREIGN KEY (`access_id`) REFERENCES `cms_accessgroups` (`access_id`);

--
-- Constraints for table `general_importantpages`
--
ALTER TABLE `general_importantpages`
  ADD CONSTRAINT `fk_general_importantpages_general_page1` FOREIGN KEY (`page_id`) REFERENCES `general_pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `general_pages`
--
ALTER TABLE `general_pages`
  ADD CONSTRAINT `parent_id` FOREIGN KEY (`parent_id`) REFERENCES `general_pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `module_pages`
--
ALTER TABLE `module_pages`
  ADD CONSTRAINT `fk_module_pages_general_page1` FOREIGN KEY (`page_id`) REFERENCES `general_pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_module_pages_modules1` FOREIGN KEY (`mod_id`) REFERENCES `modules` (`mod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `module_templates`
--
ALTER TABLE `module_templates`
  ADD CONSTRAINT `fk_module_templates_mod_idx` FOREIGN KEY (`mod_id`) REFERENCES `modules` (`mod_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_module_templates_tmpl_idx` FOREIGN KEY (`tmpl_id`) REFERENCES `templates_normal` (`tmpl_id`);

--
-- Constraints for table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `fk_photo_photo_group_idx` FOREIGN KEY (`photo_group_id`) REFERENCES `photo_group` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
