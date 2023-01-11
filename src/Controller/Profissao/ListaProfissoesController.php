<?php

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Profissao;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\Repository\Repository;

class ListaProfissoesController implements Controller
{
    public function __construct(private Repository $repository)
    {
    }
    public function processaRequisicao()
    {
        $nome = filter_input(INPUT_GET, 'nome');
        if ($nome !== false || $nome !== null) {
            $where = $nome ? "WHERE nome LIKE '%$nome%'": '';
        }

        $profissoes = $this->repository->obterProfissoes($where);
        require_once __DIR__ . '/../../../views/profissao/index.php';
    }
}