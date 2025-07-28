<?php

class SystemController
{
    private $core = null;
    private $router = null;

    public function __construct(Core $core, Router $router)
    {
        $this->core = $core;
        $this->router = $router;
        $this->verify_access();
    }

    public function index(): void
    {
        // Implementação do método para lidar com requisições ao sistema
        // Aqui você pode definir a lógica para exibir a página principal do sistema
        // ou redirecionar para outra página conforme necessário.
        echo "Bem-vindo ao Sistema!";
    }

    private function verify_access(): void {
        //verifica se a sessão está ativa
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }

        if ($_SESSION['logged_in'] !== true) {
            header('Location: /login');
            exit();
        }

    }
}
