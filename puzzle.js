//script 1
document.addEventListener('DOMContentLoaded', function () {
    const draggableElements = document.querySelectorAll('.draggable-element');
    const elementPlaceholders = document.querySelectorAll('.element');

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

    elementPlaceholders.forEach((placeholder) => {
        placeholder.addEventListener('dragover', (e) => {
            e.preventDefault();
        });

        placeholder.addEventListener('drop', (e) => {
            e.preventDefault();
            const elementSymbol = e.dataTransfer.getData('text/plain');

            if (placeholder.dataset.element === elementSymbol) {
                placeholder.innerHTML = draggedElement.dataset.element;
                draggableElements.forEach((element) => {
                    if (element.dataset.element === elementSymbol) {
                        element.style.display = 'none';
                    }
                });
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
        });
    });
});

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
                const left = (windowWidth - tooltipWidth) / 2 - (windowWidth * 0.3); // Centered and 5% from the left
                const top = (windowHeight - tooltipHeight) / 2 - (windowHeight * 0.3); // Centered and 5% from the top

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
