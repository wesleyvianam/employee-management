<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\Profissao;

use RF\EmployeeManagement\Controller\Controller;
use RF\EmployeeManagement\Service\Service;

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