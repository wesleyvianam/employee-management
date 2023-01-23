<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\User;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use RF\EmployeeManagement\Entity\User;
use RF\EmployeeManagement\Helper\TemplateTwigTrait;
use RF\EmployeeManagement\Service\UserService;

class NewUserController implements RequestHandlerInterface
{
    use TemplateTwigTrait;

    public function __construct(private UserService $service) {  
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $dataRequest = $request->getParsedBody();
 
        $this->service->add($dataRequest);
 
        return new Response(302, ['Location' => '/']);
    }
}