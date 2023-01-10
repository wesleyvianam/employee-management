<?php

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Profissao;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\Repository\Repository;

class DeletaProfissaoController implements Controller
{
    public function __construct(private Repository $repository)
    {
    }

    public function processaRequisicao()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            header('Location: /?sucesso=0');
            return;
        }
        
        $successo = $this->repository->removeProfissao($id);
        $successo === false 
            ? header('Location: /?sucesso=0') 
            : header('Location: /?sucesso=1');
    }
}