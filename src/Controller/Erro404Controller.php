<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller;

use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Error404Controller extends AbstractController
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        return New Response(404, 
            body: $this->render('shared/pagina404.html.twig')
        );
    }
}