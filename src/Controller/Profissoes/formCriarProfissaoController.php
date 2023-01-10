<?php 

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Profissoes;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\Repository\Repository;

class formCriarProfissaoController implements Controller
{
    public function __construct(private Repository $repository)
    {
    }

    public function processaRequisicao()
    {

        require_once __DIR__ . "/../../../views/profissao/form.php";
    }
}