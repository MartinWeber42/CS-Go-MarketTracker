<?php
    session_start();
    $dsn = 'mysql:host=localhost;dbname=csgomarkettracker;charset=utf8';
    $user = 'mweber';
    $password = 'Mallorca1';

    $db = new PDO($dsn, $user, $password);
?>