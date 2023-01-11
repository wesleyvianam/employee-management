<?php

declare(strict_types=1);

namespace Dzenvolve\Controller\Pessoa;

use Dzenvolve\Service\Service;
use Dzenvolve\Controller\Controller;

class AtualizaCadastroController implements Controller
{
    public function __construct(private Service $service) 
    {  
    }

    public function processaRequisicao()
    {
        $id = $this->service->validaDados(INPUT_POST, 'id');
        $nome = $this->service->validaDados(INPUT_POST, 'nome');
        $email = $this->service->validaDados(INPUT_POST, 'email');
        $nascimento = $this->service->validaDados(INPUT_POST, 'nascimento');
        $sexo = $this->service->validaDados(INPUT_POST, 'sexo');
        $cpf = $this->service->validaDados(INPUT_POST, 'cpf');
        $rg = $this->service->validaDados(INPUT_POST, 'rg');
        $telefone = $this->service->validaDados(INPUT_POST, 'telefone');
        $celular = $this->service->validaDados(INPUT_POST, 'celular');
        $profissao = $this->service->validaDados(INPUT_POST, 'profissao_id');
        $profissao_id = intval(str_replace("&gt;",'',$profissao));
        
        return $this->service->atualizaPessoa(
            intval($id),
            $nome, 
            $email, 
            $nascimento, 
            $sexo, 
            $cpf, 
            $rg, 
            $telefone, 
            $celular, 
            $profissao_id
        );
    }
}