<?php

class AuthController
{
    private $core = null;
    private $router = null;
    private $api_controller = null;

    /**
     * 
     * Construtor do controlador de autenticação
     * 
     * @param Core $core
     * 
     */
    public function __construct(Core $core, Router $router, ApiController $api_controller)
    {
        $this->core = $core;
        $this->router = $router;
        $this->api_controller = $api_controller;
        $this->handleRequest();
    }

    /**
     * 
     * Método de login
     * 
     * @return void
     * 
     */
    public function login(): void
    {
        // Implementar lógica de autenticação aqui
        // Exemplo: verificar credenciais, gerar token, etc.
        //$this->core->response_api('Login successful', 200);
        echo json_encode([
            'status' => 'success',
            'message' => 'Login successful',
            'address' => $_SESSION['address'],
        ]);
    }

    private function handleRequest(): void {
        session_start();
        $_SESSION['address'] = $_SERVER['REMOTE_ADDR'];
    }
}
