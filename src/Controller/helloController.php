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
        $person = $this->personRepository->getBySexAndAge();
        // print_r($person);
        
        require_once __DIR__ . '/../../views/home.php';
    }
}