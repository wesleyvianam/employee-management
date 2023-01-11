<?php

declare(strict_types=1);

namespace Dzenvolve\Controller\Pessoa;

use Dzenvolve\Controller\Controller;
use Dzenvolve\Repository\Repository;
use Dzenvolve\Helper\Pagina;
use Dzenvolve\Service\Service;

class ListaPessoasController implements Controller
{

    public function __construct(private Service $service) 
    {  
    }

    public function processaRequisicao()
    {
        $nome = $this->service->validaDados(INPUT_GET, 'nome');
        $sexo = $this->service->validaDados(INPUT_GET, 'sexo');
        $cpf = $this->service->validaDados(INPUT_GET, 'cpf');
        $nascidoDe = $this->service->validaDados(INPUT_GET, 'nascido_de');
        $nascidoAte = $this->service->validaDados(INPUT_GET, 'nascido_ate');

        $resultado = $this->service->buscaPessoas($nome, $sexo, $cpf, $nascidoDe, $nascidoAte);
        $pessoas =  $resultado['dados'];
        $pagina = $resultado['pagina'];
        $profissoes = $this->service->buscaProfissoes();
        
        unset($_GET['status']);
        unset($_GET['pagina']);
        $gets = http_build_query($_GET);
        
        require_once __DIR__ . '/../../../views/pessoa/index.php';
    }
}