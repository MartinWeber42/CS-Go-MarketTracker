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
        <form id="loginForm" action="" method="POST">
            <h1 id="header">Einloggen</h1>
            <input id="email" class="hide" type="email" name="email" placeholder="E-Mail">
            <input id="username" type="text" name="username" placeholder="Username">
            <input id="password" type="password" name="password" placeholder="Password">
            <input id="passwordRepeat" class="hide" type="password" name="passwordRepeat" placeholder="Password Wiederholen">
            <input id="button" type="submit" value="Einloggen">
            <a id="register">Kein Account? Hier einen anlegen!</a>
            <a id="login" class="hide">Ich habe einen Account</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
    <script src="./js/index.js"></script>
</body>
</html>