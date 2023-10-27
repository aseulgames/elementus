let timerInterval;
let elapsedTime = 0;
let gameStarted = false;
let matched = 0;
let cardOne = null;
let cardTwo = null;
let disableDeck = false;
let gameOver = false;

const timerDisplay = document.getElementById("time-display");
const cards = document.querySelectorAll(".card");
const popup = document.querySelector(".popup");
const overlay = document.querySelector(".overlay");

const flipSound = document.getElementById("flipSound");
const correctMatchSound = document.getElementById("correctMatchSound");
const wrongMatchSound = document.getElementById("wrongMatchSound");


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
    if (gameStarted) {
        clickedCard.classList.add("flip");
        // flipSound.play();
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
                correctMatchSound.play();
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
