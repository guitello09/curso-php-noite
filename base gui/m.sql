CREATE DATABASE calendario_eventos;

USE calendario_eventos;

CREATE TABLE eventos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    descricao TEXT,
    data DATE NOT NULL
);
INSERT INTO eventos (titulo, descricao, data) VALUES
('Reunião de equipe', 'Reunião para discutir novos projetos.', '2024-11-10'),
('Feriado Nacional', 'Dia da Proclamação da República.', '2024-11-15'),
('Lançamento de Produto', 'Lançamento do novo produto da empresa.', '2024-11-25');
