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

    {
        images: ["images/fourpics/arA.jpg", "images/fourpics/arB.jpg", "images/fourpics/arC.jpg", "images/fourpics/arD.png"],
        correctAnswer: "arsenic"
    },
    {
        images: ["images/fourpics/cuA.png", "images/fourpics/cuB.jpg", "images/fourpics/cuC.png", "images/fourpics/cuD.jpg"],
        correctAnswer: "copper"
    },
];

let currentLevel = 0;
let timerInterval;
let elapsedTime = 0;
let totalStars = 0;


const imageContainer = document.getElementById("image-container");
const answerInput = document.getElementById("answer-input");
const submitButton = document.getElementById("submit-button");
const message = document.getElementById("message");
const timerDisplay = document.getElementById("time-display");

const correctSound = document.getElementById("correctSound");
const wrongSound = document.getElementById("wrongSound");

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

function loadLevel() {
    const level = levels[currentLevel];
    imageContainer.innerHTML = ''; // Clear previous images
    answerInput.value = '';
    message.textContent = '';
    // Display the images for the current level
    for (let i = 0; i < level.images.length; i++) {
        const img = document.createElement("img");
        img.src = level.images[i];
        img.alt = `Image ${i + 1}`;
        imageContainer.appendChild(img);
    }

    // Check if the current level is completed and show stars popup
    if (currentLevel > 0) {
        // const stars = calculateStars(elapsedTime);
        // const popupMessage = `Congratulations! You earned ${stars} stars.`;
        // showStarsPopup(popupMessage);
    }

    // Start the timer for the new level
    startTimer();
}

submitButton.addEventListener("click", () => {
    const userAnswer = answerInput.value.toLowerCase();
    const level = levels[currentLevel];
    if (userAnswer === level.correctAnswer) {
        clearInterval(timerInterval);
        const seconds = elapsedTime;
        const stars = calculateStars(seconds);
        const popupMessage = `Correct! You earned ${stars} stars.`;
        showStarsPopup(popupMessage, stars); // Show stars popup for correct answer

        answerInput.value = '';
        elapsedTime = 0;
        if (currentLevel < levels.length) {
            
        } else {
            answerInput.disabled = true;
            submitButton.disabled = true;
            // Handle game completion logic here
        }
        correctSound.play();
    } else {
        message.textContent = "Incorrect. Try again.";
        wrongSound.play();
    }
});
function showStarsPopup(message, stars) {
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
        <button id="nextLevelButton">Next Level</button>
    `;

    popupContainer.appendChild(popup);

    const nextLevelButton = popup.querySelector("#nextLevelButton");
    nextLevelButton.addEventListener("click", function() {
        if (currentLevel < levels.length - 1) {
            popupContainer.removeChild(popup);
            currentLevel++;
            loadLevel();
        } else {
            window.location.href = "gamechoices.php";
        }
    });
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
});

document.querySelector("#okay").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "none";
    hideOverlay(); // Hide the overlay when the pop-up is closed
    startTimer();
});

answerInput.addEventListener("keydown", function(event) {
    if (event.key === "Enter") {
        submitButton.click(); // Trigger the click event of the submit button
    }
});
