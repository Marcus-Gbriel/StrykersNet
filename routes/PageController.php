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
    /**
     * 
     * Construtor do controlador de página
     * 
     * @return void
     * 
     */
    public function __construct()
    {
        // Inicialização do controlador de página
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
     * Método para renderizar uma página específica
     * 
     * @param string $page Nome da página a ser renderizada
     * @return void
     * 
     */
    private function render(string $page): void
    {
        require_once 'sources/components/header.php';
        require_once "sources/pages/{$page}.php";
        require_once 'sources/components/footer.php';
    }
}
