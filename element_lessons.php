<?php
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location: index.php");
    }
    $user_id = $_SESSION['id'];

    // Query the database to get a list of lessons
    $query = mysqli_query($con, "SELECT lesson_id, lesson_title FROM lessons");
    
    // Create an array to store completion status for each lesson
    $lesson_completion = [];
    
    // Retrieve the ID of the last completed lesson for the current user
    $last_completed_query = mysqli_query($con, "SELECT MAX(lesson_id) AS last_completed FROM student_lesson_progress WHERE Id = $user_id AND completed = 1");
    $last_completed_data = mysqli_fetch_assoc($last_completed_query);
    $last_completed_lesson_id = $last_completed_data['last_completed'];
    
    while ($lesson = mysqli_fetch_assoc($query)) {
        $lesson_id = $lesson['lesson_id'];
    
        if ($lesson_id <= $last_completed_lesson_id + 1) {
            // Check if the lesson has been completed by the user
            $completed_query = mysqli_query($con, "SELECT completed FROM student_lesson_progress WHERE Id = $user_id AND lesson_id = $lesson_id");
            $completed_data = mysqli_fetch_assoc($completed_query);
    
            if ($completed_data && $completed_data['completed'] == 1 || $lesson_id == 1) {
                // Lesson has been completed
                $box_class = 'unlocked';
            } else {
                // Lesson has not been completed
                $box_class = 'locked';
            }
        } else {
            // Lesson is not the next one to unlock
            $box_class = 'locked';
        }
    
        // Store the completion status in the array
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
    </style>

</head>
<body style="background-image: url('images/homebg.png');">


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
    
    </header>
    <main>
    <link rel="stylesheet" href="home.css">
    <div class="container">
        <header><b>Elements of the Periodic Table</b></header>
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

            <a href="element5.php" class="box <?php echo $lesson_completion[9] ?>" onclick="unlockColumn(this, 9)">
                <div class="box-img" style="background-image: url('images/lessons/SlideB.jpg');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Boron</div>
                </div>
            </a>
            <a href="element6.php" class="box <?php echo $lesson_completion[10] ?>" onclick="unlockColumn(this, 10)">
                <div class="box-img" style="background-image: url('images/lessons/SlideC.jpg');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Carbon</div>
                </div>
            </a>
            <a href="element7.php" class="box <?php echo $lesson_completion[11] ?>" onclick="unlockColumn(this, 11)">
                <div class="box-img" style="background-image: url('images/lessons/SlideN.jpg');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Nitrogen</div>
                </div>
            </a>
            <a href="element8.php" class="box <?php echo $lesson_completion[12] ?>" onclick="unlockColumn(this, 12)">
                <div class="box-img" style="background-image: url('images/lessons/SlideO.jpg');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Oxygen</div>
                </div>
            </a>

            <a href="element9.php" class="box <?php echo $lesson_completion[13] ?>" onclick="unlockColumn(this, 13)">
                <div class="box-img" style="background-image: url('images/lessons/SlideF.jpg');"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Flourine</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 14)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Neon</div>
                </div>
            </a>
                        <!-- Elements 11 to 20 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 15)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Sodium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 16)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Magnesium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 17)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Aluminum</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 18)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Silicon</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 19)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Phosphorus</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 20)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Sulfur</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 21)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Chlorine</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 22)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Argon</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 23)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Potassium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 24)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Calcium</div>
                </div>
            </a>

                        <!-- Elements 21 to 38 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 25)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Scandium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 26)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Titanium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 27)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Vanadium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 28)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Chromium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 29)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Manganese</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 30)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Iron</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 31)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Cobalt</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 32)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Nickel</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 33)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Copper</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 34)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Zinc</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 35)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Gallium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 36)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Germanium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 37)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Arsenic</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 38)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Selenium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 39)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Bromine</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 40)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Krypton</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 41)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Rubidium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 42)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Strontium</div>
                </div>
            </a>

                        <!-- Elements 39 to 48 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 43)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Yttrium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 44)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Zirconium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 45)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Niobium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 46)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Molybdenum</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 47)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Technetium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 48)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Ruthenium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 49)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Rhodium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 50)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Palladium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 51)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Silver</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 52)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Cadmium</div>
                </div>
            </a>

            <!-- Elements 49 to 58 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 53)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Indium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 54)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Tin</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 55)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Antimony</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 56)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Tellurium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 57)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Iodine</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 58)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Xenon</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 59)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Cesium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 60)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Barium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 61)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Lanthanum</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 62)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Cerium</div>
                </div>
            </a>
            <!-- Elements 59 to 68 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 63)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Praseodymium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 64)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Neodymium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 65)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Promethium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 66)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Samarium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 67)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Europium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 68)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Gadolinium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 69)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Terbium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 70)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Dysprosium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 71)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Holmium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 72)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Erbium</div>
                </div>
            </a>

            <!-- Elements 69 to 78 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 73)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Thulium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 74)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Ytterbium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 75)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Lutetium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 76)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Hafnium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 77)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Tantalum</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 78)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Tungsten</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 79)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Rhenium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 80)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Osmium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 81)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Iridium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 82)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Platinum</div>
                </div>
            </a>
            <!-- Elements 79 to 88 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 83)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Gold</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 84)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Mercury</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 85)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Thallium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 86)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Lead</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 87)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Bismuth</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 88)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Polonium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 89)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Astatine</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 90)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Radon</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 91)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Francium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 92)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Radium</div>
                </div>
            </a>

            <!-- Elements 89 to 98 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 93)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Actinium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 94)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Thorium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 95)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Protactinium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 96)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Uranium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 97)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Neptunium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 98)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Plutonium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 99)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Americium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 100)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Curium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 101)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Berkelium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 102)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Californium</div>
                </div>
            </a>

            <!-- Elements 99 to 108 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 103)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Einsteinium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 104)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Fermium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 105)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Mendelevium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 106)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Nobelium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 107)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Lawrencium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 108)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Rutherfordium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 109)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Dubnium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 110)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Seaborgium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 111)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Bohrium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 112)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Hassium</div>
                </div>
            </a>

            <!-- Elements 109 to 118 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 113)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Meitnerium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 114)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Darmstadtium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 115)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Roentgenium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 116)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Copernicium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 117)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Nihonium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 118)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Flerovium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 119)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Moscovium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 120)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Livermorium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 121)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Tennessine</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 122)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Oganesson</div>
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