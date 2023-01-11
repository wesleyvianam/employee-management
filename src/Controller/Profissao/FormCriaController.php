<?php 

declare(strict_types=1);

namespace Dzenvolve\Controller\Profissao;

use Dzenvolve\Controller\Controller;
use Dzenvolve\Service\Service;

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