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
        $database = new database($this->core);


        $result = $database->query("SELECT * FROM users WHERE id = 1");
        $result = $result->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->api_controller->response('successo na busca do usuário', 200, $data = $result);
        } else {
            $this->api_controller->response('Usuário não encontrado', 404);
        }
    }

    private function handleRequest(): void
    {
        session_start();
        $_SESSION['address'] = $_SERVER['REMOTE_ADDR'];
    }
}
