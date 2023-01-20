<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Entity;

class User
{
    private int $id;

    public function __construct(
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly array $roles,
        public readonly string $password,
    ) {  
    }

    public function getId(): int
    {
        return $this->id;
    }
}