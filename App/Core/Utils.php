<?php 

if(! function_exists('dd')){
    function dd(...$args)
    {
        die(var_dump($args));
    }
}

if(! function_exists('logException')){
    /**
     * Grava os detalhes de uma exceção ou erro em um arquivo de log.
    *
    * A função cria o diretório de log se ele não existir e adiciona
    * a nova mensagem ao final do arquivo, garantindo que logs antigos
    * não sejam sobrescritos.
    *
    * @param Throwable $e O objeto da exceção (ou erro) que foi capturado.
    * Usar `Throwable` permite capturar tanto `Exception` quanto `Error` no PHP 7+.
    * @return void
    */
    function logException(Throwable $e): void
    {
        // Define o caminho para o diretório de armazenamento, um nível acima do script atual.
        $logDirectory = __DIR__ . '/../Storage';
        
        // Define o caminho completo para o arquivo de log.
        $logFile = $logDirectory . '/app.log';
    
        try {
            // Passo 1: Verifica se o diretório de log existe.
            if (!is_dir($logDirectory)) {
                // Se não existir, tenta criá-lo.
                // O `true` no final permite a criação de diretórios aninhados (recursivo).
                // 0775 são as permissões padrão para diretórios (leitura, escrita e execução para o dono e grupo).
                if (!mkdir($logDirectory, 0775, true)) {
                    // Se a criação falhar, lança um erro que será pego pelo catch abaixo.
                    throw new Exception("Não foi possível criar o diretório de log em: {$logDirectory}");
                }
            }
    
            // Passo 2: Formata a mensagem de log de forma clara e detalhada.
            $timestamp = date('Y-m-d H:i:s'); // Pega a data e hora atuais.
            
            $logMessage = "[$timestamp] Erro Capturado:\n";
            $logMessage .= "==================================================\n";
            $logMessage .= "Mensagem: " . $e->getMessage() . "\n";
            $logMessage .= "Arquivo:  " . $e->getFile() . " (Linha: " . $e->getLine() . ")\n";
            $logMessage .= "Stack Trace:\n" . $e->getTraceAsString() . "\n";
            $logMessage .= "--------------------------------------------------\n\n";
    
            // Passo 3: Escreve a mensagem no arquivo de log.
            // A flag FILE_APPEND garante que o conteúdo seja adicionado ao final do arquivo.
            // A flag LOCK_EX previne que múltiplos processos escrevam no arquivo ao mesmo tempo, evitando corrupção.
            file_put_contents($logFile, $logMessage, FILE_APPEND | LOCK_EX);
    
        } catch (Exception $logException) {
            // Se a própria função de log falhar (ex: por falta de permissão),
            // ela envia o erro para o log padrão do PHP/servidor.
            error_log("Falha CRÍTICA na função de log: " . $logException->getMessage());
        }
    }
}

if(! function_exists(function: 'env')){
    /**
     * Pega um valor definido pela variavel de ambiente,
     * se nao definido é possivel definir um valor padrao
     * @param string $key
     * @param mixed $default
     * @return string
     */
    function env(string $key, ?string $default = null): string
    {
        return $_ENV[$key] ?? $default;
    }
}