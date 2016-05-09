-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gozpeak_dev
-- ------------------------------------------------------
-- Server version	5.5.47-0+deb8u1

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
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `organizer` varchar(20) DEFAULT NULL,
  `language` varchar(12) NOT NULL,
  `eventname` varchar(255) NOT NULL,
  `eventdesc` varchar(255) DEFAULT NULL,
  `eventtype` varchar(10) NOT NULL,
  `eventplace` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eventhour` int(2) DEFAULT NULL,
  `eventminutes` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (6,'TCHO','Espagnol','SPORT','faire du sport','runzpeak','everywhere','2015-03-14 09:53:41',NULL,NULL),(7,'ha','Espagnol','Ping-Pong','Je propose un petit \'ping-pong\' sur les tables extÃ©rieurs, vers le parking Saint-Martin. ','runzpeak','Parking de Saint-Martin','2015-02-15 16:21:44',NULL,NULL),(8,'pingouin','francais','triathlon','','run','Vers CHez moi','2015-02-15 16:26:12',NULL,NULL),(9,'pingouin','allemand','course','qesrdfg','runzpeak','pas loin','2015-02-15 16:28:10',NULL,NULL),(90,'ha','espagnol','Courir','Courir au parc du Thabor','runzpeak','Parc du Thabor, Rennes','2015-04-04 10:16:33',NULL,NULL),(95,'pingouin','anglais','Just to speak with a beer ;)','Come to drink a beer with us at the Irish PUB !','runzpeak','Shamrock Bar, rue saint-hélier','2015-04-04 23:04:09',NULL,NULL),(100,'ha','espagnol','Gym et Renforcement','Faire de la gym et du renforcement musculaire au parc des Gayeulles sur les machines','runzpeak','Parc des Gayeulles, Rennes','2015-04-04 10:16:19',NULL,NULL),(102,'test','japonais','Ceci est un test plus long de nom d\'evenement, afin de voir comment reagit le multi-ligne ! ','Ceci est un test plus long de nom d\'evenement, afin de voir comment reagit le multi-ligne ! ','artzpeak','N\'importe ou','2015-04-05 16:46:01',NULL,NULL),(103,'jean','espagnol','Football','','runzpeak','AuTerrain, rue de tregain','2015-04-17 18:56:29',NULL,NULL),(104,'jean','espagnol','Un foot','','runzpeak','Au terrain libre, quartier Maurepas','2015-04-17 19:06:19',NULL,NULL);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ideas`
--

DROP TABLE IF EXISTS `ideas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ideas` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `organizer` varchar(20) NOT NULL,
  `language` varchar(12) NOT NULL,
  `ideaname` varchar(255) NOT NULL,
  `ideadesc` varchar(255) NOT NULL,
  `ideatype` varchar(10) NOT NULL,
  `ideaplace` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ideadate` date DEFAULT NULL,
  `ideahour` int(2) DEFAULT NULL,
  `ideaminutes` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ideas`
--

LOCK TABLES `ideas` WRITE;
/*!40000 ALTER TABLE `ideas` DISABLE KEYS */;
INSERT INTO `ideas` VALUES (1,'jean','espagnol','Un foot','','runzpeak','Au terrain, quartier Maurepas','2015-04-17 19:11:08','2015-04-18',NULL,NULL),(2,'jean','espagnol','Un foot','','runzpeak','quartier maurepas','2015-04-17 19:15:26','2015-04-18',NULL,NULL),(3,'jean','italien','Piscine','','runzpeak','St-Georges, Rennes','2015-04-17 19:19:50','2015-04-18',NULL,NULL),(4,'jean','anglais','Musee','','artzpeak','beaux-arts','2015-04-18 13:47:21','2015-04-19',15,15),(5,'jean','allemand','Cinema','','artzpeak','Arvor','2015-04-18 13:49:37','2015-04-19',10,10),(6,'jean','espagnol','Foot','','runzpeak','tregain','2015-04-23 20:10:32','2015-04-24',10,10);
/*!40000 ALTER TABLE `ideas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `randomkey` varchar(32) DEFAULT NULL,
  `premium` tinyint(1) NOT NULL DEFAULT '0',
  `resetpass_token` varchar(12) DEFAULT NULL,
  `resetpass_expiration` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (5,'rootin','root@localhost','877dba90e1752571ffa32de87',NULL,NULL,NULL,NULL,'2015-02-08 13:12:56',0,'eb12e264314c813d4648c661fb78e44d',0,NULL,NULL),(80,'ha','ha@lol.com','2e3c0feeabaeb595f91f6dcc1639939ea012c490',NULL,NULL,NULL,NULL,'2015-04-12 15:00:11',1,'1498ab918667a109d62c87026c3f97e4',0,NULL,NULL),(83,'jean','jeanbaptiste.philippe2012@campus-eni.fr','aeb365b26cf451e9b84e39e8fec0e028bc886c6a',NULL,NULL,NULL,NULL,'2015-04-16 00:48:29',1,'ff34eecc2f4ad48ed86b33e1f1d5e3cb',0,'NULL','2015-04-17 19:12:11'),(84,'pablo','desormaispablo@gmail.com','40a38f0b11811350282627c629ba7138ce8e4c22',NULL,NULL,NULL,NULL,'2015-04-26 19:02:45',1,'75093072fd5de9cab0807361877df04a',0,NULL,NULL),(85,'oneuser','oneuser@yopmail.com','f71fe67a9e4b4ff8318c6773b088abcf3e537073',NULL,NULL,NULL,NULL,'2015-12-25 12:21:10',0,'b8364861ff29af56442b1deeed060272',0,NULL,NULL),(86,'tryit','tryit@yopmail.com','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8',NULL,NULL,NULL,NULL,'2015-12-28 09:48:23',0,'e4d0e3cf1731261b55cf57a6b54f9474',0,NULL,NULL);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-22  9:40:19
