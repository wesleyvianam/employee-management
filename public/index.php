<?php

declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use Dzenvolve\Test\Controller\HelloController;
require_once __DIR__ . '/../src/Controller/helloController.php';

$routes = require_once __DIR__ . "/../config/route.php";

$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass();
} else {
    echo "Nada acontece Feijoada";
}

/** @var Controller $controller */
$controller->index();

