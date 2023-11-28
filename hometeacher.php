<?php

session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

$user_id = $_SESSION['id'];

// Fetch all rooms associated with the teacher's ID
$query = mysqli_query($con, "SELECT * FROM Rooms WHERE TeacherID = $user_id");

// Store the room data in an array
$rooms = [];
while ($result = mysqli_fetch_assoc($query)) {
    $rooms[] = $result;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="home.css">
    <script src="homescript.js"></script>
    <title>Home</title>
    <style>
        html, body {
            max-width: 100%;
            overflow-x: hidden;
        }

        .box {
            width: 100%;
            margin: 0 1%;
            position: relative;
            overflow: hidden;
            border-radius: 15px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            padding: 20px;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .box.unlocked:hover {
            transform: scale(1.05);
        }

        .box-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            height: 100%;
        }

        .box-text {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .leaderboard {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .leaderboard h5 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .leaderboard p {
            margin: 5px 0;
            font-size: 14px;
        }

        .box.locked {
            pointer-events: none;
            background-color: #ddd;
            color: #888;
        }

        .container .intro-container .box.unlocked {
            pointer-events: auto; 
            border: 5px solid #d4f7gf; /* Light border color */
            box-shadow: 
                0 0 5px 1px #9F72E6, /* Inner glowing shadow */
                0 0 5px 1px #9F72E6, /* Outer glowing shadow */
                inset 0 0 9px 4px #9F72E6; /* Inner glowing shadow with 'inset' keyword */
                transition: transform 0.3s ease;
        }
        
        
    </style>
</head>
<body style="background-image: url('images/homebg.png');">
<!-- Bootstrap Navbar -->
<nav class="nav navbar navbar-expand-lg navbar-light">
    <div class="container">
        <div class="logo-container">
            <a href="hometeacher.php" class="logo navbar-brand">
                <img src="logo_dark.png" alt="logopng" class="logopng">
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="menu navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="hometeacher.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about-teacher.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="createroom.php">Create Room</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="periodictable.php">Manage Rooms</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="profileedit_teacher.php">Profile</a>
                </li>
            </ul>

            </div>
        </div>
    </nav>

            <?php

            $id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM teachers WHERE Id = $id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Fname = $result['FirstName'];
                $res_Lname = $result['LastName'];
                $res_id = $result['Id'];
            }
            ?>

            
        </ul>
		
    </div>
</div>
    </header>
    <link rel="stylesheet" href="home.css">
    <main>
        <header style="padding-left: 2%; color: #004aad">Hello, <b><?php echo $res_Uname ?>!</b></header><br>

        <div class="container">
            <header>Rooms</header>
            <div class="intro-container">
                <?php
                // Loop through the rooms and generate HTML for each room box
                foreach ($rooms as $room) {
                    $roomId = $room['RoomID'];
                    $roomName = $room['RoomName'];
                    $roomCode = $room['RoomCode'];

                    echo '<div class="box unlocked">';
                    echo '<div class="box-content">';
                    echo '<div class="box-text">' . $roomName . '  ' . $roomCode . '</div>';

                    // Display fixed spaces for three students
                    echo '<div class="leaderboard">';
                    echo '<h5>Leaderboard:</h5>';
                    for ($i = 1; $i <= 3; $i++) {
                        echo '<p>Student ' . $i . '</p>';
                    }
                    echo '</div>';

                    echo '</div>';
                    echo '</div>';
                }

                $remainingBoxes = 4 - count($rooms);
                for ($i = 0; $i < $remainingBoxes; $i++) {
                    echo '<div class="box locked">Empty Room</div>';
                }
                ?>
            </div>
        </div>
    </main>
    <script src="bootstrap/bootstrap.bundle.min.js"></script>
    <script src="homescript.js"></script>
    <script>
    window.onload = function() {
        backgroundMusic.volume = 0.6;
            backgroundMusic.play();
        }
    </script>
</body>
</html>