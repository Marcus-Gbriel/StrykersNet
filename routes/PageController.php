<?php

/**
 * 
 * Controller para gerenciamento de páginas
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class PageController
{
    private $core = null;

    /**
     * 
     * Construtor do controlador de página
     * 
     * @return void
     * 
     */
    public function __construct(Core $core)
    {
        $this->core = $core;
    }

    /**
     * 
     * Método para exibir a página inicial
     * 
     * @return void
     * 
     */
    public function home(): void
    {
        $this->render('home');
    }

    /**
     * 
     * Método para exibir a página "Sobre"
     * 
     * @return void
     * 
     */
    public function about(): void
    {
        $this->render('about');
    }

    /**
     * 
     * Método para exibir a página de contato
     * 
     * @return void
     * 
     */
    public function contact(): void
    {
        $this->render('contact');
    }

    /**
     * 
     * Método para exibir a página de login
     * 
     * @return void
     * 
     */
    public function login(): void
    {
        $this->render('login');
    }

    public function robots(): void
    {
        include 'sources/robots.txt';
        exit;
    }

    /**
     * 
     * Método para renderizar uma página específica
     * 
     * @param string $page Nome da página a ser renderizada
     * @return void
     * 
     */
    private function render(string $page): void
    {
        try {
            require_once 'sources/components/header.php';
            require_once "sources/pages/{$page}.php";
            require_once 'sources/components/footer.php';
        } catch (\Throwable $th) {
            $this->core->error(500);
            $this->core->log("Erro ao renderizar página: {$page}");
        }
    }
}
