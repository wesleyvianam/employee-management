<?php

declare(strict_types=1);

namespace Dzenvolve\Test\Controller;

class HelloController
{
    public function index() 
    {
        $hello = "Hello World Dzenvolve";
        require_once __DIR__ . '/../../views/home.php';
    }
}