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
use RF\EmployeeManagement\Controller\User\{
    AdminController,
    DeleteUserController,
    EditUserController,
    FormEditUserController,
    FormLoginController,
    FormNewUserController,
    ListUsersController,
    LoginController,
    LogoutController,
    NewUserController,
    ProfileController,
};

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

    // User
    'POST|/admin' => AdminController::class,
    'GET|/users' => ListUsersController::class,
    'GET|/user' => ProfileController::class,
    'GET|/login' => FormLoginController::class,
    'POST|/login' => LoginController::class,
    'GET|/logout' => LogoutController::class,
    'GET|/users-new' => FormNewUserController::class,
    'POST|/users-new' => NewUserController::class,
    'GET|/users/delete' => DeleteUserController::class,
    'GET|/users-edit' => FormEditUserController::class,
    'POST|/users-edit' => EditUserController::class,
];