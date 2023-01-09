
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cards` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_id` int unsigned NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `cards` WRITE;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` VALUES (1,'The basic','The other',4,'2023-01-09 01:10:41','2023-01-06 21:04:06','2023-01-09 01:10:41'),(2,'The new ','The simple',3,'2023-01-09 00:27:05','2023-01-06 21:04:06','2023-01-09 00:27:05'),(3,'Review the garbage data','Make sure i review the garbage data',3,NULL,'2023-01-06 21:27:25','2023-01-09 01:08:45'),(4,'My fourth message updated','The best description ever and ever',3,NULL,'2023-01-06 21:31:56','2023-01-08 22:31:21'),(5,'Review the messages','My best description ever',2,'2023-01-06 21:35:17','2023-01-06 21:35:12','2023-01-06 21:35:17'),(6,'New card','The best is coming',2,'2023-01-09 01:12:38','2023-01-09 00:55:43','2023-01-09 01:12:38'),(7,'The next one up again and over','The next is up again',1,NULL,'2023-01-09 00:55:54','2023-01-09 03:23:21'),(8,'sdsds','sdsdsd',2,NULL,'2023-01-09 00:56:14','2023-01-09 00:56:59'),(9,'sdsdsd','dsdsdsdsdssds',1,'2023-01-09 03:25:15','2023-01-09 00:56:19','2023-01-09 03:25:15'),(10,'sdsdsds','dsdsdsdsd',2,NULL,'2023-01-09 00:56:24','2023-01-09 00:57:01'),(11,'sdsdsd','dsdsdsdsd',2,NULL,'2023-01-09 00:56:29','2023-01-09 00:57:12'),(12,'dsds','dsdsdsds',2,NULL,'2023-01-09 00:56:34','2023-01-09 00:57:05'),(13,'dsdsdsd','sddsdsdsd',2,NULL,'2023-01-09 00:56:38','2023-01-09 00:57:06'),(14,'dsdsd','dsdsdsdsd',2,'2023-01-09 03:25:10','2023-01-09 00:56:43','2023-01-09 03:25:10'),(15,'dsdsdsd','sdsdsdsdsdsd',2,'2023-01-09 03:25:03','2023-01-09 00:56:49','2023-01-09 03:25:03'),(16,'A rubish over','a rubish card here',1,NULL,'2023-01-09 03:24:19','2023-01-09 03:24:32'),(17,'DOing doers','A new way to get it',2,NULL,'2023-01-09 03:24:50','2023-01-09 03:24:50');
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

