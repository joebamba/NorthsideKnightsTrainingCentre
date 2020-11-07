<h1>
<?php
    require 'db.php';
    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = $mysqli->query("SELECT * FROM users WHERE username='$username'")->fetch_assoc();

    if ($user['password'] == $password) {
        $_SESSION["user"] = $user;
        if ($user['privileged'] == 0) {
            header('Location: dashboard.php');
        } else {
            echo "woah you're special";
        }
        
    } else {
        header('Location: index.html');
    }
?></h1>