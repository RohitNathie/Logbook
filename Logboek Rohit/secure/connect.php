<?php

/* De config van onze connectie aan de database. */
//Verbinding maken met je database PDO
$host = 'localhost'; //Hostnaam
$db = 'logboek'; //database naam
$user = 'root';     //login user naam
$pass = '';    //login wachtwoord
$charset = 'utf8mb4';   //character set, voor deze opdracht utf8mb4

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";  // DSN connectie

$options = [                                         // Options voor o.a. error handeling en fetchmode
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_CLASS,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {                                               // Een try/catch waarin je een nieuwe PDO instance aanmaakt, en errorhandeling afwerkt.
    $pdo = new PDO($dsn, $user, $pass, $options);
} 

catch (\PDOException $e) {
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
