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
    ];

    /**
     * 
     * Construtor do controlador de API
     * 
     * @param Core $core
     * @param router $router
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

    private function handleRequest(): void
    {
        header('Content-Type: application/json');

        $method = $this->router->get_method_uri();
        $route = $this->router->get_request_uri(1);

        if (!$this->route_exists($method, $route)) {
            $this->respose_api(
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
            $this->respose_api(
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
     * @return void
     * 
     */
    private function respose_api($message = '', $status = 200, $data = []): void
    {
        http_response_code($status);
        echo json_encode([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ]);
        exit;
    }

    /**
     * 
     * Verifica se a rota existe
     * 
     * @param string $method
     * @param string $route
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

    private function class_exists(string $class_method): bool
    {
        $class_method = explode('@', $class_method);
        if (count($class_method) !== 2) {
            return false;
        }

        if (!class_exists($class_method[0]) && !method_exists($class_method[0], $class_method[1])) {
            return false;
        }

        return true;
    }
}
