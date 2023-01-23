<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Service;

use Nyholm\Psr7\Response;
use RF\EmployeeManagement\DTO\User\EditDataUser;
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

    private function passwordIsCorrect($password, $userPassword): bool
    {
        return password_verify($password, $userPassword ?? '');
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

    public function getUser(array $data)
    {
        $email = $this->validaDados(
            $data['email'], FILTER_VALIDATE_EMAIL, '/login');

        $password = $this->validaDados(
            $data['password'], FILTER_DEFAULT, '/login');

        $user = $this->repository->getUserByEmail($email);

        return $this->passwordIsCorrect($password, $user['password']);
    } 

    public function getAllUsers()
    {
        return $this->repository->getAll();
    }

    public function getUserById(array $data)
    {
        $id = $this->validaDados(
            $data['id'], FILTER_VALIDATE_INT, '/users');
            
        return $this->repository->getUserById($id);
    }

    public function editUser(array $dataId, array $params)
    {
        $id = $this->validaDados(
            $dataId['id'], FILTER_VALIDATE_INT, "/users");

        $name = $this->validaDados(
            $params['name'], FILTER_DEFAULT, '/users');

        $email = $this->validaDados(
            $params['email'], FILTER_VALIDATE_EMAIL, '/users');

        $password = $this->validaDados(
            $params['password'], FILTER_DEFAULT, '/users');

        $confirmPassword = $this->validaDados(
            $params['password-confirm'], FILTER_DEFAULT, '/users');

        $this->isEquals($password, $confirmPassword);

        $hash = $this->hashPassword($password);

        $user = new EditDataUser($id, $name, $email, $hash);

        return $this->repository->edit($user);        
    }

    public function deleteUser(array $data)
    {
        $id = $this->validaDados($data['id'], FILTER_VALIDATE_INT, '/users');

        $this->repository->delete($id);
    }
}