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
    <!-- <link rel="stylesheet" href="bootstrap/bootstrap.min.css"> -->
    <link rel="stylesheet" href="games.css">
    <script src="homescript.js"></script>
    <title>Games</title>
    <style>
        body{
            background-image: url('images/fourpicsbg.png'); 
        }

        .nav{
            background: linear-gradient(-45deg, #f5ceff8e, #7b4dff8e, #ff4df87e);
        }

        .timer-box {
            background-color: #cb9b00;
        }

        .timer-box {
            background-color: #9b5bff;
            border: 4px solid #5e17eb;
        }

    </style>
</head>
<body>
    <link rel="stylesheet" href="tutorial.css">
    <div class="overlay"></div>
    
    <!-- Your existing HTML content goes here -->

    <div class="popup">
        <button id="close">&times;</button>
        <img src="images/tut2.png" alt="" style="max-width: 50%">
        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Expedita distinctio fugiat alias iure qui,
            commodi minima magni ullam aliquam dignissimos?
        </p>
        <input type="button" value="Okay" id="okay" class="btn">
    </div>

<!-- Background Music -->
<audio id="backgroundMusic" autoplay loop>
    <source src="game-music.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<!-- Mute and Unmute Icons -->
<div class="mute-icon" onclick="toggleMute()">
    <img id="muteImg" src="images/play.png" alt="Mute">
</div>

        <div class="timer-box">
        <div id="timer"><span id="time-display">0:00</span></div>
        </div>
        </div>

    <main>
    <div class="row" style="padding-top: 20px;">
    <a id="backButton">
        <img src="teacher_back.png" class="back-icon" alt="Back Icon">
    </a><span><img src="images/4picslogo2.png" class="iconlogo" style="max-width: 50%;
    min-width: 40%;"></span>

    <div class="row" style="justify-content: right; padding-right: 20px;">
        <img src="logo_dark.png" style="max-width: 25%;
        height: auto; justify-content: right; padding-right: 30px;">
    </div>

</div>

        
        <div class="rounded-square">
        
        <div id="game-container">
            <div id="container">
                <div id="image-container">
                    <!-- Display the images here -->
                    <img src="images/fourpics/hydroA.png" alt="Image 1">
                    <img src="images/fourpics/hydroB.png" alt="Image 2">
                    <img src="images/fourpics/hydroC.jpg" alt="Image 3">
                    <img src="images/fourpics/hydroD.jpg" alt="Image 4">    
                </div>
            </div></div>
            <div class="field input">
            <input type="text" id="answer-input" placeholder="Enter your guess">
            <button class="btn" id="submit-button"><b class="btn">Submit</b></button>
            <div id="message"></div>
            </div>
        </div>

</div>

</div>
        
    </main>
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
    
    <script src="fourpics-script.js"></script>
    <script src="homescript.js"></script>
    <script src="music.js"></script>
</body>
</html>