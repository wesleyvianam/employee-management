<?php 

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Profissao;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\Repository\Repository;

class FormCriarProfissaoController implements Controller
{
    public function __construct(private Repository $repository)
    {
    }

    public function processaRequisicao()
    {

        require_once __DIR__ . "/../../../views/profissao/form.php";
    }
}