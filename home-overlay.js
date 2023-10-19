document.addEventListener('DOMContentLoaded', function() {
    var overlay = document.getElementById('overlay');

// Variables to keep track of starting position and offset
var startX, startY, offsetX, offsetY;

// Function to handle mouse and touch start events
function startDrag(e) {
    e.preventDefault(); // Prevent default behavior for touch events
    if (e.type === 'mousedown') {
        startX = e.clientX;
        startY = e.clientY;
    } else if (e.type === 'touchstart') {
        startX = e.touches[0].clientX;
        startY = e.touches[0].clientY;
    }

    offsetX = overlay.offsetLeft;
    offsetY = overlay.offsetTop;

    // Add event listeners for mousemove and touchmove events
    document.addEventListener('mousemove', drag);
    document.addEventListener('touchmove', drag);
    
    // Add event listeners for mouseup and touchend events
    document.addEventListener('mouseup', stopDrag);
    document.addEventListener('touchend', stopDrag);
}

// Function to handle mouse and touch move events
function drag(e) {
    e.preventDefault(); // Prevent default behavior for touch events
    var x, y;
    if (e.type === 'mousemove') {
        x = e.clientX;
        y = e.clientY;
    } else if (e.type === 'touchmove') {
        x = e.touches[0].clientX;
        y = e.touches[0].clientY;
    }

    var offsetX = x - startX;
    var offsetY = y - startY;

    overlay.style.left = offsetX + 'px';
    overlay.style.top = offsetY + 'px';
}

// Function to handle mouse and touch end events
function stopDrag() {
    // Remove event listeners for mousemove, touchmove, mouseup, and touchend events
    document.removeEventListener('mousemove', drag);
    document.removeEventListener('touchmove', drag);
    document.removeEventListener('mouseup', stopDrag);
    document.removeEventListener('touchend', stopDrag);
}

// Add event listeners for mousedown and touchstart events to start the drag
overlay.addEventListener('mousedown', startDrag);
overlay.addEventListener('touchstart', startDrag);

});

