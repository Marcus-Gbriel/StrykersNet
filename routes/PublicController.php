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
        // Fazer uma melhor implementação desse método
        // Verificar melhor se o arquivo existe
        // e se o último segmento da URL não está vazio
        // para evitar erros de diretório
        
        $file_name = $this->get_filename();
        if (empty($file_name) || $file_name !== 'public') {
            $file_path = DOCUMENT_ROOT . $_SERVER['REQUEST_URI'] ?? '';
            if (!file_exists($file_path)) {
                $this->core->error(404);
            }

            header('Content-Type: ' . $this->define_content_type($file_path));
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
    private function get_filename(): string
    {
        $router = basename($_SERVER['REQUEST_URI']);
        $router = explode('/', $router);
        return end($router);
    }

    /**
     * 
     * Método para definir o tipo de conteúdo com base na extensão do arquivo
     * 
     * @param string $file_path Caminho do arquivo
     * @return string Tipo de conteúdo
     * 
     */
    private function define_content_type(string $file_path): string
    {
        if (str_ends_with($file_path, '.css')) {
            return 'text/css';
        } else {
            return mime_content_type($file_path) ?: 'application/octet-stream';
        }
    }
}
