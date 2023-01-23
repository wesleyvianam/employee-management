<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\User;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use RF\EmployeeManagement\Service\UserService;

class DeleteUserController implements RequestHandlerInterface
{
    public function __construct(private UserService $service)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $userId = $request->getQueryParams();
        
        $this->service->deleteUser($userId);

        return new Response(302, ['Location' => '/users']);
    }
}