<?php 
    if (isset($_POST['itemName'])) {
        $itemName = $_POST['itemName'];

        echo '
            <div class="item">
                <img src="https://steamcommunity-a.akamaihd.net/economy/image/class/730/310781367/256x128" alt="">
                <h2>290,57 €</h2>
                <p>Steam Preis: 390,96</p>
                <h4>' . $itemName . '</h4>
                <h3>Großbrand</h3>
                <p>Fabrikneu</p>
            </div>
        ';
    };
?>