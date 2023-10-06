<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

if (isset($_POST['finishLesson'])) {
    $user_id = $_SESSION['id'];
    $lesson_id = 5; // Change this to the appropriate lesson ID
    
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awesome Quiz App | CodingNepal</title>
    <link rel="stylesheet" href="quizzes.css">
    <!-- FontAweome CDN Link for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
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
<body style="background-image: url('images/lessonsbg.png');">
    

    <div class="start_btn"><button>Start Quiz</button></div>

    <!-- Info Box -->
    <div class="info_box">
        <!-- <div class="info-title"><span>Some Rules of this Quiz</span></div>
        <div class="info-list">
            <div class="info">1. You will have only <span>15 seconds</span> per each question.</div>
            <div class="info">2. Once you select your answer, it can't be undone.</div>
            <div class="info">3. You can't select any option once time goes off.</div>
            <div class="info">4. You can't exit from the Quiz while you're playing.</div>
            <div class="info">5. You'll get points on the basis of your correct answers.</div>
        </div> -->
        <div class="buttons">
            <button class="quit">Exit Quiz</button>
            <button class="restart">Continue</button>
        </div>
    </div>

    <!-- Quiz Box -->
    <div class="quiz_box">
        <header>
            <div class="title">Hydrogen Quiz</div>
            <div class="timer">
                <div class="time_left_txt">Time Left</div>
                <div class="timer_sec">30</div>
            </div>
            <div class="time_line"></div>
        </header>
        <section>
            <div class="que_text">
                <!-- Here I've inserted question from JavaScript -->
            </div>
            <div class="option_list">
                <!-- Here I've inserted options from JavaScript -->
            </div>
        </section>

        <!-- footer of Quiz Box -->
        <footer>
            
            <div class="total_que">
                <!-- Here I've inserted Question Count Number from JavaScript -->
            </div>
            <button class="next_btn">Next</button>
        </footer>
    </div>

    <!-- Result Box -->
    <div class="result_box">
        <div class="icon">
            <i class="fas fa-crown"></i>
        </div>
        <div class="complete_text">You've completed the Quiz!</div>
        <div class="score_text">
            <!-- Here I've inserted Score Result from JavaScript -->
        </div>
        <div class="buttons">
            <button class="restart">Replay Quiz</button>
            <button class="quit">Quit Quiz</button>
        </div>
    </div>

    <link rel="stylesheet" href="lessons.css">
    <div class="button-row">
        <button type="button" class="btn" onclick="window.history.back()" name="back" value="back" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;"><  Back </button>
        
        <button id="nextButton" class="btn disabled-button" name="next" value="next" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;" disabled>
            <a href="namessymbols.php">Next ></a>
        </button>
        
        <button id="lessonCompleteButton" class="btn disabled-button" name="finishLesson" value="finishLesson" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;">Finish Lesson</button>
        
    </div>

    <!-- Inside this JavaScript file I've inserted Questions and Options only -->
    <script>// creating an array and passing the number, questions, options, and answers
        let questions = [
            {
            numb: 1,
            question: "What is the most common element in the universe by elemental mass?",
            answer: "Hydrogen",
            options: [
            "Helium",
            "Hydrogen",
            "Oxygen",
            "Carbon"
            ]
        },
            {
            numb: 2,
            question: "In what state does hydrogen exist at room temperature?",
            answer: "Gas",
            options: [
            "Liquid",
            "Solid",
            "Gas",
            "Plasma"
            ]
        },
            {
            numb: 3,
            question: "What is the chemical formula for water, where hydrogen combines with oxygen?",
            answer: "H2O",
            options: [
            "H2O",
            "CO2",
            "CH4",
            "O2H"
            ]
        },
            {
            numb: 4,
            question: "What is the primary byproduct when hydrogen reacts with oxygen in hydrogen fuel cells?",
            answer: "Water",
            options: [
            "Carbon dioxide",
            "Nitrogen",
            "Water",
            "Hydrogen peroxide"
            ]
        },
            {
            numb: 5,
            question: "In which industry is hydrogen commonly used as rocket fuel?",
            answer: "Aerospace",
            options: [
            "Automotive",
            "Agriculture",
            "Aerospace",
            "Electronics"
            ]
        },
        // you can uncomment the below codes and make duplicate as more as you want to add question
        // but remember you need to give the numb value serialize like 1,2,3,5,6,7,8,9.....

        //   {
        //   numb: 6,
        //   question: "Your Question is Here",
        //   answer: "Correct answer of the question is here",
        //   options: [
        //     "Option 1",
        //     "option 2",
        //     "option 3",
        //     "option 4"
        //   ]
        // },
        ];
        </script>

    <!-- Inside this JavaScript file I've coded all Quiz Codes -->
    <script src="quizscript.js"></script>
    <script src="homescript.js"></script>
    <script>
        $(document).ready(function() {
            <?php
                $user_id = $_SESSION['id'];
                //CHANGE LESSON NUMBER!!
                $lesson_id = 5;

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

                //CHANGEEEEEEEE
                $.post("quiz1.php", { finishLesson: 1 }, function(response) {
                    console.log(response);
                }).fail(function() {
                    alert("An error occurred.");
                });
            });
        });

        window.addEventListener("scroll", function() {
            var scrollIndicator = document.querySelector(".scroll-down-indicator");
            var windowScroll = window.scrollY;

            var threshold = 100;

            // Check if the user has scrolled beyond the threshold
            if (windowScroll > threshold) {
                scrollIndicator.style.opacity = "0"; 
            } else {
                scrollIndicator.style.opacity = "1"; 
            }
        });
    </script>
</body>
</html>
</html>