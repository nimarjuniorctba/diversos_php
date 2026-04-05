

-- =====================================================
-- 1️⃣ EMPRESAS (5)
-- =====================================================

INSERT INTO mod_empresas 
(emp_tipo_cad, emp_pj_cnpj, emp_pj_fantasia, emp_pj_razao, 
 emp_end_cidade, emp_end_estado, emp_email, emp_validade_sistema, emp_admin)
VALUES
('j','12.345.678/0001-01','Pet Vida Curitiba','Pet Vida Curitiba LTDA','Curitiba','PR','contato@petvidacuritiba.com','2026-12-31',1),
('j','23.456.789/0001-02','Amigo Fiel Petshop','Amigo Fiel Petshop LTDA','São Paulo','SP','contato@amigofiel.com','2026-12-31',1),
('j','34.567.890/0001-03','Mundo Animal Center','Mundo Animal Center LTDA','Belo Horizonte','MG','contato@mundoanimal.com','2026-12-31',1),
('j','45.678.901/0001-04','Vida Pet Clínica','Vida Pet Clínica LTDA','Porto Alegre','RS','contato@vidapet.com','2026-12-31',1),
('j','56.789.012/0001-05','Cantinho do Pet','Cantinho do Pet LTDA','Florianópolis','SC','contato@cantinhodopet.com','2026-12-31',1);

-- =====================================================
-- 2️⃣ USUÁRIOS (2 por empresa)
-- =====================================================

INSERT INTO mod_empresa_admin (ema_nome, ema_email, ema_senha, emp_id_fk) VALUES
('Carlos Eduardo Lima','carlos@petvidacuritiba.com','123456',1),
('Fernanda Souza Martins','fernanda@petvidacuritiba.com','123456',1),
('Ricardo Almeida','ricardo@amigofiel.com','123456',2),
('Juliana Costa','juliana@amigofiel.com','123456',2),
('Marcos Vinicius Rocha','marcos@mundoanimal.com','123456',3),
('Patrícia Gomes','patricia@mundoanimal.com','123456',3),
('André Luiz Batista','andre@vidapet.com','123456',4),
('Camila Fernandes','camila@vidapet.com','123456',4),
('Thiago Henrique Silva','thiago@cantinhodopet.com','123456',5),
('Larissa Oliveira','larissa@cantinhodopet.com','123456',5);

-- =====================================================
-- 3️⃣ CLIENTES (50)
-- =====================================================

INSERT INTO mod_clientes 
(cli_tipo_cad, cli_pf_nome, cli_pf_cpf, cli_email, cli_admin, emp_id_fk)
VALUES
-- EMPRESA 1
('f','João Pedro da Silva','111.111.111-01','joao1@email.com',1,1),
('f','Maria Clara Souza','111.111.111-02','maria1@email.com',2,1),
('f','Lucas Gabriel Oliveira','111.111.111-03','lucas1@email.com',1,1),
('f','Ana Beatriz Costa','111.111.111-04','ana1@email.com',2,1),
('f','Gabriel Mendes','111.111.111-05','gabriel1@email.com',1,1),
('f','Isabela Rodrigues','111.111.111-06','isabela1@email.com',2,1),
('f','Rafael Martins','111.111.111-07','rafael1@email.com',1,1),
('f','Larissa Almeida','111.111.111-08','larissa1@email.com',2,1),
('f','Felipe Santos','111.111.111-09','felipe1@email.com',1,1),
('f','Bruna Carvalho','111.111.111-10','bruna1@email.com',2,1),

-- EMPRESA 2
('f','Paulo Henrique','222.111.111-01','paulo2@email.com',3,2),
('f','Mariana Lopes','222.111.111-02','mariana2@email.com',4,2),
('f','Diego Araujo','222.111.111-03','diego2@email.com',3,2),
('f','Camila Ribeiro','222.111.111-04','camila2@email.com',4,2),
('f','Renato Pires','222.111.111-05','renato2@email.com',3,2),
('f','Tatiane Freitas','222.111.111-06','tatiane2@email.com',4,2),
('f','Eduardo Nogueira','222.111.111-07','eduardo2@email.com',3,2),
('f','Amanda Teixeira','222.111.111-08','amanda2@email.com',4,2),
('f','Vinicius Moraes','222.111.111-09','vinicius2@email.com',3,2),
('f','Carolina Duarte','222.111.111-10','carolina2@email.com',4,2),

-- EMPRESA 3
('f','Gustavo Barbosa','333.111.111-01','gustavo3@email.com',5,3),
('f','Aline Moreira','333.111.111-02','aline3@email.com',6,3),
('f','Leonardo Vieira','333.111.111-03','leo3@email.com',5,3),
('f','Beatriz Melo','333.111.111-04','bia3@email.com',6,3),
('f','Henrique Farias','333.111.111-05','henrique3@email.com',5,3),
('f','Sabrina Castro','333.111.111-06','sabrina3@email.com',6,3),
('f','Igor Tavares','333.111.111-07','igor3@email.com',5,3),
('f','Natália Monteiro','333.111.111-08','natalia3@email.com',6,3),
('f','Daniel Cardoso','333.111.111-09','daniel3@email.com',5,3),
('f','Vanessa Lima','333.111.111-10','vanessa3@email.com',6,3),

-- EMPRESA 4
('f','Rodrigo Alves','444.111.111-01','rodrigo4@email.com',7,4),
('f','Camila Rocha','444.111.111-02','camila4@email.com',8,4),
('f','Marcelo Antunes','444.111.111-03','marcelo4@email.com',7,4),
('f','Juliane Prado','444.111.111-04','juliane4@email.com',8,4),
('f','Roberto Dias','444.111.111-05','roberto4@email.com',7,4),
('f','Daniela Moura','444.111.111-06','daniela4@email.com',8,4),
('f','Alexandre Pinto','444.111.111-07','alex4@email.com',7,4),
('f','Flávia Ramos','444.111.111-08','flavia4@email.com',8,4),
('f','Thiago Barros','444.111.111-09','thiago4@email.com',7,4),
('f','Priscila Andrade','444.111.111-10','priscila4@email.com',8,4),

-- EMPRESA 5
('f','Lucas Pereira','555.111.111-01','lucas5@email.com',9,5),
('f','Marina Cunha','555.111.111-02','marina5@email.com',10,5),
('f','Felipe Moraes','555.111.111-03','felipe5@email.com',9,5),
('f','Gabriela Torres','555.111.111-04','gabriela5@email.com',10,5),
('f','Bruno Rezende','555.111.111-05','bruno5@email.com',9,5),
('f','Letícia Duarte','555.111.111-06','leticia5@email.com',10,5),
('f','Matheus Ferreira','555.111.111-07','matheus5@email.com',9,5),
('f','Carla Batista','555.111.111-08','carla5@email.com',10,5),
('f','Eduarda Lopes','555.111.111-09','eduarda5@email.com',9,5),
('f','Vitor Hugo Martins','555.111.111-10','vitor5@email.com',10,5);

