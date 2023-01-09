<?php 

declare(strict_types=1);

namespace Dzenvolve\Test\Entity;

use DateTime;

class Person
{
    private int $id;
    public readonly string $nome;
    public $nascimento;
    public readonly string $sexo;
    public readonly string $cpf;
    public readonly string $email;
    public readonly string $telefone;
    public readonly string $celular;
    public $profissao;

    public function __construct(
        string $nome,
        $nascimento,
        string $sexo,
        string $cpf,
        string $email,
        string $telefone,
        string $celular,
        $profissao,
    ){   
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

}