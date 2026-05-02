CREATE DATABASE placacheck;
USE placacheck;

CREATE TABLE users(id INT AUTO_INCREMENT PRIMARY KEY,nome VARCHAR(100),email VARCHAR(100),senha VARCHAR(255),ativo TINYINT DEFAULT 1,is_admin TINYINT DEFAULT 0);
CREATE TABLE groups(id INT AUTO_INCREMENT PRIMARY KEY,nome VARCHAR(100),created_by INT);
CREATE TABLE group_users(id INT AUTO_INCREMENT PRIMARY KEY,user_id INT,group_id INT);
CREATE TABLE vehicles(id INT AUTO_INCREMENT PRIMARY KEY,group_id INT,plate VARCHAR(20),notes TEXT);

INSERT INTO users(nome,email,senha,is_admin) VALUES('Admin','teste@gmail.com',MD5('123456'),1);
