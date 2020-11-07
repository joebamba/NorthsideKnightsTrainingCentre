<?php
    require 'db.php';
    session_start();

    // This redirects you to the login page if you aren't logged in
    if (!isset($_SESSION["user"])) {
        header('Location: index.html');
    }

    // This gets the latest video
    $userID = $_SESSION["user"]["userID"];
    $videoQuery = 
    "SELECT videoURL FROM videos WHERE teamID in (
        SELECT teamID FROM teamMembers WHERE userID = $userID
    ) ORDER BY videoID DESC";
    $videoLink = $mysqli->query($videoQuery)->fetch_assoc()["videoURL"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Northside Knights Training Centre</title>
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
            <li><a class="navLink" href="schedule.html">Schedule</a></li>
            <li><a class="navLink" href="activities.html">Activities</a></li>
            <li><a class="navLink" href="videos.html">Videos</a></li>
            <li><a class="navLink" href="information.html">Information</a></li>
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
    <main>
        <section>
            <h2>Activities</h2>
        </section>
        <section onload ="displaySchedual()">
            <h2>Schedule</h2>
        </section>
        <section>
            <h2>Latest Video</h2>
            <!-- The point of the wrapper is so that the video scales while maintaining aspect ratio -->
            <div class="videoWrapper"><iframe src="<?php
                // this puts the video link in and if there isn't one, it does that video
                if ($videoLink != null) {
                    echo $videoLink;
                } else {
                    echo "https://www.youtube.com/embed/0Cp1VGTwXJ8";
                }  
            ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
        </section>
    </main>
    <footer>
        <a href="https://www.northside.qld.edu.au/"><img src="images/NCClogo.png" alt="ncclogo" ></a>
        <p>© 2020 Northside Christian College</p>
    </footer>
</body>

</html>

