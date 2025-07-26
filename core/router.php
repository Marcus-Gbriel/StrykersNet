<?php

/**
 * 
 * Roteador de requisições
 * 
 * @author Marcus Gabriel Xavier Geraldino <marcusgx45@gmail.com>
 * @version 0.0.1
 * 
 */
class router
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
            'home' => 'PageController@home',
            'about' => 'PageController@about',
            'contact' => 'PageController@contact',
            'public' => 'PublicController@index',
            'api' => 'ApiController@index',
        ],
        'POST' => [
            'api' => 'ApiController@index',
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
        $route = $this->get_request_uri(0);
        $method = $this->get_method_uri();

        $this->handle_request($method, $route);
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
    private function handle_request(string $method, string $route): void
    {
        if (!isset(self::$routes[$method][$route])) {
            $this->core->error(404);
            var_dump(self::$routes);
            return;
        }

        //importante: implantar a verificação de classe e médoto
        // se a classe não existir, retornar erro 500

        if (!array_key_exists($route, self::$routes[$method])) {
            $this->core->error(500);
            return;
        }

        $controller_method = self::$routes[$method][$route];
        if (!$this->verify_route($controller_method)) {
            $this->core->error(500);
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
    public function get_request_uri(int $level): string
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
    public function get_method_uri(): string
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
    private function verify_route(string $class_method): bool
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
