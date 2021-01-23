<?php
    include 'dbconnection.php';

    if(!empty($_GET) && $_GET['action'] === 'login') {

        if (isset($_POST)) {
            $form = [];
            foreach ($_POST as $key => $value) {
                if (!empty($_POST[$key]) && $key !== 'submit') {
                    $form[$key] = htmlspecialchars($_POST[$key]);
                }
            }

            $sql = 'SELECT * FROM user where username = :username and password = :password';
        
            $stmt = $db->prepare($sql);
            $stmt->execute([
                ':username' => $form['username'],
                ':password' => $form['password']
            ]);
    
            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($stmt->rowCount() > 0) {
                $_SESSION['user'] = $form['username'];
                header('Location: ../dashboard.php');
            } else {
                header('Location: ../login.php?action=loginerror');
            }
        }
    }

    if(!empty($_GET) && $_GET['action'] === 'logout') {
        unset($_SESSION['user']);
        session_destroy();
        header('Location: ../login.php');
    }
?>