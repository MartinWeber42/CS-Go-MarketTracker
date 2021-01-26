<?php
    session_start();
    $dsn = 'mysql:host=localhost;dbname=csgomarkettracker;charset=utf8';
    $user = 'root';
    $password = 'root';

    $db = new PDO($dsn, $user, $password);
?>