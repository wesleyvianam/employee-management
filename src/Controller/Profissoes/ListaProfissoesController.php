<?php

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Profissoes;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\Repository\Repository;

class ListaProfissoesController implements Controller
{
    public function __construct(private Repository $repository)
    {
    }
    public function processaRequisicao()
    {
        $profissoes = $this->repository->ObterProfissoes();
        require_once __DIR__ . '/../../../views/profissoes/index.php';
    }
}