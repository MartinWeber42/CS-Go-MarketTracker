<?php
    include 'dbconnection.php';

    // if called login
    if(!empty($_GET) && $_GET['action'] === 'login') {

        // if post is not empty
        if (isset($_POST)) {
            // get all values from input Form
            $form = [];
            foreach ($_POST as $key => $value) {
                if (!empty($_POST[$key]) && $key !== 'submit') {
                    $form[$key] = htmlspecialchars($_POST[$key]);
                }
            }

            // set statement and search for user
            $sql = 'SELECT * FROM user where username = :username';
        
            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':username' => $form['username']
            ]);
    
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // if user found and hashed password match
            if (password_verify($form['password'], $user[0]['password'])) {
                // set session and redirect to dashboard
                $_SESSION['user'] = $form['username'];
                header('Location: ../dashboard.php');
            } else {
                // give login error
                header('Location: ../index.php?action=loginerror');
            }
        }
    }

    // if called register
    if(!empty($_GET) && $_GET['action'] === 'register') {

        // if post is not empty
        if (isset($_POST)) {
            // get all values from input Form
            $form = [];
            foreach ($_POST as $key => $value) {
                if (!empty($_POST[$key]) && $key !== 'submit') {
                    $form[$key] = htmlspecialchars($_POST[$key]);
                }
            }
            // set code for verifie and statement
            $verifieCode = rand(100000,999999);
            $sql = 'INSERT INTO user (username, email, password, verified, verifieCode) VALUES (:username, :email , :password, 0, :verifieCode)';
        
            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':username' => $form['username'],
                ':email' => $form['email'],
                ':password' => password_hash($form['password'], PASSWORD_BCRYPT),
                ':verifieCode' => $verifieCode
            ]);

            // send mail with verifieCode
            mail("exampel@company.de",
                "Skinport Tracker | Account Verifizierungs Code",
                "Hallo " . $form['username'] . "\r\n\r\n Dein Verifizierungscode lautet: " . $verifieCode);
        }
    }

    // if called logout
    if(!empty($_GET) && $_GET['action'] === 'logout') {
        // destroy session and redirect to index
        unset($_SESSION['user']);
        session_destroy();
        header('Location: ../index.php');
    }
?>