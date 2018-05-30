-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: thaueastlhs01-dev.hosting.xuridisa.com    Database: cabotlodge_db
-- ------------------------------------------------------
-- Server version	5.6.33-0ubuntu0.14.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accommodation`
--

DROP TABLE IF EXISTS `accommodation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accommodation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) DEFAULT NULL,
  `beds` int(11) DEFAULT NULL,
  `guests` int(11) DEFAULT NULL,
  `bathrooms` int(11) DEFAULT NULL,
  `floorplan_pdf` varchar(255) DEFAULT NULL,
  `booking_id` varchar(255) DEFAULT NULL,
  `features` mediumtext,
  `page_meta_data_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accommodation`
--

LOCK TABLES `accommodation` WRITE;
/*!40000 ALTER TABLE `accommodation` DISABLE KEYS */;
INSERT INTO `accommodation` VALUES (1,750.00,1,2,1,'/library/pdf/test-pdf.pdf','qwd1','&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;table border=&quot;0&quot; cellpadding=&quot;0&quot; cellspacing=&quot;1&quot; style=&quot;width:100%;&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Dolor Amet&amp;nbsp;entra&lt;/li&gt;\r\n				&lt;li&gt;Lorem&amp;nbsp;Ipsum&lt;/li&gt;\r\n				&lt;li&gt;Sentra esco&amp;nbsp;etreri&lt;/li&gt;\r\n				&lt;li&gt;Lezim granole&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Dolor Amet&amp;nbsp;entra&lt;/li&gt;\r\n				&lt;li&gt;Lorem&amp;nbsp;Ipsum&lt;/li&gt;\r\n				&lt;li&gt;Sentra esco&amp;nbsp;etreri&lt;/li&gt;\r\n				&lt;li&gt;Lezim granole&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n\r\n			&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Dolor Amet&amp;nbsp;entra&lt;/li&gt;\r\n				&lt;li&gt;Lorem&amp;nbsp;Ipsum&lt;/li&gt;\r\n				&lt;li&gt;Sentra esco&amp;nbsp;etreri&lt;/li&gt;\r\n				&lt;li&gt;Lezim granole&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;',25),(2,670.00,2,4,1,'/library/pdf/test-pdf.pdf','R10832','&lt;table border=&quot;0&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width:100%;&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Barbeque Lunch&lt;/li&gt;\r\n				&lt;li&gt;Buffet Breakfast&lt;/li&gt;\r\n				&lt;li&gt;Buffet Dinner&lt;/li&gt;\r\n				&lt;li&gt;All Linen and bedding&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Wifi upto&amp;nbsp;10GB a day&lt;/li&gt;\r\n				&lt;li&gt;Heating in rooms&lt;/li&gt;\r\n				&lt;li&gt;Laundry and ironing&lt;/li&gt;\r\n				&lt;li&gt;On board entertainment&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Dolor Amet&amp;nbsp;entra&lt;/li&gt;\r\n				&lt;li&gt;Lorem&amp;nbsp;Ipsum&lt;/li&gt;\r\n				&lt;li&gt;Sentra esco&amp;nbsp;etreri&lt;/li&gt;\r\n				&lt;li&gt;Lezim granole&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;',26),(3,625.00,2,4,1,'/library/pdf/test-pdf.pdf','R10834','&lt;table border=&quot;0&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width:100%;&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Barbeque Lunch&lt;/li&gt;\r\n				&lt;li&gt;Buffet Breakfast&lt;/li&gt;\r\n				&lt;li&gt;Buffet Dinner&lt;/li&gt;\r\n				&lt;li&gt;All Linen and bedding&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Wifi upto&amp;nbsp;10GB a day&lt;/li&gt;\r\n				&lt;li&gt;Heating in rooms&lt;/li&gt;\r\n				&lt;li&gt;Laundry and ironing&lt;/li&gt;\r\n				&lt;li&gt;On board entertainment&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Dolor Amet&amp;nbsp;entra&lt;/li&gt;\r\n				&lt;li&gt;Lorem&amp;nbsp;Ipsum&lt;/li&gt;\r\n				&lt;li&gt;Sentra esco&amp;nbsp;etreri&lt;/li&gt;\r\n				&lt;li&gt;Lezim granole&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;',27),(4,3000.00,5,10,5,'/library/pdf/test-pdf.pdf','R10944','&lt;table border=&quot;0&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width:100%;&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Barbeque Lunch&lt;/li&gt;\r\n				&lt;li&gt;Buffet Breakfast&lt;/li&gt;\r\n				&lt;li&gt;Buffet Dinner&lt;/li&gt;\r\n				&lt;li&gt;All Linen and bedding&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Wifi upto&amp;nbsp;10GB a day&lt;/li&gt;\r\n				&lt;li&gt;Heating in rooms&lt;/li&gt;\r\n				&lt;li&gt;Laundry and ironing&lt;/li&gt;\r\n				&lt;li&gt;On board entertainment&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Dolor Amet&amp;nbsp;entra&lt;/li&gt;\r\n				&lt;li&gt;Lorem&amp;nbsp;Ipsum&lt;/li&gt;\r\n				&lt;li&gt;Sentra esco&amp;nbsp;etreri&lt;/li&gt;\r\n				&lt;li&gt;Lezim granole&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;',28),(5,1000.00,10,10,5,'/library/pdf/test-pdf.pdf','R37','&lt;ul&gt;\r\n	&lt;li&gt;Test&lt;/li&gt;\r\n	&lt;li&gt;Test&lt;/li&gt;\r\n	&lt;li&gt;Test&lt;/li&gt;\r\n	&lt;li&gt;Test&lt;/li&gt;\r\n	&lt;li&gt;Test&lt;/li&gt;\r\n&lt;/ul&gt;',40),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,41),(7,670.00,2,4,1,'/library/pdf/test-pdf.pdf','R10833','&lt;table border=&quot;0&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width:100%;&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Barbeque Lunch&lt;/li&gt;\r\n				&lt;li&gt;Buffet Breakfast&lt;/li&gt;\r\n				&lt;li&gt;Buffet Dinner&lt;/li&gt;\r\n				&lt;li&gt;All Linen and bedding&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Wifi upto&amp;nbsp;10GB a day&lt;/li&gt;\r\n				&lt;li&gt;Heating in rooms&lt;/li&gt;\r\n				&lt;li&gt;Laundry and ironing&lt;/li&gt;\r\n				&lt;li&gt;On board entertainment&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n			&lt;td&gt;\r\n			&lt;ul&gt;\r\n				&lt;li&gt;Dolor Amet&amp;nbsp;entra&lt;/li&gt;\r\n				&lt;li&gt;Lorem&amp;nbsp;Ipsum&lt;/li&gt;\r\n				&lt;li&gt;Sentra esco&amp;nbsp;etreri&lt;/li&gt;\r\n				&lt;li&gt;Lezim granole&lt;/li&gt;\r\n			&lt;/ul&gt;\r\n			&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;',44);
/*!40000 ALTER TABLE `accommodation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_category`
--

DROP TABLE IF EXISTS `blog_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_meta_data_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_blog_category_page_meta_data1_idx` (`page_meta_data_id`),
  CONSTRAINT `fk_blog_category_page_meta_data1` FOREIGN KEY (`page_meta_data_id`) REFERENCES `page_meta_data` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_category`
--

LOCK TABLES `blog_category` WRITE;
/*!40000 ALTER TABLE `blog_category` DISABLE KEYS */;
INSERT INTO `blog_category` VALUES (1,12),(2,13),(3,14),(4,15),(5,22),(6,38);
/*!40000 ALTER TABLE `blog_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_post`
--

DROP TABLE IF EXISTS `blog_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_posted` datetime DEFAULT NULL,
  `page_meta_data_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_blog_post_page_meta_data1_idx` (`page_meta_data_id`),
  CONSTRAINT `fk_blog_post_page_meta_data1` FOREIGN KEY (`page_meta_data_id`) REFERENCES `page_meta_data` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_post`
--

LOCK TABLES `blog_post` WRITE;
/*!40000 ALTER TABLE `blog_post` DISABLE KEYS */;
INSERT INTO `blog_post` VALUES (1,'2018-04-19 00:00:00',16),(2,'2017-04-13 00:00:00',17),(3,'2018-03-16 00:00:00',18),(4,'2018-04-21 00:00:00',19),(5,'2018-04-22 00:00:00',20),(6,'2018-06-01 00:00:00',23),(7,'2018-08-02 00:00:00',39);
/*!40000 ALTER TABLE `blog_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blog_post_has_category`
--

DROP TABLE IF EXISTS `blog_post_has_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_post_has_category` (
  `post_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`post_id`,`category_id`),
  KEY `fk_blog_post_has_blog_category_blog_category1_idx` (`category_id`),
  KEY `fk_blog_post_has_blog_category_blog_post1_idx` (`post_id`),
  CONSTRAINT `fk_blog_post_has_blog_category_blog_category1` FOREIGN KEY (`category_id`) REFERENCES `blog_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_blog_post_has_blog_category_blog_post1` FOREIGN KEY (`post_id`) REFERENCES `blog_post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_post_has_category`
--

LOCK TABLES `blog_post_has_category` WRITE;
/*!40000 ALTER TABLE `blog_post_has_category` DISABLE KEYS */;
INSERT INTO `blog_post_has_category` VALUES (1,1),(2,1),(4,1),(7,1),(4,2),(1,3),(1,4),(2,4),(6,5),(7,5),(7,6);
/*!40000 ALTER TABLE `blog_post_has_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_accessgroups`
--

DROP TABLE IF EXISTS `cms_accessgroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_accessgroups` (
  `access_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_name` varchar(100) NOT NULL,
  `access_users` char(1) NOT NULL DEFAULT 'N',
  `access_userpasswords` char(1) NOT NULL DEFAULT 'N',
  `access_useraccesslevel` char(1) NOT NULL DEFAULT 'N',
  `access_accessgroups` char(1) NOT NULL DEFAULT 'N',
  `access_cmssettings` char(1) NOT NULL DEFAULT 'N',
  `access_settings` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_accessgroups`
--

LOCK TABLES `cms_accessgroups` WRITE;
/*!40000 ALTER TABLE `cms_accessgroups` DISABLE KEYS */;
INSERT INTO `cms_accessgroups` VALUES (1,'Super Administrator','Y','Y','Y','Y','Y','Y'),(2,'General Editor','Y','Y','Y','Y','Y','Y');
/*!40000 ALTER TABLE `cms_accessgroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_blacklist_user`
--

DROP TABLE IF EXISTS `cms_blacklist_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_blacklist_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `ip_address` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_blacklist_user`
--

LOCK TABLES `cms_blacklist_user` WRITE;
/*!40000 ALTER TABLE `cms_blacklist_user` DISABLE KEYS */;
INSERT INTO `cms_blacklist_user` VALUES (1,'2018-05-18 03:53:37',3,'2018-05-20 23:32:01',0,NULL,'devtomahawk_user','2018-05-20 23:32:01',0,3,0,'114.23.241.67');
/*!40000 ALTER TABLE `cms_blacklist_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_login_attempt`
--

DROP TABLE IF EXISTS `cms_login_attempt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_login_attempt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` tinyblob NOT NULL,
  `access_key` tinyblob,
  `is_successful` enum('N','Y') NOT NULL DEFAULT 'N',
  `ip_address` varchar(255) NOT NULL,
  `record_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_login_attempt`
--

LOCK TABLES `cms_login_attempt` WRITE;
/*!40000 ALTER TABLE `cms_login_attempt` DISABLE KEYS */;
INSERT INTO `cms_login_attempt` VALUES (1,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','Û1≥˚>≠ë˝NÚ\‰N','N','127.0.0.1','2017-10-16 03:39:00'),(2,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','Û1≥˚>≠ë˝NÚ\‰N','N','127.0.0.1','2017-10-16 03:39:07'),(3,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2017-10-16 03:39:14'),(4,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2017-10-16 03:50:22'),(5,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','Û1≥˚>≠ë˝NÚ\‰N','N','127.0.0.1','2018-03-19 00:01:48'),(6,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-03-19 00:01:57'),(7,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-03-20 22:55:39'),(8,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-10 03:07:26'),(9,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-10 05:41:45'),(10,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-10 05:43:38'),(11,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-10 05:44:17'),(12,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-10 05:44:27'),(13,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-10 05:45:25'),(14,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-10 05:45:50'),(15,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-10 05:45:52'),(16,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-11 00:35:25'),(17,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-11 01:07:24'),(18,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-11 04:39:02'),(19,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','[\Ísı˚!#°¿éîÒYëm','N','127.0.0.1','2018-04-11 05:11:26'),(20,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','[\Ísı˚!#°¿éîÒYëm','N','127.0.0.1','2018-04-11 05:11:50'),(21,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','[\Ísı˚!#°¿éîÒYëm','N','127.0.0.1','2018-04-11 05:11:51'),(22,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','Û1≥˚>≠ë˝NÚ\‰N','N','127.0.0.1','2018-04-13 00:33:48'),(23,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-13 00:33:59'),(24,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-15 22:05:00'),(25,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-16 21:45:35'),(26,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','N\"\…AˇTÄ/oß\ƒB1\◊','N','127.0.0.1','2018-04-17 21:53:02'),(27,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','Û1≥˚>≠ë˝NÚ\‰N','N','127.0.0.1','2018-04-17 21:53:11'),(28,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','Û1≥˚>≠ë˝NÚ\‰N','N','127.0.0.1','2018-04-17 21:53:31'),(29,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','Û1≥˚>≠ë˝NÚ\‰N','N','127.0.0.1','2018-04-17 21:53:38'),(30,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-17 21:54:02'),(31,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-18 01:16:54'),(32,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-18 01:44:15'),(33,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-18 01:46:35'),(34,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-18 01:46:45'),(35,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-19 01:32:57'),(36,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-19 02:17:27'),(37,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-19 21:43:07'),(38,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-23 01:19:19'),(39,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-24 00:08:25'),(40,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-25 22:04:16'),(41,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-26 22:46:41'),(42,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','Û1≥˚>≠ë˝NÚ\‰N','N','127.0.0.1','2018-04-29 23:20:48'),(43,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-04-29 23:20:56'),(44,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-04-30 03:49:46'),(45,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-04-30 03:54:46'),(46,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-04-30 21:13:28'),(47,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-04-30 22:50:35'),(48,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-05-01 01:26:26'),(49,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-05-01 03:40:59'),(50,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-05-01 21:18:11'),(51,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-05-02 23:29:04'),(52,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-05-15 00:28:24'),(53,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-05-17 10:31:56'),(54,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','127.0.0.1','2018-05-17 22:58:54'),(55,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-05-18 02:59:05'),(56,'‘∂\È\ÿ˙2Dh\–6\Z¡uX´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Û1≥˚>≠ë˝NÚ\‰N','N','114.23.241.67','2018-05-18 03:53:37'),(57,'‘∂\È\ÿ˙2Dh\–6\Z¡uX´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Û1≥˚>≠ë˝NÚ\‰N','N','114.23.241.67','2018-05-18 03:53:41'),(58,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-05-18 03:53:45'),(59,'‘∂\È\ÿ˙2Dh\–6\Z¡uX´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Û1≥˚>≠ë˝NÚ\‰N','N','114.23.241.67','2018-05-20 23:32:01'),(60,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-05-20 23:32:04'),(61,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-05-21 03:32:16'),(62,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-05-22 03:32:07'),(63,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','103.43.207.11','2018-05-23 23:00:24'),(64,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','103.43.207.11','2018-05-24 02:09:00'),(65,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-05-25 00:45:55'),(66,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-05-25 01:48:37'),(67,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','Û1≥˚>≠ë˝NÚ\‰N','N','125.238.249.53','2018-05-25 10:03:35'),(68,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','125.238.249.53','2018-05-25 10:03:40'),(69,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','103.43.207.11','2018-05-28 01:11:19'),(70,']\ŸF\÷@)\÷.\’	?ì\Ô\Õ¯∏\Ã~Ω®Dûnûì˘M≤5k','´)˚\Ó\ \Ì~\\ºÖu:ù\ ','Y','114.23.241.67','2018-05-28 02:41:07');
/*!40000 ALTER TABLE `cms_login_attempt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_settings`
--

DROP TABLE IF EXISTS `cms_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_settings` (
  `cmsset_id` int(11) NOT NULL AUTO_INCREMENT,
  `cmsset_name` varchar(100) NOT NULL,
  `cmsset_label` varchar(50) NOT NULL,
  `cmsset_explanation` varchar(255) NOT NULL,
  `cmsset_status` char(1) NOT NULL DEFAULT 'I',
  `cmsset_value` varchar(255) NOT NULL,
  PRIMARY KEY (`cmsset_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_settings`
--

LOCK TABLES `cms_settings` WRITE;
/*!40000 ALTER TABLE `cms_settings` DISABLE KEYS */;
INSERT INTO `cms_settings` VALUES (2,'pages_generations','Page Generation Limit','The number of levels of children pages that are allowed to be made.','A','2'),(10,'pages_maximum','Page Limit','','I','12');
/*!40000 ALTER TABLE `cms_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_users`
--

DROP TABLE IF EXISTS `cms_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for user',
  `user_fname` varchar(45) NOT NULL COMMENT 'User''s firstname',
  `user_lname` varchar(45) DEFAULT NULL COMMENT 'User''s lastname',
  `user_pass` varchar(255) DEFAULT NULL COMMENT 'User''s password (recommended as being sha256)',
  `user_email` varchar(100) DEFAULT NULL COMMENT 'User''s email address',
  `last_login_date` datetime DEFAULT NULL,
  `access_id` int(11) DEFAULT '1' COMMENT 'User''s rights - whether they are admin, banned, general user etc. This is totally customisable and is up to the programmer.',
  PRIMARY KEY (`user_id`),
  KEY `fk_cms_users_access_idx_idx` (`access_id`),
  CONSTRAINT `fk_cms_users_access_idx` FOREIGN KEY (`access_id`) REFERENCES `cms_accessgroups` (`access_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_users`
--

LOCK TABLES `cms_users` WRITE;
/*!40000 ALTER TABLE `cms_users` DISABLE KEYS */;
INSERT INTO `cms_users` VALUES (1,'Tomahawk','Support','9bc129f7a46381be15f1329c4479e02c70d10d19','support@tomahawk.co.nz','2018-05-28 02:41:07',1);
/*!40000 ALTER TABLE `cms_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_column`
--

DROP TABLE IF EXISTS `content_column`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content_column` (
  `content` mediumtext NOT NULL,
  `css_class` varchar(255) NOT NULL,
  `span` int(11) DEFAULT NULL,
  `rank` int(11) NOT NULL,
  `content_row_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_column`
--

LOCK TABLES `content_column` WRITE;
/*!40000 ALTER TABLE `content_column` DISABLE KEYS */;
INSERT INTO `content_column` VALUES ('<p>Column 1</p>','col-xs-12',NULL,1,100),('<p>Column 1</p>','col-xs-12 col-sm-6 col-md-6',NULL,1,101),('<p>Column 2</p>','col-xs-12 col-sm-6 col-md-6',NULL,2,101),('<p>Column 1</p>','col-xs-12 col-sm-6 col-md-4',NULL,1,102),('<p>Column 2</p>','col-xs-12 col-sm-6 col-md-4',NULL,2,102),('<p>Column 3</p>','col-xs-12 col-sm-6 col-md-4',NULL,3,102),('','col-xs-12 col-sm-6 col-md-3',NULL,1,103),('<p><a href=\"/contact\">Contact</a></p>','col-xs-12 col-sm-6 col-md-3',NULL,2,103),('<p>Column 3</p>','col-xs-12 col-sm-6 col-md-3',NULL,3,103),('<p>Column 4</p>','col-xs-12 col-sm-6 col-md-3',NULL,4,103),('<p>Column 1</p>','col-xs-12',NULL,1,219),('<p>Column 1</p>','col-xs-12 col-sm-6 col-md-6',NULL,1,220),('<p>Column 2</p>','col-xs-12 col-sm-6 col-md-6',NULL,2,220),('<p><img alt=\"\" src=\"/library/testing/01-testing-image.jpg\" /></p>','col-xs-12 col-sm-6 col-md-4',NULL,1,221),('<p><a href=\"https://newbasecms.netzone.nz/contact-us\">Contact</a></p>','col-xs-12 col-sm-6 col-md-4',NULL,2,221),('<p>Column 3</p>','col-xs-12 col-sm-6 col-md-4',NULL,3,221),('<p>Column 1</p>','col-xs-12 col-sm-6 col-md-4',NULL,1,325),('<p>Column 2</p>','col-xs-12 col-sm-6 col-md-4',NULL,2,325),('<p>Column 3</p>','col-xs-12 col-sm-6 col-md-4',NULL,3,325),('<p>Column 1</p>','col-xs-12 col-sm-6 col-md-6',NULL,1,326),('<p>Column 2</p>','col-xs-12 col-sm-6 col-md-6',NULL,2,326),('<p>Column 1</p>','col-xs-12 col-sm-6 col-md-3',NULL,1,327),('<p>Column 2</p>','col-xs-12 col-sm-6 col-md-3',NULL,2,327),('<p>Column 3</p>','col-xs-12 col-sm-6 col-md-3',NULL,3,327),('<p>Column 4</p>','col-xs-12 col-sm-6 col-md-3',NULL,4,327),('<p>Column 1</p>','col-xs-12',NULL,1,328),('<p><img alt=\"\" src=\"/library/heroshots/manapouri-6588ret2.jpg\" /></p>','col-xs-12 col-sm-6 col-md-3',NULL,1,345),('<p>Column 2</p>','col-xs-12 col-sm-6 col-md-3',NULL,2,345),('<p>Column 3</p>','col-xs-12 col-sm-6 col-md-3',NULL,3,345),('<p>Column 4</p>','col-xs-12 col-sm-6 col-md-3',NULL,4,345),('<p>Column 1</p>','col-xs-12 col-sm-6 col-md-6',NULL,1,346),('<p>Column 2</p>','col-xs-12 col-sm-6 col-md-6',NULL,2,346),('<p>Column 1</p>','col-xs-12 col-sm-6 col-md-4',NULL,1,347),('<p>Column 2</p>','col-xs-12 col-sm-6 col-md-4',NULL,2,347),('<p>Column 3</p>','col-xs-12 col-sm-6 col-md-4',NULL,3,347),('<p>Column 1</p>','col-xs-12',NULL,1,348),('<p>Column 1</p>','col-xs-12',NULL,1,373),('<p>Column 1</p>','col-xs-12 col-sm-6 col-md-6',NULL,1,374),('<p>Column 2</p>','col-xs-12 col-sm-6 col-md-6',NULL,2,374),('<p>Column 1</p>','col-xs-12 col-sm-6 col-md-4',NULL,1,375),('<p>Column 2</p>','col-xs-12 col-sm-6 col-md-4',NULL,2,375),('<p>Column 3</p>','col-xs-12 col-sm-6 col-md-4',NULL,3,375),('<p><img alt=\"\" src=\"/library/heroshots/manapouri-6588ret2.jpg\" /></p>','col-xs-12 col-sm-6 col-md-3',NULL,1,376),('<p>Column 2</p>','col-xs-12 col-sm-6 col-md-3',NULL,2,376),('<p>Column 3</p>','col-xs-12 col-sm-6 col-md-3',NULL,3,376),('<p>Column 4</p>','col-xs-12 col-sm-6 col-md-3',NULL,4,376),('<p style=\"text-align: center;\">Youngest daughter Breidi, having worked for the New Zealand government, and her husband Brad, who worked in various roles in the private sector, came home to the family farm in 2018 to continue the family legacy. Both Breidi and Brad are passionate about farming, family and sharing this special part of the world.</p>','col-xs-12',NULL,1,392),('<p>&nbsp;Each room of the Lodge, crowned by elegant copper roofs, is separated by paved walkways enclosing a charming courtyard with outdoor fireplace for al fresco dining.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><a class=\"btn btn--full-brown-ghost text-uppercase\" href=\"/bookings\">Book Now </a></p>','col-xs-12',NULL,1,399),('<p>The Deluxe Suite has one bedroom on the upstairs level and downstairs, an excellently appointed full kitchen, large dining area and a room with..</p>','col-xs-12',NULL,1,404),('<p style=\"text-align: center;\">The Deluxe Suite has one bedroom on the upstairs level and downstairs, an excellently appointed full kitchen, large dining area and a room with</p>','col-xs-12',NULL,1,405),('<p style=\"text-align: center;\">Open, airy and filled with light, this premier suite enjoys a stunning view over the lake through it&#39;s double height windows. With a stone exterior and blond wood interior</p>','col-xs-12',NULL,1,406),('<p style=\"text-align: center;\">Open, airy and filled with light, this premier suite enjoys a stunning view over the lake through it&#39;s double height windows. With a stone exterior and blond wood interior</p>','col-xs-12',NULL,1,408),('<p style=\"text-align: center;\">The Premier Suite offers a super king split bed, comfortable living area and office space, double wardrobe, full kitchen, and an ensuite with bath and shower. The suite is framed by large windows overlooking the lake and surrounding mountains.</p>','col-xs-12',NULL,1,419),('<p><a class=\"btn btn--brown-ghost text-uppercase\" href=\"/bookings\">Book Now </a></p>','col-xs-12',NULL,1,421);
/*!40000 ALTER TABLE `content_column` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_row`
--

DROP TABLE IF EXISTS `content_row`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content_row` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rank` int(11) NOT NULL,
  `page_meta_data_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=422 DEFAULT CHARSET=latin2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_row`
--

LOCK TABLES `content_row` WRITE;
/*!40000 ALTER TABLE `content_row` DISABLE KEYS */;
INSERT INTO `content_row` VALUES (100,1,21),(101,2,21),(102,3,21),(103,4,21),(219,1,24),(220,2,24),(221,3,24),(325,1,41),(326,2,41),(327,3,41),(328,4,41),(345,1,40),(346,2,40),(347,3,40),(348,4,40),(373,1,42),(374,2,42),(375,3,42),(376,4,42),(392,2,2),(399,1,5),(404,1,26),(405,1,44),(406,1,27),(408,1,28),(419,1,25),(421,1,1);
/*!40000 ALTER TABLE `content_row` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enquiry`
--

DROP TABLE IF EXISTS `enquiry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `contact_number` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `comments` text,
  `status` enum('A','H','D') NOT NULL DEFAULT 'H',
  `date_of_enquiry` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enquiry`
--

LOCK TABLES `enquiry` WRITE;
/*!40000 ALTER TABLE `enquiry` DISABLE KEYS */;
INSERT INTO `enquiry` VALUES (1,'Pinal','Desai','pinal.j.desai@gmail.com','0273988446','r4ew34','4343','A','2018-04-30 23:42:55','114.23.241.67'),(2,'Pinal','Desai','pinal.j.desai@gmail.com','0273988446','Test email','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dignissim convallis eros, at varius velit commodo cursus. Phasellus vitae nunc non justo euismod efficitur. Phasellus porttitor augue in est sagittis tempor vel a leo. Duis malesuada eleifend felis non suscipit. In elementum rutrum orci vel blandit. Fusce nec urna tincidunt, iaculis tellus in, mollis lectus. Sed nisl odio, accumsan a aliquet id, viverra id quam. Morbi ullamcorper auctor lacus, at feugiat enim bibendum vel. Nullam elit lacus, posuere id est at, volutpat semper ex. Praesent sit amet sagittis purus. Donec quis ornare orci. Aenean in odio quis mauris dapibus molestie.','A','2018-05-01 00:33:58','114.23.241.67'),(3,'Pinal','Desai','pinal.j.desai@gmail.com','0273988446','TEST contact email','Vestibulum molestie feugiat imperdiet. Praesent tristique neque id fringilla feugiat. Nullam neque ante, aliquam eu libero eu, mollis congue est. Donec ac dui vel ex tempor suscipit. Cras porta elit sed enim auctor ultrices. Cras mattis egestas mauris sit amet eleifend. Vestibulum vitae sodales ante, et lobortis quam. Sed ultricies ante risus, lacinia venenatis odio facilisis vel. Donec dolor nulla, sollicitudin pharetra risus a, ultricies viverra urna. Cras at libero feugiat, tempor massa non, tincidunt ex. Cras vestibulum suscipit dui, in suscipit urna ultrices non. Duis laoreet ac ipsum vitae condimentum.','A','2018-05-01 00:56:23','114.23.241.67'),(4,'Chrome','Test','alan@tomahawk.co.nz','1234','Test Subject','Tomahawk testing.','D','2018-05-01 03:43:02','114.23.241.67'),(5,'Jed','Diaz','jed@test.com','1231321','qdwqdwqdqw','dqwefewfewfewf','A','2018-05-16 04:49:19','127.0.0.1'),(6,'Chrome','Test','alan@tomahawk.co.nz','1234','Test Subject','Tomahawk testing. Please ignore.','D','2018-05-21 04:03:30','114.23.241.67'),(7,'Firefox','Test','alan@tomahawk.co.nz','1234','Test Subject','Tomahawk testing. Please ignore.','D','2018-05-22 00:47:01','114.23.241.67'),(8,'Edge','Test','alan@tomahawk.co.nz','1234','Test Subject','Tomahawk testing. Please ignore.','D','2018-05-22 01:25:02','114.23.241.67'),(9,'IE','Test','alan@tomahawk.co.nz','1234','Test Subject','Tomahawk testing. Please ignore.','D','2018-05-22 01:27:10','114.23.241.67'),(10,'Android','Test','alan@tomahawk.co.nz','1234','Test','Test. please ignore','D','2018-05-22 01:40:20','114.23.241.67'),(11,'Safari','Test','alan@tomahawk.co.nz','1234','Testing subject','Tomahawk testing. Please ignore','D','2018-05-22 02:01:05','114.23.241.67'),(12,'Ipad','Test','alan@tomahawk.co.nz','1234','Test subject','Testing','D','2018-05-22 02:13:24','114.23.241.67');
/*!40000 ALTER TABLE `enquiry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general_importantpages`
--

DROP TABLE IF EXISTS `general_importantpages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_importantpages` (
  `imppage_id` int(11) NOT NULL AUTO_INCREMENT,
  `imppage_name` varchar(150) NOT NULL,
  `imppage_showincms` enum('N','Y') NOT NULL DEFAULT 'Y',
  `page_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`imppage_id`),
  KEY `fk_general_importantpages_general_page1_idx` (`page_id`),
  CONSTRAINT `fk_general_importantpages_general_page1` FOREIGN KEY (`page_id`) REFERENCES `general_pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_importantpages`
--

LOCK TABLES `general_importantpages` WRITE;
/*!40000 ALTER TABLE `general_importantpages` DISABLE KEYS */;
INSERT INTO `general_importantpages` VALUES (1,'Home','N',1),(2,'404','Y',4),(3,'Contact','Y',3),(4,'Gallery','Y',9),(5,'Reviews','Y',8),(6,'Blog','Y',7),(7,'Accommodation','Y',5),(8,'Experience','Y',14),(9,'Bookings','Y',21),(10,'History','Y',22);
/*!40000 ALTER TABLE `general_importantpages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general_pages`
--

DROP TABLE IF EXISTS `general_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for pages',
  `access_level` enum('P','L') NOT NULL DEFAULT 'P' COMMENT 'P = Public, L = Private',
  `meta_cache` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` int(11) DEFAULT NULL,
  `page_meta_data_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id_idx` (`parent_id`),
  CONSTRAINT `parent_id` FOREIGN KEY (`parent_id`) REFERENCES `general_pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_pages`
--

LOCK TABLES `general_pages` WRITE;
/*!40000 ALTER TABLE `general_pages` DISABLE KEYS */;
INSERT INTO `general_pages` VALUES (1,'P',1,NULL,1),(2,'P',1,NULL,2),(3,'P',1,NULL,3),(4,'P',1,NULL,4),(5,'P',1,NULL,5),(6,'P',1,2,6),(7,'P',1,2,7),(8,'P',1,2,8),(9,'P',1,2,9),(10,'P',1,NULL,10),(11,'P',1,NULL,11),(12,'P',1,NULL,21),(13,'P',1,NULL,24),(14,'P',1,NULL,29),(15,'P',1,14,30),(16,'P',1,14,31),(17,'P',1,14,32),(18,'P',1,14,33),(19,'P',1,14,34),(20,'P',1,14,35),(21,'P',1,NULL,36),(22,'P',1,2,37),(23,'P',1,NULL,42),(24,'P',1,NULL,43);
/*!40000 ALTER TABLE `general_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general_settings`
--

DROP TABLE IF EXISTS `general_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `set_sitemapstatus` char(1) DEFAULT NULL,
  `booking_id` varchar(255) DEFAULT NULL,
  `homepage_hero_caption` varchar(255) DEFAULT NULL,
  `homepage_content_photo_path` varchar(255) DEFAULT NULL,
  `homepage_stay_photo_path` varchar(255) DEFAULT NULL,
  `homepage_polaroid_photo_path` varchar(255) DEFAULT NULL,
  `homepage_polaroid_text` varchar(255) DEFAULT NULL,
  `reviews_photo_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_settings`
--

LOCK TABLES `general_settings` WRITE;
/*!40000 ALTER TABLE `general_settings` DISABLE KEYS */;
INSERT INTO `general_settings` VALUES (1,'Cabot Lodge',2017,'enquiry@cabotlodge.co.nz','+64 27 601 8885','268 Hillside-Manapouri Road\r\nManapouri 9679','http://www.example.com',NULL,NULL,NULL,NULL,'N','6577a17dd0a66458981c0b4126a86b45-us15','3919cd1845',-45.559277,167.649963,'268 Hillside-Manapouri Rd, Manapouri 9679, New Zealand','Cabot Lodge',14,-45.559277,167.649963,'[{\"featureType\":\"administrative\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"simplified\"}]},{\"featureType\":\"landscape\",\"elementType\":\"geometry\",\"stylers\":[{\"visibility\":\"simplified\"},{\"color\":\"#fcfcfc\"}]},{\"featureType\":\"poi\",\"elementType\":\"geometry\",\"stylers\":[{\"visibility\":\"simplified\"},{\"color\":\"#fcfcfc\"}]},{\"featureType\":\"road.highway\",\"elementType\":\"geometry\",\"stylers\":[{\"visibility\":\"simplified\"},{\"color\":\"#dddddd\"}]},{\"featureType\":\"road.arterial\",\"elementType\":\"geometry\",\"stylers\":[{\"visibility\":\"simplified\"},{\"color\":\"#dddddd\"}]},{\"featureType\":\"road.local\",\"elementType\":\"geometry\",\"stylers\":[{\"visibility\":\"simplified\"},{\"color\":\"#eeeeee\"}]},{\"featureType\":\"water\",\"elementType\":\"all\",\"stylers\":[{\"visibility\":\"on\"},{\"color\":\"#acbcc9\"}]},{\"featureType\":\"water\",\"elementType\":\"geometry\",\"stylers\":[{\"saturation\":\"53\"}]},{\"featureType\":\"water\",\"elementType\":\"labels.text.fill\",\"stylers\":[{\"lightness\":\"-42\"},{\"saturation\":\"17\"}]},{\"featureType\":\"water\",\"elementType\":\"labels.text.stroke\",\"stylers\":[{\"lightness\":\"61\"}]}]',5,NULL,NULL,'128','Where the World Meets Wilderness','/library/motif/sketch-sheep.png','/library/heroshots/manapouri-6588ret2.jpg','/library/motif/polaroid.jpg','Cabot Lodge - 40 years and counting','/library/motif/deer.png');
/*!40000 ALTER TABLE `general_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module_pages`
--

DROP TABLE IF EXISTS `module_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module_pages` (
  `modpages_id` int(11) NOT NULL AUTO_INCREMENT,
  `modpages_rank` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  PRIMARY KEY (`modpages_id`,`mod_id`,`page_id`),
  KEY `fk_module_pages_modules1_idx` (`mod_id`),
  KEY `fk_module_pages_general_page1_idx` (`page_id`),
  CONSTRAINT `fk_module_pages_general_page1` FOREIGN KEY (`page_id`) REFERENCES `general_pages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_module_pages_modules1` FOREIGN KEY (`mod_id`) REFERENCES `modules` (`mod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module_pages`
--

LOCK TABLES `module_pages` WRITE;
/*!40000 ALTER TABLE `module_pages` DISABLE KEYS */;
INSERT INTO `module_pages` VALUES (22,2,10,21),(28,2,8,6),(32,2,3,3),(39,2,9,5);
/*!40000 ALTER TABLE `module_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module_templates`
--

DROP TABLE IF EXISTS `module_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module_templates` (
  `tmplmod_id` int(11) NOT NULL AUTO_INCREMENT,
  `tmplmod_rank` int(11) NOT NULL,
  `tmpl_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  PRIMARY KEY (`tmplmod_id`),
  KEY `fk_module_templates_tmpl_id_idx` (`tmpl_id`),
  KEY `fk_module_templates_mod_idx` (`mod_id`),
  CONSTRAINT `fk_module_templates_mod_idx` FOREIGN KEY (`mod_id`) REFERENCES `modules` (`mod_id`) ON UPDATE NO ACTION,
  CONSTRAINT `fk_module_templates_tmpl_idx` FOREIGN KEY (`tmpl_id`) REFERENCES `templates_normal` (`tmpl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module_templates`
--

LOCK TABLES `module_templates` WRITE;
/*!40000 ALTER TABLE `module_templates` DISABLE KEYS */;
INSERT INTO `module_templates` VALUES (1,20,1,1),(2,19,1,2),(3,6,1,4),(4,3,1,5),(5,18,1,6),(6,2,1,7),(7,20,2,1),(8,19,2,2),(9,6,2,4),(10,3,2,5),(11,18,2,6),(12,2,2,7),(14,20,3,1),(15,19,3,2),(16,6,3,4),(17,3,3,5),(18,18,3,6),(19,2,3,7);
/*!40000 ALTER TABLE `module_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `mod_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for include',
  `mod_name` varchar(255) NOT NULL COMMENT 'Include name',
  `mod_path` varchar(255) NOT NULL COMMENT 'Include URL/file path (exclude the extension)',
  `mod_showincms` enum('N','Y') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`mod_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'Slideshow','slideshow','N'),(2,'Gallery','gallery','N'),(3,'Contact','contact','Y'),(4,'Newsletter','newsletter','N'),(5,'Quicklinks','quicklinks','N'),(6,'Reviews','reviews','N'),(7,'Blog','blog','N'),(8,'Google Map','map','Y'),(9,'Accommodation','accommodation','Y'),(10,'Bookings','bookings','Y');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_has_quicklink`
--

DROP TABLE IF EXISTS `page_has_quicklink`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_has_quicklink` (
  `page_id` int(11) NOT NULL,
  `quicklink_page_id` int(11) NOT NULL,
  `type` enum('P','S') NOT NULL DEFAULT 'P',
  `rank` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_has_quicklink`
--

LOCK TABLES `page_has_quicklink` WRITE;
/*!40000 ALTER TABLE `page_has_quicklink` DISABLE KEYS */;
INSERT INTO `page_has_quicklink` VALUES (13,5,'P',3),(13,3,'P',1),(13,2,'P',2),(11,9,'P',0),(11,10,'P',0),(15,16,'P',0),(15,17,'P',0),(15,18,'P',0),(15,19,'P',0),(10,1,'P',0),(23,15,'P',2),(23,5,'P',3),(14,15,'P',0),(14,16,'P',2),(14,17,'P',3),(14,18,'P',4),(14,19,'P',5),(14,20,'P',1),(1,16,'P',1),(1,17,'P',2);
/*!40000 ALTER TABLE `page_has_quicklink` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_meta_data`
--

DROP TABLE IF EXISTS `page_meta_data`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_meta_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `motif_photo_path` varchar(255) DEFAULT NULL,
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
  `page_meta_index_id` int(11) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `bsh_query_1` (`status`,`menu_label`,`heading`,`title`,`sub_heading`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_meta_data`
--

LOCK TABLES `page_meta_data` WRITE;
/*!40000 ALTER TABLE `page_meta_data` DISABLE KEYS */;
INSERT INTO `page_meta_data` VALUES (1,'Home','Home',NULL,'Experience spectacular Fiordland at Cabot Lodge on Cathedral Peaks Station.',NULL,'home','/','With 2000 acres of farmland bordering the Fiordland National Park and overlooking Lake Manapouri, the property showcases New Zealand at its best.',NULL,'<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. In imperdiet nibh at sapien blandit, lobortis porttitor turpis tristique. Suspendisse nibh nisi, scelerisque vitae fermentum eget, faucibus nec velit.</p>','Where the world meets wilderness',NULL,'/library/heroshots/manapouri-8404.jpg','/uploads/manapouri-8404-jsnnj.jpg',NULL,NULL,'jJQAgkpio7Y',NULL,NULL,NULL,NULL,'Cabot Lodge - Home','Meta descriptions','OG Title','OG descriptions','/library/general/alberto-restifo-4510-unsplash.jpg',NULL,NULL,NULL,'N',NULL,NULL,1,'A',1,NULL,'2018-05-28 02:41:16',NULL,NULL,1,NULL,NULL,1,1),(2,'About Us','About',NULL,'About Us',NULL,'about-us','/about-us','New Zealand is said to have started on a sheep&rsquo;s back, with the export of wool to the world. The McDonald family has a similar history, boasting five generations of sheep farmers. Cathedral Peaks Station owners, Cam and Wendy McDonald&rsquo;s love of horses sparked their relationship, while their love of family, farming and Fiordland has united them together for 40 years and counting.',NULL,NULL,NULL,NULL,'/library/exterior/cabotlodgetmcgfinal-40.jpg','/uploads/cabotlodgetmcgfinal-40-neyqx.jpg',NULL,NULL,NULL,'About Us','/library/general/mathew-waters-38056-unsplash.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna.','Find out More','About Us | Cabot Lodge',NULL,NULL,NULL,'/library/exterior/cabotlodgetmcgfinal-42.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'A',6,'2018-03-19 00:28:00','2018-05-24 22:44:21',NULL,3,1,NULL,NULL,2,1),(3,'Contact Us','Contact','Contact','Contact Us',NULL,'contact-us','/contact-us',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'Contact Us','/library/general/mathew-waters-38056-unsplash.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna. Suspendisse lobortis libero non lectus dictum tristique. Nulla vestibulum dignissim placerat. Fusce commodo pellentesque ante, sit amet pretium mi volutpat sed. Phasellus tincidunt ipsum in mi sodales facilisis sed vitae mi. Curabitur mollis orci quis sem pulvinar facilisis. Fusce eleifend gravida mattis. Duis sed tempor eros. Cras bibendum tempus lorem et vulputate. In id condimentum nunc. Aenean non quam ornare, fermentum mi ac, laoreet lorem.','Discover more',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',7,'2018-03-19 00:28:21','2018-05-24 02:19:16',NULL,3,1,NULL,NULL,2,1),(4,'404',NULL,NULL,'404',NULL,'404-page','/404-page',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','','','N',NULL,NULL,0,'A',10,'2018-03-19 02:12:33','2018-04-20 02:38:21',NULL,3,1,NULL,NULL,1,1),(5,'Stay','Stay','Stay','Stay at Cabot Lodge',NULL,'stay','/stay','Located at the centre of Cathedral Peaks Station, Cabot Lodge provides the luxury of seclusion, accommodating a maximum of ten guests with a small team of staff to ensure privacy.',NULL,NULL,NULL,NULL,'/library/heroshots/_DSC4531ret.jpg','/uploads/_DSC4531ret-icibq.jpg','/library/motif/deer.png',NULL,NULL,'Accommodation','/library/heroshots/manapouri-4896ret.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna.','Discover more','Accommodation | Cabot Lodge',NULL,NULL,NULL,'/library/heroshots/_DSC4531ret.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'A',2,'2018-04-17 02:45:47','2018-05-24 22:54:27',NULL,1,1,NULL,NULL,3,1),(6,'Our Location','Our Location','Our Location','Our Location',NULL,'our-location','/about-us/our-location',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',4,'2018-04-19 21:53:20','2018-05-23 23:02:07',NULL,1,1,NULL,NULL,2,1),(7,'Blog','Blog',NULL,'Blog',NULL,'blog','/about-us/blog','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu maximus ante, semper tristique risus. Suspendisse hendrerit sed nulla ultricies suscipit.',NULL,NULL,NULL,NULL,'/library/general/mathew-waters-38056-unsplash.jpg','/uploads/mathew-waters-38056-unsplash-lgagp.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'/library/general/mathew-waters-38056-unsplash.jpg','<script>Blog Head Close</script>','<script>Blog Body Open</script>','<script>Blog Body Close</script>','N',NULL,NULL,0,'A',10,'2018-04-19 21:54:28','2018-05-23 23:04:24',NULL,1,1,NULL,NULL,2,1),(8,'Reviews',NULL,NULL,'Reviews',NULL,'reviews','/about-us/reviews',NULL,NULL,NULL,NULL,NULL,'/library/general/jonathan-bean-8540-unsplash.jpg','/uploads/jonathan-bean-8540-unsplash-wp74f.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'/library/general/jonathan-bean-8540-unsplash.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'A',6,'2018-04-19 21:54:59','2018-05-23 23:04:12',NULL,1,1,NULL,NULL,2,1),(9,'Gallery','Gallery',NULL,'Gallery',NULL,'gallery','/about-us/gallery',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Gallery | Cabot Lodge',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',5,'2018-04-19 21:55:48','2018-05-24 22:49:06',NULL,1,1,NULL,NULL,2,1),(10,'Terms and Conditions',NULL,'Terms and Conditions','Terms and Conditions',NULL,'terms-and-conditions','/terms-and-conditions',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',9,'2018-04-20 01:41:32','2018-05-21 04:26:34',NULL,1,1,NULL,NULL,2,1),(11,'Reviews','Reviews',NULL,'Reviews Contact Page',NULL,'reviews','/reviews','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu maximus ante, semper tristique risus. Suspendisse hendrerit sed nulla ultricies suscipit.',NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'D',1,'2018-04-20 01:44:21','2018-05-17 13:15:52','2018-05-17 23:16:32',1,1,NULL,NULL,2,1),(12,'Category 1','Category 1',NULL,NULL,NULL,'category-1','/category-1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Category 1 Meta Title','Category 1 Meta DESC','Category 1 Og Title','Category 1 og desc','/library/general/aaron-birch-46477-unsplash.jpg','<script>Blog Category 1 Head Close</script>','<script>Blog Category 1 Body Open</script>','<script>Blog Category 1 Body Close</script>','N',NULL,NULL,0,'A',1,'2018-04-24 02:48:12','2018-04-27 00:30:21',NULL,1,1,NULL,NULL,1,1),(13,'Category 2','Category 2',NULL,NULL,NULL,'category-2','/category-2',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',2,'2018-04-24 02:55:32','2018-04-24 02:55:54',NULL,1,1,NULL,NULL,1,1),(14,'Category 3','Category 3',NULL,NULL,NULL,'category-3','/category-3',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',3,'2018-04-24 03:26:29','2018-04-24 03:26:40',NULL,1,1,NULL,NULL,1,1),(15,'Category 4','Category 4',NULL,NULL,NULL,'category-4','/category-4',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',4,'2018-04-24 03:27:01','2018-04-24 03:27:11',NULL,1,1,NULL,NULL,1,1),(16,'Lorem ipsum dolor sit amet',NULL,NULL,'Lorem ipsum dolor sit amet',NULL,'lorem-ipsum-dolor-sit-amet','/lorem-ipsum-dolor-sit-amet','Vestibulum libero risus, malesuada at est quis, faucibus vehicula felis. Aliquam ut mauris a orci feugiat hendrerit vel ac ante. In non accumsan orci.','Curabitur et ex rhoncus, lobortis odio in, lacinia quam. Nulla pretium rutrum neque, sed aliquam justo finibus venenatis. Morbi interdum pretium efficitur.','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a metus ullamcorper, placerat tortor id, imperdiet sapien. Sed et nulla posuere, lacinia dui eget, tempor nibh. Pellentesque facilisis sit amet ligula euismod sollicitudin. Morbi sit amet pellentesque diam, eget consectetur ante. Cras a tincidunt diam. Sed ac risus lorem. Donec a vestibulum tortor. Aenean ultricies arcu ut tempus cursus. Curabitur auctor, nisl placerat dictum elementum, urna nibh aliquet libero, a convallis eros eros eu est.</p>\r\n\r\n<p>Phasellus sollicitudin hendrerit nibh. Aenean euismod vehicula nisi, ornare blandit ante sodales scelerisque. Phasellus nisi nisl, bibendum in nunc vel, pretium scelerisque ex. Sed quis turpis ut dui malesuada finibus non vel enim. Phasellus viverra nibh nisl, ut mattis erat sagittis a. Ut a purus vestibulum, commodo dolor eu, finibus ligula. Suspendisse vestibulum ipsum at est porttitor, quis tristique ante finibus. Maecenas eu sapien velit. Praesent tristique elit sed risus mattis, et fringilla nisi eleifend. Cras vel urna gravida, dignissim tellus nec, hendrerit felis. Aliquam erat volutpat. Nam lobortis, urna vitae sollicitudin pharetra, sem sapien dictum nisl, ac faucibus lectus mauris eu mauris. Phasellus luctus, felis at ullamcorper finibus, felis felis fringilla lorem, quis lacinia libero mi quis est. Cras ut accumsan purus. Nam sed tellus erat.</p>\r\n\r\n<p>Nunc gravida quam nec felis rhoncus suscipit. Duis posuere ante ac nulla laoreet pretium. Quisque in vestibulum arcu, sit amet pharetra neque. Curabitur lacinia mi et congue vehicula. Donec pulvinar magna nulla, eu fringilla risus molestie id. Donec porttitor quis lectus at consectetur. Quisque tellus sapien, rutrum at congue sit amet, feugiat vel dolor. Maecenas bibendum lobortis dui id commodo. Quisque sed sapien vel dolor placerat malesuada. Mauris interdum nisi est, id laoreet lorem mattis quis. Etiam efficitur justo in urna sagittis consequat. Suspendisse posuere sit amet ligula ac porta. Cras id dolor ac nibh imperdiet fermentum id vitae massa. Aenean sed faucibus sapien.</p>','Lorem ipsum dolor sit amet HCH','Lorem ipsum dolor sit amet HC','/library/general/mathew-waters-38056-unsplash.jpg','/uploads/mathew-waters-38056-unsplash-cvazj.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Blog 1 MT','Blog 1 MD','Blog 1 OGT','Blog 1 OGMD','/library/general/mathew-waters-38056-unsplash.jpg','<script>Blog POST 1 head Close</script>','<script>Blog POST 1 body open</script>','<script>Blog POST 1 body Close</script>','N',NULL,NULL,0,'A',NULL,'2018-04-24 05:34:01','2018-04-27 00:45:46',NULL,1,1,NULL,NULL,1,1),(17,'Phasellus sollicitudin hendrerit nibh',NULL,NULL,'Phasellus sollicitudin hendrerit nibh',NULL,'phasellus-sollicitudin-hendrerit-nibh','/phasellus-sollicitudin-hendrerit-nibh','Phasellus sollicitudin hendrerit nibh. Aenean euismod vehicula nisi, ornare blandit ante sodales scelerisque. Phasellus nisi nisl, bibendum in nunc vel, pretium scelerisque ex.','Suspendisse vestibulum ipsum at est porttitor, quis tristique ante finibus. Maecenas eu sapien velit. Praesent tristique elit sed risus mattis, et fringilla nisi eleifend.','<p>Phasellus sollicitudin hendrerit nibh. Aenean euismod vehicula nisi, ornare blandit ante sodales scelerisque. Phasellus nisi nisl, bibendum in nunc vel, pretium scelerisque ex. Sed quis turpis ut dui malesuada finibus non vel enim. Phasellus viverra nibh nisl, ut mattis erat sagittis a. Ut a purus vestibulum, commodo dolor eu, finibus ligula. Suspendisse vestibulum ipsum at est porttitor, quis tristique ante finibus. Maecenas eu sapien velit. Praesent tristique elit sed risus mattis, et fringilla nisi eleifend. Cras vel urna gravida, dignissim tellus nec, hendrerit felis. Aliquam erat volutpat. Nam lobortis, urna vitae sollicitudin pharetra, sem sapien dictum nisl, ac faucibus lectus mauris eu mauris. Phasellus luctus, felis at ullamcorper finibus, felis felis fringilla lorem, quis lacinia libero mi quis est. Cras ut accumsan purus. Nam sed tellus erat.</p>\r\n\r\n<p>Phasellus&nbsp;viverra&nbsp;nibh&nbsp;nisl, ut&nbsp;mattis&nbsp;erat&nbsp;sagittis&nbsp;a. Ut a purus&nbsp;vestibulum,&nbsp;commodo&nbsp;dolor eu,&nbsp;finibus&nbsp;ligula.&nbsp;Suspendisse&nbsp;vestibulum&nbsp;ipsum&nbsp;at est&nbsp;porttitor,&nbsp;quis&nbsp;tristique&nbsp;ante&nbsp;finibus. Maecenas eu&nbsp;sapien&nbsp;velit.&nbsp;Praesent&nbsp;tristique&nbsp;elit&nbsp;sed&nbsp;risus&nbsp;mattis, et&nbsp;fringilla&nbsp;nisi&nbsp;eleifend.&nbsp;Cras&nbsp;vel&nbsp;urna&nbsp;gravida,&nbsp;dignissim&nbsp;tellus&nbsp;nec,&nbsp;hendrerit&nbsp;felis.&nbsp;Aliquam&nbsp;erat&nbsp;volutpat. Nam&nbsp;lobortis,&nbsp;urna&nbsp;vitae&nbsp;sollicitudin&nbsp;pharetra, sem&nbsp;sapien&nbsp;dictum&nbsp;nisl, ac&nbsp;faucibus&nbsp;lectus&nbsp;mauris&nbsp;eu&nbsp;mauris.&nbsp;Phasellus&nbsp;luctus,&nbsp;felis&nbsp;at&nbsp;ullamcorper&nbsp;finibus,&nbsp;felis&nbsp;felis&nbsp;fringilla&nbsp;lorem,&nbsp;quis&nbsp;lacinia&nbsp;libero mi&nbsp;quis&nbsp;est.&nbsp;Cras&nbsp;ut&nbsp;accumsan&nbsp;purus. Nam&nbsp;sed&nbsp;tellus&nbsp;erat.</p>',NULL,NULL,'/library/general/johannes-ludwig-348591-unsplash.jpg','/uploads/johannes-ludwig-348591-unsplash-24cup.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'/library/general/johannes-ludwig-348591-unsplash.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'A',NULL,'2018-04-25 23:29:35','2018-04-26 22:47:39',NULL,1,1,NULL,NULL,1,1),(18,'Quisque volutpat vel nibh ac ultricies',NULL,NULL,'Quisque volutpat vel nibh ac ultricies',NULL,'quisque-volutpat-vel-nibh-ac-ultricies','/quisque-volutpat-vel-nibh-ac-ultricies','Etiam vel massa tincidunt, consectetur nibh id, congue lorem. Nam in laoreet ante. Donec posuere efficitur tortor non molestie. Pellentesque et mauris sed nunc sodales porta.','Donec ac tortor auctor, accumsan nibh sed, sagittis metus. Quisque eget posuere libero. Duis lectus nisi, tincidunt et vehicula vitae, suscipit id nibh.','<p>Quisque volutpat vel nibh ac ultricies. Maecenas ultricies, turpis a accumsan pellentesque, orci leo hendrerit est, sed ultricies dui quam vel ex. Nunc vitae sodales leo. Sed non vestibulum enim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus tincidunt enim id nunc elementum molestie non at dui. Quisque varius maximus quam, id iaculis massa lobortis ut. Praesent quis turpis lacinia, luctus urna ut, varius tortor. Cras eget faucibus nulla. Etiam dapibus ligula dui, nec euismod lorem scelerisque ut. Donec non auctor leo, eget aliquet mi. Sed ac ornare nisl. Nulla vestibulum, velit ut pulvinar ultricies, erat justo iaculis mauris, non pretium arcu massa sed tortor.</p>\r\n\r\n<p>Etiam vel massa tincidunt, consectetur nibh id, congue lorem. Nam in laoreet ante. Donec posuere efficitur tortor non molestie. Pellentesque et mauris sed nunc sodales porta. Morbi velit urna, gravida eget nisi eu, pretium imperdiet dolor. Nunc non vehicula diam, tempor aliquam urna. Integer sed tempus dui. Mauris ultricies velit ac varius consequat. Nullam rhoncus gravida metus, ut tincidunt nulla feugiat vel. Nullam ultricies non mauris eu tristique. Duis et arcu vel urna varius consequat.</p>\r\n\r\n<p>Donec ac tortor auctor, accumsan nibh sed, sagittis metus. Quisque eget posuere libero. Duis lectus nisi, tincidunt et vehicula vitae, suscipit id nibh. Sed sapien felis, volutpat sit amet ante sed, viverra tristique dui. In tristique, orci a aliquet viverra, dolor lacus vulputate dui, eget auctor augue orci et ligula. Duis velit quam, rhoncus nec enim eu, dapibus molestie ipsum. Phasellus a neque vulputate, accumsan nibh sed, consequat lacus. Vivamus condimentum vulputate augue, sit amet hendrerit risus laoreet vel. Quisque ullamcorper purus nunc, in rutrum purus scelerisque quis. Quisque in lectus ante. Vivamus lobortis ligula non lectus elementum, et tincidunt elit tempus. Proin dui velit, mattis vitae facilisis convallis, dictum ut dolor.</p>\r\n\r\n<p>In interdum eu enim vitae lacinia. Nunc et blandit diam. Phasellus egestas dui quam, vel elementum augue rhoncus pellentesque. Pellentesque sollicitudin est a diam scelerisque, rutrum finibus odio malesuada. Duis non dolor et lorem scelerisque ultricies a et lorem. Aenean et nisl pulvinar, aliquet tellus sit amet, gravida diam. Donec eu aliquam nulla. Vestibulum tempus lorem enim, sed sodales augue dictum vitae. Maecenas sit amet sem ornare, vehicula diam nec, bibendum arcu. Curabitur dignissim pulvinar nunc fermentum luctus. Nulla viverra justo eget ornare ultricies.</p>',NULL,NULL,'/library/general/david-marcu-28068-unsplash.jpg','/uploads/david-marcu-28068-unsplash-g0a4r.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'/library/general/david-marcu-28068-unsplash.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'A',NULL,'2018-04-25 23:29:51','2018-04-26 22:47:03',NULL,1,1,NULL,NULL,1,1),(19,'Quisque et diam nibh',NULL,NULL,'Quisque et diam nibh',NULL,'quisque-et-diam-nibh','/quisque-et-diam-nibh','Nulla ipsum risus, pharetra eget mi vitae, suscipit maximus elit. Donec ut ex efficitur, viverra odio sit amet, dignissim justo. Aliquam ac orci sed orci gravida feugiat','Quisque et diam nibh. Suspendisse potenti. Quisque at pellentesque odio. Proin semper ex quis sem finibus, vel lacinia massa mollis. Quisque ut volutpat felis, dignissim viverra leo.','<p>Quisque et diam nibh. Suspendisse potenti. Quisque at pellentesque odio. Proin semper ex quis sem finibus, vel lacinia massa mollis. Quisque ut volutpat felis, dignissim viverra leo. Nulla ipsum risus, pharetra eget mi vitae, suscipit maximus elit. Donec ut ex efficitur, viverra odio sit amet, dignissim justo. Aliquam ac orci sed orci gravida feugiat. Nullam lacinia porta magna, a accumsan mi viverra at. Donec felis nulla, ornare nec placerat in, pretium quis est. Quisque vitae dictum mi, aliquet viverra lectus. Pellentesque feugiat risus nec ligula elementum dapibus. Nullam condimentum velit lectus, eu sagittis tellus vehicula vel. Nulla porttitor tortor id convallis porta. Maecenas gravida tincidunt eros at sollicitudin. Aenean tempor turpis mollis dolor porta vehicula.</p>\r\n\r\n<p>Curabitur et ex rhoncus, lobortis odio in, lacinia quam. Nulla pretium rutrum neque, sed aliquam justo finibus venenatis. Morbi interdum pretium efficitur. Aliquam imperdiet ipsum nec odio porttitor scelerisque. Duis laoreet nunc vel ante blandit lobortis. Morbi ut tortor purus. Pellentesque aliquam in mauris nec posuere. Aenean accumsan diam sit amet diam cursus, nec euismod sapien rutrum. Nullam eleifend, dui et luctus imperdiet, neque libero sagittis nunc, non finibus sapien ex ac sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>',NULL,NULL,'/library/general/eugene-quek-111837-unsplash.jpg','/uploads/eugene-quek-111837-unsplash-i69jt.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'/library/general/eugene-quek-111837-unsplash.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'A',NULL,'2018-04-25 23:36:25','2018-04-26 00:04:28',NULL,1,1,NULL,NULL,1,1),(20,'Vivamus vitae ornare urna',NULL,NULL,'Vivamus vitae ornare urna',NULL,'vivamus-vitae-ornare-urna','/vivamus-vitae-ornare-urna','test','test','<p>Vivamus vitae ornare urna. In quam augue, efficitur suscipit neque vitae, posuere aliquet neque. Duis luctus a risus nec elementum. Sed tincidunt aliquet tempor. Donec varius dolor non vestibulum pharetra. Fusce quis erat in ante pretium dignissim. Aliquam luctus vitae diam ac laoreet. Vivamus eu odio interdum, facilisis diam et, ullamcorper sapien. Etiam eget urna gravida, pulvinar augue vel, fermentum leo. Nullam quis iaculis orci, ac condimentum tortor. In sollicitudin id purus in eleifend. Phasellus vitae tellus odio.</p>\r\n\r\n<p>Fusce purus tortor, tincidunt eu feugiat vel, molestie et nisi. Morbi ullamcorper eleifend augue, eu placerat tellus egestas a. Sed dignissim mattis vulputate. Ut at feugiat lacus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur malesuada at tortor tristique lobortis. Aliquam a porttitor dui. Donec eu arcu justo. Praesent a elit quis odio egestas euismod. Aliquam erat volutpat. Donec placerat, neque eget rutrum volutpat, tellus mi facilisis dolor, id condimentum lorem sapien nec ex. Donec vitae nulla tellus. Vestibulum posuere mi neque.</p>\r\n\r\n<p>Aliquam et blandit ipsum, ut egestas metus. Morbi a suscipit dui. Donec ex nibh, ullamcorper eget libero non, tincidunt semper ligula. Proin accumsan fermentum dui eu venenatis. Aenean commodo eleifend metus, sit amet hendrerit lorem bibendum at. Integer sed fringilla felis. In tincidunt nibh at dui imperdiet pharetra. Cras ut ligula in massa porttitor dapibus. Pellentesque justo ipsum, tincidunt aliquam urna et, lobortis aliquam mauris. Phasellus condimentum lacus nec lorem blandit gravida. Sed eu auctor purus. Etiam ut tincidunt arcu, vel gravida nunc. Phasellus semper imperdiet maximus.</p>',NULL,NULL,'/library/general/aaron-birch-46477-unsplash.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'/library/general/aaron-birch-46477-unsplash.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'A',NULL,'2018-04-26 00:22:44','2018-05-25 01:04:44',NULL,1,1,NULL,NULL,2,1),(21,'Testing General Page 01','Testing General Page 01','Testing General Page 01','Testing General Page 01',NULL,'testing-general-page-01','/testing-general-page-01','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna. Suspendisse lobortis libero non lectus dictum tristique. Nulla vestibulum dignissim placerat.',NULL,NULL,'Caption Heading','Caption 01',NULL,'',NULL,NULL,NULL,'Testing General Page 01','/library/general/mathew-waters-38056-unsplash.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna. Suspendisse lobortis libero non lectus dictum tristique. Nulla vestibulum dignissim placerat. Fusce commodo pellentesque ante, sit amet pretium mi volutpat sed. Phasellus tincidunt ipsum in mi sodales facilisis sed vitae mi. Curabitur mollis orci quis sem pulvinar facilisis. Fusce eleifend gravida mattis. Duis sed tempor eros. Cras bibendum tempus lorem et vulputate. In id condimentum nunc. Aenean non quam ornare, fermentum mi ac, laoreet lorem.','Discover','Testing General Page 01','Testing General Page 01','Testing General Page 01','Testing General Page 01','/library/general/mathew-waters-38056-unsplash.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'D',NULL,'2018-04-30 21:16:12','2018-05-01 03:49:27','2018-05-01 03:49:30',1,1,NULL,NULL,1,1),(22,'Testing Category 01','Testing Category 01',NULL,NULL,NULL,'testing-category-01','/testing-category-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Testing Category 01','Testing Category 01','Testing Category 01','Testing Category 01','/library/general/mathew-waters-38056-unsplash.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'D',10,'2018-04-30 22:23:46','2018-04-30 22:24:14','2018-05-22 23:57:03',1,1,NULL,NULL,1,1),(23,'Testing Blog Post 01',NULL,NULL,'Testing Blog Post 01',NULL,'testing-blog-post-01','/testing-blog-post-01','Test ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna.','Test ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna.','<p>Test&nbsp;ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna. Suspendisse lobortis libero non lectus dictum tristique. Nulla vestibulum dignissim placerat. Fusce commodo pellentesque ante, sit amet pretium mi volutpat sed. Phasellus tincidunt ipsum in mi sodales facilisis sed vitae mi. Curabitur mollis orci quis sem pulvinar facilisis. Fusce eleifend gravida mattis. Duis sed tempor eros. Cras bibendum tempus lorem et vulputate. In id condimentum nunc. Aenean non quam ornare, fermentum mi ac, laoreet lorem.</p>\r\n\r\n<p><img alt=\"\" src=\"/library/general/mathew-waters-38056-unsplash.jpg\" /></p>','Heading 01','Caption 01','/library/general/mathew-waters-38056-unsplash.jpg','/uploads/mathew-waters-38056-unsplash-9sanz.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Testing Blog Post 01','Testing Blog Post 01','Testing Blog Post 01','Testing Blog Post 01','/library/general/mathew-waters-38056-unsplash.jpg','<p>Head</p>','<p>Body Open</p>','<p>Body Close</p>','N',NULL,NULL,0,'D',NULL,'2018-04-30 22:50:42','2018-05-21 03:55:56','2018-05-22 23:56:59',1,1,NULL,NULL,2,1),(24,'Testing General Page 02','Testing General Page 02','Testing General Page 02','Testing General Page 02',NULL,'testing-general-page-02','/testing-general-page-02','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna.',NULL,NULL,'Heading 01','Caption 01',NULL,'',NULL,NULL,NULL,'Testing General Page 02','/library/general/mathew-waters-38056-unsplash.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna. Suspendisse lobortis libero non lectus dictum tristique. Nulla vestibulum dignissim placerat.','Discover','Testing General Page 02','Testing General Page 02','Testing General Page 02','Testing General Page 02','/library/general/mathew-waters-38056-unsplash.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'D',20,'2018-04-30 23:04:22','2018-05-01 23:06:57','2018-05-15 13:59:07',1,1,NULL,NULL,1,1),(25,'Premier Suite','Premier Suite',NULL,'Premier Suite',NULL,'premier-suite','/premier-suite',NULL,'Open, airy and filled with light, this premier suite enjoys a stunning view over the lake through it&#039;s double height windows. With a stone exterior and blond wood interior',NULL,NULL,NULL,'/library/heroshots/old-pic-3.jpg','/uploads/old-pic-3-vvoon.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Premier Suite | Cabot Lodge',NULL,NULL,NULL,'/library/heroshots/old-pic-3.jpg','<script>\r\nvar hedtag = \'\';\r\n</script>','<script>\r\nvar bodyopentag = \'\';\r\n</script>','<script>\r\nvar bodyclosetag = \'\';\r\n</script>','N',NULL,NULL,0,'A',1,'2018-05-17 00:28:02','2018-05-25 01:41:51',NULL,1,1,4,NULL,0,1),(26,'Deluxe Suite 1','Deluxe Suite 1',NULL,'Deluxe Suite 1',NULL,'deluxe-suite-1','/deluxe-suite-1',NULL,'The Deluxe Suite has one bedroom on the upstairs level and downstairs, an excellently appointed full kitchen, large dining area and a room with',NULL,NULL,NULL,'/library/heroshots/_DSC4531ret.jpg','/uploads/_DSC4531ret-15yc4.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Deluxe Suite 1 | Cabot Lodge',NULL,NULL,NULL,'/library/heroshots/DJI_0025ret.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'A',2,'2018-05-17 01:56:26','2018-05-24 23:28:48',NULL,1,1,3,NULL,0,1),(27,'Two Bedroom Suite','Two Bedroom Suite',NULL,'Two Bedroom Suite',NULL,'two-bedroom-suite','/two-bedroom-suite',NULL,'Open, airy and filled with light, this premier suite enjoys a stunning view over the lake through it&#039;s double height windows. With a stone exterior and blond wood interior',NULL,NULL,NULL,'/library/heroshots/manapouri-8368ret.jpg','/uploads/manapouri-8368ret-vah1o.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Two Bedroom Suite | Cabot Lodge',NULL,NULL,NULL,'/library/heroshots/manapouri-8368ret.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'A',4,'2018-05-17 01:58:03','2018-05-24 23:32:31',NULL,1,1,3,NULL,0,1),(28,'Exclusive Use','Exclusive Use',NULL,'Exclusive Use',NULL,'exclusive-use','/exclusive-use',NULL,'Open, airy and filled with light, this premier suite enjoys a stunning view over the lake through it&#039;s double height windows. With a stone exterior and blond wood interior',NULL,NULL,NULL,'/library/heroshots/manapouri-6588ret2.jpg','/uploads/manapouri-6588ret2-012qp.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Exclusive Use | Cabot Lodge',NULL,NULL,NULL,'/library/heroshots/manapouri-6588ret2.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'A',5,'2018-05-17 01:59:18','2018-05-24 23:33:56',NULL,1,1,4,1,0,1),(29,'Experience','Experience','Experience','Unmatched and unforgettable experiences at Cabot Lodge',NULL,'experience','/experience','Cabot Lodge prides itself on providing with opportunities to participate in on-farm activities, choose from specially crafted Fiordland packages, or have a bespoke package created with carefully selected guides and activities.',NULL,NULL,NULL,NULL,'/library/exterior/cabotlodgetmcgfinal-47.jpg','/uploads/cabotlodgetmcgfinal-47-eq1pw.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Experience Cabot Lodge at Cathedral Peak Station',NULL,NULL,NULL,'/library/exterior/cabotlodgetmcgfinal-51.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'A',3,'2018-05-17 13:33:04','2018-05-24 23:38:59',NULL,1,1,NULL,NULL,2,1),(30,'The Lodge','The Lodge',NULL,'The Lodge',NULL,'the-lodge','/experience/the-lodge',NULL,NULL,NULL,NULL,NULL,NULL,'','/library/motif/lodge.jpg',NULL,NULL,'The Lodge','/library/heroshots/DJI_0019ret2.jpg','Cabot Lodge, located at the centre of Cathedral Peaks Station, provides the luxury of seclusion, accommodation a maximum of ten guests with a small team of staff to ensure privacy','Discover',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',1,'2018-05-17 13:41:37','2018-05-18 01:55:20',NULL,1,1,3,1,2,1),(31,'The Farm','The Farm',NULL,'The Farm',NULL,'the-farm','/experience/the-farm',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'The Farm','/library/heroshots/manapouri-6955ret.jpg','Cathedral Peaks Station has been owned by the McDonald family for 36 year. It is home to Cam and Wendy McDonalds alongside their daughter Breidi and her husband Brad.','Discover',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',2,'2018-05-17 13:42:15','2018-05-17 23:11:08',NULL,1,1,NULL,NULL,2,1),(32,'Fiordland','Fiordland',NULL,'Experience Fiordland',NULL,'fiordland','/experience/fiordland',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'Fiordland','/library/heroshots/Depositphotos_11319376_original.jpg','Cathedral Peaks Station surrounds the peaceful lakeside village of Manapouri, Lake Manapouri is New Zealand&#039;s second deepesst lake, containing 33 islands and abundant secluded sandy','Discover',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',3,'2018-05-17 22:59:21','2018-05-24 02:12:36',NULL,1,1,NULL,NULL,2,1),(33,'Hiking','Hiking',NULL,'Hiking',NULL,'hiking','/experience/hiking',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'Hiking','/library/heroshots/manapouri-6588ret2.jpg','There are more than 600 kilometres of tracks here earning the area the reputation of the &#039;walking capital of the world&#039;. Three of New Zealand&#039;s nine great walks are in Fiordland','Discover',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',4,'2018-05-17 22:59:45','2018-05-17 23:15:23',NULL,1,1,NULL,NULL,2,1),(34,'Fly Fishing','Fly Fishing',NULL,'Fly Fishing',NULL,'fly-fishing','/experience/fly-fishing',NULL,NULL,NULL,NULL,NULL,NULL,'','/library/motif/fishing.jpg',NULL,NULL,'Fly Fishing','/library/heroshots/manapouri-4896ret.jpg','New Zealand is one of the world&#039;s great fishing countries. Trout are plentiful throughout the country. Lakes Manapouri offers fantastic opportunities to fish for brown and rainbow trout','Discover',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',5,'2018-05-17 22:59:58','2018-05-18 00:44:04',NULL,1,1,NULL,NULL,2,1),(35,'Kayaking','Kayaking',NULL,'Kayaking',NULL,'kayaking','/experience/kayaking',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,'Kayaking','/library/heroshots/_DSC4531ret.jpg','Lake Manapouri serves as the gateway to Doubtful sound, also known as Patea, the &#039;place of silence&#039;. Doubtful Sound is ten times larger than its well-known cousin Milford Sound','Discover',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',6,'2018-05-17 23:00:15','2018-05-18 00:04:25',NULL,1,1,NULL,NULL,2,1),(36,'Bookings',NULL,NULL,'Bookings',NULL,'bookings','/bookings',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',8,'2018-05-18 01:59:54','2018-05-18 02:01:27',NULL,1,1,NULL,NULL,2,1),(37,'Our History','Our History',NULL,'Our History',NULL,'our-history','/about-us/our-history',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',1,'2018-05-20 23:38:45','2018-05-20 23:39:50',NULL,1,1,NULL,NULL,2,1),(38,'Testing Category 02','Testing Category 02',NULL,NULL,NULL,'testing-category-02','/testing-category-02',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Testing Category 02','Testing Category 02','Testing Category 02','Testing Category 02','/library/heroshots/_DSC4531ret.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'D',20,'2018-05-21 04:33:20','2018-05-21 04:33:56','2018-05-22 23:57:03',1,1,NULL,NULL,2,1),(39,'Testing Blog Post 02',NULL,NULL,'Testing Blog Post 02',NULL,'testing-blog-post-02','/testing-blog-post-02','TEST Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nibh augue, tempus non tristique non, pharetra ut mi.','TEST Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nibh augue, tempus non tristique non, pharetra ut mi. Nulla maximus ultricies quam eu condimentum. Curabitur et dictum mi. Integer a','<p>TEST&nbsp;</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nibh augue, tempus non tristique non, pharetra ut mi. Nulla maximus ultricies quam eu condimentum. Curabitur et dictum mi. Integer a porta urna, id porta lorem. Pellentesque efficitur elementum leo nec convallis. Pellentesque at urna vestibulum, tincidunt sem eget, fringilla elit. Duis vulputate placerat rhoncus. Quisque consectetur, lorem eu sagittis efficitur, quam arcu eleifend mauris, id dictum tortor lorem in ligula. Nunc eu euismod lacus, vitae vulputate quam.</p>\r\n\r\n<p>Phasellus viverra enim orci, sodales blandit nisl varius sed. Cras ac posuere tortor. Quisque eget quam dictum, rutrum nisi ut, posuere nibh. Vivamus sit amet turpis leo. Pellentesque fringilla, elit id ullamcorper congue, nulla magna placerat ipsum, et porta nisl odio tincidunt ligula. Ut nulla ligula, eleifend in risus non, sodales lacinia mauris. Nulla volutpat pulvinar quam eget eleifend. Praesent rutrum, turpis ut lacinia viverra, ipsum augue porta tortor, id rutrum tortor massa eget lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at convallis nunc, a elementum urna.</p>','Testing Heading','Testing Caption','/library/heroshots/_DSC4531ret.jpg','/uploads/_DSC4531ret-btv7o.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Testing Blog Post 02','Testing Blog Post 02','Testing Blog Post 02','Testing Blog Post 02','/library/heroshots/_DSC4531ret.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'D',NULL,'2018-05-21 04:34:45','2018-05-21 04:35:53','2018-05-22 23:56:59',1,1,NULL,NULL,2,1),(40,'Testing Accommodation 01','Testing Accommodation 01',NULL,'Testing Accommodation 01',NULL,'testing-accommodation-01','/testing-accommodation-01',NULL,'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nibh augue, tempus non tristique non, pharetra ut mi. Nulla maximus ultricies quam eu condimentum. Curabitur et dictum mi. Integer a port',NULL,NULL,NULL,'/library/heroshots/manapouri-8404.jpg','/uploads/manapouri-8404-kfr5w.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Testing Accommodation 01','Testing Accommodation 01','Testing Accommodation 01','Testing Accommodation 01','/library/heroshots/manapouri-6588ret2.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'D',10,'2018-05-21 20:27:02','2018-05-21 22:29:53','2018-05-22 22:41:39',1,1,NULL,NULL,0,1),(41,'Untitled',NULL,NULL,'Untitled',NULL,'untitled','/untitled',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'D',0,'2018-05-21 20:43:06','2018-05-21 20:43:45','2018-05-24 23:33:43',1,1,NULL,NULL,0,1),(42,'Testing General Page 03',NULL,'Testing General Page 03','Testing General Page 03',NULL,'testing-general-page-03','/testing-general-page-03','Testing General Page 03',NULL,NULL,'Test Heading','Testing Caption','/library/heroshots/manapouri-8404.jpg','/uploads/manapouri-8404-nmruq.jpg','/library/motif/sketch-sheep.png',NULL,NULL,'Testing General Page 03','/library/heroshots/manapouri-6588ret2.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nibh augue, tempus non tristique non, pharetra ut mi. Nulla maximus ultricies quam eu condimentum. Curabitur et dictum mi. Integer a porta urna, id porta lorem. Pellentesque efficitur elementum leo nec convallis. Pellentesque at urna vestibulum, tincidunt sem eget, fringilla elit. Duis vulputate placerat rhoncus. Quisque consectetur, lorem eu sagittis efficitur, quam arcu eleifend mauris, id dictum tortor lorem in ligula. Nunc eu euismod lacus, vitae vulputate quam.','Discover','Testing General Page 03','Testing General Page 03','Testing General Page 03','Testing General Page 03','/library/heroshots/manapouri-6588ret2.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'D',20,'2018-05-21 21:27:02','2018-05-22 03:06:01','2018-05-22 23:00:35',1,1,NULL,NULL,2,1),(43,'Occasions','Occasions',NULL,'Occasions',NULL,'occasions','/occasions',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Occasions | Cabot Lodge',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'A',5,'2018-05-23 23:04:28','2018-05-23 23:04:46',NULL,1,1,NULL,NULL,2,1),(44,'Deluxe Suite 2','Deluxe Suite 2',NULL,'Deluxe Suite 2',NULL,'deluxe-suite-2','/deluxe-suite-2',NULL,'The Deluxe Suite has one bedroom on the upstairs level and downstairs, an excellently appointed full kitchen, large dining area and a room with',NULL,NULL,NULL,'/library/heroshots/_DSC4531ret.jpg','/uploads/_DSC4531ret-jpqx4.jpg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Deluxe Suite 2 | Cabot Lodge',NULL,NULL,NULL,'/library/heroshots/_DSC4531ret.jpg',NULL,NULL,NULL,'N',NULL,NULL,0,'A',3,'2018-05-24 23:29:00','2018-05-24 23:30:33',NULL,1,1,4,NULL,0,1);
/*!40000 ALTER TABLE `page_meta_data` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_meta_index`
--

DROP TABLE IF EXISTS `page_meta_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_meta_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_meta_index`
--

LOCK TABLES `page_meta_index` WRITE;
/*!40000 ALTER TABLE `page_meta_index` DISABLE KEYS */;
INSERT INTO `page_meta_index` VALUES (1,'Index, Follow (Default)','INDEX, FOLLOW','Use this if you want to let search engines do their normal job.'),(2,'No Index, Follow','NOINDEX, FOLLOW','Search engine robots can follow any links on this page but will not include this page.'),(3,'Index, No Follow','INDEX, NOFOLLOW','Search engine robots should include this page but not follow any links on this page.'),(4,'No Index, No Follow','NOINDEX, NOFOLLOW','This is for sections of a site that shouldn\'t be indexed and shouldn\'t have links followed.');
/*!40000 ALTER TABLE `page_meta_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo`
--

DROP TABLE IF EXISTS `photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `photo_group_id` int(11) DEFAULT NULL COMMENT 'Foreign Key to the slideshow group for this slide',
  PRIMARY KEY (`id`),
  KEY `is_group` (`photo_group_id`),
  CONSTRAINT `fk_photo_photo_group_idx` FOREIGN KEY (`photo_group_id`) REFERENCES `photo_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo`
--

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;
INSERT INTO `photo` VALUES (59,'/library/heroshots/manapouri-8404.jpg','',NULL,NULL,NULL,NULL,NULL,NULL,1620,1080,1,1),(60,'/library/exterior/cabotlodgetmcgfinal-63.jpg','',NULL,NULL,NULL,NULL,NULL,NULL,1620,1080,2,1),(61,'/library/exterior/cabotlodgetmcgfinal-56.jpg','',NULL,NULL,NULL,NULL,NULL,NULL,1920,1080,3,1),(63,'/library/exterior/cabotlodgetmcgfinal-2.jpg','/uploads/cabotlodgetmcgfinal-2-zk2lg.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1920,1080,NULL,3),(64,'/library/exterior/cabotlodgetmcgfinal-3.jpg','/uploads/cabotlodgetmcgfinal-3-gnvq8.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1726,1080,NULL,3),(65,'/library/exterior/cabotlodgetmcgfinal-9.jpg','/uploads/cabotlodgetmcgfinal-9-vefi5.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1920,1080,NULL,3),(66,'/library/exterior/cabotlodgetmcgfinal-24.jpg','/uploads/cabotlodgetmcgfinal-24-tssdk.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1620,1080,NULL,3),(67,'/library/exterior/cabotlodgetmcgfinal-63.jpg','/uploads/cabotlodgetmcgfinal-63-yfoql.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1620,1080,NULL,3),(68,'/library/exterior/cabotlodgetmcgfinal-38.jpg','/uploads/cabotlodgetmcgfinal-38-in9vd.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1920,1080,NULL,3),(69,'/library/exterior/cabotlodgetmcgfinal-59.jpg','/uploads/cabotlodgetmcgfinal-59-6h5up.jpg',NULL,NULL,NULL,NULL,NULL,NULL,1920,1080,NULL,3),(70,'/library/heroshots/_DSC4531ret.jpg','/uploads/_DSC4531ret-euaio.jpg',NULL,NULL,NULL,NULL,NULL,NULL,750,500,NULL,4),(71,'/library/heroshots/DJI_0019ret2.jpg','/uploads/DJI_0019ret2-56xui.jpg',NULL,NULL,NULL,NULL,NULL,NULL,750,500,NULL,4),(72,'/library/heroshots/DJI_0025ret.jpg','/uploads/DJI_0025ret-yp6tb.jpg',NULL,NULL,NULL,NULL,NULL,NULL,750,500,NULL,4),(73,'/library/heroshots/manapouri-6588ret2.jpg','/uploads/manapouri-6588ret2-dxc6w.jpg',NULL,NULL,NULL,NULL,NULL,NULL,750,374,NULL,4),(74,'/library/heroshots/old-pic-2.jpg','/uploads/old-pic-2-tmfb2.jpg',NULL,NULL,NULL,NULL,NULL,NULL,750,519,NULL,5),(75,'/library/heroshots/old-pic-3.jpg','/uploads/old-pic-3-nps1p.jpg',NULL,NULL,NULL,NULL,NULL,NULL,500,500,NULL,5),(76,'/library/heroshots/old-pic-1.jpg','/uploads/old-pic-1-s899f.jpg',NULL,NULL,NULL,NULL,NULL,NULL,750,510,NULL,5);
/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photo_group`
--

DROP TABLE IF EXISTS `photo_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photo_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for the slideshow/gallery group',
  `name` varchar(255) NOT NULL,
  `menu_label` varchar(255) DEFAULT NULL,
  `type` enum('C','G','S') NOT NULL DEFAULT 'S' COMMENT 'C - Carousel, G - Gallery, S - Slideshow(Default)',
  `show_in_cms` enum('N','Y') NOT NULL DEFAULT 'Y',
  `show_on_gallery_page` enum('N','Y') NOT NULL DEFAULT 'N',
  `rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photo_group`
--

LOCK TABLES `photo_group` WRITE;
/*!40000 ALTER TABLE `photo_group` DISABLE KEYS */;
INSERT INTO `photo_group` VALUES (1,'Home Page Slideshow',NULL,'S','Y','N',NULL),(3,'The Farm - Cathedral Peak Statation','The Farm - Cathedral Peak Statation','G','Y','Y',1),(4,'The Lodge','The Lodge','G','Y','Y',2),(5,'History of the Lodge','History of the Lodge','G','Y','Y',3);
/*!40000 ALTER TABLE `photo_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `redirect`
--

DROP TABLE IF EXISTS `redirect`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `redirect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `old_url` longtext NOT NULL,
  `new_url` longtext,
  `status_code` int(11) NOT NULL DEFAULT '301',
  `status` enum('A','H','D') NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `redirect`
--

LOCK TABLES `redirect` WRITE;
/*!40000 ALTER TABLE `redirect` DISABLE KEYS */;
INSERT INTO `redirect` VALUES (1,'https://newbasecms.netzone.nz/about-us','https://newbasecms.netzone.nz/',301,'D'),(2,'https://newbasecms.netzone.nz/tours','https://newbasecms.netzone.nz/about-us',301,'H');
/*!40000 ALTER TABLE `redirect` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(150) DEFAULT NULL,
  `person_location` varchar(150) DEFAULT NULL,
  `photo_path` varchar(225) DEFAULT NULL,
  `description` text,
  `date_posted` date DEFAULT NULL,
  `status` enum('A','D','H') CHARACTER SET latin1 NOT NULL DEFAULT 'H',
  `rank` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,'John Doe','Auckland, New Zealand','/library/general/jonathan-bean-8540-unsplash.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin at accumsan leo. Maecenas eget lorem sit amet quam tempus faucibus. Nullam pellentesque vehicula elementum. Quisque pharetra sed turpis nec porta. Nulla facilisi. Proin at egestas leo. Aliquam eget eros magna.','2017-10-23','A',1),(2,'Jane Doe','Christchurch','/library/avatars/avatar2.png','Maecenas vel lacus facilisis, consequat augue nec, viverra nisi. Phasellus lacinia, eros dictum varius faucibus, nisi arcu aliquam sem, ut dignissim justo neque in quam. Nullam hendrerit nulla sed blandit vehicula.','2017-10-09','A',2),(3,'Scott Doe','Auckland','/library/avatars/avatar1.png','Aenean diam quam, scelerisque eget lorem in, pretium auctor ipsum. Praesent nec enim diam. Sed iaculis porta eros, vitae ornare leo sagittis vitae. Aliquam id tellus lobortis, faucibus ligula ut, accumsan nisi. Integer blandit iaculis neque ac accumsan. Morbi vitae nisi eleifend, ullamcorper tellus vel, lacinia sapien.','2017-10-08','A',3),(4,'Lucas Doe','Sydney','/library/avatars/avatar2.png','Nunc semper orci nisl, vel sagittis nibh aliquam non. Curabitur mi justo, congue in ante a, auctor vehicula ipsum. Praesent sodales tellus vitae malesuada viverra. Integer mi eros, varius quis massa porta, imperdiet ullamcorper lacus.','2017-10-13','A',5),(5,'Ellie Doe','Perth','','Suspendisse molestie imperdiet massa, porta sodales dolor elementum non. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam pretium consectetur leo, eget vulputate nibh pulvinar a. Aliquam erat volutpat.','2017-10-12','A',4),(6,'Untitled',NULL,NULL,NULL,NULL,'D',0),(7,'Tester','Auckland','/library/general/mathew-waters-38056-unsplash.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus id posuere ante, eget varius sem. Sed semper, neque at tempus dignissim, dolor ligula aliquet arcu, ut ornare nisi mauris vitae urna. Suspendisse lobortis libero non lectus dictum tristique. Nulla vestibulum dignissim placerat. Fusce commodo pellentesque ante, sit amet pretium mi volutpat sed. Phasellus tincidunt ipsum in mi sodales facilisis sed vitae mi. Curabitur mollis orci quis sem pulvinar facilisis. Fusce eleifend gravida mattis. Duis sed tempor eros. Cras bibendum tempus lorem et vulputate. In id condimentum nunc. Aenean non quam ornare, fermentum mi ac, laoreet lorem.','2018-08-01','D',10),(8,'Tester','Auckland','/library/heroshots/DJI_0019ret2.jpg','TEST ipsum dolor sit amet, consectetur adipiscing elit. Etiam nibh augue, tempus non tristique non, pharetra ut mi. Nulla maximus ultricies quam eu condimentum. Curabitur et dictum mi. Integer a porta urna, id porta lorem. Pellentesque efficitur elementum leo nec convallis. Pellentesque at urna vestibulum, tincidunt sem eget, fringilla elit. Duis vulputate placerat rhoncus. Quisque consectetur, lorem eu sagittis efficitur, quam arcu eleifend mauris, id dictum tortor lorem in ligula. Nunc eu euismod lacus, vitae vulputate quam.','2018-08-01','D',20);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_links`
--

DROP TABLE IF EXISTS `social_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `icon_cls` varchar(255) NOT NULL,
  `rank` int(11) DEFAULT NULL,
  `is_external` enum('N','Y') NOT NULL DEFAULT 'Y',
  `is_active` enum('N','Y') NOT NULL DEFAULT 'Y',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_links`
--

LOCK TABLES `social_links` WRITE;
/*!40000 ALTER TABLE `social_links` DISABLE KEYS */;
INSERT INTO `social_links` VALUES (1,'Facebook','https://www.facebook.com','Join us on Facebook','fa fa-facebook',1,'Y','Y'),(2,'Instagram',NULL,'Follow us on Instagram','fa fa-instagram',2,'Y','Y'),(3,'Twitter',NULL,'Follow us on Twitter','fa fa-twitter',3,'Y','Y'),(4,'Pintrest',NULL,'Follow us on Pinterest\n','fa fa-pinterest',4,'Y','Y'),(5,'Youtube',NULL,'Follow us on Youtube','social social-youtube',5,'Y','Y'),(6,'Tripadvisor',NULL,'Follow us on Tripadvisor','fa fa-tripadvisor',6,'Y','Y'),(7,'LinkedIn',NULL,'Follow us on LinkedIn','fa fa-linkedin',7,'Y','Y');
/*!40000 ALTER TABLE `social_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `templates_normal`
--

DROP TABLE IF EXISTS `templates_normal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `templates_normal` (
  `tmpl_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key for template',
  `tmpl_name` varchar(100) NOT NULL COMMENT 'Template name',
  `tmpl_path` varchar(100) NOT NULL COMMENT 'Template URL (i.e. ''default'', ''shop'', ''googlemap'' etc). It is recommended that you leave the extension up to the application/code.',
  `tmpl_showincms` enum('N','Y') NOT NULL DEFAULT 'Y',
  `cms_preview_thumb_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tmpl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templates_normal`
--

LOCK TABLES `templates_normal` WRITE;
/*!40000 ALTER TABLE `templates_normal` DISABLE KEYS */;
INSERT INTO `templates_normal` VALUES (1,'Home','index.tmpl','N',NULL),(2,'Default','default.tmpl','Y',NULL),(3,'Stay','stay.tmpl','Y',NULL);
/*!40000 ALTER TABLE `templates_normal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-30 15:40:38
