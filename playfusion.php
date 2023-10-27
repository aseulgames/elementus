<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

$id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM students WHERE Id = $id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Fname = $result['FirstName'];
                $res_Lname = $result['LastName'];
                $res_id = $result['Id'];
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="games.css">
    <title>Let's Play</title>
</head>


<div class="row" style="padding-top: 20px;">
    <a id="backButton">
        <img src="images/fusion_back.png" class="back-icon" alt="Back Icon">
    </a><span><img src="images/fuselogo.png" class="iconlogo" style="max-width: 50%;
    min-width: 40%;"></span>

    <div class="row" style="justify-content: right; padding-right: 20px;">
        <img src="logo_dark.png" style="max-width: 25%;
        height: auto; justify-content: right; padding-right: 30px;">
    </div>

</div>
<body style="background-image: url('images/fusionbg.png');">
<div id = "board"></div>
<!-- Background Music -->
<audio id="backgroundMusic" autoplay loop>
    <source src="game-music.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<!-- Mute and Unmute Icons -->
<div class="mute-icon" onclick="toggleMute()">
    <img id="muteImg" src="images/play.png" alt="Mute">
</div>
    <div class="start-container">
        <div class="play">
            <img src="images/letsplayfusion.png" style="width: 100%;height: auto; margin-bottom:-30px">
            <a href="fusion.php">
            <button type="button" class="btn btn-start" style="color:#07690b;">START</button>
            </a>
        </div>
    </div>

    <script>
        document.getElementById("backButton").onclick = function() {
            history.back();
        };
    </script>
    <script src="homescript.js"></script>
    <script src="music.js"></script>
    <script>
        window.onload = function() {
        var backgroundMusic = document.getElementById("backgroundMusic");
        var hoverSound = document.getElementById("hoverSound");
        var boxes = document.querySelectorAll(".box");

        // Set background music volume to 0.3 (30% volume)
        backgroundMusic.volume = 0.4;


        // Play background music on page load
        backgroundMusic.play();

        // Add hover sound to all boxes
        boxes.forEach(function(box) {
            box.addEventListener("mouseenter", function() {
                hoverSound.currentTime = 0.4; // Reset sound to the beginning
                hoverSound.play();
            });
        });
    };

    </script>
</body>
</html>