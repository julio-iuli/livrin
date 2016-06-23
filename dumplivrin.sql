CREATE DATABASE  IF NOT EXISTS `livrin` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `livrin`;
-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: livrin
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `tb_autor`
--

DROP TABLE IF EXISTS `tb_autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_autor` (
  `id_autor` int(11) NOT NULL AUTO_INCREMENT,
  `ds_nome_autor` varchar(50) NOT NULL,
  PRIMARY KEY (`id_autor`),
  UNIQUE KEY `ds_nome_UNIQUE` (`ds_nome_autor`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_autor`
--

LOCK TABLES `tb_autor` WRITE;
/*!40000 ALTER TABLE `tb_autor` DISABLE KEYS */;
INSERT INTO `tb_autor` VALUES (14,'Augusto Cury'),(10,'Clarice Lispector'),(2,'Guimarães Rosa'),(7,'Homero'),(11,'Isaías Pessotti'),(13,'Jô Soares'),(5,'José de Alencar'),(15,'Jostein Garder'),(1,'Julio Verne'),(9,'Lima Barreto'),(4,'Machado de Assis'),(12,'Mário de Andrade'),(6,'Paulo Leminski'),(8,'Virgílio');
/*!40000 ALTER TABLE `tb_autor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_dono`
--

DROP TABLE IF EXISTS `tb_dono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_dono` (
  `id_dono` int(11) NOT NULL AUTO_INCREMENT,
  `ds_nome_dono` varchar(10) NOT NULL,
  PRIMARY KEY (`id_dono`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_dono`
--

LOCK TABLES `tb_dono` WRITE;
/*!40000 ALTER TABLE `tb_dono` DISABLE KEYS */;
INSERT INTO `tb_dono` VALUES (1,'indefinido'),(2,'Júlio'),(3,'Carlos'),(4,'Lucas'),(5,'Ricardo'),(6,'Gleisson');
/*!40000 ALTER TABLE `tb_dono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_livro`
--

DROP TABLE IF EXISTS `tb_livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_livro` (
  `id_livro` int(11) NOT NULL AUTO_INCREMENT,
  `ds_titulo` varchar(100) NOT NULL,
  `tb_autor_id_autor` int(11) NOT NULL,
  `tb_dono_id_dono` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_livro`),
  UNIQUE KEY `id_livro_UNIQUE` (`id_livro`),
  KEY `fk_tb_livro_tb_autor_idx` (`tb_autor_id_autor`),
  KEY `fk_tb_livro_tb_dono1_idx` (`tb_dono_id_dono`),
  CONSTRAINT `fk_tb_livro_tb_autor` FOREIGN KEY (`tb_autor_id_autor`) REFERENCES `tb_autor` (`id_autor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_livro_tb_dono1` FOREIGN KEY (`tb_dono_id_dono`) REFERENCES `tb_dono` (`id_dono`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_livro`
--

LOCK TABLES `tb_livro` WRITE;
/*!40000 ALTER TABLE `tb_livro` DISABLE KEYS */;
INSERT INTO `tb_livro` VALUES (2,'Grande Sertão: Veredas',2,1),(3,'Dom Casmurro',4,6),(4,'Sagarana',2,2),(5,'O Alienista',4,3),(6,'Quincas Borba',4,2),(7,'Manuelzão e Miguilim',2,2),(8,'Senhora',5,2),(9,'Aurélia',5,2),(10,'Agora é que são elas',6,2),(11,'Odisséia',7,2),(12,'Eneida',8,2),(13,'Bucólicas',8,2),(15,'Ilíada',7,2),(16,'Geórgicas',8,2),(17,'O triste fim de Policarpo Quaresma',9,2),(18,'A hora da estrela',10,2),(19,'Paixão segundo GH',10,2),(20,'Aqueles cães malditos de Arquelau',11,2),(21,'Pauliceia Desvairada',12,2),(22,'O Xangô de Baker Street',13,2),(23,'Quem Matou Getúlio Vargas',13,2),(24,'Memorial de Aires',4,3),(25,'O mestre dos mestres de coisa nenhuma',14,1),(26,'O mundo de Sofia',15,2);
/*!40000 ALTER TABLE `tb_livro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-23 12:54:02
