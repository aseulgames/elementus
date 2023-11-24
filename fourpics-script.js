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
    const storedLevel = getStoredLevel();
    currentLevel = storedLevel > 0 && storedLevel <= levels.length ? storedLevel : 0;

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
}

submitButton.addEventListener("click", () => {
    const userAnswer = answerInput.value.toLowerCase();
    const level = levels[currentLevel];
    if (userAnswer === level.correctAnswer) {
        clearInterval(timerInterval);
        const seconds = elapsedTime;
        const stars = calculateStars(seconds);
        const popupMessage = `Correct! You earned ${stars} stars.`;
        showStarsPopup(popupMessage, stars); // Show stars popup for the correct answer

        answerInput.value = '';
        elapsedTime = 0;
        if (currentLevel < levels.length - 1) {
            saveStoredLevel(currentLevel + 1); // Save the next level
            currentLevel++;
            loadLevel();
        } else {
            saveStoredLevel(currentLevel + 1);
        }
        correctSound.play();
    } else {
        message.textContent = "Incorrect. Try again.";
        wrongSound.play();
    }
});

function showStarsPopup(message, stars) {
    totalStars += parseInt(stars); // or parseFloat(stars) depending on whether stars can be decimal values
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
        <form id="starsForm" method="post" action="saveUserProgress.php">
            <input type="hidden" name="stars" value="${stars}">
            <input type="hidden" name="currentLevel" value="${currentLevel}">
            <button type="submit" id="nextLevelButton">Next Level</button>
        </form>
    `;

    popupContainer.appendChild(popup);

    const nextLevelButton = popup.querySelector("#nextLevelButton");
    nextLevelButton.addEventListener("click", function (event) {
        event.preventDefault(); // Prevent the form submission for now
    
        if (currentLevel < levels.length - 0) {
            // Save stars to the database before loading the next level
            saveStarsToDatabase(stars, currentLevel);
    
            // Increment the current level here
            currentLevel++;
    
            // Load the next level
            loadLevel();
    
            // Remove the popup after loading the next level
            popupContainer.removeChild(popup);

            

            if (currentLevel !==0){
                startTimer();
            }
        } else {
            saveStarsToDatabase(stars, currentLevel);
            saveStoredLevel(0);
            currentLevel = 0;
            window.location.href = "gamechoices.php";
        }
    });
    
}

function saveStarsToDatabase(stars, currentLevel) {
    const xhr = new XMLHttpRequest();
    const url = "saveUserProgress.php";

    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send(`stars=${stars}&currentLevel=${currentLevel}`);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                console.log("Stars saved successfully");

                // Check if the current level is completed
                if (response.level_completed) {
                    // Mark the level as done (e.g., disable buttons, show completion message)
                    handleLevelCompletion(currentLevel);
                }
            } else {
                console.log("Stars not saved:", response.message);
            }
        }
    };
    
}

function handleLevelCompletion(level) {
    // Implement logic to handle completion of the level, if needed
    console.log(`Level ${level} completed!`);
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

function saveStoredLevel(level) {
    localStorage.setItem("currentLevel", level);
}

function getStoredLevel() {
    return parseInt(localStorage.getItem("currentLevel")) || 0;
}

document.getElementById("backButton").onclick = function() {
    history.back();
};


function showOverlay() {
    document.querySelector(".overlay").style.display = "block";
}

function hideOverlay() {
    document.querySelector(".overlay").style.display = "none";
}

window.addEventListener("load", function(){
    fetchTotalStars();

    // Load stored level and show tutorial only for level 1
    loadStoredLevel();

    // Check if the current level is level 1 (hydrogen) before showing the tutorial
    if (currentLevel === 0) {
        setTimeout(function() {
            document.querySelector(".popup").style.display = "block";
            showOverlay(); // Show the overlay when the pop-up appears
        }, 10);
    }
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

function loadStoredLevel() {
    currentLevel = getStoredLevel();
    totalStars = 0;

    // Check if the current level is completed and show stars popup
    if (currentLevel > 1) {
        // const stars = calculateStars(elapsedTime);
        // const popupMessage = `Congratulations! You earned ${stars} stars.`;
        // showStarsPopup(popupMessage);
    }

    loadLevel();
}

function fetchTotalStars() {
    const xhr = new XMLHttpRequest();
    const url = "fetchTotalStars.php";

    xhr.open("GET", url, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            if (response.success) {
                totalStars = response.totalStars !== null ? response.totalStars : 0;
                updateTotalStarsDisplay();
            } else {
                console.log("Error fetching total stars:", response.message);
            }
        }
    };

    xhr.send();
}

function updateTotalStarsDisplay() {
    const totalStarsDiv = document.getElementById("totalStarsDisplay");
    totalStarsDiv.innerHTML = `★ ${totalStars} `;
}
