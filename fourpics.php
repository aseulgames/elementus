<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
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
            background-image: url('images/fourpicsbg.png'); 
        }

        .nav{
            background: linear-gradient(-45deg, #f5ceff8e, #7b4dff8e, #ff4df87e);
        }

        .back-icon{
            max-width: 5%;
            min-width: 5%;
            height: auto; 
            padding-left: 40px; 
            padding-top: 10px;
            transition: transform 0.3s ease;
        }
        .back-icon:hover{
            transform: scale(1.20);
        }
    </style>
</head>
<body>
        
    <div class="nav">
        <div class="logo"><a href="homestudent.php" >
        <img src="logo_dark.png" alt="logopng" class="logopng" style="max-width: 33%; padding-top:0px;
            max-height: 100% ;">
            </a>
        </div>

        <ul class="menu">
            <li><a class="#" href="homestudent.php" style="background-color: #a6ff808e;">Home</a></li>
            <li><a class="#" href="#" style="background-color: #a178e48e;">About</a></li>
            <li><a class="#" href="#" style="background-color: #ef82c58e;">Games</a></li>
            <li><a class="#" href="periodictable.php" style="background-color: #148eff8e;">Periodic Table</a></li>
            <li><a class="#" href="profileedit_student.php" style="background-color: #ffe39e8e;">Profile</a></li>

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
        
        <div class="timer-box">
        <div id="timer"><span id="time-display">0:00</span></div>
        </div>
        </div>

        
    </header>

    
    <main>
        <a href="gamechoices.php">
            <img src="teacher_back.png" class="back-icon" alt="back icon">
        </a><span><img src="images/4picslogo2.png" class="iconlogo"></span>

        
        <div class="rounded-square">
        
        <div id="game-container">
            <div id="container">
                <div id="image-container">
                    <!-- Display the images here -->
                    <img src="hydrogen/a.png" alt="Image 1">
                    <img src="hydrogen/b.png" alt="Image 2">
                    <img src="hydrogen/c.jpg" alt="Image 3">
                    <img src="hydrogen/d.jpg" alt="Image 4">
                </div>
            </div></div>
            <div class="field input">
            <input type="text" id="answer-input" placeholder="Enter your guess">
            <button class="btn" id="submit-button"><b class="btn">Submit</b></button>
            <div id="message"></div>
            </div>
        </div>

        
    </main>
    <script>
        // Add your JavaScript code here
        const levels = [
            {
                images: ["hydrogen/a.png", "hydrogen/b.png", "hydrogen/c.jpg", "hydrogen/d.jpg"],
                correctAnswer: "hydrogen"
            },
            {
                images: ["level2/a.png", "level2/b.png", "level2/c.jpg", "level2/d.jpg"],
                correctAnswer: "oxygen"
            },
            {
                images: ["level3/a.png", "level3/b.png", "level3/c.jpg", "level3/d.jpg"],
                correctAnswer: "nitrogen"
            }
        ];

        let currentLevel = 0; // Index of the current level
        let timerInterval;
        let elapsedTime = 0;

        const imageContainer = document.getElementById("image-container");
        const answerInput = document.getElementById("answer-input");
        const submitButton = document.getElementById("submit-button");
        const message = document.getElementById("message");
        const timerDisplay = document.getElementById("time-display");

        // Function to start the timer
        function startTimer() {
            clearInterval(timerInterval);
            timerInterval = setInterval(() => {
                elapsedTime++;
                updateTimerDisplay();
            }, 1000);
        }

        // Function to update the timer display
        function updateTimerDisplay() {
            const minutes = Math.floor(elapsedTime / 60);
            const seconds = elapsedTime % 60;
            const formattedTime = `${minutes}:${seconds.toString().padStart(2, '0')}`;
            timerDisplay.textContent = formattedTime;
        }

        function loadLevel() {
            const level = levels[currentLevel];
            imageContainer.innerHTML = ''; // Clear previous images
            // Display the images for the current level
            for (let i = 0; i < level.images.length; i++) {
                const img = document.createElement("img");
                img.src = level.images[i];
                img.alt = `Image ${i + 1}`;
                imageContainer.appendChild(img);
            }
        }

        submitButton.addEventListener("click", () => {
            const userAnswer = answerInput.value.toLowerCase();
            const level = levels[currentLevel];
            if (userAnswer === level.correctAnswer) {
                message.textContent = "Correct! You solved the puzzle.";
                clearInterval(timerInterval);
                currentLevel++;
                if (currentLevel < levels.length) {
                    loadLevel();
                    startTimer();
                } else {
                    message.textContent = "Congratulations! You have completed all levels.";
                    answerInput.disabled = true;
                    submitButton.disabled = true;
                }
            } else {
                message.textContent = "Incorrect. Try again.";
            }
        });

        startTimer();
        loadLevel();
    </script>
</body>
</html>