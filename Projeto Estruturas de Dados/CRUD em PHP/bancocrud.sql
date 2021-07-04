create database estruturascrud;

CREATE TABLE funcionarios(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    setor VARCHAR(255) NOT NULL,
    salario INT(10) NOT NULL
);