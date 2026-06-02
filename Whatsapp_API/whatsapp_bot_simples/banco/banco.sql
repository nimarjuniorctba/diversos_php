CREATE DATABASE whatsapp_teste;
USE whatsapp_teste;

CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    telefone VARCHAR(20)
);

CREATE TABLE agendamentos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    data_agendamento DATETIME,
    status VARCHAR(20)
);

INSERT INTO clientes
(nome, telefone)
VALUES
('João', '5541999999999');

INSERT INTO agendamentos
(cliente_id,data_agendamento,status)
VALUES
(1,'2026-06-10 14:00:00','Agendado');

INSERT INTO agendamentos
(cliente_id,data_agendamento,status)
VALUES
(1,'2026-06-15 09:00:00','Agendado');