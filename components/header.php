<?php
    require 'db.php';
    session_start();

    // This redirects you to the login page if you aren't logged in
    if (!isset($_SESSION["user"])) {
        header('Location: index.html');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $pageTitle ?> | Northside Knights Training Centre</title>
    <link rel="stylesheet" href="styles.css"><link href="https://fonts.googleapis.com/css2?family=Petit+Formal+Script&display=swap" rel="stylesheet">
    <script>
        function notifications(){}
        
    </script>
</head>
<body>
    <aside>And whatever you do, whether in word or deed, do it all in the name of the Lord Jesus, giving thanks to God the Father through him. - Colossians 3:17</aside>
    <nav>
        <ul>
            <li><a href="dashboard.php"><img src="images/logo.png" alt="home"></a></li>
            <li><a class="navLink" href="404.php">Schedule</a></li>
            <li><a class="navLink" href="404.php">Activities</a></li>
            <li><a class="navLink" href="404.php">Videos</a></li>
            <li><a class="navLink" href="404.php">Information</a></li>
            <li><input type="image" src="images/bellnonotification.png" alt="notifications" height="80" onclick=""></li>
                <div class="shownNotifications" id="notificationBtn">
                    <div>
                        test 1
                    </div>
                </div>
            <li><button><?php echo $_SESSION["user"]["firstName"] . " " . $_SESSION["user"]["lastName"] ?></button></li>
            <li><a href="index.html"><input type="image" src="images/logout.png" alt="logout" height="55"></a></li>
        </ul>
    </nav>