<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

if (isset($_POST['finishLesson'])) {
    $user_id = $_SESSION['id'];
    // CHANGE LESSON ID
    $lesson_id = 13; 
    
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
    <title>Flourine Quiz</title>
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
    
    <!-- <div class="button-row">
        <button type="button" class="btn" onclick="window.history.back()" name="back" value="back" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;"><  Back </button>
        
        <button id="nextButton" class="btn disabled-button" name="next" value="next" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;" disabled>
            <a href="element1.php">Next ></a>
        </button>
        
        <button id="lessonCompleteButton" class="btn disabled-button" name="finishLesson" value="finishLesson" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;">Finish Lesson</button>
        
</div> -->

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
            <div class="title">Flourine Quiz</div>
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
        <div class="complete_text">You've completed the Quiz!</div>
        <div class="score_text">
            <!-- Here I've inserted Score Result from JavaScript -->
        </div>
        <div class="buttons">
            <button class="restart">Replay Quiz</button>
            <button class="quit">Next Lesson</button>
        </div>
    </div>


    <link rel="stylesheet" href="lessons.css">
    <!-- <div class="button-row">
        <button type="button" class="btn" onclick="window.history.back()" name="back" value="back" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;"><  Back </button>
        
        <button id="nextButton" class="btn disabled-button" name="next" value="next" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;" disabled>
            <a href="namessymbols.php">Next ></a>
        </button>
        
        <button id="lessonCompleteButton" class="btn disabled-button" name="finishLesson" value="finishLesson" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;">Finish Lesson</button>
        
    </div> -->

    <script>
    let questions = [
        {
            numb: 1,
            question: "What is the atomic number and symbol of fluorine in the periodic table?",
            answer: "Atomic number 9, symbol F",
            options: [
                "Atomic number 1, symbol H",
                "Atomic number 3, symbol Li",
                "Atomic number 7, symbol N",
                "Atomic number 9, symbol F"
            ]
        },
        {
            numb: 2,
            question: "Who first isolated fluorine in its elemental form in 1886?",
            answer: "Henri Moissan",
            options: [
                "Albert Einstein",
                "Isaac Newton",
                "Marie Curie",
                "Henri Moissan"
            ]
        },
        {
            numb: 3,
            question: "What is the color of fluorine gas in its gaseous form?",
            answer: "Pale yellowish-green",
            options: [
                "Blue",
                "Red",
                "Pale yellowish-green",
                "Colorless"
            ]
        },
        {
            numb: 4,
            question: "What is the primary application of fluorocarbon compounds in air conditioning and refrigeration systems?",
            answer: "Refrigerants",
            options: [
                "Fuel for air conditioners",
                "Lubricants for compressors",
                "Heat insulation",
                "Refrigerants"
            ]
        },
        {
            numb: 5,
            question: "In which industry are fluorocarbon compounds commonly used, and for what purpose?",
            answer: "Electronics; in the production of semiconductors",
            options: [
                "Automotive; for fuel production",
                "Aerospace; as rocket propellants",
                "Electronics; in the production of semiconductors",
                "Food industry; as flavor enhancers"
            ]
        },
    ];
</script>








    <script src="quizscript.js"></script>
    <script src="homescript.js"></script>

    <script>
    // Assuming quiz completion status is stored in a variable
    let lessonCompleted = false;

    // Function to save lesson progress
    function saveLessonProgress() {
        // Check if the lesson is completed
        if (lessonCompleted) {
            let lessonId = 13;

            // Perform the database insert using PHP
            <?php
                $user_id = $_SESSION['id'];
                $lesson_id = 13;

                $insert = mysqli_query($con, "INSERT INTO student_lesson_progress (Id, lesson_id, completed) VALUES ($user_id, $lesson_id, 1) ON DUPLICATE KEY UPDATE completed = 1");

                if ($insert) {
                    echo "console.log('Lesson progress inserted successfully.');";
                } else {
                    echo "console.error('Error inserting lesson progress: " . mysqli_error($con) . "');";
                }
            ?>
        }
    }

    // Example: Call saveLessonProgress when the "Next Lesson" button is clicked
    document.querySelector('.result_box .buttons .quit').addEventListener('click', function() {
        saveLessonProgress();
        // Add logic to navigate to the next lesson or handle replay quiz as needed
        window.location.href = ""; // element 10 na
    });

    // Example: Call saveLessonProgress when the "Replay Quiz" button is clicked
    document.querySelector('.result_box .buttons .restart').addEventListener('click', function() {
        saveLessonProgress();
        // Add logic to replay the quiz as needed
        // Example: Reset quiz state or reload the quiz questions
    });
</script>
    
</body>

</html>