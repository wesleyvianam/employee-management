<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\Pessoa;

use RF\EmployeeManagement\Controller\Controller;
use RF\EmployeeManagement\Entity\Pessoa;
use RF\EmployeeManagement\Service\Service;

class SalvaCadastroController implements Controller
{
    public function __construct(private Service $service) 
    {  
    }

    public function processaRequisicao()
    {
        $nome = $this->service->validaDados(INPUT_POST, 'nome');
        $email = $this->service->validaDados(INPUT_POST, 'email');
        $nascimento = $this->service->validaDados(INPUT_POST, 'nascimento');
        $sexo = $this->service->validaDados(INPUT_POST, 'sexo');
        $cpf = $this->service->validaDados(INPUT_POST, 'cpf');
        $rg = $this->service->validaDados(INPUT_POST, 'rg');
        $celular = $this->service->validaDados(INPUT_POST, 'celular');
        $telefone = $this->service->validaDados(INPUT_POST, 'telefone');
        $profissao = $this->service->validaDados(INPUT_POST, 'profissao_id');
        $profissao_id = intval(str_replace("&gt;",'',$profissao));
        
        return $this->service->salvaPessoa(
            $nome, 
            $email, 
            $nascimento, 
            $sexo, 
            $cpf, 
            $rg, 
            $celular, 
            $telefone, 
            $profissao_id
        );
    }
}