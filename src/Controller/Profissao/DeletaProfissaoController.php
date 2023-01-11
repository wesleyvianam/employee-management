<?php

declare(strict_types=1);

namespace Dzenvolve\Controller\Profissao;

use Dzenvolve\Controller\Controller;
use Dzenvolve\Service\Service;

class DeletaProfissaoController implements Controller
{
    public function __construct(private Service $service) 
    {  
    }

    public function processaRequisicao()
    {
        $id = $this->service->validaDados(INPUT_GET, 'id');
        return $this->service->removeProfissao(intval($id));
    }
}