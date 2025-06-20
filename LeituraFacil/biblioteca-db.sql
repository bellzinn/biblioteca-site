/*!999999- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.4.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: biblioteca
-- ------------------------------------------------------
-- Server version	11.4.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `editora`
--

DROP TABLE IF EXISTS `editora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `editora` (
  `id_editora` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_editora`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editora`
--

LOCK TABLES `editora` WRITE;
/*!40000 ALTER TABLE `editora` DISABLE KEYS */;
INSERT INTO `editora` VALUES
(1,'Panini'),
(2,'Objetiva'),
(3,'LeYa Suma'),
(4,'Companhia das Letras'),
(5,'HarperCollins Brasil'),
(6,'Novo Século'),
(7,' Departamento de Cultura '),
(8,'Rocco Jovens Leitores '),
(9,'JBC');
/*!40000 ALTER TABLE `editora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emprestimo`
--

DROP TABLE IF EXISTS `emprestimo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emprestimo` (
  `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `data_retirada` date DEFAULT NULL,
  `data_reservada` date DEFAULT NULL,
  `devolucao_prevista` date DEFAULT NULL,
  `devolucao_real` date DEFAULT NULL,
  `devolucao_atraso` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_emprestimo`),
  KEY `fk_id_user_idx` (`id_usuario`),
  CONSTRAINT `fk_id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprestimo`
--

LOCK TABLES `emprestimo` WRITE;
/*!40000 ALTER TABLE `emprestimo` DISABLE KEYS */;
INSERT INTO `emprestimo` VALUES
(18,1,'2024-06-02',NULL,'2024-07-02',NULL,NULL);
/*!40000 ALTER TABLE `emprestimo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emprestimo_livros`
--

DROP TABLE IF EXISTS `emprestimo_livros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emprestimo_livros` (
  `id_emprestimo` int(11) NOT NULL,
  `id_livro` int(11) NOT NULL,
  PRIMARY KEY (`id_emprestimo`,`id_livro`),
  KEY `fk_id_livro_idx` (`id_livro`),
  CONSTRAINT `fk_id_emprestimo` FOREIGN KEY (`id_emprestimo`) REFERENCES `emprestimo` (`id_emprestimo`) ON UPDATE CASCADE,
  CONSTRAINT `fk_id_livro` FOREIGN KEY (`id_livro`) REFERENCES `livro` (`id_livro`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emprestimo_livros`
--

LOCK TABLES `emprestimo_livros` WRITE;
/*!40000 ALTER TABLE `emprestimo_livros` DISABLE KEYS */;
INSERT INTO `emprestimo_livros` VALUES
(18,1);
/*!40000 ALTER TABLE `emprestimo_livros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `livro`
--

DROP TABLE IF EXISTS `livro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `livro` (
  `id_livro` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `idioma` varchar(45) DEFAULT NULL,
  `situacao` varchar(45) DEFAULT NULL,
  `id_editora` int(11) NOT NULL,
  `imagem` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_livro`),
  KEY `fk_livro_Editora1_idx` (`id_editora`),
  CONSTRAINT `fk_id_editora` FOREIGN KEY (`id_editora`) REFERENCES `editora` (`id_editora`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `livro`
--

LOCK TABLES `livro` WRITE;
/*!40000 ALTER TABLE `livro` DISABLE KEYS */;
INSERT INTO `livro` VALUES
(1,'Jujutsu Kaisen','Gege Akutani','Acão','Português',NULL,1,'jujutsu.jpg'),
(2,'Ouran High School Host Club','Hatori Bisco','Romance','Português',NULL,1,'ouran.jpg'),
(3,'Golden Kamuy','Noda Satoru','Ação','Português',NULL,1,'golden_kamuy.jpg'),
(4,'A Coisa','Stephen King','Terror','Português',NULL,2,'it.jpg'),
(5,'Diamond is Unbreakable','Araki Hirohiko','Acão','Português',NULL,1,'jojo4.jpg'),
(6,'One Piece','Oda Eiichiro','Aventura','Português',NULL,1,'one_piece.jpg'),
(7,'A Guerra Dos Tronos','George R.R Martin','Fantasia','Português',NULL,3,'got.jpg'),
(8,'1984','George Orwell','Ficção','Português',NULL,4,'1984.jpg'),
(9,'O Gene Egoísta','Richard Dawkins','Ciência','Português',NULL,4,'gene.jpg'),
(10,'Cosmos','Carl Sagan','Ciência','Português',NULL,4,'cosmos.jpg'),
(11,'O Homem e seus Símbolos','Carl Jung','Psicologia','Português',NULL,5,'homem.jpg'),
(12,'A Arte da Guerra','Sun Tzu','Psicologia','Português',NULL,6,'guerra.jpg'),
(13,'Coraline','Neil Gaiman','Terror','Português',NULL,8,'coraline.jpg'),
(14,'Neon Genesis Evangelion','Yoshiyuki Sadamoto','Mecha','Português',NULL,9,'eva.jpg'),
(15,'Berserk','Kentaro Miura','Ação','Português',NULL,1,'berserk.jpg'),
(18,'Pensamento Computacional',NULL,'Lógica Computacional',NULL,NULL,1,'pcomputacional.jpg'),
(19,'Estrutura de Dados',NULL,'Lógica Computacional',NULL,NULL,1,'estrutura.jpg'),
(20,'Lógica de Programação',NULL,'Lógica Computacional',NULL,NULL,1,'logicap.jpg'),
(21,'Arquitetura de Software',NULL,'Lógica Computacional',NULL,NULL,1,'arquitetura.jpg'),
(22,'Algoritmos e Lógica',NULL,'Lógica Computacional',NULL,NULL,1,'algoritmos.jpg');
/*!40000 ALTER TABLE `livro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES
(1,'bruno anderson','mrbruno60@gmail.com','98991968487','bruno123',0),
(2,'Naara','naara.com','98888','123',1),
(3,'anderson silva','anderson.com','98991967734','123',0),
(4,'bruno','bruno.com','9899976545','123',1),
(5,'pedro','pedro@gmail.com',NULL,'123',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

DROP VIEW IF EXISTS `lancamentos`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY INVOKER VIEW `lancamentos` AS
SELECT
  livro.id_livro AS id_livro,
  livro.titulo AS titulo,
  livro.autor AS autor,
  livro.genero AS genero,
  livro.idioma AS idioma,
  livro.situacao AS situacao,
  livro.id_editora AS id_editora,
  livro.imagem AS imagem
FROM livro
WHERE livro.id_livro >= 13 AND livro.id_livro <= 15;

DROP VIEW IF EXISTS `sugestoes`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY INVOKER VIEW `sugestoes` AS
SELECT
  livro.id_livro AS id_livro,
  livro.titulo AS titulo,
  livro.autor AS autor,
  livro.genero AS genero,
  livro.idioma AS idioma,
  livro.situacao AS situacao,
  livro.id_editora AS id_editora,
  livro.imagem AS imagem
FROM livro
WHERE livro.id_livro >= 8 AND livro.id_livro <= 12;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;
