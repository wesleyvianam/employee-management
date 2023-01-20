<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\Profissao;

use RF\EmployeeManagement\Controller\Controller;
use RF\EmployeeManagement\Service\Service;

class ListaProfissoesController implements Controller
{
    public function __construct(private Service $service) 
    {  
    }
    
    public function processaRequisicao()
    {
        $nome = $this->service->validaDados(INPUT_GET, 'nome');
                
        $resultado = $this->service->buscaProfissoes($nome);
        $profissoes = $resultado['dados'];
        $pagina = $resultado['pagina'];

        unset($_GET['pagina']);
        $gets = http_build_query($_GET);

        require_once __DIR__ . '/../../../views/profissao/index.php';
    }
}