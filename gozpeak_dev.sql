-- MySQL dump 10.13  Distrib 5.5.53, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gozpeak_dev
-- ------------------------------------------------------
-- Server version	5.5.53-0ubuntu0.14.04.1

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
-- Table structure for table `contact_stats`
--

DROP TABLE IF EXISTS `contact_stats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_stats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(20) NOT NULL,
  `contact_email` varchar(20) NOT NULL,
  `contact_subject` varchar(20) NOT NULL,
  `contact_message` varchar(255) NOT NULL,
  `contact_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_stats`
--

LOCK TABLES `contact_stats` WRITE;
/*!40000 ALTER TABLE `contact_stats` DISABLE KEYS */;
INSERT INTO `contact_stats` VALUES (1,'Testcontact','nginxone@laposte.net','Object','Ceci est un test de message contact (validation php + envoi des mails).','2017-01-08 21:20:58'),(2,'Testcontact2','nginxone@laposte.net','Object2','Ceci est un message pour tester le submit Javascript.','2017-01-08 21:25:46'),(3,'Testcontact3','nginxone@laposte.net','Object3','Ceci est (encore) un message pour tester le submit Javascript.','2017-01-08 21:38:17');
/*!40000 ALTER TABLE `contact_stats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `organizer` varchar(20) NOT NULL,
  `language` varchar(20) DEFAULT NULL,
  `eventname` varchar(255) NOT NULL,
  `eventdesc` varchar(255) NOT NULL,
  `eventtype` varchar(10) NOT NULL,
  `eventplace` varchar(200) NOT NULL,
  `eventphone` int(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `eventdatetime` datetime NOT NULL,
  `level_language` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (6,'TCHO','Espagnol','SPORT','faire du sport','runzpeak','everywhere',NULL,'2015-03-14 09:53:41','0000-00-00 00:00:00',''),(7,'ha','Espagnol','Ping-Pong','Je propose un petit \'ping-pong\' sur les tables extÃ©rieurs, vers le parking Saint-Martin. ','runzpeak','Parking de Saint-Martin',NULL,'2015-02-15 16:21:44','0000-00-00 00:00:00',''),(9,'pingouin','breton','course','qesrdfg','runzpeak','pas loin',NULL,'2015-02-15 16:28:10','0000-00-00 00:00:00',''),(90,'ha','espagnol','Courir','Courir au parc du Thabor','runzpeak','Parc du Thabor, Rennes',NULL,'2015-04-04 10:16:33','0000-00-00 00:00:00',''),(95,'pingouin','anglais','Just to speak with a beer ;)','Come to drink a beer with us at the Irish PUB !','runzpeak','Shamrock Bar, rue saint-hélier',NULL,'2015-04-04 23:04:09','0000-00-00 00:00:00',''),(100,'ha','espagnol','Gym et Renforcement','Faire de la gym et du renforcement musculaire au parc des Gayeulles sur les machines','runzpeak','Parc des Gayeulles, Rennes',NULL,'2015-04-04 10:16:19','0000-00-00 00:00:00',''),(102,'test','autre','Ceci est un test plus long de nom d\'evenement, afin de voir comment reagit le multi-ligne ! ','Ceci est un test plus long de nom d\'evenement, afin de voir comment reagit le multi-ligne ! ','artzpeak','N\'importe ou',NULL,'2015-04-05 16:46:01','0000-00-00 00:00:00',''),(103,'jean','espagnol','Football','','runzpeak','AuTerrain, rue de tregain',NULL,'2015-04-17 18:56:29','0000-00-00 00:00:00',''),(104,'jean','espagnol','Un foot','','runzpeak','Au terrain libre, quartier Maurepas',NULL,'2015-04-17 19:06:19','0000-00-00 00:00:00',''),(106,'zpeaktest','breton','A vos mousses','detente, boire un verre','party','nulle part',NULL,'2016-07-26 07:58:01','2016-07-26 14:30:30','Intermédiaire'),(108,'demozpeak','espagnol','Aperotest','fête brésilienne','party','',NULL,'2016-07-29 16:52:51','2017-04-05 21:00:00',''),(109,'demozpeak','anglais','Marché des lices','Boire un verre au marché','party','',NULL,'2017-01-05 11:00:00','2017-06-05 21:30:00',''),(136,'','autre','Apéro chinois collaboratif','','eat','',NULL,'2016-08-21 15:11:48','2016-09-04 19:30:00',''),(137,'','portugais','Café découverte Brésil','','eat','',NULL,'2016-08-21 15:14:17','2016-09-14 20:30:00',''),(138,'','anglais','Diner de Thanksgiving','','eat','',NULL,'2016-08-21 15:17:33','2016-11-24 21:00:00',''),(139,'','autre','Repas festif congolais','','eat','',NULL,'2016-08-21 15:18:25','2016-11-29 12:45:00',''),(140,'','francais','Balade gourmande','','eat','',NULL,'2016-08-21 15:20:32','2016-12-13 12:45:00',''),(141,'','espagnol','Atelier cuisine espagnol','','eat','',NULL,'2016-08-21 15:21:43','2016-12-11 20:00:00','');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventusers`
--

DROP TABLE IF EXISTS `eventusers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventusers` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `eventid` int(1) NOT NULL,
  `memberid` int(1) NOT NULL,
  `subscribe_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventusers`
--

LOCK TABLES `eventusers` WRITE;
/*!40000 ALTER TABLE `eventusers` DISABLE KEYS */;
INSERT INTO `eventusers` VALUES (11,139,154,'2016-09-11 17:41:32'),(16,137,154,'2016-09-11 18:53:54'),(19,140,154,'2016-09-21 18:43:12'),(20,138,167,'2016-09-21 21:30:59'),(21,139,167,'2016-09-21 21:58:52'),(24,138,154,'2016-09-28 23:11:07'),(27,141,154,'2016-11-02 18:57:28');
/*!40000 ALTER TABLE `eventusers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ideas`
--

DROP TABLE IF EXISTS `ideas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ideas` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `organizer` varchar(20) NOT NULL,
  `language` varchar(20) DEFAULT NULL,
  `ideaname` varchar(255) NOT NULL,
  `ideadesc` varchar(255) NOT NULL,
  `ideatype` varchar(10) NOT NULL,
  `ideaplace` varchar(200) NOT NULL,
  `ideaphone` int(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ideadatetime` datetime NOT NULL,
  `level_language` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100053 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ideas`
--

LOCK TABLES `ideas` WRITE;
/*!40000 ALTER TABLE `ideas` DISABLE KEYS */;
INSERT INTO `ideas` VALUES (7,'caro','espagnol','Barbacoa argentina','','eat','',NULL,'2016-08-21 15:39:48','2016-11-20 11:45:00',''),(8,'jb','italien','Repas italien','','eat','',NULL,'2016-08-21 15:49:37','2016-08-28 20:50:00',''),(9,'','espagnol','Restaur','','','A(l\'abridu+ marché',123456789,'2016-08-23 19:55:13','2016-08-25 22:30:00','Débutant'),(11,'','espagnol','Second repas italien','','','Chez moi toujours',123456987,'2016-08-23 20:08:20','2016-08-25 22:30:00','Intermédiaire'),(12,'','portugais','Concert brésil','','','Au bar chat bavard',0,'2016-08-23 20:09:43','2016-08-24 19:15:00','Intermédiaire'),(13,'','français','Concert brésilien','','','Au bar chat bavard',0,'2016-08-23 20:11:33','2016-08-24 22:15:00','Intermédiaire'),(14,'','espagnol','Test','','','Test',0,'2016-08-24 07:02:08','2016-08-05 10:30:00','Intermédiaire'),(15,'','français','Crêperie (st georges)','','','rue vasselot',123456789,'2016-08-27 12:26:25','2016-09-03 22:30:00','Intermédiaire'),(16,'','breton','Boire un verre','','','Atelier de l\'artiste',123456789,'2016-08-27 13:00:50','2016-08-14 14:15:00','Intermédiaire'),(18,'','espagnol','Arttest','','art','Théatre du coin',123456789,'2016-08-27 13:46:13','2016-08-30 18:15:00','Intermédiaire'),(22,'jeanbapt','italien','Musée d\'italie','','art','Place du musée',123456789,'2016-08-31 16:58:54','2016-09-03 14:15:00','Intermédiaire'),(25,'jeanbapt','autre','Discussion sur la culture','','art','Le bar Le hibou',0,'2016-08-31 17:38:55','2016-08-13 18:30:00','advanced'),(26,'jeanbapt','portugais','Apéro concert','','party','Le chat bavard',0,'2016-08-31 17:59:23','2016-09-17 14:30:00','beginner'),(28,'demozpeak','espagnol','jbtestmail2','','art','chez moi',0,'2016-09-01 18:12:35','2016-09-17 12:15:00','beginner'),(29,'demozpeak','espagnol','jbretestmail','','eat','chez moi',0,'2016-09-01 18:15:02','2016-09-17 12:15:00','beginner'),(30,'demozpeak','espagnol','jbreretestmail','','eat','chez moi',0,'2016-09-01 18:16:03','2016-09-17 12:15:00','beginner'),(31,'demozpeak','espagnol','jbmailtest','','art','chezmoi',0,'2016-09-01 18:16:51','2016-09-17 12:15:00','beginner'),(32,'demozpeak','espagnol','ideeparmail','','party','chez moi',0,'2016-09-01 18:19:22','2016-09-16 17:30:00','middle'),(34,'demozpeak','portugais','Apéro flechettes','','party','st georges',0,'2016-09-03 07:35:37','2016-10-08 19:30:00','Intermédiaire'),(100000,'jb','italien','Memberstest','','eat','',NULL,'2016-09-10 07:47:48','2016-11-24 20:45:00',''),(100002,'demozpeak','italien','Validation-event-mail','','art','Chez moi',0,'2016-09-10 09:05:13','2016-09-10 15:45:00','Débutant'),(100003,'demozpeak','portugais','revalidmail','','art','revalidmail',0,'2016-09-10 09:13:01','2016-09-10 17:15:00','Débutant'),(100004,'demozpeak','breton','stillvalidmail','','art','chez moi',0,'2016-09-10 09:16:20','2016-09-10 22:30:00','Débutant'),(100005,'demozpeak','italien','finalvalidMAIL','','art','chez moi',0,'2016-09-10 09:18:15','2016-09-10 19:30:00','Débutant'),(100006,'demozpeak','français','Arttestmail','','art','testmail',0,'2016-09-13 19:10:50','2016-09-14 21:15:00','Débutant'),(100012,'demozpeak','multi','Loto du marché','Bonjour, \r\n\r\nJe vous propose d\'aller acheter à manger au marché, puis de se rendre à La Clara vers 14h pour la nouvelle activité Loto Du Marché :)  ','party','Bar La Clara',643735585,'2016-11-05 09:30:36','2016-11-05 12:15:00','Débutant'),(100013,'demozpeak','multi','Repas-jeux','Je vous invite chez moi pour un repas,  amenez ce que vous voulez  (vins, tartes... )  et n\'oubliez pas d\'amener des jeux pour ceux qui en ont  :)','eat','Chez moi',635855595,'2016-11-06 11:48:28','2016-11-10 14:30:00','Intermédiaire'),(100015,'demozpeak','italien','select-test','Test pour voir si le select postevent fonctionne toujours.','art','select-test',0,'2016-12-19 23:28:53','2017-01-06 07:45:00','Intermédiaire'),(100016,'demozpeak','espagnol','Test addmembers','Test addmember function','art','CHez moi',623456789,'2017-01-04 20:34:52','2017-01-06 15:45:00','Intermédiaire'),(100017,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:39','2017-04-16 16:00:00','Débutant'),(100018,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:41','2017-04-16 16:00:00','Débutant'),(100019,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:42','2017-04-16 16:00:00','Débutant'),(100020,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:43','2017-04-16 16:00:00','Débutant'),(100021,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:43','2017-04-16 16:00:00','Débutant'),(100022,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:44','2017-04-16 16:00:00','Débutant'),(100023,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:44','2017-04-16 16:00:00','Débutant'),(100024,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:45','2017-04-16 16:00:00','Débutant'),(100025,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:46','2017-04-16 16:00:00','Débutant'),(100026,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:46','2017-04-16 16:00:00','Débutant'),(100027,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:46','2017-04-16 16:00:00','Débutant'),(100028,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:47','2017-04-16 16:00:00','Débutant'),(100029,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:47','2017-04-16 16:00:00','Débutant'),(100030,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:48','2017-04-16 16:00:00','Débutant'),(100031,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:49','2017-04-16 16:00:00','Débutant'),(100032,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:49','2017-04-16 16:00:00','Débutant'),(100033,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:50','2017-04-16 16:00:00','Débutant'),(100034,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:50','2017-04-16 16:00:00','Débutant'),(100035,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:51','2017-04-16 16:00:00','Débutant'),(100036,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:52','2017-04-16 16:00:00','Débutant'),(100037,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:52','2017-04-16 16:00:00','Débutant'),(100038,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:53','2017-04-16 16:00:00','Débutant'),(100039,'demozpeak','espagnol','MyIdea','MyDesc','art','MyPlace',0,'2017-01-19 19:32:54','2017-04-16 16:00:00','Débutant'),(100040,'0','0','0','0','0','0',0,'2017-01-24 23:26:49','0000-00-00 00:00:00','0'),(100041,'0','0','0','0','0','0',0,'2017-01-24 23:39:05','0000-00-00 00:00:00','0'),(100042,'demozpeak','english','eventautre','desceventdesceventdesceventdesceventdesceventdesceventdescevent','run','eventplace',623456789,'2017-01-25 00:42:05','2017-01-30 21:45:00','beginner'),(100043,'demozpeak','english','eventautre','desceventdesceventdesceventdesceventdesceventdesceventdescevent','run','eventplace',623456789,'2017-01-25 00:42:20','2017-01-30 21:45:00','beginner'),(100044,'demozpeak','english','eventautre','desceventdesceventdesceventdesceventdesceventdesceventdescevent','run','eventplace',623456789,'2017-01-25 00:42:21','2017-01-30 21:45:00','beginner'),(100045,'demozpeak','english','eventautre','desceventdesceventdesceventdesceventdesceventdesceventdescevent','run','eventplace',623456789,'2017-01-25 00:42:55','2017-01-30 21:45:00','beginner'),(100046,'demozpeak','english','eventautre','desceventdesceventdesceventdesceventdesceventdesceventdescevent','run','eventplace',623456789,'2017-01-25 00:50:12','2017-01-30 21:45:00','beginner'),(100050,'0','0','0','0','0','0',0,'2017-01-26 21:57:36','0000-00-00 00:00:00','0'),(100052,'demozpeak','multilanguages','nightevent','Dernière correction pour faire fonctionner le lien.','eat','nightplace',623456789,'2017-01-26 22:02:59','2017-02-23 18:30:00','beginner');
/*!40000 ALTER TABLE `ideas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ideausers`
--

DROP TABLE IF EXISTS `ideausers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ideausers` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `ideaid` int(1) NOT NULL,
  `memberid` int(1) NOT NULL,
  `subscribe_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ideausers`
--

LOCK TABLES `ideausers` WRITE;
/*!40000 ALTER TABLE `ideausers` DISABLE KEYS */;
INSERT INTO `ideausers` VALUES (2,28,154,'0000-00-00 00:00:00'),(3,34,154,'0000-00-00 00:00:00'),(5,2000,167,'0000-00-00 00:00:00'),(6,2000,154,'0000-00-00 00:00:00'),(7,100000,167,'0000-00-00 00:00:00'),(12,100007,188,'0000-00-00 00:00:00'),(13,100007,154,'0000-00-00 00:00:00'),(14,100000,189,'0000-00-00 00:00:00'),(20,7,154,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `ideausers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `speaked_languages` char(70) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `randomkey` varchar(32) DEFAULT NULL,
  `premium` tinyint(1) NOT NULL DEFAULT '0',
  `resetpass_token` varchar(12) DEFAULT NULL,
  `resetpass_expiration` datetime DEFAULT NULL,
  `last_connection` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

/*!40000 ALTER TABLE `members` DISABLE KEYS */;
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-01-27  3:00:04
