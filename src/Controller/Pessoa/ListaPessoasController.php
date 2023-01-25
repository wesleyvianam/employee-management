<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\Pessoa;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use RF\EmployeeManagement\Controller\AbstractController;
use RF\EmployeeManagement\Helper\SessionDataTrait;
use RF\EmployeeManagement\Helper\TemplateTwigTrait;
use RF\EmployeeManagement\Service\Service;

class ListaPessoasController extends AbstractController
{

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

        $session = $this->dataSession();

        $pessoas = '';
        
        return new Response(200, body: 
            $this->render('pessoa/index.html.twig', [
                'session' => $session,
                'pessoas' => $pessoas,
            ])
        );
    }
}