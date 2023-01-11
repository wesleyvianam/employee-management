<?php

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Profissao;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\Helper\Pagina;
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

        $pagina = new Pagina($this->repository->qtdProfissoes($where), (int)$_GET['pagina'] ?? 1, 10);
        
        $profissoes = $this->repository->obterProfissoes($where, $pagina->obterLimite());
        unset($_GET['status']);
        unset($_GET['pagina']);
        $gets = http_build_query($_GET);

        require_once __DIR__ . '/../../../views/profissao/index.php';
    }
}