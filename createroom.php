<?php
// Database connection
session_start();
include("php/config.php");

// Check if the user is logged in
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit(); // Ensure the script stops executing after redirection
}

$message = ''; // Variable to store success/error message
$roomCode = generateUniqueCode($con, 111111, 999999); // Generate the unique code

// Process form data for room creation
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $roomName = $_POST['room-name'];

    // If room code is posted, use the posted value
    $roomCode = isset($_POST['room-code']) ? $_POST['room-code'] : $roomCode;

    // Get teacher ID from the session
    $teacherID = $_SESSION['id'];

    // Insert room details into the database
    $insert_query = "INSERT INTO Rooms (TeacherID, RoomCode, RoomName) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($con, $insert_query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "iss", $teacherID, $roomCode, $roomName);

    // Execute the insert query
    if (mysqli_stmt_execute($stmt)) {
        // Set success message
        $message = "Room created successfully. Room Code: $roomCode";
    } else {
        // Set error message
        $message = "Error occurred";
    }

    mysqli_stmt_close($stmt);
}

// Function to generate a random unique code
function generateUniqueCode($con, $min, $max) {
    $code = rand($min, $max);

    // Check if the code already exists in the database
    $stmt = mysqli_prepare($con, "SELECT RoomCode FROM Rooms WHERE RoomCode = ?");
    mysqli_stmt_bind_param($stmt, "s", $code);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    // If the code already exists, generate a new one
    while (mysqli_stmt_num_rows($stmt) > 0) {
        $code = rand($min, $max);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }

    mysqli_stmt_close($stmt);

    return $code;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_try.css">
    <title>Create Room</title>
</head>

<style>
    a {
        text-decoration: none;
        color: #000000de;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .register-box2::before {
        content:"";
        border-radius: 30px;
        position: absolute;
        inset: -8px;
        transform: translate(35px,-25px);
        z-index: -2;
        background: linear-gradient(to bottom right, #CF2462, #FF914D, transparent);
        filter: blur(0px);
    }
</style>
<div class="row">
    <div class="row" style="justify-content: left; padding-left: 30px;">
        <img src="logo_dark.png" style="max-width: 23%;
        height: auto;">
    </div>
</div>
<body style="background-image: url('createroom-bg.png');">
    <div style="display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    min-height: 60vh;
    padding-top: 50px;
    transition: transform 0.5s ease;">

        <div class="register-container" style="min-height: 50vh;">
            <div class="form-box register-box2" style="background: #ededed ;height: 50%; width: 40%;">
            <form action="" method="post">
                    <header style="font-size: large; padding-top: 0px; 
                    font-weight: 1000;
                    padding-bottom: 10px;
                    border-bottom: 0px;
                    margin-bottom: 5px;
                    color: #032B60;"><b>Create Room</b></header>
                    <?php if (!empty($message)) : ?>
                        <div class="message">
                            <p><?php echo $message; ?></p>
                            <br>
                            <a href="hometeacher.php" class="btn" style="background: #4CAF50; color: white; text-decoration: none; padding: 10px 20px; border-radius: 5px;">Home</a>
                        </div>
                    <?php else : ?>
                        <div class="field input" style="padding-top: 5px;">
                            <input type="text" value="<?php echo $roomCode; ?>" class="no-arrow" name="room-code" id="room-code" readonly style="background-color: #FFA5A5; color: aliceblue;">
                        </div>
                        <div class="field input" style="padding-top: 5px;">
                            <input type="text" placeholder="Enter Room Name" name="room-name" id="room-name" style="background-color: #FFA5A5; color: aliceblue;" required>
                        </div>
                        <div class="button-row" style="display: flex; margin-top: 20px; justify-content: center;">
                            <button type="submit" class="btn" name="submit" value="Submit" style="background:#F4B4B4;"><b>Create Room</b></button>
                        </div>
                        <a href="hometeacher.php" style="font-size: 15px; padding-top: 5px;
                        color: red; 
                        font-weight: 300;
                        align-items: center;
                        justify-content: center;
                        display: flex;"><u>Cancel</u></a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
