<?php 

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\Pessoa;

use RF\EmployeeManagement\Controller\Controller;
use RF\EmployeeManagement\Service\Service;

class FormAtualizaController implements Controller
{
    public function __construct(private Service $service) 
    {  
    }

    public function processaRequisicao()
    {
        $id = $this->service->validaDados(INPUT_GET, 'id');
                
        $pessoa = $this->service->buscaPessoaPorId(intval($id));
        $pessoaProfissao = $this->service->buscaProfissoesPorId($pessoa->profissao_id);
        
        $profissoes = $this->service->buscaTodasProfissoes();

        require_once __DIR__ . "/../../../views/pessoa/form.php";
    }
}