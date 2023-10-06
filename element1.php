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
    <link rel="stylesheet" href="lessons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Home</title>

    <style>
        .btn{
            margin-right: 10px; 
            background-color: #5c67d9; 
            border-radius: 20px; 
            border: solid #5c67d9; 
            color: #fff;
        }

        .prev, .next {
            font-size: 9px;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #fff; 
            border-radius: 5px; 
            border: solid #5c67d9; 
            color: #5c67d9;
        }

        .prev {
            left: -90px;
        }

        .next {
            right: -90px;
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
    
    <main>
    <div class="slideshow-container">
        <!-- Slides -->
        <div class="slide fade">
            <img src="images/element1_lesson/Slide1.JPG" alt="Slide 1">
        </div>
        <div class="slide">
            <img src="images/element1_lesson/Slide2.JPG" alt="Slide 2">
        </div>
        <div class="slide">
            <img src="images/element1_lesson/Slide3.JPG" alt="Slide 3">
        </div>
        <div class="slide">
            <img src="images/element1_lesson/Slide4.JPG" alt="Slide 4">
        </div>
        <div class="slide">
            <img src="images/element1_lesson/Slide5.JPG" alt="Slide 5">
        </div>
        <div class="slide">
            <img src="images/element1_lesson/Slide6.JPG" alt="Slide 6">
        </div>
        <!-- Add more slides as needed -->

        <div class="navigation"><br>
            <button class="prev btn">&#10094;<</button>
            <button class="next btn">>&#10095;</button>
        </div>
    </div>
    </main>
        </div>

    <div class="button-row">
        <button type="button" class="btn" onclick="window.history.back()" name="back" value="back" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;"><  Back </button>
        
        <button id="startQuiz" class="btn disabled-button" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;">
            <a href="quiz1.php">Start Quiz</a>
        </button>
    </div>

        <script src="homescript.js"></script>
        <script>
        

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

        
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            let i;
            const slides = document.getElementsByClassName("slide");
            
            if (n > slides.length) {
                slideIndex = 1;
            } else if (n < 1) {
                slideIndex = slides.length;
            } else {
                slideIndex = n;
            }
            
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            
            slides[slideIndex - 1].style.display = "block";
        }

        document.querySelector('.prev').addEventListener('click', () => {
            plusSlides(-1);
        });

        document.querySelector('.next').addEventListener('click', () => {
            plusSlides(1);
        });




    </script>
</body>
</html>