CREATE TABLE tb_user (
    id BIGINT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(128) NOT NULL,
    perfil VARCHAR(100) NOT NULL,
    PRIMARY KEY  (id),
    UNIQUE(email)
);

CREATE TABLE tb_room (
    id BIGINT NOT NULL AUTO_INCREMENT,
    qt_cama_casal INT(20) NOT NULL default 0,
    qt_cama_solteiro INT(20) NOT NULL default 0,
    camas_extras VARCHAR(128) NOT NULL default '',
    tipo_acomodacoes VARCHAR(1) NOT NULL default 'S',
    PRIMARY KEY  (id)
);

CREATE TABLE tb_rate (
    id BIGINT NOT NULL AUTO_INCREMENT,
    tipo_acomodacoes VARCHAR(1) NOT NULL default 'S',
    preco DECIMAL(12, 2) NOT NULL,
    PRIMARY KEY  (id)
);

CREATE TABLE tb_reservation (
    id BIGINT NOT NULL AUTO_INCREMENT,
    dt_entrada DATETIME(6) NOT NULL,
    dt_saida DATETIME(6) NOT NULL,
    qt_hospedes INT(10) NOT NULL default 1,
    fk_user BIGINT,
    fk_room BIGINT,
    vl_reservation DECIMAL(12, 2) NOT NULL,
    PRIMARY KEY  (id),
    CONSTRAINT fk_reservationXuser
        FOREIGN KEY (fk_user) REFERENCES tb_user (id),
    CONSTRAINT fk_reservationXroom
        FOREIGN KEY (fk_room) REFERENCES tb_room (id)
);