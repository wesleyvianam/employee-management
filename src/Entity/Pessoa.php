<?php 

declare(strict_types=1);

namespace Dzenvolve\Test\Entity;

class Pessoa
{
    private int $id;

    public function __construct(
        public readonly string $nome,
        public readonly string $email,
        public readonly string $nascimento,
        public readonly string $sexo,
        public readonly string $cpf,
        public readonly string $rg,
        public readonly string $celular,
        public readonly string $telefone,
        public readonly int $profissao_id,
    ){   
    }

    public function getId()
    {
        return $this->id;
    }
}