# Host: localhost  (Version 5.7.21-log)
# Date: 2018-12-07 16:37:15
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "advertences"
#

DROP TABLE IF EXISTS `advertences`;
CREATE TABLE `advertences` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `memberId` int(16) NOT NULL,
  `member` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `responsible` varchar(80) NOT NULL,
  `reason` varchar(80) NOT NULL,
  `data` varchar(14) NOT NULL,
  `points` int(5) NOT NULL,
  `dismissed` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "advertences"
#

INSERT INTO `advertences` VALUES (8,37,'123','123','motivo3','22/02/2018',2468,1),(10,13,'Saulo De Tarso','','motivo6','25/02/2018',10,1),(11,22,'Pedro Brandão','','motivo2','27/02/2018',2,1),(12,22,'Pedro Brandão','','motivo3','25/02/2018',6666,1);

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
  PRIMARY KEY (`cpf`),
  UNIQUE KEY `personal_email_UNIQUE` (`personal_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "member"
#

INSERT INTO `member` VALUES ('Empresa','admin@admin.com','admin@admin.com','00.000.000-00','000.000.000-00','$2y$10$qNvVM63TC2zgQLaqIHbMbekRVskTg1MviCurcxlCWcwQj199OTonK','01/01/2000','(75)31618354','single','admin',4750.00,'http://localhost:9000/pfc/media/profile/profile056137.png'),('Gustavo Boanerges','g.boanerges2@gmail.com','g.boanerges2@gmail.com','00.111.222-33','000.325.111-55','$2y$10$sqj0d5o.F5wbVRJiSfzAGe/kZsPN2JgU7dMrNqT7SdN6a53U45CFe','02/07/1996','(75)992131766','single','member',250.00,'http://localhost:9000/pfc/media/profile/profile3081185.jpg'),('Aloísio Júnior','aloisio@gmail.com','aloisio@ecompjr.com','11.111.111-00','222.222.222-99','$2y$10$7tpKpbXxfv7ne4aeqx7i6eANwgdmOA4Vt9ljYbAXdjohOgk3drM2m','25/08/1996','(75)993397447','single','member',0.00,'http://localhost:9000/pfc/media/profile/profile3117222.jpg'),('Gabriel Azevedo','gabriel@gmail.com','gabriel@ecompjr.com','77.777.777-87','333.333.333-85','$2y$10$XIf99GEcOIEXALgQbBFfou7dqDhHlIoIlmSKcyuiiF1seqUz/WI4e','10/04/1997','(75)995591221','single','member',0.00,'http://localhost:9000/pfc/media/profile/profile2230165.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

#
# Data for table "member_history"
#

INSERT INTO `member_history` VALUES (1,'000.000.000-00','Projeto: Teste PFC','2018-12-07','gain',1600.00),(3,'000.000.000-00','Projeto: Teste PFC (Pontuação excedente)','2018-12-07','gain',110.00),(4,'000.325.111-55','Projeto: Teste PFC','2018-12-07','gain',250.00),(5,'000.000.000-00','Projeto: Site Ecomp','2018-12-07','gain',2400.00),(6,'000.000.000-00','Projeto: Site Ecomp (Pontuação excedente)','2018-12-07','gain',330.00),(8,'000.000.000-00','Projeto: Site Ecomp (Pontuação excedente)','2018-12-07','gain',60.00),(9,'000.325.111-55','(Bônus de vendedor) Projeto: Site Ecomp','2018-12-07','gain',0.00),(10,'000.000.000-00','Desligamento de Teste da Silva','2018-12-07','gain',250.00);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "member_request"
#


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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "project"
#

INSERT INTO `project` VALUES (1,'Teste PFC','EcompJr','6 ','in_money',2000,'closed'),(2,'Site Ecomp','UEFS','8','in_money',3000,'closed');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

#
# Data for table "payment_history"
#

INSERT INTO `payment_history` VALUES (1,1,'2018-12-07',2000,'Empresa'),(2,2,'2018-12-07',3000,'Empresa');

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

INSERT INTO `members_in_project` VALUES (1,'000.325.111-55','member'),(2,'000.325.111-55','vendor');

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

