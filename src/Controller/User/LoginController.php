<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\User;

use Nyholm\Psr7\Response;
use PDO;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class LoginController implements RequestHandlerInterface
{
    public function __construct(
        private PDO $pdo
    ) {  
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $requestBody = $request->getParsedBody();
        $email = filter_var($requestBody['email'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($requestBody['password']);
        
        $sql = 'SELECT * FROM users WHERE email = :email;';
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->execute();

        // $arr = [$email, $password];
        // print_r($email);die;


        $sql = "SELECT * FROM users WHERE email = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $email);
        $statement->execute();

        $userData = $statement->fetch(\PDO::FETCH_ASSOC);
        $correctPassword = password_verify($password, $userData['password'] ?? '');

        if (!$correctPassword) {
            return new Response(302, [
                'Location' => '/login?user-or-password-incorrect'
            ]);
        }

        $_SESSION['logado'] = true;
        return new Response(302, ['Location' => '/']);
    }
}