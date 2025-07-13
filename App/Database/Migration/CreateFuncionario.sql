CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    posicao VARCHAR(255) NOT NULL,
    escritorio VARCHAR(255),
    idade INT,
    data_inicio DATE NOT NULL,
    salario DECIMAL(10, 2) NOT NULL,
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

