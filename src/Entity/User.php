<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Entity;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity()]
class User
{
    #[Id, GeneratedValue, Column]
    private int $id;

    public function __construct(
        #[Column]
        public readonly string $firstName,
        #[Column]
        public readonly string $lastName,
        #[Column]
        public readonly array $roles,
        #[Column]
        public readonly string $password,
    ) {  
    }

    public function getId(): int
    {
        return $this->id;
    }
}