<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller;

use Psr\Http\Server\RequestHandlerInterface;

abstract class AbstractController implements RequestHandlerInterface
{
    public function render(string $view, array $params = [])
    {
        $templatepath = __DIR__ . '/../../views/';

        $twig = new \Twig\Environment(
            new \Twig\Loader\FilesystemLoader($templatepath)
        );

        echo $twig->render($view, $params);
    }

    public function dataSession()
    {
        {
            $logado = $_SESSION['logado'];
            $userData = $_SESSION['userData'];
    
            return [
                'logado' => $logado,
                'userData' => $userData
            ];
        }
    }
}