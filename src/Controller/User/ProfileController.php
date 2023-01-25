<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller\User;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use RF\EmployeeManagement\Controller\AbstractController;

class ProfileController extends AbstractController
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $session = $this->dataSession();
        
        return new Response(200,  body: $this->render('user/profile.html.twig',  [
            'info' => "aqui jaja info",
            'session' => $session,
        ]));
    }
}