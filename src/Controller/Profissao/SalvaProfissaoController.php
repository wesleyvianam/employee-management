<?php

declare(strict_types=1);

namespace Dzenvolve\Controller\Profissao;

use Dzenvolve\Controller\Controller;
use Dzenvolve\Service\Service;

class SalvaProfissaoController implements Controller
{
    public function __construct(private Service $service) 
    {  
    }

    public function processaRequisicao()
    {
        $nome = $this->service->validaDados(INPUT_POST, 'nome');
        return $this->service->salvaProfissao($nome);
    }
}