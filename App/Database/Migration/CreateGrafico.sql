USE teste;

CREATE TABLE grafico_legendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL UNIQUE,  -- O nome da legenda (ex: "Revenue", "Vendas", "Custos")
    -- cor_fundo VARCHAR(50),              -- Opcional: para armazenar uma cor padrão (ex: 'rgba(2,117,216,1)')
    -- cor_borda VARCHAR(50),              -- Opcional: para armazenar uma cor de borda padrão
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE meses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    mes VARCHAR(100) NOT NULL UNIQUE, -- O rótulo do eixo (ex: "Janeiro", "Fevereiro", "2024")
    ordem INT DEFAULT 0 NOT NULL         -- Para garantir a ordenação correta no gráfico (ex: 1 para Jan, 2 para Fev)
);

CREATE TABLE grafico_dados_barra (
    id INT AUTO_INCREMENT PRIMARY KEY,
    legenda_id INT NOT NULL,           -- Chave estrangeira para a tabela de legendas
    mes_id INT NOT NULL,            -- Chave estrangeira para a tabela de meses
    valor DECIMAL(15, 2) NOT NULL,     -- O valor numérico do ponto no gráfico

    -- Chaves Estrangeiras para garantir a integridade dos dados
    FOREIGN KEY (legenda_id) REFERENCES grafico_legendas(id) ON DELETE CASCADE,
    FOREIGN KEY (mes_id) REFERENCES meses(id) ON DELETE CASCADE,

    -- Garante que não haja valores duplicados para a mesma legenda e mês
    UNIQUE KEY uq_legenda_rotulo (legenda_id, mes_id)
);