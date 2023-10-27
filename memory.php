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
    <script src="homescript.js"></script>
    <title>Games</title>
    <style>
        body{
            background-image: url('images/memorybg.png'); 
        }

        .rounded-square{
            background: #7dff73;
            width: 42%;
            height: 450px;
        }


        .timer-box {
            background-color: #cb9b00;
                border: 4px solid #fdc54c; /* Set the border properties */
        }

        /*Memory Game*/
        .wrapper {
            padding: 10px; /* Adjust padding for smaller screens */
            border-radius: 10px;
            background: #7dff73;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 38vw; /* Limit the maximum width to 80% of the viewport width */
            max-height: 80vh; /* Limit the maximum height to 80% of the viewport height */
            margin: 0 auto; /* Center the wrapper horizontally */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative; /* Add relative positioning */
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Center the cards horizontally */
            max-width: 100%; /* Allow cards to take full width if the screen is smaller than 80vw */
            margin-left: -30px;
        }

        .card {
            cursor: pointer;
            list-style: none;
            user-select: none;
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d;
            height: calc(8vw - 20px); /* 25% of the viewport width, minus margins */
            width: calc(8vw - 20px); /* 25% of the viewport width, minus margins */
            margin: 10px; /* Margins between cards */
        }



        .cards, .card, .view{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card.shake{
            animation: shake 0.35s ease-in-out;
        }
        @keyframes shake {
            0%, 100%{
            transform: translateX(0);
            }
            20%{
            transform: translateX(-10px);
            }
            40%{
            transform: translateX(10px);
            }
            60%{
            transform: translateX(-8px);
            }
            80%{
            transform: translateX(8px);
            }
        }
        .card .view{
            width: 100%;
            height: 100%;
            position: absolute;
            border-radius: 7px;
            background: #efefef;
            pointer-events: none;
            backface-visibility: hidden;
            transition: transform 0.25s linear;
        }
        .card .front-view img{
            width: 95%;
        }
        .card .back-view img{
            max-width: 45px;
        }
        .card .back-view{
            transform: rotateY(-180deg);
        }
        .card.flip .back-view{
            transform: rotateY(0);
        }
        .card.flip .front-view{
            transform: rotateY(180deg);
        }

        .card .front-view {
            background-image: url('images/back-memory.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .card .back-view img{
            max-width: 100%; /* Set the width to 100% to match the parent container */
            height: 100%;
        }

        
        

        @media screen and (max-width: 900px) {
            .wrapper {
                max-width: 80vw;
            }

            .cards {
                max-width: 80%;
            }

            .card {
                height: calc(15vw - 20px);
                width: calc(15vw - 20px);
                margin: 6px;
            }

            .timer-box {
                top: auto;
                bottom: 20px; /* Adjust the distance from the bottom of the parent element */
                right: 20px; /* Adjust the distance from the right of the parent element */
                width: 100px;
                height: 20px;
                font-size: 12px;
                padding: 4px;
            }
        }

        @media screen and (max-width: 530px) {
            .wrapper {
                max-width: 90vw;
            }

            .cards {
                max-width: 90%;
            }

            .card {
                height: calc(18vw - 20px);
                width: calc(18vw - 20px);
                margin: 4px;
            }

            .timer-box {
                top: auto;
                bottom: 20px; /* Adjust the distance from the bottom of the parent element */
                right: 20px; /* Adjust the distance from the right of the parent element */
                width: 100px;
                height: 20px;
                font-size: 12px;
                padding: 4px;
            }
        }
        h1{
            font-size: 30px;
            text-shadow: 2px 2px 2px #ababab;
            color: #6003b4;
            font-style: bold;
        }


    </style>
</head>
<body>
    <link rel="stylesheet" href="tutorial.css">
    <div class="overlay"></div>
    
    <!-- Your existing HTML content goes here -->

    <div class="popup">
        <button id="close">&times;</button>
        <h1 class="purples">How to Play?</h1>
        <p>Insert tutorial</p>
        <input type="button" value="Okay" id="okay" class="btn">
    </div>

    
        <audio id="backgroundMusic" autoplay loop>
            <source src="game-music.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <div class="mute-icon" onclick="toggleMute()">
            <img id="muteImg" src="images/play.png" alt="Mute">
        </div>

        <div class="timer-box">
          <div id="timer"><span id="time-display">0:00</span></div>
        </div>

        <!-- Include these lines in your HTML file where you want to add the audio elements -->
        <audio id="flipSound">
            <source src="flip.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <audio id="correctMatchSound">
            <source src="correct.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

        <audio id="wrongMatchSound">
            <source src="wrong.mp3" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>

      </div>

    <main>
    <div class="row" style="padding-top: 20px;">
    <a id="backButton">
        <img src="student_back.png" class="back-icon" alt="Back Icon">
    </a><span><img src="images/memorylogo.png" class="iconlogo" style="max-width: 50%;
    min-width: 40%;"></span>

    <div class="row" style="justify-content: right; padding-right: 20px;">
        <img src="logo_dark.png" style="max-width: 25%;
        height: auto; justify-content: right; padding-right: 30px;">
    </div>

</div>
<div class="wrapper">
<ul class="cards">
        <li class="card">
          <div class="view front-view">
            <img src="icon_logo.png" alt="">
          </div>
          <div class="view back-view" data-name="img-1">
            <img src="images/memory/img-1.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="" alt="">
          </div>
          <div class="view back-view" data-name="img-1(2)">
            <img src="images/memory/img-1(2).png" alt="card-img">
        </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="icon_logo.png" alt="">
          </div>
          <div class="view back-view" data-name="img-2">
            <img src="images/memory/img-2.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="" alt="">
          </div>
          <div class="view back-view" data-name="img-2(2)">
            <img src="images/memory/img-2(2).png" alt="card-img">
        </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="icon_logo.png" alt="">
          </div>
          <div class="view back-view" data-name="img-3">
            <img src="images/memory/img-3.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="" alt="">
          </div>
          <div class="view back-view" data-name="img-3(2)">
            <img src="images/memory/img-3(2).png" alt="card-img">
        </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="icon_logo.png" alt="">
          </div>
          <div class="view back-view" data-name="img-4">
            <img src="images/memory/img-4.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="" alt="">
          </div>
          <div class="view back-view" data-name="img-4(2)">
            <img src="images/memory/img-4(2).png" alt="card-img">
        </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="icon_logo.png" alt="">
          </div>
          <div class="view back-view" data-name="img-5">
            <img src="images/memory/img-5.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="" alt="">
          </div>
          <div class="view back-view" data-name="img-5(2)">
            <img src="images/memory/img-5(2).png" alt="card-img">
        </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="icon_logo.png" alt="">
          </div>
          <div class="view back-view" data-name="img-6">
            <img src="images/memory/img-6.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="" alt="">
          </div>
          <div class="view back-view" data-name="img-6(2)">
            <img src="images/memory/img-6(2).png" alt="card-img">
        </div>
        </li>
      </ul><br><br>
      <button class="retry-button" onclick="restartGame()">
        <img src="images/memory/retry-icon.png" alt="Retry Icon">
    </button>

    <div class="next-container">
        <div class="next">
            <a href="memory.php">
                <button type="button" class="btn-next btn" style="color: #8b6300;">Next >></button>
            </a>
        </div>
    </div>
</div>
        
        
    </main>
    <script>
        document.getElementById("backButton").onclick = function() {
            history.back();
        };
    </script>

    <script src="music.js"></script>
    
    <script src="memory.js"></script>  
</body>
</html>