<?php

declare(strict_types=1);

namespace RF\EmployeeManagement\Helper;

trait TemplateTwigTrait
{
    private function render(string $view, array $params = [])
    {
        $templatepath = __DIR__ . '/../../views/';

        $twig = new \Twig\Environment(
            new \Twig\Loader\FilesystemLoader($templatepath)
        );

        echo $twig->render($view, $params);
    }
}