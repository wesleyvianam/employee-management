<?php

declare(strict_types=1);

namespace Dzenvolve\Controller\Profissao;

use Dzenvolve\Controller\Controller;
use Dzenvolve\DTO\Profissao\DadosAtualizaProfissao;
use Dzenvolve\Service\Service;

class AtualizaProfissaoController implements Controller
{
    public function __construct(private Service $service) 
    {  
    }

    public function processaRequisicao()
    {
        $id = $this->service->validaDados(INPUT_POST, 'id');
        $nome = $this->service->validaDados(INPUT_POST, 'nome');

        return $this->service->atualizaProfissao(intval($id), $nome);
    }
}