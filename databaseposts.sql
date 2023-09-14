CREATE DATABASE  IF NOT EXISTS `book` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `book`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: book
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `follows`
--

DROP TABLE IF EXISTS `follows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `follows` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `follow_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `follows_user_id_foreign` (`user_id`),
  CONSTRAINT `follows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `follows`
--

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;
INSERT INTO `follows` VALUES (16,2,3,'2023-07-31 04:41:11','2023-07-31 04:41:11'),(24,2,4,'2023-07-31 15:22:02','2023-07-31 15:22:02'),(26,4,3,'2023-08-08 07:36:50','2023-08-08 07:36:50'),(44,3,2,'2023-08-15 03:44:33','2023-08-15 03:44:33');
/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (12,'2014_10_12_000000_create_users_table',1),(13,'2014_10_12_100000_create_password_reset_tokens_table',1),(14,'2014_10_12_100000_create_password_resets_table',1),(15,'2019_08_19_000000_create_failed_jobs_table',1),(16,'2019_12_14_000001_create_personal_access_tokens_table',1),(17,'2023_07_17_042628_create_posts_table',1),(19,'2023_07_21_022842_create_posts_table',2),(20,'2023_07_21_023218_create_user_posts_table',3),(21,'2023_07_24_064208_create_user_posts_table',4),(22,'2023_07_24_081558_create_user_posts_table',5),(23,'2023_07_24_085103_create_test_posts_table',6),(24,'2023_07_28_085252_create_follows_table',7),(25,'2023_08_02_095050_create_notifications_table',8),(26,'2023_08_02_111603_create_notifications_table',9),(27,'2023_08_03_104601_create_notifications_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `follow_id` int NOT NULL,
  `post_id` int unsigned NOT NULL,
  `read` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_user_id_foreign` (`user_id`),
  KEY `notifications_post_id_foreign` (`post_id`),
  CONSTRAINT `notifications_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES (7,2,3,23,1,'2023-08-11 04:17:02','2023-08-11 04:17:18'),(8,2,4,23,0,'2023-08-11 04:17:02','2023-08-11 04:17:02'),(9,3,2,24,1,'2023-08-15 03:47:32','2023-08-15 03:47:40');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('admin@gmail.com','$2y$10$InV.dDKN5h51JAJaZOD76ODdYNbvPr86k1M5PCq6V0zTtbNYeeJgK','2023-07-17 20:18:44');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` VALUES ('phuongptit2405@gmail.com','YcJzAJPoL6qcaOhSSbXK639ZyflSiM7uJKWtZzqqy540mSDMsTiwwbQqksMfchIE','2023-07-27 09:53:02'),('phuongptit2405@gmail.com','1tXJHrJjPrOk7JtinQbr3854MAdgzFebcHjyQZjI02rmy8pOO40yd0ZDiZqx0Owx','2023-07-27 09:57:58'),('phuongptit2405@gmail.com','WRuXvQZuZL6YnBezspGp8H4xKTDggtwQ9ei8ST7Sq2ZwGIok4caacqjtIMdYNeoA','2023-07-27 09:59:23'),('phuongptit2405@gmail.com','GZtPym41ZEJVUQMJm780Q2Ah3bAivO5rjTJblM2U3S5iaSCtVuBv5byfuvQnjHjd','2023-07-27 10:00:06'),('phuongptit2405@gmail.com','Nlmy3hpHP6dYwrXhOerp0wP0nLKki3kAeW5wByRb6hnkysdRD3XvDxgCGeP5tlHd','2023-07-27 10:02:44'),('phuongptit2405@gmail.com','k4NPtp9U6CntLj1U6Y9af8Ip8jXDu9RcY8HZMX7RkE1nKXjomSjfAcs28JhLda2e','2023-07-27 10:03:23'),('phuongptit2405@gmail.com','CLxBF2uSlKkJbnzZpRVPbpI4dfDPv3TgrK8UUxKEIkuTyVHcqzKvvLwENSzqGvRf','2023-07-27 10:08:40'),('phuongptit2405@gmail.com','LuvLUN7lOWyuTsOrWV7mNr8j615yWewf8cydZjahYKrk7P3K61ozqEUG4tX5KEN5','2023-07-27 10:32:24'),('phuongptit2405@gmail.com','rfYpfO4Ij3KUYEzsRW75CDbFbKXGqKjPU1ekejk9MTZXThi07c7TaAPZJwdcZBGP','2023-07-27 10:33:15'),('phuongptit2405@gmail.com','x8esobO5S5JNK0EFitH5dKPc7BnmOZz7L9dARdqSrabMO5i0on1EBM6Ew3lJ5mv9','2023-07-27 10:33:24'),('phuongptit2405@gmail.com','r5S9GfLJUQqFQDkzvWSmrdr5Dxg8fjC0dcqrrKLxNXosZ6Dkh8DLiOXaKbCsfixu','2023-07-27 10:33:35');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'Bleach','Ichigo Kurosaki có khả năng nhìn thấy những hồn ma','bleach.jpg','Khi chiến đấu với một yêu quái chuyên đi săn những người có năng lực tâm linh, Rukia đã cho Ichigo mượn sức mạnh của mình để cậu có thể cứu gia đình mình.',1,'2023-07-20 19:50:37','2023-08-15 02:37:42'),(2,1,'Thời tiết','content2','sanpham2.jpg','desc2',0,'2023-07-20 19:56:43','2023-07-20 19:56:43'),(3,2,'Jujutsu Kaisen','Trong một thế giới nơi những con quỷ ăn thịt người không nghi ngờ gì','jujutsu_kaisen.jpg','các Jujutsu tồn tại để bảo vệ sự tồn tại bấp bênh của con người khỏi các con quỷ đáng sợ.',1,'2023-07-20 20:33:16','2023-08-15 02:52:33'),(6,2,'Naruto','hồ ly 9 đuôi tấn công làng ninja Mộc Diệp, Hokage Đệ Tứ đã đánh bại và phong ấn vào cậu bé Naruto','naruto.jpg','Từ đó, Naruto bị mọi người xa lánh, vậy nên cậu phá phách và nghịch ngợm để được thừa nhận và chú ý duy nhất. Hai người bạn đồng hành cùng là Uchiha Sasuke và Haruno Sakura, cuộc phiêu lưu bắt đầu.',1,'2023-07-23 23:00:06','2023-08-15 03:03:07'),(7,2,'user 6','content 6','sanpham6.jpg','desc 6',2,'2023-07-23 23:00:30','2023-07-23 23:02:35'),(8,3,'user2 đăng bài','content của user 2','helloAdmin.png','desc của user 2',0,'2023-07-31 16:15:52','2023-07-31 16:15:52'),(9,4,'user4 đăng bài','content của user4','appstore.jpg','desc của user 4',0,'2023-08-02 03:02:33','2023-08-02 03:02:33'),(10,3,'user2 đăng bài2','content2 của user2','logo.png','desc2 của user2',0,'2023-08-02 04:06:27','2023-08-02 04:06:27'),(15,4,'user4 đăng bài2','content2 của user4','bank.jpg','desc2 của user4',0,'2023-08-03 04:47:20','2023-08-03 04:47:20'),(16,4,'user4 đăng bài3','content3 của user4','googleplay.png','desc3 của user4',0,'2023-08-03 04:48:15','2023-08-03 04:48:15'),(17,4,'user4 đăng bài4','content4 của user4','momo.jpg','desc4 của user4',0,'2023-08-03 04:54:41','2023-08-03 04:54:41'),(19,1,'admin đăng bài2','content2 của admin','sanpham8.jpg','desc2 của admin',0,'2023-08-06 07:37:30','2023-08-06 07:37:30'),(20,1,'admin đăng bài3','content3 của admin','Slider1.jpg','desc3 của admin',0,'2023-08-06 07:51:00','2023-08-06 07:51:00'),(21,1,'admin đăng bài4','content4 của admin','Slider2.jpg','desc4 của admin',0,'2023-08-06 09:12:56','2023-08-06 09:12:56'),(22,4,'one piece','One Piece là chuyện về cậu bé Monkey D. Luffy do ăn nhầm Trái Ác Quỷ','one_piece.jpg','Trong cuộc phiêu lưu tìm kiếm One Piece, băng Hải tặc mũ rơm phải chiến đấu với nhiều băng hải tặc xấu khác cũng muốn độc chiếm One Piece và Hải quân của Chính phủ muốn diệt trừ hải tặc.',1,'2023-08-08 08:43:36','2023-08-15 02:48:16'),(23,2,'ĐẶNG MINH PHƯƠNG đăng bài','ĐẶNG MINH PHƯƠNG content','Slider4.jpg','ĐẶNG MINH PHƯƠNG desc',0,'2023-08-11 04:17:02','2023-08-11 04:17:02'),(24,3,'Dragon Ball','Câu chuyện bắt đầu với SonGoku, một cậu bé có đuôi sống với ông nội trong một ngôi nhà nhỏ trong rừng.','dragon_ball.jpg','Ở đây cậu bé gặp Bulma và lên đường tìm 7 viên ngọc rồng. Bảy viên ngọc rồng chứa đựng một bí mật có thể triệu hồi Long thần và ban điều ước cho ai sở hữu chúng.',0,'2023-08-15 03:47:32','2023-08-15 03:47:32');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_posts`
--

DROP TABLE IF EXISTS `user_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `post_id` int unsigned NOT NULL,
  `type` int NOT NULL,
  `cmt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_posts_user_id_foreign` (`user_id`),
  KEY `user_posts_post_id_foreign` (`post_id`),
  CONSTRAINT `user_posts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  CONSTRAINT `user_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_posts`
--

LOCK TABLES `user_posts` WRITE;
/*!40000 ALTER TABLE `user_posts` DISABLE KEYS */;
INSERT INTO `user_posts` VALUES (4,2,3,1,'xyz','2023-07-24 02:24:31','2023-07-24 02:24:31'),(5,2,3,1,'xyz 2','2023-07-24 02:33:44','2023-07-24 02:33:44'),(6,3,3,1,'vvv','2023-07-24 04:19:57','2023-07-24 04:19:57'),(7,3,3,1,'vvv','2023-07-24 04:26:01','2023-07-24 04:26:01'),(8,3,3,1,'vvv','2023-07-24 04:26:08','2023-07-24 04:26:08'),(9,3,6,1,'hahaha','2023-07-24 04:39:15','2023-07-24 04:39:15'),(11,4,3,1,'hehehe','2023-07-24 20:00:38','2023-07-24 20:00:38'),(19,4,3,0,NULL,'2023-07-28 03:14:44','2023-07-28 03:14:44'),(20,4,3,2,NULL,'2023-07-28 03:29:08','2023-07-28 03:29:08'),(28,2,1,1,'def','2023-07-31 03:52:36','2023-07-31 03:52:36'),(37,2,1,0,NULL,'2023-07-31 04:12:41','2023-07-31 04:12:41'),(41,3,3,0,NULL,'2023-08-08 10:12:40','2023-08-08 10:12:40'),(42,4,1,0,NULL,'2023-08-08 10:22:58','2023-08-08 10:22:58');
/*!40000 ALTER TABLE `user_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'US',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com','$2y$10$nq0I4ZlmofuilVBCdsnCUu/YqlQxYOFiRC51R7A/PJGhopntaTOpy','AD',NULL,'2023-07-17 20:13:12','2023-07-17 20:13:12'),(2,'ĐẶNG MINH PHƯƠNG','phuongptit2405@gmail.com','$2y$10$tGgz8/cV1mVZljjhGvl5eedyAmGb/zl8KkXAb.1ZgPbIn55iaxv.W','US',NULL,'2023-07-17 20:19:14','2023-07-27 11:30:26'),(3,'user2','user2@gmail.com','$2y$10$s4yOyyGFxPoMhnVdLK.CnuI7KFOiQJvRi8H5ia2lvDwEwy.sP6bS6','US',NULL,'2023-07-23 20:51:48','2023-07-23 20:51:48'),(4,'user4','user3@gmail.com','$2y$10$lS4Unp1ZIN0GpxDL.dGRIulok.Oh6XH1bQCl/3neTcl8Wgvcnx81e','US',NULL,'2023-07-23 21:52:59','2023-07-28 03:54:34'),(5,'user5','user5@gmail.com','$2y$10$eNKRSpPjI3iaCwpGT42.4eHDlsLhctPE3SBm3WONH9gG2/xO3Oxzy','US',NULL,'2023-08-11 02:03:42','2023-08-11 02:03:42');
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

-- Dump completed on 2023-08-16 10:47:04
