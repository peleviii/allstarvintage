-- MySQL dump 10.13  Distrib 8.0.45, for Linux (x86_64)
--
-- Host: localhost    Database: allstarvintage
-- ------------------------------------------------------
-- Server version	8.0.45

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

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `game_matches`
--

DROP TABLE IF EXISTS `game_matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `game_matches` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_home_id` bigint unsigned DEFAULT NULL,
  `team_away_id` bigint unsigned DEFAULT NULL,
  `sets_home` int DEFAULT NULL,
  `sets_away` int DEFAULT NULL,
  `day` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `match_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `match_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `round` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'group',
  `played` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `game_matches_team_home_id_foreign` (`team_home_id`),
  KEY `game_matches_team_away_id_foreign` (`team_away_id`),
  CONSTRAINT `game_matches_team_away_id_foreign` FOREIGN KEY (`team_away_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `game_matches_team_home_id_foreign` FOREIGN KEY (`team_home_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_matches`
--

LOCK TABLES `game_matches` WRITE;
/*!40000 ALTER TABLE `game_matches` DISABLE KEYS */;
INSERT INTO `game_matches` VALUES (1,NULL,NULL,NULL,NULL,'1','18:00','Αγώνας 1 — Όμιλος Α','group',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(2,NULL,NULL,NULL,NULL,'1','19:15','Αγώνας 2 — Όμιλος Β','group',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(3,NULL,NULL,NULL,NULL,'1','20:30','Αγώνας 3 — Όμιλος Γ','group',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(4,NULL,NULL,NULL,NULL,'1','21:45','Αγώνας 4 — Όμιλος Δ','group',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(5,NULL,NULL,NULL,NULL,'2','09:00','Αγώνας 5 — Όμιλος Α','group',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(6,NULL,NULL,NULL,NULL,'2','10:15','Αγώνας 6 — Όμιλος Β','group',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(7,NULL,NULL,NULL,NULL,'2','11:30','Αγώνας 7 — Όμιλος Γ','group',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(8,NULL,NULL,NULL,NULL,'2','12:45','Αγώνας 8 — Όμιλος Δ','group',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(9,NULL,NULL,NULL,NULL,'2','13:00','Αγώνας 9 — Όμιλος Α','group',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(10,NULL,NULL,NULL,NULL,'2','14:15','Αγώνας 10 — Όμιλος Β','group',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(11,NULL,NULL,NULL,NULL,'2','15:30','Αγώνας 11 — Όμιλος Γ','group',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(12,NULL,NULL,NULL,NULL,'2','16:45','Αγώνας 12 — Όμιλος Δ','group',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(13,NULL,NULL,NULL,NULL,'2','18:00','Προημιτελικός 1','quarterfinal',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(14,NULL,NULL,NULL,NULL,'2','19:15','Προημιτελικός 2','quarterfinal',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(15,NULL,NULL,NULL,NULL,'2','20:30','Προημιτελικός 3','quarterfinal',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(16,NULL,NULL,NULL,NULL,'2','21:45','Προημιτελικός 4','quarterfinal',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(17,NULL,NULL,NULL,NULL,'3','09:00','Κατάταξη 7η-8η','seventh_place',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(18,NULL,NULL,NULL,NULL,'3','10:15','Κατάταξη 5η-6η','fifth_place',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(19,NULL,NULL,NULL,NULL,'3','11:30','Τουρνουά Ακαδημιών','event',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(20,NULL,NULL,NULL,NULL,'3','12:45','Ημιτελικός 1','semifinal',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(21,NULL,NULL,NULL,NULL,'3','14:00','Ημιτελικός 2','semifinal',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(22,NULL,NULL,NULL,NULL,'3','16:45','Μικρός Τελικός (3η-4η)','third_place',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(23,NULL,NULL,NULL,NULL,'3','18:15','Αγώνας Επιλέκτων','event',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(24,NULL,NULL,NULL,NULL,'3','18:50','Music Show 🎵','event',0,'2026-04-18 00:32:56','2026-04-18 00:32:56'),(25,NULL,NULL,NULL,NULL,'3','19:30','Μεγάλος Τελικός 🏆','final',0,'2026-04-18 00:32:56','2026-04-18 00:32:56');
/*!40000 ALTER TABLE `game_matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_04_14_094709_create_teams_table',1),(5,'2026_04_14_094710_create_players_table',1),(6,'2026_04_14_094711_create_game_matches_table',1),(7,'2026_04_14_102823_add_round_to_game_matches_table',1),(8,'2026_04_17_092630_add_photo_to_teams_table',1),(9,'2026_04_17_100831_update_round_enum_in_game_matches_table',1),(10,'2026_04_17_100919_add_time_to_game_matches_table',1),(11,'2026_04_17_121516_make_team_ids_nullable_in_game_matches',1),(12,'2026_04_17_150148_make_group_nullable_in_teams_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
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
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `players` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `team_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` int NOT NULL,
  `gender` enum('Α','Γ') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `players_team_id_foreign` (`team_id`),
  CONSTRAINT `players_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` VALUES (1,1,'Μαργαρίτης Γιάννης',2,'Α','2026-04-28 13:17:25','2026-04-28 13:17:25'),(3,1,'Βεργιαννάκης Γιάννης',7,'Α','2026-04-28 13:18:06','2026-04-28 13:18:06'),(4,1,'Κολιαβασίλη Κασσάνδρα',10,'Γ','2026-04-28 13:18:27','2026-04-28 13:18:27'),(5,1,'Ταμπουρατζής Νίκος',23,'Α','2026-04-28 13:18:44','2026-04-28 13:18:44'),(6,1,'Καραγιώργος Δημήτρης',14,'Α','2026-04-28 13:19:01','2026-04-28 13:19:01'),(7,1,'Πολίτο Φλώρα',19,'Γ','2026-04-28 13:19:18','2026-04-28 13:19:18'),(8,1,'Ρούβας Νίκος',46,'Α','2026-04-28 13:19:35','2026-04-28 13:19:35'),(9,1,'Κούρος Ηλίας',11,'Α','2026-04-28 13:19:48','2026-04-28 13:19:48'),(10,1,'Σακελλαρίου Δημήτρης',12,'Α','2026-04-28 13:20:06','2026-04-28 13:20:06'),(11,1,'Προκοπίου Ελεάνα',22,'Γ','2026-04-28 13:20:28','2026-04-28 13:20:28'),(12,1,'Sergio',25,'Α','2026-04-28 13:20:38','2026-04-28 13:20:38'),(13,2,'Πανταζίδης Ανέστης',4,'Α','2026-04-28 13:25:05','2026-04-28 13:25:05'),(16,2,'Σταύρου Μαρία',9,'Γ','2026-04-28 13:26:19','2026-04-28 13:26:19'),(17,2,'Ασίκης Αθανάσιος',1,'Α','2026-04-28 13:26:35','2026-04-28 13:26:35'),(18,2,'Μπούκης Χριστόδουλος',67,'Α','2026-04-28 13:26:53','2026-04-28 13:26:53'),(19,2,'Καρναμπάκος Γιώργος',15,'Α','2026-04-28 13:27:09','2026-04-28 13:27:09'),(20,2,'Τσιούμας Δημήτρης',18,'Α','2026-04-28 13:27:33','2026-04-28 13:27:33'),(21,2,'Γεωργοσόπουλος Νίκος',21,'Α','2026-04-28 13:28:18','2026-04-28 13:28:18'),(22,2,'Τζούλας Παναγιώτης',77,'Α','2026-04-28 13:28:39','2026-04-28 13:28:39'),(24,2,'Δανέζης Γιάννης',13,'Α','2026-04-28 13:29:30','2026-04-28 13:29:30'),(25,2,'Κολιαβασίλη Μαρία',6,'Γ','2026-04-28 13:36:15','2026-04-28 13:36:15'),(26,2,'Κολιαβασίλη Σοφία',8,'Γ','2026-04-28 13:36:34','2026-04-28 13:36:34'),(28,1,'Λυμπεροπούλου Έφη',3,'Γ','2026-04-30 11:21:03','2026-04-30 11:21:03'),(29,4,'Βαλογιάννη Ήλια',1,'Γ','2026-04-30 13:08:17','2026-04-30 13:08:17'),(30,4,'Μπούζα Μπριτζίλντα',12,'Γ','2026-04-30 13:48:02','2026-04-30 13:49:06'),(32,4,'Οικονόμου Παρασκευή',10,'Γ','2026-04-30 13:49:35','2026-04-30 13:49:35'),(33,4,'Μήτσα Βασιλική',9,'Γ','2026-04-30 13:50:03','2026-04-30 13:50:03'),(35,4,'Χατζηαντωνίου Βασίλης',7,'Α','2026-04-30 13:51:21','2026-04-30 13:51:21'),(36,4,'Λίτσας Βάσης',8,'Α','2026-04-30 13:51:39','2026-04-30 13:51:39'),(37,4,'Βόντας Σεβαστιανός',24,'Α','2026-04-30 13:51:58','2026-04-30 13:51:58'),(38,4,'Δημητριάδης Στέφανος',23,'Α','2026-04-30 13:52:20','2026-04-30 13:52:20'),(39,4,'Τσάιμος Ελευθέριος',4,'Α','2026-04-30 13:52:36','2026-04-30 13:52:36'),(40,4,'Κολιάκης Ελευθέριος',18,'Α','2026-04-30 13:52:56','2026-04-30 13:52:56'),(41,4,'Σιούντας Περικλής',52,'Α','2026-04-30 13:53:12','2026-04-30 13:53:12'),(42,3,'Αλεξανδροπούλου Παυλίνα',2,'Γ','2026-05-01 06:35:20','2026-05-01 06:35:20'),(43,3,'Γκιζώρη Κωνσταντίνα',4,'Γ','2026-05-01 06:35:40','2026-05-01 06:35:40'),(44,3,'Πρέκα Ιωάννα',7,'Γ','2026-05-01 06:35:57','2026-05-01 06:35:57'),(45,3,'Καραβαράκης Στράτος',8,'Α','2026-05-01 06:36:15','2026-05-01 06:36:15'),(46,3,'Κωστόπουλος Μιχάλης',9,'Α','2026-05-01 06:36:31','2026-05-01 06:36:31'),(47,3,'Παπαδόπουλος Δηµήτρης',10,'Α','2026-05-01 06:36:48','2026-05-01 06:36:48'),(48,3,'Μαστρογιάννης Γιώργος',11,'Α','2026-05-01 06:37:00','2026-05-01 06:37:00'),(49,3,'Χριστοφίλη Ελένη',13,'Γ','2026-05-01 06:37:23','2026-05-01 06:37:23'),(50,3,'Βασιλόπουλος Στέφανος',15,'Α','2026-05-01 06:37:47','2026-05-01 06:37:47'),(51,3,'Νίκος Τηλιγάδας',16,'Α','2026-05-01 06:38:03','2026-05-01 06:38:03'),(52,3,'Βένιος Αλέξανδρος Ιωάννης',17,'Α','2026-05-01 06:38:29','2026-05-01 06:38:29'),(53,3,'Μπισµπίκη Αθηνά',19,'Γ','2026-05-01 06:38:59','2026-05-01 06:38:59'),(54,3,'Μητσόπουλος Αναστάσης',24,'Α','2026-05-01 06:39:51','2026-05-01 06:39:51'),(55,3,'Μάρκου Μαρία',28,'Γ','2026-05-01 06:40:15','2026-05-01 06:40:15'),(56,1,'Μεθενίτη Πηγή Άννα',94,'Γ','2026-05-04 09:35:07','2026-05-04 09:35:07'),(57,5,'ΑΔΑΜΟΠΟΥΛΟΥ ΜΑΡΙΑ',13,'Γ','2026-05-04 11:48:33','2026-05-04 11:50:01'),(58,5,'ΛΟΥΡΩΤΟΥ ΡΕΑ',5,'Γ','2026-05-04 11:49:22','2026-05-04 11:49:47'),(59,5,'ΞΥΔΩΝΑ ΕΣΤΑ',7,'Γ','2026-05-04 11:50:26','2026-05-04 11:50:26'),(60,5,'ΚΟΥΤΣΟΔΟΝΤΗΣ ΝΙΚΟΣ',41,'Α','2026-05-04 11:50:42','2026-05-04 11:50:42'),(61,5,'ΧΑΣΑΠΗ ΛΙΝΑ',36,'Γ','2026-05-04 11:50:57','2026-05-04 11:50:57'),(62,5,'ΜΙΧΑΗΛΑΤΣΟΣ ΘΕΟΔΩΡΟΣ',22,'Α','2026-05-04 11:51:27','2026-05-04 11:51:27'),(63,5,'ΛΥΔΙΟΣ ΒΑΣΙΛΗΣ',99,'Α','2026-05-04 11:52:16','2026-05-04 11:52:16'),(64,5,'ΓΙΑΝΝΟΠΟΥΛΟΣ ΘΕΜΙΣΤΟΚΛΗΣ',10,'Α','2026-05-04 11:52:37','2026-05-04 11:52:37'),(65,5,'ΠΑΝΑΓΟΣ ΒΑΣΙΛΗΣ',21,'Α','2026-05-04 11:52:52','2026-05-04 11:52:52'),(66,5,'ΣΤΑΜΑΤΟΠΟΥΛΟΣ ΣΤΑΥΡΟΣ',11,'Α','2026-05-04 11:53:08','2026-05-04 11:53:08'),(68,5,'ΤΡΥΦΩΝ ΣΠΥΡΟΣ',24,'Α','2026-05-04 11:57:28','2026-05-04 11:57:28'),(69,5,'ΦΩΣΤΗΡΟΠΟΥΛΟΣ ΓΙΑΝΝΗΣ',15,'Α','2026-05-04 11:57:44','2026-05-04 11:57:44'),(70,5,'ΜΗΛΙΑΣ ΓΙΩΡΓΟΣ',9,'Α','2026-05-04 11:58:03','2026-05-04 11:58:03'),(71,6,'Γεωργιάδης  Τόλης',7,'Α','2026-05-05 07:57:34','2026-05-05 07:57:34'),(72,6,'Αντωνάκη Δάφνη',11,'Γ','2026-05-05 07:57:59','2026-05-05 07:57:59'),(73,6,'Γέρμανου Ιωάννα',10,'Γ','2026-05-05 07:58:18','2026-05-05 07:58:18'),(74,6,'Αντωνάκη Κλειώ',3,'Γ','2026-05-05 07:58:46','2026-05-05 07:58:46'),(75,6,'Χατζηνάκος Κώστας',22,'Α','2026-05-05 07:59:00','2026-05-05 07:59:00'),(76,6,'Γιαννέλος Μάριος',9,'Α','2026-05-05 07:59:30','2026-05-05 07:59:30'),(77,6,'Επιτροπάκης Θάνος',13,'Α','2026-05-05 07:59:51','2026-05-05 07:59:51'),(78,6,'Καλύβα Σωτηρία',6,'Γ','2026-05-05 08:00:03','2026-05-05 08:00:03'),(79,6,'Ρηγόπουλος Ρήγας',21,'Α','2026-05-06 12:02:14','2026-05-06 12:02:14'),(80,7,'Μιλένα Ζιβογίνοβιτς',1,'Γ','2026-05-07 08:33:10','2026-05-07 08:33:10'),(81,7,'Τζίνα Δηλέ',4,'Γ','2026-05-07 08:33:21','2026-05-07 08:33:21'),(82,7,'Ντανιέλα Γκίκα',6,'Γ','2026-05-07 08:33:31','2026-05-07 08:33:31'),(83,7,'Κώστας Φλέγκας',10,'Α','2026-05-07 08:33:46','2026-05-07 08:33:46'),(84,7,'Γιώργος Παντελούκας',12,'Α','2026-05-07 08:34:02','2026-05-07 08:34:02'),(85,7,'Πέτρος Σφακιανάκης',13,'Α','2026-05-07 08:34:24','2026-05-07 08:34:24'),(86,7,'Κική Πρέκα',14,'Γ','2026-05-07 08:34:36','2026-05-07 08:34:36'),(87,7,'Πέτρος Μαχαίρας',15,'Α','2026-05-07 08:34:48','2026-05-07 08:34:48'),(88,7,'Βίκυ Ριζάκη',16,'Γ','2026-05-07 08:34:59','2026-05-07 08:34:59'),(89,7,'Ανδρέας Κατσάρας',17,'Α','2026-05-07 08:35:09','2026-05-07 08:35:09'),(90,7,'Γιώργος Λαμπρόπουλος',47,'Α','2026-05-07 08:35:25','2026-05-07 08:35:25'),(91,7,'Μαρία Αραχωβίτη',97,'Γ','2026-05-07 08:35:37','2026-05-07 08:35:37'),(92,7,'Κώστας Μπουρνάζος',99,'Α','2026-05-07 08:35:50','2026-05-07 08:35:50'),(93,8,'Λασκας Αλέξανδρος',1,'Α','2026-05-07 12:48:45','2026-05-07 12:48:45'),(94,8,'Κωνσταντάς Χρυσάφης',2,'Α','2026-05-07 12:48:58','2026-05-07 12:48:58'),(95,8,'Σαρακατσιάνος Δημήτρης',3,'Α','2026-05-07 12:49:07','2026-05-07 12:49:07'),(96,8,'Δημόπουλος Δημήτρης',4,'Α','2026-05-07 12:49:15','2026-05-07 12:49:15'),(97,8,'Πεπόνης Χάρης',5,'Α','2026-05-07 12:49:23','2026-05-07 12:49:23'),(98,8,'Βουζίκη Κατερίνα',6,'Γ','2026-05-07 12:49:32','2026-05-07 12:49:32'),(99,8,'Ευσταθίου Ελένη',7,'Γ','2026-05-07 12:49:56','2026-05-07 12:49:56'),(100,8,'Μηνανάκη Χριστίνα',8,'Γ','2026-05-07 12:50:06','2026-05-07 12:50:06'),(101,8,'Γκαιδατζή Ευρυδίκη',9,'Γ','2026-05-07 12:50:15','2026-05-07 12:50:15'),(102,8,'Καφετζηδάκη Πηνελόπη',10,'Γ','2026-05-07 12:50:27','2026-05-07 12:50:27'),(103,9,'Κωνσταντίνος Κουτσουράδης',13,'Α','2026-05-07 12:59:58','2026-05-07 12:59:58'),(104,9,'Αντώνης Πεκιάς',22,'Α','2026-05-07 13:00:08','2026-05-07 13:00:08'),(105,9,'Νίκος Αγγέλου',7,'Α','2026-05-07 13:00:17','2026-05-07 13:00:17'),(106,9,'Βασίλης Αποστόλου',8,'Α','2026-05-07 13:00:42','2026-05-07 13:00:42'),(107,9,'Παντελής Αλασώνας',6,'Α','2026-05-07 13:01:02','2026-05-07 13:01:02'),(108,9,'Βασιλική Ντακα',10,'Γ','2026-05-07 13:01:15','2026-05-07 13:01:15'),(109,9,'Μαίρη Λάμπρου',26,'Γ','2026-05-07 13:01:29','2026-05-07 13:01:29'),(110,9,'Μαρίζα Μπούρα',14,'Γ','2026-05-07 13:01:45','2026-05-07 13:01:45'),(111,9,'Βάσια Γκίκα',11,'Γ','2026-05-07 13:02:01','2026-05-07 13:02:01'),(112,10,'Αυθίνου Κωνσταντίνα',1,'Γ','2026-05-08 09:56:41','2026-05-08 11:14:14'),(113,10,'Πολύζος Γιώργος',2,'Α','2026-05-08 09:56:58','2026-05-08 09:56:58'),(114,10,'Ξενάριος Γιώργος',3,'Α','2026-05-08 09:57:08','2026-05-08 09:57:08'),(115,10,'Μαρίνης Σωτήρης',4,'Α','2026-05-08 09:57:19','2026-05-12 07:25:53'),(116,10,'Αυθίνου Ελένη',5,'Γ','2026-05-08 09:57:32','2026-05-08 09:57:32'),(117,10,'Σημαιοφορίδης Παναγιώτης',6,'Α','2026-05-08 09:57:44','2026-05-08 09:57:44'),(118,10,'Πνευματικού Ιωάννα',7,'Γ','2026-05-08 09:57:56','2026-05-08 09:57:56'),(120,10,'Ιακωβίδης Γιώργος',9,'Α','2026-05-08 09:58:20','2026-05-08 09:58:20'),(121,10,'Παπαδήμας Παναγιώτης',8,'Α','2026-05-08 10:33:20','2026-05-08 11:14:37'),(122,10,'Ξαγοράρη Ευαγγελία',10,'Γ','2026-05-08 10:33:38','2026-05-08 10:33:38'),(123,2,'Χέλιου Μαρία',5,'Γ','2026-05-09 10:52:32','2026-05-09 10:52:32');
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'Α.Ο. Μαρκόπουλο 2',NULL,'teams/logos/OyWfi0ciXm57Y1dI6b2BsU3aqLU181dYF0T01e4q.png',NULL,'2026-04-28 13:13:53','2026-04-28 13:16:15'),(2,'Α.Ο. Μαρκόπουλο 1',NULL,'teams/logos/AaIh5dL6ACfd9l0gedv8XWKBjSQHUaUyUgCWTAHP.png','teams/photos/YBbYeTolZHfoTb6DK3xvQwB7OwQkiLjUvsr9PPmA.jpg','2026-04-28 13:21:09','2026-05-07 13:10:39'),(3,'Α.Στε.Γοι.',NULL,'teams/logos/6Fcibz9wBL9uCfPRTrEnAIl7u1QZyt83dKhytTvW.png','teams/photos/fTuZKp7A3FFw6hBH8cYgyFU0PvmcsVd0Lg52fFvo.jpg','2026-04-30 11:25:58','2026-04-30 11:27:20'),(4,'Volley Maniacs',NULL,'teams/logos/AtltaKXZydrZUjl3CWXjpDELjVx71QwLYUUwm6NU.png','teams/photos/5ISgBjwdv8jgHOEjnrylDlOnVjzwuJtztpe4TK7l.jpg','2026-04-30 13:07:06','2026-04-30 13:07:44'),(5,'Φαληρέας',NULL,'teams/logos/nK3EWVvFWxFCZZnNTCMTc36oYyF0eKZr9lNjNruT.png','teams/photos/sZFyfMSIZQZw0C5OeSB7ZeJDNXpHIG1oDyPJ2rII.jpg','2026-05-04 11:43:48','2026-05-05 08:14:44'),(6,'Τιτάνες',NULL,'teams/logos/nxOTdcVugG3U1GNglccfFpwhwlEg5lYO6cU2SDkh.png','teams/photos/NIZonv4Wcc7TQipyQE9eS2G6crIzjYtg8Nh7lVTp.jpg','2026-05-05 07:55:36','2026-05-05 07:57:08'),(7,'Α.ΚΕ.Ζωγράφου',NULL,'teams/logos/8R4xP6ESWqgM1Zw0Ho8i27cvBep5KaKAYbmpD6TP.jpg','teams/photos/5FQuKtOKjDZlHW6ORchTGvWhe9FiNYKb9DyCe0B8.jpg','2026-05-07 08:26:34','2026-05-07 08:32:42'),(8,'Ένωση Γαλατσίου',NULL,'teams/logos/MCIUdanlaR1knxOt1b5F0M7uz6lbQI0tr9edwXuZ.png',NULL,'2026-05-07 12:45:54','2026-05-07 12:48:27'),(9,'Sharks',NULL,'teams/logos/0G0PgTNDng3nxLpZTjmnZeuA3TbB0Tr3spvhnEan.jpg',NULL,'2026-05-07 12:59:22','2026-05-07 12:59:40'),(10,'Α Α Σ Κερατσινιού Δραπετσώνας - Κότινος',NULL,'teams/logos/hhAzUJkFroM4gi2qHHRPUMjLET6bTXpIcRqB1tv6.png',NULL,'2026-05-08 09:44:20','2026-05-08 09:47:13');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Παναγιώτης','peleviii@hotmail.com',NULL,'$2y$12$MHJTcwHlQ3eSXPWul/UveO09BByNOlq9Nzgz87nOoU4mrRjUguocy','NaOeIXpXef8iAqyXyJBUgOzkvA3FwgNO5cCfv1OWdYm0Fi4wALhrB5vQCKGd','2026-04-17 23:32:02','2026-04-17 23:32:02'),(2,'Παναγιώτης','info@allstarvintage.gr',NULL,'$2y$12$ELkOWWXyU/W3ukKbEmYnTukJ40njqLJeF7OQRl/XS2LVjXjkGkGQC',NULL,'2026-04-17 23:32:49','2026-04-17 23:32:49');
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

-- Dump completed on 2026-05-12 10:33:16
