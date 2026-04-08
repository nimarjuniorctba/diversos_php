

-- ============================
-- HORÁRIOS
-- ============================
CREATE TABLE IF NOT EXISTS agenda.mod_horarios (
    hor_id INT AUTO_INCREMENT PRIMARY KEY,
    hor_hora VARCHAR(5) NOT NULL
);

-- Preenche horários de 5 em 5 min 
INSERT INTO agenda.mod_horarios (hor_hora)
WITH RECURSIVE horarios AS (
    SELECT TIME('00:00:00') AS hora
    UNION ALL
    SELECT ADDTIME(hora, '00:05:00')
    FROM horarios
    WHERE hora < '23:55:00'
)
SELECT DATE_FORMAT(hora, '%H:%i') FROM horarios;

-- ============================
-- PISTAS
-- ============================
CREATE TABLE IF NOT EXISTS agenda.mod_pistas (
    pis_id INT AUTO_INCREMENT PRIMARY KEY,
    pis_nome VARCHAR(50) NOT NULL,
    pis_status VARCHAR(1) NOT NULL COMMENT 'a=ativo;i=inativo;e=excluido',
	pis_dt_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP	
);

INSERT INTO agenda.mod_pistas (pis_nome, pis_status) VALUES
('Pista 1', 'a'),
('Pista 2', 'a');

-- ============================
-- SERVIÇOS
-- ============================
CREATE TABLE IF NOT EXISTS agenda.mod_servicos (
    ser_id INT AUTO_INCREMENT PRIMARY KEY,
    ser_nome VARCHAR(100),
    ser_valor DECIMAL(10,2),
    ser_duracao INT,
	ser_cor VARCHAR(7) DEFAULT '#dc3545',
    ser_status VARCHAR(1) DEFAULT 'a' COMMENT 'a=ativo;i=inativo;e=excluido',
	ser_dt_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP	
);


-- ============================
-- CLIENTES
-- ============================
CREATE TABLE IF NOT EXISTS agenda.mod_clientes (
    cli_id INT AUTO_INCREMENT PRIMARY KEY,
    cli_nome VARCHAR(100),
    cli_email VARCHAR(100),
    cli_status VARCHAR(1) DEFAULT 'a' COMMENT 'a=ativo;i=inativo;e=excluido',
	cli_dt_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);


-- ============================
-- COMENTÁRIOS
-- ============================
CREATE TABLE IF NOT EXISTS agenda.mod_comentario (
    com_id INT AUTO_INCREMENT PRIMARY KEY,
    com_comentario VARCHAR(255),
    com_status VARCHAR(1) DEFAULT 'a' COMMENT 'a=ativo;i=inativo;e=excluido',
	cli_id_fk INT COMMENT 'mod_clientes',
	vei_id_fk INT COMMENT 'mod_veiculos',
	age_id_fk INT COMMENT 'mod_agendamentos',
	com_dt_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);


-- ============================
-- VEICULOS
-- ============================
CREATE TABLE mod_veiculos (
    vei_id INT AUTO_INCREMENT PRIMARY KEY,
    vei_placa VARCHAR(10) NOT NULL,
    vei_modelo VARCHAR(100),
    vei_marca VARCHAR(100),
    vei_cor VARCHAR(50),
    vei_status VARCHAR(1) DEFAULT 'a' COMMENT 'a=ativo;i=inativo;e=excluido',
	cli_id_fk INT NOT NULL  COMMENT 'mod_clientes',
	vei_dt_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP	
);

-- ============================
-- AGENDAMENTOS
-- ============================
CREATE TABLE IF NOT EXISTS agenda.mod_agendamentos (
    age_id INT AUTO_INCREMENT PRIMARY KEY,
    age_data DATE NOT NULL,
    age_status VARCHAR(1) DEFAULT 'a',
    age_desconto DECIMAL(10,2),
    age_valor_final DECIMAL(10,2),
	age_hora_inicio_fk INT COMMENT 'mod_horarios',
    age_hora_fim_fk INT COMMENT 'mod_horarios',
    pis_id_fk INT COMMENT 'mod_pistas',
    ser_id_fk INT COMMENT 'mod_servicos',
    cli_id_fk INT COMMENT 'mod_clientes',	
    com_id_fk INT COMMENT 'mod_comentarios',
	vei_id_fk INT COMMENT 'mod_veiculos',
    age_dt_cadastro DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP	

);