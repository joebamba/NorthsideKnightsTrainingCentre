<html><h1>
<?php
    require 'db.php';
    session_start();

    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = $mysqli->query("SELECT userID, password, privileged FROM users WHERE username='$username'")->fetch_assoc();

    if ($user['password'] == $password) {
        $_SESSION["userID"] = $user["userID"];
        if ($user['privileged'] == 0) {
            header('Location: dashboard.html');
        } else {
            echo "woah you're special";
        }
        
    } else {
        header('Location: index.html');
    }
?></h1>

</html>