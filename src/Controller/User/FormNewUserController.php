<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\User;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use RF\EmployeeManagement\Controller\AbstractController;

class FormNewUserController extends AbstractController
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $session = $_SESSION['logado'];
        return new Response(200, body: $this->render('user/new.html.twig', ['session' => $session]));
    }
}