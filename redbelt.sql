-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
-- -----------------------------------------------------
-- Schema redbelt
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema redbelt
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `redbelt` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `description` TEXT NULL COMMENT '',
  `name` VARCHAR(45) NULL COMMENT '',
  `price` INT NULL COMMENT '',
  `created_at` DATETIME NULL COMMENT '',
  `updated_at` DATETIME NULL COMMENT '',
  `picture_link` VARCHAR(45) NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT COMMENT '',
  `first_name` VARCHAR(45) NULL COMMENT '',
  `last_name` VARCHAR(45) NULL COMMENT '',
  `email` VARCHAR(45) NULL COMMENT '',
  `password` VARCHAR(45) NULL COMMENT '',
  `street_address` VARCHAR(255) NULL COMMENT '',
  `city` VARCHAR(45) NULL COMMENT '',
  `state` VARCHAR(45) NULL COMMENT '',
  `zip` INT NULL COMMENT '',
  `card` INT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB;

USE `redbelt` ;

-- -----------------------------------------------------
-- Table `redbelt`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redbelt`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `first_name` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `last_name` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `email` VARCHAR(45) NULL DEFAULT NULL COMMENT '',
  `password` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `created_at` DATETIME NULL DEFAULT NULL COMMENT '',
  `updated_at` DATETIME NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `redbelt`.`travels`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redbelt`.`travels` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `destination` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  `start_date` DATE NULL DEFAULT NULL COMMENT '',
  `end_date` DATE NULL DEFAULT NULL COMMENT '',
  `created_at` DATETIME NULL DEFAULT NULL COMMENT '',
  `updated_at` DATETIME NULL DEFAULT NULL COMMENT '',
  `user_id` INT(11) NOT NULL COMMENT '',
  `plan` VARCHAR(255) NULL DEFAULT NULL COMMENT '',
  PRIMARY KEY (`id`, `user_id`)  COMMENT '',
  INDEX `fk_travels_users_idx` (`user_id` ASC)  COMMENT '',
  CONSTRAINT `fk_travels_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `redbelt`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `redbelt`.`travelers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `redbelt`.`travelers` (
  `travel_id` INT(11) NOT NULL COMMENT '',
  `user_ids` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`travel_id`, `user_ids`)  COMMENT '',
  INDEX `fk_travels_has_users_users1_idx` (`user_ids` ASC)  COMMENT '',
  INDEX `fk_travels_has_users_travels1_idx` (`travel_id` ASC)  COMMENT '',
  CONSTRAINT `fk_travels_has_users_travels1`
    FOREIGN KEY (`travel_id`)
    REFERENCES `redbelt`.`travels` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_travels_has_users_users1`
    FOREIGN KEY (`user_ids`)
    REFERENCES `redbelt`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
