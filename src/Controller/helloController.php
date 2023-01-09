<?php

declare(strict_types=1);

namespace Dzenvolve\Test\Controller;

use Dzenvolve\Test\Repository\PersonRepository;

class HelloController
{

    public function __construct(private PersonRepository $personRepository)
    {
    }

    public function index() 
    {
        $person = $this->personRepository->getAll();
        // $conta = count($person);
        require_once __DIR__ . '/../../views/home.php';
        // print_r($person);
    }
}