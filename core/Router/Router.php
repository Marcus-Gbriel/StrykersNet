<?php

/**
 * 
 * Roteador de requisições
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class Router
{
    private $core = null;

    /**
     * 
     * Rotas do sistema
     * 
     * @var array
     * 
     */
    private static $routes = [
        'GET' => [
            'home' => [
                'controller' => 'PageController@home',
                'middlewares' => []
            ],
            'about' => [
                'controller' => 'PageController@about',
                'middlewares' => []
            ],
            'contact' => [
                'controller' => 'PageController@contact',
                'middlewares' => []
            ],
            'divisions' => [
                'controller' => 'PageController@divisions',
                'middlewares' => []
            ],
            'login' => [
                'controller' => 'PageController@login',
                'middlewares' => ['auth', 'log']
            ],
            'web' => [
                'controller' => 'SystemController@index',
                'middlewares' => ['auth', 'log']
            ],
            'logout' => [
                'controller' => 'SystemController@logout',
                'middlewares' => ['auth', 'log']
            ],
            'robots.txt' => [
                'controller' => 'PageController@robots',
                'middlewares' => []
            ],
            'public' => [
                'controller' => 'PublicController@index',
                'middlewares' => []
            ],
            'api' => [
                'controller' => 'ApiController@index',
                'middlewares' => []
            ],
        ],
        'POST' => [
            'api' => [
                'controller' => 'ApiController@index',
                'middlewares' => []
            ],
        ],
        'PUT' => [],
        'DELETE' => [],
        'PATCH' => [
            'api' => 'ApiController@index',
        ],
    ];

    /**
     * 
     * Contrutor do roteador
     * 
     * @return void
     * 
     */
    public function __construct(Core $core)
    {
        $this->core = $core;
        $this->init();
    }

    /**
     * 
     * Inicializa o roteador
     * 
     * @return void
     * 
     */
    private function init(): void
    {
        $route = $this->getRequestUri(0);
        $method = $this->getMethodUri();

        $this->handleRequest($method, $route);
    }

    /**
     * 
     * Método para lidar com a requisição
     *
     * @param string $method Método HTTP
     * @param string $route Rota da requisição
     * @return void
     * 
     */
    private function handleRequest(string $method, string $route): void
    {
        if (!isset(self::$routes[$method][$route])) {
            $this->core->error(404);
            return;
        }

        //importante: implantar a verificação de classe e médoto
        // se a classe não existir, retornar erro 500

        if (!array_key_exists($route, self::$routes[$method])) {
            $this->core->error(500);
            $this->core->log("Rota não encontrada: $method $route");
            return;
        }

        $controller_method = self::$routes[$method][$route]['controller'];
        if (!$this->verifyRoute($controller_method)) {
            $this->core->error(500);
            $this->core->log("Rota inválida: $controller_method");
            return;
        }

        $controller_method = explode('@', $controller_method);

        $controller = new $controller_method[0]($this->core, $this);
        $controller->{$controller_method[1]}();
    }

    /**
     * 
     * Obtém o URI da requisição
     *
     * @param integer $level Seleciona o nível
     * @return string
     * 
     */
    public static function getRequestUri(int $level): string
    {
        $uri = $_SERVER['REQUEST_URI'];
        $parts = explode('/', trim($uri, '/'));
        //$parts = explode('?', $parts[0]);
        if ($level < 0 || $level >= count($parts)) {
            return '';
        }
        return $parts[$level] ?: 'home';
    }

    /**
     * 
     * Obtém o método HTTP da requisição
     * 
     * @return string
     * 
     */
    public static function getMethodUri(): string
    {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
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
    private function verifyRoute(string $class_method): bool
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
}
