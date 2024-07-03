create database database_telecall;
use database_telecall;

CREATE TABLE users (
    id INT NOT NULL AUTO_INCREMENT,
    cpf VARCHAR(90) NOT NULL,
    nome VARCHAR(200) ,
    data_nascimento DATE,
    genero VARCHAR(90),
    nome_mae VARCHAR(200),
    email VARCHAR(255),
    telefone VARCHAR(90),
    celular VARCHAR(90),
    cep VARCHAR(90),
    endereco VARCHAR(200),
    num INT(90),
    complemento VARCHAR(90),
    bairro VARCHAR(90),
    cidade VARCHAR(90),
    estado VARCHAR(90),
    login VARCHAR(90),
    senha VARCHAR(90),
    tipo_user VARCHAR(10),
    PRIMARY KEY (id),
    UNIQUE KEY (cpf)
);


CREATE TABLE logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    user_cpf VARCHAR(50),
   autenticacao VARCHAR(100),
    resposta VARCHAR(100),
    sucesso BOOLEAN,
    data date,
    hora time,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (user_cpf) REFERENCES users(cpf)
);










