<?php

/**
 * $argc (Argument Count / Contagem de Argumentos)
 *
 * Esta é uma variável especial que contém o NÚMERO TOTAL de argumentos
 * passados para o script através da linha de comando.
 * O valor dela é sempre no mínimo 1, pois o nome do próprio arquivo de script
 * ('pls', neste caso) é contado como o primeiro argumento.
 */

/**
 * $argv (Argument Vector / Vetor de Argumentos)
 *
 * Esta é uma variável especial que é um ARRAY contendo cada um dos
 * argumentos passados para o script.
 * - $argv[0] é sempre o nome do script.
 * - $argv[1] é o primeiro argumento que você passa (o 'xxx' no seu exemplo).
 * - $argv[2] seria o segundo, e assim por diante.
 */

// Primeiro, verificamos se o argumento esperado foi realmente fornecido.
// Se $argc for maior que 1, significa que algo foi passado além do nome do script.
if (isset($argv[1])) {
    // Se $argv[1] existe, nós o capturamos e exibimos no terminal.
    $comando = $argv[1];
    echo $comando . "\n"; // O "\n" adiciona uma quebra de linha para formatação.

} else {
    // Caso contrário, se nenhum argumento for passado, exibimos uma mensagem de ajuda.
    echo "Por favor, forneça um comando. Ex: php pls porfavore\n";
}
