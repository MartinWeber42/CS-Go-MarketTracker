<?php 
    // set variables
    $itemName = '';
    $itemClass = '';

    // if post itemname is not empty
    if (isset($_POST['itemName'])) {
        // set variables for printing
        $itemName = explode(" | ", $_POST['itemName'])[0];
        $itemSkin = explode("(", explode(" | ", $_POST['itemName'])[1])[0];
        $itemType = str_replace(")", "", explode("(", explode(" | ", $_POST['itemName'])[1])[1]);
        $sevenMin = $_POST['sevenDays']["min"];
        $thirtyMin = $_POST['thirtyDays']["min"];
        $ninetyMin = $_POST['ninetyDays']["min"];
        $itemID = $_POST["itemID"];
        $itemPrice = $_POST['itemPrice'];
        $itemPicture = $_POST['itemPicture'];
        $steamPrice = $_POST['steamPrice'];
        $pageURL = $_POST['pageURL'];
    };

    // add class for price
    if ($itemPrice >= $sevenMin) {
        $itemClass = 'red';
    } else if ($itemPrice >= $thirtyMin) {
        $itemClass = 'orange';
    } else if ($itemPrice >= $ninetyMin) {
        $itemClass = 'yellow';
    } else if ($itemPrice < $ninteyMin) {
        $itemClass = 'green';
    }

    // return html
    echo '
        <div id="delete-' . $itemID . '" class="delete">X</div>
        <img src="' . $itemPicture .'" alt="Comming soon">
        <h2 class="' . $itemClass . '">' . $itemPrice .' €</h2>
        <p>Vorgeschlagener Preis: ' . $steamPrice .' €</p>
        <h4>' . $itemName . '</h4>
        <h3>' . $itemSkin .'</h3>
        <p>' . $itemType .'</p>
        <hr>
        <p>letzte 7 Tage: ' . $sevenMin .'€ </p>
        <p>letzte 30 Tage: ' . $thirtyMin .'€ </p>
        <p>letzte 90 Tage: ' . $ninetyMin .'€ </p>'
?>

