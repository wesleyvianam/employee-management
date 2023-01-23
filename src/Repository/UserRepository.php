<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Repository;

use PDO;
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
}