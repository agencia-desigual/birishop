CREATE TABLE usuario (
    id_usuario INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR (150) NOT NULL,
    nome_estabelecimento VARCHAR (150) NULL DEFAULT NULL,
    cnpj VARCHAR (150) NULL DEFAULT NULL,
    email VARCHAR (150) NOT NULL,
    senha VARCHAR (150) NOT NULL,
    tipo VARCHAR (150) NOT NULL DEFAULT 'associado',
    status BOOLEAN NOT NULL DEFAULT 0,
    data_cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_usuario)
);


CREATE TABLE token(
  id_token INT NOT NULL AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  token TEXT NOT NULL,
  ip VARCHAR(100) NOT NULL,
  data_expira TIMESTAMP NOT NULL,
  data TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id_token),
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);


CREATE TABLE promocoes (
    id_promocao INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    nome VARCHAR (150) NOT NULL,
    valor_antigo DOUBLE NOT NULL,
    valor DOUBLE NOT NULL,
    link TEXT NOT NULL,
    imagem VARCHAR (150) NOT NULL,
    descricao TEXT NOT NULL,
    status ENUM('ativo','analise','reprovado','cancelado') NOT NULL DEFAULT 'analise',
    data_validade DATE NOT NULL,
    data_cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuario (id_usuario),
    PRIMARY KEY (id_promocao)
);


CREATE TABLE newsletter (
    id_newsletter INT NOT NULL AUTO_INCREMENT,
    email VARCHAR (150) NOT NULL,
    data_cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_newsletter)
);


CREATE TABLE banner (
    id_banner INT NOT NULL AUTO_INCREMENT,
    arquivo VARCHAR (150) NOT NULL,
    link TEXT NULL DEFAULT NULL,
    ordem INT NOT NULL,
    status BOOLEAN NOT NULL DEFAULT true,
    data_cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_banner)
);


CREATE TABLE parceiro (
    id_parceiro INT NOT NULL AUTO_INCREMENT,
    arquivo VARCHAR (150) NOT NULL,
    link TEXT NULL DEFAULT NULL,
    status BOOLEAN NOT NULL DEFAULT true,
    data_cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_parceiro)
);

