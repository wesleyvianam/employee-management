<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Service;

use RF\EmployeeManagement\Entity\User;
use RF\EmployeeManagement\Repository\UserRepository;

class UserService
{
    public function __construct(private UserRepository $repository)
    {  
    }

    private function validaDados($name, $filter = FILTER_DEFAULT, $redirect)
    {
        $data = filter_var($name, $filter);
        if ($data === null || $data === false) {
            header("Location: $redirect");
            return;
        }

        return $data;
    }

    private function isEquals($password, $confirmPassword)
    {
        if ($password !== $confirmPassword) {
            header('Location: /new-user?error-password-equals');
            return;
        }
    }

    private function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2ID);
    }

    public function add(array $data)
    {
        $name = $this->validaDados(
            $data['name'], FILTER_DEFAULT, '/new-user');

        $email = $this->validaDados(
            $data['email'], FILTER_VALIDATE_EMAIL, '/new-user');

        $password = $this->validaDados(
            $data['password'], FILTER_DEFAULT, '/new-user');

        $confirmPassword = $this->validaDados(
            $data['password-confirm'], FILTER_DEFAULT, '/new-user');

        $roles = ['ROLE_ADMIN'];
        
        $this->isEquals($password, $confirmPassword);

        $hash = $this->hashPassword($password);
        
        $user = new User($name, $email, $roles, $hash);

        $this->repository->save($user);
    }
}