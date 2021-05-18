-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: gsbBdd
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `delegue_regional`
--

DROP TABLE IF EXISTS `delegue_regional`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `delegue_regional` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdp` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delegue_regional`
--

LOCK TABLES `delegue_regional` WRITE;
/*!40000 ALTER TABLE `delegue_regional` DISABLE KEYS */;
INSERT INTO `delegue_regional` VALUES (1,'marie','boime','mboime','1234');
/*!40000 ALTER TABLE `delegue_regional` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20210422195029','2021-04-22 21:52:12',71),('DoctrineMigrations\\Version20210422200134','2021-04-22 22:01:46',82),('DoctrineMigrations\\Version20210422200344','2021-04-22 22:03:52',71),('DoctrineMigrations\\Version20210422200724','2021-04-22 22:07:30',93),('DoctrineMigrations\\Version20210422200941','2021-04-22 22:09:47',88),('DoctrineMigrations\\Version20210422210248','2021-04-22 23:03:00',80),('DoctrineMigrations\\Version20210422213245','2021-04-22 23:32:55',143),('DoctrineMigrations\\Version20210422213639','2021-04-22 23:36:46',188),('DoctrineMigrations\\Version20210422214331','2021-04-22 23:45:51',159),('DoctrineMigrations\\Version20210422215749','2021-04-22 23:58:00',85);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `praticien`
--

DROP TABLE IF EXISTS `praticien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `praticien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coef_notoriete` double DEFAULT NULL,
  `un_type_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D9A27D3B36DCE1B` (`un_type_id`),
  CONSTRAINT `FK_D9A27D3B36DCE1B` FOREIGN KEY (`un_type_id`) REFERENCES `type_praticien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `praticien`
--

LOCK TABLES `praticien` WRITE;
/*!40000 ALTER TABLE `praticien` DISABLE KEYS */;
INSERT INTO `praticien` VALUES (1,'kassim','keldine','3 voie du salut','94200','ivry',1.2,1),(2,'houf','anis','6 avenue de paris','93100','bondy',0.2,2),(3,'dinard','valentin','1 impasse jean jules','75002','paris',2.4,3),(4,'nino','maddie','25 rue de la vie','75010','paris',0.5,1);
/*!40000 ALTER TABLE `praticien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rapport_visite`
--

DROP TABLE IF EXISTS `rapport_visite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rapport_visite` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_praticien_rapport` int DEFAULT NULL,
  `bilan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_visite` date DEFAULT NULL,
  `date_rapport` date DEFAULT NULL,
  `un_visiteur_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D1D74171117835AD` (`un_visiteur_id`),
  KEY `id_praticien_rapport` (`id_praticien_rapport`),
  CONSTRAINT `FK_D1D74171117835AD` FOREIGN KEY (`un_visiteur_id`) REFERENCES `visiteur` (`id`),
  CONSTRAINT `rapport_visite_ibfk_1` FOREIGN KEY (`id_praticien_rapport`) REFERENCES `visiteur` (`un_praticien_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rapport_visite`
--

LOCK TABLES `rapport_visite` WRITE;
/*!40000 ALTER TABLE `rapport_visite` DISABLE KEYS */;
INSERT INTO `rapport_visite` VALUES (1,1,'toux et mal de gorge','2020-02-02','2020-02-05',1),(2,2,'entorse au poignet gauche avec bleu sur le bras ','2020-02-10','2020-02-12',2),(3,1,'renouvellement ventoline pour asthme','2020-03-22','2020-03-26',1);
/*!40000 ALTER TABLE `rapport_visite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_praticien`
--

DROP TABLE IF EXISTS `type_praticien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `type_praticien` (
  `id` int NOT NULL AUTO_INCREMENT,
  `libelle` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lieu` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_praticien`
--

LOCK TABLES `type_praticien` WRITE;
/*!40000 ALTER TABLE `type_praticien` DISABLE KEYS */;
INSERT INTO `type_praticien` VALUES (1,'hesitant','paris'),(2,'confiant','paris'),(3,'certain','paris');
/*!40000 ALTER TABLE `type_praticien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `visiteur`
--

DROP TABLE IF EXISTS `visiteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `visiteur` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adresse` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ville` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `login` varchar(26) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdp` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `un_praticien_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4EA587B8D3F01F29` (`un_praticien_id`),
  CONSTRAINT `FK_4EA587B8D3F01F29` FOREIGN KEY (`un_praticien_id`) REFERENCES `praticien` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `visiteur`
--

LOCK TABLES `visiteur` WRITE;
/*!40000 ALTER TABLE `visiteur` DISABLE KEYS */;
INSERT INTO `visiteur` VALUES (1,'lamie','salome','11 avenue vald','92630','neuilly','lsalome','salmdp',1),(2,'machado','kevin','8 rue de bourgogne','94400','vitry','mkevin','kevcounia',2),(3,'guirassy','fatou','27 rue de versaille','75015','paris','gfatou','fat123',3);
/*!40000 ALTER TABLE `visiteur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-18 21:42:30
