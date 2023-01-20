<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\Pessoa;

use RF\EmployeeManagement\Controller\Controller;
use RF\EmployeeManagement\Repository\Repository;
use RF\EmployeeManagement\Service\Service;

class DeletaController implements Controller
{
    public function __construct(private Service $service) 
    {  
    }

    public function processaRequisicao()
    {
        $id = $this->service->validaDados(INPUT_GET, 'id');
        return $this->service->removePessoa(intval($id));
    }
}