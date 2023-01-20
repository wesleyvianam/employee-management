<?php

declare(strict_types=1);

use RF\EmployeeManagement\Service\Service;
use RF\EmployeeManagement\Repository\Repository;
use RF\EmployeeManagement\Controller\Controller;
use RF\EmployeeManagement\Controller\Error404Controller;

// use Dzenvolve\Controller\Pessoa\{
//     ListaPessoasController,
//     ObterPorIdController,
//     FormCadastraController,
//     FormAtualizaController,
//     SalvaCadastroController,
//     AtualizaCadastroController,
//     DeletaController,
// };
// use Dzenvolve\Controller\Profissao\{
//     DeletaProfissaoController,
//     AtualizaProfissaoController,
//     FormAtualizaProfissaoController,
//     SalvaProfissaoController,
//     FormCriaController,
//     ListaProfissoesController,
// };

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Controller/Erro404Controller.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

/** @var \Psr\Container\ContainerInterface $diContainer */
$diContainer = require_once __DIR__ . '/../config/dependencyInjection.php';

$routes = require_once __DIR__ . "/../config/route.php";
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];


$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];

    $controller =  $diContainer->get($controllerClass);
} else {
    $controller = new Error404Controller();
}

$psr17Factory = new \Nyholm\Psr7\Factory\Psr17Factory();

$creator = new \Nyholm\Psr7Server\ServerRequestCreator(
    $psr17Factory, // ServerRequestFactory
    $psr17Factory, // UriFactory
    $psr17Factory, // UploadedFileFactory
    $psr17Factory, // StreamFactory
);

$request = $creator->fromGlobals();

/** @var \psr\Http\Server\RequestHandlerInterface $controller */
$response = $controller->handle($request);

http_response_code($response->getStatusCode());
foreach ($response->getHeaders() as $name => $values) {
    foreach ($values as $value) {
        header(sprintf('%s: %s', $name, $value), false);
    }
}

echo $response->getBody();