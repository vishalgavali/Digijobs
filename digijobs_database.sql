-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: digijobs
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `u_name` varchar(20) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (101,'admin','a1234');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apply`
--

DROP TABLE IF EXISTS `apply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apply` (
  `u_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  KEY `u_id` (`u_id`),
  KEY `j_id` (`j_id`),
  CONSTRAINT `apply_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`),
  CONSTRAINT `apply_ibfk_2` FOREIGN KEY (`j_id`) REFERENCES `job` (`j_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apply`
--

LOCK TABLES `apply` WRITE;
/*!40000 ALTER TABLE `apply` DISABLE KEYS */;
INSERT INTO `apply` VALUES (1,2),(3,13);
/*!40000 ALTER TABLE `apply` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(40) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Infosys','Pune'),(2,'TCS','Bangalore'),(3,'Tata Motors','Delhi'),(4,'Mahindra','Mumbai'),(5,'GK Developers','Nagpur'),(6,'Amdocs','Banglore'),(7,'Tech Mahindra','Pune'),(8,'Maruti Suzuki','New Delhi');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger company_before_delete before delete on company for each row begin 
declare auser varchar(20);
select user() into auser;
insert into company_backup(c_id, c_name,city,deleted_date,deleted_by) values (old.c_id,old.c_name,current_timestamp(),auser);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `company_backup`
--

DROP TABLE IF EXISTS `company_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_backup` (
  `c_id` int(11) DEFAULT NULL,
  `c_name` varchar(40) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `deleted_date` varchar(30) DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_backup`
--

LOCK TABLES `company_backup` WRITE;
/*!40000 ALTER TABLE `company_backup` DISABLE KEYS */;
/*!40000 ALTER TABLE `company_backup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job` (
  `j_id` int(11) NOT NULL AUTO_INCREMENT,
  `j_profile` varchar(40) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `vacancy` int(11) DEFAULT NULL,
  `package` float DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`j_id`),
  KEY `c_id` (`c_id`),
  CONSTRAINT `job_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `company` (`c_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job`
--

LOCK TABLES `job` WRITE;
/*!40000 ALTER TABLE `job` DISABLE KEYS */;
INSERT INTO `job` VALUES (2,'Software Engineer','Pune',2,4.2,1),(3,'Web Developer','Pune',10,3.2,2),(4,'Mechanical Engineer','Delhi',10,3.8,3),(5,'Civil Engineer','Nagpur',5,3.2,5),(6,'Automobile Engineer','Mumbai',10,4.5,8),(7,'Software Tester','Pune',20,4.2,7),(8,'Network Engineer','Pune',5,4.8,2),(9,'Marketing Executive','Ahmednagar',6,2.8,8),(10,'ios Developer','Banglore',20,3.5,1),(11,'Quality Control Manager','Surat',2,3.2,4),(12,'Production Engineer','Delhi',2,3.3,3),(13,'Network Engineer','Banglore',8,3.8,6),(14,'Software Engineer','Pune',20,4,6);
/*!40000 ALTER TABLE `job` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger job_before_delete before delete on job for each row begin 
declare auser varchar(20);
select user() into auser;
insert into job_backup(j_id, j_profile,deleted_date,deleted_by) values (old.j_id,old.j_profile,current_timestamp(),auser);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `job_backup`
--

DROP TABLE IF EXISTS `job_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_backup` (
  `j_id` int(11) DEFAULT NULL,
  `j_profile` varchar(40) DEFAULT NULL,
  `deleted_date` varchar(30) DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_backup`
--

LOCK TABLES `job_backup` WRITE;
/*!40000 ALTER TABLE `job_backup` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_backup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(15) DEFAULT NULL,
  `l_name` varchar(15) DEFAULT NULL,
  `e_mail` varchar(40) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Vishal','Gavali','vishalgavali2@gmail.com','9172729518','1998-11-30','Pune','12345'),(3,'Yogesh','Dahake','yogeshdahake@gmail.com','9860484772','1997-09-09','Nagpur','123');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 trigger user_before_delete before delete on user for each row begin declare auser varchar(20); select user() into auser; insert into user_backup(u_id, f_name,l_name,e_mail,mobile,deleted_date,deleted_by) values (old.u_id,old.f_name,old.l_name,old.e_mail,old.mobile,current_timestamp(),auser);
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `user_backup`
--

DROP TABLE IF EXISTS `user_backup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_backup` (
  `u_id` int(11) DEFAULT NULL,
  `f_name` varchar(15) DEFAULT NULL,
  `l_name` varchar(15) DEFAULT NULL,
  `e_mail` varchar(40) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `deleted_date` varchar(30) DEFAULT NULL,
  `deleted_by` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_backup`
--

LOCK TABLES `user_backup` WRITE;
/*!40000 ALTER TABLE `user_backup` DISABLE KEYS */;
INSERT INTO `user_backup` VALUES (2,'Yogesh','Dahake','yogeshdahake@gmail.com','9860484772','2019-10-23 19:31:58','root@localhost');
/*!40000 ALTER TABLE `user_backup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `user_view`
--

DROP TABLE IF EXISTS `user_view`;
/*!50001 DROP VIEW IF EXISTS `user_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `user_view` AS SELECT 
 1 AS `u_id`,
 1 AS `f_name`,
 1 AS `l_name`,
 1 AS `e_mail`,
 1 AS `mobile`,
 1 AS `dob`,
 1 AS `city`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `user_view`
--

/*!50001 DROP VIEW IF EXISTS `user_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `user_view` AS select `user`.`u_id` AS `u_id`,`user`.`f_name` AS `f_name`,`user`.`l_name` AS `l_name`,`user`.`e_mail` AS `e_mail`,`user`.`mobile` AS `mobile`,`user`.`dob` AS `dob`,`user`.`city` AS `city` from `user` */;
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

-- Dump completed on 2019-11-01 12:34:28
