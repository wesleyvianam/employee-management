<?php

declare(strict_types=1);

use Dzenvolve\Controller\Pessoa\{
    ListaPessoasController,
    ObterPorIdController,
    FormCadastraController,
    FormAtualizaController,
    SalvaCadastroController,
    AtualizaCadastroController,
    DeletaController,
};
use Dzenvolve\Controller\Profissao\{
    DeletaProfissaoController,
    AtualizaProfissaoController,
    FormAtualizaProfissaoController,
    SalvaProfissaoController,
    FormCriaController,
    ListaProfissoesController,
};

return [
    'GET|/' => ListaPessoasController::class,
    'GET|/pessoa' => ObterPorIdController::class,
    'GET|/cadastrar-pessoa' => FormCadastraController::class,
    'POST|/cadastrar-pessoa' => SalvaCadastroController::class,
    'GET|/editar-pessoa' => FormAtualizaController::class,
    'POST|/editar-pessoa' => AtualizaCadastroController::class,
    'GET|/remover-pessoa' => DeletaController::class,
    
    'GET|/profissoes' => ListaProfissoesController::class,
    'GET|/cadastrar-profissao' => FormCriaController::class,
    'POST|/cadastrar-profissao' => SalvaProfissaoController::class,
    'GET|/editar-profissao' => FormAtualizaProfissaoController::class,
    'POST|/editar-profissao' => AtualizaProfissaoController::class,
    'GET|/remover-profissao' => DeletaProfissaoController::class,
];