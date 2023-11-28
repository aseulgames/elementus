<?php
session_start();
include("php/config.php");

// Retrieve the room code from the URL parameter
$roomCode = $_GET['code'];

// Fetch room details
$roomDetails = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM rooms WHERE RoomCode = '$roomCode'"));

// Fetch teacher details
$teacherDetails = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM teachers WHERE Id = {$roomDetails['TeacherID']}"));

// Fetch the student's information
$id = $_SESSION['id'];

// Fetch the list of distinct student names with access to the room
$studentsQuery = mysqli_query($con, "SELECT DISTINCT StudentName FROM studentgameprogress WHERE RoomCode = '$roomCode'");
$students = [];
while ($student = mysqli_fetch_assoc($studentsQuery)) {
    $students[] = $student;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_student_enter_room.css">
    <title>Enter Room</title>
</head>

<body style="background-image: url('background_image.jpg');">
    <div id="overlay" class="overlay">
        <div class="overlay-content" style="visibility: hidden;">
            
        </div>
    </div>   
    <div id="board"></div>
    <audio id="bubbleSound">
        <source src="bubbles.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    <div class="container">
        <div class="logo-row" style="text-align: center;">
            <img src="logo_dark.png" alt="logopng" class="logopng" style="max-width: 40%; height: auto;">
        </div>
        <div class="room-details">
            <h1><?php echo $roomDetails['RoomName']; ?></h1>
            <p>Room Code: <?php echo $roomCode; ?></p>
            <p>Teacher: <?php echo $teacherDetails['FirstName'] . ' ' . $teacherDetails['LastName']; ?></p>
        </div>

        <div class="students-list">
            <h2>Students in this Room:</h2>
            <ul>
                <?php foreach ($students as $student): ?>
                    <li><?php echo $student['StudentName']; ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <br><br>
        <div class="start-button">
            <button onclick="startPlaying()">Start Playing</button>
        </div>
    </div>

    <script>
        function startPlaying() {
            // Add any logic you need for starting the game
            alert('Game is starting!');
        }
    </script>
    <script src="bubbles.js"></script>
</body>

</html>
