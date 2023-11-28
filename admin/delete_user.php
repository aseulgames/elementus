<?php
$con = mysqli_connect("localhost", "root", "", "elementus_log") or die("Can't connect");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userType = $_POST["userType"];
    $userId = $_POST["userId"];

    // Use prepared statement to prevent SQL injection
    if ($userType == 'teacher') {
        $query = "DELETE FROM teachers WHERE Id = ?";
    } elseif ($userType == 'student') {
        $query = "DELETE FROM students WHERE Id = ?";
    }

    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $userId);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        echo 'success';
    } else {
        echo 'error';
    }

    mysqli_stmt_close($stmt);
}
?>
