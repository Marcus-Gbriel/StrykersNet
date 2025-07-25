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
            $this->core->error_in_execution(404);
            return;
        }

        //importante: implantar a verificação de classe e médoto
        // se a classe não existir, retornar erro 500
        $controller_name = $this->extract_controller($method, $route);
        if (!class_exists($controller_name[0])) {
            $this->core->error_in_execution(404);
            return;
        }

        $controller = new $controller_name[0]($this->core, $this);
        $controller->{$controller_name[1]}();
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
     * Extrai o controlador da rota
     * 
     * @param string $route Rota da requisição
     * @param string $method Método HTTP
     * @return array Controlador e método
     * 
     */
    private function extract_controller(string $method, string $route): array
    {
        $action = self::$routes[$method][$route];
        return explode('@', $action) ?? [];
    }
}
