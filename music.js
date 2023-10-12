var backgroundMusic = document.getElementById("backgroundMusic");
var muteImg = document.getElementById("muteImg");
var isMuted = false;

backgroundMusic.volume = 0.5;

function toggleMute() {
    if (isMuted) {
        backgroundMusic.play();
        muteImg.src = "images/play.png";
    } else {
        backgroundMusic.pause();
        muteImg.src = "images/mute.png";
    }
    isMuted = !isMuted;
}


window.onload = function() {
    backgroundMusic.play();
}