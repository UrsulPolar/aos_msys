-- MySQL dump 10.13  Distrib 5.7.19, for Win64 (x86_64)
--
-- Host: localhost    Database: aos_msys_test
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Temporary table structure for view `server_list`
--

DROP TABLE IF EXISTS `server_list`;
/*!50001 DROP VIEW IF EXISTS `server_list`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `server_list` AS SELECT 
 1 AS `id`,
 1 AS `cluster`,
 1 AS `server_name`,
 1 AS `ip`,
 1 AS `application`,
 1 AS `environment`,
 1 AS `app_version`,
 1 AS `server_type`,
 1 AS `country`,
 1 AS `os`,
 1 AS `observations`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tbl_application`
--

DROP TABLE IF EXISTS `tbl_application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_application` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `application` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `application` (`application`),
  UNIQUE KEY `application_2` (`application`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_application`
--

LOCK TABLES `tbl_application` WRITE;
/*!40000 ALTER TABLE `tbl_application` DISABLE KEYS */;
INSERT INTO `tbl_application` VALUES (17,'2BAdvice'),(8,'Archiving'),(29,'Compliance Archive'),(18,'Compliance Logbook'),(14,'DNA'),(9,'EDI'),(5,'GeniTools'),(24,'HPSM'),(27,'Hygiene Hunter'),(15,'ICF'),(12,'Igentis'),(19,'Insider Register'),(23,'ITBM'),(1,'K2'),(20,'Legal Incident Manager'),(13,'LMS'),(22,'Metro Contract Manager'),(25,'METRO Maps'),(32,'MOOC'),(28,'Portals'),(6,'PrestigeEnterprise'),(21,'Q&A'),(7,'Reporting'),(26,'RM3'),(33,'Saba'),(10,'SAM'),(11,'SPRINT'),(16,'Staffplaner'),(2,'Tagetik'),(30,'Viper B4'),(4,'WebMaps'),(31,'WebTAX'),(3,'WebTMS');
/*!40000 ALTER TABLE `tbl_application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cluster`
--

DROP TABLE IF EXISTS `tbl_cluster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cluster` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `cluster` varchar(20) NOT NULL,
  `sh_cluster` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role` (`cluster`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cluster`
--

LOCK TABLES `tbl_cluster` WRITE;
/*!40000 ALTER TABLE `tbl_cluster` DISABLE KEYS */;
INSERT INTO `tbl_cluster` VALUES (1,'Cluster 1','C1'),(2,'Cluster 2','C2'),(3,'Cluster 3','C3'),(4,'Cluster 4','C4'),(5,'Cluster 5','C5');
/*!40000 ALTER TABLE `tbl_cluster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_country`
--

DROP TABLE IF EXISTS `tbl_country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_country` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `country` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_country`
--

LOCK TABLES `tbl_country` WRITE;
/*!40000 ALTER TABLE `tbl_country` DISABLE KEYS */;
INSERT INTO `tbl_country` VALUES (1,'DE'),(2,'RU'),(3,'NA'),(4,'ES'),(5,'HU'),(6,'KZ'),(7,'PL'),(8,'PT'),(9,'RO'),(10,'UA');
/*!40000 ALTER TABLE `tbl_country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_environment`
--

DROP TABLE IF EXISTS `tbl_environment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_environment` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `environment` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_environment`
--

LOCK TABLES `tbl_environment` WRITE;
/*!40000 ALTER TABLE `tbl_environment` DISABLE KEYS */;
INSERT INTO `tbl_environment` VALUES (1,'Development'),(2,'Preproduction'),(3,'Production'),(4,'Proof Of Concept'),(5,'Test'),(6,'Demo');
/*!40000 ALTER TABLE `tbl_environment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_observations`
--

DROP TABLE IF EXISTS `tbl_observations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_observations` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `observations` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_observations`
--

LOCK TABLES `tbl_observations` WRITE;
/*!40000 ALTER TABLE `tbl_observations` DISABLE KEYS */;
INSERT INTO `tbl_observations` VALUES (1,''),(2,'Clustered'),(3,'New'),(4,'Old'),(5,'Alternate');
/*!40000 ALTER TABLE `tbl_observations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_os`
--

DROP TABLE IF EXISTS `tbl_os`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_os` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `os_name` varchar(100) NOT NULL,
  `arch` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_os` (`os_name`,`arch`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_os`
--

LOCK TABLES `tbl_os` WRITE;
/*!40000 ALTER TABLE `tbl_os` DISABLE KEYS */;
INSERT INTO `tbl_os` VALUES (2,'Windows 10','x32'),(1,'Windows 10','x64'),(13,'Windows 7','x32'),(12,'Windows 7','x64'),(9,'Windows 8','x32'),(8,'Windows 8','x64'),(5,'Windows 8.1','x32'),(4,'Windows 8.1','x64'),(23,'Windows Server 2003','x32'),(22,'Windows Server 2003','x64'),(21,'Windows Server 2003 R2','x32'),(20,'Windows Server 2003 R2','x64'),(17,'Windows Server 2008','x32'),(16,'Windows Server 2008','x64'),(15,'Windows Server 2008 R2','x32'),(14,'Windows Server 2008 R2','x64'),(11,'Windows Server 2012','x32'),(10,'Windows Server 2012','x64'),(7,'Windows Server 2012 R2','x32'),(6,'Windows Server 2012 R2','x64'),(3,'Windows Server 2016','x64'),(19,'Windows Vista','x32'),(18,'Windows Vista','x64');
/*!40000 ALTER TABLE `tbl_os` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_server_tech_rel`
--

DROP TABLE IF EXISTS `tbl_server_tech_rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_server_tech_rel` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_server` int(5) DEFAULT NULL,
  `id_tech` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_server_tech_rel`
--

LOCK TABLES `tbl_server_tech_rel` WRITE;
/*!40000 ALTER TABLE `tbl_server_tech_rel` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_server_tech_rel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_server_type`
--

DROP TABLE IF EXISTS `tbl_server_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_server_type` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `server_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `server_type` (`server_type`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_server_type`
--

LOCK TABLES `tbl_server_type` WRITE;
/*!40000 ALTER TABLE `tbl_server_type` DISABLE KEYS */;
INSERT INTO `tbl_server_type` VALUES (1,'Application'),(2,'Database'),(5,'NA'),(3,'SharePoint'),(4,'Webserver');
/*!40000 ALTER TABLE `tbl_server_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_servers`
--

DROP TABLE IF EXISTS `tbl_servers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_servers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cluster` varchar(4) DEFAULT NULL,
  `server_name` varchar(100) DEFAULT NULL,
  `ip` varchar(16) NOT NULL,
  `id_app` int(10) NOT NULL,
  `id_env` int(5) NOT NULL,
  `app_version` varchar(100) NOT NULL,
  `id_serv_type` int(5) NOT NULL,
  `id_country` int(5) NOT NULL,
  `id_tech` json DEFAULT NULL,
  `id_obs` int(15) DEFAULT NULL,
  `id_os` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`),
  KEY `fk_tbl_obs_serv` (`id_obs`),
  KEY `fk_tbl_application` (`id_app`),
  KEY `fk_tbl_country` (`id_country`),
  KEY `fk_tbl_environments` (`id_env`),
  KEY `fk_tbl_os` (`id_os`),
  KEY `fk_tbl_serv_type` (`id_serv_type`),
  CONSTRAINT `fk_tbl_application` FOREIGN KEY (`id_app`) REFERENCES `tbl_application` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_tbl_country` FOREIGN KEY (`id_country`) REFERENCES `tbl_country` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tbl_environments` FOREIGN KEY (`id_env`) REFERENCES `tbl_environment` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tbl_obs_serv` FOREIGN KEY (`id_obs`) REFERENCES `tbl_observations` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_tbl_os` FOREIGN KEY (`id_os`) REFERENCES `tbl_os` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tbl_serv_type` FOREIGN KEY (`id_serv_type`) REFERENCES `tbl_server_type` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_servers`
--

LOCK TABLES `tbl_servers` WRITE;
/*!40000 ALTER TABLE `tbl_servers` DISABLE KEYS */;
INSERT INTO `tbl_servers` VALUES (1,'C2','FFM20TSTZST0002','10.21.105.168',1,1,'4.6.11',1,1,NULL,NULL,10),(2,'C2','FFM20TSTZST0003','10.21.105.169',1,1,'4.6.11',2,1,NULL,NULL,10),(3,'C2','FFM20APPZST0008','10.21.109.50',1,2,'4.6.11',1,1,NULL,NULL,10),(4,'C2','FFM20DBAZST0008','10.21.109.147',1,2,'4.6.11',2,1,NULL,NULL,10),(5,'C2','FFM20APPZST0007','10.21.109.115',1,2,'4.6.11',3,1,NULL,NULL,10),(6,'C2','FFM20WEBZST0008','10.21.109.116',1,2,'4.6.11',4,1,NULL,NULL,10),(7,'C2','FFM20APPZST0010','10.21.109.119',1,3,'4.6.11',1,1,NULL,NULL,10),(8,'C2','FFM20DBAZST0009','10.21.109.148',1,3,'4.6.11',2,1,NULL,NULL,10),(9,'C2','FFM20APPZST0009','10.21.109.114',1,3,'4.6.11',3,1,NULL,NULL,10),(10,'C2','FFM20WEBZST0009','10.21.109.118',1,3,'4.6.11',4,1,NULL,NULL,10),(11,'C2','FFM30APPZST0056','10.21.108.159',1,1,'4.6.7',2,2,NULL,NULL,NULL),(12,'C2','FFM30DBAZST0016','10.21.108.235',1,1,'4.6.7',1,2,NULL,NULL,NULL),(13,'C2','FFM30APPZST0037','10.21.108.236',1,2,'4.6.11',1,2,NULL,NULL,NULL),(14,'C2','FFM30DBAZST0015','10.21.108.234',1,2,'4.6.11',2,2,NULL,NULL,NULL),(15,'C2','FFM30APPZST0038','10.21.108.237',1,2,'4.6.11',3,2,NULL,NULL,NULL),(16,'C2','FFM30WEBZST0008','10.21.108.238',1,2,'4.6.11',4,2,NULL,NULL,NULL),(17,'C2','FFM30APPZST0035','10.21.108.253',1,3,'4.6.7',1,2,NULL,NULL,NULL),(18,'C2','FFM30DBAZST0010','10.21.108.252',1,3,'4.6.7',2,2,NULL,2,NULL),(19,'C2','FFM30DBAZST0009','10.21.108.251',1,3,'4.6.7',2,2,NULL,2,NULL),(20,'C2','FFM30APPZST0036','10.21.108.254',1,3,'4.6.7',3,2,NULL,NULL,NULL),(21,'C2','FFM30WEBZST0007','10.21.109.4',1,3,'4.6.7',4,2,NULL,NULL,NULL),(22,'C3','FFM20APPZST0002','10.21.108.160',2,1,'NA',1,3,NULL,NULL,NULL),(23,'C3','FFM20DBAZST0007','10.21.109.161',2,1,'NA',2,3,NULL,NULL,NULL),(24,'C3','FFM20APPZST0003','10.21.109.68',2,4,'NA',1,3,NULL,NULL,NULL),(25,'C3','FFM20DBAZST0033','10.21.109.160',2,4,'NA',2,3,NULL,NULL,NULL),(26,'C3','FFM11APPZST0026','10.21.224.39',2,2,'NA',1,3,NULL,NULL,NULL),(27,'C3','FFM11APPZST0027','10.21.224.40',2,2,'NA',1,3,NULL,NULL,NULL),(28,'C3','FFM11DBAZST0039','10.21.224.41',2,2,'NA',2,3,NULL,NULL,NULL),(29,'C3','FFM20APPZST0122','10.21.224.72',2,3,'NA',1,3,NULL,NULL,NULL),(30,'C3','FFM20APPZST0123','10.21.224.73',2,3,'NA',1,3,NULL,NULL,NULL),(31,'C3','FFM20APPZST0124','10.21.224.74',2,3,'NA',1,3,NULL,NULL,NULL),(32,'C3','FFM20APPZST0125','10.21.224.75',2,3,'NA',1,3,NULL,NULL,NULL),(33,'C3','FFM20APPZST0126','10.21.224.76',2,3,'NA',1,3,NULL,NULL,NULL),(34,'C3','FFM20APPZST0127','10.21.224.77',2,3,'NA',1,3,NULL,NULL,NULL),(35,'C3','FFM20DBAZST0120','10.21.224.78',2,3,'NA',2,3,NULL,NULL,NULL),(36,'C1','DUS20APPZST0003','10.16.250.136',3,3,'NA',1,3,NULL,NULL,NULL),(37,'C1','FFM20WEBZST0001','10.21.108.170',4,3,'NA',1,3,NULL,NULL,NULL),(38,'C1','FFM11APPZST0018','10.21.22.119',5,3,'NA',1,3,NULL,3,NULL),(39,'C1','FFM11DBAZST0069','10.21.22.114',5,3,'NA',2,3,NULL,3,NULL),(40,'C1','FFM30APPSTMCC01','10.21.22.59',5,3,'NA',1,3,NULL,4,NULL),(41,'C1','FFM30DBASTMCC01','10.21.22.60',5,3,'NA',2,3,NULL,4,NULL),(42,'C3','FFM30APPSTMGI12','10.21.22.80',6,2,'3.4.1',1,3,NULL,NULL,NULL),(43,'C3','FFM30DBASTMCC30','10.21.20.103',6,3,'NA',2,3,NULL,NULL,NULL),(44,'C3','FFM30DBASTMCC25','10.21.20.102',6,3,'NA',2,1,NULL,NULL,NULL),(45,'C3','FFM11APPZST0001','10.21.108.43',6,3,'3.4.1',1,1,NULL,NULL,NULL),(46,'C3','FFM30WEBSTMCC26','10.21.21.114',6,3,'3.4.1',1,4,NULL,NULL,NULL),(47,'C3','FFM11APPZST0009','10.21.22.130',6,3,'3.4.1',1,5,NULL,NULL,NULL),(48,'C3','FFM30APPSTMCC10','10.21.108.33',6,3,'3.4.1',1,6,NULL,NULL,NULL),(49,'C3','FFM30APPZST0072','10.21.22.19',6,3,'3.4.1',1,7,NULL,NULL,NULL),(50,'C3','FFM11APPZST0006','10.21.108.95',6,3,'3.4.1',1,8,NULL,NULL,NULL),(51,'C3','FFM30WEBSTMCC27','10.21.21.172',6,3,'3.4.1',1,9,NULL,NULL,NULL),(52,'C3','FFM30APPSTMGI36','10.21.22.153',6,3,'3.4.1',1,2,NULL,NULL,NULL),(53,'C3','FFM30APPSTMCC14','10.21.108.55',6,3,'3.4.1',1,10,NULL,5,NULL),(54,'C3','FFM11APPZST0008','10.21.108.21',6,3,'3.4.1',1,10,NULL,3,NULL),(55,'C3','FFM30APPZST0071','10.21.22.94',6,5,'3.4.1',1,3,NULL,NULL,NULL),(56,'C3','FFM30APPZST0067','10.21.22.240',6,6,'3.4.1',1,3,NULL,NULL,NULL),(57,'C1','FFM30SRVSTMGI43','10.21.20.73',7,3,'NA',1,3,NULL,NULL,NULL),(58,'C5','FFM30SRVSTMGI05','10.21.21.17',8,3,'NA',1,3,NULL,NULL,NULL),(59,'C1','FFM30APPSTMGI70','10.21.22.225',9,3,'NA',1,3,NULL,NULL,NULL),(60,'C1','FFM30SRVSTMGP01','10.21.20.72',10,3,'NA',1,3,NULL,NULL,NULL),(61,'C1','DUS30DBASTMCC12','10.16.250.96',11,3,'NA',1,3,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_servers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tag_logs`
--

DROP TABLE IF EXISTS `tbl_tag_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tag_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `LOGID` int(11) DEFAULT '0',
  `LEVEL` varchar(6) DEFAULT '0',
  `BLANK` varchar(5) DEFAULT '0',
  `CLASS` tinytext,
  `LEVEL2` varchar(50) DEFAULT '0',
  `%TCPM%` varchar(6) DEFAULT '0',
  `EPOCH` bigint(20) DEFAULT NULL,
  `DATE` date DEFAULT NULL,
  `TIME` tinytext,
  `THREAD_ID` tinytext,
  `THREAD_NAME` tinytext,
  `REMOTE_ADDRESS` tinytext,
  `SESSION_ID` tinytext,
  `USER_NAME` tinytext,
  `MAX_MEMORY_MB` int(11) DEFAULT '0',
  `TOTAL_MEMORY_MB` int(11) DEFAULT '0',
  `MEM_USED_MB` int(11) DEFAULT '0',
  `MEM_USED_PERC` int(11) DEFAULT '0',
  `%MPCT%` varchar(6) DEFAULT '0',
  `MESSAGE` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tag_logs`
--

LOCK TABLES `tbl_tag_logs` WRITE;
/*!40000 ALTER TABLE `tbl_tag_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tag_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tech`
--

DROP TABLE IF EXISTS `tbl_tech`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tech` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `tech_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tech_name` (`tech_name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tech`
--

LOCK TABLES `tbl_tech` WRITE;
/*!40000 ALTER TABLE `tbl_tech` DISABLE KEYS */;
INSERT INTO `tbl_tech` VALUES (1,'Apache'),(3,'Apache Tomcat'),(13,'BashScripting'),(12,'BatchScripting'),(2,'IIS'),(9,'JAVA'),(4,'JBoss'),(5,'MSSQL'),(6,'MySQL'),(7,'Oracle DB'),(8,'PHP'),(10,'PowerShell'),(11,'SFTP');
/*!40000 ALTER TABLE `tbl_tech` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `user_rights` enum('A','U','G') NOT NULL DEFAULT 'G',
  `cluster_id` int(11) NOT NULL,
  `password_hash` text NOT NULL,
  `times_stamp` datetime DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `message` text,
  `valid` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='SELECT a.username, a.nume, a.prenume, a.active, a.user_rights, b.sh_cluster, c.username from aos_msys.tbl_users a left join aos_msys.tbl_users c on a.created_by=c.id left join aos_msys.tbl_cluster b on a.cluster_id = b.id';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_users`
--

LOCK TABLES `tbl_users` WRITE;
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` VALUES (1,'Cocea','Radu','radu.cocea',1,'A',2,'$2y$11$PJ3qriUeZTERc9znab7Ixe38gg4gtT2lBRf8LjApWxsR2TbnTqwhC','2018-01-09 16:09:28',1,NULL,NULL),(2,'Simonfi','Tiberiu','tiberiu.simonfi',1,'U',2,'$2y$11$3xGthQMR.h7TxQp.oiB2ue5yHaPIh2uFKRbgcCrIZUhnZty5FMfye','2018-01-10 07:32:47',1,NULL,NULL);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_workstations`
--

DROP TABLE IF EXISTS `tbl_workstations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_workstations` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `hostname` varchar(20) NOT NULL,
  `mac_addr` varchar(12) NOT NULL,
  `IPv4` varchar(15) NOT NULL,
  `reserved_ip` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `IPv4` (`IPv4`),
  KEY `fk_user_id` (`user_id`),
  CONSTRAINT `fk_tbl_users_wkst` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_workstations`
--

LOCK TABLES `tbl_workstations` WRITE;
/*!40000 ALTER TABLE `tbl_workstations` DISABLE KEYS */;
INSERT INTO `tbl_workstations` VALUES (1,1,'BUK30LAP4000993','54EE75E67B60','10.23.10.148',1),(2,2,'BUK30LAP4000100','54EE75D34EE1','10.23.13.219',1);
/*!40000 ALTER TABLE `tbl_workstations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmp`
--

DROP TABLE IF EXISTS `tmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tmp`
--

LOCK TABLES `tmp` WRITE;
/*!40000 ALTER TABLE `tmp` DISABLE KEYS */;
INSERT INTO `tmp` VALUES (1,'mo'),(2,'23');
/*!40000 ALTER TABLE `tmp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `server_list`
--

/*!50001 DROP VIEW IF EXISTS `server_list`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `server_list` AS select `tbl_servers`.`id` AS `id`,`tbl_servers`.`cluster` AS `cluster`,`tbl_servers`.`server_name` AS `server_name`,`tbl_servers`.`ip` AS `ip`,`tbl_application`.`application` AS `application`,`tbl_environment`.`environment` AS `environment`,`tbl_servers`.`app_version` AS `app_version`,`tbl_server_type`.`server_type` AS `server_type`,`tbl_country`.`country` AS `country`,concat(`tbl_os`.`os_name`,' ',`tbl_os`.`arch`) AS `os`,`tbl_observations`.`observations` AS `observations` from ((((((`tbl_servers` left join `tbl_application` on((`tbl_servers`.`id_app` = `tbl_application`.`id`))) left join `tbl_environment` on((`tbl_servers`.`id_env` = `tbl_environment`.`id`))) left join `tbl_server_type` on((`tbl_servers`.`id_serv_type` = `tbl_server_type`.`id`))) left join `tbl_country` on((`tbl_servers`.`id_country` = `tbl_country`.`id`))) left join `tbl_os` on((`tbl_servers`.`id_os` = `tbl_os`.`id`))) left join `tbl_observations` on((`tbl_servers`.`id_obs` = `tbl_observations`.`id`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-02-25  2:06:49
