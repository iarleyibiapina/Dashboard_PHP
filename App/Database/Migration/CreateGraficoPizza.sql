USE teste;

-- Cria a tabela 'dados_grafico_pizza' se ela ainda não existir.
CREATE TABLE IF NOT EXISTS `dados_grafico_pizza` (
    -- Coluna de ID: Chave primária com auto-incremento.
    -- Garante que cada registro (fatia) tenha um identificador único.
    `id` INT AUTO_INCREMENT PRIMARY KEY,

    -- Coluna de Rótulo (Label): O texto que descreve a fatia.
    -- Ex: "Vendas Online", "Lojas Físicas", "Marketing".
    -- VARCHAR(100) permite textos de até 100 caracteres.
    `legenda` VARCHAR(100) NOT NULL,

    -- Coluna de Valor: O dado numérico que define o tamanho da fatia.
    -- DECIMAL(10, 2) é ideal para valores financeiros ou que precisam de precisão,
    -- permitindo até 10 dígitos no total, com 2 casas decimais.
    -- Use INT se você for trabalhar apenas com números inteiros.
    `valor` DECIMAL(10, 2) NOT NULL,

    -- Coluna de Cor: Armazena o código de cor hexadecimal para a fatia.
    -- Ex: '#FF5733'. Isso dá flexibilidade para controlar o visual do gráfico.
    -- CHAR(7) é otimizado para guardar códigos como '#RRGGBB'.
    `cor` CHAR(7) NULL,

    -- Coluna de Visibilidade: Permite ocultar uma fatia do gráfico sem excluí-la.
    -- BOOLEAN (que no MySQL é um sinônimo para TINYINT(1)) armazena 1 (true) ou 0 (false).
    -- O valor padrão é TRUE (1), então novas fatias são visíveis por padrão.
    `esta_visivel` BOOLEAN NOT NULL DEFAULT TRUE,

    -- (Opcional) Coluna de data de criação para auditoria.
    `criado_em` TIMESTAMP DEFAULT CURRENT_TIMESTAMP

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;