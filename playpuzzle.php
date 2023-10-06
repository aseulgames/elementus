<?php
session_start();

include("php/config.php");
if (!isset($_SESSION['valid'])) {
    header("Location: index.php");
}

$id = $_SESSION['id'];
            $query = mysqli_query($con, "SELECT * FROM students WHERE Id = $id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_Email = $result['Email'];
                $res_Fname = $result['FirstName'];
                $res_Lname = $result['LastName'];
                $res_id = $result['Id'];
            }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="games.css">
    <title>Let's Play</title>
</head>


<div class="row" style="padding-top: 20px;">
    <a id="backButton">
        <img src="puzzle_back.png" class="back-icon" alt="Back Icon" style="width: 20vh;">
    </a><span><img src="images/puzzlelogo.png" class="iconlogo" style="max-width: 50%;
    min-width: 40%;"></span>

    <div class="row" style="justify-content: right; padding-right: 20px;">
        <img src="logo_dark.png" style="max-width: 25%;
        height: auto; justify-content: right; padding-right: 30px;">
    </div>

</div>
<body style="background-image: url('images/puzzlebg.png');">
    <div class="start-container">
        <div class="play">
            <img src="images/letsplaypuzzle.png" style="width: 100%;height: auto; margin-bottom:-30px">
            <a href="puzzle.php">
            <button type="button" class="btn btn-start" style="color:#ff0055; ">START</button>
            </a>
        </div>
    </div>

    <script>
        document.getElementById("backButton").onclick = function() {
            history.back();
        };
    </script>
</body>
</html>