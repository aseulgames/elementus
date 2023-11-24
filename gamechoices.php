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
            background-image: url('images/gameschoices.png'); 
            overflow-x: hidden;
            overflow-y: auto;
        }

        .intro-container{
            overflow-y: auto;
        }

        .nav{
            background: linear-gradient(-45deg, #ffa9f9, #fff7ad, #ffa6a6);
        }

        html, body {
			max-width: 100%;
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
        .mute-icon {
            position: absolute;
            top: 22vh;
            right: 7vh;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .mute-icon img {
            width: 5vh;
            height: 5vh;
        }

        @media screen and (max-width: 768px) {
        .mute-icon {
            top: 17vh;
            right: 2vh;
        }
    }
    </style>
</head>
<body>
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

<audio id="hoverSound">
    <source src="hover.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>
    <header id="headertitle">
        SELECT A GAME YOU'D LIKE TO PLAY
    </header>
    <main>
        <link rel="stylesheet" href="circular.css">
        <div class="intro-container">
    <?php
    $games = array(
        "Four Pics Game" => array("id" => 1,"logo_class" => "fourpicslogo-img", "href" => "playfourpics.php"),
        "Memory Game" => array("id" => 2,"logo_class" => "memorylogo-img", "href" => "playmemory.php"),
        "Puzzle Game" => array("id" => 3, "logo_class" => "puzzlelogo-img", "href" => "playpuzzle.php"),
        "Fusion Game" => array("id" => 4, "logo_class" => "fuselogo-img", "href" => "playfusion.php")
    );

    foreach ($games as $gameName => $gameDetails) {
        $gameId = $gameDetails['id'];
        $gameQuery = "SELECT max_stars FROM games WHERE game_name = '$gameName'";
        $gameResult = mysqli_query($con, $gameQuery);

        if ($gameResult && mysqli_num_rows($gameResult) > 0) {
            $gameRow = mysqli_fetch_assoc($gameResult);
            $maxStars = $gameRow['max_stars'];

            // Fetch total stars for the current user and game
            $totalStarsQuery = "SELECT SUM(stars_earned) AS totalStars FROM game_progress WHERE user_id = $id AND game_id = '$gameId'";
            $totalStarsResult = mysqli_query($con, $totalStarsQuery);

            if ($totalStarsResult && mysqli_num_rows($totalStarsResult) > 0) {
                $totalStarsRow = mysqli_fetch_assoc($totalStarsResult);
                $totalStars = $totalStarsRow['totalStars'];
            } else {
                $totalStars = 0;
            }
    ?>

            <a href="<?php echo strtolower($gameDetails['href']); ?>" class="box box<?php echo $gameId; ?>" onclick="unlockColumn(this, <?php echo $gameId; ?>)">
                <div class="box-img" style="background-image: url('images/icon<?php echo $gameId; ?>.png');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="<?php echo $gameDetails['logo_class']; ?>"></div>
                </div>
                <div class="circular-progress" data-percentage="<?php echo round($totalStars / $maxStars * 100); ?>">
                    <span class="progress-value"><?php echo "{$totalStars}/{$maxStars} ★"; ?></span>
                </div>
            </a>

    <?php
        }
    }
    ?>

    <div class="button-container">
        <button type="button" class="btn" onclick="window.location.href = 'games.php'" name="cancel" value="Cancel" style="background-color: #E24B4B; border-radius: 20px; border: solid #E24B4B; color: #fff;">Cancel</button>
    </div>
</div>
        
    
      
    </main>
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
<script>
    window.onload = function () {
        var backgroundMusic = document.getElementById("backgroundMusic");
        var hoverSound = document.getElementById("hoverSound");
        var boxes = document.querySelectorAll(".box");

        // Set background music volume to 0.3 (30% volume)
        backgroundMusic.volume = 0.4;

        // Play background music on page load
        backgroundMusic.play();

        // Add hover sound to all boxes
        boxes.forEach(function (box) {
            box.addEventListener("mouseenter", function () {
                hoverSound.currentTime = 0.4; // Reset sound to the beginning
                hoverSound.play();
            });
        });

        // Add circular progress animation
        document.querySelectorAll('.circular-progress').forEach(function (circular) {
            var percentage = circular.getAttribute('data-percentage');
            var circularProgress = circular.querySelector('.progress-value');
            var progressStartValue = 0;
            var speed = 10;

            // Check if there's progress before starting the animation
            if (percentage > 0) {
                var progress = setInterval(() => {
                    progressStartValue++;
                    // circularProgress.textContent = `${$progress}/${$maxStars}★`;
                    circular.style.background = `conic-gradient(#7d2ae8 ${progressStartValue * 3.6}deg, #ededed 0deg)`;

                    if (progressStartValue == percentage) {
                        clearInterval(progress);
                    }
                }, speed);
            } else {
                // If there's no progress, set the initial state
                circularProgress.textContent = '0/0★';
                circular.style.background = `conic-gradient(#ededed 0deg, #ededed 0deg)`;
            }
        });
    };
</script>


</body>
</html>