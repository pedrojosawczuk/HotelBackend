DROP TABLE tb_reserva;
DROP TABLE tb_acomodacoes;
DROP TABLE tb_tarifa;
DROP TABLE tb_user;

CREATE TABLE tb_user (
    id BIGINT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(128) NOT NULL,
    perfil VARCHAR(100) NOT NULL,
    PRIMARY KEY  (id),
    UNIQUE(email)
);

CREATE TABLE tb_tarifa (
    id BIGINT NOT NULL AUTO_INCREMENT,
    tipo_acomodacoes VARCHAR(10) NOT NULL default 'Standart',
    preco DECIMAL(12, 2) NOT NULL,
    PRIMARY KEY  (id)
);

CREATE TABLE tb_acomodacoes (
    id BIGINT NOT NULL AUTO_INCREMENT,
    qt_cama_casal INT(20) NOT NULL default 0,
    qt_cama_solteiro INT(20) NOT NULL default 0,
    camas_extras VARCHAR(128) NOT NULL default '',
    fk_tarifa BIGINT,
    PRIMARY KEY  (id),
    CONSTRAINT fk_acomodacoesXtarifa
        FOREIGN KEY (fk_tarifa) REFERENCES tb_tarifa (id)
);


CREATE TABLE tb_reserva (
    id BIGINT NOT NULL AUTO_INCREMENT,
    dt_entrada DATETIME(6) NOT NULL,
    dt_saida DATETIME(6) NOT NULL,
    qt_hospedes INT(10) NOT NULL default 1,
    fk_user BIGINT,
    fk_acomodacoes BIGINT,
    vl_reservation DECIMAL(12, 2) NOT NULL,
    PRIMARY KEY  (id),
    CONSTRAINT fk_reservaXuser
        FOREIGN KEY (fk_user) REFERENCES tb_user (id),
    CONSTRAINT fk_reservaXacomodacoes
        FOREIGN KEY (fk_acomodacoes) REFERENCES tb_acomodacoes (id)
);

/* Add 3 Users tb_user */
INSERT INTO tb_user (nome, email,  senha, perfil)
    VALUES ('Juca da Silva', 'juca1@gmail.com', 1234, 'admin');
INSERT INTO tb_user (nome, email,  senha, perfil)
    VALUES ('Juca da Silva', 'juca2@gmail.com', 1234, 'user');
INSERT INTO tb_user (nome, email,  senha, perfil)
    VALUES ('Juca da Silva', 'juca3@gmail.com', 1234, 'user');