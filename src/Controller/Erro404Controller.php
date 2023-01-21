<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\RequestHandlerInterface;

class Error404Controller implements RequestHandlerInterface
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        require_once __DIR__ . '/../../views/components/pagina404.php';
    }
}