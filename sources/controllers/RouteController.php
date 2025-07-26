<?php

class RouteController
{
    private $core = null;
    private $router = null;
    private $apiController = null;

    public function __construct(Core $core, Router $router, ApiController $apiController)
    {
        $this->core = $core;
        $this->router = $router;
        $this->apiController = $apiController;
    }

    public function index(): void
    {
        $this->handleRequest();
    }

    private function handleRequest(): void
    {
        $page = $this->router->get_request_uri(2);
        $file_path = DOCUMENT_ROOT . '/sources/pages/' . $page . '.php';

        if (!file_exists($file_path)) {
            $this->core->error(404);
        }

        require_once $file_path;
    }
}
