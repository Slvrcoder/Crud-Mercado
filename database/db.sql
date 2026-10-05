CREATE DATABASE mercado;

USE mercado;

CREATE TABLE produtos (
    nome VARCHAR(100) NOT NULL,
     id INT NOT NULL AUTO_INCREMENT,
    categoria VARCHAR(60) NOT NULL,
    descricao VARCHAR(255) DEFAULT NULL,
    preco DECIMAL(10,2) NOT NULL,
    quantidade_estoque INT UNSIGNED NOT NULL DEFAULT 0,
    validade DATE DEFAULT NULL,
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO produtos 
(nome, categoria, descricao, validade, preco, quantidade_estoque) 
VALUES
('Farinha', 'Alimentos', 'Farinha de trigo 1kg', NULL, 89.90, 15),
('Feijão', 'Alimentos', 'Feijão 1kg', NULL, 12.90, 25),
('Coca Cola', 'Bebidas', 'Refrigerante 2L', NULL, 6.90, 50);