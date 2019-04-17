# Host: localhost  (Version 5.7.21-log)
# Date: 2019-04-17 01:35:09
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

#
# Data for table "advertences"
#


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
  `scorePCD` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`cpf`),
  UNIQUE KEY `personal_email_UNIQUE` (`personal_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

#
# Data for table "member"
#

INSERT INTO `member` VALUES ('Empresa','admin@admin.com','admin@admin.com','00.000.000-00','000.000.000-00','$2y$10$T.Y4ITR0zNF22tDamnLL3uzJByU8Gsu.eSQzXGBC.xpO.VOYdqAC2','01/01/2000','(75)31618354','single','admin',22370.00,'http://localhost:9000/pfc/media/profile/profile389185.png',0),('Gustavo Moura Boanerges Oliveira','g.boanerges2@gmail.com','g.boanerges2@gmail.com','00.000.000-99','000.000.000-98','$2y$10$zIQizCTInGMSrz8LWI0lP.z4B9DQBcTxk66//k0It3pwYo5RjcHIm','02/07/1996','(75)992131766','single','member',50.00,'http://localhost:9000/pfc/media/profile/profile1216250.jpg',-6);

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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

#
# Data for table "member_history"
#


#
# Structure for table "member_request"
#

DROP TABLE IF EXISTS `member_request`;
CREATE TABLE `member_request` (
  `request_id` int(11) NOT NULL AUTO_INCREMENT,
  `member_cpf` varchar(14) NOT NULL,
  `status` enum('opened','accepted','rejected') NOT NULL,
  `reason` varchar(300) NOT NULL,
  `pfc_request` varchar(300) DEFAULT '',
  PRIMARY KEY (`request_id`,`member_cpf`),
  KEY `fk_member_request_member1_idx` (`member_cpf`),
  CONSTRAINT `fk_member_request_member1` FOREIGN KEY (`member_cpf`) REFERENCES `member` (`cpf`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

#
# Data for table "member_request"
#

INSERT INTO `member_request` VALUES (14,'000.000.000-98','opened','TESTE',''),(15,'000.000.000-98','opened','TESTE 2',''),(16,'000.000.000-98','opened','Teste TEXT AREA','TESTANDO O NEGOCIO'),(17,'000.000.000-98','opened','teste 2','teste 2'),(18,'000.000.000-98','opened','aa','');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

#
# Data for table "payment_history"
#


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

