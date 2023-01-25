<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\User;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;
use RF\EmployeeManagement\Service\UserService;

class LoginController implements RequestHandlerInterface
{
    public function __construct(private UserService $service)
    {  
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $requestBody = $request->getParsedBody();
        
        $user = $this->service->getUser($requestBody);

        if (!$user['isCorrect']) {
            return new Response(302, [
                'Location' => '/login?user-or-password-incorrect'
            ]);
        }

        array_pop($user);

        $_SESSION['logado'] = true;
        $_SESSION['userData'] = $user;
        
        return new Response(302, ['Location' => '/']);
    }
}
