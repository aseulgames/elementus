<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}
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
            background-image: url('images/memorybg.png'); 
        }

        .rounded-square{
            background: #7dff73;
            width: 42%;
            height: 450px;
        }


        .timer-box {
            background-color: #cb9b00;

                position: absolute;
                top: 150px; /* Adjust the top distance from the top of the parent element */
                right: 70px; /* Adjust the right distance from the right of the parent element */
                width: 150px; /* Set the width of the timer box */
                height: 30px; /* Set the height of the timer box */
                border: 4px solid #fdc54c; /* Set the border properties */
                padding: 10px; /* Optional: Add padding inside the timer box */

            transform: skewX(-5deg); /* Skew the timer box horizontally */
        }

        /*Memory Game*/
        .wrapper {
            padding: 10px; /* Adjust padding for smaller screens */
            border-radius: 10px;
            background: #7dff73;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 38vw; /* Limit the maximum width to 80% of the viewport width */
            max-height: 80vh; /* Limit the maximum height to 80% of the viewport height */
            margin: 0 auto; /* Center the wrapper horizontally */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative; /* Add relative positioning */
        }

        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Center the cards horizontally */
            max-width: 100%; /* Allow cards to take full width if the screen is smaller than 80vw */
            margin-left: -30px;
        }

        .card {
            cursor: pointer;
            list-style: none;
            user-select: none;
            position: relative;
            perspective: 1000px;
            transform-style: preserve-3d;
            height: calc(8vw - 20px); /* 25% of the viewport width, minus margins */
            width: calc(8vw - 20px); /* 25% of the viewport width, minus margins */
            margin: 10px; /* Margins between cards */
        }



        .cards, .card, .view{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card.shake{
            animation: shake 0.35s ease-in-out;
        }
        @keyframes shake {
            0%, 100%{
            transform: translateX(0);
            }
            20%{
            transform: translateX(-10px);
            }
            40%{
            transform: translateX(10px);
            }
            60%{
            transform: translateX(-8px);
            }
            80%{
            transform: translateX(8px);
            }
        }
        .card .view{
            width: 100%;
            height: 100%;
            position: absolute;
            border-radius: 7px;
            background: #efefef;
            pointer-events: none;
            backface-visibility: hidden;
            transition: transform 0.25s linear;
        }
        .card .front-view img{
            width: 95%;
        }
        .card .back-view img{
            max-width: 45px;
        }
        .card .back-view{
            transform: rotateY(-180deg);
        }
        .card.flip .back-view{
            transform: rotateY(0);
        }
        .card.flip .front-view{
            transform: rotateY(180deg);
        }

        .card .front-view {
            background-image: url('images/back-memory.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .card .back-view img{
            max-width: 100%; /* Set the width to 100% to match the parent container */
            height: 100%;
        }

        
        

        @media screen and (max-width: 900px) {
            .wrapper {
                max-width: 80vw;
            }

            .cards {
                max-width: 80%;
            }

            .card {
                height: calc(15vw - 20px);
                width: calc(15vw - 20px);
                margin: 6px;
            }

            .timer-box {
                top: auto;
                bottom: 20px; /* Adjust the distance from the bottom of the parent element */
                right: 20px; /* Adjust the distance from the right of the parent element */
                width: 100px;
                height: 20px;
                font-size: 12px;
                padding: 4px;
            }
        }

        @media screen and (max-width: 530px) {
            .wrapper {
                max-width: 90vw;
            }

            .cards {
                max-width: 90%;
            }

            .card {
                height: calc(18vw - 20px);
                width: calc(18vw - 20px);
                margin: 4px;
            }

            .timer-box {
                top: auto;
                bottom: 20px; /* Adjust the distance from the bottom of the parent element */
                right: 20px; /* Adjust the distance from the right of the parent element */
                width: 100px;
                height: 20px;
                font-size: 12px;
                padding: 4px;
            }
        }


    </style>
</head>
<body>
        
        <div class="timer-box">
        <div id="timer"><span id="time-display">0:00</span></div>
        </div>
        </div>
    <main>
    <div class="row" style="padding-top: 20px;">
    <a id="backButton">
        <img src="student_back.png" class="back-icon" alt="Back Icon">
    </a><span><img src="images/memorylogo.png" class="iconlogo" style="max-width: 50%;
    min-width: 40%;"></span>

    <div class="row" style="justify-content: right; padding-right: 20px;">
        <img src="logo_dark.png" style="max-width: 25%;
        height: auto; justify-content: right; padding-right: 30px;">
    </div>

</div>
<div class="wrapper">
<ul class="cards">
        <li class="card">
          <div class="view front-view">
            <img src="icon_logo.png" alt="">
          </div>
          <div class="view back-view" data-name="img-1">
            <img src="images/memory/img-1.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="" alt="">
          </div>
          <div class="view back-view" data-name="img-1(2)">
            <img src="images/memory/img-1(2).png" alt="card-img">
        </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="icon_logo.png" alt="">
          </div>
          <div class="view back-view" data-name="img-2">
            <img src="images/memory/img-2.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="" alt="">
          </div>
          <div class="view back-view" data-name="img-2(2)">
            <img src="images/memory/img-2(2).png" alt="card-img">
        </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="icon_logo.png" alt="">
          </div>
          <div class="view back-view" data-name="img-3">
            <img src="images/memory/img-3.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="" alt="">
          </div>
          <div class="view back-view" data-name="img-3(2)">
            <img src="images/memory/img-3(2).png" alt="card-img">
        </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="icon_logo.png" alt="">
          </div>
          <div class="view back-view" data-name="img-4">
            <img src="images/memory/img-4.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="" alt="">
          </div>
          <div class="view back-view" data-name="img-4(2)">
            <img src="images/memory/img-4(2).png" alt="card-img">
        </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="icon_logo.png" alt="">
          </div>
          <div class="view back-view" data-name="img-5">
            <img src="images/memory/img-5.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="" alt="">
          </div>
          <div class="view back-view" data-name="img-5(2)">
            <img src="images/memory/img-5(2).png" alt="card-img">
        </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="icon_logo.png" alt="">
          </div>
          <div class="view back-view" data-name="img-6">
            <img src="images/memory/img-6.png" alt="card-img">
          </div>
        </li>
        <li class="card">
          <div class="view front-view">
            <img src="" alt="">
          </div>
          <div class="view back-view" data-name="img-6(2)">
            <img src="images/memory/img-6(2).png" alt="card-img">
        </div>
        </li>
      </ul><br><br>
      <button class="retry-button" onclick="restartGame()">
        <img src="images/memory/retry-icon.png" alt="Retry Icon">
    </button>

    <div class="next-container">
        <div class="next">
            <a href="memory.php">
                <button type="button" class="btn-next btn" style="color: #8b6300;">Next >></button>
            </a>
        </div>
    </div>
</div>
        
        
    </main>
    <script>
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

        startTimer();
        loadLevel();

    </script>

    <script>
        document.getElementById("backButton").onclick = function() {
            history.back();
        };
    </script>

    <script>
        const cards = document.querySelectorAll(".card");

        let matched = 0;
        let cardOne, cardTwo;
        let disableDeck = false;
        let gameOver = false;


        function flipCard({target: clickedCard}) {
            if(cardOne !== clickedCard && !disableDeck) {
                clickedCard.classList.add("flip");
                if(!cardOne) {
                    return cardOne = clickedCard;
                }
                cardTwo = clickedCard;
                disableDeck = true;
                let cardOneImg = cardOne.querySelector(".back-view img").src,
                cardTwoImg = cardTwo.querySelector(".back-view img").src;
                matchCards(cardOneImg, cardTwoImg);
            }

            if (gameOver || cardOne === clickedCard || disableDeck) {
                return; // Do not flip the card if the game is over or if it's already flipped or disabled
            }
        }

        function matchCards(img1, img2) {
            const cardOneName = cardOne.getAttribute('data-name').split('(')[0];
            const cardTwoName = cardTwo.getAttribute('data-name').split('(')[0];

            // Check if the names match after removing the "(2)" tag
            if (cardOneName === cardTwoName) {
                matched++;
                if (matched == 6) {
                    setTimeout(() => {
                        gameOver = true;
                    }, 1000);
                }
                cardOne.removeEventListener("click", flipCard);
                cardTwo.removeEventListener("click", flipCard);
                cardOne = cardTwo = "";
                disableDeck = false;
            } else {
                setTimeout(() => {
                    cardOne.classList.add("shake");
                    cardTwo.classList.add("shake");
                }, 400);

                setTimeout(() => {
                    cardOne.classList.remove("shake", "flip");
                    cardTwo.classList.remove("shake", "flip");
                    cardOne = cardTwo = "";
                    disableDeck = false;
                }, 1200);
            }
        }

        function shuffleCard() {
            matched = 0;
            disableDeck = false;
            cardOne = cardTwo = "";
            let arr = [];
            for (let i = 1; i <= 6; i++) {
                arr.push(`img-${i}`, `img-${i}(2)`);
            }

            // Shuffle the array randomly
            for (let i = arr.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [arr[i], arr[j]] = [arr[j], arr[i]];
            }

            // Assign shuffled images to cards
            cards.forEach((card, i) => {
                card.classList.remove("flip");
                let imgTagBack = card.querySelector(".back-view img");
                imgTagBack.src = `images/memory/${arr[i]}.png`; // Change this line to load your own images
                card.setAttribute("data-name", arr[i]); // Assign a data attribute to match pairs
                card.addEventListener("click", flipCard);
            });
        }


        shuffleCard();

        cards.forEach(card => {
            card.addEventListener("click", flipCard);
        });

        function restartGame() {
            // Your existing shuffleCard() logic goes here
            shuffleCard();
            gameOver = false; // Reset game over flag
            elapsedTime = 0; // Reset timer
            updateTimerDisplay(); // Update timer display to show 0:00
            startTimer(); // Restart the timer
        }

    </script>
</body>
</html>