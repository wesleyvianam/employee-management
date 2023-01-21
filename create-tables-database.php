<?php

declare(strict_types=1);

$servername="127.0.0.1";
$username="root";
$password="-Senha12";
$dbName="rf_employee_management";

$pdo = new PDO("mysql:host=$servername;dbname=$dbName", $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$createTableUser = 
    'CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        roles JSON NOT NULL,
        password VARCHAR(256) NOT NULL
    );';

$createUserAdmin = 'INSERT INTO users (name, email, roles, password) VALUES (?,?,?,?)';

// CRIAR USUÀRIO ADMIN
$hash_password = password_hash('rf@123', PASSWORD_ARGON2ID);
$roles = json_encode(['ROLE_ADMIN']);

$statement = $pdo->prepare($createUserAdmin);
$statement->bindValue(1, "admin");
$statement->bindValue(2, "admin@rfemployeemanager.com");
$statement->bindValue(3, $roles);
$statement->bindValue(4, $hash_password);
$statement->execute();

