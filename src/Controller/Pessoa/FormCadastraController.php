<?php 

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\Pessoa;

use RF\EmployeeManagement\Controller\Controller;
use RF\EmployeeManagement\Service\Service;

class FormCadastraController implements Controller
{
    public function __construct(private Service $service) 
    {  
    }

    public function processaRequisicao()
    {
        $profissoes = $this->service->buscaTodasProfissoes();
        require_once __DIR__ . "/../../../views/pessoa/form.php";
    }
}