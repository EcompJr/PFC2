# Host: localhost  (Version 5.7.21-log)
# Date: 2019-04-07 11:56:53
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "advertences"
#

DROP TABLE IF EXISTS `advertences`;
CREATE TABLE `advertences` (
  `adv_id` int(11) NOT NULL AUTO_INCREMENT,
  `memberName` varchar(255) NOT NULL DEFAULT 'Null',
  `reason` varchar(255) NOT NULL DEFAULT 'Null',
  `date` varchar(14) CHARACTER SET utf8 NOT NULL DEFAULT 'Null',
  `defense` varchar(20) NOT NULL DEFAULT 'Null',
  `points` int(11) NOT NULL DEFAULT '0',
  `responsible` varchar(255) NOT NULL DEFAULT 'Null',
  PRIMARY KEY (`adv_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

#
# Data for table "advertences"
#

INSERT INTO `advertences` VALUES (24,'Gustavo Moura Boanerges Oliveira','motivo3','03-04-2019','deferida',1118,'Empresa'),(25,'Gustavo Moura Boanerges Oliveira','motivo3','05-04-2019','indeferida',19998,'Empresa');

#
# Structure for table "member"
#

DROP TABLE IF EXISTS `member`;
CREATE TABLE `member` (
  `name` varchar(150) NOT NULL,
  `personal_email` varchar(150) NOT NULL,
  `professional_email` varchar(150) NOT NULL,
  `rg` varchar(14) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `password` varchar(60) NOT NULL,
  `birthdate` varchar(10) NOT NULL,
  `telephone` varchar(14) NOT NULL,
  `marital_status` enum('single','married','divorced','widower') NOT NULL,
  `member_type` enum('director','member','trainee','admin') NOT NULL,
  `score` decimal(10,2) NOT NULL,
  `path_profile_picture` varchar(300) NOT NULL,
  `scorePCD` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cpf`),
  UNIQUE KEY `personal_email_UNIQUE` (`personal_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "member"
#

INSERT INTO `member` VALUES ('Empresa','admin@admin.com','admin@admin.com','00.000.000-00','000.000.000-00','$2y$10$T.Y4ITR0zNF22tDamnLL3uzJByU8Gsu.eSQzXGBC.xpO.VOYdqAC2','01/01/2000','(75)31618354','single','admin',22370.00,'http://localhost:9000/pfc/media/profile/profile389185.png',0.00),('Gustavo Moura Boanerges Oliveira','g.boanerges2@gmail.com','g.boanerges2@gmail.com','00.000.000-99','000.000.000-98','$2y$10$zIQizCTInGMSrz8LWI0lP.z4B9DQBcTxk66//k0It3pwYo5RjcHIm','02/07/1996','(75)992131766','single','member',250.00,'http://localhost:9000/pfc/media/profile/profile1216250.jpg',-21782.00);

#
# Structure for table "member_history"
#

DROP TABLE IF EXISTS `member_history`;
CREATE TABLE `member_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_cpf` varchar(14) NOT NULL,
  `reason` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `action` enum('gain','lose') NOT NULL,
  `value` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`,`member_cpf`),
  KEY `fk_member_history_member1_idx` (`member_cpf`),
  CONSTRAINT `fk_member_history_member1` FOREIGN KEY (`member_cpf`) REFERENCES `member` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4;

#
# Data for table "member_history"
#

INSERT INTO `member_history` VALUES (1,'000.000.000-00','Projeto: Site ECOMP ','2018-12-16','gain',4000.00),(2,'000.000.000-00','Projeto: Site ECOMP  (Pontuação excedente)','2018-12-16','gain',750.00),(3,'000.000.000-98','Projeto: Site ECOMP ','2018-12-16','gain',250.00),(4,'000.000.000-00','Projeto: Teste PFC','2018-12-17','gain',800.00),(5,'000.000.000-00','Projeto: Teste PFC (Pontuação excedente)','2018-12-17','gain',20.00),(6,'000.000.000-98','(Bônus de vendedor) Projeto: Teste PFC','2018-12-17','gain',0.00),(7,'000.000.000-00','Projeto: Teste PFC','2018-12-17','gain',800.00),(8,'000.000.000-00','Projeto: Teste PFC (Pontuação excedente)','2018-12-17','gain',20.00),(9,'000.000.000-98','(Bônus de vendedor) Projeto: Teste PFC','2018-12-17','gain',0.00),(10,'000.000.000-00','Projeto: Teste PFC','2018-12-17','gain',800.00),(11,'000.000.000-00','Projeto: Teste PFC (Pontuação excedente)','2018-12-17','gain',20.00),(12,'000.000.000-98','(Bônus de vendedor) Projeto: Teste PFC','2018-12-17','gain',0.00),(13,'000.000.000-00','Projeto: Teste PFC','2018-12-17','gain',800.00),(14,'000.000.000-00','Projeto: Teste PFC (Pontuação excedente)','2018-12-17','gain',20.00),(15,'000.000.000-98','(Bônus de vendedor) Projeto: Teste PFC','2018-12-17','gain',0.00),(16,'000.000.000-00','Projeto: Teste PFC','2018-12-17','gain',800.00),(17,'000.000.000-00','Projeto: Teste PFC (Pontuação excedente)','2018-12-17','gain',20.00),(18,'000.000.000-98','(Bônus de vendedor) Projeto: Teste PFC','2018-12-17','gain',0.00),(19,'000.000.000-00','Projeto: Teste PFC','2018-12-17','gain',800.00),(20,'000.000.000-00','Projeto: Teste PFC (Pontuação excedente)','2018-12-17','gain',20.00),(21,'000.000.000-98','(Bônus de vendedor) Projeto: Teste PFC','2018-12-17','gain',0.00),(22,'000.000.000-00','Projeto: Sistema SisNema','2019-02-19','gain',2800.00),(23,'000.000.000-00','Projeto: Sistema SisNema (Pontuação excedente)','2019-02-19','gain',700.00),(24,'000.000.000-98','Projeto: Sistema SisNema','2019-02-19','gain',0.00),(25,'000.000.000-00','Projeto: Colegiado SITE','2019-02-19','gain',4000.00),(26,'000.000.000-00','Projeto: Colegiado SITE (Pontuação excedente)','2019-02-19','gain',100.00),(27,'000.000.000-98','(Bônus de vendedor) Projeto: Colegiado SITE','2019-02-19','gain',0.00),(28,'000.000.000-00','Projeto: Colegiado SITE','2019-02-19','gain',4000.00),(29,'000.000.000-00','Projeto: Colegiado SITE (Pontuação excedente)','2019-02-19','gain',100.00),(30,'000.000.000-98','(Bônus de vendedor) Projeto: Colegiado SITE','2019-02-19','gain',0.00),(31,'000.000.000-00','Projeto: 0000','2019-02-19','gain',800.00),(32,'000.000.000-00','Projeto: 0000 (Pontuação excedente)','2019-02-19','gain',200.00),(33,'000.000.000-98','Projeto: 0000','2019-02-19','gain',0.00),(34,'000.000.000-00','Desligamento de Teste Jr','2019-03-12','gain',0.00),(35,'000.000.000-00','Desligamento de TESTE','2019-03-27','gain',0.00),(36,'000.000.000-00','Desligamento de AB do C','2019-04-03','gain',0.00);

#
# Structure for table "member_request"
#

DROP TABLE IF EXISTS `member_request`;
CREATE TABLE `member_request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_cpf` varchar(14) NOT NULL,
  `status` enum('opened','accepted','rejected') NOT NULL,
  `reason` varchar(300) NOT NULL,
  PRIMARY KEY (`request_id`,`member_cpf`),
  KEY `fk_member_request_member1_idx` (`member_cpf`),
  CONSTRAINT `fk_member_request_member1` FOREIGN KEY (`member_cpf`) REFERENCES `member` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

#
# Data for table "member_request"
#

INSERT INTO `member_request` VALUES (1,'000.000.000-98','opened','RP ');

#
# Structure for table "project"
#

DROP TABLE IF EXISTS `project`;
CREATE TABLE `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `client_name` varchar(150) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `payment_method` enum('in_money','in_parcel') NOT NULL,
  `price` double NOT NULL,
  `status` enum('opened','closed') NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

#
# Data for table "project"
#

INSERT INTO `project` VALUES (1,'Site ECOMP ','ECOMPJR','5 meses','in_money',5000,'closed'),(2,'Teste PFC','Teste Ltda.','3 meses','in_money',1000,'closed'),(3,'Sistema SisNema','UEFS','6 meses','in_money',3500,'closed'),(4,'Colegiado SITE','UEFS','6','in_money',5000,'closed'),(5,'0000','0000','241 dias','in_money',1000,'closed'),(6,'Testando','Teste','Teste','in_money',500,'opened');

#
# Structure for table "payment_history"
#

DROP TABLE IF EXISTS `payment_history`;
CREATE TABLE `payment_history` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `value` double NOT NULL,
  `receptor_name` varchar(150) NOT NULL,
  PRIMARY KEY (`payment_id`,`project_id`),
  KEY `fk_payment_history_project1_idx` (`project_id`),
  CONSTRAINT `fk_payment_history_project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

#
# Data for table "payment_history"
#

INSERT INTO `payment_history` VALUES (1,1,'2018-12-16',5000,'Empresa'),(2,2,'2018-12-17',700,'Empresa'),(3,2,'2018-12-17',300,'Empresa'),(4,3,'2018-12-17',3500,'Empresa'),(5,4,'2019-02-19',5000,'Empresa'),(6,5,'2019-02-19',500,'Empresa'),(7,5,'2019-02-19',500,'Empresa');

#
# Structure for table "members_in_project"
#

DROP TABLE IF EXISTS `members_in_project`;
CREATE TABLE `members_in_project` (
  `project_id` int(11) NOT NULL,
  `member_cpf` varchar(14) NOT NULL,
  `role` enum('vendor','member') NOT NULL,
  PRIMARY KEY (`project_id`,`member_cpf`,`role`),
  KEY `fk_members_in_project_member1_idx` (`member_cpf`),
  KEY `fk_members_in_project_project1_idx` (`project_id`),
  CONSTRAINT `fk_members_in_project_member1` FOREIGN KEY (`member_cpf`) REFERENCES `member` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_members_in_project_project1` FOREIGN KEY (`project_id`) REFERENCES `project` (`project_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "members_in_project"
#

INSERT INTO `members_in_project` VALUES (1,'000.000.000-98','member'),(2,'000.000.000-98','vendor'),(3,'000.000.000-98','member'),(4,'000.000.000-98','vendor'),(5,'000.000.000-98','member');

#
# Structure for table "request_files"
#

DROP TABLE IF EXISTS `request_files`;
CREATE TABLE `request_files` (
  `request_id` int(11) NOT NULL,
  `filepath` varchar(300) NOT NULL,
  KEY `fk_request_files_member_request_idx` (`request_id`),
  CONSTRAINT `fk_request_files_member_request` FOREIGN KEY (`request_id`) REFERENCES `member_request` (`request_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "request_files"
#

INSERT INTO `request_files` VALUES (1,'http://localhost/index.php/media/requests/request1822240.pdf');
