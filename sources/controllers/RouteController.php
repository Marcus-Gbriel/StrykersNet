<?php

class RouteController
{
    public function home(): void
    {
        require_once 'sources/pages/home.php';
    }

    public function about(): void
    {
        require_once 'sources/pages/about.php';
    }
}
