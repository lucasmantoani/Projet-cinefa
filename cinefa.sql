-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: cinefa
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.41-MariaDB-0ubuntu0.18.04.1

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
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actors` (
  `id_actor` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `age` int(20) NOT NULL,
  `links` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_actor`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actors`
--

LOCK TABLES `actors` WRITE;
/*!40000 ALTER TABLE `actors` DISABLE KEYS */;
INSERT INTO `actors` VALUES (1,'Brad Pitt','homme',55,'https://s-i.huffpost.com/gen/4849672/thumbs/o-BRAD-PITT-900.jpg?16'),(2,'Sigourney Weaver','femme',69,'http://cdn.collider.com/wp-content/uploads/sigourney-weaver-alien-1-428x600.jpg'),(3,'Naomi Watts','femme',50,'http://2.bp.blogspot.com/-WpXsaM0XFn0/VLLPk8Pg-8I/AAAAAAAAGio/Wm8mg6o-kig/s1600/Naomi%2BWatts2.jpg'),(4,'Malcolm McDowell','homme',75,'https://iv1.lisimg.com/image/3470561/675full-malcolm-mcdowell.jpg'),(5,'Adrien Brody','homme',45,'https://www.theplace2.ru/cache/archive/adrien_brody/img/39(3)-gthumb-gwdata1200-ghdata1200-gfitdatamax.jpg'),(7,'Tom Cruise','Hommr',56,'https://i.pinimg.com/originals/a8/ab/3c/a8ab3c05aede74706b79aabfe2a4352e.jpg');
/*!40000 ALTER TABLE `actors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id_category` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `creation_date` year(4) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'films street crédibles',2018,'2'),(2,'films sympa',2019,'3'),(4,'films cool',2019,'2'),(30,'Lugras',2019,'51'),(26,'bruh',2019,'45'),(27,'Déja vu',2019,'45'),(28,'films droles',2019,'47'),(29,'maliste',2019,'49'),(25,'Films de lucas',2019,'2'),(31,'films cool',2019,'52');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category_content`
--

DROP TABLE IF EXISTS `category_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category_content` (
  `id_movies` int(20) NOT NULL,
  `id_category` int(20) NOT NULL,
  PRIMARY KEY (`id_movies`,`id_category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_content`
--

LOCK TABLES `category_content` WRITE;
/*!40000 ALTER TABLE `category_content` DISABLE KEYS */;
INSERT INTO `category_content` VALUES (1,1),(1,31),(2,2),(2,25),(4,2),(4,4),(4,26),(4,27),(4,29),(5,28),(6,2);
/*!40000 ALTER TABLE `category_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directors`
--

DROP TABLE IF EXISTS `directors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directors` (
  `id_director` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `age` int(20) NOT NULL,
  `links` varchar(1000) NOT NULL,
  PRIMARY KEY (`id_director`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directors`
--

LOCK TABLES `directors` WRITE;
/*!40000 ALTER TABLE `directors` DISABLE KEYS */;
INSERT INTO `directors` VALUES (1,'Stanley Kubrick','Homme',70,'https://upload.wikimedia.org/wikipedia/commons/5/58/KubrickForLook.jpg'),(2,'Ridley Scott','Homme',81,'https://www.latimes.com/resizer/9KK00sNYO3lcUds-UoKVRQx3M58=/800x0/arc-anglerfish-arc2-prod-tronc.s3.amazonaws.com/public/IDZHPSCU4ZD7VJLGCQSDFBFTKI.jpg'),(3,'David Lynch','Homme',73,'https://upload.wikimedia.org/wikipedia/commons/0/00/David_Lynch_Cannes_2017.jpg'),(4,'David Fincher','Homme',56,'https://s2.qwant.com/thumbr/0x380/4/0/4596f378bfccd429efb6972e61febbdbe4632920b3069fefae5b43c908a21f/David-Fincher.jpg?u=http%3A%2F%2Fmadfilm.org%2Fwp-content%2Fuploads%2F2014%2F10%2FDavid-Fincher.jpg&q=0&b=1&p=0&a=1'),(5,'Roman Polanski','Homme',85,'https://medias.unifrance.org/medias/208/90/23248/format_page/media.jpg'),(6,'James Cameron','Homme',64,'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/James_Cameron_by_Gage_Skidmore.jpg/800px-James_Cameron_by_Gage_Skidmore.jpg');
/*!40000 ALTER TABLE `directors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movie_notes`
--

DROP TABLE IF EXISTS `movie_notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movie_notes` (
  `id_movies` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id_movies`,`id_user`,`note`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movie_notes`
--

LOCK TABLES `movie_notes` WRITE;
/*!40000 ALTER TABLE `movie_notes` DISABLE KEYS */;
INSERT INTO `movie_notes` VALUES (2,2,0),(2,2,2),(2,2,4),(2,2,5),(3,2,5),(4,2,0),(4,2,5),(5,49,3),(7,2,4),(7,2,5);
/*!40000 ALTER TABLE `movie_notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movies` (
  `id_movies` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `year_released` int(11) NOT NULL,
  `id_director` int(11) NOT NULL,
  `links` varchar(1000) NOT NULL,
  `Genre` varchar(30) NOT NULL,
  PRIMARY KEY (`id_movies`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
/*!40000 ALTER TABLE `movies` DISABLE KEYS */;
INSERT INTO `movies` VALUES (2,'Alien, le huitième passager ',1979,2,'https://media.senscritique.com/media/000006886214/source_big/Alien_Le_8eme_Passager.jpg','Horreur'),(1,'Orange mécanique',1972,1,'https://p6.storage.canalblog.com/64/57/1299180/102005100.jpg','Anticipation'),(3,'Mulholland Drive',2001,3,'https://static.rogerebert.com/uploads/movie/movie_poster/mulholland-dr-2001/large_fMC8JBWx2VjsJ53JopAcFjqmlYv.jpg','Drame'),(4,'Fight Club',1999,4,'https://img-3.journaldesfemmes.fr/YXYKTviPn-dBhrJoeFTgF5CLDa4=/305x/smart/39662640b49d41f0bf11f9c2b7821109/ccmcms-jdf/10188552-fox-pictures-regency-entreprises.jpg','Drame'),(5,'Le pianiste',2002,5,'https://p5.storage.canalblog.com/53/30/1447510/110150579.jpg','Drame'),(6,'Alien, le retour',1986,6,'https://upload.wikimedia.org/wikipedia/fr/f/f4/Aliens%2C_le_retour.png','Horreur'),(7,'Eyes wide shut',1999,1,'http://2.bp.blogspot.com/-8Nmooer5Wqg/VqlN5F3f6ZI/AAAAAAAAKfY/_2hrdz5d378/s1600/Eyes_Wide_Shut.jpg','chelou');
/*!40000 ALTER TABLE `movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plays_in`
--

DROP TABLE IF EXISTS `plays_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plays_in` (
  `id_movies` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plays_in`
--

LOCK TABLES `plays_in` WRITE;
/*!40000 ALTER TABLE `plays_in` DISABLE KEYS */;
INSERT INTO `plays_in` VALUES (4,1),(2,2),(3,3),(1,4),(5,5),(6,2),(7,7);
/*!40000 ALTER TABLE `plays_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `ref_users` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(20) NOT NULL,
  `motdepasse` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  PRIMARY KEY (`ref_users`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'lucas01','lucas','2 rue aimée','lucas@gmail.com',637131799),(3,'arnaud57','arnaud','veymerange','arnaud@nasa.com',2147483647),(5,'herve','ifa2018','padilla','ifa@ifa.com',101010101),(41,'arnaudLePlusBo','tgcpasvrai','lucas@lecaca.fr','tuvaspasregardertabasededonnée',0),(42,'lucas22','lucasbruh','3 rue','lu@cas.fr',619485926),(43,'adrien','123','ruerue','lala@lala.com',101010101),(44,'Tof','prout','13 résidence du pendu 92000 Transylvanie','peres@prout.fr',662329546),(45,'ubuntor','lucas','2 rue bruh','lucas@man@gmail.com',632323232),(46,'arnaud','arnaud','2 rue ','ar@naud.cm',6666),(47,'maxime','bruh','rgrg','maxime@gmail.com',666),(48,'\'simon\'','aqwzsx','aqwzsx','azr@gmail.com',987),(49,'simon','azerty','azer','azz@gmail.com',0),(50,'crone123','1234','Mon adresse','va.crone@gmail.com',0),(51,'Lugras','lugras','lugras@mail.fr','lugras@mail.fr',0),(52,'lucas0101','azerty','sdvsdvsd','sdvsdv@sdvsd.fr',658745215);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-25 19:50:50
