<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\User;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use RF\EmployeeManagement\Controller\AbstractController;

class LogoutController extends AbstractController
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        session_destroy();
        $session = $_SESSION['location'];
        return new Response(302, ['Location' => '/login']);
    }
}