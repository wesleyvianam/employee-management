<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Helper;

trait SessionDataTrait
{
    private function dataSession()
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