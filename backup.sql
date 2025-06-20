-- MySQL dump 10.13  Distrib 5.5.39, for Win32 (x86)
--
-- Host: localhost    Database: newbase
-- ------------------------------------------------------
-- Server version	5.5.39

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
-- Current Database: `newbase`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `newbase` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `newbase`;

--
-- Table structure for table `atributes`
--

DROP TABLE IF EXISTS `atributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atributes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atribute_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `atribute_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atributes`
--

LOCK TABLES `atributes` WRITE;
/*!40000 ALTER TABLE `atributes` DISABLE KEYS */;
INSERT INTO `atributes` VALUES (1,'╨Э╨░╨╕╨╝╨╡╨╜╨╛╨▓╨░╨╜╨╕╨╡','╨б╤В╤А╨╛╨║╨░'),(2,'╨Э╨░╨╕╨╝╨╡╨╜╨╛╨▓╨░╨╜╨╕╨╡ ╨║╨╗╨░╤Б╤Б╨░ ╨┐╤А╨╛╨│╤А╨░╨╝╨╝╨╜╨╛╨│╨╛ ╨╛╨▒╨╡╤Б╨┐╨╡╤З╨╡╨╜╨╕╤П','╨б╤В╤А╨╛╨║╨░'),(3,'╨г╤Б╨╗╨╛╨▓╨╜╤Л╨╣ ╨╜╨╛╨╝╨╡╤А ╨┐╨╛╨┤╤А╨░╨╖╨┤╨╡╨╗╨╡╨╜╨╕╤П ╨╖╨░╨║╨░╨╖╤З╨╕╨║╨░','╨з╨╕╤Б╨╗╨╛'),(4,'╨Ф╨╛╤А╨╛╨╢╨╜╨░╤П ╨║╨░╤А╤В╨░ ╨╕╨╝╨┐╨╛╤А╤В╨╛╨╖╨░╨╝╨╡╤Й╨╡╨╜╨╕╤П','╨б╤В╤А╨╛╨║╨░'),(5,'╨Ь╨╡╤А╨╛╨┐╤А╨╕╤П╤В╨╕╤П ╨┐╨╛ ╨╕╨╝╨┐╨╛╤А╤В╨╛╨╖╨░╨╝╨╡╤Й╨╡╨╜╨╕╤О','╨б╨┐╨╕╤Б╨╛╨║'),(6,'╨Я╨╗╨░╨╜╨╛╨▓╤Л╨╣ ╤Б╤А╨╛╨║ ╨▓╨╜╨╡╨┤╤А╨╡╨╜╨╕╤П ╨╛╤В╨╡╤З╨╡╤Б╤В╨▓╨╡╨╜╨╜╨╛╨│╨╛ ╨Я╨Ю-╨░╨╜╨░╨╗╨╛╨│╨░','╨б╤В╤А╨╛╨║╨░'),(7,'╨б╨▓╨╡╤А╨║╨░ 2025','╨б╤В╤А╨╛╨║╨░'),(8,'╨д╨Ш╨Ю ╨╛╤В╨▓╨╡╤В╤Б╤В╨▓╨╡╨╜╨╜╨╛╨│╨╛ ╨╖╨░ ╨┐╨╛╨┤╨┤╨╡╤А╨╢╨║╤Г','╨б╤В╤А╨╛╨║╨░'),(9,'╨з╨╕╤Б╨╗╨╛ ╨╛╨▒╤А╨░╤Й╨╡╨╜╨╕╨╣','╨з╨╕╤Б╨╗╨╛');
/*!40000 ALTER TABLE `atributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `atributesandgroupes`
--

DROP TABLE IF EXISTS `atributesandgroupes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `atributesandgroupes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atribute_id` int(11) NOT NULL,
  `groupe_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `atribute_id` (`atribute_id`),
  KEY `groupe_id` (`groupe_id`),
  CONSTRAINT `atributesandgroupes_ibfk_1` FOREIGN KEY (`atribute_id`) REFERENCES `atributes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `atributesandgroupes_ibfk_2` FOREIGN KEY (`groupe_id`) REFERENCES `groupes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `atributesandgroupes`
--

LOCK TABLES `atributesandgroupes` WRITE;
/*!40000 ALTER TABLE `atributesandgroupes` DISABLE KEYS */;
INSERT INTO `atributesandgroupes` VALUES (1,1,1),(2,2,1),(3,3,1),(4,4,2),(5,5,2),(6,6,2),(7,7,3),(8,8,3),(9,9,3),(10,9,4);
