<?php 

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\Profissao;

use RF\EmployeeManagement\Controller\Controller;
use RF\EmployeeManagement\Service\Service;

class FormAtualizaProfissaoController implements Controller
{
    public function __construct(private Service $service) 
    {  
    }

    public function processaRequisicao()
    {
        $id = $this->service->validaDados(INPUT_GET, 'id');
        $profissao = $this->service->buscaProfissoesPorId(intval($id));
        
        require_once __DIR__ . "/../../../views/profissao/form.php";
    }
}