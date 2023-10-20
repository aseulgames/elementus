<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

if (isset($_POST['finishLesson'])) {
    $user_id = $_SESSION['id'];
    // CHANGE LESSON ID
    $lesson_id = 4; 
    
    // Perform the database insert
    $insert = mysqli_query($con, "INSERT INTO student_lesson_progress (Id, lesson_id, completed) VALUES ($user_id, $lesson_id, 1) ON DUPLICATE KEY UPDATE completed = 1");
    
    if ($insert) {
        echo "Lesson progress inserted successfully.";
    } else {
        echo "Error inserting lesson progress: " . mysqli_error($con);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lessons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Home</title>

    <style>
        .disabled-button {
            opacity: 0.5 !important; 
            pointer-events: none; 
        }

        .disabled-opacity {
        opacity: 0.5; /* Set the desired opacity value */

    }
    </style>
</head>

<body style="background-image: url('images/lessonsbg.png');">
    
<link rel="stylesheet" href="home.css">
<div class="nav" style="background: linear-gradient(-45deg, #9aff9b8e, #00bf028e, #fdfffd8e); ">
    <div class="logo" style="text-align: left;"><a href="homestudent.php" >
        <img src="logo_dark.png" alt="logopng" class="logopng" style="max-width: 40%; padding-top:0px;
            max-height: 100%;">
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
</div>
    </header>
    
    <div class="scroll-down-indicator">
    <span>Scroll down</span>
    <div class="arrow"></div>
</div>
</div>
    <main>
    <link rel="stylesheet" href="lessons.css">
    <div class="lesson-container">
        <div class="box-lesson">
    <!-- <div id="timer">Time remaining: 0:00</div> -->
        <h1><b>Elements, Compounds, and Mixtures</b></h1>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/DZ6Ap8Zyb9w?si=Bi1YB0219XQ0t_NN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <p>&nbsp;</p>
        <h2><b>Elements</b></h2>
        <p>An element is pure substance made up of atoms with the same atomic number, which denotes that their nuclei have the same amount of protons. The chemical symbol for each element is different, for as "H" for hydrogen, "O" for oxygen, or "Fe" for iron.</p>
        <p><strong>Characteristics:</strong></p>
        <p>- Chemical reactions cannot degrade elements into less complex ones.</p>
        <p>They are the simplest form of matter and the building blocks of all other forms.</p>
        <p>- The periodic table classifies elements according to their chemical makeup and atomic number.</p>
        <p>&nbsp;</p>
        <h2><b>Compounds</b></h2>
        <p>When two or more distinct elements combine chemically in predetermined ratios, a compound is created. Compounds have unique properties different from the elements that compose them.&nbsp; Compounds are represented by chemical formulas, which show the types and ratios of atoms present. For instance, "H2O" stands for water, a substance made up of two hydrogen atoms and one oxygen atom.</p>
        <p><strong>Characteristics:</strong></p>
        <p>- Compounds have unique physical and chemical characteristics that set them apart from the characteristics of the elements that make them up.</p>
        <p>- Chemical bonds, either covalent or ionic, hold the components of a compound together.</p>
        <p>- Chemical processes can break down compounds into their component parts.</p>
        <p>&nbsp;</p>
        <h2><b>Mixtures</b></h2>
        <p>A mixture is a combination of two or more elements or compounds that have been physically combined but are not chemically bound. Both homogeneous and heterogeneous mixtures exist. Mixtures do not have a specific chemical formula but are described based on the components present and their proportions.</p>
        <p>Characteristics:</p>
        <p>- Mixtures maintain the unique characteristics of their constituent parts.</p>
        <p>- They can be physically separated into their constituent parts by the use of techniques like chromatography, distillation, or filtration.&nbsp;&nbsp;</p>
        <p>&nbsp;- Examples of mixtures include:</p>
        <p>Air (a mixture of gases)</p>
        <p>Salad (a mixture of vegetables)</p>
        <p>Saltwater (a mixture of salt and water)</p>
        <p>Muddy Water (a mixture of dirt and water)</p>
        <p>&nbsp;</p>
        <p><b>Key Points:</b></p>
        <p>- Elements are the simplest forms of matter, composed of one type of atom.</p>
        <p>- Compounds result from the chemical combination of different elements in fixed ratios.</p>
        <p>- Mixtures are physical combinations of substances with no fixed chemical composition.</p>
    </main>

    <div class="button-row">
        <button type="button" class="btn" onclick="window.history.back()" name="back" value="back" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;"><  Back </button>
        
        <button id="nextButton" class="btn disabled-button" name="next" value="next" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;" disabled>
            <a href="element1.php">Next ></a>
        </button>
        
        <button id="lessonCompleteButton" class="btn disabled-button" name="finishLesson" value="finishLesson" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;">Finish Lesson</button>
        
    </div>

        <script src="homescript.js"></script>
        <script>
        $(document).ready(function() {
            <?php
                $user_id = $_SESSION['id'];
                //CHANGE LESSON NUMBER!!
                $lesson_id = 4;

                $query = mysqli_query($con, "SELECT completed FROM student_lesson_progress WHERE Id = $user_id AND lesson_id = $lesson_id");
                

                $lessonCompleted = false; // Initialize as false by default

                if ($query && mysqli_num_rows($query) > 0) {
                    $row = mysqli_fetch_assoc($query);
                    $lessonCompleted = $row['completed'] == 1;
                }
                // Check if the lesson is completed
                if ($lessonCompleted) {
                    echo 'var timer = 0;
                    $("#nextButton").prop("disabled", false);
                    $("#nextButton").removeClass("disabled-button");';
                    
                } else {
                    echo 'var timer = 0; 
                    function updateTimer() {
                        var minutes = Math.floor(timer / 60);
                        var seconds = timer % 60;
                        var timeString = minutes + ":" + (seconds < 10 ? "0" : "") + seconds;
                        $("#timer").text("Time remaining: " + timeString);
                    }

                    var countdown = setInterval(function() {
                        timer--;
                        updateTimer();
                        if (timer <= 0) {
                            clearInterval(countdown);
                            $("#lessonCompleteButton").prop("disabled", false);
                            $("#lessonCompleteButton").removeClass("disabled-button");
                            
                        }
                    }, 1000);';
                    
                }

                if (isset($_POST['finishLesson'])) {
                    $insert = mysqli_query($con, "INSERT INTO student_lesson_progress (Id, lesson_id, completed) VALUES ($user_id, $lesson_id, 1) ON DUPLICATE KEY UPDATE completed = 1");
                }
            ?>

            $("#lessonCompleteButton").click(function() {
                clearInterval(countdown);
                $("#nextButton").prop("disabled", false);
                $("#nextButton").removeClass("disabled-button");

                $.post("elementscompounds.php", { finishLesson: 1 }, function(response) {
                    console.log(response);
                }).fail(function() {
                    alert("An error occurred.");
                });
            });
        });

        window.addEventListener("scroll", function() {
            var scrollIndicator = document.querySelector(".scroll-down-indicator");
            var windowScroll = window.scrollY;

            // Calculate the threshold (adjust this value based on your needs)
            var threshold = 100;

            // Check if the user has scrolled beyond the threshold
            if (windowScroll > threshold) {
                scrollIndicator.style.opacity = "0"; // Set opacity to 0 to hide the indicator
            } else {
                scrollIndicator.style.opacity = "1"; // Set opacity to 1 to show the indicator
            }
        });

    </script>
</body>
</html>