<?php
    require 'db.php';

    $username = $_POST["username"];
    $password = $_POST["password"];
    echo "Hello " . $username . "<br>";
    echo "Password: " . $password . "<br>";

    $user = $mysqli->query("SELECT password FROM users WHERE username='$username'")->fetch_assoc();

    if ($user['password'] == $password) {
        echo "Pog lets go";
    } else {
        echo "cringe";
    }
?>