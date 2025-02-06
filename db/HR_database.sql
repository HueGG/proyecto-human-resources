CREATE DATABASE  IF NOT EXISTS `hr_02` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hr_02`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: hr_02
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account_status`
--

DROP TABLE IF EXISTS `account_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `account_status` (
  `STATUS_ID` int NOT NULL AUTO_INCREMENT,
  `STATUS_TITLE` varchar(25) NOT NULL,
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`STATUS_ID`),
  UNIQUE KEY `STATUS_TITLE_UNIQUE` (`STATUS_TITLE`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account_status`
--

LOCK TABLES `account_status` WRITE;
/*!40000 ALTER TABLE `account_status` DISABLE KEYS */;
INSERT INTO `account_status` VALUES (1,'Activo','Usuario activo'),(2,'Inactivo','Usuario inactivo');
/*!40000 ALTER TABLE `account_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `asistencias`
--

DROP TABLE IF EXISTS `asistencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asistencias` (
  `ASISTENCIA_ID` int NOT NULL AUTO_INCREMENT,
  `EMPLOYEE_ID` int NOT NULL,
  `ENTRADA` timestamp NULL DEFAULT NULL,
  `SALIDA` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ASISTENCIA_ID`),
  KEY `FK_EMPLOYEE_ID_idx` (`EMPLOYEE_ID`),
  CONSTRAINT `FK_EMPLOYEE_ID` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employees` (`EMPLOYEE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=392 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencias`
--

LOCK TABLES `asistencias` WRITE;
/*!40000 ALTER TABLE `asistencias` DISABLE KEYS */;
INSERT INTO `asistencias` VALUES (8,238,'2023-06-12 23:55:58','2023-06-13 00:04:20'),(9,254,'2023-06-13 00:08:51','2023-06-13 00:09:04'),(10,238,'2023-06-13 17:28:27','2023-06-13 17:28:51'),(11,238,'2023-06-18 04:42:25','2023-06-18 04:42:41'),(13,252,'2023-06-18 06:10:36','2023-06-18 06:10:39'),(14,253,'2023-06-18 06:52:20','2023-06-18 06:52:22'),(15,240,'2023-06-19 00:05:54','2023-06-19 00:07:59'),(364,259,'2023-06-09 14:00:00','2023-06-10 00:00:00'),(365,259,'2023-06-08 14:00:00','2023-06-09 00:00:00'),(366,259,'2023-06-07 14:00:00','2023-06-08 00:00:00'),(367,259,'2023-06-06 14:00:00','2023-06-07 00:00:00'),(368,259,'2023-06-05 14:00:00','2023-06-06 00:00:00'),(369,259,'2023-06-02 14:00:00','2023-06-03 00:00:00'),(370,259,'2023-06-01 14:00:00','2023-06-02 00:00:00'),(371,259,'2023-06-16 14:00:00','2023-06-17 00:00:00'),(372,259,'2023-06-15 14:00:00','2023-06-16 00:00:00'),(373,259,'2023-06-14 14:00:00','2023-06-15 00:00:00'),(374,259,'2023-06-13 14:00:00','2023-06-14 00:00:00'),(375,259,'2023-06-12 14:00:00','2023-06-13 00:00:00'),(379,235,'2023-06-19 07:13:27',NULL),(380,234,'2023-06-19 15:13:07','2023-06-19 15:13:20'),(381,259,'2023-06-19 15:26:05','2023-06-19 15:26:09'),(382,244,'2023-06-19 16:39:22','2023-06-19 16:39:29'),(383,244,'2023-06-20 06:43:00',NULL),(384,234,'2023-06-20 14:10:00',NULL),(385,264,'2023-06-20 18:38:45','2023-06-20 18:39:24'),(386,233,'2023-06-21 14:01:34','2023-06-21 14:02:09'),(387,253,'2023-06-21 14:25:52',NULL),(388,270,'2023-06-21 15:16:44',NULL),(389,253,'2023-08-22 03:19:18','2023-08-22 03:41:18'),(390,270,'2023-09-20 15:48:39','2023-09-20 15:49:12'),(391,270,'2025-01-22 09:04:21',NULL);
/*!40000 ALTER TABLE `asistencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `countries` (
  `COUNTRY_ID` varchar(2) NOT NULL,
  `COUNTRY_NAME` varchar(40) DEFAULT NULL,
  `REGION_ID` int DEFAULT NULL,
  PRIMARY KEY (`COUNTRY_ID`),
  KEY `COUNTR_REG_FK_idx` (`REGION_ID`),
  CONSTRAINT `COUNTR_REG_FK` FOREIGN KEY (`REGION_ID`) REFERENCES `regions` (`REGION_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES ('AR','Argentina',2),('AU','Australia',3),('BE','Belgium',1),('BR','Brazil',2),('CA','Canada',2),('CH','Switzerland',1),('CN','China',3),('CO','Colombia',2),('DE','Germany',1),('DK','Denmark',1),('EG','Egypt',4),('FR','France',1),('IL','Israel',4),('IN','India',3),('IT','Italy',1),('JP','Japan',3),('KW','Kuwait',4),('ML','Malaysia',3),('MX','Mexico',2),('NG','Nigeria',4),('NL','Netherlands',1),('SG','Singapore',3),('UK','United Kingdom',1),('US','United States of America',2),('ZM','Zambia',4),('ZW','Zimbabwe',4);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!50001 DROP VIEW IF EXISTS `departamentos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `departamentos` AS SELECT 
 1 AS `DEPARTAMENTO_ID`,
 1 AS `DEPARTAMENTO`,
 1 AS `GERENTE_ID`,
 1 AS `GERENTE`,
 1 AS `LOCACION_ID`,
 1 AS `DIRECCION`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `departamentos_resumen`
--

DROP TABLE IF EXISTS `departamentos_resumen`;
/*!50001 DROP VIEW IF EXISTS `departamentos_resumen`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `departamentos_resumen` AS SELECT 
 1 AS `DEPARTAMENTO_ID`,
 1 AS `DEPARTAMENTO`,
 1 AS `GERENTE`,
 1 AS `DIRECCION`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departments` (
  `DEPARTMENT_ID` int NOT NULL AUTO_INCREMENT,
  `DEPARTMENT_NAME` varchar(30) NOT NULL,
  `MANAGER_ID` int DEFAULT NULL,
  `LOCATION_ID` int DEFAULT NULL,
  PRIMARY KEY (`DEPARTMENT_ID`),
  UNIQUE KEY `DEPARTMENT_ID_UNIQUE` (`DEPARTMENT_ID`),
  KEY `DEPT_LOC_FK_idx` (`LOCATION_ID`),
  KEY `DEPT_MGR_FK_idx` (`MANAGER_ID`),
  CONSTRAINT `DEPT_LOC_FK` FOREIGN KEY (`LOCATION_ID`) REFERENCES `locations` (`LOCATION_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `DEPT_MGR_FK` FOREIGN KEY (`MANAGER_ID`) REFERENCES `employees` (`EMPLOYEE_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=272 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (7,'Inactive Employees',NULL,NULL),(8,'Retirees Employees',NULL,NULL),(9,'Former Employees',NULL,NULL),(10,'Administration',205,1100),(20,'Marketing',201,1800),(30,'Purchasing',145,1700),(40,'Human Resources',203,2400),(50,'Shipping',121,1500),(60,'IT',103,1400),(70,'Public Relations',204,2700),(80,'Sales',145,2500),(90,'Executive',100,1700),(100,'Finance',108,1700),(110,'Accounting',205,1700),(120,'Treasury',NULL,1700),(130,'Corporate Tax',NULL,1700),(140,'Control And Credit',NULL,1700),(150,'Shareholder Services',NULL,1700),(160,'Benefits',NULL,1700),(170,'Manufacturing',NULL,1700),(180,'Construction',NULL,1700),(190,'Contracting',NULL,1700),(200,'Operations',NULL,1700),(210,'IT Support',NULL,1700),(220,'NOC',NULL,1700),(230,'IT Helpdesk',NULL,1700),(240,'Government Sales',NULL,1700),(250,'Retail Sales',NULL,1700),(260,'Recruiting',NULL,1700),(270,'Payroll',NULL,1700);
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `empleados_resumen`
--

DROP TABLE IF EXISTS `empleados_resumen`;
/*!50001 DROP VIEW IF EXISTS `empleados_resumen`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `empleados_resumen` AS SELECT 
 1 AS `EMPLEADO_ID`,
 1 AS `NOMBRE`,
 1 AS `CORREO`,
 1 AS `TELEFONO`,
 1 AS `FECHA_CONTRATACION`,
 1 AS `PUESTO_TRABAJO`,
 1 AS `SUELDO`,
 1 AS `COMISION`,
 1 AS `GERENTE`,
 1 AS `DEPARTAMENTO`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `empleados_resumen_minima`
--

DROP TABLE IF EXISTS `empleados_resumen_minima`;
/*!50001 DROP VIEW IF EXISTS `empleados_resumen_minima`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `empleados_resumen_minima` AS SELECT 
 1 AS `EMPLEADO_ID`,
 1 AS `NOMBRE`,
 1 AS `PUESTO_TRABAJO`,
 1 AS `CORREO`,
 1 AS `GERENTE`,
 1 AS `DEPARTAMENTO`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `employees` (
  `EMPLOYEE_ID` int NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(25) DEFAULT NULL,
  `LAST_NAME` varchar(25) DEFAULT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `PHONE_NUMBER` varchar(20) DEFAULT NULL,
  `HIRE_DATE` date DEFAULT NULL,
  `JOB_ID` varchar(10) DEFAULT NULL,
  `SALARY` decimal(8,2) DEFAULT NULL,
  `COMMISSION_PCT` decimal(2,2) DEFAULT NULL,
  `MANAGER_ID` int DEFAULT NULL,
  `DEPARTMENT_ID` int DEFAULT NULL,
  PRIMARY KEY (`EMPLOYEE_ID`),
  UNIQUE KEY `EMPLOYEE_ID_UNIQUE` (`EMPLOYEE_ID`),
  UNIQUE KEY `EMAIL_UNIQUE` (`EMAIL`),
  KEY `EMP_DEPT_FK_idx` (`DEPARTMENT_ID`),
  KEY `EMP_JOB_FK_idx` (`JOB_ID`),
  KEY `EMP_MANAGER_FK_idx` (`MANAGER_ID`),
  CONSTRAINT `EMP_DEPT_FK` FOREIGN KEY (`DEPARTMENT_ID`) REFERENCES `departments` (`DEPARTMENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `EMP_JOB_FK` FOREIGN KEY (`JOB_ID`) REFERENCES `jobs` (`JOB_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `EMP_MANAGER_FK` FOREIGN KEY (`MANAGER_ID`) REFERENCES `employees` (`EMPLOYEE_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (100,'Steven','King','SKING@outlook.com','515.123.4567','2003-06-17','AD_PRES',24000.00,NULL,NULL,90),(101,'Neena','Kochhar','NKOCHHAR@outlook.com','515.123.4568','2005-09-21','AC_MGR',17000.00,NULL,100,90),(102,'Lex','De Haan','LDEHAAN@hotmail.com','515.123.4569','2001-01-13','AD_VP',17000.00,NULL,100,90),(103,'Alexander','Hunold','AHUNOLD@hotmail.com','590.423.4567','2006-01-03','IT_PROG',9000.00,NULL,102,60),(104,'Bruce','Ernst','BERNST@gmail.com','590.423.4568','2007-05-21','IT_PROG',6000.00,NULL,103,60),(105,'David','Austin','DAUSTIN@gmail.com','590.423.4569','2005-06-25','IT_PROG',4800.00,NULL,103,60),(106,'Valli','Pataballa','VPATABAL@outlook.com','590.423.4560','2006-02-05','IT_PROG',4800.00,NULL,103,60),(107,'Diana','Lorentz','DLORENTZ@hotmail.com','590.423.5567','2007-02-07','IT_PROG',4200.00,NULL,103,60),(108,'Nancy','Greenberg','NGREENBE@outlook.com','515.124.4569','2002-08-17','FI_MGR',12008.00,NULL,101,100),(109,'Daniel','Faviet','dfaviet@gmail.com','515.124.4169','2002-08-16','AD_PRES',20080.00,0.00,108,100),(110,'John','Chen','JCHEN@outlook.com','515.124.4269','2005-09-28','FI_ACCOUNT',8200.00,NULL,108,100),(111,'Ismael','Sciarra','ISCIARRA@gmail.com','515.124.4369','2005-09-30','FI_ACCOUNT',7700.00,NULL,108,100),(112,'Jose Manuel','Urman','JMURMAN@outlook.com','515.124.4469','2006-03-07','FI_ACCOUNT',7800.00,NULL,108,100),(113,'Luis','Popp','LPOPP@gmail.com','515.124.4567','2007-12-07','FI_ACCOUNT',6900.00,NULL,108,100),(114,'Den','Raphaely','DRAPHEAL@outlook.com','515.127.4561','2002-12-07','PU_MAN',11000.00,NULL,100,30),(115,'Alexander','Khoo','AKHOO@hotmail.com','515.127.4562','2003-05-18','PU_CLERK',3100.00,NULL,114,30),(116,'Shelli','Baida','SBAIDA@hotmail.com','515.127.4563','2005-12-24','PU_CLERK',2900.00,NULL,114,30),(117,'Sigal','Tobias','STOBIAS@outlook.com','515.127.4564','2005-07-24','PU_CLERK',2800.00,NULL,114,30),(118,'Guy','Himuro','GHIMURO@outlook.com','515.127.4565','2006-11-15','PU_CLERK',2600.00,NULL,114,30),(119,'Karen','Colmenares','KCOLMENA@gmail.com','515.127.4566','2007-08-10','PU_CLERK',2500.00,NULL,114,30),(120,'Matthew','Weiss','MWEISS@gmail.com','650.123.1234','2004-07-18','ST_MAN',8000.00,NULL,100,50),(121,'Adam','Fripp','AFRIPP@outlook.com','650.123.2234','2005-04-10','ST_MAN',8200.00,NULL,100,50),(122,'Payam','Kaufling','PKAUFLIN@gmail.com','650.123.3234','2003-05-01','ST_MAN',7900.00,NULL,100,50),(123,'Shanta','Vollman','SVOLLMAN@outlook.com','650.123.4234','2005-10-10','ST_MAN',6500.00,NULL,100,50),(124,'Kevin','Mourgos','KMOURGOS@gmail.com','650.123.5234','2007-11-16','ST_MAN',5800.00,NULL,100,50),(125,'Julia','Nayer','JNAYER@outlook.com','650.124.1214','2005-07-16','ST_CLERK',3200.00,NULL,120,50),(126,'Irene','Mikkilineni','IMIKKILI@gmail.com','650.124.1224','2006-09-28','ST_CLERK',2700.00,NULL,120,50),(127,'James','Landry','JLANDRY@outlook.com','650.124.1334','2007-01-14','ST_CLERK',2400.00,NULL,120,50),(128,'Steven','Markle','smarkle@gmail.com','650.124.1434','2008-03-08','ST_CLERK',2008.00,0.00,120,50),(129,'Laura','Bissot','LBISSOT@hotmail.com','650.124.5234','2005-08-20','ST_CLERK',3300.00,NULL,121,50),(130,'Mozhe','Atkinson','MATKINSO@gmail.com','650.124.6234','2005-10-30','ST_CLERK',2800.00,NULL,121,50),(131,'James','Marlow','JAMRLOW@gmail.com','650.124.7234','2005-02-16','ST_CLERK',2500.00,NULL,121,50),(132,'TJ','Olson','TJOLSON@hotmail.com','650.124.8234','2007-04-10','ST_CLERK',2100.00,NULL,121,50),(133,'Jason','Mallin','JMALLIN@gmail.com','650.127.1934','2004-06-14','ST_CLERK',3300.00,NULL,122,50),(134,'Michael','Rogers','MROGERS@outlook.com','650.127.1834','2006-08-26','ST_CLERK',2900.00,NULL,122,50),(135,'Ki','Gee','KGEE@gmail.com','650.127.1734','2007-12-12','ST_CLERK',2400.00,NULL,122,50),(136,'Hazel','Philtanker','hphiltan@hotmail.com','650.127.1634','2008-02-06','AD_PRES',20080.00,0.00,122,50),(137,'Renske','Ladwig','RLADWIG@gmail.com','650.121.1234','2003-07-14','ST_CLERK',3600.00,NULL,123,50),(138,'Stephen','Stiles','SSTILES@gmail.com','650.121.2034','2005-10-26','ST_CLERK',3200.00,NULL,123,50),(139,'John','Seo','JSEO@gmail.com','650.121.2019','2006-02-12','ST_CLERK',2700.00,NULL,123,50),(140,'Joshua','Patel','JPATEL@hotmail.com','650.121.1834','2006-04-06','ST_CLERK',2500.00,NULL,123,50),(141,'Trenna','Rajs','TRAJS@hotmail.com','650.121.8009','2003-10-17','ST_CLERK',3500.00,NULL,124,50),(142,'Curtis','Davies','CDAVIES@hotmail.com','650.121.2994','2005-01-29','ST_CLERK',3100.00,NULL,124,50),(143,'Randall','Matos','RMATOS@gmail.com','650.121.2874','2006-03-15','ST_CLERK',2600.00,NULL,124,50),(144,'Peter','Vargas','PVARGAS@hotmail.com','650.121.2004','2006-07-09','ST_CLERK',2500.00,NULL,124,50),(145,'John','Russell','JRUSSEL@outlook.com','011.44.1344.429268','2004-10-01','SA_MAN',14000.00,0.40,100,80),(146,'Karen','Partners','KPARTNER@hotmail.com','011.44.1344.467268','2005-01-05','SA_MAN',13500.00,0.30,100,80),(147,'Alberto','Errazuriz','AERRAZUR@hotmail.com','011.44.1344.429278','2005-03-10','SA_MAN',12000.00,0.30,100,80),(148,'Gerald','Cambrault','GCAMBRAU@gmail.com','011.44.1344.619268','2007-10-15','SA_MAN',11000.00,0.30,100,80),(149,'Eleni','Zlotkey','EZLOTKEY@outlook.com','011.44.1344.429018','2008-01-29','SA_MAN',10500.00,0.20,100,80),(150,'Peter','Tucker','PTUCKER@gmail.com','011.44.1344.129268','2005-01-30','SA_REP',10000.00,0.30,145,80),(151,'David','Bernstein','DBERNSTE@gmail.com','011.44.1344.345268','2005-03-24','SA_REP',9500.00,0.25,145,80),(152,'Peter','Hall','PHALL@outlook.com','011.44.1344.478968','2005-08-20','SA_REP',9000.00,0.25,145,80),(153,'Christopher','Olsen','COLSEN@gmail.com','011.44.1344.498718','2006-03-30','SA_REP',8000.00,0.20,145,80),(154,'Nanette','Cambrault','NCAMBRAU@gmail.com','011.44.1344.987668','2006-12-09','SA_REP',7500.00,0.20,145,80),(155,'Oliver','Tuvault','otuvault@gmail.com','011.44.1344.486508','2007-11-23','SA_REP',6000.00,0.15,145,80),(156,'Janette','King','JKING@gmail.com','011.44.1345.429268','2004-01-30','SA_REP',10000.00,0.35,146,80),(157,'Patrick','Sully','PSULLY@gmail.com','011.44.1345.929268','2004-03-04','SA_REP',9500.00,0.35,146,80),(158,'Allan','McEwen','AMCEWEN@outlook.com','011.44.1345.829268','2004-08-01','SA_REP',9000.00,0.35,146,80),(159,'Lindsey','Smith','LSMITH@gmail.com','011.44.1345.729268','2005-03-10','SA_REP',8000.00,0.30,146,80),(161,'Sarath','Sewall','SSEWALL@gmail.com','011.44.1345.529268','2006-11-03','SA_REP',7000.00,0.25,146,80),(162,'Clara','Vishney','CVISHNEY@outlook.com','011.44.1346.129268','2005-11-11','SA_REP',10500.00,0.25,147,80),(163,'Danielle','Greene','DGREENE@gmail.com','011.44.1346.229268','2007-03-19','SA_REP',9500.00,0.15,147,80),(164,'Mattea','Marvins','MMARVINS@outlook.com','011.44.1346.329268','2008-01-24','SA_REP',7200.00,0.10,147,80),(165,'David','Lee','DLEE@gmail.com','011.44.1346.529268','2008-02-23','SA_REP',6800.00,0.10,147,80),(166,'Sundar','Ande','SANDE@outlook.com','011.44.1346.629268','2008-03-24','SA_REP',6400.00,0.10,147,80),(167,'Amit','Banda','abanda@gmail.com','011.44.1346.729268','2008-04-21','FI_ACCOUNT',4200.00,0.10,147,80),(168,'Lisa','Ozer','LOZER@gmail.com','011.44.1343.929268','2005-03-11','SA_REP',11500.00,0.25,148,80),(169,'Harrison','Bloom','HBLOOM@outlook.com','011.44.1343.829268','2006-03-23','SA_REP',10000.00,0.20,148,80),(170,'Tayler','Fox','TFOX@gmail.com','011.44.1343.729268','2006-01-24','SA_REP',9600.00,0.20,148,80),(171,'William','Smith','WSMITH@gmail.com','011.44.1343.629268','2007-02-23','SA_REP',7400.00,0.15,148,80),(172,'Elizabeth','Bates','EBATES@gmail.com','011.44.1343.529268','2007-03-24','SA_REP',7300.00,0.15,148,80),(173,'Sundita','Kumar','skumar@gmail.com','011.44.1343.329268','2023-05-29','FORM_EMP',NULL,0.10,NULL,9),(174,'Ellen','Abel','EABEL@gmail.com','011.44.1644.429267','2004-05-11','SA_REP',11000.00,0.30,149,80),(175,'Alyssa','Hutton','AHUTTON@gmail.com','011.44.1644.429266','2005-03-19','SA_REP',8800.00,0.25,149,80),(176,'Jonathon','Taylor','JTAYLOR@gmail.com','011.44.1644.429265','2006-03-24','SA_REP',8600.00,0.20,149,80),(177,'Jack','Livingston','JLIVINGS@outlook.com','011.44.1644.429264','2006-04-23','SA_REP',8400.00,0.20,149,80),(178,'Kimberely','Grant','KGRANT@gmail.com','011.44.1644.429263','2007-05-24','SA_REP',7000.00,0.15,149,NULL),(179,'Charles','Johnson','CJOHNSON@outlook.com','011.44.1644.429262','2008-01-04','SA_REP',6200.00,0.10,149,80),(180,'Winston','Taylor','WTAYLOR@hotmail.com','650.507.9876','2006-01-24','SH_CLERK',3200.00,NULL,120,50),(181,'Jean','Fleaur','JFLEAUR@outlook.com','650.507.9877','2006-02-23','SH_CLERK',3100.00,NULL,120,50),(182,'Martha','Sullivan','MSULLIVA@hotmail.com','650.507.9878','2007-06-21','SH_CLERK',2500.00,NULL,120,50),(183,'Girard','Geoni','GGEONI@gmail.com','650.507.9879','2008-02-03','SH_CLERK',2800.00,NULL,120,50),(184,'Nandita','Sarchand','NSARCHAN@outlook.com','650.509.1876','2004-01-27','SH_CLERK',4200.00,NULL,121,50),(185,'Alexis','Bull','ABULL@gmail.com','650.509.2876','2005-02-20','SH_CLERK',4100.00,NULL,121,50),(186,'Julia','Dellinger','JDELLING@gmail.com','650.509.3876','2006-06-24','SH_CLERK',3400.00,NULL,121,50),(187,'Anthony','Cabrio','ACABRIO@gmail.com','650.509.4876','2007-02-07','SH_CLERK',3000.00,NULL,121,50),(188,'Kelly','Chung','KCHUNG@gmail.com','650.505.1876','2005-06-14','SH_CLERK',3800.00,NULL,122,50),(189,'Jennifer','Dilly','JDILLY@hotmail.com','650.505.2876','2005-08-13','SH_CLERK',3600.00,NULL,122,50),(190,'Timothy','Gates','TGATES@outlook.com','650.505.3876','2006-07-11','SH_CLERK',2900.00,NULL,122,50),(191,'Randall','Perkins','RPERKINS@gmail.com','650.505.4876','2007-12-19','SH_CLERK',2500.00,NULL,122,50),(192,'Sarah','Bell','SBELL@gmail.com','650.501.1876','2004-02-04','SH_CLERK',4000.00,NULL,123,50),(193,'Britney','Everett','BEVERETT@gmail.com','650.501.2876','2005-03-03','SH_CLERK',3900.00,NULL,123,50),(194,'Samuel','McCain','SMCCAIN@outlook.com','650.501.3876','2006-07-01','SH_CLERK',3200.00,NULL,123,50),(195,'Vance','Jones','vjones@outlook.com','650.501.4876','2007-03-17','FORM_EMP',NULL,0.00,NULL,9),(196,'Alana','Walsh','AWALSH@gmail.com','650.507.9811','2006-04-24','SH_CLERK',3100.00,NULL,124,50),(197,'Kevin','Feeney','KFEENEY@gmail.com','650.507.9822','2006-05-23','SH_CLERK',3000.00,NULL,124,50),(198,'Donald','OConnell','DOCONNEL@gmail.com','650.507.9833','2007-06-21','SH_CLERK',2600.00,NULL,124,50),(199,'Douglas','Grant','DGRANT@gmail.com','650.507.9844','2008-01-13','SH_CLERK',2600.00,NULL,124,50),(200,'Jennifer','Whalen','JWHALEN@gmail.com','515.123.4444','2003-09-17','AD_ASST',4400.00,NULL,101,10),(201,'Michael','Hartstein','MHARTSTE@gmail.com','515.123.5555','2004-02-17','MK_MAN',13000.00,NULL,100,20),(202,'Pat','Fay','PFAY@gmail.com','603.123.6666','2005-08-17','MK_REP',6000.00,NULL,201,20),(203,'Susan','Mavris','SMAVRIS@outlook.com','515.123.7777','2002-06-07','HR_REP',6500.00,NULL,101,40),(204,'Hermann','Baer','HBAER@outlook.com','515.123.8888','2002-06-07','PR_REP',10000.00,NULL,101,70),(205,'Shelley','Higgins','SHIGGINS@gmail.com','515.123.8080','2002-06-07','AC_MGR',12008.00,NULL,101,110),(206,'William','Gietz','WGIETZ@gmail.com','515.123.8181','2002-06-07','AC_ACCOUNT',8300.00,NULL,205,110),(207,'JULIANN','CONTRERAS','julian@hotmail.com','554.120.23.40','2023-05-26','AD_ASST',3000.00,0.00,111,8),(209,'MARYARMEN','PEREZ JUEAREZ','marycarmen_perez@gmail.com','',NULL,'INACT_EMP',NULL,NULL,NULL,7),(214,'Emiliano','Salazar','emiliano_su@gmail.com','771.120.5241','2022-01-15','INACT_EMP',NULL,0.03,NULL,7),(215,'Miguel','Hidalgo','miguel_hidalgo@gmail.com','444.120.5241','2022-05-28','RET_EMP',NULL,0.03,NULL,8),(219,'PEPE','Pedraza','pepe@gmail.com','5578524125','2019-05-25','FORM_EMP',NULL,0.10,NULL,9),(223,'ARMANDO','SOLIS','armando@gmail.com','7785201452','2023-06-05','AC_ACCOUNT',4200.00,0.03,110,70),(225,'Juan Sebastian','Reyes','juan_reyes@gmail.com','558.415.3254','2023-06-06','FORM_EMP',NULL,0.00,NULL,9),(228,'EMMANUEL','JUAREZ','emmanuel@gmail.com','','2023-06-05','IT_PROG',4000.00,0.00,111,20),(231,'ALBERTO','SOLIS','alberto@gmail.com','7785201452','2023-06-05','MK_REP',4000.00,0.00,121,160),(233,'alfredp','ramiez','alfredo@gmail.com','','2023-06-09','FI_MGR',8200.00,0.00,205,100),(234,'Manuel','Estrada','estrada_manuel@gmail.com','','2023-06-09','FI_ACCOUNT',4200.00,0.00,205,110),(235,'Jose Alfredo','Jimenez','jimenez_alfredo@gmail.com','123456789','2023-06-13','FORM_EMP',NULL,0.00,NULL,9),(236,'Enrique','Garcia','garcia_enrique@gmail.com','','2023-06-09','FORM_EMP',NULL,0.00,103,9),(237,'Joan','Joan','joan@gmail.com','','2023-06-09','FI_ACCOUNT',4200.00,0.00,114,9),(238,'Marcelino','Marc','marcelino@gmail.com','','2023-06-09','FI_ACCOUNT',4200.00,0.00,103,190),(239,'Fernando','Gonzalez','fer_glz@gmail.com','','2023-06-09','FORM_EMP',NULL,0.00,NULL,9),(240,'Silvia','Martinez','silvia@gmail.com','','2023-06-09','FORM_EMP',NULL,0.00,NULL,9),(241,'Marcela','Reyes','marcela@gmail.com','','2023-06-09','FI_ACCOUNT',4200.00,0.00,100,240),(242,'KARLA','Mujica','miguel_hidalgo01@gmail.com','','2023-06-09','FORM_EMP',NULL,0.00,NULL,9),(244,'Javier','Solis','solisj@gmail.com','88752214152','2023-06-09','AD_VP',15000.00,0.00,205,140),(245,'Jose Antonio','Solis','joseantonio@gmail.com','','2023-06-09','INACT_EMP',NULL,0.00,NULL,7),(246,'Federico','Galan','el_fede@gmail.com','','2023-06-09','FI_MGR',8200.00,0.00,112,170),(247,'Daniela','Casique','casique_dan@gmail.com','','2023-06-09','INACT_EMP',NULL,0.00,NULL,7),(248,'Xochitl','Brito','xochitl_brito@gmail.com','','2023-06-09','FORM_EMP',NULL,0.00,NULL,9),(250,'Jimena','Rodriguez','rodriguez_jimena@gmail.com','','2023-06-09','FORM_EMP',NULL,0.00,NULL,9),(252,'Salomon','SALOMON','salomon@gmail.com','','2023-06-09','INACT_EMP',NULL,0.00,NULL,7),(253,'Juan','Hernandez','juanito@gmail.com','7748524152','2023-06-18','FI_ACCOUNT',4200.00,0.00,201,10),(254,'Juan','Montoya','montoya@gmail.com','8857412014','2023-06-14','FORM_EMP',NULL,0.20,NULL,9),(257,'Pedro','Pedro','pedro@gmail.com','8854715241','2023-06-07','FI_ACCOUNT',4200.00,0.01,114,90),(259,'Julio','Samano','julio_sa@gmail.com','7785214152','2023-06-20','ST_CLERK',2008.00,0.10,107,100),(260,'Ana','Monroy','monroy_ana@gmail.com','7885214152','2023-06-20','FORM_EMP',NULL,0.20,NULL,9),(262,'Juliana','Samana','juliana@gmail.com','7777','2023-06-06','FI_ACCOUNT',4200.00,0.40,107,100),(263,'Martin','Perla','martin_perlas@gmail.com','0987','2023-06-13','AD_VP',15000.00,0.04,205,160),(264,'pedro','rios','pdro_rios@gmail.com','5523423434234','2022-12-06','AD_ASST',3000.00,0.07,110,180),(267,'Martin','Carrera','martin@gmail.com','8885215412','2001-12-01','AD_VP',15000.00,0.40,145,140),(269,'Pancho','Villa','pachito@gmail.com','5589625484444455555','2023-06-05','AD_ASST',3000.00,0.03,145,90),(270,'Erick','Huerta','erick@gmail.com','7785214152','2023-06-21','IT_PROG',4000.00,0.00,110,60);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `UPDATE_JOB_HISTORY` AFTER UPDATE ON `employees` FOR EACH ROW BEGIN
  CALL ADD_JOB_HISTORY(OLD.employee_id, OLD.hire_date, NOW(), OLD.job_id, OLD.department_id);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary view structure for view `historico_resumen`
--

DROP TABLE IF EXISTS `historico_resumen`;
/*!50001 DROP VIEW IF EXISTS `historico_resumen`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `historico_resumen` AS SELECT 
 1 AS `EMPLEADO_ID`,
 1 AS `NOMBRE`,
 1 AS `FECHA_INICIO`,
 1 AS `FECHA_FIN`,
 1 AS `TRABAJO`,
 1 AS `DEPARTAMENTO`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `hojas_vida`
--

DROP TABLE IF EXISTS `hojas_vida`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hojas_vida` (
  `HOJA_VIDA_ID` int NOT NULL AUTO_INCREMENT,
  `EMPLOYEE_ID` int DEFAULT NULL,
  `FECHA_NACIMIENTO` date DEFAULT NULL,
  `NACIONALIDAD` varchar(45) DEFAULT NULL,
  `ESTADO_CIVIL` varchar(45) DEFAULT NULL,
  `DIRECCION` varchar(100) DEFAULT NULL,
  `ESTUDIOS` varchar(200) DEFAULT NULL,
  `IDIOMAS` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`HOJA_VIDA_ID`),
  KEY `FK_EMPLOYEE_idx` (`EMPLOYEE_ID`),
  CONSTRAINT `FK_EMPLOYEE` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employees` (`EMPLOYEE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hojas_vida`
--

LOCK TABLES `hojas_vida` WRITE;
/*!40000 ALTER TABLE `hojas_vida` DISABLE KEYS */;
INSERT INTO `hojas_vida` VALUES (1,238,'1990-06-13','MX','SOLTERO','LOMAS DE CHAPULTEPEC','TEC DE MONTERREY','INGLES Y ESPAÑOL'),(2,168,'1985-08-14','US','CASADO','NEW YORK','MIT','INGLES FRANCES ALEMAN'),(3,105,'1977-06-12','DE','CASADO','BERLIN','UTZ','ALEMAN, INGLES, FRANCES'),(4,102,'1987-06-12','FR','CASADO','PARIS','UTL NM','INGLES'),(6,252,'1996-01-01','BR','CASADO','Lomas de chapultepec                   ','Ingeniería en informática en UPIICSA IPN\r\nIngenieria en quimica ESCA','INGLÉS FRANCES Y ALEMAN'),(7,234,'1997-05-01','CN','SOLTERO','Lazaro Cardenas #35sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss','ING. QuímicaING. QuímicaING. QuímicaING. QuímicaING. QuímicaING. QuímicaING. QuímicaING. QuímicaINsG','Inglés, Frances, alemansssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss'),(8,244,'1989-06-21','JP','CASADO','Granjas Mexico','Ing. Mecatronica UPIITA','Inglés, Francés'),(9,264,'2002-05-15','FR','SOLTERO','av morelos 577 bis edificio c 102','Primaria trunca 231','español en celex\r\nCertificacion de oxfort en italiano'),(10,233,'2023-06-02','DE','CASADO','Calle Acequia ','Universidad ','Ingles'),(11,270,'1980-01-01','JP','SOLTERO','Avenida Jalisco #32, Gustavo A. Madero, CDMX','Ing. en Sistemas Computacionales.','Español Nativo');
/*!40000 ALTER TABLE `hojas_vida` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incidentes`
--

DROP TABLE IF EXISTS `incidentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `incidentes` (
  `INCIDENTE_ID` int NOT NULL AUTO_INCREMENT,
  `DEPARTMENT_ID` int NOT NULL,
  `DESCRIPCION` varchar(200) NOT NULL,
  `FECHA_INICIO` date DEFAULT NULL,
  `FECHA_FIN` date DEFAULT NULL,
  `ESTATUS` int NOT NULL,
  PRIMARY KEY (`INCIDENTE_ID`),
  KEY `FK_DEPARTMENT_ID_idx` (`DEPARTMENT_ID`),
  CONSTRAINT `FK_DEPARTMENT_ID` FOREIGN KEY (`DEPARTMENT_ID`) REFERENCES `departments` (`DEPARTMENT_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidentes`
--

LOCK TABLES `incidentes` WRITE;
/*!40000 ALTER TABLE `incidentes` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_history`
--

DROP TABLE IF EXISTS `job_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_history` (
  `EMPLOYEE_ID` int NOT NULL,
  `START_DATE` date NOT NULL,
  `END_DATE` date NOT NULL,
  `JOB_ID` varchar(10) NOT NULL,
  `DEPARTMENT_ID` int DEFAULT NULL,
  PRIMARY KEY (`EMPLOYEE_ID`,`START_DATE`),
  UNIQUE KEY `JHIST_EMP_ID_ST_DATE_PK` (`EMPLOYEE_ID`,`START_DATE`),
  KEY `JHIST_JOB_FK_idx` (`JOB_ID`),
  KEY `JHIST_DEPT_FK_idx` (`DEPARTMENT_ID`),
  CONSTRAINT `JHIST_DEPT_FK` FOREIGN KEY (`DEPARTMENT_ID`) REFERENCES `departments` (`DEPARTMENT_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `JHIST_EMP_FK` FOREIGN KEY (`EMPLOYEE_ID`) REFERENCES `employees` (`EMPLOYEE_ID`),
  CONSTRAINT `JHIST_JOB_FK` FOREIGN KEY (`JOB_ID`) REFERENCES `jobs` (`JOB_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_history`
--

LOCK TABLES `job_history` WRITE;
/*!40000 ALTER TABLE `job_history` DISABLE KEYS */;
INSERT INTO `job_history` VALUES (101,'1997-09-21','2001-10-27','AC_ACCOUNT',110),(101,'2001-10-28','2005-03-15','AC_MGR',110),(101,'2005-09-21','2023-05-27','AD_VP',90),(102,'2001-01-13','2006-07-24','IT_PROG',60),(109,'2002-08-16','2023-06-20','PR_REP',100),(114,'2006-03-24','2007-12-31','ST_CLERK',50),(122,'2007-01-01','2007-12-31','ST_CLERK',50),(136,'2008-02-06','2023-06-20','ST_CLERK',50),(173,'2008-04-21','2023-05-29','SA_REP',80),(173,'2023-05-29','2023-05-29','SA_REP',80),(176,'2006-03-24','2006-12-31','SA_REP',80),(176,'2007-01-01','2007-12-31','SA_MAN',80),(200,'1995-09-17','2001-06-17','AD_ASST',90),(200,'2002-07-01','2006-12-31','AC_ACCOUNT',90),(201,'2004-02-17','2007-12-19','MK_REP',20),(207,'2023-05-26','2025-01-22','AD_ASST',8),(209,'2023-05-26','2023-05-28','AC_ACCOUNT',90),(209,'2023-05-28','2023-05-28','AC_MGR',20),(214,'2022-01-15','2025-01-22','INACT_EMP',7),(214,'2023-05-28','2023-05-28','AC_ACCOUNT',90),(215,'2022-05-28','2025-01-22','RET_EMP',8),(215,'2023-05-28','2023-05-29','AC_ACCOUNT',90),(219,'2019-05-25','2025-01-22','FORM_EMP',9),(225,'2023-06-06','2025-01-22','FORM_EMP',9),(247,'2023-06-09','2025-01-22','INACT_EMP',7),(253,'2023-06-18','2025-01-22','FI_ACCOUNT',10),(259,'2023-06-20','2025-01-22','ST_CLERK',100),(260,'2023-06-20','2023-06-20','ST_CLERK',180),(262,'2023-06-06','2025-01-22','FI_ACCOUNT',100),(263,'2023-06-13','2025-01-22','AD_VP',160),(264,'2022-12-06','2025-01-22','AD_ASST',180),(264,'2023-07-14','2023-06-20','IT_PROG',180),(264,'2023-07-30','2023-06-21','IT_PROG',180),(267,'2023-06-28','2023-06-21','AC_ACCOUNT',190),(270,'2023-06-21','2025-01-22','IT_PROG',60);
/*!40000 ALTER TABLE `job_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `JOB_ID` varchar(10) NOT NULL,
  `JOB_TITLE` varchar(35) NOT NULL,
  `MIN_SALARY` int DEFAULT NULL,
  `MAX_SALARY` int DEFAULT NULL,
  PRIMARY KEY (`JOB_ID`),
  UNIQUE KEY `JOB_ID_UNIQUE` (`JOB_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
INSERT INTO `jobs` VALUES ('AC_ACCOUNT','Public Accountant',4200,9000),('AC_MGR','Accounting Manager',8200,16000),('AD_ASST','Administration Assistant',3000,6000),('AD_PRES','President',20080,40000),('AD_VP','Administration Vice President',15000,30000),('FI_ACCOUNT','Accountant',4200,9000),('FI_MGR','Finance Manager',8200,16000),('FORM_EMP','Former Employees',NULL,NULL),('HR_REP','Human Resources Representative',4000,9000),('INACT_EMP','Inactive Employees',NULL,NULL),('IT_PROG','Programmer',4000,10000),('MK_MAN','Marketing Manager',9000,15000),('MK_REP','Marketing Representative',4000,9000),('PR_REP','Public Relations Representative',4500,10500),('PU_CLERK','Purchasing Clerk',2500,5500),('PU_MAN','Purchasing Manager',8000,15000),('RET_EMP','Retirees Employees',NULL,NULL),('SA_MAN','Sales Manager',10000,20080),('SA_REP','Sales Representative',6000,12008),('SH_CLERK','Shipping Clerk',2500,5500),('ST_CLERK','Stock Clerk',2008,5000),('ST_MAN','Stock Manager',5500,8500);
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `lista_departamentos`
--

DROP TABLE IF EXISTS `lista_departamentos`;
/*!50001 DROP VIEW IF EXISTS `lista_departamentos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `lista_departamentos` AS SELECT 
 1 AS `DEPARTAMENTO_ID`,
 1 AS `DEPARTAMENTO`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `lista_gerentes`
--

DROP TABLE IF EXISTS `lista_gerentes`;
/*!50001 DROP VIEW IF EXISTS `lista_gerentes`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `lista_gerentes` AS SELECT 
 1 AS `GERENTE_ID`,
 1 AS `GERENTE`,
 1 AS `DEPARTAMENTO`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `lista_locaciones`
--

DROP TABLE IF EXISTS `lista_locaciones`;
/*!50001 DROP VIEW IF EXISTS `lista_locaciones`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `lista_locaciones` AS SELECT 
 1 AS `LOCACION_ID`,
 1 AS `LOCACION_DIRECCION`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `lista_paises`
--

DROP TABLE IF EXISTS `lista_paises`;
/*!50001 DROP VIEW IF EXISTS `lista_paises`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `lista_paises` AS SELECT 
 1 AS `PAIS_ID`,
 1 AS `PAIS`,
 1 AS `REGION_ID`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `locaciones_resumen`
--

DROP TABLE IF EXISTS `locaciones_resumen`;
/*!50001 DROP VIEW IF EXISTS `locaciones_resumen`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `locaciones_resumen` AS SELECT 
 1 AS `LOCACION_ID`,
 1 AS `DIRECCION`,
 1 AS `CODIGO_POSTAL`,
 1 AS `CIUDAD`,
 1 AS `ESTADO_PROVINCIA`,
 1 AS `PAIS`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `locations` (
  `LOCATION_ID` int NOT NULL AUTO_INCREMENT,
  `STREET_ADDRESS` varchar(100) DEFAULT NULL,
  `POSTAL_CODE` varchar(12) DEFAULT NULL,
  `CITY` varchar(30) NOT NULL,
  `STATE_PROVINCE` varchar(25) DEFAULT NULL,
  `COUNTRY_ID` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`LOCATION_ID`),
  UNIQUE KEY `LOCATION_ID_UNIQUE` (`LOCATION_ID`),
  KEY `LOC_C_ID_FK_idx` (`COUNTRY_ID`),
  CONSTRAINT `LOC_C_ID_FK` FOREIGN KEY (`COUNTRY_ID`) REFERENCES `countries` (`COUNTRY_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3211 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1000,'1297 Via Cola di Rie','00989','Roma',NULL,'IT'),(1100,'93091 Calle della Testa','10934','Venice',NULL,'IT'),(1200,'2017 Shinjuku-ku','1689','Tokyo','Tokyo Prefecture','JP'),(1300,'9450 Kamiya-cho','6823','Hiroshima',NULL,'JP'),(1400,'2014 Jabberwocky Rd','26192','Southlake','Texas','US'),(1500,'2011 Interiors Blvd','99236','South San Francisco','California','US'),(1600,'2007 Zagora St','50090','South Brunswick','New Jersey','US'),(1700,'2004 Charade Rd','98199','Seattle','Washington','US'),(1800,'147 Spadina Aved','M5V 2L7','Toronto','Ontario','CA'),(1900,'6092 Boxwood St','YSW 9T2','Whitehorse','Yukon','CA'),(2000,'40-5-12 Laogianggen','190518','Beijing',NULL,'CN'),(2100,'1298 Vileparle (E)','490231','Bombay','Maharashtra','IN'),(2200,'12-98 Victoria Street','2901','Sydney','New South Wales','IL'),(2300,'198 Clementi North','540198','Singapore',NULL,'SG'),(2400,'8204 Arthur St',NULL,'London',NULL,'UK'),(2500,'Magdalen Centre, The Oxford Science Park','OX9 9ZB','Oxford','Oxford','UK'),(2600,'9702 Chester Road','09629850293','Stretford','Manchester','UK'),(2700,'Schwanthalerstr. 7031','80925','Munich','Bavaria','DE'),(2800,'Rua Frei Caneca 1360 ','01307-002','Sao Paulo','Sao Paulo','MX'),(2900,'20 Rue des Corps-Saints','1730','Geneva','Geneve','CH'),(3000,'Murtenstrasse 921','3095','Bern','BE','CH'),(3100,'Pieter Breughelstraat 837','3029SK','Utrecht','Utrecht','NL'),(3200,'Mariano Escobedo 9991','11932','Mexico City','Distrito Federal,','MX'),(3201,'Av. Revolución 1425','01049','Ciudad de México','Ciudad de México','MX'),(3202,'Av Juárez 976','44100 ','Guadalajara','Jalisco','MX'),(3203,'Prol. 24 Sur, Cd Universitaria, Cdad. Universitaria','72570 ','Puebla','Puebla','MX'),(3204,'Eugenio Garza Sada 2501','64849 ','Monterrey','Nuevo León','MX'),(3205,'Av Montaña Monarca 1340','58350','Morelia','Michoacán','MX'),(3206,'Avenida numero 2','58351','Uruapan','Mich','US'),(3207,'Av 2 1340','58350','Morelia','Michoacán','US'),(3208,'Av 3 1340','58350','Morelia','Michoacán','US'),(3209,'Av 4 1340','58350','Morelia','Michoacán','US');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `paises_resumen`
--

DROP TABLE IF EXISTS `paises_resumen`;
/*!50001 DROP VIEW IF EXISTS `paises_resumen`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `paises_resumen` AS SELECT 
 1 AS `PAIS_ID`,
 1 AS `PAIS`,
 1 AS `REGION`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regions` (
  `REGION_ID` int NOT NULL AUTO_INCREMENT,
  `REGION_NAME` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`REGION_ID`),
  UNIQUE KEY `REGION_ID_UNIQUE` (`REGION_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regions`
--

LOCK TABLES `regions` WRITE;
/*!40000 ALTER TABLE `regions` DISABLE KEYS */;
INSERT INTO `regions` VALUES (1,'Europe'),(2,'Americas'),(3,'Asia'),(4,'Middle East and Africa'),(22,'Nueva España'),(23,'San Petesburgo'),(24,'Coahuila'),(25,'Tequixquiapan'),(26,'ANTARTIDA'),(27,'ANTARTIDA'),(28,'ANTARTIDA'),(29,'ANTARTIDA'),(30,'ANTARTIDA'),(31,'ANTARTIDA');
/*!40000 ALTER TABLE `regions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `resumen_empleado`
--

DROP TABLE IF EXISTS `resumen_empleado`;
/*!50001 DROP VIEW IF EXISTS `resumen_empleado`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `resumen_empleado` AS SELECT 
 1 AS `EMPLEADO_ID`,
 1 AS `NOMBRE`,
 1 AS `DEPARTAMENTO`,
 1 AS `PUESTO_TRABAJO`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `ROLE_ID` varchar(10) NOT NULL,
  `ROLE_TITLE` varchar(35) DEFAULT NULL,
  `DESCRIPTION` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`ROLE_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES ('EMP','Employee','Empleado'),('GUEST','Guest','Empleado con acceso limitado'),('HR_ADMIN','Human resources administrator','Administrador de recursos humanos'),('OPS_ADMIN','Gerente de operaciones','Administrador de operaciones.  Rol a cargo de la gestion y supervision de area y operaciones.'),('SYS_ADMIN','System administrator','Administrador del sistema HR');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `trabajos`
--

DROP TABLE IF EXISTS `trabajos`;
/*!50001 DROP VIEW IF EXISTS `trabajos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `trabajos` AS SELECT 
 1 AS `TRABAJO_ID`,
 1 AS `PUESTO_TRABAJO`,
 1 AS `SUELDO_MINIMO`,
 1 AS `SUELDO_MAXIMO`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `trabajos_resumen`
--

DROP TABLE IF EXISTS `trabajos_resumen`;
/*!50001 DROP VIEW IF EXISTS `trabajos_resumen`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `trabajos_resumen` AS SELECT 
 1 AS `TRABAJO_ID`,
 1 AS `PUESTO_TRABAJO`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `USER_ID` int NOT NULL AUTO_INCREMENT,
  `EMAIL` varchar(100) NOT NULL,
  `USER_PASSWORD` varchar(45) NOT NULL,
  `FIRST_NAME` varchar(45) NOT NULL,
  `LAST_NAME` varchar(45) NOT NULL,
  `REGISTRATION_DATE` timestamp NULL DEFAULT NULL,
  `LAST_LOGIN` timestamp NULL DEFAULT NULL,
  `STATUS_ID` int DEFAULT NULL,
  `ROLE_ID` varchar(10) NOT NULL,
  PRIMARY KEY (`USER_ID`),
  UNIQUE KEY `EMAIL_UNIQUE` (`EMAIL`),
  KEY `FK_ROLE_idx` (`ROLE_ID`),
  KEY `FK_STATUS_idx` (`STATUS_ID`),
  CONSTRAINT `FK_ACCOUNT_STATUS` FOREIGN KEY (`STATUS_ID`) REFERENCES `account_status` (`STATUS_ID`),
  CONSTRAINT `FK_ROLE` FOREIGN KEY (`ROLE_ID`) REFERENCES `roles` (`ROLE_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'administrador@outlook.com','Administrador','Edward','Edward','2023-06-10 22:43:28',NULL,1,'SYS_ADMIN'),(2,'gonzalo@outloo.com','Invitado','Gonzalo','Dominguez','2023-06-10 22:43:32',NULL,1,'GUEST'),(4,'santiago_01@outlook.com','Santiago','Santiago','Nieto','2023-06-10 23:59:21',NULL,1,'HR_ADMIN'),(7,'santiago_03@outlook.com','Santiago','Mariano','Morales','2023-06-11 00:16:18',NULL,2,'EMP'),(8,'mariana@outlook.com','Invitado','Mariana','Rodriguez','2023-06-11 08:48:35',NULL,1,'GUEST');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'hr_02'
--

--
-- Dumping routines for database 'hr_02'
--
/*!50003 DROP FUNCTION IF EXISTS `comparar_fechas` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `comparar_fechas`(fecha_parametro VARCHAR(10)) RETURNS tinyint(1)
    DETERMINISTIC
BEGIN
  DECLARE fecha_existente DATE;
  SET fecha_existente = '2023-05-28'; -- Aquí establece la fecha existente que deseas comparar

  IF CAST(fecha_parametro AS DATE) <= fecha_existente THEN
    RETURN TRUE;
  ELSE
    RETURN FALSE;
  END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `EXISTE_EMP_DEPARTMENTS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `EXISTE_EMP_DEPARTMENTS`(EMPLEADO_ID INT) RETURNS tinyint(1)
    DETERMINISTIC
BEGIN
	DECLARE NUMERO_REGISTROS INT;
    SELECT COUNT(*) INTO NUMERO_REGISTROS FROM DEPARTMENTS WHERE MANAGER_ID  = EMPLEADO_ID;
	IF NUMERO_REGISTROS > 0 THEN
		/*Dirige al menos un departamento*/
		RETURN TRUE;
	ELSE 
		/*No dirige ningun departamento*/
		RETURN FALSE;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `EXISTE_EMP_GERENTE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `EXISTE_EMP_GERENTE`(EMPLEADO_ID INT) RETURNS tinyint(1)
    DETERMINISTIC
BEGIN
	DECLARE NUMERO_REGISTROS INT;
    SELECT COUNT(*) INTO NUMERO_REGISTROS FROM EMPLOYEES WHERE MANAGER_ID  = EMPLEADO_ID;
	IF NUMERO_REGISTROS > 0 THEN
		/*Tiene al menos un subordinado*/
		RETURN TRUE;
	ELSE 
		/*No tiene subordinados*/
		RETURN FALSE;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `EXISTE_EMP_JOB_HISTORY` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `EXISTE_EMP_JOB_HISTORY`(EMPLEADO_ID INT) RETURNS tinyint(1)
    DETERMINISTIC
BEGIN
	DECLARE NUMERO_REGISTROS INT;
    SELECT COUNT(*) INTO NUMERO_REGISTROS FROM JOB_HISTORY WHERE EMPLOYEE_ID  = EMPLEADO_ID;
	IF NUMERO_REGISTROS > 0 THEN
		/*El empleado ya se encuentra en la bitacora JOB_HISTORY*/
		RETURN TRUE;
	ELSE 
		/*El empleado Aún NO se encuentra en la bitacora JOB_HISTORY*/
		RETURN FALSE;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `SALARIO_INICIAL` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `SALARIO_INICIAL`(TRABAJO_ID VARCHAR(10)) RETURNS decimal(8,2)
    DETERMINISTIC
BEGIN 
	DECLARE SALARIO_ASIGNADO DECIMAL(8,2);
		SET SALARIO_ASIGNADO = (SELECT JOB.MIN_SALARY FROM JOBS JOB WHERE JOB.JOB_ID = TRABAJO_ID);
    RETURN SALARIO_ASIGNADO;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `SALARIO_MAXIMO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `SALARIO_MAXIMO`(TRABAJO_ID VARCHAR(10)) RETURNS decimal(8,2)
    DETERMINISTIC
BEGIN 
	DECLARE SALARIO_MAX DECIMAL(8,2);
		SET SALARIO_MAX = (SELECT JOB.MAX_SALARY FROM JOBS JOB WHERE JOB.JOB_ID = TRABAJO_ID);
    RETURN SALARIO_MAX;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `VALIDAR_ACTUALIZACION_EMAIL` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `VALIDAR_ACTUALIZACION_EMAIL`( EMPLEADO_ID INT, CORREO VARCHAR(100) ) RETURNS tinyint(1)
    DETERMINISTIC
BEGIN 	
	DECLARE CONTADOR INT; /*Variable contador de tipo entero que almacenara el numero de registros con el mimso correo que el parametro de la funcion*/
    
    SET CONTADOR = 0; /*Inicializacion en 0*/
    SELECT count(EMAIL) INTO CONTADOR FROM EMPLOYEES WHERE EMAIL = CORREO AND EMPLOYEE_ID <> EMPLEADO_ID; /*Conteo de email que ya existan en la BD donde el empleado sea distinto del que se pretende actualizar*/
    IF CONTADOR > 0 THEN
		RETURN FALSE; /*Retorna 0 o FALSE si al menos un correo igual al que se recibe como parametro (NO CUMPLE UNICIDAD)*/
	ELSE
		RETURN TRUE; /*Retorna 1 o TRUE si aun no se ha registrado el correo recibido como parametro (SI CUMPLE UNICIDAD)*/
	END IF;
		
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `VALIDAR_ACTUALIZACION_EMAIL_USUARIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `VALIDAR_ACTUALIZACION_EMAIL_USUARIO`( USUARIO_ID INT, CORREO VARCHAR(100) ) RETURNS tinyint(1)
    DETERMINISTIC
BEGIN 	
	DECLARE CONTADOR INT; /*Variable contador de tipo entero que almacenara el numero de registros con el mimso correo que el parametro de la funcion*/
    
    SET CONTADOR = 0; /*Inicializacion en 0*/
    SELECT count(EMAIL) INTO CONTADOR FROM USERS WHERE EMAIL = CORREO AND USER_ID <> USUARIO_ID; /*Conteo de email que ya existan en la BD donde el USUARIO sea distinto del que se pretende actualizar*/
    IF CONTADOR > 0 THEN
		RETURN FALSE; /*Retorna 0 o FALSE si al menos un correo igual al que se recibe como parametro (NO CUMPLE UNICIDAD)*/
	ELSE
		RETURN TRUE; /*Retorna 1 o TRUE si aun no se ha registrado el correo recibido como parametro (SI CUMPLE UNICIDAD)*/
	END IF;
		
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `VALIDAR_ESTATUS_EXISTE` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `VALIDAR_ESTATUS_EXISTE`(ESTATUS_ID INT ) RETURNS tinyint(1)
    DETERMINISTIC
BEGIN 	
	DECLARE CONTADOR INT; /*Variable contador de tipo entero que almacenara el numero de registros con el mimso correo que el parametro de la funcion*/
    
    SET CONTADOR = 0; /*Inicializacion en 0*/
    SELECT count(STATUS_ID) INTO CONTADOR FROM ACCOUNT_STATUS WHERE STATUS_ID = ESTATUS_ID; /*Conteo de STATUS*/
    
    IF ( CONTADOR = 0  OR ESTATUS_ID IS NULL ) THEN
		/*Si No se encuentra registro alguno */
        RETURN FALSE; /*No EXISTE EL ESTATUS*/
	ELSE
		RETURN TRUE; /*EXISTE EL ESTATUS*/
    END IF;
		
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `VALIDAR_EXISTENCIA_EMP` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `VALIDAR_EXISTENCIA_EMP`( GERENTE_ID INT ) RETURNS tinyint(1)
    DETERMINISTIC
BEGIN
	DECLARE CONTEO INT;
    SELECT COUNT(*) INTO CONTEO FROM EMPLOYEES WHERE EMPLOYEE_ID = GERENTE_ID;
	IF ( CONTEO = 0  OR GERENTE_ID IS NULL ) THEN
		/*Si No se encuentra registro alguno con el EMPLOYEE_ID en EMPLOYEES */
        RETURN FALSE; /*No EXISTE EL EMPLEADO*/
	ELSE
		RETURN TRUE; /*EXISTE EL EMPLEADO*/
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `VALIDAR_FECHA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `VALIDAR_FECHA`(FECHA_PARAM VARCHAR(10)) RETURNS date
    DETERMINISTIC
BEGIN	
	/*Declaracion de variable que retornara la funcion de tipo DATE*/
	DECLARE FECHA_VALIDA DATE;
    /*Si el parameto es nulo o vacio, se retorna la fecha actual*/
    IF FECHA_PARAM IS NULL OR FECHA_PARAM = '' THEN
		SET FECHA_VALIDA = CURDATE();
	ELSE
		/*Se intenta convertir el parametro a un formato de fecha valido YYYY-MM-DD*/
        /*Si no se logra convertir a tipo DATE valido, se asigna la fecha actula que posteriorment se retorna*/
		SET FECHA_VALIDA = STR_TO_DATE(FECHA_PARAM, '%Y-%m-%d');
        IF FECHA_VALIDA IS NULL THEN
			SET FECHA_VALIDA = CURDATE();
        END IF;
	END IF;
    RETURN FECHA_VALIDA; /*Retorno de la fecha valida*/
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `VALIDAR_FECHA_CONTRATACION` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `VALIDAR_FECHA_CONTRATACION`(EMPLEADO_ID INT, FECHA_PARAM VARCHAR(10)) RETURNS date
    DETERMINISTIC
BEGIN	
	/*Declaracion de variable tipo date que almacenara la fecha actual antes de actualizar usuario*/
	DECLARE FECHA_ACTUAL DATE;
	/*Declaracion de variable que retornara la funcion de tipo DATE*/
	DECLARE FECHA_VALIDA DATE;
    /*Obtner la fecha de contratacion ACTUAL del empleado antes de su actualizacion*/
    SELECT HIRE_DATE INTO FECHA_ACTUAL FROM EMPLOYEES WHERE EMPLOYEE_ID = EMPLEADO_ID;
    /*Si el parameto es nulo o vacio, se retorna la fecha actual*/
    IF FECHA_PARAM IS NULL OR FECHA_PARAM = '' THEN
		SET FECHA_VALIDA = CURDATE();
	ELSE
		/*Se intenta convertir el parametro a un formato de fecha valido YYYY-MM-DD*/
        /*Si no se logra convertir a tipo DATE valido, o la fecha es menor o igual a la ya existente, se asigna la fecha actula que posteriorment se retorna*/
		SET FECHA_VALIDA = STR_TO_DATE(FECHA_PARAM, '%Y-%m-%d');
        IF FECHA_VALIDA IS NULL OR FECHA_ACTUAL <= FECHA_VALIDA THEN
			SET FECHA_VALIDA = CURDATE();
        END IF;
	END IF;
    RETURN FECHA_VALIDA; /*Retorno de la fecha valida*/
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `VALIDAR_PUESTO_TRABAJO_ACTIVO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `VALIDAR_PUESTO_TRABAJO_ACTIVO`( TRABAJO_ID VARCHAR(10) ) RETURNS tinyint(1)
    DETERMINISTIC
BEGIN
	IF (TRABAJO_ID = 'INACT_EMP' OR TRABAJO_ID = 'RET_EMP' OR TRABAJO_ID = 'FORM_EMP') AND (TRABAJO_ID <> '' AND TRABAJO_ID IS NOT NULL) THEN
		/*Si el empleado se no esta inactivo, retirado o desempleado, se devuelve false, el PUESTO_TRABAJO no es activo*/
        RETURN FALSE; /*No se valido PUESTO_TRABAJO activo, se retorna false*/
	ELSE
		RETURN TRUE; /*se valido PUESTO_TRABAJO activo, se retorna TRUE*/
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `VALIDAR_ROL` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `VALIDAR_ROL`(ROL_ID VARCHAR(10) ) RETURNS tinyint(1)
    DETERMINISTIC
BEGIN 	
	DECLARE CONTADOR INT; /*Variable contador de tipo entero que almacenara el numero de registros con el mimso correo que el parametro de la funcion*/
    
    SET CONTADOR = 0; /*Inicializacion en 0*/
    SELECT count(ROLE_ID) INTO CONTADOR FROM ROLES WHERE ROLE_ID = ROL_ID; /*Conteo de ROLE*/
    
    IF ( CONTADOR = 0  OR ROL_ID IS NULL ) THEN
		/*Si No se encuentra registro alguno con el ROL_ID en ROLES */
        RETURN FALSE; /*No EXISTE EL ROL*/
	ELSE
		RETURN TRUE; /*EXISTE EL ROL*/
    END IF;
		
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `VALIDAR_UNICIDAD_EMAIL` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `VALIDAR_UNICIDAD_EMAIL`( CORREO VARCHAR(100) ) RETURNS tinyint(1)
    DETERMINISTIC
BEGIN 	
	DECLARE CONTADOR INT; /*Variable contador de tipo entero que almacenara el numero de registros con el mimso correo que el parametro de la funcion*/
    SET CONTADOR = 0; /*Inicializacion en 0*/
    SELECT COUNT(*) INTO CONTADOR FROM EMPLOYEES EMP WHERE EMP.EMAIL = CORREO;
    IF CONTADOR > 0 THEN
		RETURN FALSE; /*Retorna 0 o FALSE si al menos un correo igual al que se recibe como parametro (NO CUMPLE UNICIDAD)*/
	ELSE
		RETURN TRUE; /*Retorna 1 o TRUE si aun no se ha registrado el correo recibido como parametro (SI CUMPLE UNICIDAD)*/
	END IF;
		
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `VALIDAR_UNICIDAD_EMAIL_USUARIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `VALIDAR_UNICIDAD_EMAIL_USUARIO`( CORREO VARCHAR(100) ) RETURNS tinyint(1)
    DETERMINISTIC
BEGIN 	
	DECLARE CONTADOR INT; /*Variable contador de tipo entero que almacenara el numero de registros con el mimso correo que el parametro de la funcion*/
    SET CONTADOR = 0; /*Inicializacion en 0*/
    SELECT COUNT(*) INTO CONTADOR FROM USERS  WHERE EMAIL = CORREO;
    IF CONTADOR > 0 THEN
		RETURN FALSE; /*Retorna 0 o FALSE si al menos un correo igual al que se recibe como parametro (NO CUMPLE UNICIDAD)*/
	ELSE
		RETURN TRUE; /*Retorna 1 o TRUE si aun no se ha registrado el correo recibido como parametro (SI CUMPLE UNICIDAD)*/
	END IF;
		
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ACTUALIZAR_DEPARTAMENTO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_DEPARTAMENTO`(
	IN DEPARTAMENTO_ID VARCHAR(4),
	IN DEPARTAMENTO VARCHAR (30),
    IN GERENTE_ID VARCHAR(6), 
    IN LOCACION_ID VARCHAR(4))
BEGIN
	UPDATE DEPARTMENTS SET 
        DEPARTMENT_NAME = DEPARTAMENTO,
        MANAGER_ID = CAST(ROUND(GERENTE_ID) AS UNSIGNED), /*Redondeo y Conversion a entero sin signo del valor que se reciba*/
        LOCATION_ID = CAST(ROUND(LOCACION_ID) AS UNSIGNED)
			WHERE DEPARTMENT_ID = CAST(ROUND(DEPARTAMENTO_ID) AS UNSIGNED);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ACTUALIZAR_EMPLEADO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_EMPLEADO`(
	IN EMPLEADO_ID INT,
	IN NOMBRE VARCHAR(25), 
    IN APELLIDO VARCHAR (25),
    IN CORREO VARCHAR (100),
    IN TELEFONO VARCHAR(20),
    IN FECHA_CONTRATACION VARCHAR(10), /*Se recibe una cadena de 10 caracteres que despues se validara como fecha tipo DATE correcta*/
    IN TRABAJO_ID VARCHAR(10),
    /*IN SALARIO DECIMAL(8,2), */
    IN COMISION DECIMAL(2,2),
    IN GERENTE_ID INT,
    IN DEPARTAMENTO_ID INT,
    OUT VALIDACION_ERROR BOOLEAN, OUT TIPO_ERROR INT, OUT MENSAJE VARCHAR(150))
BEGIN
		DECLARE VALIDACION_EMAIL BOOLEAN;	/*Valida unicidad de EMAIL al actualizar empleado*/
		DECLARE VALIDACION_TRABAJO BOOLEAN; /*Valida si el TRABAJO es distinto de INACT_EMP, RET_EMP y FORM_EMP */
        DECLARE VALIDACION_GERENTE BOOLEAN; /*Valida si el id del gerente recibido existe como empleado en EMPLOYEES*/
        DECLARE VALIDACION_DEPARTAMENTO BOOLEAN;
        /*SE llama a la funcion que valida la unicidad del correo y se almacena el valor booleano en la variable de salida VALIDACION_UNICIDAD_CORREO*/
		SELECT VALIDAR_ACTUALIZACION_EMAIL(EMPLEADO_ID, LOWER(CORREO)) INTO VALIDACION_EMAIL;
        SELECT VALIDAR_PUESTO_TRABAJO_ACTIVO (TRABAJO_ID) INTO VALIDACION_TRABAJO;
        SELECT VALIDAR_EXISTENCIA_EMP (GERENTE_ID) INTO VALIDACION_GERENTE;
        
		/*Validdacion de ID del departamento, en caso de que el puesto corresponda a desempleado, inactivo o retirado*/
        IF (TRABAJO_ID = 'INACT_EMP' OR TRABAJO_ID = 'RET_EMP' OR TRABAJO_ID = 'FORM_EMP' ) THEN
				IF TRABAJO_ID = 'INACT_EMP' THEN
					SET DEPARTAMENTO_ID = 7;
					SET GERENTE_ID = NULL;
				ELSEIF TRABAJO_ID = 'RET_EMP' THEN
					SET DEPARTAMENTO_ID = 8;
					SET GERENTE_ID = NULL;
				ELSEIF TRABAJO_ID = 'FORM_EMP' THEN
					SET DEPARTAMENTO_ID = 9;
					SET GERENTE_ID = NULL;
				END IF;
		END IF;	
        
        /*Si el TRABAJO_ID es distinto a los inactivos, y el puesto de trabajo nulo, se retorna una false*/
        IF ((TRABAJO_ID <> 'INACT_EMP' AND TRABAJO_ID <> 'RET_EMP' AND TRABAJO_ID <> 'FORM_EMP') AND (DEPARTAMENTO_ID IS NULL OR DEPARTAMENTO_ID = '') ) THEN
			SET VALIDACION_DEPARTAMENTO = FALSE;
		ELSE 
			SET VALIDACION_DEPARTAMENTO = TRUE; /*DEPARTAMENTO Validado*/
        END IF;
		/*Si el trabajo es un puesto activo (TRUE) y al mismo tiempo el GERENTE_ID existe (TRUE): se realiza el registro
			Si el trabajo es INACT_EMP, RET_EMP y FORM_EMP, el GERENTE_ID ya es nulo, que esta permitido
            Y además, la validacion del correo es TRUE
        */
        IF ( ((VALIDACION_TRABAJO = TRUE AND VALIDACION_GERENTE = TRUE) OR ( VALIDACION_TRABAJO = FALSE ) ) AND VALIDACION_EMAIL IS TRUE AND VALIDACION_DEPARTAMENTO IS TRUE) THEN
			UPDATE EMPLOYEES EMP SET 
				EMP.FIRST_NAME = NOMBRE, 
				EMP.LAST_NAME = APELLIDO,  
				EMP.EMAIL = LOWER(CORREO), 
				EMP.PHONE_NUMBER = TELEFONO, 
				/*EMP.HIRE_DATE = (VALIDAR_FECHA_CONTRATACION(EMPLEADO_ID, FECHA_CONTRATACION)),*/  /*Validación de la fecha para devolver un dato tipo DATE idoneo*/
				EMP.HIRE_DATE = FECHA_CONTRATACION,
				EMP.JOB_ID = TRABAJO_ID,
				EMP.SALARY = SALARIO_INICIAL(TRABAJO_ID), /*Se calcula el salario incial conforme al puesto de trabajo seleccionado por ID*/
				EMP.COMMISSION_PCT = COMISION,
				EMP.MANAGER_ID = GERENTE_ID,
				EMP.DEPARTMENT_ID = DEPARTAMENTO_ID
					WHERE EMP.EMPLOYEE_ID = EMPLEADO_ID;
				/*Despues de actualizar el empleado, se debe de guardar o no un nuevo registro en JOB_HISTORY*/
				/*CALL AGREGAR_JOB_HISTORY(EMPLEADO_ID, FECHA_CONTRATACION);*/
                SET VALIDACION_ERROR = TRUE; /*Se indica que NO HUBO un error (Validacion exitosa)*/
                SET TIPO_ERROR = 0;
                SET MENSAJE = 'Actualizacion exitosa';
				COMMIT;
			/*Si el trabajo existe y es distinto de vacio y es activo, pero el gerente no existe en EMPLOYEES, se genera un error*/
			ELSEIF ( (VALIDACION_TRABAJO = TRUE ) AND VALIDACION_GERENTE = FALSE ) THEN
				SET VALIDACION_ERROR = FALSE; /*Se indica que hay un error (No se valido actualizacion*/
                SET TIPO_ERROR = 2;
                SET MENSAJE = 'Seleccione un Gerente valido.';
			ELSEIF (TRABAJO_ID = '' OR TRABAJO_ID IS NULL) THEN
				SET VALIDACION_ERROR = FALSE; /*Se indica que hay un error (No se valido actualizacion*/
                SET TIPO_ERROR = 3;
                SET MENSAJE = 'Selecione un puesto de trabajo valido.';
			ELSEIF ((TRABAJO_ID <> 'INACT_EMP' OR TRABAJO_ID <> 'RET_EMP' OR TRABAJO_ID <> 'FORM_EMP' ) AND (DEPARTAMENTO_ID = 7 AND DEPARTAMENTO_ID = 8 AND DEPARTAMENTO_ID = 9) ) THEN
				SET VALIDACION_ERROR = FALSE; /*Se indica que hay un error (No se valido actualizacion*/
                SET TIPO_ERROR = 4;
                SET MENSAJE = 'Seleccione un Puesto de trabajo para el departamento seleccionado: FORMER EMPLOYEES, INACTIVE EMPLOYEES o RETIREES EMPLOYEES';
			ELSEIF (VALIDACION_EMAIL IS FALSE) THEN
				SET VALIDACION_ERROR = FALSE; /*Se indica que hay un error (No se valido actualizacion*/
                SET TIPO_ERROR = 5;
                SET MENSAJE = 'El correo ingresado ya existe. Pruebe con un correo diferente.';
			ELSEIF ((TRABAJO_ID <> 'INACT_EMP' AND TRABAJO_ID <> 'RET_EMP' AND TRABAJO_ID <> 'FORM_EMP') AND (DEPARTAMENTO_ID IS NULL OR DEPARTAMENTO_ID = '') ) THEN
				SET VALIDACION_ERROR = FALSE; /*Se indica que hay un error (No se valido actualizacion*/
                SET TIPO_ERROR = 6;
                SET MENSAJE = 'Seleccione un departamento para el empleado';
			ELSE 
				SET VALIDACION_ERROR = FALSE; /*Se indica que hay un error (No se valido actualizacion*/
                SET TIPO_ERROR = 7;
                SET MENSAJE = 'Lo sentimos, no hemos podido actualizar el registro.';
			END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ACTUALIZAR_HOJA_VIDA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_HOJA_VIDA`(
	IN EMPLEADO_ID INT,
    IN FECHA_NACIMIENTO DATE,
    IN NACIONALIDAD VARCHAR (45),
    IN ESTADO_CIVIL VARCHAR(45),
    IN DIRECCION VARCHAR(100),
    IN ESTUDIOS VARCHAR(200),
    IN IDIOMAS VARCHAR (150),
    /*Variables de salida (validaciones)*/
    OUT VALIDACION_ERROR BOOLEAN, OUT TIPO_ERROR INT, OUT MENSAJE VARCHAR(150)
    )
BEGIN
	DECLARE CONTEO INT;
    /*Consulta si ya existe una hoja de vida para determinado empleado*/
    SELECT COUNT(*) INTO CONTEO FROM HOJAS_VIDA HDV WHERE HDV.EMPLOYEE_ID = EMPLEADO_ID;
    IF (CONTEO = 0) THEN
		/*No existe hoja de vida previa. Procede a registrarse hoja de vida*/
        INSERT INTO HOJAS_VIDA (EMPLOYEE_ID, FECHA_NACIMIENTO, NACIONALIDAD, ESTADO_CIVIL, DIRECCION, ESTUDIOS, IDIOMAS) VALUES
        (EMPLEADO_ID,  FECHA_NACIMIENTO, NACIONALIDAD, ESTADO_CIVIL, DIRECCION, ESTUDIOS, IDIOMAS);
        SET VALIDACION_ERROR = TRUE; /*Se valido el registro de manera exitosa*/
		SET TIPO_ERROR = 0; /*No hay error*/
		SET MENSAJE = "Registro de hoja de vida exitoso";
    ELSE 
		/*EXISTE un registro previo de la hoja de vida. No se permite un nuevo registro*/
        UPDATE HOJAS_VIDA SET 
			
            FECHA_NACIMIENTO = FECHA_NACIMIENTO,
            NACIONALIDAD = NACIONALIDAD,
            ESTADO_CIVIL = ESTADO_CIVIL,
            DIRECCION = DIRECCION,
            ESTUDIOS = ESTUDIOS,
            IDIOMAS = IDIOMAS
				WHERE 
					EMPLOYEE_ID = EMPLEADO_ID;
        SET VALIDACION_ERROR = TRUE; 
		SET TIPO_ERROR = 0;
		SET MENSAJE = "Actualizacion de hoja de vida exitosa";
        
    END IF;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ACTUALIZAR_LOCACION` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_LOCACION`(
	IN LOCACION_ID INT,
	IN DIRECCION VARCHAR(100), 
    IN CODIGO_POSTAL VARCHAR (12),
    IN CIUDAD VARCHAR (30),
    IN ESTADO_PROVINCIA VARCHAR(25),
    IN PAIS_ID VARCHAR(2)
    )
BEGIN
        UPDATE LOCATIONS SET 
			STREET_ADDRESS = DIRECCION,
            POSTAL_CODE = CODIGO_POSTAL,
            CITY = CIUDAD,
            STATE_PROVINCE = ESTADO_PROVINCIA,
            COUNTRY_ID = PAIS_ID
				WHERE LOCATION_ID = LOCACION_ID;
            COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ACTUALIZAR_PAIS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_PAIS`(
	IN PAIS_ID VARCHAR(2),
	IN PAIS_NOMBRE VARCHAR(40), 
    IN REGION_ID INT
    )
BEGIN
        UPDATE COUNTRIES SET 
            COUNTRY_NAME = PAIS_NOMBRE,
            REGION_ID = REGION_ID
				WHERE COUNTRY_ID = UPPER(PAIS_ID);
            COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ACTUALIZAR_TRABAJO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_TRABAJO`(
	IN TRABAJO_ID VARCHAR(10), 
    IN PUESTO_TRABAJO VARCHAR (35),
    IN SUELDO_MINIMO VARCHAR(6), /*Aunque el valor en la Tabla es entero, se recibe una cadena que despues se transforma a entero*/
    IN SUELDO_MAXIMO VARCHAR(6))
BEGIN
	UPDATE JOBS SET 
        JOB_TITLE = PUESTO_TRABAJO,
        MIN_SALARY = CAST(ROUND(SUELDO_MINIMO) AS UNSIGNED),
        MAX_SALARY = CAST(ROUND(SUELDO_MAXIMO) AS UNSIGNED)
			WHERE JOB_ID = UPPER(TRABAJO_ID); /*El id del puesto de trabajo debe estar en mayuscula*/
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ACTUALIZAR_USUARIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_USUARIO`(
	IN USUARIO_ID INT,
    IN CORREO VARCHAR (100),
	IN NOMBRE VARCHAR(25), 
    IN APELLIDO VARCHAR (25),
    IN ESTATUS_ID INT,
    IN ROL_ID VARCHAR (10),
    OUT VALIDACION_ERROR BOOLEAN, OUT TIPO_ERROR INT, OUT MENSAJE VARCHAR(150))
BEGIN
		
        DECLARE VALIDACION_EMAIL BOOLEAN;
		DECLARE VALIDAR_ESTATUS BOOLEAN; /*Validar que el estado existe*/
		DECLARE VALIDAR_ROL BOOLEAN;
		/*SE llama a la funcion que valida la unicidad del correo y se almacena el valor booleano en la variable de salida */
		SELECT VALIDAR_ACTUALIZACION_EMAIL_USUARIO(USUARIO_ID, CORREO) INTO VALIDACION_EMAIL; /*Valida que nuevo correo no exista para otro usuario en la BD*/
		SELECT VALIDAR_ESTATUS_EXISTE(ESTATUS_ID) INTO VALIDAR_ESTATUS; /*Valida eleccion de estatus*/
		SELECT VALIDAR_ROL(ROL_ID) INTO VALIDAR_ROL; /*Valida eleccion de rol*/
        
		/*Solo se permite actuualizar nombre, apellido STATUS_ID y ROLE_ID*/
		IF (VALIDACION_EMAIL IS FALSE) THEN
			/*Correo valido (aún no existe en la BD)*/
            SET VALIDACION_ERROR = FALSE; /*Se indica que hay un error (No se valido actualizacion*/
			SET TIPO_ERROR = 1;
			SET MENSAJE = CONCAT_WS(" ", 'El correo ',CORREO,' ya existe. Ingrese uno diferente');
		ELSEIF (VALIDAR_ESTATUS IS FALSE) THEN
			/*ESTATUS VALIDO EN LA BD*/
            SET VALIDACION_ERROR = FALSE; /*Se indica que hay un error (No se valido actualizacion*/
			SET TIPO_ERROR = 2;
			SET MENSAJE = CONCAT_WS(" ", 'El ESTATUS ',ESTATUS_ID,' no es valido. Seleccione un ESTATUS valido');
		ELSEIF (VALIDAR_ROL IS FALSE) THEN
			/* Rol valido en la BD */
            SET VALIDACION_ERROR = FALSE; /*Se indica que hay un error (No se valido actualizacion*/
			SET TIPO_ERROR = 3;
			SET MENSAJE = CONCAT_WS(" ", 'El ROL ',ROL_ID,' no es valido. Seleccione un ROL valido');
		ELSEIF (NOMBRE IS NULL OR APELLIDO IS NULL) THEN
			/*No se permiten nombre y apellido vacios*/
            SET VALIDACION_ERROR = FALSE; /*Se indica que hay un error (No se valido actualizacion*/
			SET TIPO_ERROR = 4;
			SET MENSAJE = "Los campos de nombre y apellido son obligatorios. Ingrese campos validos";
		ELSE
			/*Se realiza el UPDATE*/
            UPDATE USERS 
				SET FIRST_NAME = NOMBRE,
				LAST_NAME = APELLIDO,
                STATUS_ID = ESTATUS_ID,
                ROLE_ID = ROL_ID
					WHERE USER_ID = USUARIO_ID;
            /*Se inicializan las variables de mensaje de salida*/
            SET VALIDACION_ERROR = TRUE; /*Se indica que NO HUBO un error (Validacion exitosa)*/
			SET TIPO_ERROR = 0;
            SET MENSAJE = "Actualizacion exitosa";
        END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ADD_JOB_HISTORY` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ADD_JOB_HISTORY`(
  IN p_emp_id INT,
  IN p_start_date DATE,
  IN p_end_date DATE,
  IN p_job_id VARCHAR(10),
  IN p_department_id INT
)
BEGIN
  INSERT INTO job_history (employee_id, start_date, end_date, job_id, department_id)
  VALUES (p_emp_id, p_start_date, p_end_date, p_job_id, p_department_id)
  ON DUPLICATE KEY UPDATE
    end_date = VALUES(end_date),
    job_id = VALUES(job_id),
    department_id = VALUES(department_id);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AGREGAR_JOB_HISTORY` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AGREGAR_JOB_HISTORY`(IN EMPLEADO_ID INT, IN FECHA_CONTRATACION_NUEVA VARCHAR(10))
BEGIN 
	DECLARE EMP_ID_ACTUAL INT;
    DECLARE FECHA_INICIO_ACTUAL DATE;
    DECLARE FECHA_FIN DATE;
    DECLARE TRABAJO_ID VARCHAR(10);
    DECLARE DEPARTAMENTO_ID INT;
    DECLARE FECHA_ACT_PARAM DATE;
    DECLARE MENSAJE VARCHAR(200);
    SET FECHA_ACT_PARAM = CAST(FECHA_CONTRATACION_NUEVA AS DATE);/*Inicializamos la variable con un formato de fecha valido*/
    /*Se recuperan el ID, hire date, fecha actual y departamento actual del correspondiente empleado*/
    SELECT EMPLOYEE_ID, HIRE_DATE, CURDATE(), JOB_ID, DEPARTMENT_ID
		INTO EMP_ID_ACTUAL, FECHA_INICIO_ACTUAL, FECHA_FIN, TRABAJO_ID, DEPARTAMENTO_ID 
			FROM EMPLOYEES
				WHERE EMPLOYEE_ID = EMPLEADO_ID;
                
	IF FECHA_ACT_PARAM > FECHA_INICIO_ACTUAL THEN
		/*SET MENSAJE = 'PARAMETRO mayor a FECHA ACTUAL';*/
        INSERT INTO JOB_HISTORY (employee_id, start_date, end_date,  job_id, department_id) 
		VALUES (EMP_ID_ACTUAL, FECHA_INICIO_ACTUAL, FECHA_ACT_PARAM, TRABAJO_ID, DEPARTAMENTO_ID);
    ELSE 
		SET MENSAJE = 'PARAMETRO es menor < a FECHA ACTUAL No se registra en JOB_HISTORY';
        SELECT MENSAJE;
	END IF;
	COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `AUTOLLENADO_ASISTENCIAS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `AUTOLLENADO_ASISTENCIAS`(
	IN EMPLEADO_ID INT,
    IN FECHA_INICIO DATE,
    IN FECHA_FIN DATE,
    IN HORA_ENTRADA TIME,
    IN HORA_SALIDA TIME
)
BEGIN
		INSERT INTO ASISTENCIAS (`EMPLOYEE_ID`, `ENTRADA`, `SALIDA`)
		SELECT EMPLEADO_ID, entrada, salida
		FROM (
			SELECT 
				DATE_ADD(start_date, INTERVAL (units.a + 10 * tens.a) DAY) AS fecha,
				CONCAT(DATE_ADD(start_date, INTERVAL (units.a + 10 * tens.a) DAY), ' ', entrada_horario) AS entrada,
				CONCAT(DATE_ADD(start_date, INTERVAL (units.a + 10 * tens.a) DAY), ' ', salida_horario) AS salida
			FROM
				(SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) units,
				(SELECT 0 AS a UNION ALL SELECT 1 UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4 UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8 UNION ALL SELECT 9) tens,
				(SELECT FECHA_INICIO AS start_date, FECHA_FIN AS end_date, HORA_ENTRADA AS entrada_horario, HORA_SALIDA AS salida_horario) dates
			WHERE
				DATE_ADD(start_date, INTERVAL (units.a + 10 * tens.a) DAY) <= end_date
				AND WEEKDAY(DATE_ADD(start_date, INTERVAL (units.a + 10 * tens.a) DAY)) BETWEEN 0 AND 4
		) AS weekdays;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BUSCAR_DEPARTAMENTO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BUSCAR_DEPARTAMENTO`( IN DEPARTAMENTO_ID VARCHAR(4) )
BEGIN
	SELECT DEPT.DEPARTMENT_ID AS DEPARTAMENTO_ID, DEPT.DEPARTMENT_NAME AS DEPARTAMENTO, 
		DEPT.MANAGER_ID AS GERENTE_ID, CONCAT_WS(" ",EMP_MAN.FIRST_NAME, EMP_MAN.LAST_NAME) AS GERENTE,
        DEPT.LOCATION_ID AS LOCACION_ID, 
        CONCAT_WS(" ",LOC.STREET_ADDRESS, 'CP '+LOC.POSTAL_CODE, LOC.CITY,', ',LOC.STATE_PROVINCE,', ',COT.COUNTRY_NAME, ', ',REG.REGION_NAME) AS DIRECCION
			FROM DEPARTMENTS DEPT
				INNER JOIN EMPLOYEES EMP_MAN ON DEPT.MANAGER_ID = EMP_MAN.EMPLOYEE_ID
				INNER JOIN LOCATIONS LOC ON DEPT.LOCATION_ID = LOC.LOCATION_ID
				INNER JOIN COUNTRIES COT ON LOC.COUNTRY_ID = COT.COUNTRY_ID
				INNER JOIN REGIONS REG ON COT.REGION_ID = REG.REGION_ID
					WHERE DEPT.DEPARTMENT_ID = CAST(ROUND(DEPARTAMENTO_ID) AS UNSIGNED);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BUSCAR_EMPLEADO_EXTENDIDO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BUSCAR_EMPLEADO_EXTENDIDO`(IN ID_EMPLEADO INT)
BEGIN
	SELECT EMP.EMPLOYEE_ID AS EMPLEADO_ID, EMP.FIRST_NAME AS NOMBRE, EMP.LAST_NAME AS APELLIDO, EMP.EMAIL AS CORREO,
    EMP.PHONE_NUMBER AS TELEFONO, EMP.HIRE_DATE AS FECHA_CONTRATACION, 
    EMP.JOB_ID AS TRABAJO_ID, JOB.JOB_TITLE AS PUESTO_TRABAJO, 
    EMP.SALARY AS SUELDO, EMP.COMMISSION_PCT AS COMISION,
    EMP.MANAGER_ID AS GERENTE_ID, CONCAT_WS(" ",EMP_MAN.FIRST_NAME, EMP_MAN.LAST_NAME) AS GERENTE, 
    EMP.DEPARTMENT_ID AS DEPARTAMENTO_ID, DEPT.DEPARTMENT_NAME AS DEPARTAMENTO 
		FROM EMPLOYEES EMP
			INNER JOIN JOBS JOB
			ON EMP.JOB_ID = JOB.JOB_ID
			LEFT JOIN DEPARTMENTS DEPT
            ON EMP.DEPARTMENT_ID = DEPT.DEPARTMENT_ID
            LEFT/*INNER*/ JOIN EMPLOYEES EMP_MAN
            ON EMP.MANAGER_ID = EMP_MAN.EMPLOYEE_ID
				WHERE EMP.EMPLOYEE_ID = ID_EMPLEADO;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BUSCAR_LOCACION_EXTENDIDO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BUSCAR_LOCACION_EXTENDIDO`(IN LOCACION_ID INT)
BEGIN
	SELECT LOC.LOCATION_ID AS LOCACION_ID, LOC.STREET_ADDRESS AS DIRECCION, LOC.POSTAL_CODE AS CODIGO_POSTAL, 
	LOC.CITY AS CIUDAD, LOC.STATE_PROVINCE AS ESTADO_PROVINCIA, 
    LOC.COUNTRY_ID AS PAIS_ID, COU.COUNTRY_NAME AS PAIS
		FROM LOCATIONS LOC
        INNER JOIN COUNTRIES COU
        ON LOC.COUNTRY_ID = COU.COUNTRY_ID 
			WHERE LOC.LOCATION_ID = LOCACION_ID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BUSCAR_PAIS_EXTENDIDO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BUSCAR_PAIS_EXTENDIDO`(IN PAIS_ID VARCHAR(2))
BEGIN
	SELECT COU.COUNTRY_ID AS PAIS_ID, COU.COUNTRY_NAME AS PAIS, COU.REGION_ID, REG.REGION_NAME
		FROM COUNTRIES COU
			INNER JOIN REGIONS REG
				ON COU.REGION_ID = REG.REGION_ID
					WHERE COU.COUNTRY_ID = UPPER(PAIS_ID);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BUSCAR_TRABAJO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BUSCAR_TRABAJO`(IN TRABAJO_ID VARCHAR(10))
BEGIN
	SELECT JOB_ID AS TRABAJO_ID, JOB_TITLE AS PUESTO_TRABAJO, MIN_SALARY AS SUELDO_MINIMO, MAX_SALARY AS SUELDO_MAXIMO
		FROM JOBS
			WHERE 
				JOB_ID = TRABAJO_ID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `BUSCAR_USUARIO_EXTENDIDO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `BUSCAR_USUARIO_EXTENDIDO`(IN USUARIO_ID INT)
BEGIN
	SELECT USR.USER_ID AS USUARIO_ID, USR.EMAIL AS CORREO, CONCAT_WS(" ", USR.FIRST_NAME, USR.LAST_NAME) AS NOMBRE, USR.REGISTRATION_DATE AS FECHA_REGISTRO,
		USR.LAST_LOGIN AS ULTIMA_SESION, 
        USR.STATUS_ID AS ESTATUS_ID, STA.STATUS_TITLE AS ESTADO,
        USR.ROLE_ID AS ROL_ID, ROL.ROLE_TITLE AS ROL
		FROM USERS USR
			INNER JOIN ACCOUNT_STATUS STA
			ON USR.STATUS_ID = STA.STATUS_ID
			INNER JOIN ROLES ROL
            ON USR.ROLE_ID = ROL.ROLE_ID
				WHERE USR.USER_ID = USUARIO_ID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `CONSULTAR_HOJA_VIDA_EMP` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CONSULTAR_HOJA_VIDA_EMP`(IN EMPLEADO_ID INT)
BEGIN
SELECT HDV.HOJA_VIDA_ID AS HOJA_VIDA_ID, EMPLEADO_ID AS EMPLEADO_ID,  EMP.FIRST_NAME AS NOMBRE, EMP.LAST_NAME AS APELLIDO,
		EMP.EMAIL AS CORREO, EMP.PHONE_NUMBER AS TELEFONO,
			HDV.FECHA_NACIMIENTO AS FECHA_NACIMIENTO,
            HDV.NACIONALIDAD AS NACIONALIDAD,
            HDV.ESTADO_CIVIL AS EDO_CIVIL,
            HDV.DIRECCION AS DIRECCION,
            HDV.ESTUDIOS AS ESTUDIOS,
            HDV.IDIOMAS AS IDIOMAS 
				FROM HOJAS_VIDA HDV
                INNER JOIN EMPLOYEES EMP
                ON HDV.EMPLOYEE_ID = EMP.EMPLOYEE_ID
					WHERE HDV.EMPLOYEE_ID = EMPLEADO_ID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ELIMINAR_DEPARTAMENTO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_DEPARTAMENTO`( IN DEPARTAMENTO_ID VARCHAR(4) )
BEGIN
	DELETE FROM DEPARTMENTS WHERE DEPARTMENT_ID = CAST(ROUND(DEPARTAMENTO_ID) AS UNSIGNED);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ELIMINAR_EMPLEADO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_EMPLEADO`( IN ID_EMPLEADO INT, OUT VALIDACION_ERROR BOOLEAN, OUT TIPO_ERROR INT, OUT MENSAJE VARCHAR(150))
BEGIN
	DECLARE EXISTENCIA_JOB_HISTORY BOOLEAN;
    DECLARE EXISTENCIA_SUBORDINADOS BOOLEAN;
    DECLARE EXISTENCIA_DEPARTAMAMENTOS BOOLEAN; 
    /*Se recupera el booleano que indica si existe o no en JOB_HISTORY, tiene subordinaods, y dirige un departamento*/
    SELECT EXISTE_EMP_JOB_HISTORY(ID_EMPLEADO) INTO EXISTENCIA_JOB_HISTORY;
    SELECT EXISTE_EMP_GERENTE(ID_EMPLEADO) INTO EXISTENCIA_SUBORDINADOS;
    SELECT EXISTE_EMP_DEPARTMENTS(ID_EMPLEADO) INTO EXISTENCIA_DEPARTAMAMENTOS;
    /*Inician validaciones*/
    IF (EXISTENCIA_JOB_HISTORY = TRUE AND EXISTENCIA_SUBORDINADOS = TRUE) THEN
		SET VALIDACION_ERROR = FALSE; /*Se indica que hay un error*/
        SET TIPO_ERROR = 1; /*Se especifica el tipo de error*/  /*Pertenece a JOB_HISTORY y tiene al menos un subordinado*/
        SET MENSAJE = "EMPLEADO no se puede eliminar porque ya existe en JOB_HISTORY, y tiene al menos un empleado a su cargo.";
	ELSEIF (EXISTENCIA_JOB_HISTORY = TRUE OR EXISTENCIA_SUBORDINADOS = TRUE) THEN
		SET VALIDACION_ERROR = FALSE; /*Se indica que hay un error*/
        SET TIPO_ERROR = 2; /*Se especifica el tipo de error*/ /*Pertenece a JOB_HISTORY o Tiene al menos un subordinado*/
        SET MENSAJE = "EMPLEADO no se puede eliminar porque ya existe en JOB_HISTORY o tiene al menos un empleado a su cargo";
	ELSE
		SET VALIDACION_ERROR = TRUE;
        SET TIPO_ERROR = 0;
        SET MENSAJE = "Empleado eliminado correctamente";
        
		DELETE FROM EMPLOYEES  WHERE EMPLOYEE_ID = ID_EMPLEADO;
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ELIMINAR_LOCACION` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_LOCACION`( IN LOCACION_ID INT )
BEGIN
	DELETE FROM LOCATIONS WHERE LOCATION_ID = LOCACION_ID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ELIMINAR_TRABAJO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_TRABAJO`( IN TRABAJO_ID VARCHAR(10) )
BEGIN
	DELETE FROM JOBS WHERE JOB_ID = UPPER(TRABAJO_ID);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ELIMINAR_USUARIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ELIMINAR_USUARIO`( IN USUARIO_ID INT, OUT VALIDACION_ERROR BOOLEAN, OUT TIPO_ERROR INT, OUT MENSAJE VARCHAR(150))
BEGIN
		IF (USUARIO_ID IS NULL OR IFNULL(USUARIO_ID, 0) = 0) THEN
			SET VALIDACION_ERROR = FALSE; /*FALSE NO SE VALIDO*/
			SET TIPO_ERROR = 1;
			SET MENSAJE = "Campo USUARIO_ID No valido";
        ELSE
			SET VALIDACION_ERROR = TRUE;
			SET TIPO_ERROR = 0;
			SET MENSAJE = "Usuario eliminado correctamente";
			DELETE FROM USERS  WHERE USER_ID = USUARIO_ID;
        END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `HISTORIAL_ASISTENCIA_EMP` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `HISTORIAL_ASISTENCIA_EMP`(
		IN EMPLEADO_ID INT 
	)
BEGIN
	SELECT ASI.EMPLOYEE_ID AS EMPLEADO_ID, CONCAT_WS(" ", EMP.FIRST_NAME, EMP.LAST_NAME) AS NOMBRE, ASI.ENTRADA AS ENTRADA, ASI.SALIDA AS SALIDA 
	FROM ASISTENCIAS ASI
		INNER JOIN EMPLOYEES EMP
		ON ASI.EMPLOYEE_ID = EMP.EMPLOYEE_ID
			WHERE ASI.EMPLOYEE_ID = EMPLEADO_ID
				ORDER BY ASI.ENTRADA DESC;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `INICIAR_SESION_EMPLEADO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `INICIAR_SESION_EMPLEADO`(
	IN CORREO VARCHAR(100), 
    IN EMPLEADO_ID VARCHAR(45),
    OUT VALIDACION_ERROR BOOLEAN, OUT TIPO_ERROR INT, OUT MENSAJE VARCHAR(150))
BEGIN
	DECLARE VALIDAR_LOGIN BOOLEAN;
    #DECLARE ESTATUS_ID INT;
    #DECLARE ESTADO VARCHAR(25);
    DECLARE CONTADOR INT;
    DECLARE VALIDAR_ID_EMP BOOLEAN;
    
    -- Intentar convertir EMPLEADO_ID en un entero positivo
    SET VALIDAR_ID_EMP = (
        CASE WHEN EMPLEADO_ID REGEXP '^[0-9]+$' AND CAST(EMPLEADO_ID AS UNSIGNED) > 0 THEN TRUE
             ELSE FALSE
        END
    );
    
    
    /*Se asigna directamente el ESTATUS al empleado*/
    SET @ESTATUS_ID = 1;
    SET @ESTADO = 'ACTIVO';
    SET @ROLE_ID = 'EMP';
    SET @ROL = 'Employee';
    -- SELECT STATUS_ID INTO ESTATUS_ID FROM USERS WHERE EMAIL = CORREO AND USER_PASSWORD = CONTRASENA;
    -- LogIn por id y contraseña
    SELECT count(*) INTO CONTADOR FROM EMPLOYEES WHERE EMAIL = CORREO AND EMPLOYEE_ID = EMPLEADO_ID; 
    IF CONTADOR = 1 THEN
		SET VALIDAR_LOGIN = TRUE;
	ELSE
		SET VALIDAR_LOGIN = FALSE;
	END IF;
    
    SELECT EMP.EMPLOYEE_ID AS EMPLEADO_ID, EMP.EMAIL AS CORREO, CONCAT_WS(' ', EMP.FIRST_NAME, EMP.LAST_NAME) AS NOMBRE, 
		DEPT.DEPARTMENT_NAME AS DEPARTAMENTO, CONCAT_WS(' ', MAN.FIRST_NAME, MAN.LAST_NAME) AS GERENTE,
        @ESTATUS_ID AS ESTATUS_ID,
		@ESTADO AS ESTADO, @ROLE_ID AS ROL_ID, @ROL AS ROL 
        FROM EMPLOYEES EMP
        INNER JOIN DEPARTMENTS DEPT
        ON EMP.DEPARTMENT_ID = DEPT.DEPARTMENT_ID
        LEFT JOIN EMPLOYEES MAN
        ON EMP.MANAGER_ID = MAN.EMPLOYEE_ID
			WHERE EMP.EMAIL = CORREO  AND EMP.EMPLOYEE_ID = EMPLEADO_ID;
    
    IF (VALIDAR_LOGIN IS TRUE AND @ESTATUS_ID = 1 AND VALIDAR_ID_EMP IS TRUE) THEN
        
		SET VALIDACION_ERROR = TRUE; /*Se indica que  HUBO un error. no SE inicio sesion*/
		SET TIPO_ERROR = 0;
		SET MENSAJE = CONCAT_WS(" ","Inicio de sesion exitoso: ", CORREO);
	ELSEIF (VALIDAR_LOGIN IS TRUE AND @ESTATUS_ID <> 1 AND VALIDAR_ID_EMP IS TRUE) THEN
		/*Se logra iniciar sesion pero el usuario esta inhabilitado*/
        SET VALIDACION_ERROR = FALSE; /*Se indica que  HUBO un error. no SE inicio sesion*/
		SET TIPO_ERROR = 1;
		SET MENSAJE = "Usuario inactivo. Comuniquese con el administrador de sistemas.";
    ELSEIF( VALIDAR_ID_EMP IS FALSE) THEN
		SET VALIDACION_ERROR = FALSE; /*Se indica que  HUBO un error. no SE inicio sesion*/
		SET TIPO_ERROR = 2;
		SET MENSAJE = "Ingrese un ID valido (Numerico) en el campo contraseña";
    ELSE
		SET VALIDACION_ERROR = FALSE; /*Se indica que  HUBO un error. no SE inicio sesion*/
		SET TIPO_ERROR = 3;
		SET MENSAJE = "El empleado no existe o el Correo o contraseña son incorrectos. Pruebe nuevamente.";
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `INICIAR_SESION_USUARIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `INICIAR_SESION_USUARIO`(
	IN CORREO VARCHAR(100), 
    IN CONTRASENA VARCHAR(45),
    OUT VALIDACION_ERROR BOOLEAN, OUT TIPO_ERROR INT, OUT MENSAJE VARCHAR(150))
BEGIN
	DECLARE VALIDAR_LOGIN BOOLEAN;
    DECLARE ESTATUS_ID INT;
    DECLARE CONTADOR INT;
    
    SELECT STATUS_ID INTO ESTATUS_ID FROM USERS WHERE EMAIL = CORREO AND USER_PASSWORD = CONTRASENA;
    SELECT count(*) INTO CONTADOR FROM USERS WHERE EMAIL = CORREO AND USER_PASSWORD = CONTRASENA; 
    IF CONTADOR = 1 THEN
		SET VALIDAR_LOGIN = TRUE;
	ELSE
		SET VALIDAR_LOGIN = FALSE;
	END IF;
    
    SELECT USR.USER_ID AS USUARIO_ID, USR.EMAIL AS CORREO, CONCAT_WS(" ", USR.FIRST_NAME, USR.LAST_NAME) AS NOMBRE, USR.REGISTRATION_DATE AS FECHA_REGISTRO,
			USR.LAST_LOGIN AS ULTIMA_SESION, 
            USR.STATUS_ID AS ESTATUS_ID, STA.STATUS_TITLE AS ESTADO,  
            USR.ROLE_ID AS ROL_ID, ROL.ROLE_TITLE AS ROL
			FROM USERS USR
				INNER JOIN ACCOUNT_STATUS STA
				ON USR.STATUS_ID = STA.STATUS_ID
				INNER JOIN ROLES ROL
				ON USR.ROLE_ID = ROL.ROLE_ID
					WHERE USR.EMAIL = CORREO AND USR.USER_PASSWORD = CONTRASENA;
    
    IF (VALIDAR_LOGIN IS TRUE AND ESTATUS_ID = 1) THEN
        
		SET VALIDACION_ERROR = TRUE; /*Se indica que  HUBO un error. no SE inicio sesion*/
		SET TIPO_ERROR = 0;
		SET MENSAJE = "Inicio de sesion exitoso.";
	ELSEIF (VALIDAR_LOGIN IS TRUE AND ESTATUS_ID <> 1) THEN
		/*Se logra iniciar sesion pero el usuario esta inhabilitado*/
        SET VALIDACION_ERROR = FALSE; /*Se indica que  HUBO un error. no SE inicio sesion*/
		SET TIPO_ERROR = 1;
		SET MENSAJE = "Usuario inactivo. Comuniquese con el administrador de sistemas.";
    ELSE
		SET VALIDACION_ERROR = FALSE; /*Se indica que  HUBO un error. no SE inicio sesion*/
		SET TIPO_ERROR = 2;
		SET MENSAJE = "Correo o contraseña incorrectos. Pruebe nuevamente.";
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `REGISTRAR_ASISTENCIA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_ASISTENCIA`(
    IN EMPLEADO_ID INT,
    OUT VALIDACION_ERROR BOOLEAN,
    OUT TIPO_ERROR INT,
    OUT MENSAJE VARCHAR(150)
)
BEGIN
    DECLARE EXISTE_ASISTENCIA INT;
    
    -- Verificar si ya existe una asistencia para el empleado en el día actual
    SELECT COUNT(*) INTO EXISTE_ASISTENCIA
    FROM ASISTENCIAS
    WHERE EMPLOYEE_ID = EMPLEADO_ID
    AND DATE(ENTRADA) = CURDATE();
    
    IF EXISTE_ASISTENCIA = 0 THEN
        -- No se ha registrado asistencia, proceder con el registro
        INSERT INTO ASISTENCIAS (EMPLOYEE_ID, ENTRADA)
        VALUES (EMPLEADO_ID, CURRENT_TIMESTAMP());
        
        SET VALIDACION_ERROR = TRUE;
        SET TIPO_ERROR = 0;
        SET MENSAJE = 'Registro exitoso';
    ELSE
        -- Ya se ha registrado una asistencia para el empleado en el día actual
        SET VALIDACION_ERROR = FALSE;
        SET TIPO_ERROR = 1;
        SET MENSAJE = 'Ya se ha registrado una asistencia para el empleado en el día actual';
    END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `REGISTRAR_DEPARTAMENTO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_DEPARTAMENTO`(
    IN DEPARTAMENTO VARCHAR (30),
    IN GERENTE_ID VARCHAR(6), 
    IN LOCACION_ID VARCHAR(4))
BEGIN
	INSERT INTO DEPARTMENTS (
		DEPARTMENT_NAME, MANAGER_ID,LOCATION_ID ) 
			VALUES (
				DEPARTAMENTO, 
				CAST(ROUND(GERENTE_ID) AS UNSIGNED), /*Redondeo y Conversion a entero sin signo del valor que se reciba*/
                CAST(ROUND(LOCACION_ID) AS UNSIGNED));
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `REGISTRAR_EMPLEADO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_EMPLEADO`(
	IN NOMBRE VARCHAR(25), 
    IN APELLIDO VARCHAR (25),
    IN CORREO VARCHAR (100),
    IN TELEFONO VARCHAR(20),
    IN FECHA_CONTRATACION VARCHAR(10), /*Se recibe una cadena de 10 caracteres que despues se validara como fecha tipo DATE correcta*/
    IN TRABAJO_ID VARCHAR(10),

    IN COMISION DECIMAL(2,2),
    IN GERENTE_ID INT,
    IN DEPARTAMENTO_ID INT,
    /*Variables de salida (validaciones)*/
    OUT VALIDACION_ERROR BOOLEAN, OUT TIPO_ERROR INT, OUT MENSAJE VARCHAR(150))
BEGIN
	DECLARE VALIDACION_EMAIL BOOLEAN;
    
    /*Validdacion de ID del departamento, en caso de que el puesto corresponda a desempleado, inactivo o retirado*/
        IF (TRABAJO_ID = 'INACT_EMP' OR TRABAJO_ID = 'RET_EMP' OR TRABAJO_ID = 'FORM_EMP' ) THEN
				IF TRABAJO_ID = 'INACT_EMP' THEN
					SET DEPARTAMENTO_ID = 7;
					SET GERENTE_ID = NULL;
				ELSEIF TRABAJO_ID = 'RET_EMP' THEN
					SET DEPARTAMENTO_ID = 8;
					SET GERENTE_ID = NULL;
				ELSEIF TRABAJO_ID = 'FORM_EMP' THEN
					SET DEPARTAMENTO_ID = 9;
					SET GERENTE_ID = NULL;
				END IF;
		END IF;	
    
	/*SE llama a la funcion que valida la unicidad del correo y se almacena el valor booleano en la variable de salida VALIDACION_UNICIDAD_CORREO*/
	SELECT VALIDAR_UNICIDAD_EMAIL(LOWER(CORREO)) INTO VALIDACION_EMAIL;
    
    IF VALIDACION_EMAIL IS FALSE THEN
			SET VALIDACION_ERROR = FALSE; /*Inidica que hay un error*/
            SET TIPO_ERROR = 1; /*ERROR Tipo 1: Correo ya existente*/
            SET MENSAJE = "El correo ya existe en la BD, pruebe con uno diferente";
    ELSE
			/*Si el valor retornado es TRUE, significa que el coreo aun no ha sido registrado, y se procede con el INSERT*/
            SET VALIDACION_ERROR = TRUE; /*Inidica que NO HAY ERROR*/
            SET TIPO_ERROR = 0; /*ERROR Tipo 0: Correo DISPONIBLE*/
            SET MENSAJE = "Registro exitoso";
            
			INSERT INTO EMPLOYEES (
				FIRST_NAME, 
				LAST_NAME, 
				EMAIL, 
				PHONE_NUMBER, 
				HIRE_DATE, 
				JOB_ID, 
				SALARY, 
				COMMISSION_PCT, 
				MANAGER_ID, 
				DEPARTMENT_ID) 
					VALUES (NOMBRE, 
						APELLIDO, 
						LOWER(CORREO), 
						TELEFONO, 
						VALIDAR_FECHA(FECHA_CONTRATACION), 
						TRABAJO_ID, 
						SALARIO_INICIAL(TRABAJO_ID), 
						COMISION, 
						GERENTE_ID, 
						DEPARTAMENTO_ID);
                        
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `REGISTRAR_HOJA_VIDA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_HOJA_VIDA`(
	IN EMPLEADO_ID INT,
    IN FECHA_NACIMIENTO DATE,
    IN NACIONALIDAD VARCHAR (45),
    IN ESTADO_CIVIL VARCHAR(45),
    IN DIRECCION VARCHAR(100),
    IN ESTUDIOS VARCHAR(200),
    IN IDIOMAS VARCHAR (150),
    /*Variables de salida (validaciones)*/
    OUT VALIDACION_ERROR BOOLEAN, OUT TIPO_ERROR INT, OUT MENSAJE VARCHAR(150)
    )
BEGIN
	DECLARE CONTEO INT;
    /*Consulta si ya existe una hoja de vida para determinado empleado*/
    SELECT COUNT(*) INTO CONTEO FROM HOJAS_VIDA HDV WHERE HDV.EMPLOYEE_ID = EMPLEADO_ID;
    IF (CONTEO = 0) THEN
		/*No existe hoja de vida previa. Procede a registrarse hoja de vida*/
        INSERT INTO HOJAS_VIDA (EMPLOYEE_ID, FECHA_NACIMIENTO, NACIONALIDAD, ESTADO_CIVIL, DIRECCION, ESTUDIOS, IDIOMAS) VALUES
        (EMPLEADO_ID, FECHA_NACIMIENTO, NACIONALIDAD, ESTADO_CIVIL, DIRECCION, ESTUDIOS, IDIOMAS);
        SET VALIDACION_ERROR = TRUE; /*Se valido el registro de manera exitosa*/
		SET TIPO_ERROR = 0; /*No hay error*/
		SET MENSAJE = "Registro de hoja de vida exitoso";
    ELSE 
		/*EXISTE un registro previo de la hoja de vida. No se permite un nuevo registro*/
        SET VALIDACION_ERROR = FALSE; /*No se valido el reistro porque ya existe uno previo*/
		SET TIPO_ERROR = 1;
		SET MENSAJE = "El empleado ya cuenta con una hoja de vida";
        
    END IF;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `REGISTRAR_LOCACION` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_LOCACION`(
	IN DIRECCION VARCHAR(100), 
    IN CODIGO_POSTAL VARCHAR (12),
    IN CIUDAD VARCHAR (30),
    IN ESTADO_PROVINCIA VARCHAR(25),
    IN CIUDAD_ID VARCHAR(2)
    )
BEGIN
	INSERT INTO LOCATIONS (
		STREET_ADDRESS, 
        POSTAL_CODE, 
        CITY, 
        STATE_PROVINCE, 
        COUNTRY_ID
		) 
			VALUES (
				DIRECCION, 
				UPPER(CODIGO_POSTAL), 
                CIUDAD, 
				ESTADO_PROVINCIA,
                CIUDAD_ID
                );
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `REGISTRAR_PAIS` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_PAIS`(
	IN PAIS_ID VARCHAR(2),
	IN PAIS_NOMBRE VARCHAR(40), 
    IN REGION_ID INT
    )
BEGIN
	INSERT INTO COUNTRIES (
		COUNTRY_ID,
		COUNTRY_NAME, 
        REGION_ID
		) 
			VALUES (
				UPPER(PAIS_ID), 
                PAIS_NOMBRE,
				REGION_ID
                );
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `REGISTRAR_PUESTO_TRABAJO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_PUESTO_TRABAJO`(
	IN TRABAJO_ID VARCHAR(10), 
    IN PUESTO_TRABAJO VARCHAR (35),
    IN SUELDO_MINIMO VARCHAR(6), /*Aunque el valor en la Tabla es entero, se recibe una cadena que despues se transforma a entero*/
    IN SUELDO_MAXIMO VARCHAR(6))
BEGIN
	INSERT INTO JOBS (
		JOB_ID, JOB_TITLE, MIN_SALARY, MAX_SALARY ) 
			VALUES (UPPER(TRABAJO_ID), /*El id del puesto de trabajo debe estar en mayuscula*/
				PUESTO_TRABAJO, 
				CAST(ROUND(SUELDO_MINIMO) AS UNSIGNED), /*Conversion a entero sin signo del valor que se reciba*/
                CAST(ROUND(SUELDO_MAXIMO) AS UNSIGNED));
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `REGISTRAR_SALIDA` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_SALIDA`(
    IN EMPLEADO_ID INT,
    OUT VALIDACION_ERROR BOOLEAN,
    OUT TIPO_ERROR INT,
    OUT MENSAJE VARCHAR(150)
)
BEGIN
    DECLARE EXISTE_ENTRADA INT;
    DECLARE EXISTE_SALIDA INT;
    -- Verificar si ya existe una ENTRADA para el empleado en el día actual
    SELECT COUNT(*) INTO EXISTE_ENTRADA
    FROM ASISTENCIAS
    WHERE EMPLOYEE_ID = EMPLEADO_ID
    AND DATE(ENTRADA) = CURDATE();
    
    IF EXISTE_ENTRADA = 1 THEN
		/*Al haber asistencia, se valida si ya existe una SALIDA para el empleado en el dia actual*/
        SELECT COUNT(*) INTO EXISTE_SALIDA
			FROM ASISTENCIAS
			WHERE EMPLOYEE_ID = EMPLEADO_ID
			AND DATE(SALIDA) = CURDATE();
		IF (EXISTE_SALIDA = 0) THEN
        /*Si no hay SALIDA, se procede al registro de salida*/
			UPDATE ASISTENCIAS
            SET SALIDA = CURRENT_TIMESTAMP()
            WHERE EMPLOYEE_ID = EMPLEADO_ID
            AND DATE(ENTRADA) = CURDATE();
            
            SET VALIDACION_ERROR = TRUE; /*Ya existe Salida previa el dia actual*/
			SET TIPO_ERROR = 0;
			SET MENSAJE = 'Registro de salida exitoso.';
        ELSE
		/*Ya existe una salida, por lo que no se puede registrar una nueva*/
			SET VALIDACION_ERROR = FALSE; /*Ya existe Salida previa el dia actual*/
			SET TIPO_ERROR = 2;
			SET MENSAJE = 'Ya se ha registrado una SALIDA para el empleado en el día actual';
        END IF;
	ELSE
        SET VALIDACION_ERROR = FALSE; /*No existe ENTRADA previa el dia actual*/
        SET TIPO_ERROR = 1;
        SET MENSAJE = 'No se ha registrado una asistencia para el empleado en el día actual';
    END IF;
    
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `REGISTRAR_USUARIO` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `REGISTRAR_USUARIO`(
	IN CORREO VARCHAR (100),
    IN CONTRASENA VARCHAR (45),
	IN NOMBRE VARCHAR(25), 
    IN APELLIDO VARCHAR (25),
    /*IN FECHA_REGISTRO TIMESTAMP,*/
    /*IN ULTIMA_SESION TIMESTAMP,*/
    IN ESTATUS_ID INT,
    IN ROL_ID VARCHAR (10),
    
    /*Variables de salida (validaciones)*/
    OUT VALIDACION_ERROR BOOLEAN, OUT TIPO_ERROR INT, OUT MENSAJE VARCHAR(150))
BEGIN
	DECLARE VALIDACION_EMAIL BOOLEAN;
    DECLARE FECHA_REGISTRO TIMESTAMP;
    DECLARE VALIDAR_ESTATUS BOOLEAN; /*Validar que el estado existe*/
    DECLARE VALIDAR_ROL BOOLEAN;
	/*SE llama a la funcion que valida la unicidad del correo y se almacena el valor booleano en la variable de salida */
	SELECT VALIDAR_UNICIDAD_EMAIL_USUARIO(LOWER(CORREO)) INTO VALIDACION_EMAIL;
    SELECT VALIDAR_ESTATUS_EXISTE(ESTATUS_ID) INTO VALIDAR_ESTATUS;
    SELECT VALIDAR_ROL(ROL_ID) INTO VALIDAR_ROL;
    
    IF VALIDACION_EMAIL IS FALSE THEN
			SET VALIDACION_ERROR = FALSE; /*Inidica que hay un error*/
            SET TIPO_ERROR = 1; /*ERROR Tipo 1: Correo ya existente*/
            SET MENSAJE = "El correo ya existe en la BD, pruebe con uno diferente";
	ELSEIF (ROL_ID IS NULL OR ROL_ID = '' OR VALIDAR_ROL IS FALSE) THEN
			SET VALIDACION_ERROR = FALSE; /*Inidica que hay un error*/
            SET TIPO_ERROR = 2; /*ERROR Tipo 1: Correo ya existente*/
            SET MENSAJE = CONCAT_WS(" ", "Elija un rol valido para ", NOMBRE, APELLIDO);
	ELSEIF (ESTATUS_ID IS NULL OR ESTATUS_ID = '' OR VALIDAR_ESTATUS IS FALSE) THEN
			SET VALIDACION_ERROR = FALSE; /*Inidica que hay un error*/
            SET TIPO_ERROR = 3; /*ERROR Tipo 1: Correo ya existente*/
            SET MENSAJE = CONCAT_WS(" ", "Elija un STATUS valido para ", NOMBRE, APELLIDO);
	ELSEIF (CONTRASENA IS NULL OR CONTRASENA = '' OR CORREO IS NULL OR CORREO = '' OR NOMBRE IS NULL OR NOMBRE = '' OR APELLIDO IS NULL OR APELLIDO = '') THEN
			SET VALIDACION_ERROR = FALSE; /*Inidica que hay un error*/
            SET TIPO_ERROR = 4; /*ERROR Tipo 1: Correo ya existente*/
            SET MENSAJE = "Los campos correo, constraseña, nombre y apellido son obligatorios. Asegurese de llenarlos con datos validos.";
    ELSE
			/*Si el valor retornado es TRUE, significa que el coreo aun no ha sido registrado, y se procede con el INSERT*/
            SET VALIDACION_ERROR = TRUE; /*Inidica que NO HAY ERROR*/
            SET TIPO_ERROR = 0; /*ERROR Tipo 0: Correo DISPONIBLE*/
            SET MENSAJE = "Registro exitoso";
            /*EL SGBD se encarga de asignar la fecha en que se realiza el registro*/
            SET FECHA_REGISTRO = CURRENT_TIMESTAMP();
			INSERT INTO USERS (
				EMAIL, 
                USER_PASSWORD,
                FIRST_NAME, 
				LAST_NAME, 
				REGISTRATION_DATE,
                STATUS_ID,
                ROLE_ID
                ) 
					VALUES (
						LOWER(CORREO), 
						CONTRASENA, 
						NOMBRE,
                        APELLIDO,
                        FECHA_REGISTRO,
                        ESTATUS_ID,
                        UPPER(ROL_ID)
                        );
                        
	END IF;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `departamentos`
--

/*!50001 DROP VIEW IF EXISTS `departamentos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `departamentos` AS select `dept`.`DEPARTMENT_ID` AS `DEPARTAMENTO_ID`,`dept`.`DEPARTMENT_NAME` AS `DEPARTAMENTO`,`emp_man`.`EMPLOYEE_ID` AS `GERENTE_ID`,concat_ws(' ',`emp_man`.`FIRST_NAME`,`emp_man`.`LAST_NAME`) AS `GERENTE`,`loc`.`LOCATION_ID` AS `LOCACION_ID`,concat_ws(' ',`loc`.`STREET_ADDRESS`,('CP ' + `loc`.`POSTAL_CODE`),`loc`.`CITY`,', ',`loc`.`STATE_PROVINCE`,', ',`cot`.`COUNTRY_NAME`,', ',`reg`.`REGION_NAME`) AS `DIRECCION` from ((((`departments` `dept` join `employees` `emp_man` on((`dept`.`MANAGER_ID` = `emp_man`.`EMPLOYEE_ID`))) join `locations` `loc` on((`dept`.`LOCATION_ID` = `loc`.`LOCATION_ID`))) join `countries` `cot` on((`loc`.`COUNTRY_ID` = `cot`.`COUNTRY_ID`))) join `regions` `reg` on((`cot`.`REGION_ID` = `reg`.`REGION_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `departamentos_resumen`
--

/*!50001 DROP VIEW IF EXISTS `departamentos_resumen`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `departamentos_resumen` AS select `dept`.`DEPARTMENT_ID` AS `DEPARTAMENTO_ID`,`dept`.`DEPARTMENT_NAME` AS `DEPARTAMENTO`,concat_ws(' ',`emp_man`.`FIRST_NAME`,`emp_man`.`LAST_NAME`) AS `GERENTE`,concat_ws(' ',`loc`.`STREET_ADDRESS`,('CP ' + `loc`.`POSTAL_CODE`),`loc`.`CITY`,', ',`loc`.`STATE_PROVINCE`,', ',`cot`.`COUNTRY_NAME`,', ',`reg`.`REGION_NAME`) AS `DIRECCION` from ((((`departments` `dept` join `employees` `emp_man` on((`dept`.`MANAGER_ID` = `emp_man`.`EMPLOYEE_ID`))) join `locations` `loc` on((`dept`.`LOCATION_ID` = `loc`.`LOCATION_ID`))) join `countries` `cot` on((`loc`.`COUNTRY_ID` = `cot`.`COUNTRY_ID`))) join `regions` `reg` on((`cot`.`REGION_ID` = `reg`.`REGION_ID`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `empleados_resumen`
--

/*!50001 DROP VIEW IF EXISTS `empleados_resumen`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `empleados_resumen` AS select `emp`.`EMPLOYEE_ID` AS `EMPLEADO_ID`,concat_ws(' ',`emp`.`FIRST_NAME`,`emp`.`LAST_NAME`) AS `NOMBRE`,`emp`.`EMAIL` AS `CORREO`,`emp`.`PHONE_NUMBER` AS `TELEFONO`,`emp`.`HIRE_DATE` AS `FECHA_CONTRATACION`,`job`.`JOB_TITLE` AS `PUESTO_TRABAJO`,`emp`.`SALARY` AS `SUELDO`,`emp`.`COMMISSION_PCT` AS `COMISION`,concat_ws(' ',`emp_man`.`FIRST_NAME`,`emp_man`.`LAST_NAME`) AS `GERENTE`,`dept`.`DEPARTMENT_NAME` AS `DEPARTAMENTO` from (((`employees` `emp` join `jobs` `job` on((`emp`.`JOB_ID` = `job`.`JOB_ID`))) join `departments` `dept` on((`emp`.`DEPARTMENT_ID` = `dept`.`DEPARTMENT_ID`))) join `employees` `emp_man` on((`emp`.`MANAGER_ID` = `emp_man`.`EMPLOYEE_ID`))) order by `emp`.`HIRE_DATE` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `empleados_resumen_minima`
--

/*!50001 DROP VIEW IF EXISTS `empleados_resumen_minima`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `empleados_resumen_minima` AS select `emp`.`EMPLOYEE_ID` AS `EMPLEADO_ID`,concat_ws(' ',`emp`.`FIRST_NAME`,`emp`.`LAST_NAME`) AS `NOMBRE`,`job`.`JOB_TITLE` AS `PUESTO_TRABAJO`,`emp`.`EMAIL` AS `CORREO`,concat_ws(' ',`emp_man`.`FIRST_NAME`,`emp_man`.`LAST_NAME`) AS `GERENTE`,`dept`.`DEPARTMENT_NAME` AS `DEPARTAMENTO` from (((`employees` `emp` join `jobs` `job` on((`emp`.`JOB_ID` = `job`.`JOB_ID`))) join `departments` `dept` on((`emp`.`DEPARTMENT_ID` = `dept`.`DEPARTMENT_ID`))) left join `employees` `emp_man` on((`emp`.`MANAGER_ID` = `emp_man`.`EMPLOYEE_ID`))) order by `emp`.`HIRE_DATE` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `historico_resumen`
--

/*!50001 DROP VIEW IF EXISTS `historico_resumen`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `historico_resumen` AS select `jh`.`EMPLOYEE_ID` AS `EMPLEADO_ID`,concat_ws(' ',`emp`.`FIRST_NAME`,`emp`.`LAST_NAME`) AS `NOMBRE`,`jh`.`START_DATE` AS `FECHA_INICIO`,`jh`.`END_DATE` AS `FECHA_FIN`,`job`.`JOB_TITLE` AS `TRABAJO`,`dept`.`DEPARTMENT_NAME` AS `DEPARTAMENTO` from (((`job_history` `jh` join `employees` `emp` on((`jh`.`EMPLOYEE_ID` = `emp`.`EMPLOYEE_ID`))) join `jobs` `job` on((`jh`.`JOB_ID` = `job`.`JOB_ID`))) join `departments` `dept` on((`jh`.`DEPARTMENT_ID` = `dept`.`DEPARTMENT_ID`))) order by `jh`.`END_DATE` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `lista_departamentos`
--

/*!50001 DROP VIEW IF EXISTS `lista_departamentos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `lista_departamentos` AS select `dept`.`DEPARTMENT_ID` AS `DEPARTAMENTO_ID`,`dept`.`DEPARTMENT_NAME` AS `DEPARTAMENTO` from `departments` `dept` order by `dept`.`DEPARTMENT_NAME` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `lista_gerentes`
--

/*!50001 DROP VIEW IF EXISTS `lista_gerentes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `lista_gerentes` AS select `emp`.`EMPLOYEE_ID` AS `GERENTE_ID`,concat_ws(' ',`emp`.`FIRST_NAME`,`emp`.`LAST_NAME`) AS `GERENTE`,`dept`.`DEPARTMENT_NAME` AS `DEPARTAMENTO` from (`employees` `emp` left join `departments` `dept` on((`emp`.`EMPLOYEE_ID` = `dept`.`MANAGER_ID`))) order by (`dept`.`DEPARTMENT_NAME` is null),`dept`.`DEPARTMENT_NAME` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `lista_locaciones`
--

/*!50001 DROP VIEW IF EXISTS `lista_locaciones`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `lista_locaciones` AS select `loc`.`LOCATION_ID` AS `LOCACION_ID`,concat_ws(' ',`loc`.`POSTAL_CODE`,`loc`.`CITY`,', ',`loc`.`STATE_PROVINCE`,',',`loc`.`COUNTRY_ID`) AS `LOCACION_DIRECCION` from `locations` `loc` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `lista_paises`
--

/*!50001 DROP VIEW IF EXISTS `lista_paises`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `lista_paises` AS select `cou`.`COUNTRY_ID` AS `PAIS_ID`,`cou`.`COUNTRY_NAME` AS `PAIS`,`cou`.`REGION_ID` AS `REGION_ID` from `countries` `cou` order by `cou`.`COUNTRY_NAME` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `locaciones_resumen`
--

/*!50001 DROP VIEW IF EXISTS `locaciones_resumen`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `locaciones_resumen` AS select `loc`.`LOCATION_ID` AS `LOCACION_ID`,`loc`.`STREET_ADDRESS` AS `DIRECCION`,`loc`.`POSTAL_CODE` AS `CODIGO_POSTAL`,`loc`.`CITY` AS `CIUDAD`,`loc`.`STATE_PROVINCE` AS `ESTADO_PROVINCIA`,`cou`.`COUNTRY_NAME` AS `PAIS` from (`locations` `loc` join `countries` `cou` on((`loc`.`COUNTRY_ID` = `cou`.`COUNTRY_ID`))) order by `cou`.`COUNTRY_NAME`,`loc`.`STATE_PROVINCE`,`loc`.`CITY` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `paises_resumen`
--

/*!50001 DROP VIEW IF EXISTS `paises_resumen`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `paises_resumen` AS select `cou`.`COUNTRY_ID` AS `PAIS_ID`,`cou`.`COUNTRY_NAME` AS `PAIS`,`reg`.`REGION_NAME` AS `REGION` from (`countries` `cou` join `regions` `reg` on((`cou`.`REGION_ID` = `reg`.`REGION_ID`))) order by `reg`.`REGION_NAME`,`cou`.`COUNTRY_NAME` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `resumen_empleado`
--

/*!50001 DROP VIEW IF EXISTS `resumen_empleado`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `resumen_empleado` AS select `emp`.`EMPLOYEE_ID` AS `EMPLEADO_ID`,concat_ws(' ',`emp`.`FIRST_NAME`,`emp`.`LAST_NAME`) AS `NOMBRE`,`dept`.`DEPARTMENT_NAME` AS `DEPARTAMENTO`,`job`.`JOB_TITLE` AS `PUESTO_TRABAJO` from ((`employees` `emp` join `jobs` `job` on((`emp`.`JOB_ID` = `job`.`JOB_ID`))) join `departments` `dept` on((`emp`.`DEPARTMENT_ID` = `dept`.`DEPARTMENT_ID`))) order by `dept`.`DEPARTMENT_NAME`,`job`.`JOB_TITLE` desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `trabajos`
--

/*!50001 DROP VIEW IF EXISTS `trabajos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `trabajos` AS select `job`.`JOB_ID` AS `TRABAJO_ID`,`job`.`JOB_TITLE` AS `PUESTO_TRABAJO`,`job`.`MIN_SALARY` AS `SUELDO_MINIMO`,`job`.`MAX_SALARY` AS `SUELDO_MAXIMO` from `jobs` `job` order by `job`.`JOB_TITLE` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `trabajos_resumen`
--

/*!50001 DROP VIEW IF EXISTS `trabajos_resumen`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `trabajos_resumen` AS select `job`.`JOB_ID` AS `TRABAJO_ID`,`job`.`JOB_TITLE` AS `PUESTO_TRABAJO` from `jobs` `job` order by `job`.`JOB_TITLE` */;
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

-- Dump completed on 2025-02-05 20:01:28
