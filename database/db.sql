CREATE DATABASE mercado;

use mercado;


CREATE TABLE produtos (
    nome VARCHAR(100) NOT NULL,
    categoria VARCHAR(60) NOT NULL,
    descricao varchar(255) DEFAULT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade_estoque INT UNSIGNED NOT NULL DEFAULT 0,
    validade DATE DEFAULT NULL,
    id INT UNSIGNED NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;


INSERT INTO produtos (nome, categoria, descricao, validade, preco, quantidade_estoque) VALUES
('Farinha', 'Alimentos', 'Farinha de trigo 1kg', NULL, 89.90, 15),
('Carrinho de Controle Remoto', 'Veículos', 'Carrinho de controle remoto com luzes e sons', NULL, 149.90, 8),
('Quebra-Cabeça 500 peças', 'Jogos', 'Quebra-cabeça com 500 peças e imagem divertida', NULL, 39.90, 20);