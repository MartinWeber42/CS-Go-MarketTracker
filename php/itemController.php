<?php
    include 'dbconnection.php';

    // if called insert
    if(!empty($_GET) && $_GET['action'] === 'insert') {

        // set variables from session and post
        $user = $_SESSION["user"];
        $itemName = $_POST["itemName"];
        $itemPicture = $_POST["itemPicture"];

        // set statement and execute
        $sql = 'INSERT INTO searchitems (user, itemName, itemPicture) VALUES (:user, :itemName, :itemPicture)';
        
        $stmt = $db->prepare($sql);
        $stmt->execute([
            ':user' => $user,
            ':itemName' => $itemName,
            ':itemPicture' => $itemPicture
        ]);
    }

    // if called getItems
    if(!empty($_GET) && $_GET['action'] === 'getItems') {
        $user = $_SESSION["user"];

        // if post is not empty
        if (isset($_POST)) {
            // set statement and get all items user is searching for
            $sql = 'SELECT * FROM searchitems where user = :user';
        
            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':user' => $user
            ]);
    
            $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // return items as json
            var_dump(json_encode($items));
        }
    }

    // if called deleteItem
    if(!empty($_GET) && $_GET['action'] === 'deleteItem') {
        // if post is not empty
        if (isset($_POST)) {
            // get itemID
            $itemID = explode('-', $_POST["itemID"])[1];

            // set statement and delete item
            $sql = 'DELETE FROM searchitems where id = :itemID';
        
            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':itemID' => $itemID
            ]);
        }
    }

?>