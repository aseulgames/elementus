<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="games.css">
    <script src="homescript.js"></script>
    <title>Games</title>
    <style>
        html, body {
			max-width: 100%;
			overflow-x: hidden;
		}
        
        .bubble {
            z-index: 999;
            position: absolute;
            border-radius: 50%;
            user-select: none; /* Prevent selection of bubble elements */
        }

        #board {
            position: relative;
            overflow: hidden; /* Hide overflow content */
        }

        .nav{
            z-index: 1;
        }

    </style>
</head>

<body style="background-image: url('images/gamepage.png');">
<div id = "board"></div>
<audio id="bubbleSound">
    <source src="bubbles.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<!-- Background Music -->
<audio id="backgroundMusic" autoplay loop>
    <source src="game-music.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<audio id="hoverSound">
    <source src="hover-sound.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<!-- Bootstrap Navbar -->
<nav class="nav navbar navbar-expand-lg navbar-light">
    <div class="container">

        <div class="logo-container">
            <a href="homestudent.php" class="logo navbar-brand">
                <img src="logo_dark.png" alt="logopng" class="logopng">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="menu navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="homestudent.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="games.php">Games</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="periodictable.php">Periodic Table</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profileedit_student.php">Profile</a>
                </li>
            </ul>

            </div>
        </div>
    </nav>

            <?php

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

            
        </ul>
    </div>
    
    </header>
    <div class="mute-icon" onclick="toggleMute()">
                        <img id="muteImg" src="images/play.png" alt="Mute">
                    </div>
    <main>
    <div class="enterimg"><a href="gamechoices.php" >
        <img src="images/enter.png" alt="logopng" class="logopng" style="max-width: 50%;">
            </a>
    </div>
</div>
<div id="overlay" class="overlay">
    <div class="overlay-content" style="visibility: hidden;">
        <p>Drag your mouse for bubbles!</p>
    </div>
</div>     
    </main>
    <script src="homescript.js">
        function resizeWindowToImage() {
            var imageContainer = document.getElementById("image-container");
            var image = imageContainer.querySelector("img");
            var imageWidth = image.offsetWidth;
            var imageHeight = image.offsetHeight;

            // Set a buffer for window size
            var buffer = 20;

            // Resize the window based on the image dimensions plus a buffer
            window.resizeTo(imageWidth + buffer, imageHeight + buffer);
        }

        // Call the resize function when the image is loaded
        window.onload = resizeWindowToImage;
    </script>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <script src="bubbles.js"></script>
    <script src="music.js"></script>
    <script>
    window.onload = function() {
            backgroundMusic.volume = 0.4;
            backgroundMusic.play();
        }

        document.addEventListener("DOMContentLoaded", function() {
            var hoverSound = document.getElementById("hoverSound");
            var enterButton = document.querySelector(".enterimg a");

            enterButton.addEventListener("mouseenter", function() {
                hoverSound.volume = 0.4;
                hoverSound.play();
            });
        });

    </script>

</body>
</html>