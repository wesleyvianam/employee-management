<?php

declare(strict_types=1);

namespace Dzenvolve\Test\Controller\Profissao;

use Dzenvolve\Test\Controller\Controller;
use Dzenvolve\Test\DTO\Profissao\DadosAtualizaProfissao;
use Dzenvolve\Test\Repository\Repository;
use Exception;

class AtualizaProfissaoController implements Controller
{
    public function __construct(private Repository $repository)
    {    
    }

    public function processaRequisicao()
    {
        $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            header('Location: /?id-error=0');
            return;
        }

        $nome = filter_input(INPUT_POST, 'nome');
        if ($nome === false || $nome === null) {
            header('Location: /?nome-error=0');
            return;
        }

        $successo = $this->repository->atualizaProfissao(new DadosAtualizaProfissao($id,$nome));
        $successo === false
            ? header('Location: /?sucesso=0')
            : header('Location: /?sucesso=1');
    }
}