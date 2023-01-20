<?php 

declare(strict_types=1);

namespace RF\EmployeeManagement\DTO\Pessoa;

class ListaDadosPessoa
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $nome,
        public readonly ?string $nascimento,
        public readonly ?string $sexo,
        public readonly ?string $cpf,
        public readonly ?string $rg,
        public readonly ?string $email,
        public readonly ?string $celular,
        public readonly ?string $telefone,
        public readonly ?int $profissao_id,
        public readonly ?string $profissao
    ){
    }
}