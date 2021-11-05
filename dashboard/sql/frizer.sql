-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'user'
-- 
-- ---

DROP TABLE IF EXISTS `user`;
		
CREATE TABLE `user` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(128) NOT NULL,
  `pic` VARCHAR(256) NULL DEFAULT NULL,
  `adresa` VARCHAR(512) NULL DEFAULT NULL,
  `kraj` VARCHAR(128) NULL DEFAULT NULL,
  `email` VARCHAR(256) NOT NULL,
  `grad` VARCHAR(128) NULL DEFAULT NULL,
  `lozinka` VARCHAR(256) NOT NULL,
  `hash` VARCHAR(32) NULL DEFAULT NULL,
  `phone` VARCHAR(128) NOT NULL,
  `interes` VARCHAR(1024) NULL DEFAULT NULL,
  `reg_date` DATETIME NULL DEFAULT NULL,
  `active` INTEGER NULL DEFAULT 0,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'frizer'
-- 
-- ---

DROP TABLE IF EXISTS `frizer`;
		
CREATE TABLE `frizer` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(128) NOT NULL,
  `email` VARCHAR(256) NOT NULL,
  `lozinka` VARCHAR(256) NOT NULL,
  `hash` VARCHAR(32) NULL DEFAULT NULL,
  `phone` VARCHAR(128) NOT NULL,
  `napomena` VARCHAR(1024) NOT NULL,
  `reg_date` DATETIME NOT NULL,
  `active` INTEGER NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'frizer_role'
-- 
-- ---

DROP TABLE IF EXISTS `frizer_role`;
		
CREATE TABLE `frizer_role` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `frizer_role_name` VARCHAR(128) NOT NULL,
  `frizer_role_desc` VARCHAR(256) NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'frizer_radno_vreme'
-- 
-- ---

DROP TABLE IF EXISTS `frizer_radno_vreme`;
		
CREATE TABLE `frizer_radno_vreme` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `frizer_id` INTEGER NOT NULL,
  `salon_id` INTEGER NOT NULL,
  `pon` VARCHAR(255) NOT NULL,
  `uto` VARCHAR(255) NOT NULL,
  `sre` VARCHAR(255) NOT NULL,
  `cet` VARCHAR(255) NOT NULL,
  `pet` VARCHAR(255) NOT NULL,
  `sub` VARCHAR(255) NOT NULL,
  `ned` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'salon_service'
-- 
-- ---

DROP TABLE IF EXISTS `salon_service`;
		
CREATE TABLE `salon_service` (
  `id` INTEGER NOT NULL AUTO_INCREMENT,
  `salon_id` INTEGER NOT NULL,
  `salon_service_name` VARCHAR(128) NOT NULL,
  `salon_service_dur` INTEGER NOT NULL DEFAULT 1,
  `salon_service_price` INTEGER NOT NULL,
  `salon_service_desc` VARCHAR(1024) NULL DEFAULT NULL,
  PRIMARY KEY ()
);

-- ---
-- Table 'salon'
-- 
-- ---

DROP TABLE IF EXISTS `salon`;
		
CREATE TABLE `salon` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `salon_name` VARCHAR(128) NOT NULL,
  `salon_phone` VARCHAR(128) NOT NULL,
  `salon_logo` VARCHAR(256) NOT NULL,
  `salon_address` VARCHAR(256) NOT NULL,
  `salon_pics` VARCHAR(512) NOT NULL,
  `br_frizera` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'zahtev'
-- 
-- ---

DROP TABLE IF EXISTS `zahtev`;
		
CREATE TABLE `zahtev` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `sent_from` VARCHAR(256) NOT NULL,
  `e-mail` VARCHAR(256) NOT NULL,
  `napomena` VARCHAR(512) NOT NULL,
  `date_sent` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'appointment'
-- 
-- ---

DROP TABLE IF EXISTS `appointment`;
		
CREATE TABLE `appointment` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `frizer_id` INTEGER NOT NULL,
  `user_id` INTEGER NOT NULL,
  `datum` DATE NOT NULL,
  `hour` VARCHAR(255) NOT NULL,
  `salon_service_id` INTEGER NULL DEFAULT NULL,
  `length` INTEGER NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `status` INTEGER NOT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Table 'frizer_slobodan'
-- 
-- ---

DROP TABLE IF EXISTS `frizer_slobodan`;
		
CREATE TABLE `frizer_slobodan` (
  `frizer_id` INTEGER NOT NULL,
  `salon_id` INTEGER NOT NULL,
  `datum` DATE NOT NULL,
  `hours` VARCHAR(255) NOT NULL,
  PRIMARY KEY ()
);

-- ---
-- Table 'frizer_salon'
-- 
-- ---

DROP TABLE IF EXISTS `frizer_salon`;
		
CREATE TABLE `frizer_salon` (
  `frizer_id` INTEGER NOT NULL,
  `salon_id` INTEGER NOT NULL,
  PRIMARY KEY ()
);

-- ---
-- Table 'frizer_service'
-- 
-- ---

DROP TABLE IF EXISTS `frizer_service`;
		
CREATE TABLE `frizer_service` (
  `frizer_id` INTEGER NOT NULL,
  `salon_service_id` INTEGER NOT NULL,
  PRIMARY KEY ()
);

-- ---
-- Table 'user_frizer'
-- 
-- ---

DROP TABLE IF EXISTS `user_frizer`;
		
CREATE TABLE `user_frizer` (
  `user_id` INTEGER NOT NULL,
  `frizer_id` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY ()
);

-- ---
-- Table 'user_salon'
-- 
-- ---

DROP TABLE IF EXISTS `user_salon`;
		
CREATE TABLE `user_salon` (
  `user_id` INTEGER NULL DEFAULT NULL,
  `salon_id` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY ()
);

-- ---
-- Table 'frizer_roles'
-- 
-- ---

DROP TABLE IF EXISTS `frizer_roles`;
		
CREATE TABLE `frizer_roles` (
  `frizer_id` INTEGER NULL DEFAULT NULL,
  `frizer_role_id` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY ()
);

-- ---
-- Table 'salon_radno_vreme'
-- 
-- ---

DROP TABLE IF EXISTS `salon_radno_vreme`;
		
CREATE TABLE `salon_radno_vreme` (
  `salon_id` INTEGER NULL DEFAULT NULL,
  `pon` VARCHAR(512) NULL DEFAULT NULL,
  `uto` VARCHAR(512) NULL DEFAULT NULL,
  `sre` VARCHAR(512) NULL DEFAULT NULL,
  `cet` VARCHAR(512) NULL DEFAULT NULL,
  `pet` VARCHAR(512) NULL DEFAULT NULL,
  `sub` VARCHAR(512) NULL DEFAULT NULL,
  `net` VARCHAR(512) NULL DEFAULT NULL,
  PRIMARY KEY ()
);

-- ---
-- Table 'salon_admin'
-- 
-- ---

DROP TABLE IF EXISTS `salon_admin`;
		
CREATE TABLE `salon_admin` (
  `salon_id` INTEGER NULL DEFAULT NULL,
  `manager_id` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY ()
);

-- ---
-- Table 'manager'
-- 
-- ---

DROP TABLE IF EXISTS `manager`;
		
CREATE TABLE `manager` (
  `id` INTEGER NULL AUTO_INCREMENT DEFAULT NULL,
  `name` VARCHAR(128) NULL DEFAULT NULL,
  `email` VARCHAR(256) NULL DEFAULT NULL,
  `lozinka` VARCHAR(256) NULL DEFAULT NULL,
  `hash` VARCHAR(32) NULL DEFAULT NULL,
  `phone` VARCHAR(128) NULL DEFAULT NULL,
  `napomena` VARCHAR(1024) NULL DEFAULT NULL,
  `reg_date` DATETIME NULL DEFAULT NULL,
  `active` INTEGER NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

-- ---
-- Foreign Keys 
-- ---


-- ---
-- Table Properties
-- ---

-- ALTER TABLE `user` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `frizer` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `frizer_role` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `frizer_radno_vreme` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `salon_service` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `salon` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `zahtev` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `appointment` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `frizer_slobodan` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `frizer_salon` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `frizer_service` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `user_frizer` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `user_salon` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `frizer_roles` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `salon_radno_vreme` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `salon_admin` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `manager` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `user` (`id`,`name`,`pic`,`adresa`,`kraj`,`email`,`grad`,`lozinka`,`hash`,`phone`,`interes`,`reg_date`,`active`) VALUES
-- ('','','','','','','','','','','','','');
-- INSERT INTO `frizer` (`id`,`name`,`email`,`lozinka`,`hash`,`phone`,`napomena`,`reg_date`,`active`) VALUES
-- ('','','','','','','','','');
-- INSERT INTO `frizer_role` (`id`,`frizer_role_name`,`frizer_role_desc`) VALUES
-- ('','','');
-- INSERT INTO `frizer_radno_vreme` (`id`,`frizer_id`,`salon_id`,`pon`,`uto`,`sre`,`cet`,`pet`,`sub`,`ned`) VALUES
-- ('','','','','','','','','','');
-- INSERT INTO `salon_service` (`id`,`salon_id`,`salon_service_name`,`salon_service_dur`,`salon_service_price`,`salon_service_desc`) VALUES
-- ('','','','','','');
-- INSERT INTO `salon` (`id`,`salon_name`,`salon_phone`,`salon_logo`,`salon_address`,`salon_pics`,`br_frizera`) VALUES
-- ('','','','','','','');
-- INSERT INTO `zahtev` (`id`,`sent_from`,`e-mail`,`napomena`,`date_sent`) VALUES
-- ('','','','','');
-- INSERT INTO `appointment` (`id`,`frizer_id`,`user_id`,`datum`,`hour`,`salon_service_id`,`length`,`description`,`status`) VALUES
-- ('','','','','','','','','');
-- INSERT INTO `frizer_slobodan` (`frizer_id`,`salon_id`,`datum`,`hours`) VALUES
-- ('','','','');
-- INSERT INTO `frizer_salon` (`frizer_id`,`salon_id`) VALUES
-- ('','');
-- INSERT INTO `frizer_service` (`frizer_id`,`salon_service_id`) VALUES
-- ('','');
-- INSERT INTO `user_frizer` (`user_id`,`frizer_id`) VALUES
-- ('','');
-- INSERT INTO `user_salon` (`user_id`,`salon_id`) VALUES
-- ('','');
-- INSERT INTO `frizer_roles` (`frizer_id`,`frizer_role_id`) VALUES
-- ('','');
-- INSERT INTO `salon_radno_vreme` (`salon_id`,`pon`,`uto`,`sre`,`cet`,`pet`,`sub`,`net`) VALUES
-- ('','','','','','','','');
-- INSERT INTO `salon_admin` (`salon_id`,`manager_id`) VALUES
-- ('','');
-- INSERT INTO `manager` (`id`,`name`,`email`,`lozinka`,`hash`,`phone`,`napomena`,`reg_date`,`active`) VALUES
-- ('','','','','','','','','');