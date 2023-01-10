<?php 

declare(strict_types=1);

namespace Dzenvolve\Test\Entity;

use DateTime;

class Person
{
    public function __construct(
        private int $id,
        private string $nome,
        private DateTime $nascimento,
        private string $sexo,
        private string $cpf,
        private string $rg,
        private string $email,
        private string $telefone,
        private string $celular,
        private int $profissao_id,
    ){   
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getNascimento(): DateTime
    {
        return $this->nascimento;
    }

    public function getSexo(): string
    {
        return $this->sexo;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getRg(): string
    {
        return $this->rg;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getCelular(): string
    {
        return $this->celular;
    }

    public function getProfissao(): int
    {
        return $this->profissao_id;
    }
    
}