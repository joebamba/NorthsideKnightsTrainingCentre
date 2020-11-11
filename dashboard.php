<?php
    $pageTitle = 'Dashboard';
    require 'components/header.php';

    // This gets the latest video
    $userID = $_SESSION["user"]["userID"];
    $videoQuery = 
    "SELECT videoURL FROM videos WHERE teamID in (
        SELECT teamID FROM teamMembers WHERE userID = $userID
    ) ORDER BY videoID DESC";
    $videoLink = $mysqli->query($videoQuery)->fetch_assoc()["videoURL"];

    // This gets the activity
    
?>

<main>
    <section>
        <h2>Activities</h2>
        <table>
            <tr>
                <th>Activity</th>
                <th>Due Date</th>
            </tr>
            <?php


            ?>
            <tr>
                <td>30 Push Ups</td>
                <td>5:00pm Today</td>
            </tr>
            <tr>
                <td>50 Situps</td>
                <td>6:00pm Tomorrow</td>
            </tr>
            <tr>
                <td>75 Burpees</td>
                <td>8:00am Friday</td>
            </tr>
        </table>
    </section>
    <section>
        <h2>Schedule</h2>
        <img src="images/schedule.PNG" alt ="Schedule">
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
    
<?php require 'components/footer.html' ?>