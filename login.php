<?php 
    session_start();
    if (isset($_SESSION["user"])) {
        header('Location: ./dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CS:GO Market Tracker | Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
    <div id="main">
        <form id="loginForm" action="php/userController.php?action=login" method="POST">
            <h1>Login</h1>
            <input type="text" name="username" placeholder="username">
            <input type="text" name="password" placeholder="password">
            <input type="submit" value="Login">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</body>
</html>