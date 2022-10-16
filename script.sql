create database aula;
use aula;

create table categoria(
cd INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100) NOT NULL);

create table produto(
cd INT PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100) NOT NULL,
valor DECIMAL(10,2) NOT NULL,
quantidade INT(10),
id_categoria INT,
FOREIGN KEY (id_categoria) REFERENCES categoria(cd));