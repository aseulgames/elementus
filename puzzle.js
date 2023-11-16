//script 1
let elementPlaceholders; // Declare elementPlaceholders as a global variable
let totalStars = 0;
let totalMistakes = 0; // New variable to track total mistakes
let totalElements; // New variable to track total elements
let correctElements = 0; // New variable to track correct elements

document.addEventListener('DOMContentLoaded', function () {
    const draggableElements = document.querySelectorAll('.draggable-element');
    elementPlaceholders = document.querySelectorAll('.element');
    totalElements = draggableElements.length;

    let draggedElement = null;

    draggableElements.forEach((element) => {
        element.addEventListener('dragstart', (e) => {
            draggedElement = e.target;
            e.dataTransfer.setData('text/plain', element.dataset.element);
        });

        element.addEventListener('dragend', () => {
            draggedElement = null;
        });
    });

    const correctMatchSound = document.getElementById('correctMatchSound');
    const wrongMatchSound = document.getElementById('wrongMatchSound');

    elementPlaceholders.forEach((placeholder) => {
        placeholder.addEventListener('dragover', (e) => {
            e.preventDefault();
        });

        placeholder.addEventListener('drop', (e) => {
            e.preventDefault();
            const elementSymbol = e.dataTransfer.getData('text/plain');

            if (placeholder.dataset.element === elementSymbol) {
                placeholder.innerHTML = draggedElement.dataset.element;
                // Add the matched-element class only to the placeholder, not the draggable element
                placeholder.classList.add('matched-element');
                draggableElements.forEach((element) => {
                    if (element.dataset.element === elementSymbol) {
                        element.style.display = 'none';
                        correctMatchSound.play();
                    }
                });

                correctElements++; // Increment correct elements count
                updateStarDisplay(1); // Update star display with +1
            } else {
                totalMistakes++; // Increment mistakes count
                wrongMatchSound.play();
                updateStarDisplay(-1); // Update star display with -1
            }

            if (correctElements === totalElements) {
                console.log("All elements placed correctly. Showing popup.");
                showStarsPopup();
            }
        });
    });

    const restartButton = document.querySelector('.retry-button');
    restartButton.addEventListener('click', function () {
        draggableElements.forEach((element) => {
            element.style.display = 'block';
        });

        elementPlaceholders.forEach((placeholder) => {
            placeholder.innerHTML = '';
            placeholder.classList.remove('matched-element');
        });

        totalMistakes = 0; // Reset mistakes count
        correctElements = 0; // Reset correct elements count
        updateStarDisplay(); // Reset star display
    });
});

function updateStarDisplay(value = 0) {
    totalStars = Math.max(totalStars + value, 0);
    const totalStarsDiv = document.getElementById("totalStarsDisplay");
    totalStarsDiv.innerHTML = `★ ${totalStars} `;
}

function showStarsPopup() {
    console.log('showStarsPopup called');
    // Rest of your existing code for the popup
    const popupContainer = document.getElementById("stars-popup-container");
    const popup = document.createElement("div");
    popup.className = "stars-popup";

    popup.innerHTML = `
        <p>Congratulations! You completed the level with ${totalStars} stars.</p>
        <button id="nextLevelButton">Next Level</button>
    `;

    popupContainer.appendChild(popup);

    const nextLevelButton = popup.querySelector("#nextLevelButton");
    nextLevelButton.addEventListener("click", function () {
        // Navigate to the next level or PHP page
        window.location.href = "puzzle-lvl2.php"; // Replace with the appropriate URL
    });
}

//script 2
document.addEventListener('DOMContentLoaded', function () {
    const elementsWithTooltip = document.querySelectorAll('.hover-text');

    elementsWithTooltip.forEach(element => {
        element.addEventListener('mouseover', function () {
            const elementSymbol = this.dataset.element;
            const tooltip = document.getElementById(`fade-${elementSymbol}`);
            if (tooltip) {
                const rect = this.getBoundingClientRect();
                const windowWidth = window.innerWidth;
                const windowHeight = window.innerHeight;
                const tooltipWidth = tooltip.offsetWidth;
                const tooltipHeight = tooltip.offsetHeight;

                // Calculate the position to center the tooltip slightly to the left and top
                const left = (windowWidth - tooltipWidth) / 2 - (windowWidth * 0.38); // Centered and 5% from the left
                const top = (windowHeight - tooltipHeight) / 2 - (windowHeight * 0.25); // Centered and 5% from the top

                tooltip.style.left = left + 'px';
                tooltip.style.top = top + 'px';

                tooltip.style.display = 'block';
            }
        });

        element.addEventListener('mouseout', function () {
            const elementSymbol = this.dataset.element;
            const tooltip = document.getElementById(`fade-${elementSymbol}`);
            if (tooltip) {
                tooltip.style.display = 'none';
            }
        });
    });
});

//script 3
function showOverlay() {
    document.querySelector(".overlay").style.display = "block";
}

// Function to hide the overlay
function hideOverlay() {
    document.querySelector(".overlay").style.display = "none";
}

window.addEventListener("load", function () {
    setTimeout(function () {
        document.querySelector(".popup").style.display = "block";
        showOverlay(); // Show the overlay when the pop-up appears
    }, 10);
});

document.querySelector("#close").addEventListener("click", function () {
    document.querySelector(".popup").style.display = "none";
    hideOverlay(); // Hide the overlay when the pop-up is closed
    startTimer();
    loadLevel();
});

document.querySelector("#okay").addEventListener("click", function () {
    document.querySelector(".popup").style.display = "none";
    hideOverlay(); // Hide the overlay when the pop-up is closed
    startTimer();
    loadLevel();
});