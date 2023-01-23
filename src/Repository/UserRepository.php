<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Repository;

use PDO;
use RF\EmployeeManagement\DTO\User\EditDataUser;
use RF\EmployeeManagement\DTO\User\ListDataUser;
use RF\EmployeeManagement\Entity\User;

class UserRepository
{
    public function __construct(private PDO $pdo)
    {   
    }

    public function save(User $user)
    {
        $sql = 
            "INSERT INTO users (name, email, roles, password) 
            VALUES (:name,:email,:roles,:password);
        ";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':name', $user->name);
        $statement->bindValue(':email', $user->email);
        $statement->bindValue(':roles', json_encode($user->roles));
        $statement->bindValue(':password', $user->password);
        
        $statement->execute();
    }

    public function getUserById(int $id)
    {
        $sql = "SELECT id, name, email, roles FROM users WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getUserbyEmail(string $email)
    {
        $sql = "SELECT * FROM users WHERE email = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $email);
        $statement->execute();
        
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function getAll()
    {
        $sql = "SELECT id, name, email, roles FROM users";
        $users = $this->pdo->query($sql)->fetchAll(\PDO::FETCH_ASSOC);
        return array_map($this->hydrateUsers(...), $users);
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM users WHERE id = :id';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);

        return $statement->execute();
    }

    public function edit(EditDataUser $data): bool
    {
        $sql = 
            "UPDATE users 
            SET name = :name, email = :email, password = :password
            WHERE id = :id
        ;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':id', $data->id, PDO::PARAM_INT);
        $statement->bindValue(':name', $data->name);
        $statement->bindValue(':email', $data->email);
        $statement->bindValue(':password', $data->passwordHash);
        
        return $statement->execute();
    }

    private function hydrateUsers(array $dataUser): ListDataUser
    {
        $roles = json_decode($dataUser['roles']);
        $user = new ListDataUser(
            $dataUser['id'],
            $dataUser['name'],
            $dataUser['email'],
            $roles,
        );
        
        return $user;
    }

}