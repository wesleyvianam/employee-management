<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\User;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use RF\EmployeeManagement\Controller\AbstractController;
use RF\EmployeeManagement\Service\UserService;

class AdminController extends AbstractController
{
    public function __construct(private UserService $service)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if ($this->service->existSuperAdmin()) {
            return new Response(302, [
                'Location' => '/login?exist-super'
            ]);
        }
        
        $params = $request->getParsedBody();
        $role = 'ROLE_SUPER';
        $this->service->add($params, $role);

        return new Response(302, [
            'Location' => '/login'
        ]);
    }
}