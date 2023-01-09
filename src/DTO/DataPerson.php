<?php 

// declare(strict_types);

namespace Dzenvolve\Test\DTO;

use DateInterval;
use DateTimeImmutable;

class DataPerson
{
    public function __construct(
        public readonly int $id,
        public readonly string $nome,
        public $nascimento,
        public readonly string $sexo,
        public readonly string $cpf,
        public readonly string $email,
        public readonly string $celular,
        public $profissao_id
    ){   
    }

}