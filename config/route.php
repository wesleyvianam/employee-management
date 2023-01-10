<?php

declare(strict_types=1);

use Dzenvolve\Test\Controller\Pessoa\ListaMulheresController;
use Dzenvolve\Test\Controller\Pessoa\ListaPessoasController;
use Dzenvolve\Test\Controller\Pessoa\ObterPessoaPorIdController;
use Dzenvolve\Test\Controller\Profissoes\ListaProfissoesController;

return [
    'GET|/' => ListaMulheresController::class,
    'GET|/pessoas' => ListaPessoasController::class,
    'GET|/pessoa' => ObterPessoaPorIdController::class,
    'GET|/profissoes' => ListaProfissoesController::class,
];