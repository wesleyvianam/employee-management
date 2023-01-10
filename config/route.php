<?php

declare(strict_types=1);

use Dzenvolve\Test\Controller\Pessoa\{
    AtualizaCadastroController,
    AtualizarPessoaFormController,
    CadastrarPessoaFormController,
    DeletaPessoaController,
    ListaMulheresController,
    ListaPessoasController,
    NovoCadastroController,
    ObterPessoaPorIdController,
};
use Dzenvolve\Test\Controller\Profissoes\ListaProfissoesController;

return [
    'GET|/' => ListaMulheresController::class,
    'GET|/pessoas' => ListaPessoasController::class,
    'GET|/pessoa' => ObterPessoaPorIdController::class,
    'GET|/cadastrar-pessoa' => CadastrarPessoaFormController::class,
    'GET|/editar-pessoa' => AtualizarPessoaFormController::class,
    'GET|/profissoes' => ListaProfissoesController::class,
    'POST|/cadastrar-pessoa' => NovoCadastroController::class,
    'POST|/editar-pessoa' => AtualizaCadastroController::class,
    'GET|/remover-pessoa' => DeletaPessoaController::class,
];