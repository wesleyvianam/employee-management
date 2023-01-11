<?php 

declare(strict_types=1);

namespace Dzenvolve\DTO\Pessoa;

class DadosAtualizaPessoa
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $nome,
        public readonly ?string $email,
        public readonly ?string $nascimento,
        public readonly ?string $sexo,
        public readonly ?string $cpf,
        public readonly ?string $rg,
        public readonly ?string $telefone,
        public readonly ?string $celular,
        public readonly ?int $profissao_id
    ){
    }
}