/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS speedtest;

CREATE USER IF NOT EXISTS 'speedtest'@'localhost' IDENTIFIED BY 'Aireel1shib8GeiX';
CREATE USER IF NOT EXISTS 'speedreport'@'localhost' IDENTIFIED BY 'Ahsoo3feeshaeyae';
CREATE USER IF NOT EXISTS 'speedviewer'@'localhost' IDENTIFIED BY 'Ahsoo3feeshaeyae';

GRANT ALL PRIVILEGES ON speedtest.* TO 'speedtest'@'localhost' ;
GRANT INSERT ON speedtest.* TO 'speedreport'@'localhost' ;
GRANT SELECT ON speedtest.* TO 'speedviewer'@'localhost' ;
FLUSH PRIVILEGES;

USE speedtest;

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;

CREATE TABLE `reports` (
/* 1 */  id mediumint(9) NOT NULL AUTO_INCREMENT, 
/* 2 */  serverID INT,
/* 3 */  sponsor VARCHAR(64),
/* 4 */  server VARCHAR(64),
/* 5 */  start datetime,
/* 6 */  distance double,
/* 7 */  ping double,
/* 8 */  download double,
/* 9 */  upload double,
/* 10 */  shareurl VARCHAR(64),
/* 11 */  ip VARCHAR(39),
  PRIMARY KEY (`id`),
  KEY `start` (`start`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

/*!40101 SET character_set_client = @saved_cs_client */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

