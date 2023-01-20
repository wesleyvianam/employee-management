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

try {
    $servername = $_ENV['DB_SERVERNAME'];
    $username = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $dbName = $_ENV['DATABASE_NAME'];
    $pdo = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
    echo "Falha ao tentar conectar ao banco de dados: " . $error->getMessage();
}

$repository = new Repository($pdo);
$service = new Service($repository);

$routes = require_once __DIR__ . "/../config/route.php";
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];


$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass($service);
} else {
    $controller = new Error404Controller();
}

/** @var Controller $controller */
$controller->processaRequisicao();
