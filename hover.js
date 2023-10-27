document.addEventListener("DOMContentLoaded", function() {
    var hoverSound = document.getElementById("hoverSound");
    var enterButton = document.querySelector(".back-icon a");

    enterButton.addEventListener("mouseenter", function() {
        hoverSound.volume = 0.4;
        hoverSound.play();
    });
});