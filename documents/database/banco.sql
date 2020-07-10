CREATE TABLE usuario (
    id_usuario INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR (150) NOT NULL,
    nome_estabelecimento VARCHAR (150) NULL DEFAULT NULL,
    cnpj VARCHAR (150) NULL DEFAULT NULL,
    email VARCHAR (150) NOT NULL,
    senha VARCHAR (150) NOT NULL,
    telefone VARCHAR(150) NOT NULL,
    nivel VARCHAR (150) NOT NULL DEFAULT 'associado',
    promocao INT NOT NULL DEFAULT 0,
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

CREATE TABLE categoria (
    id_categoria INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR (150) NOT NULL,
    data_cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_categoria)
);

CREATE TABLE promocoes (
    id_promocao INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_categoria INT NOT NULL,
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
    FOREIGN KEY (id_categoria) REFERENCES categoria (id_categoria),
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
    lateral INT DEFAULT 0,
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

CREATE TABLE acesso (
    id_acesso INT NOT NULL AUTO_INCREMENT,
    id_promocao INT NOT NULL,
    acesso INT NOT NULL DEFAULT 0,
    data_cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id_acesso)
);

CREATE TABLE esqueceusenha (
  id_esqueceusenha INT NOT NULL AUTO_INCREMENT,
  id_usuario INT NOT NULL,
  ip VARCHAR(150) NOT NULL,
  data_solicitacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  data_expira timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  token TEXT NOT NULL,
  PRIMARY KEY (id_esqueceusenha),
  FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

-- INSERT TABELA USUARIO

INSERT INTO `usuario` (`id_usuario`, `nome`, `nome_estabelecimento`, `cnpj`, `email`, `senha`, `telefone`, `nivel`, `status`, `data_cadastro`)
VALUES (NULL, 'Edilson Pereira Mendonça', NULL, NULL, 'edilson@desigual.com.br', '202cb962ac59075b964b07152d234b70', '(18) 99635-6488', 'admin', '1', '2020-05-20 09:59:30');

-- INSERT TABELA CATEGORIA

INSERT INTO `categoria` (`id_categoria`, `nome`, `data_cadastro`)
VALUES (NULL, 'Alimentação', CURRENT_TIMESTAMP);
INSERT INTO `categoria` (`id_categoria`, `nome`, `data_cadastro`)
VALUES (NULL, 'Bares e Restaurantes', CURRENT_TIMESTAMP);
INSERT INTO `categoria` (`id_categoria`, `nome`, `data_cadastro`)
VALUES (NULL, 'Sáude', CURRENT_TIMESTAMP);
INSERT INTO `categoria` (`id_categoria`, `nome`, `data_cadastro`)
VALUES (NULL, 'Serviços automotivos', CURRENT_TIMESTAMP);
INSERT INTO `categoria` (`id_categoria`, `nome`, `data_cadastro`)
VALUES (NULL, 'Eletrônicos', CURRENT_TIMESTAMP);
INSERT INTO `categoria` (`id_categoria`, `nome`, `data_cadastro`)
VALUES (NULL, 'Pet''s', CURRENT_TIMESTAMP);
INSERT INTO `categoria` (`id_categoria`, `nome`, `data_cadastro`)
VALUES (NULL, 'Beleza', CURRENT_TIMESTAMP);
INSERT INTO `categoria` (`id_categoria`, `nome`, `data_cadastro`)
VALUES (NULL, 'Vestuário', CURRENT_TIMESTAMP);
INSERT INTO `categoria` (`id_categoria`, `nome`, `data_cadastro`)
VALUES (NULL, 'Calçados', CURRENT_TIMESTAMP);
INSERT INTO `categoria` (`id_categoria`, `nome`, `data_cadastro`)
VALUES (NULL, 'Acessorios', CURRENT_TIMESTAMP);
INSERT INTO `categoria` (`id_categoria`, `nome`, `data_cadastro`)
VALUES (NULL, 'Papelaria', CURRENT_TIMESTAMP);
INSERT INTO `categoria` (`id_categoria`, `nome`, `data_cadastro`)
VALUES (NULL, 'Diversos', CURRENT_TIMESTAMP);