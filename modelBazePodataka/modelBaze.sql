CREATE DATABASE  IF NOT EXISTS `pomeranac` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `pomeranac`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: pomeranac
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prava_pristupa_id` int(11) NOT NULL,
  `prezime` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ime` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `online` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_korisnici_prava_pristupa_idx` (`prava_pristupa_id`),
  CONSTRAINT `fk_korisnici_prava_pristupa` FOREIGN KEY (`prava_pristupa_id`) REFERENCES `prava_pristupa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnici`
--

LOCK TABLES `korisnici` WRITE;
/*!40000 ALTER TABLE `korisnici` DISABLE KEYS */;
/*!40000 ALTER TABLE `korisnici` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prava_pristupa`
--

DROP TABLE IF EXISTS `prava_pristupa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prava_pristupa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prava_pristupa`
--

LOCK TABLES `prava_pristupa` WRITE;
/*!40000 ALTER TABLE `prava_pristupa` DISABLE KEYS */;
/*!40000 ALTER TABLE `prava_pristupa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sadrzaj`
--

DROP TABLE IF EXISTS `sadrzaj`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sadrzaj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sadrzaj` text COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `korisnici_id` int(11) NOT NULL,
  `tip_sadrzaja_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sadrzaj_korisnici1_idx` (`korisnici_id`),
  KEY `fk_sadrzaj_tip_sadrzaja1_idx` (`tip_sadrzaja_id`),
  CONSTRAINT `fk_sadrzaj_korisnici1` FOREIGN KEY (`korisnici_id`) REFERENCES `korisnici` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_sadrzaj_tip_sadrzaja1` FOREIGN KEY (`tip_sadrzaja_id`) REFERENCES `tip_sadrzaja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sadrzaj`
--

LOCK TABLES `sadrzaj` WRITE;
/*!40000 ALTER TABLE `sadrzaj` DISABLE KEYS */;
/*!40000 ALTER TABLE `sadrzaj` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tip_sadrzaja`
--

DROP TABLE IF EXISTS `tip_sadrzaja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tip_sadrzaja` (
  `id` int(11) NOT NULL,
  `naziv` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='naziv={''tekst'', ''mail'', ''link'', ''galerija''}';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tip_sadrzaja`
--

LOCK TABLES `tip_sadrzaja` WRITE;
/*!40000 ALTER TABLE `tip_sadrzaja` DISABLE KEYS */;
/*!40000 ALTER TABLE `tip_sadrzaja` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-30 13:35:21
