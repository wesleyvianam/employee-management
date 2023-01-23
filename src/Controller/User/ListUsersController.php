<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\User;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use RF\EmployeeManagement\Helper\TemplateTwigTrait;
use RF\EmployeeManagement\Service\UserService;

class ListUsersController implements RequestHandlerInterface
{
    use TemplateTwigTrait;

    public function __construct(private UserService $service)
    {
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $session = $_SESSION['logado'];
        $users = $this->service->getAllUsers();
        // print_r($users);die;
        return new Response(200, body: $this->render("user/index.html.twig", [
            'users' => $users,
            'session' => $session,
        ]));
    }
}