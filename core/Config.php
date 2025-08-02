<?php

/**
 * 
 * Classe para regenciamento de configurações do sistema
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 * 
 */
class Config
{
    private static array $config = [];

    /**
     * 
     * Construtor da classe Config
     * 
     */
    public function __construct()
    {
        self::load();
    }

    /**
     * 
     * Carrega as configurações do sistema
     * 
     * @throws \RuntimeException
     * 
     * @return void
     * 
     */
    public static function load(): void
    {
        $file_config = DOCUMENT_ROOT . '/config.json';

        if (!file_exists($file_config)) {
            throw new \RuntimeException("Arquivo de configuração não encontrado: $file_config");
        }

        $config_json = json_decode(file_get_contents($file_config), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("Erro ao decodificar o arquivo de configuração: " . json_last_error_msg());
        }

        self::$config = $config_json;
        self::set();
    }

    /**
     * 
     * Define as constantes de configuração
     * 
     * @return void
     * 
     */
    private static function set(): void
    {
        define('CONFIG', self::$config);
    }

    /**
     * 
     * Valida as configurações do banco de dados
     * 
     * @return void
     * 
     */
    public static function validateDatabaseConfig(): void
    {
        $configs = [
            'database.server',
            'database.port',
            'database.username',
            'database.password',
            'database.database',
            'database.charset',
        ];
        foreach ($configs as $config) {
            $config = explode('.', $config);
            if (!isset(CONFIG[$config[0]][$config[1]])) {
                Core::log("Configuração ausente: $config[0].$config[1]", 'ERROR');
                Core::error(500);
            }
        }
    }
}
