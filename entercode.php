<?php
session_start();
include("php/config.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the entered code
    $enteredCode = $_POST['confirm'];

    // Validate the code against the database
    $query = "SELECT * FROM rooms WHERE RoomCode = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $enteredCode);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    // If there's a match, proceed
    if (mysqli_stmt_num_rows($stmt) > 0) {
        // Get the room details
        $roomDetails = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM rooms WHERE RoomCode = '$enteredCode'"));

        // Get the student information from the students table (replace 'student_id', 'first_name', 'last_name', and 'student_table' with your actual column and table names)
        $id = $_SESSION['id']; // Change 'student_id' to your actual session variable
        $studentQuery = mysqli_query($con, "SELECT * FROM students WHERE Id = $id");
        $studentInfo = mysqli_fetch_assoc($studentQuery);

        // Combine the first and last name to create the student name
        $studentName = $studentInfo['FirstName'] . ' ' . $studentInfo['LastName'];

        // Insert student information into studentgameprogress
        $insertQuery = "INSERT INTO studentgameprogress (StudentID, StudentName, RoomID, RoomCode)
                        VALUES (?, ?, ?, ?)";
        $insertStmt = mysqli_prepare($con, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, "issi", $id, $studentName, $roomDetails['RoomID'], $enteredCode);
        mysqli_stmt_execute($insertStmt);

        // Redirect to the student's personal account page for that room
        header("Location: student_enter_room.php?code=$enteredCode");
        exit();
    } else {
        // Display an error message
        $errorMessage = "Invalid code. Please try again.";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_try.css">
    <title>User type</title>
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

        .error-message {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body style="background-image: url('code_bg.png');">
    <div style="display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    min-height: 60vh;
    padding-top: 50px;
    transition: transform 0.5s ease;">

        <div class="register-container" style="min-height: 50vh;">
            <div class="form-box register-box2" style="background: #ededed ;height: 45%; width: 40%;">
                <?php if (isset($errorMessage)) : ?>
                    <div class="error-message"><?php echo $errorMessage; ?></div>
                <?php endif; ?>

                <form action="" method="post">
                    <header style="font-size: large; padding-top: 0px;
                    font-weight: 1000;
                    padding-bottom: 10px;
                    border-bottom: 0px;
                    margin-bottom: 5px;
                    color: #032B60;"><b>Enter teacher's code</b></header>
                    <div class="field input" style="padding-top: 5px;">
                        <input type="number" placeholder="000000" class="no-arrow" name="confirm" id="confirm" style="background-color: #0DADB4; color: aliceblue;">
                    </div>
                    <div class="button-row" style="display: flex; margin-top: 20px; justify-content: center;">
                        <button type="submit" class="btn" name="submit" value="Submit"><b>PROCEED</b></button>
                    </div>
                    <a href="homestudent.php" style="font-size: 15px; padding-top: 5px;
                    color: #6A08C4;
                    font-weight: 300;
                    align-items: center;
                    justify-content: center;
                    display: flex;"><u>Skip</u></a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
