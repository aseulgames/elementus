<?php
session_start();

include("php/config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
    exit();
}

$id = $_SESSION['id'];
$stars = $_POST['stars'];
$currentLevel = $_POST['currentLevel'];

$gameName = "Four Pics Game";  // Replace this with the actual game name (you can pass it from JavaScript)

// Fetch the game_id and max_stars based on the game name
$gameQuery = "SELECT game_id, max_stars FROM games WHERE game_name = '$gameName'";
$gameResult = mysqli_query($con, $gameQuery);

if ($gameResult && mysqli_num_rows($gameResult) > 0) {
    $gameRow = mysqli_fetch_assoc($gameResult);
    $gameId = $gameRow['game_id'];
    $maxStars = $gameRow['max_stars'];

    // Check if a record already exists for the user and current level
    $existingRecordQuery = "SELECT * FROM game_progress WHERE user_id = '$id' AND game_id = '$gameId' AND level = '$currentLevel'";
    $existingRecordResult = mysqli_query($con, $existingRecordQuery);

    if ($existingRecordResult && mysqli_num_rows($existingRecordResult) > 0) {
        // Update stars if the new stars earned are greater than the existing stars
        $existingStarsRow = mysqli_fetch_assoc($existingRecordResult);
        $existingStars = $existingStarsRow['stars_earned'];

        if ($stars > $existingStars) {
            $updateQuery = "UPDATE game_progress SET stars_earned = '$stars' WHERE user_id = '$id' AND game_id = '$gameId' AND level = '$currentLevel'";
            mysqli_query($con, $updateQuery);

            // Provide information about the next level
            $nextLevel = $currentLevel + 1;
            echo json_encode(["success" => true, "next_level" => $nextLevel, "level_completed" => true]);
        } else {
            // Indicate no need to update
            echo json_encode(["success" => false, "message" => "No need to update stars. Existing stars are greater or equal.", "level_completed" => false]);
        }
    } else {
        // Insert new record if no existing record is found
        $insertQuery = "INSERT INTO game_progress (user_id, game_id, stars_earned, level) VALUES ('$id', '$gameId', '$stars', '$currentLevel')";
        mysqli_query($con, $insertQuery);

        // Provide information about the next level
        $nextLevel = $currentLevel + 1;
        echo json_encode(["success" => true, "next_level" => $nextLevel, "level_completed" => true]);
    }
} else {
    // Indicate failure to fetch game details
    echo json_encode(["success" => false, "message" => "Failed to fetch game details from the database", "level_completed" => false]);
}
?>
