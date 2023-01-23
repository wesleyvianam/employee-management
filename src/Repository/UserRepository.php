<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Repository;

use PDO;
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