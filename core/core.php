<?php

/**
 * 
 * Núcleo principal do sistema
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class Core
{
    private static $loaded = false;

    /**
     * 
     * Construtor do núcleo
     * 
     * @return void
     * 
     */
    public function __construct()
    {
        $this->init();
    }

    /**
     * 
     * Inicializa o núcleo do sistema
     * 
     * @return void
     * 
     */
    private function init(): void
    {
        if (!self::$loaded) {
            $this->load_dependencies();
            Config::load();
            $this->verify_directories();
            self::$loaded = true;
        }
    }

    /**
     * 
     * Carrega as dependências do sistema
     * 
     * @return void
     * 
     */
    private function load_dependencies(): void
    {
        spl_autoload_register(function ($class_name) {
            $directories = [
                '/sources/controllers/',
                '/core/',
                '/routes/',
                '/core/Router/'
            ];

            foreach ($directories as $directory) {
                $file_dir = DOCUMENT_ROOT . $directory . $class_name . '.php';
                if (file_exists($file_dir)) {
                    require_once $file_dir;
                    return;
                }
            }
        });
    }

    /**
     * 
     * Verifica e cria diretórios necessários
     * 
     * @return void
     * 
     */
    private function verify_directories(): void
    {
        try {
            $directories = [
                DOCUMENT_ROOT . '/storage/logs',
                DOCUMENT_ROOT . '/storage/uploads'
            ];

            foreach ($directories as $directory) {
                if (!is_dir($directory)) {
                    mkdir($directory, 0755, true);
                }
            }
        } catch (Exception $e) {
            $this->log('Error creating directories: ' . $e->getMessage(), 'ERROR');
            $this->error();
        }
    }

    /**
     * 
     * Controla erros do sistema
     * 
     * @param integer $code Código do erro HTTP
     * @return void
     * 
     */
    public static function error(int $code = 500): void
    {
        http_response_code($code);
        echo "An error occurred. Please try again later.";
        exit();
    }

    /**
     * 
     * Registra uma mensagem de log
     * 
     * @param string $message Mensagem a ser registrada
     * @param string $level Nível do log (INFO, ERROR, etc.)
     * @return void
     * 
     */
    public static function log(string $message, $level = 'INFO'): void
    {
        $document_file = DOCUMENT_ROOT . '/storage/logs/' . date('Y_m_d') . '.log';
        $log_message = sprintf("[%s] [%s]: %s\n", date('Y-m-d H:i:s'), $level, $message);

        if (!is_dir(dirname($document_file))) {
            mkdir(dirname($document_file), 0755, true);
        }

        file_put_contents($document_file, $log_message, FILE_APPEND);
    }
}
