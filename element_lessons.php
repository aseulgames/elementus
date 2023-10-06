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
    <link rel="stylesheet" href="home.css">
    <script src="homescript.js"></script>
    <title>Home</title>

</head>
<body style="background-image: url('images/homebg.png');">
    
<div class="nav">
    <div class="logo"><a href="homestudent.php" >
        <img src="logo_dark.png" alt="logopng" class="logopng" style="max-width: 40%; padding-top:0px;
            max-height: 100% ;">
            </a>
        </div>
        <ul class="menu">
            <li><a class="#" href="homestudent.php">Home</a></li>
            <li><a class="#" href="#">About</a></li>
            <li><a class="#" href="games.php">Games</a></li>
            <li><a class="#" href="periodictable.php">Periodic Table</a></li>
            <li><a class="#" href="profileedit_student.php">Profile</a></li>

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
    <link rel="stylesheet" href="lessons.css">
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
            <a href="" class="box locked" onclick="unlockColumn(this, 6)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Helium</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 7)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Lithium</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 8)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div class="box-text">Beryllium</div>
                </div>
            </a>

            <a href="" class="box locked" onclick="unlockColumn(this, 9)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Boron</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 10)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Carbon</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 11)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Nitrogen</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 12)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Oxygen</div>
                </div>
            </a>

            <a href="" class="box locked" onclick="unlockColumn(this, 13)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Flourine</div>
                </div>
            </a>
            <a href="" class="box locked" onclick="unlockColumn(this, 14)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Neon</div>
                </div>
            </a>
                        <!-- Elements 11 to 20 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 15)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Sodium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 16)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Magnesium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 17)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Aluminum</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 18)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Silicon</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 19)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Phosphorus</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 20)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Sulfur</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 21)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Chlorine</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 22)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Argon</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 23)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Potassium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 24)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Calcium</div>
                </div>
            </a>

                        <!-- Elements 21 to 38 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 25)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Scandium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 26)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Titanium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 27)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Vanadium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 28)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Chromium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 29)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Manganese</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 30)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Iron</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 31)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Cobalt</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 32)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Nickel</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 33)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Copper</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 34)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Zinc</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 35)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Gallium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 36)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Germanium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 37)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Arsenic</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 38)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Selenium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 39)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Bromine</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 40)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Krypton</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 41)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Rubidium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 42)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Strontium</div>
                </div>
            </a>

                        <!-- Elements 39 to 48 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 43)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Yttrium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 44)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Zirconium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 45)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Niobium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 46)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Molybdenum</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 47)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Technetium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 48)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Ruthenium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 49)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Rhodium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 50)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Palladium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 51)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Silver</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 52)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Cadmium</div>
                </div>
            </a>

            <!-- Elements 49 to 58 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 53)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Indium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 54)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Tin</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 55)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Antimony</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 56)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Tellurium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 57)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Iodine</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 58)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Xenon</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 59)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Cesium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 60)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Barium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 61)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Lanthanum</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 62)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Cerium</div>
                </div>
            </a>
            <!-- Elements 59 to 68 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 63)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Praseodymium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 64)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Neodymium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 65)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Promethium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 66)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Samarium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 67)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Europium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 68)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Gadolinium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 69)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Terbium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 70)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Dysprosium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 71)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Holmium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 72)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Erbium</div>
                </div>
            </a>

            <!-- Elements 69 to 78 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 73)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Thulium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 74)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Ytterbium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 75)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Lutetium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 76)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Hafnium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 77)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Tantalum</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 78)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Tungsten</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 79)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Rhenium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 80)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Osmium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 81)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Iridium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 82)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Platinum</div>
                </div>
            </a>
            <!-- Elements 79 to 88 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 83)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Gold</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 84)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Mercury</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 85)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Thallium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 86)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Lead</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 87)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Bismuth</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 88)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Polonium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 89)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Astatine</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 90)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Radon</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 91)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Francium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 92)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Radium</div>
                </div>
            </a>

            <!-- Elements 89 to 98 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 93)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Actinium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 94)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Thorium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 95)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Protactinium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 96)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Uranium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 97)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Neptunium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 98)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Plutonium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 99)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Americium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 100)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Curium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 101)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Berkelium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 102)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Californium</div>
                </div>
            </a>

            <!-- Elements 99 to 108 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 103)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Einsteinium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 104)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Fermium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 105)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Mendelevium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 106)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Nobelium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 107)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Lawrencium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 108)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Rutherfordium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 109)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Dubnium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 110)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Seaborgium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 111)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Bohrium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 112)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Hassium</div>
                </div>
            </a>

            <!-- Elements 109 to 118 -->
            <a href="#" class="box locked" onclick="unlockColumn(this, 113)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Meitnerium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 114)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Darmstadtium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 115)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Roentgenium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 116)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Copernicium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 117)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Nihonium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 118)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Flerovium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 119)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Moscovium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 120)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Livermorium</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 121)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Tennessine</div>
                </div>
            </a>
            <a href="#" class="box locked" onclick="unlockColumn(this, 122)">
                <div class="box-img"></div>
                <div class="box-divider"></div>
                <div class="box-content">
                    <div>Oganesson</div>
                </div>
            </a>



        </div>
    </div>
    </div>
        
    </main>
    <script src="homescript.js"></script>
</body>
</html>