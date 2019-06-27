<?php
    $database_host = 'stevendioqelite.mysql.db';
    $database_dbname = 'stevendioqelite';
    $database_user = 'stevendioqelite';
    $database_password = 'Elite14789';
    $database_charset = 'UTF8';
    $database_options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    $pdo = new PDO(
        'mysql:host=' . $database_host . 
        ';port=' . $database_port . 
        ';dbname=' . $database_dbname . 
        ';charset=' . $database_charset, 
        $database_user,
        $database_password,
        $database_options
    );
?>