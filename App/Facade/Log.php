<?php

// Essa classe segue o padrao FACADE, deve ficar em um  namespace de uma FACADE
// ela deve ser iniciada no ponto de inicio da aplicacao, onde é definido o caminho
// do LOG, pegando de uma .env por exemplo
/**
 * Classe de Log estática simples que imita o padrão Facade.
 * Utiliza a função nativa error_log() do PHP.
 */
final class Log
{
    /**
     * O caminho para o arquivo onde os logs serão salvos.
     * 
     * *Deve ser iniciada na raiz da aplicação
     * @var string|null
     */
    private static ?string $logFile = null;

    /**
     * Configura o caminho do arquivo de log.
     * Deve ser chamado uma vez no início da aplicação.
     *
     * @param string $path O caminho completo para o arquivo de log.
     * @return void
     */
    public static function setPath(string $path): void
    {
        self::$logFile = $path;
    }

    /**
     * Registra uma mensagem de log do nível INFO.
     *
     * @param string $message A mensagem a ser registrada.
     * @param array $context Um array com dados de contexto adicionais.
     * @return void
     */
    public static function info(string $message, array $context = []): void
    {
        self::write('INFO', $message, $context);
    }

    /**
     * Registra uma mensagem de log do nível WARNING.
     *
     * @param string $message A mensagem a ser registrada.
     * @param array $context Um array com dados de contexto adicionais.
     * @return void
     */
    public static function warning(string $message, array $context = []): void
    {
        self::write('WARNING', $message, $context);
    }

    /**
     * Registra uma mensagem de log do nível ERROR.
     *
     * @param string $message A mensagem a ser registrada.
     * @param array $context Um array com dados de contexto adicionais.
     * @return void
     */
    public static function error(string $message, array $context = []): void
    {
        self::write('ERROR', $message, $context);
    }

    /**
     * O método central que formata e escreve a mensagem no log.
     *
     * @param string $level O nível do log (INFO, ERROR, etc.).
     * @param string $message A mensagem principal.
     * @param array $context Dados extras.
     * @return void
     */
    private static function write(string $level, string $message, array $context = []): void
    {
        // Se o caminho do log não foi configurado, não faz nada para evitar erros.
        if (self::$logFile === null) {
            // Ou poderia lançar uma exceção: throw new \Exception('Caminho do arquivo de log não configurado.');
            return;
        }

        // 1. Formata a mensagem principal
        $logEntry = sprintf(
            "[%s] %s: %s",
            date('Y-m-d H:i:s'), // Adiciona data e hora
            strtoupper($level),    // Adiciona o nível do log em maiúsculas
            $message
        );

        // 2. Adiciona o contexto se ele não estiver vazio
        if (!empty($context)) {
            // Converte o array de contexto para uma string JSON formatada
            $logEntry .= ' ' . json_encode($context, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        }

        // 3. Adiciona uma quebra de linha no final
        $logEntry .= PHP_EOL;

        // 4. Usa a função nativa error_log para anexar a mensagem ao arquivo especificado
        error_log($logEntry, 3, self::$logFile);

        // Dependendo do nivel de mensagem, o php faz uma acao. O 3 ele concatena o conteudo em um arquivo
    }
}
// exemplo de uso em um cliente
Log::error($e->getMessage(), [
    'code' => $e->getCode(),
    'file' => $e->getFile(),
    'line' => $e->getLine()
]);