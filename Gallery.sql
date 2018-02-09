CREATE DATABASE  IF NOT EXISTS `artbase` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `artbase`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: artbase
-- ------------------------------------------------------
-- Server version	5.5.59

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
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist` (
  `AName` varchar(100) NOT NULL,
  `Birthplace` varchar(100) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Style` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`AName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='	';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES ('joan miro','france',65,'sketch'),('pablo picasso','spain',80,'modern'),('Salvador Dali','spain',56,'drafts'),('van gough','netharlands',56,'modern');
/*!40000 ALTER TABLE `artist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artwork`
--

DROP TABLE IF EXISTS `artwork`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artwork` (
  `Title` varchar(100) NOT NULL,
  `Year` int(11) DEFAULT NULL,
  `Type` varchar(100) DEFAULT NULL,
  `Price` decimal(65,2) DEFAULT NULL,
  `Aname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Title`),
  KEY `FK_ARTIST_idx` (`Aname`),
  CONSTRAINT `FK_ARTIST` FOREIGN KEY (`Aname`) REFERENCES `artist` (`AName`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artwork`
--

LOCK TABLES `artwork` WRITE;
/*!40000 ALTER TABLE `artwork` DISABLE KEYS */;
INSERT INTO `artwork` VALUES ('clean grabage',1978,'draft',98879879.00,'joan miro'),('gross room',1938,'draft',400000.00,'joan miro'),('the blue room',1901,'modern',500000.00,'pablo picasso');
/*!40000 ALTER TABLE `artwork` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classify`
--

DROP TABLE IF EXISTS `classify`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classify` (
  `Title` varchar(100) NOT NULL,
  `GName` varchar(100) NOT NULL,
  PRIMARY KEY (`Title`,`GName`),
  UNIQUE KEY `Title_UNIQUE` (`Title`),
  UNIQUE KEY `GName_UNIQUE` (`GName`),
  CONSTRAINT `FK_GNAME` FOREIGN KEY (`GName`) REFERENCES `group` (`GName`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_Title` FOREIGN KEY (`Title`) REFERENCES `artwork` (`Title`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classify`
--

LOCK TABLES `classify` WRITE;
/*!40000 ALTER TABLE `classify` DISABLE KEYS */;
INSERT INTO `classify` VALUES ('clean grabage','draft'),('the blue room','painting');
/*!40000 ALTER TABLE `classify` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `CustID` int(11) NOT NULL AUTO_INCREMENT,
  `CName` varchar(100) DEFAULT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `Amount` decimal(65,2) DEFAULT NULL,
  PRIMARY KEY (`CustID`),
  UNIQUE KEY `CustID_UNIQUE` (`CustID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'pavan','westcovina',50000.00),(2,'mukul','westcovina',652202.00),(3,'tarun','west covina',4800000.00),(4,'darshan','westcovina',8900000.00),(5,'vaishali','westcovina',900000000.00),(6,'sawan','fullerton',680556599.00),(7,'vatsal','san francisco',9000000000.00);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `group` (
  `GName` varchar(100) NOT NULL,
  PRIMARY KEY (`GName`),
  UNIQUE KEY `GName_UNIQUE` (`GName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group`
--

LOCK TABLES `group` WRITE;
/*!40000 ALTER TABLE `group` DISABLE KEYS */;
INSERT INTO `group` VALUES ('draft'),('painting');
/*!40000 ALTER TABLE `group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like_artist`
--

DROP TABLE IF EXISTS `like_artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_artist` (
  `CustID` int(11) NOT NULL,
  `AName` varchar(100) NOT NULL,
  PRIMARY KEY (`CustID`,`AName`),
  KEY `FK_ArtistName__idx` (`AName`),
  CONSTRAINT `FK_ArtistName_` FOREIGN KEY (`AName`) REFERENCES `artist` (`AName`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_CustomerID_Customer` FOREIGN KEY (`CustID`) REFERENCES `customer` (`CustID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_artist`
--

LOCK TABLES `like_artist` WRITE;
/*!40000 ALTER TABLE `like_artist` DISABLE KEYS */;
INSERT INTO `like_artist` VALUES (1,'joan miro'),(2,'joan miro'),(3,'joan miro'),(4,'joan miro'),(5,'joan miro'),(6,'joan miro'),(7,'joan miro'),(1,'pablo picasso'),(2,'pablo picasso'),(3,'pablo picasso'),(4,'pablo picasso'),(5,'pablo picasso'),(6,'pablo picasso'),(7,'pablo picasso'),(3,'Salvador Dali'),(4,'Salvador Dali'),(5,'Salvador Dali'),(6,'Salvador Dali'),(7,'Salvador Dali'),(1,'van gough'),(2,'van gough'),(3,'van gough'),(4,'van gough'),(5,'van gough'),(6,'van gough'),(7,'van gough');
/*!40000 ALTER TABLE `like_artist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like_group`
--

DROP TABLE IF EXISTS `like_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_group` (
  `CustID` int(11) NOT NULL,
  `GName` varchar(100) NOT NULL,
  PRIMARY KEY (`CustID`,`GName`),
  KEY `FK_GName_Group_LikeGroup_idx` (`GName`),
  CONSTRAINT `FK_CustID_Customer_LikeGroup` FOREIGN KEY (`CustID`) REFERENCES `customer` (`CustID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_GName_Group_LikeGroup` FOREIGN KEY (`GName`) REFERENCES `group` (`GName`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_group`
--

LOCK TABLES `like_group` WRITE;
/*!40000 ALTER TABLE `like_group` DISABLE KEYS */;
INSERT INTO `like_group` VALUES (1,'draft'),(2,'draft'),(3,'draft'),(4,'draft'),(5,'draft'),(6,'draft'),(7,'draft'),(1,'painting'),(2,'painting'),(3,'painting'),(4,'painting'),(5,'painting'),(6,'painting'),(7,'painting');
/*!40000 ALTER TABLE `like_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'artbase'
--

--
-- Dumping routines for database 'artbase'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-07 23:08:02
