<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

if (isset($_POST['finishLesson'])) {
    $user_id = $_SESSION['id'];
    //CHANGE LESSON ID!!
    $lesson_id = 2; 
    
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
    <h1><b>Element Names, Symbols, and Atomic Numbers</b></h1>
        <h2><strong>Names of Elements</strong></h2>
        <p>Each chemical element has a unique name that distinguishes it from all other elements. These names are often based on various factors, including historical discoveries, properties, or notable scientists.</p>
        <h3><b>Common Names</b></h3>
        <p>Chemical elements are known by their common names, which have been in use for a long time and are well known to both scientists and the general public. These names frequently have practical or historical roots, and they often depend on the characteristics of the element, its discovery, or the native tongue of the area where it was first separated. For instance:</p>
        <p><strong>Hydrogen (H):</strong> The lightest and most prevalent element in the universe is hydrogen (H). The word "hydrogen" is derived from the Greek words "hydro" (which means "water") and "genes" (which means "forming"). This name refers to its function in the formation of water when it interacts with oxygen.</p>
        <p><strong>Oxygen (O):</strong> The word "oxygen" comes from the Greek word "oxygenes," which means "acid-forming." This name reflects oxygen's function as a fuel for combustion and its propensity to interact with other elements to generate oxides.</p>
        <p><strong>Gold (Au):</strong> The Latin term "aurum," which has been used to describe gold since ancient times, is the source of the sign "Au" for gold.</p>
        <p><strong>Copper (Cu):</strong> The Latin term "cuprum," which refers to the island of Cyprus, where copper was mined in antiquity, is where the sign "Cu" for copper is derived.</p>
        <h3><b>Systematic Names</b></h3>
        <p>The International Union of Pure and Applied Chemistry (IUPAC) has developed particular naming conventions that are followed when giving elements their systematic names. For newly discovered or synthesized elements that might not have well-established common names, these names are particularly important.</p>
        <p><strong>Ununbium (Uub):</strong> The systematic name for the element having atomic number 112 is ununbium. The IUPAC convention for giving interim systematic names to elements based on their atomic number is followed with the name "Ununbium". Latin for "one-one-two"</p>
        <p><strong>Nihonium (Nh):</strong> Nihonium is an example of a systematic name for element 113. It was named after the Japanese word "Nihon," which means Japan, where the element was discovered.</p>
        <p><strong>Tennessine (Ts): </strong>Tennessine is a systematic name for element 117. It was named in honor of the state of Tennessee in the United States, reflecting the contributions of researchers from Oak Ridge National Laboratory and Vanderbilt University.</p>
        <h2><strong>Symbols of Elements</strong></h2>
        <h3><b>Chemical&nbsp;Symbols</b></h3>
        <p>Chemical symbols are one- or two-letter representations of chemical elements. Chemical formulas can be written using these symbols, chemical equations can be balanced using them, and the periodic table may be organized using them. They are an essential component of chemical notation.</p>
        <h3><b>Origin&nbsp;of Symbols</b></h3>
        <p>Chemical symbols often derive from the first few letters of an element's name because they are closely related to that name's origin. Here are a few typical instances:</p>
        <p><strong>H for Hydrogen:</strong> The symbol "H" is derived from the first letter of the element's English name, Hydrogen.</p>
        <p><strong>O for Oxygen:</strong> Similarly, "O" is used as the symbol for Oxygen based on its initial letter.</p>
        <p>In cases where two or more elements have the same initial letter, additional letters are used to create unique symbols:</p>
        <p><strong>He for Helium:</strong> Helium's symbol "He" uses the first two letters of its name to distinguish it from Hydrogen.</p>
        <p><strong>Hg for Mercury:</strong> Mercury's symbol "Hg" is derived from its Latin name "Hydrargyrum," which is why it doesn't closely resemble the English name.</p>
        <h3><b>Exceptions</b></h3>
        <p>While many chemical symbols closely resemble the element's English name, there are exceptions where the symbols do not closely match. These exceptions often arise due to historical or etymological reasons:</p>
        <p><strong>Fe for Iron</strong>: The symbol "Fe" for Iron comes from the Latin word "Ferrum," which is why it differs from the English name.</p>
        <p><strong>Na for Sodium</strong>: Sodium's symbol "Na" is derived from the Latin word "Natrium," reflecting its historical use in sodium compounds.</p>
        <p><strong>K for Potassium:</strong> Potassium's symbol "K" comes from the Latin word "Kalium."</p>
        <p><strong>Au for Gold:</strong> Gold's symbol "Au" is derived from the Latin word "aurum," which is historically significant.</p>
        <h2><strong>Atomic Numbers</strong></h2>
        <p>One of the most important characteristics of chemical elements is their atomic number, which is crucial in determining the identity of an element. Here is a more thorough explanation of atomic numbers:</p>
        <h3><b>Number of Protons</b></h3>
        <p>The number of protons in the nucleus of an element's atom is represented by the element's atomic number. One of the three primary particles found in atoms, along with neutrons and electrons, are protons. Each element has a particular and distinctive property called the number of protons in an atom. For instance:</p>
        <p>Hydrogen, with an atomic number of 1, has one proton in its nucleus, while Helium, with an atomic number of 2, has two protons.</p>
        <h3><b>Arrangement in the Periodic Table </b></h3>
        <p>The periodic table's elements are systematically arranged in ascending atomic number order. The periodicity, or notable periodic pattern, in the properties of the elements is revealed by this arrangement. Periods (horizontal rows) and groups or families (vertical columns) make up the periodic table. Due to the fact that they all have the same number of valence electrons, elements belonging to the same group frequently display comparable chemical characteristics.</p>
        <h3><b>Significance of Atomic Numbers</b></h3>
        <p>The atomic number is critically important in the world of chemistry for several reasons:</p>
        <ol>
        <li><strong> Elemental Identity:</strong> Atomic numbers uniquely identify each element.&nbsp;The atomic number of any two elements is unique. This implies that you can identify an element's elemental identity if you know its atomic number.</li>
        </ol>
        <ol start="2">
        <li><strong> Organization in the Periodic Table:</strong> The periodic table is structured based on atomic numbers. Elements with similar properties are grouped together, making it a powerful tool for predicting the behavior of elements and their compounds.</li>
        </ol>
        <ol start="3">
        <li><strong> Chemical Behavior:</strong> An element's chemical behavior is influenced by its atomic number. Because they all contain the same number of valence electrons, elements in the same group frequently exhibit comparable chemical characteristics. Their atomic number is the cause of these similar characteristics.</li>
        </ol>
</main>

    <div class="button-row">
        <button type="button" class="btn" onclick="window.history.back()" name="back" value="back" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;"><  Back </button>
        
        <button id="nextButton" class="btn disabled-button" name="next" value="next" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;" disabled>
            <a href="groupsperiods.php">Next ></a>
        </button>
        
        <button id="lessonCompleteButton" class="btn disabled-button" name="finishLesson" value="finishLesson" style="margin-right: 10px; background-color: #5c67d9; border-radius: 20px; border: solid #5c67d9; color: #fff;">Finish Lesson</button>
        
    </div>

        <script src="homescript.js"></script>
        <script>
        $(document).ready(function() {
            <?php
                $user_id = $_SESSION['id'];
                //CHANGE LESSON NUMBER!!
                $lesson_id = 2;

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

                $.post("namessymbols.php", { finishLesson: 1 }, function(response) {
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