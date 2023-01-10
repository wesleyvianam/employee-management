<?php

declare(strict_types=1);

use Dzenvolve\Test\Controller\Pessoa\{
    AtualizaCadastroController,
    AtualizaProfissaoController,
    AtualizarPessoaFormController,
    CadastrarPessoaFormController,
    DeletaPessoaController,
    ListaMulheresController,
    ListaPessoasController,
    NovaProfissaoController,
    NovoCadastroController,
    ObterPessoaPorIdController,
};
use Dzenvolve\Test\Controller\Profissao\DeletaProfissaoController;
use Dzenvolve\Test\Controller\Profissao\FormAtualizaProfissaoController;
use Dzenvolve\Test\Controller\Profissao\formCriarProfissaoController;
use Dzenvolve\Test\Controller\Profissao\ListaProfissoesController;

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
    'GET|/cadastrar-profissao' => formCriarProfissaoController::class,
    'POST|/cadastrar-profissao' => NovaProfissaoController::class,
    'GET|/editar-profissao' => FormAtualizaProfissaoController::class,
    'POST|/editar-profissao' => AtualizaProfissaoController::class,
    'GET|/remover-profissao' => DeletaProfissaoController::class,
];