-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gozpeak_dev
-- ------------------------------------------------------
-- Server version	5.5.50-0+deb8u1

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
INSERT INTO `events` VALUES (6,'TCHO','Espagnol','SPORT','faire du sport','runzpeak','everywhere',NULL,'2015-03-14 09:53:41','0000-00-00 00:00:00',''),(7,'ha','Espagnol','Ping-Pong','Je propose un petit \'ping-pong\' sur les tables extÃ©rieurs, vers le parking Saint-Martin. ','runzpeak','Parking de Saint-Martin',NULL,'2015-02-15 16:21:44','0000-00-00 00:00:00',''),(8,'pingouin','francais','triathlon','','run','Vers CHez moi',NULL,'2015-02-15 16:26:12','0000-00-00 00:00:00',''),(9,'pingouin','breton','course','qesrdfg','runzpeak','pas loin',NULL,'2015-02-15 16:28:10','0000-00-00 00:00:00',''),(90,'ha','espagnol','Courir','Courir au parc du Thabor','runzpeak','Parc du Thabor, Rennes',NULL,'2015-04-04 10:16:33','0000-00-00 00:00:00',''),(95,'pingouin','anglais','Just to speak with a beer ;)','Come to drink a beer with us at the Irish PUB !','runzpeak','Shamrock Bar, rue saint-hélier',NULL,'2015-04-04 23:04:09','0000-00-00 00:00:00',''),(100,'ha','espagnol','Gym et Renforcement','Faire de la gym et du renforcement musculaire au parc des Gayeulles sur les machines','runzpeak','Parc des Gayeulles, Rennes',NULL,'2015-04-04 10:16:19','0000-00-00 00:00:00',''),(102,'test','autre','Ceci est un test plus long de nom d\'evenement, afin de voir comment reagit le multi-ligne ! ','Ceci est un test plus long de nom d\'evenement, afin de voir comment reagit le multi-ligne ! ','artzpeak','N\'importe ou',NULL,'2015-04-05 16:46:01','0000-00-00 00:00:00',''),(103,'jean','espagnol','Football','','runzpeak','AuTerrain, rue de tregain',NULL,'2015-04-17 18:56:29','0000-00-00 00:00:00',''),(104,'jean','espagnol','Un foot','','runzpeak','Au terrain libre, quartier Maurepas',NULL,'2015-04-17 19:06:19','0000-00-00 00:00:00',''),(105,'jb','anglais','Artistic event','sortie art','run','nulle part',NULL,'2016-05-15 08:40:02','0000-00-00 00:00:00',''),(106,'zpeaktest','breton','A vos mousses','detente, boire un verre','party','nulle part',NULL,'2016-07-26 07:58:01','2016-07-26 14:30:30','Intermédiaire'),(108,'demozpeak','autre','Aperotest','fête brésilienne','party','',NULL,'2016-07-29 16:52:51','2016-07-30 20:30:00',''),(109,'demozpeak','autre','Marché des lices','Boire un verre au marché','party','',NULL,'2016-07-29 16:59:01','2016-08-15 12:45:00',''),(110,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:16','2016-10-15 13:50:00',''),(111,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:17','2016-10-15 13:50:00',''),(112,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:17','2016-10-15 13:50:00',''),(113,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:18','2016-10-15 13:50:00',''),(114,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:18','2016-10-15 13:50:00',''),(115,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:19','2016-10-15 13:50:00',''),(116,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:19','2016-10-15 13:50:00',''),(117,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:19','2016-10-15 13:50:00',''),(118,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:31','2016-10-15 13:50:00',''),(119,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:32','2016-10-15 13:50:00',''),(120,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:32','2016-10-15 13:50:00',''),(121,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:33','2016-10-15 13:50:00',''),(122,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:33','2016-10-15 13:50:00',''),(123,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:40','2016-10-15 13:50:00',''),(124,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:41','2016-10-15 13:50:00',''),(125,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:41','2016-10-15 13:50:00',''),(126,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:41','2016-10-15 13:50:00',''),(127,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:44','2016-10-15 13:50:00',''),(128,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:44','2016-10-15 13:50:00',''),(129,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:21:44','2016-10-15 13:50:00',''),(130,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:31:00','2016-10-15 13:50:00',''),(131,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:31:01','2016-10-15 13:50:00',''),(132,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:31:01','2016-10-15 13:50:00',''),(133,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:31:01','2016-10-15 13:50:00',''),(134,'demozpeak','anglais','Anywhere','Test paginate party','party','',NULL,'2016-07-30 16:31:02','2016-10-15 13:50:00',''),(136,'','autre','Apéro chinois collaboratif','','eat','',NULL,'2016-08-21 15:11:48','2016-09-04 19:30:00',''),(137,'','portugais','Café découverte Brésil','','eat','',NULL,'2016-08-21 15:14:17','2016-09-14 20:30:00',''),(138,'','anglais','Diner de Thanksgiving','','eat','',NULL,'2016-08-21 15:17:33','2016-11-24 21:00:00',''),(139,'','autre','Repas festif congolais','','eat','',NULL,'2016-08-21 15:18:25','2016-11-29 12:45:00',''),(140,'','francais','Balade gourmande','','eat','',NULL,'2016-08-21 15:20:32','2016-12-13 12:45:00',''),(141,'','espagnol','Atelier cuisine espagnol','','eat','',NULL,'2016-08-21 15:21:43','2016-12-11 20:00:00','');
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
  `ideaphone` int(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ideadatetime` datetime NOT NULL,
  `level_language` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ideas`
--

LOCK TABLES `ideas` WRITE;
/*!40000 ALTER TABLE `ideas` DISABLE KEYS */;
INSERT INTO `ideas` VALUES (7,'caro','Espagnol','Barbacoa argentina','','eat','',NULL,'2016-08-21 15:39:48','2016-11-20 11:45:00',''),(8,'jb','italien','Repas italien','','eat','',NULL,'2016-08-21 15:49:37','2016-08-28 20:50:00',''),(9,'','Espagnol','Restaur','','','A(l\'abridu+ marché',123456789,'2016-08-23 19:55:13','2016-08-25 22:30:00','Débutant'),(11,'','espagnol','Second repas italien','','','Chez moi toujours',123456987,'2016-08-23 20:08:20','2016-08-25 22:30:00','Intermédiaire'),(12,'','portugais','Concert brésil','','','Au bar chat bavard',0,'2016-08-23 20:09:43','2016-08-24 19:15:00','Intermédiaire'),(13,'','français','Concert brésilien','','','Au bar chat bavard',0,'2016-08-23 20:11:33','2016-08-24 22:15:00','Intermédiaire'),(14,'','espagnol','Test','','','Test',0,'2016-08-24 07:02:08','2016-08-05 10:30:00','Intermédiaire'),(15,'','français','Crêperie (st georges)','','','rue vasselot',123456789,'2016-08-27 12:26:25','2016-09-03 22:30:00','Intermédiaire'),(16,'','breton','Boire un verre','','','Atelier de l\'artiste',123456789,'2016-08-27 13:00:50','2016-08-14 14:15:00','Intermédiaire'),(17,'','italien','Courir','','run','La promenade des bonnets rouges',123456789,'2016-08-27 13:03:59','2016-08-24 13:30:00','Intermédiaire'),(18,'','Espagnol','Arttest','','art','Théatre du coin',123456789,'2016-08-27 13:46:13','2016-08-30 18:15:00','Intermédiaire'),(21,'demozpeak','Français','idea1orga','','run','idea1orga',123456789,'2016-08-27 16:05:13','2016-07-29 10:30:00','Intermédiaire'),(22,'jeanbapt','Italien','Musée d\'italie','','art','Place du musée',123456789,'2016-08-31 16:58:54','2016-09-03 14:15:00','Intermédiaire'),(25,'jeanbapt','autre','Discussion sur la culture','','art','Le bar Le hibou',0,'2016-08-31 17:38:55','2016-08-13 18:30:00','advanced'),(26,'jeanbapt','portugais','Apéro concert','','party','Le chat bavard',0,'2016-08-31 17:59:23','2016-09-17 14:30:00','beginner'),(27,'demozpeak','espagnol','jbtestmail','','run','chez moi',0,'2016-09-01 18:11:12','2016-09-17 12:15:00','beginner'),(28,'demozpeak','espagnol','jbtestmail2','','art','chez moi',0,'2016-09-01 18:12:35','2016-09-17 12:15:00','beginner'),(29,'demozpeak','espagnol','jbretestmail','','eat','chez moi',0,'2016-09-01 18:15:02','2016-09-17 12:15:00','beginner'),(30,'demozpeak','espagnol','jbreretestmail','','eat','chez moi',0,'2016-09-01 18:16:03','2016-09-17 12:15:00','beginner'),(31,'demozpeak','espagnol','jbmailtest','','art','chezmoi',0,'2016-09-01 18:16:51','2016-09-17 12:15:00','beginner'),(32,'demozpeak','espagnol','ideeparmail','','party','chez moi',0,'2016-09-01 18:19:22','2016-09-16 17:30:00','middle'),(33,'demozpeak','espagnol','mailing','','run','chez moi',0,'2016-09-01 18:27:48','2016-09-20 17:15:00','beginner'),(34,'demozpeak','portugais','Apéro flechettes','','party','st georges',0,'2016-09-03 07:35:37','2016-10-08 19:30:00','Intermédiaire');
/*!40000 ALTER TABLE `ideas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `members` (
  `id` int(5) NOT NULL DEFAULT '0',
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (83,'jean','jeanbaptiste.philippe2012@campus-eni.fr','aeb365b26cf451e9b84e39e8fec0e028bc886c6a',NULL,NULL,NULL,NULL,'2015-04-16 00:48:29',1,'ff34eecc2f4ad48ed86b33e1f1d5e3cb',0,'NULL','2015-04-17 19:12:11'),(84,'pablo','desormaispablo@gmail.com','40a38f0b11811350282627c629ba7138ce8e4c22',NULL,NULL,NULL,NULL,'2015-04-26 19:02:45',1,'75093072fd5de9cab0807361877df04a',0,NULL,NULL),(100,'jeanbapt','video@yopmail.com','$2y$10$EVSZeQLyn7i6pPGroHXgNOwSsqaOg3/f1H1YUBfb8BGcKvL9QQvSO',NULL,NULL,NULL,NULL,'2016-08-21 16:02:08',1,NULL,0,NULL,NULL),(153,'activtest','activtest@yopmail.com','$2y$10$a30ongwQYNbCtLSCdVDmM.iE4QQ769zWH/wU8tHTWPfieEBmClV3.',NULL,NULL,NULL,NULL,'2016-06-24 21:37:18',1,'7b43f3a7bf537191b00f535b0a8b169b',0,NULL,NULL),(154,'demozpeak','nginxone@laposte.net','$2y$10$EVSZeQLyn7i6pPGroHXgNOwSsqaOg3/f1H1YUBfb8BGcKvL9QQvSO',NULL,NULL,NULL,NULL,'2016-06-25 07:24:57',1,'7c7179e5e6f48f024a392adf2620dd76',0,'JTMvt1ZeBD32','2016-08-18 20:41:25'),(167,'zpeaktest','zpeaktest@yopmail.com','$2y$10$FaKVYg.sHjofP8ynRzO5t.tJLdlHSlDzMa9AN9NE0SGWSfoW.amim',NULL,NULL,NULL,NULL,'2016-06-25 12:07:27',1,'bacf3d43f02a1fb6fed26474d81d5707',0,'NULL','0000-00-00 00:00:00'),(168,'Langophonies','langophonies@gmail.com','$2y$10$9el3X2LLWXWTTW0CaqF93OOy1yYv.EfuYySkazCVtbOFZGDKDvNUO',NULL,NULL,NULL,NULL,'2016-06-28 08:52:29',1,'828e290819ba5edea41e0a9bc122f304',0,NULL,NULL),(181,'tryhost','tryhost@yopmail.com','$2y$10$v2Vhnz5jZxP/jGsX7aJ3H.I.Isjm9l4N/QMAXpXh.oT8fYjear0qG',NULL,NULL,NULL,NULL,'2016-07-02 10:20:30',1,'2c39a2872ad40d528abb9f336d395993',0,NULL,NULL),(184,'testteam','testteam@yopmail.com','$2y$10$oKgiz3QNBxn4cvV61wsVYOKox2HIFUwDXdq3BbfACOf5hMzJTjlsy',NULL,NULL,NULL,NULL,'2016-07-11 17:24:18',0,'a5c19a8be7643bd1db036bb6d194a801',0,NULL,NULL),(185,'noregress','noregress@yopmail.com','$2y$10$xK9/avu.DFseAUXUCGdIAuZkGVE4Eau1IVExLtDlW8R.lXzWneyz.',NULL,NULL,NULL,NULL,'2016-07-16 09:43:11',1,'00c74849a038e624a5f064203bea32c5',0,NULL,NULL);
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

-- Dump completed on 2016-09-03 10:27:23
