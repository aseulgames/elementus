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
    <link rel="stylesheet" href="memory.css">
</head>
<body>
<div id="stars-popup-container"></div>

<link rel="stylesheet" href="tutorial.css">
<div class="overlay"></div>

<div class="popup">
<button id="close">&times;</button>
<h1 class="title">How to Play?</h1>
<div class="tutorial-content">
    <ul>
    
        <li><strong>Face-Down Cards:</strong> Each card contains an  <strong>element symbol or an element name.</strong></li>
        <li><strong>Click to Match Cards:</strong> Click on any two cards to flip them over. Remember the symbols on each card.</li>
        <li><strong>Remember your Cards:</strong> Correct match will make cards stay face-up, but it will flip back face down if they don't</li>
        <li><strong>Win the Game:</strong> Match all the element symbol cards with their correct element name cards to win the game.</li>
        <strong>TIP: Try to complete it as fast as you can to earn more stars!</strong>
    
      </ul>
    <img src="images/memory_tut_img.png" alt="Tutorial Image" class="tutorial-img">
</div>
<input type="button" value="Got It!" id="okay" class="btn">

<style>
    .popup{
      background: linear-gradient(135deg, #fdc54c, #ffcf62);
    }

    #close, #okay {
        background-color: #b68337;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 1vw;
        transition: 0.3s;
    }

    #close:hover, #okay:hover {
        background-color: #b68337;
        color: #fff;
    }

    h1{
        font-size: 30px;
        text-shadow: 2px 2px 2px #ababab;
        color: #935d23;
        font-style: bold;
    }

    .tutorial-img{
        height: 14vw;
        text-align: center;
    }
</style>
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

    <!-- <div class="next-container">
        <div class="next">
            <a href="memory.php">
                <button type="button" class="btn-next btn" style="color: #8b6300;">Next >></button>
            </a>
        </div>
    </div> -->
    
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