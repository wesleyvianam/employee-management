<?php

declare(strict_types=1);

use Dzenvolve\Test\Controller\Pessoa\ListaMulheresController;
use Dzenvolve\Test\Repository\Repository;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->safeLoad();

$servername = $_ENV['DB_SERVERNAME'];
$username = $_ENV['DB_USERNAME'];
$password = $_ENV['DB_PASSWORD'];
$dbName = $_ENV['DATABASE_NAME'];
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $error) {
    echo "Connection failed: " . $error->getMessage();
}
$repository = new Repository($pdo);

require_once __DIR__ . '/../src/Controller/Pessoa/AtualizaCadastroController.php';
require_once __DIR__ . '/../src/Controller/Pessoa/DeletaController.php';
require_once __DIR__ . '/../src/Controller/Pessoa/FormAtualizaController.php';
require_once __DIR__ . '/../src/Controller/Pessoa/FormCadastraController.php';
require_once __DIR__ . '/../src/Controller/Pessoa/ListaMulheresController.php';
require_once __DIR__ . '/../src/Controller/Pessoa/ListaPessoasController.php';
require_once __DIR__ . '/../src/Controller/Pessoa/ObterPorIdController.php';
require_once __DIR__ . '/../src/Controller/Pessoa/SalvaCadastroController.php';


require_once __DIR__ . '/../src/Controller/Profissao/ListaProfissoesController.php';
require_once __DIR__ . '/../src/Controller/Profissao/FormCriaController.php';
require_once __DIR__ . '/../src/Controller/Profissao/SalvaProfissaoController.php';
require_once __DIR__ . '/../src/Controller/Profissao/FormAtualizaProfissaoController.php';
require_once __DIR__ . '/../src/Controller/Profissao/AtualizaProfissaoController.php';
require_once __DIR__ . '/../src/Controller/Profissao/DeletaProfissaoController.php';

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
