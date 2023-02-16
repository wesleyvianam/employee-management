<?php

$builder = new \DI\ContainerBuilder();
$builder->addDefinitions([
    PDO::class => function (): PDO {
        $dbPath = __DIR__ . '/../banco.sqlite';
        $pdo = new PDO("sqlite:$dbPath");
        return $pdo;
    }
]);

return $builder->build();