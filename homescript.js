const unlockedColumns = new Set();

    function unlockColumn(element, lessonId) {
        // Perform any necessary actions when a lesson is unlocked (e.g., update the database)
        // Example: Send an AJAX request to mark the lesson as unlocked

        // After the lesson is unlocked, update the element's class to remove the "locked" class
        element.classList.remove('locked');
    }

        