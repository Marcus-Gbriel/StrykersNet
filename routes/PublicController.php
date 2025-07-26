<?php

/**
 * 
 * Controller para área de acesso público
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class PublicController
{
    private $core = null;
    private $router = null;
    
    /**
     * 
     * Contrutor do controlador público
     * 
     * @param core $core Instância do núcleo
     * @param router $router Instância do roteador
     * @return void
     * 
     */
    public function __construct(Core $core, Router $router)
    {
        $this->core = $core;
        $this->router = $router;
    }

    /**
     * 
     * Método para lidar com requisições GET na área pública
     * 
     * @return void
     * 
     */
    public function index(): void
    {
        if (!$this->final_array() != '') {
            $file_path = DOCUMENT_ROOT . $_SERVER['REQUEST_URI'] ?? '';
            if (!file_exists($file_path)) {
                $this->core->error(404);
            }

            $content_type = mime_content_type($file_path) ?: 'application/octet-stream';

            header('Content-Type: ' . $content_type);
            header('Content-Length: ' . filesize($file_path));

            readfile($file_path);
            exit;
        } else {
            $this->core->error(404);
        }
    }

    /**
     * 
     * Método para obter o último segmento da URL
     * 
     * @return string Último segmento da URL
     * 
     */
    private function final_array(): string
    {
        $router = trim('/', $_SERVER['REQUEST_URI'] ?? '');
        $router = explode('/', $router);
        return end($router);
    }
}
