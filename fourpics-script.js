const levels = [
    {
        images: ["images/fourpics/hydroA.png", "images/fourpics/hydroB.png", "images/fourpics/hydroC.jpg", "images/fourpics/hydroD.jpg"],
        correctAnswer: "hydrogen"
    },

    {
        images: ["images/fourpics/calciumA.jpg", "images/fourpics/calciumB.jpg", "images/fourpics/calciumC.png", "images/fourpics/calciumD.jpg"],
        correctAnswer: "calcium"
    },

    {
        images: ["images/fourpics/neonA.jpg", "images/fourpics/neonB.jpg", "images/fourpics/neonC.jpg", "images/fourpics/neonD.jpg"],
        correctAnswer: "neon"
    },
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

function calculateStars(timeInSeconds) {
    if (timeInSeconds < 21) {
        return 5;
    } else if (timeInSeconds < 31) {
        return 4;
    } else if (timeInSeconds < 41) {
        return 3;
    } else if (timeInSeconds < 51) {
        return 2;
    }
    return 1;
}

submitButton.addEventListener("click", () => {
    const userAnswer = answerInput.value.toLowerCase();
    const level = levels[currentLevel];
    if (userAnswer === level.correctAnswer) {
        clearInterval(timerInterval);
        const seconds = elapsedTime;
        const stars = calculateStars(seconds);
        message.textContent = (currentLevel < levels.length)
            ? `Correct! You earned ${stars} stars.`
            : `Congratulations! You have completed all levels and earned ${stars} stars.`;
        answerInput.value = '';
        elapsedTime = 0; // Reset timer
        currentLevel++;
        if (currentLevel < levels.length) {
            loadLevel();
            startTimer();
        } else {
            answerInput.disabled = true;
            submitButton.disabled = true;
        }
    } else {
        message.textContent = "Incorrect. Try again.";
    }
});

document.getElementById("backButton").onclick = function() {
    history.back();
};


window.addEventListener("load", function(){
    setTimeout(
        function open(event){
            document.querySelector(".popup").style.display = "block";
        },
        10
    )
});


// Function to show the overlay
function showOverlay() {
    document.querySelector(".overlay").style.display = "block";
}

// Function to hide the overlay
function hideOverlay() {
    document.querySelector(".overlay").style.display = "none";
}

window.addEventListener("load", function() {
    setTimeout(function() {
        document.querySelector(".popup").style.display = "block";
        showOverlay(); // Show the overlay when the pop-up appears
    }, 10);
});

document.querySelector("#close").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "none";
    hideOverlay(); // Hide the overlay when the pop-up is closed
    startTimer();
    loadLevel();
});

document.querySelector("#okay").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "none";
    hideOverlay(); // Hide the overlay when the pop-up is closed
    startTimer();
    loadLevel();
});
