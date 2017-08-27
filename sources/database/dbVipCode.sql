CREATE DATABASE  IF NOT EXISTS `dbVipCode` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `dbVipCode`;
-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: 127.0.0.1    Database: dbVipCode
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.16-MariaDB

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
-- Table structure for table `tbEnterprise`
--

DROP TABLE IF EXISTS `tbEnterprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbEnterprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) NOT NULL,
  `address` text NOT NULL,
  `coords` varchar(254) DEFAULT NULL,
  `telephone` varchar(254) DEFAULT NULL,
  `mobilePhone` varchar(254) DEFAULT NULL,
  `mobilePhoneOptional` varchar(254) DEFAULT NULL,
  `website` varchar(254) DEFAULT NULL,
  `faceBook` varchar(254) DEFAULT NULL,
  `managerName` varchar(254) DEFAULT NULL,
  `managerMobilePhone` varchar(254) DEFAULT NULL,
  `managerEmail` varchar(254) DEFAULT NULL,
  `creationTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `enterpriseLegalId` varchar(254) DEFAULT NULL,
  `isActive` tinyint(1) DEFAULT '1',
  `creationDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `minDiscount` float DEFAULT '10',
  `maxDiscount` float DEFAULT '20',
  `numberOfIndicationsForMaxDiscount` int(11) DEFAULT '5',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbEnterprise`
--

LOCK TABLES `tbEnterprise` WRITE;
/*!40000 ALTER TABLE `tbEnterprise` DISABLE KEYS */;
INSERT INTO `tbEnterprise` VALUES (1,'Administrador','','','','','','','','','','','2017-06-21 03:07:02','',1,'2017-06-29 04:46:44',11,22,7),(2,'Moments','','','','','','','','','','','2017-06-21 03:10:29','',1,'2017-06-29 04:46:44',10,20,4);
/*!40000 ALTER TABLE `tbEnterprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbInvoice`
--

DROP TABLE IF EXISTS `tbInvoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbInvoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enterpriseLegarId` varchar(254) DEFAULT NULL,
  `enterpriseId` int(11) NOT NULL,
  `invoiceValue` float NOT NULL,
  `numberOfIndications` int(11) NOT NULL,
  `creationTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `paymentDueDate` datetime DEFAULT NULL,
  `ATMReference` varchar(500) DEFAULT NULL,
  `invoiceStatus` varchar(254) DEFAULT 'not paid',
  `invoiceToEmail` varchar(254) NOT NULL,
  `invoiceToSMS` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkEnterpriseInvoice` (`enterpriseId`),
  CONSTRAINT `fkEnterpriseInvoice` FOREIGN KEY (`enterpriseId`) REFERENCES `tbEnterprise` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbInvoice`
--

LOCK TABLES `tbInvoice` WRITE;
/*!40000 ALTER TABLE `tbInvoice` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbInvoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbUser`
--

DROP TABLE IF EXISTS `tbUser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbUser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(254) NOT NULL,
  `mobilePhone` varchar(254) DEFAULT NULL,
  `email` varchar(254) DEFAULT NULL,
  `category` varchar(254) DEFAULT NULL,
  `password` varchar(500) NOT NULL,
  `passwordAttempts` int(11) NOT NULL DEFAULT '8',
  `hasTochangePassword` tinyint(1) DEFAULT '1',
  `isActive` tinyint(1) DEFAULT '1',
  `enterpriseId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `mobilePhone` (`mobilePhone`),
  KEY `fkEnterpriseUser` (`enterpriseId`),
  CONSTRAINT `fkEnterpriseUser` FOREIGN KEY (`enterpriseId`) REFERENCES `tbEnterprise` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbUser`
--

LOCK TABLES `tbUser` WRITE;
/*!40000 ALTER TABLE `tbUser` DISABLE KEYS */;
INSERT INTO `tbUser` VALUES (1,'Sgenio Gaspar','922300544','sousadgaspar@gmail.com','root','123456',8,1,1,2),(2,'Laercio Gaspar','923436345','laericio@sgenial.co','','654321',8,1,0,2),(3,'Silvio Gomes','923433423','silviogomes@sgenial.co','basic','$2y$12$2uCKnOyr1xQuO95qgX.P8ezdbvgFYPNlBCGwmn8zCyyHEMxLQz7mG',8,1,1,2);
/*!40000 ALTER TABLE `tbUser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbVipCode`
--

DROP TABLE IF EXISTS `tbVipCode`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbVipCode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vipCode` varchar(254) NOT NULL,
  `credit` float NOT NULL DEFAULT '10',
  `creationtDate` datetime DEFAULT CURRENT_TIMESTAMP,
  `modificationDate` datetime DEFAULT NULL,
  `validTill` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT 'valid',
  `isPublic` tinyint(1) DEFAULT '1',
  `enterpriseId` int(11) NOT NULL,
  `ownerName` varchar(254) DEFAULT NULL,
  `ownerTelephone` varchar(254) NOT NULL,
  `OwnerEmail` varchar(254) NOT NULL,
  `ownerFaceBook` varchar(500) DEFAULT NULL,
  `ownerAddress` text,
  `ownerReturned` tinyint(1) DEFAULT '0',
  `minDiscount` float DEFAULT '10',
  `maxDiscount` float DEFAULT '10',
  `expirationDate` datetime DEFAULT NULL,
  `ownerAttededDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vipCode` (`vipCode`),
  KEY `fkEnterpriseVipCode` (`enterpriseId`),
  CONSTRAINT `fkEnterpriseVipCode` FOREIGN KEY (`enterpriseId`) REFERENCES `tbEnterprise` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=162 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbVipCode`
--

LOCK TABLES `tbVipCode` WRITE;
/*!40000 ALTER TABLE `tbVipCode` DISABLE KEYS */;
INSERT INTO `tbVipCode` VALUES (94,'voltoAoRoot#17207-1334-32',11,'2017-07-27 12:34:32',NULL,'2017-08-26 00:00:00','ownerAttended',1,2,'Dumilda Yordanca Gaspar','+244924342150','sil@fam.com','','',0,10,18,NULL,'2017-07-27 13:57:56'),(95,'voltoAoRoot#17207-1359-50',12.6,'2017-07-27 12:59:50',NULL,'2017-08-26 00:00:00','ownerAttended',1,2,'Dumilda','+244924342150','dumilda.gaspar@sgenil.co.ao','','',0,10,18,NULL,'2017-07-27 14:11:51'),(96,'voltoAoRoot#17207-1412-16',11,'2017-07-27 13:12:16',NULL,'2017-08-26 00:00:00','ownerAttended',1,2,'Dumilda','+244924342150','dumilda.gaspar@sgenil.co.ao','','',0,10,18,NULL,'2017-07-27 14:16:30'),(97,'voltoAoRoot#17207-1417-05',11,'2017-07-27 13:17:05',NULL,'2017-08-26 00:00:00','ownerAttended',1,2,'Dumilda','+244924342150','dumilda.gaspar@sgenil.co.ao','','',0,10,18,NULL,'2017-07-27 14:24:06'),(98,'voltoAoRoot#17207-1422-34',11,'2017-07-27 13:22:34',NULL,'2017-08-26 00:00:00','valid',1,2,'Dumilda','+244342150','du@gmail.com','','',0,10,18,NULL,NULL),(99,'voltoAoRoot#17207-1424-38',11,'2017-07-27 13:24:38',NULL,'2017-08-26 00:00:00','ownerAttended',1,2,'Dumilda','+244924342150','dumilda.gaspar@sgenil.co.ao','','',0,10,18,NULL,'2017-07-27 18:13:31'),(100,'voltoAoRoot#17207-1814-17',7.2,'2017-07-27 17:14:17',NULL,'2017-08-26 00:00:00','valid',1,2,'Dumilda','+244923342150','dumilda.gaspar@sgenil.co.ao','','',0,8,15,NULL,NULL),(101,'voltoAoRoot#17207-1821-38',8,'2017-07-27 17:21:38',NULL,'2017-08-26 00:00:00','ownerAttended',1,2,'Sox','+244930686545','soxtheone@gmail.com','','',0,8,15,NULL,'2017-08-04 02:34:11'),(102,'voltoAoRoot#17207-1945-24',8,'2017-07-27 18:45:24',NULL,'2017-08-26 00:00:00','ownerAttended',1,2,'Dumilda','+244924342150','dumilda.gaspar@sgenil.co.ao','','',0,8,15,NULL,'2017-07-27 19:47:40'),(103,'voltoAoRoot#17208-1127-20',8,'2017-07-28 10:27:20',NULL,'2017-08-27 00:00:00','ownerAttended',1,2,'Dumilda','+244924342150','Sousadgaspar@gmail.com','','',0,8,16,NULL,'2017-07-28 11:46:58'),(104,'voltoAoRoot#17208-1147-23',8,'2017-07-28 10:47:23',NULL,'2017-08-27 00:00:00','ownerAttended',1,2,'Dumilda','+244924342150','dumilda.gaspar@sgenil.co.ao','','',0,8,16,NULL,'2017-07-28 11:53:48'),(105,'voltoAoRoot#17208-1154-11',7.4,'2017-07-28 10:54:11',NULL,'2017-08-27 00:00:00','ownerAttended',1,2,'Dumilda','+244924342150','dumilda.gaspar@sgenil.co.ao','','',0,8,16,NULL,'2017-07-28 11:59:09'),(106,'voltoAoRoot#17208-1201-37',8,'2017-07-28 11:01:37',NULL,'2017-08-27 00:00:00','valid',1,2,'Dumilda','+224923342150','dumilda.gaspar@sgenil.co.ao','','',0,8,16,NULL,NULL),(107,'voltoAoRoot#17208-2141-13',8,'2017-07-28 20:41:13',NULL,'2017-08-27 00:00:00','valid',1,2,'Jonas Dalas','+24492345654309','jonas.jks@gmail.com','','',0,8,16,NULL,NULL),(108,'voltoAoRoot#17208-2141-43',26.6,'2017-07-28 20:41:43',NULL,'2017-08-27 00:00:00','valid',1,2,'Duniel Dlas','+2449233454322','Sousadgaspar@gmail.com','','',0,8,16,NULL,NULL),(109,'voltoAoRoot#17214-1159-06',8,'2017-08-03 10:59:06',NULL,'2017-09-02 00:00:00','valid',1,2,'Sousa Antonio','+244987726372637236','sousa.antonio@gmail.com','','',0,8,16,NULL,NULL),(110,'voltoAoRoot#17214-1223-22',8,'2017-08-03 11:23:23',NULL,'2017-09-02 00:00:00','valid',1,2,'Dumilda','+2449839283928323','Sousadgaspar@gmail.com','','',0,8,16,NULL,NULL),(111,'voltoAoRoot#17214-1224-11',8,'2017-08-03 11:24:11',NULL,'2017-09-02 00:00:00','valid',1,2,'Soxxzasa','+244732992389283','Sousadgaspar@gmail.com','','',0,8,16,NULL,NULL),(112,'voltoAoRoot#17214-1224-43',8,'2017-08-03 11:24:43',NULL,'2017-09-02 00:00:00','ownerAttended',1,2,'Sousa Gaspar','+0998983983928329','Sousadgaspar@gmail.com','','',0,8,16,NULL,'2017-08-03 12:28:18'),(113,'voltoAoRoot#17214-1229-35',9,'2017-08-03 11:29:35',NULL,'2017-09-02 00:00:00','valid',1,2,'Doly Menga','+9239238293829382938','menga@gmail.com','','',0,9,20,NULL,NULL),(114,'voltoAoRoot#17214-1255-45',9,'2017-08-03 11:55:45',NULL,'2017-09-02 00:00:00','ownerAttended',1,2,'Sousa Gaspar','+244922300521','sil@fam.com','','',0,9,20,NULL,'2017-08-03 12:57:47'),(115,'voltoAoRoot#17214-1257-58',9,'2017-08-03 11:57:58',NULL,'2017-09-02 00:00:00','ownerAttended',1,2,'Sousa Gaspar','+244922300521','Sousadgaspar@gmail.com','','',0,9,20,NULL,'2017-08-04 01:42:44'),(116,'voltoAoRoot#17215-0033-46',9,'2017-08-03 23:33:46',NULL,'2017-09-03 00:00:00','ownerAttended',1,2,'Soxxxxx','+24492345654345','sox@gmail.com','','',0,9,20,NULL,'2017-08-04 00:57:16'),(117,'voltoAoRoot#17215-0058-03',9,'2017-08-03 23:58:03',NULL,'2017-09-03 00:00:00','valid',1,2,'Sousa Gaspar','+24493459823987293','Sousadgaspar@gmail.com','','',0,9,20,NULL,NULL),(118,'voltoAoRoot#17215-0104-14',9,'2017-08-04 00:04:14',NULL,'2017-09-03 00:00:00','valid',1,2,'Sousa Gaspar','+244934598239872939','Sousadgaspar@gmail.com','','',0,9,20,NULL,NULL),(119,'voltoAoRoot#17215-0108-54',9,'2017-08-04 00:08:54',NULL,'2017-09-03 00:00:00','valid',1,2,'Sousa Gaspar','+2449345982398729394','Sousadgaspar@gmail.com','','',0,9,20,NULL,NULL),(120,'voltoAoRoot#17215-0114-22',9,'2017-08-04 00:14:22',NULL,'2017-09-03 00:00:00','valid',1,2,'Sousa Gaspar','+24493459823987','Sousadgaspar@gmail.com','','',0,9,20,NULL,NULL),(121,'voltoAoRoot#17215-0133-35',9,'2017-08-04 00:33:35',NULL,'2017-09-03 00:00:00','valid',1,2,'Sozaaa','+2449235467383','sozaaa@gmail.com','','',0,9,20,NULL,NULL),(122,'voltoAoRoot#17215-0135-22',9,'2017-08-04 00:35:22',NULL,'2017-09-03 00:00:00','valid',1,2,'Sozaaa','+244923546738398','sozaaa@gmail.com','','',0,9,20,NULL,NULL),(123,'voltoAoRoot#17215-0139-29',9,'2017-08-04 00:39:29',NULL,'2017-09-03 00:00:00','valid',1,2,'Sozaaa','+24492354673839809','sozaaa@gmail.com','','',0,9,20,NULL,NULL),(124,'voltoAoRoot#17215-0141-49',9,'2017-08-04 00:41:49',NULL,'2017-09-03 00:00:00','valid',1,2,'Sozaaa','+2449235467383980909','sozaaa@gmail.com','','',0,9,20,NULL,NULL),(125,'voltoAoRoot#17215-0143-07',9,'2017-08-04 00:43:07',NULL,'2017-09-03 00:00:00','ownerAttended',1,2,'Sousa Gaspar','+244922300521','sox@jhas.com','','',0,9,20,NULL,'2017-08-04 01:57:20'),(126,'voltoAoRoot#17215-0155-55',20,'2017-08-04 00:55:55',NULL,'2017-09-03 00:00:00','ownerAttended',1,2,'Sousa Gaspar','+244923300521','Sousadgaspar@gmail.com','','',0,9,20,NULL,'2017-08-06 21:13:21'),(127,'voltoAoRoot#17215-0200-32',9,'2017-08-04 01:00:32',NULL,'2017-09-03 00:00:00','ownerAttended',1,2,'Sousa Gaspar','+244922300521','Sousadgaspar@gmail.com','','',0,9,20,NULL,'2017-08-04 02:16:55'),(128,'voltoAoRoot#17215-0217-15',105.6,'2017-08-04 01:17:15',NULL,'2017-09-03 00:00:00','ownerAttended',1,2,'Sousa Gaspar','+244922300521','Sousadgaspar@gmail.com','','',0,9,20,NULL,'2017-08-06 20:20:58'),(129,'voltoAoRoot#17215-0234-33',28.6,'2017-08-04 01:34:33',NULL,'2017-09-03 00:00:00','ownerAttended',1,2,'Sousa Gaspar','+244930686545','Sousadgaspar@gmail.com','','',0,9,20,NULL,'2017-08-06 19:14:49'),(130,'voltoAoRoot#17215-0238-19',20,'2017-08-04 01:38:19',NULL,'2017-09-03 00:00:00','ownerAttended',1,2,'Dumilda','+244924342150','dumilda.gaspar@sgenil.co.ao','','',0,9,20,NULL,'2017-08-06 14:08:40'),(131,'voltoAoRoot#17215-1158-31',41.4,'2017-08-04 10:58:31',NULL,'2017-09-03 00:00:00','ownerAttended',1,2,'socio Rijo','+24492365457898','soci@gmail.com','','',0,9,20,NULL,'2017-08-05 18:15:14'),(132,'voltoAoRoot#17216-1636-55',12,'2017-08-05 15:36:55',NULL,'2017-09-04 00:00:00','ownerAttended',1,2,'San Tiago Mota Lemos','+2449348765421','Sousadgaspar@gmail.com','','',0,12,25,NULL,'2017-08-05 16:47:41'),(133,'voltoAoRoot#17216-1825-33',12,'2017-08-05 17:25:33',NULL,'2017-09-04 00:00:00','ownerAttended',1,2,'Matondo Mguel','+24492345642387','miguel@gma.com','','',0,12,25,NULL,'2017-08-05 18:27:07'),(134,'voltoAoRoot#17216-1834-05',27.6,'2017-08-05 17:34:05',NULL,'2017-09-04 00:00:00','ownerAttended',1,2,'Matondo Miguel','+24492345642387','ate@gmma.com','','',0,12,25,NULL,'2017-08-05 18:37:46'),(135,'voltoAoRoot#17217-1918-55',12,'2017-08-06 18:18:55',NULL,'2017-09-05 00:00:00','ownerAttended',1,2,'Silvana Almeida','+2449988782738273','sil@kaj.com','','',0,12,25,NULL,'2017-08-06 19:20:38'),(136,'voltoAoRoot#17217-1930-40',14.6,'2017-08-06 18:30:40',NULL,'2017-09-05 00:00:00','ownerAttended',1,2,'Silvino Gaspar','+244923456324','Sousadgaspar@gmail.com','','',0,12,25,NULL,'2017-08-06 19:33:42'),(137,'voltoAoRoot#17217-2118-53',12,'2017-08-06 20:18:53',NULL,'2017-09-05 00:00:00','valid',1,2,'Dulce Gabana','+24473299238928323','Sousadgaspar@gmail.com','','',0,12,25,NULL,NULL),(138,'voltoAoRoot#17217-2150-26',12,'2017-08-06 20:50:26',NULL,'1970-01-01 00:00:00','valid',1,2,'Basi Emilia','+244923456544422','basi.emilia@gmai.com','','',0,12,25,NULL,NULL),(139,'voltoAoRoot#17217-2158-21',12,'2017-08-06 20:58:21',NULL,'1970-01-01 00:00:00','valid',1,2,'Sousa Tuzano','+244923453765810','Sousadgaspar@gmail.com','','',0,12,22,NULL,NULL),(140,'voltoAoRoot#17217-2210-57',12,'2017-08-06 21:10:57',NULL,'1970-01-01 00:00:00','valid',1,2,'Vovo Base','+2449234657439238293','vovobase@gmail.com','','',0,12,22,NULL,NULL),(141,'voltoAoRoot#17217-2229-54',12,'2017-08-06 21:29:54',NULL,'1970-01-01 00:00:00','valid',1,2,'Domingos Gaspar','+24492300000','domingos.gaspar@gmail.com','','',0,12,22,NULL,NULL),(142,'voltoAoRoot#17217-2241-52',12,'2017-08-06 21:41:52',NULL,'2017-09-20 00:00:00','valid',1,2,'Cavalcanti alegre','+24492345653000','cavalcanti.alegre@gmail.com','','',0,12,24,NULL,NULL),(143,'voltoAoRoot#17217-2243-33',12,'2017-08-06 21:43:33',NULL,'2017-09-20 00:00:00','valid',1,2,'Sol Nascente','+244923546837480230','sol.nascente@gmail.com','','',0,12,24,NULL,NULL),(144,'voltoAoRoot#17217-2245-43',12,'2017-08-06 21:45:43',NULL,'2017-08-31 00:00:00','valid',1,2,'Sousa Gaspar','+244912121212','sousa.gaspar@gmail.com','','',0,12,28,NULL,NULL),(145,'voltoAoRoot#17217-2308-25',0,'2017-08-06 22:08:25',NULL,'2017-08-31 00:00:00','valid',1,2,'Soba Thiago','+2449233092039372832','soba.thiago@gmail.com','','',0,12,28,NULL,NULL),(146,'voltoAoRoot#17218-0154-48',12,'2017-08-07 00:54:48',NULL,'2017-09-01 00:00:00','valid',1,2,'Soldier Boi','+244923400788','Sousadgaspar@gmail.com','','',0,12,28,NULL,NULL),(147,'voltoAoRoot#17218-0156-38',12,'2017-08-07 00:56:38',NULL,'2017-09-01 00:00:00','valid',1,2,'Sol e Mar','+244923789000989','sol@gmail.com','','',0,12,28,NULL,NULL),(148,'voltoAoRoot#17219-2145-01',12,'2017-08-08 20:45:01',NULL,'1970-01-01 00:00:00','valid',1,2,'Sousa Gaspar','+244930686545','Sousadgaspar@gmail.com','','',0,12,28,NULL,NULL),(149,'voltoAoRoot#17219-2147-40',12,'2017-08-08 20:47:40',NULL,'1970-01-01 00:00:00','ownerAttended',1,2,'Sousa Gaspar','+244922300521','Sousadgaspar@gmail.com','','',0,12,28,NULL,'2017-08-08 21:48:46'),(150,'voltoAoRoot#17219-2149-19',12,'2017-08-08 20:49:19',NULL,'1970-01-01 00:00:00','ownerAttended',1,2,'Sousa Gaspar','+244923300521','Sousadgaspar@gmail.com','','',0,12,28,NULL,'2017-08-10 22:50:30'),(151,'voltoAoRoot#17222-1237-14',8,'2017-08-11 11:37:14',NULL,'2017-10-10 00:00:00','valid',1,2,'','9823923','','','',0,8,12,NULL,NULL),(152,'voltoAoRoot#17222-1238-17',8,'2017-08-11 11:38:17',NULL,'2017-10-10 00:00:00','valid',1,2,'','0','','','',0,8,12,NULL,NULL),(153,'voltoAoRoot#17222-1239-04',8,'2017-08-11 11:39:04',NULL,'2017-10-10 00:00:00','valid',1,2,'','08765432456789','','','',0,8,12,NULL,NULL),(154,'voltoAoRoot#17222-1302-02',8,'2017-08-11 12:02:02',NULL,'2017-10-10 00:00:00','valid',1,2,'Sousa Gaspar','930686582','ste','','',0,8,12,NULL,NULL),(155,'voltoAoRoot#17222-1303-24',8,'2017-08-11 12:03:24',NULL,'2017-10-10 00:00:00','valid',1,2,'Sousa Gaspar','930686576','Sousadgaspar@gmail.com','','',0,8,12,NULL,NULL),(156,'voltoAoRoot#17224-1440-18',12,'2017-08-13 13:40:18',NULL,'1970-01-01 00:00:00','valid',1,2,'Sousa Gaspar','923546700','seee@fm.com','','',0,8,12,NULL,NULL),(157,'voltoAoRoot#17224-1605-07',8,'2017-08-13 15:05:07',NULL,'1970-01-01 00:00:00','ownerAttended',1,2,'Dulcino Matias','923988400','leanilda@miranda.com','','',0,8,12,NULL,'2017-08-13 16:08:27'),(158,'voltoAoRoot#17225-2154-28',20,'2017-08-14 20:54:28',NULL,'2017-09-13 00:00:00','ownerAttended',1,2,'Silvio Manuel','922300309','sil@fam.com','','',0,10,20,NULL,'2017-08-14 22:03:35'),(159,'voltoAoRoot#17226-1942-17',15,'2017-08-15 18:42:17',NULL,'1970-01-01 00:00:00','valid',1,2,'Testes Miranda','922766667','merente@quintas.com','','',0,10,20,NULL,NULL),(160,'voltoAoRoot#17235-2312-25',10,'2017-08-24 22:12:25',NULL,'1970-01-01 00:00:00','valid',1,2,'Silvino Miguel','912121212','sil@fam.com','','',0,10,20,NULL,NULL),(161,'voltoAoMoments#17235-2313-31',10,'2017-08-24 22:13:31',NULL,'1970-01-01 00:00:00','valid',1,2,'Milcano Vul','923232354','vil@mg.com','','',0,10,20,NULL,NULL);
/*!40000 ALTER TABLE `tbVipCode` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbVipCodeAttendee`
--

DROP TABLE IF EXISTS `tbVipCodeAttendee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbVipCodeAttendee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vipCode` varchar(254) NOT NULL,
  `attendeeName` varchar(254) DEFAULT NULL,
  `attendeeTelephone` varchar(254) NOT NULL,
  `attendeeEmail` varchar(254) DEFAULT NULL,
  `creationTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `attendedDate` datetime DEFAULT NULL,
  `status` varchar(100) DEFAULT 'valid',
  `invoiceValue` float DEFAULT NULL,
  `discountValue` float DEFAULT NULL,
  `discountPercentage` float DEFAULT NULL,
  `vipCodeTax` int(11) DEFAULT NULL,
  `vipCodeTaxRate` int(11) DEFAULT NULL,
  `enterpriseId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=160 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbVipCodeAttendee`
--

LOCK TABLES `tbVipCodeAttendee` WRITE;
/*!40000 ALTER TABLE `tbVipCodeAttendee` DISABLE KEYS */;
INSERT INTO `tbVipCodeAttendee` VALUES (1,'','Rosario Miguel','9234403252','','2017-06-25 00:38:00',NULL,'valid',NULL,NULL,NULL,NULL,NULL,NULL),(2,'DeVoltaAoMoments#1498308092802384','Rosario Miguel','9234403252','','2017-06-25 00:40:53',NULL,'valid',NULL,NULL,NULL,NULL,NULL,NULL),(3,'','Dumilda','923404536','','2017-06-26 01:42:42',NULL,'valid',NULL,NULL,NULL,NULL,NULL,NULL),(4,'','Dumilda','923404536','','2017-06-26 01:43:49',NULL,'valid',NULL,NULL,NULL,NULL,NULL,NULL),(5,'DeVoltaAoMoments#14983080928084','Yordanca','913404536','','2017-06-26 01:50:01',NULL,'valid',NULL,NULL,NULL,NULL,NULL,NULL),(6,'DeVoltaAoMoments#14983080928084','Yordanca','913404536','','2017-06-26 01:50:21',NULL,'valid',NULL,NULL,NULL,NULL,NULL,NULL),(7,'DeVoltaAoMoments#14983080928084','Yordanca','913404536','','2017-06-26 01:50:37',NULL,'valid',NULL,NULL,NULL,NULL,NULL,NULL),(8,'DeVoltaAoMoments#14983080504158','Domingos Gaspar','923765544','','2017-06-26 05:44:53',NULL,'valid',NULL,NULL,NULL,NULL,NULL,NULL),(9,'DeVoltaAoMoments#14983080504158','Sgenio Gaspar','922300521','','2017-06-26 05:47:22',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(10,'DeVoltaAoRoot#14988280880239','Sox','9223007263','','2017-07-02 12:36:36',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(11,'DeVoltaAoRoot#14988280880239','SoxTheOne','930686545','','2017-07-02 12:43:12','2017-08-07 00:35:25','attended',NULL,NULL,NULL,NULL,NULL,NULL),(12,'DeVoltaAoRoot#14988280880239','SoxTheOne','9223007263','','2017-07-02 12:57:42',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(13,'DeVoltaAoRoot#14988280880239','SoxTheOne','9223007263','','2017-07-02 12:59:56',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(14,'DeVoltaAoRoot#14988280880239','SoxTheOne','9223007263','','2017-07-02 13:02:11',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(15,'DeVoltaAoRoot#14988280880239','SoxTheOne','922300726','','2017-07-02 13:07:06',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(16,'DeVoltaAoMoments#233442348','SoxSix','9306865459865','','2017-07-02 15:53:56',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(17,'DeVoltaAoMoments#233442348','Sxoo','98779234876','','2017-07-02 15:54:37',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(18,'DeVoltaAoMoments#233442334','Socc','930686111','','2017-07-02 15:57:39',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(19,'DeVoltaAoMoments#233442334','Socc','930686113','','2017-07-02 16:03:01',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(20,'DeVoltaAoMoments#14983065670343','gisp','922300523','','2017-07-02 16:08:10',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(21,'DeVoltaAoMoments#14983065670343','gisp','922300527','','2017-07-02 16:12:28',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(22,'DeVoltaAoMoments#14983065670343','SOLO','9','','2017-07-02 16:13:04',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(23,'DeVoltaAoMoments#14983065670343','Junior','922300525','','2017-07-02 16:44:18',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(24,'DeVoltaAoMoments#14983065670343','sgenio','9223005209','','2017-07-02 16:45:45',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(25,'DeVoltaAoRoot#14990150925508','Joao Miguel','9237654354','','2017-07-02 18:37:29',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(26,'DeVoltaAoRoot#14990150925508','Jose Lucas','923400765','','2017-07-02 18:39:11',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(27,'DeVoltaAoRoot#14990150925508','SoxTheOne','930686545','','2017-07-02 18:42:21','2017-08-07 00:35:25','attended',NULL,NULL,NULL,NULL,NULL,NULL),(28,'DeVoltaAoRoot#14990150925508','Dino','92345645','','2017-07-02 18:50:30',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(29,'DeVoltaAoRoot#14990151302624','Rolf Domingos','922300787','','2017-07-02 18:56:11',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(30,'DeVoltaAoRoot#14990135491136','Manuel Pedro','9437656987','','2017-07-02 18:59:14',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(31,'DeVoltaAoRoot#14990150925508','Joel King','9234878723','','2017-07-02 19:14:57',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(32,'DeVoltaAoRoot#14990150925508','Miguel Manuel','913434354545','','2017-07-02 19:15:33',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(33,'DeVoltaAoRoot#14990150925508','Leonel Maria','923323232','','2017-07-02 19:15:53',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(34,'DeVoltaAoRoot#14990151302624','Manuel Alter','923489739','','2017-07-02 19:23:12',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(35,'DeVoltaAoRoot#14990151302624','SoxTheOne','930686545','','2017-07-02 19:23:31','2017-08-07 00:35:25','attended',NULL,NULL,NULL,NULL,NULL,NULL),(36,'DeVoltaAoRoot#14990151302624','Eliadron Medusa','9306823903022','','2017-07-02 19:24:10',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(37,'DeVoltaAoRoot#14990151302624','Six Sigma','92343242332','','2017-07-02 19:25:16',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(38,'DeVoltaAoRoot#14990151302624','Solo antoni','923983232','','2017-07-02 19:25:41',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(39,'DeVoltaAoRoot#14990151302624','Sjlklkl','9232323323','','2017-07-02 19:26:34',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(40,'DeVoltaAoRoot#14990318097518','Vitor Baia','922300765','','2017-07-02 22:49:14',NULL,'attended',NULL,NULL,NULL,NULL,NULL,NULL),(41,'DeVoltaAoMoments#233442334','Sox The One','+244923300765','','2017-07-20 16:50:40','2017-07-20 17:50:40','attended',NULL,NULL,NULL,NULL,NULL,NULL),(42,'DeVoltaAoMoments#14983068133911','Sousa Gaspar','888888888','','2017-07-20 17:13:26','2017-07-20 18:13:26','attended',NULL,NULL,NULL,NULL,NULL,NULL),(43,'DeVoltaAoRoot#15009284342641','Spxsia','+24492398765432','','2017-07-24 21:35:42','2017-07-24 22:35:42','attended',NULL,NULL,NULL,NULL,NULL,NULL),(44,'DeVoltaAoRoot#15009284342641','Soxasas','+91287182712121','','2017-07-24 21:35:56','2017-07-24 22:35:56','attended',NULL,NULL,NULL,NULL,NULL,NULL),(45,'DeVoltaAoRoot#15009284342641','Soxoxoxx','+92323232323232323','','2017-07-24 21:36:18','2017-07-24 22:36:18','attended',NULL,NULL,NULL,NULL,NULL,NULL),(46,'voltoAoRoot#17207-1359-50','SoxTheOne','930686545','','2017-07-27 13:04:25','2017-08-07 00:35:25','attended',NULL,NULL,NULL,NULL,NULL,NULL),(47,'voltoAoRoot#17207-1814-17','Dumi','+244924342150','','2017-07-27 17:17:01','2017-08-06 14:08:40','attended',NULL,NULL,NULL,NULL,NULL,NULL),(48,'voltoAoRoot#17208-1154-11','Dulce Gaspar','+244924342151','','2017-07-28 10:58:10','2017-07-28 11:58:10','attended',NULL,NULL,NULL,NULL,NULL,NULL),(49,'voltoAoRoot#17208-1154-11','Geronimo Gonga','+2249234533234','','2017-07-28 10:58:32','2017-07-28 11:58:32','attended',NULL,NULL,NULL,NULL,NULL,NULL),(50,'voltoAoRoot#17208-2141-43','Duni','+2449233454323','','2017-07-28 20:43:46','2017-07-28 21:49:18','attended',NULL,NULL,NULL,NULL,NULL,NULL),(51,'voltoAoRoot#17208-2141-43','Dsooos','+328372837238723','','2017-07-28 20:43:59','2017-07-28 21:43:59','attended',NULL,NULL,NULL,NULL,NULL,NULL),(52,'voltoAoRoot#17208-2141-43','Sox the one ','+24492367332222','','2017-07-28 20:44:36','2017-07-28 21:44:36','attended',NULL,NULL,NULL,NULL,NULL,NULL),(53,'voltoAoRoot#17208-2141-43','Soloed','+244923434232323','','2017-07-28 20:45:25','2017-07-28 21:45:25','attended',NULL,NULL,NULL,NULL,NULL,NULL),(54,'voltoAoRoot#17208-2141-43','Sousa Gaspar','9306865452323232','','2017-07-28 20:45:36','2017-07-28 21:45:36','attended',NULL,NULL,NULL,NULL,NULL,NULL),(55,'voltoAoRoot#17208-2141-43','Sdksjdsdkj','+923232323232332','','2017-07-28 20:45:58','2017-07-28 21:45:58','attended',NULL,NULL,NULL,NULL,NULL,NULL),(56,'voltoAoRoot#17208-2141-43','Sox the One','+92323829329329374839743','','2017-07-28 20:46:22','2017-07-28 21:46:22','attended',NULL,NULL,NULL,NULL,NULL,NULL),(57,'voltoAoRoot#17208-2141-43','Duni','+2449233454323','','2017-07-28 20:49:18','2017-07-28 21:49:18','attended',NULL,NULL,NULL,NULL,NULL,NULL),(58,'voltoAoRoot#17215-0234-33','Sox the one','+244922300521','','2017-08-04 01:45:58','2017-08-08 21:48:46','attended',NULL,NULL,NULL,NULL,NULL,NULL),(59,'voltoAoRoot#17215-1158-31','Sousa Gaspar','+244930686545','','2017-08-04 11:33:35','2017-08-08 21:54:25','attended',NULL,NULL,NULL,NULL,NULL,NULL),(60,'voltoAoRoot#17215-0217-15','Sox the One','+244908239889232','','2017-08-04 12:03:19','2017-08-04 13:03:19','attended',NULL,NULL,NULL,NULL,NULL,NULL),(61,'voltoAoRoot#17215-1158-31','Milton','+244921300846','','2017-08-04 15:20:08','2017-08-04 16:20:08','attended',NULL,NULL,NULL,NULL,NULL,NULL),(62,'voltoAoRoot#17215-1158-31','Sousa The One','+244924876546','','2017-08-05 15:05:24','2017-08-05 16:05:24','attended',NULL,NULL,NULL,NULL,NULL,NULL),(63,'voltoAoRoot#17215-1158-31','SoxTheOne','930686545','','2017-08-05 15:11:02','2017-08-07 00:35:25','attended',NULL,NULL,NULL,NULL,NULL,NULL),(64,'voltoAoRoot#17215-0238-19','SoxTheOne','930686545','','2017-08-05 15:34:36','2017-08-07 00:35:25','attended',NULL,NULL,NULL,NULL,NULL,NULL),(65,'voltoAoRoot#17216-1636-55','San Tiago Mota Lemos','+2449348765421','','2017-08-05 15:47:41','2017-08-05 16:47:41','attended',8000,NULL,NULL,NULL,NULL,NULL),(66,'voltoAoRoot#17215-1158-31','Junior Manuel','+24492365434576','','2017-08-05 16:14:23','2017-08-05 17:14:23','attended',NULL,NULL,NULL,NULL,NULL,NULL),(67,'voltoAoRoot#17215-1158-31','Jose Inacio','+24492345647876','','2017-08-05 16:17:20','2017-08-05 17:17:20','attended',NULL,NULL,NULL,NULL,NULL,NULL),(68,'voltoAoRoot#17215-1158-31','socio Rijo','+24492365457898','','2017-08-05 17:15:14','2017-08-05 18:15:14','attended',NULL,NULL,NULL,NULL,NULL,NULL),(69,'voltoAoRoot#17215-0238-19','Gildo Miguel','+2449234568787','','2017-08-05 17:20:13','2017-08-05 18:20:13','attended',NULL,NULL,NULL,NULL,NULL,NULL),(70,'voltoAoRoot#17215-0238-19','Miguel Matondo','+24492345642387','','2017-08-05 17:22:19','2017-08-05 18:37:46','attended',2400,NULL,NULL,NULL,NULL,NULL),(71,'voltoAoRoot#17215-0238-19','Mateus Matondo','+24492345642388','','2017-08-05 17:24:37','2017-08-05 18:24:37','attended',8900,NULL,NULL,NULL,NULL,NULL),(72,'voltoAoRoot#17216-1825-33','Matondo Miguel','+24492345642387','','2017-08-05 17:27:07','2017-08-05 18:37:46','attended',2400,NULL,NULL,NULL,NULL,NULL),(73,'voltoAoRoot#17216-1834-05','Sousa Gaspar','+29992392309203','','2017-08-05 17:35:15','2017-08-05 18:35:15','attended',7800,NULL,NULL,NULL,NULL,NULL),(74,'voltoAoRoot#17216-1834-05','Sox VIP','+244929389921389','','2017-08-05 17:36:13','2017-08-05 18:36:13','attended',9850,NULL,NULL,NULL,NULL,NULL),(75,'voltoAoRoot#17216-1834-05','Sola Emue','+2449237654567','','2017-08-05 17:37:00','2017-08-05 18:37:00','attended',9890,NULL,NULL,NULL,NULL,NULL),(76,'voltoAoRoot#17216-1834-05','Matondo Miguel','+24492345642387','','2017-08-05 17:37:46','2017-08-05 18:37:46','attended',2400,NULL,NULL,NULL,NULL,NULL),(77,'voltoAoRoot#17215-0238-19','Dumilde Agostinho','+244934876545','','2017-08-06 13:07:10','2017-08-06 14:07:10','attended',NULL,NULL,NULL,NULL,NULL,NULL),(78,'voltoAoRoot#17215-0238-19','Dumilda','+244924342150','','2017-08-06 13:08:40','2017-08-06 14:08:40','attended',NULL,NULL,NULL,NULL,NULL,NULL),(79,'voltoAoRoot#17215-0234-33','Joaos Michel','+24492387654567','','2017-08-06 17:52:36','2017-08-06 18:52:36','attended',NULL,NULL,NULL,NULL,NULL,NULL),(80,'voltoAoRoot#17215-0234-33','Sousa Gaspar','930686545','','2017-08-06 17:55:18','2017-08-07 00:35:25','attended',NULL,NULL,NULL,NULL,NULL,NULL),(81,'voltoAoRoot#17215-0234-33','Silvio Santos','+24492345432687','','2017-08-06 18:13:44','2017-08-06 19:13:44','attended',7800,NULL,NULL,NULL,NULL,NULL),(82,'voltoAoRoot#17215-0234-33','Sousa Gaspar','+244930686545','','2017-08-06 18:14:49','2017-08-08 21:54:25','attended',8600,NULL,NULL,NULL,NULL,NULL),(83,'voltoAoRoot#17217-1918-55','Silvana Almeida','+2449988782738273','','2017-08-06 18:20:38','2017-08-06 19:20:38','attended',12450,NULL,NULL,NULL,NULL,NULL),(84,'voltoAoRoot#17217-1930-40','Silvino Gaspar','+2449234563240','','2017-08-06 18:32:55','2017-08-06 19:32:55','attended',87600,NULL,NULL,NULL,NULL,NULL),(85,'voltoAoRoot#17217-1930-40','Silvino Gaspar','+244923456324','','2017-08-06 18:33:42','2017-08-06 19:33:42','attended',300600,NULL,NULL,NULL,NULL,NULL),(86,'voltoAoRoot#17215-0217-15','Joaquim Paulino','+2449233006786','','2017-08-06 18:48:24','2017-08-06 19:48:24','attended',13870,NULL,NULL,NULL,NULL,NULL),(87,'voltoAoRoot#17215-0217-15','Jose Paiva','+24492345345687','','2017-08-06 18:51:53','2017-08-06 19:51:53','attended',8900,NULL,NULL,NULL,NULL,NULL),(88,'voltoAoRoot#17215-0217-15','Faria Kengue','+244945876904','','2017-08-06 18:54:38','2017-08-06 19:54:38','attended',38900,NULL,NULL,NULL,NULL,NULL),(89,'voltoAoRoot#17215-0217-15','Reinaldo Miguel','+2449237656453','','2017-08-06 19:02:46','2017-08-06 20:02:46','attended',9800,NULL,NULL,NULL,NULL,NULL),(90,'voltoAoRoot#17215-0217-15','Sousa Gaspar','930686545','','2017-08-06 19:11:03','2017-08-07 00:35:25','attended',12000,NULL,NULL,NULL,NULL,NULL),(91,'voltoAoRoot#17215-0217-15','Sola de Sapato','+24498767564554','','2017-08-06 19:13:18','2017-08-06 20:13:18','attended',9560,NULL,NULL,NULL,NULL,NULL),(92,'voltoAoRoot#17215-0217-15','Ifrain Miguel','+24492345647865','','2017-08-06 19:18:02','2017-08-06 20:18:02','attended',1800,NULL,NULL,NULL,NULL,NULL),(93,'voltoAoRoot#17215-0217-15','Maria Guida','+2449234564738','','2017-08-06 19:19:37','2017-08-06 20:19:37','attended',8760,NULL,NULL,NULL,NULL,NULL),(94,'voltoAoRoot#17215-0217-15','Sousa Gaspar','+244922300521','','2017-08-06 19:20:58','2017-08-08 21:48:46','attended',9070,NULL,NULL,NULL,NULL,NULL),(95,'voltoAoRoot#17215-0155-55','Dulce Gamboa','+24492346587434','','2017-08-06 19:51:50','2017-08-06 20:51:50','attended',19700,NULL,NULL,NULL,NULL,NULL),(96,'voltoAoRoot#17215-0155-55','Ajudador Junior','+24492398767865','','2017-08-06 20:00:42','2017-08-06 21:00:42','attended',9800,NULL,NULL,NULL,NULL,NULL),(97,'voltoAoRoot#17215-0155-55','Victor Baia','+2449234565458723','','2017-08-06 20:05:42','2017-08-06 21:05:42','attended',58900,NULL,NULL,NULL,NULL,NULL),(98,'voltoAoRoot#17215-0155-55','Silvanio Miguel','+244923765678921','','2017-08-06 20:11:27','2017-08-06 21:11:27','attended',95700,NULL,NULL,NULL,NULL,NULL),(99,'voltoAoRoot#17215-0155-55','Paulinho Paixao','+24493476876092','','2017-08-06 20:12:31','2017-08-06 21:12:31','attended',9000,NULL,NULL,NULL,NULL,NULL),(100,'voltoAoRoot#17215-0155-55','Sousa Gaspar','+244923300521','','2017-08-06 20:13:21','2017-08-06 21:13:21','attended',8900,NULL,NULL,NULL,NULL,NULL),(101,'voltoAoRoot#17217-2308-25','Sol Nascente','+24492345648374384','','2017-08-06 22:09:26','2017-08-06 23:09:26','attended',8900,NULL,NULL,NULL,NULL,NULL),(102,'voltoAoRoot#17217-2308-25','Sousa Gaspar','930686545','','2017-08-06 22:13:57','2017-08-07 00:35:25','attended',8900,NULL,NULL,NULL,NULL,NULL),(103,'voltoAoRoot#17217-2308-25','Soba Thiago','+244923465798398','','2017-08-06 23:32:43','2017-08-07 00:32:43','attended',9000,NULL,NULL,NULL,NULL,NULL),(104,'voltoAoRoot#17217-2308-25','Sousa Gaspar','930686545','','2017-08-06 23:35:25','2017-08-07 00:35:25','attended',9000,NULL,NULL,NULL,NULL,NULL),(105,'voltoAoRoot#17217-2308-25','teste','+24492376569800','','2017-08-06 23:38:55','2017-08-07 00:38:56','attended',9000,NULL,NULL,NULL,NULL,NULL),(106,'voltoAoRoot#17217-2308-25','Souxa Miguel','+24492354687612','','2017-08-06 23:48:05','2017-08-07 00:48:05','attended',6900,NULL,NULL,NULL,NULL,NULL),(107,'voltoAoRoot#17217-2308-25','Teste Marinho','+244987654345','','2017-08-07 00:03:18','2017-08-07 01:03:19','attended',8900,NULL,NULL,NULL,NULL,NULL),(108,'voltoAoRoot#17217-2308-25','Teste Marinho9','+2449876543450','','2017-08-07 00:04:34','2017-08-07 01:04:34','attended',8900,NULL,NULL,NULL,NULL,NULL),(109,'voltoAoRoot#17217-2308-25','Teste Marinho9','+244987654345111','','2017-08-07 00:43:04','2017-08-07 01:43:04','attended',8900,NULL,NULL,NULL,NULL,NULL),(110,'voltoAoRoot#17217-2308-25','Teste Marinho9','+2449876543451112','','2017-08-07 00:44:02','2017-08-07 01:44:02','attended',8900,NULL,NULL,NULL,NULL,NULL),(111,'voltoAoRoot#17217-2308-25','Teste Marinho9','+24498765434511122','','2017-08-07 00:46:06','2017-08-07 01:46:06','attended',8900,NULL,NULL,NULL,NULL,NULL),(112,'voltoAoRoot#17217-2308-25','Teste Marinho9','+244987654345111221','','2017-08-07 00:47:09','2017-08-07 01:47:09','attended',8900,NULL,NULL,NULL,NULL,NULL),(113,'voltoAoRoot#17217-2308-25','Teste Marinho9','+244987654345111229','','2017-08-07 00:47:32','2017-08-07 01:47:32','attended',8900,NULL,NULL,NULL,NULL,NULL),(114,'voltoAoRoot#17217-2308-25','Teste Marinho9','+244987654345111228','','2017-08-07 00:48:16','2017-08-07 01:48:16','attended',8900,NULL,NULL,NULL,NULL,NULL),(115,'voltoAoRoot#17219-2147-40','Sousa Gaspar','+244922300521','','2017-08-08 20:48:46','2017-08-08 21:48:46','attended',9800,NULL,NULL,NULL,NULL,NULL),(116,'voltoAoRoot#17219-2149-19','Sousa Gaspar','+244930686545','','2017-08-08 20:54:25','2017-08-08 21:54:25','attended',4500,NULL,NULL,NULL,NULL,NULL),(117,'DeVoltaAoRoot#14988279405082','','','','2017-08-10 20:00:52','2017-08-10 22:50:30','attended',NULL,NULL,NULL,NULL,NULL,NULL),(118,'voltoAoRoot#17219-2149-19','','','','2017-08-10 21:50:30','2017-08-10 22:50:30','attended',NULL,NULL,NULL,NULL,NULL,NULL),(119,'voltoAoRoot#17219-2145-01','Sousa Gaspar','923765650','','2017-08-10 21:55:30','2017-08-10 22:55:30','attended',23309,NULL,NULL,NULL,NULL,NULL),(120,'voltoAoRoot#17222-1237-14','Silvana Almeida','9253007678','','2017-08-11 12:08:07',NULL,'valid',NULL,NULL,NULL,NULL,NULL,NULL),(121,'voltoAoRoot#17222-1237-14','Silvana Almeida','925300767','','2017-08-11 12:08:18','2017-08-11 13:08:43','attended',NULL,NULL,NULL,NULL,NULL,NULL),(122,'voltoAoRoot#17222-1237-14','Silvana Almeida','925300760','','2017-08-11 12:10:04','2017-08-11 13:10:04','attended',9000,NULL,NULL,NULL,NULL,NULL),(123,'voltoAoRoot#17222-1237-14','JoÃ£o LeitÃ£o','923Âª223423','','2017-08-11 12:11:02',NULL,'valid',NULL,NULL,NULL,NULL,NULL,NULL),(124,'voltoAoRoot#17222-1237-14','JoÃ£o LeitÃ£o','923300300','','2017-08-11 12:11:15','2017-08-11 13:11:26','attended',NULL,NULL,NULL,NULL,NULL,NULL),(125,'voltoAoRoot#17222-1237-14','JoÃ£o LeitÃ£o','923300301','','2017-08-11 12:12:03','2017-08-13 16:20:17','attended',8900,NULL,NULL,NULL,NULL,NULL),(126,'voltoAoRoot#17222-1237-14','Paulo Junior','923300123','','2017-08-11 12:12:43','2017-08-11 13:12:43','attended',3600,NULL,NULL,NULL,NULL,NULL),(127,'voltoAoRoot#17222-1237-14','','934564345','','2017-08-13 14:25:03','2017-08-13 15:25:40','attended',NULL,NULL,NULL,NULL,NULL,NULL),(128,'voltoAoRoot#17222-1237-14','Sousa Gaspar','934564346','','2017-08-13 14:26:24','2017-08-13 15:26:24','attended',92000,NULL,NULL,NULL,NULL,NULL),(129,'voltoAoRoot#17224-1605-07','Dulcino Matias','923988400','','2017-08-13 15:08:27','2017-08-13 16:08:27','attended',3700,NULL,NULL,0,2,NULL),(130,'voltoAoRoot#17222-1237-14','Miguel Gaspar','92300456','','2017-08-13 15:13:24',NULL,'valid',NULL,NULL,NULL,NULL,NULL,NULL),(131,'voltoAoRoot#17222-1237-14','Miguel Gaspar','925300456','','2017-08-13 15:13:33','2017-08-13 16:14:01','attended',1300,NULL,NULL,0,2,NULL),(132,'voltoAoRoot#17222-1237-14','Dumilda Gaspar','923300301','','2017-08-13 15:20:17','2017-08-13 16:20:17','attended',8500,NULL,NULL,170,2,NULL),(133,'voltoAoRoot#17222-1238-17','Silvio Santos','912345611','','2017-08-13 16:10:19','2017-08-13 17:10:19','attended',14800,NULL,NULL,296,2,NULL),(134,'voltoAoRoot#17224-1440-18','Silvia Neto','923333111','','2017-08-13 21:15:38','2017-08-13 22:15:38','attended',1450,NULL,NULL,29,2,0),(135,'voltoAoRoot#17222-1239-04','Valedemiro Matias','924300355','','2017-08-13 21:27:54','2017-08-13 22:27:54','attended',2640,NULL,NULL,53,2,0),(136,'voltoAoRoot#17222-1303-24','Elisangela Filomena','913300355','','2017-08-13 21:31:30','2017-08-13 22:31:30','attended',6800,NULL,NULL,136,2,2),(137,'voltoAoRoot#17222-1303-24','Filomena Luiz','922300543','','2017-08-13 21:42:47','2017-08-13 22:42:47','attended',8720,NULL,NULL,174,2,2),(138,'voltoAoRoot#17224-1440-18','Vinisius Vimalta','911222400','','2017-08-13 21:44:53','2017-08-13 22:44:53','attended',6780,NULL,NULL,136,2,2),(139,'voltoAoRoot#17224-1440-18','Sol Nascente','920233011','','2017-08-14 17:59:13','2017-08-14 18:59:13','attended',3960,NULL,NULL,79,2,2),(140,'voltoAoRoot#17224-1440-18','Silvino Viegas','991322990','','2017-08-14 18:01:21','2017-08-14 19:01:21','attended',4500,NULL,NULL,90,2,2),(141,'voltoAoRoot#17224-1440-18','Boticario Miralmo','911200111','','2017-08-14 18:10:23','2017-08-14 19:10:23','attended',3650,NULL,NULL,73,2,2),(142,'voltoAoRoot#17224-1440-18','Duni','944911911','','2017-08-14 18:13:47','2017-08-14 19:13:47','attended',17850,NULL,NULL,357,2,2),(143,'voltoAoRoot#17224-1440-18','Implicita Morena','923988766','','2017-08-14 18:14:35','2017-08-14 19:14:36','attended',14890,NULL,NULL,298,2,2),(144,'voltoAoRoot#17224-1440-18','Willian tindale','911111111','','2017-08-14 18:15:44','2017-08-14 19:15:44','attended',8790,NULL,NULL,176,2,2),(145,'voltoAoRoot#17224-1440-18','Mirela Miguel ','922222222','','2017-08-14 18:16:43','2017-08-14 19:16:43','attended',1230,NULL,NULL,25,2,2),(146,'voltoAoRoot#17224-1440-18','Suzelmo Miguel','944444444','','2017-08-14 18:17:40','2017-08-14 19:17:40','attended',2670,NULL,NULL,53,2,2),(147,'voltoAoRoot#17224-1440-18','Sociologo Mr','999999999','','2017-08-14 18:22:02','2017-08-14 19:22:03','attended',2690,NULL,NULL,54,2,2),(148,'voltoAoRoot#17224-1440-18','Dumilda Gaspar Neto','922777888','','2017-08-14 18:46:01',NULL,'valid',NULL,NULL,NULL,NULL,NULL,2),(149,'voltoAoRoot#17224-1440-18','Dumilda Gaspar Neto','922777889','','2017-08-14 18:47:18','2017-08-14 19:47:18','attended',8990.08,NULL,NULL,180,2,2),(150,'voltoAoRoot#17225-2154-28','Sox TheOne','922333111','','2017-08-14 20:56:22','2017-08-14 21:56:22','attended',7800,NULL,NULL,156,2,2),(151,'voltoAoRoot#17225-2154-28','Avelino Mucuaio','900000777','','2017-08-14 20:57:58','2017-08-14 21:57:58','attended',8270,NULL,NULL,165,2,2),(152,'voltoAoRoot#17225-2154-28','Robusto Mirel','901233911','','2017-08-14 20:59:15','2017-08-14 21:59:15','attended',2400,NULL,NULL,48,2,2),(153,'voltoAoRoot#17225-2154-28','Fineas Ferbe','988888888','','2017-08-14 21:01:15','2017-08-14 22:01:15','attended',5670,NULL,NULL,113,2,2),(154,'voltoAoRoot#17225-2154-28','Cao Mike','911223300','','2017-08-14 21:02:15','2017-08-14 22:02:15','attended',3900,NULL,NULL,78,2,2),(155,'voltoAoRoot#17225-2154-28','Silvio Manuel','922300309','','2017-08-14 21:03:35','2017-08-14 22:03:35','attended',3600,NULL,NULL,72,2,2),(156,'voltoAoRoot#17224-1440-18','Miguel Finela','923987345','','2017-08-14 21:08:06','2017-08-14 22:08:06','attended',6894,NULL,NULL,138,2,2),(157,'voltoAoRoot#17224-1440-18','Jilbert Gil','923000123','','2017-08-14 21:34:09','2017-08-14 22:34:09','attended',2370,NULL,NULL,47,2,2),(158,'voltoAoRoot#17226-1942-17','Delcio Bernardo','923300293','','2017-08-24 19:00:02','2017-08-24 20:00:03','attended',4800,NULL,NULL,96,2,2),(159,'voltoAoRoot#17226-1942-17','Silvania Augusto','930010101','','2017-08-24 19:16:11','2017-08-24 20:16:12','attended',2030,NULL,NULL,41,2,2);
/*!40000 ALTER TABLE `tbVipCodeAttendee` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-27 20:05:58
