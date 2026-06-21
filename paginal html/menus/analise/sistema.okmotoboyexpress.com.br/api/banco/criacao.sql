CREATE DATABASE rastreador;

USE rastreador;

CREATE TABLE IF NOT EXISTS mod_localizacao (

	loc_id INT AUTO_INCREMENT PRIMARY KEY,
	loc_latitude DECIMAL(10,8),
	loc_longitude DECIMAL(11,8),
	loc_velocidade FLOAT,
	loc_dt_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	con_id_fk INT NOT NULL COMMENT 'mod_condutor'

);


CREATE TABLE IF NOT EXISTS mod_condutor (

	con_id INT AUTO_INCREMENT PRIMARY KEY,
	con_nome VARCHAR(100) NULL,
	con_telefone VARCHAR(20) NULL,
	con_placa VARCHAR(10) NULL,
	con_senha VARCHAR(100) NULL,
	con_cad_status ENUM('a','i','e') DEFAULT 'a' COMMENT 'a=ativo;i=inativo;e=excluido;',
	con_app_status ENUM('a','i') DEFAULT 'a' COMMENT 'a=ativo app;i=inativo app;',	
	con_dt_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP

);