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

function getStoredMemoryElapsedTime() {
    return parseInt(localStorage.getItem("memoryElapsedTime")) || 0;
}


function initMemoryLevel(level) {
    currentMemoryLevel = level;
    hideOverlay();
    gameStarted = false; // Reset game state

    // Load stored level and elapsed time
    const storedLevel = getStoredMemoryLevel();
    const storedTime = getStoredMemoryElapsedTime();

    // Use the stored level if available, otherwise use the provided level
    currentMemoryLevel = storedLevel > 0 ? storedLevel : level;

    if (storedTime > 0) {
        // If stored time is greater than 0, it means the game is being resumed from storage
        gameStarted = true;
        elapsedTime = storedTime;
        startTimer();
        // Calculate minutes and seconds from elapsed time
        const minutes = Math.floor(elapsedTime / 60);
        const seconds = elapsedTime % 60;
        // Update timer display with the calculated time
        updateTimerDisplay(minutes, seconds);
        shuffleCard(); // This function will shuffle cards based on the current level
    } else {
        // If stored time is 0, it means the game is starting for the first time
        startTimer();
        shuffleCard(); // This function will shuffle cards based on the current level
    }
    // Save the updated level to storage
    saveStoredMemoryLevel(currentMemoryLevel, elapsedTime);
}


let overlayShown = false;

function showTutorial() {
    if (!overlayShown) {
        overlay.style.display = "flex"; // Show the overlay
        popup.style.display = "block"; // Show the popup tutorial
        overlayShown = true;
    }
}

// window.onload = function () {
//     showTutorial();

//     const storedLevel = getStoredMemoryLevel();
//     const storedTime = getStoredMemoryElapsedTime();
//     if (storedLevel > 0) {
//         currentMemoryLevel = storedLevel;
//         elapsedTime = storedTime;
//         initMemoryLevel(currentMemoryLevel);
//     }
// };

document.addEventListener("DOMContentLoaded", function () {
    showTutorial();

    // Load the stored level and elapsed time when the page is loaded
    const storedLevel = getStoredMemoryLevel();
    const storedTime = getStoredMemoryElapsedTime();
    if (storedLevel > 0) {
        // If a stored level is found, initialize the game with that level and elapsed time
        currentMemoryLevel = storedLevel;
        elapsedTime = storedTime;
        initMemoryLevel(currentMemoryLevel);
    }

    navigateBackToGame(); // Add this line
});


function getStoredMemoryLevel() {
    return parseInt(localStorage.getItem("currentMemoryLevel")) || 0;
}

function saveStoredMemoryLevel(level, elapsedTime) {
    localStorage.setItem("currentMemoryLevel", level);
    localStorage.setItem("memoryElapsedTime", elapsedTime);
}


function startTimer() {
    elapsedTime = 0; // Reset elapsed time to 0
    updateTimerDisplay(); // Update the timer display to show 0:00
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
    console.log("flipCard function called");console.log("Variables:", { gameStarted, disableDeck, gameOver });
    if (gameStarted && !disableDeck && !gameOver) {
        console.log("Inside flipCard function", { clickedCard, cardOne, cardTwo });

        if (clickedCard.classList.contains("flip") || clickedCard === cardOne) {
            console.log("Skipping card flip - already flipped or same card clicked twice");
            return; // Do not flip the card if it's already flipped or if it's the same card clicked twice
        }

        clickedCard.classList.add("flip");

        if (!cardOne) {
            cardOne = clickedCard;
            console.log("cardOne set", { cardOne });
        } else {
            cardTwo = clickedCard;
            disableDeck = true;
            let cardOneImg = cardOne.querySelector(".back-view img").src;
            let cardTwoImg = cardTwo.querySelector(".back-view img").src;
            matchCards(cardOneImg, cardTwoImg);
        }
    }
}


document.addEventListener("DOMContentLoaded", function () {
    navigateBackToGame();
});



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

function resetGameState() {
    gameStarted = true;
    disableDeck = false;
    cardOne = null;
    cardTwo = null;
    gameOver = false;
    pairs = [];
    // Reset any other game-related variables
}

const cardsContainer = document.querySelector("#cards-container");

function addCardEventListeners() {
    console.log("Adding card event listeners");
    cards.forEach(card => {
        card.addEventListener("click", () => flipCard(card));
        console.log("Event listener added to card:", card);
    });
}


// Call this function after recreating the cards
addCardEventListeners();

function navigateBackToGame() {
    console.log("Navigating back to the game");
    resetGameState();
    // Other initialization code
    shuffleCard();
    addCardEventListeners();
    console.log("Game state after navigating back:", {
        currentMemoryLevel,
        timerInterval,
        elapsedTime,
        gameStarted,
        matched,
        cardOne,
        cardTwo,
        disableDeck,
        gameOver,
        pairs,
    });
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
            const restartConfirmation = confirm("Are you sure you want to restart the game? Your progress will be lost.");
            if (restartConfirmation) {
                // Reset the current level to 0 when restarting the game
                currentMemoryLevel = 0;
                saveStoredMemoryLevel(currentMemoryLevel, 0); // Reset stored level and elapsed time
                shuffleCard();
                gameOver = false; // Reset game over flag
                elapsedTime = 0; // Reset timer
                updateTimerDisplay(); // Update timer display to show 0:00
                startTimer(); // Restart the timer
            }
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
        try {
            console.log("Next Level button clicked");
    
            if (currentMemoryLevel < memoryLevels.length - 1) {
                console.log("Before loading next level. Current level:", currentMemoryLevel);
    
                // Save stars to the database before loading the next level
                saveMemoryStarsToDatabase(stars, currentMemoryLevel);
    
                // Increment the current level before initializing the next level
                currentMemoryLevel++;
    
                console.log("After incrementing. Updated currentMemoryLevel:", currentMemoryLevel);
    
                // Save the updated level to storage before initializing the next level
                saveStoredMemoryLevel(currentMemoryLevel, elapsedTime);
    
                // Initialize the next level
                initMemoryLevel(currentMemoryLevel);
    
                // Restart the timer for the next level
                startTimer();
    
                // Remove the popup after initializing the next level
                popupContainer.removeChild(popup);
    
                console.log("After loading next level. Current level:", currentMemoryLevel);
            } else {
                console.log("Completing the game");
    
                // Save stars to the database before completing the game
                saveMemoryStarsToDatabase(stars, currentMemoryLevel);
    
                // Redirect to the game choices page or handle the end of the game as needed
                localStorage.setItem("totalStars", totalStars);
                updateTotalStarsDisplay();
                saveStoredMemoryLevel(0, 0); // Reset stored level and elapsed time
                window.location.href = "gamechoices.php";
    
                console.log("After completing the game");
            }
        } catch (error) {
            console.error("Error in next level button click:", error);
        }
    });

}


function saveMemoryStarsToDatabase(stars, currentMemoryLevel) {
    const xhr = new XMLHttpRequest();
    const url = "saveUserProgress2.php"; // Update the URL to the PHP file handling saving stars for Memory game

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    const params = `stars=${stars}&currentLevel=${currentMemoryLevel}&gameId=2`; // Add gameId parameter for Memory game

    xhr.send(params);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                console.log("Memory Stars saved successfully");

                // Check if the current level is completed
                if (response.level_completed) {
                    // Mark the level as done (e.g., disable buttons, show completion message)
                    handleMemoryLevelCompletion(currentMemoryLevel);
                }
            } else {
                console.log("Memory Stars not saved:", response.message);
            }
        }
    };

    saveStoredMemoryLevel(currentMemoryLevel, elapsedTime);

}

// Modify the existing function call in the Memory game code where you show the stars popup
showMemoryStarsPopup(popupMessage, stars);

// Modify the existing function call in the Memory game code where you save stars to the database
saveMemoryStarsToDatabase(stars, currentMemoryLevel);


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

