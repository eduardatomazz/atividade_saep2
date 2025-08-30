CREATE DATABASE saeepp_db;
USE saeepp_db;

CREATE TABLE professor (
    id_professor INT AUTO_INCREMENT PRIMARY KEY,
    nome_professor VARCHAR(45) NOT NULL,
    senha_professor VARCHAR(10) NOT NULL,
    email_professor VARCHAR(100) NOT NULL
);

CREATE TABLE turma (
    id_turma INT AUTO_INCREMENT PRIMARY KEY,
    nome_turma VARCHAR(45) NOT NULL,
    sigla_turma VARCHAR(10) NOT NULL,
    id_professor INT,
    FOREIGN KEY (id_professor) REFERENCES professor (id_professor)
);

CREATE TABLE atividade (
    id_atividade INT AUTO_INCREMENT PRIMARY KEY,
    nome_atividade VARCHAR(45) NOT NULL,
    descricao_atividade VARCHAR(100) NOT NULL,
    id_turma INT,
    FOREIGN KEY (id_turma) REFERENCES turma (id_turma)
);

-- dados exemplo
INSERT INTO professor (nome_professor, senha_professor, email_professor) VALUES
('Otto Silva', 'Otto@908', 'otto_silva@gmail.com'),
('Karla Kasten', 'KrlK45', 'karla_kasten@gmail.com'),
('Juliana Pereira', 'per@987', 'juliana_pereira@gmail.com');

INSERT INTO turma (nome_turma, sigla_turma) VALUES
('Desenvolvimento de Sistemas M1', 'DSM1'),
('Redes de Computador M4', 'RCM4'),
('Desenvolvimento de Sistemas M8', 'DSM*');

INSERT INTO atividade (nome_atividade, descricao_atividade) VALUES
('Lógica de programação', 'condicionais'),
('Lógica de programação', 'laçãos de repetição'),
('Lista', 'lista de exercícios 01');