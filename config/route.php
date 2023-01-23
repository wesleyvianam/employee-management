<?php

declare(strict_types=1);

use RF\EmployeeManagement\Controller\Pessoa\{
    ListaPessoasController,
    ObterPorIdController,
    FormCadastraController,
    FormAtualizaController,
    SalvaCadastroController,
    AtualizaCadastroController,
    DeletaController,
};
use RF\EmployeeManagement\Controller\Profissao\{
    DeletaProfissaoController,
    AtualizaProfissaoController,
    FormAtualizaProfissaoController,
    SalvaProfissaoController,
    FormCriaController,
    ListaProfissoesController,
};

use RF\EmployeeManagement\Controller\User\FormLoginController;
use RF\EmployeeManagement\Controller\User\FormNewUserController;
use RF\EmployeeManagement\Controller\User\ListUsersController;
use RF\EmployeeManagement\Controller\User\LoginController;
use RF\EmployeeManagement\Controller\User\LogoutController;
use RF\EmployeeManagement\Controller\User\NewUserController;
use RF\EmployeeManagement\DTO\Pessoa\ListaDadosPessoa;

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

    'GET|/users' => ListUsersController::class,
    'GET|/login' => FormLoginController::class,
    'POST|/login' => LoginController::class,
    'GET|/logout' => LogoutController::class,
    'GET|/users/new' => FormNewUserController::class,
    'POST|/users/new' => NewUserController::class,
];