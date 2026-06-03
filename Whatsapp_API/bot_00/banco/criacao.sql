CREATE TABLE mod_whatsapp_sessao (
    ses_id INT AUTO_INCREMENT PRIMARY KEY,

    ses_telefone VARCHAR(20) NOT NULL,

    ses_fluxo VARCHAR(50) DEFAULT 'menu',

    ses_etapa VARCHAR(50) DEFAULT '',

    ses_referencia INT DEFAULT NULL,

    ses_status CHAR(1) DEFAULT 'a',

    ses_data DATETIME DEFAULT CURRENT_TIMESTAMP,

    UNIQUE KEY (ses_telefone)
);


-- nova 

CREATE TABLE mod_whatsapp_sessao (

    ses_id INT AUTO_INCREMENT PRIMARY KEY,

    ses_telefone VARCHAR(20) NOT NULL,

    ses_etapa VARCHAR(50) DEFAULT 'menu',

    ses_servico_fk INT NULL,
    ses_pista_fk INT NULL,
    ses_horario_fk INT NULL,

    ses_cliente_fk INT NULL,
    ses_veiculo_fk INT NULL,

    ses_nome_cliente VARCHAR(100) NULL,

    ses_atendente TINYINT DEFAULT 0,

    ses_dt_atualizacao DATETIME DEFAULT CURRENT_TIMESTAMP
);