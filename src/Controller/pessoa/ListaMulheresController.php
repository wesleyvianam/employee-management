<?php

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Pessoa;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\Repository\Repository;

class ListaMulheresController implements Controller
{

    public function __construct(private Repository $repository)
    {
    }

    public function processaRequisicao()
    {
        $pessoas = $this->repository->ObterPorGeneroEIdade();

        require_once __DIR__ . '/../../../views/pessoa/index.php';
    }
}