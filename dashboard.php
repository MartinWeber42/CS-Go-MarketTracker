<?php 
    session_start();
    if (!isset($_SESSION["user"])) {
        header('Location: ./index.php');
    }
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS:GO Market Tracker | Dashboard</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
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
        
    </section>
    <section class="darkBackground">
        <div id="newItemForm">
            <div id="closeAddItem">X</div>
            <h3>Neuer Skin</h3>
            <label for="weaponName">Weapon</label>
            <input id="weaponName" name="weaponName" type="text">
            <label for="weaponSkin">Skin</label>
            <input id="weaponSkin" name="weaponSkin" type="text">
            <label for="weaponCondition">Condition</label>
            <select id="weaponCondition" name="weaponCondition">
                <option value="Factory New">Factory New</option>
                <option value="Minimal Wear">Minimal Wear</option>
                <option value="Field-Tested">Field-Tested</option>
                <option value="Well-Worn">Well-Worn</option>
                <option value="Battle-Scarred">Battle-Scarred</option>
            </select>
            <label for="itemPicture">Picture</label>
            <input id="itemPicture" name="itemPicture" type="text">
            <button id="addNewItem">Anlegen</button>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="./js/jquery.base64.js" crossorigin="anonymous"></script>
    <script src="./js/dashboard.js"></script>
</body>
</html>