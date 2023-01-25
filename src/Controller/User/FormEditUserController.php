<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\User;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use RF\EmployeeManagement\Controller\AbstractController;
use RF\EmployeeManagement\Service\UserService;

class FormEditUserController extends AbstractController
{
    public function __construct(private UserService $service)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $userId = $request->getQueryParams();
        $user = $this->service->getUserById($userId);
        $session = $_SESSION['logado'];
        
        return new Response(200, body: $this->render('user/new.html.twig', [
            'session' => $session,
            'user' => $user
        ]));
    }
}