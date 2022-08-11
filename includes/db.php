<?php

    $host = '127.0.0.2';
    $dbName = 'nyamusat_clients';
    $user = 'nyamusat_clients';
    $pwd = 'Coollifestyle@1';


    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbName;
    $pdo = new PDO($dsn, $user, $pwd);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    