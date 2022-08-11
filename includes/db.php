<?php

    $host = 'localhost';
    $dbName = 'u271646766_portfolio';
    $user = 'u271646766_portfolio';
    $pwd = 'Coollifestyle@1';


    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;
    $pdo = new PDO($dsn, $user, $pwd);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    