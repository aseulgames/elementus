<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

if (isset($_POST['finishLesson'])) {
    $user_id = $_SESSION['id'];
    // CHANGE LESSON ID
    $lesson_id = 10; 
    
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
    <title>Carbon Quiz</title>
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
            <div class="title">Carbon Quiz</div>
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
            question: "What is the atomic number and symbol of carbon in the periodic table?",
            answer: "Atomic number 6, symbol C",
            options: [
                "Atomic number 1, symbol H",
                "Atomic number 3, symbol Li",
                "Atomic number 6, symbol C",
                "Atomic number 8, symbol O"
            ]
        },
        {
            numb: 2,
            question: "In which form of carbon is it a good conductor of electricity, and what is this form commonly used for?",
            answer: "Graphite; electrical wiring and lubricants",
            options: [
                "Diamond; jewelry",
                "Graphite; electrical wiring and lubricants",
                "Carbon dioxide; refrigeration",
                "Carbon monoxide; fuel"
            ]
        },
        {
            numb: 3,
            question: "What is the fundamental process behind the burning of fossil fuels, and why is carbon essential in this process?",
            answer: "Combustion; it produces carbon dioxide and releases energy",
            options: [
                "Photosynthesis; it provides energy to plants",
                "Combustion; it produces carbon dioxide and releases energy",
                "Carbonation; it creates fizzy drinks",
                "Condensation; it forms clouds in the atmosphere"
            ]
        },
        {
            numb: 4,
            question: "What is the primary role of carbon in the production of ammonia using the Haber-Bosch process?",
            answer: "Acting as a catalyst",
            options: [
                "Acting as a catalyst",
                "Supplying nitrogen gas",
                "Absorbing excess heat",
                "Creating ammonia molecules"
            ]
        },
        {
            numb: 5,
            question: "What is the unique characteristic of carbon-14, and how is it used in science?",
            answer: "It is radioactive and used in radiocarbon dating to determine the age of ancient objects.",
            options: [
                "It emits visible light; used in lighting applications",
                "It has a half-life of 1 million years; used in geological dating",
                "It is a stable isotope of carbon; used in nuclear reactors",
                "It is radioactive and used in radiocarbon dating to determine the age of ancient objects."
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
            let lessonId = 10;

            // Perform the database insert using PHP
            <?php
                $user_id = $_SESSION['id'];
                $lesson_id = 10;

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
        window.location.href = "element7.php"; // Example: Navigate to the next lesson
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