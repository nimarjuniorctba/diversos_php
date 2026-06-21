
-- -----------------------------------------------------
-- Table `okmotoboyexpress`.`mod_empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `okmotoboyexpress`.`mod_empresas` (
  `emp_id` SERIAL  NOT NULL,
  `emp_tipo_cad` VARCHAR(1) NOT NULL COMMENT 'f=fisico;j=juridico',
  `emp_pf_nome` VARCHAR(255) NULL,
  `emp_pf_cpf` VARCHAR(15) NULL,
  `emp_pf_dt_nascimento` VARCHAR(10) NULL,
  `emp_pj_cnpj` VARCHAR(18) NULL,
  `emp_pj_fantasia` VARCHAR(255) NULL,
  `emp_pj_razao` VARCHAR(255) NULL,
  `emp_pj_ie` VARCHAR(50) NULL,
  `emp_pj_ie_isento` VARCHAR(1) NULL,
  `emp_pj_responsavel` VARCHAR(255) NULL,
  `emp_end_cep` VARCHAR(10) NULL,
  `emp_end_rua` VARCHAR(255) NULL,
  `emp_end_numero` VARCHAR(10) NULL,
  `emp_end_complemento` VARCHAR(50) NULL,
  `emp_end_bairro` VARCHAR(100) NULL,
  `emp_end_cidade` VARCHAR(255) NULL,
  `emp_end_estado` VARCHAR(2) NULL,
  `emp_telefone` VARCHAR(15) NULL,
  `emp_celular` VARCHAR(15) NULL,
  `emp_facebook` VARCHAR(255) NULL,
  `emp_instagram` VARCHAR(255) NULL,
  `emp_email` VARCHAR(255) NULL,
  `emp_validade_sistema` DATE NOT NULL,
  `emp_dt_cadastro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emp_status` VARCHAR(1) NOT NULL  DEFAULT 'a' COMMENT 'a=ativo;i=inativo;e=excluido',
  `emp_admin` INT NOT NULL,
  PRIMARY KEY (`emp_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `okmotoboyexpress`.`mod_empresa_admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `okmotoboyexpress`.`mod_empresa_admin` (
  `ema_id` SERIAL NOT NULL,
  `ema_nome` VARCHAR(255) NULL,
  `ema_email` VARCHAR(255) NOT NULL,
  `ema_senha` VARCHAR(255) NOT NULL,
  `ema_status` VARCHAR(1) NOT NULL DEFAULT 'a' COMMENT 'a=ativo;i=inativo;e=excluido',
  `ema_dt_cadastro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `emp_id_fk` INT NOT NULL COMMENT 'mod_empresas',
  PRIMARY KEY (`ema_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `okmotoboyexpress`.`mod_clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `okmotoboyexpress`.`mod_clientes` (
  `cli_id` SERIAL NOT NULL,
  `cli_tipo_cad` VARCHAR(1) NOT NULL COMMENT 'f=fisico;j=juridico',
  `cli_pf_nome` VARCHAR(255) NULL,
  `cli_pf_cpf` VARCHAR(14) NULL,
  `cli_pf_dt_nascimento` VARCHAR(10) NULL,
  `cli_pj_cnpj` VARCHAR(18) NULL,
  `cli_pj_fantasia` VARCHAR(255) NULL,
  `cli_pj_razao` VARCHAR(255) NULL,
  `cli_pj_ie` VARCHAR(45) NULL,
  `cli_pj_ie_isento` VARCHAR(45) NULL,
  `cli_pj_responsavel` VARCHAR(255) NULL,
  `cli_telefone` VARCHAR(15) NULL,
  `cli_celular` VARCHAR(15) NULL,
  `cli_facebook` VARCHAR(255) NULL,
  `cli_instagram` VARCHAR(255) NULL,
  `cli_email` VARCHAR(255) NULL,
  `cli_dt_cadastro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cli_status` VARCHAR(1) NOT NULL DEFAULT 'a' COMMENT 'a=ativo;i=inativo;e=excluido',
  `cli_admin` INT NOT NULL COMMENT 'mod_empresas_admin',
  `emp_id_fk` INT NOT NULL COMMENT 'mod_empresas',
  PRIMARY KEY (`cli_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `okmotoboyexpress`.`mod_sistema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `okmotoboyexpress`.`mod_sistema` (
  `sis_id` SERIAL NOT NULL,
  `sis_cnpj` VARCHAR(18) NULL,
  `sis_nome_fantasia` VARCHAR(255) NULL,
  `sis_razao` VARCHAR(255) NULL,
  `sis_ie` VARCHAR(50) NULL,
  `sis_ie_isento` VARCHAR(1) NULL,
  `sis_responsavel` VARCHAR(255) NULL,
  `sis_end_cep` VARCHAR(10) NULL,
  `sis_end_rua` VARCHAR(255) NULL,
  `sis_end_numero` VARCHAR(10) NULL,
  `sis_end_complemento` VARCHAR(50) NULL,
  `sis_end_bairro` VARCHAR(100) NULL,
  `sis_end_cidade` VARCHAR(255) NULL,
  `sis_end_estado` VARCHAR(2) NULL,
  `emp_telefone` VARCHAR(15) NULL,
  `sis_celular` VARCHAR(15) NULL,
  `sis_whatsapp` VARCHAR(15) NULL,
  `sis_facebook` VARCHAR(255) NULL,
  `sis_instagram` VARCHAR(255) NULL,
  `sis_email` VARCHAR(255) NULL,
  `sis_dt_cadastro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sis_status` VARCHAR(1) NOT NULL COMMENT 'a=ativo;i=inativo;e=excluido',
  PRIMARY KEY (`sis_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `okmotoboyexpress`.`mod_administrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `okmotoboyexpress`.`mod_administradores` (
  `adm_id` SERIAL NOT NULL,
  `adm_nome` VARCHAR(255) NULL,
  `adm_email` VARCHAR(255) NOT NULL,
  `adm_senha` VARCHAR(255) NOT NULL,
  `adm_status` VARCHAR(1) NOT NULL DEFAULT 'a' COMMENT 'a=ativo;i=inativo;e=excluido',
  `adm_dt_cadastro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`adm_id`))
ENGINE = InnoDB;



-- -----------------------------------------------------------
INSERT INTO `mod_administradores` ( `adm_nome`, `adm_email`, `adm_senha`, `adm_status`, `adm_dt_cadastro`) 
VALUES ('Admin', 'admin@gmail.com', '123456', 'a', current_timestamp());


--------------------------------------------------------------


CREATE TABLE IF NOT EXISTS `okmotoboyexpress`.mod_localizacao (

	loc_id INT AUTO_INCREMENT PRIMARY KEY,
	loc_latitude DECIMAL(10,8),
	loc_longitude DECIMAL(11,8),
	loc_velocidade FLOAT,
	loc_dt_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	con_id_fk INT NOT NULL COMMENT 'mod_condutor'

);


CREATE TABLE IF NOT EXISTS `okmotoboyexpress`.mod_condutor (

	con_id INT AUTO_INCREMENT PRIMARY KEY,
	con_nome VARCHAR(100) NULL,
	con_telefone VARCHAR(20) NULL,
	con_email VARCHAR(100) NULL,
	con_placa VARCHAR(10) NULL,
	con_senha VARCHAR(100) NULL,
	con_cad_status ENUM('a','i','e') DEFAULT 'a' COMMENT 'a=ativo;i=inativo;e=excluido;',
	con_app_status ENUM('a','i') DEFAULT 'i' COMMENT 'a=ativo app;i=inativo app;',	
	con_dt_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP

);