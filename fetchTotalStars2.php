<?php
// Include the database connection details from config.php
include("php/config.php");

// Start the session
session_start();

// Replace 'your_user_id' and 'your_game_id' with the actual user_id and game_id you are using
$userId = $_SESSION['id'];
$gameId = '2';

// Fetch the user's current total stars for the given game_id
$sqlSelect = "SELECT total_stars FROM user_game_progress WHERE user_id = '$userId' AND game_id = '$gameId'";
$resultSelect = $con->query($sqlSelect);

$response = array();

if ($resultSelect->num_rows > 0) {
    $row = $resultSelect->fetch_assoc();
    $currentTotalStars = $row['total_stars'];

    // Get the stars earned in the current game session (you'll need to replace 'your_stars_earned' with the actual value)
    $starsEarned = $_POST['stars'];

    // Calculate the new total stars
    $newTotalStars = $currentTotalStars + $starsEarned;

    // Update the total stars in the database
    $sqlUpdate = "UPDATE user_game_progress SET total_stars = '$newTotalStars' WHERE user_id = '$userId' AND game_id = '$gameId'";
    if ($con->query($sqlUpdate) === TRUE) {
        $response['success'] = true;
        $response['message'] = "Total stars updated successfully.";
    } else {
        $response['success'] = false;
        $response['message'] = "Error updating total stars: " . $con->error;
    }
} else {
    $response['success'] = false;
    $response['message'] = "No user game progress found for the user_id and game_id.";
}

echo json_encode($response);

$con->close();
?>
