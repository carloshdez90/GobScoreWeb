-- MySQL dump 10.13  Distrib 5.5.39, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gsdb
-- ------------------------------------------------------
-- Server version	5.5.39-1

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `answer` tinyint(1) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (1,1,1,59,'2014-12-14 11:58:40','2014-12-14 17:58:40'),(2,0,2,59,'2014-12-14 11:58:41','2014-12-14 17:58:41');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `calificacions`
--

DROP TABLE IF EXISTS `calificacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calificacions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visto` double NOT NULL,
  `respuesta` double NOT NULL,
  `calificacion` int(2) NOT NULL,
  `denuncia_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calificacions`
--

LOCK TABLES `calificacions` WRITE;
/*!40000 ALTER TABLE `calificacions` DISABLE KEYS */;
INSERT INTO `calificacions` VALUES (1,37,64,-1,1,'2014-12-14 20:51:20','2014-12-15 02:51:47'),(2,88949,-1,-1,2,'2014-12-16 00:31:25','2014-12-16 06:31:25'),(3,962,-1,-1,3,'2014-12-16 15:15:22','2014-12-16 21:15:22');
/*!40000 ALTER TABLE `calificacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delation_infos`
--

DROP TABLE IF EXISTS `delation_infos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delation_infos` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `kind` text,
  `phone` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sms_key` varchar(255) DEFAULT NULL,
  `delation_institutions_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`delation_institutions_id`),
  KEY `fk_delation_infos_delation_institutions` (`delation_institutions_id`),
  CONSTRAINT `fk_delation_infos_delation_institutions` FOREIGN KEY (`delation_institutions_id`) REFERENCES `delation_institutions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delation_infos`
--

LOCK TABLES `delation_infos` WRITE;
/*!40000 ALTER TABLE `delation_infos` DISABLE KEYS */;
/*!40000 ALTER TABLE `delation_infos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delation_institutions`
--

DROP TABLE IF EXISTS `delation_institutions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delation_institutions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delation_institutions`
--

LOCK TABLES `delation_institutions` WRITE;
/*!40000 ALTER TABLE `delation_institutions` DISABLE KEYS */;
/*!40000 ALTER TABLE `delation_institutions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delations`
--

DROP TABLE IF EXISTS `delations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delations` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dui` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `opened_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `secret_key` varchar(255) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `delation_infos_id` int(11) NOT NULL,
  `delation_infos_delation_institutions_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`delation_infos_id`,`delation_infos_delation_institutions_id`),
  KEY `fk_delations_delation_infos1` (`delation_infos_id`,`delation_infos_delation_institutions_id`),
  CONSTRAINT `fk_delations_delation_infos1` FOREIGN KEY (`delation_infos_id`, `delation_infos_delation_institutions_id`) REFERENCES `delation_infos` (`id`, `delation_institutions_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delations`
--

LOCK TABLES `delations` WRITE;
/*!40000 ALTER TABLE `delations` DISABLE KEYS */;
/*!40000 ALTER TABLE `delations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `denuncias`
--

DROP TABLE IF EXISTS `denuncias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `denuncias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tipo_id` varchar(2) NOT NULL,
  `codigo` varchar(16) NOT NULL,
  `institucion_id` int(11) NOT NULL,
  `solucionada` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `denuncias`
--

LOCK TABLES `denuncias` WRITE;
/*!40000 ALTER TABLE `denuncias` DISABLE KEYS */;
INSERT INTO `denuncias` VALUES (1,'Carlos Alvarez','mathdebian@gmail.com','0','30851418',1,0,'2014-12-14 20:50:43','2014-12-15 02:50:43'),(2,'Carlos Alvarez','mathdebian@gmail.com','0','22166490',1,0,'2014-12-14 23:48:56','2014-12-15 05:48:56'),(3,'Esaú Serpas','es.serpas@gmail.com','1','86275724',10,0,'2014-12-16 14:59:20','2014-12-16 20:59:20'),(4,'Carlos Hernández','xscharliexs@gmail.com','6','91058959',10,0,'2014-12-16 15:41:29','2014-12-16 21:41:29'),(5,'Noel Hidalgo','nhidalgoca@gmail.com','0','33500127',2,0,'2014-12-16 15:43:55','2014-12-16 21:43:55'),(6,'Mario Mendez','mariomendez12@gmail.com','5','43982421',6,0,'2014-12-16 15:47:33','2014-12-16 21:47:33'),(7,'Jose Castro','josecastrol@gmail.com','2','64937749',7,0,'2014-12-16 15:49:39','2014-12-16 21:49:39'),(8,'Maria Figueroa','marifigue@gmail.com','0','73765788',1,0,'2014-12-16 15:54:26','2014-12-16 21:54:26'),(9,'Hernan Arias','hcoreas@gmail.com','4','53547499',10,0,'2014-12-16 15:55:56','2014-12-16 21:55:56'),(10,'Gustavo Escobar','gusbar@gmail.com','6','42888777',10,0,'2014-12-16 15:57:46','2014-12-16 21:57:46'),(11,'Jose Buendia','josebuendia@gmail.com','4','98231142',4,0,'2014-12-16 16:00:43','2014-12-16 22:00:43');
/*!40000 ALTER TABLE `denuncias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forms`
--

DROP TABLE IF EXISTS `forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `institucion_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forms`
--

LOCK TABLES `forms` WRITE;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institucions`
--

DROP TABLE IF EXISTS `institucions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institucions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institucions`
--

LOCK TABLES `institucions` WRITE;
/*!40000 ALTER TABLE `institucions` DISABLE KEYS */;
INSERT INTO `institucions` VALUES (1,'Ministerio de Hacienda',0,'2014-12-14 13:53:47','2014-12-14 19:53:47'),(2,'Ministerio de Salud',0,'2014-12-16 14:41:16','2014-12-16 20:41:16'),(3,'Ministerio de Economía',0,'2014-12-16 14:41:56','2014-12-16 20:41:56'),(4,'Ministerio de Agricultura',0,'2014-12-16 14:42:15','2014-12-16 20:42:15'),(5,'Ministerio de Defensa',0,'2014-12-16 14:42:37','2014-12-16 20:42:37'),(6,'Ministerio de Trabajo',0,'2014-12-16 14:42:51','2014-12-16 20:42:51'),(7,'Ministerio de Turismo',0,'2014-12-16 14:43:10','2014-12-16 20:43:10'),(8,'Viceministerio de Transporte',0,'2014-12-16 14:43:38','2014-12-16 20:43:38'),(9,'Ministerio de Educación',0,'2014-12-16 14:43:54','2014-12-16 20:43:54'),(10,'Instituto Salvadoreño del Seguro Social',0,'2014-12-16 14:44:37','2014-12-16 20:44:37');
/*!40000 ALTER TABLE `institucions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `institution_answers`
--

DROP TABLE IF EXISTS `institution_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `institution_answers` (
  `id` int(11) NOT NULL,
  `title` text,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delations_id` int(11) NOT NULL,
  `delations_delation_infos_id` int(11) NOT NULL,
  `delations_delation_infos_delation_institutions_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`delations_id`,`delations_delation_infos_id`,`delations_delation_infos_delation_institutions_id`),
  KEY `fk_institution_answers_delations1` (`delations_id`,`delations_delation_infos_id`,`delations_delation_infos_delation_institutions_id`),
  CONSTRAINT `fk_institution_answers_delations1` FOREIGN KEY (`delations_id`, `delations_delation_infos_id`, `delations_delation_infos_delation_institutions_id`) REFERENCES `delations` (`id`, `delation_infos_id`, `delation_infos_delation_institutions_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `institution_answers`
--

LOCK TABLES `institution_answers` WRITE;
/*!40000 ALTER TABLE `institution_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `institution_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensajes`
--

DROP TABLE IF EXISTS `mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenido` varchar(5000) NOT NULL,
  `tipo` varchar(2) NOT NULL,
  `denuncia_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensajes`
--

LOCK TABLES `mensajes` WRITE;
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
INSERT INTO `mensajes` VALUES (4,'Me presente a una cita y el barrendero me hizo ojitos, me siguio y me hablo de una manera acosadora. Quisiera que fueran mas selectivos al contratar a los empleados. Gracias','d',3,'2014-12-16 14:59:20','2014-12-16 20:59:20'),(5,'Me presente al seguro y no me atendieron porque el doctor andaba comprando semita y fresco de carao. Le pido que tengan mas consideración con los pacientes.','d',4,'2014-12-16 15:41:29','2014-12-16 21:41:29'),(6,'Un empleado del área de seguridad siempre anda revisando el celular en lugar de vigilar.','d',5,'2014-12-16 15:43:55','2014-12-16 21:43:55'),(7,'Me preocupa hay encargados de recursos humanos que a cambio de dinero conceden privilegios. Me gustaria que tomaran cartas en el asunto','d',6,'2014-12-16 15:47:33','2014-12-16 21:47:33'),(8,'Hay personas que estan causando acoso laboral a los empleados de ministerio, me gustaria que investigaran el caso.','d',7,'2014-12-16 15:49:39','2014-12-16 21:49:40'),(9,'En el area de tramites para obtener el NIT los empleados pierden el tiempo y no atieneden bien al contribuyente.','d',8,'2014-12-16 15:54:26','2014-12-16 21:54:26'),(10,'En el ISSS se utilizan los vehiculos del estado para salir a pasear, la placa del vehiculo es N45698','d',9,'2014-12-16 15:55:56','2014-12-16 21:55:56'),(11,'En el ISSS me prectiracon una pequeña cirugia y no me atendieron bien, por lo cual pido mas atencion en la parte de atencion la paciente.','d',10,'2014-12-16 15:57:46','2014-12-16 21:57:46'),(12,'He visto en dias festivos un vehiculo que pertenece al ministerio de agricultura, las placas son N4532 ','d',11,'2014-12-16 16:00:43','2014-12-16 22:00:43');
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `form_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (1,'¿Cómo evalúa la gestión de la institución?',1,'0000-00-00 00:00:00','2014-12-13 17:16:59'),(2,'¿Informe de rendición de cuentas fue entregado antes de la audiencia pública?',1,'0000-00-00 00:00:00','2014-12-13 17:16:59'),(3,'¿El titular informó sobre los obstáculos enfrentados?',1,'0000-00-00 00:00:00','2014-12-13 17:17:00'),(4,'¿Dieron explicaciones sobre las decisiones tomadas en la gestión?',1,'0000-00-00 00:00:00','2014-12-13 17:17:00'),(5,'¿Se informó sobre la ejecución presupuestaria?',1,'0000-00-00 00:00:00','2014-12-13 17:17:00'),(6,'¿Hubo espacio para la participación ciudadana?',1,'0000-00-00 00:00:00','2014-12-13 17:17:00'),(7,'¿El funcionario dio respuesta a las preguntas efectuadas?',1,'0000-00-00 00:00:00','2014-12-13 17:17:00');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` varchar(500) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `institucion_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2014-12-16 16:24:48

