<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Entity;

class User
{
    private int $id;

    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $roles,
        public readonly string $password,
    ) {  
    }

    public function getId(): int
    {
        return $this->id;
    }
}