<?php
session_start();
include("php/config.php");

// Retrieve the room code from the URL parameter
$roomCode = $_GET['code'];

// Fetch room details
$roomDetails = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM rooms WHERE RoomCode = '$roomCode'"));

// Fetch teacher details
$teacherDetails = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM teachers WHERE Id = {$roomDetails['TeacherID']}"));

// Fetch list of students with access to the room
$studentsQuery = mysqli_query($con, "SELECT * FROM studentgameprogress WHERE RoomCode = '$roomCode'");
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
    <div class="container">
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
</body>
</html>
