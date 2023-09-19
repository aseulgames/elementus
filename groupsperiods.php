<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

if (isset($_POST['finishLesson'])) {
    $user_id = $_SESSION['id'];
    //CHANGE LESSON!!
    $lesson_id = 3; 
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

<body>
    
    <div class="nav" style="padding=2%">
        <div class="logo"><a href="homestudent.php" >
        <img src="logo_light.png" alt="logopng" class="logopng" style="max-width: 33%; padding-top:0px;
            max-height: 100% ; margin: 0; ">
            </a>
        </div>
        <ul class="menu">
            <li><a class="#" href="homestudent.php">Home</a></li>
            <li><a class="#" href="#">About</a></li>
            <li><a class="#" href="#">Games</a></li>
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
    <div id="timer">Time remaining: 0:00</div>
        <h1><strong>Groups and Periods</strong></h1>
        <h2><strong>Groups (Families)</strong></h2>
        <p>Groups, also known as families, are the vertical columns of elements in the periodic table. Elements that are part of the same group have the same number of valence electrons and similar chemical characteristics. Here is a more thorough explanation:</p>
        <p><strong>Similar Chemical Properties:</strong> Because all elements in a group have an equal number of valence electrons in their outermost electron shells, they behave chemically similarly. Elements having the same number of valence electrons tend to produce comparable kinds of chemical bonds and compounds because valence electrons are the electrons engaged in chemical processes.</p>
        <img src="groups.jpg" alt="groups" class="groups">
        <h2><strong>Periods</strong></h2>
        <p>The periodic table's horizontal rows of elements are referred to as periods. Even while elements from the same era don't always have the same chemical characteristics, they do have the same number of electron shells. Here is a more detailed explanation:</p>
        <p><strong>Energy Levels:</strong> A new energy level or electron shell is represented by each period. The number of protons and electrons in the nucleus rises as you walk over a period from left to right, increasing the positive charge throughout.</p>
        <p><strong>Atomic Size:</strong> Because they have fewer electron shells, the elements in periods 1 and 2 on the left side of the periodic table have smaller atoms. Because they have more electron shells, the elements on the right side (periods 3 and beyond) have greater atomic sizes.</p>
        <p><strong>Trends in Properties:</strong> Despite the fact that components from different periods do not have the same chemical characteristics, there are observable trends in properties across time. For example, atomic size generally decreases from left to right, while electronegativity (the tendency to attract electrons) tends to increase.</p>
        <img src="periods.jpg" alt="groups" class="groups">
    </main>

    <div class="button-row">
        <button type="button" class="btn" onclick="window.history.back()" name="back" value="back" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;"><  Back </button>
        
        <button id="nextButton" class="btn disabled-button" name="next" value="next" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;" disabled>
            <a href="elementscompounds.php">Next ></a>
        </button>
        
        <button id="lessonCompleteButton" class="btn disabled-button" name="finishLesson" value="finishLesson" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;">Finish Lesson</button>
        
    </div>

        <script src="homescript.js"></script>
        <script>
        $(document).ready(function() {
            <?php
                $user_id = $_SESSION['id'];
                //CHANGE LESSON NUMBER!!
                $lesson_id = 3;

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
                    echo 'var timer = 5; 
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

                $.post("groupsperiods.php", { finishLesson: 1 }, function(response) {
                    console.log(response);
                }).fail(function() {
                    alert("An error occurred.");
                });
            });
        });

    </script>
</body>
</html>