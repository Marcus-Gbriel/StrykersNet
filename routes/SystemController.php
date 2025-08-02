<?php

class SystemController
{
    private $core = null;
    private $router = null;
    private $session = null;
    private $database = null;

    public function __construct(Core $core, Router $router)
    {
        $this->session = new Session();
        $this->verify_access();
    }

    public function index(): void
    {
        new Database();
        require_once DOCUMENT_ROOT . '/sources/views/index.php';
        
    }

    private function verify_access(): void
    {
        //new Database();

        
    }

    public function logout(): void
    {
        // Implementação do método para lidar com logout
        // Aqui você pode definir a lógica para encerrar a sessão do usuário
        if (session_status() === PHP_SESSION_ACTIVE) {
            session_destroy();
        }
        header('Location: /login');
        exit();
    }
}
