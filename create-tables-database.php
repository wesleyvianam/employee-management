<?php

declare(strict_types=1);

$pdo = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$userTable = "CREATE TABLE users VALUES (id BIGINT AUTO_INCREMENT)";