<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\Pessoa;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use RF\EmployeeManagement\Controller\Controller;
use RF\EmployeeManagement\Repository\Repository;
use RF\EmployeeManagement\Helper\Pagina;
use RF\EmployeeManagement\Helper\TemplateTwigTrait;
use RF\EmployeeManagement\Service\Service;

class ListaPessoasController implements RequestHandlerInterface
{
    use TemplateTwigTrait;

    public function __construct(private Service $service) 
    {  
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $nome = $this->service->validaDados(INPUT_GET, 'nome');
        $sexo = $this->service->validaDados(INPUT_GET, 'sexo');
        $cpf = $this->service->validaDados(INPUT_GET, 'cpf');
        $nascidoDe = $this->service->validaDados(INPUT_GET, 'nascido_de');
        $nascidoAte = $this->service->validaDados(INPUT_GET, 'nascido_ate');

        // $resultado = $this->service->buscaPessoas($nome, $sexo, $cpf, $nascidoDe, $nascidoAte);
        // $pessoas =  $resultado['dados'];
        // $pagina = $resultado['pagina'];
        // $profissoes = $this->service->buscaProfissoes();
        
        // unset($_GET['pagina']);
        // $gets = http_build_query($_GET);
        
        return new Response(200, body: $this->render('pessoa/index.html.twig'));
    }
}