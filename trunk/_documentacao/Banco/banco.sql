SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `banco_helpdesk` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `banco_helpdesk`;

-- -----------------------------------------------------
-- Table `banco_helpdesk`.`setores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `banco_helpdesk`.`setores` ;

CREATE  TABLE IF NOT EXISTS `banco_helpdesk`.`setores` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `banco_helpdesk`.`grupos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `banco_helpdesk`.`grupos` ;

CREATE  TABLE IF NOT EXISTS `banco_helpdesk`.`grupos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `banco_helpdesk`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `banco_helpdesk`.`usuarios` ;

CREATE  TABLE IF NOT EXISTS `banco_helpdesk`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `grupo_id` INT NOT NULL ,
  `setor_id` INT NOT NULL ,
  `matricula` VARCHAR(20) NOT NULL COMMENT 'É o número de matrícula do funcionário ou um outro valor caso seja um usuário externo	' ,
  `nome` VARCHAR(150) NOT NULL ,
  `senha` VARCHAR(50) NOT NULL ,
  `email` VARCHAR(150) NOT NULL ,
  `celular` VARCHAR(20) NULL ,
  `telefone` VARCHAR(20) NULL ,
  `ramal` VARCHAR(10) NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_usuarios_grupos`
    FOREIGN KEY (`grupo_id` )
    REFERENCES `banco_helpdesk`.`grupos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_setores`
    FOREIGN KEY (`setor_id` )
    REFERENCES `banco_helpdesk`.`setores` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = MyISAM;

CREATE INDEX `fk_usuarios_grupos` ON `banco_helpdesk`.`usuarios` (`grupo_id` ASC) ;

CREATE INDEX `fk_usuarios_setores` ON `banco_helpdesk`.`usuarios` (`setor_id` ASC) ;


-- -----------------------------------------------------
-- Table `banco_helpdesk`.`prioridades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `banco_helpdesk`.`prioridades` ;

CREATE  TABLE IF NOT EXISTS `banco_helpdesk`.`prioridades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  `tempo_maximo` INT NOT NULL ,
  `unidade_tempo` INT NOT NULL COMMENT '1-Minuto; 2-Hora; 3-Dia	\n' ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `banco_helpdesk`.`status`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `banco_helpdesk`.`status` ;

CREATE  TABLE IF NOT EXISTS `banco_helpdesk`.`status` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `banco_helpdesk`.`problemas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `banco_helpdesk`.`problemas` ;

CREATE  TABLE IF NOT EXISTS `banco_helpdesk`.`problemas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = MyISAM;


-- -----------------------------------------------------
-- Table `banco_helpdesk`.`sub_problemas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `banco_helpdesk`.`sub_problemas` ;

CREATE  TABLE IF NOT EXISTS `banco_helpdesk`.`sub_problemas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `problema_id` INT NOT NULL ,
  `descricao` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_sub_problemas_problemas`
    FOREIGN KEY (`problema_id` )
    REFERENCES `banco_helpdesk`.`problemas` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = MyISAM;

CREATE INDEX `fk_sub_problemas_problemas` ON `banco_helpdesk`.`sub_problemas` (`problema_id` ASC) ;


-- -----------------------------------------------------
-- Table `banco_helpdesk`.`chamados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `banco_helpdesk`.`chamados` ;

CREATE  TABLE IF NOT EXISTS `banco_helpdesk`.`chamados` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `sub_problema_id` INT NOT NULL ,
  `usuario_id` INT NOT NULL ,
  `data_abertura` DATE NOT NULL ,
  `hora_abertura` TIME NOT NULL ,
  `descricao_problema` LONGTEXT NOT NULL ,
  `descricao_solucao` LONGTEXT NULL ,
  `prioridade_id` INT NOT NULL ,
  `status_id` INT NOT NULL ,
  `data_limite` DATE NOT NULL ,
  `hora_limite` TIME NOT NULL ,
  `data_fechamento` DATE NULL ,
  `hora_fechamento` TIME NULL ,
  `responsavel_id` INT NULL COMMENT 'Usuário (Atendente, Técnico ou outro) que será responsável pelo Chamado' ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_chamados_prioridades`
    FOREIGN KEY (`prioridade_id` )
    REFERENCES `banco_helpdesk`.`prioridades` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_chamados_status`
    FOREIGN KEY (`status_id` )
    REFERENCES `banco_helpdesk`.`status` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_chamados_sub_problemas`
    FOREIGN KEY (`sub_problema_id` )
    REFERENCES `banco_helpdesk`.`sub_problemas` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_chamados_usuarios`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `banco_helpdesk`.`usuarios` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_chamados_usuarios1`
    FOREIGN KEY (`responsavel_id` )
    REFERENCES `banco_helpdesk`.`usuarios` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = MyISAM;

CREATE INDEX `fk_chamados_prioridades` ON `banco_helpdesk`.`chamados` (`prioridade_id` ASC) ;

CREATE INDEX `fk_chamados_status` ON `banco_helpdesk`.`chamados` (`status_id` ASC) ;

CREATE INDEX `fk_chamados_sub_problemas` ON `banco_helpdesk`.`chamados` (`sub_problema_id` ASC) ;

CREATE INDEX `fk_chamados_usuarios` ON `banco_helpdesk`.`chamados` (`usuario_id` ASC) ;

CREATE INDEX `fk_chamados_usuarios1` ON `banco_helpdesk`.`chamados` (`responsavel_id` ASC) ;


-- -----------------------------------------------------
-- Table `banco_helpdesk`.`avaliacoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `banco_helpdesk`.`avaliacoes` ;

CREATE  TABLE IF NOT EXISTS `banco_helpdesk`.`avaliacoes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `data` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  `nivel` INT NOT NULL ,
  `chamado_id` INT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_avaliacoes_chamados`
    FOREIGN KEY (`chamado_id` )
    REFERENCES `banco_helpdesk`.`chamados` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = MyISAM;

CREATE INDEX `fk_avaliacoes_chamados` ON `banco_helpdesk`.`avaliacoes` (`chamado_id` ASC) ;


-- -----------------------------------------------------
-- Table `banco_helpdesk`.`chamado_historicos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `banco_helpdesk`.`chamado_historicos` ;

CREATE  TABLE IF NOT EXISTS `banco_helpdesk`.`chamado_historicos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `data` DATE NOT NULL ,
  `hora` TIME NOT NULL ,
  `chamado_id` INT NOT NULL ,
  `usuario_id` INT NOT NULL ,
  `descricao` TEXT NULL ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_chamado_historicos_chamados`
    FOREIGN KEY (`chamado_id` )
    REFERENCES `banco_helpdesk`.`chamados` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_chamado_historicos_usuarios`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `banco_helpdesk`.`usuarios` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = MyISAM;

CREATE INDEX `fk_chamado_historicos_chamados` ON `banco_helpdesk`.`chamado_historicos` (`chamado_id` ASC) ;

CREATE INDEX `fk_chamado_historicos_usuarios` ON `banco_helpdesk`.`chamado_historicos` (`usuario_id` ASC) ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
