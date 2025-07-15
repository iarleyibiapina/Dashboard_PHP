INSERT INTO grafico_legendas (nome, cor_fundo, cor_borda) VALUES
('Revenue', 'rgba(2,117,216,1)', 'rgba(2,117,216,1)'),
('Teste', 'rgba(2, 216, 20, 1)', 'rgba(216, 141, 2, 1)');

INSERT INTO grafico_dados_barra (legenda_id, rotulo_id, valor) VALUES
-- Dados de 'Revenue'
(1, 1, 1111.00),
(1, 2, 5312.00),
(1, 3, 6251.00),
(1, 4, 7000.00),
(1, 5, 9000.00),
(1, 6, 35000.00),
-- Dados de 'Teste'
(2, 1, 500.00),
(2, 2, 1000.00);