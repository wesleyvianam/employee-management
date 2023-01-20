<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Controller;

class Error404Controller implements Controller
{
    public function processaRequisicao()
    {
        require_once __DIR__ . '/../../views/components/pagina404.php';
    }
}