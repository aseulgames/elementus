<?php
// Connect to your database (replace these variables with your database credentials)
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate a random unique code
function generateUniqueCode($length = 6) {
    $code = rand(111111, 999999);

    // Check if the code already exists in the database
    global $conn;
    $stmt = $conn->prepare("SELECT RoomCode FROM Rooms WHERE RoomCode = ?");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $stmt->store_result();

    // If the code already exists, generate a new one
    while ($stmt->num_rows > 0) {
        $code = rand(111111, 999999);
        $stmt->execute();
        $stmt->store_result();
    }

    $stmt->close();

    return $code;
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomName = $_POST["room-name"];
    
    // Generate a unique code
    $roomCode = generateUniqueCode();

    // Insert the room details into the database
    $stmt = $conn->prepare("INSERT INTO Rooms (RoomCode, RoomName) VALUES (?, ?)");
    $stmt->bind_param("ss", $roomCode, $roomName);
    
    if ($stmt->execute()) {
        echo "Room created successfully. Room Code: $roomCode";
    } else {
        echo "Error creating room: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
