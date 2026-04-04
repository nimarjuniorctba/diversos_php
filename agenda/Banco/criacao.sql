


CREATE TABLE IF NOT EXISTS agenda.mod_horarios ( 
	hor_id SERIAL NOT NULL, 
	hor_hora VARCHAR(5) NOT NULL, 
	PRIMARY KEY (hor_id)) 
	ENGINE = InnoDB;
	
-- preenche a tabela 

INSERT INTO `agenda`.`mod_horarios` (`hor_hora`)
WITH RECURSIVE horarios AS (
    SELECT TIME('00:00:00') AS hora
    UNION ALL
    SELECT ADDTIME(hora, '00:05:00')
    FROM horarios
    WHERE hora < '23:55:00'
)
SELECT DATE_FORMAT(hora, '%H:%i') FROM horarios;

-- -----------------------------------


CREATE TABLE IF NOT EXISTS agenda.mod_pistas ( 
pis_id SERIAL NOT NULL, 
pis_nome VARCHAR(50) NOT NULL, 
pis_status VARCHAR(1) NOT NULL, 
PRIMARY KEY (pis_id)) 
ENGINE = InnoDB;

-- preenche a tabela
INSERT INTO agenda.mod_pistas (pis_nome, pis_status) VALUES
('Pista 1', 'A'),
('Pista 2', 'A');
-- -----------------------------------


CREATE TABLE servicos (
    ser_id INT AUTO_INCREMENT PRIMARY KEY,
    ser_nome VARCHAR(100),
    ser_duracao INT -- duração em minutos
);


-- preenche a tabela
INSERT INTO servicos (ser_nome, ser_duracao) VALUES
('Lavagem Simples', 30),
('Lavagem Completa', 60),
('Polimento', 120);

-- -----------------------------------

CREATE TABLE mod_agendamentos ( 
age_id INT AUTO_INCREMENT PRIMARY KEY, 
data DATE, 
hora_id_fk INT, 
pis_id_fk INT, 
ser_id_fk INT, 
cli_id_fk int );


CREATE TABLE mod_clientes ( 
cli_id INT AUTO_INCREMENT PRIMARY KEY, 
cli_nome VARCHAR(100), 
cli_email VARCHAR(100) 
);

INSERT INTO mod_clientes (cli_nome, cli_email) VALUES
('João Silva', 'joao.silva@gmail.com'),
('Maria Oliveira', 'maria.oliveira@gmail.com'),
('Carlos Souza', 'carlos.souza@gmail.com'),
('Ana Pereira', 'ana.pereira@gmail.com'),
('Lucas Santos', 'lucas.santos@gmail.com'),
('Fernanda Costa', 'fernanda.costa@gmail.com'),
('Bruno Almeida', 'bruno.almeida@gmail.com'),
('Juliana Rocha', 'juliana.rocha@gmail.com'),
('Rafael Martins', 'rafael.martins@gmail.com'),
('Camila Ferreira', 'camila.ferreira@gmail.com');

