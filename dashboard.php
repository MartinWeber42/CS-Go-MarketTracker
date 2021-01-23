<?php 
    session_start();
    if (!isset($_SESSION["user"])) {
        header('Location: ./login.php');
    }
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS:GO Market Tracker | Dashboard</title>
    <link rel="stylesheet" href="./css/dashboard.css">
</head>
<body>
    <nav>
        <li><button id="newUser">Neuer User</button></li>
        <li><button id="newItem">Neues Item</button></li>
        <li><button id="logout">Ausloggen</button></li>
    </nav>
    <hr>
    <section id="items">
        <div class="item">
            <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/310781367/256x128" alt="">
            <h2>290,57 €</h2>
            <p>Steam Preis: 390,96</p>
            <h4>Desert Eagle</h4>
            <h3>Großbrand</h3>
            <p>Fabrikneu</p>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="./js/dashboard.js"></script>
</body>
</html>