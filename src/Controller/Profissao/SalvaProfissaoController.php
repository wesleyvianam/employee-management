<?php

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Profissao;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\Repository\Repository;
use Dzenvolve\Test\Entity\Profissao;

class SalvaProfissaoController implements Controller
{
    public function __construct(private Repository $repository)
    {
        
    }
    public function processaRequisicao()
    {
        $nome = filter_input(INPUT_POST, 'nome');
        if ($nome === false || $nome === null) {
            header('Location: /?nome-error=0');
            return;
        }
        $successo = $this->repository->cadastraProfissao(new Profissao($nome));
        $successo === false 
            ? header('Location: /?sucesso=0') 
            : header('Location: /?sucesso=1');
    }
}