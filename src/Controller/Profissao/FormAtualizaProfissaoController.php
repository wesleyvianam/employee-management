<?php 

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Profissao;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\Repository\Repository;

class FormAtualizaProfissaoController implements Controller
{
    public function __construct(private Repository $repository)
    {
    }

    public function processaRequisicao()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            header('Location: /?sucesso=0');
            return;
        }
        $profissao = $this->repository->obterProfissaoPorId($id);
        require_once __DIR__ . "/../../../views/profissao/form.php";
    }
}