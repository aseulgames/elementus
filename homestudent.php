<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['id'];

$query = mysqli_query($con, "SELECT lesson_id, lesson_title FROM lessons");

$lesson_completion = [];

$last_completed_query = mysqli_query($con, "SELECT MAX(lesson_id) AS last_completed FROM student_lesson_progress WHERE Id = $user_id AND completed = 1");
$last_completed_data = mysqli_fetch_assoc($last_completed_query);
$last_completed_lesson_id = $last_completed_data['last_completed'];

while ($lesson = mysqli_fetch_assoc($query)) {
    $lesson_id = $lesson['lesson_id'];

    if ($lesson_id <= $last_completed_lesson_id + 1) {
        $completed_query = mysqli_query($con, "SELECT completed FROM student_lesson_progress WHERE Id = $user_id AND lesson_id = $lesson_id");
        $completed_data = mysqli_fetch_assoc($completed_query);

        if ($completed_data && $completed_data['completed'] == 1 || $lesson_id == 1) {
            $box_class = 'unlocked';
        } else {
            $box_class = 'locked';
        }
    } else {
        $box_class = 'locked';
    }

    $lesson_completion[$lesson_id] = $box_class;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="home.css">
    <script src="homescript.js"></script>
    <title>Home</title>
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

        .box {
        /* ... (existing styles) ... */
        width: 100%; /* Adjust this value to control the width of the boxes */
        margin: 0 1%; /* Adjust this value to control the spacing between the boxes */
    }



    </style>
</head>
<body style="background-image: url('images/homebg.png');">
<div id="overlay" class="overlay">
    <div class="overlay-content">
        <p>Drag your mouse for bubbles!</p>
    </div>
</div>

<!-- Background Music -->
<audio id="backgroundMusic" autoplay loop>
    <source src="music-default.mp3" type="audio/mpeg">
    Your browser does not support the audio element.
</audio>

<div id = "board"></div>
<audio id="bubbleSound">
    <source src="bubbles.mp3" type="audio/mpeg">
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
                <li class="nav-item">
                    <!-- Mute and Unmute Icons -->
                    <div class="mute-icon" onclick="toggleMute()">
                        <img id="muteImg" src="images/play.png" alt="Mute">
                    </div>
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
</div>
    </header>
    <link rel="stylesheet" href="home.css">
    <main>
    <header style="padding-left: 2%; color: #004aad">Hello, <b><?php echo $res_Uname ?>!</b></header><br>

    <div class="container">
        <header>Introduction to Periodic Table</header>
        <div class="intro-container">
            <a href="origins.php" class="box <?php echo $lesson_completion[1] ?>" onclick="unlockColumn(this, 1)">
                <div class="box-img" style="background-image: url('images/origins.jpg');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Origins of the Periodic Table</div>
                </div>
            </a>
            <a href="namessymbols.php" class="box <?php echo $lesson_completion[2] ?>" onclick="unlockColumn(this, 2)">
                <div class="box-img" style="background-image: url('images/namessymbols.png');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Names, Symbols, & Atomic number of the Elements</div>
                </div>
            </a>
            <a href="groupsperiods.php" class="box <?php echo $lesson_completion[3] ?>" onclick="unlockColumn(this, 3)">
                <div class="box-img" style="background-image: url('images/groups.png');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Groups and Periods in the Periodic Table</div>
                </div>
            </a>
            <a href="elementscompounds.php" class="box <?php echo $lesson_completion[4] ?>" onclick="unlockColumn(this, 4)">
                <div class="box-img" style="background-image: url('images/mixtures.png');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Elements, Compounds, and Mixtures</div>
                </div>
            </a>
        </div>
    <br>
        
    <header style="display: flex; justify-content: space-between; ">
    Elements
    <a href="element_lessons.php"><u class="link-style">See All</u></a>
</header>
        <div class="intro-container">
            <a href="element1.php" class="box <?php echo $lesson_completion[5] ?>" onclick="unlockColumn(this, 5)">
                <div class="box-img" style="background-image: url('images/element1_lesson/Slide1.jpg');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Hydrogen</div>
                </div>
            </a>
            <a href="element2.php" class="box <?php echo $lesson_completion[6] ?>" onclick="unlockColumn(this, 6)">
                <div class="box-img" style="background-image: url('images/element2_lesson/Slide1.png');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Helium</div>
                </div>
            </a>
            <a href="element3.php" class="box <?php echo $lesson_completion[7] ?>" onclick="unlockColumn(this, 7)">
                <div class="box-img" style="background-image: url('images/element3_lesson/Slide1.png');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Lithium</div>
                </div>
            </a>
            <a href="element4.php" class="box <?php echo $lesson_completion[8] ?>" onclick="unlockColumn(this, 8)">
                <div class="box-img" style="background-image: url('images/element4_lesson/Slide1.png');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Beryllium</div>
                </div>
            </a>
        </div>
    </div>
    </div>
        
    </main>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <script src="homescript.js"></script>
    <script src="bubbles.js"></script>
    <script src="music.js"></script>
    <script>
    window.onload = function() {
        backgroundMusic.volume = 0.6;
            backgroundMusic.play();
        }
    </script>
</body>
</html>