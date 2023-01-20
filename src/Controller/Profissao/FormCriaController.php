<?php 

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\Profissao;

use RF\EmployeeManagement\Controller\Controller;
use RF\EmployeeManagement\Service\Service;

class FormCriaController implements Controller
{
    public function __construct(private Service $service) 
    {  
    }

    public function processaRequisicao()
    {
        require_once __DIR__ . "/../../../views/profissao/form.php";
    }
}