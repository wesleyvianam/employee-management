<?php 

declare(strict_types=1);

namespace Dzenvolve\Entity;

class Profissao
{
    private int $id;

    public function __construct(
        public readonly string $nome,
    ){   
    }

    public function getId()
    {
        return $this->id;
    }
}