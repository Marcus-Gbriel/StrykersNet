<?php

/**
 * 
 * Controlador de Requisições API
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class ApiController
{
    private $core = null;
    private $router = null;
    private $routes = [
        'GET' => [],
        'POST' => [
            'login' => 'AuthController@login',
        ],
        'PATCH' => [
            'routes' => 'RouteController@index',
        ],
    ];

    /**
     * 
     * Construtor do controlador de API
     * 
     * @param Core $core
     * @param Router $router
     * 
     */
    public function __construct($core, $router)
    {
        $this->core = $core;
        $this->router = $router;
    }


    /**
     * 
     * Método de entrada para o controlador de API
     * 
     * @return void
     * 
     */
    public function index(): void
    {
        $this->handleRequest();
    }

    /**
     * 
     * Método para lidar com a requisição da API
     * 
     * @return void
     * 
     */
    private function handleRequest(): void
    {
        header('Content-Type: application/json');

        $method = $this->router->getMethodUri();
        $route = $this->router->getRequestUri(1);

        if (!$this->route_exists($method, $route)) {
            $this->response(
                'invalid request',
                404,
                [
                    'method' => $method,
                    'route' => $route,
                ]
            );
        }

        $class_method = $this->routes[$method][$route];
        if (!$this->class_exists($class_method)) {
            $this->core->log('error class not found - ' . $class_method);
            $this->response(
                'class not found',
                500,
                [
                    'method' => $method,
                    'route' => $route,
                ]
            );
        }

        $class_method = explode('@', $class_method);
        $controller = new $class_method[0]($this->core, $this->router, $this);
        $controller->{$class_method[1]}();
    }

    /**
     * 
     * Método para retornar o status da API
     * 
     * @param string $message Mensagem a ser retornada
     * @param int $status Código de status HTTP (default: 200)
     * @param array $data Dados adicionais a serem retornados (default: [])
     * @return void
     * 
     */
    public function response($message = '', $status = 200, $data = []): void
    {
        http_response_code($status);
        $success = false;

        if ($status == 200) {
            $success = true;
        }

        $response = [
            'success' => $success,
            'status' => $status,
            'message' => $message,
        ];

        if (!empty($data)) {
            $response['data'] = $data;
        }

        echo json_encode($response);
        exit;
    }

    /**
     * 
     * Verifica se a rota existe
     * 
     * @param string $method Método HTTP (GET, POST, etc.)
     * @param string $route Rota solicitada
     * @return bool
     * 
     */
    private function route_exists(string $method, string $route): bool
    {
        if (isset($this->routes[$method]) && array_key_exists($route, $this->routes[$method])) {
            return true;
        }
        return false;
    }

    /**
     * 
     * Verifica se a classe e o método existem
     * 
     * @param string $class_method Texto no formato 'ClassName@methodName'
     * @return bool
     * 
     */
    private function class_exists(string $class_method): bool
    {
        $class_method = explode('@', $class_method);
        if (count($class_method) !== 2) {
            return false;
        }

        if (!class_exists($class_method[0])) {
            return false;
        }

        if (!method_exists($class_method[0], $class_method[1])) {
            return false;
        }

        return true;
    }

    /**
     * 
     * Sanitiza a entrada de dados
     * 
     * @param string $data Dados a serem sanitizados
     * @return string Dados sanitizados
     * 
     */
    public function sanitize_input(string $data): string
    {
        return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
    }

    /**
     * 
     * Valida um endereço de e-mail
     *
     * @param string $email
     * @return boolean
     * 
     */
    public function validate_email(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}
