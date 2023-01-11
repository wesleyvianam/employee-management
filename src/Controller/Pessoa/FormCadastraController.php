<?php 

declare(strict_types=1);

namespace Dzenvolve\Controller\Pessoa;

use Dzenvolve\Controller\Controller;
use Dzenvolve\Service\Service;

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