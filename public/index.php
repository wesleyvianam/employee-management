<?php

declare(strict_types=1);

use Dzenvolve\Test\Controller\Pessoa\ListaMulheresController;
use Dzenvolve\Test\Repository\Repository;

require_once __DIR__ . '/../vendor/autoload.php';

$servername = "107.180.57.185";
$username = "dz_dev";
$password = "p?%3DY?#*LBW";
$dbName = "dz_dev_test";
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
}
$repository = new Repository($pdo);

require_once __DIR__ . '/../src/Controller/pessoa/ListaMulheresController.php';
require_once __DIR__ . '/../src/Controller/pessoa/ListaPessoasController.php';
require_once __DIR__ . '/../src/Controller/pessoa/ObterPessoaPorIdController.php';
require_once __DIR__ . '/../src/Controller/pessoa/CadastrarPessoaFormController.php';
require_once __DIR__ . '/../src/Controller/pessoa/AtualizarPessoaFormController.php';
require_once __DIR__ . '/../src/Controller/pessoa/AtualizaCadastroController.php';
require_once __DIR__ . '/../src/Controller/pessoa/DeletaPessoaController.php';
require_once __DIR__ . '/../src/Controller/pessoa/NovoCadastroController.php';
require_once __DIR__ . '/../src/Controller/Profissoes/ListaProfissoesController.php';
require_once __DIR__ . '/../src/Controller/Controller.php';

$routes = require_once __DIR__ . "/../config/route.php";
$pathInfo = $_SERVER['PATH_INFO'] ?? '/';
$httpMethod = $_SERVER['REQUEST_METHOD'];


$key = "$httpMethod|$pathInfo";
if (array_key_exists($key, $routes)) {
    $controllerClass = $routes["$httpMethod|$pathInfo"];
    $controller = new $controllerClass($repository);
} else {
    echo "Algum erro ao tentar carregar";
}

/** @var Controller $controller */
$controller->processaRequisicao();
