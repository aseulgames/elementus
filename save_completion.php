<?php
// save_completion.php

// At the top of save_completion.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Your existing code...

session_start();
include("php/config.php");

if (!isset($_SESSION['valid'])) {
    echo "Session not valid.";
    exit;
}

$user_id = $_SESSION['id'];
$lesson_id = $_POST['lesson_id'];
$completed = $_POST['completed'];

$insert = mysqli_query($con, "INSERT INTO student_lesson_progress (Id, lesson_id, completed) VALUES ($user_id, $lesson_id, $completed) ON DUPLICATE KEY UPDATE completed = $completed");

if ($insert) {
    echo "Lesson progress inserted successfully.";
} else {
    echo "Error inserting lesson progress: " . mysqli_error($con);
}
?>

