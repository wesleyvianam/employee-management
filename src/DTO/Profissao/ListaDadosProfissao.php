<?php 

declare(strict_types=1);

namespace RF\EmployeeManagement\DTO\Profissao;

class ListaDadosProfissao
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $nome
    ) {
    } 
}