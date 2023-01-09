<?php

declare(strict_types=1);

use Dzenvolve\Test\Repository\PersonRepository;

require_once __DIR__ . '/../vendor/autoload.php';

$servername = "107.180.57.185";
$username = "dz_dev";
$password = "p?%3DY?#*LBW";
$dbName = "dz_dev_test";
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successfully";
} catch(PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
}
$personReposotory = new PersonRepository($pdo);

use Dzenvolve\Test\Controller\HelloController;

require_once __DIR__ . '/../src/Controller/helloController.php';


$routes = require_once __DIR__ . "/../config/route.php";
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];

$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass($personReposotory);
} else {
    echo "Nada acontece Feijoada";
}

/** @var Controller $controller */
$controller->index();

