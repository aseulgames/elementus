const memoryLevels = [
    {
        cards: ["img-1", "img-1(2)", "img-2", "img-2(2)", "img-3", "img-3(2)","img-4", "img-4(2)", "img-5", "img-5(2)", "img-6", "img-6(2)"],
        timeThreshold: 60, // Time threshold for 5 stars (in seconds)
    },
    {
        cards: ["img-7", "img-7(2)", "img-8", "img-8(2)", "img-9", "img-9(2)", "img-10", "img-10(2)", "img-11", "img-11(2)", "img-12", "img-12(2)"],
        timeThreshold: 100, // Time threshold for 4 stars (in seconds)
    },
    {
        cards: ["img-13", "img-13(2)", "img-14", "img-14(2)", "img-15", "img-15(2)", "img-10", "img-10(2)", "img-11", "img-11(2)", "img-12", "img-12(2)"],
        timeThreshold: 100, // Time threshold for 4 stars (in seconds)
    },
    // Add more levels as needed
];

let currentMemoryLevel = 0;
let timerInterval;
let elapsedTime = 0;
let gameStarted = false;
let matched = 0;
let cardOne = null;
let cardTwo = null;
let disableDeck = false;
let gameOver = false;
let pairs = [];

let totalStars = 0;

const timerDisplay = document.getElementById("time-display");
const cards = document.querySelectorAll(".card");
const popup = document.querySelector(".popup");
const overlay = document.querySelector(".overlay");

const flipSound = document.getElementById("flipSound");
const correctMatchSound = document.getElementById("correctMatchSound");
const wrongMatchSound = document.getElementById("wrongMatchSound");

currentMemoryLevel = 0; // Set the current level to the first level

function initMemoryLevel(level) {
    currentMemoryLevel = level;
    hideOverlay();
    gameStarted = false; // Reset game state
    elapsedTime = 0; // Reset timer
    updateTimerDisplay(); // Update timer display to show 0:00
    if (!gameStarted) {
        gameStarted = true;
        startTimer();
        shuffleCard(); // This function will shuffle cards based on the current level
    }
}

// Function to show the overlay and popup tutorial
function showTutorial() {
    overlay.style.display = "flex"; // Show the overlay
    popup.style.display = "block"; // Show the popup tutorial
}

// Call the showTutorial function when the page is loaded
window.onload = showTutorial;

function startTimer() {
    clearInterval(timerInterval);
    timerInterval = setInterval(() => {
        elapsedTime++;
        updateTimerDisplay();
    }, 1000);
}

function updateTimerDisplay() {
    const minutes = Math.floor(elapsedTime / 60);
    const seconds = elapsedTime % 60;
    const formattedTime = `${minutes}:${seconds.toString().padStart(2, '0')}`;
    timerDisplay.textContent = formattedTime;
}

function hideOverlay() {
    overlay.style.display = "none"; // Hide the overlay
    popup.style.display = "none"; // Hide the popup tutorial
}

function closeTutorial() {
    hideOverlay();
    if (!gameStarted) {
        gameStarted = true;
        startTimer();
        shuffleCard();
    }
}

document.querySelector("#close").addEventListener("click", closeTutorial);
document.querySelector("#okay").addEventListener("click", closeTutorial);


function flipCard(clickedCard) {
    if (gameStarted && !disableDeck && !gameOver) {
        if (clickedCard.classList.contains("flip") || clickedCard === cardOne) {
            return; // Do not flip the card if it's already flipped or if it's the same card clicked twice
        }
        
        clickedCard.classList.add("flip");
        // flipSound.play();

        if (!cardOne) {
            cardOne = clickedCard;
        } else {
            cardTwo = clickedCard;
            disableDeck = true;
            let cardOneImg = cardOne.querySelector(".back-view img").src;
            let cardTwoImg = cardTwo.querySelector(".back-view img").src;
            matchCards(cardOneImg, cardTwoImg);
        }
    }
}


function matchCards(img1, img2) {
    const cardOneName = cardOne.getAttribute('data-name').split('(')[0];
    const cardTwoName = cardTwo.getAttribute('data-name').split('(')[0];

    // Check if the names match after removing the "(2)" tag
    if (cardOneName === cardTwoName) {
        correctMatchSound.play();
        matched++;
        if (matched === pairs.length / 2) {
            stopTimer(); // Stop the timer when all pairs are matched
            const seconds = elapsedTime;
            const stars = calculateMemoryStars(seconds);
            const popupMessage = `Congratulations! You earned ${stars} stars.`;
            showMemoryStarsPopup(popupMessage, stars);
        }

        // Remove event listeners for matched cards
        cardOne.removeEventListener("click", flipCard);
        cardTwo.removeEventListener("click", flipCard);

        cardOne = cardTwo = "";
        disableDeck = false;
    } else {
        wrongMatchSound.play();
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

    // Get the cards for the current memory level
    const currentLevel = memoryLevels[currentMemoryLevel];
    const cardsForLevel = currentLevel.cards;

    pairs = cardsForLevel.reduce((acc, card) => {
        if (!acc.includes(card)) {
            acc.push(card);
            acc.push(`${card}(2)`);
        }
        return acc;
    }, []);

    // Shuffle the pairs randomly
    for (let i = pairs.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [pairs[i], pairs[j]] = [pairs[j], pairs[i]];
    }

    // Assign shuffled images to cards
    cards.forEach((card, i) => {
        card.classList.remove("flip");
        let imgTagBack = card.querySelector(".back-view img");
        imgTagBack.src = `images/memory/${pairs[i]}.png`; // Change this line to load your own images
        card.setAttribute("data-name", pairs[i]);
        card.addEventListener("click", flipCard);
    });
}


        shuffleCard();

        cards.forEach(card => {
            card.addEventListener("click", () => flipCard(card));
        });

        function restartGame() {
            // Your existing shuffleCard() logic goes here
            shuffleCard();
            gameOver = false; // Reset game over flag
            elapsedTime = 0; // Reset timer
            updateTimerDisplay(); // Update timer display to show 0:00
            startTimer(); // Restart the timer
        }

// Function to show the overlay
function showOverlay() {
    document.querySelector(".overlay").style.display = "block";
}


function showMemoryStarsPopup(message, stars) {
    totalStars += stars; // Update totalStars
    const totalStarsDiv = document.getElementById("totalStarsDisplay");

    // Generate star image based on the number of stars earned
    const starImage = `star${stars}.png`;

    totalStarsDiv.innerHTML = `★ ${totalStars} `;

    // Rest of your existing code for the popup
    const popupContainer = document.getElementById("stars-popup-container");
    const popup = document.createElement("div");
    popup.className = "stars-popup";

    popup.innerHTML = `
        <p>${message}</p>
        <div class="stars-container">
            <img src="images/${starImage}" alt="Star ${stars}" style="width: 20vw;">
        </div>
        <button id="nextMemoryLevelButton">Next Level</button>
    `;

    popupContainer.appendChild(popup);

    const nextLevelButton = popup.querySelector("#nextMemoryLevelButton");
    nextLevelButton.addEventListener("click", function() {
        if (currentMemoryLevel < memoryLevels.length - 1) {
            popupContainer.removeChild(popup);
            currentMemoryLevel++;
            initMemoryLevel(currentMemoryLevel);
        } else {
            // Player has completed all memory levels, update totalStars and save to localStorage
            localStorage.setItem("totalStars", totalStars);

            // Update totalStars display on games.php
            updateTotalStarsDisplay();

            window.location.href = "gamechoices.php";
        }
    });
}


function stopTimer() {
    clearInterval(timerInterval);
}

function calculateMemoryStars(timeInSeconds) {
    if (timeInSeconds <= 30) {
        return 5;
    } else if (timeInSeconds <= 60) {
        return 4;
    } else if (timeInSeconds <= 90) {
        return 3;
    } else if (timeInSeconds <= 120) {
        return 2;
    } else {
        return 1;
    }
}

