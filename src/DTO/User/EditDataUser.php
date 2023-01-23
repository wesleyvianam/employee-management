<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\DTO\User;

class EditDataUser
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly string $passwordHash
    ){   
    }
}