<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\User;

use Nyholm\Psr7\Response;
use PDO;
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
        
        $correctUser = $this->service->getUser($requestBody);

        if (!$correctUser) {
            return new Response(302, [
                'Location' => '/login?user-or-password-incorrect'
            ]);
        }

        $_SESSION['logado'] = true;
        return new Response(302, ['Location' => '/']);
    }
}
