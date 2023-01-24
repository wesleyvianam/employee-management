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
use RF\EmployeeManagement\Controller\User\AdminController;
use RF\EmployeeManagement\Controller\User\DeleteUserController;
use RF\EmployeeManagement\Controller\User\EditUserController;
use RF\EmployeeManagement\Controller\User\FormAdminController;
use RF\EmployeeManagement\Controller\User\FormEditUserController;
use RF\EmployeeManagement\Controller\User\FormLoginController;
use RF\EmployeeManagement\Controller\User\FormNewUserController;
use RF\EmployeeManagement\Controller\User\ListUsersController;
use RF\EmployeeManagement\Controller\User\LoginController;
use RF\EmployeeManagement\Controller\User\LogoutController;
use RF\EmployeeManagement\Controller\User\NewUserController;
use RF\EmployeeManagement\DTO\Pessoa\ListaDadosPessoa;
use RF\EmployeeManagement\DTO\User\EditDataUser;

return [
    // Employee
    'GET|/' => ListaPessoasController::class,
    'GET|/pessoa' => ObterPorIdController::class,
    'GET|/cadastrar-pessoa' => FormCadastraController::class,
    'POST|/cadastrar-pessoa' => SalvaCadastroController::class,
    'GET|/editar-pessoa' => FormAtualizaController::class,
    'POST|/editar-pessoa' => AtualizaCadastroController::class,
    'GET|/remover-pessoa' => DeletaController::class,
    
    // Profession
    'GET|/profissoes' => ListaProfissoesController::class,
    'GET|/cadastrar-profissao' => FormCriaController::class,
    'POST|/cadastrar-profissao' => SalvaProfissaoController::class,
    'GET|/editar-profissao' => FormAtualizaProfissaoController::class,
    'POST|/editar-profissao' => AtualizaProfissaoController::class,
    'GET|/remover-profissao' => DeletaProfissaoController::class,

    // Users
    'POST|/admin' => AdminController::class,
    'GET|/users' => ListUsersController::class,
    'GET|/login' => FormLoginController::class,
    'POST|/login' => LoginController::class,
    'GET|/logout' => LogoutController::class,
    'GET|/users-new' => FormNewUserController::class,
    'POST|/users-new' => NewUserController::class,
    'GET|/users/delete' => DeleteUserController::class,
    'GET|/users-edit' => FormEditUserController::class,
    'POST|/users-edit' => EditUserController::class,
];