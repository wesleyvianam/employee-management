<?php 

declare(strict_types=1);

namespace Dzenvolve\Test\DTO\Pessoa;

use DateInterval;
use DateTime;
use DateTimeImmutable;

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
        public readonly ?string $telefone,
        public readonly ?string $celular,
        public readonly ?string $profissao
    ){
    }
}