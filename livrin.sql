-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema livrin
-- -----------------------------------------------------
-- Meu BD para guardar os livrod de casa

-- -----------------------------------------------------
-- Schema livrin
--
-- Meu BD para guardar os livrod de casa
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `livrin` DEFAULT CHARACTER SET utf8 ;
USE `livrin` ;

-- -----------------------------------------------------
-- Table `livrin`.`tb_autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `livrin`.`tb_autor` (
  `id_autor` INT NOT NULL AUTO_INCREMENT,
  `ds_nome_autor` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id_autor`),
  UNIQUE INDEX `ds_nome_UNIQUE` (`ds_nome_autor` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `livrin`.`tb_dono`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `livrin`.`tb_dono` (
  `id_dono` INT NOT NULL AUTO_INCREMENT,
  `ds_nome_dono` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id_dono`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `livrin`.`tb_livro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `livrin`.`tb_livro` (
  `id_livro` INT NOT NULL AUTO_INCREMENT,
  `ds_titulo` VARCHAR(30) NOT NULL,
  `tb_autor_id_autor` INT NOT NULL,
  `tb_dono_id_dono` INT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_livro`),
  UNIQUE INDEX `id_livro_UNIQUE` (`id_livro` ASC),
  INDEX `fk_tb_livro_tb_autor_idx` (`tb_autor_id_autor` ASC),
  INDEX `fk_tb_livro_tb_dono1_idx` (`tb_dono_id_dono` ASC),
  CONSTRAINT `fk_tb_livro_tb_autor`
    FOREIGN KEY (`tb_autor_id_autor`)
    REFERENCES `livrin`.`tb_autor` (`id_autor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_livro_tb_dono1`
    FOREIGN KEY (`tb_dono_id_dono`)
    REFERENCES `livrin`.`tb_dono` (`id_dono`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
