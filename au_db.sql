CREATE DATABASE  IF NOT EXISTS `auction_test1` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `auction_test1`;
-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: auction_test1
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1

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
-- Table structure for table `Themes`
--

DROP TABLE IF EXISTS `Themes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Themes` (
  `theme_id` int(11) NOT NULL AUTO_INCREMENT,
  `Theme_Name` varchar(256) NOT NULL,
  PRIMARY KEY (`theme_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Themes`
--

LOCK TABLES `Themes` WRITE;
/*!40000 ALTER TABLE `Themes` DISABLE KEYS */;
INSERT INTO `Themes` VALUES (1,'badges'),(2,'ru_before_1917'),(3,'ru_1917_1991'),(4,'ru_after_1991'),(5,'foreign');
/*!40000 ALTER TABLE `Themes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auctions`
--

DROP TABLE IF EXISTS `auctions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auctions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date_Start` datetime NOT NULL,
  `Date_Finish` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auctions`
--

LOCK TABLES `auctions` WRITE;
/*!40000 ALTER TABLE `auctions` DISABLE KEYS */;
INSERT INTO `auctions` VALUES (1,'2001-10-18 00:00:00','2001-11-18 00:00:00'),(2,'2018-10-02 00:00:00','2018-11-02 00:00:00');
/*!40000 ALTER TABLE `auctions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bets`
--

DROP TABLE IF EXISTS `bets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bets` (
  `bet_id` int(11) NOT NULL AUTO_INCREMENT,
  `lot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bet_value` decimal(15,2) NOT NULL,
  `bet_time` datetime NOT NULL,
  PRIMARY KEY (`bet_id`),
  KEY `fk_bets_lot_idx` (`lot_id`),
  KEY `fk_bets_user_idx` (`user_id`),
  CONSTRAINT `fk_bets_lot` FOREIGN KEY (`lot_id`) REFERENCES `lots` (`id_lot`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bets`
--

LOCK TABLES `bets` WRITE;
/*!40000 ALTER TABLE `bets` DISABLE KEYS */;
INSERT INTO `bets` VALUES (4,1,4,200.00,'2018-10-10 16:25:10'),(5,1,4,200.00,'2018-10-10 16:27:29'),(6,1,4,200.00,'2018-10-10 18:09:30'),(7,2,4,200.00,'2018-10-10 18:41:28'),(8,1,4,102.00,'2018-10-10 19:40:18'),(9,2,4,50.00,'2018-10-10 19:41:04'),(10,1,4,100.00,'2018-10-10 19:41:28'),(11,1,4,200.00,'2018-10-10 19:41:34'),(12,1,4,200.00,'2018-10-10 19:42:57'),(13,1,4,102.00,'2018-10-10 19:43:22'),(14,3,4,102.00,'2018-10-10 19:44:49'),(15,3,4,102.00,'2018-10-10 19:45:01'),(16,3,4,102.00,'2018-10-10 19:45:18'),(17,3,4,102.00,'2018-10-10 19:46:44'),(18,3,4,102.00,'2018-10-10 19:47:00'),(19,3,4,102.00,'2018-10-10 19:47:07'),(20,3,4,102.00,'2018-10-10 19:48:29'),(21,3,4,102.00,'2018-10-10 19:48:34'),(22,3,4,102.00,'2018-10-10 19:50:24'),(23,3,4,102.00,'2018-10-10 19:50:44'),(24,3,4,102.00,'2018-10-10 19:50:52'),(25,3,4,10.00,'2018-10-10 19:54:41'),(26,3,4,10.00,'2018-10-10 19:55:06'),(27,3,4,113.00,'2018-10-10 20:00:40'),(28,3,4,114.86,'2018-10-10 20:12:21'),(29,3,4,113.00,'2018-10-10 20:14:33'),(30,3,4,114.86,'2018-10-10 20:15:09'),(31,3,5,113.00,'2018-10-10 20:24:31'),(32,3,4,115.00,'2018-10-10 20:28:29'),(33,4,8,102.00,'2018-10-11 09:58:47'),(34,4,8,104.04,'2018-10-12 08:17:58'),(35,4,4,106.12,'2018-10-12 08:23:32'),(36,4,4,110.00,'2018-10-12 08:24:03'),(37,4,8,120.00,'2018-10-12 11:05:43'),(38,4,8,120.00,'2018-10-12 12:46:56'),(39,4,4,122.40,'2018-10-12 12:47:57'),(40,4,4,130.00,'2018-10-12 12:48:21'),(41,4,4,130.00,'2018-10-12 12:49:48'),(42,4,4,135.00,'2018-10-12 12:50:36'),(43,4,5,137.70,'2018-10-12 12:52:08'),(44,4,4,150.00,'2018-10-12 12:52:31'),(45,4,4,146.13,'2018-10-12 13:03:02'),(46,4,8,150.00,'2018-10-12 13:03:14');
/*!40000 ALTER TABLE `bets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images` (
  `id_lot_image` int(11) NOT NULL AUTO_INCREMENT,
  `image_link` varchar(512) NOT NULL,
  PRIMARY KEY (`id_lot_image`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
INSERT INTO `images` VALUES (1,'https://coinsbolhov.ru/upload/thumbs/cache/ia/ia/aa98ae6d504e507de3a5484a855119be.jpg'),(2,'http://monateka.com/images/1413536.jpg'),(3,'https://images.unian.net/photos/2017_03/thumb_files/1000_545_1490686496-4500.jpg');
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images_for_lot`
--

DROP TABLE IF EXISTS `images_for_lot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `images_for_lot` (
  `lot_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  PRIMARY KEY (`lot_id`,`image_id`),
  KEY `fk_images_for_lot_2_idx` (`image_id`),
  CONSTRAINT `fk_images_for_lot_1` FOREIGN KEY (`lot_id`) REFERENCES `lots` (`id_lot`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_images_for_lot_2` FOREIGN KEY (`image_id`) REFERENCES `images` (`id_lot_image`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images_for_lot`
--

LOCK TABLES `images_for_lot` WRITE;
/*!40000 ALTER TABLE `images_for_lot` DISABLE KEYS */;
INSERT INTO `images_for_lot` VALUES (1,1),(1,2),(1,3);
/*!40000 ALTER TABLE `images_for_lot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lots`
--

DROP TABLE IF EXISTS `lots`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lots` (
  `id_lot` int(11) NOT NULL AUTO_INCREMENT,
  `lot_Date_Finish` datetime NOT NULL,
  `lot_name` varchar(45) NOT NULL,
  `lot_description` varchar(256) NOT NULL,
  `lot_min_price` decimal(15,2) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `lot_next_bet` decimal(15,2) NOT NULL,
  `lot_hidden_bet` decimal(15,2) NOT NULL,
  `lot_current_leader` int(11) DEFAULT NULL,
  `lot_last_bet` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_lot`),
  KEY `fk_lot_auction_idx` (`auction_id`),
  KEY `fk_lots_1_idx` (`lot_current_leader`),
  CONSTRAINT `fk_lot_auction` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_lots_1` FOREIGN KEY (`lot_current_leader`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lots`
--

LOCK TABLES `lots` WRITE;
/*!40000 ALTER TABLE `lots` DISABLE KEYS */;
INSERT INTO `lots` VALUES (1,'2020-10-18 00:00:00','pound','1 pound coin 1850',100.00,1,102.00,102.00,4,NULL),(2,'2018-10-08 00:00:00','dime','1 dime coin',100.00,1,200.00,50.00,4,NULL),(3,'2019-01-01 00:00:00','qwe','qwe',100.00,1,113.00,115.00,4,NULL),(4,'2019-01-01 00:00:00','testing v3','lot for testing bet func',100.00,1,153.00,153.00,4,'150.00');
/*!40000 ALTER TABLE `lots` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes_for_auction`
--

DROP TABLE IF EXISTS `themes_for_auction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `themes_for_auction` (
  `auction_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  PRIMARY KEY (`auction_id`,`theme_id`),
  KEY `fk_themes_for_auction_2_idx` (`theme_id`),
  CONSTRAINT `fk_themes_for_auction_1` FOREIGN KEY (`auction_id`) REFERENCES `auctions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_themes_for_auction_2` FOREIGN KEY (`theme_id`) REFERENCES `Themes` (`theme_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes_for_auction`
--

LOCK TABLES `themes_for_auction` WRITE;
/*!40000 ALTER TABLE `themes_for_auction` DISABLE KEYS */;
INSERT INTO `themes_for_auction` VALUES (1,1),(1,2),(1,3),(2,4),(1,5);
/*!40000 ALTER TABLE `themes_for_auction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `themes_for_lot`
--

DROP TABLE IF EXISTS `themes_for_lot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `themes_for_lot` (
  `lot_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  PRIMARY KEY (`lot_id`,`theme_id`),
  KEY `fk_themes_for_lot_2_idx` (`theme_id`),
  CONSTRAINT `fk_themes_for_lot_1` FOREIGN KEY (`lot_id`) REFERENCES `lots` (`id_lot`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_themes_for_lot_2` FOREIGN KEY (`theme_id`) REFERENCES `Themes` (`theme_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `themes_for_lot`
--

LOCK TABLES `themes_for_lot` WRITE;
/*!40000 ALTER TABLE `themes_for_lot` DISABLE KEYS */;
INSERT INTO `themes_for_lot` VALUES (1,5);
/*!40000 ALTER TABLE `themes_for_lot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_hash` varchar(32) DEFAULT '0',
  `user_ip` int(11) DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,'msk','28c8edde3d61a0411511d3b1866f0636','2',0),(5,'qwe','28c8edde3d61a0411511d3b1866f0636','2',0),(6,'qwer','28c8edde3d61a0411511d3b1866f0636','0',0),(7,'abe','28c8edde3d61a0411511d3b1866f0636','0',0),(8,'poi','28c8edde3d61a0411511d3b1866f0636','0',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'auction_test1'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-15  9:03:45
