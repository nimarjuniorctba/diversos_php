-- ============================
-- 🔹 HORÁRIOS
-- ============================
CREATE TABLE IF NOT EXISTS agenda.mod_horarios (
    hor_id INT AUTO_INCREMENT PRIMARY KEY,
    hor_hora VARCHAR(5) NOT NULL
) ENGINE=InnoDB;

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
-- 🔹 PISTAS
-- ============================
CREATE TABLE IF NOT EXISTS agenda.mod_pistas (
    pis_id INT AUTO_INCREMENT PRIMARY KEY,
    pis_nome VARCHAR(50) NOT NULL,
    pis_status VARCHAR(1) NOT NULL
) ENGINE=InnoDB;

INSERT INTO agenda.mod_pistas (pis_nome, pis_status) VALUES
('Pista 1', 'A'),
('Pista 2', 'A');

-- ============================
-- 🔹 SERVIÇOS
-- ============================
CREATE TABLE IF NOT EXISTS agenda.servicos (
    ser_id INT AUTO_INCREMENT PRIMARY KEY,
    ser_nome VARCHAR(100),
    ser_valor DECIMAL(10,2),
    ser_duracao INT
) ENGINE=InnoDB;

INSERT INTO agenda.servicos (ser_nome, ser_valor, ser_duracao) VALUES
('Lavagem Simples', 30.00, 30),
('Lavagem Completa', 50.00, 60),
('Polimento', 120.00, 120);

-- ============================
-- 🔹 CLIENTES
-- ============================
CREATE TABLE IF NOT EXISTS agenda.mod_clientes (
    cli_id INT AUTO_INCREMENT PRIMARY KEY,
    cli_nome VARCHAR(100),
    cli_email VARCHAR(100)
) ENGINE=InnoDB;

INSERT INTO agenda.mod_clientes (cli_nome, cli_email) VALUES
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

-- ============================
-- 🔹 COMENTÁRIOS
-- ============================
CREATE TABLE IF NOT EXISTS agenda.mod_comentario (
    com_id INT AUTO_INCREMENT PRIMARY KEY,
    com_comentario VARCHAR(255),
    com_status VARCHAR(1) DEFAULT 'a'
) ENGINE=InnoDB;

-- ============================
-- 🔹 AGENDAMENTOS
-- ============================
CREATE TABLE IF NOT EXISTS agenda.mod_agendamentos (
    age_id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE,
    hora_id_fk INT,
    pis_id_fk INT,
    ser_id_fk INT,
    cli_id_fk INT,
    age_status VARCHAR(1) DEFAULT 'a',
    age_desconto DECIMAL(10,2),
    age_valor_final DECIMAL(10,2),
    com_id_fk INT,

    FOREIGN KEY (hora_id_fk) REFERENCES mod_horarios(hor_id),
    FOREIGN KEY (pis_id_fk) REFERENCES mod_pistas(pis_id),
    FOREIGN KEY (ser_id_fk) REFERENCES servicos(ser_id),
    FOREIGN KEY (cli_id_fk) REFERENCES mod_clientes(cli_id),
    FOREIGN KEY (com_id_fk) REFERENCES mod_comentario(com_id)

) ENGINE=InnoDB;