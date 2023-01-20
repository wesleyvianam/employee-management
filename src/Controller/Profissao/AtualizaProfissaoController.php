<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\Profissao;

use RF\EmployeeManagement\Controller\Controller;
use RF\EmployeeManagement\DTO\Profissao\DadosAtualizaProfissao;
use RF\EmployeeManagement\Service\Service;

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