<?php

class AuthController
{
    private $core = null;
    private $router = null;
    private $api_controller = null;
    private $session = null;

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
        /**
         * 
         * Implementar uma forma melhor de tratar a requisição de login
         * 
         */
        $username = $this->api_controller->sanitize_input($_POST['username'] ?? '');
        $password = $this->api_controller->sanitize_input($_POST['password'] ?? '');

        if ($username == '' || $password == '') {
            $this->api_controller->response('login data cannot be empty', 400);
        }

        $result = Database::query(
            "SELECT * FROM users WHERE username = :username",
            [
                ':username' => $username
            ]
        );
        $result = $result->fetch(PDO::FETCH_ASSOC);

        if (!$result) {
            $this->api_controller->response('user not found', 404);
        }

        if (!password_verify($password, $result['password'])) {
            $this->api_controller->response('incorrect password', 401);
        }

        $this->session->set('user_id', $result['id']);
        $this->session->set('username', $result['username']);
        $this->session->set('logged_in', true);

        $this->api_controller->response('login successful', 200);
    }

    private function handleRequest(): void
    {
        $this->session = new Session();
    }
}
