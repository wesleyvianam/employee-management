<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\User;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use RF\EmployeeManagement\Controller\AbstractController;
use RF\EmployeeManagement\Service\UserService;

class FormLoginController extends AbstractController
{
    public function __construct(private UserService $service)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        if (!$this->service->existSuperAdmin()) {
            $roles = 'ROLE_SUPER';
            return new Response(200, body: $this->render('user/admin.html.twig', [
                'roles' => $roles
            ]) );
        }

        $session = $_SESSION['logado'] = false;
        return new Response(200, body: $this->render('user/login.html.twig', ['session' => $session]) );
    }
}