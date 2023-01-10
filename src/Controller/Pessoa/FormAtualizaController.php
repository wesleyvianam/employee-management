<?php 

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Pessoa;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\Repository\Repository;

class FormAtualizaController implements Controller
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
        $pessoa = $this->repository->obterPessoaPorId($id);
        $profissoes = $this->repository->obterProfissoes();
        require_once __DIR__ . "/../../../views/pessoa/form.php";
    }
}