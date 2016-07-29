-- MySQL dump 10.13  Distrib 5.5.49, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gozpeak_dev
-- ------------------------------------------------------
-- Server version	5.5.49-0+deb8u1

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
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `organizer` varchar(20) NOT NULL,
  `language` varchar(12) NOT NULL,
  `eventname` varchar(255) NOT NULL,
  `eventdesc` varchar(255) NOT NULL,
  `eventtype` varchar(10) NOT NULL,
  `eventplace` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eventdatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (6,'TCHO','Espagnol','SPORT','faire du sport','runzpeak','everywhere','2015-03-14 09:53:41','0000-00-00 00:00:00'),(7,'ha','Espagnol','Ping-Pong','Je propose un petit \'ping-pong\' sur les tables extÃ©rieurs, vers le parking Saint-Martin. ','runzpeak','Parking de Saint-Martin','2015-02-15 16:21:44','0000-00-00 00:00:00'),(8,'pingouin','francais','triathlon','','run','Vers CHez moi','2015-02-15 16:26:12','0000-00-00 00:00:00'),(9,'pingouin','allemand','course','qesrdfg','runzpeak','pas loin','2015-02-15 16:28:10','0000-00-00 00:00:00'),(90,'ha','espagnol','Courir','Courir au parc du Thabor','runzpeak','Parc du Thabor, Rennes','2015-04-04 10:16:33','0000-00-00 00:00:00'),(95,'pingouin','anglais','Just to speak with a beer ;)','Come to drink a beer with us at the Irish PUB !','runzpeak','Shamrock Bar, rue saint-hélier','2015-04-04 23:04:09','0000-00-00 00:00:00'),(100,'ha','espagnol','Gym et Renforcement','Faire de la gym et du renforcement musculaire au parc des Gayeulles sur les machines','runzpeak','Parc des Gayeulles, Rennes','2015-04-04 10:16:19','0000-00-00 00:00:00'),(102,'test','japonais','Ceci est un test plus long de nom d\'evenement, afin de voir comment reagit le multi-ligne ! ','Ceci est un test plus long de nom d\'evenement, afin de voir comment reagit le multi-ligne ! ','artzpeak','N\'importe ou','2015-04-05 16:46:01','0000-00-00 00:00:00'),(103,'jean','espagnol','Football','','runzpeak','AuTerrain, rue de tregain','2015-04-17 18:56:29','0000-00-00 00:00:00'),(104,'jean','espagnol','Un foot','','runzpeak','Au terrain libre, quartier Maurepas','2015-04-17 19:06:19','0000-00-00 00:00:00'),(105,'jb','anglais','Artistic event','sortie art','run','nulle part','2016-05-15 08:40:02','0000-00-00 00:00:00'),(106,'zpeaktest','allemand','A vos mousses','detente, boire un verre','party','nulle part','2016-07-26 07:58:01','2016-07-26 14:30:30'),(107,'zpeaktest','anglais','Aperotest','apero','party','Shamrock','2016-07-26 08:15:45','2016-10-28 19:30:30'),(108,'demozpeak','japonais','Aperotest','fête brésilienne','party','','2016-07-29 16:52:51','2016-07-30 20:30:00'),(109,'demozpeak','arabe','Marché des lices','Boire un verre au marché','party','','2016-07-29 16:59:01','2016-08-15 12:45:00');
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
  `ideadatetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ideas`
--

LOCK TABLES `ideas` WRITE;
/*!40000 ALTER TABLE `ideas` DISABLE KEYS */;
INSERT INTO `ideas` VALUES (1,'jean','espagnol','Un foot','','runzpeak','Au terrain, quartier Maurepas','2015-04-17 19:11:08','0000-00-00 00:00:00'),(2,'jean','espagnol','Un foot','','runzpeak','quartier maurepas','2015-04-17 19:15:26','0000-00-00 00:00:00'),(3,'jean','italien','Piscine','','runzpeak','St-Georges, Rennes','2015-04-17 19:19:50','0000-00-00 00:00:00'),(4,'jean','anglais','Musee','','artzpeak','beaux-arts','2015-04-18 13:47:21','0000-00-00 00:00:00'),(5,'jean','allemand','Cinema','','artzpeak','Arvor','2015-04-18 13:49:37','0000-00-00 00:00:00'),(6,'jean','espagnol','Foot','','runzpeak','tregain','2015-04-23 20:10:32','0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (5,'rootin','root@localhost','877dba90e1752571ffa32de87',NULL,NULL,NULL,NULL,'2015-02-08 13:12:56',0,'eb12e264314c813d4648c661fb78e44d',0,NULL,NULL),(80,'ha','ha@lol.com','2e3c0feeabaeb595f91f6dcc1639939ea012c490',NULL,NULL,NULL,NULL,'2015-04-12 15:00:11',1,'1498ab918667a109d62c87026c3f97e4',0,NULL,NULL),(83,'jean','jeanbaptiste.philippe2012@campus-eni.fr','aeb365b26cf451e9b84e39e8fec0e028bc886c6a',NULL,NULL,NULL,NULL,'2015-04-16 00:48:29',1,'ff34eecc2f4ad48ed86b33e1f1d5e3cb',0,'NULL','2015-04-17 19:12:11'),(84,'pablo','desormaispablo@gmail.com','40a38f0b11811350282627c629ba7138ce8e4c22',NULL,NULL,NULL,NULL,'2015-04-26 19:02:45',1,'75093072fd5de9cab0807361877df04a',0,NULL,NULL),(153,'activtest','activtest@yopmail.com','$2y$10$a30ongwQYNbCtLSCdVDmM.iE4QQ769zWH/wU8tHTWPfieEBmClV3.',NULL,NULL,NULL,NULL,'2016-06-24 21:37:18',1,'7b43f3a7bf537191b00f535b0a8b169b',0,NULL,NULL),(154,'demozpeak','nginxone@laposte.net','$2y$10$EVSZeQLyn7i6pPGroHXgNOwSsqaOg3/f1H1YUBfb8BGcKvL9QQvSO',NULL,NULL,NULL,NULL,'2016-06-25 07:24:57',0,'7c7179e5e6f48f024a392adf2620dd76',0,NULL,NULL),(167,'zpeaktest','zpeaktest@yopmail.com','$2y$10$FaKVYg.sHjofP8ynRzO5t.tJLdlHSlDzMa9AN9NE0SGWSfoW.amim',NULL,NULL,NULL,NULL,'2016-06-25 12:07:27',1,'bacf3d43f02a1fb6fed26474d81d5707',0,'NULL','0000-00-00 00:00:00'),(168,'Langophonies','langophonies@gmail.com','$2y$10$9el3X2LLWXWTTW0CaqF93OOy1yYv.EfuYySkazCVtbOFZGDKDvNUO',NULL,NULL,NULL,NULL,'2016-06-28 08:52:29',1,'828e290819ba5edea41e0a9bc122f304',0,NULL,NULL),(181,'tryhost','tryhost@yopmail.com','$2y$10$v2Vhnz5jZxP/jGsX7aJ3H.I.Isjm9l4N/QMAXpXh.oT8fYjear0qG',NULL,NULL,NULL,NULL,'2016-07-02 10:20:30',1,'2c39a2872ad40d528abb9f336d395993',0,NULL,NULL),(183,'essaipublic','essai@yopmail.com','$2y$10$NwKJBVaE8C5vZXKN3.1nhe3aNb5yBV7xjktoZtIj7N.OD.0gi.Ag6',NULL,NULL,NULL,NULL,'2016-07-04 19:38:27',0,'f2a34ebed0d7eae3492c0bcf996acf40',0,NULL,NULL),(184,'testteam','testteam@yopmail.com','$2y$10$oKgiz3QNBxn4cvV61wsVYOKox2HIFUwDXdq3BbfACOf5hMzJTjlsy',NULL,NULL,NULL,NULL,'2016-07-11 17:24:18',0,'a5c19a8be7643bd1db036bb6d194a801',0,NULL,NULL),(185,'noregress','noregress@yopmail.com','$2y$10$xK9/avu.DFseAUXUCGdIAuZkGVE4Eau1IVExLtDlW8R.lXzWneyz.',NULL,NULL,NULL,NULL,'2016-07-16 09:43:11',1,'00c74849a038e624a5f064203bea32c5',0,NULL,NULL);
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

-- Dump completed on 2016-07-29 19:00:56
