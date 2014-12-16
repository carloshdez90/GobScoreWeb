SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `gsdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `gsdb` ;

-- -----------------------------------------------------
-- Table `gsdb`.`delation_institutions`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gsdb`.`delation_institutions` (
  `id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `slug` VARCHAR(45) NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gsdb`.`delation_infos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gsdb`.`delation_infos` (
  `id` INT NOT NULL ,
  `email` VARCHAR(255) NULL ,
  `kind` TEXT NULL ,
  `phone` VARCHAR(45) NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `sms_key` VARCHAR(255) NULL ,
  `delation_institutions_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `delation_institutions_id`) ,
  INDEX `fk_delation_infos_delation_institutions` (`delation_institutions_id` ASC) ,
  CONSTRAINT `fk_delation_infos_delation_institutions`
    FOREIGN KEY (`delation_institutions_id` )
    REFERENCES `gsdb`.`delation_institutions` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gsdb`.`delations`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gsdb`.`delations` (
  `id` INT NOT NULL ,
  `name` VARCHAR(255) NULL ,
  `dui` VARCHAR(45) NULL ,
  `email` VARCHAR(255) NULL ,
  `message` TEXT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `opened_at` TIMESTAMP NULL ,
  `title` VARCHAR(255) NULL ,
  `secret_key` VARCHAR(255) NULL ,
  `phone` VARCHAR(45) NULL ,
  `delation_infos_id` INT NOT NULL ,
  `delation_infos_delation_institutions_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `delation_infos_id`, `delation_infos_delation_institutions_id`) ,
  INDEX `fk_delations_delation_infos1` (`delation_infos_id` ASC, `delation_infos_delation_institutions_id` ASC) ,
  CONSTRAINT `fk_delations_delation_infos1`
    FOREIGN KEY (`delation_infos_id` , `delation_infos_delation_institutions_id` )
    REFERENCES `gsdb`.`delation_infos` (`id` , `delation_institutions_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gsdb`.`institution_answers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `gsdb`.`institution_answers` (
  `id` INT NOT NULL ,
  `title` TEXT NULL ,
  `message` TEXT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `delations_id` INT NOT NULL ,
  `delations_delation_infos_id` INT NOT NULL ,
  `delations_delation_infos_delation_institutions_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `delations_id`, `delations_delation_infos_id`, `delations_delation_infos_delation_institutions_id`) ,
  INDEX `fk_institution_answers_delations1` (`delations_id` ASC, `delations_delation_infos_id` ASC, `delations_delation_infos_delation_institutions_id` ASC) ,
  CONSTRAINT `fk_institution_answers_delations1`
    FOREIGN KEY (`delations_id` , `delations_delation_infos_id` , `delations_delation_infos_delation_institutions_id` )
    REFERENCES `gsdb`.`delations` (`id` , `delation_infos_id` , `delation_infos_delation_institutions_id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
